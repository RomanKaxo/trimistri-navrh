// Tři snímky z průběhu úvodní animace (šířka 1440): animace se zastaví v daném čase přes Web Animations API.
import { createRequire } from 'module';
const require = createRequire('/home/roman/Projects/prezentace/package.json');
const { chromium } = require('playwright');
const [base, outDir] = process.argv.slice(2);
const b = await chromium.launch();
const ctx = await b.newContext({ viewport: { width: 1440, height: 900 } });
await ctx.addInitScript(() => { try { localStorage.setItem('tm-consent', 'denied'); } catch {} });
const times = [300, 950, 1650];
for (const [k, t] of times.entries()) {
  const p = await ctx.newPage();
  await p.goto(base + 'index.html', { waitUntil: 'load' });
  await p.evaluate(() => document.fonts.ready);
  await p.evaluate((t) => { document.getAnimations().forEach((a) => { a.pause(); a.currentTime = t; }); }, t);
  await p.waitForTimeout(200);
  await p.screenshot({ path: `${outDir}/home-1440-animace-${k + 1}-${t}ms.png` });
  await p.close();
}
console.log('hotovo', times.join(', '), 'ms');
await b.close();
