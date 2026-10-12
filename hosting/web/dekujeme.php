<?php declare(strict_types=1);

$isHttps = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
session_set_cookie_params(['lifetime' => 0, 'path' => '/', 'secure' => $isHttps, 'httponly' => true, 'samesite' => 'Lax']);
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }

$shouldFireConversion = !empty($_SESSION['quote_conversion_pending']);
unset($_SESSION['quote_conversion_pending']);

/*
  Podklady pro rozšířené konverze (Enhanced Conversions) - gtag.js je
  před odesláním konverze sám na klientovi zahashuje (SHA-256), Googlu
  jde jen otisk, ne čitelný e-mail/telefon. Ze session se použijí jen
  jednou a hned se smažou.
*/
$conversionUserData = [];

if ($shouldFireConversion) {
    $rawEmail = strtolower(trim((string) ($_SESSION['quote_conversion_email'] ?? '')));

    if ($rawEmail !== '' && filter_var($rawEmail, FILTER_VALIDATE_EMAIL) !== false) {
        $conversionUserData['email'] = $rawEmail;
    }

    $rawPhone = (string) ($_SESSION['quote_conversion_phone'] ?? '');
    $phoneDigits = preg_replace('/[^0-9+]/', '', $rawPhone) ?? '';

    if (str_starts_with($phoneDigits, '00')) {
        $phoneDigits = '+' . substr($phoneDigits, 2);
    } elseif ($phoneDigits !== '' && $phoneDigits[0] !== '+') {
        // Tuzemské číslo bez předvolby - doplní se česká +420.
        $phoneDigits = '+420' . ltrim($phoneDigits, '0');
    }

    if ($phoneDigits !== '') {
        $conversionUserData['phone_number'] = $phoneDigits;
    }
}

unset($_SESSION['quote_conversion_email'], $_SESSION['quote_conversion_phone']);
?>
<!doctype html>
<html lang="cs">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Děkujeme za poptávku | Tři Mistři</title>
  <meta name="robots" content="noindex, nofollow">
  <meta name="description"
    content="Děkujeme za odeslání poptávky. Tým Tři Mistři se Vám brzy ozve s cenovou nabídkou a termínem realizace.">

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

    <?php if ($shouldFireConversion): ?>
    <?php if (!empty($conversionUserData)): ?>
    /*
      Rozšířené konverze: gtag.js si tyto údaje sám zahashuje (SHA-256)
      přímo v prohlížeči ještě před odesláním - Google dostává jen
      otisk, ne čitelný e-mail/telefon.
    */
    if (window.triMistriConsentChoice === 'granted') {
      gtag('set', 'user_data', <?= json_encode($conversionUserData, JSON_UNESCAPED_SLASHES) ?>);
    }
    <?php endif; ?>
    /*
      Konverze se odesílá jen jednou, ihned po skutečném odeslání
      poptávkového formuláře (příznak nastaví send.php a zde se hned
      smaže) - přímá návštěva nebo obnovení této stránky konverzi
      už znovu neodešle.
    */
    gtag('event', 'conversion', { 'send_to': 'AW-18282958447/ApYKCN_QpNMcEO-c_41E' });
    <?php endif; ?>
  </script>

  <style>
    .thankyou-section {
      position: relative;
      min-height: 72vh;
      display: flex;
      align-items: center;
      overflow: hidden;
      background: linear-gradient(180deg, #fff 0%, #faf8f3 100%);
    }
    .thankyou-icon {
      display: inline-grid;
      place-items: center;
      width: 84px;
      height: 84px;
      margin-bottom: 1.75rem;
      color: #fff;
      background: var(--gold);
      border-radius: 50%;
      font-size: 2.4rem;
      box-shadow: 0 18px 40px rgba(185,139,56,.35);
    }
    .thankyou-section h1 {
      font-size: clamp(2rem, 4vw, 3.2rem);
      font-weight: 800;
      letter-spacing: -.04em;
      line-height: 1.12;
      margin-bottom: 1.1rem;
    }
    .thankyou-section h1 span { color: var(--gold); }
    .thankyou-section .lead {
      max-width: 560px;
      margin-bottom: 2rem;
    }
    .thankyou-steps {
      display: grid;
      gap: 1rem;
      margin: 2rem 0 2.5rem;
      max-width: 560px;
    }
    .thankyou-steps div {
      display: flex;
      align-items: flex-start;
      gap: .9rem;
      padding: 1rem 1.1rem;
      background: #fff;
      border: 1px solid var(--line);
      box-shadow: 0 14px 35px rgba(0,0,0,.035);
    }
    .thankyou-steps i {
      color: var(--gold);
      font-size: 1.35rem;
      flex-shrink: 0;
      margin-top: .1rem;
    }
    .thankyou-steps strong { display: block; font-size: .95rem; }
    .thankyou-steps span { display: block; color: var(--muted); font-size: .87rem; }
    .thankyou-actions .btn { min-width: 200px; }
  </style>
<?php require __DIR__ . '/includes/navrh-styles.php'; ?>
</head>

<body class="night-gallery tm-legacy">

  <?php $isHome = false; include __DIR__ . '/includes/header.php'; ?>

  <a class="tm-skip" href="#obsah">Přeskočit na obsah</a><main id="obsah">
    <section class="thankyou-section">
      <div class="container-xl">
        <div class="row justify-content-center text-center">
          <div class="col-lg-8">
            <div class="thankyou-icon">
              <i class="bi bi-check-lg"></i>
            </div>

            <p class="eyebrow centered"><span></span> Poptávka odeslána</p>
            <h1>Děkujeme, <span>ozveme se Vám</span> co nejdříve</h1>
            <p class="lead mx-auto">Vaši poptávku jsme v pořádku přijali. Náš tým ji projde a ozve se Vám na uvedený
              telefon nebo e-mail, abychom domluvili konzultaci a připravili cenovou nabídku.</p>

            <div class="thankyou-steps mx-auto">
              <div>
                <i class="bi bi-telephone"></i>
                <div>
                  <strong>Ozveme se Vám</strong>
                  <span>Obvykle do 1 pracovního dne od odeslání poptávky.</span>
                </div>
              </div>
              <div>
                <i class="bi bi-clipboard-check"></i>
                <div>
                  <strong>Domluvíme konzultaci</strong>
                  <span>Nezávazně posoudíme rozsah prací a vhodný materiál.</span>
                </div>
              </div>
              <div>
                <i class="bi bi-file-earmark-text"></i>
                <div>
                  <strong>Připravíme cenovou nabídku</strong>
                  <span>Konkrétní cenu, termín a harmonogram realizace tentýž den.</span>
                </div>
              </div>
            </div>

            <div class="thankyou-actions d-flex flex-wrap justify-content-center gap-3">
              <a class="btn btn-gold btn-lg" href="./"><i class="bi bi-house"></i> Zpět na úvodní stránku</a>
              <a class="btn btn-outline-dark btn-lg" href="tel:+420774927182"><i class="bi bi-telephone"></i> Zavolat
                nám</a>
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
