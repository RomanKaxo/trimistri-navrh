# Tři Mistři — PHP verze pro hosting

**Na trimistri.cz nahrajte celý obsah složky `web/` do stejného webového kořene jako původní web.** Přeneste také skryté soubory `.htaccess` a `.user.ini`. Složka `web` se na serveru nevkládá jako další podadresář.

Tato verze zachovává všech 636 cest původního adresáře `/home/roman/Projects/trimistri/web`: PHP stránky v kořeni, `includes/`, `assets/`, formulář `send.php`, děkovací stránku, ochranu osobních údajů, ikony, ověřovací soubor Google, sitemapu a pravidla Apache. Aktuální vzhled návrhu je převeden do PHP. Styly a skripty návrhu jsou v původních adresářích `assets/css/` a `assets/js/`. Samostatná galerie má soubor `galerie.php` a adresu `/galerie`.

Původní adresy, například `/dekoracni-sterky`, `/natery-interieru` a `/sluzby`, zůstávají stejné. Prefix `/trimistri-navrh/` se v této verzi nepoužívá. PHP soubory mají přesměrování na čisté URL. Odstraněné adresy `/cenik` a `/renovace` zůstávají 404; čištění střech zachovává přesměrování na `/natery-strech`.

Formulář odesílá poptávku a fotografie přes původní PHP handler, včetně CSRF ochrany, kontroly souborů a omezení opakovaného odesílání. Původní příjemci a konfigurace administrace jsou zachováni. Propojení s administrací používá původní CMS bridge a validaci dat; nové realizace se zobrazují i u služeb, které nemají archivní fotografie. Při dokončeném importu se odpublikované realizace nevracejí ze statické kopie.

Veřejné stránky mají produkční canonical adresy a umožňují indexaci. Děkovací stránka, 404 a PDF zachovávají původní omezení indexace. `.user.ini` nastavuje limit jedné fotografie na 4 MB a celého POST požadavku na 16 MB u hostingu s PHP CGI/FPM. Hosting musí podporovat PHP, `mbstring`, `fileinfo`, `mail()` a Apache `mod_rewrite`; pro CMS je potřeba také PHP cURL. Doručení e-mailu na cílovém hostingu závisí na jeho poštovní konfiguraci.

## Ověření

- Všechny původní cesty jsou v balíčku; původní zdrojový web se nezměnil.
- Skutečný Apache: 19 stránek, 257 odkazovaných souborů, přesměrování, 404, blokování `includes/`, canonical, robots a PDF hlavičky.
- Syntaxe všech 39 PHP souborů a skriptů návrhu.
- Formulář včetně přílohy byl otestován přes místní náhradu sendmail, bez síťového odesílání e-mailu.
- CMS prošlo 16 kontrolami s místními daty, včetně nových realizací, importu, odpublikování a escapování textů. Živá dostupnost administrace nebyla součástí této kontroly.
- Prohlížeč: 20 rozložení při šířkách 320, 375, 768, 1440 a 1920 px; menu, Escape, předvyplnění formuláře, náhled a odebrání fotografie, rozbalení galerie a lightbox.

## Opětovné vytvoření

V kořeni repozitáře:

```sh
rtk proxy .venv/bin/python scripts/build-performance.py
rtk proxy python3 scripts/build-hosting.py --original /home/roman/Projects/trimistri/web
```

Zdrojové statické stránky pro veřejný náhled zůstávají v kořeni repozitáře. Pro hosting používejte PHP balíček `hosting/web/`.

Instalace nástrojů a měření rychlosti jsou v [PERFORMANCE.md](../PERFORMANCE.md). Hashe nových souborů dovolují dlouhou cache; PHP dokumenty s CSRF tokenem zůstávají `no-store`. První obrazovka se může odeslat už během načítání CMS galerií.
