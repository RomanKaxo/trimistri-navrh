#!/usr/bin/env python3
"""Verify the generated hosting tree against an actual local Apache instance.

The server used with --mail-capture MUST replace sendmail with a local capture
program; the flag enables test submissions and never targets a public site.
"""
from pathlib import Path
from html.parser import HTMLParser
from urllib.request import Request, build_opener, HTTPRedirectHandler, HTTPCookieProcessor
from urllib.error import HTTPError
from urllib.parse import urljoin, urlsplit, urlencode
import argparse
import base64
import hashlib
import http.cookiejar
import json
import re
import subprocess
import time
from email import policy
from email.parser import BytesParser

ROOT = Path(__file__).resolve().parents[1]


class NoRedirect(HTTPRedirectHandler):
    def redirect_request(self, *args):
        return None


class Document(HTMLParser):
    def __init__(self, source):
        super().__init__()
        self.links, self.ids, self.fields, self.forms, self.meta, self.canonicals = [], set(), {}, [], {}, []
        self.base = ''
        self.feed(source)

    def handle_starttag(self, tag, attrs):
        attrs = dict(attrs)
        if 'id' in attrs:
            self.ids.add(attrs['id'])
        if tag == 'base':
            self.base = attrs.get('href', '')
        if tag in ('a', 'link', 'img', 'script'):
            for key in ('href', 'src'):
                if attrs.get(key):
                    self.links.append(attrs[key])
            if attrs.get('srcset'):
                self.links += [item.strip().split()[0] for item in attrs['srcset'].split(',')]
        if tag == 'input' and 'name' in attrs:
            self.fields[attrs['name']] = attrs.get('value', '')
        if tag == 'form':
            self.forms.append(attrs)
        if tag == 'meta':
            self.meta[attrs.get('name', '')] = attrs.get('content', '')
        if tag == 'link' and attrs.get('rel') == 'canonical':
            self.canonicals.append(attrs.get('href'))


