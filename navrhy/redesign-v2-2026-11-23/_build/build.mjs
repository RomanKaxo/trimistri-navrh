// Generátor návrhu v2: z dat živého webu (data/*.json) skládá všechny statické stránky.
// Spuštění z kořene složky návrhu: node _build/build.mjs
import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const HERE = path.dirname(fileURLToPath(import.meta.url));
const ROOT = path.resolve(HERE, '..');
const C = JSON.parse(fs.readFileSync(path.join(HERE, 'data/content.json'), 'utf8'));
const G = JSON.parse(fs.readFileSync(path.join(HERE, 'data/galleries.json'), 'utf8'));
const DIM = JSON.parse(fs.readFileSync(path.join(HERE, 'data/dims.json'), 'utf8'));

const PHONE = '+420 774 927 182';
const TEL = 'tel:+420774927182';
const MAIL = 'info@trimistri.cz';
const GOOGLE = 'https://www.google.com/maps?cid=6542642701333762246';
const VERSION = '20261123';

const esc = (s = '') => String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
const clean = (s = '') => String(s).replace(/\s*[↗↓→]\s*$/u, '').replace(/[↗↓]/gu, '').trim();
const idOf = (u) => { try { return new URL(u).searchParams.get('id'); } catch { return null; } };
const plural = (n, one, few, many) => `${n} ${n === 1 ? one : n >= 2 && n <= 4 ? few : many}`;

/* ---------- ikony (jedna sada, tah 1,5) ---------- */
const svg = (d, size = 18) => `<svg class="i" width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">${d}</svg>`;
const I = {
  arrow: svg('<path d="M5 12h14"/><path d="m13 6 6 6-6 6"/>'),
  down: svg('<path d="M12 5v14"/><path d="m6 13 6 6 6-6"/>'),
  out: svg('<path d="M7 17 17 7"/><path d="M8 7h9v9"/>', 16),
  phone: svg('<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2Z"/>'),
  mail: svg('<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>'),
  pin: svg('<path d="M20 10c0 5-5.5 10.2-7.4 11.8a1 1 0 0 1-1.2 0C9.5 20.2 4 15 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/>', 16),
  close: svg('<path d="M18 6 6 18"/><path d="m6 6 12 12"/>', 22),
  prev: svg('<path d="m15 18-6-6 6-6"/>', 22),
  next: svg('<path d="m9 18 6-6-6-6"/>', 22),
  plus: svg('<path d="M12 5v14"/><path d="M5 12h14"/>'),
  upload: svg('<path d="M12 15V3"/><path d="m7 8 5-5 5 5"/><path d="M20 15v4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-4"/>', 22),
  photos: svg('<rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.1-3.1a2 2 0 0 0-2.8 0L6 21"/>', 16),
  check: svg('<path d="M20 6 9 17l-5-5"/>'),
  menu: svg('<path d="M4 7h16"/><path d="M4 12h16"/><path d="M4 17h16"/>', 22),
};
const brandMark = `<svg class="brand-mark" width="26" height="28" viewBox="0 0 26 28" aria-hidden="true" focusable="false"><rect x="0" y="9" width="6" height="19" rx="1"/><rect x="10" y="3" width="6" height="25" rx="1"/><rect x="20" y="0" width="6" height="28" rx="1"/></svg>`;

/* ---------- obrázky ---------- */
function imgTag(name, alt, { sizes = '(max-width: 760px) 100vw, 50vw', cls = '', eager = false, focus = '' } = {}) {
  const d = DIM[name];
  if (!d) throw new Error('Chybí rozměry fotky ' + name);
  const [tw, th, fw, fh] = d;
  const srcset = fw > tw ? ` srcset="img/${name}-t.webp ${tw}w, img/${name}-f.webp ${fw}w" sizes="${sizes}"` : '';
  const style = focus ? ` style="object-position:${focus}"` : '';
  return `<img${cls ? ` class="${cls}"` : ''} src="img/${name}-t.webp"${srcset} width="${tw}" height="${th}" alt="${esc(alt)}"${style} ${eager ? 'fetchpriority="high" decoding="async"' : 'loading="lazy" decoding="async"'}>`;
}
const full = (name) => { const d = DIM[name]; return { f: `img/${name}-f.webp`, w: d[2], h: d[3] }; };

/* ---------- služby a jejich pořadí ---------- */
const SERVICE_ORDER = ['natery-interieru', 'tapetovani', 'specialni-natery', 'sanace-po-zatekani', 'dekoracni-sterky', 'mikrocement', 'natery-fasad', 'natery-strech', 'cisteni-fasad', 'odstraneni-grafiti', 'natery-drevo-kovu', 'prumyslove-natery', 'epoxidove-podlahy', 'pismomalirstvi'];
const SERVICE_NAME = Object.fromEntries(SERVICE_ORDER.map((s) => [s, C.services[s].breadcrumb.at(-1)]));
const OPTION_VALUE = { 'Nátěry střech, okapů a svodů': 'Nátěry střech' };
const HINTS = JSON.parse(C.home.hints);
const DEFAULT_HINT = 'Popište rozsah prací a požadovaný termín.';

/* ---------- galerie ---------- */
function photoItems(card) {
  return card.photos.map((p, i) => {
    const name = 'g-' + idOf(p.url);
    return { name, ...full(name), alt: `${p.title || card.title} – ${p.place || card.place}${p.tag ? ' – ' + p.tag.toLowerCase() : ''}`, tag: p.tag, place: p.place || card.place, i };
  });
}
const pageGroups = {}; // naplní se při skládání stránky
function registerGroup(gid, title, place, items, href = '') {
  pageGroups[gid] = { title, place, href, items: items.map(({ f, w, h, alt, tag, place: pl }) => ({ f, w, h, alt, tag, place: pl })) };
}

/* ---------- společné části ---------- */
function head({ title, description, bodyClass = '' }) {
  return `<!doctype html>
<html lang="cs">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>${esc(title)}</title>
<meta name="description" content="${esc(description)}">
<meta name="theme-color" content="#f4f1ea">
<link rel="icon" href="favicon.ico">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600&amp;display=swap">
<link rel="stylesheet" href="assets/site.css?v=${VERSION}">
<script>document.documentElement.classList.add('js')</script>
</head>
<body class="${bodyClass}">
<a class="skip" href="#obsah">Přeskočit na obsah</a>`;
}

