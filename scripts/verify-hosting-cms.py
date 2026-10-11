#!/usr/bin/env python3
"""Exercise the production CMS renderer using an isolated, offline PHP feed fixture."""
from pathlib import Path
import argparse
import json
import subprocess
import tempfile

ROOT = Path(__file__).resolve().parents[1]


def main():
    ap = argparse.ArgumentParser()
    ap.add_argument('--report', type=Path)
    args = ap.parse_args()
    includes = ROOT / 'hosting/web/includes'
    bridge = (includes / 'cms-gallery.php').read_text()
    # Replace only the network boundary. Keep the real feed validator, escaping,
    # photo mapping, legacy gallery data, configuration and renderer.
    start = bridge.index('function cms_feed(')
    body_start = bridge.index('{', start)
    depth = 0
    for end in range(body_start, len(bridge)):
        if bridge[end] == '{':
            depth += 1
        elif bridge[end] == '}':
            depth -= 1
            if not depth:
                break
    stub = "function cms_feed(?string $service = null, bool $featured = false, int $page = 0, ?string $realization = null, array $firstServices = []): ?array { return $GLOBALS['fixtureFeed']; }"
    bridge = bridge[:start] + stub + bridge[end + 1:]
    renderer = (includes / 'navrh-cms.php').read_text()
    renderer = renderer.split("require_once __DIR__ . '/cms-gallery.php';", 1)[1]
    source = (bridge + '\n' + renderer).replace('__DIR__', "'" + str(includes) + "'")
    source += r'''
$checks = 0;
function verify(bool $ok, string $label): void {
    $GLOBALS['checks']++;
    if (!$ok) throw new RuntimeException($label);
}
function render(?string $service): array {
    ob_start(); $result = navrh_cms_gallery($service); $html = ob_get_clean();
    return [$result, $html];
}
putenv('TRIMISTRI_CMS_LEGACY_IMPORTED=0');
$GLOBALS['fixtureFeed'] = ['items' => [], 'has_more' => false];
[$result, $html] = render('dekoracni-sterky');
verify(!$result && $html === '', 'empty CMS keeps legacy proposal');
$GLOBALS['fixtureFeed'] = null;
[$result, $html] = render('dekoracni-sterky');
verify(!$result && $html === '', 'unavailable CMS keeps legacy proposal');
$row = ['id' => '11111111-1111-4111-8111-111111111111', 'service' => 'mikrocement',
    'title' => '<script>alert(1)</script>', 'locality' => 'Brno', 'description' => '',
    'featured' => true, 'photos' => [['id' => '22222222-2222-4222-8222-222222222222',
      'alt' => '<img src=x onerror=alert(1)>', 'tag' => 'after']]];
verify(cms_validate_feed(['items' => [$row], 'has_more' => false]) !== null, 'valid CMS feed');
$invalid = $row; $invalid['photos'][0]['id'] = '../private';
verify(cms_validate_feed(['items' => [$invalid], 'has_more' => false]) === null, 'invalid photo ID rejected');
$invalid = $row; $invalid['service'] = 'unlisted';
verify(cms_validate_feed(['items' => [$invalid], 'has_more' => false]) === null, 'invalid service rejected');
$GLOBALS['fixtureFeed'] = ['items' => [$row], 'has_more' => true];
[$result, $html] = render('mikrocement');
verify($result && substr_count($html, 'class="tm-project-card"') === 1, 'new CMS service pictures');
verify(str_contains($html, '?realizace_page=1'), 'CMS pagination');
verify(!str_contains($html, '<script>') && !str_contains($html, '<img src=x'), 'CMS text escaped');
verify(str_contains($html, '&amp;lt;img'), 'lightbox title remains escaped after attribute decoding');
$row['service'] = 'dekoracni-sterky';
$GLOBALS['fixtureFeed'] = ['items' => [$row], 'has_more' => false];
[$result, $html] = render('dekoracni-sterky');
verify($result && substr_count($html, 'class="tm-project-card"') === 14, 'CMS plus 13 legacy projects');
verify(substr_count($html, 'class="tm-detail-more"') === 1, 'gallery expansion');
ob_start(); navrh_cms_featured(); $home = ob_get_clean();
verify(substr_count($home, 'class="tm-project-card"') === 1, 'homepage feed deduplicated');
verify(str_contains($home, './dekoracni-sterky?realizace='), 'homepage original service route');
putenv('TRIMISTRI_CMS_LEGACY_IMPORTED=1');
[$result, $html] = render('dekoracni-sterky');
verify($result && substr_count($html, 'class="tm-project-card"') === 1, 'imported CMS avoids legacy duplicates');
$GLOBALS['fixtureFeed'] = ['items' => [], 'has_more' => false];
$_GET['realizace'] = $row['id'];
[$result, $html] = render('dekoracni-sterky');
verify($result && str_contains($html, 'již není zveřejněná') && !str_contains($html, 'class="tm-project-card"'), 'withdrawn publication stays withdrawn');
unset($_GET['realizace']);
[$result, $html] = render(null);
verify($result && !str_contains($html, 'class="tm-project-card"'), 'empty imported gallery avoids stale snapshot');
echo json_encode(['passed' => true, 'checks' => $checks, 'network' => 'offline fixture'], JSON_PRETTY_PRINT);
'''
    with tempfile.TemporaryDirectory(prefix='trimistri-cms-') as temporary:
        fixture = Path(temporary) / 'fixture.php'
        fixture.write_text(source)
        result = subprocess.run(['rtk', 'proxy', 'php', str(fixture)], capture_output=True, text=True)
    if result.returncode:
        raise RuntimeError(result.stdout + result.stderr)
    report = json.loads(result.stdout)
    if args.report:
        args.report.write_text(json.dumps(report, indent=2) + '\n')
    print(json.dumps(report, indent=2))


if __name__ == '__main__':
    main()
