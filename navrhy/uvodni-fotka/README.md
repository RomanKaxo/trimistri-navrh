# Návrhy úvodní fotografie

Přehled: https://romankaxo.github.io/trimistri-navrh/navrhy/uvodni-fotka/

`00/` je současná homepage. `01/` až `20/` jsou celé kopie se změnou pouze uvnitř hera a s přidaným ovládacím panelem. Vše je izolované v této složce. Živé PHP, FTP ani jiné soubory tohoto repozitáře se nemění.

Zdroj: homepage vyrenderovaná 1. 11. 2026 z `/home/roman/work/trimistri-web/index.php` pomocí `php -S 127.0.0.1:8731 -t /home/roman/work/trimistri-web`. Snapshot `tools/source.txt` má odstraněný formulářový token. Závislosti CSS, fonty, skripty a obrázky homepage jsou místní kopie původních assetů. Statické stránky blokují odeslání formuláře a nenačítají reklamní skript. Původní odkazy do sekcí fungují místně; odkazy na služby vedou na trimistri.cz.

## Fotografie

Přesné zdroje, služby, města/čtvrti a realizaceId jsou v `manifest.json`. Knihovna: `/home/roman/Projects/trimistri-instagram/knihovna/fotky.json`. Žádný nový stock nebo generovaný obraz. Pouze 00 zachovává stávající hero pro porovnání.

- 03: 331 → 159, protože původní snímek má volné kabely a nedokončené instalace.
- 04: 316 → 332, protože původní ložnice obsahuje zakrytý a neuspořádaný nábytek.
- 07: 55 → 35, povolená alternativa ze stejné realizace lépe ukazuje prostor než stůl s občerstvením. Použita také v 17 a 19.
- 12: 145 → 143, stejný dům, ale štítek „po“ místo „průběh“.
- 16 používá stejné náhrady jako 03 a 12.
- 09 a 11 zachovávají 274 a 285; ořez zvýrazňuje zábradlí a stěnu.
- 18: 308 „před“ a 310 „po“, realizaceId `3894a545-5c53-547d-aa21-a03d6b5396ea`, Česká. Vizuálně zkontrolována stejná okna, vchod a garáž. Úhel a perspektiva se liší; posuvník porovnává stav a neslibuje přesné překrytí pixelů.
- 20 spojuje dvě různé realizace a služby, nikoliv celek a detail téže stěny: 327 Tapetování a 314 Dekorativní stěrky.

Každý vybraný snímek i nahrazené snímky byly vizuálně prohlédnuté. Ořez je veden pomocí `object-position` (`--focus`), bez retuše nebo změny expozice. Původní hero-shade i horní přechod zůstávají stejné. Tenká grafitová kontura za původní barvou písma řeší světlé detaily pod malými zlatými texty. Dělené varianty 14, 15 a 18 používají krémový podklad a grafitové/tmavě zlaté písmo původní palety. Texty, CTA a logo jsou původní.

AVIF (quality 85, 4:4:4) a WebP (quality 94), mobilní zdroj široký nejvýše 780 px. Požadované šířky 1024, 1440 a 1920 jsou omezeny originálem, duplicity se nevyrábějí. Většina fotografií má originál 1200 px na šířku; nevzniká umělé rozlišení nad originálem. Detaily jsou v `tools/image-meta.json`.

## Ověření

- `verification.json`: Chromium, 21 homepage × dvě velikosti (1440 × 900, 390 × 844), přehled navíc. HTTP 200, chyby konzole a JavaScriptu, chybné odpovědi assetů, nedohrané viditelné obrázky, horizontální posun při procházení sekcí, noindex. Zdrojový obsah mezi koncem hera a koncem main je identický ve všech 21 homepage.
- Posuvník ověřen změnou hodnoty a klávesnicí; procházení návrhů panelem i šipkou; návrat do přehledu.
- Animace 19 ověřena ve fázích 0, 7, 8, 16 a 24 sekund: čtyři snímky i skutečné postupné prolínání. Při `prefers-reduced-motion` zůstává jeden snímek bez animace.
- `baseline-comparison.json`: screenshot 00 proti PHP zrcadlu má na obou rozlišeních 0 rozdílných pixelů po skrytí přidaného panelu. Porovnání se týká úvodního viewportu, s vypnutou animací.
- `split-followup.json`: šest kontrol a nové screenshoty dělených variant po odstranění původního stínu bílého písma z grafitového textu.
- `contrast.json`: 7686 znakových vzorků hlavního textu hera. Podklad se měří ze screenshotu bez textu, případně proti bezprostřední grafitové kontuře. Kritéria 4,5:1 pro běžný text a 3:1 pro velký text. Dekorativní šipky jsou vynechané. Jde o cílené měření hlavního textu, nikoliv úplný audit přístupnosti celé původní homepage.
- Všechny nové HTML stránky mají `noindex, nofollow`; kořenový `robots.txt` už obsahuje `Disallow: /`.
- `screenshots/`: skutečné náhledy všech 21 homepage pro desktop a mobil, přehled a celá stránka 01. AVIF před zachycením screenshotu čeká na dokončení `decode()`.

## Vizuální kontrola

První kolo odhalilo překryv textu s fotografií u dělených variant na telefonu a předčasně zachycené nedekódované AVIF v mozaice. Opraveno umístění textu v běžném toku a čekání na dekódování. Druhé kolo kontrolovalo všech 42 úvodních záběrů, výřezy, čitelnost, panel a úplnost mozaiky. Doporučení: 01 jako nejpřímější výměna fotografie; 14 pro oddělený text; 20 pro kombinaci prostoru a řemesla.

## Opakování

Spouštěj z kořene repozitáře. Playwright a sharp se načítají přes `createRequire('/home/roman/Projects/prezentace/package.json')`; používá se pouze Chromium. Žádná instalace závislostí.

```sh
rtk proxy node navrhy/uvodni-fotka/tools/images.mjs
rtk proxy python3 navrhy/uvodni-fotka/tools/build.py
rtk proxy python3 navrhy/uvodni-fotka/tools/overview.py
rtk proxy python3 -m http.server 8732 --bind 127.0.0.1
# V další konzoli:
rtk proxy node navrhy/uvodni-fotka/tools/verify.mjs
rtk proxy node navrhy/uvodni-fotka/tools/contrast.mjs
```
