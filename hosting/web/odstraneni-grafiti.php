<?php declare(strict_types=1);
require __DIR__ . '/includes/navrh-init.php';
$pageSlug = 'odstraneni-grafiti';
$isHome = false;
$isService = true;
$hasQuote = true;
$defaultService = 'Odstranění graffiti';
?>
<!doctype html>
<html lang="cs">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Odstranění graffiti v Brně | Tři Mistři</title><meta name="description" content="Graffiti na fasádě nebo jiném povrchu? V Brně a okolí navrhneme čištění, odstranění nebo překrytí podle materiálu a jeho stavu. Začít můžeme fotografií poškozeného místa.">
<link rel="canonical" href="https://trimistri.cz/odstraneni-grafiti">
<meta property="og:type" content="website"><meta property="og:site_name" content="Tři Mistři"><meta property="og:locale" content="cs_CZ">
<meta property="og:title" content="Odstranění graffiti v Brně | Tři Mistři"><meta property="og:description" content="Graffiti na fasádě nebo jiném povrchu? V Brně a okolí navrhneme čištění, odstranění nebo překrytí podle materiálu a jeho stavu. Začít můžeme fotografií poškozeného místa.">
<meta property="og:url" content="https://trimistri.cz/odstraneni-grafiti"><meta property="og:image" content="https://trimistri.cz/assets/img/about.JPEG">
<meta name="twitter:card" content="summary_large_image"><link rel="icon" href="favicon.ico"><meta name="theme-color" content="#151719">
<?php require __DIR__ . '/includes/navrh-styles.php'; ?>
<?php require __DIR__ . '/includes/consent-head.php'; ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-18282958447"></script>
<script>gtag('js',new Date());gtag('config','AW-18282958447');</script>
<?php
$business = require __DIR__ . '/includes/business-data.php';
$schema = ['@context' => 'https://schema.org', '@graph' => [$business]];
$schema['@graph'][] = ['@type' => 'Service', 'name' => "Odstranění graffiti v Brně | Tři Mistři", 'serviceType' => $defaultService, 'description' => "Graffiti na fasádě nebo jiném povrchu? V Brně a okolí navrhneme čištění, odstranění nebo překrytí podle materiálu a jeho stavu. Začít můžeme fotografií poškozeného místa.", 'provider' => $business, 'url' => 'https://trimistri.cz/' . $pageSlug];
$schema['@graph'][] = ['@type' => 'BreadcrumbList', 'itemListElement' => [['@type' => 'ListItem', 'position' => 1, 'name' => 'Domů', 'item' => 'https://trimistri.cz/'], ['@type' => 'ListItem', 'position' => 2, 'name' => 'Služby', 'item' => 'https://trimistri.cz/sluzby'], ['@type' => 'ListItem', 'position' => 3, 'name' => $defaultService, 'item' => 'https://trimistri.cz/' . $pageSlug]]];
$schema['@graph'][] = json_decode('{"@type": "FAQPage", "mainEntity": [{"@type": "Question", "name": "Kolik stojí odstranění graffiti?", "acceptedAnswer": {"@type": "Answer", "text": "Cena závisí na velikosti a typu graffiti, materiálu podkladu, jeho stavu a zvoleném postupu. Pošlete detail i fotografii celé plochy a místo realizace. Podle toho navrhneme další krok."}}, {"@type": "Question", "name": "Lze graffiti odstranit z každého povrchu?", "acceptedAnswer": {"@type": "Answer", "text": "Postup a výsledek závisí na materiálu a barvě. Někdy je vhodnější překrytí nebo navazující nátěr."}}, {"@type": "Question", "name": "Co vám máme poslat?", "acceptedAnswer": {"@type": "Answer", "text": "Fotografii detailu i celé plochy, přibližné rozměry, materiál a místo realizace."}}]}', true);
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
      <span>Odstranění graffiti</span>
    </nav>
    <div class="tm-detail-hero-grid">
      <div class="tm-detail-intro">
        <p class="tm-eyebrow"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m10 3 10 10-8 8H8L1 14l9-11Zm-5 9 10 10M12 21h10"/></svg> Tři Mistři / Brno a okolí</p>
        <h1 id="service-title">Odstranění graffiti v Brně<span>.</span></h1>
        <p class="tm-detail-lead">Graffiti na fasádě nebo jiném povrchu? V Brně a okolí navrhneme čištění, odstranění nebo překrytí podle materiálu a jeho stavu. Začít můžeme fotografií poškozeného místa.</p>
        <div class="tm-detail-actions">
          <a class="tm-btn" href="#poptavka"><span class="tm-cta-label">Poptat odstranění graffiti</span><span aria-hidden="true">↗</span></a>
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
        <div class="tm-detail-cover-image"><img src="./assets/img/gallery/thumbs/grafiti2-700w.webp" alt="Odstranění graffiti 1 - po" fetchpriority="high"></div>
        <figcaption><span><i aria-hidden="true"></i> Z naší práce</span><strong>Odstranění graffiti</strong></figcaption>
      </figure>
          </div>
  </section>

  <section class="tm-detail-section tm-container tm-detail-service-info" id="rozsah" aria-labelledby="scope-title">
    <div class="tm-detail-info-surface">
      <div class="tm-detail-overview-heading" data-tm-motion>
      <div><p class="tm-eyebrow">01 / O službě</p><h2 id="scope-title">Odstranění graffiti podle typu povrchu</h2></div>
      <p>Podle materiálu zvolíme čištění, odstranění nebo překrytí graffiti. Případnou opravu a nový nátěr domluvíme podle stavu plochy.</p>
    </div>
      <ul class="tm-detail-benefits">
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg></div><h3>Posouzení povrchu</h3><p>Fasáda a další povrchy vyžadují odlišný přístup. Nejdřív posoudíme jejich stav.</p></li>
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m12 2 8 3v6c0 5-4 9-8 11-4-2-8-6-8-11V5l8-3Zm-4 9 3 3 5-6"/></svg></div><h3>Odstranění nebo překrytí</h3><p>Zvolíme čištění, odstranění nebo překrytí podle podmínek konkrétní plochy.</p></li>
            <li data-tm-motion><div class="tm-detail-benefit-icon"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m10 3 10 10-8 8H8L1 14l9-11Zm-5 9 10 10M12 21h10"/></svg></div><h3>Oprava a sjednocení nátěru</h3><p>Pokud je potřeba obnovit nátěr, domluvíme také rozsah opravy a sjednocení povrchu.</p></li>
          </ul>
      <div class="tm-detail-info-columns">
        <div class="tm-detail-info-process" id="realizace-postup" aria-labelledby="process-title">
          <h3 class="tm-detail-info-title" id="process-title">Jak probíhá realizace</h3>
          <div class="tm-detail-work"><ol><li data-tm-motion><span class="tm-detail-step-number">01</span><div><h4>Pošlete detail i celek</h4><p>Podle fotografií a materiálu probereme rozsah zásahu.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">02</span><div><h4>Posoudíme podklad</h4><p>Zohledníme povrchovou úpravu a stav poškozeného místa.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">03</span><div><h4>Zvolíme vhodný postup</h4><p>Použijeme čištění, odstranění nebo překrytí podle podmínek.</p></div></li><li data-tm-motion><span class="tm-detail-step-number">04</span><div><h4>Sjednotíme výsledek</h4><p>Případný navazující nátěr domluvíme podle stavu plochy.</p></div></li></ol></div>
        </div>
        <div class="tm-detail-info-questions" id="otazky" aria-labelledby="faq-title">
          <h3 class="tm-detail-info-title" id="faq-title">Cena a časté otázky</h3>
          <div class="tm-detail-faq">
            <details open><summary><span class="tm-faq-question">Kolik stojí odstranění graffiti?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Cena závisí na velikosti a typu graffiti, materiálu podkladu, jeho stavu a zvoleném postupu. Pošlete detail i fotografii celé plochy a místo realizace. Podle toho navrhneme další krok.</p></div></details>
            <details><summary><span class="tm-faq-question">Lze graffiti odstranit z každého povrchu?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Postup a výsledek závisí na materiálu a barvě. Někdy je vhodnější překrytí nebo navazující nátěr.</p></div></details>
            <details><summary><span class="tm-faq-question">Co vám máme poslat?</span><span class="tm-faq-plus" aria-hidden="true">+</span></summary><div class="tm-faq-answer"><p>Fotografii detailu i celé plochy, přibližné rozměry, materiál a místo realizace.</p></div></details>
          </div>
        </div>
      </div>
    </div>
  </section>

    <?php if (!navrh_cms_gallery($pageSlug)): ?>
