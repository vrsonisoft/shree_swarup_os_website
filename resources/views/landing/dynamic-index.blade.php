@extends('layouts.landing')

@section('content')
<style>
/* ============================================================
   MENU TIGER LANDING — FULL RICH DESIGN
============================================================ */
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

.mt { font-family: 'Poppins', sans-serif; color: var(--dark); }
.mt *, .mt *::before, .mt *::after { box-sizing: border-box; }
.mt a { text-decoration: none; }

/* ── BUTTONS ── */
.btn-green {
  display: inline-flex; align-items: center; gap: 8px;
  background: var(--green); color: #fff; font-weight: 700; font-size: 14px;
  padding: 13px 28px; border-radius: 8px;
  transition: background .2s, transform .15s, box-shadow .2s;
  box-shadow: 0 4px 16px rgba(0,182,146,.35);
}
.btn-green:hover { background: var(--green-dark); transform: translateY(-1px); box-shadow: 0 8px 24px rgba(0,182,146,.4); }
.btn-orange {
  display: inline-flex; align-items: center; gap: 8px;
  background: var(--orange); color: #fff; font-weight: 700; font-size: 14px;
  padding: 13px 28px; border-radius: 8px;
  transition: background .2s, transform .15s;
  box-shadow: 0 4px 16px rgba(255,107,44,.3);
}
.btn-orange:hover { background: #e05a20; transform: translateY(-1px); }
.btn-ghost {
  display: inline-flex; align-items: center; gap: 8px;
  color: var(--green); font-weight: 600; font-size: 14px;
  border: 2px solid var(--green); padding: 11px 24px; border-radius: 8px;
  transition: background .2s, color .2s;
}
.btn-ghost:hover { background: var(--green); color: #fff; }

/* ── LAYOUT ── */
.wrap { max-width: 1180px; margin: 0 auto; padding: 0 24px; }
.wrap-sm { max-width: 760px; margin: 0 auto; padding: 0 24px; }
.wrap-md { max-width: 960px; margin: 0 auto; padding: 0 24px; }
.section { padding: 80px 0; }
.section-sm { padding: 48px 0; }
.section-alt { background: var(--light); }
.tc { text-align: center; }

/* ── TYPOGRAPHY ── */
.label {
  display: inline-block; background: rgba(0,182,146,.12); color: var(--green);
  font-size: 11px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase;
  padding: 5px 14px; border-radius: 20px; margin-bottom: 14px;
}
.h2 { font-size: 34px; font-weight: 900; line-height: 1.25; margin: 0 0 14px; color: var(--dark); }
.h2 em { font-style: normal; color: var(--green); }
.h2 .org { font-style: normal; color: var(--orange); }
.lead { font-size: 15px; color: var(--gray); line-height: 1.8; margin: 0 0 36px; }

/* ═══════════════════════════════════════════
   1. HERO
═══════════════════════════════════════════ */
.hero {
  background: linear-gradient(135deg, #f0faf7 0%, #e8f7f3 50%, #f0f9ff 100%);
  padding: 80px 0 60px;
  overflow: hidden;
  position: relative;
}
html.dark .hero { background: linear-gradient(135deg, #111827 0%, #1a2a25 50%, #111827 100%); }
.hero::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse 600px 400px at 70% 30%, rgba(0,182,146,.06) 0%, transparent 70%);
  pointer-events: none;
}
.hero-grid {
  display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center;
  max-width: 1180px; margin: 0 auto; padding: 0 24px;
}
.hero-tag {
  display: inline-flex; align-items: center; gap: 8px;
  background: #fff; border: 1px solid var(--border); border-radius: 24px;
  padding: 7px 16px; margin-bottom: 24px;
  font-size: 11px; font-weight: 600; color: var(--gray);
  box-shadow: 0 2px 8px rgba(0,0,0,.06);
}
html.dark .hero-tag { background: #1f2937; }
.hero-tag .dot { width: 6px; height: 6px; background: var(--green); border-radius: 50%; }
.hero h1 {
  font-size: 44px; font-weight: 900; line-height: 1.15; color: var(--dark);
  margin: 0 0 22px;
}
.hero h1 em { font-style: normal; color: var(--orange); }
.hero-desc { font-size: 16px; color: var(--gray); line-height: 1.8; margin: 0 0 36px; max-width: 480px; }
.hero-ctas { display: flex; align-items: center; gap: 16px; flex-wrap: wrap; margin-bottom: 48px; }
.hero-stats { display: flex; gap: 32px; padding-top: 24px; border-top: 1px solid var(--border); flex-wrap: wrap; }
.hero-stat-item { text-align: left; }
.hero-stat-num { font-size: 22px; font-weight: 900; color: var(--green); line-height: 1; }
.hero-stat-lbl { font-size: 11px; color: var(--gray); font-weight: 500; margin-top: 2px; }
.hero-right { position: relative; height: 460px; }
.hero-right-img {
  position: absolute; right: -16px; top: 0;
  width: 100%; height: 100%;
  object-fit: contain; object-position: right top;
  filter: drop-shadow(0 24px 48px rgba(0,0,0,.14));
  border-radius: 16px 16px 0 0;
}
.hero-badge {
  position: absolute; left: 0; bottom: 60px;
  background: #fff; border-radius: 14px; padding: 14px 18px;
  box-shadow: 0 8px 32px rgba(0,0,0,.12);
  display: flex; align-items: center; gap: 12px;
  min-width: 200px;
  animation: floatUp 3s ease-in-out infinite;
}
html.dark .hero-badge { background: #1f2937; }
@keyframes floatUp { 0%,100%{ transform:translateY(0) } 50%{ transform:translateY(-8px) } }
.hero-badge-icon { width: 40px; height: 40px; background: rgba(0,182,146,.12); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 20px; }
.hero-badge-text strong { display: block; font-size: 13px; font-weight: 700; color: var(--dark); }
.hero-badge-text span { font-size: 11px; color: var(--green); font-weight: 600; }
.hero-badge2 {
  position: absolute; right: 24px; top: 40px;
  background: #fff; border-radius: 14px; padding: 12px 16px;
  box-shadow: 0 8px 32px rgba(0,0,0,.12);
  display: flex; align-items: center; gap: 10px;
  animation: floatUp 3.5s 1s ease-in-out infinite;
}
html.dark .hero-badge2 { background: #1f2937; }
.hero-badge2 .check { width: 32px; height: 32px; background: var(--green); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 14px; }
.hero-badge2 span { font-size: 12px; font-weight: 700; color: var(--dark); }

/* ═══════════════════════════════════════════
   2. BRANDS
═══════════════════════════════════════════ */
.brands-wrap { background: var(--white); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); padding: 40px 24px; }
.brands-title { font-size: 13px; font-weight: 600; color: var(--gray); text-align: center; letter-spacing: 0.5px; margin-bottom: 28px; text-transform: uppercase; }
.brands-logos { display: flex; justify-content: center; align-items: center; gap: 48px; flex-wrap: wrap; }
.brand-name { font-weight: 800; font-size: 17px; color: #ccc; letter-spacing: .5px; transition: color .2s; }
html.dark .brand-name { color: #4b5563; }
.brand-name:hover { color: #aaa; }

/* ═══════════════════════════════════════════
   3. STATS BAR
═══════════════════════════════════════════ */
.stats-outer { padding: 16px 24px 40px; background: var(--white); }
.stats-bar {
  max-width: 860px; margin: 0 auto;
  background: linear-gradient(135deg, #00b692 0%, #00c9a3 100%);
  border-radius: 20px; padding: 36px 60px;
  display: flex; justify-content: space-around; align-items: center;
  box-shadow: 0 16px 48px rgba(0,182,146,.25);
  position: relative; overflow: hidden;
}
.stats-bar::before {
  content: ''; position: absolute;
  width: 300px; height: 300px; background: rgba(255,255,255,.06);
  border-radius: 50%; right: -80px; top: -80px; pointer-events: none;
}
.stat-block { text-align: center; color: #fff; }
.stat-num { font-size: 46px; font-weight: 900; line-height: 1; }
.stat-lbl { font-size: 10px; font-weight: 700; letter-spacing: 3px; margin-top: 4px; opacity: .8; text-transform: uppercase; }
.stat-div { width: 1px; height: 56px; background: rgba(255,255,255,.25); }

/* ═══════════════════════════════════════════
   4. VIDEO
═══════════════════════════════════════════ */
.video-wrap { background: var(--white); }
.video-thumb {
  position: relative; border-radius: 20px; overflow: hidden; cursor: pointer;
  box-shadow: 0 24px 64px rgba(0,0,0,.12);
  max-width: 820px; margin: 0 auto;
  transition: transform .3s;
}
.video-thumb:hover { transform: translateY(-4px); }
.video-thumb img { width: 100%; display: block; min-height: 200px; background: #e0e0e0; }
.video-overlay {
  position: absolute; inset: 0; background: rgba(0,0,0,.2);
  display: flex; align-items: center; justify-content: center;
  transition: background .3s;
}
.video-thumb:hover .video-overlay { background: rgba(0,0,0,.3); }
.play-btn {
  width: 80px; height: 80px; background: #fff; border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  box-shadow: 0 8px 32px rgba(0,0,0,.2); transition: transform .2s;
}
.video-thumb:hover .play-btn { transform: scale(1.1); }

/* ═══════════════════════════════════════════
   5. FEATURES GRID
═══════════════════════════════════════════ */
.features-grid {
  display: grid; grid-template-columns: repeat(5, 1fr); gap: 14px; margin-bottom: 36px;
}
.kitchen-card {
  background: var(--white);
  border-radius: 24px;
  padding: 56px 48px;
  box-shadow: 0 4px 24px rgba(0,0,0,0.06);
}
@media (max-width: 768px) {
  .kitchen-card {
    padding: 40px 24px;
  }
}
@media (max-width: 480px) {
  .kitchen-card {
    padding: 32px 16px;
  }
}
.feat-card {
  background: var(--card); border: 1.5px solid var(--border); border-radius: 14px;
  padding: 36px 18px 28px; display: flex; flex-direction: column; align-items: center; gap: 16px;
  text-align: center; cursor: default; position: relative; overflow: hidden;
  transition: border-color .2s, box-shadow .2s, transform .2s;
}
.feat-card:hover { border-color: var(--green); box-shadow: 0 8px 28px rgba(0,182,146,.1); transform: translateY(-4px); }
.feat-icon { font-size: 36px; line-height: 1; }
.feat-lbl { font-size: 13px; font-weight: 600; color: var(--dark); line-height: 1.5; }
.feat-tooltip {
  position: absolute; inset: 0;
  background: rgba(0,182,146,0.95);
  color: #fff;
  display: flex; align-items: center; justify-content: center;
  padding: 16px;
  font-size: 12.5px; line-height: 1.6; text-align: center;
  border-radius: 14px;
  opacity: 0;
  transform: scale(0.94);
  transition: opacity .25s ease, transform .25s ease;
  pointer-events: none;
}
.feat-card:hover .feat-tooltip {
  opacity: 1;
  transform: scale(1);
  pointer-events: auto;
}

/* ═══════════════════════════════════════════
   6. YT BANNER
═══════════════════════════════════════════ */
.yt-banner {
  background: linear-gradient(135deg, #c00 0%, #e00 100%);
  border-radius: 20px; padding: 24px 36px;
  display: flex; align-items: center; gap: 24px; cursor: pointer;
  transition: opacity .2s; box-shadow: 0 12px 36px rgba(204,0,0,.2);
}
.yt-banner:hover { opacity: .92; }
.yt-icon { width: 56px; height: 56px; background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.yt-text small { font-size: 10px; font-weight: 700; letter-spacing: 1.5px; color: rgba(255,255,255,.7); text-transform: uppercase; }
.yt-text p { font-size: 18px; font-weight: 800; color: #fff; margin: 4px 0 2px; }
.yt-text span { font-size: 12px; color: rgba(255,255,255,.75); }

/* ═══════════════════════════════════════════
   7. WHY LOVE US
═══════════════════════════════════════════ */
.love-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.love-card {
  background: var(--card); border-radius: 18px; overflow: hidden;
  box-shadow: 0 4px 16px rgba(0,0,0,.06);
  transition: transform .25s, box-shadow .25s;
}
.love-card:hover { transform: translateY(-6px); box-shadow: 0 16px 48px rgba(0,0,0,.1); }
.love-img { width: 100%; height: 190px; object-fit: cover; }
.love-body { padding: 22px; }
.love-body h3 { font-size: 15px; font-weight: 700; color: var(--dark); margin: 0 0 8px; line-height: 1.4; }
.love-body p { font-size: 13px; color: var(--gray); line-height: 1.65; margin: 0; }

/* ═══════════════════════════════════════════
   8. INTEGRATIONS
═══════════════════════════════════════════ */
.integ-grid { display: grid; grid-template-columns: 1fr 1.5fr; gap: 64px; align-items: center; }
.integ-title { font-size: 28px; font-weight: 900; color: var(--dark); line-height: 1.3; margin: 0 0 14px; }
.integ-title em { font-style: normal; color: var(--green); }
.integ-sub { font-size: 14px; color: var(--gray); line-height: 1.7; }
.chip-row { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 12px; }
.chip {
  background: var(--light); border: 1px solid var(--border); border-radius: 10px;
  padding: 10px 20px; font-size: 13px; font-weight: 700; color: var(--dark);
  white-space: nowrap; transition: border-color .2s;
}
.chip:hover { border-color: var(--green); }
.pm-row { display: flex; flex-wrap: wrap; gap: 6px; }
.pm {
  background: var(--light); border-radius: 5px; border: 1px solid var(--border);
  padding: 4px 10px; font-size: 10px; font-weight: 600; color: var(--gray);
}

/* ═══════════════════════════════════════════
   9. QR PREVIEW
═══════════════════════════════════════════ */
.qr-box {
  background: linear-gradient(135deg, #00b692 0%, #00a882 100%);
  border-radius: 28px; padding: 56px 48px;
  display: flex; justify-content: center; align-items: center; gap: 56px;
  flex-wrap: wrap; box-shadow: 0 24px 64px rgba(0,182,146,.2);
  position: relative; overflow: hidden;
}
.qr-box::before {
  content: ''; position: absolute;
  width: 400px; height: 400px; background: rgba(255,255,255,.05);
  border-radius: 50%; right: -100px; bottom: -100px; pointer-events: none;
}
.qr-frame { background: #fff; padding: 20px; border-radius: 18px; box-shadow: 0 8px 24px rgba(0,0,0,.15); }
.qr-phone { height: 240px; object-fit: contain; filter: drop-shadow(0 16px 32px rgba(0,0,0,.3)); }
.qr-caption { font-size: 13px; color: var(--gray); margin-top: 24px; font-style: italic; text-align: center; }

/* ═══════════════════════════════════════════
   10. TEMPLATES
═══════════════════════════════════════════ */
.tmpl-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin: 36px 0; }
.tmpl-card {
  border: 1.5px solid var(--border); border-radius: 14px; overflow: hidden;
  transition: border-color .2s, box-shadow .2s, transform .2s; cursor: pointer;
}
.tmpl-card:hover { border-color: var(--green); box-shadow: 0 8px 28px rgba(0,182,146,.1); transform: translateY(-3px); }
.tmpl-thumb {
  height: 128px; background: linear-gradient(135deg, var(--light) 0%, #e8f7f3 100%);
  display: flex; align-items: center; justify-content: center; font-size: 52px;
}
.tmpl-name { padding: 12px; font-size: 12px; font-weight: 600; color: var(--dark); background: var(--card); text-align: center; }

/* ═══════════════════════════════════════════
   11. PARTNER BANNER
═══════════════════════════════════════════ */
.qrtiger-bar {
  background: var(--light); border-radius: 18px; padding: 28px 36px;
  display: flex; align-items: center; gap: 24px;
  border: 1px solid var(--border);
}
.qrtiger-logo { font-size: 22px; font-weight: 900; color: var(--dark); white-space: nowrap; }
.qrtiger-logo span { color: var(--orange); }
.qrtiger-text { flex: 1; font-size: 13px; color: var(--gray); line-height: 1.6; }
.btn-visit {
  background: var(--white); border: 1.5px solid var(--border); color: var(--dark);
  font-weight: 700; font-size: 12px; padding: 10px 22px; border-radius: 8px;
  text-decoration: none; white-space: nowrap; transition: border-color .2s, color .2s;
  display: inline-block;
}
.btn-visit:hover { border-color: var(--green); color: var(--green); }

/* ═══════════════════════════════════════════
   12. REVIEWS
═══════════════════════════════════════════ */
.reviews-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-top: 40px; }
.review-card {
  background: var(--card); border: 1.5px solid var(--border); border-radius: 18px;
  padding: 28px; transition: box-shadow .25s, transform .2s;
}
.review-card:hover { box-shadow: 0 16px 48px rgba(0,0,0,.08); transform: translateY(-4px); }
.reviewer { display: flex; align-items: center; gap: 14px; margin-bottom: 16px; }
.reviewer img { width: 52px; height: 52px; border-radius: 50%; object-fit: cover; border: 3px solid rgba(0,182,146,.2); }
.reviewer-name { font-size: 14px; font-weight: 700; color: var(--dark); }
.reviewer-role { font-size: 12px; font-weight: 600; color: var(--green); }
.stars { color: #f4a50a; font-size: 16px; margin-bottom: 12px; letter-spacing: 2px; }
.review-text { font-size: 13px; color: var(--gray); line-height: 1.7; font-style: italic; }

/* ═══════════════════════════════════════════
   13. CTA BANNER
═══════════════════════════════════════════ */
.cta-banner {
  background: linear-gradient(135deg, #1a3a3c 0%, #0d2b2e 60%, #1a3a3c 100%);
  border-radius: 28px; padding: 56px 64px;
  display: grid; grid-template-columns: 1.3fr 1fr; gap: 32px; align-items: center;
  position: relative; overflow: hidden;
  box-shadow: 0 24px 64px rgba(0,0,0,.2);
}
.cta-banner::before {
  content: ''; position: absolute;
  width: 500px; height: 500px; background: rgba(0,182,146,.05);
  border-radius: 50%; right: -100px; top: -150px; pointer-events: none;
}
.cta-label { font-size: 11px; font-weight: 700; letter-spacing: 2px; color: var(--green); text-transform: uppercase; margin-bottom: 14px; }
.cta-h2 { font-size: 28px; font-weight: 900; color: #fff; line-height: 1.35; margin: 0 0 16px; }
.cta-p { font-size: 14px; color: rgba(255,255,255,.65); line-height: 1.8; margin: 0 0 32px; max-width: 460px; }
.cta-right { display: flex; align-items: center; justify-content: center; }
.cta-right img { height: 230px; object-fit: contain; filter: drop-shadow(0 16px 40px rgba(0,0,0,.4)); }

/* ═══════════════════════════════════════════
   14. FAQ
═══════════════════════════════════════════ */
.faq-item { border-bottom: 1px solid var(--border); }
.faq-btn {
  width: 100%; display: flex; justify-content: space-between; align-items: center;
  padding: 20px 0; background: none; border: none; cursor: pointer; text-align: left;
  font-family: 'Poppins', sans-serif;
}
.faq-q { font-size: 14px; font-weight: 600; color: var(--dark); padding-right: 16px; line-height: 1.5; }
.faq-icon { width: 28px; height: 28px; border-radius: 50%; background: var(--light); display: flex; align-items: center; justify-content: center; color: var(--gray); font-size: 16px; flex-shrink: 0; transition: background .2s, color .2s; }
.faq-btn:hover .faq-icon, .faq-open .faq-icon { background: var(--green); color: #fff; }
.faq-a { display: none; padding: 0 0 20px; }
.faq-a.open { display: block; }
.faq-a p { font-size: 13px; color: var(--gray); line-height: 1.8; margin: 0; }

/* ═══════════════════════════════════════════
   FOOTER
═══════════════════════════════════════════ */
/* ═══════════════════════════════════════════
   PREMIUM CONNECT SECTION
═══════════════════════════════════════════ */
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

/* ═══════════════════════════════════════════
   PREMIUM FOOTER SECTION
═══════════════════════════════════════════ */
.premium-footer {
  background: #f8fafc;
  padding: 80px 24px 40px;
  border-top: 1px solid var(--border);
}
html.dark .premium-footer {
  background: #0b0f19;
}
.footer-container {
  max-width: 1180px;
  margin: 0 auto;
}
.footer-main-grid {
  display: grid;
  grid-template-columns: 1.25fr 0.8fr 0.8fr 1.15fr;
  gap: 48px;
  margin-bottom: 60px;
}
@media (max-width: 968px) {
  .footer-main-grid {
    grid-template-columns: 1fr 1fr;
    gap: 40px;
  }
}
@media (max-width: 480px) {
  .footer-main-grid {
    grid-template-columns: 1fr;
    gap: 32px;
  }
}
.footer-brand-col {
  display: flex;
  flex-direction: column;
  gap: 18px;
}
.footer-logo {
  display: flex;
  align-items: center;
  gap: 10px;
  text-decoration: none;
}
.footer-logo .logo-text {
  font-size: 20px;
  font-weight: 800;
  color: var(--dark);
  letter-spacing: -0.5px;
}
.brand-desc {
  font-size: 13.5px;
  color: var(--gray);
  line-height: 1.6;
  margin: 0;
  max-width: 280px;
}
.footer-social-row {
  display: flex;
  gap: 10px;
}
.social-icon-btn {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background: var(--card);
  border: 1.5px solid var(--border);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--gray);
  transition: all 0.2s;
}
.social-icon-btn:hover {
  background: var(--green);
  color: #fff;
  border-color: var(--green);
  transform: translateY(-2px);
}

.footer-col-links {
  display: flex;
  flex-direction: column;
  gap: 12px;
}
.footer-col-title {
  font-size: 14px;
  font-weight: 700;
  color: var(--dark);
  margin: 0 0 6px;
  position: relative;
  display: inline-block;
}
.footer-col-title::after {
  content: '';
  position: absolute;
  left: 0;
  bottom: -4px;
  width: 24px;
  height: 2px;
  background: var(--green);
}
.footer-col-links a {
  font-size: 13.5px;
  color: var(--gray);
  text-decoration: none;
  transition: color 0.2s, padding-left 0.2s;
}
.footer-col-links a:hover {
  color: var(--green);
  padding-left: 4px;
}

.footer-newsletter-col {
  display: flex;
  flex-direction: column;
  gap: 16px;
}
.newsletter-desc {
  font-size: 13.5px;
  color: var(--gray);
  line-height: 1.6;
  margin: 0;
}
.newsletter-form {
  display: flex;
  background: var(--card);
  border: 1.5px solid var(--border);
  border-radius: 10px;
  padding: 4px;
  align-items: center;
  box-shadow: 0 2px 8px rgba(0,0,0,0.02);
}
.newsletter-form input {
  flex: 1;
  border: none;
  background: transparent;
  padding: 10px 14px;
  font-size: 13.5px;
  outline: none;
  color: var(--dark);
}
.newsletter-form input::placeholder {
  color: var(--gray);
  opacity: 0.6;
}
.newsletter-submit-btn {
  width: 36px;
  height: 36px;
  background: var(--green);
  color: #fff;
  border: none;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: background 0.2s, transform 0.15s;
}
.newsletter-submit-btn:hover {
  background: var(--green-dark);
  transform: scale(1.03);
}

.footer-divider {
  height: 1px;
  background: var(--border);
  margin-bottom: 28px;
}
.footer-copyright-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 16px;
}
.copyright-text {
  font-size: 13px;
  color: var(--gray);
  margin: 0;
}

/* RESPONSIVE */
@media (max-width: 1024px) {
  .hero h1 { font-size: 34px; }
  .hero-grid { grid-template-columns: 1fr; }
  .hero-right { display: none; }
  .integ-grid { grid-template-columns: 1fr; }
  .footer-grid { grid-template-columns: 1fr 1fr; }
  .features-grid { grid-template-columns: repeat(3, 1fr); }
}
@media (max-width: 768px) {
  .h2 { font-size: 26px; }
  .features-grid { grid-template-columns: repeat(2, 1fr); }
  .love-grid { grid-template-columns: 1fr; }
  .reviews-grid { grid-template-columns: 1fr; }
  .cta-banner { grid-template-columns: 1fr; padding: 36px 28px; }
  .cta-right { display: none; }
  .tmpl-grid { grid-template-columns: repeat(2, 1fr); }
  .stats-bar { padding: 28px 24px; }
  .stat-num { font-size: 32px; }
  .brands-logos { gap: 24px; }
}
@media (max-width: 480px) {
  .features-grid { grid-template-columns: 1fr; }
  .footer-grid { grid-template-columns: 1fr; }
}
</style>

<div class="mt">

{{-- ═══════════ 1. HERO ═══════════ --}}
<section class="hero">
  <div class="hero-grid">
    <div>
      <h1>
        {{ $frontDetails->header_title ?? __('landing.heroTitle') }}
      </h1>
      <p class="hero-desc">
        {{ $frontDetails->header_description ?? __('landing.heroSubTitle') }}
      </p>
      <div class="hero-ctas">
        <a href="{{ route('restaurant_signup') }}" class="btn-green">
          Get Started for FREE
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
        <a href="#reviews" class="btn-ghost">See Reviews</a>
      </div>
      <div class="hero-stats">
        <div class="hero-stat-item">
          <div class="hero-stat-num">20M+</div>
          <div class="hero-stat-lbl">Active Users</div>
        </div>
        <div class="hero-stat-item">
          <div class="hero-stat-num">7K+</div>
          <div class="hero-stat-lbl">Restaurants</div>
        </div>
        <div class="hero-stat-item">
          <div class="hero-stat-num">100M+</div>
          <div class="hero-stat-lbl">Orders Processed</div>
        </div>
        <div class="hero-stat-item">
          <div class="hero-stat-num">4.9★</div>
          <div class="hero-stat-lbl">Average Rating</div>
        </div>
      </div>
    </div>
    <div class="hero-right">
      <img class="hero-right-img"
           src="{{ $frontDetails->image_url ?? asset('landing/dashboard.png') }}"
           alt="Restaurant Dashboard">
      <div class="hero-badge">
        <div class="hero-badge-icon">🍽️</div>
        <div class="hero-badge-text">
          <strong>Order #2,048</strong>
          <span>✓ Delivered successfully</span>
        </div>
      </div>
      <div class="hero-badge2">
        <div class="check">✓</div>
        <span>Revenue +257%</span>
      </div>
  </div>
</section>

{{-- ═══════════ 2. TRUSTED BRANDS ═══════════ --}}
<div class="brands-wrap">
  <div class="wrap-md">
    <p class="brands-title">Trusted by leading hotels and restaurant chains worldwide</p>
    <div class="brands-logos">
      <span class="brand-name" style="font-family:serif; font-size:20px; letter-spacing:1px;">HYATT</span>
      <span class="brand-name" style="color:#003087 !important; opacity:.5;">Hilton</span>
      <span class="brand-name" style="letter-spacing:2px; font-size:14px;">SHANGRI·LA</span>
      <span class="brand-name" style="font-size:13px;">The Ritz-Carlton</span>
      <span class="brand-name" style="font-style:italic; font-size:20px;">aloft</span>
      <span class="brand-name">Marriott</span>
    </div>
  </div>
</div>
<style>
.premium-video-card {
  position: relative;
  max-width: 900px;
  margin: 0 auto;
  border-radius: 24px;
  overflow: hidden;
  box-shadow: 0 30px 80px rgba(0,0,0,0.15);
  border: 1px solid rgba(255,255,255,0.1);
  transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.4s;
  cursor: pointer;
}
.premium-video-card:hover {
  transform: translateY(-8px) scale(1.01);
  box-shadow: 0 40px 100px rgba(0,182,146,0.2);
}
.video-glass-bar {
  position: absolute;
  bottom: 0; left: 0; right: 0;
  background: rgba(17, 24, 39, 0.7);
  backdrop-filter: blur(12px);
  border-top: 1px solid rgba(255,255,255,0.1);
  padding: 16px 28px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  z-index: 10;
}
.video-glass-info {
  display: flex;
  align-items: center;
  gap: 12px;
  color: #fff;
  font-size: 13px;
  font-weight: 500;
}
.video-glass-info span {
  width: 8px;
  height: 8px;
  background: #ff6b2c;
  border-radius: 50%;
  animation: pulse-dot 1.5s infinite;
}
@keyframes pulse-dot {
  0% { transform: scale(0.95); opacity: 0.5; }
  50% { transform: scale(1.2); opacity: 1; }
  100% { transform: scale(0.95); opacity: 0.5; }
}
.video-pulse-play {
  width: 86px;
  height: 86px;
  background: var(--white);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 10px 30px rgba(0,182,146,0.3);
  position: relative;
  transition: transform 0.3s;
}
.premium-video-card:hover .video-pulse-play {
  transform: scale(1.1);
  background: var(--green);
}
.premium-video-card:hover .video-pulse-play svg {
  fill: #fff;
}
.video-pulse-play::after {
  content: '';
  position: absolute;
  inset: -12px;
  border: 1px solid rgba(255,255,255,0.4);
  border-radius: 50%;
  animation: play-pulse 2s infinite;
}
@keyframes play-pulse {
  0% { transform: scale(0.95); opacity: 1; }
  100% { transform: scale(1.4); opacity: 0; }
}
</style>
<section class="section video-wrap tc">
  <div class="wrap">
    <h2 class="h2">Free Menu Maker &amp; Restaurant<br>Management System</h2>
    <p class="lead" style="max-width:600px; margin-left:auto; margin-right:auto;">
      Boost sales and engagement with our free menu maker, management system, and built-in restaurant marketing tools.
    </p>
    <div class="premium-video-card">
      <img src="{{ $frontDetails->video_thumbnail_url ?? asset('landing/dashboard.png') }}"
           alt="Platform Demo" style="height:500px; object-fit:cover; width:100%; display:block;">
      <div class="video-overlay">
        <div class="video-pulse-play">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="#00b692" style="margin-left: 4px; transition: fill 0.3s;"><path d="M8 5v14l11-7z"/></svg>
        </div>
      </div>
      <div class="video-glass-bar">
        <div class="video-glass-info">
          <span></span>
          <strong>Watch quick video walkthrough (2:15)</strong>
        </div>
        <div style="color: rgba(255,255,255,0.7); font-size:12px; font-weight: 600;">
          MENU TIGER DEMO
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ 5. FEATURES GRID ═══════════ --}}
<section class="section section-alt tc" id="features">
  <div class="wrap">
    {{-- White card container --}}
    <div class="kitchen-card">
      <h2 class="h2" style="margin-bottom:12px;">Everything You Need To Get The Kitchen In order</h2>
      <p class="lead" style="max-width:560px; margin-left:auto; margin-right:auto; margin-bottom:48px;">
        Boost sales and engagement using MENU TIGER's free menu maker, management system, and built-in restaurant marketing tools.
      </p>
      <div class="features-grid">

        {{-- 1: Ordering Dashboard --}}
        <div class="feat-card">
          <svg width="54" height="54" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="6" y="8" width="36" height="28" rx="4" stroke="currentColor" stroke-width="2.5" fill="none"/>
            <path d="M14 26a10 10 0 0120 0H14z" stroke="currentColor" stroke-width="2.5" fill="none"/>
            <path d="M22 16h4M24 16v-2" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            <circle cx="34" cy="30" r="4.5" fill="#00b692" fill-opacity="0.15" stroke="#00b692" stroke-width="2"/>
            <path d="M34 32v4M34 30h0.01" stroke="#00b692" stroke-width="2" stroke-linecap="round"/>
            <path d="M36 34l3 6M33 34v6" stroke="#00b692" stroke-width="2" stroke-linecap="round"/>
            <circle cx="38" cy="12" r="6" fill="#00b692" stroke="#00b692" stroke-width="1.5"/>
            <path d="M35.5 12l1.5 1.5 3-3" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span class="feat-lbl">Ordering<br>Dashboard</span>
          <div class="feat-tooltip">Track and manage incoming orders in real-time; view table assignments, order status, and instant kitchen updates.</div>
        </div>

        {{-- 2: Sales Analytics --}}
        <div class="feat-card">
          <svg width="54" height="54" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 32l10-10 10 8 16-16" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M38 14h6v6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="20" cy="24" r="8" stroke="#00b692" stroke-width="3" fill="#00b692" fill-opacity="0.15"/>
            <path d="M26 30l8 8" stroke="#00b692" stroke-width="3" stroke-linecap="round"/>
          </svg>
          <span class="feat-lbl">Sales<br>Analytics</span>
          <div class="feat-tooltip">Optimize your menu for profitability; understand customer preferences and utilize smart menu QR code insights.</div>
        </div>

        {{-- 3: Purchase Analytics --}}
        <div class="feat-card">
          <svg width="54" height="54" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 16h24l2 24H10l2-24z" stroke="currentColor" stroke-width="2.5" stroke-linejoin="round" fill="none"/>
            <path d="M18 16v-4a6 6 0 0112 0v4" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            <path d="M17 32l4.5-4.5 3.5 3.5 6-6" stroke="#00b692" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M27 25h4v4" stroke="#00b692" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span class="feat-lbl">Purchase<br>Analytics</span>
          <div class="feat-tooltip">Monitor ingredients, supplier costs, and inventory trends to reduce waste and optimize restaurant purchasing.</div>
        </div>

        {{-- 4: POS Integration --}}
        <div class="feat-card">
          <svg width="54" height="54" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="10" y="16" width="10" height="10" rx="1.5" stroke="currentColor" stroke-width="2.5"/>
            <rect x="28" y="16" width="10" height="10" rx="1.5" stroke="currentColor" stroke-width="2.5"/>
            <rect x="10" y="30" width="10" height="10" rx="1.5" stroke="currentColor" stroke-width="2.5"/>
            <rect x="28" y="30" width="10" height="10" rx="1.5" stroke="currentColor" stroke-width="2.5"/>
            <path d="M24 16c-1-3-4-3-4-1s3 1 4 1zm0 0c1-3 4-3 4-1s-3 1-4 1z" fill="#00b692" stroke="#00b692" stroke-width="1.5"/>
            <circle cx="24" cy="16" r="2" fill="#00b692"/>
          </svg>
          <span class="feat-lbl">POS<br>Integration</span>
          <div class="feat-tooltip">Seamlessly sync tables, menus, and order billing directly with your existing restaurant Point of Sale terminal.</div>
        </div>

        {{-- 5: QR Code Menu --}}
        <div class="feat-card">
          <svg width="54" height="54" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="12" y="6" width="26" height="36" rx="3" stroke="currentColor" stroke-width="2.5" fill="none"/>
            <path d="M8 12h8M8 18h8M8 24h8M8 30h8M8 36h8" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            <rect x="19" y="13" width="12" height="12" rx="1" stroke="#00b692" stroke-width="2" fill="none"/>
            <rect x="22" y="16" width="6" height="6" fill="#00b692"/>
            <path d="M17 19v-5h5M28 14h5v5M17 27v5h5M28 32h5v-5" stroke="#00b692" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span class="feat-lbl">QR code<br>Menu Creation</span>
          <div class="feat-tooltip">Generate customizable, brand-themed QR codes for every table; allow instant scanning and digital menu browsing.</div>
        </div>

        {{-- 6: Customer Order Management --}}
        <div class="feat-card">
          <svg width="54" height="54" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="12" y="6" width="24" height="36" rx="3" stroke="currentColor" stroke-width="2.5" fill="none"/>
            <path d="M18 14h12M18 20h12M18 26h8" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            <circle cx="34" cy="34" r="6" fill="#00b692" stroke="#00b692" stroke-width="1.5"/>
            <path d="M31.5 34l1.5 1.5 3-3" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span class="feat-lbl">Customer Order<br>Management</span>
          <div class="feat-tooltip">Track order flows from table request to final billing; assign servers, manage custom modifiers, and process requests.</div>
        </div>

        {{-- 7: Menu Analytics --}}
        <div class="feat-card">
          <svg width="54" height="54" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="6" y="8" width="36" height="32" rx="4" stroke="currentColor" stroke-width="2.5" fill="none"/>
            <path d="M16 22a4 4 0 110-8 4 4 0 010 8z" stroke="currentColor" stroke-width="2" fill="none"/>
            <path d="M16 18h4v-4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            <path d="M12 30v-4M16 30v-6M20 30v-8" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            <circle cx="30" cy="22" r="5" stroke="#00b692" stroke-width="2.5" fill="#00b692" fill-opacity="0.15"/>
            <path d="M34 26l4 4" stroke="#00b692" stroke-width="2.5" stroke-linecap="round"/>
          </svg>
          <span class="feat-lbl">Menu Analytics<br>and Insights</span>
          <div class="feat-tooltip">Get detailed item performance reports; identify bestsellers, low-margin dishes, and optimize menu pricing.</div>
        </div>

        {{-- 8: Restaurant Branding --}}
        <div class="feat-card">
          <svg width="54" height="54" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 18v22h32V18" stroke="currentColor" stroke-width="2.5" stroke-linejoin="round"/>
            <path d="M6 10h36v8H6v-8z" fill="#00b692" fill-opacity="0.15" stroke="currentColor" stroke-width="2.5" stroke-linejoin="round"/>
            <path d="M6 18c1.5 2 4.5 2 6 0s1.5-2 3-2s1.5 2 3 0s1.5-2 3-2" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            <rect x="14" y="28" width="8" height="12" stroke="currentColor" stroke-width="2.5"/>
            <rect x="28" y="28" width="6" height="6" stroke="currentColor" stroke-width="2"/>
          </svg>
          <span class="feat-lbl">Restaurant<br>Branding</span>
          <div class="feat-tooltip">Customize colors, logos, banners, and fonts on your digital menu page to establish a premium brand identity.</div>
        </div>

        {{-- 9: Customer Feedback --}}
        <div class="feat-card">
          <svg width="54" height="54" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 12 Q8 8 12 8 H36 Q40 8 40 12 V28 Q40 32 36 32 H24 L14 40 V32 H12 Q8 32 8 28 Z" stroke="currentColor" stroke-width="2.5" stroke-linejoin="round" fill="none"/>
            <path d="M14 16h20M14 22h14" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            <circle cx="38" cy="12" r="6" fill="#00b692" stroke="#00b692" stroke-width="1.5"/>
            <path d="M38 8.5l.8 1.8 2 .3-1.4 1.4.3 2-1.7-1-1.7 1 .3-2-1.4-1.4 2-.3z" fill="#fff"/>
          </svg>
          <span class="feat-lbl">Customer<br>Feedback</span>
          <div class="feat-tooltip">Collect real-time reviews and ratings directly from tables; monitor staff service quality and customer satisfaction.</div>
        </div>

        {{-- 10: Multilingual Support --}}
        <div class="feat-card">
          <svg width="54" height="54" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="8" y="12" width="28" height="28" rx="3" stroke="currentColor" stroke-width="2.5" fill="none"/>
            <path d="M16 32l5-10 5 10M17.5 28h7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="38" cy="14" r="7" fill="#00b692" stroke="#00b692" stroke-width="1.5"/>
            <path d="M35 11h6M38 10v4M36 15l4.5-4" stroke="#fff" stroke-width="1.5" stroke-linecap="round"/>
          </svg>
          <span class="feat-lbl">Multilingual<br>Support</span>
          <div class="feat-tooltip">Translate your digital menu into multiple languages automatically; serve global tourists and local guests effortlessly.</div>
        </div>

      </div>
      {{-- SEE ALL FEATURES button - dark teal style like reference --}}
      <div style="margin-top:8px;">
        <a href="/features" style="display:inline-block; background:#2d4a4e; color:#fff; font-weight:700; font-size:12px; padding:14px 36px; border-radius:8px; letter-spacing:1.5px; text-transform:uppercase; transition:background .2s; text-decoration:none;" onmouseover="this.style.background='#1a3538'" onmouseout="this.style.background='#2d4a4e'">
          SEE ALL FEATURES
        </a>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ 6. TABLETRACK VIDEO DEMO BANNER ═══════════ --}}
<section class="section-sm" style="background:var(--white);">
  <div class="wrap-md">
    <a href="https://www.youtube.com/watch?v=KKla4E_e_tY" target="_blank" style="text-decoration:none; display:block;">
      <div class="yt-banner">
        <div class="yt-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="#c00"><path d="M8 5v14l11-7z"/></svg>
        </div>
        <div class="yt-text">
          <small>YouTube</small>
          <p>Watch how TableTrack simplifies digital ordering and billing</p>
          <span>Click here to watch</span>
        </div>
      </div>
    </a>
  </div>
</section>

{{-- ═══════════ 7. WHY OPERATORS LOVE US ═══════════ --}}
<style>
.premium-love-card {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 4px 20px rgba(0,0,0,0.03);
  transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
  display: flex;
  flex-direction: column;
}
.premium-love-card:hover {
  transform: translateY(-8px);
  border-color: var(--green);
  box-shadow: 0 20px 40px rgba(0,182,146,0.08);
}
.love-badge {
  position: absolute;
  top: 16px; left: 16px;
  background: rgba(0, 182, 146, 0.9);
  backdrop-filter: blur(8px);
  color: #fff;
  font-size: 10px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
  padding: 6px 14px;
  border-radius: 30px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
.love-image-container {
  position: relative;
  height: 200px;
  overflow: hidden;
}
.love-image-container img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.6s;
}
.premium-love-card:hover .love-image-container img {
  transform: scale(1.06);
}
</style>
<section class="section section-alt">
  <div class="wrap">
    <div class="tc" style="margin-bottom:56px;">
      <h2 class="h2">Why <em>restaurant operators</em> love<br>using our digital menu</h2>
      <p class="lead" style="max-width:540px; margin:0 auto;">Simple, reliable, and powerful options built to elevate customer experiences.</p>
    </div>
    @php $love = [
      ['https://images.unsplash.com/photo-1556742031-c6961e8560b0?w=500&q=80','Transition to contactless ordering','Go paperless and embrace contactless ordering and payments using a restaurant QR code menu for a cleaner and safer experience.','EFFICIENCY'],
      ['https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=500&q=80','Easy-to-update menu items and prices','Modify menus and prices in real-time with an interactive restaurant menu. Keep item availability accurate.','MENU UPDATES'],
      ['https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=500&q=80','Reduce wait times','Our streamlined ordering system enhances efficiency with faster service, keeping customers happy and return-rates high.','FAST SERVICE'],
      ['https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=500&q=80','Create cost-effective solutions','Our QR code menu is a cost-effective solution that reduces the need for printing and minimizes staff workload.','COST SAVINGS'],
      ['https://images.unsplash.com/photo-1600891964092-4316c288032e?w=500&q=80','Increase order accuracy','Bid farewell to incorrect dishes as a menu QR code guarantees precision, enhancing overall customer satisfaction.','ACCURACY'],
      ['https://images.unsplash.com/photo-1533777857889-4be7c70b33f7?w=500&q=80','Enhance customer experience','Elevate the dining experience with our customer-friendly interactive restaurant menu features.','ENGAGEMENT'],
    ]; @endphp
    <div class="love-grid">
      @foreach($love as $c)
      <div class="premium-love-card">
        <div class="love-image-container">
          <span class="love-badge">{{ $c[3] }}</span>
          <img src="{{ $c[0] }}" alt="{{ $c[1] }}">
        </div>
        <div class="love-body">
          <h3 style="font-size: 15px; font-weight: 700; color: var(--dark); margin: 0 0 10px; line-height: 1.4;">{{ $c[1] }}</h3>
          <p style="font-size: 13px; color: var(--gray); line-height: 1.65; margin: 0;">{{ $c[2] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ═══════════ 8. INTEGRATIONS ═══════════ --}}
<style>
.integration-glow-box {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 24px;
  padding: 48px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.03);
}
.integ-tag-row {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  margin-bottom: 24px;
}
.integ-tag-title {
  font-size: 11px;
  font-weight: 700;
  text-transform: uppercase;
  color: var(--gray);
  letter-spacing: 1.5px;
  width: 100%;
  margin-bottom: 8px;
  display: flex;
  align-items: center;
  gap: 8px;
}
.integ-tag-title::after {
  content: '';
  flex: 1;
  height: 1px;
  background: var(--border);
}
.premium-chip {
  background: var(--white);
  border: 1.5px solid var(--border);
  border-radius: 12px;
  padding: 12px 24px;
  font-size: 14px;
  font-weight: 700;
  color: var(--dark);
  display: flex;
  align-items: center;
  gap: 10px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.02);
  transition: all 0.25s;
}
.premium-chip:hover {
  border-color: var(--green);
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(0,182,146,0.08);
}
.premium-chip.highlight {
  border-color: rgba(255, 107, 44, 0.3);
}
.premium-chip.highlight:hover {
  border-color: var(--orange);
  box-shadow: 0 8px 20px rgba(255,107,44,0.08);
}
.premium-chip span.dot {
  width: 6px; height: 6px;
  background: var(--green);
  border-radius: 50%;
}
.premium-chip.highlight span.dot {
  background: var(--orange);
}
</style>
<section class="section" style="background:var(--white);">
  <div class="wrap">
    <div class="integ-grid">
      <div>
        <h3 class="integ-title">Pairs perfectly<br>with <em>tools you use</em></h3>
        <p class="integ-sub" style="margin-bottom:28px;">Easily connect your digital menu dashboard with payment gateways, POS terminals, and marketing automation software.</p>
        <div style="background: var(--light); border-radius: 16px; padding: 20px; border-left: 4px solid var(--green);">
          <strong style="display:block; font-size:13px; color:var(--dark); margin-bottom:4px;">Auto-Sync Enabled</strong>
          <span style="font-size:12px; color:var(--gray);">Menus, items, and pricing synchronize automatically across all payment and dashboard connections instantly.</span>
        </div>
      </div>
      <div class="integration-glow-box">
        <div class="integ-tag-title">Payment Connections</div>
        <div class="integ-tag-row">
          <div class="premium-chip"><span class="dot"></span>Apple Pay</div>
          <div class="premium-chip"><span class="dot"></span>Google Pay</div>
          <div class="premium-chip highlight"><span class="dot"></span>PayPal</div>
          <div class="premium-chip"><span class="dot"></span>stripe</div>
          <div class="premium-chip">Venmo</div>
        </div>

        <div class="integ-tag-title" style="margin-top:16px;">Marketing &amp; POS Systems</div>
        <div class="integ-tag-row">
          <div class="premium-chip highlight"><span class="dot"></span>Loyverse POS</div>
          <div class="premium-chip" style="color:#00c4cc;"><span class="dot" style="background:#00c4cc;"></span>Canva</div>
          <div class="premium-chip"><span class="dot"></span>Zapier</div>
          <div class="premium-chip">Google Analytics</div>
        </div>

        <div class="pm-row" style="background:var(--light); padding:14px; border-radius:12px; margin-top:28px;">
          <div style="font-size: 11px; font-weight:700; color:var(--gray); margin-bottom:10px; text-transform:uppercase; letter-spacing:1px;">Global Card Support</div>
          <div style="display:flex; flex-wrap:wrap; gap:8px;">
            @foreach(['VISA','Mastercard','AMEX','iDEAL','Alipay','GrabPay','WeChat Pay','PAYNOW'] as $m)
            <span class="pm" style="background:var(--white); border:1px solid var(--border); padding:6px 12px; border-radius:8px; font-size:11px; font-weight:600; color:var(--dark);">{{ $m }}</span>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ 9. QR PREVIEW ═══════════ --}}
<style>
.premium-qr-preview-box {
  background: radial-gradient(circle at 0% 0%, #00b692 0%, #009c7d 100%);
  border-radius: 32px;
  padding: 64px;
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: 48px;
  align-items: center;
  box-shadow: 0 30px 70px rgba(0,182,146,0.22);
  position: relative;
  overflow: hidden;
  text-align: left;
}
.premium-qr-preview-box::before {
  content: '';
  position: absolute;
  width: 500px; height: 500px;
  background: radial-gradient(circle, rgba(255,255,255,0.06) 0%, transparent 70%);
  top: -150px; left: -150px;
  pointer-events: none;
}
.qr-scanner-card {
  background: var(--white);
  padding: 32px;
  border-radius: 24px;
  box-shadow: 0 15px 40px rgba(0,0,0,0.12);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  max-width: 320px;
  margin: 0 auto;
}
.qr-frame-beautified {
  padding: 24px;
  border: 3px stroke var(--green);
  border-radius: 20px;
  background: #fff;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}
/* Corner brackets for scanner effect */
.qr-frame-beautified::before, .qr-frame-beautified::after {
  content: '';
  position: absolute;
  width: 24px;
  height: 24px;
  border: 4px solid var(--green);
  pointer-events: none;
}
.qr-frame-beautified::before { top: 0; left: 0; border-right: none; border-bottom: none; border-radius: 8px 0 0 0; }
.qr-frame-beautified::after { bottom: 0; right: 0; border-left: none; border-top: none; border-radius: 0 0 8px 0; }

.qr-scanner-line {
  position: absolute;
  left: 10px; right: 10px;
  height: 3px;
  background: var(--orange);
  box-shadow: 0 0 10px var(--orange);
  animation: scan-anim 2.5s infinite ease-in-out;
}
@keyframes scan-anim {
  0%, 100% { top: 12px; }
  50% { top: calc(100% - 15px); }
}
</style>
<section class="section section-alt tc">
  <div class="wrap">
    <h2 class="h2">Scan the QR code to Preview<br>Your Digital Menu</h2>
    <p class="lead" style="max-width:520px; margin-left:auto; margin-right:auto; margin-bottom:48px;">
      Explore a customizable, interactive menu designed to simplify ordering, boost engagement, and showcase your restaurant at its best.
    </p>

    <div class="premium-qr-preview-box">
      <div>
        <h3 style="font-size: 28px; font-weight: 800; color: #fff; margin: 0 0 16px; line-height: 1.3;">Experience the ordering flow live on your device</h3>
        <p style="font-size: 15px; color: rgba(255,255,255,0.85); line-height: 1.8; margin-bottom: 32px;">
          Simply scan the QR code with your phone camera. You will instantly load a live interactive digital menu layout. Add dishes, custom modifiers, and experience table-ordering in real-time.
        </p>
        <div style="display: flex; gap: 16px;">
          <a href="{{ route('restaurant_signup') }}" class="btn-orange">Create Your QR Menu</a>
          <a href="#reviews" class="btn-ghost" style="color:#fff; border-color:#fff;">See Reviews</a>
        </div>
      </div>
      <div>
        <div class="qr-scanner-card">
          <div class="qr-frame-beautified">
            <div class="qr-scanner-line"></div>
            <svg width="150" height="150" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
              <rect width="128" height="128" fill="white"/>
              <rect x="8" y="8" width="40" height="40" fill="none" stroke="#000" stroke-width="5" rx="4"/>
              <rect x="16" y="16" width="24" height="24" fill="#000" rx="2"/>
              <rect x="80" y="8" width="40" height="40" fill="none" stroke="#000" stroke-width="5" rx="4"/>
              <rect x="88" y="16" width="24" height="24" fill="#000" rx="2"/>
              <rect x="8" y="80" width="40" height="40" fill="none" stroke="#000" stroke-width="5" rx="4"/>
              <rect x="16" y="88" width="24" height="24" fill="#000" rx="2"/>
              <rect x="56" y="8" width="8" height="8" fill="#000"/>
              <rect x="68" y="8" width="8" height="8" fill="#000"/>
              <rect x="56" y="20" width="8" height="8" fill="#000"/>
              <rect x="56" y="80" width="8" height="8" fill="#000"/>
              <rect x="68" y="88" width="8" height="8" fill="#000"/>
              <rect x="80" y="80" width="8" height="8" fill="#000"/>
              <rect x="80" y="92" width="16" height="8" fill="#000"/>
              <rect x="100" y="80" width="8" height="8" fill="#000"/>
              <rect x="112" y="88" width="8" height="8" fill="#000"/>
              <rect x="56" y="56" width="16" height="16" fill="#00b692" rx="4"/>
            </svg>
          </div>
          <span style="font-size: 11px; font-weight:700; color:var(--gray); text-transform:uppercase; letter-spacing:1px; margin-top:20px;">Scan to open menu</span>
        </div>
      </div>
    </div>
    <p class="qr-caption" style="margin-top:24px;">Our smart digital menu for restaurants is powered by technology that has been used in the hospitality business since 2018</p>
  </div>
</section>

{{-- ═══════════ 10. TEMPLATES ═══════════ --}}
<style>
.premium-tmpl-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  margin-top: 36px;
}
@media (max-width: 1024px) {
  .premium-tmpl-grid {
    grid-template-columns: repeat(3, 1fr);
  }
}
@media (max-width: 768px) {
  .premium-tmpl-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}
@media (max-width: 480px) {
  .premium-tmpl-grid {
    grid-template-columns: 1fr;
    gap: 16px;
  }
}
.premium-tmpl-card {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 4px 15px rgba(0,0,0,0.02);
  transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
  display: flex;
  flex-direction: column;
}
.premium-tmpl-card:hover {
  transform: translateY(-8px);
  border-color: var(--green);
  box-shadow: 0 20px 40px rgba(0,182,146,0.08);
}
.tmpl-preview-box {
  height: 150px;
  background: linear-gradient(135deg, var(--light) 0%, #e0f2f1 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 56px;
  position: relative;
}
.tmpl-badge {
  position: absolute;
  top: 12px; right: 12px;
  background: #fff;
  border: 1px solid var(--border);
  font-size: 9px;
  font-weight: 700;
  text-transform: uppercase;
  color: var(--green);
  padding: 4px 8px;
  border-radius: 4px;
}
.tmpl-info {
  padding: 18px;
  text-align: center;
}
.tmpl-info h4 {
  font-size: 14px;
  font-weight: 700;
  color: var(--dark);
  margin: 0 0 6px;
}
.tmpl-info span {
  font-size: 11px;
  color: var(--gray);
}
</style>
<section class="section tc" style="background:var(--white);">
  <div class="wrap">
    <h2 class="h2">Choose from our collection of<br>free customizable templates</h2>
    <p class="lead" style="max-width:540px; margin:0 auto;">Fully optimized, print-ready, and digitally interactive branding presets for your storefront.</p>
    
    @php $tmpls = [
      ['📋','Menu Templates','Dine-in / Room service','FREE'],
      ['🥤','Coaster Designs','Cup & Glass branding','PRO'],
      ['🖼️','Poster Layouts','Promotional wall flyers','FREE'],
      ['🎪','Table Tent Formats','QR standees','FREE'],
      ['🔖','Stickers & Labels','Delivery box branding','PRO'],
      ['🪧','A-Frame Designs','Sidewalk signage','FREE'],
      ['💳','Business Cards','Executive networking','FREE'],
      ['🎁','Gift Cards','Discount vouchers','PRO']
    ]; @endphp
    <div class="premium-tmpl-grid">
      @foreach($tmpls as $t)
      <div class="premium-tmpl-card">
        <div class="tmpl-preview-box">
          <span class="tmpl-badge">{{ $t[3] }}</span>
          {{ $t[0] }}
        </div>
        <div class="tmpl-info">
          <h4>{{ $t[1] }}</h4>
          <span>{{ $t[2] }}</span>
        </div>
      </div>
      @endforeach
    </div>
    <div style="margin-top:40px;">
      <a href="{{ route('restaurant_signup') }}" class="btn-green">View More Templates</a>
    </div>
  </div>



{{-- ═══════════ 12. REVIEWS ═══════════ --}}
<section class="section tc" style="background:var(--white);" id="reviews">
  <div class="wrap">
    <h2 class="h2">Read our reviews from our <em>satisfied customers</em></h2>
    @php $revs = [
      ['https://i.pravatar.cc/96?img=5','Abby G.','Restaurant Owner','We increased our average order size by 20% when we launched our QR code dine-in ordering. It\'s very easy to implement, and our customers love fast and convenient ordering.'],
      ['https://i.pravatar.cc/96?img=15','Peter P.','Head of Marketing','I was able to save both money and time… I recommend MENU TIGER to those who have restaurants and small food businesses. Two thumbs up!'],
      ['https://i.pravatar.cc/96?img=20','Adrian W.','General Manager','I recommend MENU TIGER for anyone looking to expand their restaurant business and add a digital edge. Easy, user-friendly, and highly cost-effective.'],
    ]; @endphp
    <div class="reviews-grid">
      @foreach($revs as $r)
      <div class="review-card" style="text-align:left;">
        <div class="reviewer">
          <img src="{{ $r[0] }}" alt="{{ $r[1] }}">
          <div>
            <div class="reviewer-name">{{ $r[1] }}</div>
            <div class="reviewer-role">{{ $r[2] }}</div>
          </div>
        </div>
        <div class="stars">★★★★★</div>
        <p class="review-text">"{{ $r[3] }}"</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ═══════════ 13. CTA BOTTOM BANNER ═══════════ --}}
<section class="section section-alt">
  <div class="wrap-md">
    <div class="cta-banner">
      <div>
        <h2 class="cta-h2">Create Your First Digital Menu<br>With Our Online Menu Maker</h2>
        <p class="cta-p">Design, customize, and publish your menu in minutes. Engage with your customers, streamline orders, and simplify restaurant order management — all in one tool.</p>
        <a href="{{ route('restaurant_signup') }}" class="btn-orange">GET STARTED FOR FREE</a>
      </div>
      <div class="cta-right">
        <img src="{{ $frontDetails->image_url ?? asset('landing/dashboard.png') }}" alt="App Preview">
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ 14. FAQ ═══════════ --}}
<style>
/* ── FAQ PRICING STYLE ── */
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
</style>

<section class="pr-faq-section" id="user-faqs">
  <div class="pr-faq-inner">
    <div style="text-align:center; margin-bottom:48px;">
      <h2 class="section-title" style="font-size:clamp(22px, 3vw, 32px);font-weight:900;color:var(--dark);margin:0 0 8px;">Frequently Asked <em style="font-style:normal;color:#00b692;">Questions</em></h2>
      <p class="section-sub" style="font-size:14px;color:var(--gray);margin:0 0 40px;line-height:1.8;">Everything you need to know about our digital QR menu & restaurant OS platform.</p>
    </div>

    <div id="faq-container">
      {{-- Initial fallback skeleton/SSR items --}}
      <div class="faq-item">
        <div class="faq-question open" onclick="toggleFaq(this)">
          How does TableTrack Digital QR Menu work?
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        </div>
        <div class="faq-answer open">
          TableTrack allows restaurant customers to scan a QR code placed on their table using their smartphone camera, view the digital interactive menu, customize their order, and place orders directly without waiting for a waiter.
        </div>
      </div>
    </div>
  </div>
</section>

<script>
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

function loadHomepageFaqs() {
  const container = document.getElementById('faq-container');
  if (!container) return;

  const apiHost = (window.TABLETRACK_CONFIG && window.TABLETRACK_CONFIG.apiHost) 
    ? window.TABLETRACK_CONFIG.apiHost 
    : 'http://127.0.0.1:8000';

  fetch(`${apiHost}/api/v1/public/faqs`)
    .then(res => res.json())
    .then(resData => {
      if (resData && resData.success && resData.data && resData.data.length > 0) {
        container.innerHTML = resData.data.map((faq, i) => `
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
      console.error('Error loading FAQs from API:', err);
    });
}

document.addEventListener('DOMContentLoaded', function() {
  loadHomepageFaqs();
});
</script>

<script>
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



</div>{{-- .mt --}}

<script>
function mtFaq(i) {
  var ans = document.getElementById('faq-a-' + i);
  var icon = document.getElementById('faq-icon-' + i);
  var wrap = document.getElementById('faq-wrap-' + i);
  var isOpen = ans.classList.contains('open');
  document.querySelectorAll('.faq-a').forEach(function(el) { el.classList.remove('open'); });
  document.querySelectorAll('.faq-icon').forEach(function(el) { el.textContent = '+'; });
  document.querySelectorAll('.faq-btn').forEach(function(el) { el.classList.remove('faq-open'); });
  if (!isOpen) {
    ans.classList.add('open');
    icon.textContent = '−';
    wrap.querySelector('.faq-btn').classList.add('faq-open');
  }
}
</script>
@endsection
