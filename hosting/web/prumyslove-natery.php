<?php declare(strict_types=1);
require __DIR__ . '/includes/navrh-init.php';
$pageSlug = 'prumyslove-natery';
$isHome = false;
$isService = true;
$hasQuote = true;
$defaultService = 'Ocelové konstrukce';
?>
<!doctype html>
<html lang="cs">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Průmyslové a antikorozní nátěry v Brně | Tři Mistři</title><meta name="description" content="Nátěry ocelových konstrukcí, hal a namáhaných kovových prvků v Brně a okolí. Posoudíme stav povrchu i podmínky provozu a navrhneme přípravu a vhodný ochranný systém.">
<link rel="canonical" href="https://trimistri.cz/prumyslove-natery">
<meta property="og:type" content="website"><meta property="og:site_name" content="Tři Mistři"><meta property="og:locale" content="cs_CZ">
<meta property="og:title" content="Průmyslové a antikorozní nátěry v Brně | Tři Mistři"><meta property="og:description" content="Nátěry ocelových konstrukcí, hal a namáhaných kovových prvků v Brně a okolí. Posoudíme stav povrchu i podmínky provozu a navrhneme přípravu a vhodný ochranný systém.">
<meta property="og:url" content="https://trimistri.cz/prumyslove-natery"><meta property="og:image" content="https://trimistri.cz/assets/img/about.JPEG">
<meta name="twitter:card" content="summary_large_image"><link rel="icon" href="favicon.ico"><meta name="theme-color" content="#151719">
<?php require __DIR__ . '/includes/navrh-styles.php'; ?>
<?php require __DIR__ . '/includes/consent-head.php'; ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-18282958447"></script>
<script>gtag('js',new Date());gtag('config','AW-18282958447');</script>
<?php
$business = require __DIR__ . '/includes/business-data.php';
$schema = ['@context' => 'https://schema.org', '@graph' => [$business]];
$schema['@graph'][] = ['@type' => 'Service', 'name' => "Průmyslové a antikorozní nátěry v Brně | Tři Mistři", 'serviceType' => $defaultService, 'description' => "Nátěry ocelových konstrukcí, hal a namáhaných kovových prvků v Brně a okolí. Posoudíme stav povrchu i podmínky provozu a navrhneme přípravu a vhodný ochranný systém.", 'provider' => $business, 'url' => 'https://trimistri.cz/' . $pageSlug];
$schema['@graph'][] = ['@type' => 'BreadcrumbList', 'itemListElement' => [['@type' => 'ListItem', 'position' => 1, 'name' => 'Domů', 'item' => 'https://trimistri.cz/'], ['@type' => 'ListItem', 'position' => 2, 'name' => 'Služby', 'item' => 'https://trimistri.cz/sluzby'], ['@type' => 'ListItem', 'position' => 3, 'name' => $defaultService, 'item' => 'https://trimistri.cz/' . $pageSlug]]];
$schema['@graph'][] = json_decode('{"@type": "FAQPage", "mainEntity": [{"@type": "Question", "name": "Jak se stanovuje cena průmyslových nátěrů?", "acceptedAnswer": {"@type": "Answer", "text": "Rozhoduje plocha a členitost konstrukcí, stupeň koroze, potřebná příprava, výška a omezení provozu. Pošlete fotografie a rozsah prací; podrobnosti upřesníme při prohlídce."}}, {"@type": "Question", "name": "Natíráte ocelové konstrukce?", "acceptedAnswer": {"@type": "Answer", "text": "Ano. Rozsah přípravy a ochranu volíme podle stavu a namáhání prvků."}}, {"@type": "Question", "name": "Lze pracovat za provozu?", "acceptedAnswer": {"@type": "Answer", "text": "Záleží na prostoru, přístupu a podmínkách realizace. Omezení provozu probereme před nabídkou."}}]}', true);
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
      <span>Průmyslové a antikorozní nátěry</span>
    </nav>
    <div class="tm-detail-hero-grid">
      <div class="tm-detail-intro">
        <p class="tm-eyebrow"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M4 21V3h12v7M7 6h2m3 0h1M7 10h2m3 0h1M7 14h2M3 21h8M16 12l4 2v5l-4 2-4-2v-5l4-2Zm0 3v3m-1.5-1.5h3"/></svg> Tři Mistři / Brno a okolí</p>
        <h1 id="service-title">Průmyslové a antikorozní nátěry v Brně<span>.</span></h1>
        <p class="tm-detail-lead">Nátěry ocelových konstrukcí, hal a namáhaných kovových prvků v Brně a okolí. Posoudíme stav povrchu i podmínky provozu a navrhneme přípravu a vhodný ochranný systém.</p>
        <div class="tm-detail-actions">
          <a class="tm-btn" href="#poptavka"><span class="tm-cta-label">Poptat nátěry konstrukcí</span><span aria-hidden="true">↗</span></a>
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
        <div class="tm-detail-cover-image"><img src="./assets/img/gallery/thumbs/prumyslovenatery12-700w.webp" alt="Průmyslový nátěr 1 - Opatovice" fetchpriority="high"></div>
        <figcaption><span><i aria-hidden="true"></i> Z naší práce</span><strong>Opatovice</strong></figcaption>
      </figure>
          </div>
  </section>

  <section class="tm-detail-section tm-container tm-detail-service-info" id="rozsah" aria-labelledby="scope-title">
    <div class="tm-detail-info-surface">
      <div class="tm-detail-overview-heading" data-tm-motion>
      <div><p class="tm-eyebrow">01 / O službě</p><h2 id="scope-title">Ochranné nátěry konstrukcí a hal</h2></div>
      <p>Nátěrový systém volíme podle materiálu a namáhání. Předem upřesníme přípravu povrchu, přístup a případná omezení provozu.</p>
    </div>
      <ul class="tm-detail-benefits">
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg></div><h3>Konstrukce a průmyslové haly</h3><p>Rozsah nátěrů přizpůsobíme objektu, přístupu a způsobu používání provozu.</p></li>
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m12 2 8 3v6c0 5-4 9-8 11-4-2-8-6-8-11V5l8-3Zm-4 9 3 3 5-6"/></svg></div><h3>Příprava povrchu</h3><p>Před ochrannými vrstvami řešíme očištění a stav původních nátěrů i koroze.</p></li>
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M4 21V3h12v7M7 6h2m3 0h1M7 10h2m3 0h1M7 14h2M3 21h8M16 12l4 2v5l-4 2-4-2v-5l4-2Zm0 3v3m-1.5-1.5h3"/></svg></div><h3>Ochrana podle provozu</h3><p>Nátěrový systém volíme podle materiálu a namáhání konkrétních prvků.</p></li>
          </ul>
      <div class="tm-detail-info-columns">
        <div class="tm-detail-info-process" id="realizace-postup" aria-labelledby="process-title">
          <h3 class="tm-detail-info-title" id="process-title">Jak probíhá realizace</h3>
          <div class="tm-detail-work"><ol><li data-tm-motion><span class="tm-detail-step-number">01</span><div><h4>Projdeme objekt a provoz</h4><p>Upřesníme rozsah konstrukcí, namáhání a možnosti přístupu.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">02</span><div><h4>Navrhneme systém</h4><p>Stanovíme potřebnou přípravu a ochranné vrstvy.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">03</span><div><h4>Připravíme a natřeme</h4><p>Očistíme povrch a provedeme domluvený systém.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">04</span><div><h4>Zkontrolujeme dokončení</h4><p>Projdeme rozsah prací a předání podle dohody.</p></div></li></ol></div>
        </div>
        <div class="tm-detail-info-questions" id="otazky" aria-labelledby="faq-title">
          <h3 class="tm-detail-info-title" id="faq-title">Cena a časté otázky</h3>
          <div class="tm-detail-faq">
            <details open><summary><span class="tm-faq-question">Jak se stanovuje cena průmyslových nátěrů?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Rozhoduje plocha a členitost konstrukcí, stupeň koroze, potřebná příprava, výška a omezení provozu. Pošlete fotografie a rozsah prací; podrobnosti upřesníme při prohlídce.</p></div></details>
            <details><summary><span class="tm-faq-question">Natíráte ocelové konstrukce?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Ano. Rozsah přípravy a ochranu volíme podle stavu a namáhání prvků.</p></div></details>
            <details><summary><span class="tm-faq-question">Lze pracovat za provozu?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Záleží na prostoru, přístupu a podmínkách realizace. Omezení provozu probereme před nabídkou.</p></div></details>
          </div>
        </div>
      </div>
    </div>
  </section>

    <?php if (!navrh_cms_gallery($pageSlug)): ?>
