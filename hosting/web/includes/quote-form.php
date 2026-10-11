<?php
/**
 * Sdílená sekce s poptávkovým formulářem.
 * Očekává $formStatus (viz includes/quote-form-session.php).
 * Volitelně $defaultService s hodnotou odpovídající <option> v selectu.
 */
$defaultService = $defaultService ?? '';
$serviceHints = [
  'Epoxidové podlahy' => 'Uveďte plochu v m², stav a materiál podkladu, využití prostoru, lokalitu a termín. Přiložte fotografie.',
  'Malby interiéru' => 'Uveďte přibližnou plochu stěn a stropů, stav podkladu a požadovaný termín. Bude prostor během malování obývaný?',
  'Dekorativní stěrky' => 'Uveďte místnost, přibližnou plochu a požadovaný vzhled. U koupelny napište, zda jde o sprchový kout. Přiložte fotku podkladu nebo inspiraci.',
  'Nátěry dřeva a kovů' => 'Napište, co potřebujete natřít (například okna, pergolu, plot nebo radiátory), počet či rozměry a stav starého nátěru. Připojte požadovaný termín a fotografie.',
  'Tapetování' => 'Uveďte rozměry stěn, stav podkladu a požadovaný termín. Máte tapetu již zakoupenou? Přiložte její typ či odkaz a fotografie stěny.',
  'Nátěry fasád' => 'Uveďte přibližnou plochu a výšku domu, stav omítky a přístup k fasádě. Chcete pouze čištění, nebo i nový nátěr? Připojte termín a fotografie.',
  'Čištění fasády' => 'Uveďte plochu a výšku fasády, druh znečištění a možnosti přístupu. Přiložte fotografie a požadovaný termín.',
  'Odstranění graffiti' => 'Uveďte materiál povrchu, přibližnou plochu a stáří graffiti. Přiložte fotografie a požadovaný termín zásahu.',
  'Písmomalířství' => 'Uveďte rozměry, materiál podkladu, požadovaný text nebo motiv a termín. Přiložte fotografii místa a případný návrh.',
  'Ocelové konstrukce' => 'Uveďte rozměry konstrukce, stav koroze, přístup a požadovaný termín. Přiložte fotografie.',
  'Mikrocement a stěrky přes obklady' => 'Uveďte místnost, plochu, typ podkladu a zda jde o mokrou zónu. Přiložte fotografie obkladu nebo stěny.',
  'Speciální interiérové nátěry' => 'Popište problém, místnost, rozsah a známou příčinu. Uveďte, zda jde o plíseň, požadavek na hygienický povrch nebo studenou stěnu.',
  'Sanace po zatékání' => 'Napište, kdy a odkud zatékalo, zda je příčina opravená, rozměr poškození a stav podkladu. Přiložte fotografie.',
  'Nátěry střech' => 'Uveďte typ a plochu krytiny, stáří, stav starého nátěru, sklon, rozsah nátěru okapů a svodů a možnosti přístupu. Přiložte fotografie.',
];
$messageHint = $serviceHints[$defaultService] ?? 'Popište stručně rozsah prací a ideální termín.';
?>
<?php
$messages = [
 'sent' => 'Poptávka byla úspěšně odeslána. Děkujeme, ozveme se vám.',
 'too-fast' => 'Počkejte prosím chvíli a zkuste formulář odeslat znovu.',
 'too-large' => 'Každá fotografie může mít nejvýše 4 MB, všechny dohromady 12 MB.',
 'too-many-files' => 'Můžete přiložit maximálně 5 fotografií.',
 'invalid-file' => 'Povoleny jsou pouze fotografie JPG, PNG a WebP.',
];
if ($formStatus !== ''): ?>
<p class="form-status <?= $formStatus === 'sent' ? 'form-status-success' : 'form-status-error' ?>" role="alert"><?= htmlspecialchars($messages[$formStatus] ?? 'Poptávku se nepodařilo odeslat. Zkontrolujte údaje a zkuste to znovu.', ENT_QUOTES, 'UTF-8') ?></p>
<?php endif; ?>
<form class="quote-form" action="send" method="post" enctype="multipart/form-data">
          
