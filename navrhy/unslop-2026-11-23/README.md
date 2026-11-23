# Návrh 23. 11. 2026: unslop

Samostatný návrh webu Tři Mistři, který vznikl postupem **unslop** (devět passů od rozestupů po pohyb). Návrh vychází ze živého webu trimistri.cz ke dni 23. 11. 2026. Zachovává sekce a jejich pořadí, texty, fakta, logo a skutečné fotky realizací. Nové jsou vzhled, typografie, rozvržení a pár zkrácených nebo sloučených textů. Ostatní návrhy v repozitáři zůstaly beze změny.

- `index.html` – úvod
- `dekoracni-sterky.html` – Betonové a dekorativní stěrky
- `natery-interieru.html` – Malování bytů a interiérů
- `styles.css`, `main.js` – společné styly a skripty (menu, předvyplnění služby, poptávka)
- `img/` – fotky realizací stažené ze živého webu a z app.trimistri.cz (zmenšené, WebP)

Stránky mají `noindex` a všechny cesty jsou relativní, takže fungují i pod `/trimistri-navrh/` na GitHub Pages. Jde o návrh v kódu, který lze předat tomu, kdo spravuje skutečný PHP web.

## Audit: nalezené znaky slopu

Živý web nebyl „těžký slop“, ale znaků bylo dost napříč typografií, barvou, textem i komponentami, a proto proběhly všechny passy. Barvu značky a logo jsme zachovali.

| Znak | Kde |
| --- | --- |
| Verzálky s širokým prostrkáním | hero („MALÍŘSTVÍ · NÁTĚRY · POVRCHY“, „MALÍŘI V BRNĚ…“), nadpisky sekcí („NAŠE REALIZACE“, „JAK PRACUJEME“), patička („CO PRO VÁS UDĚLÁME“), formulář („VÁŠ PROSTOR. NAŠE ŘEMESLO.“), služby („TŘI MISTŘI / BRNO A OKOLÍ“, „CENA STĚRKY“) |
| Číslované nadpisky 01–05 jako ozdoba | všechny sekce úvodu, na službách „01 / O SLUŽBĚ“, „02 / NEZÁVAZNÁ POPTÁVKA“ |
| Zlatě obarvené slovo v nadpisu | „zůstává.“, „vidět.“, „v Brně“, „domluvy.“, „co potřebujete.“, „domluvit.“; přízvuk tak byl skoro všude a nic nevyčnívalo |
| Tečka za nadpisy | „Práce, která zůstává.“, „Betonové a dekorativní stěrky v Brně.“, „Podívejte se na výsledek.“ |
| Velmi tučné nadpisy (700+) | hero a všechny H2 |
| Dvě nadpiskové řádky nad sebou | hero (oborový nadpisek a „Malíři v Brně…“) |
| Dekorativní svislá lišta „TM / BRNO · CZ“ | pravý okraj hero |
| Šipka ↗ u každého odkazu a tlačítka | navigace, karty realizací, seznam služeb, patička |
| Ikonové čipy v barevném kolečku | karty skupin služeb |
| Odznak „15 let“ v posunutém zlatém rámu | sekce Postup |
| Hvězdičky ★★★★★ na každé kartě, vlastní „Google“ odznak | recenze, hero, hero služeb |
| Nekonečný pás recenzí, který jezdí dokola, s duplikovanými kartami a vyblednutými okraji | sekce Recenze |
| Zdvojený úvod formuláře („Řekněte nám, co potřebujete.“ a vedle tmavý panel „Pár detailů. A začneme.“), telefon a e-mail dvakrát vedle sebe | sekce Kontakt, na službách navíc „Pojďme se domluvit.“ |
| Plovoucí bílé štítky přes spodní hranu fotek („Ukázky realizací / Dekorativní stěrky“) | galerie realizací |
| Nadpisové pilulky technik (Betonová stěrka, Marmorino…) | skupina Dekorativní stěrky |
| Přechod v logu (tři sloupky z gradientu zlatá→hnědá) | logo v hlavičce |
| Tmavý blok „Nejste si jistí…“ jako další výrazný prvek | konec sekce Služby |
| Mozaika šesti fotek pod tmavým překryvem, text přes fotky | hero |

## Směr

- **Product.** Malířská a natěračská firma z Brna: malování bytů, dekorativní stěrky, nátěry fasád, dřeva a kovů pro domácnosti a firmy v Brně a okolí.
- **Character.** Pečliví, věcní, hrdí na řemeslo.
- **World.** Rozdělaná stěna: omítka, stěrka, papírová malířská páska, denní světlo na čerstvém povrchu. Z toho teplá „omítková“ rampa neutrálů a zlatá okrová značky jako jediný přízvuk.
- **Moments.** (1) Hero jako dvojice „celek a detail“: ordinace ve Zlíně a zblízka stěrka se zlatými akcenty, obojí jejich skutečná práce. (2) Galerie realizací, kde barvu nesou fotky a ne rozhraní.
- **Signature.** Popisek místa na kousku malířské pásky (mono písmo, mírně pootočený, natrhané konce) – jen tam, kde fotka nese místo realizace.

