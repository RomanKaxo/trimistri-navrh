# Návrh 23. 11. 2026: redesign v2 – kompletní obsah

Nový samostatný návrh webu Tři Mistři. Odpovídá na výtku k předchozímu návrhu (`../unslop-2026-11-23/`), že v něm chybělo hodně věcí. V2 má **všech 18 stránek živého webu** a **všechen jejich obsah**: úvod, 14 služeb, děkujeme, ochranu osobních údajů a 404. Má i všech 386 fotek ze 48 realizací a 14 titulních a hero fotek. Žádný odkaz nevede na živý web trimistri.cz.

Co přesně obsahuje a jak bylo ověřeno, že nic nechybí, je v [INVENTAR.md](INVENTAR.md).

## Stránky

| Soubor | Stránka |
|---|---|
| `index.html` | Úvod (hero, realizace, před a po, služby, postup, recenze, poptávka) |
| `natery-interieru.html` | Malování bytů a interiérů |
| `tapetovani.html` | Tapetování |
| `specialni-natery.html` | Speciální interiérové nátěry |
| `sanace-po-zatekani.html` | Sanace po zatékání |
| `dekoracni-sterky.html` | Dekorativní stěrky (včetně „Starší realizace“) |
| `mikrocement.html` | Mikrocement a stěrky přes obklady |
| `natery-fasad.html` | Nátěry a renovace fasád |
| `natery-strech.html` | Nátěry střech, okapů a svodů |
| `cisteni-fasad.html` | Čištění fasád a povrchů |
| `odstraneni-grafiti.html` | Odstranění graffiti |
| `natery-drevo-kovu.html` | Nátěry oken, podbití, dřeva a kovů |
| `prumyslove-natery.html` | Průmyslové a antikorozní nátěry |
| `epoxidove-podlahy.html` | Epoxidové podlahy |
| `pismomalirstvi.html` | Písmomalířství |
| `dekujeme.html` | Poděkování za poptávku |
| `ochrana-osobnich-udaju.html` | Zásady zpracování osobních údajů |
| `404.html` | Stránka nenalezena |

Další soubory:

- `assets/site.css` a `assets/site.js` jsou společné styly a skripty, bez knihoven.
- `img/` obsahuje fotky ze živého webu a z app.trimistri.cz. Každá je ve dvou velikostech: `-t` je náhled do 720 px, `-f` plné rozlišení do 2048 px. Formát je WebP.
- `snimky/` obsahuje snímky z kontroly: úvod a služba Malování na šířce 1440 a 390 px.
- `_build/` je generátor a data. Stránky vznikají z dat stažených ze živého webu, takže texty zůstávají doslovné.

Všechny stránky mají `noindex, nofollow` a relativní cesty, takže fungují i pod `/trimistri-navrh/` na GitHub Pages.

## Směr

