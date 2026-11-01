import {createRequire} from 'node:module';
import fs from 'node:fs/promises';
import path from 'node:path';
const require=createRequire('/home/roman/Projects/prezentace/package.json');
const sharp=require('sharp');
sharp.concurrency(2);
const root=path.resolve(import.meta.dirname,'..');
const lib='/home/roman/Projects/trimistri-instagram';
const {fotky}=JSON.parse(await fs.readFile(lib+'/knihovna/fotky.json','utf8'));
const nums=[327,328,159,332,343,162,35,272,274,250,285,143,314,315,19,308,310];
const meta={};await fs.mkdir(root+'/photos',{recursive:true});
for (const n of nums){
 const f=fotky.find(x=>x.n===n);const src=lib+'/'+f.soubor;const m=await sharp(src).metadata();
 const widths=[...new Set([1024,1440,1920].map(w=>Math.min(w,m.width)))];
 meta[n]={width:m.width,height:m.height,widths,requestedWidths:[1024,1440,1920],upscaled:false};
 for(const [name,w] of [...widths.map(w=>[w,w]),['mobile',Math.min(780,m.width)]]){
  for(const ext of ['avif','webp']){
   const out=root+`/photos/${n}-${name}.${ext}`;
   try{await fs.access(out);continue}catch{}
   await sharp(src).rotate().resize({width:w,withoutEnlargement:true})[ext](ext==='avif'?{quality:85,effort:4,chromaSubsampling:'4:4:4'}:{quality:94,effort:5}).toFile(out);
  }
 }
 process.stdout.write(n+' ');
}
await fs.writeFile(root+'/tools/image-meta.json',JSON.stringify(meta,null,2)+'\n');
