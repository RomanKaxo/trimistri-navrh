/* Vlastní rozbalovací seznam pro výběr služby ve formuláři poptávky.
   Původní <select> zůstává ve formuláři (odesílání, ostatní skripty, bez JavaScriptu); seznam jen mění jeho hodnotu
   a vyvolá událost change. Ovládání: myš, dotyk, šipky, Home/End, Enter/mezerník, Esc, psaní písmen. */
(() => {
  const selects = [...document.querySelectorAll('.quote-form select')];
  if (!selects.length) return;
  let uid = 0;
  const CHEVRON = '<svg class="tm-select-chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>';

  const enhance = select => {
    const id = ++uid;
    const label = select.id ? document.querySelector(`label[for="${select.id}"]`) : null;
    if (label && !label.id) label.id = `tm-select-label-${id}`;

    const root = document.createElement('div');
    root.className = 'tm-select';
    const trigger = document.createElement('button');
    trigger.type = 'button';
    trigger.className = 'tm-select-trigger';
    trigger.id = `tm-select-button-${id}`;
    trigger.setAttribute('aria-haspopup', 'listbox');
    trigger.setAttribute('aria-expanded', 'false');
    trigger.setAttribute('aria-controls', `tm-select-list-${id}`);
    if (label) trigger.setAttribute('aria-labelledby', `${label.id} ${trigger.id}`);
    const value = document.createElement('span');
    value.className = 'tm-select-value';
    trigger.append(value);
    trigger.insertAdjacentHTML('beforeend', CHEVRON);
    const list = document.createElement('ul');
    list.className = 'tm-select-list';
    list.id = `tm-select-list-${id}`;
    list.setAttribute('role', 'listbox');
    list.tabIndex = -1;
    list.hidden = true;
    if (label) list.setAttribute('aria-labelledby', label.id);

    select.parentNode.insertBefore(root, select);
    root.append(select, trigger, list);
    select.classList.add('tm-select-native');
    select.tabIndex = -1;
    select.setAttribute('aria-hidden', 'true');

    let active = -1;
    let typed = '';
    let typedTimer;
    const isOpen = () => !list.hidden;
    const items = () => [...list.children];
    const sync = () => {
      value.textContent = select.selectedOptions[0]?.text.trim() || '';
      trigger.disabled = select.disabled;
    };
    const setActive = (index, scroll = true) => {
      const all = items();
      if (!all.length) return;
      active = Math.max(0, Math.min(all.length - 1, index));
      all.forEach((item, i) => item.classList.toggle('is-active', i === active));
      list.setAttribute('aria-activedescendant', all[active].id);
      if (scroll) all[active].scrollIntoView({ block: 'nearest' });
    };
    const build = () => {
      list.textContent = '';
      [...select.options].forEach((option, i) => {
        const item = document.createElement('li');
        item.id = `tm-select-option-${id}-${i}`;
        item.className = 'tm-select-option';
        item.setAttribute('role', 'option');
        item.setAttribute('aria-selected', String(option.selected));
        item.dataset.index = String(i);
        item.textContent = option.text.trim();
        if (option.disabled) item.setAttribute('aria-disabled', 'true');
        list.append(item);
      });
    };
    const open = () => {
      if (isOpen() || select.disabled) return;
      build();
      list.hidden = false;
      list.classList.remove('is-up');
      const below = innerHeight - trigger.getBoundingClientRect().bottom;
      if (below < Math.min(list.scrollHeight, 340) + 16 && trigger.getBoundingClientRect().top > below) list.classList.add('is-up');
      trigger.setAttribute('aria-expanded', 'true');
      root.classList.add('is-open');
      setActive(select.selectedIndex);
      list.focus({ preventScroll: true });
    };
    const close = (refocus = false) => {
      if (!isOpen()) return;
      list.hidden = true;
      trigger.setAttribute('aria-expanded', 'false');
      root.classList.remove('is-open');
      list.removeAttribute('aria-activedescendant');
      if (refocus) trigger.focus({ preventScroll: true });
    };
    const choose = index => {
      const option = select.options[index];
      if (!option || option.disabled) return;
      const changed = select.selectedIndex !== index;
      select.selectedIndex = index;
      sync();
      close(true);
      if (changed) {
        select.dispatchEvent(new Event('input', { bubbles: true }));
        select.dispatchEvent(new Event('change', { bubbles: true }));
      }
    };

    trigger.addEventListener('click', () => (isOpen() ? close() : open()));
    trigger.addEventListener('keydown', event => {
      if (['ArrowDown', 'ArrowUp', 'Enter', ' ', 'Home', 'End'].includes(event.key)) {
        event.preventDefault();
        open();
        if (event.key === 'Home') setActive(0);
        if (event.key === 'End') setActive(items().length - 1);
      }
    });
    list.addEventListener('keydown', event => {
      const key = event.key;
      if (key === 'ArrowDown') { event.preventDefault(); setActive(active + 1); }
      else if (key === 'ArrowUp') { event.preventDefault(); setActive(active - 1); }
      else if (key === 'Home') { event.preventDefault(); setActive(0); }
      else if (key === 'End') { event.preventDefault(); setActive(items().length - 1); }
      else if (key === 'PageDown') { event.preventDefault(); setActive(active + 6); }
      else if (key === 'PageUp') { event.preventDefault(); setActive(active - 6); }
      else if (key === 'Enter' || key === ' ') { event.preventDefault(); choose(active); }
      else if (key === 'Escape') { event.preventDefault(); close(true); }
      else if (key === 'Tab') close();
      else if (key.length === 1 && !event.ctrlKey && !event.metaKey && !event.altKey) {
        typed += key.toLowerCase();
        clearTimeout(typedTimer);
        typedTimer = setTimeout(() => { typed = ''; }, 600);
        const all = items();
        const from = typed.length === 1 ? active + 1 : active;
        const order = [...all.slice(from), ...all.slice(0, from)];
        const hit = order.find(item => item.textContent.toLowerCase().startsWith(typed));
        if (hit) setActive(all.indexOf(hit));
      }
    });
    list.addEventListener('click', event => {
      const item = event.target.closest('.tm-select-option');
      if (item) choose(Number(item.dataset.index));
    });
    list.addEventListener('pointermove', event => {
      const item = event.target.closest('.tm-select-option');
      if (item && !item.classList.contains('is-active')) setActive(Number(item.dataset.index), false);
    });
    list.addEventListener('blur', () => setTimeout(() => { if (isOpen() && !root.contains(document.activeElement)) close(); }, 0));
    document.addEventListener('pointerdown', event => { if (isOpen() && !root.contains(event.target)) close(); });
    select.addEventListener('change', sync);
    select.form?.addEventListener('reset', () => setTimeout(sync, 0));
    label?.addEventListener('click', event => { event.preventDefault(); trigger.focus(); });
    sync();
  };

  selects.forEach(enhance);
})();
