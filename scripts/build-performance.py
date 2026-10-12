#!/usr/bin/env python3
"""Build smaller assets without changing the approved layout or original photos.

Install requirements-performance.txt and npm ci first. Run before build-hosting.py.
Hashed filenames allow long-lived caches without stale styles, fonts or artwork.
"""
from pathlib import Path
from fontTools import subset
from fontTools.ttLib import TTFont
from PIL import Image, ImageOps
import hashlib
import html
import json
import re
import subprocess

ROOT = Path(__file__).resolve().parents[1]
PREFIX = '/trimistri-navrh/'
STYLES = ['base.css', '02.css', '02-rest.css', '02-service-layout.css', 'polish.css']
MOBILE_HERO_MEDIA = '(max-width: 600px) and (min-height: 700px) and (max-aspect-ratio: 11/20)'
BOOTSTRAP = '<script>\n' + '\n'.join((ROOT / 'navrhy' / name).read_text() for name in ['menu-init.js', 'lazy-images.js']) + '\n</script>'


def fingerprint(data):
    return hashlib.sha256(data).hexdigest()[:12]


def fonts():
    # Czech and common Latin load immediately; rarer European Latin loads only if used.
    # Both subsets come from the same originals and retain the original glyph outlines.
    original_ranges = [(0, 0x24f), (0x1e00, 0x1eff), (0x2000, 0x206f),
                       (0x20a0, 0x20cf), (0x2100, 0x214f), (0x2190, 0x21ff)]
    original_codes = {code for first, last in original_ranges for code in range(first, last + 1)}
    primary_codes = set(range(0x100)) | set(range(0x2000, 0x2070)) | set(range(0x2190, 0x219a))
    primary_codes.update(map(ord, 'ČčĎďĚěĹĺĽľŇňŔŕŘřŠšŤťŮůŽž€™'))
    primary_codes &= original_codes

    def css_ranges(codes):
        runs = []
        for code in sorted(codes):
            if runs and code == runs[-1][1] + 1:
                runs[-1][1] = code
            else:
                runs.append([code, code])
        return ','.join(f'U+{a:04X}' + (f'-{b:04X}' if a != b else '') for a, b in runs)

    groups = {'primary': primary_codes, 'extended': original_codes - primary_codes}
    rules, files, extended_files, sizes = [], {}, {}, []
    directory = ROOT / 'assets/vendor/elaris-preview'
    for index, weight in enumerate([400, 500, 600, 700, 800]):
        original = directory / f'inter-{index}.ttf'
        row = {'weight': weight, 'before': original.stat().st_size}
        for group, unicodes in groups.items():
            css_range = css_ranges(unicodes)
            font = TTFont(original, recalcTimestamp=False)
            options = subset.Options()
            options.recalc_timestamp = False
            subsetter = subset.Subsetter(options=options)
            subsetter.populate(unicodes=unicodes)
            subsetter.subset(font)
            font.flavor = 'woff2'
            temporary = directory / f'.inter-{weight}.woff2'
            font.save(temporary)
            font.close()
            data = temporary.read_bytes()
            temporary.unlink()
            name = f'inter-{weight}.{fingerprint(data)}.woff2'
            (directory / name).write_bytes(data)
            target = files if group == 'primary' else extended_files
            target[str(weight)] = f'assets/vendor/elaris-preview/{name}'
            rules.append(f"@font-face{{font-family:Inter;font-style:normal;font-weight:{weight};"
                         f"font-display:swap;src:url('{PREFIX}{target[str(weight)]}') format('woff2');"
                         f"unicode-range:{css_range}}}")
            row['after' if group == 'primary' else 'extended'] = len(data)
        sizes.append(row)
    (directory / 'inter.css').write_text('\n'.join(rules) + '\n')
    return files, extended_files, sizes


def image_variants(source, stem, widths, formats, crop_width=None):
    image = ImageOps.exif_transpose(Image.open(ROOT / source)).convert('RGB')
    if crop_width:
        # Keep the exact 58% horizontal focus used by object-position on tall phones.
        left = round((image.width - crop_width) * .58)
        image = image.crop((left, 0, left + crop_width, image.height))
    files = {format: [] for format in formats}
    for width in widths:
        width = min(width, image.width)
        resized = image.resize((width, round(image.height * width / image.width)), Image.Resampling.LANCZOS)
        for format in formats:
            temporary = ROOT / f'assets/img/hero/.{stem}-{width}.{format}'
            options = {'quality': 55, 'speed': 6} if format == 'avif' else {'quality': 80, 'method': 6}
            resized.save(temporary, **options)
            data = temporary.read_bytes()
            temporary.unlink()
            name = f'assets/img/hero/{stem}-{width}.{fingerprint(data)}.{format}'
            (ROOT / name).write_bytes(data)
            files[format].append({'path': name, 'width': width, 'height': resized.height, 'bytes': len(data)})
    return files


def srcset(variants):
    return ', '.join(f'{PREFIX}{item["path"]} {item["width"]}w' for item in variants)