<section class="tm-detail-showcase tm-detail-section tm-container" id="ukazky" aria-labelledby="showcase-title">
    <span class="tm-anchor" id="galerie"></span><span class="tm-anchor" id="web-realizace"></span><div class="tm-detail-section-heading"><div><p class="tm-eyebrow">02 / Ukázky realizací</p><h2 id="showcase-title">Podívejte se na výsledek.</h2></div><p>1 realizace · 13 fotografií</p></div>
    <div class="tm-project-grid tm-detail-projects">            <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-656e04ce219a" href="./assets/img/gallery/prumyslovenatery12.jpeg" data-glightbox="title: Průmyslový nátěr 1 - Opatovice" aria-label="Průmyslový nátěr — Opatovice — prohlédnout 13 fotografií">
                <img src="./assets/img/gallery/thumbs/prumyslovenatery12-700w.webp" alt="Průmyslový nátěr 1 - Opatovice" loading="lazy">
                <span class="tm-project-kind">Průmyslové nátěry</span><span class="tm-project-photo-total">13 fotografií</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Opatovice</span><h3>Průmyslový nátěr</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden><a class="photo-link" data-gallery="tm-selected-656e04ce219a" href="./assets/img/gallery/prumyslovenatery13.jpeg" data-glightbox="title: Průmyslový nátěr 2 - Opatovice" aria-label="Průmyslový nátěr 2 - Opatovice"></a><a class="photo-link" data-gallery="tm-selected-656e04ce219a" href="./assets/img/gallery/prumyslovenatery14.jpeg" data-glightbox="title: Průmyslový nátěr 3 - Opatovice" aria-label="Průmyslový nátěr 3 - Opatovice"></a><a class="photo-link" data-gallery="tm-selected-656e04ce219a" href="./assets/img/gallery/prumyslovenatery15.jpeg" data-glightbox="title: Průmyslový nátěr 4 - Opatovice" aria-label="Průmyslový nátěr 4 - Opatovice"></a><a class="photo-link" data-gallery="tm-selected-656e04ce219a" href="./assets/img/gallery/prumyslovenatery16.jpeg" data-glightbox="title: Průmyslový nátěr 5 - Opatovice" aria-label="Průmyslový nátěr 5 - Opatovice"></a><a class="photo-link" data-gallery="tm-selected-656e04ce219a" href="./assets/img/gallery/prumyslovenatery17.jpeg" data-glightbox="title: Průmyslový nátěr 6 - Opatovice" aria-label="Průmyslový nátěr 6 - Opatovice"></a><a class="photo-link" data-gallery="tm-selected-656e04ce219a" href="./assets/img/gallery/prumyslovenatery18.jpeg" data-glightbox="title: Průmyslový nátěr 7 - Opatovice" aria-label="Průmyslový nátěr 7 - Opatovice"></a><a class="photo-link" data-gallery="tm-selected-656e04ce219a" href="./assets/img/gallery/prumyslovenatery19.jpeg" data-glightbox="title: Průmyslový nátěr 8 - Opatovice" aria-label="Průmyslový nátěr 8 - Opatovice"></a><a class="photo-link" data-gallery="tm-selected-656e04ce219a" href="./assets/img/gallery/prumyslovenatery20.jpeg" data-glightbox="title: Průmyslový nátěr 9 - Opatovice" aria-label="Průmyslový nátěr 9 - Opatovice"></a><a class="photo-link" data-gallery="tm-selected-656e04ce219a" href="./assets/img/gallery/prumyslovenatery21.jpeg" data-glightbox="title: Průmyslový nátěr 10 - Opatovice" aria-label="Průmyslový nátěr 10 - Opatovice"></a><a class="photo-link" data-gallery="tm-selected-656e04ce219a" href="./assets/img/gallery/prumyslovenatery22.jpeg" data-glightbox="title: Průmyslový nátěr 11 - Opatovice" aria-label="Průmyslový nátěr 11 - Opatovice"></a><a class="photo-link" data-gallery="tm-selected-656e04ce219a" href="./assets/img/gallery/prumyslovenatery23.jpeg" data-glightbox="title: Průmyslový nátěr 12 - Opatovice" aria-label="Průmyslový nátěr 12 - Opatovice"></a><a class="photo-link" data-gallery="tm-selected-656e04ce219a" href="./assets/img/gallery/prumyslovenatery24.jpeg" data-glightbox="title: Průmyslový nátěr 13 - Opatovice" aria-label="Průmyslový nátěr 13 - Opatovice"></a></div>
            </article>
            </div>
      </section>