function header({ home = false, service = false, hasForm = false }) {
  const h = (a) => (home ? a : 'index.html' + a);
  const quote = hasForm ? '#poptavka' : 'index.html#poptavka';
  const link = (href, label, extra = '') => `<a href="${href}"${extra}>${label}</a>`;
  return `
<header class="site-header" data-header>
  <div class="wrap header-row">
    <a class="brand" href="index.html" aria-label="Tři Mistři – úvod">${brandMark}<span class="brand-text"><strong>Tři Mistři</strong><small>Malby · nátěry · povrchy</small></span></a>
    <nav class="nav" id="hlavni-menu" aria-label="Hlavní navigace" data-nav>
      ${link(h('#top'), 'Úvod', home ? ' aria-current="location"' : '')}
      ${link(h('#realizace'), 'Realizace')}
      ${link(h('#sluzby'), 'Služby', service ? ' aria-current="page"' : '')}
      ${link(h('#postup'), 'Postup')}
      ${link(h('#recenze'), 'Recenze')}
      ${link(h('#kontakt'), 'Kontakt')}
      <a class="btn btn-accent nav-quote" href="${quote}">Nezávazná poptávka ${I.arrow}</a>
    </nav>
    <div class="header-actions">
      <a class="header-phone" href="${TEL}" aria-label="Zavolat na ${PHONE}">${I.phone}<span><small>Zavolat</small>${PHONE}</span></a>
      <a class="btn btn-accent header-quote" href="${quote}">Nezávazná poptávka</a>
      <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="hlavni-menu" data-menu-toggle><span class="menu-label">Menu</span>${I.menu}</button>
    </div>
  </div>
</header>`;
}

function footer() {
  return `
<footer class="site-footer">
  <div class="wrap">
    <div class="footer-grid">
      <div class="footer-about">
        <a class="footer-brand" href="index.html">Tři Mistři</a>
        <p>Malby, nátěry a povrchy.<br>Od první domluvy po poslední detail.</p>
        <a class="link-arrow" href="index.html#poptavka">Probrat váš projekt ${I.arrow}</a>
      </div>
      <nav aria-labelledby="f-sluzby"><h2 id="f-sluzby">Co pro vás uděláme</h2>
        <a href="natery-interieru.html">Malování interiérů</a><a href="dekoracni-sterky.html">Dekorativní stěrky</a><a href="tapetovani.html">Tapetování</a><a href="natery-drevo-kovu.html">Dřevo a kov</a><a href="natery-fasad.html">Fasády</a><a href="cisteni-fasad.html">Čištění fasád</a><a href="index.html#sluzby">Všechny služby</a></nav>
      <nav aria-labelledby="f-prohlednete"><h2 id="f-prohlednete">Prohlédněte si</h2>
        <a href="index.html#realizace">Naše realizace</a><a href="index.html#postup">Jak pracujeme</a><a href="index.html#recenze">Recenze zákazníků</a><a href="index.html#kontakt">Kontakt</a></nav>
      <div class="footer-contact"><h2>Ozvěte se nám</h2>
        <a class="footer-big" href="${TEL}">${PHONE}</a>
        <a href="mailto:${MAIL}">${MAIL}</a>
        <p>Tři Mistři s.r.o. · IČO 30139015<br>Nové sady 988/2, 602 00 Brno</p>
        <p>Brno · Blansko · Olomouc · Zlín<br>a okolí</p>
      </div>
    </div>
    <p class="footer-word" aria-hidden="true">Tři Mistři</p>
    <div class="footer-bottom">
      <span>© 2026 Tři Mistři</span>
      <a href="ochrana-osobnich-udaju.html">Ochrana osobních údajů</a>
      <button type="button" class="footer-cookies" data-consent-open aria-controls="consent-panel" aria-expanded="false">Nastavení cookies</button>
      <a href="#obsah">Zpět na začátek ↑</a>
    </div>
    <p class="footer-credit">Návrh v2 z 23. 11. 2026 · postup a pravidla mimo jiné unslop by <a href="https://x.com/heydamir">@heydamir</a> (CC BY 4.0)</p>
  </div>
</footer>
<aside id="consent-panel" class="consent" aria-label="Nastavení analytických a reklamních cookies" hidden data-consent>
  <div><strong>Cookies pro měření a reklamu</strong>
  <p>Pomáhají nám vyhodnocovat návštěvnost a účinnost reklam. Můžete je povolit nebo odmítnout; technické cookies potřebné pro formulář zůstanou aktivní. <a href="ochrana-osobnich-udaju.html#cookies">Více informací</a></p></div>
  <div class="consent-actions"><button type="button" class="btn btn-quiet" data-consent-choice="denied">Odmítnout</button><button type="button" class="btn btn-accent" data-consent-choice="granted">Povolit</button></div>
</aside>`;
}

function mobileBar(label, hasForm) {
  return `<div class="mobile-bar" aria-label="Poptávka a telefon"><a class="btn btn-quiet" href="${TEL}" aria-label="Zavolat Třem Mistrům na ${PHONE}">${I.phone} Zavolat</a><a class="btn btn-accent" href="${hasForm ? '#poptavka' : 'index.html#poptavka'}">${label}</a></div>`;
}

function lightboxDialogs() {
  return `
<dialog class="lb" aria-label="Fotografie realizace" data-lb>
  <div class="lb-top"><p class="lb-title" data-lb-title></p><p class="lb-count" aria-live="polite" data-lb-count></p><button type="button" class="lb-btn lb-close" data-lb-close aria-label="Zavřít galerii">${I.close}</button></div>
  <figure class="lb-stage"><img data-lb-img alt=""><figcaption class="lb-cap"><span class="tag" data-lb-tag hidden></span><span data-lb-place></span></figcaption></figure>
  <button type="button" class="lb-btn lb-prev" data-lb-prev aria-label="Předchozí fotka">${I.prev}</button>
  <button type="button" class="lb-btn lb-next" data-lb-next aria-label="Další fotka">${I.next}</button>
  <div class="lb-thumbs" data-lb-thumbs></div>
</dialog>
<dialog class="rv-dialog" aria-labelledby="rv-dialog-name" data-review-dialog>
  <button type="button" class="lb-btn rv-close" data-review-close aria-label="Zavřít recenzi">${I.close}</button>
  <p class="rv-dialog-meta" data-review-meta></p>
  <h2 id="rv-dialog-name" data-review-name></h2>
  <div class="rv-dialog-text" data-review-text></div>
  <p class="rv-price" data-review-price></p>
  <a class="link-arrow" href="${GOOGLE}" target="_blank" rel="noopener">Recenze na Google ${I.out}</a>
</dialog>`;
}

