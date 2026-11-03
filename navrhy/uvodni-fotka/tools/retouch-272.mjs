// Retouch of photo 272 requested by Jakub (WhatsApp 3. 11. 2026): the dark perforation of the ceiling reads as dirt.
// Only the ceiling polygons change; stairs, railing and walls keep their original pixels.
import {createRequire} from 'node:module';
const sharp=createRequire('/home/roman/Projects/prezentace/package.json')('sharp');
const [src,out]=process.argv.slice(2);
const {data,info}=await sharp(src).rotate().removeAlpha().raw().toBuffer({resolveWithObject:true});
const W=info.width,H=info.height,s=W/1000; // polygons in 1000-wide preview coordinates
const inside=[
 [[0,0],[238,0],[118,420],[104,470],[108,566],[0,566]],
 [[324,0],[612,0],[600,40],[470,265],[404,390],[296,388],[292,352],[220,286],[210,262]],
 [[646,0],[1000,0],[1000,418],[912,430],[880,366],[776,226]],
 [[905,442],[1000,420],[1000,532],[935,532],[770,560],[680,566],[640,585],[625,546],[720,510],[770,491]],
];
const skylight=[[352,178],[432,60],[542,160],[466,252]];
const pip=(x,y,p)=>{let c=false;for(let i=0,j=p.length-1;i<p.length;j=i++){const[a,b]=p[i],[d,e]=p[j];if((b>y)!==(e>y)&&x<(d-a)*(y-b)/(e-b)+a)c=!c}return c};
const mask=new Float32Array(W*H);
for(let y=0;y<H;y++)for(let x=0;x<W;x++){const u=x/s,v=y/s;if(pip(u,v,skylight))continue;if(inside.some(p=>pip(u,v,p)))mask[y*W+x]=1}
const box=(a,r)=>{const b=new Float32Array(a.length),c=new Float32Array(a.length),n=2*r+1;
 for(let y=0;y<H;y++){let t=0;for(let x=-r;x<=r;x++)t+=a[y*W+Math.min(W-1,Math.max(0,x))];for(let x=0;x<W;x++){b[y*W+x]=t/n;t+=a[y*W+Math.min(W-1,x+r+1)]-a[y*W+Math.max(0,x-r)]}}
 for(let x=0;x<W;x++){let t=0;for(let y=-r;y<=r;y++)t+=b[Math.min(H-1,Math.max(0,y))*W+x];for(let y=0;y<H;y++){c[y*W+x]=t/n;t+=b[Math.min(H-1,y+r+1)*W+x]-b[Math.max(0,y-r)*W+x]}}
 return c};
const blur=(a,r)=>box(box(box(a,r),r),r);
const luma=new Float32Array(W*H);for(let i=0;i<W*H;i++)luma[i]=.3*data[3*i]+.59*data[3*i+1]+.11*data[3*i+2];
// Holes are darker than the surrounding ceiling: fit the surface from the lighter pixels only.
const wL=blur(mask,45),mean=blur(luma.map((v,i)=>v*mask[i]),45);
const weight=new Float32Array(W*H);for(let i=0;i<W*H;i++)if(mask[i]&&wL[i]>1e-3&&luma[i]>=.97*mean[i]/wL[i])weight[i]=1;
const w=blur(weight,16),ch=[0,1,2].map(c=>blur(Float32Array.from({length:W*H},(_,i)=>data[3*i+c]*weight[i]),16));
const soft=box(box(mask,2),2);
let seed=7;const rnd=()=>(seed=seed*16807%2147483647)/2147483647;
const o=Buffer.from(data);
for(let i=0;i<W*H;i++){const a=mask[i]?soft[i]:0;if(!a||w[i]<1e-3)continue;const g=(rnd()-.5)*2.4;for(let c=0;c<3;c++)o[3*i+c]=Math.round(data[3*i+c]*(1-a)+(ch[c][i]/w[i]+g)*a)}
await sharp(o,{raw:{width:W,height:H,channels:3}}).webp({quality:95}).toFile(out);
