<script>
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

/* Fetch lower-page photos shortly before they enter view; noscript keeps every photo. */
(() => {
  const reveal = image => {
    if (image.dataset.srcset) image.srcset = image.dataset.srcset;
    image.src = image.dataset.src;
  };
  const init = () => {
    const images = document.querySelectorAll('img[data-src]');
    if (!('IntersectionObserver' in window)) return images.forEach(reveal);
    const observer = new IntersectionObserver(entries => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;
        reveal(entry.target);
        observer.unobserve(entry.target);
      }
    }, { rootMargin: '200px' });
    images.forEach(image => observer.observe(image));
  };
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init, { once: true });
  else init();
})();

</script>
<link rel="preload" href="assets/vendor/elaris-preview/inter-400.403d6cdd1f17.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="assets/vendor/elaris-preview/inter-600.915dba52ffed.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="assets/vendor/elaris-preview/inter-800.5570877bfe4f.woff2" as="font" type="font/woff2" crossorigin>
<?php if (!empty($isHome)): ?>
<link rel="stylesheet" href="assets/css/site-hosting-home.504dcc8dbf08.css">
<?php else: ?>
<link rel="stylesheet" href="assets/css/site-hosting.6bf8b43d9c33.css">
<?php endif; ?>
