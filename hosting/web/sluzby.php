<?php declare(strict_types=1);
$isHttps = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
session_set_cookie_params(['lifetime' => 0, 'path' => '/', 'secure' => $isHttps, 'httponly' => true, 'samesite' => 'Lax']);
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
require __DIR__ . '/includes/navrh-init.php';
$pageSlug = 'sluzby'; $isService = true; $hasQuote = true;
$defaultService = '';
$serviceGroups = require __DIR__ . '/includes/service-groups-data.php';
$serviceCount = array_sum(array_map(static fn (array $group): int => count($group['services']), $serviceGroups));
$serviceCountWord = static fn (int $count): string => $count === 1 ? 'služba' : ($count >= 2 && $count <= 4 ? 'služby' : 'služeb');
$serviceItems = [];
foreach ($serviceGroups as $group) {
  foreach ($group['services'] as $service) {
    $serviceItems[] = ['@type' => 'ListItem', 'position' => count($serviceItems) + 1,
      'name' => $service['name'], 'url' => 'https://trimistri.cz/' . $service['slug']];
  }
}
$schema = ['@context' => 'https://schema.org', '@graph' => [
  ['@type' => 'ItemList', 'name' => 'Služby Tři Mistři', 'numberOfItems' => $serviceCount, 'itemListElement' => $serviceItems],
  ['@type' => 'BreadcrumbList', 'itemListElement' => [
    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Domů', 'item' => 'https://trimistri.cz/'],
    ['@type' => 'ListItem', 'position' => 2, 'name' => 'Služby', 'item' => 'https://trimistri.cz/sluzby'],
  ]],
]];
?>
<!doctype html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Malování, nátěry a čištění v Brně | Tři Mistři</title>
  <meta name="description" content="Malování interiérů, dekorativní stěrky, nátěry fasád a střech, okapů a svodů i čištění fasád v Brně a okolí. Prohlédněte si služby Tři Mistři.">
  <link rel="canonical" href="https://trimistri.cz/sluzby">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Tři Mistři">
  <meta property="og:locale" content="cs_CZ">
  <meta property="og:url" content="https://trimistri.cz/sluzby">
  <meta property="og:title" content="Malování, nátěry a čištění v Brně | Tři Mistři">
  <meta property="og:description" content="Malování interiérů, dekorativní stěrky, mikrocement, nátěry střech, okapů a svodů, nátěry a čištění fasád i průmyslové práce.">
  <meta property="og:image" content="https://trimistri.cz/assets/img/about.JPEG">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:image" content="https://trimistri.cz/assets/img/about.JPEG">
  <script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) ?></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://cdn.jsdelivr.net">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style-v2.css?v=<?= filemtime(__DIR__ . '/assets/css/style-v2.css') ?>">
  <link rel="stylesheet" href="assets/css/service-showcase.css?v=<?= filemtime(__DIR__ . '/assets/css/service-showcase.css') ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
  <meta name="theme-color" content="#151719">
  <?php include __DIR__ . '/includes/consent-head.php'; ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-18282958447"></script>
  <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments)}gtag('js',new Date());gtag('config','AW-18282958447');</script>
