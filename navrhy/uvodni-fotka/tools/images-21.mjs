// Responsive files for proposal 21. 272r is the retouched staircase from retouch-272.mjs.
import {createRequire} from 'node:module';import fs from 'node:fs';import path from 'node:path';
const sharp=createRequire('/home/roman/Projects/prezentace/package.json')('sharp');
const root=path.resolve(import.meta.dirname,'..'),lib='/home/roman/Projects/trimistri-instagram/';
const {fotky}=JSON.parse(fs.readFileSync(lib+'knihovna/fotky.json'));
const retouched=process.argv[2];
const src={272:retouched,...Object.fromEntries([159,35,95,20,314].map(n=>[n,lib+fotky.find(f=>f.n===n).soubor]))};
const meta={};
for(const[n,file]of Object.entries(src)){const name=n==='272'?'272r':n,m=await sharp(file).rotate().metadata();const w=Math.min(1200,m.width);meta[name]={width:m.width,height:m.height,w};
 for(const[label,width]of[[w,w],['mobile',Math.min(780,m.width)]])for(const ext of['avif','webp']){const out=`${root}/photos/${name}-${label}.${ext}`;
  if(fs.existsSync(out))continue; // shared with proposals 00-20, never overwrite
  await sharp(file).rotate().resize({width,withoutEnlargement:true})[ext](ext==='avif'?{quality:82,effort:4,chromaSubsampling:'4:4:4'}:{quality:90,effort:5}).toFile(out)}}
fs.writeFileSync(root+'/tools/image-meta-21.json',JSON.stringify(meta,null,2)+'\n');console.log(meta);
