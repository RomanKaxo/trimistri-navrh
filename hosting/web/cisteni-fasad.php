<?php declare(strict_types=1);
require __DIR__ . '/includes/navrh-init.php';
$pageSlug = 'cisteni-fasad';
$isHome = false;
$isService = true;
$hasQuote = true;
$defaultService = 'Čištění fasády';
?>
<!doctype html>
<html lang="cs">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Čištění fasád a povrchů v Brně | Tři Mistři</title><meta name="description" content="Provádíme tlakové i šetrné čištění fasád, marmolitu, betonu, obkladů a dalších venkovních povrchů. Odstraňujeme běžné usazeniny, biologické znečištění a další nečistoty; tlak, chemii i teplotu volíme podle materiálu a jeho stavu.">
<link rel="canonical" href="https://trimistri.cz/cisteni-fasad">
<meta property="og:type" content="website"><meta property="og:site_name" content="Tři Mistři"><meta property="og:locale" content="cs_CZ">
<meta property="og:title" content="Čištění fasád a povrchů v Brně | Tři Mistři"><meta property="og:description" content="Provádíme tlakové i šetrné čištění fasád, marmolitu, betonu, obkladů a dalších venkovních povrchů. Odstraňujeme běžné usazeniny, biologické znečištění a další nečistoty; tlak, chemii i teplotu volíme podle materiálu a jeho stavu.">
<meta property="og:url" content="https://trimistri.cz/cisteni-fasad"><meta property="og:image" content="https://trimistri.cz/assets/img/about.JPEG">
<meta name="twitter:card" content="summary_large_image"><link rel="icon" href="favicon.ico"><meta name="theme-color" content="#151719">
<?php require __DIR__ . '/includes/navrh-styles.php'; ?>
<?php require __DIR__ . '/includes/consent-head.php'; ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-18282958447"></script>
<script>gtag('js',new Date());gtag('config','AW-18282958447');</script>
<?php
$business = require __DIR__ . '/includes/business-data.php';
$schema = ['@context' => 'https://schema.org', '@graph' => [$business]];
$schema['@graph'][] = ['@type' => 'Service', 'name' => "Čištění fasád a povrchů v Brně | Tři Mistři", 'serviceType' => $defaultService, 'description' => "Provádíme tlakové i šetrné čištění fasád, marmolitu, betonu, obkladů a dalších venkovních povrchů. Odstraňujeme běžné usazeniny, biologické znečištění a další nečistoty; tlak, chemii i teplotu volíme podle materiálu a jeho stavu.", 'provider' => $business, 'url' => 'https://trimistri.cz/' . $pageSlug];
$schema['@graph'][] = ['@type' => 'BreadcrumbList', 'itemListElement' => [['@type' => 'ListItem', 'position' => 1, 'name' => 'Domů', 'item' => 'https://trimistri.cz/'], ['@type' => 'ListItem', 'position' => 2, 'name' => 'Služby', 'item' => 'https://trimistri.cz/sluzby'], ['@type' => 'ListItem', 'position' => 3, 'name' => $defaultService, 'item' => 'https://trimistri.cz/' . $pageSlug]]];
$schema['@graph'][] = json_decode('{"@type": "FAQPage", "mainEntity": [{"@type": "Question", "name": "Kolik stojí čištění fasády?", "acceptedAnswer": {"@type": "Answer", "text": "Cena závisí na ploše, materiálu, přístupnosti a druhu znečištění. Přesnou nabídku připravíme po posouzení povrchu a rozsahu potřebných prací."}}, {"@type": "Question", "name": "Lze každou fasádu čistit vysokým tlakem?", "acceptedAnswer": {"@type": "Answer", "text": "Ne. U starších nebo méně soudržných omítek je potřeba tlak omezit nebo zvolit jiný postup."}}, {"@type": "Question", "name": "Odstraníte také biologické znečištění?", "acceptedAnswer": {"@type": "Answer", "text": "Podle druhu a rozsahu lze čištění doplnit vhodným přípravkem. Konkrétní postup určíme po posouzení povrchu."}}, {"@type": "Question", "name": "Můžete po čištění fasádu také natřít?", "acceptedAnswer": {"@type": "Answer", "text": "Ano. Čištění může být první částí přípravy před opravami a novým fasádním nátěrem."}}]}', true);
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
      <span>Čištění fasád a povrchů</span>
    </nav>
    <div class="tm-detail-hero-grid">
      <div class="tm-detail-intro">
        <p class="tm-eyebrow"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 6c2-3 4 3 6 0s4 3 6 0 4 3 6 0M3 12c2-3 4 3 6 0s4 3 6 0 4 3 6 0M3 18c2-3 4 3 6 0s4 3 6 0 4 3 6 0"/></svg> Tři Mistři / Brno a okolí</p>
        <h1 id="service-title">Čištění fasád a povrchů v Brně<span>.</span></h1>
        <p class="tm-detail-lead">Provádíme tlakové i šetrné čištění fasád, marmolitu, betonu, obkladů a dalších venkovních povrchů. Odstraňujeme běžné usazeniny, biologické znečištění a další nečistoty; tlak, chemii i teplotu volíme podle materiálu a jeho stavu.</p>
        <div class="tm-detail-actions">
          <a class="tm-btn" href="#poptavka"><span class="tm-cta-label">Poptat čištění fasády</span><span aria-hidden="true">↗</span></a>
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
            <aside class="tm-detail-material" aria-label="Možnosti povrchové úpravy">
        <div aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 6c2-3 4 3 6 0s4 3 6 0 4 3 6 0M3 12c2-3 4 3 6 0s4 3 6 0 4 3 6 0M3 18c2-3 4 3 6 0s4 3 6 0 4 3 6 0"/></svg></div>
        <p class="tm-eyebrow">Řešení podle vašeho povrchu</p>
        <h2>Jak volíme způsob čištění</h2>
        <ul><li>Regulovaný tlak vody</li><li>Čisticí prostředky</li><li>Příprava před nátěrem</li></ul>
      </aside>
          </div>
  </section>
