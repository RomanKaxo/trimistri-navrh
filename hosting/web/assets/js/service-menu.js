document.querySelectorAll('.service-menu-toggle').forEach((toggle) => {
  const submenu = document.getElementById(toggle.getAttribute('aria-controls'));
  toggle.setAttribute('aria-expanded', 'false');
  if (submenu) submenu.hidden = true;

  toggle.addEventListener('click', (event) => {
    event.preventDefault();
    event.stopPropagation();

    const submenu = document.getElementById(toggle.getAttribute('aria-controls'));
    if (!submenu) return;

    const shouldExpand = toggle.getAttribute('aria-expanded') !== 'true';

    document.querySelectorAll('.service-menu-toggle').forEach((otherToggle) => {
      const otherSubmenu = document.getElementById(otherToggle.getAttribute('aria-controls'));
      const isCurrentToggle = otherToggle === toggle;

      otherToggle.setAttribute('aria-expanded', String(isCurrentToggle && shouldExpand));
      if (otherSubmenu) otherSubmenu.hidden = !isCurrentToggle || !shouldExpand;
    });
  });
});

const servicesDropdown = document.querySelector('.navbar .nav-item.dropdown');
if (servicesDropdown) {
  servicesDropdown.addEventListener('hide.bs.dropdown', () => {
    document.querySelectorAll('.service-menu-toggle').forEach((toggle) => {
      const submenu = document.getElementById(toggle.getAttribute('aria-controls'));
      toggle.setAttribute('aria-expanded', 'false');
      if (submenu) submenu.hidden = true;
    });
  });
}