function foot(extraScript = '') {
  const data = Object.keys(pageGroups).length ? `<script>window.TM_GALLERY=${JSON.stringify(pageGroups)};window.TM_HINTS=${JSON.stringify(HINTS)};</script>` : `<script>window.TM_HINTS=${JSON.stringify(HINTS)};</script>`;
  return `${data}${extraScript}
<script src="assets/site.js?v=${VERSION}" defer></script>
</body>
</html>
`;
}

/* ---------- recenze ---------- */
function reviews({ headingLevel = 'h2', idPrefix = 'r' }) {
  const rv = C.home.reviews;
  const card = (r, i) => `
      <article class="review${i >= 9 ? ' is-extra' : ''}"${i >= 9 ? ' hidden' : ''} data-review>
        <blockquote><p id="${idPrefix}-text-${i}">${esc(r.text).replace(/\n/g, '<br>')}</p></blockquote>
        <button type="button" class="review-more" data-review-open hidden>Číst celou recenzi</button>
        ${r.price ? `<p class="rv-price">${esc(r.price)}</p>` : ''}
        <footer class="review-by"><span class="avatar" aria-hidden="true">${esc(r.avatar || r.name[0])}</span><span><strong data-review-author>${esc(r.name)}</strong><small data-review-age>${esc(r.source)} · ${esc(r.stars)}${r.age ? ' · ' + esc(r.age) : ''}</small></span></footer>
      </article>`;
  return `
<section class="section reviews" id="recenze" aria-labelledby="${idPrefix}-title">
  <div class="wrap">
    <div class="reviews-head reveal">
      <${headingLevel} id="${idPrefix}-title" class="h2">Co o nás říkají klienti</${headingLevel}>
      <a class="rating" href="${GOOGLE}" target="_blank" rel="noopener" aria-label="Google recenze: hodnocení 5 z 5, 29 recenzí zákazníků. Otevře Google.">
        <span class="rating-num">5,0<small>/ 5</small></span>
        <span class="rating-txt"><span class="stars" aria-hidden="true">★★★★★</span>z 29 recenzí zákazníků na Googlu ${I.out}</span>
      </a>
    </div>
    <div class="review-grid" data-reviews>${rv.map(card).join('')}
    </div>
    <div class="reviews-actions">
      <button type="button" class="btn btn-quiet" data-reviews-more aria-expanded="false">Zobrazit dalších ${rv.length - 9} recenzí</button>
      <a class="link-arrow" href="${GOOGLE}" target="_blank" rel="noopener">Zobrazit všech 29 recenzí na Googlu ${I.out}</a>
    </div>
  </div>
</section>`;
}

/* ---------- formulář ---------- */
function serviceSelect(selected, firstLabel) {
  const groups = C.home.kontakt.options;
  return `<option value="">${esc(firstLabel)}</option>` + groups.map(([label, opts]) => `<optgroup label="${esc(label)}">${opts.map((o) => { const v = OPTION_VALUE[o] || o; return `<option value="${esc(v)}"${v === selected ? ' selected' : ''}>${esc(o)}</option>`; }).join('')}</optgroup>`).join('');
}

function quoteForm({ selected = '', formHeading = 'h3', formTitle = 'Nezávazná poptávka' }) {
  const hint = HINTS[selected] || DEFAULT_HINT;
  const serviceLabel = selected || 'Malby, nátěry a povrchy';
  return `
    <div class="quote">
      <aside class="quote-aside">
        <p class="quote-motto">Váš prostor. Naše řemeslo.</p>
        <p class="quote-big">Pár detailů.<br>A začneme.</p>
        <p>Pošlete nám zadání. Rozsah práce, cenu i termín spolu upřesníme.</p>
        <dl class="quote-service"><dt>Co budeme řešit</dt><dd data-form-service>${esc(serviceLabel)}</dd></dl>
        <div class="quote-direct"><p>Raději se domluvíte přímo?</p><a href="${TEL}">${I.phone} ${PHONE}</a><a href="mailto:${MAIL}">${I.mail} ${MAIL}</a></div>
        <p class="quote-area">${I.pin} Brno a okolí</p>
      </aside>
      <form class="quote-form" id="poptavka" action="mailto:${MAIL}" method="post" enctype="text/plain" novalidate data-quote>
        <div class="quote-form-head">
          <${formHeading} class="h3">${esc(formTitle)}</${formHeading}>
          <p>Stručně popište práci a případně přiložte fotky. Ozveme se vám do 24 hodin.</p>
          <p class="quote-direct-inline">Raději přímo? <a href="${TEL}">${PHONE}</a> · <a href="mailto:${MAIL}">${MAIL}</a></p>
        </div>
        <div class="form-error-summary" role="alert" tabindex="-1" hidden data-error-summary></div>
        <div class="hp" aria-hidden="true"><label for="hp-field">Nevyplňujte toto pole</label><input type="text" id="hp-field" name="hp_field_x92" tabindex="-1" autocomplete="off"></div>
        <fieldset>
          <legend>Kontaktní údaje <small>* povinné údaje</small></legend>
          <div class="field-grid">
            <div class="field"><label for="f-name">Jméno a příjmení <span aria-hidden="true">*</span></label><input id="f-name" name="name" type="text" autocomplete="name" maxlength="100" required placeholder="Jan Novák" aria-describedby="f-name-err"><p class="field-err" id="f-name-err" hidden></p></div>
            <div class="field"><label for="f-phone">Telefon <span aria-hidden="true">*</span></label><input id="f-phone" name="phone" type="tel" autocomplete="tel" maxlength="30" required placeholder="Váš telefon" aria-describedby="f-phone-err"><p class="field-err" id="f-phone-err" hidden></p></div>
            <div class="field"><label for="f-email">E-mail <span class="opt">(nepovinné)</span></label><input id="f-email" name="email" type="email" autocomplete="email" maxlength="254" placeholder="vas@email.cz" aria-describedby="f-email-err"><p class="field-err" id="f-email-err" hidden></p></div>
            <div class="field"><label for="f-service">Typ služby <span class="opt">(nepovinné)</span></label><select id="f-service" name="service" data-service-select>${serviceSelect(selected, 'Nevím / jiná služba')}</select></div>
            <div class="field field-wide"><label for="f-city">Město / obec realizace <span class="opt">(nepovinné)</span></label><input id="f-city" name="city" type="text" autocomplete="address-level2" maxlength="120" placeholder="Např. Brno"></div>
          </div>
        </fieldset>
        <fieldset>
          <legend>Detaily zakázky</legend>
          <div class="field"><label for="f-message">Popis zakázky</label><p class="field-hint" id="f-message-hint" data-message-hint>${esc(hint)}</p><textarea id="f-message" name="message" rows="5" maxlength="5000" placeholder="Vaše zadání a případné dotazy" aria-describedby="f-message-hint"></textarea></div>
          <div class="field">
            <span class="label" id="f-photos-label">Fotky prostoru nebo fasády <span class="opt">(nepovinné)</span></span>
            <label class="upload" for="f-photos">${I.upload}<strong>Přidat fotografie</strong><span>JPG, PNG nebo WebP · až 5 fotek</span><input id="f-photos" name="photos" type="file" multiple accept=".jpg,.jpeg,.png,.webp" aria-describedby="f-photos-help f-photos-err" data-photos></label>
            <p class="field-hint" id="f-photos-help">Můžete nahrát maximálně 5 fotek, každou do 4 MB. Pomůže nám to rychleji odhadnout rozsah práce.</p>
            <p class="field-err" id="f-photos-err" hidden></p>
            <ul class="upload-list" data-photo-list aria-label="Vybrané fotografie"></ul>
          </div>
        </fieldset>
        <div class="quote-submit">
          <button class="btn btn-accent btn-lg" type="submit">Odeslat poptávku ${I.arrow}</button>
          <p class="privacy">Odesláním formuláře potvrzujete, že souhlasíte se <a href="ochrana-osobnich-udaju.html">zpracováním osobních údajů</a>. Údaje použijeme pouze pro vyřízení Vaší poptávky.</p>
        </div>
        <div class="form-done" role="status" tabindex="-1" hidden data-form-done>
          <p class="h3">Poptávka je připravená v e-mailu</p>
          <p>V návrhu se poptávka neodesílá na server: otevřeli jsme e-mail na ${MAIL} s vyplněnými údaji. Vybrané fotky k němu prosím přiložte ručně a e-mail odešlete.</p>
          <a class="link-arrow" href="dekujeme.html">Pokračovat na poděkování ${I.arrow}</a>
        </div>
      </form>
    </div>`;
}

