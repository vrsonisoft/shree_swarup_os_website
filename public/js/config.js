/**
 * ChowChak Global Application Configuration
 * 
 * Central place to manage API URL for both Local & Production.
 * If productionApiHost is left empty '', it auto-detects current website domain.
 * If backend is on a separate domain (e.g. https://admin.yourdomain.com), put it in productionApiHost.
 */
(function() {
  const productionApiHost = 'https://console.chowchak.com';

  const isLocal = (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1');

  const baseHost = isLocal 
    ? 'http://127.0.0.1:8000' 
    : productionApiHost;

  window.TABLETRACK_CONFIG = {
    apiHost: baseHost,
    loginUrl: `${baseHost}/login`,
    signupUrl: `${baseHost}/restaurant-signup`
  };
  window.CHOWCHAK_CONFIG = window.TABLETRACK_CONFIG;
  window.SHREESWARUP_CONFIG = window.TABLETRACK_CONFIG;

  // Intercept any Login & Restaurant Signup links on website to respect Debug vs Release target
  document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('click', function(e) {
      const link = e.target.closest('a[href]');
      if (!link) return;

      const href = link.getAttribute('href');
      if (href === '/login' || href === 'https://console.chowchak.com/login' || href === 'http://127.0.0.1:8000/login') {
        e.preventDefault();
        window.open(window.TABLETRACK_CONFIG.loginUrl, '_blank');
      } else if (href === '/restaurant-signup' || href === 'https://console.chowchak.com/restaurant-signup' || href === 'http://127.0.0.1:8000/restaurant-signup') {
        e.preventDefault();
        window.open(window.TABLETRACK_CONFIG.signupUrl, '_blank');
      }
    });
  });

  // Auto-sync dynamic social & contact details from Admin Panel into Header & Footer across all pages
  function autoSyncDynamicData() {
    const apiEndpoint = `${baseHost}/api/v1/public/social-settings`;
    fetch(apiEndpoint)
      .then(r => r.json())
      .then(res => {
        if (!res || !res.success || !res.data) return;
        const d = res.data;
        window.CHOWCHAK_LIVE_SETTINGS = d;

        // 1. Top bar contact phones
        const topPhones = document.querySelectorAll('.top-contact-container a[href^="tel:"]');
        if (topPhones[0] && d.phone_number_1) {
          topPhones[0].href = `tel:${d.phone_number_1.replace(/[^\d+]/g, '')}`;
          topPhones[0].textContent = `🇮🇳 ${d.phone_number_1}`;
        }
        if (topPhones[1] && d.phone_number_2) {
          topPhones[1].href = `tel:${d.phone_number_2.replace(/[^\d+]/g, '')}`;
          topPhones[1].textContent = `🇮🇳 ${d.phone_number_2}`;
        }

        // 2. Footer socials (WhatsApp, Instagram, Facebook, LinkedIn, Twitter/X)
        const cleanWa = (d.whatsapp_number || '').toString().replace(/[^\d]/g, '');
        if (cleanWa) {
          document.querySelectorAll('a[title="WhatsApp"], a.social-icon-btn[href*="wa.me"]').forEach(el => {
            el.href = `https://wa.me/${cleanWa.length === 10 ? '91' + cleanWa : cleanWa}`;
          });
        }
        if (d.instagram_link) {
          document.querySelectorAll('a[title="Instagram"], a.social-icon-btn[href*="instagram"]').forEach(el => {
            el.href = d.instagram_link;
          });
        }
        if (d.facebook_link) {
          document.querySelectorAll('a[title="Facebook"], a.social-icon-btn[href*="facebook"]').forEach(el => {
            el.href = d.facebook_link;
          });
        }
        if (d.linkedin_link) {
          document.querySelectorAll('a[title="LinkedIn"], a.social-icon-btn[href*="linkedin"]').forEach(el => {
            el.href = d.linkedin_link;
          });
        }
        if (d.twitter_link) {
          document.querySelectorAll('a[title="X"], a[title="X (Twitter)"], a[title="Twitter / X"], a.social-icon-btn[href*="twitter"], a.social-icon-btn[href*="x.com"]').forEach(el => {
            el.href = d.twitter_link;
          });
        }
      })
      .catch(() => {});
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', autoSyncDynamicData);
  } else {
    autoSyncDynamicData();
  }
})();
