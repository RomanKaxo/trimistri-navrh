/* Tři Mistři · redesign (náhled 13. 11. 2026). Bez knihoven, bez síťových požadavků. */
(() => {
  const d = document;
  d.documentElement.classList.add('js');

  // Nadpis podle klíčového slova reklamy: ?v=<klíč> vybere jen z předem schválených variant.
  const h1 = d.querySelector('h1[data-variants]');
  if (h1) {
    try {
      const v = new URLSearchParams(location.search).get('v');
      const map = JSON.parse(h1.dataset.variants);
      if (v && Object.prototype.hasOwnProperty.call(map, v)) h1.textContent = map[v];
    } catch (e) { /* výchozí nadpis zůstává */ }
  }

  // Před a po: posuvník nad dvěma fotkami ze stejné realizace.
  d.querySelectorAll('.ba').forEach(box => {
    const input = box.querySelector('input');
    const set = () => box.style.setProperty('--pos', input.value + '%');
    input.addEventListener('input', set);
    set();
  });

  // Vzorník: klik na povrch ukáže celou fotku ze stejné zakázky.
  d.querySelectorAll('[data-vz]').forEach(box => {
    const img = box.querySelector('.vz-stage img'), cap = box.querySelector('.vz-stage figcaption');
    const name = box.querySelector('.vz-name'), txt = box.querySelector('.vz-txt');
    const btns = box.querySelectorAll('.vz-list button');
    btns.forEach(b => b.addEventListener('click', () => {
      btns.forEach(x => x.setAttribute('aria-pressed', String(x === b)));
      img.src = b.dataset.src; img.srcset = b.dataset.srcset; img.alt = b.dataset.alt;
      cap.innerHTML = b.dataset.cap; name.textContent = b.dataset.name; txt.textContent = b.dataset.txt;
    }));
  });

  // Formulář je jen náhled: nic neodesílá, jen ukáže, co by se stalo.
  d.querySelectorAll('form.quote').forEach(form => {
    form.addEventListener('submit', e => {
      e.preventDefault();
      let ok = true;
      form.querySelectorAll('[required]').forEach(el => {
        const bad = !el.value.trim() || (el.type === 'tel' && el.value.replace(/\D/g, '').length < 9);
        el.setAttribute('aria-invalid', String(bad));
        if (bad && ok) { el.focus(); ok = false; }
      });
      const msg = form.querySelector('.form-msg');
      msg.hidden = false;
      msg.textContent = ok
        ? 'Náhled návrhu: formulář nic neodeslal. V ostré verzi tady proběhne odeslání a přechod na stránku s poděkováním (měření konverze).'
        : 'Vyplňte prosím jméno a telefon, ať se vám můžeme ozvat.';
    });
  });

  // Přilepená lišta na mobilu: ukáže se po odjetí z úvodu, schová se u formuláře.
  const bar = d.querySelector('.stick');
  const hero = d.querySelector('.hero, .home-hero');
  if (bar && hero && 'IntersectionObserver' in window) {
    let heroVisible = true, formVisible = false;
    const upd = () => bar.classList.toggle('on', !heroVisible && !formVisible);
    new IntersectionObserver(([e]) => { heroVisible = e.isIntersecting; upd(); }, {rootMargin: '0px 0px -40% 0px'}).observe(hero.querySelector('.hero-m, .hero-cta-m') || hero);
    const forms = d.querySelectorAll('form.quote');
    const seen = new Set();
    const fo = new IntersectionObserver(es => {
      es.forEach(e => e.isIntersecting ? seen.add(e.target) : seen.delete(e.target));
      formVisible = seen.size > 0; upd();
    });
    forms.forEach(f => fo.observe(f));
  } else if (bar) bar.classList.add('on');

  // Jemný nástup bloků při posunu (vypnuto při prefers-reduced-motion v CSS).
  const items = d.querySelectorAll('.rv-up');
  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver(es => es.forEach(e => {
      if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
    }), {rootMargin: '0px 0px -8% 0px'});
    items.forEach((el, i) => { el.style.transitionDelay = (i % 4) * 70 + 'ms'; io.observe(el); });
  } else items.forEach(el => el.classList.add('in'));
})();
