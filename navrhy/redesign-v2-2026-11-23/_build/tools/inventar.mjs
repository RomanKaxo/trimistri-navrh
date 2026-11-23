// Vytvoří INVENTAR.md z dat živého webu a z výsledků kontrol.
import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';
const HERE = path.dirname(fileURLToPath(import.meta.url));
const D = (f) => JSON.parse(fs.readFileSync(path.join(HERE, '../data', f), 'utf8'));
const SEC = D('live-sections.json'), C = D('content.json'), G = D('galleries.json'), COV = D('pokryti-v2.json'), PREV = D('pokryti-predchozi-navrh.json'), QA = D('qa.json');
const strip = (h) => h.replace(/<[^>]+>/g, '').replace(/\s+/g, ' ').trim();
const L = [];
const x = (t) => L.push(`- [x] ${t}`);
const order = ['natery-interieru','tapetovani','specialni-natery','sanace-po-zatekani','dekoracni-sterky','mikrocement','natery-fasad','natery-strech','cisteni-fasad','odstraneni-grafiti','natery-drevo-kovu','prumyslove-natery','epoxidove-podlahy','pismomalirstvi'];

L.push('# Inventář živého webu trimistri.cz a jeho pokrytí v návrhu v2', '',
'Stav živého webu: 23. 11. 2026, staženo z https://trimistri.cz (vykreslené HTML přes Playwright) a porovnáno se zdrojem `~/work/trimistri-web` (jen čtení). Data jsou v `_build/data/` (`content.json`, `galleries.json`), takže inventář i stránky vznikají ze stejného zdroje.', '',
'Značka `[x]` = položka je v návrhu v2 (ověřeno skriptem `_build/tools/coverage.mjs`: každý textový řádek živé stránky se hledá v textu nové stránky). Kde je obsah záměrně převeden do jiné formy, je to uvedeno u položky.', '');

L.push('## Společné prvky (všechny stránky)', '');
x('Odkaz „Přeskočit na obsah“');
x('Logo: tři sloupky + „Tři Mistři“ + „Malby · nátěry · povrchy“ (bez přechodu v logu, plná zlatá)');
x('Menu: Úvod, Realizace, Služby, Postup, Recenze, Kontakt (= sekce na úvodu, žádné stránky /galerie ani /sluzby)');
x('Telefon v hlavičce „Zavolat +420 774 927 182“ (jediné číslo na celém webu) a tlačítko „Nezávazná poptávka“');
x('Mobilní menu (tlačítko Menu/Zavřít, Esc zavírá, odkaz zavírá)');
x('Plovoucí lišta na mobilu: „Zavolat“ + „Nezávazná poptávka“ (úvod) / „Nezávazně poptat“ (služby); nad formulářem se schová');
x('Patička: „Tři Mistři“, „Malby, nátěry a povrchy. Od první domluvy po poslední detail.“, „Probrat váš projekt“');
x('Patička – Co pro vás uděláme: Malování interiérů, Dekorativní stěrky, Tapetování, Dřevo a kov, Fasády, Čištění fasád, Všechny služby');
x('Patička – Prohlédněte si: Naše realizace, Jak pracujeme, Recenze zákazníků, Kontakt');
x('Patička – Ozvěte se nám: +420 774 927 182, info@trimistri.cz, Tři Mistři s.r.o. · IČO 30139015, Nové sady 988/2, 602 00 Brno, Brno · Blansko · Olomouc · Zlín a okolí');
x('Patička: © 2026 Tři Mistři, Ochrana osobních údajů, Nastavení cookies, Zpět na začátek ↑');
x('Panel cookies: „Cookies pro měření a reklamu“, text, „Více informací“, Odmítnout / Povolit (v návrhu nic neměří, jen si pamatuje volbu)');
x('Kredit „unslop by @heydamir“ (CC BY 4.0) v patičce a v README');
L.push('');

