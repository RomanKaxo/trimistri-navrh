const { chromium } = require(process.env.PLAYWRIGHT_MODULE || 'playwright');
const fs = require('node:fs');
const path = require('node:path');
const assert = require('node:assert/strict');

(async () => {
  const output = process.argv[2];
  fs.mkdirSync(output, { recursive: true });
  const browser = await chromium.launch({ headless: true });
  const context = await browser.newContext({ reducedMotion: 'reduce' });
  await context.addInitScript(() => localStorage.setItem('tm_consent_v1', 'denied'));
  await context.route('https://www.googletagmanager.com/**', route => route.abort());
  await context.route('https://www.googleadservices.com/**', route => route.abort());
  const page = await context.newPage();
  const errors = [], failedResources = [], measurements = [];
  page.on('pageerror', error => errors.push(error.message));
  page.on('response', response => {
    if (response.url().startsWith('http://127.0.0.1:8873/') && response.status() >= 400)
      failedResources.push(`${response.status()} ${response.url()}`);
  });
  for (const width of [320, 375, 768, 1440, 1920]) {
    await page.setViewportSize({ width, height: 900 });
    for (const route of ['', 'dekoracni-sterky', 'sluzby', 'galerie']) {
      await page.goto(`http://127.0.0.1:8873/${route}`, { waitUntil: 'networkidle' });
      await page.evaluate(() => document.fonts.ready);
      const layout = await page.evaluate(() => ({
        width: innerWidth,
        content: document.documentElement.scrollWidth,
        heroLoaded: [...document.querySelectorAll('.hero-image, .tm-detail-hero img')].every(img => img.complete && img.naturalWidth > 0),
        font: getComputedStyle(document.body).fontFamily,
      }));
      assert(layout.content <= width + 1, `Overflow ${route}@${width}: ${layout.content}`);
      assert(layout.heroLoaded, `Hero image missing ${route}@${width}`);
      assert(layout.font.includes('Inter'), `Font mismatch ${route}@${width}: ${layout.font}`);
      measurements.push({ route: route || '/', ...layout });
      if ([375, 1440].includes(width) && ['', 'dekoracni-sterky', 'sluzby'].includes(route))
        await page.screenshot({ path: path.join(output, `${route || 'home'}-${width}.png`), fullPage: false });
    }
  }
  await page.setViewportSize({ width: 375, height: 850 });
  await page.goto('http://127.0.0.1:8873/', { waitUntil: 'networkidle' });
  const toggle = page.locator('[data-menu-toggle]');
  await toggle.click();
  assert.equal(await toggle.getAttribute('aria-expanded'), 'true');
  await page.keyboard.press('Escape');
  assert.equal(await toggle.getAttribute('aria-expanded'), 'false');
  await page.locator('[data-quick-quote] select').selectOption('Dekorativní stěrky');
  await page.locator('[data-quick-quote] a').click();
  assert.equal(await page.locator('.quote-form [name=service]').inputValue(), 'Dekorativní stěrky');
  assert.equal(await page.locator('.quote-form').getAttribute('action'), 'send');
  assert(await page.locator('.quote-form button[type=submit]').innerText().then(text => text.includes('Odeslat poptávku')));
  await page.locator('input[type=file]').setInputFiles({ name: 'test.png', mimeType: 'image/png', buffer: Buffer.from('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAusB9Wl6PAAAAABJRU5ErkJggg==', 'base64') });
  assert.equal(await page.locator('.tm-photo-preview').count(), 1);
  await page.locator('.tm-photo-preview button').click();
  assert.equal(await page.locator('.tm-photo-preview').count(), 0);
  await page.goto('http://127.0.0.1:8873/dekoracni-sterky', { waitUntil: 'networkidle' });
  assert.equal(await page.locator('.quote-form [name=service]').inputValue(), 'Dekorativní stěrky');
  const more = page.locator('.tm-detail-more');
  await more.locator('summary').click();
  assert(await more.evaluate(el => el.open));
  assert.equal(await more.locator('summary').isVisible(), false);
  await page.locator('.photo-link.tm-project-photo').first().click();
  await page.locator('.glightbox-container').waitFor({ state: 'visible' });
  await page.keyboard.press('Escape');
  await page.locator('.glightbox-container').waitFor({ state: 'detached' });
  assert.deepEqual(errors, []);
  assert.deepEqual(failedResources, []);
  const report = { passed: true, layouts: measurements.length, measurements, errors, failedResources, interactions: ['mobile menu / Escape', 'quick inquiry', 'PHP form', 'photo preview / removal', 'prefilled service', 'expanded gallery', 'lightbox / Escape'] };
  fs.writeFileSync(path.join(output, 'browser-verification.json'), JSON.stringify(report, null, 2));
  console.log(JSON.stringify({ passed: true, layouts: measurements.length, interactions: report.interactions, errors, failedResources }, null, 2));
  await browser.close();
})().catch(error => { console.error(error); process.exit(1); });
