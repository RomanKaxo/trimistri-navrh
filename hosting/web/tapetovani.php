<?php declare(strict_types=1);
require __DIR__ . '/includes/navrh-init.php';
$pageSlug = 'tapetovani';
$isHome = false;
$isService = true;
$hasQuote = true;
$defaultService = 'Tapetování';
?>
<!doctype html>
<html lang="cs">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tapetování a lepení tapet v Brně | Tři Mistři</title><meta name="description" content="Hledáte tapetáře v Brně nebo okolí? Lepíme klasické, vliesové i vinylové tapety a fototapety. Připravíme stěnu, navážeme vzor a dokončíme rohy i okraje.">
<link rel="canonical" href="https://trimistri.cz/tapetovani">
<meta property="og:type" content="website"><meta property="og:site_name" content="Tři Mistři"><meta property="og:locale" content="cs_CZ">
<meta property="og:title" content="Tapetování a lepení tapet v Brně | Tři Mistři"><meta property="og:description" content="Hledáte tapetáře v Brně nebo okolí? Lepíme klasické, vliesové i vinylové tapety a fototapety. Připravíme stěnu, navážeme vzor a dokončíme rohy i okraje.">
<meta property="og:url" content="https://trimistri.cz/tapetovani"><meta property="og:image" content="https://trimistri.cz/assets/img/about.JPEG">
<meta name="twitter:card" content="summary_large_image"><link rel="icon" href="favicon.ico"><meta name="theme-color" content="#151719">
<?php require __DIR__ . '/includes/navrh-styles.php'; ?>
<?php require __DIR__ . '/includes/consent-head.php'; ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-18282958447"></script>
<script>gtag('js',new Date());gtag('config','AW-18282958447');</script>
<?php
$business = require __DIR__ . '/includes/business-data.php';
$schema = ['@context' => 'https://schema.org', '@graph' => [$business]];
$schema['@graph'][] = ['@type' => 'Service', 'name' => "Tapetování a lepení tapet v Brně | Tři Mistři", 'serviceType' => $defaultService, 'description' => "Hledáte tapetáře v Brně nebo okolí? Lepíme klasické, vliesové i vinylové tapety a fototapety. Připravíme stěnu, navážeme vzor a dokončíme rohy i okraje.", 'provider' => $business, 'url' => 'https://trimistri.cz/' . $pageSlug];
$schema['@graph'][] = ['@type' => 'BreadcrumbList', 'itemListElement' => [['@type' => 'ListItem', 'position' => 1, 'name' => 'Domů', 'item' => 'https://trimistri.cz/'], ['@type' => 'ListItem', 'position' => 2, 'name' => 'Služby', 'item' => 'https://trimistri.cz/sluzby'], ['@type' => 'ListItem', 'position' => 3, 'name' => $defaultService, 'item' => 'https://trimistri.cz/' . $pageSlug]]];
$schema['@graph'][] = json_decode('{"@type": "FAQPage", "mainEntity": [{"@type": "Question", "name": "Kolik stojí lepení tapet?", "acceptedAnswer": {"@type": "Answer", "text": "Cena závisí na typu tapety, návaznosti vzoru, velikosti plochy, členitosti stěn a stavu podkladu. Pro kalkulaci pošlete rozměry, fotografie stěny a informaci o vybrané tapetě."}}, {"@type": "Question", "name": "Můžeme mít tapetu už koupenou?", "acceptedAnswer": {"@type": "Answer", "text": "Ano. Pošlete její typ nebo odkaz a rozměry stěny, ať probereme provedení a potřebné množství."}}, {"@type": "Question", "name": "Lepíte i fototapety?", "acceptedAnswer": {"@type": "Answer", "text": "Ano. Přípravu a postup přizpůsobíme konkrétnímu typu tapety a podkladu."}}]}', true);
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
      <span>Tapetování</span>
    </nav>
    <div class="tm-detail-hero-grid">
      <div class="tm-detail-intro">
        <p class="tm-eyebrow"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M4 3h6v8H4Zm10 0h6v8h-6ZM4 15h6v6H4Zm10 0h6v6h-6ZM7 3v8M17 15v6"/></svg> Tři Mistři / Brno a okolí</p>
        <h1 id="service-title">Tapetování a lepení tapet v Brně<span>.</span></h1>
        <p class="tm-detail-lead">Hledáte tapetáře v Brně nebo okolí? Lepíme klasické, vliesové i vinylové tapety a fototapety. Připravíme stěnu, navážeme vzor a dokončíme rohy i okraje.</p>
        <div class="tm-detail-actions">
          <a class="tm-btn" href="#poptavka"><span class="tm-cta-label">Poptat tapetování</span><span aria-hidden="true">↗</span></a>
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
        <div class="tm-detail-cover-image"><img src="./assets/img/gallery/thumbs/tapetovani2j-700w.webp" alt="Tapetování 1 - Brno - Bystrc" width="700" height="933" decoding="async" fetchpriority="high"></div>
        <figcaption><span><i aria-hidden="true"></i> Z naší práce</span><strong>Brno - Bystrc</strong></figcaption>
      </figure>
          </div>
  </section>
