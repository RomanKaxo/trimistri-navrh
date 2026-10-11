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

## Interakce

Mobilní hero s hlavičkou vyplňuje dostupnou výšku obrazovky a na nízkých displejích se může zvětšit podle obsahu. Jemně tmavší překryv zlepšuje čitelnost. Fotografie na desktopu reaguje mírným posunem na rolování a šipky tlačítek na hover i klávesnicový focus. Efekty respektují omezení pohybu v systému.

Mobilní hero skládá hlavní tlačítko a sekundární odkaz pod sebe. Nápis hlavního tlačítka je vystředěný společně se šipkou; na širších displejích tlačítka navazují na levý okraj textu. Hlavička používá vedle telefonního čísla ikonu telefonu na všech velikostech obrazovky. Podstránky služeb mají postupný nástup obsahu a fotografií, odezvu odkazů a formulářů na hover i focus a animované rozbalování FAQ a dalších realizací v prohlížečích s podporou animace přirozené výšky. Mobilní menu se rozbaluje s jemným nástupem a jeho ikona se mění na křížek.

Obsah každé služby rozdělují samostatné sekce pro rozsah práce, čtyřkrokový postup a časté otázky. Krátká navigace odkazuje přímo na tyto sekce a na vlastní realizace, pokud jsou k dispozici; jinak nabízí přechod na poptávku. FAQ začíná otázkou o ceně a odpovědi se rozbalují jednotlivě. Styly této obsahové struktury jsou v `navrhy/service-content.css`.

Tlačítko „Zobrazit další realizace“ po rozbalení zmizí. Galerie zůstává otevřená a nově zobrazené fotografie navazují na původní výběr.

Rychlý výběr služby na homepage předvyplní hlavní poptávku. Vybrané fotografie mají místní náhledy a lze je jednotlivě odebrat; stále je nutné přiložit je ručně do připraveného e-mailu.

## Lokální náhled

Z adresáře repozitáře spusťte `python3 -m http.server 8080 --bind 127.0.0.1 --directory ..` a otevřete `http://127.0.0.1:8080/trimistri-navrh/`.

Fotografie, značka a obsah patří jejich vlastníkům. Inter a GLightbox zachovávají původní licenční údaje v dodaných souborech.
