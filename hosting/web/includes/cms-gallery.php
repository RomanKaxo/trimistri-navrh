<?php declare(strict_types=1);

/** Server-side bridge. No secret Supabase keys belong on the public PHP site. */
function cms_base_url(): string {
    static $base = null;
    if ($base !== null) return $base;
    $value = getenv('TRIMISTRI_CMS_URL') ?: '';
    $config = __DIR__ . '/cms-config.php';
    if ($value === '' && is_file($config)) {
        $settings = require $config;
        $value = is_array($settings) ? ($settings['app_url'] ?? '') : '';
    }
    $parts = is_string($value) ? parse_url($value) : false;
    $local = $parts && in_array($parts['host'] ?? '', ['localhost', '127.0.0.1'], true);
    if (!$parts || !isset($parts['host']) || isset($parts['user']) || isset($parts['pass']) || isset($parts['query']) || isset($parts['fragment'])
        || !in_array($parts['path'] ?? '', ['', '/'], true)
        || (($parts['scheme'] ?? '') !== 'https' && !(($parts['scheme'] ?? '') === 'http' && $local))) return $base = '';
    return $base = rtrim($value, '/');
}
function cms_legacy_import_complete(): bool {
    if (getenv('TRIMISTRI_CMS_LEGACY_IMPORTED') === '1') return true;
    $config = __DIR__ . '/cms-config.php';
    if (!is_file($config)) return false;
    $settings = require $config;
    return is_array($settings) && ($settings['legacy_import_complete'] ?? false) === true;
}
function cms_escape(string $text): string { return htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
function cms_uuid($value): bool { return is_string($value) && preg_match('/^[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}$/D', $value) === 1; }
function cms_services(): array {
    static $slugs = null;
    if ($slugs !== null) return $slugs;
    $slugs = [];
    foreach (require __DIR__ . '/service-groups-data.php' as $group) {
        foreach ($group['services'] as $service) $slugs[] = $service['slug'];
    }
    return $slugs;
}
function cms_no_cache(): void {
    if (cms_base_url() !== '' && !headers_sent()) {
        header('Cache-Control: no-store, max-age=0');
        header('CDN-Cache-Control: no-store');
    }
}
function cms_image_url(string $id, bool $thumb = true): string {
    return cms_base_url() . '/api/public/web-image?id=' . rawurlencode($id) . ($thumb ? '&size=thumb' : '');
}
function cms_photo_tags(): array { return ['before' => 'Před', 'during' => 'Průběh', 'after' => 'Po', 'detail' => 'Detail']; }
function cms_photo_locality(array $photo, string $galleryLocality): string { return trim($photo['locality'] ?? '') ?: $galleryLocality; }
function cms_photo_badge(array $photo): void {
    $label = cms_photo_tags()[$photo['tag'] ?? ''] ?? '';
    if ($label === '') return;
    $color = ($photo['tag'] ?? '') === 'after' ? 'bg-success' : 'bg-dark';
    echo '<span class="badge ' . $color . ' position-absolute top-0 start-0 m-2">' . cms_escape($label) . '</span>';
}
function cms_photo_caption(array $photo, string $galleryLocality): void {
    $location = cms_photo_locality($photo, $galleryLocality);
    $parts = array_filter([$photo['alt'], $location], static fn(string $part): bool => $part !== '');
    if ($parts) echo '<figcaption class="small p-2 text-muted">' . cms_escape(implode(' · ', $parts)) . '</figcaption>';
}
function cms_validate_feed($body): ?array {
    if (!is_array($body) || !isset($body['items'], $body['has_more']) || !is_array($body['items']) || !is_bool($body['has_more']) || count($body['items']) > 12) return null;
    foreach ($body['items'] as $item) {
        if (!is_array($item) || !cms_uuid($item['id'] ?? null) || !in_array($item['service'] ?? null, cms_services(), true)
            || !is_string($item['title'] ?? null) || !is_string($item['locality'] ?? null) || !is_string($item['description'] ?? null)
            || !is_bool($item['featured'] ?? null) || !is_array($item['photos'] ?? null) || !count($item['photos']) || count($item['photos']) > 30) return null;
        foreach ($item['photos'] as $photo) {
            if (!is_array($photo) || !cms_uuid($photo['id'] ?? null) || !is_string($photo['alt'] ?? null)) return null;
            if (array_key_exists('locality', $photo) && !is_string($photo['locality'])) return null;
            if (array_key_exists('tag', $photo) && (!is_string($photo['tag']) || !in_array($photo['tag'], array_merge([''], array_keys(cms_photo_tags())), true))) return null;
        }
    }
    return $body;
}
function cms_feed(?string $service = null, bool $featured = false, int $page = 0, ?string $realization = null, array $firstServices = []): ?array {
    if (cms_base_url() === '') return ['items' => [], 'has_more' => false];
    if (!function_exists('curl_init')) return null;
    if ($service !== null && !in_array($service, cms_services(), true)) return null;
    $query = ['page' => max(0, min(10000, $page))];
    if ($firstServices) {
        if (count($firstServices) > 12 || array_diff($firstServices, cms_services())) return null;
        $query['first_services'] = implode(',', $firstServices);
    }
    if ($service !== null) $query['service'] = $service;
    if ($featured) $query['featured'] = '1';
    if ($realization !== null) {
        if (!cms_uuid($realization)) return null;
        $query['realization'] = $realization;
    }
    $curl = curl_init(cms_base_url() . '/api/public/realizations?' . http_build_query($query));
    if ($curl === false) return null;
    $response = '';
    curl_setopt_array($curl, [
        CURLOPT_FOLLOWLOCATION => false, CURLOPT_CONNECTTIMEOUT_MS => 1500, CURLOPT_TIMEOUT_MS => 4000,
        CURLOPT_HTTPHEADER => ['Accept: application/json', 'Cache-Control: no-cache'],
        CURLOPT_SSL_VERIFYPEER => true, CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_WRITEFUNCTION => static function ($handle, string $chunk) use (&$response): int {
            if (strlen($response) + strlen($chunk) > 512000) return 0;
            $response .= $chunk;
            return strlen($chunk);
        },
    ]);
    // A cold app instance or a brief network failure must not immediately hide CMS galleries.
    // Two bounded attempts, without caching snapshots that an editor may have withdrawn.
    $ok = false;
    $status = 0;
    $error = 0;
    for ($attempt = 0; $attempt < 2; $attempt++) {
        $response = '';
        $ok = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $error = curl_errno($curl);
        if ($ok !== false && $status === 200) break;
        $transient = in_array($error, [CURLE_COULDNT_RESOLVE_HOST, CURLE_COULDNT_CONNECT,
            CURLE_OPERATION_TIMEDOUT, CURLE_GOT_NOTHING, CURLE_SEND_ERROR, CURLE_RECV_ERROR], true)
            || ($error === 0 && in_array($status, [408, 500, 502, 503, 504], true));
        if (!$transient) break;
    }
    curl_close($curl);
    // The PHP site may publish a new service before the app deploys its enum.
    // Retry only the known incompatible service, preserving all other filters.
    if ($ok !== false && $status === 400 && $service === 'epoxidove-podlahy') {
        return ['items' => [], 'has_more' => false];
    }
    if ($ok !== false && $status === 400 && in_array('epoxidove-podlahy', $firstServices, true)) {
        $supportedServices = array_values(array_diff($firstServices, ['epoxidove-podlahy']));
        return $supportedServices ? cms_feed($service, $featured, $page, $realization, $supportedServices)
            : ['items' => [], 'has_more' => false];
    }
    if ($ok === false || $status !== 200) {
        error_log(sprintf('Trimistri CMS feed unavailable (curl=%d, http=%d).', $error, $status));
        return null;
    }
    return cms_validate_feed(json_decode($response, true));
}
function cms_home_items(array $original): array {
    // Services already represented by static homepage cards keep their existing selection.
    $missingServices = array_values(array_diff(cms_services(), array_column($original, 0)));
    $automatic = $missingServices ? cms_feed(null, false, 0, null, $missingServices) : ['items' => []];
    $feed = cms_feed(null, true);
    $GLOBALS['cms_home_unavailable'] = $feed === null || $automatic === null;
    $items = [];
    $seen = [];
    foreach (array_merge($automatic['items'] ?? [], $feed['items'] ?? []) as $row) {
        if (isset($seen[$row['id']])) continue;
        $seen[$row['id']] = true;
        $cover = $row['photos'][0];
        $items[] = [$row['service'] . '?realizace=' . $row['id'] . '#realizace-' . $row['id'], $row['title'], cms_photo_locality($cover, $row['locality']), '', $cover['alt'] ?: $row['title'], $cover['id']];
    }
    return array_slice(array_merge($items, $original), 0, count($original));
}

/** One card template for existing photographs and live CMS publications. */
function cms_gallery_photo(array $photo, array $row): array {
    $remote = isset($photo['id']);
    $tag = $remote ? (cms_photo_tags()[$photo['tag'] ?? ''] ?? '') : ($photo['tag'] ?? '');
    $locality = cms_photo_locality($photo, $row['locality']);
    $caption = implode(' · ', array_filter([$photo['caption'] ?? $photo['alt'], $locality]));
    return [
        'src' => $remote ? cms_image_url($photo['id'], false) : $photo['src'],
        'thumb' => $remote ? cms_image_url($photo['id']) : $photo['thumb'],
        'srcset' => $photo['srcset'] ?? '',
        'alt' => $photo['alt'] ?: $row['title'],
        'caption' => $caption, 'tag' => $tag, 'locality' => $locality,
    ];
}
function cms_render_gallery_card(array $row): void {
    $photos = array_map(static fn(array $photo): array => cms_gallery_photo($photo, $row), $row['photos']);
    $cover = $photos[0];
    $count = count($photos);
    $photoCount = $count . ($count === 1 ? ' fotografie' : ($count < 5 ? ' fotografie' : ' fotografií'));
    $tags = array_column($photos, 'tag');
    $hasBefore = count(array_filter($tags, static fn(string $tag): bool => str_starts_with($tag, 'Před'))) > 0;
    $hasAfter = in_array('Po', $tags, true);
    $badge = $hasBefore && $hasAfter ? 'Před / Po' : $cover['tag'];
    $group = 'realizace-' . $row['id'];
    ?>
    <article class="realization-card" id="<?= cms_escape($group) ?>">
      <a class="realization-photo realization-link" data-gallery="<?= cms_escape($group) ?>" data-type="image" data-photo-tag="<?= cms_escape($cover['tag']) ?>" href="<?= cms_escape($cover['src']) ?>">
        <div class="realization-cover">
          <img loading="lazy" decoding="async" src="<?= cms_escape($cover['thumb']) ?>" <?php if ($cover['srcset'] !== ''): ?>srcset="<?= cms_escape($cover['srcset']) ?>" sizes="(min-width: 1400px) 636px, (min-width: 768px) 46vw, 94vw"<?php endif; ?> alt="<?= cms_escape($cover['alt']) ?>">
          <div class="realization-badges">
            <?php if ($badge !== ''): ?><span class="realization-tag"><?= cms_escape($badge) ?></span><?php endif; ?>
            <span class="realization-count"><i class="bi bi-images" aria-hidden="true"></i><?= $photoCount ?></span>
          </div>
          <span class="realization-open" aria-hidden="true"><i class="bi bi-arrow-up-right"></i></span>
        </div>
        <div class="realization-body">
          <?php if ($cover['locality'] !== ''): ?><p class="realization-location"><i class="bi bi-geo-alt" aria-hidden="true"></i><?= cms_escape($cover['locality']) ?></p><?php endif; ?>
          <h3><?= cms_escape($row['title']) ?></h3>
          <?php if ($row['description'] !== ''): ?><p class="realization-description"><?= nl2br(cms_escape($row['description'])) ?></p><?php endif; ?>
          <span class="realization-cta">Prohlédnout realizaci <i class="bi bi-arrow-right" aria-hidden="true"></i></span>
        </div>
        <span class="realization-caption" hidden><?= cms_escape($cover['caption']) ?></span>
      </a>
      <?php if ($count > 1): ?>
      <details class="realization-fallback">
        <summary>Všechny fotografie (<?= $count ?>)</summary>
        <?php foreach (array_slice($photos, 1) as $index => $photo): ?>
          <a class="realization-photo" data-gallery="<?= cms_escape($group) ?>" data-type="image" data-photo-tag="<?= cms_escape($photo['tag']) ?>" href="<?= cms_escape($photo['src']) ?>">
            <?= cms_escape($photo['alt']) ?>
            <?php if ($photo['tag'] !== ''): ?><span><?= cms_escape($photo['tag']) ?></span><?php endif; ?>
            <span class="realization-caption" hidden><?= cms_escape($photo['caption']) ?></span>
          </a>
        <?php endforeach; ?>
      </details>
      <?php endif; ?>
    </article>
    <?php
}
function cms_render_service(string $service): void {
    if (!in_array($service, cms_services(), true)) return;
    $legacyPath = __DIR__ . '/service-galleries.json';
    $legacy = is_file($legacyPath) ? (json_decode(file_get_contents($legacyPath), true)[$service] ?? []) : [];
    $rawPage = $_GET['realizace_page'] ?? '0';
    $page = is_string($rawPage) && ctype_digit($rawPage) ? min(10000, (int)$rawPage) : 0;
    $focus = cms_uuid($_GET['realizace'] ?? null) ? $_GET['realizace'] : null;
    if ($focus !== null) $page = 0;
    $feed = cms_feed($service, false, $page, $focus);
    $showLegacy = $focus === null && $page === 0 && ($feed === null || !cms_legacy_import_complete());
    $items = array_merge($feed['items'] ?? [], $showLegacy ? ($legacy['items'] ?? []) : []);
    if (!$items && $feed !== null && $page === 0 && $focus === null) return;
    ?>
    <section class="section-padding gallery-section service-gallery" id="galerie" aria-labelledby="service-gallery-title">
      <div class="container-xl" id="web-realizace">
        <header class="service-gallery-heading">
          <div><p class="eyebrow"><span></span> Z našich zakázek</p><h2 id="service-gallery-title"><?= cms_escape($legacy['heading'] ?? 'Ukázky našich realizací') ?></h2></div>
          <p>Od prvního zásahu po hotový povrch.<br>Otevřete realizaci a prohlédněte si ji zblízka.</p>
        </header>
        <?php if ($feed === null): ?><p class="service-gallery-notice" role="status">Nové realizace jsou dočasně nedostupné. Původní ukázky zůstávají dostupné.</p><?php endif; ?>
        <?php if ($focus !== null): ?><p><a href="<?= cms_escape($service) ?>#galerie">← Všechny realizace této služby</a></p><?php endif; ?>
        <?php if (!$items && $feed !== null): ?><p><?= $focus !== null ? 'Tato realizace již není zveřejněná.' : 'Na této stránce nejsou další realizace.' ?></p><?php endif; ?>
        <div class="realization-grid">
          <?php foreach ($items as $row) cms_render_gallery_card($row); ?>
        </div>
        <?php if ($page > 0 || ($feed['has_more'] ?? false)): ?><nav class="service-gallery-pagination" aria-label="Stránky realizací">
          <?php if ($page > 0): ?><a href="<?= cms_escape($service) ?>?realizace_page=<?= $page - 1 ?>#web-realizace">← Novější realizace</a><?php endif; ?>
          <?php if ($feed['has_more'] ?? false): ?><a href="<?= cms_escape($service) ?>?realizace_page=<?= $page + 1 ?>#web-realizace">Starší realizace →</a><?php endif; ?>
        </nav><?php endif; ?>
        <div class="service-gallery-footer"><p>Podobnou proměnu můžeme připravit i pro vás.</p><a href="#poptavka">Probrat vaši realizaci <i class="bi bi-arrow-right" aria-hidden="true"></i></a></div>
      </div>
    </section>
    <?php
}