<section class="tm-detail-showcase tm-detail-section tm-container" id="ukazky" aria-labelledby="showcase-title">
    <span class="tm-anchor" id="galerie"></span><span class="tm-anchor" id="web-realizace"></span><div class="tm-detail-section-heading"><div><p class="tm-eyebrow">02 / Ukázky realizací</p><h2 id="showcase-title">Podívejte se na výsledek.</h2></div><p>2 realizace · 4 fotografií</p></div>
    <div class="tm-project-grid tm-detail-projects">            <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-a20723a4951b" href="./assets/img/gallery/grafiti1.jpeg" data-glightbox="title: Odstranění graffiti 1 - před" aria-label="Odstranění graffiti — prohlédnout 2 fotografií">
                <img src="./assets/img/gallery/thumbs/grafiti2-700w.webp" alt="Odstranění graffiti 1 - po" loading="lazy">
                <span class="tm-project-kind">Odstranění graffiti</span><span class="tm-project-photo-total">2 fotografie</span>
                <span class="tm-project-overlay"><h3>Odstranění graffiti</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden><a class="photo-link" data-gallery="tm-selected-a20723a4951b" href="./assets/img/gallery/grafiti2.jpeg" data-glightbox="title: Odstranění graffiti 1 - po" aria-label="Odstranění graffiti 1 - po"></a></div>
            </article>
                        <article class="tm-project-card" data-reveal>
              <a class="photo-link tm-project-photo" data-gallery="tm-selected-6f5854d03383" href="./assets/img/gallery/grafiti3.jpeg" data-glightbox="title: Odstranění graffiti 2 - před" aria-label="Odstranění graffiti — prohlédnout 2 fotografií">
                <img src="./assets/img/gallery/thumbs/grafiti4-700w.webp" alt="Odstranění graffiti 2 - po" loading="lazy">
                <span class="tm-project-kind">Odstranění graffiti</span><span class="tm-project-photo-total">2 fotografie</span>
                <span class="tm-project-overlay"><h3>Odstranění graffiti</h3><span class="tm-project-view">Prohlédnout realizaci <span aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M3 9V3h6m6 0h6v6M3 15v6h6m6 0h6v-6M3 3l6 6m6 6 6 6m0-18-6 6M9 15l-6 6"/></svg></span></span></span>
              </a>
              <div class="tm-project-hidden-photos" hidden><a class="photo-link" data-gallery="tm-selected-6f5854d03383" href="./assets/img/gallery/grafiti4.jpeg" data-glightbox="title: Odstranění graffiti 2 - po" aria-label="Odstranění graffiti 2 - po"></a></div>
            </article>
            </div>
      </section>
