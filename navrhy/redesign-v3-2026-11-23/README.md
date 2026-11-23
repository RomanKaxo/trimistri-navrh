# Návrh 23. 11. 2026: redesign v3 – živější

Odpověď majitele na v2: „s tím designem si jde víc vyhrát, je to takové mrtvé“. V3 má **stejný obsah a stejné funkce jako v2** (všech 18 stránek, všechny texty živého webu, 386 fotek ze 48 realizací, formulář, lightbox, recenze, cookies), ale nový vizuální svět a vrstvu pohybu. Data v `_build/data/` jsou převzatá z v2 beze změny, mění se jen generátor (`_build/build.mjs`), styly a skript.

Pokrytí obsahu a výsledky kontrol jsou v [INVENTAR.md](INVENTAR.md).

## Směr

- **Svět: rozdělaná zakázka.** Web má vypadat jako práce mistrů, ne jako šablona: tah válečku, malířská páska, omítka a stěrka, barva v kbelíku.
- **Nápad (taste, krok 4).** Na tomhle webu se ze **zakázky s místem** stává **štítek na malířské pásce**: každá fotka nese místo realizace na kousku pásky (Zlín, Opatovice, Brno · Bohunice…), stejně jako se páskou označují věci na stavbě. Místa a fotky jsou jen jejich, u konkurence by věta nefungovala.
- **Podpis.** Tah válečku. V úvodu váleček při načtení „natře“ slovo *zůstává* (pás barvy s nerovnými okraji a stopami po návleku, váleček jede na čele a odjede). Stejný tah pak podtrhuje klíčová slova nadpisů, jméno v patičce a číslo 404.
- **Jedna živá věc.** Posuvník **Před / Po**: šest zakázek, kde jsou fotky před a po ze stejného místa (vybrané porovnáním záběrů skriptem a kontrolou očima). Táhne se myší i prstem, ovládá klávesnicí, při prvním zobrazení se předěl sám krátce pohne.
- **Barvy z realizací.** Antracit #1f1c18 (hero, postup, cena, patička), okrová značky #8b6627 a pole #7d5b22 (pás technik, poptávka), zlatá „z kbelíku“ #d9a54a (tah válečku, tlačítka na tmavém), terakota #8f3f22 z fasády v České (blok Před a po), šalvěj #d9dfd0 ze stěny cukrárny ve Střelicích (služby, o službě), omítka #f1ece2 a páska #e9dcae. Světlá a tmavá pole se střídají; okraje některých sekcí jsou odtržené jako páska. Kontrast textu všude ≥ 4,5 : 1 (spočteno, viz tokeny v `assets/site.css`).
- **Písmo.** Bricolage Grotesque (Google Fonts, OFL) v zúžené šířce 75–85 % a tučnosti 700–800 pro nadpisy v obřím měřítku – má charakter ručně malovaného nápisu, což sedí k firmě, která dělá i písmomalířství. Text zůstává v Instrument Sans jako ve v2.
- **Textury.** Skutečné výřezy z fotek realizací (`img/tx-*.webp`): omítka ze Starého Brna jako jemné zrno světlých sekcí, zelená stěrka z Kunzovy jako podklad šalvějových, a při najetí na skupinu služeb se ukáže materiál té skupiny (zlatá stěrka, omítka, hrubá stěrka z Kupařovic, dřevo pergoly z Adamova, betonová stěrka). Nic není generované.

## Co je nové oproti v2

1. **Hero:** tmavé pole, nadpis „Práce, která / zůstává“ v obřím zúženém písmu; druhý řádek natře váleček. Pod ním pás šesti velkých fotek přes celou šířku, každá se „natře“ zdola a nese místo na pásce; na desktopu pás při posunu stránky ujíždí doleva, na telefonu se posouvá prstem. Místo mozaiky v2.
2. **Čísla s pohybem:** 5,0 / 5, 29 recenzí a 15 let se při zobrazení dopočítají (dvakrát v úvodu, v postupu i v recenzích).
3. **Pás technik:** okrový běžící řádek (Betonová stěrka, Marmorino, Travertino, Benátský štuk, Mikrocement, Limewash…), jen názvy ze živého webu; najetím se zastaví.
4. **Realizace jako koláž:** 11 kategorií ve velkých fotkách různých formátů, název na pásce, počet zakázek a fotek pod ní; fotky se při posunu „natírají“ (clip-path).
5. **Před a po jako posuvník** na terakotovém poli (úvod) a u pěti služeb, které takovou dvojici mají.
6. **Služby na šalvěji:** při najetí se pod skupinou ukáže skutečná textura materiálu; seznam služeb se při najetí obarví do antracitu.
7. **Recenze:** jedna velká citace („Rychlé jednání… Jsou to Mistři 🙂“, Pavel Poneš) na tmavém poli, ostatní ve sloupcích jako lístky; hvězdy jen jednou v souhrnu.
8. **Hmota a detail:** magnetická hlavní tlačítka (kousek se přitáhnou k ukazateli, pružně se vrátí), místa působnosti jako natočené pásky, kroky postupu spojené čarou, která se dokreslí, velké jméno „Tři Mistři“ v patičce s tahem válečku, odtržené okraje sekcí.
9. **Služby:** hero rozdělený na tmavý text a fotku do kraje okna (odkryje se zleva), panel „Co kontrolujeme…“ na zlaté ploše u služeb bez fotky, cena na antracitu s kartou „Jak získat cenu“.

