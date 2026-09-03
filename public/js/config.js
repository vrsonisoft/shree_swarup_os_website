/**
 * TableTrack Global Application Configuration
 * 
 * Central place to manage API URL for both Local & Production.
 * If productionApiHost is left empty '', it auto-detects current website domain.
 * If backend is on a separate domain (e.g. https://admin.yourdomain.com), put it in productionApiHost.
 */
(function() {
  const productionApiHost = 'https://shreeswarupos.vrsonisoft.com';

  const isLocal = (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1');

  const baseHost = isLocal 
    ? 'http://127.0.0.1:8000' 
    : productionApiHost;

  window.TABLETRACK_CONFIG = {
    apiHost: baseHost,
    loginUrl: `${baseHost}/login`,
    signupUrl: `${baseHost}/restaurant-signup`
  };
  window.SHREESWARUP_CONFIG = window.TABLETRACK_CONFIG;

  // Intercept any Login & Restaurant Signup links on website to respect Debug vs Release target
  document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('click', function(e) {
      const link = e.target.closest('a[href]');
      if (!link) return;

      const href = link.getAttribute('href');
      if (href === '/login' || href === 'https://shreeswarupos.vrsonisoft.com/login' || href === 'http://127.0.0.1:8000/login') {
        e.preventDefault();
        window.location.href = window.TABLETRACK_CONFIG.loginUrl;
      } else if (href === '/restaurant-signup' || href === 'https://shreeswarupos.vrsonisoft.com/restaurant-signup' || href === 'http://127.0.0.1:8000/restaurant-signup') {
        e.preventDefault();
        window.location.href = window.TABLETRACK_CONFIG.signupUrl;
      }
    });
  });
})();
