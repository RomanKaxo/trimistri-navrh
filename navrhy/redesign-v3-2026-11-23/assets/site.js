/* Tři Mistři – návrh v3: menu, vstupy a natírání, počítadla, pás fotek, magnetická tlačítka,
   posuvník Před/Po, galerie, recenze, poptávka. Bez knihoven; pohyb jen transform/opacity/clip-path. */
(() => {
  'use strict';
  const $ = (s, r = document) => r.querySelector(s);
  const $$ = (s, r = document) => [...r.querySelectorAll(s)];
  const reduce = matchMedia('(prefers-reduced-motion: reduce)');
  const store = {
    get(k) { try { return localStorage.getItem(k); } catch { return null; } },
    set(k, v) { try { localStorage.setItem(k, v); } catch { /* soukromé okno */ } },
  };

  /* ---------- hlavička a mobilní menu ---------- */
  const header = $('[data-header]');
  const nav = $('[data-nav]');
  const toggle = $('[data-menu-toggle]');
  const setMenu = (open) => {
    if (!nav || !toggle) return;
    nav.classList.toggle('is-open', open);
    toggle.setAttribute('aria-expanded', String(open));
    toggle.querySelector('.menu-label').textContent = open ? 'Zavřít' : 'Menu';
  };
  toggle?.addEventListener('click', () => setMenu(toggle.getAttribute('aria-expanded') !== 'true'));
  nav?.addEventListener('click', (e) => { if (e.target.closest('a')) setMenu(false); });
  document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && toggle?.getAttribute('aria-expanded') === 'true') { setMenu(false); toggle.focus(); } });
  matchMedia('(min-width: 981px)').addEventListener('change', (m) => { if (m.matches) setMenu(false); });

  const onScroll = () => header?.classList.toggle('is-stuck', scrollY > 8);
  addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* ---------- vstupy sekcí a natírání fotek ---------- */
  const groups = new Map();
  $$('.reveal, .paint').forEach((el) => {
    const parent = el.closest('ul, ol, .cat-grid, .work-grid, .hero-facts, .svc-groups, .benefits') || el.parentElement;
    const n = groups.get(parent) || 0;
    el.style.setProperty('--i', Math.min(n, 6));
    groups.set(parent, n + 1);
  });
  // Ořezaná fotka (clip-path) se v IntersectionObserveru „neprotíná“, proto se sleduje její rodič.
  const watch = $$('.reveal, .paint, .footer-word');
  if ('IntersectionObserver' in window) {
    const targets = new Map();
    const io = new IntersectionObserver((entries) => {
      entries.forEach((en) => {
        if (!en.isIntersecting) return;
        (targets.get(en.target) || []).forEach((el) => el.classList.add('is-in'));
        io.unobserve(en.target);
      });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
    watch.forEach((el) => {
      const t = el.classList.contains('paint') ? el.parentElement : el;
      if (!targets.has(t)) { targets.set(t, []); io.observe(t); }
      targets.get(t).push(el);
    });
  } else {
    watch.forEach((el) => el.classList.add('is-in'));
  }

  /* ---------- váleček v úvodu po dojetí zmizí i z rozvržení ---------- */
  const rollTrack = $('.roll-track');
  if (rollTrack) {
    const done = () => { rollTrack.hidden = true; };
    rollTrack.addEventListener('animationend', done, { once: true });
    if (reduce.matches) done();
  }

  /* ---------- počítadla: 5,0 · 29 · 15 (jen když jsou vidět, jinak zůstane hotové číslo) ---------- */
  const counters = $$('[data-count]');
  if (counters.length && 'IntersectionObserver' in window && !reduce.matches) {
    const fmt = (v, d) => v.toFixed(d).replace('.', ',');
    const ease = (t) => 1 - Math.pow(1 - t, 4);
    const co = new IntersectionObserver((entries) => {
      entries.forEach((en) => {
        if (!en.isIntersecting) return;
        co.unobserve(en.target);
        const el = en.target; const to = parseFloat(el.dataset.count); const d = +(el.dataset.countDecimals || 0);
        const final = el.textContent; const t0 = performance.now(); const dur = 1300;
        el.style.fontVariantNumeric = 'tabular-nums';
        const tick = (now) => {
          const t = Math.min(1, (now - t0) / dur);
          el.textContent = t < 1 ? fmt(to * ease(t), d) : final;
          if (t < 1) requestAnimationFrame(tick);
        };
        requestAnimationFrame(tick);
      });
    }, { threshold: 0.6 });
    counters.forEach((c) => co.observe(c));
  }

  /* ---------- pás fotek v úvodu: při posunu stránky ujíždí doleva (desktop) ---------- */
  const strip = $('[data-strip]');
  const track = $('[data-strip-track]');
  const fine = matchMedia('(min-width: 900px) and (hover: hover) and (pointer: fine)');
  if (strip && track) {
    let max = 0, ticking = false, on = false;
    const measure = () => { max = Math.max(0, track.scrollWidth - strip.clientWidth); };
    const apply = () => {
      ticking = false;
      if (!on) return;
      const r = strip.getBoundingClientRect();
      const end = r.top + scrollY + r.height; // pás zmizí nahoře
      const p = Math.min(1, Math.max(0, scrollY / Math.max(1, end)));
      track.style.transform = `translate3d(${(-max * p).toFixed(1)}px,0,0)`;
    };
    const onScrollStrip = () => { if (!ticking) { ticking = true; requestAnimationFrame(apply); } };
    const setup = () => {
      on = fine.matches && !reduce.matches;
      strip.classList.toggle('is-drift', on);
      if (!on) { track.style.transform = ''; return; }
      measure(); apply();
    };
    addEventListener('scroll', onScrollStrip, { passive: true });
    addEventListener('resize', () => { measure(); onScrollStrip(); });
    fine.addEventListener('change', setup); reduce.addEventListener('change', setup);
    addEventListener('load', () => { measure(); apply(); });
    setup();
  }

  /* ---------- magnetická tlačítka: kousek k ukazateli, pružně zpět ---------- */
  if (fine.matches && !reduce.matches) {
    $$('.magnetic').forEach((btn) => {
      let raf = 0, tx = 0, ty = 0, x = 0, y = 0;
      const step = () => {
        x += (tx - x) * 0.22; y += (ty - y) * 0.22;
        btn.style.setProperty('--bx', x.toFixed(2) + 'px'); btn.style.setProperty('--by', y.toFixed(2) + 'px');
        if (Math.abs(tx - x) > 0.05 || Math.abs(ty - y) > 0.05) raf = requestAnimationFrame(step); else raf = 0;
      };
      const go = () => { if (!raf) raf = requestAnimationFrame(step); };
      btn.addEventListener('pointermove', (e) => {
        const r = btn.getBoundingClientRect();
        tx = ((e.clientX - r.left) / r.width - 0.5) * Math.min(14, r.width * 0.08);
        ty = ((e.clientY - r.top) / r.height - 0.5) * 8;
        go();
      });
      btn.addEventListener('pointerleave', () => { tx = 0; ty = 0; go(); });
    });
  }

  /* ---------- posuvník Před / Po ---------- */
  const setPos = (stage, v) => {
    v = Math.min(100, Math.max(0, v));
    stage.style.setProperty('--pos', v.toFixed(1) + '%');
    const range = $('[data-cmp-range]', stage); if (range) range.value = Math.round(v);
  };
  $$('[data-cmp-stage]').forEach((stage) => {
    const range = $('[data-cmp-range]', stage);
    let dragging = false, sx = 0, sy = 0, decided = false;
    const fromX = (cx) => { const r = stage.getBoundingClientRect(); return ((cx - r.left) / r.width) * 100; };
    stage.addEventListener('pointerdown', (e) => {
      if (e.button > 0) return;
      dragging = true; decided = e.pointerType === 'mouse'; sx = e.clientX; sy = e.clientY;
      if (decided) { stage.setPointerCapture(e.pointerId); stage.classList.add('is-drag'); setPos(stage, fromX(e.clientX)); e.preventDefault(); }
    });
    stage.addEventListener('pointermove', (e) => {
      if (!dragging) return;
      if (!decided) {
        const dx = Math.abs(e.clientX - sx), dy = Math.abs(e.clientY - sy);
        if (dx < 6 && dy < 6) return;
        if (dy > dx) { dragging = false; return; } // svislý tah = posun stránky
        decided = true; stage.setPointerCapture(e.pointerId); stage.classList.add('is-drag');
      }
      setPos(stage, fromX(e.clientX));
    });
    const end = () => { dragging = false; stage.classList.remove('is-drag'); };
    stage.addEventListener('pointerup', end); stage.addEventListener('pointercancel', end);
    range?.addEventListener('input', () => setPos(stage, +range.value));
  });
  // první ukázka: krátké „pohnutí“ předělem, ať je jasné, že se dá táhnout
  const nudge = (stage) => {
    if (reduce.matches || stage.dataset.nudged) return;
    stage.dataset.nudged = '1';
    const keys = [[0, 50], [0.35, 32], [0.75, 62], [1, 50]]; const dur = 1500; const t0 = performance.now();
    const lerp = (t) => { for (let k = 1; k < keys.length; k++) if (t <= keys[k][0]) { const [a, va] = keys[k - 1]; const [b, vb] = keys[k]; const u = (t - a) / (b - a); const e = u < 0.5 ? 4 * u * u * u : 1 - Math.pow(-2 * u + 2, 3) / 2; return va + (vb - va) * e; } return 50; };
    const tick = (now) => { if (stage.classList.contains('is-drag')) return; const t = Math.min(1, (now - t0) / dur); setPos(stage, lerp(t)); if (t < 1) requestAnimationFrame(tick); };
    requestAnimationFrame(tick);
  };
  if ('IntersectionObserver' in window) {
    const no = new IntersectionObserver((entries) => entries.forEach((en) => { if (en.isIntersecting) { no.unobserve(en.target); setTimeout(() => nudge(en.target), 500); } }), { threshold: 0.6 });
    $$('[data-cmp]:not([hidden]) [data-cmp-stage]').forEach((s) => no.observe(s));
  }
  // výběr zakázky v bloku Před a po
  $$('[data-cmp-pick]').forEach((btn) => btn.addEventListener('click', () => {
    const k = btn.dataset.cmpPick;
    $$('[data-cmp-pick]').forEach((b) => b.setAttribute('aria-pressed', String(b === btn)));
    $$('.ba-stage [data-cmp]').forEach((f) => { const on = f.dataset.cmpIndex === k; f.hidden = !on; f.classList.toggle('is-current', on); });
    const shown = $(`.ba-stage [data-cmp][data-cmp-index="${k}"] [data-cmp-stage]`);
    if (shown) { setPos(shown, 50); delete shown.dataset.nudged; nudge(shown); }
  }));

  /* ---------- skoková navigace na službě: aktivní sekce ---------- */
  const jumpLinks = $$('.jump a[href^="#"]');
  if (jumpLinks.length && 'IntersectionObserver' in window) {
    const map = new Map(jumpLinks.map((a) => [a.getAttribute('href').slice(1), a]));
    const jo = new IntersectionObserver((entries) => {
      entries.forEach((en) => {
        if (!en.isIntersecting) return;
        jumpLinks.forEach((a) => a.classList.remove('is-active'));
        map.get(en.target.id)?.classList.add('is-active');
      });
    }, { rootMargin: '-45% 0px -50% 0px' });
    map.forEach((_, id) => { const t = document.getElementById(id); if (t) jo.observe(t); });
  }

  /* ---------- lišta na mobilu: schová se nad formulářem ---------- */
  const bar = $('.mobile-bar');
  const form = $('[data-quote]');
  if (bar && form && 'IntersectionObserver' in window) {
    new IntersectionObserver(([en]) => bar.classList.toggle('is-hidden', en.isIntersecting), { threshold: 0.05 }).observe(form);
  }

  /* ---------- galerie / lightbox ---------- */
  const G = window.TM_GALLERY || {};
  const lb = $('[data-lb]');
  if (lb && typeof lb.showModal === 'function') {
    const img = $('[data-lb-img]', lb);
    const title = $('[data-lb-title]', lb);
    const count = $('[data-lb-count]', lb);
    const tag = $('[data-lb-tag]', lb);
    const place = $('[data-lb-place]', lb);
    const thumbs = $('[data-lb-thumbs]', lb);
    const prev = $('[data-lb-prev]', lb);
    const next = $('[data-lb-next]', lb);
    let group = null, idx = 0, opener = null;

    const thumbOf = (f) => f.replace('-f.webp', '-t.webp');
    const preload = (i) => { const it = group?.items[i]; if (it) { const im = new Image(); im.src = it.f; } };
    const show = (i, first = false) => {
      idx = (i + group.items.length) % group.items.length;
      const it = group.items[idx];
      const apply = () => {
        img.src = it.f; img.width = it.w; img.height = it.h; img.alt = it.alt;
        img.classList.remove('is-swapping');
      };
      if (first || reduce.matches) apply();
      else { img.classList.add('is-swapping'); setTimeout(apply, 140); }
      count.textContent = `Fotka ${idx + 1} / ${group.items.length}`;
      tag.hidden = !it.tag; tag.textContent = it.tag || '';
      tag.classList.toggle('tag-after', it.tag === 'Po');
      place.textContent = it.place || group.place || '';
      prev.disabled = next.disabled = group.items.length < 2;
      $$('button', thumbs).forEach((b, k) => b.setAttribute('aria-current', String(k === idx)));
      thumbs.children[idx]?.scrollIntoView({ block: 'nearest', inline: 'center', behavior: reduce.matches ? 'auto' : 'smooth' });
      preload(idx + 1); preload(idx - 1);
    };
    const open = (gid, i, from) => {
      group = G[gid]; if (!group) return false;
      opener = from;
      title.textContent = [group.title, group.place].filter(Boolean).join(' · ');
      thumbs.innerHTML = '';
      thumbs.hidden = group.items.length < 2;
      group.items.forEach((it, k) => {
        const b = document.createElement('button');
        b.type = 'button'; b.setAttribute('aria-label', `Fotka ${k + 1}${it.tag ? ', ' + it.tag : ''}`);
        b.innerHTML = `<img src="${thumbOf(it.f)}" alt="" loading="lazy">`;
        b.addEventListener('click', () => show(k));
        thumbs.appendChild(b);
      });
      lb.showModal();
      document.documentElement.style.overflow = 'hidden';
      show(i, true);
      $('[data-lb-close]', lb).focus();
      return true;
    };
    document.addEventListener('click', (e) => {
      const a = e.target.closest('[data-lb-open]');
      if (!a || e.metaKey || e.ctrlKey || e.shiftKey) return;
      const card = a.closest('[data-work]');
      let i = +a.dataset.index || 0;
      if (card?.classList.contains('show-before')) {
        const gi = G[a.dataset.lbOpen]?.items.findIndex((x) => x.tag === 'Před');
        if (gi >= 0) i = gi;
      }
      if (open(a.dataset.lbOpen, i, a)) e.preventDefault();
    });
    prev.addEventListener('click', () => show(idx - 1));
    next.addEventListener('click', () => show(idx + 1));
    $('[data-lb-close]', lb).addEventListener('click', () => lb.close());
    lb.addEventListener('close', () => { document.documentElement.style.overflow = ''; opener?.focus(); });
    lb.addEventListener('click', (e) => { if (e.target === lb) lb.close(); });
    lb.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowRight') { e.preventDefault(); show(idx + 1); }
      if (e.key === 'ArrowLeft') { e.preventDefault(); show(idx - 1); }
    });
    // tah prstem: rychlé švihnutí stačí (rychlost), nejen vzdálenost
    let sx = 0, sy = 0, st = 0, tracking = false;
    const stage = $('.lb-stage', lb);
    stage.addEventListener('pointerdown', (e) => { if (e.pointerType === 'mouse') return; tracking = true; sx = e.clientX; sy = e.clientY; st = performance.now(); });
    stage.addEventListener('pointerup', (e) => {
      if (!tracking) return; tracking = false;
      const dx = e.clientX - sx, dy = e.clientY - sy, v = Math.abs(dx) / Math.max(1, performance.now() - st);
      if (Math.abs(dx) > Math.abs(dy) && (Math.abs(dx) > 60 || v > 0.11)) show(idx + (dx < 0 ? 1 : -1));
    });
    stage.addEventListener('pointercancel', () => { tracking = false; });
  }

  /* ---------- před / po na kartě realizace ---------- */
  $$('.ba-switch').forEach((sw) => {
    const card = sw.closest('[data-work]');
    const alt = $('[data-ba-before]', card);
    sw.addEventListener('click', (e) => {
      const b = e.target.closest('button[data-ba]'); if (!b) return;
      const before = b.dataset.ba === 'before';
      if (alt) alt.hidden = false;
      card.classList.toggle('show-before', before);
      $$('button', sw).forEach((x) => x.setAttribute('aria-pressed', String(x === b)));
    });
  });

  /* ---------- další realizace ---------- */
  $$('[data-more]').forEach((btn) => {
    const target = document.getElementById(btn.getAttribute('aria-controls'));
    btn.addEventListener('click', () => {
      const open = btn.getAttribute('aria-expanded') !== 'true';
      target.hidden = !open;
      btn.setAttribute('aria-expanded', String(open));
      btn.firstChild.textContent = open ? 'Skrýt další realizace ' : 'Zobrazit další realizace ';
      if (open) target.querySelector('a')?.focus({ preventScroll: true });
    });
  });

  /* ---------- recenze: zkrácení dlouhých, dialog, další ---------- */
  const rvDialog = $('[data-review-dialog]');
  const clampReviews = () => {
    $$('[data-review]:not([hidden])').forEach((card) => {
      if (card.dataset.measured) return;
      const p = $('blockquote p', card);
      card.classList.add('is-clamped');
      const over = p.scrollHeight > p.clientHeight + 2;
      if (!over) card.classList.remove('is-clamped');
      $('[data-review-open]', card).hidden = !over;
      card.dataset.measured = '1';
    });
  };
  clampReviews();
  document.fonts?.ready.then(() => { $$('[data-review]').forEach((c) => { delete c.dataset.measured; c.classList.remove('is-clamped'); }); clampReviews(); });
  document.addEventListener('click', (e) => {
    const b = e.target.closest('[data-review-open]'); if (!b || !rvDialog) return;
    const card = b.closest('[data-review]');
    $('[data-review-name]', rvDialog).textContent = $('[data-review-author]', card).textContent;
    $('[data-review-meta]', rvDialog).textContent = $('[data-review-age]', card).textContent;
    $('[data-review-text]', rvDialog).innerHTML = $('blockquote p', card).innerHTML;
    $('[data-review-price]', rvDialog).textContent = $('.rv-price', card)?.textContent || '';
    rvDialog.showModal();
    rvDialog._opener = b;
  });
  $('[data-review-close]')?.addEventListener('click', () => rvDialog.close());
  rvDialog?.addEventListener('click', (e) => { if (e.target === rvDialog) rvDialog.close(); });
  rvDialog?.addEventListener('close', () => rvDialog._opener?.focus());
  $$('[data-reviews-more]').forEach((btn) => {
    const label = btn.textContent;
    btn.addEventListener('click', () => {
      const open = btn.getAttribute('aria-expanded') !== 'true';
      const extra = $$('.review.is-extra', btn.closest('section'));
      extra.forEach((c, i) => { c.hidden = !open; if (open && !reduce.matches) { c.classList.add('is-entering'); c.style.animationDelay = `${Math.min(i, 8) * 40}ms`; } });
      btn.setAttribute('aria-expanded', String(open));
      btn.textContent = open ? 'Zobrazit méně recenzí' : label;
      clampReviews();
      if (open) $('blockquote', extra[0])?.setAttribute('tabindex', '-1');
    });
  });

  /* ---------- poptávka ---------- */
  const HINTS = window.TM_HINTS || {};
  const DEFAULT_HINT = 'Popište rozsah prací a požadovaný termín.';
  const select = $('[data-service-select]');
  const hint = $('[data-message-hint]');
  const serviceOut = $('[data-form-service]');
  const syncService = () => {
    if (!select) return;
    if (hint) hint.textContent = HINTS[select.value] || DEFAULT_HINT;
    if (serviceOut) serviceOut.textContent = select.value ? select.selectedOptions[0].textContent : 'Malby, nátěry a povrchy';
  };
  select?.addEventListener('change', syncService);

  // rychlý výběr služby na úvodu
  const pickSel = $('[data-picker-select]');
  $('[data-picker-go]')?.addEventListener('click', () => {
    if (select && pickSel?.value) { select.value = pickSel.value; syncService(); }
    const target = $('#poptavka');
    target?.scrollIntoView({ behavior: reduce.matches ? 'auto' : 'smooth', block: 'start' });
    setTimeout(() => $('#f-name')?.focus({ preventScroll: true }), reduce.matches ? 0 : 500);
  });

  // fotky: max. 5, každá do 4 MB, náhledy s odebráním
  const fileInput = $('[data-photos]');
  const list = $('[data-photo-list]');
  const photoErr = $('#f-photos-err');
  let files = [];
  const MAX = 5, MAX_MB = 4;
  const renderFiles = () => {
    if (!list) return;
    list.innerHTML = '';
    files.forEach((f, i) => {
      const li = document.createElement('li');
      const url = URL.createObjectURL(f);
      li.innerHTML = `<img src="${url}" alt=""><span></span><button type="button" aria-label="Odebrat fotku ${i + 1}"><svg class="i" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button>`;
      li.querySelector('span').textContent = f.name;
      li.querySelector('button').addEventListener('click', () => { files.splice(i, 1); renderFiles(); fileInput.focus(); });
      list.appendChild(li);
    });
  };
  const addFiles = (incoming) => {
    const msgs = [];
    for (const f of incoming) {
      if (!/\.(jpe?g|png|webp)$/i.test(f.name)) { msgs.push(`${f.name}: podporujeme jen JPG, PNG nebo WebP.`); continue; }
      if (f.size > MAX_MB * 1024 * 1024) { msgs.push(`${f.name} má víc než ${MAX_MB} MB.`); continue; }
      if (files.length >= MAX) { msgs.push(`Můžete přidat nejvýš ${MAX} fotek.`); break; }
      files.push(f);
    }
    photoErr.hidden = !msgs.length; photoErr.textContent = msgs.join(' ');
    renderFiles();
  };
  fileInput?.addEventListener('change', () => { addFiles([...fileInput.files]); fileInput.value = ''; });
  const zone = fileInput?.closest('.upload');
  zone?.addEventListener('dragover', (e) => { e.preventDefault(); zone.classList.add('is-drag'); });
  zone?.addEventListener('dragleave', () => zone.classList.remove('is-drag'));
  zone?.addEventListener('drop', (e) => { e.preventDefault(); zone.classList.remove('is-drag'); addFiles([...e.dataTransfer.files]); });

  // ověření v prohlížeči; odeslání = připravený e-mail (návrh nemá serverovou část)
  if (form) {
    const fields = {
      name: { el: $('#f-name'), test: (v) => v.trim().length >= 2, msg: 'Napište prosím jméno a příjmení.' },
      phone: { el: $('#f-phone'), test: (v) => v.replace(/[^\d]/g, '').length >= 9, msg: 'Napište telefon, ať se vám můžeme ozvat (aspoň 9 číslic).' },
      email: { el: $('#f-email'), test: (v) => !v.trim() || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim()), msg: 'E-mail nemá správný tvar, například jan@email.cz.' },
    };
    const setErr = (f, on) => {
      const err = document.getElementById(f.el.id + '-err');
      f.el.setAttribute('aria-invalid', String(on));
      if (err) { err.hidden = !on; err.textContent = on ? f.msg : ''; }
    };
    Object.values(fields).forEach((f) => f.el.addEventListener('blur', () => { if (f.el.value) setErr(f, !f.test(f.el.value)); }));
    Object.values(fields).forEach((f) => f.el.addEventListener('input', () => { if (f.el.getAttribute('aria-invalid') === 'true' && f.test(f.el.value)) setErr(f, false); }));
    const summary = $('[data-error-summary]', form);
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      if ($('#hp-field').value) return;
      const bad = Object.values(fields).filter((f) => { const b = !f.test(f.el.value); setErr(f, b); return b; });
      if (bad.length) {
        summary.hidden = false;
        summary.innerHTML = `Zkontrolujte prosím ${bad.length === 1 ? 'jedno pole' : bad.length + ' pole'}:<ul>${bad.map((f) => `<li><a href="#${f.el.id}">${f.msg}</a></li>`).join('')}</ul>`;
        summary.focus();
        return;
      }
      summary.hidden = true;
      const v = (id) => $(id).value.trim();
      const service = select?.value ? select.selectedOptions[0].textContent : 'Nevím / jiná služba';
      const subject = `Poptávka z webu: ${service}${v('#f-city') ? ' – ' + v('#f-city') : ''}`;
      const body = [
        `Jméno a příjmení: ${v('#f-name')}`,
        `Telefon: ${v('#f-phone')}`,
        `E-mail: ${v('#f-email') || '–'}`,
        `Typ služby: ${service}`,
        `Město / obec realizace: ${v('#f-city') || '–'}`,
        '', 'Popis zakázky:', v('#f-message') || '–',
        files.length ? `\nFotky k přiložení (${files.length}): ${files.map((f) => f.name).join(', ')}` : '',
      ].join('\n');
      location.href = `mailto:info@trimistri.cz?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
      const done = $('[data-form-done]', form);
      done.hidden = false; done.focus();
    });
  }

  /* ---------- cookies (v návrhu se nic neměří, volba se jen zapamatuje) ---------- */
  const consent = $('[data-consent]');
  const consentOpen = $$('[data-consent-open]');
  const showConsent = (on) => { if (!consent) return; consent.hidden = !on; consentOpen.forEach((b) => b.setAttribute('aria-expanded', String(on))); };
  if (consent && !store.get('tm-consent') && !/[?&]bez-cookies/.test(location.search)) showConsent(true);
  consentOpen.forEach((b) => b.addEventListener('click', () => { showConsent(consent.hidden); if (!consent.hidden) $('button', consent).focus(); }));
  $$('[data-consent-choice]').forEach((b) => b.addEventListener('click', () => { store.set('tm-consent', b.dataset.consentChoice); showConsent(false); }));
})();