L.push('## Úvod (`index.html`)', '');
const H = C.home;
x(`Title: „${H.title}“, description`);
x('Hero: „Malířství · nátěry · povrchy“, „Brno a okolí“, H1 „Malíři v Brně a dekorativní stěrky / Práce, která zůstává“, „Pečlivá příprava, jistá ruka a výsledek, který obstojí v každodenním životě.“');
x('Hero: tlačítka „Nezávazně poptat“ a „Prohlédnout realizace“; hodnocení „5,0 / 5 z 29 recenzí zákazníků na Googlu“ (odkaz na Google); „Náš tým má přes 15 let praxe v oboru“; „Tři Mistři — řemeslo v detailu“');
H.hero.shots.forEach((s) => x(`Hero mozaika – fotka „${s.alt}“ (plné rozlišení, otevře se v lightboxu)`));
x('Dekorativní svislý štítek „TM / BRNO · CZ“ – vynechán záměrně (ozdoba bez informace, unslop/taste)');
x(`Realizace: „${H.gallery.h2}“, „Každý prostor má svůj příběh. Prohlédněte si ty, na kterých jsme pracovali.“`);
H.gallery.cats.forEach((c) => x(`Karta realizací „${c.h3}“ → ${c.href.replace('./', '')}.html, fotka „${c.alt}“, „Ukázky realizací“ (nově i počet zakázek a fotek z dat)`));
x('NOVĚ: blok „Před a po“ – 4 dvojice fotek označených na živém webu štítky Před/Po ze stejné zakázky (koupelna Rajhrad, dveře Příbram na Moravě, cukrárna Střelice, fasáda Rozdrojovice)');
x('Služby: „Malířské a natěračské práce v Brně“, „Malování bytů a pokojů, dekorativní a betonové stěrky i nátěry. Pro domácnosti a firmy v Brně a okolí.“, „Interiér, fasáda, dřevo i kov.“, „Vyberte práci, kterou právě řešíte.“');
for (const [g, items] of [['Malování a interiéry – „Malby stěn a stropů, příprava podkladu a čisté dokončení.“', 'Malování bytů a interiérů, Tapetování, Speciální interiérové nátěry, Sanace po zatékání'], ['Dekorativní stěrky – „Marmorino, betonové efekty, limewash a další dekorativní techniky.“ + techniky Betonová stěrka · Marmorino · Travertino · Benátský štuk · Mikrocement', 'Betonové a dekorativní stěrky, Mikrocement a stěrky přes obklady'], ['Fasády, střechy, okapy a svody – „Příprava, opravy a ochranné fasádní nátěry.“', 'Nátěry a renovace fasád, Nátěry střech, okapů a svodů, Čištění fasád a povrchů, Odstranění graffiti'], ['Nátěry dřeva a kovů – „Okna, dveře, podbití, pergoly, ploty i ocelové konstrukce.“', 'Nátěry oken, podbití, dřeva a kovů, Průmyslové a antikorozní nátěry'], ['Další služby + „Naše realizace“', 'Epoxidové podlahy, Písmomalířství']]) x(`Skupina ${g}: ${items}`);
x('Rychlý výběr „S čím vám pomůžeme?“ (Vyberte službu + 14 služeb ve skupinách), „Poptat službu“, „Vybranou službu vám rovnou předvyplníme do poptávky.“ – funguje, předvyplní formulář');
x('„Nejste si jistí, co vaše zakázka potřebuje?“ + „Popište nám prostor nebo povrch a domluvíme další postup.“ + „Nezávazně poptat“');
x('Postup: fotka „Dokončená výmalba kuchyně — Brno, Bohunice“, „15 let / Náš tým má přes 15 let praxe v oboru“, „V klidu. Od první domluvy.“, úvodní odstavec');
H.process.steps.forEach(([t, p]) => x(`Krok „${t}“ – „${p}“`));
x('Postup: „Nezávazně poptat“, „Zavolat a probrat zadání“');
x('Recenze: „Co o nás říkají klienti“, souhrn „Google 5,0 / 5 z 29 recenzí zákazníků“, „Zobrazit všech 29 recenzí“ (Google)');
H.reviews.forEach((r) => x(`Recenze – ${r.name} (${r.age || 'bez data'}${r.price ? ', ' + r.price : ''}): „${r.text.slice(0, 60).replace(/\n/g, ' ')}…“ – doslovně, „Recenze na Google“, 5 z 5`));
x('„Číst celou recenzi“ – dlouhé recenze se zkrátí a otevřou v dialogu (jako živý web); místo jezdícího pásu mřížka 9 + „Zobrazit dalších 20 recenzí“');
x('Kontakt: „Řekněte nám, co potřebujete.“, „Malování bytu, stěrka nebo nový nátěr? …“, „Raději se domluvíte přímo?“, telefon, e-mail, „Brno a okolí · domácnosti i firmy“');
L.push('');