<?php require __DIR__ . '/includes/navrh-styles.php'; ?>
</head>
<body class="night-gallery tm-legacy">
<?php $isHome = false; include __DIR__ . '/includes/header.php'; ?>
<a class="tm-skip" href="#obsah">Přeskočit na obsah</a><main id="obsah">
  <section class="service-catalog-intro">
    <div class="container-xl">
      <nav aria-label="Drobečková navigace">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Domů</a></li>
          <li class="breadcrumb-item active" aria-current="page">Služby</li>
        </ol>
      </nav>
      <p class="eyebrow">Naše služby · <?= $serviceCount ?> služeb</p>
      <h1>Malířské, natěračské a čisticí služby</h1>
      <p class="service-catalog-lead">V Brně a okolí pomáháme s výmalbou, dekorativními povrchy, fasádami a střechami i průmyslovými nátěry. Vyberte oblast nebo přejděte rovnou na konkrétní službu.</p>
      <nav class="service-catalog-shortcuts" aria-label="Přejít na oblast služeb">
        <?php foreach ($serviceGroups as $group): ?>
          <a href="#<?= htmlspecialchars($group['id'], ENT_QUOTES, 'UTF-8') ?>">
            <span class="service-catalog-shortcut-icon" aria-hidden="true"><i class="bi <?= htmlspecialchars($group['icon'], ENT_QUOTES, 'UTF-8') ?>"></i></span>
            <span class="service-catalog-shortcut-copy"><strong><?= htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8') ?></strong><small><?= count($group['services']) ?> <?= $serviceCountWord(count($group['services'])) ?></small></span>
            <i class="bi bi-arrow-down service-catalog-shortcut-arrow" aria-hidden="true"></i>
          </a>
        <?php endforeach; ?>
      </nav>
    </div>
  </section>

  <div class="service-catalog-groups">
    <?php foreach ($serviceGroups as $index => $group): ?>
      <section id="<?= htmlspecialchars($group['id'], ENT_QUOTES, 'UTF-8') ?>" class="service-catalog-group">
        <div class="container-xl">
          <header class="service-catalog-group-heading">
            <span class="service-catalog-group-icon" aria-hidden="true"><i class="bi <?= htmlspecialchars($group['icon'], ENT_QUOTES, 'UTF-8') ?>"></i></span>
            <div>
              <p class="eyebrow">Oblast <?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?> · <?= count($group['services']) ?> <?= $serviceCountWord(count($group['services'])) ?></p>
              <h2><?= htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8') ?></h2>
              <p><?= htmlspecialchars($group['summary'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
          </header>
          <div class="service-showcase-grid">
            <?php foreach ($group['services'] as $service): ?>
              <a class="service-showcase-card" href="<?= htmlspecialchars($service['slug'], ENT_QUOTES, 'UTF-8') ?>">
                <span class="service-showcase-icon" aria-hidden="true"><i class="bi <?= htmlspecialchars($service['icon'], ENT_QUOTES, 'UTF-8') ?>"></i></span>
                <h3><?= htmlspecialchars($service['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                <span class="service-showcase-description"><?= htmlspecialchars($service['summary'], ENT_QUOTES, 'UTF-8') ?></span>
                <span class="service-showcase-action">Prohlédnout službu <i class="bi bi-arrow-up-right" aria-hidden="true"></i></span>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    <?php endforeach; ?>
  </div>
  <section class="tm-contact" id="kontakt"><div class="tm-container">
  <div class="tm-contact-heading" data-reveal><div class="tm-contact-copy"><p class="tm-eyebrow tm-numbered"><span class="tm-section-number" aria-hidden="true">05</span><span>Nezávazná poptávka</span></p><h2>Řekněte nám,<br><em>co potřebujete.</em></h2><p>Malování bytu, stěrka nebo nový nátěr? Popište práci, místo a přibližný rozsah. Když přidáte fotky, snáz navrhneme další postup.</p></div><div class="tm-direct-contact"><span>Raději se domluvíte přímo?</span><a href="tel:+420774927182"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m6 3 3 5-2 2c2 4 3 5 7 7l2-2 5 3c0 3-2 4-4 3C9 19 5 15 3 7 2 5 3 3 6 3Z"/></svg>+420 774 927 182</a><a href="mailto:info@trimistri.cz"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="2" y="4" width="20" height="16" rx="1"/><path d="m3 6 9 7 9-7"/></svg>info@trimistri.cz</a><p>Brno a okolí · domácnosti i firmy</p></div></div>
  <div class="tm-form"><section class="section-padding quote-section">
  <div class="container-xl">
    <div class="quote-header">
      <div class="quote-header-copy">
        <p class="eyebrow"><span></span> Nezávazná poptávka</p>
        <h2>Řekněte nám, co potřebujete</h2>
        <p>Stručně popište práci a případně přiložte fotky. Ozveme se vám do 24 hodin.</p>
      </div>
      <div class="quote-direct" id="tm-quote-direct">
        <span>Raději přímo?</span>
        <a href="tel:+420774927182"><i class="bi bi-telephone" aria-hidden="true"></i> +420 774 927 182</a>
        <a href="mailto:info@trimistri.cz"><i class="bi bi-envelope" aria-hidden="true"></i> info@trimistri.cz</a>
      </div>
    </div>

    <div class="quote-content">
      <div class="tm-inquiry-layout">
        <aside class="tm-inquiry-aside"><p class="tm-eyebrow">Váš prostor. Naše řemeslo.</p><h3>Pár detailů.<br>A začneme.</h3><p>Pošlete nám zadání. Rozsah práce, cenu i termín spolu upřesníme.</p><div class="tm-inquiry-service"><span>Co budeme řešit</span><strong data-form-service>Malby, nátěry a povrchy</strong></div><div class="tm-inquiry-direct"><span>Raději se domluvíte přímo?</span><a class="tm-call-btn" href="tel:+420774927182"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m6 3 3 5-2 2c2 4 3 5 7 7l2-2 5 3c0 3-2 4-4 3C9 19 5 15 3 7 2 5 3 3 6 3Z"/></svg><span>+420 774 927 182</span></a><a href="mailto:info@trimistri.cz">info@trimistri.cz</a></div><span class="tm-inquiry-area"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg> Brno a okolí</span></aside>
        <div class="tm-inquiry-fields" id="poptavka">

        <?php require __DIR__ . '/includes/quote-form.php'; ?>
        </div>
      </div>
      </div>
  </div>
</section>

</div></div></section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
