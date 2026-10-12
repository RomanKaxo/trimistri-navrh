/* Initialize navigation before the first layout and during streamed responses. */
(() => {
  document.documentElement.classList.add('menu-js');
  window.tmMenuReady = true;
  const close = button => {
    button.setAttribute('aria-expanded', 'false');
    button.setAttribute('aria-label', 'Otevřít hlavní menu');
    document.getElementById(button.getAttribute('aria-controls'))?.classList.remove('is-open');
  };
  document.addEventListener('click', event => {
    const button = event.target.closest('[data-menu-toggle]');
    if (button) {
      const menu = document.getElementById(button.getAttribute('aria-controls'));
      if (!menu) return;
      const open = button.getAttribute('aria-expanded') !== 'true';
      button.setAttribute('aria-expanded', String(open));
      button.setAttribute('aria-label', open ? 'Zavřít hlavní menu' : 'Otevřít hlavní menu');
      menu.classList.toggle('is-open', open);
    } else if (event.target.closest('[data-menu] a') || !event.target.closest('.tm-nav-row')) {
      document.querySelectorAll('[data-menu-toggle][aria-expanded="true"]').forEach(close);
    }
  });
  document.addEventListener('keydown', event => {
    if (event.key !== 'Escape') return;
    document.querySelectorAll('[data-menu-toggle][aria-expanded="true"]').forEach(button => {
      close(button);
      button.focus();
    });
  });
})();
