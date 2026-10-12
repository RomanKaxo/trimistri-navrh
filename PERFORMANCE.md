# Rychlost webu — 12. 10. 2026

Výchozí PageSpeed Insights na živém `https://trimistri.cz/`: mobil **37/100**, FCP **9,2 s**, LCP **10,4 s**, CLS **0,43**, TBT **0 ms**. [Původní report Googlu](https://pagespeed.web.dev/analysis/https-trimistri-cz/bas17qz5xl?form_factor=mobile).

## Co je opravené

- Pět stejných řezů Interu ve WOFF2 s českou a evropskou latinkou: **1 629 964 → 192 608 B**. Originální fonty a licence zůstávají v repozitáři.
- Jeden minifikovaný stylesheet namísto 7–9 blokujících souborů a vnořeného importu. Čitelné zdroje zůstávají v `navrhy/`.
- Navigace má správný stav už před prvním vykreslením; funguje i během postupného načítání PHP stránky.
- Hero má AVIF, WebP fallback, responzivní varianty, vysokou prioritu a odpovídající preload. Obrázky mají skutečné rozměry.
- Fotografie v galeriích se stahují 200 px před vstupem do pohledu, s funkčním `noscript` fallbackem. Fotky z nižších částí stránky tak nesoutěží s prvním obsahem.
- GLightbox se načte až při hoveru, focusu nebo kliknutí na fotografii; při chybě lze otevřít samotný obrázek.
- PHP odešle hlavičku a první obrazovku před čekáním na veřejné CMS realizace. Živé publikace, odpublikování, formulář, CSRF a `no-store` zůstávají zachované.
- Nové styly, fonty a fotografie mají hash v názvu a na PHP hostingu roční cache. Změna obsahu vytvoří novou adresu. Skripty mají hash v query stringu.

## Srovnatelné místní měření

Lighthouse **13.5.0**, Chromium **156**, výchozí mobilní simulace Slow 4G. Obě verze běží na stejném počítači přes stejný statický server s gzip. Původní verze je neměnný export commitu `2ef8fa3`; každý audit má nový prohlížeč a studenou cache. Tyto hodnoty se nesměšují se skóre Google z produkčního hostingu.

| Stránka | Výkon před → po | FCP před → po | LCP před → po | CLS před → po |
|---|---:|---:|---:|---:|
| Homepage, mobil — dva běhy | 36 → 93 | 9,61 → 1,51 s | 12,08 → 3,15 s | 0,442 → 0 |
| Dekorativní stěrky, mobil | 80 → 97 | 1,35 → 1,51 s | 1,65 → 2,41 s | 0,431 → 0 |

Průběžné varianty: samotné WOFF2 zmenšily fonty, časná inicializace menu odstranila CLS, zkrácení závislostí a načítání fotografií před vstupem do pohledu přinesly konečný výsledek. Rozpočet hledání: tři varianty, přibližně 30 minut měření a optimalizace, žádné placené služby ani zápisy do CMS.

Zlepšení skóre podstránky přináší především stabilní rozložení; v tomto místním běhu její LCP stouplo, ale zůstalo pod 2,5 s. Hodnoty nejsou příslibem stejného výsledku na každém zařízení.

## Ověření

15 porovnání rozložení (320/375/768/1440/1920 px × homepage/služba/galerie) se stejnými výslednými styly, bez přetékání. Menu a Escape, FAQ, zmizení tlačítka po rozbalení realizací, první otevření lightboxu a načítání bez JavaScriptu prošly. Syntaxe 39 PHP souborů a 7 JS souborů a 16 scénářů CMS prošly.

Test s veřejným CMS nahrazeným místní prodlevou 2 s na požadavek ukázal první obrazovku za 0,072 s; menu fungovalo před dokončením dokumentu. Formulář měl platný CSRF token a odpověď stále `no-store`. Nebyl odeslán žádný e-mail ani živý formulář.

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

Pro reprodukci verze auditu použijte `lighthouse@13.5.0`. Záznam jednotlivých místních běhů je v `performance-results.json`. PageSpeed Insights laboratorní test ukáže novou verzi hned po nasazení; případná data skutečných uživatelů jsou samostatná historie za 28 dní. [Dokumentace Lighthouse](https://developer.chrome.com/docs/lighthouse/overview).

## Nasazení a návrat

PHP balíček je `hosting/web/`, statický náhled je kořen repozitáře. Při nahrávání použijte nejprve nové assets, potom PHP includes a stránky. `.htaccess` je součástí změny. Nekopírujte ani nepřepisujte místní či serverové přístupové údaje a CMS konfiguraci.

Pro návrat obnovte původní PHP stránky a includes společně s původními assets. Uložení původních souborů před nasazením a kontrola hashů chrání současné změny na hostingu. Obnova staré verze pouze přes GitHub nevrací automaticky soubory FTP hostingu.