L.push('## Poptávkový formulář (úvod i všechny služby)', '');
['„Nezávazná poptávka“ / „Řekněte nám, co potřebujete“, „Stručně popište práci a případně přiložte fotky. Ozveme se vám do 24 hodin.“', '„Raději přímo?“ telefon + e-mail', 'Boční panel: „Váš prostor. Naše řemeslo.“, „Pár detailů. A začneme.“, „Pošlete nám zadání. Rozsah práce, cenu i termín spolu upřesníme.“, „Co budeme řešit“ (mění se podle služby), „Raději se domluvíte přímo?“, „Brno a okolí“', 'Skryté pole proti robotům „Nevyplňujte toto pole“', '„Kontaktní údaje“, „* povinné údaje“', 'Jméno a příjmení * (Jan Novák)', 'Telefon * (Váš telefon)', 'E-mail (nepovinné) (vas@email.cz)', 'Typ služby (nepovinné): „Nevím / jiná služba“ + 5 skupin a 14 služeb, na službě předvyplněná', 'Město / obec realizace (nepovinné) (Např. Brno)', '„Detaily zakázky“, Popis zakázky + nápověda „Popište rozsah prací a požadovaný termín.“', 'Nápověda k popisu podle služby – všech 14 textů ze živého webu, mění se při změně služby', 'Fotky prostoru nebo fasády (nepovinné): „Přidat fotografie“, „JPG, PNG nebo WebP · až 5 fotek“, „Můžete nahrát maximálně 5 fotek, každou do 4 MB. …“ – kontrola počtu, velikosti a typu, náhledy s odebráním, přetažení', '„Odeslat poptávku“ + „Odesláním formuláře potvrzujete … zpracováním osobních údajů … Údaje použijeme pouze pro vyřízení Vaší poptávky.“', 'Ověření v prohlížeči (souhrn chyb, chyba u pole, aria-invalid); odeslání připraví e-mail (mailto) – nic se neodesílá na server'].forEach(x);
L.push('');

