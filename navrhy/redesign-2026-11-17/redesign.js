// Tři Mistři · návrh 17. 11. 2026. Doplňky nad dnešním webem; žádný text se tu nevymýšlí,
// vše se bere z prvků, které na stránce už jsou.
(() => {
  // Náhled: formulář nic neodesílá.
  document.querySelectorAll('form').forEach(f => f.addEventListener('submit', e => {
    e.preventDefault();
    const b = f.querySelector('button[type="submit"],button:not([type])');
    if (b && !f.querySelector('.r-preview-note')) { const n = document.createElement('p'); n.className = 'r-preview-note form-text'; n.textContent = 'Náhled návrhu: formulář se neodesílá.'; b.insertAdjacentElement('afterend', n); }
  }));

  // Úvod: hodnocení z Googlu z oddílu Recenze i do úvodu (stejná čísla, stejný odkaz).
  const copy = document.querySelector('.hero-scene .hero-copy'), sum = document.querySelector('.tm-google-summary');
  if (copy && sum && !copy.querySelector('.r-hero-trust')) {
    const stars = sum.querySelector('.tm-google-stars')?.textContent.trim() || '';
    const rest = sum.textContent.replace(/\s+/g, ' ').replace('Google', '').replace(stars, '').replace('↗', '').trim();
    const m = rest.match(/^([\d,]+\s*\/\s*\d+)\s*(.*)$/);
    const a = document.createElement('a'); a.className = 'r-hero-trust'; a.href = sum.href; a.target = '_blank'; a.rel = 'noopener';
    const s = document.createElement('span'); s.className = 'r-stars'; s.textContent = stars; s.setAttribute('aria-hidden', 'true');
    const t = document.createElement('span'); t.textContent = m ? m[1] : rest;
    const sm = document.createElement('small'); sm.textContent = (m ? m[2] : '') + ' na Googlu';
    a.append(s, t, sm); copy.append(a);
  }

  // Telefon: lišta Zavolat / Nezávazná poptávka tam, kde ji stránka ještě nemá.
  const phone = document.querySelector('.tm-header-phone'), quote = document.querySelector('.tm-header-quote');
  if (phone && quote && !document.querySelector('.tm-service-mobile-contact')) {
    const bar = document.createElement('div'); bar.className = 'r-mobile-bar';
    const a1 = document.createElement('a'); a1.href = phone.getAttribute('href'); a1.textContent = 'Zavolat';
    const a2 = document.createElement('a'); a2.href = '#poptavka'; a2.textContent = (quote.querySelector('.tm-cta-label') || quote).textContent.trim();
    bar.append(a1, a2); document.body.append(bar); document.body.classList.add('r-has-bar');
    const form = document.getElementById('poptavka');
    const upd = () => { const y = scrollY > innerHeight * .6; const near = form && form.getBoundingClientRect().top < innerHeight * .9 && form.getBoundingClientRect().bottom > 0; bar.classList.toggle('is-on', y && !near); };
    addEventListener('scroll', upd, { passive: true }); upd();
  }

})();
