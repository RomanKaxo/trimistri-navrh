"""Proposal 21: mosaic homepage per Jakub and Honza (WhatsApp 3. 11. 2026). Touches only 21/."""
import json,re
from pathlib import Path
R=Path(__file__).resolve().parents[1]
meta=json.loads((R/'tools/image-meta-21.json').read_text())
TILES=[('314','tile-text','50% 50%','Dekorativní stěrka se zlatými akcenty, Brno'),
 ('272r','tile-stairs','38% 62%','Průmyslový nátěr schodiště, Opatovice'),
 ('159','tile-a','18% 50%','Dekorativní stěrka v ordinaci, Zlín'),
 ('95','tile-b','42% 40%','Béžová dekorativní stěrka, Kupařovice'),
 ('35','tile-c','50% 50%','Výmalba cukrárny, Střelice'),
 ('20','tile-d','58% 14%','Renovace dveří, Příbram na Moravě')]
def pic(i,n,cls,pos,alt):
 m=meta[n];w=m['w'];load='fetchpriority="high"' if i<2 else 'loading="lazy"'
 return (f'<picture class="shot {cls}" style="--focus:{pos}">'
  f'<source media="(max-width:700px)" type="image/avif" srcset="../photos/{n}-mobile.avif">'
  f'<source media="(max-width:700px)" type="image/webp" srcset="../photos/{n}-mobile.webp">'
  f'<source type="image/avif" srcset="../photos/{n}-{w}.avif">'
  f'<img src="../photos/{n}-{w}.webp" width="{m["width"]}" height="{m["height"]}" alt="{alt}" decoding="async" {load}></picture>')
h=(R/'17/index.html').read_text()
media=''.join(pic(i,*t) for i,t in enumerate(TILES))
h,c=re.subn(r'<div class="proposal-media">.*?</div>(?=<div class="hero-shade"|<[^>]*hero-shade)',lambda m:f'<div class="proposal-media">{media}</div>',h,count=1,flags=re.S)
assert c==1,'media block not found'
h=h.replace('proposal proposal-mosaic','proposal proposal-bento')
h,c=re.subn(r'<nav class="proposal-panel".*?</nav>','',h,flags=re.S);assert c==1
h=h.replace('<script src="../preview.js"></script>','')
h=h.replace('</head>','<link rel="stylesheet" href="bento.css"></head>')
(R/'21').mkdir(exist_ok=True);(R/'21/index.html').write_text(h)
print('built',len(h))