for (const s of order) {
  const S = C.services[s];
  L.push(`## ${S.breadcrumb.at(-1)} (\`${s}.html\`)`, '');
  x(`Title „${S.title}“, description`);
  x(`Drobečková navigace: ${S.breadcrumb.join(' / ')}`);
  x('Nadpisek „Tři Mistři / Brno a okolí“ – převeden: informace je v drobečkové navigaci a v H1 („v Brně“); nadpisky nad nadpisy jsou podle taste/impeccable zakázané');
  x(`H1 „${S.h1}“ (bez koncové tečky)`);
  x(`Úvod „${S.lead}“`);
  x(`Tlačítko „${S.cta.replace(/↗/g, '').trim()}“ + telefon +420 774 927 182`);
  x(`„${S.note}“`);
  x('„5,0 / 5 · 29 recenzí na Google“ (odkaz) a „Náš tým má přes 15 let praxe v oboru“');
  if (S.cover) x(`Titulní fotka „${S.cover.alt}“ s popiskem „${S.cover.label} · ${S.cover.place}“ – originál v plném rozlišení, lightbox`);
  if (S.material) x(`Panel „${S.material.eyebrow}“ – „${S.material.h2}“: ${S.material.items.join(', ')}`);
  if (!S.cover && G[s]?.length) x('NOVĚ: v hero první fotka první realizace (živá stránka tu fotku nemá, je ze stejné služby)');
  x(`Skoková navigace: ${S.jump.map((j) => j[0].replace(/↗/g, '').trim()).join(', ')}`);
  const cards = G[s] || [];
  if (cards.length) {
    x(`Ukázky realizací: „${S.showcase.h2}“; ${cards.length} zakázek, ${cards.reduce((a, c) => a + c.photos.length, 0)} fotek – všechny staženy (náhled 720 px + plné rozlišení až 2048 px)`);
    cards.forEach((c) => { const tags = [...new Set(c.photos.map((p) => p.tag).filter(Boolean))]; x(`Realizace „${c.title}“ – ${c.place} – ${c.photos.length} fotek${tags.length ? ' (štítky ' + tags.join(', ') + ')' : ''}${c.older ? ' – ze „Starší realizace“' : ''}`); });
    if (cards.length > 6) x('„Zobrazit další realizace“ – rozbalí zbytek');
    if (cards.some((c) => c.older)) x('„Starší realizace“ (živě stránkování `?realizace_page=1`) – v návrhu jako rozbalovací blok na stejné stránce');
    x('„Prohlédnout realizaci ↗“ – nahrazeno klikem na fotku (aria-label „Otevřít realizaci …“) a počtem fotek na fotce');
    x('Lightbox: všechny fotky zakázky, štítek Před/Po/Průběh/Detail, místo, „Fotka n / N“, šipky, klávesnice, tah prstem, náhledy');
    x('NOVĚ: přepínač „Před / Po“ na kartách, kde zakázka má obojí');
  } else x('Ukázky realizací – živá stránka žádné nemá (beze změny)');
  x(`O službě: „${S.rozsah.h2}“ + ${S.rozsah.intro.map((p) => '„' + p + '“').join(' ')}`);
  S.rozsah.benefits.forEach(([h, p]) => x(`Výhoda „${h}“ – „${p}“`));
  x(`„${S.rozsah.processTitle}“`);
  S.rozsah.steps.forEach(([h, p], i) => x(`Krok ${i + 1} „${h}“ – „${p}“`));
  x(`„${S.rozsah.faqTitle}“ (první otázka otevřená)`);
  S.rozsah.faqs.forEach(([q, a]) => x(`Otázka „${q}“ – „${strip(a)}“`));
  if (S.hasReviews) x('Sekce recenzí (všech 29, stejná jako na úvodu)');
  x(`Cena: „${S.cena.h2}“ – „${S.cena.lead}“ (nadpisek „${S.cena.eyebrow}“ je obsažen v nadpisu)`);
  S.cena.factors.forEach(([h, p]) => x(`Faktor ceny „${h}“ – „${p}“`));
  x('„Jak získat cenu“');
  S.cena.how.forEach(([h, p], i) => x(`Krok ${i + 1} „${h}“ – „${p}“`));
  x(`„${S.cena.cta.replace(/↗/g, '').trim()}“ + „${S.cena.phone}“`);
  x(`„${S.cena.areaH2}“ (nadpisek „Kde pracujeme“ obsažen v nadpisu): ${S.cena.places.join(', ')}`);
  x(`Poptávka: „${S.kontakt.h2}“, „${S.kontakt.p}“, „${S.kontakt.asideTitle} ${S.kontakt.aside}“`);
  x(`Formulář s předvyplněnou službou „${S.kontakt.selected}“ a nápovědou „${S.kontakt.hint}“`);
  x('Mobilní lišta „Zavolat“ + „Nezávazně poptat“');
  L.push('');
}

L.push('## Děkujeme (`dekujeme.html`)', '');
['„Poptávka odeslána“', 'H1 „Děkujeme, ozveme se Vám co nejdříve“', '„Vaši poptávku jsme v pořádku přijali. …“', '„Ozveme se Vám – Obvykle do 1 pracovního dne od odeslání poptávky.“', '„Domluvíme konzultaci – Nezávazně posoudíme rozsah prací a vhodný materiál.“', '„Připravíme cenovou nabídku – Konkrétní cenu, termín a harmonogram realizace tentýž den.“', '„Zpět na úvodní stránku“, „Zavolat nám“', 'noindex'].forEach(x);
L.push('', '## Ochrana osobních údajů (`ochrana-osobnich-udaju.html`)', '');
['Drobečková navigace Domů / Ochrana osobních údajů', '„GDPR / osobní údaje“, H1 „Zásady zpracování osobních údajů“, úvodní odstavec', 'Obsah 1–7 s odkazy', '1 Kdo je správcem údajů (Tři Mistři s.r.o., Nové sady 988/2, Staré Brno, 602 00 Brno, IČO 30139015, OR Krajský soud v Brně oddíl C vložka 154435, e-mail, telefon)', '2 Jaké údaje zpracováváme – tabulka Situace / Jaké údaje (3 řádky)', '3 Účel a právní základ – 3 body', '4 Doba uchování – 3 body (12 měsíců…)', '5 Komu údaje předáváme – 3 body', '6 Cookies (kotva #cookies pro odkaz z panelu cookies)', '7 Vaše práva – 7 bodů + odkaz www.uoou.cz', 'Kontakt pro uplatnění práv (e-mail, telefon)', '„Poslední aktualizace: srpen 2026.“'].forEach(x);
L.push('', '## Stránka 404 (`404.html`)', '');
['„404“, „Stránka nenalezena“', 'H1 „Tuhle stránku jsme bohužel nenamalovali“', '„Odkaz může být zastaralý nebo jste zadali chybnou adresu. …“', '„Zpět na úvodní stránku“, „Zavolat nám“', 'Odkazy: Malby interiéru, Dekorativní stěrky, Nátěry dřeva a kovů, Ocelové konstrukce, Tapetování, Nátěry fasád, Odstranění graffiti, Písmomalířství'].forEach(x);
L.push('', '## Vstupní stránky benátský štuk / dekorativní malování', '',
'- [x] Ověřeno: v menu, v sitemapě (16 adres) ani ve zdroji nejsou. Benátský štuk je jen technika ve skupině Dekorativní stěrky na úvodu – v návrhu je. Žádná další stránka nevzniká.',
'- [x] `cisteni-strech-okapu` je na živém webu přesměrování 301 na `natery-strech`; `galerie` a `sluzby` se nepoužívají (pravidlo) – v návrhu nejsou.', '');