def main():
    ap = argparse.ArgumentParser()
    ap.add_argument('--base', default='http://127.0.0.1:8873/')
    ap.add_argument('--original', type=Path, required=True)
    ap.add_argument('--mail-capture', type=Path)
    ap.add_argument('--report', type=Path)
    args = ap.parse_args()
    assert urlsplit(args.base).hostname in ('localhost', '127.0.0.1'), 'Only test local servers'
    web = ROOT / 'hosting/web'
    checks, failures = 0, []

    def check(condition, label):
        nonlocal checks
        checks += 1
        if not condition:
            failures.append(label)

    opener = build_opener(NoRedirect())

    def request(path, client=opener, data=None, headers=None):
        req = Request(urljoin(args.base, path), data=data, headers=headers or {})
        try:
            response = client.open(req, timeout=10)
        except HTTPError as error:
            response = error
        return response.code, response.headers, response.read()

    originals = json.loads((ROOT / 'hosting/original-paths.json').read_text())
    for path, digest in originals.items():
        check((web / path).is_file(), f'original path missing: {path}')
        check(hashlib.sha256((args.original / path).read_bytes()).hexdigest() == digest, f'original modified: {path}')
    for php in web.rglob('*.php'):
        result = subprocess.run(['rtk', 'proxy', 'php', '-l', str(php)], capture_output=True, text=True)
        check(result.returncode == 0, f'PHP syntax: {php.relative_to(web)}: {result.stdout}')
    for js in (web / 'assets/js').glob('navrh-*.js'):
        result = subprocess.run(['rtk', 'proxy', 'node', '--check', str(js)], capture_output=True, text=True)
        check(result.returncode == 0, f'JS syntax: {js.name}')

    routes = [''] + [p.parent.name for p in sorted((ROOT / 'sluzby').glob('*/index.html'))] + ['sluzby', 'galerie', 'ochrana-osobnich-udaju', 'dekujeme']
    documents = {}
    for route in routes:
        code, headers, body = request(route)
        source = body.decode()
        check(code == 200, f'route {route}: {code}')
        check(not re.search(r'(Fatal error|Parse error|Warning|Deprecated):', source), f'PHP output errors: {route}')
        check('/trimistri-navrh/' not in source and 'pages-preview.js' not in source, f'Pages prefix retained: {route}')
        doc = Document(source)
        documents[urljoin(args.base, route)] = doc
        if route != 'dekujeme':
            check('noindex' not in doc.meta.get('robots', ''), f'production noindex: {route}')
        if route not in ('dekujeme', 'ochrana-osobnich-udaju'):
            check(doc.canonicals == ['https://trimistri.cz/' + route], f'canonical: {route}')
        for form in doc.forms:
            check(form.get('action') == 'send' and form.get('enctype') == 'multipart/form-data', f'form backend: {route}')
            check(len(doc.fields.get('quote_form_token', '')) == 64, f'CSRF token: {route}')
            check(doc.fields.get('return_to') == (route or 'index') + '.php', f'form return URL: {route}')
            check('no-store' in headers.get('Cache-Control', ''), f'cached token: {route}')
        for block in re.findall(r'<script type="application/ld\+json">(.*?)</script>', source, re.S):
            try:
                json.loads(block)
                check(True, 'JSON-LD')
            except json.JSONDecodeError:
                check(False, f'invalid JSON-LD: {route}')

    seen = set()
    queue = []
    for url, doc in documents.items():
        base = urljoin(url, doc.base) if doc.base else url
        for link in doc.links:
            target = urljoin(base, link)
            if urlsplit(target).netloc != urlsplit(args.base).netloc:
                continue
            clean = target.split('#')[0]
            fragment = urlsplit(target).fragment
            if fragment and clean in documents:
                check(fragment in documents[clean].ids, f'missing anchor: {target}')
            if clean not in seen:
                seen.add(clean)
                queue.append(clean)
    while queue:
        url = queue.pop()
        code, headers, body = request(url)
        check(code == 200, f'linked resource {url}: {code}')
        if headers.get('Content-Type', '').startswith('text/css'):
            for link in re.findall(r'url\([\s\'"]*([^\s\'"\)]+)', body.decode()):
                target = urljoin(url, link)
                if urlsplit(target).netloc == urlsplit(args.base).netloc and target not in seen:
                    seen.add(target)
                    queue.append(target)

    for path, expected in [('index.php', ''), ('dekoracni-sterky.php', 'dekoracni-sterky'), ('dekoracni-sterky/', 'dekoracni-sterky'), ('cisteni-strech-okapu', 'natery-strech')]:
        code, headers, _ = request(path)
        check(code == 301 and headers.get('Location') == urljoin(args.base, expected), f'legacy redirect: {path}: {code} {headers.get("Location")}')
    for path in ['includes/cms-config.php', 'includes/service-pages-data.php']:
        check(request(path)[0] == 403, f'private PHP includes exposed: {path}')
    for path in ['cenik', 'renovace', 'missing/deep/path']:
        code, headers, body = request(path)
        check(code == 404, f'404 status: {path}')
        check('Stránka nenalezena' in body.decode(), f'custom 404: {path}')
        doc = Document(body.decode())
        check(doc.base == '/', f'404 asset base: {path}')
    pdf = next((web / 'assets/pdf').glob('*.pdf'))
    check('noindex' in request(str(pdf.relative_to(web)))[1].get('X-Robots-Tag', ''), 'PDF index policy')
    sitemap = (web / 'sitemap.xml').read_text()
    check('cenik' not in sitemap and 'renovace' not in sitemap and '.pdf' not in sitemap, 'sitemap removals')
    check((web / 'robots.txt').read_text() == (args.original / 'robots.txt').read_text(), 'production robots')
    check((web / 'send.php').read_bytes() == (args.original / 'send.php').read_bytes(), 'original email handler preserved')

    if args.mail_capture:
        jar = http.cookiejar.CookieJar()
        client = build_opener(NoRedirect(), HTTPCookieProcessor(jar))
        _, _, body = request('dekoracni-sterky', client)
        token = Document(body.decode()).fields['quote_form_token']
        values = dict(quote_form_token=token, return_to='dekoracni-sterky.php', name='Test hostingu', phone='+420777123456', city='Brno', email='hosting-test@example.invalid', service='Dekorativní stěrky', message='Lokální automatický test, bez síťového odeslání.')
        time.sleep(2.1)

        def submit(values, attachment=None):
            boundary = 'trimistri-local-test-boundary'
            chunks = []
            for key, value in values.items():
                chunks.append(f'--{boundary}\r\nContent-Disposition: form-data; name="{key}"\r\n\r\n{value}\r\n'.encode())
            if attachment:
                filename, data, mime = attachment
                chunks.append(f'--{boundary}\r\nContent-Disposition: form-data; name="photos[]"; filename="{filename}"\r\nContent-Type: {mime}\r\n\r\n'.encode() + data + b'\r\n')
            chunks.append(f'--{boundary}--\r\n'.encode())
            return request('send', client, b''.join(chunks), {'Content-Type': f'multipart/form-data; boundary={boundary}'})

        for label, overrides, attachment, expected in [
            ('CSRF', {'quote_form_token': 'wrong'}, None, 'invalid'),
            ('service whitelist', {'service': 'unlisted'}, None, 'invalid'),
            ('email injection', {'email': 'test@example.invalid\r\nBcc:evil@example.invalid'}, None, 'invalid'),
            ('fake photo', {}, ('fake.php', b'<?php echo 1;', 'image/jpeg'), 'invalid-file'),
            ('attachment limit', {}, ('large.jpg', b'x' * (4 * 1024 * 1024 + 1), 'image/jpeg'), 'error'),
        ]:
            code, headers, _ = submit(values | overrides, attachment)
            check(code == 303 and f'form={expected}' in headers.get('Location', '') and '/dekoracni-sterky?' in headers.get('Location', ''), f'form {label}: {code} {headers.get("Location")}')
        png = base64.b64decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAusB9Wl6PAAAAABJRU5ErkJggg==')
        code, headers, _ = submit(values, ('photo.png', png, 'image/png'))
        check(code == 303 and headers.get('Location') == '/dekujeme', f'valid form: {code} {headers.get("Location")}')
        check(args.mail_capture.exists(), 'mail locally captured')
        if args.mail_capture.exists():
            message = BytesParser(policy=policy.default).parsebytes(args.mail_capture.read_bytes())
            check(message.is_multipart() and len(list(message.iter_attachments())) == 1, 'photo included in MIME mail')
            check(list(message.iter_attachments())[0].get_payload(decode=True) == png, 'attachment bytes unchanged')
        code, headers, _ = submit(values)
        check(code == 303 and 'form=invalid' in headers.get('Location', ''), 'submitted CSRF token invalidated')
        _, _, body = request('dekoracni-sterky', client)
        fresh = Document(body.decode()).fields['quote_form_token']
        code, headers, _ = submit(values | {'quote_form_token': fresh})
        check(code == 303 and 'form=invalid' in headers.get('Location', ''), 'fast submission blocked')
        time.sleep(2.1)
        code, headers, _ = submit(values | {'quote_form_token': fresh})
        check(code == 303 and 'form=too-fast' in headers.get('Location', ''), 'repeat submission blocked')
    report = {'checks': checks, 'resources': len(seen), 'routes': len(routes), 'original_paths': len(originals), 'failures': failures, 'passed': not failures, 'mail_test': bool(args.mail_capture)}
    if args.report:
        args.report.write_text(json.dumps(report, ensure_ascii=False, indent=2) + '\n')
    print(json.dumps(report, ensure_ascii=False, indent=2))
    raise SystemExit(bool(failures))


if __name__ == '__main__':
    main()
