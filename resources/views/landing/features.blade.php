@extends('layouts.landing')

@section('title', 'Restaurant Features & POS Capabilities | ShreeSwarupOS')
@section('meta_description', 'Explore features of ShreeSwarupOS: QR Code digital menus, POS order tracking, kitchen display system (KDS), inventory management, staff roles, and analytics.')
@section('meta_keywords', 'restaurant features, QR menu features, kitchen display system, POS features, inventory management, ShreeSwarupOS features')

@section('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Restaurant Features & POS Capabilities",
  "description": "Explore comprehensive features of ShreeSwarupOS restaurant management system.",
  "publisher": {
    "@type": "Organization",
    "name": "ShreeSwarupOS"
  }
}
</script>
@endsection

@section('content')
<style>
:root {
  --green: #00b692;
  --green-dark: #009c7d;
  --orange: #ff6b2c;
  --dark: #0f172a;
  --gray: #475569;
  --light: #f8fafc;
  --border: #e2e8f0;
  --white: #ffffff;
  --card: #ffffff;
}
html.dark {
  --dark: #f8fafc;
  --gray: #94a3b8;
  --light: #0f172a;
  --border: #1e293b;
  --white: #0b0f19;
  --card: #111827;
}

.feat-page { font-family: 'Poppins', sans-serif; color: var(--dark); background: var(--white); }
.feat-page *, .feat-page *::before, .feat-page *::after { box-sizing: border-box; }