/* ---------- úvod ---------- */
function buildHome() {
  for (const k of Object.keys(pageGroups)) delete pageGroups[k];
  const H = C.home;
  const hero = H.hero;
  const shotName = (s) => 'h-' + s.img.split('/').pop().replace('.webp', '');
  const focus = ['32% 48%', '50% 45%', '40% 66%', '50% 38%', '52% 46%', '50% 38%'];
  const order = [1, 0, 2, 3, 4, 5]; // 159 ordinace jako hlavní snímek
  const shots = order.map((i) => ({ ...hero.shots[i], name: shotName(hero.shots[i]), focus: focus[i] }));
  registerGroup('hero', 'Z naší práce', '', shots.map((s) => ({ ...full(s.name), alt: s.alt, tag: '', place: s.alt })));

  const mosaic = shots.map((s, i) => `<a class="mosaic-item m${i + 1}" href="img/${s.name}-f.webp" data-lb-open="hero" data-index="${i}" aria-label="Zvětšit fotku: ${esc(s.alt)}">${imgTag(s.name, s.alt, { eager: i < 2, focus: s.focus, sizes: i === 0 ? '(max-width: 760px) 100vw, 45vw' : '(max-width: 760px) 34vw, 22vw' })}<span class="mosaic-cap">${esc(s.alt)}</span></a>`).join('');

  // kategorie realizací
  const catStats = (slug) => { const cards = G[slug] || []; return { n: cards.length, p: cards.reduce((a, c) => a + c.photos.length, 0) }; };
  const cats = H.gallery.cats.map((c, i) => {
    const slug = c.href.replace('./', '');
    const name = c.img.includes('app.') ? 'g-' + idOf(c.img) : 'l-pismomalirstvi2';
    const st = catStats(slug);
    return `<li class="cat c${i + 1} reveal"><a href="${slug}.html">${imgTag(name, c.alt, { sizes: '(max-width: 760px) 100vw, 40vw' })}<span class="cat-cap"><span class="cat-name">${esc(c.h3)}</span><span class="cat-meta">Ukázky realizací · ${plural(st.n, 'zakázka', 'zakázky', 'zakázek')}, ${plural(st.p, 'fotka', 'fotky', 'fotek')}</span></span></a></li>`;
  }).join('');

  // před a po (skutečné štítky fotek ze stejné zakázky)
  const pairsDef = [
    ['specialni-natery', 'Renovace koupelny a wc', 0, 2],
    ['natery-drevo-kovu', 'Renovace dveří a oken', 0, 0],
    ['natery-interieru', 'Výmalba Cukrárny', 0, 1],
    ['natery-fasad', 'Nátěr fasády', 1, 2],
  ];
  const pairs = pairsDef.map(([slug, title, bi, ai], k) => {
    const card = G[slug].find((c) => c.title === title);
    const items = photoItems(card);
    const gid = `ba-${k}`;
    registerGroup(gid, card.title, card.place, items, slug + '.html');
    const before = items.filter((x) => x.tag === 'Před')[bi];
    const after = items.filter((x) => x.tag === 'Po')[ai];
    const one = (x, label) => `<a class="ba-img" href="${x.f}" data-lb-open="${gid}" data-index="${x.i}" aria-label="${label}: ${esc(card.title)}, ${esc(card.place)}. Otevřít všech ${items.length} fotek">${imgTag(x.name, x.alt, { sizes: '(max-width: 760px) 50vw, 25vw' })}<span class="tag">${label}</span></a>`;
    return `<figure class="ba reveal">${one(before, 'Před')}${one(after, 'Po')}<figcaption><a href="${slug}.html">${esc(card.title)}</a><span>${esc(card.place)} · ${SERVICE_NAME[slug]}</span></figcaption></figure>`;
  }).join('');

  // služby
  const groupsHtml = (() => {
    const s = H.services.html;
    const groups = [
      { h: 'Malování a interiéry', href: 'natery-interieru', d: 'Malby stěn a stropů, příprava podkladu a čisté dokončení.', items: [['natery-interieru', 'Malování bytů a interiérů'], ['tapetovani', 'Tapetování'], ['specialni-natery', 'Speciální interiérové nátěry'], ['sanace-po-zatekani', 'Sanace po zatékání']] },
      { h: 'Dekorativní stěrky', href: 'dekoracni-sterky', d: 'Marmorino, betonové efekty, limewash a další dekorativní techniky.', tech: ['Betonová stěrka', 'Marmorino', 'Travertino', 'Benátský štuk', 'Mikrocement'], items: [['dekoracni-sterky', 'Betonové a dekorativní stěrky'], ['mikrocement', 'Mikrocement a stěrky přes obklady']] },
      { h: 'Fasády, střechy, okapy a svody', href: 'natery-fasad', d: 'Příprava, opravy a ochranné fasádní nátěry.', items: [['natery-fasad', 'Nátěry a renovace fasád'], ['natery-strech', 'Nátěry střech, okapů a svodů'], ['cisteni-fasad', 'Čištění fasád a povrchů'], ['odstraneni-grafiti', 'Odstranění graffiti']] },
      { h: 'Nátěry dřeva a kovů', href: 'natery-drevo-kovu', d: 'Okna, dveře, podbití, pergoly, ploty i ocelové konstrukce.', items: [['natery-drevo-kovu', 'Nátěry oken, podbití, dřeva a kovů'], ['prumyslove-natery', 'Průmyslové a antikorozní nátěry']] },
      { h: 'Další služby', items: [['epoxidove-podlahy', 'Epoxidové podlahy'], ['pismomalirstvi', 'Písmomalířství']], extra: '<a class="link-arrow" href="#realizace">Naše realizace ' + I.arrow + '</a>' },
    ];
    for (const g of groups) for (const [, label] of g.items) if (!s.includes(label)) throw new Error('Služba chybí v živém HTML: ' + label);
    return groups.map((g) => `
        <article class="svc-group reveal">
          <div class="svc-head">
            <h3>${g.href ? `<a href="${g.href}.html">${esc(g.h)}</a>` : esc(g.h)}</h3>
            ${g.d ? `<p>${esc(g.d)}</p>` : ''}
            ${g.tech ? `<p class="svc-tech"><span class="sr-only">Techniky: </span>${g.tech.map(esc).join(' · ')}</p>` : ''}
            ${g.extra || ''}
          </div>
          <ul class="svc-list">${g.items.map(([slug, label]) => `<li><a href="${slug}.html"><span>${esc(label)}</span>${I.arrow}</a></li>`).join('')}</ul>
        </article>`).join('');
  })();

  const P = H.process;
  const steps = P.steps.map(([t, p]) => `<li class="reveal"><h3>${esc(t)}</h3><p>${esc(p)}</p></li>`).join('');

  const html = `${head({ title: H.title, description: H.description, bodyClass: 'page-home' })}
${header({ home: true, hasForm: true })}
<main id="obsah">
<section class="hero" id="top" aria-labelledby="hero-title">
  <div class="wrap hero-grid">
    <div class="hero-copy">
      <h1 id="hero-title" class="hero-h1"><span class="hero-h1-kicker">Malíři v Brně a dekorativní stěrky</span> Práce, která zůstává</h1>
      <p class="hero-lead">Pečlivá příprava, jistá ruka a výsledek, který obstojí v každodenním životě.</p>
      <div class="actions">
        <a class="btn btn-accent btn-lg" href="#poptavka">Nezávazně poptat ${I.arrow}</a>
        <a class="btn btn-quiet btn-lg" href="#realizace">Prohlédnout realizace ${I.down}</a>
      </div>
      <dl class="hero-facts">
        <div><dt><a href="${GOOGLE}" target="_blank" rel="noopener">5,0 / 5 ${I.out}</a></dt><dd>z 29 recenzí zákazníků na Googlu</dd></div>
        <div><dt>Přes 15 let</dt><dd>Náš tým má přes 15 let praxe v oboru</dd></div>
        <div><dt>Brno a okolí</dt><dd>Malířství · nátěry · povrchy. Tři Mistři — řemeslo v detailu</dd></div>
      </dl>
    </div>
    <div class="mosaic">${mosaic}</div>
  </div>
</section>

<section class="section work-cats" id="realizace" aria-labelledby="realizace-title">
  <div class="wrap">
    <div class="section-head reveal">
      <h2 id="realizace-title" class="h2">Řemeslo, které je vidět</h2>
      <p class="section-lead">Každý prostor má svůj příběh. Prohlédněte si ty, na kterých jsme pracovali.</p>
    </div>
    <ul class="cat-grid" role="list">${cats}</ul>
    <div class="ba-block" aria-labelledby="ba-title">
      <div class="ba-head reveal"><h3 id="ba-title" class="h2-sm">Před a po</h3><p>Fotky ze stejných zakázek, jak je zákazníkům předáváme. Klepnutím otevřete celou realizaci.</p></div>
      <div class="ba-grid">${pairs}</div>
    </div>
  </div>
</section>

<section class="section services" id="sluzby" aria-labelledby="sluzby-title">
  <div class="wrap services-grid">
    <div class="services-intro">
      <h2 id="sluzby-title" class="h2 reveal">Malířské a natěračské práce v Brně</h2>
      <p class="reveal">Malování bytů a pokojů, dekorativní a betonové stěrky i nátěry. Pro domácnosti a firmy v Brně a okolí.</p>
      <p class="services-claim reveal">Interiér, fasáda, dřevo i kov.</p>
      <div class="picker reveal" data-picker>
        <p class="picker-title">Vyberte práci, kterou právě řešíte.</p>
        <label for="picker-select">S čím vám pomůžeme?</label>
        <div class="picker-row"><select id="picker-select" data-picker-select>${serviceSelect('', 'Vyberte službu')}</select><button type="button" class="btn btn-accent" data-picker-go>Poptat službu ${I.arrow}</button></div>
        <p class="picker-note">Vybranou službu vám rovnou předvyplníme do poptávky.</p>
      </div>
    </div>
    <div class="svc-groups">${groupsHtml}
      <div class="unsure reveal"><div><h3>Nejste si jistí, co vaše zakázka potřebuje?</h3><p>Popište nám prostor nebo povrch a domluvíme další postup.</p></div><a class="btn btn-ink" href="#poptavka">Nezávazně poptat ${I.arrow}</a></div>
    </div>
  </div>
</section>

<section class="section process" id="postup" aria-labelledby="postup-title">
  <div class="wrap process-grid">
    <figure class="process-photo reveal">${imgTag('h-process-kitchen', P.alt, { sizes: '(max-width: 760px) 100vw, 45vw' })}<figcaption><strong>15 let</strong><span>Náš tým má přes 15 let praxe v oboru</span></figcaption></figure>
    <div class="process-copy">
      <h2 id="postup-title" class="h2 reveal">V klidu. Od první domluvy.</h2>
      <p class="section-lead reveal">Řeknete nám, co potřebujete změnit. Společně domluvíme postup, cenu a termín — a pustíme se do práce.</p>
      <ol class="steps">${steps}</ol>
      <div class="actions reveal"><a class="btn btn-accent" href="#poptavka">Nezávazně poptat ${I.arrow}</a><a class="btn btn-quiet" href="${TEL}">${I.phone} Zavolat a probrat zadání</a></div>
    </div>
  </div>
</section>
${reviews({ idPrefix: 'home-rv' })}
<section class="section contact" id="kontakt" aria-labelledby="kontakt-title">
  <div class="wrap">
    <div class="contact-head reveal">
      <h2 id="kontakt-title" class="h2">Řekněte nám, co potřebujete.</h2>
      <div><p>Malování bytu, stěrka nebo nový nátěr? Popište práci, místo a přibližný rozsah. Když přidáte fotky, snáz navrhneme další postup.</p>
      <p class="contact-meta">Brno a okolí · domácnosti i firmy</p></div>
    </div>
    ${quoteForm({ selected: '', formTitle: 'Nezávazná poptávka' })}
  </div>
</section>
</main>
${footer()}
${mobileBar('Nezávazná poptávka', true)}
${lightboxDialogs()}
${foot()}`;
  fs.writeFileSync(path.join(ROOT, 'index.html'), html);
}