- **Produkt.** Malířská a natěračská firma z Brna. Dělá malování bytů, dekorativní stěrky a nátěry fasád, střech, dřeva a kovů pro domácnosti i firmy v Brně a okolí.
- **Charakter.** Pečliví, věcní a hrdí na řemeslo.
- **Svět.** Rozdělaná stěna: omítka, stěrka a denní světlo na čerstvém povrchu. Z ní je teplá „omítková“ rampa neutrálů (#f4f1ea, #fbfaf6, #ebe6dc). Jedinou barvou je zlatá okrová značky #8b6627, se kterou má bílý text kontrast 5 : 1. Patička a boční panel formuláře jsou v tmavém poli #1f1c18.
- **Výrazné okamžiky.**
  1. Velké skutečné fotky realizací v mozaice na úvodu a v galerii služeb, která má lightbox.
  2. Blok „Před a po“ ze skutečných fotek označených na živém webu štítky Před a Po.
- **Podpis.** Přepínač „Před / Po“ na kartě každé realizace, která má fotky před i po. Je to „jedna živá věc“, kterou požaduje taste skill.
- **Nápad (taste, krok 4).** Na tomhle webu se ze zakázky s místem a počtem fotek stává základní stavební kámen stránky. Každá služba ukazuje celé zakázky („Výmalba RD · Valašské Klobouky · 25 fotografií“), ne ilustrační obrázky. U konkurence by věta nefungovala, protože místa a fotky jsou jen jejich.

## Co bylo z jednotlivých skillů použito

**design-taste-frontend (tasteskill v2).** Skripty `draw.mjs`, `inspect.mjs` a `lint.mjs` nejsou lokálně nainstalované, proto byla jejich práce provedena ručně, jak skill pro takový případ předepisuje. Použito:

- inventář předmětu (místa realizací, štítky Před/Po, 15 let, IČO a adresa) a z něj nápad;
- domovní pravidla:
  - žádné nadpisky nad nadpisy, číslování 01/02, přechody, sklo, emoji ani verzálky s prostrkáním;
  - nejvýš dvoje písmo, ve skutečnosti jedno: Instrument Sans;
  - stejné vnější okraje;
  - v každé sekci nadpis a právě jedno H1;
- obsah sekcí v plném rozsahu („thin sections lose“);
- velká jednotlivá fotka místo šesti malých;
- čtvercové rohy fotek a tlačítka s rohy 2 px místo „měkkých“ 9–16 px;
- patička jako navržené zakončení se jménem přes celou šířku;
- vrstva pohybu: postupné vstupy sekcí, odezva na všech ovládacích prvcích a jeden pohyblivý obraz (odkrytí mozaiky přes clip-path);
- kontrola na třech šířkách a kritika podle snímků.

Odchylka: tenké oddělovače zůstaly jen u seznamů služeb, otázek, kroků a ve formuláři. Bez nich se dlouhé seznamy hůř čtou a formuláře a tabulky skill výslovně vyjímá.

**tasteskill.** Použity tři číselníky směru:

- variabilita: střední, s asymetrickými mřížkami kategorií;
- pohyb: střední, s jedním výrazným momentem v hero;
- hustota: vyšší, protože řemeslník potřebuje ukázat hodně fotek.

Dál z něj pochází systém tokenů (barvy, písmo, rozestupy, stavy), skutečný obsah bez vymyšlených tvrzení a respekt k omezenému pohybu.

**emil-design-eng.** Použito:

- stisk tlačítek přes `scale(.97)` za 140 ms;
- vlastní křivky `cubic-bezier(.23,1,.32,1)` (ease-out) a `(.77,0,.175,1)` (in-out), nikde ease-in;
- UI přechody do 300 ms;
- hover jen za `@media (hover: hover) and (pointer: fine)`;
- přechody místo keyframes u věcí, které se dají přerušit (menu, přepínač Před/Po, lightbox);
- modální okna vycházejí ze středu přes `@starting-style` s `scale(.97)` a nikdy nezačínají od `scale(0)`;
- výměna fotky v lightboxu krátkým prolnutím;
- odkrytí fotek přes `clip-path: inset()`;
- tah prstem v lightboxu, který reaguje na rychlost (> 0,11 px/ms), ne jen na vzdálenost;
- postupné vstupy po 70 ms;
- `prefers-reduced-motion` ponechá jen krátké změny průhlednosti.

**impeccable.** Spouštěč `scripts/impeccable` ve skillu není, proto byl kontext načten ručně, jak skill předepisuje. Použito:

- režim *Persuade* pro úvod a služby a režim *Read* pro ochranu údajů;
- zásada, že redesign zachovává obsah, funkce a pravdu o produktu a mění jen vizuální svět;
- spodní hranice řemesla (craft-floor):
  - kontrast textu ≥ 4,5 : 1;
  - délka řádku do zhruba 75 znaků;
  - tracking nadpisů nejméně −0,045 em;
  - stavy hover, focus, chyba a prázdný stav;
  - nastylované povrchy prohlížeče: `::selection`, barva kurzoru, barva posuvníku, odsazení podtržení a focus ring v barvě značky;
- zákaz kickerů, ikonových karet a gradientního textu;
- primární akce v pracovní podobě: formulář přímo na stránce a předvyplněný výběr služby.

**unslop (by @heydamir, CC BY 4.0).** Použito pět řádků směru (výše) a pořadí passů: rozestupy na mřížce 4 px, barva (jedna rampa a jeden akcent), ikony (jedna sada, tah 1,5), text, typografie (váhy 400–600, žádné verzálky), rozvržení, detaily, vizuály a pohyb. Bohatost je v obsahu (fotky), ne v okrajových prvcích rozhraní. Pro sběr živého webu byl použit postup „snapshot“ s Playwrightem, kdy se stránka nejdřív projede až dolů, aby se načetly líně načítané fotky. Kredit je v patičce.

**frontend-design.** Vychází ze skutečné struktury a obsahu webu. Výsledek byl posouzen ve skutečném vykreslení na 1920, 1440 a 390 px a v README je uvedeno, co ověřeno nebylo.

**ui-ux-pro-max.** Vyhledávací skript `search.py` ve skillu není, proto byla použita priorita pravidel z tabulky skillu:

1. Přístupnost: kontrast, alt texty, ovládání klávesnicí, aria-label u ikonových tlačítek.
2. Dotyk: cíle nejméně 44 × 44 px a lišta na mobilu.
3. Výkon: WebP, `loading=lazy`, rezervované rozměry `width`/`height`, náhled vs. plná velikost přes `srcset`.
4. Rozvržení: žádné vodorovné posouvání.
5. Typografie: základ 17 px a řádkování 1,55.
6. Formulář: viditelné popisky, chyba u pole a souhrn chyb.
7. Navigace: hlubokými odkazy na sekce.

**verification-before-completion.** Všechna tvrzení v INVENTAR.md vycházejí z čerstvého běhu skriptů po poslední změně:

- `_build/tools/coverage.mjs` hledá každý řádek textu živé stránky v novém návrhu;
- `_build/tools/qa.mjs` projde 18 stránek na 1920, 1440 a 390 px a hledá přetečení, rozbité obrázky, chyby v konzoli, odkazy na trimistri.cz a počet H1. Prověří i interakce: menu, lightbox, Před/Po, další realizace, FAQ, formulář, recenze, rychlý výběr a omezený pohyb;
- počty sekcí a fotek se porovnávají se živou verzí.

## K ověření a omezení

- **Formulář se neodesílá na server.** Po kontrole polí v prohlížeči otevře e-mail na info@trimistri.cz s vyplněnými údaji. Fotky je nutné přiložit ručně. Živý web má PHP odeslání s nahráním fotek (`send.php`) a při převodu je potřeba napojit formulář na něj.
- **Cookies.** Panel a volba jsou funkční jen vizuálně (volba se uloží do prohlížeče). Žádné měření ani Google Ads v návrhu nejsou.
- **Recenze** jsou statický záznam z 23. 11. 2026. Stáří typu „včera“ nebo „před 3 dny“ se časem posune. Při převodu je napojit na živý zdroj jako dnes.
- **Realizace** jsou statický záznam z app.trimistri.cz k 23. 11. 2026. Živý web je bere z aplikace průběžně.
- **Blok „Před a po“ na úvodu** je nový. Ukazuje skutečné fotky, které mají na živém webu štítek Před nebo Po ze stejné zakázky, ale nemusí jít o stejný záběr. Proto jsou fotky vedle sebe, ne v posuvníku. Výběr čtyř zakázek ať potvrdí majitel.
- **Počty zakázek a fotek** u kategorií („18 zakázek, 56 fotek“) jsou spočtené z dat realizací, nejsou to marketingová čísla. Pokud je majitel nechce, stačí smazat jeden řádek v `_build/build.mjs`.
- **Štítkové nadpisky** typu „CENA STĚRKY“ nebo „KDE PRACUJEME“ jsou podle taste a impeccable převedené do nadpisů, které nesou stejnou informaci. Seznam je v INVENTAR.md.
- Služby bez fotek na živém webu (střechy, epoxidové podlahy, mikrocement) mají v hero místo fotky panel „Co kontrolujeme / co potřebujeme znát“. Fotky nebyly vymýšleny.
- Písmo Instrument Sans se načítá z Google Fonts. Pro produkci ho stačí hostovat lokálně.
- Na snímcích celé stránky je na mobilu lišta „Zavolat / Nezávazná poptávka“ zachycená uprostřed stránky. Je to artefakt snímku, v prohlížeči je lišta přichycená dole.
- Telefon je všude jen +420 774 927 182.

## Sestavení

```bash
node _build/build.mjs                       # vygeneruje všech 18 stránek z _build/data/
node _build/tools/inventar.mjs              # přegeneruje INVENTAR.md z dat a výsledků kontrol
# kontrola (potřebuje lokální server nad složkou navrhy/ a Playwright):
node _build/tools/coverage.mjs <složka s texty živého webu> http://127.0.0.1:8765/redesign-v2-2026-11-23/ pokryti.json
node _build/tools/qa.mjs http://127.0.0.1:8765/redesign-v2-2026-11-23/ qa.json snimky
```

Data živého webu se sbírají skripty `_build/tools/content.mjs`, `extract.mjs`, `text.mjs` a `galleries.py`. Fotky stahuje `dl.sh` (seznam zdrojů je v `_build/data/photo-sources.tsv`) a zmenšuje `conv.sh` přes libvips.

## Kredit

Postup a pravidla mimo jiné **unslop by [@heydamir](https://x.com/heydamir)** (Damir Sokolovsky, [heydamir.design/unslop](https://heydamir.design/unslop)), licence [CC BY 4.0](https://creativecommons.org/licenses/by/4.0/). Fotografie, značka a texty patří firmě Tři Mistři s.r.o.
