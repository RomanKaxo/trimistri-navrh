# Tři Mistři — návrh webu

Veřejný návrh: **https://romankaxo.github.io/trimistri-navrh/**

Schválené hero, výrazná zlatá a krémová paleta, služby, realizace a poptávka. Návrh obsahuje 14 podstránek služeb, 37 původních realizací se 160 fotografiemi a 29 zákaznických recenzí.

## Struktura

- `index.html` — homepage
- `sluzby/` — samostatné služby s předvyplněnou poptávkou
- `galerie/` — kompletní galerie
- `navrhy/` — styly a interakce
- `assets/` — fotografie, lokální písmo Inter a GLightbox

GitHub Pages publikuje kořen větve `main`. Odkazy používají základní cestu `/trimistri-navrh/`.

Formulář připravuje zprávu v e-mailové aplikaci návštěvníka. Zprávu návštěvník odešle sám a fotografie přiloží k e-mailu. Telefonní odkazy fungují přímo. PHP serverová část, přístupové údaje a místní pracovní historie nejsou součástí této statické prezentace.

Recenze jsou statickým záznamem z Google; relativní stáří odpovídá okamžiku pořízení údajů. Návrh má nastavené `noindex`, aby nekonkuroval původnímu webu.

## Lokální náhled

Z adresáře repozitáře spusťte `python3 -m http.server 8080 --bind 127.0.0.1 --directory ..` a otevřete `http://127.0.0.1:8080/trimistri-navrh/`.

Fotografie, značka a obsah patří jejich vlastníkům. Inter a GLightbox zachovávají původní licenční údaje v dodaných souborech.
