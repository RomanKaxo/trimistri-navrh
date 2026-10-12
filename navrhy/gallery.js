/* Load the photo viewer only when someone intends to open a realization. */
(() => {
  const selector = '.photo-link[data-gallery]';
  if (!document.querySelector(selector)) return;
  const scriptUrl = document.currentScript.src;
  const vendor = new URL(scriptUrl.includes('/navrhy/') ? '../assets/vendor/elaris-preview/' : '../vendor/elaris-preview/', scriptUrl);
  let ready;
  const asset = (tag, url) => new Promise((resolve, reject) => {
    const element = document.createElement(tag);
    if (tag === 'link') {
      element.rel = 'stylesheet';
      element.href = url;
    } else element.src = url;
    element.onload = resolve;
    element.onerror = () => { element.remove(); reject(new Error('Photo viewer unavailable')); };
    document.head.append(element);
  });
  const load = () => ready ||= (async () => {
    await Promise.all([
      asset('link', new URL('glightbox.min.css', vendor).href),
      typeof window.GLightbox === 'function' ? Promise.resolve() : asset('script', new URL('glightbox.min.js', vendor).href)
    ]);
    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    return window.GLightbox({
      selector,
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
  })().catch(error => { ready = null; throw error; });
  for (const intent of ['pointerover', 'focusin']) {
    document.addEventListener(intent, event => {
      if (event.target.closest(selector)) load().catch(() => {});
    }, { passive: true });
  }
  document.addEventListener('click', async event => {
    const link = event.target.closest(selector);
    if (!link || event.defaultPrevented || event.button !== 0 || event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) return;
    event.preventDefault();
    link.setAttribute('aria-busy', 'true');
    try {
      const viewer = await load();
      viewer.open(link);
    } catch {
      window.location.assign(link.href);
    } finally {
      link.removeAttribute('aria-busy');
    }
  });
})();
