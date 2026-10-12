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
