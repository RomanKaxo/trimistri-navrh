import { createRequire } from 'module';
import fs from 'fs';
const require = createRequire('/home/roman/Projects/prezentace/package.json');
const { chromium } = require('playwright');
const services = ['natery-interieru','dekoracni-sterky','natery-fasad','cisteni-fasad','natery-strech','natery-drevo-kovu','epoxidove-podlahy','mikrocement','specialni-natery','odstraneni-grafiti','pismomalirstvi','prumyslove-natery','sanace-po-zatekani','tapetovani'];
const b = await chromium.launch();
const ctx = await b.newContext({ viewport: { width: 1440, height: 900 } });
const out = { services: {} };
const common = () => {
  const T = e => e ? (e.innerText ?? e.textContent).replace(/[ \t]+/g,' ').replace(/\s*\n\s*/g,'\n').trim() : '';
  const tc = e => e ? e.textContent.replace(/\s+/g,' ').trim() : '';
  const q = (s, r=document) => r.querySelector(s); const qa = (s, r=document) => [...r.querySelectorAll(s)];
  window.__x = { T, tc, q, qa };
};
for (const slug of services) {
  const pg = await ctx.newPage();
  await pg.goto('https://trimistri.cz/'+slug, { waitUntil: 'domcontentloaded' });
  await pg.evaluate(common);
  const d = await pg.evaluate(() => {
    const { tc, q, qa } = window.__x;
    const hero = q('.tm-detail-hero');
    const r = {};
    r.title = document.title; r.description = q('meta[name=description]')?.content;
    r.breadcrumb = qa('.tm-breadcrumb > *', hero).map(tc).filter(x=>x && x!=='/');
    r.eyebrow = tc(q('.tm-eyebrow', hero)); r.h1 = tc(q('h1', hero)); r.lead = tc(q('.tm-detail-lead', hero));
    r.cta = tc(q('.tm-detail-actions .tm-btn .tm-cta-label', hero)); r.note = tc(q('.tm-detail-note', hero));
    r.trust = qa('.tm-detail-trust > *', hero).map(tc);
    const fig = q('.tm-detail-cover', hero);
    if (fig) r.cover = { src: q('img', fig).getAttribute('src'), alt: q('img', fig).alt, w: q('img',fig).getAttribute('width'), h: q('img',fig).getAttribute('height'), label: tc(q('figcaption span', fig)), place: tc(q('figcaption strong', fig)) };
    const mat = q('.tm-detail-material', hero);
    if (mat) r.material = { aria: mat.getAttribute('aria-label'), eyebrow: tc(q('.tm-eyebrow', mat)), h2: tc(q('h2', mat)), items: qa('li', mat).map(tc) };
    r.jump = qa('.tm-detail-jump a').map(a => [tc(a), a.getAttribute('href')]);
    const sh = q('#ukazky');
    if (sh) { r.showcase = { eyebrow: tc(q('.tm-eyebrow', sh)), h2: tc(q('h2', sh)), visible: qa('.tm-project-card', sh).filter(c=>!c.closest('details')).length, more: tc(q('summary', sh)), other: qa(':scope > *:not(.tm-detail-section-heading):not(.tm-project-grid):not(details):not(.tm-anchor)', sh).map(tc).filter(Boolean), extraText: qa('p:not(.tm-eyebrow)', sh).map(tc).filter(Boolean) }; }
    const rz = q('#rozsah');
    r.rozsah = { eyebrow: tc(q('.tm-detail-overview-heading .tm-eyebrow', rz)), h2: tc(q('h2', rz)), intro: qa('.tm-detail-overview-heading > p', rz).map(tc),
      benefits: qa('.tm-detail-benefits li', rz).map(li => [tc(q('h3', li)), tc(q('p', li))]),
      processTitle: tc(q('#process-title', rz)), steps: qa('.tm-detail-work li', rz).map(li => [tc(q('h4', li)), tc(q('p', li))]),
      faqTitle: tc(q('#faq-title', rz)), faqs: qa('.tm-detail-faq details', rz).map(d => [tc(q('.tm-faq-question', d)), q('.tm-faq-answer', d).innerHTML.trim()]),
      allText: tc(rz) };
    r.hasReviews = !!q('#recenze');
    const c = q('#cena');
    r.cena = { eyebrow: tc(q('.tm-price-main .tm-eyebrow', c)), h2: tc(q('#price-title', c)), lead: tc(q('.tm-price-lead', c)), factors: qa('.tm-price-factors li', c).map(li => [tc(q('strong', li)), tc(q('span', li))]),
      howEyebrow: tc(q('.tm-price-card .tm-eyebrow', c)), how: qa('.tm-price-steps li', c).map(li => [tc(q('strong', li)), tc(q('div > span', li))]), cta: tc(q('.tm-price-card .tm-cta-label', c)), phone: tc(q('.tm-price-phone', c)),
      areaEyebrow: tc(q('.tm-price-area .tm-eyebrow', c)), areaH2: tc(q('#area-title', c)), places: qa('.tm-price-places li', c).map(tc), allText: tc(c) };
    const k = q('#kontakt');
    r.kontakt = { eyebrow: tc(q('.tm-contact-copy .tm-eyebrow', k)), h2: tc(q('.tm-contact-copy h2', k)), p: tc(q('.tm-contact-copy p:not(.tm-eyebrow)', k)), asideTitle: tc(q('.tm-detail-form-aside strong', k)), aside: tc(q('.tm-detail-form-aside p', k)),
      formService: tc(q('[data-form-service]', k)), selected: q('#service', k)?.value, hint: tc(q('#message-hint', k)) };
    r.mobileBar = qa('.tm-service-mobile-contact a').map(tc);
    return r;
  });
  // cover image larger?
  out.services[slug] = d; console.log(slug, d.h1, d.showcase?.visible, d.rozsah.faqs.length);
  await pg.close();
}
// home
{
  const pg = await ctx.newPage(); await pg.goto('https://trimistri.cz/', { waitUntil: 'domcontentloaded' }); await pg.evaluate(common);
  out.home = await pg.evaluate(() => {
    const { tc, q, qa } = window.__x; const r = {};
    r.title = document.title; r.description = q('meta[name=description]')?.content;
    const h = q('#top');
    r.hero = { kicker: tc(q('.kicker', h)), h1kicker: tc(q('.tm-h1-kicker', h)), h1: q('h1', h).innerText.replace(/\s+/g,' ').trim(), p: tc(q('.hero-copy > p:not(.kicker)', h)), actions: qa('.hero-actions a', h).map(a=>[tc(a), a.getAttribute('href')]), foot: qa('.hero-foot span', h).map(tc), rating: qa('a[href*="google"]', h).map(tc),
      shots: qa('picture', h).map(p => ({ img: q('img', p).getAttribute('src'), alt: q('img', p).alt, w: q('img',p).getAttribute('width'), h: q('img',p).getAttribute('height'), sources: qa('source', p).map(s=>s.getAttribute('srcset')) })) };
    const g = q('#realizace');
    r.gallery = { eyebrow: tc(q('.tm-eyebrow', g)), h2: q('h2', g).innerText.replace(/\s+/g,' ').trim(), aside: tc(q('.tm-heading-aside', g)), cats: qa('.tm-category', g).map(a => ({ href: q('a', a).getAttribute('href'), img: q('img', a).getAttribute('data-src') || q('img', a).getAttribute('src'), alt: q('img', a).alt, h3: tc(q('h3', a)), sub: tc(q('.tm-category-caption span', a)) })), rest: tc(g) };
    const s = q('#sluzby'); r.services = { html: s.innerHTML.replace(/<svg.*?<\/svg>/gs,''), text: s.innerText };
    const p = q('#postup'); r.process = { img: q('img', p).getAttribute('src'), imgSrcset: q('img',p).getAttribute('srcset'), alt: q('img', p).alt, exp: tc(q('.tm-experience', p)), eyebrow: tc(q('.tm-eyebrow', p)), h2: q('h2', p).innerText.replace(/\s+/g,' ').trim(), p: tc(q('.tm-process-copy > p:not(.tm-eyebrow)', p)), steps: qa('ol li', p).map(li => [tc(q('h3', li)), tc(q('p', li))]), actions: qa('.tm-process-actions a', p).map(a=>[tc(a), a.getAttribute('href')]) };
    const rv = q('#recenze');
    r.reviewsHead = { eyebrow: tc(q('.tm-eyebrow', rv)), h2: tc(q('h2', rv)), summary: tc(q('.tm-google-summary', rv)), all: qa('a', rv).map(a=>[tc(a), a.getAttribute('href')]) };
    const seen = new Set(); r.reviews = [];
    qa('.review-card[data-review-original]', rv).forEach(c => { const name = tc(q('strong', c)); const text = q('p', c).textContent.trim(); const key = name+text; if (seen.has(key)) return; seen.add(key);
      r.reviews.push({ name, avatar: tc(q('.review-avatar', c)), source: tc(q('.tm-review-source', c)), age: tc(q('.tm-review-age', c)), text, price: tc(q('.review-price', c)), stars: q('.review-stars', c)?.getAttribute('aria-label') }); });
    const dlg = q('#tm-review-dialog'); r.reviewDialog = dlg ? dlg.innerText : '';
    const k = q('#kontakt'); r.kontakt = { html: k.innerHTML.replace(/<svg.*?<\/svg>/gs,'').replace(/<option[^>]*>[^<]*<\/option>/g,''), text: k.innerText, options: qa('#service optgroup', k).map(og => [og.label, qa('option', og).map(o=>o.textContent.trim())]), first: q('#service option', k)?.textContent };
    r.hints = (document.body.innerHTML.match(/const hints = (\{.*?\});/s)||[])[1];
    r.mobileBar = tc(q('.r-mobile-bar'));
    return r;
  });
  console.log('home reviews', out.home.reviews.length); await pg.close();
}
for (const p of ['dekujeme','ochrana-osobnich-udaju']) { const pg = await ctx.newPage(); await pg.goto('https://trimistri.cz/'+p, { waitUntil: 'domcontentloaded' }); out[p] = await pg.evaluate(() => ({ title: document.title, robots: document.querySelector('meta[name=robots]')?.content, html: document.querySelector('main').innerHTML.replace(/<svg.*?<\/svg>/gs,''), text: document.querySelector('main').innerText })); await pg.close(); }
{ const pg = await ctx.newPage(); await pg.goto('https://trimistri.cz/neexistuje-xyz', { waitUntil: 'domcontentloaded' }); out['404'] = await pg.evaluate(() => ({ title: document.title, html: (document.querySelector('main')||document.body).innerHTML.replace(/<svg.*?<\/svg>/gs,''), text: (document.querySelector('main')||document.body).innerText })); await pg.close(); }
fs.writeFileSync('live/content.json', JSON.stringify(out, null, 1));
await b.close();
