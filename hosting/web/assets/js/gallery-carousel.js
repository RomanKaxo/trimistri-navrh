(function () {
  "use strict";
  const AUTOPLAY_DELAY = 3500;

  document.querySelectorAll('.gallery-carousel-card').forEach((card) => {
    const viewport = card.querySelector('.gallery-carousel-viewport');
    const slides = Array.from(viewport.querySelectorAll('.gallery-carousel-slide'));
    if (slides.length < 2) return;

    const track = document.createElement('div');
    track.className = 'gallery-carousel-track';
    slides.forEach((slide) => track.appendChild(slide));
    viewport.appendChild(track);

    const counter = card.querySelector('.gallery-carousel-counter');
    const imgs = slides.map((slide) => slide.querySelector('img'));
    let idx = Math.max(0, slides.findIndex((s) => s.classList.contains('is-active')));
    let timer = null;

    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    let visible = false;
    let hovered = false;

    const ensureLoaded = (i) => {
      const img = imgs[(i + slides.length) % slides.length];
      if (img && img.loading === 'lazy') img.loading = 'eager';
    };

    const render = () => {
      track.style.transform = 'translateX(-' + (idx * 100) + '%)';
      if (counter) counter.textContent = (idx + 1) + ' / ' + slides.length;
      ensureLoaded(idx);
      ensureLoaded(idx + 1);
      ensureLoaded(idx - 1);
    };
    render();

    const show = (nextIdx) => {
      idx = (nextIdx + slides.length) % slides.length;
      render();
    };

    const stop = () => { if (timer) { clearInterval(timer); timer = null; } };
    const schedule = () => {
      stop();
      if (visible && !hovered && !document.hidden) {
        timer = setInterval(() => show(idx + 1), AUTOPLAY_DELAY);
      }
    };

    const prevBtn = card.querySelector('.gallery-carousel-nav.prev');
    const nextBtn = card.querySelector('.gallery-carousel-nav.next');
    if (prevBtn) prevBtn.addEventListener('click', (e) => { e.preventDefault(); e.stopPropagation(); show(idx - 1); schedule(); });
    if (nextBtn) nextBtn.addEventListener('click', (e) => { e.preventDefault(); e.stopPropagation(); show(idx + 1); schedule(); });

    card.addEventListener('mouseenter', () => { hovered = true; schedule(); });
    card.addEventListener('mouseleave', () => { hovered = false; schedule(); });

    document.addEventListener('visibilitychange', schedule);
    reducedMotion.addEventListener('change', schedule);

    if ('IntersectionObserver' in window) {
      new IntersectionObserver(([entry]) => {
        visible = entry.isIntersecting;
        schedule();
      }, { threshold: 0.2 }).observe(card);
    } else {
      visible = true;
      schedule();
    }
  });
})();
