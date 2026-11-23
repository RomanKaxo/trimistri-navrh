# Inventář živého webu trimistri.cz a jeho pokrytí v návrhu v2

Stav živého webu: 23. 11. 2026, staženo z https://trimistri.cz (vykreslené HTML přes Playwright) a porovnáno se zdrojem `~/work/trimistri-web` (jen čtení). Data jsou v `_build/data/` (`content.json`, `galleries.json`), takže inventář i stránky vznikají ze stejného zdroje.

Značka `[x]` = položka je v návrhu v2 (ověřeno skriptem `_build/tools/coverage.mjs`: každý textový řádek živé stránky se hledá v textu nové stránky). Kde je obsah záměrně převeden do jiné formy, je to uvedeno u položky.

## Společné prvky (všechny stránky)

- [x] Odkaz „Přeskočit na obsah“
- [x] Logo: tři sloupky + „Tři Mistři“ + „Malby · nátěry · povrchy“ (bez přechodu v logu, plná zlatá)
- [x] Menu: Úvod, Realizace, Služby, Postup, Recenze, Kontakt (= sekce na úvodu, žádné stránky /galerie ani /sluzby)
- [x] Telefon v hlavičce „Zavolat +420 774 927 182“ (jediné číslo na celém webu) a tlačítko „Nezávazná poptávka“
- [x] Mobilní menu (tlačítko Menu/Zavřít, Esc zavírá, odkaz zavírá)
- [x] Plovoucí lišta na mobilu: „Zavolat“ + „Nezávazná poptávka“ (úvod) / „Nezávazně poptat“ (služby); nad formulářem se schová
- [x] Patička: „Tři Mistři“, „Malby, nátěry a povrchy. Od první domluvy po poslední detail.“, „Probrat váš projekt“
- [x] Patička – Co pro vás uděláme: Malování interiérů, Dekorativní stěrky, Tapetování, Dřevo a kov, Fasády, Čištění fasád, Všechny služby
- [x] Patička – Prohlédněte si: Naše realizace, Jak pracujeme, Recenze zákazníků, Kontakt
- [x] Patička – Ozvěte se nám: +420 774 927 182, info@trimistri.cz, Tři Mistři s.r.o. · IČO 30139015, Nové sady 988/2, 602 00 Brno, Brno · Blansko · Olomouc · Zlín a okolí
- [x] Patička: © 2026 Tři Mistři, Ochrana osobních údajů, Nastavení cookies, Zpět na začátek ↑
- [x] Panel cookies: „Cookies pro měření a reklamu“, text, „Více informací“, Odmítnout / Povolit (v návrhu nic neměří, jen si pamatuje volbu)
- [x] Kredit „unslop by @heydamir“ (CC BY 4.0) v patičce a v README

## Úvod (`index.html`)

- [x] Title: „Malířské práce Brno | Malby, stěrky a nátěry | Tři Mistři“, description
- [x] Hero: „Malířství · nátěry · povrchy“, „Brno a okolí“, H1 „Malíři v Brně a dekorativní stěrky / Práce, která zůstává“, „Pečlivá příprava, jistá ruka a výsledek, který obstojí v každodenním životě.“
- [x] Hero: tlačítka „Nezávazně poptat“ a „Prohlédnout realizace“; hodnocení „5,0 / 5 z 29 recenzí zákazníků na Googlu“ (odkaz na Google); „Náš tým má přes 15 let praxe v oboru“; „Tři Mistři — řemeslo v detailu“
- [x] Hero mozaika – fotka „Dekorativní stěrka se zlatými akcenty, Brno“ (plné rozlišení, otevře se v lightboxu)
- [x] Hero mozaika – fotka „Dekorativní stěrka v ordinaci, Zlín“ (plné rozlišení, otevře se v lightboxu)
- [x] Hero mozaika – fotka „Průmyslový nátěr schodiště, Opatovice“ (plné rozlišení, otevře se v lightboxu)
- [x] Hero mozaika – fotka „Renovace dveří, Příbram na Moravě“ (plné rozlišení, otevře se v lightboxu)
- [x] Hero mozaika – fotka „Výmalba cukrárny, Střelice“ (plné rozlišení, otevře se v lightboxu)
- [x] Hero mozaika – fotka „Nátěry a renovace fasád, Rozdrojovice“ (plné rozlišení, otevře se v lightboxu)
- [x] Dekorativní svislý štítek „TM / BRNO · CZ“ – vynechán záměrně (ozdoba bez informace, unslop/taste)
- [x] Realizace: „Řemeslo, které je vidět.“, „Každý prostor má svůj příběh. Prohlédněte si ty, na kterých jsme pracovali.“
- [x] Karta realizací „Dekorativní stěrky“ → dekoracni-sterky.html, fotka „Dekorativní stěrka - Zlín - Ortodoncie“, „Ukázky realizací“ (nově i počet zakázek a fotek z dat)
- [x] Karta realizací „Dřevo a kov“ → natery-drevo-kovu.html, fotka „Renovace dveří a oken“, „Ukázky realizací“ (nově i počet zakázek a fotek z dat)
- [x] Karta realizací „Fasády“ → natery-fasad.html, fotka „Nátěr fasády - Rozdrojovice Fasáda - po“, „Ukázky realizací“ (nově i počet zakázek a fotek z dat)
- [x] Karta realizací „Malování interiérů“ → natery-interieru.html, fotka „Výmalba Cukrárny“, „Ukázky realizací“ (nově i počet zakázek a fotek z dat)
- [x] Karta realizací „Písmomalířství“ → pismomalirstvi.html, fotka „Písmomalířství - Obec Vrbovec“, „Ukázky realizací“ (nově i počet zakázek a fotek z dat)
- [x] Karta realizací „Průmyslové nátěry“ → prumyslove-natery.html, fotka „Průmyslový nátěr 13 - Opatovice“, „Ukázky realizací“ (nově i počet zakázek a fotek z dat)
- [x] Karta realizací „Tapetování“ → tapetovani.html, fotka „Tapetování • Dětský pokoj“, „Ukázky realizací“ (nově i počet zakázek a fotek z dat)
- [x] Karta realizací „Speciální interiérové nátěry“ → specialni-natery.html, fotka „Renovace koupelny a wc“, „Ukázky realizací“ (nově i počet zakázek a fotek z dat)
- [x] Karta realizací „Sanace po zatékání“ → sanace-po-zatekani.html, fotka „Výmalba po zatečení“, „Ukázky realizací“ (nově i počet zakázek a fotek z dat)
- [x] Karta realizací „Čištění fasád a povrchů“ → cisteni-fasad.html, fotka „Čištění fasád“, „Ukázky realizací“ (nově i počet zakázek a fotek z dat)
- [x] Karta realizací „Odstranění graffiti“ → odstraneni-grafiti.html, fotka „Odstranění graffiti“, „Ukázky realizací“ (nově i počet zakázek a fotek z dat)
- [x] NOVĚ: blok „Před a po“ – 4 dvojice fotek označených na živém webu štítky Před/Po ze stejné zakázky (koupelna Rajhrad, dveře Příbram na Moravě, cukrárna Střelice, fasáda Rozdrojovice)
- [x] Služby: „Malířské a natěračské práce v Brně“, „Malování bytů a pokojů, dekorativní a betonové stěrky i nátěry. Pro domácnosti a firmy v Brně a okolí.“, „Interiér, fasáda, dřevo i kov.“, „Vyberte práci, kterou právě řešíte.“
- [x] Skupina Malování a interiéry – „Malby stěn a stropů, příprava podkladu a čisté dokončení.“: Malování bytů a interiérů, Tapetování, Speciální interiérové nátěry, Sanace po zatékání
- [x] Skupina Dekorativní stěrky – „Marmorino, betonové efekty, limewash a další dekorativní techniky.“ + techniky Betonová stěrka · Marmorino · Travertino · Benátský štuk · Mikrocement: Betonové a dekorativní stěrky, Mikrocement a stěrky přes obklady
- [x] Skupina Fasády, střechy, okapy a svody – „Příprava, opravy a ochranné fasádní nátěry.“: Nátěry a renovace fasád, Nátěry střech, okapů a svodů, Čištění fasád a povrchů, Odstranění graffiti
- [x] Skupina Nátěry dřeva a kovů – „Okna, dveře, podbití, pergoly, ploty i ocelové konstrukce.“: Nátěry oken, podbití, dřeva a kovů, Průmyslové a antikorozní nátěry
- [x] Skupina Další služby + „Naše realizace“: Epoxidové podlahy, Písmomalířství
- [x] Rychlý výběr „S čím vám pomůžeme?“ (Vyberte službu + 14 služeb ve skupinách), „Poptat službu“, „Vybranou službu vám rovnou předvyplníme do poptávky.“ – funguje, předvyplní formulář
- [x] „Nejste si jistí, co vaše zakázka potřebuje?“ + „Popište nám prostor nebo povrch a domluvíme další postup.“ + „Nezávazně poptat“
- [x] Postup: fotka „Dokončená výmalba kuchyně — Brno, Bohunice“, „15 let / Náš tým má přes 15 let praxe v oboru“, „V klidu. Od první domluvy.“, úvodní odstavec
- [x] Krok „Probereme vaši představu“ – „Pošlete místo, přibližný rozsah a ideálně fotografie. Upřesníme zadání a stav povrchu.“
- [x] Krok „Domluvíme řešení i cenu“ – „Vybereme vhodný postup a materiály. Předem si potvrdíme rozsah, kalkulaci a termín.“
- [x] Krok „Připravíme, provedeme, předáme“ – „Ochráníme okolí, připravíme podklad a dokončíme povrch. Hotovou práci s vámi projdeme.“
- [x] Postup: „Nezávazně poptat“, „Zavolat a probrat zadání“
- [x] Recenze: „Co o nás říkají klienti“, souhrn „Google 5,0 / 5 z 29 recenzí zákazníků“, „Zobrazit všech 29 recenzí“ (Google)
- [x] Recenze – Jaroslav Hloušek (včera): „Naprostá spokojenost!…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Jiři Komínková (před 3 dny, Hodnocení ceny: Rozumná cena): „Moc rádi doporučujeme Honzu a Davida! 😊 Dělali nám doma vým…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Oksana Fialova (před 5 dny, Hodnocení ceny: Rozumná cena): „S realizací betonové stěrky na našem krbu jsme maximálně spo…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Dávid Mikletič (před týdnem, Hodnocení ceny: Skvělá cena): „Výborná práce a skvělá komunikace.…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Libor Znebejanek (před týdnem, Hodnocení ceny: Rozumná cena): „Perfektní rychlost domluvy i samotné realizace výmalby. Byt …“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Vlasta Zitnanska (před týdnem): „Firmu mohu doporučit. Jsou to příjemní, pečliví a spolehliví…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – nicolas (před 4 týdny, Hodnocení ceny: Rozumná cena): „Skvělá zkušenost s touto firmou při realizaci dekoračních st…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Jan Mazuch (před 3 měsíci): „Velice spolehlivý a šikovní kluci, kteří odvádí skvělou prác…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Petr Jelinek (před 3 měsíci): „S pány mám skvělou zkušenost. Krásně nám v rámci rekonstrukc…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Michaela Němcová Novotná (před 3 měsíci): „Musím chlapy pochválit, malovali nám celý dům a na část děla…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Martin Kudrmáček (před 3 měsíci): „Rád bych touto cestou poděkoval za dlouhodobě skvělé služby.…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Lenka Kratka (před 3 měsíci): „Skvělá spolupráce od začátku do konce. Rychlá a bezproblémov…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Dana Baláčová (před 2 měsíci): „Výborná zkušenost a spolupráce. Kvalitně a precizně odvedená…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Jitka Dobrovolná (před 3 měsíci): „Skvěle odvedená práce, výborná komunikace, spolehlivost. Pro…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Pavel Nykl (před 2 měsíci): „Perfektni prace 👍 doporucuji…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Pavel Poneš (před měsícem): „Rychlé jednání, příjemné vystupování a skvěle odvedená práce…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Michal Binka (před 2 týdny): „Vše proběhlo podle dohody, kvalitní práce, velmi pohodová pa…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Anna S. (před 3 měsíci): „Profesně i lidsky skvěle odvedená práce. Všechno perfektní. …“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Raluk007 (před 3 měsíci): „S touto firmou máme jen ty nejlepší zkušenosti. Nejprve nám …“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Radim Matela (před 3 měsíci): „Výborná a čistá práce, absolutní spokojenost.…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Bronislav Hýbl (před 2 měsíci): „Zakázka zahrnovala umytí a následný nátěr fasády RD. Pánové …“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Kryštof Jeřábek (před 2 měsíci): „S panem Honzou jsem byl velmi spokojený. Dostal jsem na něj …“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Richard Dvořáček (před 2 měsíci): „Kvalitní provedení vyborná domluva.👍…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – David Sudak (před 2 měsíci): „Velice spokojení.Pánové byli moc šikovní..…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Iva Košíková (před 3 měsíci): „Moc děkujeme za spolupráci velmi spokojeni…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Lenka Melnikova (před měsícem): „Spolehliví, rychle a kvalitně odvedená práce.👍…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Veronika Plavcová (před měsícem): „Chceme moc poděkovat za skvělou práci! Rychlost, výborná dom…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Vít Starý Novotný (před měsícem): „Potřeboval jsem zapravit otvory v sádrokartonu a vymalovat k…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] Recenze – Radika C (před měsícem): „Tři Mistry můžu opravdu doporučit. Už od prvního kontaktu js…“ – doslovně, „Recenze na Google“, 5 z 5
- [x] „Číst celou recenzi“ – dlouhé recenze se zkrátí a otevřou v dialogu (jako živý web); místo jezdícího pásu mřížka 9 + „Zobrazit dalších 20 recenzí“
- [x] Kontakt: „Řekněte nám, co potřebujete.“, „Malování bytu, stěrka nebo nový nátěr? …“, „Raději se domluvíte přímo?“, telefon, e-mail, „Brno a okolí · domácnosti i firmy“

## Poptávkový formulář (úvod i všechny služby)

- [x] „Nezávazná poptávka“ / „Řekněte nám, co potřebujete“, „Stručně popište práci a případně přiložte fotky. Ozveme se vám do 24 hodin.“
- [x] „Raději přímo?“ telefon + e-mail
- [x] Boční panel: „Váš prostor. Naše řemeslo.“, „Pár detailů. A začneme.“, „Pošlete nám zadání. Rozsah práce, cenu i termín spolu upřesníme.“, „Co budeme řešit“ (mění se podle služby), „Raději se domluvíte přímo?“, „Brno a okolí“
- [x] Skryté pole proti robotům „Nevyplňujte toto pole“
- [x] „Kontaktní údaje“, „* povinné údaje“
- [x] Jméno a příjmení * (Jan Novák)
- [x] Telefon * (Váš telefon)
- [x] E-mail (nepovinné) (vas@email.cz)
- [x] Typ služby (nepovinné): „Nevím / jiná služba“ + 5 skupin a 14 služeb, na službě předvyplněná
- [x] Město / obec realizace (nepovinné) (Např. Brno)
- [x] „Detaily zakázky“, Popis zakázky + nápověda „Popište rozsah prací a požadovaný termín.“
- [x] Nápověda k popisu podle služby – všech 14 textů ze živého webu, mění se při změně služby
- [x] Fotky prostoru nebo fasády (nepovinné): „Přidat fotografie“, „JPG, PNG nebo WebP · až 5 fotek“, „Můžete nahrát maximálně 5 fotek, každou do 4 MB. …“ – kontrola počtu, velikosti a typu, náhledy s odebráním, přetažení
- [x] „Odeslat poptávku“ + „Odesláním formuláře potvrzujete … zpracováním osobních údajů … Údaje použijeme pouze pro vyřízení Vaší poptávky.“
- [x] Ověření v prohlížeči (souhrn chyb, chyba u pole, aria-invalid); odeslání připraví e-mail (mailto) – nic se neodesílá na server

## Malování bytů a interiérů (`natery-interieru.html`)

