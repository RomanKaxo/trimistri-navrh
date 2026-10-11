<?php declare(strict_types=1);

if (!isset($servicePage) || !is_array($servicePage)) {
  http_response_code(500);
  exit('Chybí konfigurace služby.');
}

$e = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
$slug = (string) $servicePage['slug'];
$canonical = 'https://trimistri.cz/' . $slug;
$defaultService = (string) $servicePage['defaultService'];

$isHttps = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
session_set_cookie_params(['lifetime' => 0, 'path' => '/', 'secure' => $isHttps, 'httponly' => true, 'samesite' => 'Lax']);
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
require __DIR__ . '/quote-form-session.php';

$schema = [
  '@context' => 'https://schema.org',
  '@graph' => [
    [
      '@type' => 'Service',
      'serviceType' => $servicePage['name'],
      'name' => $servicePage['h1'],
      'description' => $servicePage['description'],
      'provider' => require __DIR__ . '/business-data.php',
      'areaServed' => ['Brno', 'Blansko', 'Olomouc', 'Zlín', 'Jihomoravský kraj', 'Olomoucký kraj', 'Zlínský kraj'],
      'url' => $canonical,
    ],
    [
      '@type' => 'BreadcrumbList',
      'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Domů', 'item' => 'https://trimistri.cz/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Služby', 'item' => 'https://trimistri.cz/sluzby'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $servicePage['name'], 'item' => $canonical],
      ],
    ],
    [
      '@type' => 'FAQPage',
      'mainEntity' => array_map(static fn (array $faq): array => [
        '@type' => 'Question',
        'name' => $faq[0],
        'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq[1]],
      ], $servicePage['faqs']),
    ],
  ],
];
?>
<!doctype html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $e($servicePage['title']) ?></title>
  <meta name="description" content="<?= $e($servicePage['description']) ?>">
  <link rel="canonical" href="<?= $e($canonical) ?>">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Tři Mistři">
  <meta property="og:locale" content="cs_CZ">
  <meta property="og:url" content="<?= $e($canonical) ?>">
  <meta property="og:title" content="<?= $e($servicePage['title']) ?>">
  <meta property="og:description" content="<?= $e($servicePage['description']) ?>">
  <meta property="og:image" content="https://trimistri.cz/assets/img/about.JPEG">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= $e($servicePage['title']) ?>">
  <meta name="twitter:description" content="<?= $e($servicePage['description']) ?>">
  <meta name="twitter:image" content="https://trimistri.cz/assets/img/about.JPEG">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://cdn.jsdelivr.net">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style-v2.css?v=<?= filemtime(__DIR__ . '/../assets/css/style-v2.css') ?>">
  <link rel="stylesheet" href="assets/css/service-gallery.css?v=<?= filemtime(__DIR__ . '/../assets/css/service-gallery.css') ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox@3.3.0/dist/css/glightbox.min.css">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
  <meta name="theme-color" content="#151719">
  <?php include __DIR__ . '/consent-head.php'; ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-18282958447"></script>
  <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments)}gtag('js',new Date());gtag('config','AW-18282958447');</script>
  <script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) ?></script>
