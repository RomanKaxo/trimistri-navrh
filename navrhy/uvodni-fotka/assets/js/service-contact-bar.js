/* Spodní lišta s telefonem a poptávkou na mobilu: ukáže se až po odrolování z úvodu a zmizí, když je vidět poptávkový formulář. */
(() => {
  const bar = document.querySelector('.tm-service-mobile-contact');
  const hero = document.querySelector('.tm-detail-actions');
  if (!bar || !hero || !('IntersectionObserver' in window)) { bar?.classList.add('is-visible'); return; }
  const form = document.getElementById('poptavka');
  const seen = { hero: true, form: false };
  const update = () => bar.classList.toggle('is-visible', !seen.hero && !seen.form);
  new IntersectionObserver(entries => { seen.hero = entries.at(-1).isIntersecting; update(); }).observe(hero);
  if (form) new IntersectionObserver(entries => { seen.form = entries.at(-1).isIntersecting; update(); }, { rootMargin: '0px 0px -10% 0px' }).observe(form);
})();
