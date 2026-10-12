<?php declare(strict_types=1);
require __DIR__ . '/includes/navrh-init.php';
$pageSlug = 'natery-drevo-kovu';
$isHome = false;
$isService = true;
$hasQuote = true;
$defaultService = 'Nátěry dřeva a kovů';
?>
<!doctype html>
<html lang="cs">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Nátěry dřeva, oken a kovů v Brně | Tři Mistři</title><meta name="description" content="Dejte oknům, dveřím, pergole nebo plotu nový nátěr. V Brně a okolí obnovujeme dřevěné i kovové povrchy. Postup a ochranný nátěr zvolíme podle materiálu a jeho stavu.">
<link rel="canonical" href="https://trimistri.cz/natery-drevo-kovu">
<meta property="og:type" content="website"><meta property="og:site_name" content="Tři Mistři"><meta property="og:locale" content="cs_CZ">
<meta property="og:title" content="Nátěry dřeva, oken a kovů v Brně | Tři Mistři"><meta property="og:description" content="Dejte oknům, dveřím, pergole nebo plotu nový nátěr. V Brně a okolí obnovujeme dřevěné i kovové povrchy. Postup a ochranný nátěr zvolíme podle materiálu a jeho stavu.">
<meta property="og:url" content="https://trimistri.cz/natery-drevo-kovu"><meta property="og:image" content="https://trimistri.cz/assets/img/about.JPEG">
<meta name="twitter:card" content="summary_large_image"><link rel="icon" href="favicon.ico"><meta name="theme-color" content="#151719">
<?php require __DIR__ . '/includes/navrh-styles.php'; ?>
<?php require __DIR__ . '/includes/consent-head.php'; ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-18282958447"></script>
<script>gtag('js',new Date());gtag('config','AW-18282958447');</script>
<?php
$business = require __DIR__ . '/includes/business-data.php';
$schema = ['@context' => 'https://schema.org', '@graph' => [$business]];
$schema['@graph'][] = ['@type' => 'Service', 'name' => "Nátěry dřeva, oken a kovů v Brně | Tři Mistři", 'serviceType' => $defaultService, 'description' => "Dejte oknům, dveřím, pergole nebo plotu nový nátěr. V Brně a okolí obnovujeme dřevěné i kovové povrchy. Postup a ochranný nátěr zvolíme podle materiálu a jeho stavu.", 'provider' => $business, 'url' => 'https://trimistri.cz/' . $pageSlug];
$schema['@graph'][] = ['@type' => 'BreadcrumbList', 'itemListElement' => [['@type' => 'ListItem', 'position' => 1, 'name' => 'Domů', 'item' => 'https://trimistri.cz/'], ['@type' => 'ListItem', 'position' => 2, 'name' => 'Služby', 'item' => 'https://trimistri.cz/sluzby'], ['@type' => 'ListItem', 'position' => 3, 'name' => $defaultService, 'item' => 'https://trimistri.cz/' . $pageSlug]]];
$schema['@graph'][] = json_decode('{"@type": "FAQPage", "mainEntity": [{"@type": "Question", "name": "Co ovlivňuje cenu nátěru dřeva nebo kovu?", "acceptedAnswer": {"@type": "Answer", "text": "Rozhoduje plocha a členitost prvků, stav starého nátěru, rozsah přípravy, zvolený systém a přístup k povrchu. Pomohou nám fotografie celku i detailů a přibližné rozměry."}}, {"@type": "Question", "name": "Natíráte také okna a podbití?", "acceptedAnswer": {"@type": "Answer", "text": "Ano. Rozsah obnovy určíme podle materiálu a stavu původních vrstev."}}, {"@type": "Question", "name": "Stačí starý povrch jen přetřít?", "acceptedAnswer": {"@type": "Answer", "text": "Ne vždy. Nesoudržné vrstvy nebo koroze vyžadují odpovídající přípravu."}}]}', true);
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
      <span>Nátěry oken, podbití, dřeva a kovů</span>
    </nav>
    <div class="tm-detail-hero-grid">
      <div class="tm-detail-intro">
        <p class="tm-eyebrow"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M5 21V4l13-2v19M3 21h18M8 6v12M14 12h.01"/></svg> Tři Mistři / Brno a okolí</p>
        <h1 id="service-title">Nátěry dřeva, oken a kovů v Brně<span>.</span></h1>
        <p class="tm-detail-lead">Dejte oknům, dveřím, pergole nebo plotu nový nátěr. V Brně a okolí obnovujeme dřevěné i kovové povrchy. Postup a ochranný nátěr zvolíme podle materiálu a jeho stavu.</p>
        <div class="tm-detail-actions">
          <a class="tm-btn" href="#poptavka"><span class="tm-cta-label">Poptat nový nátěr</span><span aria-hidden="true">↗</span></a>
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
        <div class="tm-detail-cover-image"><img src="./assets/img/gallery/thumbs/naterydreva6-700w.webp" alt="Nátěr dřeva 1 - Blansko - Chata" width="700" height="1493" decoding="async" fetchpriority="high"></div>
        <figcaption><span><i aria-hidden="true"></i> Z naší práce</span><strong>Blansko - Chata</strong></figcaption>
      </figure>
          </div>
  </section>