- [x] Title „Malíř Brno – malování bytů, uklidíme po sobě | Tři Mistři“, description
- [x] Drobečková navigace: Úvod / Služby / Malování bytů a interiérů
- [x] Nadpisek „Tři Mistři / Brno a okolí“ – převeden: informace je v drobečkové navigaci a v H1 („v Brně“); nadpisky nad nadpisy jsou podle taste/impeccable zakázané
- [x] H1 „Malíř v Brně: malování bytů a pokojů.“ (bez koncové tečky)
- [x] Úvod „Malíř, po kterém nemusíte uklízet. Vymalujeme byt, dům i kancelář v domluvený termín. Přijdou pokaždé stejní lidé, nábytek a podlahy zakryjeme a předáme vám čistý byt.“
- [x] Tlačítko „Chci cenu malování“ + telefon +420 774 927 182
- [x] „Pošlete fotky místností a do 24 hodin se vám ozveme. Nacenění je zdarma a nezávazné. Termín, který domluvíme, dodržíme.“
- [x] „5,0 / 5 · 29 recenzí na Google“ (odkaz) a „Náš tým má přes 15 let praxe v oboru“
- [x] Titulní fotka „Nátěr interiéru 25 - Brno - Bohunice“ s popiskem „Z naší práce · Brno - Bohunice“ – originál v plném rozlišení, lightbox
- [x] Skoková navigace: O službě, Ukázky, Postup, Otázky, Cena, Poptávka
- [x] Ukázky realizací: „Podívejte se na výsledek.“; 11 zakázek, 197 fotek – všechny staženy (náhled 720 px + plné rozlišení až 2048 px)
- [x] Realizace „Výmalba Bytu“ – Rajhrad – 20 fotek (štítky Po, Před)
- [x] Realizace „Výmalba Pokoje“ – Brno · Obřany – 4 fotek (štítky Po, Před)
- [x] Realizace „Výmalba RD“ – Valašské Klobouky – 25 fotek (štítky Po, Před, Detail)
- [x] Realizace „Výmalba Pokoje“ – Brno · Medlánky – 18 fotek (štítky Po, Před)
- [x] Realizace „Výmalba Cukrárny“ – Střelice – 24 fotek (štítky Po, Před, Průběh, Detail)
- [x] Realizace „Výmalba laboratoře“ – Brno · Královo Pole – 13 fotek (štítky Před, Po)
- [x] Realizace „Nátěr interiéru“ – Brno - Bohunice – 25 fotek (štítky Po, Před, Průběh)
- [x] Realizace „Renovace interiéru“ – Brno - Řečkovice – 22 fotek (štítky Před, Průběh, Po)
- [x] Realizace „Renovace interiéru“ – Brno - Herčíkova - Ordinace – 17 fotek (štítky Před, Průběh, Po)
- [x] Realizace „Výmalba bytů“ – Brno · Modřice – 15 fotek (štítky Po, Průběh, Před)
- [x] Realizace „Výmalba bytu“ – Brno · Královo Pole – 14 fotek (štítky Po, Průběh, Před)
- [x] „Zobrazit další realizace“ – rozbalí zbytek
- [x] „Prohlédnout realizaci ↗“ – nahrazeno klikem na fotku (aria-label „Otevřít realizaci …“) a počtem fotek na fotce
- [x] Lightbox: všechny fotky zakázky, štítek Před/Po/Průběh/Detail, místo, „Fotka n / N“, šipky, klávesnice, tah prstem, náhledy
- [x] NOVĚ: přepínač „Před / Po“ na kartách, kde zakázka má obojí
- [x] O službě: „Proč si lidé vybírají Tři Mistry“ + „Malování by mělo být starost na pár dní, ne na pár týdnů. Proto držíme termíny, posíláme pořád stejnou partu a po sobě uklidíme tak, abyste mohli večer normálně bydlet.“
- [x] Výhoda „Termín, který platí“ – „Den nástupu i dokončení domluvíme předem a dodržíme ho. Nemusíte si brát dovolenou navíc.“
- [x] Výhoda „Pokaždé stejní lidé“ – „Kdo si s vámi práci domluví, ten ji i udělá. Žádné střídání part ani subdodavatelé.“
- [x] Výhoda „Čistý byt po práci“ – „Zakryjeme nábytek a podlahy, opravíme praskliny a po malování uklidíme. Hotové místnosti spolu projdeme.“
- [x] „Jak probíhá realizace“
- [x] Krok 1 „Projdeme váš prostor“ – „Zajímá nás plocha, stav stěn, vybavení a představa o odstínu.“
- [x] Krok 2 „Zakryjeme a opravíme“ – „Ochráníme nábytek a podlahy, připravíme praskliny a nerovnosti.“
- [x] Krok 3 „Vymalujeme stěny a stropy“ – „Postup a počet vrstev přizpůsobíme podkladu a zvolené barvě.“
- [x] Krok 4 „Uklidíme a předáme“ – „Společně projdeme dokončené místnosti a detaily.“
- [x] „Cena malování a časté otázky“ (první otázka otevřená)
- [x] Otázka „Kolik stojí malování bytu?“ – „Cena malování za m² závisí na stavu stěn, potřebných opravách, počtu vrstev, výšce stropů a zvolené barvě. Celkovou cenu určuje plocha stěn a stropů. Pošlete fotografie a přibližné rozměry místností a připravíme nezávaznou cenu podle konkrétního rozsahu.“
- [x] Otázka „Jak rychle se dozvím cenu?“ – „Stačí poslat fotky místností a přibližné rozměry přes formulář nebo zavolat. U větších zakázek se přijedeme podívat a cenu potvrdíme po prohlídce.“
- [x] Otázka „Jak dlouho malování bytu trvá?“ – „Záleží na velikosti bytu a stavu stěn. Pokoj obvykle zvládneme během jednoho dne, u celého bytu termín a délku práce domluvíme předem.“
- [x] Otázka „Musíme před malováním vyklidit celý byt?“ – „Ne. Nábytek a podlahy zakryjeme podle prostoru a přístupu ke stěnám. Rozsah domluvíme předem.“
- [x] Otázka „Opravíte praskliny a díry ve stěnách?“ – „Ano. Před malováním opravíme praskliny, díry po hmoždinkách a nerovnosti, aby výsledek vydržel.“
- [x] Otázka „Kde malujete?“ – „Malujeme v celém Brně a okolí do zhruba 20 km, například v Modřicích, Šlapanicích, Kuřimi, Rosicích nebo Slavkově u Brna.“
- [x] Otázka „Malujete i kanceláře a provozovny?“ – „Ano. Rozsah a termín probereme s ohledem na provoz, aby práce co nejméně omezila váš chod.“
- [x] Cena: „Kolik stojí malování bytu v Brně?“ – „Každý byt je jiný, proto cenu počítáme podle skutečného rozsahu. Zakrytí, opravy i úklid jsou v ceně, kterou vám předem potvrdíme. Žádné skryté položky.“ (nadpisek „Cena malování“ je obsažen v nadpisu)
- [x] Faktor ceny „Plocha stěn a stropů“ – „Kolik metrů čtverečních se maluje.“
- [x] Faktor ceny „Stav podkladu“ – „Praskliny, díry a nerovnosti, které je potřeba opravit.“
- [x] Faktor ceny „Počet vrstev“ – „Podle podkladu a toho, jak moc se mění odstín.“
- [x] Faktor ceny „Barva a výška stropů“ – „Zvolená barva a jak vysoko se pracuje.“
- [x] „Jak získat cenu“
- [x] Krok 1 „Pošlete fotky“ – „Stačí pár fotek a přibližné rozměry, přes formulář nebo telefon.“
- [x] Krok 2 „Ozveme se s cenou“ – „Připravíme nezávaznou cenu zdarma. U větší zakázky se přijedeme podívat.“
- [x] Krok 3 „Domluvíme termín“ – „Den nástupu i dokončení potvrdíme předem a dodržíme ho.“
- [x] „Chci nezávaznou cenu“ + „nebo zavolejte +420 774 927 182“
- [x] „Malíř pro Brno a okolí do 20 km“ (nadpisek „Kde pracujeme“ obsažen v nadpisu): Žabovřesky, Královo Pole, Líšeň, Bystrc, Bohunice, Židenice, Komín, Starý Lískovec, Střed, Modřice, Šlapanice, Kuřim, Rosice, Slavkov u Brna
- [x] Poptávka: „Pojďme se domluvit.“, „Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.“, „Pro první domluvu stačí: přibližná plocha místností, fotografie stěn a případných prasklin, představa o odstínu a termínu.“
- [x] Formulář s předvyplněnou službou „Malby interiéru“ a nápovědou „Uveďte přibližnou plochu stěn a stropů, stav podkladu a požadovaný termín. Bude prostor během malování obývaný?“
- [x] Mobilní lišta „Zavolat“ + „Nezávazně poptat“

## Tapetování (`tapetovani.html`)

- [x] Title „Tapetování a lepení tapet Brno | Tři Mistři“, description
- [x] Drobečková navigace: Úvod / Služby / Tapetování
- [x] Nadpisek „Tři Mistři / Brno a okolí“ – převeden: informace je v drobečkové navigaci a v H1 („v Brně“); nadpisky nad nadpisy jsou podle taste/impeccable zakázané
- [x] H1 „Tapetování a lepení tapet v Brně.“ (bez koncové tečky)
- [x] Úvod „Tapeta, na které nejsou vidět spoje. Připravíme stěnu, pečlivě navážeme vzor a dotáhneme rohy i okraje. Přijdou pokaždé stejní lidé a po práci uklidíme.“
- [x] Tlačítko „Chci cenu tapetování“ + telefon +420 774 927 182
- [x] „Pošlete fotku stěny a typ tapety a do 24 hodin se vám ozveme. Nacenění je zdarma a nezávazné. Termín, který domluvíme, dodržíme.“
- [x] „5,0 / 5 · 29 recenzí na Google“ (odkaz) a „Náš tým má přes 15 let praxe v oboru“
- [x] Titulní fotka „Tapetování kanceláří - Brno-Trnitá“ s popiskem „Z naší práce · Brno-Trnitá“ – originál v plném rozlišení, lightbox
- [x] Skoková navigace: O službě, Ukázky, Postup, Otázky, Cena, Poptávka
- [x] Ukázky realizací: „Podívejte se na výsledek.“; 3 zakázek, 8 fotek – všechny staženy (náhled 720 px + plné rozlišení až 2048 px)
- [x] Realizace „Tapetování“ – Brno · Medlánky – 2 fotek (štítky Po, Před)
- [x] Realizace „Tapetování • Dětský pokoj“ – Brno · Jundrov – 5 fotek
- [x] Realizace „Tapetování kanceláří“ – Brno-Trnitá – 1 fotek
- [x] „Prohlédnout realizaci ↗“ – nahrazeno klikem na fotku (aria-label „Otevřít realizaci …“) a počtem fotek na fotce
- [x] Lightbox: všechny fotky zakázky, štítek Před/Po/Průběh/Detail, místo, „Fotka n / N“, šipky, klávesnice, tah prstem, náhledy
- [x] NOVĚ: přepínač „Před / Po“ na kartách, kde zakázka má obojí
- [x] O službě: „Proč tapetování s Tři Mistry“ + „U tapety rozhoduje příprava stěny a přesná práce se vzorem. Postup přizpůsobíme vaší tapetě i podkladu, aby výsledek vypadal dobře i zblízka.“
- [x] Výhoda „Stěna připravená pod tapetu“ – „Před lepením posoudíme stav stěny a domluvíme potřebné vyrovnání. Nerovnosti pod tapetou pak nejsou vidět.“
- [x] Výhoda „Vzor, který navazuje“ – „Pásy pečlivě napojíme a tapetu čistě zakončíme kolem rohů a okrajů. Platí to i pro fototapety.“
- [x] Výhoda „Stejní lidé, čistá práce“ – „Kdo si s vámi tapetování domluví, ten ho i udělá. Termín dodržíme a po práci uklidíme.“
- [x] „Jak probíhá realizace“
- [x] Krok 1 „Projdeme vybranou tapetu“ – „Zajímá nás typ, vzor, rozměry stěn a členitost prostoru.“
- [x] Krok 2 „Připravíme stěnu“ – „Posoudíme podklad a domluvíme potřebné vyrovnání.“
- [x] Krok 3 „Nalepíme jednotlivé pásy“ – „Pečlivě navážeme vzor a zakončíme okraje.“
- [x] Krok 4 „Zkontrolujeme celek“ – „Projdeme spoje, rohy a dokončený povrch.“
- [x] „Cena a časté otázky“ (první otázka otevřená)
- [x] Otázka „Kolik stojí lepení tapet?“ – „Cena závisí na typu tapety, návaznosti vzoru, velikosti plochy, členitosti stěn a stavu podkladu. Pošlete fotku stěny, přibližné rozměry a typ nebo odkaz na tapetu a připravíme nezávaznou cenu.“
- [x] Otázka „Můžeme mít tapetu už koupenou?“ – „Ano. Pošlete její typ nebo odkaz a rozměry stěny, ať probereme provedení a potřebné množství.“
- [x] Otázka „Lepíte i fototapety?“ – „Ano. Přípravu a postup přizpůsobíme konkrétnímu typu tapety a podkladu.“
- [x] Otázka „Je potřeba stěnu před tapetováním připravit?“ – „Většinou ano. Stav stěny posoudíme podle fotek nebo na místě a potřebné vyrovnání domluvíme předem.“
- [x] Otázka „Jak dlouho tapetování trvá?“ – „Záleží na ploše, členitosti stěn a přípravě podkladu. Přesnou délku práce potvrdíme spolu s cenou.“
- [x] Otázka „Kde tapetujete?“ – „V celém Brně a okolí do zhruba 20 km, například v Modřicích, Šlapanicích, Kuřimi, Rosicích nebo Slavkově u Brna.“
- [x] Cena: „Kolik stojí tapetování?“ – „Cenu počítáme podle skutečné plochy a zvolené tapety. Příprava stěny i úklid jsou v ceně, kterou vám předem potvrdíme. Žádné skryté položky.“ (nadpisek „Cena tapetování“ je obsažen v nadpisu)
- [x] Faktor ceny „Plocha a tvar stěn“ – „Kolik metrů čtverečních a kolik rohů, oken a výklenků.“
- [x] Faktor ceny „Typ tapety“ – „Vliesová, vinylová, klasická tapeta nebo fototapeta.“
- [x] Faktor ceny „Návaznost vzoru“ – „Čím výraznější vzor, tím víc práce s napojením pásů.“
- [x] Faktor ceny „Stav podkladu“ – „Rovinnost stěny a potřebné vyrovnání před lepením.“
- [x] „Jak získat cenu“
- [x] Krok 1 „Pošlete fotku stěny“ – „Stačí fotka, přibližné rozměry a typ nebo odkaz na tapetu.“
- [x] Krok 2 „Ozveme se s cenou“ – „Připravíme nezávaznou cenu zdarma. U větší zakázky se přijedeme podívat.“
- [x] Krok 3 „Domluvíme termín“ – „Den nástupu i dokončení potvrdíme předem a dodržíme ho.“
- [x] „Chci cenu tapetování“ + „nebo zavolejte +420 774 927 182“
- [x] „Tapetování v Brně a okolí do 20 km“ (nadpisek „Kde pracujeme“ obsažen v nadpisu): Žabovřesky, Královo Pole, Líšeň, Bystrc, Bohunice, Židenice, Komín, Starý Lískovec, Střed, Modřice, Šlapanice, Kuřim, Rosice, Slavkov u Brna
- [x] Poptávka: „Pojďme se domluvit.“, „Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.“, „Pro první domluvu stačí: rozměry stěn a fotografie, typ nebo odkaz na vybranou tapetu, informace, zda je tapeta zakoupená.“
- [x] Formulář s předvyplněnou službou „Tapetování“ a nápovědou „Uveďte rozměry stěn, stav podkladu a požadovaný termín. Máte tapetu již zakoupenou? Přiložte její typ či odkaz a fotografie stěny.“
- [x] Mobilní lišta „Zavolat“ + „Nezávazně poptat“

## Speciální interiérové nátěry (`specialni-natery.html`)