<input type="hidden" name="quote_form_token" value="<?= htmlspecialchars($_SESSION['quote_form_token'], ENT_QUOTES, 'UTF-8') ?>">
<input type="hidden" name="return_to" value="<?= htmlspecialchars(basename((string) ($_SERVER['SCRIPT_NAME'] ?? 'index.php')), ENT_QUOTES, 'UTF-8') ?>">
<div class="form-honeypot" aria-hidden="true">
            <label for="hp-field-x92">Nevyplňujte toto pole</label>
            <input type="text" id="hp-field-x92" name="hp_field_x92" tabindex="-1" autocomplete="off">
          </div>

          <div class="quote-form-grid">
            <div class="quote-form-group">
              <p class="form-section-label"><span>01</span> Kontaktní údaje <small class="quote-required-note">* povinné údaje</small></p>
              <div class="quote-contact-grid">
            <div class="quote-field">
              <label for="name" class="form-label">Jméno a příjmení <span class="required-mark" aria-hidden="true">*</span></label>
              <div class="input-icon">
                <i class="bi bi-person"></i>
                <input type="text" class="form-control" id="name" name="name" placeholder="Jan Novák" maxlength="100"
                  autocomplete="name" required>
              </div>
            </div>
            <div class="quote-field">
              <label for="phone" class="form-label">Telefon <span class="required-mark" aria-hidden="true">*</span></label>
              <div class="input-icon">
                <i class="bi bi-telephone"></i>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="+420 777 123 456"
                  maxlength="30" autocomplete="tel" required>
              </div>
            </div>
            <div class="quote-field">
              <label for="email" class="form-label">E-mail <span class="optional-label">(nepovinné)</span></label>
              <div class="input-icon">
                <i class="bi bi-envelope"></i>
                <input type="email" class="form-control" id="email" name="email" placeholder="vas@email.cz"
                  maxlength="254" autocomplete="email">
              </div>
            </div>
            <div class="quote-field">
              <label for="service" class="form-label">Typ služby <span class="required-mark" aria-hidden="true">*</span></label>
              <select class="form-select" id="service" name="service" required>
                <option value="" disabled <?= $defaultService === '' ? 'selected' : '' ?>>Vyberte službu</option>
                <option value="Malby interiéru"  <?= $defaultService === 'Malby interiéru' ? 'selected' : '' ?>>Malby interiéru</option>
                <option value="Dekorativní stěrky"  <?= $defaultService === 'Dekorativní stěrky' ? 'selected' : '' ?>>Dekorativní stěrky</option>
                <option value="Nátěry dřeva a kovů"  <?= $defaultService === 'Nátěry dřeva a kovů' ? 'selected' : '' ?>>Nátěry dřeva a kovů</option>
                <option value="Tapetování"  <?= $defaultService === 'Tapetování' ? 'selected' : '' ?>>Tapetování</option>
                <option value="Nátěry fasád"  <?= $defaultService === 'Nátěry fasád' ? 'selected' : '' ?>>Nátěry fasád</option>
                <option value="Čištění fasády"  <?= $defaultService === 'Čištění fasády' ? 'selected' : '' ?>>Čištění fasády</option>
                <option value="Odstranění graffiti"  <?= $defaultService === 'Odstranění graffiti' ? 'selected' : '' ?>>Odstranění graffiti</option>
                <option value="Písmomalířství"  <?= $defaultService === 'Písmomalířství' ? 'selected' : '' ?>>Písmomalířství</option>
                <option value="Epoxidové podlahy"  <?= $defaultService === 'Epoxidové podlahy' ? 'selected' : '' ?>>Epoxidové podlahy</option>
                <option value="Ocelové konstrukce"  <?= $defaultService === 'Ocelové konstrukce' ? 'selected' : '' ?>>Ocelové konstrukce</option>
                <option value="Mikrocement a stěrky přes obklady"  <?= $defaultService === 'Mikrocement a stěrky přes obklady' ? 'selected' : '' ?>>Mikrocement a stěrky přes obklady</option>
                <option value="Speciální interiérové nátěry"  <?= $defaultService === 'Speciální interiérové nátěry' ? 'selected' : '' ?>>Speciální interiérové nátěry</option>
                <option value="Sanace po zatékání"  <?= $defaultService === 'Sanace po zatékání' ? 'selected' : '' ?>>Sanace po zatékání</option>
                <option value="Nátěry střech"  <?= $defaultService === 'Nátěry střech' ? 'selected' : '' ?>>Nátěry střech, okapů a svodů</option>
              </select>
            </div>
            <div class="quote-field quote-field--wide">
              <label for="city" class="form-label">Město / obec realizace <span class="required-mark" aria-hidden="true">*</span></label>
              <div class="input-icon">
                <i class="bi bi-geo-alt"></i>
                <input type="text" class="form-control" id="city" name="city" placeholder="Např. Brno" maxlength="120"
                  autocomplete="address-level2" required>
              </div>
            </div>

              </div>
            </div>
            <div class="quote-form-group">
              <p class="form-section-label"><span>02</span> Detaily zakázky</p>
            <div class="quote-field">
              <label for="message" class="form-label">Popis zakázky</label>
              <p class="form-text" id="message-hint"><?= htmlspecialchars($messageHint, ENT_QUOTES, 'UTF-8') ?></p>
              <textarea class="form-control" id="message" name="message" rows="5" maxlength="5000"
                aria-describedby="message-hint" placeholder="Vaše zadání a případné dotazy"></textarea>
            </div>
            <div class="quote-field">
              <label for="photos" class="form-label">Fotky prostoru nebo fasády <span class="optional-label">(nepovinné)</span></label>
              <label class="tm-upload-zone" for="photos"><span class="tm-upload-icon" aria-hidden="true"><svg class="tm-icon " width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.45" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M12 16V2m-5 5 5-5 5 5M3 15v6h18v-6"/></svg></span><strong>Přidat fotografie</strong><span>JPG, PNG nebo WebP · až 5 fotek</span><input class="form-control" type="file" id="photos" name="photos[]" multiple accept=".jpg,.jpeg,.png,.webp" aria-describedby="photos-help"></label><p class="tm-upload-status" role="status" hidden></p>
              <div class="form-text" id="photos-help">Můžete nahrát maximálně 5 fotek, každou do 4 MB. Pomůže nám to rychleji
                odhadnout rozsah práce.</div>
            </div>
            </div>
          </div>
          <div class="quote-form-footer">
            <div class="quote-form-submit">
              <button class="btn btn-gold btn-lg tm-btn" type="submit"><span class="tm-cta-label">Odeslat poptávku</span><span aria-hidden="true">↗</span></button>
              <small class="privacy-note">Odesláním formuláře potvrzujete, že souhlasíte se
                <a href="./ochrana-osobnich-udaju" target="_blank" rel="noopener">zpracováním osobních údajů</a>.
                Údaje použijeme pouze pro vyřízení Vaší poptávky.</small>
            </div>
          </div>
        </form>
