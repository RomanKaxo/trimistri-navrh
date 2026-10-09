/* Selected proposal: automatic review bands with reading and reduced-motion support. */
(() => {
  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)');
  const navigation=document.querySelector('.tm-navigation');
  const menuToggle=document.querySelector('[data-menu-toggle]');
  if(menuToggle) {
    new MutationObserver(()=>menuToggle.setAttribute('aria-label',menuToggle.getAttribute('aria-expanded')==='true' ? 'Zavřít hlavní menu' : 'Otevřít hlavní menu')).observe(menuToggle,{attributes:true,attributeFilter:['aria-expanded']});
    window.matchMedia('(min-width:1361px)').addEventListener('change',event=>{
      if(event.matches){menuToggle.setAttribute('aria-expanded','false');navigation.classList.remove('is-open');}
    });
    document.addEventListener('click',event=>{
      if(!event.target.closest('.tm-nav-row') && menuToggle.getAttribute('aria-expanded')==='true') {
        menuToggle.setAttribute('aria-expanded','false');
        navigation.classList.remove('is-open');
      }
    });
  }
  if(navigation && document.querySelector('.hero-scene#top')) {
    const links=[...navigation.querySelectorAll('[data-nav-section]')];
    const sections=links.map(link=>({link,section:document.getElementById(link.dataset.navSection)})).filter(item=>item.section);
    let queued=false;
    const updateCurrent=()=>{
      queued=false;
      const boundary=document.querySelector('.tm-header').getBoundingClientRect().bottom+160;
      let current=sections[0]?.link;
      let closest=-Infinity;
      for(const item of sections) {
        const top=item.section.getBoundingClientRect().top;
        if(top<=boundary && top>=closest) {current=item.link;closest=top;}
      }
      links.forEach(link=>link===current ? link.setAttribute('aria-current','location') : link.removeAttribute('aria-current'));
    };
    const queueCurrent=()=>{if(!queued){queued=true;requestAnimationFrame(updateCurrent);}};
    window.addEventListener('scroll',queueCurrent,{passive:true});
    window.addEventListener('resize',queueCurrent);
    window.addEventListener('hashchange',queueCurrent);
    updateCurrent();
  }
  const reviews = document.querySelector('.tm-reviews');
  if (reviews) {
    const controls = reviews.querySelector('.tm-review-controls');
    const all = controls.querySelector('[data-review-all]');
    const cards = [...reviews.querySelectorAll('[data-review-original]')];
    controls.hidden = false;
    reviews.classList.add('has-bands');
    // Cards are server-rendered; starting their movement never waits for an observer.
    const updateVisibility = () => reviews.classList.toggle('is-page-hidden',document.hidden);
    document.addEventListener('visibilitychange',updateVisibility);
    updateVisibility();
    const dialog=document.querySelector('#tm-review-dialog');
    let returnTarget=null;
    reviews.querySelectorAll('.tm-review-read').forEach(button => {
      const card=button.closest('.review-card');
      const duplicate=card.classList.contains('tm-review-duplicate');
      // Visual loop copies work with a pointer but never enter the keyboard or accessibility order.
      if (duplicate) button.addEventListener('pointerdown',event=>event.preventDefault());
      button.addEventListener('click',()=>{
        dialog.querySelector('.tm-dialog-text').textContent=card.querySelector('p').textContent;
        dialog.querySelector('.tm-dialog-author strong').textContent=card.querySelector('.review-top strong').textContent;
        dialog.querySelector('.tm-dialog-age').textContent=card.querySelector('.tm-review-age').textContent;
        const price=dialog.querySelector('.tm-dialog-price');
        price.textContent=card.querySelector('.review-price')?.textContent || '';
        price.hidden=!price.textContent;
        returnTarget=duplicate ? all : button;
        reviews.classList.add('has-open-review');
        dialog.showModal();
      });
    });
    dialog.querySelector('.tm-dialog-close').addEventListener('click',()=>dialog.close());
    dialog.addEventListener('click',event=>{
      const bounds=dialog.getBoundingClientRect();
      if(event.target===dialog && (event.clientX<bounds.left || event.clientX>bounds.right || event.clientY<bounds.top || event.clientY>bounds.bottom)) dialog.close();
    });
    dialog.addEventListener('close',()=>{
      reviews.classList.remove('has-open-review');
      returnTarget?.focus({preventScroll:true});
    });
    all.addEventListener('click', () => {
      const expanded=reviews.classList.toggle('is-expanded');
      all.setAttribute('aria-expanded',String(expanded));
      all.innerHTML = expanded ? 'Sbalit seznam recenzí <span aria-hidden="true">↑</span>' : `Zobrazit všech ${cards.length} recenzí <span aria-hidden="true">↗</span>`;
    });
  }

  const photos=document.querySelector('.tm-upload-zone input');
  if (photos) {
    const status=document.querySelector('.tm-upload-status');
    photos.addEventListener('change', () => {
      const files=[...photos.files];
      const problem=files.length>5 ? 'Vyberte nejvýše 5 fotografií.' : files.some(f=>f.size>4*1024*1024) ? 'Každá fotografie může mít nejvýše 4 MB.' : files.some(f=>!(/\.(jpe?g|png|webp)$/i).test(f.name)) ? 'Vyberte fotografie JPG, PNG nebo WebP.' : '';
      photos.setCustomValidity(problem);
      status.hidden=!files.length;
      status.textContent=problem || `Připraveno fotografií: ${files.length}`;
      photos.setAttribute('aria-invalid',String(Boolean(problem)));
    });
  }

  // Motion adds emphasis after entry; the page remains visible without this observer.
  const motionTargets=[...document.querySelectorAll('[data-tm-motion]')];
  if (!reduced.matches && 'IntersectionObserver' in window) {
    const enter=new IntersectionObserver(entries=>{
      entries.forEach(entry=>{
        if(!entry.isIntersecting) return;
        entry.target.classList.add('tm-motion-enter');
        enter.unobserve(entry.target);
      });
    },{threshold:.12});
    motionTargets.forEach((target,index)=>{target.style.setProperty('--tm-enter-delay',`${(index%3)*65}ms`);enter.observe(target);});
  }

  // Keep the approved hero markup intact while its original CTA reaches this proposal's form.
  document.addEventListener('click', (event) => {
    const link = event.target.closest('a[href="/#poptavka"]');
    if (!link || !document.getElementById('poptavka')) return;
    if (event.ctrlKey || event.metaKey || event.shiftKey || event.altKey || event.button !== 0) return;
    event.preventDefault();
    window.location.hash = 'poptavka';
  });
})();