/* ---------- stránka služby ---------- */
function workCard(card, gid, items, slug, big = false) {
  const before = items.find((x) => x.tag === 'Před');
  const after = items.find((x) => x.tag === 'Po');
  const first = items[0];
  const hasBA = before && after;
  const tags = [...new Set(items.map((x) => x.tag).filter(Boolean))];
  const cover = imgTag(first.name, first.alt, { sizes: big ? '(max-width: 760px) 100vw, 60vw' : '(max-width: 760px) 100vw, 30vw', cls: 'work-img' });
  const swap = hasBA ? `<img class="work-img work-alt" data-ba-before src="img/${before.name}-t.webp" width="${DIM[before.name][0]}" height="${DIM[before.name][1]}" alt="${esc(before.alt)}" loading="lazy" decoding="async">` : '';
  return `
      <article class="work${big ? ' work-big' : ''} reveal" id="realizace-${esc(card.id)}" data-work>
        <a class="work-cover" href="${first.f}" data-lb-open="${gid}" data-index="0" aria-label="Otevřít realizaci ${esc(card.title)}, ${esc(card.place)}: ${plural(items.length, 'fotografie', 'fotografie', 'fotografií')}">${cover}${swap}<span class="work-count">${I.photos} ${items.length}</span></a>
        <div class="work-meta">
          <div><h3>${esc(card.title)}</h3><p>${I.pin} ${esc(card.place)} · ${plural(items.length, 'fotografie', 'fotografie', 'fotografií')}${tags.length ? ` · <span class="work-tags">${tags.map(esc).join(', ')}</span>` : ''}</p>${card.desc ? `<p>${esc(card.desc)}</p>` : ''}</div>
          ${hasBA ? `<div class="ba-switch" role="group" aria-label="Přepnout náhled: před a po"><button type="button" aria-pressed="false" data-ba="before">Před</button><button type="button" aria-pressed="true" data-ba="after">Po</button></div>` : ''}
        </div>
      </article>`;
}

