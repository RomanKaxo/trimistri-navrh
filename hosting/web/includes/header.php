<?php
$isHome = $isHome ?? false;
$isService = $isService ?? false;
$pageSlug = $pageSlug ?? '';
$hasQuote = $hasQuote ?? false;
?>
<header class="tm-header">
  <div class="tm-nav-row tm-container">
    <a class="tm-brand" href="./" aria-label="Tři Mistři — úvod"><span class="tm-brand-sign" aria-hidden="true"><i></i><i></i><i></i></span><span><strong>Tři Mistři<span class="tm-brand-dot">.</span></strong><small>MALBY · NÁTĚRY · POVRCHY</small></span></a>
    <button class="tm-menu-toggle" type="button" data-menu-toggle aria-label="Otevřít hlavní menu" aria-expanded="false" aria-controls="tm-navigation"><span>Menu</span><span class="tm-menu-lines" aria-hidden="true"></span></button>
    <nav class="tm-navigation" id="tm-navigation" data-menu aria-label="Hlavní navigace">
      <a data-nav-section="top" <?= $isHome ? 'aria-current="location"' : '' ?> href="./#top">Úvod</a>
      <a data-nav-section="sluzby" <?= $isService ? 'aria-current="page"' : '' ?> href="./sluzby">Služby</a>
      <a data-nav-section="realizace" <?= $pageSlug === 'galerie' ? 'aria-current="page"' : '' ?> href="./galerie">Realizace</a>
      <a data-nav-section="postup" href="./#postup">Postup</a>
      <a data-nav-section="recenze" href="./#recenze">Recenze</a>
      <a data-nav-section="kontakt" href="./#kontakt">Kontakt</a>
      <a class="tm-nav-cta tm-menu-quote" href="<?= $hasQuote ? '#poptavka' : './#poptavka' ?>"><span class="tm-cta-label">Nezávazná poptávka</span><span aria-hidden="true">↗</span></a>
    </nav>
    <div class="tm-header-actions"><a class="tm-header-phone" href="tel:+420774927182" aria-label="Zavolat na +420 774 927 182"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m6 3 3 5-2 2c2 4 3 5 7 7l2-2 5 3c0 3-2 4-4 3C9 19 5 15 3 7 2 5 3 3 6 3Z"/></svg><span><small>Zavolat</small><strong>+420 774 927 182</strong></span></a><a class="tm-btn tm-header-quote" href="<?= $hasQuote ? '#poptavka' : './#poptavka' ?>"><span class="tm-cta-label">Nezávazná poptávka</span><span aria-hidden="true">↗</span></a></div>
  </div>
</header>