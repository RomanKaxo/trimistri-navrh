(() => {
  'use strict';

  if (window.triMistriPhoneTrackingInstalled) return;
  window.triMistriPhoneTrackingInstalled = true;

  // Delegation covers phone links in the hero, contact form and shared footer.
  // Keep the native tel: action intact, even when analytics is blocked.
  document.addEventListener('click', (event) => {
    const link = event.target instanceof Element
      ? event.target.closest('a[href^="tel:"]')
      : null;
    if (!link || event.defaultPrevented || event.button !== 0) return;
    if (typeof window.gtag !== 'function') return;

    window.gtag('event', 'conversion', {
      send_to: 'AW-18282958447/_NAKCLbd8fccEO-c_41E',
      value: 0,
      currency: 'CZK',
      transport_type: 'beacon',
    });
  });
})();