## Co bylo z jednotlivých skillů použito

**design-taste-frontend.** Skripty `draw/inspect/lint` lokálně nejsou, jejich práce byla udělána ručně podle skillu: inventář předmětu (místa zakázek, štítky Před/Po, materiály, 15 let, písmomalířství) → nápad „místo na pásce“; zásada z úvodu skillu o „tenké stránce“: odebrat ozdoby nestačí, prázdné místo se plní **měřítkem** (obří nadpis), **celými barevnými poli**, **skutečnými fotkami** (pás v hero, koláž, posuvník) a plným obsahem každé sekce. Dál: jeden dominantní obraz místo mnoha malých, sousední sekce s různou kompozicí (rozdělená / koláž / posuvník / seznam / fotka + kroky / citace / formulář), patička jako navržené zakončení se jménem přes celou šířku, vrstva pohybu (podpisový pohyb, vstupy po částech s odstupem 70–90 ms, odezva na všech ovládacích prvcích, jeden pohyblivý obraz = ujíždějící pás), kontrola na snímcích podle `references/critique.md`.

**tasteskill.** Číselníky: variabilita vysoká (asymetrický hero, koláž, natočené pásky), pohyb střední až vyšší s jedním výrazným momentem (váleček), hustota vyšší (hodně fotek). Systém tokenů pro barvy, písmo, rozestupy a stavy; jeden zapamatovatelný detail z předmětu (váleček a páska); jen skutečný obsah.

**emil-design-eng.** Vlastní křivky `cubic-bezier(.23,1,.32,1)` pro vstupy, `(.65,0,.35,1)` pro natírání a jízdu válečku, nikde ease-in; stisk tlačítek `scale(.97)` za 140 ms; hover jen na `(hover: hover) and (pointer: fine)`; posuvník Před/Po přes `clip-path: inset()` s pointer capture a rozlišením svislého tahu (posun stránky) od vodorovného (posuvník); odkrývání fotek přes `clip-path`; magnetická tlačítka s dotahováním (lerp), ne skokově; počítadla s ease-out a tabulkovými číslicemi; modální okna z `scale(.97)` přes `@starting-style`; lightbox s tahem prstem podle rychlosti; dlouhé animace jen u věcí, které uživatel vidí jednou (úvod), UI přechody do 300 ms; `prefers-reduced-motion` nechá obsah a zruší cestu (nadpis je hned natřený, váleček se neukáže, pás technik stojí a zalomí se, fotky bez ořezu, pás fotek bez posunu).

**impeccable.** Spouštěč `scripts/impeccable` ve skillu chybí, kontext byl načten ručně. Režim *Persuade* (úvod, služby), *Read* (ochrana údajů). Redesign zachovává obsah, funkce a pravdu o produktu, mění vizuální svět (v2 sloužila jako anti-reference). Spodní hranice řemesla (`reference/craft-floor.md`): kontrast, nastylované povrchy prohlížeče (výběr textu, kurzor, posuvník, focus ring ve zlaté), žádný barevný `border-left` (kroky ceny mají malovanou značku), hvězdy jako vlastní SVG místo znaků, žádné kickery nad nadpisy (stavové řádky „Poptávka odeslána“, „GDPR / osobní údaje“ jsou pod nadpisem, „Stránka nenalezena“ je páska u čísla 404), žádný gradient, sklo ani tvrdé stíny.

**frontend-design.** Návrh vychází ze skutečné struktury a obsahu, výsledek posouzen ve skutečném vykreslení na 1920, 1440 a 390 px; co nebylo ověřeno, je níže.