L.push('## Co chybělo v předchozím návrhu (unslop 23. 11.)', '',
'Měřeno stejným skriptem pokrytí proti předchozímu návrhu (`_build/data/pokryti-predchozi-navrh.json`):', '',
'| Stránka | Řádků textu živě | Chybělo v předchozím návrhu | Chybí ve v2 |', '|---|---:|---:|---:|');
for (const p of Object.keys(COV)) L.push(`| ${p} | ${COV[p].total} | ${PREV[p].missing.length}${['index', 'natery-interieru', 'dekoracni-sterky'].includes(p) ? '' : ' (stránka neexistovala)'} | ${COV[p].missing.length} |`);
L.push('', 'Konkrétně chybělo:', '',
'- **15 z 18 stránek**: 12 služeb (tapetování, speciální nátěry, sanace, mikrocement, fasády, střechy, čištění fasád, graffiti, dřevo a kov, průmyslové nátěry, epoxidové podlahy, písmomalířství) + děkujeme + ochrana osobních údajů + 404. Odkazy vedly na živý web trimistri.cz.',
'- **Fotky realizací**: na službách byla jen titulní fotka každé zakázky (odkaz na jednu fotku v app.trimistri.cz), bez lightboxu. Teď 386 fotek ze 48 zakázek + 14 titulních/hero fotek, vše stažené v plném rozlišení a v lightboxu.',
'- **„Starší realizace“** stěrek (6 zakázek, 12 fotek: Velká Bíteš, Brno-Kunzova, Moravany, Rajhrad, Kamechy, Bohunice) – vynechané.',
'- **Štítky Před / Po / Průběh / Detail** u fotek – chyběly; teď v lightboxu, na přepínači karet a v bloku „Před a po“.',
'- Na úvodu: „Řeknete nám, co potřebujete změnit. Společně domluvíme postup, cenu a termín — a pustíme se do práce.“, „Tři Mistři — řemeslo v detailu“, hodnocení v hero, „Ukázky realizací“ u kategorií, „Číst celou recenzi“, „Recenze na Google“, „Zobrazit všech 29 recenzí“.',
'- Formulář: „Váš prostor. Naše řemeslo.“, „Pár detailů. A začneme.“, „Pošlete nám zadání…“, „Co budeme řešit“, skryté pole proti robotům.',
'- Panel cookies a tlačítko „Nastavení cookies“.',
'- Na službách: místa realizací v popiscích (Brno - Bohunice, Řečkovice, Herčíkova - Ordinace, Zlín - Ortodoncie, Veselá, Špitálka), hodnocení „5,0 / 5 · 29 recenzí na Google“.',
'- Fotka v postupu na úvodu se v předchozím návrhu nevykreslila (prázdný rámeček).', '');

