// Pokrytí obsahu: každý textový řádek živé stránky musí být v novém návrhu (textContent, bez ohledu na velikost písmen).
import { createRequire } from 'module';
import fs from 'fs';
const require = createRequire('/home/roman/Projects/prezentace/package.json');
const { chromium } = require('playwright');
const [liveDir, base, out] = process.argv.slice(2);
const pages = ['index','natery-interieru','dekoracni-sterky','natery-fasad','cisteni-fasad','natery-strech','natery-drevo-kovu','epoxidove-podlahy','mikrocement','specialni-natery','odstraneni-grafiti','pismomalirstvi','prumyslove-natery','sanace-po-zatekani','tapetovani','dekujeme','ochrana-osobnich-udaju','404'];
const norm = (s) => s.toLowerCase().replace(/[↗↓→↑★×+]/g, '').replace(/ /g, ' ').replace(/[„“"]/g, '').replace(/\s+/g, ' ').replace(/[.:]+$/, '').trim();
const b = await chromium.launch(); const p = await b.newPage();
const report = {};
for (const pg of pages) {
  const live = fs.readFileSync(`${liveDir}/text-d-${pg}.txt`, 'utf8');
  // jen obsah mezi hlavičkou a patičkou + patička
  const lines = [...new Set(live.split('\n').map((l) => l.trim()).filter((l) => l && !l.startsWith('#####')))];
  await p.goto(base + (pg === 'index' ? 'index.html' : pg + '.html'));
  const text = norm(await p.evaluate(() => document.body.textContent + ' ' + [...document.querySelectorAll('[aria-label]')].map((e) => e.getAttribute('aria-label')).join(' ') + ' ' + [...document.querySelectorAll('img[alt]')].map((e) => e.alt).join(' ')));
  const missing = lines.filter((l) => { const n = norm(l); return n.length > 1 && !/^\d+$/.test(n) && !text.includes(n); });
  report[pg] = { total: lines.length, missing };
  console.log(pg, lines.length, 'chybí', missing.length);
}
fs.writeFileSync(out, JSON.stringify(report, null, 1));
await b.close();
