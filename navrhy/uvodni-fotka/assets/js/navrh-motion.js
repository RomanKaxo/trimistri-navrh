/* Přístupné, volitelné pohybové chování. Obsah zůstává při vypnutém JS viditelný. */
(() => {
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  // Navigation is initialized in the head, before the layout can shift.
  // Keep older cached documents working while the head/footer are being updated.
  if (!window.tmMenuReady) {
    document.documentElement.classList.add('menu-js');
    document.querySelectorAll('[data-menu-toggle]').forEach(button => {
      const menu = document.getElementById(button.getAttribute('aria-controls'));
      if (!menu) return;
      const close = () => { button.setAttribute('aria-expanded', 'false'); menu.classList.remove('is-open'); };
      button.addEventListener('click', () => {
        const open = button.getAttribute('aria-expanded') !== 'true';
        button.setAttribute('aria-expanded', String(open));
        menu.classList.toggle('is-open', open);
      });
      menu.addEventListener('click', event => { if (event.target.closest('a')) close(); });
      document.addEventListener('keydown', event => {
        if (event.key === 'Escape' && button.getAttribute('aria-expanded') === 'true') { close(); button.focus(); }
      });
    });
  }
  if (reduceMotion || !('IntersectionObserver' in window)) return;
  document.documentElement.classList.add('motion-ready');
  const observer = new IntersectionObserver((entries, currentObserver) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('is-revealed');
      currentObserver.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -4% 0px' });
  document.querySelectorAll('[data-reveal]').forEach((item) => observer.observe(item));
  window.addEventListener('load', () => document.documentElement.classList.add('hero-loaded'), { once: true });
})();