<?php navrh_flush_first_view(); ?>

  <section class="tm-detail-section tm-container tm-detail-service-info" id="rozsah" aria-labelledby="scope-title">
    <div class="tm-detail-info-surface">
      <div class="tm-detail-overview-heading" data-tm-motion>
      <div><p class="tm-eyebrow">01 / O službě</p><h2 id="scope-title">Lepení tapet včetně přípravy stěn</h2></div>
      <p>Tapetujeme obytné místnosti i kanceláře. Postup přizpůsobíme tapetě a podkladu, od přípravy stěny po návaznost vzoru a zakončení okrajů.</p>
    </div>
      <ul class="tm-detail-benefits">
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg></div><h3>Tapeta pro váš prostor</h3><p>Ložnice, obývák i kancelář. Provedení přizpůsobíme typu zvolené tapety.</p></li>
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m12 2 8 3v6c0 5-4 9-8 11-4-2-8-6-8-11V5l8-3Zm-4 9 3 3 5-6"/></svg></div><h3>Příprava stěn</h3><p>Před lepením posoudíme stav stěny a potřebné úpravy povrchu.</p></li>
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M4 3h6v8H4Zm10 0h6v8h-6ZM4 15h6v6H4Zm10 0h6v6h-6ZM7 3v8M17 15v6"/></svg></div><h3>Návaznost vzoru a detaily</h3><p>Pečlivě napojíme jednotlivé pásy a zakončíme tapetu kolem rohů a okrajů.</p></li>
          </ul>
      <div class="tm-detail-info-columns">
        <div class="tm-detail-info-process" id="realizace-postup" aria-labelledby="process-title">
          <h3 class="tm-detail-info-title" id="process-title">Jak probíhá realizace</h3>
          <div class="tm-detail-work"><ol><li data-tm-motion><span class="tm-detail-step-number">01</span><div><h4>Projdeme vybranou tapetu</h4><p>Zajímá nás typ, vzor, rozměry stěn a členitost prostoru.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">02</span><div><h4>Připravíme stěnu</h4><p>Posoudíme podklad a domluvíme potřebné vyrovnání.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">03</span><div><h4>Nalepíme jednotlivé pásy</h4><p>Pečlivě navážeme vzor a zakončíme okraje.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">04</span><div><h4>Zkontrolujeme celek</h4><p>Projdeme spoje, rohy a dokončený povrch.</p></div></li></ol></div>
        </div>
        <div class="tm-detail-info-questions" id="otazky" aria-labelledby="faq-title">
          <h3 class="tm-detail-info-title" id="faq-title">Cena a časté otázky</h3>
          <div class="tm-detail-faq">
            <details open><summary><span class="tm-faq-question">Kolik stojí lepení tapet?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Cena závisí na typu tapety, návaznosti vzoru, velikosti plochy, členitosti stěn a stavu podkladu. Pro kalkulaci pošlete rozměry, fotografie stěny a informaci o vybrané tapetě.</p></div></details>
            <details><summary><span class="tm-faq-question">Můžeme mít tapetu už koupenou?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Ano. Pošlete její typ nebo odkaz a rozměry stěny, ať probereme provedení a potřebné množství.</p></div></details>
            <details><summary><span class="tm-faq-question">Lepíte i fototapety?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Ano. Přípravu a postup přizpůsobíme konkrétnímu typu tapety a podkladu.</p></div></details>
          </div>
        </div>
      </div>
    </div>
  </section>

    <?php if (!navrh_cms_gallery($pageSlug)): ?>
