"""Isolated static homepage previews, generated from the PHP mirror snapshot."""
import json,re,shutil,html
from pathlib import Path
ROOT=Path(__file__).resolve().parents[1]
WEB=Path('/home/roman/work/trimistri-web')
LIB=Path('/home/roman/Projects/trimistri-instagram')
photos={p['n']:p for p in json.loads((LIB/'knihovna/fotky.json').read_text())['fotky']}
def v(n,title,why,nums,kind='photo',positions=None,note=''):
 return dict(id=f'{n:02}',title=title,why=why,photos=nums,kind=kind,positions=positions or ['50% 45%']*len(nums),note=note)
V=[
v(1,'Nasvícená ložnice','Oblouková stěna a světlo ukazují hotovou práci v zabydleném prostoru.',[327],positions=['50% 42%']),
v(2,'Ložnice v širším záběru','Druhý pohled propojuje hotovou stěnu, okno a nábytek.',[328],positions=['58% 43%']),
v(3,'Světlý interiér','Denní světlo a široký záběr dávají vyniknout skutečnému povrchu.',[159],note='331 → 159: volné kabely a nedokončené instalace; náhrada ukazuje dokončený interiér stejné služby.'),
v(4,'Stěna v denním světle','Boční světlo nechává čitelnou kresbu povrchu bez zakrytého nábytku.',[332],positions=['48% 30%'],note='316 → 332: zakrytý a neuspořádaný nábytek v ložnici; náhrada ukazuje čistou dokončenou stěnu stejné služby.'),
v(5,'Barevný obývák','Modrozelená stěna v běžném obýváku působí osobně a uvěřitelně.',[343],positions=['56% 47%']),
v(6,'Šedá stěna v obýváku','Kontrast povrchu a dřeva ukazuje výsledek v každodenním použití.',[162],positions=['45% 42%']),
v(7,'Cukrárna','Hotový veřejný prostor rozšiřuje představu o tom, pro koho mistři pracují.',[35],positions=['52% 46%'],note='55 → 35: původnímu záběru dominuje stůl s občerstvením; alternativa ze stejné realizace ukazuje celou místnost.'),
v(8,'Žluté schodiště','Výrazná diagonála a žlutá plocha okamžitě přitáhnou pozornost.',[272],positions=['45% 39%']),
v(9,'Rytmus zábradlí','Druhý pohled na schodiště staví na barvě a opakování svislic.',[274],positions=['50% 12%'],note='274 ponechána, ořez zvýrazňuje zábradlí a omezuje zaprášené schody v popředí.'),
v(10,'Světlý obývák','Klidný zabydlený pokoj osloví návštěvníka, který řeší vlastní byt.',[250],positions=['53% 42%']),
v(11,'Dětský pokoj','Jemný vzor a barevná plocha ukazují další podobu hotového interiéru.',[285],positions=['70% 28%'],note='285 ponechána, horní ořez zvýrazňuje stěnu a omezuje prázdnou podlahu.'),
v(12,'Dům pod modrou oblohou','Celý dům a jasná obloha dávají úvodu konkrétní měřítko.',[143],positions=['50% 32%'],note='145 → 143: 145 má štítek průběh, 143 má štítek po a ukazuje stejný dům bez pracovního popředí.'),
v(13,'Povrch zblízka','Detail se zlatavými akcenty mění skutečnou práci v texturové pozadí.',[314],positions=['32% 48%']),
v(14,'Papír a vysoký záběr','Text na krémovém podkladu nechává vysoké fotografii vlastní prostor.',[315],'split',['50% 43%']),
v(15,'Ložnice vlevo','Zrcadlové rozložení staví dokončený pokoj před samotné sdělení.',[327],'mirror',['50% 45%']),
v(16,'Tři pohledy na řemeslo','Interiér, schodiště a fasáda ukazují šíři práce v jednom obrazu.',[159,272,143],'triptych',['55% 45%','45% 35%','50% 30%'],'Stejné náhrady 331 → 159 a 145 → 143 jako u návrhů 03 a 12.'),
v(17,'Mozaika realizací','Šest záběrů šesti služeb ukazuje různorodou skutečnou práci.',[327,35,272,143,19,343],'mosaic',['50% 40%','50% 40%','45% 35%','50% 30%','50% 45%','55% 45%']),
v(18,'Proměna fasády','Posuvník odhaluje změnu stejného domu a umožňuje výsledek prozkoumat.',[308,310],'compare',['50% 50%','50% 50%'],'308 před / 310 po, shodné realizaceId 3894a545-5c53-547d-aa21-a03d6b5396ea, Česká. Vizuálně ověřena stejná okna, vchod a garáž; snímky mají jiný úhel a nejsou geometricky registrované.'),
v(19,'Čtyři realizace v pohybu','Pomalé prolínání střídá čtyři hotové prostory bez dalšího klikání.',[327,343,35,162],'slideshow',['50% 42%','55% 45%','50% 45%','45% 42%']),
v(20,'Celek i detail','Hotová ložnice a detail jiné realizace propojují prostor s řemeslem.',[327,314],'detail',['50% 42%','50% 50%'],'Dva různé projekty: ložnice 327 je Tapetování, detail 314 jsou Dekorativní stěrky; nejde o detail stejné stěny.'),
]
places={143:'Rozdrojovice',159:'Zlín',327:'Brno · Bystrc',328:'Brno · Bystrc',343:'Brno · Líšeň',314:'Brno · Špitálka',332:'',250:'Modřice'}
for x in V:x['sources']=[dict(photos[n],lokalita=places.get(n,photos[n]['lokalita'])) for n in x['photos']]
(ROOT/'manifest.json').write_text(json.dumps(V,ensure_ascii=False,indent=2)+'\n')
s=(ROOT/'tools/source.txt').read_text()
s=re.sub(r'<script async src="https://www.googletagmanager.com[^>]*></script>','',s)
s=re.sub(r'<link rel="preload" as="image"[^>]*>','',s)
s=s.replace('<head>','<head>\n<meta name="robots" content="noindex, nofollow">')
s=re.sub(r'name="(?:csrf_token|csrf)" value="[^"]*"','name="csrf" value="preview-only"',s)
queue=list(set(re.findall(r'(?:\./)?assets/[a-zA-Z0-9_./-]+',s)))+['favicon.ico'];seen=set()
while queue:
 name=queue.pop().removeprefix('./')
 if name in seen:continue
 seen.add(name);src=WEB/name
 if not src.is_file():continue
 dst=ROOT/name;dst.parent.mkdir(parents=True,exist_ok=True);shutil.copy2(src,dst)
 if src.suffix in ['.css','.js']:
  t=src.read_text();queue+=re.findall(r'(?:\./)?assets/[a-zA-Z0-9_./-]+',t)
  for u in re.findall(r'url\(["\']?([^\)"\']+)',t):
   if not u.startswith(('data:','http:','https:','#')):
    resolved=(src.parent/u.split('?')[0]).resolve()
    if resolved.is_relative_to(WEB):queue.append(str(resolved.relative_to(WEB)))