- [x] Title „Protiplísňový a speciální nátěr Brno | Tři Mistři“, description
- [x] Drobečková navigace: Úvod / Služby / Speciální interiérové nátěry
- [x] Nadpisek „Tři Mistři / Brno a okolí“ – převeden: informace je v drobečkové navigaci a v H1 („v Brně“); nadpisky nad nadpisy jsou podle taste/impeccable zakázané
- [x] H1 „Protiplísňové a speciální nátěry v Brně.“ (bez koncové tečky)
- [x] Úvod „Plíseň v rohu nebo na ostění se po běžném vymalování často vrátí. Nejdřív zjistíme příčinu, připravíme podklad a zvolíme nátěr, který odpovídá místnosti. Přijdou pokaždé stejní lidé a po práci uklidíme.“
- [x] Tlačítko „Chci cenu nátěru“ + telefon +420 774 927 182
- [x] „Pošlete fotky problematického místa a do 24 hodin se vám ozveme. Nacenění je zdarma a nezávazné. Termín, který domluvíme, dodržíme.“
- [x] „5,0 / 5 · 29 recenzí na Google“ (odkaz) a „Náš tým má přes 15 let praxe v oboru“
- [x] Panel „Řešení podle vašeho povrchu“ – „Co je potřeba rozlišit“: Kondenzace a větrání, Zatékání nebo stavební vlhkost, Požadavek na hygienický povrch
- [x] NOVĚ: v hero první fotka první realizace (živá stránka tu fotku nemá, je ze stejné služby)
- [x] Skoková navigace: O službě, Ukázky, Postup, Otázky, Cena, Poptávka
- [x] Ukázky realizací: „Podívejte se na výsledek.“; 1 zakázek, 10 fotek – všechny staženy (náhled 720 px + plné rozlišení až 2048 px)
- [x] Realizace „Renovace koupelny a wc“ – Rajhrad – 10 fotek (štítky Po, Před, Detail)
- [x] „Prohlédnout realizaci ↗“ – nahrazeno klikem na fotku (aria-label „Otevřít realizaci …“) a počtem fotek na fotce
- [x] Lightbox: všechny fotky zakázky, štítek Před/Po/Průběh/Detail, místo, „Fotka n / N“, šipky, klávesnice, tah prstem, náhledy
- [x] NOVĚ: přepínač „Před / Po“ na kartách, kde zakázka má obojí
- [x] O službě: „Proč speciální nátěr s Tři Mistry“ + „Speciální nátěr pomůže, jen když odpovídá příčině problému. Rozlišíme kondenzaci, zatékání a stavební vlhkost a podle toho zvolíme přípravu i nátěrový systém.“
- [x] Výhoda „Nejdřív zjistíme příčinu“ – „Projdeme umístění a průběh poškození. Rozlišíme kondenzaci, zatékání a stavební vlhkost, protože samotný nátěr každou příčinu neodstraní.“
- [x] Výhoda „Nátěr podle místnosti“ – „Ložnice, koupelna, kuchyň nebo provozní prostor s požadavkem na omyvatelnost a hygienu. Systém volíme podle podkladu a používání. Po zatékání navazuje oprava stěn po zatékání.“
- [x] Výhoda „Rada k údržbě, čistá práce“ – „Po nátěru vysvětlíme, jak povrch udržovat a jak větrat. Přijdou pokaždé stejní lidé a po práci uklidíme.“
- [x] Výhoda „Příprava podkladu“ – „Odstranění nesoudržných vrstev, očištění, opravy a vhodná penetrace.“
- [x] „Jak probíhá realizace“
- [x] Krok 1 „Zjištění problému“ – „Projdeme umístění, průběh a pravděpodobnou příčinu poškození.“
- [x] Krok 2 „Volba systému“ – „Navrhneme čištění, přípravu a nátěr odpovídající podkladu a provozu.“
- [x] Krok 3 „Příprava povrchu“ – „Odstraníme nesoudržné vrstvy a povrch opravíme a sjednotíme.“
- [x] Krok 4 „Nátěr a doporučení“ – „Aplikujeme předepsané vrstvy a vysvětlíme další údržbu a větrání.“
- [x] „Cena a časté otázky“ (první otázka otevřená)
- [x] Otázka „Kolik stojí protiplísňový nebo speciální nátěr?“ – „Cenové faktory a podklady pro nabídku najdete v části Cena a postup nacenění.“
- [x] Otázka „Vyřeší protiplísňová barva každou plíseň?“ – „Ne. Pokud příčinou zůstává zatékání, stavební vlhkost nebo výrazný tepelný most, samotný nátěr problém trvale neodstraní.“
- [x] Otázka „Co znamená termoizolační nátěr?“ – „Jde o speciální povrchovou úpravu s konkrétními vlastnostmi. Její vhodnost posuzujeme podle konstrukce a problému; nenahrazuje běžné zateplení stavby.“
- [x] Otázka „Lze nátěr použít v koupelně?“ – „Ano, pokud je zvolený systém vhodný pro daný podklad, vlhkost a způsob používání místnosti.“
- [x] Otázka „Jak zabránit tomu, aby se plíseň vrátila?“ – „Záleží na příčině. Pokud jde o zatékání nebo stavební vlhkost, je potřeba ji nejdřív odstranit. Po nátěru vysvětlíme, jak povrch udržovat a jak větrat.“
- [x] Otázka „Kde speciální nátěry děláte?“ – „V celém Brně a okolí do zhruba 20 km, například v Modřicích, Šlapanicích, Kuřimi, Rosicích nebo Slavkově u Brna.“
- [x] Sekce recenzí (všech 29, stejná jako na úvodu)
- [x] Cena: „Kolik stojí protiplísňový nebo speciální nátěr?“ – „Cenu počítáme podle konkrétní místnosti a příčiny problému. Zakrytí, příprava podkladu i úklid jsou v ceně, kterou vám předem potvrdíme. Žádné skryté položky.“ (nadpisek „Cena speciálního nátěru“ je obsažen v nadpisu)
- [x] Faktor ceny „Příčina problému“ – „Kondenzace, zatékání nebo stavební vlhkost.“
- [x] Faktor ceny „Rozsah poškození“ – „Lokální místo, nebo celá místnost a velikost plochy.“
- [x] Faktor ceny „Příprava podkladu“ – „Odstranění nesoudržných vrstev, očištění, opravy a penetrace.“
- [x] Faktor ceny „Zvolený systém“ – „Protiplísňový, antibakteriální nebo termoizolační nátěr.“
- [x] „Jak získat cenu“
- [x] Krok 1 „Pošlete fotky místa“ – „Stačí fotka problému i celé místnosti a přibližné rozměry.“
- [x] Krok 2 „Ozveme se s cenou“ – „Připravíme nezávaznou cenu zdarma. U větší zakázky se přijedeme podívat.“
- [x] Krok 3 „Domluvíme termín“ – „Den nástupu i dokončení potvrdíme předem a dodržíme ho.“
- [x] „Chci cenu nátěru“ + „nebo zavolejte +420 774 927 182“
- [x] „Speciální nátěry v Brně a okolí do 20 km“ (nadpisek „Kde pracujeme“ obsažen v nadpisu): Žabovřesky, Královo Pole, Líšeň, Bystrc, Bohunice, Židenice, Komín, Starý Lískovec, Střed, Modřice, Šlapanice, Kuřim, Rosice, Slavkov u Brna
- [x] Poptávka: „Pojďme se domluvit.“, „Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.“, „Pro první domluvu stačí: fotografie problematického místa, o jakou místnost jde a jak se větrá, případně kdy se problém objevil.“
- [x] Formulář s předvyplněnou službou „Speciální interiérové nátěry“ a nápovědou „Popište problém, místnost, rozsah a známou příčinu. Uveďte, zda jde o plíseň, požadavek na hygienický povrch nebo studenou stěnu.“
- [x] Mobilní lišta „Zavolat“ + „Nezávazně poptat“

## Sanace po zatékání (`sanace-po-zatekani.html`)

- [x] Title „Oprava stěn a stropů po zatékání Brno | Tři Mistři“, description
- [x] Drobečková navigace: Úvod / Služby / Sanace po zatékání
- [x] Nadpisek „Tři Mistři / Brno a okolí“ – převeden: informace je v drobečkové navigaci a v H1 („v Brně“); nadpisky nad nadpisy jsou podle taste/impeccable zakázané
- [x] H1 „Oprava stěn a stropů po zatékání v Brně.“ (bez koncové tečky)
- [x] Úvod „Po zatékání chcete hlavně čistý strop a stěny bez map. Až bude příčina opravená a podklad vyschne, odstraníme poškozené vrstvy, izolujeme skvrny a vymalujeme tak, aby oprava navazovala na okolí. Přijdou pokaždé stejní lidé a po práci uklidíme.“
- [x] Tlačítko „Chci cenu opravy“ + telefon +420 774 927 182
- [x] „Pošlete fotky poškozeného místa a do 24 hodin se vám ozveme. Nacenění je zdarma a nezávazné. Termín, který domluvíme, dodržíme.“
- [x] „5,0 / 5 · 29 recenzí na Google“ (odkaz) a „Náš tým má přes 15 let praxe v oboru“
- [x] Panel „Řešení podle vašeho povrchu“ – „Co musí být před opravou splněno“: Opravená příčina, Připravený podklad, Správná izolační vrstva
- [x] NOVĚ: v hero první fotka první realizace (živá stránka tu fotku nemá, je ze stejné služby)
- [x] Skoková navigace: O službě, Ukázky, Postup, Otázky, Cena, Poptávka
- [x] Ukázky realizací: „Podívejte se na výsledek.“; 2 zakázek, 14 fotek – všechny staženy (náhled 720 px + plné rozlišení až 2048 px)
- [x] Realizace „Výmalba po vytopení“ – Brno · Žabovřesky – 9 fotek (štítky Po, Před)
- [x] Realizace „Výmalba po zatečení“ – Brno · Královo Pole – 5 fotek (štítky Po, Před, Průběh)
- [x] „Prohlédnout realizaci ↗“ – nahrazeno klikem na fotku (aria-label „Otevřít realizaci …“) a počtem fotek na fotce
- [x] Lightbox: všechny fotky zakázky, štítek Před/Po/Průběh/Detail, místo, „Fotka n / N“, šipky, klávesnice, tah prstem, náhledy
- [x] NOVĚ: přepínač „Před / Po“ na kartách, kde zakázka má obojí
- [x] O službě: „Proč opravu po zatékání s Tři Mistry“ + „Vodní mapy běžnou barvou často prostupují. Proto nejdřív ověříme, že je příčina opravená a podklad suchý, a skvrny před malováním izolujeme vhodnou vrstvou.“
- [x] Výhoda „Nejdřív příčina, pak malba“ – „S opravou začneme, až je zdroj vody odstraněný a podklad vyschlý. Jinak by se nová vrstva mohla znovu poškodit.“
- [x] Výhoda „Izolace map a skvrn“ – „Vodní mapy a zažloutlé skvrny izolujeme vhodnou vrstvou a omezíme jejich prostupování do nové malby. Pokud se objevila plíseň, řešíme ji speciálním nátěrem.“
- [x] Výhoda „Navazující povrch, čistá práce“ – „Odstín a strukturu sladíme s okolní plochou. Kdo si s vámi opravu domluví, ten ji i udělá, a po práci uklidíme.“
- [x] Výhoda „Lokální i celoplošné opravy“ – „Rozsah volíme tak, aby barevnost a struktura působily jednotně.“
- [x] „Jak probíhá realizace“
- [x] Krok 1 „Prohlídka a ověření stavu“ – „Posoudíme rozsah poškození a zda je možné s opravou bezpečně začít.“
- [x] Krok 2 „Odstranění poškozených vrstev“ – „Oškrábeme nesoudržné části a opravíme nerovnosti a praskliny.“
- [x] Krok 3 „Izolace skvrn“ – „Nanesením vhodné vrstvy omezíme prostupování map do nové malby.“
- [x] Krok 4 „Finální malba“ – „Povrch sjednotíme odstínem a rozsahem odpovídajícím okolní ploše.“
- [x] „Cena a časté otázky“ (první otázka otevřená)
- [x] Otázka „Kolik stojí oprava stěny po zatékání?“ – „Cenové faktory a podklady pro nabídku najdete v části Cena a postup nacenění.“
- [x] Otázka „Můžete malovat ihned po zatékání?“ – „Ne. Příčina musí být odstraněná a podklad dostatečně vyschlý. Jinak hrozí další poškození nové vrstvy.“
- [x] Otázka „Stačí skvrnu přemalovat běžnou barvou?“ – „Často ne. Vodní mapy mohou běžným nátěrem prostupovat, proto se podle stavu používá izolační vrstva.“
- [x] Otázka „Opravujete jen poškozené místo?“ – „Je to možné, ale u výrazných rozdílů v odstínu nebo struktuře může být vhodné vymalovat celou navazující plochu.“
- [x] Otázka „Opravíte i strop po vytopení od sousedů?“ – „Ano. Po úniku vody z rozvodů nebo z prostoru nad místností opravíme strop i stěny, jakmile je příčina odstraněná a podklad vyschlý.“
- [x] Otázka „Kde opravy po zatékání děláte?“ – „V celém Brně a okolí do zhruba 20 km, například v Modřicích, Šlapanicích, Kuřimi, Rosicích nebo Slavkově u Brna.“
- [x] Sekce recenzí (všech 29, stejná jako na úvodu)
- [x] Cena: „Kolik stojí oprava stěny po zatékání?“ – „Cenu počítáme podle rozsahu poškození a plochy, kterou je potřeba vymalovat. Zakrytí, opravy i úklid jsou v ceně, kterou vám předem potvrdíme. Žádné skryté položky.“ (nadpisek „Cena opravy po zatékání“ je obsažen v nadpisu)
- [x] Faktor ceny „Rozsah poškození“ – „Jak velká je mapa a které vrstvy jsou poškozené.“
- [x] Faktor ceny „Stav podkladu“ – „Vyschnutí, nesoudržné části, nerovnosti a praskliny.“
- [x] Faktor ceny „Izolace skvrn“ – „Vhodná izolační vrstva podle typu znečištění.“
- [x] Faktor ceny „Navazující malba“ – „Jen poškozené místo, nebo celá stěna či strop.“
- [x] „Jak získat cenu“
- [x] Krok 1 „Pošlete fotky poškození“ – „Stačí fotka skvrny i celé stěny nebo stropu a přibližné rozměry.“
- [x] Krok 2 „Ozveme se s cenou“ – „Připravíme nezávaznou cenu zdarma. U větší zakázky se přijedeme podívat.“
- [x] Krok 3 „Domluvíme termín“ – „Den nástupu i dokončení potvrdíme předem a dodržíme ho.“
- [x] „Chci cenu opravy“ + „nebo zavolejte +420 774 927 182“
- [x] „Opravy po zatékání v Brně a okolí do 20 km“ (nadpisek „Kde pracujeme“ obsažen v nadpisu): Žabovřesky, Královo Pole, Líšeň, Bystrc, Bohunice, Židenice, Komín, Starý Lískovec, Střed, Modřice, Šlapanice, Kuřim, Rosice, Slavkov u Brna
- [x] Poptávka: „Pojďme se domluvit.“, „Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.“, „Pro první domluvu stačí: fotografie poškozeného místa i celé stěny nebo stropu, zda je příčina zatékání už opravená.“
- [x] Formulář s předvyplněnou službou „Sanace po zatékání“ a nápovědou „Napište, kdy a odkud zatékalo, zda je příčina opravená, rozměr poškození a stav podkladu. Přiložte fotografie.“
- [x] Mobilní lišta „Zavolat“ + „Nezávazně poptat“

## Dekorativní stěrky (`dekoracni-sterky.html`)

