#!/usr/bin/env python3
"""Build the current proposal in the original trimistri.cz PHP hosting layout."""
from pathlib import Path
import argparse
import hashlib
import html
import json
import os
import re
import shutil

ROOT = Path(__file__).resolve().parents[1]


def element(source, pattern, tag):
    start = re.search(pattern, source)
    if not start:
        raise ValueError(f'Missing {pattern}')
    depth = 0
    for match in re.finditer(rf'</?{tag}\b[^>]*>', source[start.start():], re.I):
        depth += -1 if match.group().startswith('</') else 1
        if depth == 0:
            return source[start.start():start.start() + match.end()]
    raise ValueError(f'Unclosed {tag}')


def plain(source):
    return html.unescape(re.sub(r'<[^>]+>', '', source)).strip()


def urls(source):
    source = re.sub(r'/trimistri-navrh/sluzby/([^/\s"\'<>]+)/', r'./\1', source)
    source = source.replace('/trimistri-navrh/galerie/', './galerie')
    source = source.replace('/trimistri-navrh/', './')
    source = source.replace('https://trimistri.cz/ochrana-osobnich-udaju', './ochrana-osobnich-udaju')
    source = re.sub(r'\./navrhy/([^"\'\s?<>]+)\.(css|js)',
                    lambda m: f'./assets/{m[2]}/navrh-{m[1]}.{m[2]}', source)
    return source


def write(destination, relative, content):
    path = destination / relative
    path.parent.mkdir(parents=True, exist_ok=True)
    path.write_text(content)


