<?php declare(strict_types=1);
http_response_code(404);
?>
<!doctype html>
<html lang="cs">

<head>
<base href="/">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Stránka nenalezena | Tři Mistři</title>
  <meta name="robots" content="noindex, follow">
  <meta name="description" content="Požadovaná stránka nebyla nalezena. Vraťte se na úvodní stránku Tři Mistři.">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://cdn.jsdelivr.net">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style-v2.css?v=<?= filemtime(__DIR__ . '/assets/css/style-v2.css') ?>">
  <link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
  <link rel="manifest" href="manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <!-- Google tag (gtag.js) -->
  <?php include __DIR__ . '/includes/consent-head.php'; ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-18282958447"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'AW-18282958447');
  </script>

  <style>
    .notfound-section {
      position: relative;
      min-height: 72vh;
      display: flex;
      align-items: center;
      overflow: hidden;
      background: linear-gradient(180deg, #fff 0%, #faf8f3 100%);
    }
    .notfound-code {
      font-size: clamp(4rem, 12vw, 7rem);
      font-weight: 800;
      letter-spacing: -.04em;
      line-height: 1;
      color: var(--gold);
      margin-bottom: .5rem;
    }
    .notfound-section h1 {
      font-size: clamp(1.6rem, 3vw, 2.2rem);
      font-weight: 800;
      letter-spacing: -.03em;
      margin-bottom: 1.1rem;
    }
    .notfound-section .lead {
      max-width: 560px;
      margin: 0 auto 2rem;
    }
    .notfound-links {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: .6rem 1.4rem;
      margin-top: 2rem;
      max-width: 640px;
      margin-left: auto;
      margin-right: auto;
    }
    .notfound-links a {
      color: #3a3a3a;
      text-decoration: none;
      border-bottom: 1px solid transparent;
    }
    .notfound-links a:hover { color: var(--gold); border-bottom-color: var(--gold); }
    .notfound-actions .btn { min-width: 200px; }
  </style>
<?php require __DIR__ . '/includes/navrh-styles.php'; ?>
</head>

<body class="night-gallery tm-legacy">

  <?php $isHome = false; include __DIR__ . '/includes/header.php'; ?>

  <a class="tm-skip" href="#obsah">Přeskočit na obsah</a><main id="obsah">
    <section class="notfound-section">
      <div class="container-xl">
        <div class="row justify-content-center text-center">
          <div class="col-lg-8">
            <div class="notfound-code">404</div>

            <p class="eyebrow centered"><span></span> Stránka nenalezena</p>
            <h1>Tuhle stránku jsme bohužel nenamalovali</h1>
            <p class="lead mx-auto">Odkaz může být zastaralý nebo jste zadali chybnou adresu. Zkuste se vrátit na
              úvodní stránku, nebo přejděte přímo na některou z našich služeb.</p>

            <div class="notfound-actions d-flex flex-wrap justify-content-center gap-3">
              <a class="btn btn-gold btn-lg" href="./"><i class="bi bi-house"></i> Zpět na úvodní stránku</a>
              <a class="btn btn-outline-dark btn-lg" href="tel:+420774927182"><i class="bi bi-telephone"></i> Zavolat
                nám</a>
            </div>

            <div class="notfound-links">
              <a href="natery-interieru">Malby interiéru</a>
              <a href="dekoracni-sterky">Dekorativní stěrky</a>
              <a href="natery-drevo-kovu">Nátěry dřeva a kovů</a>
              <a href="prumyslove-natery">Ocelové konstrukce</a>
              <a href="tapetovani">Tapetování</a>
              <a href="natery-fasad">Nátěry fasád</a>
              <a href="odstraneni-grafiti">Odstranění graffiti</a>
              <a href="pismomalirstvi">Písmomalířství</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/includes/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    (function () {
      "use strict";
      const mainNav = document.getElementById('mainNav');
      if (mainNav) {
        mainNav.querySelectorAll('a.nav-link:not(.dropdown-toggle), .dropdown-item, .header-actions a').forEach((link) => {
          link.addEventListener('click', () => {
            if (mainNav.classList.contains('show')) {
              bootstrap.Collapse.getOrCreateInstance(mainNav).hide();
            }
          });
        });
      }
      const header = document.getElementById('navbar');
      const onScrollHeader = () => {
        if (!header) return;
        header.classList.toggle('header-scrolled', window.scrollY > 100);
      };
      window.addEventListener('load', onScrollHeader);
      document.addEventListener('scroll', onScrollHeader, { passive: true });
    })();
  </script>
</body>

</html>