function buildService(slug) {
  for (const k of Object.keys(pageGroups)) delete pageGroups[k];
  const S = C.services[slug];
  const cards = G[slug] || [];
  const name = SERVICE_NAME[slug];
  const R = S.rozsah;
  const P = S.cena;
  const K = S.kontakt;

  // hero obrázek: titulní fotka živé stránky, jinak první fotka první realizace
  let heroVisual = '';
  if (S.cover) {
    const n = 'l-' + S.cover.src.split('/').pop().replace('-700w.webp', '');
    registerGroup('cover', name, S.cover.place, [{ ...full(n), alt: S.cover.alt, tag: '', place: S.cover.place }]);
    heroVisual = `<figure class="svc-cover reveal"><a href="img/${n}-f.webp" data-lb-open="cover" data-index="0" aria-label="Zvětšit fotku: ${esc(S.cover.alt)}">${imgTag(n, S.cover.alt, { eager: true, sizes: '(max-width: 760px) 100vw, 46vw' })}</a><figcaption>${esc(S.cover.label)} · <strong>${esc(S.cover.place)}</strong></figcaption></figure>`;
  } else if (cards.length) {
    const c0 = cards[0]; const it = photoItems(c0)[0];
    heroVisual = `<figure class="svc-cover reveal"><a href="${it.f}" data-lb-open="w-0" data-index="0" aria-label="Zvětšit fotku: ${esc(it.alt)}">${imgTag(it.name, it.alt, { eager: true, sizes: '(max-width: 760px) 100vw, 46vw' })}</a><figcaption>Z naší práce · <strong>${esc(c0.place)}</strong></figcaption></figure>`;
  }
  const material = S.material ? `
    <aside class="material${heroVisual ? ' material-band' : ''} reveal" aria-label="${esc(S.material.aria)}">
      <h2 class="material-h">${esc(S.material.h2)}</h2>
      <p class="material-sub">${esc(S.material.eyebrow)}</p>
      <ol class="material-list">${S.material.items.map((x) => `<li>${esc(x)}</li>`).join('')}</ol>
    </aside>` : '';

  // realizace
  let showcase = '';
  if (cards.length) {
    const recent = cards.filter((c) => !c.older);
    const older = cards.filter((c) => c.older);
    const all = [...recent, ...older];
    const html = all.map((c, i) => { const items = photoItems(c); registerGroup('w-' + i, c.title, c.place, items); return workCard(c, 'w-' + i, items, slug, i === 0 && recent.length > 1); });
    const first = html.slice(0, Math.min(6, recent.length)).join('');
    const restRecent = html.slice(Math.min(6, recent.length), recent.length).join('');
    const restOlder = html.slice(recent.length).join('');
    const photosTotal = cards.reduce((a, c) => a + c.photos.length, 0);
    const extra = restRecent || restOlder;
    showcase = `
<section class="section showcase" id="ukazky" aria-labelledby="ukazky-title">
  <div class="wrap">
    <div class="section-head reveal">
      <h2 id="ukazky-title" class="h2">Podívejte se na výsledek.</h2>
      <p class="section-lead">Ukázky realizací: ${plural(cards.length, 'zakázka', 'zakázky', 'zakázek')} a ${plural(photosTotal, 'fotografie', 'fotografie', 'fotografií')}. Klepnutím na fotku otevřete celou galerii zakázky.</p>
    </div>
    <div class="work-grid${cards.length === 1 ? ' work-grid-one' : ''}">${first}</div>
    ${extra ? `<div class="work-more" id="dalsi-realizace" hidden data-more-target>
      ${restRecent ? `<div class="work-grid">${restRecent}</div>` : ''}
      ${restOlder ? `<h3 class="h3 older-title">Starší realizace</h3><div class="work-grid">${restOlder}</div>` : ''}
    </div>
    <button type="button" class="btn btn-quiet more-btn" aria-expanded="false" aria-controls="dalsi-realizace" data-more>Zobrazit další realizace ${I.down}</button>` : ''}
  </div>
</section>`;
  }

  const jump = S.jump.map(([label, href]) => `<a href="${href}">${esc(clean(label))}</a>`).join('');
  const benefits = R.benefits.map(([h, p]) => `<li class="reveal"><h3>${esc(h)}</h3><p>${esc(p)}</p></li>`).join('');
  const steps = R.steps.map(([h, p]) => `<li class="reveal"><h4>${esc(h)}</h4><p>${esc(p)}</p></li>`).join('');
  const faqs = R.faqs.map(([q, a], i) => `<details class="faq"${i === 0 ? ' open' : ''}><summary><span>${esc(q)}</span>${I.plus}</summary><div class="faq-a">${a.replace(/<a href="#cena">/g, '<a href="#cena">')}</div></details>`).join('');
  const factors = P.factors.map(([h, p]) => `<div><dt>${esc(h)}</dt><dd>${esc(p)}</dd></div>`).join('');
  const how = P.how.map(([h, p]) => `<li><strong>${esc(h)}</strong><span>${esc(p)}</span></li>`).join('');
  const places = P.places.map((x) => `<li>${esc(x)}</li>`).join('');
  const crumbs = `<nav class="crumbs" aria-label="Drobečková navigace"><a href="index.html">Úvod</a><span aria-hidden="true">/</span><a href="index.html#sluzby">Služby</a><span aria-hidden="true">/</span><span aria-current="page">${esc(name)}</span></nav>`;

  const html = `${head({ title: S.title, description: S.description, bodyClass: 'page-service' })}
${header({ service: true, hasForm: true })}
<main id="obsah">
<section class="svc-hero${heroVisual ? '' : ' svc-hero-text'}" aria-labelledby="svc-title">
  <div class="wrap">
    ${crumbs}
    <div class="svc-hero-grid">
      <div class="svc-intro">
        <h1 id="svc-title" class="svc-h1">${esc(S.h1.replace(/\.$/, ''))}</h1>
        <p class="hero-lead">${esc(S.lead)}</p>
        <div class="actions"><a class="btn btn-accent btn-lg" href="#poptavka">${esc(clean(S.cta))} ${I.arrow}</a><a class="btn btn-quiet btn-lg" href="${TEL}">${I.phone} ${PHONE}</a></div>
        <p class="svc-note">${esc(S.note)}</p>
        <dl class="hero-facts hero-facts-sm">
          <div><dt><a href="${GOOGLE}" target="_blank" rel="noopener" aria-label="Hodnocení 5 z 5, 29 recenzí na Google">5,0 / 5 ${I.out}</a></dt><dd>29 recenzí na Google</dd></div>
          <div><dt>Přes 15 let</dt><dd>Náš tým má přes 15 let praxe v oboru</dd></div>
        </dl>
      </div>
      ${heroVisual || material}
    </div>
    ${heroVisual ? material : ''}
  </div>
</section>
<nav class="jump" aria-label="Na této stránce"><div class="wrap jump-row">${jump}</div></nav>
${showcase}
<section class="section about" id="rozsah" aria-labelledby="rozsah-title">
  <div class="wrap">
    <div class="section-head reveal">
      <h2 id="rozsah-title" class="h2">${esc(R.h2)}</h2>
      ${R.intro.map((p) => `<p class="section-lead">${esc(p)}</p>`).join('')}
    </div>
    <ul class="benefits benefits-${R.benefits.length}">${benefits}</ul>
    <div class="about-cols">
      <div id="realizace-postup"><h3 class="h3">${esc(R.processTitle)}</h3><ol class="steps steps-sm">${steps}</ol></div>
      <div id="otazky"><h3 class="h3">${esc(R.faqTitle)}</h3><div class="faqs">${faqs}</div></div>
    </div>
  </div>
</section>
${S.hasReviews ? reviews({ idPrefix: 'svc-rv' }) : ''}
<section class="section price" id="cena" aria-labelledby="price-title">
  <div class="wrap">
    <div class="price-grid">
      <div class="price-main reveal">
        <h2 id="price-title" class="h2">${esc(P.h2)}</h2>
        <p class="section-lead">${esc(P.lead)}</p>
        <dl class="factors">${factors}</dl>
      </div>
      <aside class="price-card reveal" aria-labelledby="price-how">
        <h3 id="price-how" class="h3">Jak získat cenu</h3>
        <ol class="how">${how}</ol>
        <a class="btn btn-accent btn-lg btn-block" href="#poptavka">${esc(clean(P.cta))} ${I.arrow}</a>
        <a class="price-phone" href="${TEL}">nebo zavolejte ${PHONE}</a>
      </aside>
    </div>
    <div class="area reveal">
      <h2 class="h2-sm" id="area-title">${esc(P.areaH2)}</h2>
      <ul class="places" aria-labelledby="area-title">${places}</ul>
    </div>
  </div>
</section>
<section class="section contact" id="kontakt" aria-labelledby="kontakt-title">
  <div class="wrap">
    <div class="contact-head reveal">
      <h2 id="kontakt-title" class="h2">${esc(K.h2)}</h2>
      <div><p>${esc(K.p)}</p>
      <p class="contact-need"><strong>${esc(K.asideTitle)}</strong> ${esc(K.aside)}</p></div>
    </div>
    ${quoteForm({ selected: K.selected, formTitle: 'Řekněte nám, co potřebujete' })}
  </div>
</section>
</main>
${footer()}
${mobileBar('Nezávazně poptat', true)}
${lightboxDialogs()}
${foot()}`;
  fs.writeFileSync(path.join(ROOT, slug + '.html'), html);
}

