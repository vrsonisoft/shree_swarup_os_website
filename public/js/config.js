/**
 * TableTrack Global Application Configuration
 * 
 * Central place to manage API URL for both Local & Production.
 * If productionApiHost is left empty '', it auto-detects current website domain.
 * If backend is on a separate domain (e.g. https://admin.yourdomain.com), put it in productionApiHost.
 */
(function() {
  const productionApiHost = 'https://shreeswarupos.vrsonisoft.com'; // Live ShreeSwarupOS App

  const isLocal = (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1');

  window.TABLETRACK_CONFIG = {
    apiHost: isLocal 
      ? 'http://127.0.0.1:8000' 
      : (productionApiHost.trim() || window.location.origin)
  };
})();