</head>
<body>
  <?php $isHome = false; include __DIR__ . '/header.php'; ?>
  <main>
    <section class="hero-section-page service-texture-hero service-texture-hero--<?= $e($servicePage['theme']) ?>">
      <div class="hero-page-overlay"></div>
      <div class="container-xl py-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-3">
            <li class="breadcrumb-item"><a href="./">Domů</a></li>
            <li class="breadcrumb-item"><a href="sluzby">Služby</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $e($servicePage['name']) ?></li>
          </ol>
        </nav>
        <p class="eyebrow"><span></span><?= $e($servicePage['eyebrow']) ?></p>
        <h1 class="fw-bold mb-3"><?= $e($servicePage['h1']) ?></h1>
        <p class="lead mb-4 service-hero-lead"><?= $e($servicePage['lead']) ?></p>
        <div class="d-flex flex-wrap gap-3">
          <a href="#poptavka" class="btn btn-gold btn-lg">Nezávazně poptat službu</a>
          <a href="tel:+420774927182" class="btn btn-outline-light btn-lg"><i class="bi bi-telephone"></i> 774 927 182</a>
        </div>
      </div>
    </section>

    <?php cms_render_service($slug); ?>
    <section class="section-padding service-detail-intro">
      <div class="container-xl">
        <div class="section-heading mx-auto text-center">
          <p class="eyebrow centered"><span></span>Jak službu řešíme</p>
          <h2><?= $e($servicePage['claim']) ?></h2>
          <p><?= $e($servicePage['intro']) ?></p>
        </div>
        <div class="row g-4">
          <?php foreach ($servicePage['points'] as $point): ?>
            <div class="col-lg-4">
              <article class="service-card service-detail-card">
                <div>
                  <i class="bi <?= $e($point[0]) ?>" aria-hidden="true"></i>
                  <h3><?= $e($point[1]) ?></h3>
                  <p><?= $e($point[2]) ?></p>
                </div>
              </article>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="section-padding premium-section">
      <div class="container-xl">
        <div class="row g-5 align-items-start">
          <div class="col-lg-5">
            <p class="eyebrow"><span></span>Rozsah služby</p>
            <h2 class="service-detail-heading">Co můžeme zahrnout do realizace</h2>
            <p class="section-text">Konkrétní skladbu prací určíme podle stavu, materiálu, přístupu a požadovaného výsledku.</p>
          </div>
          <div class="col-lg-7">
            <div class="quality-list mt-0">
              <?php foreach ($servicePage['scope'] as $item): ?>
                <div><i class="bi bi-check2" aria-hidden="true"></i><strong><?= $e($item[0]) ?></strong><span><?= $e($item[1]) ?></span></div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-padding">
      <div class="container-xl">
        <div class="special-card">
          <p class="eyebrow"><span></span>Správný postup</p>
          <h2><?= $e($servicePage['methodsTitle']) ?></h2>
          <p><?= $e($servicePage['methodsLead']) ?></p>
          <div class="service-method-grid">
            <?php foreach ($servicePage['methods'] as $method): ?>
              <div><strong><?= $e($method[0]) ?></strong><span><?= $e($method[1]) ?></span></div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>

    <section class="section-padding premium-section">
      <div class="container-xl">
        <div class="process-wrap process-wrap--wide">
          <p class="eyebrow"><span></span>Od posouzení po předání</p>
          <h2>Jak realizace probíhá</h2>
          <div class="process-columns-labels"><p class="eyebrow"><span></span>Postup</p><p class="eyebrow"><span></span>Časté dotazy</p></div>
          <div class="process-box">
            <div class="process-columns">
              <ol class="process-steps">
                <?php foreach ($servicePage['steps'] as $index => $step): ?>
                  <li class="process-step"><span class="process-step-num"><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span><div><h3><?= $e($step[0]) ?></h3><p><?= $e($step[1]) ?></p></div></li>
                <?php endforeach; ?>
              </ol>
              <div class="process-faq">
                <?php foreach ($servicePage['faqs'] as $faq): ?>
                  <details class="step-faq"><summary><?= $e($faq[0]) ?></summary><div class="step-faq-body"><p><?= $e($faq[1]) ?></p></div></details>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="process-close">
            <div><strong>Pošlete fotografie a stručný popis</strong><span class="process-close-note">Podle podkladu, rozsahu a přístupu navrhneme další postup.</span></div>
            <div class="process-close-actions"><a href="tel:+420774927182" class="phone-link"><i class="bi bi-telephone"></i> 774 927 182</a><a href="#poptavka" class="btn btn-gold">Poptat realizaci</a></div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-padding related-section">
      <div class="container-xl">
        <div class="section-heading"><p class="eyebrow"><span></span>Navazující práce</p><h2>Související služby</h2></div>
        <div class="row g-4">
          <?php foreach ($servicePage['related'] as $related): ?>
            <div class="col-md-4"><a class="service-card service-related-card d-block text-decoration-none" href="<?= $e($related[1]) ?>"><div><h3><?= $e($related[0]) ?></h3><p><?= $e($related[2]) ?></p><span class="service-related-link">Zobrazit službu <i class="bi bi-arrow-right"></i></span></div></a></div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <?php require __DIR__ . '/quote-form.php'; ?>
  </main>
  <?php include __DIR__ . '/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/glightbox@3.3.0/dist/js/glightbox.min.js"></script>
  <script>
  (()=>{'use strict';const nav=document.getElementById('mainNav');if(nav){nav.querySelectorAll('a.nav-link:not(.dropdown-toggle),.dropdown-item,.header-actions a').forEach(link=>link.addEventListener('click',()=>{if(nav.classList.contains('show'))bootstrap.Collapse.getOrCreateInstance(nav).hide()}))}document.querySelectorAll('.step-faq').forEach(details=>{const summary=details.querySelector('summary'),body=details.querySelector('.step-faq-body');if(!summary||!body)return;summary.addEventListener('click',event=>{event.preventDefault();if(details.open){body.style.height=body.scrollHeight+'px';requestAnimationFrame(()=>body.style.height='0px');body.addEventListener('transitionend',()=>{details.open=false;body.style.height=''}, {once:true})}else{details.open=true;body.style.height='0px';requestAnimationFrame(()=>body.style.height=body.scrollHeight+'px');body.addEventListener('transitionend',()=>body.style.height='auto',{once:true})}})})})();
  </script>
</body>
</html>
