# Rychlost webu — 12. 10. 2026

Výchozí PageSpeed Insights na živém `https://trimistri.cz/`: mobil **37/100**, FCP **9,2 s**, LCP **10,4 s**, CLS **0,43**, TBT **0 ms**. [Původní report Googlu](https://pagespeed.web.dev/analysis/https-trimistri-cz/bas17qz5xl?form_factor=mobile).

Poslední živé měření Googlu: **97/100 na mobilu**, **99/100 na desktopu**. Mobil: FCP **1,2 s**, LCP **2,0 s**, CLS **0,001**, TBT **70 ms**. Desktop: FCP **0,3 s**, LCP **0,5 s**. [Finální report Googlu](https://pagespeed.web.dev/analysis/https-trimistri-cz/w81iim8y2t?form_factor=mobile). Jde o laboratorní měření; další běhy se mohou mírně lišit.

Živé měření po první optimalizaci: **92/100 na mobilu**, **97/100 na desktopu**. Mobil: FCP **1,7 s**, LCP **2,9 s**, CLS **0,001**, TBT **140 ms**. [Report Googlu před posledním mobilním výřezem](https://pagespeed.web.dev/analysis/https-trimistri-cz/nd4dlh236w?form_factor=mobile). V tomto reportu nejsou data skutečných uživatelů; jde o laboratorní test.

## Co je opravené

- Pět stejných řezů Interu ve WOFF2 s českou a evropskou latinkou: **1 629 964 → 100 504 B** pro pět řezů s běžnou latinkou, českými a slovenskými znaky. Ostatní původně podporované znaky mají doplňkové řezy podle `unicode-range`, které se stáhnou až podle potřeby. Tři počáteční preloads mají **60 288 B** místo předchozích **115 028 B**. Originální fonty a licence zůstávají v repozitáři.
- Jeden minifikovaný stylesheet namísto 7–9 blokujících souborů a vnořeného importu. Homepage má vlastní menší bundle (83 187 B před kompresí, oproti společným 163 294 B). Jeho seznam tříd zahrnuje všechny stavy ze skriptů, poptávkového formuláře, cookies a CMS rendererů. Podstránky mají úplný společný bundle. Čitelné zdroje zůstávají v `navrhy/`.
- Navigace má správný stav už před prvním vykreslením; funguje i během postupného načítání PHP stránky.
- Hero má AVIF, WebP fallback, responzivní varianty, vysokou prioritu a preload před styly a trackingem. Na vysokých telefonech se stahuje pouze viditelný portrétní výřez se stejným horizontálním zaměřením 58 %: **129 632 → 63 650 B**. Výška fotografie zůstává 1 440 px. Media podmínky zajišťují jediný preload; na širších a nízkých displejích zůstává plná fotografie. Obrázky mají skutečné rozměry.
- Fotografie v galeriích se stahují 200 px před vstupem do pohledu, s funkčním `noscript` fallbackem. Fotky z nižších částí stránky tak nesoutěží s prvním obsahem.
- GLightbox se načte až při hoveru, focusu nebo kliknutí na fotografii; při chybě lze otevřít samotný obrázek.
- PHP odešle hlavičku a první obrazovku před čekáním na veřejné CMS realizace. Komprese v PHP posílá při `ob_flush()` průběžný gzip blok; zabraňuje původnímu zadržení celé komprimované stránky hostingem. Aktivní vlastní output handler ani `zlib.output_compression` se nepřepisují. Živé publikace, odpublikování, formulář, CSRF a `no-store` zůstávají zachované.
- Nové styly, fonty a fotografie mají hash v názvu a na PHP hostingu roční cache. Změna obsahu vytvoří novou adresu. Skripty mají hash v query stringu.

## Srovnatelné místní měření

Lighthouse **13.5.0**, Chromium **156**, výchozí mobilní simulace Slow 4G. Obě verze běží na stejném počítači přes stejný statický server s gzip. Původní verze je neměnný export commitu `2ef8fa3`; každý audit má nový prohlížeč a studenou cache. Tyto hodnoty se nesměšují se skóre Google z produkčního hostingu.

| Stránka | Výkon před → po | FCP před → po | LCP před → po | CLS před → po |
|---|---:|---:|---:|---:|
| Homepage, první optimalizace — dva běhy | 36 → 93 | 9,61 → 1,51 s | 12,08 → 3,15 s | 0,442 → 0 |
| Homepage, finální verze — dva běhy | 36 → 98–99 | 9,61 → 1,36 s | 12,08 → 2,10–2,26 s | 0,442 → 0 |
| Dekorativní stěrky, mobil | 80 → 97 | 1,35 → 1,51 s | 1,65 → 2,41 s | 0,431 → 0 |
| Homepage, desktop | 69 → 100 | 1,57 → 0,36 s | 2,03 → 0,60 s | 0,284 → 0 |

Průběžné varianty: samotné WOFF2 zmenšily fonty, časná inicializace menu odstranila CLS, zkrácení závislostí a načítání fotografií před vstupem do pohledu přinesly konečný výsledek. Rozpočet hledání: tři varianty, přibližně 30 minut měření a optimalizace, žádné placené služby ani zápisy do CMS.

Zlepšení skóre podstránky přináší především stabilní rozložení; v tomto místním běhu její LCP stouplo, ale zůstalo pod 2,5 s. Hodnoty nejsou příslibem stejného výsledku na každém zařízení.

Po požadavku na mobilních 97 proběhla další smyčka tří variant (bez placených služeb): oddělené kritické CSS **83** bylo zamítnuto oproti základním **94**, mobilní výřez přinesl **96** a vložení celého CSS do HTML **95** bylo zamítnuto. Zůstává plný cachovatelný stylesheet a menší mobilní výřez; jeho opakované místní měření dalo **97**. Produkční ověření samotného výřezu dalo **94**, proto následovala jedna cílená oprava streamování gzip, kde se ukázala prodleva hostingu kolem 1,6 s. Porovnání platí pouze pro stejný místní server s gzip, nikoli pro produkční skóre Googlu.

Poslední cílená varianta s menším homepage CSS a rozdělenými fonty dala místně **98–99** ve dvou bězích, FCP **1,36 s**, LCP **2,10–2,26 s**, CLS **0**, TBT **0 ms**. Rozdělení glyphů zachovává všech **934 podporovaných znaků** i původní šířky glyphů v každém z pěti řezů. Doplňkový font se na běžné české stránce nestahuje; test méně běžných znaků potvrdil jeho načtení podle potřeby.

## Ověření

Sedm kontrol výběru hero fotografie potvrdilo jediný stažený soubor a zachované zaměření. 15 porovnání rozložení (320/375/768/1440/1920 px × homepage/služba/galerie) se stejnými výslednými styly, bez přetékání. Menu a Escape, FAQ, zmizení tlačítka po rozbalení realizací, první otevření lightboxu a načítání bez JavaScriptu prošly. Syntaxe 39 PHP souborů a 7 JS souborů a 16 scénářů CMS prošly.

Test s veřejným CMS nahrazeným místní prodlevou 2 s na požadavek ukázal první obrazovku za 0,052 s; menu fungovalo před dokončením dokumentu. Formulář měl platný CSRF token a odpověď stále `no-store`. Samostatná kontrola gzip a identity odpovědi ověřila celou platnou HTML odpověď, první obrazovku do 0,01 s a dokončení až po 4 s simulovaných CMS požadavků. Živý gzip přenos po opravě doručil první obrazovku za **0,331 s**, celý dokument za **2,014 s**; před opravou čekal preload v komprimované odpovědi **1,639 s**. Jde o jednotlivé síťové vzorky, nikoli Lighthouse metriky. Nebyl odeslán žádný e-mail ani živý formulář.

## Opětovné sestavení

```sh
rtk proxy python3 -m venv .venv
rtk proxy .venv/bin/pip install -r requirements-performance.txt
rtk npm ci
rtk proxy .venv/bin/python scripts/build-performance.py
rtk proxy python3 scripts/build-hosting.py --original /home/roman/Projects/trimistri/web
```

Generované soubory jsou uložené v Gitu; na hostingu není potřeba Python ani Node. Nikdy neupravujte minifikovaný bundle ručně. `assets/performance-manifest.json` obsahuje názvy a velikosti aktuálních souborů. Zachovejte originální fotografie pro lightbox.

Přesný příkaz pro audit (mobil je výchozí; pro desktop přidejte `--preset=desktop`):

```sh
rtk proxy env CHROME_PATH=/cesta/k/chrome lighthouse https://trimistri.cz/ \
  --chrome-flags="--headless --no-sandbox --disable-dev-shm-usage" \
  --only-categories=performance --output=json --output=html --output-path=report
```

Pro reprodukci verze auditu použijte `lighthouse@13.5.0`. Záznam jednotlivých místních běhů je v `performance-results.json`. PageSpeed Insights laboratorní test ukáže novou verzi hned po nasazení; případná data skutečných uživatelů jsou samostatná historie za 28 dní. [Dokumentace Lighthouse](https://developer.chrome.com/docs/lighthouse/overview). Postup komprese vychází z [PHP ob_gzhandler](https://www.php.net/manual/en/function.ob-gzhandler.php) a [ob_flush](https://www.php.net/manual/en/function.ob-flush.php).

## Nasazení a návrat

PHP balíček je `hosting/web/`, statický náhled je kořen repozitáře. Při nahrávání použijte nejprve nové assets, potom PHP includes a stránky. `.htaccess` je součástí změny. Nekopírujte ani nepřepisujte místní či serverové přístupové údaje a CMS konfiguraci.

Pro návrat obnovte původní PHP stránky a includes společně s původními assets. Uložení původních souborů před nasazením a kontrola hashů chrání současné změny na hostingu. Obnova staré verze pouze přes GitHub nevrací automaticky soubory FTP hostingu.
