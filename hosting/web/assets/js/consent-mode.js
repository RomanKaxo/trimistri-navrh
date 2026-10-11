(() => {
  'use strict';

  const panel = document.querySelector('[data-consent-panel]');
  const settings = document.querySelector('[data-consent-settings]');
  if (!panel || !settings) return;

  const showPanel = () => {
    panel.hidden = false;
    settings.setAttribute('aria-expanded', 'true');
  };
  const hidePanel = () => {
    panel.hidden = true;
    settings.setAttribute('aria-expanded', 'false');
  };

  if (window.triMistriConsentChoice === null) showPanel();
  settings.addEventListener('click', showPanel);

  panel.querySelectorAll('[data-consent-choice]').forEach((button) => {
    button.addEventListener('click', () => {
      const choice = button.getAttribute('data-consent-choice');
      if (choice !== 'granted' && choice !== 'denied') return;

      window.triMistriConsentChoice = choice;
      try { window.localStorage.setItem('tm_consent_v1', choice); } catch (error) {}
      if (typeof window.gtag === 'function') {
        window.gtag('consent', 'update', {
          ad_storage: choice,
          ad_user_data: choice,
          ad_personalization: choice,
          analytics_storage: choice,
        });
      }
      hidePanel();
    });
  });
})();