<?php endif; ?>

  <section class="tm-contact tm-detail-form-section" id="kontakt"><div class="tm-container">
    <div class="tm-contact-heading" data-tm-motion><div class="tm-contact-copy"><p class="tm-eyebrow">03 / Nezávazná poptávka</p><h2>Pojďme se <em>domluvit.</em></h2><p>Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.</p></div><div class="tm-detail-form-aside"><strong>Pro první domluvu stačí:</strong><p>materiál a velikost plochy, stáří graffiti, pokud ho znáte, fotografie detailu i celého místa.</p></div></div>
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
        <aside class="tm-inquiry-aside"><p class="tm-eyebrow">Váš prostor. Naše řemeslo.</p><h3>Pár detailů.<br>A začneme.</h3><p>Pošlete nám zadání. Rozsah práce, cenu i termín spolu upřesníme.</p><div class="tm-inquiry-service"><span>Co budeme řešit</span><strong data-form-service>Odstranění graffiti</strong></div><div class="tm-inquiry-direct"><span>Raději se domluvíte přímo?</span><a class="tm-call-btn" href="tel:+420774927182"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m6 3 3 5-2 2c2 4 3 5 7 7l2-2 5 3c0 3-2 4-4 3C9 19 5 15 3 7 2 5 3 3 6 3Z"/></svg><span>+420 774 927 182</span></a><a href="mailto:info@trimistri.cz">info@trimistri.cz</a></div><span class="tm-inquiry-area"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 9c0 6-7 13-7 13S5 15 5 9a7 7 0 1 1 14 0Z"/><circle cx="12" cy="9" r="2.5"/></svg> Brno a okolí</span></aside>
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