def main():
    parser = argparse.ArgumentParser()
    parser.add_argument('--original', type=Path, required=True, help='Original repository web/ directory')
    parser.add_argument('--destination', type=Path, default=ROOT / 'hosting/web')
    args = parser.parse_args()
    manifest_path = ROOT / 'assets/performance-manifest.json'
    if not manifest_path.is_file():
        raise ValueError('Run scripts/build-performance.py before the hosting export')
    performance = json.loads(manifest_path.read_text())
    original, dest = args.original.resolve(), args.destination.resolve()
    if dest == original or original in dest.parents or dest in original.parents:
        raise ValueError('The deployment directory must be separate from the original')
    source_files = {str(p.relative_to(original)): hashlib.sha256(p.read_bytes()).hexdigest()
                    for p in original.rglob('*') if p.is_file()}
    shutil.copytree(original, dest, dirs_exist_ok=True)
    shutil.copytree(ROOT / 'assets', dest / 'assets', dirs_exist_ok=True)
    for css in (dest / 'assets').rglob('*.css'):
        content = re.sub(r'/trimistri-navrh/([^\s"\'\)]+)', lambda m: os.path.relpath(dest / m[1], css.parent), css.read_text())
        css.write_text(content)
    shutil.copyfile(ROOT / 'scripts/hosting-cms.php', dest / 'includes/navrh-cms.php')
    shutil.copyfile(ROOT / 'scripts/hosting.css', dest / 'assets/css/navrh-hosting.css')
    for path in (ROOT / 'navrhy').iterdir():
        if path.suffix not in ('.css', '.js') or path.name == 'pages-preview.js':
            continue
        # CSS urls resolve relative to assets/css/, not the document root.
        content = urls(path.read_text())
        if path.suffix == '.css':
            content = content.replace('./assets/', '../')
        write(dest, f'assets/{path.suffix[1:]}/navrh-{path.name}', content)

    home = urls((ROOT / 'index.html').read_text())
    header = element(home, r'<header class="tm-header"', 'header')
    header = re.sub(r' aria-current="[^"]+"', '', header)
    header = header.replace('data-nav-section="top"', 'data-nav-section="top" <?= $isHome ? \'aria-current="location"\' : \'\' ?>')
    header = header.replace('data-nav-section="sluzby"', 'data-nav-section="sluzby" <?= $isService ? \'aria-current="page"\' : \'\' ?>')
    header = header.replace('data-nav-section="realizace"', 'data-nav-section="realizace" <?= $pageSlug === \'galerie\' ? \'aria-current="page"\' : \'\' ?>')
    header = header.replace('href="./#poptavka"', 'href="<?= $hasQuote ? \'#poptavka\' : \'./#poptavka\' ?>"')
    header = header.replace('href="./#sluzby"', 'href="./sluzby"')
    write(dest, 'includes/header.php', '<?php\n$isHome = $isHome ?? false;\n$isService = $isService ?? false;\n$pageSlug = $pageSlug ?? \'\';\n$hasQuote = $hasQuote ?? false;\n?>\n' + header)
    footer = element(home, r'<footer class="tm-footer"', 'footer')
    footer = footer.replace('href="./#sluzby"', 'href="./sluzby"')
    footer = footer.replace('</div></footer>', '<button type="button" class="footer-consent-settings" data-consent-settings aria-controls="consent-panel" aria-expanded="false">Nastavení cookies</button></div></footer>')
    original_footer = (original / 'includes/footer.php').read_text()
    consent = element(original_footer, r'<aside id="consent-panel"', 'aside')
    footer += '\n' + consent + '\n<script src="assets/js/consent-mode.js?v=20260923" defer></script>\n<script src="assets/js/phone-conversion.js?v=20260914" defer></script>\n'
    footer += '\n'.join(f'<script src="assets/js/navrh-{name}.js?v={hashlib.sha256((ROOT / "navrhy" / (name + ".js")).read_bytes()).hexdigest()[:12]}" defer></script>' for name in ['02-rest', 'motion', 'polish'])
    # The small gallery loader downloads GLightbox only on hover, focus or click.
    gallery_version = hashlib.sha256((ROOT / 'navrhy/gallery.js').read_bytes()).hexdigest()[:12]
    footer += f'<script src="assets/js/navrh-gallery.js?v={gallery_version}" defer></script>\n'
    write(dest, 'includes/footer.php', footer)

    original_form = (original / 'includes/quote-form.php').read_text()
    hints = original_form[:original_form.index('?>') + 2]
    form = element(home, r'<form\b', 'form')
    form = re.sub(r'<form[^>]*>', '<form class="quote-form" action="send" method="post" enctype="multipart/form-data">', form, count=1)
    form = re.sub(r'\sselected\b', '', form)
    form = re.sub(r'<option value="([^"]*)"([^>]*)>', lambda m:
                  '<option value="' + m[1] + '"' + m[2] + ' <?= $defaultService === ' + "'" + m[1] + "'" + ' ? \'selected\' : \'\' ?>>', form)
    form = re.sub(r'(<p class="form-text" id="message-hint">).*?(</p>)', lambda m: m[1] + "<?= htmlspecialchars($messageHint, ENT_QUOTES, 'UTF-8') ?>" + m[2], form, flags=re.S)
    form = re.sub(r'<p class="form-text">Poptávku odešlete přes svůj e-mail\..*?</p>', '', form, flags=re.S)
    form = re.sub(r'<p class="form-text" data-email-status[^>]*>.*?</p>', '', form, flags=re.S)
    form = form.replace('Připravit e-mail', 'Odeslat poptávku')
    form = '\n'.join(line.rstrip() for line in form.split('\n'))
    hidden = '''
<input type="hidden" name="quote_form_token" value="<?= htmlspecialchars($_SESSION['quote_form_token'], ENT_QUOTES, 'UTF-8') ?>">
<input type="hidden" name="return_to" value="<?= htmlspecialchars(basename((string) ($_SERVER['SCRIPT_NAME'] ?? 'index.php')), ENT_QUOTES, 'UTF-8') ?>">
'''
    form = form.replace('<div class="form-honeypot"', hidden + '<div class="form-honeypot"', 1)
    form = '\n'.join(line.rstrip() for line in form.split('\n'))
    statuses = '''<?php
$messages = [
 'sent' => 'Poptávka byla úspěšně odeslána. Děkujeme, ozveme se vám.',
 'too-fast' => 'Počkejte prosím chvíli a zkuste formulář odeslat znovu.',
 'too-large' => 'Každá fotografie může mít nejvýše 4 MB, všechny dohromady 12 MB.',
 'too-many-files' => 'Můžete přiložit maximálně 5 fotografií.',
 'invalid-file' => 'Povoleny jsou pouze fotografie JPG, PNG a WebP.',
];
if ($formStatus !== ''): ?>
<p class="form-status <?= $formStatus === 'sent' ? 'form-status-success' : 'form-status-error' ?>" role="alert"><?= htmlspecialchars($messages[$formStatus] ?? 'Poptávku se nepodařilo odeslat. Zkontrolujte údaje a zkuste to znovu.', ENT_QUOTES, 'UTF-8') ?></p>
<?php endif; ?>
'''
    hint_script = element(home[home.index('</form>') + 7:], r'<script>', 'script')
    # Keep form labels and status messages out of Google snippets on legacy pages too.
    # data-nosnippet is supported on div, span and section; never on the form itself.
    write(dest, 'includes/quote-form.php', hints + '\n<div data-nosnippet>\n' + statuses + form + '\n</div>\n' + hint_script)
    write(dest, 'includes/navrh-init.php', '''<?php declare(strict_types=1);
if (session_status() !== PHP_SESSION_ACTIVE) {
    $isHttps = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
    session_set_cookie_params(['lifetime' => 0, 'path' => '/', 'secure' => $isHttps, 'httponly' => true, 'samesite' => 'Lax']);
    session_start();
}
require_once __DIR__ . '/quote-form-session.php';
// Pages containing session-bound CSRF tokens must never be shared by caches.
header('Cache-Control: no-store, max-age=0');
header('CDN-Cache-Control: no-store');
// Send the first view while optional CMS galleries are fetched.
header('X-Accel-Buffering: no');
// Compress in PHP so ob_flush sends a gzip sync point before waiting for CMS.
// The hosting proxy otherwise holds its compressed response until PHP finishes.
if (PHP_SAPI !== 'cli' && function_exists('ob_gzhandler') &&
    in_array(strtolower((string) ini_get('zlib.output_compression')), ['', '0', 'off'], true)) {
    $buffer = ob_get_status();
    if ($buffer && $buffer['name'] === 'default output handler' &&
        $buffer['buffer_used'] === 0 && ($buffer['flags'] & PHP_OUTPUT_HANDLER_REMOVABLE)) {
        ob_end_clean();
    }
    // Never replace a custom output handler or compress twice.
    if (ob_get_level() === 0) ob_start('ob_gzhandler');
}
require_once __DIR__ . '/navrh-cms.php';

function navrh_flush_first_view(): void {
    if (PHP_SAPI === 'cli') return;
    $buffer = ob_get_status();
    if ($buffer && ($buffer['flags'] & PHP_OUTPUT_HANDLER_FLUSHABLE)) ob_flush();
    flush();
}
''')

    pages = [('index', ROOT / 'index.html')] + [(p.parent.name, p) for p in sorted((ROOT / 'sluzby').glob('*/index.html'))] + [('galerie', ROOT / 'galerie/index.html')]
    common_styles = ['<script>\n' + '\n'.join((ROOT / 'navrhy' / name).read_text() for name in ['menu-init.js', 'lazy-images.js']) + '\n</script>']
    for weight in ['400', '600', '800']:
        common_styles.append(f'<link rel="preload" href="{performance["fonts"][weight]}" as="font" type="font/woff2" crossorigin>')
    common_styles.append('<?php if (!empty($isHome)): ?>\n'
                         f'<link rel="stylesheet" href="{performance["css"]["hosting_home"]}">\n'
                         '<?php else: ?>\n'
                         f'<link rel="stylesheet" href="{performance["css"]["hosting"]}">\n'
                         '<?php endif; ?>')
    write(dest, 'includes/navrh-styles.php', '\n'.join(common_styles) + '\n')
    for slug, source in pages:
        content = urls(source.read_text())
        content = re.sub(r'<script\b[^>]*src="[^"]+"[^>]*></script>', '', content)
        service = slug not in ('index', 'galerie')
        selected = re.search(r'<option value="([^"]+)"[^>]*\bselected', content)
        default = selected[1] if selected else ''
        title = plain(re.search(r'<title>(.*?)</title>', content, re.S)[1])
        desc = html.unescape(re.search(r'<meta name="description" content="([^"]*)"', content)[1])
        head = f'''<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>{html.escape(title)}</title><meta name="description" content="{html.escape(desc, quote=True)}">
<link rel="canonical" href="https://trimistri.cz/{'' if slug == 'index' else slug}">
<meta property="og:type" content="website"><meta property="og:site_name" content="Tři Mistři"><meta property="og:locale" content="cs_CZ">
<meta property="og:title" content="{html.escape(title, quote=True)}"><meta property="og:description" content="{html.escape(desc, quote=True)}">
<meta property="og:url" content="https://trimistri.cz/{'' if slug == 'index' else slug}"><meta property="og:image" content="https://trimistri.cz/assets/img/about.JPEG">
<meta name="twitter:card" content="summary_large_image"><link rel="icon" href="favicon.ico"><meta name="theme-color" content="#151719">
<?php require __DIR__ . '/includes/navrh-styles.php'; ?>
<?php require __DIR__ . '/includes/consent-head.php'; ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-18282958447"></script>
<script>gtag('js',new Date());gtag('config','AW-18282958447');</script>
'''
        if slug == 'index':
            # Copy the responsive preload from the source, preserving the PHP URL base.
            preload = re.findall(r'<link rel="preload" as="image"[^>]*>', content)
            if preload:
                # Discover the LCP image before styles and classic inline tracking scripts.
                styles_include = "<?php require __DIR__ . '/includes/navrh-styles.php'; ?>"
                head = head.replace(styles_include, '\n'.join(preload) + '\n' + styles_include, 1)
        faqs = []
        for faq in re.finditer(r'<details[^>]*><summary>.*?<span class="tm-faq-question">(.*?)</span>.*?</summary><div class="tm-faq-answer">(.*?)</div></details>', content, re.S):
            faqs.append({'@type': 'Question', 'name': plain(faq[1]), 'acceptedAnswer': {'@type': 'Answer', 'text': plain(faq[2])}})
        schema_php = '''<?php
$business = require __DIR__ . '/includes/business-data.php';
$schema = ['@context' => 'https://schema.org', '@graph' => [$business]];
'''
        if service:
            schema_php += "$schema['@graph'][] = ['@type' => 'Service', 'name' => " + json.dumps(title, ensure_ascii=False) + ", 'serviceType' => $defaultService, 'description' => " + json.dumps(desc, ensure_ascii=False) + ", 'provider' => $business, 'url' => 'https://trimistri.cz/' . $pageSlug];\n"
            schema_php += "$schema['@graph'][] = ['@type' => 'BreadcrumbList', 'itemListElement' => [['@type' => 'ListItem', 'position' => 1, 'name' => 'Domů', 'item' => 'https://trimistri.cz/'], ['@type' => 'ListItem', 'position' => 2, 'name' => 'Služby', 'item' => 'https://trimistri.cz/sluzby'], ['@type' => 'ListItem', 'position' => 3, 'name' => $defaultService, 'item' => 'https://trimistri.cz/' . $pageSlug]]];\n"
        if faqs:
            data = json.dumps({'@type': 'FAQPage', 'mainEntity': faqs}, ensure_ascii=False).replace("'", "\\'")
            schema_php += "$schema['@graph'][] = json_decode('" + data + "', true);\n"
        head += schema_php + '?>\n<script type="application/ld+json"><?= json_encode($schema, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>'
        content = re.sub(r'<head>.*?</head>', '<head>\n' + head + '\n</head>', content, count=1, flags=re.S)
        content = content.replace(element(content, r'<header class="tm-header"', 'header'), "<?php require __DIR__ . '/includes/header.php'; ?>")
        content = content.replace(element(content, r'<footer class="tm-footer"', 'footer'), "<?php require __DIR__ . '/includes/footer.php'; ?>")
        if '<form' in content:
            old_form = element(content, r'<form\b', 'form')
            tail = content[content.index(old_form) + len(old_form):]
            old_hint = element(tail, r'<script>', 'script')
            content = content.replace(old_form, "<?php require __DIR__ . '/includes/quote-form.php'; ?>").replace(old_hint, '')
        if service and 'id="ukazky"' in content:
            gallery = element(content, r'<section[^>]*id="ukazky"', 'section')
            gallery = gallery.replace('<div class="tm-detail-section-heading">', '<span class="tm-anchor" id="galerie"></span><span class="tm-anchor" id="web-realizace"></span><div class="tm-detail-section-heading">', 1)
            original_gallery = element(content, r'<section[^>]*id="ukazky"', 'section')
            content = content.replace(original_gallery, '<?php if (!navrh_cms_gallery($pageSlug)): ?>\n' + gallery + '\n<?php endif; ?>')
        elif service:
            # Services without legacy pictures must still show future CMS publications.
            content = content.replace('<section class="tm-contact', '<?php navrh_cms_gallery($pageSlug); ?>\n<section class="tm-contact', 1)
        elif slug == 'galerie':
            gallery = element(content, r'<section class="tm-container tm-archive"', 'section')
            content = content.replace(gallery, '<?php if (!navrh_cms_gallery(null)): ?>\n' + gallery + '\n<?php endif; ?>')
        elif slug == 'index':
            categories = element(content, r'<div class="tm-category-grid"', 'div')
            content = content.replace(categories, categories + '\n<?php navrh_cms_featured(); ?>', 1)
            for old_id, new_id in [('hero', 'top'), ('galerie', 'realizace'), ('co-umime', 'sluzby'), ('specialni-sluzby', 'sluzby')]:
                if f'id="{old_id}"' not in content:
                    content = re.sub(r'(<section\b[^>]*\bid="' + new_id + r'"[^>]*>)', r'\1<span class="tm-anchor" id="' + old_id + '"></span>', content, count=1)
            if 'id="o-nas"' not in content:
                content = re.sub(r'(<section\b[^>]*\bid="postup"[^>]*>)', r'\1<span class="tm-anchor" id="o-nas"></span>', content, count=1)
        if slug == 'index' or service:
            first_view = element(content, r'<section class="hero-scene"' if slug == 'index' else r'<section class="tm-detail-hero', 'section')
            content = content.replace(first_view, first_view + '\n<?php navrh_flush_first_view(); ?>', 1)
        prelude = '<?php declare(strict_types=1);\nrequire __DIR__ . \'/includes/navrh-init.php\';\n'
        prelude += f"$pageSlug = '{slug}';\n$isHome = {'true' if slug == 'index' else 'false'};\n$isService = {'true' if service else 'false'};\n$hasQuote = {'true' if slug != 'galerie' else 'false'};\n$defaultService = '{default}';\n?>\n"
        write(dest, f'{slug}.php', prelude + content)

    # The old service catalog keeps its grouped PHP data and uses the current design.
    catalog = (original / 'sluzby.php').read_text()
    catalog = catalog.replace("require __DIR__ . '/includes/quote-form-session.php';", "require __DIR__ . '/includes/navrh-init.php';\n$pageSlug = 'sluzby'; $isService = true; $hasQuote = true;")
    catalog = catalog.replace('</head>', "<?php require __DIR__ . '/includes/navrh-styles.php'; ?>\n</head>")
    catalog = re.sub(r'<link[^>]*href="https://fonts\.googleapis\.com/[^>]*>\s*', '', catalog)
    catalog = catalog.replace('<body>', '<body class="night-gallery tm-legacy">')
    catalog = catalog.replace('<main>', '<a class="tm-skip" href="#obsah">Přeskočit na obsah</a><main id="obsah">')
    contact = element((dest / 'index.php').read_text(), r'<section[^>]*id="kontakt"', 'section')
    catalog = catalog.replace("<?php require __DIR__ . '/includes/quote-form.php'; ?>", contact)
    write(dest, 'sluzby.php', catalog)
    # Keep privacy content, thank-you/session conversion and error response logic.
    for filename in ['ochrana-osobnich-udaju.php', 'dekujeme.php', '404.php']:
        content = (original / filename).read_text()
        if filename == '404.php':
            content = content.replace('<head>', '<head>\n<base href="/">', 1)
        content = content.replace('</head>', "<?php require __DIR__ . '/includes/navrh-styles.php'; ?>\n</head>")
        content = re.sub(r'<link[^>]*href="https://fonts\.googleapis\.com/[^>]*>\s*', '', content)
        content = content.replace('<body>', '<body class="night-gallery tm-legacy">')
        content = re.sub(r'<main>', '<a class="tm-skip" href="#obsah">Přeskočit na obsah</a><main id="obsah">', content)
        write(dest, filename, content)

    # Original root-level URLs and redirects; send must preserve POST bodies.
    htaccess = (original / '.htaccess').read_text()
    htaccess = htaccess.replace('RewriteEngine On', 'DirectoryIndex index.php\nRewriteEngine On', 1)
    htaccess = htaccess.replace('RewriteCond %{THE_REQUEST} \\s/([^.\\s]+)\\.php', 'RewriteCond %{REQUEST_METHOD} ^(?:GET|HEAD)$\nRewriteCond %{THE_REQUEST} \\s/([^.\\s]+)\\.php')
    htaccess += '''
# Fingerprinted performance assets: safe to cache for a year, new content = new URL.
<IfModule mod_mime.c>
  AddType image/avif .avif
  AddType font/woff2 .woff2
</IfModule>
<IfModule mod_headers.c>
  <FilesMatch "^(?:site(?:-service|-hosting|-home|-hosting-home)?\\.[a-f0-9]{12}\\.css|inter-[0-9]{3}\\.[a-f0-9]{12}\\.woff2|(?:homepage-hero(?:-mobile)?|process-kitchen)-[0-9]+\\.[a-f0-9]{12}\\.(?:avif|webp))$">
    Header set Cache-Control "public, max-age=31536000, immutable"
  </FilesMatch>
</IfModule>
'''
    write(dest, '.htaccess', htaccess)
    write(dest, '.user.ini', 'upload_max_filesize=4M\npost_max_size=16M\n')
    sitemap = (original / 'sitemap.xml').read_text()
    sitemap = re.sub(r'<lastmod>[^<]*</lastmod>', '<lastmod>2026-10-12</lastmod>', sitemap)
    if 'https://trimistri.cz/galerie' not in sitemap:
        sitemap = sitemap.replace('</urlset>', '<url><loc>https://trimistri.cz/galerie</loc><lastmod>2026-10-12</lastmod></url>\n</urlset>')
    write(dest, 'sitemap.xml', sitemap)
    after = {str(p.relative_to(original)): hashlib.sha256(p.read_bytes()).hexdigest()
             for p in original.rglob('*') if p.is_file()}
    if source_files != after:
        raise RuntimeError('Original files changed during export')
    missing = [p for p in source_files if not (dest / p).is_file()]
    if missing:
        raise RuntimeError(f'Missing original paths: {missing}')
    write(dest.parent, 'original-paths.json', json.dumps(source_files, indent=2) + '\n')
    print(json.dumps({'original_files': len(source_files), 'missing_paths': missing, 'pages': len(pages), 'original_unchanged': True, 'destination': str(dest)}, indent=2))


if __name__ == '__main__':
    main()