- [x] Title „Betonová stěrka Brno – ručně, 15 let praxe | Tři Mistři“, description
- [x] Drobečková navigace: Úvod / Služby / Dekorativní stěrky
- [x] Nadpisek „Tři Mistři / Brno a okolí“ – převeden: informace je v drobečkové navigaci a v H1 („v Brně“); nadpisky nad nadpisy jsou podle taste/impeccable zakázané
- [x] H1 „Betonové a dekorativní stěrky v Brně.“ (bez koncové tečky)
- [x] Úvod „Stěna, která vypadá jako beton, kámen nebo štuk. Poradíme s výběrem techniky, připravíme podklad a stěrku naneseme ručně. Přijdou pokaždé stejní lidé a po práci uklidíme.“
- [x] Tlačítko „Chci cenu stěrky“ + telefon +420 774 927 182
- [x] „Pošlete fotku stěny a svou představu a do 24 hodin se vám ozveme. Nacenění je zdarma a nezávazné. Termín, který domluvíme, dodržíme.“
- [x] „5,0 / 5 · 29 recenzí na Google“ (odkaz) a „Náš tým má přes 15 let praxe v oboru“
- [x] Titulní fotka „Dekorativní stěrka - Zlín - Ortodoncie“ s popiskem „Z naší práce · Zlín - Ortodoncie“ – originál v plném rozlišení, lightbox
- [x] Skoková navigace: O službě, Ukázky, Postup, Otázky, Cena, Poptávka
- [x] Ukázky realizací: „Podívejte se na výsledek.“; 18 zakázek, 56 fotek – všechny staženy (náhled 720 px + plné rozlišení až 2048 px)
- [x] Realizace „Travertino Romano“ – Brno · Bohunice – 3 fotek (štítky Po, Před)
- [x] Realizace „Travertino Romano“ – Brno-Střed – 3 fotek (štítky Po)
- [x] Realizace „Dekorativní stěrka“ – Brno · Medlánky – 8 fotek (štítky Po, Před)
- [x] Realizace „Dekorativní stěrka“ – Brno · Medlánky – 3 fotek (štítky Po, Před, Detail)
- [x] Realizace „Dekorativní stěrky“ – Brno · Medlánky – 4 fotek (štítky Po, Před)
- [x] Realizace „Dekorativní stěrka“ – Kupařovice – 6 fotek (štítky Po, Před)
- [x] Realizace „Dekorativní stěrka“ – Brno · Modřice – 2 fotek (štítky Po, Před)
- [x] Realizace „Dekorativní stěrka“ – Brno · Modřice – 6 fotek (štítky Po, Před)
- [x] Realizace „Dekorativní stěrka“ – Zlín - Ortodoncie – 5 fotek (štítky Před, Po)
- [x] Realizace „Dekorativní stěrka“ – Brno - Veselá – 1 fotek
- [x] Realizace „Dekorativní stěrka“ – Rebešovice – 2 fotek
- [x] Realizace „Dekorativní stěrka“ – Brno - Špitálka – 1 fotek
- [x] Realizace „Dekorativní stěrka“ – Velká Bíteš – 1 fotek – ze „Starší realizace“
- [x] Realizace „Dekorativní stěrka“ – Brno - Kunzova – 1 fotek – ze „Starší realizace“
- [x] Realizace „Dekorativní stěrka“ – Brno - Moravany – 3 fotek – ze „Starší realizace“
- [x] Realizace „Dekorativní stěrka“ – Rajhrad – 5 fotek – ze „Starší realizace“
- [x] Realizace „Dekorativní stěrka“ – Brno - Kamechy – 1 fotek – ze „Starší realizace“
- [x] Realizace „Dekorativní stěrka“ – Brno - Bohunice – 1 fotek – ze „Starší realizace“
- [x] „Zobrazit další realizace“ – rozbalí zbytek
- [x] „Starší realizace“ (živě stránkování `?realizace_page=1`) – v návrhu jako rozbalovací blok na stejné stránce
- [x] „Prohlédnout realizaci ↗“ – nahrazeno klikem na fotku (aria-label „Otevřít realizaci …“) a počtem fotek na fotce
- [x] Lightbox: všechny fotky zakázky, štítek Před/Po/Průběh/Detail, místo, „Fotka n / N“, šipky, klávesnice, tah prstem, náhledy
- [x] NOVĚ: přepínač „Před / Po“ na kartách, kde zakázka má obojí
- [x] O službě: „Proč stěrku s Tři Mistry“ + „Dekorativní stěrka je ruční práce a výsledek dělá zkušenost. Pomůžeme vybrat techniku, která se hodí do vašeho prostoru, a stěrku uděláme tak, aby dlouho vypadala dobře.“
- [x] Výhoda „Poradíme s výběrem“ – „Betonová stěrka, benátský štuk, marmorino nebo travertino. Pomůžeme vybrat techniku, barvu i kresbu, která sedne k vašemu interiéru.“
- [x] Výhoda „Stěrka i do koupelny“ – „Betonovou stěrku děláme i do koupelen. Vhodnost ověříme podle podkladu a zatížení vodou, přes obklady nabízíme mikrocement.“
- [x] Výhoda „Stejní lidé, čistá práce“ – „Kdo si s vámi stěrku domluví, ten ji i udělá. Okolí zakryjeme a po práci uklidíme.“
- [x] „Jak probíhá realizace“
- [x] Krok 1 „Společně vybereme vzhled“ – „Probereme barvu, strukturu a techniku, která se hodí do vašeho prostoru.“
- [x] Krok 2 „Zkontrolujeme stěnu“ – „Ověříme rovinnost a soudržnost podkladu. Určíme, jakou přípravu potřebuje.“
- [x] Krok 3 „Naneseme stěrku“ – „Stěrku naneseme ve vrstvách a ručně vytvoříme požadovanou kresbu.“
- [x] Krok 4 „Dokončíme detaily“ – „Dokončíme rohy a napojení. Probereme, jak o hotový povrch pečovat.“
- [x] „Cena a časté otázky“ (první otázka otevřená)
- [x] Otázka „Kolik stojí dekorativní nebo betonová stěrka?“ – „Cena závisí na ploše, stavu a rovinnosti podkladu, zvolené technice a prostředí. Benátský štuk je pracnější než betonová stěrka. Pošlete fotku stěny a přibližné rozměry a připravíme nezávaznou cenu.“
- [x] Otázka „Jak vybrat betonovou stěrku nebo benátský štuk?“ – „Betonový efekt, benátský štuk, marmorino a travertino mají rozdílnou kresbu a strukturu. Projdeme s vámi inspiraci a vybereme techniku podle světla, okolních materiálů a využití místnosti. Každý ručně zpracovaný povrch má vlastní kresbu.“
- [x] Otázka „Hodí se betonová stěrka do koupelny?“ – „Záleží na podkladu a kontaktu s vodou. Vhodnost pro sprchový kout a další mokré zóny posoudíme individuálně. Pro stěrku přes vhodné obklady nabízíme také mikrocement.“
- [x] Otázka „Jde stěrka udělat přes obklady?“ – „Přes vhodné obklady nabízíme mikrocement. Jestli je podklad vhodný, posoudíme podle fotek nebo na místě.“
- [x] Otázka „Jak dlouho stěrka trvá?“ – „Stěrka se nanáší ve více vrstvách a každá musí zaschnout. Přesnou délku práce potvrdíme spolu s cenou podle plochy a techniky.“
- [x] Otázka „Jak se o stěrku starat?“ – „Při předání vysvětlíme, jak hotový povrch čistit a čemu se vyhnout, aby dlouho vypadal dobře.“
- [x] Otázka „Kde stěrky děláte?“ – „V celém Brně a okolí do zhruba 20 km, například v Modřicích, Šlapanicích, Kuřimi, Rosicích nebo Slavkově u Brna.“
- [x] Cena: „Kolik stojí betonová nebo dekorativní stěrka?“ – „Cenu počítáme podle skutečné plochy a zvolené techniky. Zakrytí, příprava podkladu i úklid jsou v ceně, kterou vám předem potvrdíme. Žádné skryté položky.“ (nadpisek „Cena stěrky“ je obsažen v nadpisu)
- [x] Faktor ceny „Plocha a tvar stěny“ – „Kolik metrů čtverečních a kolik rohů a detailů.“
- [x] Faktor ceny „Stav podkladu“ – „Rovinnost a soudržnost stěny, případné opravy.“
- [x] Faktor ceny „Technika a efekt“ – „Betonová stěrka, benátský štuk, marmorino nebo travertino.“
- [x] Faktor ceny „Prostředí“ – „Obývák, kuchyň nebo koupelna se zatížením vodou.“
- [x] „Jak získat cenu“
- [x] Krok 1 „Pošlete fotku stěny“ – „Stačí fotka, přibližné rozměry a inspirace, jak má stěna vypadat.“
- [x] Krok 2 „Ozveme se s cenou“ – „Připravíme nezávaznou cenu zdarma. U větší zakázky se přijedeme podívat.“
- [x] Krok 3 „Domluvíme termín“ – „Den nástupu i dokončení potvrdíme předem a dodržíme ho.“
- [x] „Chci cenu stěrky“ + „nebo zavolejte +420 774 927 182“
- [x] „Stěrky v Brně a okolí do 20 km“ (nadpisek „Kde pracujeme“ obsažen v nadpisu): Žabovřesky, Královo Pole, Líšeň, Bystrc, Bohunice, Židenice, Komín, Starý Lískovec, Střed, Modřice, Šlapanice, Kuřim, Rosice, Slavkov u Brna
- [x] Poptávka: „Pojďme se domluvit.“, „Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.“, „Pro první domluvu stačí: fotografie stěny nebo prostoru, přibližná plocha v m², inspirace, struktura a barevnost.“
- [x] Formulář s předvyplněnou službou „Dekorativní stěrky“ a nápovědou „Uveďte místnost, přibližnou plochu a požadovaný vzhled. U koupelny napište, zda jde o sprchový kout. Přiložte fotku podkladu nebo inspiraci.“
- [x] Mobilní lišta „Zavolat“ + „Nezávazně poptat“

## Mikrocement a stěrky přes obklady (`mikrocement.html`)

- [x] Title „Mikrocement a stěrka přes obklad Brno | Tři Mistři“, description
- [x] Drobečková navigace: Úvod / Služby / Mikrocement a stěrky přes obklady
- [x] Nadpisek „Tři Mistři / Brno a okolí“ – převeden: informace je v drobečkové navigaci a v H1 („v Brně“); nadpisky nad nadpisy jsou podle taste/impeccable zakázané
- [x] H1 „Mikrocement a stěrky přes obklady v Brně.“ (bez koncové tečky)
- [x] Úvod „Nový vzhled koupelny nebo kuchyně bez bourání starého obkladu. Mikrocement vytvoří souvislý povrch na stěnách i přes vhodný obklad. Nejdřív ověříme podklad a po práci uklidíme.“
- [x] Tlačítko „Chci cenu mikrocementu“ + telefon +420 774 927 182
- [x] „Pošlete fotky obkladu a spár a do 24 hodin se vám ozveme. Nacenění je zdarma a nezávazné. Termín, který domluvíme, dodržíme.“
- [x] „5,0 / 5 · 29 recenzí na Google“ (odkaz) a „Náš tým má přes 15 let praxe v oboru“
- [x] Panel „Řešení podle vašeho povrchu“ – „Kdy lze stěrku aplikovat přes obklad“: Pevný a soudržný obklad, Vyrovnání spár a penetrace, Namáhané a mokré zóny
- [x] Skoková navigace: O službě, Postup, Otázky, Cena, Poptávka
- [x] Ukázky realizací – živá stránka žádné nemá (beze změny)
- [x] O službě: „Proč mikrocement s Tři Mistry“ + „Mikrocement vydrží jen na pevném podkladu. Před prací proto ověříme soudržnost obkladu, spáry a vlhkost a řekneme vám rovnou, jestli je váš povrch vhodný.“
- [x] Výhoda „Bez bourání obkladu“ – „Pevný a soudržný obklad bez dutých míst překryjeme souvislou vrstvou. Ušetříte si bourání a nepořádek, který k němu patří.“
- [x] Výhoda „Podklad ověříme předem“ – „Obklad, spáry, rovinnost i vlhkost prověříme předem. Pokud povrch není vhodný, řekneme vám to dřív, než začneme.“
- [x] Výhoda „Stejní lidé, čistá práce“ – „Kdo si s vámi mikrocement domluví, ten ho i udělá. Okolí zakryjeme, po práci uklidíme a vysvětlíme vám údržbu.“
- [x] Výhoda „Barevnost a struktura“ – „Vzorek a charakter povrchu sladíme s interiérem a očekávanou údržbou.“
- [x] „Jak probíhá realizace“
- [x] Krok 1 „Kontrola podkladu“ – „Prověříme obklad, spáry, rovinnost, vlhkost a způsob používání prostoru.“
- [x] Krok 2 „Příprava a sjednocení“ – „Povrch očistíme, odmastíme, opravíme a připravíme pro navazující vrstvy.“
- [x] Krok 3 „Aplikace stěrky“ – „Vytvoříme jednotlivé vrstvy a výslednou kresbu povrchu.“
- [x] Krok 4 „Ochrana a předání“ – „Povrch uzavřeme, vysvětlíme jeho údržbu a dobu potřebnou před plným zatížením.“
- [x] „Cena a časté otázky“ (první otázka otevřená)
- [x] Otázka „Kolik stojí mikrocement?“ – „Cenové faktory a podklady pro nabídku najdete v části Cena a postup nacenění.“
- [x] Otázka „Lze mikrocement nanést na každý obklad?“ – „Ne. Obklad musí být pevný, soudržný a bez aktivních poruch. Vhodnost vždy ověříme na místě nebo z podrobných fotografií.“
- [x] Otázka „Je povrch úplně bez spár?“ – „Výsledná pohledová plocha může být souvislá, ale technologické a konstrukční spáry nelze bez posouzení jednoduše zakrýt.“
- [x] Otázka „Hodí se mikrocement do koupelny?“ – „Ano, pro řadu koupelnových ploch. Konkrétní skladba a ochrana závisí na kontaktu s vodou a stavu podkladu.“
- [x] Otázka „Mikrocement, nebo betonová stěrka?“ – „Mikrocement nabízíme hlavně přes vhodné obklady. Pro stěny bez obkladu nabízíme také betonové a dekorativní stěrky. Co se hodí k vašemu prostoru, probereme podle fotek.“
- [x] Otázka „Jak se o mikrocement starat?“ – „Při předání vysvětlíme údržbu povrchu a dobu, po které ho lze plně zatížit.“
- [x] Otázka „Kde mikrocement děláte?“ – „V celém Brně a okolí do zhruba 20 km, například v Modřicích, Šlapanicích, Kuřimi, Rosicích nebo Slavkově u Brna.“
- [x] Sekce recenzí (všech 29, stejná jako na úvodu)
- [x] Cena: „Kolik stojí mikrocement?“ – „Cenu počítáme podle skutečné plochy a stavu podkladu. Příprava, zakrytí i úklid jsou v ceně, kterou vám předem potvrdíme. Žádné skryté položky.“ (nadpisek „Cena mikrocementu“ je obsažen v nadpisu)
- [x] Faktor ceny „Plocha a tvar“ – „Kolik metrů čtverečních a kolik rohů, nik a detailů.“
- [x] Faktor ceny „Stav obkladu a spár“ – „Soudržnost a členitost obkladu a rozsah vyrovnání spár.“
- [x] Faktor ceny „Prostředí“ – „Kuchyň, obytný prostor nebo koupelna se zatížením vodou.“
- [x] Faktor ceny „Barevnost a struktura“ – „Zvolený systém, odstín a charakter povrchu.“
- [x] „Jak získat cenu“
- [x] Krok 1 „Pošlete fotku obkladu“ – „Stačí fotky obkladu a spár, přibližné rozměry a představa o vzhledu.“
- [x] Krok 2 „Ozveme se s cenou“ – „Připravíme nezávaznou cenu zdarma. Vhodnost podkladu ověříme podle fotek nebo na místě.“
- [x] Krok 3 „Domluvíme termín“ – „Den nástupu i dokončení potvrdíme předem a dodržíme ho.“
- [x] „Chci cenu mikrocementu“ + „nebo zavolejte +420 774 927 182“
- [x] „Mikrocement v Brně a okolí do 20 km“ (nadpisek „Kde pracujeme“ obsažen v nadpisu): Žabovřesky, Královo Pole, Líšeň, Bystrc, Bohunice, Židenice, Komín, Starý Lískovec, Střed, Modřice, Šlapanice, Kuřim, Rosice, Slavkov u Brna
- [x] Poptávka: „Pojďme se domluvit.“, „Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.“, „Pro první domluvu stačí: fotografie obkladu a spár, přibližná plocha v m², zda jde o koupelnu, sprchu nebo kuchyň.“
- [x] Formulář s předvyplněnou službou „Mikrocement a stěrky přes obklady“ a nápovědou „Uveďte místnost, plochu, typ podkladu a zda jde o mokrou zónu. Přiložte fotografie obkladu nebo stěny.“
- [x] Mobilní lišta „Zavolat“ + „Nezávazně poptat“

## Nátěry a renovace fasád (`natery-fasad.html`)

