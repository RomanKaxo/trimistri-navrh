<?php declare(strict_types=1);
require __DIR__ . '/includes/navrh-init.php';
$pageSlug = 'natery-fasad';
$isHome = false;
$isService = true;
$hasQuote = true;
$defaultService = 'Nátěry fasád';
?>
<!doctype html>
<html lang="cs">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Nátěry a renovace fasád v Brně | Tři Mistři</title><meta name="description" content="Obnovíme vzhled a nátěr fasády vašeho domu. V Brně a okolí řešíme přípravu povrchu, lokální opravy i sjednocení odstínu. Vhodný postup navrhneme podle stavu fasády.">
<link rel="canonical" href="https://trimistri.cz/natery-fasad">
<meta property="og:type" content="website"><meta property="og:site_name" content="Tři Mistři"><meta property="og:locale" content="cs_CZ">
<meta property="og:title" content="Nátěry a renovace fasád v Brně | Tři Mistři"><meta property="og:description" content="Obnovíme vzhled a nátěr fasády vašeho domu. V Brně a okolí řešíme přípravu povrchu, lokální opravy i sjednocení odstínu. Vhodný postup navrhneme podle stavu fasády.">
<meta property="og:url" content="https://trimistri.cz/natery-fasad"><meta property="og:image" content="https://trimistri.cz/assets/img/about.JPEG">
<meta name="twitter:card" content="summary_large_image"><link rel="icon" href="favicon.ico"><meta name="theme-color" content="#151719">
<?php require __DIR__ . '/includes/navrh-styles.php'; ?>
<?php require __DIR__ . '/includes/consent-head.php'; ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-18282958447"></script>
<script>gtag('js',new Date());gtag('config','AW-18282958447');</script>
<?php
$business = require __DIR__ . '/includes/business-data.php';
$schema = ['@context' => 'https://schema.org', '@graph' => [$business]];
$schema['@graph'][] = ['@type' => 'Service', 'name' => "Nátěry a renovace fasád v Brně | Tři Mistři", 'serviceType' => $defaultService, 'description' => "Obnovíme vzhled a nátěr fasády vašeho domu. V Brně a okolí řešíme přípravu povrchu, lokální opravy i sjednocení odstínu. Vhodný postup navrhneme podle stavu fasády.", 'provider' => $business, 'url' => 'https://trimistri.cz/' . $pageSlug];
$schema['@graph'][] = ['@type' => 'BreadcrumbList', 'itemListElement' => [['@type' => 'ListItem', 'position' => 1, 'name' => 'Domů', 'item' => 'https://trimistri.cz/'], ['@type' => 'ListItem', 'position' => 2, 'name' => 'Služby', 'item' => 'https://trimistri.cz/sluzby'], ['@type' => 'ListItem', 'position' => 3, 'name' => $defaultService, 'item' => 'https://trimistri.cz/' . $pageSlug]]];
$schema['@graph'][] = json_decode('{"@type": "FAQPage", "mainEntity": [{"@type": "Question", "name": "Jak se stanovuje cena nátěru fasády za m²?", "acceptedAnswer": {"@type": "Answer", "text": "Samotná výměra nestačí. Cenu ovlivňuje stav a členitost fasády, příprava, opravy, počet vrstev i přístup k domu. Pošlete fotografie, přibližnou plochu a místo realizace; upřesníme rozsah nabídky."}}, {"@type": "Question", "name": "Potřebuji nový nátěr, nebo jen čištění?", "acceptedAnswer": {"@type": "Answer", "text": "To závisí na stavu omítky a typu znečištění. Nabízíme také samostatné čištění fasád."}}, {"@type": "Question", "name": "Vyřeší nový nátěr graffiti?", "acceptedAnswer": {"@type": "Answer", "text": "Podle podkladu volíme čištění, odstranění nebo překrytí. Pro tento problém máme samostatnou službu."}}]}', true);
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
      <span>Nátěry a renovace fasád</span>
    </nav>
    <div class="tm-detail-hero-grid">
      <div class="tm-detail-intro">
        <p class="tm-eyebrow"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m2 11 10-8 10 8M5 9v12h14V9M10 21v-7h4v7M7 12h2M15 12h2"/></svg> Tři Mistři / Brno a okolí</p>
        <h1 id="service-title">Nátěry a renovace fasád v Brně<span>.</span></h1>
        <p class="tm-detail-lead">Obnovíme vzhled a nátěr fasády vašeho domu. V Brně a okolí řešíme přípravu povrchu, lokální opravy i sjednocení odstínu. Vhodný postup navrhneme podle stavu fasády.</p>
        <div class="tm-detail-actions">
          <a class="tm-btn" href="#poptavka"><span class="tm-cta-label">Poptat nátěr fasády</span><span aria-hidden="true">↗</span></a>
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
        <div class="tm-detail-cover-image"><img src="./assets/img/gallery/thumbs/fasadynatery18-700w.webp" alt="Nátěr fasády 3 - Starez Aréna Brno" fetchpriority="high"></div>
        <figcaption><span><i aria-hidden="true"></i> Z naší práce</span><strong>Starez Aréna Brno</strong></figcaption>
      </figure>
          </div>
  </section>

  <section class="tm-detail-section tm-container tm-detail-service-info" id="rozsah" aria-labelledby="scope-title">
    <div class="tm-detail-info-surface">
      <div class="tm-detail-overview-heading" data-tm-motion>
      <div><p class="tm-eyebrow">01 / O službě</p><h2 id="scope-title">Příprava fasády a nový ochranný nátěr</h2></div>
      <p>Nejdřív posoudíme původní vrstvy a rozsah oprav. Potom zvolíme nátěrový systém a domluvíme nový odstín.</p>
    </div>
      <ul class="tm-detail-benefits">
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg></div><h3>Posouzení a příprava fasády</h3><p>Před nátěrem posoudíme podklad, původní vrstvy a potřebný rozsah oprav.</p></li>
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m12 2 8 3v6c0 5-4 9-8 11-4-2-8-6-8-11V5l8-3Zm-4 9 3 3 5-6"/></svg></div><h3>Opravy, vrstvy a odstín</h3><p>Přípravu a nátěrový systém zvolíme tak, aby odpovídaly konkrétnímu povrchu.</p></li>
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m2 11 10-8 10 8M5 9v12h14V9M10 21v-7h4v7M7 12h2M15 12h2"/></svg></div><h3>Čištění a odstranění graffiti</h3><p>Potřebujete fasádu především vyčistit nebo odstranit graffiti? Nabízíme také samostatné řešení těchto prací.</p></li>
          </ul>
      <div class="tm-detail-info-columns">
        <div class="tm-detail-info-process" id="realizace-postup" aria-labelledby="process-title">
          <h3 class="tm-detail-info-title" id="process-title">Jak probíhá realizace</h3>
          <div class="tm-detail-work"><ol><li data-tm-motion><span class="tm-detail-step-number">01</span><div><h4>Prohlédneme fasádu</h4><p>Zkontrolujeme omítku, původní vrstvy a rozsah poškození.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">02</span><div><h4>Očistíme a opravíme</h4><p>Připravíme podklad pro navazující nátěrový systém.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">03</span><div><h4>Sjednotíme odstín</h4><p>Domluvíme barevnost a provedeme odpovídající vrstvy.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">04</span><div><h4>Projdeme celý výsledek</h4><p>Zkontrolujeme detaily, napojení a dokončení zakázky.</p></div></li></ol></div>
        </div>
        <div class="tm-detail-info-questions" id="otazky" aria-labelledby="faq-title">
          <h3 class="tm-detail-info-title" id="faq-title">Cena a časté otázky</h3>
          <div class="tm-detail-faq">
            <details open><summary><span class="tm-faq-question">Jak se stanovuje cena nátěru fasády za m²?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Samotná výměra nestačí. Cenu ovlivňuje stav a členitost fasády, příprava, opravy, počet vrstev i přístup k domu. Pošlete fotografie, přibližnou plochu a místo realizace; upřesníme rozsah nabídky.</p></div></details>
            <details><summary><span class="tm-faq-question">Potřebuji nový nátěr, nebo jen čištění?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>To závisí na stavu omítky a typu znečištění. Nabízíme také samostatné čištění fasád.</p></div></details>
            <details><summary><span class="tm-faq-question">Vyřeší nový nátěr graffiti?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Podle podkladu volíme čištění, odstranění nebo překrytí. Pro tento problém máme samostatnou službu.</p></div></details>
          </div>
        </div>
      </div>
    </div>
  </section>

    <?php if (!navrh_cms_gallery($pageSlug)): ?>