<script>
  (() => {
    const service = document.getElementById('service');
    const hint = document.getElementById('message-hint');
    const hints = {"Epoxidové podlahy":"Uveďte plochu v m², stav a materiál podkladu, využití prostoru, lokalitu a termín. Přiložte fotografie.","Malby interiéru":"Uveďte přibližnou plochu stěn a stropů, stav podkladu a požadovaný termín. Bude prostor během malování obývaný?","Dekorativní stěrky":"Uveďte místnost, přibližnou plochu a požadovaný vzhled. U koupelny napište, zda jde o sprchový kout. Přiložte fotku podkladu nebo inspiraci.","Nátěry dřeva a kovů":"Napište, co potřebujete natřít (například okna, pergolu, plot nebo radiátory), počet či rozměry a stav starého nátěru. Připojte požadovaný termín a fotografie.","Tapetování":"Uveďte rozměry stěn, stav podkladu a požadovaný termín. Máte tapetu již zakoupenou? Přiložte její typ či odkaz a fotografie stěny.","Nátěry fasád":"Uveďte přibližnou plochu a výšku domu, stav omítky a přístup k fasádě. Chcete pouze čištění, nebo i nový nátěr? Připojte termín a fotografie.","Čištění fasády":"Uveďte plochu a výšku fasády, druh znečištění a možnosti přístupu. Přiložte fotografie a požadovaný termín.","Odstranění graffiti":"Uveďte materiál povrchu, přibližnou plochu a stáří graffiti. Přiložte fotografie a požadovaný termín zásahu.","Písmomalířství":"Uveďte rozměry, materiál podkladu, požadovaný text nebo motiv a termín. Přiložte fotografii místa a případný návrh.","Ocelové konstrukce":"Uveďte rozměry konstrukce, stav koroze, přístup a požadovaný termín. Přiložte fotografie.","Mikrocement a stěrky přes obklady":"Uveďte místnost, plochu, typ podkladu a zda jde o mokrou zónu. Přiložte fotografie obkladu nebo stěny.","Speciální interiérové nátěry":"Popište problém, místnost, rozsah a známou příčinu. Uveďte, zda jde o plíseň, požadavek na hygienický povrch nebo studenou stěnu.","Sanace po zatékání":"Napište, kdy a odkud zatékalo, zda je příčina opravená, rozměr poškození a stav podkladu. Přiložte fotografie.","Nátěry střech":"Uveďte typ a plochu krytiny, stáří, stav starého nátěru, sklon, rozsah nátěru okapů a svodů a možnosti přístupu. Přiložte fotografie."};
    if (!service || !hint) return;
    const updateHint = () => {
      hint.textContent = hints[service.value] || 'Popište rozsah prací a požadovaný termín.';
      const serviceName=document.querySelector('[data-form-service]');
      if(serviceName) serviceName.textContent=service.value || 'Malby, nátěry a povrchy';
    };
    service.addEventListener('change', updateHint);
    updateHint();
  })();
</script>