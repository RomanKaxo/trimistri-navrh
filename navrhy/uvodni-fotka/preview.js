(() => {
 const wipe=document.querySelector('#wipe');
 wipe?.addEventListener('input',()=>document.querySelector('.comparison').style.setProperty('--wipe',wipe.value+'%'));
 document.addEventListener('keydown',event=>{
  if(event.altKey||event.ctrlKey||event.metaKey||event.target.closest('input,textarea,select,button,[contenteditable]'))return;
  const links=document.querySelectorAll('.proposal-panel a');
  if(event.key==='ArrowLeft')location.href=links[0].href;
  if(event.key==='ArrowRight')location.href=links[1].href;
 });
})();
