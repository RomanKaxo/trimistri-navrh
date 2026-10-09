/* GitHub Pages: prepare an email in the visitor's own mail client. */
document.querySelectorAll('[data-email-form]').forEach(form => {
  form.addEventListener('submit', event => {
    event.preventDefault();
    const value = name => form.elements.namedItem(name)?.value?.trim() || '';
    const subject = `Nezávazná poptávka — ${value('service')}`;
    const body = [
      `Dobrý den, mám zájem o: ${value('service')}.`, '',
      `Jméno: ${value('name')}`, `Telefon: ${value('phone')}`,
      `E-mail: ${value('email') || 'neuveden'}`, `Místo realizace: ${value('city')}`, '',
      value('message'), '',
      form.querySelector('[type=file]').files.length ? 'Fotografie přikládám k e-mailu.' : ''
    ].join('\n');
    const status = form.querySelector('[data-email-status]');
    status.hidden = false;
    status.textContent = 'Otevřeli jsme připravený e-mail. Zprávu odešlete ve své poštovní aplikaci; vybrané fotografie přiložte ručně.';
    window.location.href = `mailto:info@trimistri.cz?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
  });
});