<?php navrh_flush_first_view(); ?>

  <section class="tm-detail-section tm-container tm-detail-service-info" id="rozsah" aria-labelledby="scope-title">
    <div class="tm-detail-info-surface">
      <div class="tm-detail-overview-heading" data-tm-motion>
      <div><p class="tm-eyebrow">01 / O službě</p><h2 id="scope-title">Obnova a ochrana dřeva i kovu</h2></div>
      <p>Obnovujeme nátěry oken, dveří, podbití, pergol, plotů a kovových prvků. Přípravu a ochranu volíme podle materiálu a jeho stavu.</p>
    </div>
      <ul class="tm-detail-benefits">
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg></div><h3>Dřevěné prvky domu</h3><p>Obnovujeme nátěry dřevěných prvků domu i venkovních konstrukcí.</p></li>
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m12 2 8 3v6c0 5-4 9-8 11-4-2-8-6-8-11V5l8-3Zm-4 9 3 3 5-6"/></svg></div><h3>Pergoly, ploty a kov</h3><p>Zohledníme vystavení počasí i potřebnou ochranu kovových povrchů před korozí.</p></li>
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M5 21V4l13-2v19M3 21h18M8 6v12M14 12h.01"/></svg></div><h3>Očištění a příprava podkladu</h3><p>Nová vrstva musí navazovat na připravený podklad. Rozsah očištění a oprav určíme podle stavu povrchu.</p></li>
          </ul>
      <div class="tm-detail-info-columns">
        <div class="tm-detail-info-process" id="realizace-postup" aria-labelledby="process-title">
          <h3 class="tm-detail-info-title" id="process-title">Jak probíhá realizace</h3>
          <div class="tm-detail-work"><ol><li data-tm-motion><span class="tm-detail-step-number">01</span><div><h4>Posoudíme starý nátěr</h4><p>Projdeme materiál, poškození, korozi a přístup k jednotlivým prvkům.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">02</span><div><h4>Připravíme povrch</h4><p>Očistíme a podle stavu odstraníme nesoudržné vrstvy.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">03</span><div><h4>Zvolíme ochranu</h4><p>Základ a vrchní nátěr navrhneme podle materiálu a prostředí.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">04</span><div><h4>Dotáhneme hrany a spoje</h4><p>Dokončíme členité detaily a domluvený odstín.</p></div></li></ol></div>
        </div>
        <div class="tm-detail-info-questions" id="otazky" aria-labelledby="faq-title">
          <h3 class="tm-detail-info-title" id="faq-title">Cena a časté otázky</h3>
          <div class="tm-detail-faq">
            <details open><summary><span class="tm-faq-question">Co ovlivňuje cenu nátěru dřeva nebo kovu?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Rozhoduje plocha a členitost prvků, stav starého nátěru, rozsah přípravy, zvolený systém a přístup k povrchu. Pomohou nám fotografie celku i detailů a přibližné rozměry.</p></div></details>
            <details><summary><span class="tm-faq-question">Natíráte také okna a podbití?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Ano. Rozsah obnovy určíme podle materiálu a stavu původních vrstev.</p></div></details>
            <details><summary><span class="tm-faq-question">Stačí starý povrch jen přetřít?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Ne vždy. Nesoudržné vrstvy nebo koroze vyžadují odpovídající přípravu.</p></div></details>
          </div>
        </div>
      </div>
    </div>
  </section>

    <?php if (!navrh_cms_gallery($pageSlug)): ?>