<section class="tm-detail-showcase tm-detail-section tm-container" id="ukazky" aria-labelledby="showcase-title">
    <span class="tm-anchor" id="galerie"></span><span class="tm-anchor" id="web-realizace"></span><div class="tm-detail-section-heading"><div><p class="tm-eyebrow">02 / Ukázky realizací</p><h2 id="showcase-title">Podívejte se na výsledek.</h2></div><p>5 realizací · 33 fotografií</p></div>
    <div class="tm-project-grid tm-detail-projects">            <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-55f276719017" href="./assets/img/gallery/fasadynatery18.jpeg" data-glightbox="title: Nátěr fasády 3 - Starez Aréna Brno" aria-label="Nátěr fasády — Starez Aréna Brno — prohlédnout 2 fotografií">
                <img src="./assets/img/gallery/thumbs/fasadynatery18-700w.webp" alt="Nátěr fasády 3 - Starez Aréna Brno" loading="lazy">
                <span class="tm-project-kind">Fasády</span><span class="tm-project-photo-total">2 fotografie</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Starez Aréna Brno</span><h3>Nátěr fasády</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden><a class="photo-link" data-gallery="tm-selected-55f276719017" href="./assets/img/gallery/fasadynatery18b.jpeg" data-glightbox="title: Nátěr fasády 4 - Starez Aréna Brno" aria-label="Nátěr fasády 4 - Starez Aréna Brno"></a></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-b799aa2ecbee" href="./assets/img/gallery/fasadynatery19.jpeg" data-glightbox="title: Nátěr fasády 5 - Brno - Krásného" aria-label="Nátěr fasády — Brno - Krásného — prohlédnout 3 fotografií">
                <img src="./assets/img/gallery/thumbs/fasadynatery19-700w.webp" alt="Nátěr fasády 5 - Brno - Krásného" loading="lazy">
                <span class="tm-project-kind">Fasády</span><span class="tm-project-photo-total">3 fotografie</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Brno - Krásného</span><h3>Nátěr fasády</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden><a class="photo-link" data-gallery="tm-selected-b799aa2ecbee" href="./assets/img/gallery/fasadynatery20.jpeg" data-glightbox="title: Nátěr fasády 6 - Brno - Krásného" aria-label="Nátěr fasády 6 - Brno - Krásného"></a><a class="photo-link" data-gallery="tm-selected-b799aa2ecbee" href="./assets/img/gallery/fasadynatery21.jpeg" data-glightbox="title: Nátěr fasády 7 - Brno - Krásného" aria-label="Nátěr fasády 7 - Brno - Krásného"></a></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-6ab217f17943" href="./assets/img/gallery/grafiti9.jpeg" data-glightbox="title: Nátěr fasády - Česká - před 1" aria-label="Nátěr fasády — Česká — prohlédnout 4 fotografií">
                <img src="./assets/img/gallery/thumbs/FasadyNatery2-700w.webp" alt="Nátěr fasády - Česká - po" loading="lazy">
                <span class="tm-project-kind">Fasády</span><span class="tm-project-photo-total">4 fotografie</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Česká</span><h3>Nátěr fasády</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden><a class="photo-link" data-gallery="tm-selected-6ab217f17943" href="./assets/img/gallery/grafiti7.jpeg" data-glightbox="title: Nátěr fasády - Česká - před 2" aria-label="Nátěr fasády - Česká - před 2"></a><a class="photo-link" data-gallery="tm-selected-6ab217f17943" href="./assets/img/gallery/grafiti8.jpeg" data-glightbox="title: Nátěr fasády - Česká - před 3" aria-label="Nátěr fasády - Česká - před 3"></a><a class="photo-link" data-gallery="tm-selected-6ab217f17943" href="./assets/img/gallery/FasadyNatery2.jpg" data-glightbox="title: Nátěr fasády - Česká - po" aria-label="Nátěr fasády - Česká - po"></a></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-c0b206e4b367" href="./assets/img/gallery/FasadyNatery.jpeg" data-glightbox="title: Nátěr fasády - Rozdrojovice Fasáda - před" aria-label="Nátěr fasády — Rozdrojovice Fasáda — prohlédnout 14 fotografií">
                <img src="./assets/img/gallery/thumbs/fasadynatery13-700w.webp" alt="Nátěr fasády - Rozdrojovice Fasáda - po" loading="lazy">
                <span class="tm-project-kind">Fasády</span><span class="tm-project-photo-total">14 fotografií</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Rozdrojovice Fasáda</span><h3>Nátěr fasády</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden><a class="photo-link" data-gallery="tm-selected-c0b206e4b367" href="./assets/img/gallery/fasadynatery16.jpeg" data-glightbox="title: Nátěr fasády - Rozdrojovice Fasáda - před" aria-label="Nátěr fasády - Rozdrojovice Fasáda - před"></a><a class="photo-link" data-gallery="tm-selected-c0b206e4b367" href="./assets/img/gallery/fasadynatery17.jpeg" data-glightbox="title: Nátěr fasády - Rozdrojovice Fasáda - před" aria-label="Nátěr fasády - Rozdrojovice Fasáda - před"></a><a class="photo-link" data-gallery="tm-selected-c0b206e4b367" href="./assets/img/gallery/fasadynatery13.jpeg" data-glightbox="title: Nátěr fasády - Rozdrojovice Fasáda - po" aria-label="Nátěr fasády - Rozdrojovice Fasáda - po"></a><a class="photo-link" data-gallery="tm-selected-c0b206e4b367" href="./assets/img/gallery/fasadynatery14.jpeg" data-glightbox="title: Nátěr fasády - Rozdrojovice Fasáda - po" aria-label="Nátěr fasády - Rozdrojovice Fasáda - po"></a><a class="photo-link" data-gallery="tm-selected-c0b206e4b367" href="./assets/img/gallery/fasadynatery15.jpeg" data-glightbox="title: Nátěr fasády - Rozdrojovice Fasáda - po" aria-label="Nátěr fasády - Rozdrojovice Fasáda - po"></a><a class="photo-link" data-gallery="tm-selected-c0b206e4b367" href="./assets/img/gallery/fasadynatery22.jpeg" data-glightbox="title: Nátěr fasády - Rozdrojovice Fasáda - po" aria-label="Nátěr fasády - Rozdrojovice Fasáda - po"></a><a class="photo-link" data-gallery="tm-selected-c0b206e4b367" href="./assets/img/gallery/fasadynatery23.jpeg" data-glightbox="title: Nátěr fasády - Rozdrojovice Fasáda - po" aria-label="Nátěr fasády - Rozdrojovice Fasáda - po"></a><a class="photo-link" data-gallery="tm-selected-c0b206e4b367" href="./assets/img/gallery/fasadynatery24.jpeg" data-glightbox="title: Nátěr fasády - Rozdrojovice Fasáda - po" aria-label="Nátěr fasády - Rozdrojovice Fasáda - po"></a><a class="photo-link" data-gallery="tm-selected-c0b206e4b367" href="./assets/img/gallery/fasadynatery25.jpeg" data-glightbox="title: Nátěr fasády - Rozdrojovice Fasáda - po" aria-label="Nátěr fasády - Rozdrojovice Fasáda - po"></a><a class="photo-link" data-gallery="tm-selected-c0b206e4b367" href="./assets/img/gallery/fasadynatery26.jpeg" data-glightbox="title: Nátěr fasády - Rozdrojovice Fasáda - po" aria-label="Nátěr fasády - Rozdrojovice Fasáda - po"></a><a class="photo-link" data-gallery="tm-selected-c0b206e4b367" href="./assets/img/gallery/fasadynatery27.jpeg" data-glightbox="title: Nátěr fasády - Rozdrojovice Fasáda - po" aria-label="Nátěr fasády - Rozdrojovice Fasáda - po"></a><a class="photo-link" data-gallery="tm-selected-c0b206e4b367" href="./assets/img/gallery/fasadynatery28.jpeg" data-glightbox="title: Nátěr fasády - Rozdrojovice Fasáda - po" aria-label="Nátěr fasády - Rozdrojovice Fasáda - po"></a><a class="photo-link" data-gallery="tm-selected-c0b206e4b367" href="./assets/img/gallery/fasadynatery29.jpeg" data-glightbox="title: Nátěr fasády - Rozdrojovice Fasáda - po" aria-label="Nátěr fasády - Rozdrojovice Fasáda - po"></a></div>
            </article>
            </div>
        <details class="tm-detail-more" id="tm-service-archive">
      <summary class="tm-btn"><span class="tm-more-closed">Zobrazit další realizace (1)</span><span aria-hidden="true">↓</span></summary>
      <div class="tm-project-grid tm-detail-projects">            <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-3d8ef65762de" href="./assets/img/gallery/fasadynatery3.jpeg" data-glightbox="title: Nátěr fasády 8" aria-label="Nátěr fasády — prohlédnout 10 fotografií">
                <img src="./assets/img/gallery/thumbs/fasadynatery3-700w.webp" alt="Nátěr fasády 8" loading="lazy">
                <span class="tm-project-kind">Fasády</span><span class="tm-project-photo-total">10 fotografií</span>
                <span class="tm-project-overlay"><h3>Nátěr fasády</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden><a class="photo-link" data-gallery="tm-selected-3d8ef65762de" href="./assets/img/gallery/fasadynatery4.jpeg" data-glightbox="title: Nátěr fasády 9" aria-label="Nátěr fasády 9"></a><a class="photo-link" data-gallery="tm-selected-3d8ef65762de" href="./assets/img/gallery/fasadynatery5.jpeg" data-glightbox="title: Nátěr fasády 10" aria-label="Nátěr fasády 10"></a><a class="photo-link" data-gallery="tm-selected-3d8ef65762de" href="./assets/img/gallery/fasadynatery6.jpeg" data-glightbox="title: Nátěr fasády 11" aria-label="Nátěr fasády 11"></a><a class="photo-link" data-gallery="tm-selected-3d8ef65762de" href="./assets/img/gallery/fasadynatery7.jpeg" data-glightbox="title: Nátěr fasády 12" aria-label="Nátěr fasády 12"></a><a class="photo-link" data-gallery="tm-selected-3d8ef65762de" href="./assets/img/gallery/fasadynatery8.jpeg" data-glightbox="title: Nátěr fasády 13" aria-label="Nátěr fasády 13"></a><a class="photo-link" data-gallery="tm-selected-3d8ef65762de" href="./assets/img/gallery/fasadynatery9.jpeg" data-glightbox="title: Nátěr fasády 14" aria-label="Nátěr fasády 14"></a><a class="photo-link" data-gallery="tm-selected-3d8ef65762de" href="./assets/img/gallery/fasadynatery10.jpeg" data-glightbox="title: Nátěr fasády 15" aria-label="Nátěr fasády 15"></a><a class="photo-link" data-gallery="tm-selected-3d8ef65762de" href="./assets/img/gallery/fasadynatery11.jpeg" data-glightbox="title: Nátěr fasády 16" aria-label="Nátěr fasády 16"></a><a class="photo-link" data-gallery="tm-selected-3d8ef65762de" href="./assets/img/gallery/fasadynatery12.jpeg" data-glightbox="title: Nátěr fasády 17" aria-label="Nátěr fasády 17"></a></div>
            </article>
            </div>
    </details>
      </section>