## Co se změnilo po passech

1. **Rozestupy.** Vše na mřížce 4 px. Sekce 112 px (mobil 72 px), skupiny 24–48 px, stejné karty mají stejné rozměry. Obsah v kontejneru max. 1440 px s okrajem 32 px (mobil 16 px).
2. **Barva.** Jedna teplá rampa (pozadí #f5f1ea, karta #fcfaf6, zvýšená plocha #ece6db, linky 10 % textu), tři role textu. Přízvuk #8b6627 (tmavá zlatá značky, bílý text má kontrast přes 4,5 : 1) jen na hlavní tlačítka, čísla kroků a odkazy. Logo bez gradientu, plná zlatá #b98b38. Žádné tmavé překryvy přes fotky.
3. **Ikony.** Jedna sada (tvar lucide), 18 px, tah 1,5, barva sekundárního textu. Ikonové čipy a šipky ↗ u všeho pryč, šipka zůstala jen v seznamech služeb, hlavních tlačítkách a dvou odkazech patičky.
4. **Text.** Nadpisy bez teček a bez obarvených slov. Sloučený úvod kontaktu (jeden nadpis, jeden odstavec, jedno místo s telefonem). Nadpisky v běžné větě. Všechna fakta (5,0 z 5, 29 recenzí, přes 15 let praxe, 24 hodin, do 20 km, IČO, adresa) beze změny. Recenze doslova včetně emoji – jsou to citace zákazníků, ne rozhraní.
5. **Typografie.** Instrument Sans (400/500/600) místo Inter, IBM Plex Mono jen na pásku a počty fotek. Hierarchie velikostí: hero 72/42 px, H2 44/32 px, tělo 16 px. Žádné verzálky, žádné tučné 700+.
6. **Rozvržení.** Hero jako asymetrický split (text vlevo, dvojice fotek vpravo) místo textu přes mozaiku. Služby: nadpis a rychlý výběr vlevo (sticky), skupiny jako řádky s odkazy vpravo. Recenze: statická mřížka 9 recenzí + rozbalení dalších 20 místo jezdícího pásu. Kontakt: vlevo přímý kontakt, vpravo formulář.
7. **Detaily.** Poloměry 8 (ovládací prvky) / 12 (fotky, karty) / 16 (panely). Viditelný focus. Kroky postupu číslované mono číslicí v jedné ose. FAQ s plus, které se otočí na křížek.
8. **Vizuály.** Jen skutečné fotky z webu, žádné generované obrázky. Hero „celek a detail“, fotky realizací bez plovoucích štítků, popisky pod fotkou.
9. **Pohyb.** Jediný vstup (fade + posun 8 px, stagger 60 ms) v hero, jedna křivka `cubic-bezier(0.22, 1, 0.36, 1)`. Hover jen barva nebo mírný zoom fotky 1,02. Žádné smyčky, žádný jezdící pás. Respektuje `prefers-reduced-motion`.

## Placeholder a k ověření

- **Formulář** nemá serverovou část: po odeslání připraví e-mail na info@trimistri.cz v aplikaci návštěvníka a fotky je nutné přiložit ručně. Živý web má PHP odeslání s nahráním fotek – při převodu napojit na něj.
- **Odkazy na ostatní služby** (tapetování, fasády, mikrocement…) vedou na živé stránky trimistri.cz. V návrhu jsou jen úvod a dvě služby.
- **Karty ukázek na službách** otevírají první fotku realizace z app.trimistri.cz (jako živý web). Lightbox galerie v návrhu není.
- **Odkaz „Starší realizace →“** ze stránky stěrek vynechán (vedl do archivu galerie, podstránky /galerie nepoužíváme).
- **Cookie lišta** a měření nejsou součástí návrhu.
- **Fotka v hero služby Malování** je ze živého webu jen ve 700 px; pro ostrý desktop doplnit větší originál.
- **Recenze** jsou statický záznam z živého webu k 23. 11. 2026 (stáří „včera“, „před 3 dny“ se časem posune). Přiřazení jmen k textům odpovídá živému webu – u dvou recenzí (Vít Starý Novotný, Radika C) gramatický rod textu nesedí ke jménu, stojí za kontrolu přímo v Google profilu.
- Telefon je všude jen +420 774 927 182.

## Kredit

Postup a pravidla: **unslop by [@heydamir](https://x.com/heydamir)** (Damir Sokolovsky, [heydamir.design/unslop](https://heydamir.design/unslop)), licence [CC BY 4.0](https://creativecommons.org/licenses/by/4.0/).
