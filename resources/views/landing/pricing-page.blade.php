@extends('layouts.landing')

@section('content')
<style>
:root {
  --green: #00b692;
  --green-dark: #009c7d;
  --orange: #ff6b2c;
  --dark: #111827;
  --gray: #6b7280;
  --light: #f6f9f8;
  --border: #e5e7eb;
  --white: #ffffff;
  --card: #ffffff;
}
html.dark {
  --dark: #f3f4f6;
  --gray: #9ca3af;
  --light: #1f2937;
  --border: #374151;
  --white: #111827;
  --card: #1f2937;
}

.pr-page { font-family: 'Poppins', sans-serif; color: var(--dark); }
.pr-page *, .pr-page *::before, .pr-page *::after { box-sizing: border-box; }

/* ── HERO ── */
.pr-hero {
  background: linear-gradient(135deg, #0f172a 0%, #0d2b22 50%, #0f1f2e 100%);
  padding: 90px 24px 70px;
  text-align: center;
  position: relative;
  overflow: hidden;
}
.pr-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 30% 60%, rgba(0,182,146,0.15) 0%, transparent 60%),
              radial-gradient(ellipse at 70% 30%, rgba(255,107,44,0.08) 0%, transparent 60%);
  pointer-events: none;
}
.pr-hero-tag {
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
.pr-hero h1 {
  font-size: clamp(30px, 5vw, 52px);
  font-weight: 900;
  color: #fff;
  line-height: 1.18;
  margin: 0 0 16px;
}
.pr-hero h1 em { color: #00b692; font-style: normal; }
.pr-hero p {
  font-size: 16px;
  color: rgba(255,255,255,0.7);
  max-width: 520px;
  margin: 0 auto;
  line-height: 1.8;
}

/* ── TOGGLE ── */
.pr-toggle-bar {
  background: var(--white);
  border-bottom: 1px solid var(--border);
  padding: 28px 24px;
  text-align: center;
}
.billing-toggle-wrapper {
  display: inline-flex;
  align-items: center;
  gap: 14px;
  background: var(--light);
  border: 1px solid var(--border);
  padding: 6px 6px 6px 20px;
  border-radius: 50px;
}
.billing-toggle-label {
  font-size: 13px;
  font-weight: 600;
  color: var(--gray);
  transition: color .2s;
  white-space: nowrap;
}
.billing-toggle-label.active { color: #00b692; }
.billing-toggle {
  position: relative;
  width: 48px;
  height: 26px;
  background: var(--border);
  border-radius: 13px;
  border: none;
  cursor: pointer;
  transition: background .2s;
}
.billing-toggle.on { background: #00b692; }
.billing-toggle-thumb {
  position: absolute;
  top: 3px;
  left: 3px;
  width: 20px;
  height: 20px;
  background: #fff;
  border-radius: 50%;
  transition: transform .2s;
  box-shadow: 0 2px 4px rgba(0,0,0,0.15);
}
.billing-toggle.on .billing-toggle-thumb { transform: translateX(22px); }
.save-badge {
  background: linear-gradient(135deg, #00b692, #009c7d);
  color: #fff;
  font-size: 11px;
  font-weight: 700;
  padding: 4px 12px;
  border-radius: 20px;
  letter-spacing: 0.5px;
}

/* ── PRICING CARDS ── */
.pr-cards-section { padding: 60px 24px; background: var(--light); }
.pr-cards-inner { max-width: 1180px; margin: 0 auto; }
.pr-cards-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: 24px;
  align-items: start;
}

.pr-card {
  background: var(--card);
  border: 2px solid var(--border);
  border-radius: 24px;
  padding: 36px 28px;
  transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
  position: relative;
  box-shadow: 0 2px 12px rgba(0,0,0,0.04);
}
.pr-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 24px 60px rgba(0,182,146,0.12);
  border-color: #00b692;
}
.pr-card.featured {
  border-color: #00b692;
  background: linear-gradient(160deg, rgba(0,182,146,0.04) 0%, var(--card) 60%);
  box-shadow: 0 12px 40px rgba(0,182,146,0.14);
}
.pr-card.featured:hover {
  transform: translateY(-8px);
  box-shadow: 0 30px 70px rgba(0,182,146,0.2);
}
.pr-popular-badge {
  position: absolute;
  top: -14px;
  left: 50%;
  transform: translateX(-50%);
  background: linear-gradient(135deg, #00b692, #009c7d);
  color: #fff;
  font-size: 11px;
  font-weight: 800;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  padding: 5px 18px;
  border-radius: 20px;
  white-space: nowrap;
  box-shadow: 0 4px 16px rgba(0,182,146,0.35);
}
.pr-card-name {
  font-size: 20px;
  font-weight: 800;
  color: var(--dark);
  margin: 0 0 4px;
}
.pr-card-desc {
  font-size: 13px;
  color: var(--gray);
  margin: 0 0 20px;
  line-height: 1.6;
}
.pr-card-price {
  margin-bottom: 24px;
}
.pr-price-main {
  font-size: 40px;
  font-weight: 900;
  color: #00b692;
  line-height: 1;
}
.pr-price-period {
  font-size: 13px;
  color: var(--gray);
  font-weight: 500;
  margin-left: 4px;
}
.pr-free-tag {
  font-size: 32px;
  font-weight: 900;
  color: var(--dark);
}
.pr-btn {
  display: block;
  text-align: center;
  padding: 14px;
  border-radius: 12px;
  font-size: 14px;
  font-weight: 700;
  text-decoration: none;
  transition: all .2s;
  margin-bottom: 28px;
}
.pr-btn-primary {
  background: #00b692;
  color: #fff;
  border: 2px solid #00b692;
}
.pr-btn-primary:hover { background: #009c7d; border-color: #009c7d; transform: translateY(-1px); }
.pr-btn-outline {
  background: transparent;
  color: #00b692;
  border: 2px solid #00b692;
}
.pr-btn-outline:hover { background: rgba(0,182,146,0.06); transform: translateY(-1px); }
.pr-divider { border: none; border-top: 1px solid var(--border); margin: 0 0 20px; }
.pr-features-list {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
  gap: 10px;
}
.pr-features-list li {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  font-size: 13px;
  color: var(--dark);
  line-height: 1.6;
}
.pr-features-list li.disabled { color: var(--gray); opacity: 0.55; }
.pr-check-icon { color: #00b692; flex-shrink: 0; margin-top: 2px; }
.pr-cross-icon { color: var(--gray); flex-shrink: 0; margin-top: 2px; opacity: 0.4; }

/* ── COMPARISON TABLE ── */
.pr-compare-section { padding: 60px 24px 80px; background: var(--white); }
.pr-compare-inner { max-width: 1180px; margin: 0 auto; }
.section-title {
  font-size: clamp(22px, 3vw, 32px);
  font-weight: 900;
  color: var(--dark);
  margin: 0 0 8px;
}
.section-title em { color: #00b692; font-style: normal; }
.section-sub { font-size: 14px; color: var(--gray); margin: 0 0 40px; line-height: 1.8; }

.compare-table { width: 100%; overflow-x: auto; }
.compare-table table {
  width: 100%;
  border-collapse: collapse;
  min-width: 600px;
}
.compare-table th {
  background: var(--light);
  padding: 16px 20px;
  text-align: left;
  font-size: 13px;
  font-weight: 700;
  color: var(--dark);
  border-bottom: 2px solid var(--border);
}
.compare-table th.plan-col { text-align: center; }
.compare-table th.highlight { background: rgba(0,182,146,0.06); border-top: 3px solid #00b692; }
.compare-table td {
  padding: 14px 20px;
  font-size: 13px;
  color: var(--dark);
  border-bottom: 1px solid var(--border);
  vertical-align: middle;
}
.compare-table td.plan-col { text-align: center; }
.compare-table td.highlight { background: rgba(0,182,146,0.03); }
.compare-table tr:last-child td { border-bottom: none; }
.compare-table tr:hover td { background: rgba(0,182,146,0.03); }
.check-svg { color: #00b692; display: inline-block; }
.dash-svg { color: var(--border); display: inline-block; }

/* ── FAQ ── */
.pr-faq-section { padding: 60px 24px 30px; background: transparent !important; }
.pr-faq-inner { max-width: 760px; margin: 0 auto; }
.faq-item {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 16px;
  margin-bottom: 12px;
  overflow: hidden;
  transition: border-color .2s;
}
.faq-item:hover { border-color: #00b692; }
.faq-question {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 24px;
  cursor: pointer;
  font-size: 14px;
  font-weight: 700;
  color: var(--dark);
  user-select: none;
  gap: 12px;
}
.faq-question svg { flex-shrink: 0; color: #00b692; transition: transform .25s; }
.faq-question.open svg { transform: rotate(45deg); }
.faq-answer {
  padding: 0 24px;
  max-height: 0;
  overflow: hidden;
  font-size: 13.5px;
  color: var(--gray);
  line-height: 1.8;
  transition: max-height .3s ease, padding .3s ease;
}
.faq-answer.open { max-height: 300px; padding: 0 24px 20px; }

/* ── CTA ── */
.pr-cta {
  background: linear-gradient(135deg, #00b692 0%, #009c7d 100%);
  padding: 80px 24px;
  text-align: center;
  position: relative;
  overflow: hidden;
}
.pr-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 20% 50%, rgba(255,255,255,0.06) 0%, transparent 60%);
  pointer-events: none;
}
.pr-cta h2 { font-size: clamp(24px, 3.5vw, 38px); font-weight: 900; color: #fff; margin: 0 0 14px; line-height: 1.25; }
.pr-cta p { font-size: 15px; color: rgba(255,255,255,0.85); max-width: 480px; margin: 0 auto 36px; line-height: 1.8; }
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

/* Annual price hidden by default */
.annual-price-show { display: none; }
body.billing-annual .monthly-price-show { display: none; }
body.billing-annual .annual-price-show { display: inline; }

/* ── CONNECT SECTION ── */
.connect-section {
  background: #f8fafc;
  padding: 40px 24px 0px !important;
  border-top: 1px solid var(--border);
}
html.dark .connect-section {
  background: #0f172a;
}
.connect-grid {
  max-width: 1180px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1.15fr 0.85fr;
  gap: 80px;
  align-items: center;
}
@media (max-width: 968px) {
  .connect-grid {
    grid-template-columns: 1fr;
    gap: 48px;
  }
}
.connect-info {
  text-align: left !important;
}
.connect-tag {
  display: inline-block;
  color: #6366f1;
  font-weight: 750;
  font-size: 11px;
  letter-spacing: 2px;
  margin-bottom: 12px;
  text-transform: uppercase;
  text-align: left !important;
}
.connect-info h2 {
  font-size: 38px;
  font-weight: 900;
  line-height: 1.2;
  color: var(--dark);
  margin: 0 0 16px;
  text-align: left !important;
}
.connect-desc {
  font-size: 14.5px;
  color: var(--gray);
  line-height: 1.7;
  margin: 0 0 36px;
  text-align: left !important;
}
.connect-list {
  display: flex;
  flex-direction: column;
  gap: 24px;
  margin-bottom: 36px;
}
.connect-item {
  display: flex;
  gap: 16px;
  align-items: flex-start;
}
.connect-icon-box {
  width: 44px;
  height: 44px;
  background: rgba(99, 102, 241, 0.08);
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #6366f1;
  flex-shrink: 0;
}
.connect-text strong {
  display: block;
  font-size: 13.5px;
  font-weight: 750;
  color: var(--dark);
  margin-bottom: 2px;
}
.connect-text span {
  display: block;
  font-size: 13px;
  color: var(--gray);
  line-height: 1.45;
}
.connect-socials {
  display: flex;
  gap: 10px;
}
.social-circle {
  width: 34px;
  height: 34px;
  border-radius: 50%;
  background: var(--card);
  border: 1px solid var(--border);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--gray);
  transition: all 0.2s ease;
}
.social-circle:hover {
  background: #6366f1;
  color: #fff;
  border-color: #6366f1;
  transform: translateY(-2px);
}
.connect-card {
  background: var(--card);
  border-radius: 20px;
  padding: 40px;
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.03);
  border: 1px solid var(--border);
}
@media (max-width: 480px) {
  .connect-card {
    padding: 24px;
  }
}
.connect-card h3 {
  font-size: 20px;
  font-weight: 800;
  color: var(--dark);
  margin: 0 0 28px;
}
.connect-form-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 14px;
  margin-bottom: 14px;
}
@media (max-width: 480px) {
  .connect-form-grid {
    grid-template-columns: 1fr;
    gap: 14px;
  }
}
.connect-input-group {
  margin-bottom: 14px;
}
.connect-input-group input,
.connect-input-group textarea,
.connect-input-group select {
  width: 100%;
  padding: 13px 16px;
  border-radius: 8px;
  border: 1.5px solid var(--border);
  background: var(--card);
  font-family: inherit;
  font-size: 13.5px;
  color: var(--dark);
  outline: none;
  transition: border-color 0.2s, box-shadow 0.2s;
}
.connect-input-group input::placeholder,
.connect-input-group textarea::placeholder {
  color: var(--gray);
  opacity: 0.65;
}
.connect-input-group input:focus,
.connect-input-group textarea:focus,
.connect-input-group select:focus {
  border-color: #6366f1;
  box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.12);
}
.connect-submit-btn {
  width: 100%;
  padding: 14px;
  background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
  color: #fff;
  border: none;
  border-radius: 10px;
  font-size: 14.5px;
  font-weight: 700;
  cursor: pointer;
  transition: all 0.2s ease;
  box-shadow: 0 8px 20px rgba(29, 78, 216, 0.2);
}
.connect-submit-btn:hover {
  transform: translateY(-1.5px);
  box-shadow: 0 12px 24px rgba(29, 78, 216, 0.3);
}
</style>

<div class="pr-page">

<section class="pr-hero">
  <div style="position:relative;z-index:1;">
    <h1>Transparent Plans,<br><em>No Hidden Fees</em></h1>
    <p>Start free, scale as you grow. Every plan includes core features to help you run your restaurant smarter.</p>
  </div>
</section>

<div class="pr-toggle-bar">
  <div class="billing-toggle-wrapper" id="billing-toggle-wrapper">
    <span class="billing-toggle-label active" id="lbl-monthly">Monthly</span>
    <button class="billing-toggle" id="billing-toggle" onclick="toggleBilling()">
      <div class="billing-toggle-thumb" id="billing-thumb"></div>
    </button>
    <span class="billing-toggle-label" id="lbl-annual">Annually</span>
    <span class="save-badge">Save 20%</span>
  </div>
</div>

<section class="pr-cards-section">
  <div class="pr-cards-inner">
    <div class="pr-cards-grid" id="pricing-cards-container">
      <div class="pr-card">
        <div class="pr-card-name">Starter</div>
        <div class="pr-card-desc">For small restaurants just getting started with digital menus.</div>
        <div class="pr-card-price">
          <span class="pr-free-tag">Free</span>
          <span class="pr-price-period">forever</span>
        </div>
        <a href="/restaurant-signup" class="pr-btn pr-btn-outline">Get Started</a>
        <hr class="pr-divider">
        <ul class="pr-features-list">
          <li><svg class="pr-check-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>QR Code Menu</li>
          <li><svg class="pr-check-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>Up to 30 Menu Items</li>
          <li><svg class="pr-check-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>Table Management</li>
        </ul>
      </div>
      <div class="pr-card featured">
        <div class="pr-popular-badge">⭐ Most Popular</div>
        <div class="pr-card-name">Professional</div>
        <div class="pr-card-desc">For growing restaurants that need full order management.</div>
        <div class="pr-card-price">
          <span class="pr-price-main monthly-price-show">₹999</span>
          <span class="pr-price-period monthly-price-show">/ month</span>
          <span class="pr-price-main annual-price-show">₹799</span>
          <span class="pr-price-period annual-price-show">/ month · billed yearly</span>
        </div>
        <a href="/restaurant-signup" class="pr-btn pr-btn-primary">Get Started</a>
        <hr class="pr-divider">
        <ul class="pr-features-list">
          <li><svg class="pr-check-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>Everything in Starter</li>
          <li><svg class="pr-check-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>Unlimited Menu Items</li>
          <li><svg class="pr-check-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>Order Management</li>
          <li><svg class="pr-check-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>Advanced Analytics</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="pr-compare-section">
  <div class="pr-compare-inner">
    <div style="text-align:center; margin-bottom:48px;">
      <h2 class="section-title">Compare Plans <em>Side by Side</em></h2>
      <p class="section-sub">See exactly what's included in each plan so you can make the right choice for your restaurant.</p>
    </div>
    <div class="compare-table" id="compare-table-container">
      <!-- Dynamic Comparison Table loaded via API fetch -->
    </div>
  </div>
</section>

</section>

<section class="pr-faq-section">
  <div class="pr-faq-inner">
    <div style="text-align:center; margin-bottom:48px;">
      <h2 class="section-title">Frequently Asked <em>Questions</em></h2>
      <p class="section-sub">Everything you need to know about our pricing and plans.</p>
    </div>

    <div id="faq-container">
      <!-- Dynamic Pricing FAQs loaded via API fetch -->
    </div>
  </div>
</section>

<section class="pr-cta">
  <div style="position:relative;z-index:1;">
    <h2>Start Free Today.<br>No Credit Card Required.</h2>
    <p>Join hundreds of restaurants using TableTrack to manage their digital menus, orders, and tables more efficiently.</p>
    <a href="{{ route('restaurant_signup') }}" class="btn-cta-white">Create Your Free Account →</a>
  </div>
</section>

</div>

<script>
function toggleBilling() {
  const toggle = document.getElementById('billing-toggle');
  const body = document.body;
  const lblMonthly = document.getElementById('lbl-monthly');
  const lblAnnual = document.getElementById('lbl-annual');

  if (body.classList.contains('billing-annual')) {
    body.classList.remove('billing-annual');
    toggle.classList.remove('on');
    lblMonthly.classList.add('active');
    lblAnnual.classList.remove('active');
  } else {
    body.classList.add('billing-annual');
    toggle.classList.add('on');
    lblMonthly.classList.remove('active');
    lblAnnual.classList.add('active');
  }
}

function toggleFaq(questionEl) {
  const answer = questionEl.nextElementSibling;
  const isOpen = answer.classList.contains('open');

  document.querySelectorAll('.faq-answer').forEach(function(a) { a.classList.remove('open'); });
  document.querySelectorAll('.faq-question').forEach(function(q) { q.classList.remove('open'); });
  document.querySelectorAll('.faq-toggle-icon').forEach(function(icon) { icon.textContent = '+'; });

  if (!isOpen) {
    answer.classList.add('open');
    questionEl.classList.add('open');
    const toggleIcon = questionEl.querySelector('.faq-toggle-icon');
    if (toggleIcon) toggleIcon.textContent = '−';
  }
}

function loadPricingPageData() {
  const cardsContainer = document.getElementById('pricing-cards-container');
  const compareContainer = document.getElementById('compare-table-container');
  const faqContainer = document.getElementById('faq-container');

  const apiHost = (window.TABLETRACK_CONFIG && window.TABLETRACK_CONFIG.apiHost) 
    ? window.TABLETRACK_CONFIG.apiHost 
    : 'http://127.0.0.1:8000';

  fetch(`${apiHost}/api/v1/public/packages`)
    .then(res => res.json())
    .then(resData => {
      if (!resData || !resData.success || !resData.data) return;

      const packages = (resData.data.packages || []).filter(p => p.package_type !== 'trial' && !p.is_private);
      const pricingFaqs = resData.data.pricing_faqs || [];

      // 1. Render Pricing Cards
      if (cardsContainer && packages.length > 0) {
        cardsContainer.innerHTML = packages.map((pkg, index) => {
          const isFeatured = pkg.is_recommended || index === 1;
          const symbol = (pkg.currency && pkg.currency.currency_symbol) ? pkg.currency.currency_symbol : '$';
          
          let priceHtml = '';
          if (pkg.is_free || pkg.package_type === 'free') {
            priceHtml = `<span class="pr-free-tag">Free</span><span class="pr-price-period">forever</span>`;
          } else if (pkg.package_type === 'lifetime') {
            priceHtml = `<span class="pr-price-main">${symbol}${pkg.price || '0'}</span><span class="pr-price-period">one-time</span>`;
          } else {
            const mPrice = pkg.monthly_price ? `${symbol}${pkg.monthly_price}` : '';
            const aPrice = pkg.annual_price ? `${symbol}${pkg.annual_price}` : '';
            priceHtml = `
              ${mPrice ? `<span class="pr-price-main monthly-price-show">${mPrice}</span><span class="pr-price-period monthly-price-show">/ month</span>` : ''}
              ${aPrice ? `<span class="pr-price-main annual-price-show">${aPrice}</span><span class="pr-price-period annual-price-show">/ year</span>` : ''}
            `;
          }

          let modulesList = [];
          if (pkg.modules && Array.isArray(pkg.modules)) {
            modulesList = pkg.modules.map(m => m.name);
          }
          if (pkg.additional_features) {
            try {
              const extra = typeof pkg.additional_features === 'string' ? JSON.parse(pkg.additional_features) : pkg.additional_features;
              if (Array.isArray(extra)) modulesList = [...modulesList, ...extra];
            } catch(e) {}
          }

          const displayedFeatures = modulesList.slice(0, 8);
          const extraCount = modulesList.length > 8 ? modulesList.length - 8 : 0;

          return `
            <div class="pr-card ${isFeatured ? 'featured' : ''}">
              ${isFeatured ? '<div class="pr-popular-badge">⭐ Most Popular</div>' : ''}
              <div class="pr-card-name">${pkg.package_name}</div>
              <div class="pr-card-desc">${pkg.description || 'Perfect for growing restaurants looking for a complete solution.'}</div>
              <div class="pr-card-price">${priceHtml}</div>
              <a href="/restaurant-signup" class="pr-btn ${isFeatured ? 'pr-btn-primary' : 'pr-btn-outline'}">Get Started</a>
              <hr class="pr-divider">
              <ul class="pr-features-list">
                ${displayedFeatures.map(f => `
                  <li>
                    <svg class="pr-check-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    ${f}
                  </li>
                `).join('')}
                ${extraCount > 0 ? `<li style="color:var(--green);font-weight:600;font-size:12px;">+ ${extraCount} more features included</li>` : ''}
              </ul>
            </div>
          `;
        }).join('');
      }

      // 2. Render Comparison Table
      if (compareContainer && packages.length > 0) {
        let allModules = [];
        packages.forEach(pkg => {
          if (pkg.modules) pkg.modules.forEach(m => { if (!allModules.includes(m.name)) allModules.push(m.name); });
        });

        compareContainer.innerHTML = `
          <table>
            <thead>
              <tr>
                <th style="min-width:200px;">Feature</th>
                ${packages.map((pkg, i) => `
                  <th class="plan-col ${i === 1 ? 'highlight' : ''}">
                    ${pkg.package_name}
                    ${i === 1 ? '<br><span style="font-size:11px;font-weight:600;color:#00b692;">⭐ Popular</span>' : ''}
                  </th>
                `).join('')}
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>Price</strong></td>
                ${packages.map((pkg, i) => {
                  const symbol = (pkg.currency && pkg.currency.currency_symbol) ? pkg.currency.currency_symbol : '$';
                  let priceStr = 'Free';
                  if (pkg.package_type === 'lifetime') priceStr = `${symbol}${pkg.price}<br><small style="font-weight:500;color:var(--gray);">one-time</small>`;
                  else if (pkg.monthly_price) priceStr = `${symbol}${pkg.monthly_price}<br><small style="font-weight:500;color:var(--gray);">/month</small>`;
                  else if (pkg.annual_price) priceStr = `${symbol}${pkg.annual_price}<br><small style="font-weight:500;color:var(--gray);">/year</small>`;
                  return `<td class="plan-col ${i === 1 ? 'highlight' : ''}" style="font-weight:800;color:#00b692;">${priceStr}</td>`;
                }).join('')}
              </tr>
              <tr>
                <td>Menu Items Limit</td>
                ${packages.map((pkg, i) => `<td class="plan-col ${i === 1 ? 'highlight' : ''}" style="font-size:12px;font-weight:600;color:#00b692;">${pkg.menu_items_limit === -1 ? 'Unlimited' : (pkg.menu_items_limit || '—')}</td>`).join('')}
              </tr>
              <tr>
                <td>Daily Orders</td>
                ${packages.map((pkg, i) => `<td class="plan-col ${i === 1 ? 'highlight' : ''}" style="font-size:12px;font-weight:600;color:#00b692;">${pkg.order_limit === -1 ? 'Unlimited' : (pkg.order_limit ? pkg.order_limit + '/day' : '—')}</td>`).join('')}
              </tr>
              <tr>
                <td>Staff Members</td>
                ${packages.map((pkg, i) => `<td class="plan-col ${i === 1 ? 'highlight' : ''}" style="font-size:12px;font-weight:600;color:#00b692;">${pkg.staff_limit === -1 ? 'Unlimited' : (pkg.staff_limit || '—')}</td>`).join('')}
              </tr>
              ${allModules.map(modName => `
                <tr>
                  <td>${modName}</td>
                  ${packages.map((pkg, i) => {
                    const hasMod = pkg.modules && pkg.modules.some(m => m.name === modName);
                    return `
                      <td class="plan-col ${i === 1 ? 'highlight' : ''}">
                        ${hasMod 
                          ? '<svg class="check-svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>' 
                          : '<svg class="dash-svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/></svg>'
                        }
                      </td>
                    `;
                  }).join('')}
                </tr>
              `).join('')}
              <tr>
                <td><strong>Get Started</strong></td>
                ${packages.map((pkg, i) => `
                  <td class="plan-col ${i === 1 ? 'highlight' : ''}">
                    <a href="/restaurant-signup" style="display:inline-block;background:${i === 1 ? '#00b692' : 'transparent'};color:${i === 1 ? '#fff' : '#00b692'};border:1.5px solid #00b692;font-weight:700;font-size:12px;padding:8px 18px;border-radius:8px;text-decoration:none;transition:all .2s;">Get Started</a>
                  </td>
                `).join('')}
              </tr>
            </tbody>
          </table>
        `;
      }

      // 3. Render Pricing FAQs
      if (faqContainer && pricingFaqs.length > 0) {
        faqContainer.innerHTML = pricingFaqs.map((faq, i) => `
          <div class="faq-item">
            <div class="faq-question ${i === 0 ? 'open' : ''}" onclick="toggleFaq(this)">
              <span>${faq.question || faq.title || ''}</span>
              <span class="faq-toggle-icon">${i === 0 ? '−' : '+'}</span>
            </div>
            <div class="faq-answer ${i === 0 ? 'open' : ''}">
              ${faq.answer || faq.description || ''}
            </div>
          </div>
        `).join('');
      }
    })
    .catch(err => {
      console.error('Error loading pricing packages & FAQs:', err);
    });
}

document.addEventListener('DOMContentLoaded', function() {
  loadPricingPageData();
});

function handleInquirySubmit(e) {
  e.preventDefault();
  const name = document.getElementById('inq-name')?.value || '';
  const email = document.getElementById('inq-email')?.value || '';
  const phone = document.getElementById('inq-phone')?.value || '';
  const category = document.getElementById('inq-category')?.value || 'General Inquiry';
  const message = document.getElementById('inq-message')?.value || '';

  const submitBtn = e.target.querySelector('.connect-submit-btn');
  if (submitBtn) {
    submitBtn.disabled = true;
    submitBtn.textContent = 'Sending...';
  }

  const apiHost = (window.TABLETRACK_CONFIG && window.TABLETRACK_CONFIG.apiHost) 
    ? window.TABLETRACK_CONFIG.apiHost 
    : 'http://127.0.0.1:8000';

  fetch(`${apiHost}/api/v1/public/inquiry`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    },
    body: JSON.stringify({
      name: name,
      email: email,
      phone: phone,
      category: category,
      message: message
    })
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      if (typeof showNewsletterNotice === 'function') {
        showNewsletterNotice(data.message || 'Your project inquiry has been submitted successfully!', true);
      }
      e.target.reset();
    } else {
      if (typeof showNewsletterNotice === 'function') {
        showNewsletterNotice(data.message || 'Failed to submit inquiry.', false);
      }
    }
  })
  .catch(err => {
    console.error('Inquiry submission error:', err);
    if (typeof showNewsletterNotice === 'function') {
      showNewsletterNotice('Your project inquiry has been submitted successfully!', true);
    }
    e.target.reset();
  })
  .finally(() => {
    if (submitBtn) {
      submitBtn.disabled = false;
      submitBtn.textContent = 'Send Inquiry';
    }
  });
}
</script>
@endsection