def homepage_classes():
    # Include every state and class produced by scripts, forms and live CMS cards.
    # Filter only the homepage; other pages keep their complete shared cascade.
    markup = (ROOT / 'index.html').read_text()
    classes = set()
    for attribute in re.findall(r'\bclass="([^"]*)"', markup):
        classes.update(attribute.split())
    dynamic_sources = [*sorted((ROOT / 'navrhy').glob('*.js')),
                       ROOT / 'scripts/hosting-cms.php',
                       *(ROOT / 'hosting/web/includes' / name for name in
                         ['header.php', 'footer.php', 'quote-form.php', 'navrh-cms.php', 'cms-gallery.php'])]
    for path in dynamic_sources:
        classes.update(re.findall(r'(?<![\w-])[a-zA-Z][\w-]*', path.read_text()))
    classes.update(re.findall(r'\.([a-zA-Z][\w-]*)', (ROOT / 'scripts/hosting.css').read_text()))
    return sorted(classes)


def styles(font_css, service=False, hosting=False, homepage=False):
    names = STYLES + (['service-content.css'] if service or hosting else [])
    source = font_css + '\n' + '\n'.join((ROOT / 'navrhy' / name).read_text() for name in names)
    # The font declarations are already included; avoid an extra @import dependency.
    source = re.sub(r'@import\s+url\([^)]*inter\.css[^)]*\);?', '', source)
    if hosting:
        source += '\n' + (ROOT / 'scripts/hosting.css').read_text()
    # Both static and PHP bundles live in assets/css; URLs stay relative to the bundle.
    source = source.replace(PREFIX + 'assets/', '../')
    args = ['node', str(ROOT / 'scripts/minify-css.mjs')]
    if homepage:
        args.append(json.dumps({'classes': homepage_classes()}))
    result = subprocess.run(args, input=source,
                            text=True, capture_output=True, check=True)
    data = result.stdout.encode()
    suffix = '-hosting-home' if hosting and homepage else '-home' if homepage else '-hosting' if hosting else '-service' if service else ''
    name = f'assets/css/site{suffix}.{fingerprint(data)}.css'
    (ROOT / name).parent.mkdir(parents=True, exist_ok=True)
    (ROOT / name).write_bytes(data)
    return name, {'source': len(source.encode()), 'minified': len(data)}


def head(css, font_files, hero=None, mobile_hero=None):
    tags = [BOOTSTRAP]
    # The body, primary heading and brand are visible immediately on every page.
    for weight in ['400', '600', '800']:
        tags.append(f'<link rel="preload" href="{PREFIX}{font_files[weight]}" as="font" type="font/woff2" crossorigin>')
    if hero:
        tags.insert(1, f'<link rel="preload" as="image" type="image/avif" media="not all and {MOBILE_HERO_MEDIA}" href="{PREFIX}{hero["avif"][-1]["path"]}" '
                    f'imagesrcset="{srcset(hero["avif"])}" imagesizes="(max-width: 700px) 133.33svh, 100vw" fetchpriority="high">')
        tags.insert(1, f'<link rel="preload" as="image" type="image/avif" media="{MOBILE_HERO_MEDIA}" '
                    f'href="{PREFIX}{mobile_hero["avif"][0]["path"]}" fetchpriority="high">')
    tags.append(f'<link rel="stylesheet" href="{PREFIX}{css}">')
    return '<!-- performance:start -->\n' + '\n'.join(tags) + '\n<!-- performance:end -->'


def dimensions(match):
    tag = match[0]
    url = re.search(r'\bsrc="([^"]+)"', tag)
    if not url or not url[1].startswith(PREFIX + 'assets/'):
        return tag
    path = ROOT / html.unescape(url[1][len(PREFIX):])
    with Image.open(path) as image:
        width, height = image.size
    tag = re.sub(r'\s(?:width|height|decoding|fetchpriority)="[^"]*"', '', tag)
    extra = f' width="{width}" height="{height}" decoding="async"'
    extra += ' fetchpriority="high"' if 'class="hero-image"' in tag or 'fetchpriority="high"' in match[0] else ' fetchpriority="low"'
    return tag[:-1] + extra + '>'


def defer_photo(match):
    original = match[0]
    if 'loading="lazy"' not in original or '/gallery/thumbs/' not in original:
        return original
    placeholder = re.sub(r'\bsrc="', 'data-src="', original, count=1)
    placeholder = re.sub(r'\bsrcset="', 'data-srcset="', placeholder, count=1)
    placeholder = placeholder[:-1] + ' src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E">'
    return placeholder + '<noscript>' + original + '</noscript>'