<?php navrh_flush_first_view(); ?>

  <section class="tm-detail-section tm-container tm-detail-service-info" id="rozsah" aria-labelledby="scope-title">
    <div class="tm-detail-info-surface">
      <div class="tm-detail-overview-heading" data-tm-motion>
      <div><p class="tm-eyebrow">01 / O službě</p><h2 id="scope-title">Čištění fasád a dalších pevných povrchů</h2></div>
      <p>Postup volíme podle materiálu a znečištění. Čistíme samostatně i jako přípravu před novým nátěrem.</p>
    </div>
      <ul class="tm-detail-benefits">
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg></div><h3>Fasády a omítky</h3><p>Mytí povrchu před údržbou nebo jako příprava před novým nátěrem.</p></li>
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m12 2 8 3v6c0 5-4 9-8 11-4-2-8-6-8-11V5l8-3Zm-4 9 3 3 5-6"/></svg></div><h3>Marmolit a sokly</h3><p>Postup přizpůsobený zrnitosti, soudržnosti a stáří povrchu.</p></li>
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 6c2-3 4 3 6 0s4 3 6 0 4 3 6 0M3 12c2-3 4 3 6 0s4 3 6 0 4 3 6 0M3 18c2-3 4 3 6 0s4 3 6 0 4 3 6 0"/></svg></div><h3>Betonové plochy</h3><p>Stěny, podezdívky, chodníky a další vhodné pevné podklady.</p></li>
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 3h18v13H10l-6 5v-5H3V3Zm4 5h10M7 12h7"/></svg></div><h3>Keramické a kamenné obklady</h3><p>Čištění se zohledněním spár, povrchové úpravy a okolních materiálů.</p></li>
          </ul>
      <div class="tm-detail-info-columns">
        <div class="tm-detail-info-process" id="realizace-postup" aria-labelledby="process-title">
          <h3 class="tm-detail-info-title" id="process-title">Jak probíhá realizace</h3>
          <div class="tm-detail-work"><ol><li data-tm-motion><span class="tm-detail-step-number">01</span><div><h4>Posouzení materiálu</h4><p>Určíme podklad, jeho stav a typ znečištění.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">02</span><div><h4>Ochrana okolí</h4><p>Zakryjeme nebo odpojíme prvky, které by mohla voda či čisticí prostředek poškodit.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">03</span><div><h4>Zkouška a čištění</h4><p>Nastavíme šetrný účinný postup a postupujeme po ucelených plochách.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">04</span><div><h4>Kontrola výsledku</h4><p>Po očištění zkontrolujeme podklad a doporučíme případnou další ochranu.</p></div></li></ol></div>
        </div>
        <div class="tm-detail-info-questions" id="otazky" aria-labelledby="faq-title">
          <h3 class="tm-detail-info-title" id="faq-title">Cena a časté otázky</h3>
          <div class="tm-detail-faq">
            <details open><summary><span class="tm-faq-question">Kolik stojí čištění fasády?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Cena závisí na ploše, materiálu, přístupnosti a druhu znečištění. Přesnou nabídku připravíme po posouzení povrchu a rozsahu potřebných prací.</p></div></details>
            <details><summary><span class="tm-faq-question">Lze každou fasádu čistit vysokým tlakem?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Ne. U starších nebo méně soudržných omítek je potřeba tlak omezit nebo zvolit jiný postup.</p></div></details>
            <details><summary><span class="tm-faq-question">Odstraníte také biologické znečištění?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Podle druhu a rozsahu lze čištění doplnit vhodným přípravkem. Konkrétní postup určíme po posouzení povrchu.</p></div></details>
            <details><summary><span class="tm-faq-question">Můžete po čištění fasádu také natřít?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Ano. Čištění může být první částí přípravy před opravami a novým fasádním nátěrem.</p></div></details>
          </div>
        </div>
      </div>
    </div>
  </section>


  <?php navrh_cms_gallery($pageSlug); ?>
<section class="tm-contact tm-detail-form-section" id="kontakt" data-nosnippet><div class="tm-container">
    <div class="tm-contact-heading" data-tm-motion><div class="tm-contact-copy"><p class="tm-eyebrow">02 / Nezávazná poptávka</p><h2>Pojďme se <em>domluvit.</em></h2><p>Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.</p></div><div class="tm-detail-form-aside"><strong>Pro první domluvu stačí:</strong><p>regulovaný tlak vody, čisticí prostředky, příprava před nátěrem.</p></div></div>
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
        <aside class="tm-inquiry-aside"><p class="tm-eyebrow">Váš prostor. Naše řemeslo.</p><h3>Pár detailů.<br>A začneme.</h3><p>Pošlete nám zadání. Rozsah práce, cenu i termín spolu upřesníme.</p><div class="tm-inquiry-service"><span>Co budeme řešit</span><strong data-form-service>Čištění fasády</strong></div><div class="tm-inquiry-direct"><span>Raději se domluvíte přímo?</span><a class="tm-call-btn" href="tel:+420774927182"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m6 3 3 5-2 2c2 4 3 5 7 7l2-2 5 3c0 3-2 4-4 3C9 19 5 15 3 7 2 5 3 3 6 3Z"/></svg><span>+420 774 927 182</span></a><a href="mailto:info@trimistri.cz">info@trimistri.cz</a></div><span class="tm-inquiry-area"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg> Brno a okolí</span></aside>
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
