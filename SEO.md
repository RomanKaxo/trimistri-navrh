# Popisy stránek ve vyhledávání

Google vybírá úryvek podle dotazu z obsahu stránky a může použít meta description.
Text z Google Ads se do organických výsledků nepřenáší. Ani správný meta popis
nezaručuje jeho doslovné zobrazení.

Úprava z 12. října 2026:

- Patička má `data-nosnippet` na vnitřním `div`, kontaktní sekce na `section`.
  Google tak nemá vybírat opakované kontaktní a formulářové pokyny do úryvků.
- Sdílený formulář má vlastní `div data-nosnippet`, aby stejná ochrana fungovala
  také na původních PHP stránkách. Formulář, CSRF token, validace a backend zůstaly
  zachované.
- Galerie má vlastní popis realizací. Domovský popis obsahuje název Tři Mistři.
- Obsah malování vysvětluje cenu za m² a celkový rozsah práce. Dekorativní stěrky
  výslovně uvádějí benátský štuk, výběr techniky a odkaz na samostatnou stránku
  mikrocementu. Cena ani vhodnost do mokrých zón nejsou paušálně slibované.

## Kde upravovat

Statické zdroje jsou `index.html`, `galerie/index.html` a
`sluzby/*/index.html`. Hostingový export vytváří `scripts/build-hosting.py`.
Sdílené PHP soubory proto neupravujte bez odpovídající úpravy zdroje nebo builderu.

`data-nosnippet` patří pouze na podporované prvky `div`, `span` a `section`.
Nenastavujte jej na celou stránku, hlavní obsah služby ani přímo na `form`.
Označení neskrývá obsah uživateli a neblokuje procházení odkazů ani indexaci.

## Ověření

- 19 změněných PHP souborů prošlo kontrolou syntaxe.
- Všech 636 původních cest zůstalo zachovaných, původní soubory nebyly změněny.
- 16 offline kontrol CMS galerie prošlo.
- 18 živých adres mělo HTTP 200 a vlastní meta description.
- Formuláře měly 64znakový CSRF token a odpovídající `no-store` hlavičku.
- Domovská stránka, malování a stěrky prošly kontrolou šířek 390 a 1440 px.
  Nebylo zjištěno vodorovné přetékání.

Úryvky ve výsledcích se mohou změnit až po novém zpracování stránky Googlem.
Po nasazení je vhodné ověřit URL v Search Console a požádat o novou indexaci,
pokud má přihlášený účet přístup k ověřené službě. Samotné nasazení není důkazem
aktualizace výsledků vyhledávání.

[Dokumentace Google k úryvkům a data-nosnippet](https://developers.google.com/search/docs/appearance/snippet)