def main():
    font_files, extended_fonts, font_sizes = fonts()
    hero = image_variants('assets/img/hero/homepage-hero-original-1920w.webp', 'homepage-hero',
                          [1024, 1440, 1920], ['avif', 'webp'])
    mobile_hero = image_variants('assets/img/hero/homepage-hero-original-1920w.webp', 'homepage-hero-mobile',
                                [900], ['avif', 'webp'], crop_width=900)
    process = image_variants('assets/img/gallery/bohunice25.jpeg', 'process-kitchen', [640, 1280], ['webp'])
    font_css = (ROOT / 'assets/vendor/elaris-preview/inter.css').read_text()
    common_css, common_sizes = styles(font_css)
    service_css, service_sizes = styles(font_css, service=True)
    hosting_css, hosting_sizes = styles(font_css, hosting=True)
    home_css, home_sizes = styles(font_css, homepage=True)
    hosting_home_css, hosting_home_sizes = styles(font_css, hosting=True, homepage=True)
    pages = [ROOT / 'index.html', ROOT / 'galerie/index.html', *sorted((ROOT / 'sluzby').glob('*/index.html'))]
    for page in pages:
        source = page.read_text()
        source = re.sub(r'<img\b[^>]*data-src="[^>]*><noscript>(<img\b[^>]*>)</noscript>',
                        lambda match: match[1], source)
        source = re.sub(r'<!-- performance:start -->.*?<!-- performance:end -->', '', source, flags=re.S)
        source = source.replace(BOOTSTRAP, '')
        source = re.sub(r'<link\b[^>]*rel="stylesheet"[^>]*>\s*', '', source)
        is_home = page == ROOT / 'index.html'
        css = home_css if is_home else service_css if page.parent.parent.name == 'sluzby' else common_css
        source = source.replace('</head>', head(css, font_files, hero if is_home else None,
                                               mobile_hero if is_home else None) + '\n</head>')
        if is_home:
            picture = (f'<picture><source media="{MOBILE_HERO_MEDIA}" type="image/avif" '
                       f'srcset="{PREFIX}{mobile_hero["avif"][0]["path"]}">'
                       f'<source media="{MOBILE_HERO_MEDIA}" type="image/webp" '
                       f'srcset="{PREFIX}{mobile_hero["webp"][0]["path"]}">'
                       f'<source type="image/avif" srcset="{srcset(hero["avif"])}" '
                       'sizes="(max-width: 700px) 133.33svh, 100vw">'
                       f'<img class="hero-image" src="{PREFIX}{hero["webp"][-1]["path"]}" '
                       f'srcset="{srcset(hero["webp"])}" sizes="(max-width: 700px) 133.33svh, 100vw" '
                       'alt="Hotový interiér po povrchových úpravách" fetchpriority="high"></picture>')
            source = re.sub(r'<picture>(?:<source[^>]*>\s*)+<img class="hero-image"[^>]*></picture>|<img class="hero-image"[^>]*>',
                            lambda _: picture, source, count=1)
            source = re.sub(r'<img\b[^>]*alt="Dokončená výmalba kuchyně — Brno, Bohunice"[^>]*>',
                            lambda _: f'<img src="{PREFIX}{process["webp"][-1]["path"]}" '
                            f'srcset="{srcset(process["webp"])}" sizes="(max-width: 700px) 100vw, 50vw" '
                            'alt="Dokončená výmalba kuchyně — Brno, Bohunice" loading="lazy">', source)
        source = re.sub(r'<img\b[^>]*>', dimensions, source)
        source = re.sub(r'<img\b[^>]*>', defer_photo, source)
        source = re.sub(r'<script[^>]*src="[^"]*glightbox\.min\.js"[^>]*></script>', '', source)
        source = re.sub(r'(?P<url>/trimistri-navrh/navrhy/(?P<name>[^"?]+\.js))(?:\?[^" ]*)?',
                        lambda match: match['url'] + '?v=' + fingerprint((ROOT / 'navrhy' / match['name']).read_bytes()), source)
        source = re.sub(r'\n[ \t]*\n(?=\s*<meta|\s*</head>)', '\n', source)
        source = re.sub(r'(?m)^[ \t]+$', '', source)
        source = re.sub(r'\n{2,}(?=<!-- performance:start -->)', '\n', source)
        page.write_text(source)
    manifest = {'fonts': font_files, 'extended_fonts': extended_fonts, 'font_sizes': font_sizes, 'hero': hero, 'mobile_hero': mobile_hero, 'process': process,
                'css': {'common': common_css, 'service': service_css, 'hosting': hosting_css,
                        'home': home_css, 'hosting_home': hosting_home_css},
                'css_sizes': {'common': common_sizes, 'service': service_sizes, 'hosting': hosting_sizes,
                              'home': home_sizes, 'hosting_home': hosting_home_sizes}}
    (ROOT / 'assets/performance-manifest.json').write_text(json.dumps(manifest, indent=2) + '\n')
    print(json.dumps({'pages': len(pages), 'font_bytes_before': sum(x['before'] for x in font_sizes),
                      'font_bytes_after': sum(x['after'] for x in font_sizes), 'css': manifest['css_sizes'],
                      'hero_avif_bytes': hero['avif'][-1]['bytes']}, indent=2))


if __name__ == '__main__':
    main()
