<?php declare(strict_types=1);
require __DIR__ . '/includes/navrh-init.php';
$pageSlug = 'dekoracni-sterky';
$isHome = false;
$isService = true;
$hasQuote = true;
$defaultService = 'Dekorativní stěrky';
?>
<!doctype html>
<html lang="cs">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dekorativní a betonové stěrky v Brně | Tři Mistři</title><meta name="description" content="Dekorativní a betonové stěrky v Brně od Tři Mistři. Benátský štuk, marmorino a travertino. Od přípravy stěny po hotový povrch. Prohlédněte si realizace.">
<link rel="canonical" href="https://trimistri.cz/dekoracni-sterky">
<meta property="og:type" content="website"><meta property="og:site_name" content="Tři Mistři"><meta property="og:locale" content="cs_CZ">
<meta property="og:title" content="Dekorativní a betonové stěrky v Brně | Tři Mistři"><meta property="og:description" content="Dekorativní a betonové stěrky v Brně od Tři Mistři. Benátský štuk, marmorino a travertino. Od přípravy stěny po hotový povrch. Prohlédněte si realizace.">
<meta property="og:url" content="https://trimistri.cz/dekoracni-sterky"><meta property="og:image" content="https://trimistri.cz/assets/img/about.JPEG">
<meta name="twitter:card" content="summary_large_image"><link rel="icon" href="favicon.ico"><meta name="theme-color" content="#151719">
<?php require __DIR__ . '/includes/navrh-styles.php'; ?>
<?php require __DIR__ . '/includes/consent-head.php'; ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-18282958447"></script>
<script>gtag('js',new Date());gtag('config','AW-18282958447');</script>
<?php
$business = require __DIR__ . '/includes/business-data.php';
$schema = ['@context' => 'https://schema.org', '@graph' => [$business]];
$schema['@graph'][] = ['@type' => 'Service', 'name' => "Dekorativní a betonové stěrky v Brně | Tři Mistři", 'serviceType' => $defaultService, 'description' => "Dekorativní a betonové stěrky v Brně od Tři Mistři. Benátský štuk, marmorino a travertino. Od přípravy stěny po hotový povrch. Prohlédněte si realizace.", 'provider' => $business, 'url' => 'https://trimistri.cz/' . $pageSlug];
$schema['@graph'][] = ['@type' => 'BreadcrumbList', 'itemListElement' => [['@type' => 'ListItem', 'position' => 1, 'name' => 'Domů', 'item' => 'https://trimistri.cz/'], ['@type' => 'ListItem', 'position' => 2, 'name' => 'Služby', 'item' => 'https://trimistri.cz/sluzby'], ['@type' => 'ListItem', 'position' => 3, 'name' => $defaultService, 'item' => 'https://trimistri.cz/' . $pageSlug]]];
$schema['@graph'][] = json_decode('{"@type": "FAQPage", "mainEntity": [{"@type": "Question", "name": "Kolik stojí dekorativní nebo betonová stěrka?", "acceptedAnswer": {"@type": "Answer", "text": "Cena dekorativní stěrky za m² závisí na technice, podkladu a počtu vrstev. Celkovou cenu ovlivní také plocha, její členitost a potřebná příprava. Pro nabídku nám pošlete fotografii stěny, přibližné rozměry a inspiraci pro požadovaný vzhled."}}, {"@type": "Question", "name": "Jak vybrat betonovou stěrku nebo benátský štuk?", "acceptedAnswer": {"@type": "Answer", "text": "Betonový efekt, benátský štuk, marmorino a travertino mají rozdílnou kresbu a strukturu. Projdeme s vámi inspiraci a vybereme techniku podle světla, okolních materiálů a využití místnosti. Každý ručně zpracovaný povrch má vlastní kresbu."}}, {"@type": "Question", "name": "Hodí se betonová stěrka do koupelny?", "acceptedAnswer": {"@type": "Answer", "text": "Záleží na podkladu a kontaktu s vodou. Vhodnost pro sprchový kout a další mokré zóny posoudíme individuálně. Pro stěrku přes vhodné obklady nabízíme také mikrocement."}}]}', true);
?>
<script type="application/ld+json"><?= json_encode($schema, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>
</head>
<body class="night-gallery">
<a class="tm-skip" href="#obsah">Přeskočit na obsah</a>
<?php require __DIR__ . '/includes/header.php'; ?>
<main id="obsah" class="tm-paper tm-service-page tm-detail-page">
  <section class="tm-detail-hero tm-container" aria-labelledby="service-title">
    <nav class="tm-breadcrumb" aria-label="Drobečková navigace">
      <a href="./">Úvod</a><span aria-hidden="true">/</span>
      <a href="./#sluzby">Služby</a><span aria-hidden="true">/</span>
      <span>Dekorativní stěrky</span>
    </nav>
    <div class="tm-detail-hero-grid">
      <div class="tm-detail-intro">
        <p class="tm-eyebrow"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m3 7 9-4 9 4-9 4-9-4Zm0 5 9 4 9-4M3 17l9 4 9-4"/></svg> Tři Mistři / Brno a okolí</p>
        <h1 id="service-title">Dekorativní a betonové stěrky v Brně<span>.</span></h1>
        <p class="tm-detail-lead">Betonová stěrka na zeď, marmorino nebo benátský štuk? Vytvoříme dekorativní povrch podle vašeho interiéru. Prohlédněte si realizace v Brně a okolí a pošlete nám svou představu.</p>
        <div class="tm-detail-actions">
          <a class="tm-btn" href="#poptavka"><span class="tm-cta-label">Poptat dekorativní stěrku</span><span aria-hidden="true">↗</span></a>
          <a class="tm-call-btn tm-detail-phone" href="tel:+420774927182"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m6 3 3 5-2 2c2 4 3 5 7 7l2-2 5 3c0 3-2 4-4 3C9 19 5 15 3 7 2 5 3 3 6 3Z"/></svg> +420 774 927 182</a>
        </div>
        <p class="tm-detail-note">Rozsah, cenu i termín si potvrdíme předem.</p>
        <div class="tm-detail-trust">
          <a href="https://www.google.com/maps?cid=6542642701333762246" target="_blank" rel="noopener" aria-label="Hodnocení 5 z 5, 29 recenzí na Google">
            <span class="tm-trust-stars" aria-hidden="true">★★★★★</span>
            <strong>5,0 / 5</strong><span>29 recenzí na Google ↗</span>
          </a>
          <span><strong>15+ let</strong> řemeslné zkušenosti</span>
        </div>
      </div>
            <figure class="tm-detail-cover" data-tm-motion>
        <div class="tm-detail-cover-image"><img src="./assets/img/gallery/thumbs/dekoracnisterky25-700w.webp" alt="Dekorativní stěrka - Zlín - Ortodoncie" width="700" height="468" decoding="async" fetchpriority="high"></div>
        <figcaption><span><i aria-hidden="true"></i> Z naší práce</span><strong>Zlín - Ortodoncie</strong></figcaption>
      </figure>
          </div>
  </section>
<?php navrh_flush_first_view(); ?>

  <section class="tm-detail-section tm-container tm-detail-service-info" id="rozsah" aria-labelledby="scope-title">
    <div class="tm-detail-info-surface">
      <div class="tm-detail-overview-heading" data-tm-motion>
      <div><p class="tm-eyebrow">01 / O službě</p><h2 id="scope-title">Od přípravy stěny po hotovou stěrku</h2></div>
      <p>Společně vybereme vzhled, který se hodí do vašeho interiéru. Posoudíme stěnu, připravíme podklad a vytvoříme zvolený povrch.</p>
    </div>
      <ul class="tm-detail-benefits">
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg></div><h3>Vzhled a technika</h3><p>Betonová stěrka, benátský štuk, marmorino a travertino. Techniku, barvu a kresbu sladíme s vaším prostorem.</p></li>
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m12 2 8 3v6c0 5-4 9-8 11-4-2-8-6-8-11V5l8-3Zm-4 9 3 3 5-6"/></svg></div><h3>Příprava stěny</h3><p>Zkontrolujeme stav stěny a navrhneme přípravu pro vybranou techniku.</p></li>
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m3 7 9-4 9 4-9 4-9-4Zm0 5 9 4 9-4M3 17l9 4 9-4"/></svg></div><h3>Vhodnost do koupelny</h3><p>Vhodnost ověříme podle podkladu a zatížení vodou. Pro stěrku přes vhodné obklady nabízíme také <a href="./mikrocement">mikrocement</a>.</p></li>
          </ul>
      <div class="tm-detail-info-columns">
        <div class="tm-detail-info-process" id="realizace-postup" aria-labelledby="process-title">
          <h3 class="tm-detail-info-title" id="process-title">Jak probíhá realizace</h3>
          <div class="tm-detail-work"><ol><li data-tm-motion><span class="tm-detail-step-number">01</span><div><h4>Společně vybereme vzhled</h4><p>Probereme barvu, strukturu a techniku, která se hodí do vašeho prostoru.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">02</span><div><h4>Zkontrolujeme stěnu</h4><p>Ověříme rovinnost a soudržnost podkladu. Určíme, jakou přípravu potřebuje.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">03</span><div><h4>Naneseme stěrku</h4><p>Stěrku naneseme ve vrstvách a ručně vytvoříme požadovanou kresbu.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">04</span><div><h4>Dokončíme detaily</h4><p>Dokončíme rohy a napojení. Probereme, jak o hotový povrch pečovat.</p></div></li></ol></div>
        </div>
        <div class="tm-detail-info-questions" id="otazky" aria-labelledby="faq-title">
          <h3 class="tm-detail-info-title" id="faq-title">Cena a časté otázky</h3>
          <div class="tm-detail-faq">
            <details open><summary><span class="tm-faq-question">Kolik stojí dekorativní nebo betonová stěrka?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Cena dekorativní stěrky za m² závisí na technice, podkladu a počtu vrstev. Celkovou cenu ovlivní také plocha, její členitost a potřebná příprava. Pro nabídku nám pošlete fotografii stěny, přibližné rozměry a inspiraci pro požadovaný vzhled.</p></div></details>
            <details><summary><span class="tm-faq-question">Jak vybrat betonovou stěrku nebo benátský štuk?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Betonový efekt, benátský štuk, marmorino a travertino mají rozdílnou kresbu a strukturu. Projdeme s vámi inspiraci a vybereme techniku podle světla, okolních materiálů a využití místnosti. Každý ručně zpracovaný povrch má vlastní kresbu.</p></div></details>
            <details><summary><span class="tm-faq-question">Hodí se betonová stěrka do koupelny?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Záleží na podkladu a kontaktu s vodou. Vhodnost pro sprchový kout a další mokré zóny posoudíme individuálně. Pro stěrku přes vhodné obklady nabízíme také <a href="./mikrocement">mikrocement</a>.</p></div></details>
          </div>
        </div>
      </div>
    </div>
  </section>

    <?php if (!navrh_cms_gallery($pageSlug)): ?>
<section class="tm-detail-showcase tm-detail-section tm-container" id="ukazky" aria-labelledby="showcase-title">
    <span class="tm-anchor" id="galerie"></span><span class="tm-anchor" id="web-realizace"></span><div class="tm-detail-section-heading"><div><p class="tm-eyebrow">02 / Ukázky realizací</p><h2 id="showcase-title">Podívejte se na výsledek.</h2></div><p>13 realizací · 24 fotografií</p></div>
    <div class="tm-project-grid tm-detail-projects">            <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-5cb5a08812ed" href="./assets/img/gallery/DekoracniSterky.jpeg" data-glightbox="title: Dekorativní stěrka 1 - Brno - Špitálka" aria-label="Dekorativní stěrka — Brno - Špitálka — prohlédnout 1 fotografií">
                <img data-src="./assets/img/gallery/thumbs/DekoracniSterky-700w.webp" alt="Dekorativní stěrka 1 - Brno - Špitálka" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/DekoracniSterky-700w.webp" alt="Dekorativní stěrka 1 - Brno - Špitálka" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dekorativní stěrky</span><span class="tm-project-photo-total">1 fotografie</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Brno - Špitálka</span><h3>Dekorativní stěrka</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-9732b2ca0763" href="./assets/img/gallery/dekoracnisterky2.jpeg" data-glightbox="title: Dekorativní stěrka 2 - Zlín - Ortodoncie" aria-label="Dekorativní stěrka — Zlín - Ortodoncie — prohlédnout 5 fotografií">
                <img data-src="./assets/img/gallery/thumbs/dekoracnisterky2-700w.webp" alt="Dekorativní stěrka 2 - Zlín - Ortodoncie" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/dekoracnisterky2-700w.webp" alt="Dekorativní stěrka 2 - Zlín - Ortodoncie" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dekorativní stěrky</span><span class="tm-project-photo-total">5 fotografií</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Zlín - Ortodoncie</span><h3>Dekorativní stěrka</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden><a class="photo-link" data-gallery="tm-selected-9732b2ca0763" href="./assets/img/gallery/dekoracnisterky4.jpeg" data-glightbox="title: Dekorativní stěrka 3 - Zlín - Ortodoncie" aria-label="Dekorativní stěrka 3 - Zlín - Ortodoncie"></a><a class="photo-link" data-gallery="tm-selected-9732b2ca0763" href="./assets/img/gallery/dekoracnisterky25.jpeg" data-glightbox="title: Dekorativní stěrka - Zlín - Ortodoncie" aria-label="Dekorativní stěrka - Zlín - Ortodoncie"></a><a class="photo-link" data-gallery="tm-selected-9732b2ca0763" href="./assets/img/gallery/dekoracnisterky26.jpeg" data-glightbox="title: Dekorativní stěrka - Zlín - Ortodoncie" aria-label="Dekorativní stěrka - Zlín - Ortodoncie"></a><a class="photo-link" data-gallery="tm-selected-9732b2ca0763" href="./assets/img/gallery/dekoracnisterky27.jpeg" data-glightbox="title: Dekorativní stěrka - Zlín - Ortodoncie" aria-label="Dekorativní stěrka - Zlín - Ortodoncie"></a></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-5882a7572435" href="./assets/img/gallery/dekoracnisterky6.jpeg" data-glightbox="title: Dekorativní stěrka 4 - Brno - Kamechy" aria-label="Dekorativní stěrka — Brno - Kamechy — prohlédnout 1 fotografií">
                <img data-src="./assets/img/gallery/thumbs/dekoracnisterky6-700w.webp" alt="Dekorativní stěrka 4 - Brno - Kamechy" loading="lazy" width="700" height="525" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/dekoracnisterky6-700w.webp" alt="Dekorativní stěrka 4 - Brno - Kamechy" loading="lazy" width="700" height="525" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dekorativní stěrky</span><span class="tm-project-photo-total">1 fotografie</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Brno - Kamechy</span><h3>Dekorativní stěrka</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-dc6bb9734969" href="./assets/img/gallery/dekoracnisterky8.jpeg" data-glightbox="title: Dekorativní stěrka 5 - Brno - Líšeň" aria-label="Dekorativní stěrka — Brno - Líšeň — prohlédnout 1 fotografií">
                <img data-src="./assets/img/gallery/thumbs/dekoracnisterky8-700w.webp" alt="Dekorativní stěrka 5 - Brno - Líšeň" loading="lazy" width="700" height="525" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/dekoracnisterky8-700w.webp" alt="Dekorativní stěrka 5 - Brno - Líšeň" loading="lazy" width="700" height="525" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dekorativní stěrky</span><span class="tm-project-photo-total">1 fotografie</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Brno - Líšeň</span><h3>Dekorativní stěrka</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden></div>
            </article>
            </div>
        <details class="tm-detail-more" id="tm-service-archive">
      <summary class="tm-btn"><span class="tm-more-closed">Zobrazit další realizace (9)</span><span aria-hidden="true">↓</span></summary>
      <div class="tm-project-grid tm-detail-projects">            <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-877c536d6192" href="./assets/img/gallery/dekoracnisterky9.jpeg" data-glightbox="title: Dekorativní stěrka 6 - Brno - Kunzova" aria-label="Dekorativní stěrka — Brno - Kunzova — prohlédnout 1 fotografií">
                <img data-src="./assets/img/gallery/thumbs/dekoracnisterky9-700w.webp" alt="Dekorativní stěrka 6 - Brno - Kunzova" loading="lazy" width="700" height="525" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/dekoracnisterky9-700w.webp" alt="Dekorativní stěrka 6 - Brno - Kunzova" loading="lazy" width="700" height="525" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dekorativní stěrky</span><span class="tm-project-photo-total">1 fotografie</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Brno - Kunzova</span><h3>Dekorativní stěrka</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-d34a8fb6ccbc" href="./assets/img/gallery/dekoracnisterky11.jpeg" data-glightbox="title: Dekorativní stěrka 7 - Brno - Líšeň" aria-label="Dekorativní stěrka — Brno - Líšeň — prohlédnout 1 fotografií">
                <img data-src="./assets/img/gallery/thumbs/dekoracnisterky11-700w.webp" alt="Dekorativní stěrka 7 - Brno - Líšeň" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/dekoracnisterky11-700w.webp" alt="Dekorativní stěrka 7 - Brno - Líšeň" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dekorativní stěrky</span><span class="tm-project-photo-total">1 fotografie</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Brno - Líšeň</span><h3>Dekorativní stěrka</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-49b01bf97be5" href="./assets/img/gallery/dekoracnisterky14.jpeg" data-glightbox="title: Dekorativní stěrka 8 - Brno - Moravany" aria-label="Dekorativní stěrka — Brno - Moravany — prohlédnout 3 fotografií">
                <img data-src="./assets/img/gallery/thumbs/dekoracnisterky14-700w.webp" alt="Dekorativní stěrka 8 - Brno - Moravany" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/dekoracnisterky14-700w.webp" alt="Dekorativní stěrka 8 - Brno - Moravany" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dekorativní stěrky</span><span class="tm-project-photo-total">3 fotografie</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Brno - Moravany</span><h3>Dekorativní stěrka</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden><a class="photo-link" data-gallery="tm-selected-49b01bf97be5" href="./assets/img/gallery/dekoracnisterky23.jpeg" data-glightbox="title: Dekorativní stěrka 8 - Brno - Moravany" aria-label="Dekorativní stěrka 8 - Brno - Moravany"></a><a class="photo-link" data-gallery="tm-selected-49b01bf97be5" href="./assets/img/gallery/dekoracnisterky24.jpeg" data-glightbox="title: Dekorativní stěrka 8 - Brno - Moravany" aria-label="Dekorativní stěrka 8 - Brno - Moravany"></a></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-b230efbddf77" href="./assets/img/gallery/dekoracnisterky21.jpeg" data-glightbox="title: Dekorativní stěrka 9 - Brno - Bohunice" aria-label="Dekorativní stěrka — Brno - Bohunice — prohlédnout 1 fotografií">
                <img data-src="./assets/img/gallery/thumbs/dekoracnisterky21-530w.webp" alt="Dekorativní stěrka 9 - Brno - Bohunice" loading="lazy" width="530" height="709" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/dekoracnisterky21-530w.webp" alt="Dekorativní stěrka 9 - Brno - Bohunice" loading="lazy" width="530" height="709" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dekorativní stěrky</span><span class="tm-project-photo-total">1 fotografie</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Brno - Bohunice</span><h3>Dekorativní stěrka</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-7678508387dd" href="./assets/img/gallery/dekoracnisterky22.jpeg" data-glightbox="title: Dekorativní stěrka 10 - Velká Bíteš" aria-label="Dekorativní stěrka — Velká Bíteš — prohlédnout 1 fotografií">
                <img data-src="./assets/img/gallery/thumbs/dekoracnisterky22-700w.webp" alt="Dekorativní stěrka 10 - Velká Bíteš" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/dekoracnisterky22-700w.webp" alt="Dekorativní stěrka 10 - Velká Bíteš" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dekorativní stěrky</span><span class="tm-project-photo-total">1 fotografie</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Velká Bíteš</span><h3>Dekorativní stěrka</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-220f1ef3ab2c" href="./assets/img/gallery/dekoracnisterky7.jpeg" data-glightbox="title: Dekorativní stěrka 11 - Rebešovice" aria-label="Dekorativní stěrka — Rebešovice — prohlédnout 2 fotografií">
                <img data-src="./assets/img/gallery/thumbs/dekoracnisterky7-700w.webp" alt="Dekorativní stěrka 11 - Rebešovice" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/dekoracnisterky7-700w.webp" alt="Dekorativní stěrka 11 - Rebešovice" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dekorativní stěrky</span><span class="tm-project-photo-total">2 fotografie</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Rebešovice</span><h3>Dekorativní stěrka</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden><a class="photo-link" data-gallery="tm-selected-220f1ef3ab2c" href="./assets/img/gallery/dekoracnisterky10.jpeg" data-glightbox="title: Dekorativní stěrka 11 - Rebešovice" aria-label="Dekorativní stěrka 11 - Rebešovice"></a></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-09e9fb169fb0" href="./assets/img/gallery/dekoracnisterky12.jpeg" data-glightbox="title: Dekorativní stěrka 12 - Brno - Veselá" aria-label="Dekorativní stěrka — Brno - Veselá — prohlédnout 1 fotografií">
                <img data-src="./assets/img/gallery/thumbs/dekoracnisterky12-700w.webp" alt="Dekorativní stěrka 12 - Brno - Veselá" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/dekoracnisterky12-700w.webp" alt="Dekorativní stěrka 12 - Brno - Veselá" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dekorativní stěrky</span><span class="tm-project-photo-total">1 fotografie</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Brno - Veselá</span><h3>Dekorativní stěrka</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-c34377aa8798" href="./assets/img/gallery/dekoracnisterky15.jpeg" data-glightbox="title: Dekorativní stěrka 14 - Rajhrad" aria-label="Dekorativní stěrka — Rajhrad — prohlédnout 5 fotografií">
                <img data-src="./assets/img/gallery/thumbs/dekoracnisterky15-700w.webp" alt="Dekorativní stěrka 14 - Rajhrad" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/dekoracnisterky15-700w.webp" alt="Dekorativní stěrka 14 - Rajhrad" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dekorativní stěrky</span><span class="tm-project-photo-total">5 fotografií</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Rajhrad</span><h3>Dekorativní stěrka</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden><a class="photo-link" data-gallery="tm-selected-c34377aa8798" href="./assets/img/gallery/dekoracnisterky16.jpeg" data-glightbox="title: Dekorativní stěrka 14 - Rajhrad" aria-label="Dekorativní stěrka 14 - Rajhrad"></a><a class="photo-link" data-gallery="tm-selected-c34377aa8798" href="./assets/img/gallery/dekoracnisterky17.jpeg" data-glightbox="title: Dekorativní stěrka 14 - Rajhrad" aria-label="Dekorativní stěrka 14 - Rajhrad"></a><a class="photo-link" data-gallery="tm-selected-c34377aa8798" href="./assets/img/gallery/dekoracnisterky18.jpeg" data-glightbox="title: Dekorativní stěrka 14 - Rajhrad" aria-label="Dekorativní stěrka 14 - Rajhrad"></a><a class="photo-link" data-gallery="tm-selected-c34377aa8798" href="./assets/img/gallery/dekoracnisterky19.jpeg" data-glightbox="title: Dekorativní stěrka 14 - Rajhrad" aria-label="Dekorativní stěrka 14 - Rajhrad"></a></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-98d3bf45c41a" href="./assets/img/gallery/dekoracnisterky5.jpeg" data-glightbox="title: Dekorativní stěrka 15" aria-label="Dekorativní stěrka — prohlédnout 1 fotografií">
                <img data-src="./assets/img/gallery/thumbs/dekoracnisterky5-700w.webp" alt="Dekorativní stěrka 15" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/dekoracnisterky5-700w.webp" alt="Dekorativní stěrka 15" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dekorativní stěrky</span><span class="tm-project-photo-total">1 fotografie</span>
                <span class="tm-project-overlay"><h3>Dekorativní stěrka</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden></div>
            </article>
            </div>
    </details>
      </section>
<?php endif; ?>

  <section class="tm-contact tm-detail-form-section" id="kontakt" data-nosnippet><div class="tm-container">
    <div class="tm-contact-heading" data-tm-motion><div class="tm-contact-copy"><p class="tm-eyebrow">03 / Nezávazná poptávka</p><h2>Pojďme se <em>domluvit.</em></h2><p>Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.</p></div><div class="tm-detail-form-aside"><strong>Pro první domluvu stačí:</strong><p>fotografie stěny nebo prostoru, přibližná plocha v m², inspirace, struktura a barevnost.</p></div></div>
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
        <aside class="tm-inquiry-aside"><p class="tm-eyebrow">Váš prostor. Naše řemeslo.</p><h3>Pár detailů.<br>A začneme.</h3><p>Pošlete nám zadání. Rozsah práce, cenu i termín spolu upřesníme.</p><div class="tm-inquiry-service"><span>Co budeme řešit</span><strong data-form-service>Dekorativní stěrky</strong></div><div class="tm-inquiry-direct"><span>Raději se domluvíte přímo?</span><a class="tm-call-btn" href="tel:+420774927182"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m6 3 3 5-2 2c2 4 3 5 7 7l2-2 5 3c0 3-2 4-4 3C9 19 5 15 3 7 2 5 3 3 6 3Z"/></svg><span>+420 774 927 182</span></a><a href="mailto:info@trimistri.cz">info@trimistri.cz</a></div><span class="tm-inquiry-area"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg> Brno a okolí</span></aside>
        <div class="tm-inquiry-fields" id="poptavka">

        <?php require __DIR__ . '/includes/quote-form.php'; ?>
        </div>
      </div>
      </div>
  </div>
</section>

</div>
  </div></section>
</main>
<div class="tm-service-mobile-contact" aria-label="Poptávka a telefon"><a href="tel:+420774927182" aria-label="Zavolat Třem Mistrům"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m6 3 3 5-2 2c2 4 3 5 7 7l2-2 5 3c0 3-2 4-4 3C9 19 5 15 3 7 2 5 3 3 6 3Z"/></svg><span>Zavolat</span></a><a class="tm-btn" href="#poptavka"><span class="tm-cta-label">Nezávazně poptat</span><span aria-hidden="true">↗</span></a></div>
<?php require __DIR__ . '/includes/footer.php'; ?>



</body></html>