- [x] Title „Nátěry fasád Brno – přes 15 let praxe | Tři Mistři“, description
- [x] Drobečková navigace: Úvod / Služby / Nátěry a renovace fasád
- [x] Nadpisek „Tři Mistři / Brno a okolí“ – převeden: informace je v drobečkové navigaci a v H1 („v Brně“); nadpisky nad nadpisy jsou podle taste/impeccable zakázané
- [x] H1 „Nátěry a renovace fasád v Brně.“ (bez koncové tečky)
- [x] Úvod „Dům, který zase vypadá upraveně. Posoudíme stav fasády, opravíme poškozená místa a nový nátěr sjednotíme do jednoho odstínu. Přijdou pokaždé stejní lidé a po práci uklidíme.“
- [x] Tlačítko „Chci cenu fasády“ + telefon +420 774 927 182
- [x] „Pošlete fotku fasády a přibližnou plochu a do 24 hodin se vám ozveme. Nacenění je zdarma a nezávazné. Termín, který domluvíme, dodržíme.“
- [x] „5,0 / 5 · 29 recenzí na Google“ (odkaz) a „Náš tým má přes 15 let praxe v oboru“
- [x] Titulní fotka „Nátěr fasády - Rozdrojovice - po“ s popiskem „Z naší práce · Rozdrojovice“ – originál v plném rozlišení, lightbox
- [x] Skoková navigace: O službě, Ukázky, Postup, Otázky, Cena, Poptávka
- [x] Ukázky realizací: „Podívejte se na výsledek.“; 2 zakázek, 18 fotek – všechny staženy (náhled 720 px + plné rozlišení až 2048 px)
- [x] Realizace „Nátěr fasády“ – Rozdrojovice Fasáda – 14 fotek (štítky Po, Průběh, Před)
- [x] Realizace „Nátěr fasády“ – Česká – 4 fotek (štítky Před, Po)
- [x] „Prohlédnout realizaci ↗“ – nahrazeno klikem na fotku (aria-label „Otevřít realizaci …“) a počtem fotek na fotce
- [x] Lightbox: všechny fotky zakázky, štítek Před/Po/Průběh/Detail, místo, „Fotka n / N“, šipky, klávesnice, tah prstem, náhledy
- [x] NOVĚ: přepínač „Před / Po“ na kartách, kde zakázka má obojí
- [x] O službě: „Proč fasádu s Tři Mistry“ + „Nový nátěr vydrží jen na dobře připraveném podkladu. Nejdřív posoudíme původní vrstvy a rozsah oprav, potom zvolíme nátěrový systém a odstín.“
- [x] Výhoda „Víte, co fasáda potřebuje“ – „Před nátěrem posoudíme omítku, původní vrstvy a rozsah poškození. Řekneme vám, jestli stačí čištění, nebo je potřeba nový nátěr.“
- [x] Výhoda „Opravy i nový odstín“ – „Poškozená místa opravíme a nátěrový systém zvolíme podle povrchu. Barevnost domluvíme s vámi a sjednotíme celou fasádu.“
- [x] Výhoda „Stejní lidé, domluvený termín“ – „Kdo si s vámi fasádu domluví, ten ji i udělá. Termín dodržíme a okolí domu po práci uklidíme.“
- [x] „Jak probíhá realizace“
- [x] Krok 1 „Prohlédneme fasádu“ – „Zkontrolujeme omítku, původní vrstvy a rozsah poškození.“
- [x] Krok 2 „Očistíme a opravíme“ – „Připravíme podklad pro navazující nátěrový systém.“
- [x] Krok 3 „Sjednotíme odstín“ – „Domluvíme barevnost a provedeme odpovídající vrstvy.“
- [x] Krok 4 „Projdeme celý výsledek“ – „Zkontrolujeme detaily, napojení a dokončení zakázky.“
- [x] „Cena a časté otázky“ (první otázka otevřená)
- [x] Otázka „Jak se stanovuje cena nátěru fasády za m²?“ – „Samotná výměra nestačí. Cenu ovlivňuje stav a členitost fasády, rozsah oprav, počet vrstev a přístup k domu. Pošlete fotky celé fasády i poškozených míst a přibližnou plochu a připravíme nezávaznou cenu.“
- [x] Otázka „Potřebuji nový nátěr, nebo jen čištění?“ – „To závisí na stavu omítky a typu znečištění. Nabízíme také samostatné čištění fasád.“
- [x] Otázka „Vyřeší nový nátěr graffiti?“ – „Podle podkladu volíme čištění, odstranění nebo překrytí. Pro tento problém máme samostatnou službu.“
- [x] Otázka „Opravíte před nátěrem poškozenou omítku?“ – „Ano. Rozsah lokálních oprav určíme při prohlídce fasády a zahrneme ho do ceny, kterou vám předem potvrdíme.“
- [x] Otázka „Jak dlouho nátěr fasády trvá?“ – „Záleží na ploše, rozsahu oprav a počasí. Termín nástupu i dokončení domluvíme předem.“
- [x] Otázka „Kde fasády natíráte?“ – „V celém Brně a okolí do zhruba 20 km, například v Modřicích, Šlapanicích, Kuřimi, Rosicích nebo Slavkově u Brna.“
- [x] Cena: „Kolik stojí nátěr fasády?“ – „Cenu počítáme podle skutečné plochy a stavu fasády. Příprava, opravy i úklid jsou v ceně, kterou vám předem potvrdíme. Žádné skryté položky.“ (nadpisek „Cena fasády“ je obsažen v nadpisu)
- [x] Faktor ceny „Plocha a členitost“ – „Kolik metrů čtverečních a kolik oken, říms a detailů.“
- [x] Faktor ceny „Stav omítky“ – „Praskliny, odlupující se vrstvy a rozsah lokálních oprav.“
- [x] Faktor ceny „Počet vrstev a odstín“ – „Zvolený nátěrový systém a změna barvy.“
- [x] Faktor ceny „Přístup k domu“ – „Výška domu a prostor kolem fasády.“
- [x] „Jak získat cenu“
- [x] Krok 1 „Pošlete fotku fasády“ – „Stačí fotky celé fasády a poškozených míst, přibližná plocha a výška domu.“
- [x] Krok 2 „Ozveme se s cenou“ – „Připravíme nezávaznou cenu zdarma. U větší zakázky se přijedeme podívat.“
- [x] Krok 3 „Domluvíme termín“ – „Den nástupu i dokončení potvrdíme předem a dodržíme ho.“
- [x] „Chci cenu fasády“ + „nebo zavolejte +420 774 927 182“
- [x] „Fasády v Brně a okolí do 20 km“ (nadpisek „Kde pracujeme“ obsažen v nadpisu): Žabovřesky, Královo Pole, Líšeň, Bystrc, Bohunice, Židenice, Komín, Starý Lískovec, Střed, Modřice, Šlapanice, Kuřim, Rosice, Slavkov u Brna
- [x] Poptávka: „Pojďme se domluvit.“, „Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.“, „Pro první domluvu stačí: fotografie celé fasády a poškození, přibližná plocha a výška domu, informace o přístupu kolem domu.“
- [x] Formulář s předvyplněnou službou „Nátěry fasád“ a nápovědou „Uveďte přibližnou plochu a výšku domu, stav omítky a přístup k fasádě. Chcete pouze čištění, nebo i nový nátěr? Připojte termín a fotografie.“
- [x] Mobilní lišta „Zavolat“ + „Nezávazně poptat“

## Nátěry střech, okapů a svodů (`natery-strech.html`)

- [x] Title „Nátěr střechy a okapů Brno – 15 let praxe | Tři Mistři“, description
- [x] Drobečková navigace: Úvod / Služby / Nátěry střech, okapů a svodů
- [x] Nadpisek „Tři Mistři / Brno a okolí“ – převeden: informace je v drobečkové navigaci a v H1 („v Brně“); nadpisky nad nadpisy jsou podle taste/impeccable zakázané
- [x] H1 „Nátěry střech, okapů a svodů v Brně.“ (bez koncové tečky)
- [x] Úvod „Střecha, okapy a svody s novou ochrannou vrstvou. Nejdřív ověříme, jestli jde vaši krytinu natřít, pak ji očistíme, připravíme a natřeme v domluveném odstínu. Přijdou pokaždé stejní lidé a po práci uklidíme.“
- [x] Tlačítko „Chci cenu nátěru střechy“ + telefon +420 774 927 182
- [x] „Pošlete fotky střechy a okapů a do 24 hodin se vám ozveme. Nacenění je zdarma a nezávazné. Termín, který domluvíme, dodržíme.“
- [x] „5,0 / 5 · 29 recenzí na Google“ (odkaz) a „Náš tým má přes 15 let praxe v oboru“
- [x] Panel „Řešení podle vašeho povrchu“ – „Co kontrolujeme před nátěrem“: Soudržnost starých vrstev, Koroze a poškození, Čistota a suchost
- [x] Skoková navigace: O službě, Postup, Otázky, Cena, Poptávka
- [x] Ukázky realizací – živá stránka žádné nemá (beze změny)
- [x] O službě: „Proč nátěr střechy s Tři Mistry“ + „Nátěr má smysl jen na krytině, která ho unese. Proto nejdřív zkontrolujeme soudržnost starých vrstev, korozi a čistotu povrchu. Teprve potom navrhneme přípravu a nátěrový systém.“
- [x] Výhoda „Nejdřív ověříme, jestli to jde“ – „Ne každou střechu lze natřít. Vhodnost posoudíme podle krytiny, jejího stavu a soudržnosti starých vrstev ještě před nabídkou.“
- [x] Výhoda „Střecha i klempířské prvky“ – „Do jedné zakázky můžeme zahrnout plechovou krytinu, okapy, svody, lemování i další kovové části.“
- [x] Výhoda „Stejní lidé, uklizené okolí“ – „Kdo si s vámi střechu prohlédne, ten ji i natře. Termín potvrdíme předem a po práci uklidíme okolí domu.“
- [x] Výhoda „Lokální opravy povrchu“ – „Rozsah sjednocení určujeme podle poškození a stávajícího nátěru.“
- [x] „Jak probíhá realizace“
- [x] Krok 1 „Prohlídka střechy“ – „Určíme materiál, stav povrchu, rozsah přípravy a přístup.“
- [x] Krok 2 „Čištění a příprava“ – „Odstraníme nečistoty a nesoudržné části a připravíme problematická místa.“
- [x] Krok 3 „Základní ochrana“ – „Podle materiálu aplikujeme vhodnou základní nebo spojovací vrstvu.“
- [x] Krok 4 „Vrchní nátěr“ – „Povrch sjednotíme ochranným nátěrem v dohodnutém odstínu.“
- [x] „Cena a časté otázky“ (první otázka otevřená)
- [x] Otázka „Kolik stojí nátěr střechy?“ – „Cenové faktory a podklady pro nabídku najdete v části Cena a postup nacenění.“
- [x] Otázka „Lze natřít každou střechu?“ – „Ne. Záleží na typu krytiny, jejím stavu a kompatibilitě se zvoleným systémem. Vhodnost ověřujeme před nabídkou.“
- [x] Otázka „Vyřeší nátěr zatékání?“ – „Nátěr není náhradou opravy netěsné krytiny, spojů nebo oplechování. Tyto závady musí být předem odstraněné.“
- [x] Otázka „Natíráte také okapy a svody?“ – „Ano, podle materiálu a stavu můžeme do zakázky zahrnout také klempířské prvky.“
- [x] Otázka „Jak dlouho nátěr střechy trvá?“ – „Záleží na ploše, rozsahu přípravy a počasí. Nátěr se nanáší na čistý a suchý povrch ve více vrstvách. Délku práce potvrdíme spolu s cenou.“
- [x] Otázka „Kde nátěry střech děláte?“ – „V celém Brně a okolí do zhruba 20 km, například v Modřicích, Šlapanicích, Kuřimi, Rosicích nebo Slavkově u Brna.“
- [x] Sekce recenzí (všech 29, stejná jako na úvodu)
- [x] Cena: „Kolik stojí nátěr střechy?“ – „Cenu počítáme podle skutečné plochy a stavu střechy. Čištění, příprava povrchu i úklid jsou v ceně, kterou vám předem potvrdíme. Žádné skryté položky.“ (nadpisek „Cena nátěru střechy“ je obsažen v nadpisu)
- [x] Faktor ceny „Plocha a sklon“ – „Kolik metrů čtverečních a jak strmá je střecha.“
- [x] Faktor ceny „Přístupnost“ – „Jak se dostaneme ke střeše, okapům a svodům.“
- [x] Faktor ceny „Krytina a její stav“ – „Materiál, soudržnost starých vrstev a koroze.“
- [x] Faktor ceny „Rozsah přípravy“ – „Čištění, odstranění nesoudržných částí a opravy.“
- [x] „Jak získat cenu“
- [x] Krok 1 „Pošlete fotky střechy“ – „Stačí fotky střechy a okapů, přibližné rozměry a typ krytiny.“
- [x] Krok 2 „Ozveme se s cenou“ – „Podle fotek připravíme nezávaznou cenu. Přesnou nabídku potvrdíme po prohlídce.“
- [x] Krok 3 „Domluvíme termín“ – „Den nástupu i dokončení potvrdíme předem a dodržíme ho.“
- [x] „Chci cenu nátěru střechy“ + „nebo zavolejte +420 774 927 182“
- [x] „Nátěry střech v Brně a okolí do 20 km“ (nadpisek „Kde pracujeme“ obsažen v nadpisu): Žabovřesky, Královo Pole, Líšeň, Bystrc, Bohunice, Židenice, Komín, Starý Lískovec, Střed, Modřice, Šlapanice, Kuřim, Rosice, Slavkov u Brna
- [x] Poptávka: „Pojďme se domluvit.“, „Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.“, „Pro první domluvu stačí: fotografie střechy, okapů a svodů, přibližná plocha a druh krytiny, přístup ke střeše.“
- [x] Formulář s předvyplněnou službou „Nátěry střech“ a nápovědou „Uveďte typ a plochu krytiny, stáří, stav starého nátěru, sklon, rozsah nátěru okapů a svodů a možnosti přístupu. Přiložte fotografie.“
- [x] Mobilní lišta „Zavolat“ + „Nezávazně poptat“

## Čištění fasád a povrchů (`cisteni-fasad.html`)

- [x] Title „Čištění fasády a povrchů Brno | Tři Mistři“, description
- [x] Drobečková navigace: Úvod / Služby / Čištění fasád a povrchů
- [x] Nadpisek „Tři Mistři / Brno a okolí“ – převeden: informace je v drobečkové navigaci a v H1 („v Brně“); nadpisky nad nadpisy jsou podle taste/impeccable zakázané
- [x] H1 „Čištění fasád a povrchů v Brně.“ (bez koncové tečky)
- [x] Úvod „Fasáda zase čistá, bez usazenin a biologického znečištění. Čistíme omítky, marmolit, beton i obklady a postup volíme tak, aby povrch nepoškodil. Přijdou pokaždé stejní lidé a po práci uklidíme.“
- [x] Tlačítko „Chci cenu čištění“ + telefon +420 774 927 182
- [x] „Pošlete fotku znečištěného povrchu a do 24 hodin se vám ozveme. Nacenění je zdarma a nezávazné. Termín, který domluvíme, dodržíme.“
- [x] „5,0 / 5 · 29 recenzí na Google“ (odkaz) a „Náš tým má přes 15 let praxe v oboru“
- [x] Panel „Řešení podle vašeho povrchu“ – „Jak volíme způsob čištění“: Regulovaný tlak vody, Čisticí prostředky, Příprava před nátěrem
- [x] NOVĚ: v hero první fotka první realizace (živá stránka tu fotku nemá, je ze stejné služby)
- [x] Skoková navigace: O službě, Ukázky, Postup, Otázky, Cena, Poptávka
- [x] Ukázky realizací: „Podívejte se na výsledek.“; 1 zakázek, 7 fotek – všechny staženy (náhled 720 px + plné rozlišení až 2048 px)
- [x] Realizace „Čištění fasád“ – Brno · Staré Brno – 7 fotek (štítky Po, Před)
- [x] „Prohlédnout realizaci ↗“ – nahrazeno klikem na fotku (aria-label „Otevřít realizaci …“) a počtem fotek na fotce
- [x] Lightbox: všechny fotky zakázky, štítek Před/Po/Průběh/Detail, místo, „Fotka n / N“, šipky, klávesnice, tah prstem, náhledy
- [x] NOVĚ: přepínač „Před / Po“ na kartách, kde zakázka má obojí
- [x] O službě: „Proč čištění s Tři Mistry“ + „Každý povrch snese něco jiného. Tlak vody, čisticí prostředek i teplotu volíme podle materiálu a jeho stavu, aby čištění povrch nepoškodilo.“
- [x] Výhoda „Šetrně k vašemu povrchu“ – „Nejdřív určíme materiál a typ znečištění a postup vyzkoušíme. U starších omítek tlak omezíme nebo zvolíme jiný způsob.“
- [x] Výhoda „Okolí domu v bezpečí“ – „Prvky, které by mohla voda nebo čisticí prostředek poškodit, zakryjeme nebo odpojíme. Po práci uklidíme.“
- [x] Výhoda „Čištění i nový nátěr“ – „Čistíme samostatně i jako přípravu před nátěrem fasády. Kdo si s vámi práci domluví, ten ji i udělá.“
- [x] Výhoda „Keramické a kamenné obklady“ – „Čištění se zohledněním spár, povrchové úpravy a okolních materiálů.“
- [x] „Jak probíhá realizace“
- [x] Krok 1 „Posouzení materiálu“ – „Určíme podklad, jeho stav a typ znečištění.“
- [x] Krok 2 „Ochrana okolí“ – „Zakryjeme nebo odpojíme prvky, které by mohla voda či čisticí prostředek poškodit.“
- [x] Krok 3 „Zkouška a čištění“ – „Nastavíme šetrný účinný postup a postupujeme po ucelených plochách.“
- [x] Krok 4 „Kontrola výsledku“ – „Po očištění zkontrolujeme podklad a doporučíme případnou další ochranu.“
- [x] „Cena a časté otázky“ (první otázka otevřená)
- [x] Otázka „Kolik stojí čištění fasády?“ – „Cenové faktory a podklady pro nabídku najdete v části Cena a postup nacenění.“
- [x] Otázka „Lze každou fasádu čistit vysokým tlakem?“ – „Ne. U starších nebo méně soudržných omítek je potřeba tlak omezit nebo zvolit jiný postup.“
- [x] Otázka „Odstraníte také biologické znečištění?“ – „Podle druhu a rozsahu lze čištění doplnit vhodným přípravkem. Konkrétní postup určíme po posouzení povrchu.“
- [x] Otázka „Můžete po čištění fasádu také natřít?“ – „Ano. Čištění může být první částí přípravy před opravami a novým fasádním nátěrem.“
- [x] Otázka „Co všechno kromě fasády čistíte?“ – „Marmolit a sokly, betonové stěny, podezdívky a chodníky i keramické a kamenné obklady.“
- [x] Otázka „Kde čištění děláte?“ – „V celém Brně a okolí do zhruba 20 km, například v Modřicích, Šlapanicích, Kuřimi, Rosicích nebo Slavkově u Brna.“
- [x] Sekce recenzí (všech 29, stejná jako na úvodu)
- [x] Cena: „Kolik stojí čištění fasády?“ – „Cenu počítáme podle skutečné plochy a materiálu. Zakrytí okolí i úklid jsou v ceně, kterou vám předem potvrdíme. Žádné skryté položky.“ (nadpisek „Cena čištění“ je obsažen v nadpisu)
- [x] Faktor ceny „Plocha“ – „Kolik metrů čtverečních fasády nebo jiného povrchu.“
- [x] Faktor ceny „Materiál“ – „Omítka, marmolit, beton nebo obklad a jejich stav.“
- [x] Faktor ceny „Druh znečištění“ – „Běžné usazeniny, biologické znečištění a další nečistoty.“
- [x] Faktor ceny „Přístupnost“ – „Výška a prostor kolem čištěné plochy.“
- [x] „Jak získat cenu“
- [x] Krok 1 „Pošlete fotku povrchu“ – „Stačí fotka znečištěného místa a přibližná plocha.“
- [x] Krok 2 „Ozveme se s cenou“ – „Připravíme nezávaznou cenu zdarma. U větší zakázky se přijedeme podívat.“
- [x] Krok 3 „Domluvíme termín“ – „Den nástupu i dokončení potvrdíme předem a dodržíme ho.“
- [x] „Chci cenu čištění“ + „nebo zavolejte +420 774 927 182“
- [x] „Čištění v Brně a okolí do 20 km“ (nadpisek „Kde pracujeme“ obsažen v nadpisu): Žabovřesky, Královo Pole, Líšeň, Bystrc, Bohunice, Židenice, Komín, Starý Lískovec, Střed, Modřice, Šlapanice, Kuřim, Rosice, Slavkov u Brna
- [x] Poptávka: „Pojďme se domluvit.“, „Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.“, „Pro první domluvu stačí: fotografie fasády a znečištěných míst, přibližná plocha a výška, materiál povrchu a přístup kolem domu.“
- [x] Formulář s předvyplněnou službou „Čištění fasády“ a nápovědou „Uveďte plochu a výšku fasády, druh znečištění a možnosti přístupu. Přiložte fotografie a požadovaný termín.“
- [x] Mobilní lišta „Zavolat“ + „Nezávazně poptat“

