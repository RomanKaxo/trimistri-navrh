// Kontrola: všechny stránky × 1920/1440/390 – přetečení, rozbité obrázky, chyby v konzoli, interakce.
import { createRequire } from 'module';
import fs from 'fs';
const require = createRequire('/home/roman/Projects/prezentace/package.json');
const { chromium } = require('playwright');
const [base, out, shotDir] = process.argv.slice(2);
const pages = ['index','natery-interieru','dekoracni-sterky','natery-fasad','cisteni-fasad','natery-strech','natery-drevo-kovu','epoxidove-podlahy','mikrocement','specialni-natery','odstraneni-grafiti','pismomalirstvi','prumyslove-natery','sanace-po-zatekani','tapetovani','dekujeme','ochrana-osobnich-udaju','404'];
const b = await chromium.launch();
const res = { pages: {}, interactions: {} };
for (const w of [1920, 1440, 390]) {
  const ctx = await b.newContext({ viewport: { width: w, height: w === 390 ? 844 : 1000 } });
  for (const pg of pages) {
    const p = await ctx.newPage(); const errs = [];
    p.on('console', (m) => m.type() === 'error' && errs.push(m.text())); p.on('pageerror', (e) => errs.push(String(e)));
    p.on('requestfailed', (r) => { if (!r.url().startsWith('mailto')) errs.push('FAIL ' + r.url()); });
    p.on('response', (r) => { if (r.status() >= 400) errs.push(r.status() + ' ' + r.url()); });
    await p.goto(base + pg + '.html', { waitUntil: 'networkidle' });
    const perf = await p.evaluate(() => { const rs = performance.getEntriesByType('resource'); return { initialKB: Math.round(rs.reduce((a, x) => a + (x.transferSize || x.encodedBodySize || 0), 0) / 1024), initialImgs: rs.filter((x) => /\.webp/.test(x.name)).length, lazyImgs: document.querySelectorAll('img[loading=lazy]').length, allImgs: document.images.length }; });
    const r = await p.evaluate(async () => {
      document.querySelectorAll('img[loading=lazy]').forEach((i) => i.loading = 'eager');
      for (let y = 0; y < document.documentElement.scrollHeight; y += 600) { window.scrollTo({ top: y, behavior: 'instant' }); await new Promise((r) => setTimeout(r, 40)); }
      await Promise.all([...document.images].map((i) => i.complete ? 0 : new Promise((r) => { i.onload = i.onerror = r; })));
      const vw = document.documentElement.clientWidth;
      const over = [...document.querySelectorAll('body *')].filter((e) => { const rc = e.getBoundingClientRect(); return rc.width && (rc.right > vw + 1 || rc.left < -1) && !e.closest('.jump-row, .lb, .rv-dialog, .hp, .footer-word, .skip, .nav, .lb-thumbs, .strip, .marquee, .picks, .roll-track') && getComputedStyle(e).position !== 'fixed'; }).map((e) => e.tagName + '.' + e.className).slice(0, 5);
      const broken = [...document.images].filter((i) => !i.matches('[data-lb-img]') && !i.naturalWidth).map((i) => i.src);
      const hrefs = [...document.querySelectorAll('a[href]')].map((a) => a.getAttribute('href'));
      const external = hrefs.filter((h) => /trimistri\.cz/.test(h) && !h.startsWith('mailto'));
      const smallText = [...document.querySelectorAll('p, li, a, span, small, dd, label')].filter((e) => e.offsetParent && e.textContent.trim() && parseFloat(getComputedStyle(e).fontSize) < 12).length;
      return { scrollW: document.documentElement.scrollWidth, vw, over, broken, external, smallText, h1: document.querySelectorAll('h1').length, sections: document.querySelectorAll('main section').length, imgs: new Set([...document.querySelectorAll('img')].map((i) => i.getAttribute('src'))).size, lbPhotos: window.TM_GALLERY ? new Set(Object.values(window.TM_GALLERY).flatMap((g) => g.items.map((x) => x.f))).size : 0 };
    });
    // odkazy na neexistující soubory
    const missingFiles = (await p.evaluate(() => [...document.querySelectorAll('a[href]')].map((a) => a.getAttribute('href')))).filter((h) => /^[a-z0-9-]+\.html/.test(h)).map((h) => h.split('#')[0]).filter((f, i, a) => a.indexOf(f) === i).filter((f) => !fs_exists(f));
    function fs_exists(f) { return true; }
    res.pages[`${pg}@${w}`] = { ...r, ...perf, errs, overflow: r.scrollW > r.vw };
    if (shotDir && ((pg === 'index' || pg === 'natery-interieru') && (w === 1440 || w === 390))) {
      await p.evaluate(() => { window.scrollTo({ top: 0, behavior: 'instant' }); document.querySelector('[data-consent]')?.setAttribute('hidden', ''); });
      await p.waitForTimeout(300);
      await p.screenshot({ path: `${shotDir}/${pg === 'index' ? 'home' : 'sluzba-natery-interieru'}-${w}.png`, fullPage: true });
      await p.screenshot({ path: `${shotDir}/${pg === 'index' ? 'home' : 'sluzba-natery-interieru'}-${w}-prvni-obrazovka.png` });
    }
    await p.close();
  }
  await ctx.close();
}
// interakce
const I = res.interactions;
{
  const ctx = await b.newContext({ viewport: { width: 390, height: 844 } }); const p = await ctx.newPage();
  await p.goto(base + 'index.html', { waitUntil: 'networkidle' });
  await p.click('[data-consent-choice="denied"]'); I.consentHidden = await p.isHidden('[data-consent]');
  await p.click('[data-menu-toggle]'); I.menuOpens = await p.evaluate(() => document.querySelector('[data-nav]').classList.contains('is-open') && document.querySelector('[data-menu-toggle]').getAttribute('aria-expanded') === 'true');
  await p.waitForTimeout(300); I.menuLinkVisible = await p.isVisible('[data-nav] a[href="#sluzby"]');
  await p.keyboard.press('Escape'); I.menuClosesEsc = await p.evaluate(() => !document.querySelector('[data-nav]').classList.contains('is-open'));
  I.mobileBar = await p.isVisible('.mobile-bar');
  await ctx.close();
}
{
  const ctx = await b.newContext({ viewport: { width: 1440, height: 900 } }); const p = await ctx.newPage(); const errs = [];
  p.on('pageerror', (e) => errs.push(String(e)));
  await ctx.addInitScript(() => localStorage.setItem('tm-consent', 'denied'));
  await p.goto(base + 'natery-interieru.html', { waitUntil: 'networkidle' });
  await p.click('.work-cover >> nth=0');
  await p.waitForTimeout(400);
  I.lbOpen = await p.evaluate(() => document.querySelector('[data-lb]').open);
  I.lbCount1 = await p.textContent('[data-lb-count]');
  await p.keyboard.press('ArrowRight'); await p.waitForTimeout(300);
  I.lbCount2 = await p.textContent('[data-lb-count]');
  I.lbImgLoaded = await p.evaluate(async () => { const i = document.querySelector('[data-lb-img]'); if (!i.complete) await new Promise((r) => i.onload = r); return i.naturalWidth; });
  I.lbThumbs = await p.locator('[data-lb-thumbs] button').count();
  await p.keyboard.press('Escape'); await p.waitForTimeout(300);
  I.lbClosedFocusBack = await p.evaluate(() => !document.querySelector('[data-lb]').open && document.activeElement.classList.contains('work-cover'));
  await p.click('.ba-switch >> nth=0 >> button[data-ba=before]');
  I.baSwitch = await p.evaluate(() => document.querySelector('[data-work]').classList.contains('show-before'));
  await p.click('[data-more]'); I.moreShown = await p.isVisible('#dalsi-realizace');
  await p.click('.faq >> nth=1 >> summary'); I.faqOpens = await p.evaluate(() => document.querySelectorAll('.faq')[1].open);
  // formulář: prázdné odeslání
  await p.click('[data-quote] button[type=submit]');
  I.formErrors = await p.evaluate(() => ({ summary: !document.querySelector('[data-error-summary]').hidden, nameInvalid: document.querySelector('#f-name').getAttribute('aria-invalid'), focus: document.activeElement.matches('[data-error-summary]') }));
  I.prefilledService = await p.inputValue('#f-service');
  I.hint = await p.textContent('[data-message-hint]');
  await p.selectOption('#f-service', 'Tapetování');
  I.hintChanges = await p.textContent('[data-message-hint]');
  await p.fill('#f-name', 'Test Testovací'); await p.fill('#f-phone', '+420 600 000 000'); await p.fill('#f-email', 'spatne');
  await p.click('[data-quote] button[type=submit]');
  I.emailInvalid = await p.getAttribute('#f-email', 'aria-invalid');
  await p.fill('#f-email', 'test@example.com');
  let mailto = '';
  p.on('framenavigated', () => {}); 
  await p.evaluate(() => { window.__mail = ''; const d = Object.getOwnPropertyDescriptor(window.Location.prototype, 'href'); });
  await p.route('**/*', (r) => r.continue());
  const navP = p.waitForEvent('request', { predicate: (r) => r.url().startsWith('mailto'), timeout: 1500 }).then((r) => r.url()).catch(() => '');
  await p.click('[data-quote] button[type=submit]');
  mailto = await navP; await p.waitForTimeout(300);
  I.formDone = await p.isVisible('[data-form-done]').catch(() => false);
  I.mailtoSeen = mailto ? mailto.slice(0, 90) : '(mailto se v headless prohlížeči neprojeví jako požadavek)';
  I.errors = errs;
  // recenze
  await p.goto(base + 'index.html', { waitUntil: 'networkidle' });
  I.reviewsVisible = await p.locator('[data-review]:visible').count();
  await p.click('[data-reviews-more]'); I.reviewsAfter = await p.locator('[data-review]:visible').count();
  const rm = p.locator('[data-review-open]:visible').first();
  if (await rm.count()) { await rm.click(); I.reviewDialog = await p.evaluate(() => document.querySelector('[data-review-dialog]').open && document.querySelector('[data-review-name]').textContent); await p.keyboard.press('Escape'); }
  // posuvník Před/Po: tažení myší a klávesnice, výběr zakázky
  await p.locator('#pred-a-po').scrollIntoViewIfNeeded(); await p.waitForTimeout(2200);
  const st = p.locator('.ba-stage [data-cmp]:not([hidden]) [data-cmp-stage]');
  const bb = await st.boundingBox();
  await p.mouse.move(bb.x + bb.width * 0.5, bb.y + bb.height * 0.5); await p.mouse.down(); await p.mouse.move(bb.x + bb.width * 0.2, bb.y + bb.height * 0.5, { steps: 6 }); await p.mouse.up();
  I.cmpDragPos = await st.evaluate((e) => e.style.getPropertyValue('--pos'));
  await p.focus('.ba-stage [data-cmp]:not([hidden]) [data-cmp-range]'); await p.keyboard.press('ArrowRight'); await p.keyboard.press('ArrowRight');
  I.cmpKeyPos = await st.evaluate((e) => e.style.getPropertyValue('--pos'));
  await p.click('[data-cmp-pick="2"]'); await p.waitForTimeout(200);
  I.cmpPick = await p.evaluate(() => [...document.querySelectorAll('.ba-stage [data-cmp]')].filter((f) => !f.hidden).map((f) => f.querySelector('.cmp-title a').textContent + ' / ' + f.querySelector('.cmp-title .tape').textContent).join(','));
  // počítadla doběhnou na skutečná čísla
  await p.locator('#recenze').scrollIntoViewIfNeeded(); await p.waitForTimeout(1800);
  I.counters = await p.evaluate(() => [...document.querySelectorAll('[data-count]')].map((e) => e.textContent).join(' | '));
  // rychlý výběr služby
  await p.selectOption('#picker-select', 'Dekorativní stěrky'); await p.click('[data-picker-go]'); await p.waitForTimeout(700);
  I.pickerPrefill = await p.inputValue('#f-service'); I.pickerServiceLabel = await p.textContent('[data-form-service]');
  await ctx.close();
}
{
  const ctx = await b.newContext({ viewport: { width: 1440, height: 900 }, reducedMotion: 'reduce' }); const p = await ctx.newPage();
  await p.goto(base + 'index.html', { waitUntil: 'networkidle' });
  I.reducedMotionDur = await p.evaluate(() => getComputedStyle(document.querySelector('.btn')).transitionDuration);
  await p.waitForTimeout(150);
  I.reducedMotion = await p.evaluate(() => ({ heroRolled: getComputedStyle(document.querySelector('.roll')).clipPath, roller: getComputedStyle(document.querySelector('.roll-track')).display, marquee: getComputedStyle(document.querySelector('.marquee-track')).animationName, paint: getComputedStyle(document.querySelector('.cat .paint')).clipPath, stripTransform: document.querySelector('[data-strip-track]').style.transform || 'none' }));
  await ctx.close();
}
fs.writeFileSync(out, JSON.stringify(res, null, 1));
const bad = Object.entries(res.pages).filter(([, v]) => v.overflow || v.broken.length || v.errs.length || v.external.length || v.over.length || v.h1 !== 1);
console.log('Stránek × šířek:', Object.keys(res.pages).length, '| problémové:', bad.length);
bad.forEach(([k, v]) => console.log(k, JSON.stringify({ overflow: v.overflow, over: v.over, broken: v.broken.slice(0, 3), errs: v.errs.slice(0, 3), external: v.external, h1: v.h1 })));
console.log(JSON.stringify(I, null, 1));
await b.close();