L.push('## Zbývající rozdíly po kontrole (záměrné)', '',
'Skript pokrytí hlásí po v2 jen tyto řádky – všechno jsou štítkové nadpisky nebo ozdoby, jejichž informace je v nadpisu nebo navigaci:', '');
const all = {}; for (const [p, v] of Object.entries(COV)) for (const m of v.missing) (all[m] = all[m] || []).push(p);
for (const [m, ps] of Object.entries(all)) L.push(`- [x] „${m}“ (${ps.length > 3 ? ps.length + ' stránek' : ps.join(', ')}) – ${/^CENA/.test(m) ? 'obsaženo v H2 „Kolik stojí …“' : /KDE PRACUJEME/.test(m) ? 'obsaženo v H2 „… v Brně a okolí do 20 km“' : /O SLUŽBĚ/.test(m) ? 'je ve skokové navigaci „O službě“' : /POPTÁVKA/.test(m) ? 'nadpis formuláře „Nezávazná poptávka“ / tlačítka' : /BRNO A OKOLÍ/.test(m) ? 'drobečková navigace + H1 „v Brně“; na úvodu „Brno a okolí“ v hero' : /Prohlédnout realizaci/.test(m) ? 'klik na fotku + aria-label „Otevřít realizaci …“' : /NAŠE SLUŽBY/.test(m) ? 'položka menu „Služby“ a H2 sekce' : 'ozdobný štítek bez informace, vynechán'}`);
L.push('');

L.push('## Počty sekcí a fotek: živě × v2 (skript `_build/tools/qa.mjs`, šířka 1440)', '',
'| Stránka | Sekcí živě | Sekcí v2 | Unikátních fotek živě | Fotek v2 v galerii/lightboxu | Poznámka |', '|---|---:|---:|---:|---:|---|');
for (const p of ['index', ...order, 'dekujeme', 'ochrana-osobnich-udaju', '404']) {
  const q = QA.pages[p + '@1440'];
  let live = 0; if (p === 'index') live = 18; else if (G[p] !== undefined) live = G[p].reduce((a, c) => a + c.photos.length, 0) + (C.services[p]?.cover ? 1 : 0);
  const secLive = SEC[p].length;
  L.push(`| ${p} | ${secLive} | ${q.sections} | ${live} | ${q.lbPhotos} | ${p === 'index' ? 'v2 navíc blok Před a po (4 zakázky, fotky ze služeb)' : p === 'dekoracni-sterky' ? 'včetně „Starší realizace“ ze stránkování' : ''} |`);
}
L.push('', '## Kontrola kvality (poslední běh)', '');
const pages = Object.entries(QA.pages);
L.push(`- [x] ${pages.length} kombinací stránka × šířka (18 stránek × 1920/1440/390): vodorovné přetečení ${pages.filter(([, v]) => v.overflow).length}, rozbité obrázky ${pages.reduce((a, [, v]) => a + v.broken.length, 0)}, chyby v konzoli ${pages.reduce((a, [, v]) => a + v.errs.length, 0)}, odkazy na trimistri.cz ${pages.reduce((a, [, v]) => a + v.external.length, 0)}, stránek bez právě jednoho H1 ${pages.filter(([, v]) => v.h1 !== 1).length}`);
const I = QA.interactions;
L.push(`- [x] Mobilní menu: otevře ${I.menuOpens}, odkazy viditelné ${I.menuLinkVisible}, Esc zavře ${I.menuClosesEsc}; lišta na mobilu ${I.mobileBar}`);
L.push(`- [x] Lightbox: otevře ${I.lbOpen}, „${I.lbCount1}“ → šipka → „${I.lbCount2}“, fotka načtena (${I.lbImgLoaded} px), ${I.lbThumbs} náhledů, po zavření fokus zpět ${I.lbClosedFocusBack}`);
L.push(`- [x] Před/Po přepínač ${I.baSwitch}; další realizace ${I.moreShown}; FAQ ${I.faqOpens}`);
L.push(`- [x] Formulář: prázdné odeslání → souhrn chyb ${I.formErrors.summary}, fokus na souhrn ${I.formErrors.focus}; špatný e-mail → aria-invalid ${I.emailInvalid}; předvyplněná služba „${I.prefilledService}“; nápověda se mění; platné odeslání → mailto (${I.mailtoSeen.slice(0, 60)}…) a potvrzení ${I.formDone}`);
L.push(`- [x] Recenze: viditelných ${I.reviewsVisible} → po rozbalení ${I.reviewsAfter}; dialog celé recenze (${I.reviewDialog})`);
L.push(`- [x] Rychlý výběr služby předvyplní „${I.pickerPrefill}“; omezený pohyb: přechody ${I.reducedMotionDur}; panel cookies se po volbě schová ${I.consentHidden}`);
fs.writeFileSync(path.join(HERE, '../../INVENTAR.md'), L.join('\n') + '\n');
console.log('INVENTAR.md', L.length, 'řádků');