s=s.replace('href="./#','href="#').replace('href="./"','href="#top"')
s=re.sub(r'href="(?:\./)?(?!assets/|favicon)([a-z][a-z0-9-]*(?:#[a-z]+)?)"',r'href="https://trimistri.cz/\1"',s)
s=s.replace('./assets/','../assets/')
s=re.sub(r'(?<=["\'])assets/','../assets/',s)
s=s.replace('href="favicon.ico"','href="../favicon.ico"')
s=s.replace('<body class="night-gallery">','<body class="night-gallery"><script>document.addEventListener("submit",e=>{e.preventDefault();e.stopImmediatePropagation();alert("Toto je náhled. Poptávku odešlete na trimistri.cz.")},true);</script>')
s=s.replace('</head>','<link rel="stylesheet" href="../preview.css"></head>')
hero=re.search(r'<section class="hero-scene".*?</section>',s,re.S).group()
media=re.search(r'<picture>.*?</picture>',hero,re.S).group()
imageMeta=json.loads((ROOT/'tools/image-meta.json').read_text())
def picture(n,pos,cls='',lazy=False):
 x=photos[n];m=imageMeta[str(n)];alt=html.escape((x['sluzba']+' · '+places.get(n,x['lokalita'])).strip(' ·'),quote=True)
 widths=m['widths'];srcset=lambda ext:', '.join(f'../photos/{n}-{w}.{ext} {w}w' for w in widths)
 return f'<picture class="shot {cls}" style="--focus:{pos}"><source media="(max-width:700px)" type="image/avif" srcset="../photos/{n}-mobile.avif"><source media="(max-width:700px)" type="image/webp" srcset="../photos/{n}-mobile.webp"><source type="image/avif" srcset="{srcset("avif")}" sizes="100vw"><img src="../photos/{n}-{widths[-1]}.webp" srcset="{srcset("webp")}" sizes="100vw" width="{m["width"]}" height="{m["height"]}" alt="{alt}" decoding="async" {"loading=lazy" if lazy else "fetchpriority=high"}></picture>'
def panel(i):
 prev=f'{i-1:02}' if i else '20';nex=f'{i+1:02}' if i<20 else '00'
 return f'<nav class="proposal-panel" aria-label="Procházení návrhů"><span>{"Současná 00" if not i else f"Návrh {i:02}/20"}</span><a href="../{prev}/" aria-label="Předchozí návrh">←</a><a href="../{nex}/" aria-label="Další návrh">→</a><a href="../">přehled</a></nav>'
for i in range(21):
 out=ROOT/f'{i:02}';out.mkdir(exist_ok=True);h=s
 if i:
  x=V[i-1];k=x['kind'];pics=[picture(n,pos,f'shot-{j+1}',j>0) for j,(n,pos) in enumerate(zip(x['photos'],x['positions']))];contents=''.join(pics)
  if k=='compare':contents=f'<div class="comparison" style="--wipe:50%">{contents}<span class="before-tag">Před</span><span class="after-tag">Po</span><div class="wipe-line"></div></div><div class="wipe-control"><label for="wipe">Před / po · posuňte</label><input id="wipe" type="range" min="0" max="100" value="50" aria-label="Odhalit stav před a po"></div>'
  new=hero.replace('class="hero-scene"',f'class="hero-scene proposal proposal-{k}"').replace(media,f'<div class="proposal-media">{contents}</div>');h=h.replace(hero,new)
 h=h.replace('</body>',panel(i)+'<script src="../preview.js"></script></body>')
 (out/'index.html').write_text(h)
print('Built 00–20; copied',len(seen),'referenced assets')
