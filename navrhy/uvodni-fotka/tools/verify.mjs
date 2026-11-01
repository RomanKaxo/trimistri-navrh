import {createRequire} from 'node:module';
import fs from 'node:fs/promises';
import path from 'node:path';
const require=createRequire('/home/roman/Projects/prezentace/package.json');
const {chromium}=require('playwright');const sharp=require('sharp');
const root=path.resolve(import.meta.dirname,'..');
const base='http://127.0.0.1:8732/navrhy/uvodni-fotka/';
await fs.mkdir(root+'/screenshots',{recursive:true});
const browser=await chromium.launch({headless:true});
const results=[];let outsideHero;
for(const [device,viewport] of [['desktop',{width:1440,height:900}],['mobile',{width:390,height:844}]]){
 const context=await browser.newContext({viewport,deviceScaleFactor:1});
 await context.addInitScript(()=>localStorage.setItem('tm_consent_v1','denied'));
 for(let i=0;i<=20;i++){
  const id=String(i).padStart(2,'0');const page=await context.newPage();const errors=[];const badResponses=[];
  page.on('pageerror',e=>errors.push(e.message));page.on('console',m=>{if(m.type()==='error')errors.push(m.text())});
  page.on('response',r=>{if(r.status()>=400)badResponses.push({url:r.url(),status:r.status()})});
  page.on('requestfailed',r=>errors.push(r.url()+': '+r.failure()?.errorText));
  const response=await page.goto(base+id+'/',{waitUntil:'load'});
  await page.evaluate(()=>document.fonts.ready);
  await page.locator('.hero-scene').waitFor({state:'visible'});
  await page.waitForFunction(()=>[...document.querySelectorAll('.hero-scene img')].filter(x=>x.checkVisibility()).every(x=>x.complete&&x.naturalWidth>0));
  await page.locator('.hero-scene img').evaluateAll(xs=>Promise.all(xs.map(x=>x.decode())));
  await page.screenshot({path:root+`/screenshots/${id}-${device}.png`});
  await sharp(root+`/screenshots/${id}-${device}.png`).webp({quality:88}).toFile(root+`/screenshots/${id}-${device}.webp`);
  await fs.unlink(root+`/screenshots/${id}-${device}.png`);
  const source=await fs.readFile(root+`/${id}/index.html`,'utf8');
  const unchanged=source.substring(source.indexOf('</section>')+10,source.indexOf('</main>'));
  if(!outsideHero)outsideHero=unchanged;
  const overflowing=[];
  for(const selector of ['#top','#realizace','#sluzby','#postup','#recenze','#kontakt','#poptavka','.tm-footer']){
   const target=page.locator(selector).first();
   if(await target.count())await target.scrollIntoViewIfNeeded();
   await page.waitForTimeout(40);
   const dims=await page.evaluate(()=>({width:document.documentElement.clientWidth,scroll:document.documentElement.scrollWidth}));
   if(dims.scroll>dims.width)overflowing.push({selector,...dims});
  }
  await page.waitForFunction(()=>[...document.images].filter(x=>x.checkVisibility()).every(x=>x.complete));
  const broken=await page.evaluate(()=>[...document.images].filter(x=>x.checkVisibility()&&!x.naturalWidth).map(x=>x.currentSrc));
  const noindex=await page.locator('meta[name=robots]').getAttribute('content');
  results.push({id,device,status:response.status(),errors,badResponses,overflowing,broken,noindex,outsideHeroUnchanged:unchanged===outsideHero});
  if(i===1)await sharp(await page.screenshot({fullPage:true})).webp({quality:84}).toFile(root+`/screenshots/01-${device}-full.webp`);
  await page.close();
 }
 await context.close();
}
// Observe the real opacity phases without waiting through the 32-second loop.
const normal=await browser.newPage();await normal.goto(base+'19/');
const fadePhases=await normal.locator('.proposal-slideshow').evaluate(el=>{
 const animations=el.getAnimations({subtree:true});for(const a of animations)a.pause();
 return [0,7000,8000,16000,24000].map(t=>{
  for(const a of animations)a.currentTime=t;
  return {time:t,opacity:[...el.querySelectorAll('.shot')].map(x=>Number(getComputedStyle(x).opacity))};
 });
});await normal.close();
// Slider keyboard/input behavior, preview navigation and reduced-motion contract.
const context=await browser.newContext({viewport:{width:390,height:844},reducedMotion:'reduce'});
await context.addInitScript(()=>localStorage.setItem('tm_consent_v1','denied'));
const p=await context.newPage();await p.goto(base+'18/');
const wipe=p.locator('#wipe');await wipe.fill('20');
const slider20=await p.locator('.comparison').evaluate(x=>x.style.getPropertyValue('--wipe'));
await wipe.focus();await p.keyboard.press('ArrowRight');
const sliderKeyboard=await wipe.inputValue();
await p.locator('.proposal-panel a[aria-label="Další návrh"]').click();await p.waitForURL('**/19/');
const motion=await p.locator('.proposal-slideshow .shot').evaluateAll(xs=>xs.map(x=>({display:getComputedStyle(x).display,animation:getComputedStyle(x).animationName})));
await p.keyboard.press('ArrowRight');await p.waitForURL('**/20/');
await p.locator('.proposal-panel a[href="../"]').click();await p.waitForURL(base);
const overviewErrors=[];p.on('pageerror',e=>overviewErrors.push(e.message));p.on('response',r=>{if(r.status()>=400)overviewErrors.push(r.status()+' '+r.url())});
await p.reload({waitUntil:'load'});
for(const article of await p.locator('article').all()){
 await article.scrollIntoViewIfNeeded();
 await article.locator('img').evaluateAll(xs=>Promise.all(xs.map(x=>x.decode())));
}
await p.locator('footer').scrollIntoViewIfNeeded();
await p.waitForFunction(()=>[...document.images].filter(x=>x.checkVisibility()).every(x=>x.complete&&x.naturalWidth));
const overview={cards:await p.locator('article').count(),errors:overviewErrors,overflow:await p.evaluate(()=>document.documentElement.scrollWidth>innerWidth),noindex:await p.locator('meta[name=robots]').getAttribute('content')};
await p.evaluate(()=>scrollTo(0,0));await sharp(await p.screenshot()).webp({quality:88}).toFile(root+'/screenshots/overview-mobile.webp');
await p.setViewportSize({width:1440,height:900});await sharp(await p.screenshot()).webp({quality:88}).toFile(root+'/screenshots/overview-desktop.webp');
await browser.close();
const report={checkedAt:new Date().toISOString(),browser:'Playwright Chromium (createRequire from /home/roman/Projects/prezentace/package.json)',viewports:['1440x900','390x844'],results,interactions:{slider20,sliderKeyboard,fadePhases,reducedMotion:motion,arrowAndOverviewNavigation:true},overview};
await fs.writeFile(root+'/verification.json',JSON.stringify(report,null,2)+'\n');
const fadeOK=[0,2,3,4].every((phase,i)=>fadePhases[phase].opacity[i]===1)&&fadePhases[1].opacity[0]>0&&fadePhases[1].opacity[0]<1&&fadePhases[1].opacity[1]>0&&fadePhases[1].opacity[1]<1;
const fail=results.some(r=>r.status!==200||r.errors.length||r.badResponses.length||r.overflowing.length||r.broken.length||!r.noindex.includes('noindex')||!r.outsideHeroUnchanged)||overview.cards!==21||overview.errors.length||overview.overflow||slider20!=='20%'||sliderKeyboard!=='21'||motion.some(x=>x.animation!=='none')||!fadeOK;
console.log(JSON.stringify({pages:results.length,fail,overview,errors:results.filter(r=>r.errors.length||r.badResponses.length||r.overflowing.length||r.broken.length||!r.outsideHeroUnchanged),interactions:report.interactions},null,2));
if(fail)process.exitCode=1;
