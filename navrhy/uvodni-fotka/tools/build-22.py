"""Proposal 22: text column and one large photo at a time, slowly changing (Roman, 3. 11. 2026). Touches only 22/."""
import json,re
from pathlib import Path
R=Path(__file__).resolve().parents[1]
meta=json.loads((R/'tools/image-meta-21.json').read_text())
# Honza's order: Zlín, cukrárna, schodiště, dveře; then Jakub's béžová.
S=[('159','28% 50%','Dekorativní stěrka v ordinaci, Zlín'),
 ('35','52% 46%','Výmalba cukrárny, Střelice'),
 ('272r','42% 40%','Průmyslový nátěr schodiště, Opatovice'),
 ('20','58% 12%','Renovace dveří, Příbram na Moravě'),
 ('95','42% 36%','Béžová dekorativní stěrka, Kupařovice')]
def large(n):
 xs=[int(p.stem.split('-')[1]) for p in (R/'photos').glob(f'{n}-*.webp') if p.stem.split('-')[1].isdigit()]
 return max(xs)
def pic(i,n,pos,alt,cls=None):
 w=large(n);m=meta[n];load='fetchpriority="high"' if i==0 else 'loading="lazy"'
 return (f'<picture class="shot {cls or f"slide-{i+1}"}" style="--focus:{pos};--slide:{i}">'
  f'<source media="(max-width:700px)" type="image/avif" srcset="../photos/{n}-mobile.avif">'
  f'<source media="(max-width:700px)" type="image/webp" srcset="../photos/{n}-mobile.webp">'
  f'<source type="image/avif" srcset="../photos/{n}-{w}.avif">'
  f'<img src="../photos/{n}-{w}.webp" width="{m["width"]}" height="{m["height"]}" alt="{alt}" decoding="async" {load}></picture>')
h=(R/'19/index.html').read_text()
media='<div class="stage">'+''.join(pic(i,*t) for i,t in enumerate(S))+'</div>'
h,c=re.subn(r'<div class="proposal-media">.*?</div>(?=<div class="hero-shade")',lambda m:f'<div class="proposal-media">{media}</div>',h,count=1,flags=re.S);assert c==1
h=h.replace('proposal proposal-slideshow','proposal proposal-rotace')
h,c=re.subn(r'<nav class="proposal-panel".*?</nav>','',h,flags=re.S);assert c==1
h=h.replace('<script src="../preview.js"></script>','')
h=h.replace('</head>','<link rel="stylesheet" href="rotace.css"></head>')
(R/'22').mkdir(exist_ok=True);(R/'22/index.html').write_text(h);print('built',len(h))
