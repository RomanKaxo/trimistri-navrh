import { createRequire } from 'module';
import fs from 'fs';
const require = createRequire('/home/roman/Projects/prezentace/package.json');
const { chromium } = require('playwright');
const OUT = process.argv[2];
const pages = ['index','natery-interieru','dekoracni-sterky','natery-fasad','cisteni-fasad','natery-strech','natery-drevo-kovu','epoxidove-podlahy','mikrocement','specialni-natery','odstraneni-grafiti','pismomalirstvi','prumyslove-natery','sanace-po-zatekani','tapetovani','dekujeme','ochrana-osobnich-udaju','404'];
const b = await chromium.launch();
const ctx = await b.newContext({ viewport: { width: 1440, height: 900 } });
const all = {};
for (const p of pages) {
  const pg = await ctx.newPage();
  const url = p==='index' ? 'https://trimistri.cz/' : p==='404' ? 'https://trimistri.cz/neexistuje-xyz' : 'https://trimistri.cz/'+p;
  await pg.goto(url, { waitUntil: 'networkidle' }).catch(()=>{});
  // scroll to trigger lazy
  await pg.evaluate(async()=>{ for(let y=0;y<document.body.scrollHeight;y+=600){window.scrollTo(0,y);await new Promise(r=>setTimeout(r,60));} });
  await pg.waitForTimeout(500);
  const data = await pg.evaluate(() => {
    const txt = e => (e.innerText||e.textContent||'').replace(/\s+/g,' ').trim();
    const root = document.querySelector('main') || document.body;
    const secs = [...root.querySelectorAll(':scope > section, :scope > div > section, :scope > article, :scope > div[id], :scope > header')];
    const list = secs.length ? secs : [root];
    const imgsOf = el => [...el.querySelectorAll('img, source, a[href$=".jpg"], a[href$=".webp"], a[href$=".jpeg"], a[href$=".JPG"], a[href$=".png"], [data-src], [data-full], [data-gallery]')].map(i => ({tag:i.tagName, src: i.currentSrc||i.getAttribute('src')||i.getAttribute('data-src')||'', srcset: i.getAttribute('srcset')||i.getAttribute('data-srcset')||'', href: i.getAttribute('href')||'', full: i.getAttribute('data-full')||i.getAttribute('data-large')||'', alt: i.getAttribute('alt')||''}));
    const out = list.map(s => {
      const items = [];
      s.querySelectorAll('h1,h2,h3,h4,h5,p,li,summary,blockquote,figcaption,label,button,dt,dd,th,td,small,strong.tm-stat, a.tm-btn').forEach(e => {
        if (e.closest('li') && e.tagName!=='LI') return;
        const t = txt(e); if (t) items.push(e.tagName+': '+t);
      });
      const fields = [...s.querySelectorAll('input,select,textarea')].map(f => ({tag:f.tagName,type:f.type,name:f.name,required:f.required,label:(f.labels&&f.labels[0]?txt(f.labels[0]):'')||f.placeholder||f.getAttribute('aria-label')||'', options: f.tagName==='SELECT'?[...f.querySelectorAll('optgroup,option')].map(o=>o.tagName==='OPTGROUP'?'## '+o.label:o.textContent.trim()):undefined}));
      const links = [...s.querySelectorAll('a[href]')].map(a=>txt(a)+' -> '+a.getAttribute('href'));
      return { tag: s.tagName, id: s.id, cls: s.className, items, fields, imgs: imgsOf(s), links };
    });
    const header = document.querySelector('header.tm-header'); const footer = document.querySelector('footer');
    const floating = [...document.querySelectorAll('body > *:not(main):not(header):not(footer):not(script):not(style)')].map(e=>({tag:e.tagName,id:e.id,cls:e.className,text:txt(e).slice(0,400)}));
    return { title: document.title, desc: document.querySelector('meta[name=description]')?.content, robots: document.querySelector('meta[name=robots]')?.content, h1: [...document.querySelectorAll('h1')].map(txt), sections: out, footer: footer?txt(footer):'', floating, jsonld: [...document.querySelectorAll('script[type="application/ld+json"]')].map(s=>s.textContent.slice(0,3000)) };
  });
  all[p] = data;
  await pg.close();
  console.log(p, data.sections.length, data.sections.reduce((a,s)=>a+s.imgs.length,0));
}
fs.writeFileSync(OUT, JSON.stringify(all, null, 1));
await b.close();
