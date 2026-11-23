import { createRequire } from 'module';
import fs from 'fs';
const require = createRequire('/home/roman/Projects/prezentace/package.json');
const { chromium } = require('playwright');
const pages = ['index','natery-interieru','dekoracni-sterky','natery-fasad','cisteni-fasad','natery-strech','natery-drevo-kovu','epoxidove-podlahy','mikrocement','specialni-natery','odstraneni-grafiti','pismomalirstvi','prumyslove-natery','sanace-po-zatekani','tapetovani','dekujeme','ochrana-osobnich-udaju','404'];
const b = await chromium.launch();
for (const [w,tag] of [[1440,'d'],[390,'m']]) {
const ctx = await b.newContext({ viewport: { width: w, height: 900 } });
for (const p of pages) {
  const pg = await ctx.newPage();
  const url = p==='index' ? 'https://trimistri.cz/' : p==='404' ? 'https://trimistri.cz/neexistuje-xyz' : 'https://trimistri.cz/'+p;
  await pg.goto(url, { waitUntil: 'networkidle' }).catch(()=>{});
  await pg.evaluate(async()=>{ for(let y=0;y<document.body.scrollHeight;y+=700){window.scrollTo(0,y);await new Promise(r=>setTimeout(r,40));} document.querySelectorAll('details').forEach(d=>d.open=true); });
  await pg.waitForTimeout(400);
  const t = await pg.evaluate(()=> {
    // mark sections
    document.querySelectorAll('main section, footer, header').forEach(s=>{ const m=document.createElement('div'); m.textContent='\n##### ['+s.tagName+' '+(s.id||'')+' .'+String(s.className).split(' ')[0]+']'; s.prepend(m);});
    return document.body.innerText; });
  fs.writeFileSync(`live/text-${tag}-${p}.txt`, t);
  if (tag==='d') await pg.screenshot({path:`live/shot-${p}.png`, fullPage:false});
  await pg.close();
}
await ctx.close();
}
await b.close();
