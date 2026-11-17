/* No dependencies: inquiry shortcuts, local photo previews and quiet hero motion. */
(() => {
  const quick = document.querySelector('[data-quick-quote]');
  const formService = document.querySelector('.quote-form [name="service"]');
  if (quick && formService) {
    const select = quick.querySelector('select');
    const link = quick.querySelector('a');
    [...formService.options].filter(option => option.value).forEach(option => {
      select.add(new Option(option.text, option.value));
    });
    const sync = () => {
      select.value = formService.value;
    };
    select.addEventListener('change', () => {
      formService.value = select.value;
      formService.dispatchEvent(new Event('change', { bubbles: true }));
    });
    formService.addEventListener('change', sync);
    link.addEventListener('click', event => {
      if (event.ctrlKey || event.metaKey || event.shiftKey || event.altKey || event.button !== 0) return;
      event.preventDefault();
      const inquiry = formService.closest('[id="poptavka"]');
      if (!inquiry) return;
      history.pushState(null, '', '#poptavka');
      inquiry.scrollIntoView({ behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'instant' : 'smooth', block: 'start' });
      formService.form.elements.namedItem('name')?.focus({ preventScroll: true });
    });
    sync();
    quick.hidden = false;
  }

  document.querySelectorAll('.quote-form input[type="file"]').forEach(input => {
    const previews = document.createElement('ul');
    previews.className = 'tm-photo-previews';
    previews.setAttribute('aria-label', 'Vybrané fotografie');
    const field = input.closest('.quote-field');
    if (!field) return;
    field.append(previews);
    let urls = [];
    const clearUrls = () => {
      urls.forEach(url => URL.revokeObjectURL(url));
      urls = [];
    };
    const render = () => {
      clearUrls();
      previews.replaceChildren();
      if (!input.validity.valid) return;
      [...input.files].forEach((file, index) => {
        const item = document.createElement('li');
        item.className = 'tm-photo-preview';
        const image = document.createElement('img');
        const url = URL.createObjectURL(file);
        urls.push(url);
        image.src = url;
        image.alt = `Náhled fotografie ${file.name}`;
        const name = document.createElement('span');
        name.textContent = file.name;
        const remove = document.createElement('button');
        remove.type = 'button';
        remove.textContent = '×';
        remove.setAttribute('aria-label', `Odebrat fotografii ${file.name}`);
        remove.addEventListener('click', () => {
          const remaining = new DataTransfer();
          [...input.files].forEach((selected, position) => {
            if (position !== index) remaining.items.add(selected);
          });
          input.files = remaining.files;
          input.dispatchEvent(new Event('change', { bubbles: true }));
          (previews.children[Math.min(index, previews.children.length - 1)]?.querySelector('button') || input).focus({ preventScroll: true });
        });
        item.append(image, remove, name);
        previews.append(item);
      });
    };
    input.addEventListener('change', render);
    input.form.addEventListener('reset', () => {
      clearUrls();
      previews.replaceChildren();
    });
    window.addEventListener('pagehide', clearUrls);
    window.addEventListener('pageshow', event => {
      if (event.persisted) render();
    });
  });

  const hero = document.querySelector('.hero-scene');
  const image = hero?.querySelector('.hero-image');
  if (!image) return;
  const motion = window.matchMedia('(min-width: 701px) and (prefers-reduced-motion: no-preference)');
  let frame = null;
  const update = () => {
    frame = null;
    const top = hero.getBoundingClientRect().top;
    image.style.setProperty('--tm-hero-offset', motion.matches ? `${Math.min(14, Math.max(0, -top) * .025)}px` : '0px');
  };
  const queue = () => {
    if (frame === null) frame = requestAnimationFrame(update);
  };
  window.addEventListener('scroll', queue, { passive: true });
  window.addEventListener('resize', queue);
  motion.addEventListener('change', queue);
  update();
})();