<?php endif; ?>

  <section class="tm-contact tm-detail-form-section" id="kontakt"><div class="tm-container">
    <div class="tm-contact-heading" data-tm-motion><div class="tm-contact-copy"><p class="tm-eyebrow">03 / Nezávazná poptávka</p><h2>Pojďme se <em>domluvit.</em></h2><p>Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.</p></div><div class="tm-detail-form-aside"><strong>Pro první domluvu stačí:</strong><p>rozměry a fotografie konstrukcí, stav koroze a starých vrstev, přístup a omezení vašeho provozu.</p></div></div>
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
        <aside class="tm-inquiry-aside"><p class="tm-eyebrow">Váš prostor. Naše řemeslo.</p><h3>Pár detailů.<br>A začneme.</h3><p>Pošlete nám zadání. Rozsah práce, cenu i termín spolu upřesníme.</p><div class="tm-inquiry-service"><span>Co budeme řešit</span><strong data-form-service>Ocelové konstrukce</strong></div><div class="tm-inquiry-direct"><span>Raději se domluvíte přímo?</span><a class="tm-call-btn" href="tel:+420774927182"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m6 3 3 5-2 2c2 4 3 5 7 7l2-2 5 3c0 3-2 4-4 3C9 19 5 15 3 7 2 5 3 3 6 3Z"/></svg><span>+420 774 927 182</span></a><a href="mailto:info@trimistri.cz">info@trimistri.cz</a></div><span class="tm-inquiry-area"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg> Brno a okolí</span></aside>
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
