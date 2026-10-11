(function () {
  "use strict";

  const AUTOPLAY_DELAY = 4000;
  const FADE_MS = 180;

  document.querySelectorAll('.dsx-media').forEach((media) => {
    if (media.dataset.dsxCarouselReady === '1') return;

    const image = media.querySelector(':scope > img') || media.querySelector('img');
    if (!image) return;

    const seen = new Set();
    const galleryImages = Array.from(document.querySelectorAll('.gallery-section .glightbox img, .realization-cover img'))
      .map((img) => ({
        src: img.currentSrc || img.getAttribute('src'),
        alt: img.alt || ''
      }))
      .filter((item) => item.src && !seen.has(item.src) && seen.add(item.src));

    const original = {
      src: image.getAttribute('src'),
      alt: image.alt || ''
    };

    if (original.src && !seen.has(original.src)) {
      galleryImages.unshift(original);
      seen.add(original.src);
    }

    if (galleryImages.length < 2) return;

    media.dataset.dsxCarouselReady = '1';
    media.setAttribute('role', 'region');
    media.setAttribute('aria-label', 'Ukázky realizací této služby');

    let index = galleryImages.findIndex((item) => item.src === original.src);
    if (index < 0) index = 0;

    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    let paused = false;
    let hovered = false;
    let focused = false;
    let visible = false;
    let timer = null;
    let requestToken = 0;
    let fadeTimer = null;

    image.style.transition = reducedMotion.matches ? 'none' : `opacity ${FADE_MS}ms ease`;

    const controls = document.createElement('div');
    controls.className = 'dsx-controls';
    controls.innerHTML = [
      '<button type="button" aria-label="Předchozí fotografie"><i class="bi bi-chevron-left" aria-hidden="true"></i></button>',
      '<span class="dsx-counter" aria-live="polite"></span>',
      '<button type="button" aria-label="Další fotografie"><i class="bi bi-chevron-right" aria-hidden="true"></i></button>',
      '<button type="button" aria-label="Pozastavit střídání fotografií"><i class="bi bi-pause-fill" aria-hidden="true"></i></button>'
    ].join('');
    media.appendChild(controls);

    const [previous, next, pause] = controls.querySelectorAll('button');
    const counter = controls.querySelector('.dsx-counter');

    const updateControls = () => {
      if (counter) counter.textContent = `${index + 1} / ${galleryImages.length}`;
      pause.setAttribute('aria-label', paused ? 'Spustit střídání fotografií' : 'Pozastavit střídání fotografií');
      const icon = pause.querySelector('i');
      if (icon) icon.className = `bi bi-${paused ? 'play-fill' : 'pause-fill'}`;
    };

    const stopTimer = () => {
      if (timer) {
        clearTimeout(timer);
        timer = null;
      }
    };

    const schedule = () => {
      stopTimer();
      if (!paused && !hovered && !focused && visible && !document.hidden) {
        timer = window.setTimeout(() => show(index + 1), AUTOPLAY_DELAY);
      }
    };

    const show = async (target) => {
      stopTimer();
      window.clearTimeout(fadeTimer);

      const nextIndex = (target + galleryImages.length) % galleryImages.length;
      if (nextIndex === index) {
        schedule();
        return;
      }

      const item = galleryImages[nextIndex];
      const token = ++requestToken;
      const preload = new Image();
      preload.src = item.src;

      try {
        if (typeof preload.decode === 'function') await preload.decode();
      } catch (_) {
        // A failed decode should not break the carousel; the browser may still load the image normally.
      }

      if (token !== requestToken) return;

      const applyImage = () => {
        if (token !== requestToken) return;
        image.removeAttribute('srcset');
        image.removeAttribute('sizes');
        image.src = item.src;
        image.alt = item.alt;
        image.loading = 'eager';
        image.style.opacity = '1';
        index = nextIndex;
        updateControls();
        schedule();
      };

      if (reducedMotion.matches) {
        applyImage();
      } else {
        image.style.opacity = '0';
        fadeTimer = window.setTimeout(applyImage, FADE_MS);
      }
    };

    previous.addEventListener('click', () => show(index - 1));
    next.addEventListener('click', () => show(index + 1));
    pause.addEventListener('click', () => {
      paused = !paused;
      updateControls();
      schedule();
    });

    media.addEventListener('mouseenter', () => {
      hovered = true;
      schedule();
    });
    media.addEventListener('mouseleave', () => {
      hovered = false;
      schedule();
    });
    media.addEventListener('focusin', () => {
      focused = true;
      schedule();
    });
    media.addEventListener('focusout', (event) => {
      focused = media.contains(event.relatedTarget);
      schedule();
    });

    document.addEventListener('visibilitychange', schedule);
    reducedMotion.addEventListener('change', () => {
      image.style.transition = reducedMotion.matches ? 'none' : `opacity ${FADE_MS}ms ease`;
      updateControls();
      schedule();
    });

    if ('IntersectionObserver' in window) {
      new IntersectionObserver(([entry]) => {
        visible = entry.isIntersecting;
        schedule();
      }, { threshold: 0.2 }).observe(media);
    } else {
      visible = true;
    }

    updateControls();
    schedule();
  });
})();
