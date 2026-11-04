"""Proposal 23: mosaic from 17 with the owners' real picks and its own phone layout (Roman, 4. 11. 2026). Touches only 23/.
Replaces photo 327 (not their job, Jakub 3. 11.), the facade 143 ("no wow") and the blue room 343 (Honza: no blue)."""
import json,re
from pathlib import Path
R=Path(__file__).resolve().parents[1]
meta=json.loads((R/'tools/image-meta-21.json').read_text())
S=[('314','32% 48%','Dekorativní stěrka se zlatými akcenty, Brno'),
 ('159','50% 45%','Dekorativní stěrka v ordinaci, Zlín'),
 ('272r','40% 66%','Průmyslový nátěr schodiště, Opatovice'),
 ('20','50% 45%','Renovace dveří, Příbram na Moravě'),
 ('35','52% 46%','Výmalba cukrárny, Střelice'),
 ('95','50% 42%','Béžová dekorativní stěrka, Kupařovice')]
def large(n):
 return max(int(p.stem.split('-')[1]) for p in (R/'photos').glob(f'{n}-*.webp') if p.stem.split('-')[1].isdigit())
def pic(i,n,pos,alt):
 w=large(n);m=meta[n];load='fetchpriority="high"' if i<3 else 'loading="lazy"'
 return (f'<picture class="shot shot-{i+1}" style="--focus:{pos}">'
  f'<source media="(max-width:700px)" type="image/avif" srcset="../photos/{n}-mobile.avif">'
  f'<source media="(max-width:700px)" type="image/webp" srcset="../photos/{n}-mobile.webp">'
  f'<source type="image/avif" srcset="../photos/{n}-{w}.avif">'
  f'<img src="../photos/{n}-{w}.webp" width="{m["width"]}" height="{m["height"]}" alt="{alt}" decoding="async" {load}></picture>')
h=(R/'17/index.html').read_text()
media=''.join(pic(i,*t) for i,t in enumerate(S))
h,c=re.subn(r'<div class="proposal-media">.*?</div>(?=<div class="hero-shade")',lambda m:f'<div class="proposal-media">{media}</div>',h,count=1,flags=re.S);assert c==1
h,c=re.subn(r'<nav class="proposal-panel".*?</nav>','',h,flags=re.S);assert c==1
h=h.replace('<script src="../preview.js"></script>','')
h=h.replace('</head>','<link rel="stylesheet" href="mozaika.css"></head>')
(R/'23').mkdir(exist_ok=True);(R/'23/index.html').write_text(h);print('built',len(h))