/* ── HERO ── */
.feat-hero {
  background: linear-gradient(135deg, #0f172a 0%, #0d2b22 50%, #0f1f2e 100%);
  padding: 100px 24px 80px;
  text-align: center;
  position: relative;
  overflow: hidden;
}
.feat-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 30% 60%, rgba(0,182,146,0.15) 0%, transparent 60%),
              radial-gradient(ellipse at 70% 30%, rgba(255,107,44,0.08) 0%, transparent 60%);
  pointer-events: none;
}
.feat-hero-tag {
  display: inline-block;
  background: rgba(0,182,146,0.12);
  border: 1px solid rgba(0,182,146,0.3);
  color: #00b692;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  padding: 6px 18px;
  border-radius: 30px;
  margin-bottom: 24px;
}
.feat-hero h1 {
  font-size: clamp(32px, 5vw, 58px);
  font-weight: 900;
  color: #fff;
  line-height: 1.15;
  margin: 0 0 20px;
}
.feat-hero h1 em { color: #00b692; font-style: normal; }
.feat-hero p {
  font-size: 17px;
  color: rgba(255,255,255,0.7);
  max-width: 580px;
  margin: 0 auto 40px;
  line-height: 1.8;
}
.feat-hero-btns { display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; }
.btn-hero-primary {
  background: #00b692;
  color: #fff;
  font-weight: 700;
  font-size: 14px;
  padding: 14px 32px;
  border-radius: 10px;
  text-decoration: none;
  transition: background .2s, transform .2s;
}
.btn-hero-primary:hover { background: #009c7d; transform: translateY(-2px); }
.btn-hero-ghost {
  background: transparent;
  color: #fff;
  border: 1.5px solid rgba(255,255,255,0.3);
  font-weight: 700;
  font-size: 14px;
  padding: 14px 32px;
  border-radius: 10px;
  text-decoration: none;
  transition: border-color .2s, transform .2s;
}
.btn-hero-ghost:hover { border-color: #00b692; color: #00b692; transform: translateY(-2px); }

/* ── STATS BAR ── */
.stats-bar {
  background: var(--white);
  border-bottom: 1px solid var(--border);
  padding: 28px 24px;
}
.stats-inner {
  max-width: 1000px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 24px;
  text-align: center;
}
@media (max-width: 640px) { .stats-inner { grid-template-columns: repeat(2, 1fr); } }
.stat-num {
  font-size: 28px;
  font-weight: 900;
  color: #00b692;
  display: block;
}
.stat-lbl {
  font-size: 12px;
  color: var(--gray);
  font-weight: 600;
  margin-top: 4px;
}

/* ── SECTION LAYOUT ── */
.feat-section {
  padding: 80px 24px;
}
.feat-section.alt { background: var(--light); }
.section-inner { max-width: 1180px; margin: 0 auto; }
.section-head { text-align: center; margin-bottom: 56px; }
.label-badge {
  display: inline-block;
  background: rgba(0,182,146,0.08);
  color: #00b692;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  padding: 5px 16px;
  border-radius: 20px;
  margin-bottom: 14px;
}
.section-head h2 {
  font-size: clamp(24px, 3.5vw, 38px);
  font-weight: 900;
  color: var(--dark);
  margin: 0 0 12px;
  line-height: 1.25;
}
.section-head h2 em { color: #00b692; font-style: normal; }
.section-head p {
  font-size: 15px;
  color: var(--gray);
  max-width: 520px;
  margin: 0 auto;
  line-height: 1.8;
}

/* ── FEATURE SPOTLIGHT (alternating) ── */
.feat-spotlight {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: center;
  margin-bottom: 80px;
}
.feat-spotlight:last-child { margin-bottom: 0; }
.feat-spotlight.reverse { direction: rtl; }
.feat-spotlight.reverse > * { direction: ltr; }
@media (max-width: 768px) {
  .feat-spotlight { grid-template-columns: 1fr; gap: 36px; }
  .feat-spotlight.reverse { direction: ltr; }
}
.feat-spot-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(0,182,146,0.08);
  border: 1px solid rgba(0,182,146,0.15);
  color: #00b692;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  padding: 6px 14px;
  border-radius: 20px;
  margin-bottom: 16px;
}
.feat-spot-badge svg { flex-shrink: 0; }
.feat-spot-text h3 {
  font-size: clamp(20px, 2.5vw, 28px);
  font-weight: 900;
  color: var(--dark);
  margin: 0 0 14px;
  line-height: 1.3;
}
.feat-spot-text p {
  font-size: 14.5px;
  color: var(--gray);
  line-height: 1.8;
  margin: 0 0 20px;
}
.feat-bullet-list {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
  gap: 10px;
}
.feat-bullet-list li {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  font-size: 13.5px;
  color: var(--dark);
  line-height: 1.6;
}
.feat-bullet-list li::before {
  content: '';
  width: 18px;
  height: 18px;
  background: rgba(0,182,146,0.12);
  border-radius: 50%;
  background-image: url("data:image/svg+xml,%3Csvg width='10' height='10' viewBox='0 0 10 10' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.5 5L4 7.5L8.5 2.5' stroke='%2300b692' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 10px;
  flex-shrink: 0;
  margin-top: 2px;
}

/* ── MOCKUP CARD ── */
.feat-mockup {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 24px;
  overflow: hidden;
  box-shadow: 0 20px 60px rgba(0,0,0,0.08);
}
.mockup-topbar {
  background: var(--light);
  border-bottom: 1px solid var(--border);
  padding: 12px 18px;
  display: flex;
  align-items: center;
  gap: 8px;
}
.mockup-dot { width: 10px; height: 10px; border-radius: 50%; }
.mockup-content { padding: 28px; }

/* QR feature mockup */
.qr-demo-box {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 16px;
  padding: 20px;
}
.qr-demo-box svg { border-radius: 12px; }

/* Menu preview mockup */
.menu-preview {
  display: flex;
  flex-direction: column;
  gap: 12px;
}
.menu-item-row {
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 12px;
  background: var(--light);
  border-radius: 12px;
  border: 1px solid var(--border);
}
.menu-item-emoji { font-size: 28px; flex-shrink: 0; }
.menu-item-info { flex: 1; }
.menu-item-name { font-size: 13px; font-weight: 700; color: var(--dark); }
.menu-item-desc { font-size: 11px; color: var(--gray); margin-top: 2px; }
.menu-item-price { font-size: 14px; font-weight: 800; color: #00b692; }

/* Table tracking mockup */
.table-grid-demo {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
}
.tbl-cell {
  aspect-ratio: 1;
  border-radius: 12px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  font-weight: 700;
  gap: 4px;
  border: 1.5px solid transparent;
  transition: transform .2s;
}
.tbl-cell.available { background: rgba(0,182,146,0.08); border-color: rgba(0,182,146,0.25); color: #00b692; }
.tbl-cell.occupied { background: rgba(255,107,44,0.08); border-color: rgba(255,107,44,0.25); color: #ff6b2c; }
.tbl-cell.reserved { background: rgba(99,102,241,0.08); border-color: rgba(99,102,241,0.25); color: #6366f1; }
.tbl-cell:hover { transform: scale(1.04); }

/* Order management mockup */
.order-list-demo { display: flex; flex-direction: column; gap: 10px; }
.order-row {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 14px;
  background: var(--light);
  border-radius: 12px;
  border: 1px solid var(--border);
}
.order-badge {
  padding: 4px 10px;
  border-radius: 20px;
  font-size: 10px;
  font-weight: 700;
  white-space: nowrap;
}
.order-badge.new { background: rgba(0,182,146,0.12); color: #00b692; }
.order-badge.prep { background: rgba(255,193,7,0.15); color: #d97706; }
.order-badge.done { background: rgba(99,102,241,0.12); color: #6366f1; }
.order-info { flex: 1; }
.order-title { font-size: 12px; font-weight: 700; color: var(--dark); }
.order-sub { font-size: 11px; color: var(--gray); }
.order-amount { font-size: 13px; font-weight: 800; color: var(--dark); }

/* Analytics mockup */
.analytics-demo { display: flex; flex-direction: column; gap: 14px; }
.chart-bar-row { display: flex; flex-direction: column; gap: 4px; }
.chart-bar-label { display: flex; justify-content: space-between; font-size: 11px; color: var(--gray); }
.chart-bar-track {
  height: 8px;
  background: var(--border);
  border-radius: 4px;
  overflow: hidden;
}
.chart-bar-fill { height: 100%; background: #00b692; border-radius: 4px; }

/* Integration mockup */
.integ-grid-demo { display: flex; flex-wrap: wrap; gap: 10px; }
.integ-chip-demo {
  display: flex;
  align-items: center;
  gap: 8px;
  background: var(--light);
  border: 1.5px solid var(--border);
  border-radius: 10px;
  padding: 8px 14px;
  font-size: 12px;
  font-weight: 600;
  color: var(--dark);
  transition: border-color .2s, transform .2s;
}
.integ-chip-demo:hover { border-color: #00b692; transform: translateY(-2px); }
.integ-chip-demo span { font-size: 16px; }

/* ── FEATURE CARDS GRID ── */
.feat-cards-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}
@media (max-width: 900px) { .feat-cards-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 560px) { .feat-cards-grid { grid-template-columns: 1fr; } }

.feat-card-mini {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 20px;
  padding: 28px;
  display: flex;
  flex-direction: column;
  gap: 14px;
  transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
  box-shadow: 0 2px 8px rgba(0,0,0,0.03);
}
.feat-card-mini:hover {
  transform: translateY(-6px);
  border-color: #00b692;
  box-shadow: 0 16px 40px rgba(0,182,146,0.1);
}
.feat-card-icon {
  width: 48px;
  height: 48px;
  border-radius: 14px;
  background: rgba(0,182,146,0.1);
  display: flex;
  align-items: center;
  justify-content: center;
  color: #00b692;
}
.feat-card-mini h4 { font-size: 15px; font-weight: 800; color: var(--dark); margin: 0; }
.feat-card-mini p { font-size: 13px; color: var(--gray); line-height: 1.7; margin: 0; }

/* ── CTA BOTTOM ── */
.feat-cta {
  background: linear-gradient(135deg, #00b692 0%, #009c7d 100%);
  padding: 80px 24px;
  text-align: center;
  position: relative;
  overflow: hidden;
}
.feat-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 20% 50%, rgba(255,255,255,0.06) 0%, transparent 60%),
              radial-gradient(ellipse at 80% 50%, rgba(255,255,255,0.04) 0%, transparent 60%);
  pointer-events: none;
}
.feat-cta h2 { font-size: clamp(24px, 3.5vw, 40px); font-weight: 900; color: #fff; margin: 0 0 14px; line-height: 1.25; }
.feat-cta p { font-size: 16px; color: rgba(255,255,255,0.85); margin: 0 auto 36px; max-width: 500px; line-height: 1.8; }
.btn-cta-white {
  background: #fff;
  color: #00b692;
  font-weight: 800;
  font-size: 15px;
  padding: 16px 40px;
  border-radius: 12px;
  text-decoration: none;
  display: inline-block;
  transition: transform .2s, box-shadow .2s;
  box-shadow: 0 8px 24px rgba(0,0,0,0.12);
}
.btn-cta-white:hover { transform: translateY(-2px); box-shadow: 0 16px 40px rgba(0,0,0,0.18); }
</style>

<div class="feat-page">

<!-- HERO -->
<section class="feat-hero">
  <span class="feat-hero-tag">All Features</span>
  <h1>Everything You Need to Run<br>Your <em>Restaurant Smarter</em></h1>
  <p>From digital QR menus to live order tracking, table management, and insightful analytics — TableTrack has it all under one roof.</p>
  <div class="feat-hero-btns">
    <a href="/restaurant-signup" class="btn-hero-primary">Start For Free</a>
    <a href="/pricing" class="btn-hero-ghost">View Pricing</a>
  </div>
</section>

<!-- STATS -->
<div class="stats-bar">
  <div class="stats-inner">
    <div>
      <span class="stat-num">12+</span>
      <div class="stat-lbl">Core Features</div>
    </div>
    <div>
      <span class="stat-num">500+</span>
      <div class="stat-lbl">Restaurants Using Us</div>
    </div>
    <div>
      <span class="stat-num">99.9%</span>
      <div class="stat-lbl">Uptime Guaranteed</div>
    </div>
    <div>
      <span class="stat-num">24/7</span>
      <div class="stat-lbl">Support Available</div>
    </div>
  </div>
</div>

<!-- SPOTLIGHT FEATURES -->
<section class="feat-section">
  <div class="section-inner" id="core-features-container">
    <div id="features-loading" style="text-align:center;padding:60px 0;color:var(--gray);font-size:14px;">
      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#00b692" stroke-width="2" style="animation:spin 1s linear infinite;margin-bottom:12px;"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
      <style>@keyframes spin{to{transform:rotate(360deg)}}</style>
      <div>Loading features...</div>
    </div>
  </div>
</section>

<!-- MORE FEATURES GRID -->
<section class="feat-section alt">
  <div class="section-inner">
    <div class="section-head">
      <h2>Plus <em>Powerful Tools</em> for Every Aspect of Your Restaurant</h2>
      <p>Packed with tools to help you run leaner, faster, and smarter every single day.</p>
    </div>
    <div class="feat-cards-grid" id="more-features-grid">
    </div>
  </div>
</section>


<!-- CTA -->
<section class="feat-cta">
  <div style="position:relative;z-index:1;">
    <h2>Ready to Get Started?<br>Try TableTrack Free Today.</h2>
    <p>No credit card required. Set up your restaurant in under 10 minutes and start taking orders digitally.</p>
    <a href="/restaurant-signup" class="btn-cta-white">Start For Free →</a>
  </div>
</section>

</div>

<script>
// ── DYNAMIC FEATURES FROM API ──
(function() {
  const API_HOST = window.TABLETRACK_CONFIG ? window.TABLETRACK_CONFIG.apiHost : 'http://127.0.0.1:8000';

  // SVG icons pool for core features
  const iconPool = [
    `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 3h7v7H3zM14 3h7v7h-7zM3 14h7v7H3zM18 14h.01M14 14h.01M14 17h.01M17 17h.01M20 17h.01M20 14h.01M17 14h.01M20 20h.01M17 20h.01"/></svg>`,
    `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>`,
    `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>`,
    `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>`,
    `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>`,
    `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>`,
  ];

  function getIcon(index) {
    return iconPool[index % iconPool.length];
  }

  function buildBullets(feature) {
    let bulletsList = [];
    if (feature.bullets) {
      if (Array.isArray(feature.bullets)) {
        bulletsList = feature.bullets;
      } else if (typeof feature.bullets === 'string') {
        bulletsList = feature.bullets.split(',').map(s => s.trim()).filter(Boolean);
      }
    }
    // Only use bullets if valid non-empty items exist
    bulletsList = bulletsList.filter(s => s && s.trim().length > 2);
    if (bulletsList.length === 0) return '';
    return `<ul class="feat-bullet-list">${bulletsList.map(s => `<li>${s.trim()}</li>`).join('')}</ul>`;
  }

  function buildSpotlight(feature, index) {
    const isReverse = index % 2 !== 0;
    const iconSvg = getIcon(index);
    const bulletsHtml = buildBullets(feature);
    const badgeHeading = feature.heading || 'FEATURE';
    const shortDescText = feature.short_desc || feature.description || '';
    const imageHtml = feature.image
      ? `<img src="${feature.image}" alt="${feature.title || 'Feature'}" style="max-width:100%;max-height:360px;object-fit:contain;border-radius:12px;box-shadow:0 8px 24px rgba(0,0,0,0.08);">`
      : `<div style="width:100%;min-height:180px;background:linear-gradient(135deg,rgba(0,182,146,0.08),rgba(99,102,241,0.08));border-radius:16px;display:flex;align-items:center;justify-content:center;font-size:48px;">✨</div>`;

    return `
      <div class="feat-spotlight ${isReverse ? 'reverse' : ''}">
        <div class="feat-spot-text">
          <div class="feat-spot-badge">${iconSvg} ${badgeHeading}</div>
          <h3>${feature.title || ''}</h3>
          <p>${shortDescText.replace(/<[^>]*>/g,'')}</p>
          ${bulletsHtml}
        </div>
        <div class="feat-mockup">
          <div class="mockup-topbar">
            <div class="mockup-dot" style="background:#ff5f57;"></div>
            <div class="mockup-dot" style="background:#febc2e;"></div>
            <div class="mockup-dot" style="background:#28c840;"></div>
            <span style="font-size:12px;color:var(--gray);margin-left:8px;">${badgeHeading} Preview</span>
          </div>
          <div class="mockup-content" style="padding:20px;display:flex;justify-content:center;align-items:center;">
            ${imageHtml}
          </div>
        </div>
      </div>`;
  }

  function buildMoreCard(feature, index) {
    const iconSvg = getIcon(index + 3);
    const iconHtml = feature.icon
      ? `<img src="${feature.icon}" alt="${feature.title || 'Icon'}" style="width:28px;height:28px;object-fit:contain;border-radius:6px;">`
      : iconSvg;
    const descText = feature.description || feature.short_desc || '';
    return `
      <div class="feat-card-mini">
        <div class="feat-card-icon">${iconHtml}</div>
        <h4>${feature.title || ''}</h4>
        <p>${descText.replace(/<[^>]*>/g,'')}</p>
      </div>`;
  }

  fetch(`${API_HOST}/api/v1/public/features`)
    .then(r => r.json())
    .then(res => {
      if (!res.success || !res.data) return;
      const { core_features = [], more_features = [] } = res.data;

      // ── Inject Core Spotlights ──
      const spotlightContainer = document.getElementById('core-features-container');
      if (spotlightContainer) {
        if (core_features.length > 0) {
          spotlightContainer.innerHTML = core_features.map((f, i) => buildSpotlight(f, i)).join('');
        } else {
          spotlightContainer.innerHTML = '<div style="text-align:center;padding:40px;color:var(--gray);">No Core Features configured yet. Add features in SuperAdmin Website Settings.</div>';
        }
      }

      // ── Inject More Features Cards ──
      const cardsGrid = document.getElementById('more-features-grid');
      if (cardsGrid) {
        if (more_features.length > 0) {
          cardsGrid.innerHTML = more_features.map((f, i) => buildMoreCard(f, i)).join('');
        } else {
          cardsGrid.innerHTML = '<div style="grid-column:1/-1;text-align:center;padding:40px;color:var(--gray);">No More Features configured yet.</div>';
        }
      }
    })
    .catch(err => {
      console.warn('Features API error:', err);
    });
})();
</script>

@endsection
