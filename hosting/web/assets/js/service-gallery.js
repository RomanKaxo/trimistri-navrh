(function () {
  'use strict';

  const galleries = document.querySelectorAll('.service-gallery');
  if (!galleries.length || typeof GLightbox !== 'function') return;

  // The library renders descriptions as HTML. Build them as text first so
  // published captions can never become markup or executable HTML.
  galleries.forEach((gallery) => {
    gallery.querySelectorAll('.realization-photo').forEach((link) => {
      const caption = document.createElement('p');
      caption.textContent = link.querySelector('.realization-caption')?.textContent || '';
      link.dataset.description = caption.outerHTML;
    });
  });

  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const lightbox = GLightbox({
    selector: '.realization-photo',
    touchNavigation: true,
    keyboardNavigation: true,
    loop: false,
    descPosition: 'bottom',
    moreLength: 0,
    openEffect: reducedMotion ? 'none' : 'fade',
    closeEffect: reducedMotion ? 'none' : 'fade',
    slideEffect: reducedMotion ? 'none' : 'slide'
  });
  // Each slide owns its badge, including preloaded slides and reopened galleries.
  // Keep the tag separate from the description so it stays visible on mobile.
  lightbox.on('slide_after_load', ({ slideNode, trigger }) => {
    const tag = trigger?.dataset.photoTag?.trim();
    const image = slideNode.querySelector('.gslide-image');
    if (!tag || !image || image.querySelector('.realization-lightbox-tag')) return;
    const badge = document.createElement('span');
    badge.className = 'realization-lightbox-tag';
    badge.textContent = tag;
    image.classList.add('realization-lightbox-image');
    image.appendChild(badge);
  });
  galleries.forEach((gallery) => gallery.classList.add('gallery-lightbox-ready'));
})();