## Odstranění graffiti (`odstraneni-grafiti.html`)

- [x] Title „Odstranění graffiti Brno – fasády a zdi | Tři Mistři“, description
- [x] Drobečková navigace: Úvod / Služby / Odstranění graffiti
- [x] Nadpisek „Tři Mistři / Brno a okolí“ – převeden: informace je v drobečkové navigaci a v H1 („v Brně“); nadpisky nad nadpisy jsou podle taste/impeccable zakázané
- [x] H1 „Odstranění graffiti v Brně.“ (bez koncové tečky)
- [x] Úvod „Graffiti na fasádě nebo zdi chcete mít pryč co nejdřív. Podle materiálu zvolíme čištění, odstranění nebo překrytí a v případě potřeby sjednotíme nátěr, aby plocha působila jednotně. Přijdou pokaždé stejní lidé a po práci uklidíme.“
- [x] Tlačítko „Chci cenu odstranění graffiti“ + telefon +420 774 927 182
- [x] „Pošlete fotku detailu i celé plochy a do 24 hodin se vám ozveme. Nacenění je zdarma a nezávazné. Termín, který domluvíme, dodržíme.“
- [x] „5,0 / 5 · 29 recenzí na Google“ (odkaz) a „Náš tým má přes 15 let praxe v oboru“
- [x] Panel „Řešení podle vašeho povrchu“ – „Jak volíme postup“: Čištění podle materiálu, Odstranění nebo překrytí, Sjednocující nátěr plochy
- [x] NOVĚ: v hero první fotka první realizace (živá stránka tu fotku nemá, je ze stejné služby)
- [x] Skoková navigace: O službě, Ukázky, Postup, Otázky, Cena, Poptávka
- [x] Ukázky realizací: „Podívejte se na výsledek.“; 1 zakázek, 2 fotek – všechny staženy (náhled 720 px + plné rozlišení až 2048 px)
- [x] Realizace „Odstranění graffiti“ – Brno · Žabovřesky – 2 fotek (štítky Po, Před)
- [x] „Prohlédnout realizaci ↗“ – nahrazeno klikem na fotku (aria-label „Otevřít realizaci …“) a počtem fotek na fotce
- [x] Lightbox: všechny fotky zakázky, štítek Před/Po/Průběh/Detail, místo, „Fotka n / N“, šipky, klávesnice, tah prstem, náhledy
- [x] NOVĚ: přepínač „Před / Po“ na kartách, kde zakázka má obojí
- [x] O službě: „Proč odstranění graffiti s Tři Mistry“ + „Každý povrch snese jiný zásah. Nejdřív posoudíme materiál, barvu a stav plochy. Podle toho zvolíme čištění, odstranění nebo překrytí a domluvíme, jestli je potřeba navazující nátěr.“
- [x] Výhoda „Postup podle povrchu“ – „Fasáda a další povrchy vyžadují odlišný přístup. Podle materiálu a jeho stavu zvolíme čištění, odstranění nebo překrytí.“
- [x] Výhoda „Plocha, která působí jednotně“ – „Pokud po zásahu zůstane rozdíl v barvě, domluvíme navazující nátěr a povrch sjednotíme. Celou fasádu obnovíme v rámci nátěrů fasád.“
- [x] Výhoda „Stejní lidé, čistá práce“ – „Kdo si s vámi zakázku domluví, ten ji i udělá. Termín potvrdíme předem a po práci uklidíme.“
- [x] „Jak probíhá realizace“
- [x] Krok 1 „Pošlete detail i celek“ – „Podle fotografií a materiálu probereme rozsah zásahu.“
- [x] Krok 2 „Posoudíme podklad“ – „Zohledníme povrchovou úpravu a stav poškozeného místa.“
- [x] Krok 3 „Zvolíme vhodný postup“ – „Použijeme čištění, odstranění nebo překrytí podle podmínek.“
- [x] Krok 4 „Sjednotíme výsledek“ – „Případný navazující nátěr domluvíme podle stavu plochy.“
- [x] „Cena a časté otázky“ (první otázka otevřená)
- [x] Otázka „Kolik stojí odstranění graffiti?“ – „Cena závisí na velikosti a typu graffiti, materiálu a stavu podkladu, zvoleném postupu a případném navazujícím nátěru. Pošlete fotku detailu i celé plochy a přibližné rozměry a připravíme nezávaznou cenu.“
- [x] Otázka „Lze graffiti odstranit z každého povrchu?“ – „Postup a výsledek závisí na materiálu a barvě. Někdy je vhodnější překrytí nebo navazující nátěr.“
- [x] Otázka „Co vám máme poslat?“ – „Fotografii detailu i celé plochy, přibližné rozměry, materiál a místo realizace.“
- [x] Otázka „Zůstane po graffiti vidět skvrna?“ – „Záleží na materiálu a barvě podkladu. Pokud rozdíl zůstane, domluvíme navazující nátěr a plochu sjednotíme.“
- [x] Otázka „Jak dlouho odstranění graffiti trvá?“ – „Záleží na velikosti plochy, materiálu a zvoleném postupu. Délku práce potvrdíme spolu s cenou.“
- [x] Otázka „Kde graffiti odstraňujete?“ – „V celém Brně a okolí do zhruba 20 km, například v Modřicích, Šlapanicích, Kuřimi, Rosicích nebo Slavkově u Brna.“
- [x] Cena: „Kolik stojí odstranění graffiti?“ – „Cenu počítáme podle skutečné plochy a zvoleného postupu. Zakrytí okolí, samotná práce i úklid jsou v ceně, kterou vám předem potvrdíme. Žádné skryté položky.“ (nadpisek „Cena odstranění graffiti“ je obsažen v nadpisu)
- [x] Faktor ceny „Velikost plochy“ – „Kolik metrů čtverečních graffiti zabírá.“
- [x] Faktor ceny „Typ graffiti“ – „Druh barvy, počet vrstev a stáří, pokud ho znáte.“
- [x] Faktor ceny „Materiál podkladu“ – „Fasáda nebo jiný povrch a jeho stav.“
- [x] Faktor ceny „Postup a dokončení“ – „Čištění, odstranění nebo překrytí a případný nový nátěr.“
- [x] „Jak získat cenu“
- [x] Krok 1 „Pošlete fotky graffiti“ – „Stačí fotka detailu i celé plochy, přibližné rozměry a místo.“
- [x] Krok 2 „Ozveme se s cenou“ – „Připravíme nezávaznou cenu zdarma. U větší zakázky se přijedeme podívat.“
- [x] Krok 3 „Domluvíme termín“ – „Den nástupu i dokončení potvrdíme předem a dodržíme ho.“
- [x] „Chci cenu odstranění graffiti“ + „nebo zavolejte +420 774 927 182“
- [x] „Odstranění graffiti v Brně a okolí do 20 km“ (nadpisek „Kde pracujeme“ obsažen v nadpisu): Žabovřesky, Královo Pole, Líšeň, Bystrc, Bohunice, Židenice, Komín, Starý Lískovec, Střed, Modřice, Šlapanice, Kuřim, Rosice, Slavkov u Brna
- [x] Poptávka: „Pojďme se domluvit.“, „Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.“, „Pro první domluvu stačí: materiál a velikost plochy, stáří graffiti, pokud ho znáte, fotografie detailu i celého místa.“
- [x] Formulář s předvyplněnou službou „Odstranění graffiti“ a nápovědou „Uveďte materiál povrchu, přibližnou plochu a stáří graffiti. Přiložte fotografie a požadovaný termín zásahu.“
- [x] Mobilní lišta „Zavolat“ + „Nezávazně poptat“

## Nátěry oken, podbití, dřeva a kovů (`natery-drevo-kovu.html`)

- [x] Title „Nátěry dřeva, oken a kovů Brno | Tři Mistři“, description
- [x] Drobečková navigace: Úvod / Služby / Nátěry oken, podbití, dřeva a kovů
- [x] Nadpisek „Tři Mistři / Brno a okolí“ – převeden: informace je v drobečkové navigaci a v H1 („v Brně“); nadpisky nad nadpisy jsou podle taste/impeccable zakázané
- [x] H1 „Nátěry dřeva, oken a kovů v Brně.“ (bez koncové tečky)
- [x] Úvod „Okna, dveře, pergola nebo plot zase jako nové a chráněné před počasím. Starý nátěr očistíme a ochranu zvolíme podle materiálu. Přijdou pokaždé stejní lidé a po práci uklidíme.“
- [x] Tlačítko „Chci cenu nátěru“ + telefon +420 774 927 182
- [x] „Pošlete fotky prvků a detailů starého nátěru a do 24 hodin se vám ozveme. Nacenění je zdarma a nezávazné. Termín, který domluvíme, dodržíme.“
- [x] „5,0 / 5 · 29 recenzí na Google“ (odkaz) a „Náš tým má přes 15 let praxe v oboru“
- [x] Titulní fotka „Nátěr dřeva 1 - Blansko - Chata“ s popiskem „Z naší práce · Blansko - Chata“ – originál v plném rozlišení, lightbox
- [x] Skoková navigace: O službě, Ukázky, Postup, Otázky, Cena, Poptávka
- [x] Ukázky realizací: „Podívejte se na výsledek.“; 7 zakázek, 60 fotek – všechny staženy (náhled 720 px + plné rozlišení až 2048 px)
- [x] Realizace „Renovace dveří a oken“ – Příbram na Moravě – 16 fotek (štítky Po, Před)
- [x] Realizace „Nátěr Dřeva“ – Rozdrojovice – 10 fotek (štítky Po, Před)
- [x] Realizace „Nátěr Pergoly“ – Adamov – 16 fotek (štítky Po, Před)
- [x] Realizace „Nátěr kovové balkonové konstrukce“ – Brno-Staré Brno – 9 fotek
- [x] Realizace „Nátěr kovu“ – Brno - Losova – 2 fotek
- [x] Realizace „Nátěr dřeva“ – Blansko - Chata – 6 fotek
- [x] Realizace „Nátěr dřeva“ – Brno - Jana Uhra – 1 fotek
- [x] „Zobrazit další realizace“ – rozbalí zbytek
- [x] „Prohlédnout realizaci ↗“ – nahrazeno klikem na fotku (aria-label „Otevřít realizaci …“) a počtem fotek na fotce
- [x] Lightbox: všechny fotky zakázky, štítek Před/Po/Průběh/Detail, místo, „Fotka n / N“, šipky, klávesnice, tah prstem, náhledy
- [x] NOVĚ: přepínač „Před / Po“ na kartách, kde zakázka má obojí
- [x] O službě: „Proč nátěr dřeva a kovu s Tři Mistry“ + „Nový nátěr drží jen na připraveném podkladu. Proto starý povrch nejdřív očistíme a ochranu zvolíme podle materiálu a toho, jak moc je vystavený počasí.“
- [x] Výhoda „Nátěr, který drží“ – „Nesoudržné vrstvy a korozi odstraníme dřív, než natíráme. Nová vrstva tak navazuje na připravený podklad.“
- [x] Výhoda „Ochrana podle materiálu“ – „Na dřevo i kov volíme základ a vrchní nátěr podle prostředí. Zohledníme počasí i ochranu kovu před korozí.“
- [x] Výhoda „Stejní lidé, čisté okolí“ – „Kdo si s vámi práci domluví, ten ji i udělá. Okolí zakryjeme, termín dodržíme a po práci uklidíme.“
- [x] „Jak probíhá realizace“
- [x] Krok 1 „Posoudíme starý nátěr“ – „Projdeme materiál, poškození, korozi a přístup k jednotlivým prvkům.“
- [x] Krok 2 „Připravíme povrch“ – „Očistíme a podle stavu odstraníme nesoudržné vrstvy.“
- [x] Krok 3 „Zvolíme ochranu“ – „Základ a vrchní nátěr navrhneme podle materiálu a prostředí.“
- [x] Krok 4 „Dotáhneme hrany a spoje“ – „Dokončíme členité detaily a domluvený odstín.“
- [x] „Cena a časté otázky“ (první otázka otevřená)
- [x] Otázka „Co ovlivňuje cenu nátěru dřeva nebo kovu?“ – „Rozhoduje plocha a členitost prvků, stav starého nátěru, rozsah přípravy, zvolený nátěrový systém a přístup k povrchu. Pošlete fotky celku i detailů a přibližné rozměry a připravíme nezávaznou cenu.“
- [x] Otázka „Natíráte také okna a podbití?“ – „Ano. Rozsah obnovy určíme podle materiálu a stavu původních vrstev.“
- [x] Otázka „Stačí starý povrch jen přetřít?“ – „Ne vždy. Nesoudržné vrstvy nebo koroze vyžadují odpovídající přípravu.“
- [x] Otázka „Natíráte i ploty, brány a zábradlí?“ – „Ano. Kovové prvky očistíme od koroze a nesoudržných vrstev a zvolíme základ i vrchní nátěr, který kov ochrání.“
- [x] Otázka „Můžu si vybrat odstín?“ – „Ano. Odstín domluvíme předem a podle něj zvolíme vhodný nátěrový systém.“
- [x] Otázka „Kde natíráte?“ – „V celém Brně a okolí do zhruba 20 km, například v Modřicích, Šlapanicích, Kuřimi, Rosicích nebo Slavkově u Brna.“
- [x] Cena: „Kolik stojí nátěr dřeva nebo kovu?“ – „Cenu počítáme podle počtu a velikosti prvků. Příprava povrchu, zakrytí i úklid jsou v ceně, kterou vám předem potvrdíme. Žádné skryté položky.“ (nadpisek „Cena nátěru“ je obsažen v nadpisu)
- [x] Faktor ceny „Počet a velikost prvků“ – „Kolik oken, dveří nebo metrů plotu a podbití.“
- [x] Faktor ceny „Členitost“ – „Hrany, spoje a detaily, které se natírají ručně.“
- [x] Faktor ceny „Stav starého nátěru“ – „Odlupující se vrstvy, poškozené dřevo nebo koroze.“
- [x] Faktor ceny „Přístup“ – „Výška a přístup k jednotlivým prvkům.“
- [x] „Jak získat cenu“
- [x] Krok 1 „Pošlete fotku prvků“ – „Stačí fotky celku i detailů a počet nebo rozměry prvků.“
- [x] Krok 2 „Ozveme se s cenou“ – „Připravíme nezávaznou cenu zdarma. U větší zakázky se přijedeme podívat.“
- [x] Krok 3 „Domluvíme termín“ – „Den nástupu i dokončení potvrdíme předem a dodržíme ho.“
- [x] „Chci cenu nátěru“ + „nebo zavolejte +420 774 927 182“
- [x] „Nátěry v Brně a okolí do 20 km“ (nadpisek „Kde pracujeme“ obsažen v nadpisu): Žabovřesky, Královo Pole, Líšeň, Bystrc, Bohunice, Židenice, Komín, Starý Lískovec, Střed, Modřice, Šlapanice, Kuřim, Rosice, Slavkov u Brna
- [x] Poptávka: „Pojďme se domluvit.“, „Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.“, „Pro první domluvu stačí: co a z jakého materiálu natíráme, počet prvků nebo jejich rozměry, fotografie starého nátěru a detailů.“
- [x] Formulář s předvyplněnou službou „Nátěry dřeva a kovů“ a nápovědou „Napište, co potřebujete natřít (například okna, pergolu, plot nebo radiátory), počet či rozměry a stav starého nátěru. Připojte požadovaný termín a fotografie.“
- [x] Mobilní lišta „Zavolat“ + „Nezávazně poptat“