/* ---------- děkujeme, ochrana, 404 ---------- */
function simplePage(file, { title, description, bodyClass, body }) {
  for (const k of Object.keys(pageGroups)) delete pageGroups[k];
  fs.writeFileSync(path.join(ROOT, file), `${head({ title, description, bodyClass })}
${header({})}
<main id="obsah">${body}</main>
${footer()}
${mobileBar('Nezávazná poptávka', false)}
${foot()}`);
}

function buildThanks() {
  simplePage('dekujeme.html', { title: C.dekujeme.title, description: 'Poptávka odeslána. Ozveme se Vám co nejdříve.', bodyClass: 'page-simple', body: `
<section class="simple" aria-labelledby="thx-title">
  <div class="wrap simple-grid">
    <div>
      <p class="status-line">${I.check} Poptávka odeslána</p>
      <h1 id="thx-title" class="h1">Děkujeme, ozveme se Vám co nejdříve</h1>
      <p class="hero-lead">Vaši poptávku jsme v pořádku přijali. Náš tým ji projde a ozve se Vám na uvedený telefon nebo e-mail, abychom domluvili konzultaci a připravili cenovou nabídku.</p>
      <div class="actions"><a class="btn btn-accent btn-lg" href="index.html">Zpět na úvodní stránku ${I.arrow}</a><a class="btn btn-quiet btn-lg" href="${TEL}">${I.phone} Zavolat nám</a></div>
    </div>
    <ol class="steps">
      <li><h2 class="h3">Ozveme se Vám</h2><p>Obvykle do 1 pracovního dne od odeslání poptávky.</p></li>
      <li><h2 class="h3">Domluvíme konzultaci</h2><p>Nezávazně posoudíme rozsah prací a vhodný materiál.</p></li>
      <li><h2 class="h3">Připravíme cenovou nabídku</h2><p>Konkrétní cenu, termín a harmonogram realizace tentýž den.</p></li>
    </ol>
  </div>
</section>` });
}

