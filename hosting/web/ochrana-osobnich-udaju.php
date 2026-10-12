<?php declare(strict_types=1);
?>
<!doctype html>
<html lang="cs">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ochrana osobních údajů | Tři Mistři</title>
  <meta name="description"
    content="Zásady zpracování osobních údajů společnosti Tři Mistři - jaké údaje shromažďujeme, proč, jak dlouho je uchováváme a jaká máte práva.">
  <link rel="canonical" href="https://trimistri.cz/ochrana-osobnich-udaju">

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
    .legal-section { padding-top: 3rem; }
    .legal-header { max-width: 720px; margin-bottom: 3rem; }
    .legal-header .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: .5rem;
      color: var(--gold-dark);
      font-weight: 700;
      font-size: .8rem;
      letter-spacing: .08em;
      text-transform: uppercase;
      margin-bottom: .75rem;
    }
    .legal-header .eyebrow::before {
      content: "";
      width: 22px;
      height: 2px;
      background: var(--gold);
      display: inline-block;
    }
    .legal-header h1 { font-weight: 800; letter-spacing: -.03em; margin-bottom: .75rem; }
    .legal-header .lead { color: var(--muted); margin-bottom: 0; font-size: 1.05rem; }

    .legal-layout { display: grid; grid-template-columns: 220px 1fr; gap: 3rem; align-items: start; }
    @media (max-width: 991.98px) { .legal-layout { grid-template-columns: 1fr; gap: 2rem; } }

    .legal-toc { position: sticky; top: 100px; }
    .legal-toc-title { font-size: .75rem; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: var(--muted); margin-bottom: .9rem; }
    .legal-toc ol { list-style: none; padding: 0; margin: 0; border-left: 1px solid var(--line); }
    .legal-toc li { margin-bottom: 0; }
    .legal-toc a {
      display: block;
      padding: .5rem 0 .5rem 1rem;
      margin-left: -1px;
      border-left: 1px solid transparent;
      color: var(--muted);
      font-size: .88rem;
      font-weight: 600;
      text-decoration: none;
      transition: color .15s ease, border-color .15s ease;
    }
    .legal-toc a:hover, .legal-toc a.active { color: var(--ink); border-left-color: var(--gold); }
    @media (max-width: 991.98px) {
      .legal-toc { position: static; }
      .legal-toc ol { display: flex; flex-wrap: wrap; gap: .25rem 0; border-left: none; }
      .legal-toc li { flex: 0 0 50%; }
      .legal-toc a { border-left: 2px solid var(--line); padding-left: .8rem; }
    }

    .legal-section h2 {
      display: flex;
      align-items: center;
      gap: 1rem;
      font-size: 1.25rem;
      font-weight: 800;
      letter-spacing: -.01em;
      margin-top: 3rem;
      margin-bottom: 1.25rem;
      scroll-margin-top: 100px;
    }
    .legal-section > .legal-layout .legal-content > h2:first-child { margin-top: 0; }
    .legal-section h2 .num {
      flex: none;
      width: 40px;
      height: 40px;
      display: inline-grid;
      place-items: center;
      font-size: .95rem;
      font-weight: 800;
      letter-spacing: -.02em;
      color: var(--gold-dark);
      background: var(--soft);
      border: 1px solid var(--line);
    }
    .legal-section p, .legal-section li { color: #3a3a3a; line-height: 1.7; }
    .legal-section ul { padding-left: 1.2rem; }
    .legal-section li { margin-bottom: .4rem; }
    .legal-section strong { color: var(--ink); font-weight: 700; }
    .legal-section a:not(.legal-toc a) { color: var(--gold-dark); text-decoration: underline; text-decoration-color: var(--line); text-underline-offset: 2px; }
    .legal-section a:not(.legal-toc a):hover { color: var(--ink); text-decoration-color: var(--gold); }
    .legal-section .table-wrap {
      overflow-x: auto;
      margin: 1rem 0 1.5rem;
      border: 1px solid var(--line);
    }
    .legal-section table { width: 100%; border-collapse: collapse; font-size: .92rem; }
    .legal-section table caption { display: none; }
    .legal-section th, .legal-section td {
      text-align: left;
      padding: .75rem .9rem;
      border-bottom: 1px solid var(--line);
      vertical-align: top;
    }
    .legal-section tr:last-child td { border-bottom: none; }
    .legal-section th { background: var(--soft); font-weight: 700; }
    .legal-contact-box {
      background: var(--soft);
      border: 1px solid var(--line);
      border-left: 3px solid var(--gold);
      padding: 1.5rem 1.75rem;
      margin-top: 2.5rem;
      display: flex;
      flex-wrap: wrap;
      gap: 1.5rem 3rem;
      align-items: center;
    }
    .legal-contact-box p { margin-bottom: .25rem; }
    .legal-contact-box strong { display: block; margin-bottom: .5rem; }
  </style>
<?php require __DIR__ . '/includes/navrh-styles.php'; ?>
</head>

<body class="night-gallery tm-legacy">

  <?php $isHome = false; include __DIR__ . '/includes/header.php'; ?>

  <a class="tm-skip" href="#obsah">Přeskočit na obsah</a><main id="obsah">
    <section class="section-padding legal-section">
      <div class="container-xl" style="max-width: 1040px;">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-3">
            <li class="breadcrumb-item"><a href="./">Domů</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ochrana osobních údajů</li>
          </ol>
        </nav>

        <div class="legal-header">
          <span class="eyebrow">GDPR / Osobní údaje</span>
          <h1>Zásady zpracování osobních údajů</h1>
          <p class="lead">Vysvětlení, jaké osobní údaje shromažďujeme, proč, jak dlouho je uchováváme a jaká máte
            v souvislosti s jejich zpracováním práva. Platí pro webové stránky trimistri.cz.</p>
        </div>

        <div class="legal-layout">
          <nav class="legal-toc" aria-label="Obsah stránky">
            <div class="legal-toc-title">Obsah</div>
            <ol>
              <li><a href="#spravce">1. Správce údajů</a></li>
              <li><a href="#udaje">2. Jaké údaje</a></li>
              <li><a href="#ucel">3. Účel a základ</a></li>
              <li><a href="#doba">4. Doba uchování</a></li>
              <li><a href="#predavani">5. Komu předáváme</a></li>
              <li><a href="#cookies">6. Cookies</a></li>
              <li><a href="#prava">7. Vaše práva</a></li>
            </ol>
          </nav>

          <div class="legal-content">

        <h2 id="spravce"><span class="num">1</span> Kdo je správcem údajů</h2>
        <p>Správcem osobních údajů je:</p>
        <p>
          <strong>Tři Mistři</strong> (Jakub Jaššo)<br>
          Nová 315, 679 02 Rájec-Jestřebí<br>
          IČO: 23193620<br>
          E-mail: <a href="mailto:info@trimistri.cz">info@trimistri.cz</a><br>
          Telefon: <a href="tel:+420774927182">+420 774 927 182</a>
        </p>

        <h2 id="udaje"><span class="num">2</span> Jaké údaje zpracováváme</h2>
        <p>Osobní údaje zpracováváme v těchto případech:</p>
        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>Situace</th>
                <th>Jaké údaje</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Odeslání poptávkového formuláře</td>
                <td>Jméno a příjmení, telefon, e-mail (nepovinně), popis zakázky, případně nahrané fotografie
                  prostoru nebo fasády</td>
              </tr>
              <tr>
                <td>Telefonický nebo e-mailový kontakt</td>
                <td>Jméno, telefonní číslo nebo e-mailová adresa, obsah komunikace</td>
              </tr>
              <tr>
                <td>Prohlížení webu</td>
                <td>Technické a analytické údaje o návštěvě (viz sekce Cookies níže)</td>
              </tr>
            </tbody>
          </table>
        </div>

        <h2 id="ucel"><span class="num">3</span> Proč údaje zpracováváme (účel a právní základ)</h2>
        <ul>
          <li><strong>Vyřízení poptávky a komunikace se zájemcem</strong> - na základě jednání o uzavření smlouvy
            (čl. 6 odst. 1 písm. b) GDPR).</li>
          <li><strong>Realizace a fakturace zakázky</strong>, pokud dojde k uzavření smlouvy - plnění smlouvy a
            plnění právních povinností (fakturace, účetnictví).</li>
          <li><strong>Měření návštěvnosti a vyhodnocování efektivity reklamy</strong> (Google Ads konverze) - na
            základě Vašeho souhlasu s používáním nezbytných analytických/marketingových nástrojů.</li>
        </ul>

        <h2 id="doba"><span class="num">4</span> Jak dlouho údaje uchováváme</h2>
        <ul>
          <li>Údaje z nerealizované poptávky uchováváme po dobu <strong>12 měsíců</strong> od posledního kontaktu,
            poté je mažeme.</li>
          <li>Údaje k realizovaným zakázkám uchováváme po dobu vyžadovanou zákonem (např. účetní a daňové doklady
            po dobu stanovenou zákonem o účetnictví a daňovými předpisy).</li>
          <li>Nahrané fotografie prostoru mažeme nejpozději do <strong>12 měsíců</strong> od odeslání poptávky,
            pokud nejsou součástí dokumentace k realizované zakázce.</li>
        </ul>

        <h2 id="predavani"><span class="num">5</span> Komu údaje předáváme</h2>
        <p>Vaše údaje <strong>zásadně nepředáváme</strong> třetím stranám k jejich vlastnímu marketingu. Údaje mohou být zpřístupněny:</p>
        <ul>
          <li>poskytovateli webhostingu a e-mailových služeb, kteří pro nás zajišťují technický provoz webu,</li>
          <li>společnosti Google (Google Ads, Google Analytics) za účelem měření návštěvnosti a účinnosti reklamy -
            telefon a e-mail se přenáší pouze v podobě <strong>nevratného kryptografického otisku (hash)</strong>,
            nikoli v čitelné podobě,</li>
          <li>subdodavatelům podílejícím se na realizaci zakázky, je-li to nezbytné pro její provedení.</li>
        </ul>

        <h2 id="cookies"><span class="num">6</span> Cookies</h2>
        <p>Web používá technické cookies nezbytné pro fungování formuláře a analytické/marketingové cookies služby
          Google (Google Ads, Google Analytics) sloužící k měření návštěvnosti a vyhodnocení účinnosti reklamních
          kampaní. Analytické a reklamní cookies můžete povolit nebo odmítnout; svou volbu lze kdykoli změnit přes
          „Nastavení cookies“ v patičce webu. Technické cookies potřebné pro formulář zůstávají aktivní.</p>

        <h2 id="prava"><span class="num">7</span> Vaše práva</h2>
        <p>V souvislosti se zpracováním osobních údajů máte právo:</p>
        <ul>
          <li>na přístup ke svým osobním údajům,</li>
          <li>na opravu nepřesných nebo neúplných údajů,</li>
          <li>na výmaz údajů („právo být zapomenut"), pokud pro jejich zpracování odpadl důvod,</li>
          <li>na omezení zpracování,</li>
          <li>na přenositelnost údajů,</li>
          <li>vznést námitku proti zpracování,</li>
          <li>podat stížnost u Úřadu pro ochranu osobních údajů (<a href="https://www.uoou.cz/" target="_blank"
              rel="noopener">www.uoou.cz</a>), pokud se domníváte, že Vaše údaje zpracováváme v rozporu s právními
            předpisy.</li>
        </ul>
        <p>Svá práva můžete uplatnit e-mailem nebo telefonicky na kontaktech uvedených výše.</p>

        <div class="legal-contact-box">
          <div>
            <strong>Kontakt pro uplatnění práv a dotazy ke zpracování osobních údajů</strong>
            <p>E-mail: <a href="mailto:info@trimistri.cz">info@trimistri.cz</a></p>
            <p class="mb-0">Telefon: <a href="tel:+420774927182">+420 774 927 182</a></p>
          </div>
        </div>

        <p class="mt-4"><small class="text-muted">Tyto zásady mohou být čas od času aktualizovány. Aktuální verze
          je vždy dostupná na této stránce. Poslední aktualizace: srpen 2026.</small></p>

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

      const tocLinks = document.querySelectorAll('.legal-toc a');
      const tocTargets = Array.from(tocLinks).map((a) => document.getElementById(a.getAttribute('href').slice(1)));
      const onScrollToc = () => {
        if (!tocTargets.length) return;
        let activeIndex = 0;
        tocTargets.forEach((el, i) => {
          if (el && el.getBoundingClientRect().top - 120 <= 0) activeIndex = i;
        });
        tocLinks.forEach((a, i) => a.classList.toggle('active', i === activeIndex));
      };
      window.addEventListener('load', onScrollToc);
      document.addEventListener('scroll', onScrollToc);
    })();
  </script>
</body>

</html>
