import {createRequire} from 'node:module';import fs from 'node:fs/promises';import path from 'node:path';
const require=createRequire('/home/roman/Projects/prezentace/package.json');const {chromium}=require('playwright');const sharp=require('sharp');const root=path.resolve(import.meta.dirname,'..');
const b=await chromium.launch();const results=[];
function lum(c){return c.map(v=>{v/=255;return v<=.04045?v/12.92:((v+.055)/1.055)**2.4}).reduce((a,v,i)=>a+v*[.2126,.7152,.0722][i],0)}
for(const [device,viewport] of [['desktop',{width:1440,height:900}],['mobile',{width:390,height:844}]]){
 const p=await b.newPage({viewport});await p.addInitScript(()=>localStorage.setItem('tm_consent_v1','denied'));
 for(let i=0;i<=20;i++){
  const id=String(i).padStart(2,'0');await p.goto('http://127.0.0.1:8732/navrhy/uvodni-fotka/'+id+'/');await p.evaluate(()=>document.fonts.ready);await p.locator('.hero-scene img').evaluateAll(xs=>Promise.all(xs.map(x=>x.decode())));
  // Sample the background at each non-space character center, preserving the actual photo and existing shade.
  const chars=await p.locator('.hero-copy').evaluate(el=>{
   const w=document.createTreeWalker(el,NodeFilter.SHOW_TEXT);const out=[];let n;
   while(n=w.nextNode()){
    const s=getComputedStyle(n.parentElement);if(s.display==='none'||n.parentElement.closest('[aria-hidden=true]'))continue;
    const color=s.color.match(/[\d.]+/g).map(Number);const stroke=parseFloat(s.webkitTextStrokeWidth)>=2&&s.paintOrder.startsWith('stroke')?s.webkitTextStrokeColor.match(/[\d.]+/g).map(Number):null;const size=parseFloat(s.fontSize);const threshold=size>=24||(size>=18.66&&Number(s.fontWeight)>=700)?3:4.5;
    for(let j=0;j<n.length;j++){if(!n.data[j].trim())continue;const r=new Range();r.setStart(n,j);r.setEnd(n,j+1);const box=r.getBoundingClientRect();if(box.width&&box.height)out.push({x:box.x+box.width/2,y:box.y+box.height/2,color,stroke,threshold,text:n.data.trim().slice(0,65)});}
   }return out;
  });
  const style=await p.addStyleTag({content:'.hero-copy,.hero-copy *{color:transparent!important;text-shadow:none!important;-webkit-text-stroke:0!important} .proposal-slideshow .shot,.proposal-slideshow .shot img{animation-play-state:paused!important}'});
  const {data,info}=await sharp(await p.screenshot()).removeAlpha().raw().toBuffer({resolveWithObject:true});
  const groups={};for(const c of chars){const x=Math.floor(c.x),y=Math.floor(c.y);if(x<0||y<0||x>=info.width||y>=info.height)continue;const q=(y*info.width+x)*info.channels;const bg=c.stroke?.slice(0,3)??[data[q],data[q+1],data[q+2]];const a=c.color[3]??1;const fg=c.color.slice(0,3).map((v,j)=>v*a+bg[j]*(1-a));const l1=lum(fg),l2=lum(bg);const ratio=(Math.max(l1,l2)+.05)/(Math.min(l1,l2)+.05);const key=c.text;const old=groups[key];if(!old||ratio<old.ratio)groups[key]={text:key,ratio:Number(ratio.toFixed(2)),threshold:c.threshold,background:c.stroke?'1px external graphite halo':'photo sample',x,y};}
  results.push({id,device,samples:chars.length,groups:Object.values(groups),failures:Object.values(groups).filter(x=>x.ratio<x.threshold)});await style.evaluate(x=>x.remove());
 }
 await p.close();
}
await b.close();await fs.writeFile(root+'/contrast.json',JSON.stringify({method:'Photo-background samples at non-space character centers, or the immediate graphite halo where a 2px centered stroke is painted behind the unchanged fill. Alpha-composited computed text color; decorative aria-hidden arrows excluded. Normal text 4.5:1, large/bold text 3:1. Not a full accessibility audit.',results},null,2)+'\n');console.log(JSON.stringify(results.filter(x=>x.failures.length).map(x=>({id:x.id,device:x.device,failures:x.failures})),null,2));
if(results.some(x=>x.failures.length))process.exitCode=1;