**verification-before-completion.** Tvrzení v INVENTAR.md vycházejí z čerstvého běhu po poslední změně: `coverage.mjs` (texty živého webu), `qa.mjs` (18 stránek × 3 šířky, přetečení, obrázky, konzole, H1, odkazy, objem prvního načtení a interakce včetně posuvníku, počítadel a omezeného pohybu), `hero-frames.mjs` (snímky animace).

**Odchylky od domovních pravidel taste skillu, záměrně podle zadání („brief wins“):** klíčové slovo nadpisu je podtržené tahem válečku (pravidlo „no styled accent word“), obří nadpis přes 6rem, terakota jako barva pole (pravidlo proti asistentské paletě – tady ale jako celé pole z fasády realizace, ne krémový podklad s rezavým akcentem), natočené pásky jako popisky. Unslop pravidla platí dál proti slopu: žádné AI záře, přechody, sklo, emoji v rozhraní ani číslování sekcí.

## Stránky a soubory

Stejné jako ve v2: `index.html`, 14 služeb, `dekujeme.html`, `ochrana-osobnich-udaju.html`, `404.html`. Všechny mají `noindex, nofollow` a relativní cesty. Žádný odkaz nevede na trimistri.cz, žádné stránky /galerie ani /sluzby, telefon je všude jen +420 774 927 182.

- `assets/site.css`, `assets/site.js` – styly a skript bez knihoven.
- `img/` – fotky z v2 (náhled `-t` do 720 px, plné `-f` do 2048 px, WebP) a nové `tx-*.webp` (výřezy textur z fotek realizací, 4–108 kB).
- `snimky/` – první obrazovky a celé stránky úvodu a služby Malování (1440 a 390) a tři snímky animace úvodu na 1440 (300, 950 a 1650 ms).

## K ověření a omezení

- Platí vše z v2: formulář jen připraví e-mail (při převodu napojit na `send.php`), cookies se jen zapamatují, recenze a realizace jsou statický záznam z 23. 11. 2026, počty zakázek a fotek u kategorií jsou spočtené z dat.
- **Dvojice Před/Po** jsou vybrané tak, aby šlo o stejné místo, ale nejde o fotky ze stativu; záběry se mírně liší. Výběr ať potvrdí majitel. Dvě dvojice z v2 (cukrárna Střelice, fasáda Rozdrojovice) do posuvníku nešly, protože jsou z jiného úhlu; jejich fotky na webu zůstávají.
- **Velká citace** je doslovná recenze Pavla Poneše; volba je designová, ať ji majitel potvrdí.
- Písma Bricolage Grotesque a Instrument Sans se načítají z Google Fonts; pro produkci je stačí hostovat lokálně.
- Výkon byl měřen jako objem prvního načtení v Playwrightu (úvod kolem 1,1 MB včetně písem, ostatní fotky se načítají líně). Core Web Vitals na skutečném zařízení měřené nebyly.
- Kurzor-štětec (volitelný nápad) nebyl použit: k tahu válečku a pásce by přidal třetí motiv a na dotykových zařízeních nemá smysl.
- Na snímcích celé stránky na mobilu je lišta „Zavolat / Nezávazná poptávka“ zachycená uprostřed stránky. Je to artefakt snímku, v prohlížeči je lišta přichycená dole.

## Sestavení a kontrola

```bash
node _build/build.mjs                       # vygeneruje všech 18 stránek z _build/data/
# kontrola (lokální server nad složkou navrhy/, Playwright z ~/Projects/prezentace):
node _build/tools/coverage.mjs <složka s texty živého webu> http://127.0.0.1:8765/redesign-v3-2026-11-23/ _build/data/pokryti-v3.json
node _build/tools/qa.mjs http://127.0.0.1:8765/redesign-v3-2026-11-23/ _build/data/qa.json snimky
node _build/tools/hero-frames.mjs http://127.0.0.1:8765/redesign-v3-2026-11-23/ snimky
node _build/tools/inventar.mjs              # přegeneruje INVENTAR.md z dat a výsledků kontrol
```

## Kredit

Postup a pravidla mimo jiné **unslop by [@heydamir](https://x.com/heydamir)** (Damir Sokolovsky, [heydamir.design/unslop](https://heydamir.design/unslop)), licence [CC BY 4.0](https://creativecommons.org/licenses/by/4.0/). Písma Bricolage Grotesque a Instrument Sans: SIL Open Font License. Fotografie, značka a texty patří firmě Tři Mistři s.r.o.