<section class="tm-detail-showcase tm-detail-section tm-container" id="ukazky" aria-labelledby="showcase-title">
    <span class="tm-anchor" id="galerie"></span><span class="tm-anchor" id="web-realizace"></span><div class="tm-detail-section-heading"><div><p class="tm-eyebrow">02 / Ukázky realizací</p><h2 id="showcase-title">Podívejte se na výsledek.</h2></div><p>7 realizací · 13 fotografií</p></div>
    <div class="tm-project-grid tm-detail-projects">            <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-fc2848fd8b86" href="./assets/img/gallery/naterydreva6.jpeg" data-glightbox="title: Nátěr dřeva 1 - Blansko - Chata" aria-label="Nátěr dřeva — Blansko - Chata — prohlédnout 6 fotografií">
                <img data-src="./assets/img/gallery/thumbs/naterydreva6-700w.webp" alt="Nátěr dřeva 1 - Blansko - Chata" loading="lazy" width="700" height="1493" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/naterydreva6-700w.webp" alt="Nátěr dřeva 1 - Blansko - Chata" loading="lazy" width="700" height="1493" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dřevo a kov</span><span class="tm-project-photo-total">6 fotografií</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Blansko - Chata</span><h3>Nátěr dřeva</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden><a class="photo-link" data-gallery="tm-selected-fc2848fd8b86" href="./assets/img/gallery/naterydreva7.jpeg" data-glightbox="title: Nátěr dřeva 2 - Blansko - Chata" aria-label="Nátěr dřeva 2 - Blansko - Chata"></a><a class="photo-link" data-gallery="tm-selected-fc2848fd8b86" href="./assets/img/gallery/naterydreva8.jpeg" data-glightbox="title: Nátěr dřeva 3 - Blansko - Chata" aria-label="Nátěr dřeva 3 - Blansko - Chata"></a><a class="photo-link" data-gallery="tm-selected-fc2848fd8b86" href="./assets/img/gallery/naterydreva9.jpeg" data-glightbox="title: Nátěr dřeva 4 - Blansko - Chata" aria-label="Nátěr dřeva 4 - Blansko - Chata"></a><a class="photo-link" data-gallery="tm-selected-fc2848fd8b86" href="./assets/img/gallery/naterydreva10.jpeg" data-glightbox="title: Nátěr dřeva 5 - Blansko - Chata" aria-label="Nátěr dřeva 5 - Blansko - Chata"></a><a class="photo-link" data-gallery="tm-selected-fc2848fd8b86" href="./assets/img/gallery/naterydreva11.jpeg" data-glightbox="title: Nátěr dřeva 6 - Blansko - Chata" aria-label="Nátěr dřeva 6 - Blansko - Chata"></a></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-373a6f350286" href="./assets/img/gallery/naterydreva.jpeg" data-glightbox="title: Nátěr dřeva 8" aria-label="Nátěr dřeva — prohlédnout 1 fotografií">
                <img data-src="./assets/img/gallery/thumbs/naterydreva-700w.webp" alt="Nátěr dřeva 8" loading="lazy" width="700" height="1244" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/naterydreva-700w.webp" alt="Nátěr dřeva 8" loading="lazy" width="700" height="1244" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dřevo a kov</span><span class="tm-project-photo-total">1 fotografie</span>
                <span class="tm-project-overlay"><h3>Nátěr dřeva</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-484ae30daea2" href="./assets/img/gallery/naterydreva4.jpeg" data-glightbox="title: Nátěr dřeva 12" aria-label="Nátěr dřeva — prohlédnout 1 fotografií">
                <img data-src="./assets/img/gallery/thumbs/naterydreva4-700w.webp" alt="Nátěr dřeva 12" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/naterydreva4-700w.webp" alt="Nátěr dřeva 12" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dřevo a kov</span><span class="tm-project-photo-total">1 fotografie</span>
                <span class="tm-project-overlay"><h3>Nátěr dřeva</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-a49e1627b79e" href="./assets/img/gallery/naterydreva2.jpeg" data-glightbox="title: Nátěr dřeva 9" aria-label="Nátěr dřeva — prohlédnout 1 fotografií">
                <img data-src="./assets/img/gallery/thumbs/naterydreva2-700w.webp" alt="Nátěr dřeva 9" loading="lazy" width="700" height="1244" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/naterydreva2-700w.webp" alt="Nátěr dřeva 9" loading="lazy" width="700" height="1244" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dřevo a kov</span><span class="tm-project-photo-total">1 fotografie</span>
                <span class="tm-project-overlay"><h3>Nátěr dřeva</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden></div>
            </article>
            </div>
        <details class="tm-detail-more" id="tm-service-archive">
      <summary class="tm-btn"><span class="tm-more-closed">Zobrazit další realizace (3)</span><span aria-hidden="true">↓</span></summary>
      <div class="tm-project-grid tm-detail-projects">            <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-6edb9c2837a2" href="./assets/img/gallery/naterydreva3.jpeg" data-glightbox="title: Nátěr dřeva 10" aria-label="Nátěr dřeva — prohlédnout 1 fotografií">
                <img data-src="./assets/img/gallery/thumbs/naterydreva3-700w.webp" alt="Nátěr dřeva 10" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/naterydreva3-700w.webp" alt="Nátěr dřeva 10" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dřevo a kov</span><span class="tm-project-photo-total">1 fotografie</span>
                <span class="tm-project-overlay"><h3>Nátěr dřeva</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-17f7a44c8e3c" href="./assets/img/gallery/naterydreva12.jpeg" data-glightbox="title: Nátěr dřeva 11 - Brno - Jana Uhra" aria-label="Nátěr dřeva — Brno - Jana Uhra — prohlédnout 1 fotografií">
                <img data-src="./assets/img/gallery/thumbs/naterydreva12-700w.webp" alt="Nátěr dřeva 11 - Brno - Jana Uhra" loading="lazy" width="700" height="1499" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/naterydreva12-700w.webp" alt="Nátěr dřeva 11 - Brno - Jana Uhra" loading="lazy" width="700" height="1499" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dřevo a kov</span><span class="tm-project-photo-total">1 fotografie</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Brno - Jana Uhra</span><h3>Nátěr dřeva</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-24a3aabc620c" href="./assets/img/gallery/naterinterieru3.jpeg" data-glightbox="title: Nátěr kovu - Brno - Losova" aria-label="Nátěr kovu — Brno - Losova — prohlédnout 2 fotografií">
                <img data-src="./assets/img/gallery/thumbs/naterinterieru3-700w.webp" alt="Nátěr kovu - Brno - Losova" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/naterinterieru3-700w.webp" alt="Nátěr kovu - Brno - Losova" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Dřevo a kov</span><span class="tm-project-photo-total">2 fotografie</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Brno - Losova</span><h3>Nátěr kovu</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden><a class="photo-link" data-gallery="tm-selected-24a3aabc620c" href="./assets/img/gallery/naterinterieru4.jpeg" data-glightbox="title: Nátěr kovu - Brno - Losova" aria-label="Nátěr kovu - Brno - Losova"></a></div>
            </article>
            </div>
    </details>
      </section>
