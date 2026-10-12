<?php declare(strict_types=1);
/** Use the original CMS bridge, validation and publication rules with the current design. */
require_once __DIR__ . '/cms-gallery.php';

function navrh_cms_card(array $row, bool $linkToService = false): void {
    $photos = array_map(static fn(array $photo): array => cms_gallery_photo($photo, $row), $row['photos']);
    $cover = $photos[0];
    $group = 'realizace-' . $row['id'];
    $count = count($photos);
    $href = $linkToService ? './' . $row['service'] . '?realizace=' . rawurlencode($row['id']) . '#' . $group : $cover['src'];
    if ($linkToService):
    ?>
    <article class="tm-project-card" id="<?= cms_escape($group) ?>" data-reveal>
      <a class="tm-category-link" href="<?= cms_escape($href) ?>" aria-label="<?= cms_escape('Prohlédnout realizaci: ' . $row['title'] . ', ' . $cover['locality']) ?>">
        <div class="tm-category-image">
          <img data-src="<?= cms_escape($cover['thumb']) ?>" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2Fsvg%22%2F%3E" alt="<?= cms_escape($cover['alt']) ?>" loading="lazy" decoding="async" fetchpriority="low">
          <noscript><img src="<?= cms_escape($cover['thumb']) ?>" alt="<?= cms_escape($cover['alt']) ?>" loading="lazy" decoding="async"></noscript>
          <span class="tm-project-photo-total"><?= $count ?> <?= $count === 1 ? 'fotografie' : ($count < 5 ? 'fotografie' : 'fotografií') ?></span>
          <span class="tm-round-arrow" aria-hidden="true">↗</span>
        </div>
        <div class="tm-category-caption"><h3><?= cms_escape($row['title']) ?></h3><span><?= cms_escape($cover['locality']) ?></span></div>
      </a>
    </article>
    <?php
    return;
    endif;
    ?>
    <article class="tm-project-card" id="<?= cms_escape($group) ?>" data-reveal>
      <a class="<?= $linkToService ? '' : 'photo-link ' ?>tm-project-photo" href="<?= cms_escape($href) ?>" <?= $linkToService ? '' : 'data-gallery="' . cms_escape($group) . '"' ?> data-title="<?= cms_escape(cms_escape($cover['caption'])) ?>">
        <img data-src="<?= cms_escape($cover['thumb']) ?>" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E" alt="<?= cms_escape($cover['alt']) ?>" loading="lazy" decoding="async" fetchpriority="low">
        <noscript><img src="<?= cms_escape($cover['thumb']) ?>" alt="<?= cms_escape($cover['alt']) ?>" loading="lazy" decoding="async"></noscript>
        <span class="tm-project-photo-total"><?= $count ?> <?= $count === 1 ? 'fotografie' : ($count < 5 ? 'fotografie' : 'fotografií') ?></span>
        <span class="tm-project-overlay"><span class="tm-project-place"><?= cms_escape($cover['locality']) ?></span><h3><?= cms_escape($row['title']) ?></h3><span class="tm-project-view">Prohlédnout realizaci ↗</span></span>
      </a>
      <?php if (!$linkToService): ?>
      <div class="tm-project-hidden-photos" hidden>
        <?php foreach (array_slice($photos, 1) as $photo): ?>
          <a class="photo-link" href="<?= cms_escape($photo['src']) ?>" data-gallery="<?= cms_escape($group) ?>" data-title="<?= cms_escape(cms_escape($photo['caption'])) ?>" aria-label="<?= cms_escape($photo['alt']) ?>"></a>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </article>
    <?php
}

/** Return false only when the static proposal remains the appropriate fallback. */
function navrh_cms_gallery(?string $service): bool {
    $rawPage = $_GET['realizace_page'] ?? '0';
    $page = is_string($rawPage) && ctype_digit($rawPage) ? min(10000, (int) $rawPage) : 0;
    $focus = cms_uuid($_GET['realizace'] ?? null) ? $_GET['realizace'] : null;
    if ($focus !== null) $page = 0;
    $feed = cms_feed($service, false, $page, $focus);
    $imported = cms_legacy_import_complete();
    if ($feed === null && $page === 0 && $focus === null) return false;
    if (!$imported && empty($feed['items']) && $page === 0 && $focus === null) return false;
    $legacy = json_decode((string) file_get_contents(__DIR__ . '/service-galleries.json'), true) ?? [];
    $items = $feed['items'] ?? [];
    if (!$imported && $page === 0 && $focus === null) {
        foreach ($legacy as $slug => $group) {
            if ($service === null || $slug === $service) $items = array_merge($items, $group['items']);
        }
    }
    ?>
    <section class="tm-detail-showcase tm-detail-section tm-container" id="ukazky" aria-labelledby="showcase-title">
      <span class="tm-anchor" id="galerie"></span><span class="tm-anchor" id="web-realizace"></span>
      <div class="tm-detail-section-heading"><div><p class="tm-eyebrow">Ukázky realizací</p><h2 id="showcase-title">Podívejte se na výsledek.</h2></div></div>
      <?php if ($feed === null): ?><p role="status">Nové realizace jsou dočasně nedostupné.</p><?php endif; ?>
      <?php if ($focus !== null): ?><p><a href="<?= cms_escape('./' . ($service ?? 'galerie')) ?>#ukazky">← Všechny realizace</a></p><?php endif; ?>
      <?php if (!$items): ?><p><?= $focus !== null ? 'Tato realizace již není zveřejněná.' : 'Na této stránce nejsou další realizace.' ?></p><?php endif; ?>
      <div class="tm-project-grid tm-detail-projects">
        <?php foreach (array_slice($items, 0, 4) as $row) navrh_cms_card($row); ?>
      </div>
      <?php if (count($items) > 4): ?>
      <details class="tm-detail-more"><summary class="tm-btn">Zobrazit další realizace (<?= count($items) - 4 ?>) ↓</summary>
        <div class="tm-project-grid tm-detail-projects"><?php foreach (array_slice($items, 4) as $row) navrh_cms_card($row); ?></div>
      </details>
      <?php endif; ?>
      <?php if ($page > 0 || ($feed['has_more'] ?? false)): ?>
      <nav class="service-gallery-pagination" aria-label="Stránky realizací">
        <?php if ($page > 0): ?><a href="<?= cms_escape('./' . ($service ?? 'galerie')) ?>?realizace_page=<?= $page - 1 ?>#ukazky">← Novější realizace</a><?php endif; ?>
        <?php if ($feed['has_more'] ?? false): ?><a href="<?= cms_escape('./' . ($service ?? 'galerie')) ?>?realizace_page=<?= $page + 1 ?>#ukazky">Starší realizace →</a><?php endif; ?>
      </nav>
      <?php endif; ?>
    </section>
    <?php
    return true;
}

function navrh_cms_featured(): void {
    $legacy = json_decode((string) file_get_contents(__DIR__ . '/service-galleries.json'), true) ?? [];
    $missing = array_values(array_diff(cms_services(), array_keys($legacy)));
    $automatic = $missing ? cms_feed(null, false, 0, null, $missing) : ['items' => []];
    $feed = cms_feed(null, true);
    $items = array_merge($automatic['items'] ?? [], $feed['items'] ?? []);
    if (!$items) return;
    $seen = [];
    echo '<div class="tm-project-grid">';
    foreach ($items as $row) {
        if (isset($seen[$row['id']])) continue;
        $seen[$row['id']] = true;
        navrh_cms_card($row, true);
    }
    echo '</div>';
}