<section class="tm-detail-showcase tm-detail-section tm-container" id="ukazky" aria-labelledby="showcase-title">
    <span class="tm-anchor" id="galerie"></span><span class="tm-anchor" id="web-realizace"></span><div class="tm-detail-section-heading"><div><p class="tm-eyebrow">02 / Ukázky realizací</p><h2 id="showcase-title">Podívejte se na výsledek.</h2></div><p>3 realizace · 4 fotografií</p></div>
    <div class="tm-project-grid tm-detail-projects">            <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-cf871987d7ed" href="./assets/img/gallery/tapetovani2j.jpeg" data-glightbox="title: Tapetování 1 - Brno - Bystrc" aria-label="Tapetování — Brno - Bystrc — prohlédnout 2 fotografií">
                <img data-src="./assets/img/gallery/thumbs/tapetovani2j-700w.webp" alt="Tapetování 1 - Brno - Bystrc" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/tapetovani2j-700w.webp" alt="Tapetování 1 - Brno - Bystrc" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Tapetování</span><span class="tm-project-photo-total">2 fotografie</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Brno - Bystrc</span><h3>Tapetování</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden><a class="photo-link" data-gallery="tm-selected-cf871987d7ed" href="./assets/img/gallery/tapetovani3.jpeg" data-glightbox="title: Tapetování 3 - Brno - Bystrc" aria-label="Tapetování 3 - Brno - Bystrc"></a></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-8a14974b94bc" href="./assets/img/gallery/tapetovani.jpeg" data-glightbox="title: Tapetování 2 - Brno - Rennenská" aria-label="Tapetování — Brno - Rennenská — prohlédnout 1 fotografií">
                <img data-src="./assets/img/gallery/thumbs/tapetovani-700w.webp" alt="Tapetování 2 - Brno - Rennenská" loading="lazy" width="700" height="525" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/tapetovani-700w.webp" alt="Tapetování 2 - Brno - Rennenská" loading="lazy" width="700" height="525" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Tapetování</span><span class="tm-project-photo-total">1 fotografie</span>
                <span class="tm-project-overlay"><span class="tm-project-place"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg>Brno - Rennenská</span><h3>Tapetování</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-7b687c32f4e9" href="./assets/img/gallery/dekoracnisterky20.jpeg" data-glightbox="title: Tapetování 4" aria-label="Tapetování — prohlédnout 1 fotografií">
                <img data-src="./assets/img/gallery/thumbs/dekoracnisterky20-700w.webp" alt="Tapetování 4" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%2F%3E"><noscript><img src="./assets/img/gallery/thumbs/dekoracnisterky20-700w.webp" alt="Tapetování 4" loading="lazy" width="700" height="933" decoding="async" fetchpriority="low"></noscript>
                <span class="tm-project-kind">Tapetování</span><span class="tm-project-photo-total">1 fotografie</span>
                <span class="tm-project-overlay"><h3>Tapetování</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden></div>
            </article>
            </div>
      </section>
<?php endif; ?>

  <section class="tm-contact tm-detail-form-section" id="kontakt"><div class="tm-container">
    <div class="tm-contact-heading" data-tm-motion><div class="tm-contact-copy"><p class="tm-eyebrow">03 / Nezávazná poptávka</p><h2>Pojďme se <em>domluvit.</em></h2><p>Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.</p></div><div class="tm-detail-form-aside"><strong>Pro první domluvu stačí:</strong><p>rozměry stěn a fotografie, typ nebo odkaz na vybranou tapetu, informace, zda je tapeta zakoupená.</p></div></div>
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
        <aside class="tm-inquiry-aside"><p class="tm-eyebrow">Váš prostor. Naše řemeslo.</p><h3>Pár detailů.<br>A začneme.</h3><p>Pošlete nám zadání. Rozsah práce, cenu i termín spolu upřesníme.</p><div class="tm-inquiry-service"><span>Co budeme řešit</span><strong data-form-service>Tapetování</strong></div><div class="tm-inquiry-direct"><span>Raději se domluvíte přímo?</span><a class="tm-call-btn" href="tel:+420774927182"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m6 3 3 5-2 2c2 4 3 5 7 7l2-2 5 3c0 3-2 4-4 3C9 19 5 15 3 7 2 5 3 3 6 3Z"/></svg><span>+420 774 927 182</span></a><a href="mailto:info@trimistri.cz">info@trimistri.cz</a></div><span class="tm-inquiry-area"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg> Brno a okolí</span></aside>
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