<?php endif; ?>

  <section class="tm-contact tm-detail-form-section" id="kontakt" data-nosnippet><div class="tm-container">
    <div class="tm-contact-heading" data-tm-motion><div class="tm-contact-copy"><p class="tm-eyebrow">03 / Nezávazná poptávka</p><h2>Pojďme se <em>domluvit.</em></h2><p>Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.</p></div><div class="tm-detail-form-aside"><strong>Pro první domluvu stačí:</strong><p>co a z jakého materiálu natíráme, počet prvků nebo jejich rozměry, fotografie starého nátěru a detailů.</p></div></div>
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
        <aside class="tm-inquiry-aside"><p class="tm-eyebrow">Váš prostor. Naše řemeslo.</p><h3>Pár detailů.<br>A začneme.</h3><p>Pošlete nám zadání. Rozsah práce, cenu i termín spolu upřesníme.</p><div class="tm-inquiry-service"><span>Co budeme řešit</span><strong data-form-service>Nátěry dřeva a kovů</strong></div><div class="tm-inquiry-direct"><span>Raději se domluvíte přímo?</span><a class="tm-call-btn" href="tel:+420774927182"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m6 3 3 5-2 2c2 4 3 5 7 7l2-2 5 3c0 3-2 4-4 3C9 19 5 15 3 7 2 5 3 3 6 3Z"/></svg><span>+420 774 927 182</span></a><a href="mailto:info@trimistri.cz">info@trimistri.cz</a></div><span class="tm-inquiry-area"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg> Brno a okolí</span></aside>
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
