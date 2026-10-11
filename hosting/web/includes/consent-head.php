<script>
  window.dataLayer = window.dataLayer || [];
  function gtag() { dataLayer.push(arguments); }
  (function () {
    var choice = null;
    try { choice = window.localStorage.getItem('tm_consent_v1'); } catch (error) {}
    window.triMistriConsentChoice = choice === 'granted' || choice === 'denied' ? choice : null;
    var state = choice === 'granted' ? 'granted' : 'denied';
    gtag('consent', 'default', {
      ad_storage: state,
      ad_user_data: state,
      ad_personalization: state,
      analytics_storage: state
    });
  }());
</script>