<?php endif; ?>

  <section class="tm-contact tm-detail-form-section" id="kontakt"><div class="tm-container">
    <div class="tm-contact-heading" data-tm-motion><div class="tm-contact-copy"><p class="tm-eyebrow">03 / Nezávazná poptávka</p><h2>Pojďme se <em>domluvit.</em></h2><p>Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.</p></div><div class="tm-detail-form-aside"><strong>Pro první domluvu stačí:</strong><p>fotografie celé fasády a poškození, přibližná plocha a výška domu, informace o přístupu kolem domu.</p></div></div>
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
        <aside class="tm-inquiry-aside"><p class="tm-eyebrow">Váš prostor. Naše řemeslo.</p><h3>Pár detailů.<br>A začneme.</h3><p>Pošlete nám zadání. Rozsah práce, cenu i termín spolu upřesníme.</p><div class="tm-inquiry-service"><span>Co budeme řešit</span><strong data-form-service>Nátěry fasád</strong></div><div class="tm-inquiry-direct"><span>Raději se domluvíte přímo?</span><a class="tm-call-btn" href="tel:+420774927182"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m6 3 3 5-2 2c2 4 3 5 7 7l2-2 5 3c0 3-2 4-4 3C9 19 5 15 3 7 2 5 3 3 6 3Z"/></svg><span>+420 774 927 182</span></a><a href="mailto:info@trimistri.cz">info@trimistri.cz</a></div><span class="tm-inquiry-area"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg> Brno a okolí</span></aside>
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