function build404() {
  const links = [['natery-interieru', 'Malby interiéru'], ['dekoracni-sterky', 'Dekorativní stěrky'], ['natery-drevo-kovu', 'Nátěry dřeva a kovů'], ['prumyslove-natery', 'Ocelové konstrukce'], ['tapetovani', 'Tapetování'], ['natery-fasad', 'Nátěry fasád'], ['odstraneni-grafiti', 'Odstranění graffiti'], ['pismomalirstvi', 'Písmomalířství']];
  simplePage('404.html', { title: C['404'].title, description: 'Stránka nenalezena.', bodyClass: 'page-simple', body: `
<section class="simple" aria-labelledby="nf-title">
  <div class="wrap simple-grid">
    <div>
      <p class="nf-code" aria-hidden="true">404</p>
      <p class="status-line">Stránka nenalezena</p>
      <h1 id="nf-title" class="h1">Tuhle stránku jsme bohužel nenamalovali</h1>
      <p class="hero-lead">Odkaz může být zastaralý nebo jste zadali chybnou adresu. Zkuste se vrátit na úvodní stránku, nebo přejděte přímo na některou z našich služeb.</p>
      <div class="actions"><a class="btn btn-accent btn-lg" href="index.html">Zpět na úvodní stránku ${I.arrow}</a><a class="btn btn-quiet btn-lg" href="${TEL}">${I.phone} Zavolat nám</a></div>
    </div>
    <nav aria-labelledby="nf-services"><h2 id="nf-services" class="h3">Naše služby</h2><ul class="svc-list">${links.map(([s, l]) => `<li><a href="${s}.html"><span>${l}</span>${I.arrow}</a></li>`).join('')}</ul></nav>
  </div>
</section>` });
}

function buildPrivacy() {
  const raw = C['ochrana-osobnich-udaju'].html;
  let body = raw.slice(raw.indexOf('<h2'), raw.lastIndexOf('</small></p>') + '</small></p>'.length);
  body = body.replace(/<svg.*?<\/svg>/gs, '').replace(/\s(class|style)="[^"]*"/g, '').replace(/<i><\/i>/g, '')
    .replace(/<h2 id="([^"]+)"><span>(\d)<\/span>\s*/g, '<h2 id="$1" class="h3"><span class="num">$2</span> ')
    .replace(/<div>\s*<table>/, '<div class="table-wrap"><table>')
    .replace(/<div>\s*<div>\s*<strong>Kontakt pro/, '<div class="privacy-contact"><div><strong>Kontakt pro')
    .replace(/href="\.\/"/g, 'href="index.html"');
  const toc = [['spravce', '1. Správce údajů'], ['udaje', '2. Jaké údaje'], ['ucel', '3. Účel a základ'], ['doba', '4. Doba uchování'], ['predavani', '5. Komu předáváme'], ['cookies', '6. Cookies'], ['prava', '7. Vaše práva']];
  simplePage('ochrana-osobnich-udaju.html', { title: C['ochrana-osobnich-udaju'].title, description: 'Zásady zpracování osobních údajů webu trimistri.cz.', bodyClass: 'page-privacy', body: `
<section class="privacy-page" aria-labelledby="pp-title">
  <div class="wrap">
    <nav class="crumbs" aria-label="Drobečková navigace"><a href="index.html">Domů</a><span aria-hidden="true">/</span><span aria-current="page">Ochrana osobních údajů</span></nav>
    <div class="pp-head">
      <p class="status-line">GDPR / osobní údaje</p>
      <h1 id="pp-title" class="h1">Zásady zpracování osobních údajů</h1>
      <p class="hero-lead">Vysvětlení, jaké osobní údaje shromažďujeme, proč, jak dlouho je uchováváme a jaká máte v souvislosti s jejich zpracováním práva. Platí pro webové stránky trimistri.cz.</p>
    </div>
    <div class="pp-grid">
      <nav class="pp-toc" aria-labelledby="pp-toc-title"><h2 id="pp-toc-title" class="pp-toc-title">Obsah</h2><ol>${toc.map(([id, l]) => `<li><a href="#${id}">${l}</a></li>`).join('')}</ol></nav>
      <div class="prose">${body}</div>
    </div>
  </div>
</section>` });
}

buildHome();
for (const s of SERVICE_ORDER) buildService(s);
buildThanks();
build404();
buildPrivacy();
console.log('Hotovo:', 1 + SERVICE_ORDER.length + 3, 'stránek');
