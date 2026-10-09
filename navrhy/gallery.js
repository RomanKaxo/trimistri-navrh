/* Lightbox pro fotografie realizací; domovské odkazy kategorií zůstávají běžnými odkazy. */
(() => {
  const init = () => {
    if (typeof window.GLightbox !== 'function') return;
    const links = document.querySelectorAll('.photo-link[data-gallery]');
    if (!links.length) return;
    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    window.GLightbox({
      selector: '.photo-link[data-gallery]',
      loop: false,
      keyboardNavigation: true,
      touchNavigation: true,
      closeButton: true,
      closeOnOutsideClick: true,
      moreText: 'Zobrazit další',
      autoplayVideos: false,
      zoomable: !reduced,
      draggable: !reduced,
      openEffect: reduced ? 'none' : 'zoom',
      closeEffect: reduced ? 'none' : 'zoom',
      slideEffect: reduced ? 'none' : 'slide'
    });
  };
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init, { once: true });
  else init();
})();