## Průmyslové a antikorozní nátěry (`prumyslove-natery.html`)

- [x] Title „Průmyslové a antikorozní nátěry Brno | Tři Mistři“, description
- [x] Drobečková navigace: Úvod / Služby / Průmyslové a antikorozní nátěry
- [x] Nadpisek „Tři Mistři / Brno a okolí“ – převeden: informace je v drobečkové navigaci a v H1 („v Brně“); nadpisky nad nadpisy jsou podle taste/impeccable zakázané
- [x] H1 „Průmyslové a antikorozní nátěry v Brně.“ (bez koncové tečky)
- [x] Úvod „Ochranný nátěr ocelových konstrukcí, hal a namáhaných kovových prvků. Posoudíme stav povrchu i podmínky provozu, povrch připravíme a naneseme vhodný ochranný systém. Termín i omezení provozu domluvíme předem.“
- [x] Tlačítko „Chci cenu nátěru“ + telefon +420 774 927 182
- [x] „Pošlete fotky konstrukce a přibližné rozměry a do 24 hodin se vám ozveme. Nacenění je zdarma a nezávazné. Termín, který domluvíme, dodržíme.“
- [x] „5,0 / 5 · 29 recenzí na Google“ (odkaz) a „Náš tým má přes 15 let praxe v oboru“
- [x] Titulní fotka „Průmyslový nátěr 1 - Opatovice“ s popiskem „Z naší práce · Opatovice“ – originál v plném rozlišení, lightbox
- [x] Skoková navigace: O službě, Ukázky, Postup, Otázky, Cena, Poptávka
- [x] Ukázky realizací: „Podívejte se na výsledek.“; 1 zakázek, 13 fotek – všechny staženy (náhled 720 px + plné rozlišení až 2048 px)
- [x] Realizace „Průmyslový nátěr“ – Opatovice – 13 fotek
- [x] „Prohlédnout realizaci ↗“ – nahrazeno klikem na fotku (aria-label „Otevřít realizaci …“) a počtem fotek na fotce
- [x] Lightbox: všechny fotky zakázky, štítek Před/Po/Průběh/Detail, místo, „Fotka n / N“, šipky, klávesnice, tah prstem, náhledy
- [x] NOVĚ: přepínač „Před / Po“ na kartách, kde zakázka má obojí
- [x] O službě: „Proč průmyslové nátěry s Tři Mistry“ + „Ochranný nátěr drží jen na dobře připraveném povrchu. Proto nejdřív řešíme očištění, korozi a staré vrstvy. Nátěrový systém volíme podle materiálu a namáhání.“
- [x] Výhoda „Systém podle provozu“ – „Nátěrový systém volíme podle materiálu a namáhání konkrétních prvků. Rozsah přizpůsobíme objektu a způsobu používání.“
- [x] Výhoda „Příprava povrchu na prvním místě“ – „Před ochrannými vrstvami očistíme povrch a posoudíme stav původních nátěrů i koroze. Podle toho určíme potřebnou přípravu.“
- [x] Výhoda „Domluvený termín, stejní lidé“ – „Termín i omezení provozu domluvíme předem a dodržíme je. Na zakázce pracují pokaždé stejní lidé a po práci uklidíme.“
- [x] „Jak probíhá realizace“
- [x] Krok 1 „Projdeme objekt a provoz“ – „Upřesníme rozsah konstrukcí, namáhání a možnosti přístupu.“
- [x] Krok 2 „Navrhneme systém“ – „Stanovíme potřebnou přípravu a ochranné vrstvy.“
- [x] Krok 3 „Připravíme a natřeme“ – „Očistíme povrch a provedeme domluvený systém.“
- [x] Krok 4 „Zkontrolujeme dokončení“ – „Projdeme rozsah prací a předání podle dohody.“
- [x] „Cena a časté otázky“ (první otázka otevřená)
- [x] Otázka „Jak se stanovuje cena průmyslových nátěrů?“ – „Rozhoduje plocha a členitost konstrukcí, stupeň koroze, potřebná příprava, výška a omezení provozu. Pošlete fotky a přibližné rozměry konstrukcí a připravíme nezávaznou cenu. Podrobnosti upřesníme při prohlídce.“
- [x] Otázka „Natíráte ocelové konstrukce?“ – „Ano. Rozsah přípravy a ochranu volíme podle stavu a namáhání prvků.“
- [x] Otázka „Lze pracovat za provozu?“ – „Záleží na prostoru, přístupu a podmínkách realizace. Omezení provozu probereme před nabídkou.“
- [x] Otázka „Co vám máme poslat?“ – „Rozměry a fotky konstrukcí, stav koroze a starých vrstev, přístup a omezení vašeho provozu.“
- [x] Otázka „Jak dlouho nátěr konstrukce trvá?“ – „Záleží na ploše, přípravě povrchu, počtu vrstev a přístupu. Délku práce i případná omezení provozu potvrdíme spolu s cenou.“
- [x] Otázka „Kde průmyslové nátěry děláte?“ – „V celém Brně a okolí do zhruba 20 km, například v Modřicích, Šlapanicích, Kuřimi, Rosicích nebo Slavkově u Brna.“
- [x] Cena: „Kolik stojí průmyslový nebo antikorozní nátěr?“ – „Cenu počítáme podle skutečné plochy a potřebné přípravy. Příprava povrchu, nátěr i úklid jsou v ceně, kterou vám předem potvrdíme. Žádné skryté položky.“ (nadpisek „Cena průmyslového nátěru“ je obsažen v nadpisu)
- [x] Faktor ceny „Plocha a členitost“ – „Kolik metrů čtverečních a jak složitá je konstrukce.“
- [x] Faktor ceny „Stupeň koroze“ – „Stav kovu a původních nátěrů.“
- [x] Faktor ceny „Příprava a systém“ – „Očištění povrchu a ochranné vrstvy podle namáhání.“
- [x] Faktor ceny „Výška a provoz“ – „Přístup ke konstrukci a omezení vašeho provozu.“
- [x] „Jak získat cenu“
- [x] Krok 1 „Pošlete fotky konstrukce“ – „Stačí fotky, přibližné rozměry a popis provozu.“
- [x] Krok 2 „Ozveme se s cenou“ – „Připravíme nezávaznou cenu zdarma. Podrobnosti upřesníme při prohlídce.“
- [x] Krok 3 „Domluvíme termín“ – „Den nástupu i dokončení potvrdíme předem a dodržíme ho.“
- [x] „Chci cenu nátěru“ + „nebo zavolejte +420 774 927 182“
- [x] „Průmyslové nátěry v Brně a okolí do 20 km“ (nadpisek „Kde pracujeme“ obsažen v nadpisu): Žabovřesky, Královo Pole, Líšeň, Bystrc, Bohunice, Židenice, Komín, Starý Lískovec, Střed, Modřice, Šlapanice, Kuřim, Rosice, Slavkov u Brna
- [x] Poptávka: „Pojďme se domluvit.“, „Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.“, „Pro první domluvu stačí: rozměry a fotografie konstrukcí, stav koroze a starých vrstev, přístup a omezení vašeho provozu.“
- [x] Formulář s předvyplněnou službou „Ocelové konstrukce“ a nápovědou „Uveďte rozměry konstrukce, stav koroze, přístup a požadovaný termín. Přiložte fotografie.“
- [x] Mobilní lišta „Zavolat“ + „Nezávazně poptat“

## Epoxidové podlahy (`epoxidove-podlahy.html`)

- [x] Title „Epoxidová podlaha Brno: garáže a dílny | Tři Mistři“, description
- [x] Drobečková navigace: Úvod / Služby / Epoxidové podlahy
- [x] Nadpisek „Tři Mistři / Brno a okolí“ – převeden: informace je v drobečkové navigaci a v H1 („v Brně“); nadpisky nad nadpisy jsou podle taste/impeccable zakázané
- [x] H1 „Epoxidové podlahy v Brně.“ (bez koncové tečky)
- [x] Úvod „Podlaha do garáže, dílny nebo provozovny navržená podle toho, jak prostor používáte. Skladbu navrhneme podle zatížení a stavu podkladu. Přijdou pokaždé stejní lidé a po práci uklidíme.“
- [x] Tlačítko „Chci cenu podlahy“ + telefon +420 774 927 182
- [x] „Pošlete fotku podlahy a přibližnou plochu a do 24 hodin se vám ozveme. Nacenění je zdarma a nezávazné. Termín, který domluvíme, dodržíme.“
- [x] „5,0 / 5 · 29 recenzí na Google“ (odkaz) a „Náš tým má přes 15 let praxe v oboru“
- [x] Panel „Řešení podle vašeho povrchu“ – „Co potřebujeme znát před realizací“: Stav podkladu, Požadované zatížení, Termín a přístup
- [x] Skoková navigace: O službě, Postup, Otázky, Cena, Poptávka
- [x] Ukázky realizací – živá stránka žádné nemá (beze změny)
- [x] O službě: „Proč epoxidovou podlahu s Tři Mistry“ + „Epoxidová podlaha je jen tak dobrá, jak dobrý je podklad pod ní. Proto nejdřív posoudíme stávající podlahu a skladbu navrhneme podle toho, jak budete prostor používat.“
- [x] Výhoda „Podlaha podle provozu“ – „Garáž, dílna nebo provozovna. Skladbu navrhneme podle zatížení a způsobu používání prostoru.“
- [x] Výhoda „Příprava v nabídce“ – „Rozsah oprav a přípravy stávající podlahy stanovíme předem. V nabídce vidíte přípravu i výslednou úpravu.“
- [x] Výhoda „Termín, se kterým počítáte“ – „Den nástupu i dobu, kdy můžete podlahu začít používat, domluvíme předem. Přijdou pokaždé stejní lidé a po práci uklidíme.“
- [x] Výhoda „Vzhled a povrchová úprava“ – „Barevnost a charakter povrchu dohodneme při přípravě nabídky.“
- [x] „Jak probíhá realizace“
- [x] Krok 1 „Poptávka a posouzení“ – „Projdeme fotografie, rozměry a požadavky. Podklad následně posoudíme pro konkrétní realizaci.“
- [x] Krok 2 „Návrh a kalkulace“ – „Navrhneme rozsah prací, povrch a termín a připravíme nabídku.“
- [x] Krok 3 „Příprava a realizace“ – „Připravíme podklad a aplikujeme zvolený podlahový systém.“
- [x] Krok 4 „Předání a údržba“ – „Vysvětlíme údržbu a dobu, po které lze podlahu začít používat podle zvoleného systému.“
- [x] „Cena a časté otázky“ (první otázka otevřená)
- [x] Otázka „Kolik stojí epoxidová podlaha?“ – „Cenové faktory a podklady pro nabídku najdete v části Cena a postup nacenění.“
- [x] Otázka „Lze epoxidovou podlahu realizovat na stávající podklad?“ – „Možnost realizace určíme po posouzení materiálu, stávajících vrstev a stavu podkladu. Pošlete nám fotografie a popis podlahy.“
- [x] Otázka „Jak dlouho realizace trvá?“ – „Termín a délku prací stanovíme podle rozsahu přípravy a zvoleného systému. Předem domluvíme také dobu do uvedení podlahy do provozu.“
- [x] Otázka „Co mám poslat do poptávky?“ – „Uveďte lokalitu, plochu v metrech čtverečních, materiál a stav podkladu, použití prostoru a požadovaný termín. Přiložte fotografie.“
- [x] Otázka „Můžu si vybrat barvu podlahy?“ – „Ano. Barevnost a charakter povrchu domluvíme při přípravě nabídky.“
- [x] Otázka „Kde epoxidové podlahy děláte?“ – „V celém Brně a okolí do zhruba 20 km, například v Modřicích, Šlapanicích, Kuřimi, Rosicích nebo Slavkově u Brna.“
- [x] Sekce recenzí (všech 29, stejná jako na úvodu)
- [x] Cena: „Kolik stojí epoxidová podlaha?“ – „Cenu počítáme podle skutečné plochy a stavu podkladu. Příprava podlahy i úklid jsou v ceně, kterou vám předem potvrdíme. Žádné skryté položky.“ (nadpisek „Cena podlahy“ je obsažen v nadpisu)
- [x] Faktor ceny „Plocha“ – „Kolik metrů čtverečních podlahy.“
- [x] Faktor ceny „Stav podkladu“ – „Materiál, stávající vrstvy a potřebné opravy.“
- [x] Faktor ceny „Zatížení“ – „Jak se bude prostor používat, třeba auto, dílna nebo provoz.“
- [x] Faktor ceny „Skladba a vzhled“ – „Zvolený podlahový systém, barevnost a povrch.“
- [x] „Jak získat cenu“
- [x] Krok 1 „Pošlete fotku podlahy“ – „Stačí fotky, přibližná plocha a k čemu prostor slouží.“
- [x] Krok 2 „Ozveme se s cenou“ – „Připravíme nezávaznou cenu zdarma. Podklad pak posoudíme na místě.“
- [x] Krok 3 „Domluvíme termín“ – „Den nástupu i dokončení potvrdíme předem a dodržíme ho.“
- [x] „Chci cenu podlahy“ + „nebo zavolejte +420 774 927 182“
- [x] „Epoxidové podlahy v Brně a okolí do 20 km“ (nadpisek „Kde pracujeme“ obsažen v nadpisu): Žabovřesky, Královo Pole, Líšeň, Bystrc, Bohunice, Židenice, Komín, Starý Lískovec, Střed, Modřice, Šlapanice, Kuřim, Rosice, Slavkov u Brna
- [x] Poptávka: „Pojďme se domluvit.“, „Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.“, „Pro první domluvu stačí: fotografie podlahy, přibližná plocha v m², jak bude podlaha zatížená a kdy byste chtěli začít.“
- [x] Formulář s předvyplněnou službou „Epoxidové podlahy“ a nápovědou „Uveďte plochu v m², stav a materiál podkladu, využití prostoru, lokalitu a termín. Přiložte fotografie.“
- [x] Mobilní lišta „Zavolat“ + „Nezávazně poptat“

## Písmomalířství (`pismomalirstvi.html`)

- [x] Title „Písmomalířství Brno – nápisy a loga na zeď | Tři Mistři“, description
- [x] Drobečková navigace: Úvod / Služby / Písmomalířství
- [x] Nadpisek „Tři Mistři / Brno a okolí“ – převeden: informace je v drobečkové navigaci a v H1 („v Brně“); nadpisky nad nadpisy jsou podle taste/impeccable zakázané
- [x] H1 „Písmomalířství v Brně.“ (bez koncové tečky)
- [x] Úvod „Ručně malovaný nápis nebo logo, které je dobře čitelné na fasádě i v interiéru. Váš motiv přeneseme na stěnu a proporce i barvy sladíme s podkladem. Přijdou pokaždé stejní lidé a po práci uklidíme.“
- [x] Tlačítko „Chci cenu nápisu“ + telefon +420 774 927 182
- [x] „Pošlete motiv, rozměry a fotku plochy a do 24 hodin se vám ozveme. Nacenění je zdarma a nezávazné. Termín, který domluvíme, dodržíme.“
- [x] „5,0 / 5 · 29 recenzí na Google“ (odkaz) a „Náš tým má přes 15 let praxe v oboru“
- [x] Titulní fotka „Písmomalířství - Obec Vrbovec“ s popiskem „Z naší práce · Obec Vrbovec“ – originál v plném rozlišení, lightbox
- [x] Skoková navigace: O službě, Ukázky, Postup, Otázky, Cena, Poptávka
- [x] Ukázky realizací: „Podívejte se na výsledek.“; 1 zakázek, 1 fotek – všechny staženy (náhled 720 px + plné rozlišení až 2048 px)
- [x] Realizace „Písmomalířství“ – Obec Vrbovec – 1 fotek
- [x] „Prohlédnout realizaci ↗“ – nahrazeno klikem na fotku (aria-label „Otevřít realizaci …“) a počtem fotek na fotce
- [x] Lightbox: všechny fotky zakázky, štítek Před/Po/Průběh/Detail, místo, „Fotka n / N“, šipky, klávesnice, tah prstem, náhledy
- [x] NOVĚ: přepínač „Před / Po“ na kartách, kde zakázka má obojí
- [x] O službě: „Proč písmomalířství s Tři Mistry“ + „U ručního nápisu rozhodují proporce a čisté hrany. Motiv s vámi projdeme, domluvíme umístění a barvy a malbu dokončíme tak, aby byla dobře čitelná.“
- [x] Výhoda „Nápis podle vašeho návrhu“ – „Pošlete text, logo nebo motiv. Proporce, umístění a barvy sladíme s návrhem a charakterem povrchu.“
- [x] Výhoda „Fasáda, interiér i obnova“ – „Malujeme loga a nápisy na fasády i na stěny v interiéru. Obnovíme také stávající nápisy a značení na různých podkladech.“
- [x] Výhoda „Stejní lidé od návrhu po předání“ – „Kdo s vámi motiv projde, ten ho i namaluje. Termín potvrdíme předem a po práci uklidíme.“
- [x] „Jak probíhá realizace“
- [x] Krok 1 „Projdeme motiv“ – „Pošlete návrh, text a požadované rozměry.“
- [x] Krok 2 „Připravíme umístění“ – „Domluvíme proporce, barvy a podklad.“
- [x] Krok 3 „Přeneseme návrh“ – „Provedeme ruční malbu podle domluveného zadání.“
- [x] Krok 4 „Dokončíme detaily“ – „Zkontrolujeme hrany, čitelnost a výsledné provedení.“
- [x] „Cena a časté otázky“ (první otázka otevřená)
- [x] Otázka „Kolik stojí ruční nápis nebo logo?“ – „Cena závisí na rozměrech a složitosti motivu, přípravě podkladu a přístupu k místu malby. Pošlete motiv, rozměry a fotku plochy a připravíme nezávaznou cenu.“
- [x] Otázka „Co potřebujete pro nacenění nápisu nebo loga?“ – „Pošlete motiv, jeho rozměry, fotografii a materiál plochy. Cenu ovlivňuje složitost návrhu, příprava podkladu a přístup k místu malby.“
- [x] Otázka „Malujete loga také na fasády?“ – „Ano, podle materiálu a stavu venkovní plochy.“
- [x] Otázka „Umíte obnovit stávající nápis?“ – „Ano. Z fotografie a stavu podkladu navrhneme vhodný rozsah obnovy.“
- [x] Otázka „Jak dlouho malba nápisu trvá?“ – „Záleží na velikosti a složitosti motivu a na přípravě podkladu. Délku práce potvrdíme spolu s cenou.“
- [x] Otázka „Kde písmomalířství děláte?“ – „V celém Brně a okolí do zhruba 20 km, například v Modřicích, Šlapanicích, Kuřimi, Rosicích nebo Slavkově u Brna.“
- [x] Cena: „Kolik stojí ruční nápis nebo logo?“ – „Cenu počítáme podle konkrétního motivu a plochy. Příprava podkladu, malba i úklid jsou v ceně, kterou vám předem potvrdíme. Žádné skryté položky.“ (nadpisek „Cena nápisu“ je obsažen v nadpisu)
- [x] Faktor ceny „Velikost motivu“ – „Rozměry nápisu nebo loga na stěně.“
- [x] Faktor ceny „Složitost návrhu“ – „Písmo, detaily a tvar loga nebo malby.“
- [x] Faktor ceny „Podklad“ – „Materiál a stav plochy, potřebná příprava.“
- [x] Faktor ceny „Přístup k místu“ – „Interiér, fasáda nebo práce ve výšce.“
- [x] „Jak získat cenu“
- [x] Krok 1 „Pošlete motiv a fotku“ – „Stačí návrh nebo text, požadované rozměry a fotka plochy.“
- [x] Krok 2 „Ozveme se s cenou“ – „Připravíme nezávaznou cenu zdarma. U větší zakázky se přijedeme podívat.“
- [x] Krok 3 „Domluvíme termín“ – „Den nástupu i dokončení potvrdíme předem a dodržíme ho.“
- [x] „Chci cenu nápisu“ + „nebo zavolejte +420 774 927 182“
- [x] „Písmomalířství v Brně a okolí do 20 km“ (nadpisek „Kde pracujeme“ obsažen v nadpisu): Žabovřesky, Královo Pole, Líšeň, Bystrc, Bohunice, Židenice, Komín, Starý Lískovec, Střed, Modřice, Šlapanice, Kuřim, Rosice, Slavkov u Brna
- [x] Poptávka: „Pojďme se domluvit.“, „Pošlete nám stručné zadání. Probereme možnosti a připravíme nabídku podle skutečného rozsahu práce.“, „Pro první domluvu stačí: text, logo nebo motiv, rozměry a místo umístění, fotografie a materiál podkladu.“
- [x] Formulář s předvyplněnou službou „Písmomalířství“ a nápovědou „Uveďte rozměry, materiál podkladu, požadovaný text nebo motiv a termín. Přiložte fotografii místa a případný návrh.“
- [x] Mobilní lišta „Zavolat“ + „Nezávazně poptat“

## Děkujeme (`dekujeme.html`)

- [x] „Poptávka odeslána“
- [x] H1 „Děkujeme, ozveme se Vám co nejdříve“
- [x] „Vaši poptávku jsme v pořádku přijali. …“
- [x] „Ozveme se Vám – Obvykle do 1 pracovního dne od odeslání poptávky.“
- [x] „Domluvíme konzultaci – Nezávazně posoudíme rozsah prací a vhodný materiál.“
- [x] „Připravíme cenovou nabídku – Konkrétní cenu, termín a harmonogram realizace tentýž den.“
- [x] „Zpět na úvodní stránku“, „Zavolat nám“
- [x] noindex

## Ochrana osobních údajů (`ochrana-osobnich-udaju.html`)

- [x] Drobečková navigace Domů / Ochrana osobních údajů
- [x] „GDPR / osobní údaje“, H1 „Zásady zpracování osobních údajů“, úvodní odstavec
- [x] Obsah 1–7 s odkazy
- [x] 1 Kdo je správcem údajů (Tři Mistři s.r.o., Nové sady 988/2, Staré Brno, 602 00 Brno, IČO 30139015, OR Krajský soud v Brně oddíl C vložka 154435, e-mail, telefon)
- [x] 2 Jaké údaje zpracováváme – tabulka Situace / Jaké údaje (3 řádky)
- [x] 3 Účel a právní základ – 3 body
- [x] 4 Doba uchování – 3 body (12 měsíců…)
- [x] 5 Komu údaje předáváme – 3 body
- [x] 6 Cookies (kotva #cookies pro odkaz z panelu cookies)
- [x] 7 Vaše práva – 7 bodů + odkaz www.uoou.cz
- [x] Kontakt pro uplatnění práv (e-mail, telefon)
- [x] „Poslední aktualizace: srpen 2026.“

## Stránka 404 (`404.html`)

- [x] „404“, „Stránka nenalezena“
- [x] H1 „Tuhle stránku jsme bohužel nenamalovali“
- [x] „Odkaz může být zastaralý nebo jste zadali chybnou adresu. …“
- [x] „Zpět na úvodní stránku“, „Zavolat nám“
- [x] Odkazy: Malby interiéru, Dekorativní stěrky, Nátěry dřeva a kovů, Ocelové konstrukce, Tapetování, Nátěry fasád, Odstranění graffiti, Písmomalířství

## Vstupní stránky benátský štuk / dekorativní malování

- [x] Ověřeno: v menu, v sitemapě (16 adres) ani ve zdroji nejsou. Benátský štuk je jen technika ve skupině Dekorativní stěrky na úvodu – v návrhu je. Žádná další stránka nevzniká.
- [x] `cisteni-strech-okapu` je na živém webu přesměrování 301 na `natery-strech`; `galerie` a `sluzby` se nepoužívají (pravidlo) – v návrhu nejsou.

## Co chybělo v předchozím návrhu (unslop 23. 11.)

Měřeno stejným skriptem pokrytí proti předchozímu návrhu (`_build/data/pokryti-predchozi-navrh.json`):

| Stránka | Řádků textu živě | Chybělo v předchozím návrhu | Chybí ve v2 |
|---|---:|---:|---:|
| 404 | 54 | 52 (stránka neexistovala) | 0 |
| index | 249 | 25 | 3 |
| natery-interieru | 208 | 21 | 5 |
| dekoracni-sterky | 196 | 22 | 6 |
| natery-fasad | 182 | 174 (stránka neexistovala) | 6 |
| cisteni-fasad | 274 | 253 (stránka neexistovala) | 6 |
| natery-strech | 268 | 247 (stránka neexistovala) | 5 |
| natery-drevo-kovu | 195 | 187 (stránka neexistovala) | 6 |
| epoxidove-podlahy | 266 | 245 (stránka neexistovala) | 5 |
| mikrocement | 268 | 247 (stránka neexistovala) | 5 |
| specialni-natery | 273 | 252 (stránka neexistovala) | 6 |
| odstraneni-grafiti | 180 | 172 (stránka neexistovala) | 6 |
| pismomalirstvi | 176 | 168 (stránka neexistovala) | 6 |
| prumyslove-natery | 179 | 171 (stránka neexistovala) | 6 |
| sanace-po-zatekani | 276 | 255 (stránka neexistovala) | 6 |
| tapetovani | 183 | 175 (stránka neexistovala) | 6 |
| dekujeme | 53 | 52 (stránka neexistovala) | 0 |
| ochrana-osobnich-udaju | 102 | 94 (stránka neexistovala) | 0 |

Konkrétně chybělo:

- **15 z 18 stránek**: 12 služeb (tapetování, speciální nátěry, sanace, mikrocement, fasády, střechy, čištění fasád, graffiti, dřevo a kov, průmyslové nátěry, epoxidové podlahy, písmomalířství) + děkujeme + ochrana osobních údajů + 404. Odkazy vedly na živý web trimistri.cz.
- **Fotky realizací**: na službách byla jen titulní fotka každé zakázky (odkaz na jednu fotku v app.trimistri.cz), bez lightboxu. Teď 386 fotek ze 48 zakázek + 14 titulních/hero fotek, vše stažené v plném rozlišení a v lightboxu.
- **„Starší realizace“** stěrek (6 zakázek, 12 fotek: Velká Bíteš, Brno-Kunzova, Moravany, Rajhrad, Kamechy, Bohunice) – vynechané.
- **Štítky Před / Po / Průběh / Detail** u fotek – chyběly; teď v lightboxu, na přepínači karet a v bloku „Před a po“.
- Na úvodu: „Řeknete nám, co potřebujete změnit. Společně domluvíme postup, cenu a termín — a pustíme se do práce.“, „Tři Mistři — řemeslo v detailu“, hodnocení v hero, „Ukázky realizací“ u kategorií, „Číst celou recenzi“, „Recenze na Google“, „Zobrazit všech 29 recenzí“.
- Formulář: „Váš prostor. Naše řemeslo.“, „Pár detailů. A začneme.“, „Pošlete nám zadání…“, „Co budeme řešit“, skryté pole proti robotům.
- Panel cookies a tlačítko „Nastavení cookies“.
- Na službách: místa realizací v popiscích (Brno - Bohunice, Řečkovice, Herčíkova - Ordinace, Zlín - Ortodoncie, Veselá, Špitálka), hodnocení „5,0 / 5 · 29 recenzí na Google“.
- Fotka v postupu na úvodu se v předchozím návrhu nevykreslila (prázdný rámeček).

## Zbývající rozdíly po kontrole (záměrné)

Skript pokrytí hlásí po v2 jen tyto řádky – všechno jsou štítkové nadpisky nebo ozdoby, jejichž informace je v nadpisu nebo navigaci:

- [x] „BRNO · CZ“ (index) – ozdobný štítek bez informace, vynechán
- [x] „MALÍŘSTVÍ · NÁTĚRY · POVRCHY BRNO A OKOLÍ“ (index) – drobečková navigace + H1 „v Brně“; na úvodu „Brno a okolí“ v hero
- [x] „NAŠE SLUŽBY“ (index) – položka menu „Služby“ a H2 sekce
- [x] „TŘI MISTŘI / BRNO A OKOLÍ“ (14 stránek) – drobečková navigace + H1 „v Brně“; na úvodu „Brno a okolí“ v hero
- [x] „Prohlédnout realizaci ↗“ (11 stránek) – klik na fotku + aria-label „Otevřít realizaci …“
- [x] „01 / O SLUŽBĚ“ (14 stránek) – je ve skokové navigaci „O službě“
- [x] „KDE PRACUJEME“ (14 stránek) – obsaženo v H2 „… v Brně a okolí do 20 km“
- [x] „02 / NEZÁVAZNÁ POPTÁVKA“ (8 stránek) – nadpis formuláře „Nezávazná poptávka“ / tlačítka
- [x] „CENA STĚRKY“ (dekoracni-sterky) – obsaženo v H2 „Kolik stojí …“
- [x] „CENA FASÁDY“ (natery-fasad) – obsaženo v H2 „Kolik stojí …“
- [x] „CENA ČIŠTĚNÍ“ (cisteni-fasad) – obsaženo v H2 „Kolik stojí …“
- [x] „03 / NEZÁVAZNÁ POPTÁVKA“ (6 stránek) – nadpis formuláře „Nezávazná poptávka“ / tlačítka
- [x] „CENA NÁTĚRU STŘECHY“ (natery-strech) – obsaženo v H2 „Kolik stojí …“
- [x] „CENA NÁTĚRU“ (natery-drevo-kovu) – obsaženo v H2 „Kolik stojí …“
- [x] „CENA PODLAHY“ (epoxidove-podlahy) – obsaženo v H2 „Kolik stojí …“
- [x] „CENA MIKROCEMENTU“ (mikrocement) – obsaženo v H2 „Kolik stojí …“
- [x] „CENA SPECIÁLNÍHO NÁTĚRU“ (specialni-natery) – obsaženo v H2 „Kolik stojí …“
- [x] „CENA ODSTRANĚNÍ GRAFFITI“ (odstraneni-grafiti) – obsaženo v H2 „Kolik stojí …“
- [x] „CENA NÁPISU“ (pismomalirstvi) – obsaženo v H2 „Kolik stojí …“
- [x] „CENA PRŮMYSLOVÉHO NÁTĚRU“ (prumyslove-natery) – obsaženo v H2 „Kolik stojí …“
- [x] „CENA OPRAVY PO ZATÉKÁNÍ“ (sanace-po-zatekani) – obsaženo v H2 „Kolik stojí …“
- [x] „CENA TAPETOVÁNÍ“ (tapetovani) – obsaženo v H2 „Kolik stojí …“

## Počty sekcí a fotek: živě × v2 (skript `_build/tools/qa.mjs`, šířka 1440)

| Stránka | Sekcí živě | Sekcí v2 | Unikátních fotek živě | Fotek v2 v galerii/lightboxu | Poznámka |
|---|---:|---:|---:|---:|---|
| index | 6 | 6 | 18 | 70 | v2 navíc blok Před a po (4 zakázky, fotky ze služeb) |
| natery-interieru | 5 | 5 | 198 | 198 |  |
| tapetovani | 5 | 5 | 9 | 9 |  |
| specialni-natery | 6 | 6 | 10 | 10 |  |
| sanace-po-zatekani | 6 | 6 | 14 | 14 |  |
| dekoracni-sterky | 5 | 5 | 57 | 57 | včetně „Starší realizace“ ze stránkování |
| mikrocement | 5 | 5 | 0 | 0 |  |
| natery-fasad | 5 | 5 | 19 | 19 |  |
| natery-strech | 5 | 5 | 0 | 0 |  |
| cisteni-fasad | 6 | 6 | 7 | 7 |  |
| odstraneni-grafiti | 5 | 5 | 2 | 2 |  |
| natery-drevo-kovu | 5 | 5 | 61 | 61 |  |
| prumyslove-natery | 5 | 5 | 14 | 14 |  |
| epoxidove-podlahy | 5 | 5 | 0 | 0 |  |
| pismomalirstvi | 5 | 5 | 2 | 2 |  |
| dekujeme | 1 | 1 | 0 | 0 |  |
| ochrana-osobnich-udaju | 1 | 1 | 0 | 0 |  |
| 404 | 1 | 1 | 0 | 0 |  |

## Kontrola kvality (poslední běh)

- [x] 54 kombinací stránka × šířka (18 stránek × 1920/1440/390): vodorovné přetečení 0, rozbité obrázky 0, chyby v konzoli 0, odkazy na trimistri.cz 0, stránek bez právě jednoho H1 0
- [x] Mobilní menu: otevře true, odkazy viditelné true, Esc zavře true; lišta na mobilu true
- [x] Lightbox: otevře true, „Fotka 1 / 20“ → šipka → „Fotka 2 / 20“, fotka načtena (1536 px), 20 náhledů, po zavření fokus zpět true
- [x] Před/Po přepínač true; další realizace true; FAQ true
- [x] Formulář: prázdné odeslání → souhrn chyb true, fokus na souhrn true; špatný e-mail → aria-invalid true; předvyplněná služba „Malby interiéru“; nápověda se mění; platné odeslání → mailto (mailto:info@trimistri.cz?subject=Popt%C3%A1vka%20z%20webu%3A…) a potvrzení true
- [x] Recenze: viditelných 9 → po rozbalení 29; dialog celé recenze (Jiři Komínková)
- [x] Rychlý výběr služby předvyplní „Dekorativní stěrky“; omezený pohyb: přechody 0.12s; panel cookies se po volbě schová true
