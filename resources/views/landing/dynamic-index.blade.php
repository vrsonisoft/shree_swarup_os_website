@extends('layouts.landing')

@section('title', 'ChowChak - Complete Restaurant Software & Digital Menu Platform')
@section('meta_description', 'Empower your restaurant with ChowChak. Smart QR code menus, instant order dispatching, POS integration, customer feedback, and multi-location management.')
@section('meta_keywords', 'restaurant software, digital menu platform, QR ordering system, restaurant POS, food ordering system, ChowChak')

@section('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "ChowChak",
  "operatingSystem": "Web, Android, iOS",
  "applicationCategory": "BusinessApplication",
  "description": "Complete Restaurant Management Software & Digital QR Code Menu Platform."
}
</script>
@endsection

@section('content')
<style>
/* ============================================================
   MENU TIGER LANDING — FULL RICH DESIGN
============================================================ */
:root {
  --forest-primary: #2E6F40;
  --forest-mint: #CFFFDC;
  --forest-accent: #68BA7F;
  --forest-dark: #253D2C;
  --green: #2E6F40;
  --green-dark: #253D2C;
  --green-accent: #68BA7F;
  --green-mint: #CFFFDC;
  --orange: #ff6b2c;
  --dark: #111827;
  --gray: #6b7280;
  --light: #ffffff;
  --border: #e5e7eb;
  --white: #ffffff;
  --card: #ffffff;
  --bg-main: #ffffff;
  --bg-connect: #ffffff;
}
html, body {
  overflow-x: clip;
}
html.dark {
  --dark: #f3f4f6;
  --gray: #9ca3af;
  --light: #1f2937;
  --border: #374151;
  --white: #111827;
  --card: #1f2937;
  --bg-main: #111827;
  --bg-connect: #0f172a;
}

.mt { font-family: 'Outfit', sans-serif; color: var(--dark); }
.mt *, .mt *::before, .mt *::after { box-sizing: border-box; }
.mt a { text-decoration: none; }

/* ── BUTTONS ── */
.btn-green {
  display: inline-flex; align-items: center; gap: 8px;
  background: var(--green); color: #fff; font-weight: 700; font-size: 14px;
  padding: 13px 28px; border-radius: 8px;
  transition: background .2s, transform .15s, box-shadow .2s;
  box-shadow: 0 4px 16px rgba(46, 111, 64, .35);
}
.btn-green:hover { background: #253D2C; transform: translateY(-1px); box-shadow: 0 8px 24px rgba(46, 111, 64, .4); }
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
  color: #2E6F40; font-weight: 700; font-size: 14px;
  border: 2px solid #68BA7F; padding: 11px 24px; border-radius: 8px;
  transition: all .2s;
}
.btn-ghost:hover { background: #CFFFDC; color: #253D2C; border-color: #68BA7F; transform: translateY(-1px); }

/* ── LAYOUT ── */
.wrap { max-width: 1180px; margin: 0 auto; padding: 0 24px; }
.wrap-sm { max-width: 760px; margin: 0 auto; padding: 0 24px; }
.wrap-md { max-width: 960px; margin: 0 auto; padding: 0 24px; }
.section { padding: 36px 0; background: var(--bg-main); }
.section-sm { padding: 20px 0; background: var(--bg-main); }
.section-alt { background: var(--bg-main); }
.tc { text-align: center; }

/* ── TYPOGRAPHY ── */
.label {
  display: inline-block; background: #CFFFDC; color: #253D2C;
  font-size: 11px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase;
  padding: 5px 14px; border-radius: 20px; margin-bottom: 10px;
  border: 1.5px solid #68BA7F;
}
.h2 { font-size: 34px; font-weight: 900; line-height: 1.25; margin: 0 0 12px; color: var(--dark); }
.h2 em { font-style: normal; color: var(--green); }
.h2 .org { font-style: normal; color: var(--orange); }
.lead { font-size: 15px; color: var(--gray); line-height: 1.7; margin: 0 0 16px; }

/* ═══════════════════════════════════════════
   1. HERO
═══════════════════════════════════════════ */
.hero {
  background: var(--bg-main);
  padding: 36px 0 28px;
  overflow: hidden;
  position: relative;
}
html.dark .hero { background: linear-gradient(135deg, #111827 0%, #253D2C 50%, #111827 100%); }
.hero::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse 600px 400px at 70% 30%, rgba(46, 111, 64, .06) 0%, transparent 70%);
  pointer-events: none;
}
.hero-grid {
  display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;
  max-width: 1180px; margin: 0 auto; padding: 0 24px;
}
.hero-tag {
  display: inline-flex; align-items: center; gap: 8px;
  background: #CFFFDC; border: 1.5px solid #68BA7F; border-radius: 24px;
  padding: 6px 15px; margin-bottom: 16px;
  font-size: 11.5px; font-weight: 700; color: #253D2C;
  box-shadow: 0 2px 8px rgba(37, 61, 44, .08);
}
html.dark .hero-tag { background: #253D2C; color: #CFFFDC; border-color: #68BA7F; }
.hero-tag .dot { width: 6px; height: 6px; background: var(--green); border-radius: 50%; }
.hero h1 {
  font-size: 42px; font-weight: 900; line-height: 1.15; color: var(--dark);
  margin: 0 0 16px;
}
.hero h1 em { font-style: normal; color: var(--orange); }
.hero-desc { font-size: 15px; color: var(--gray); line-height: 1.7; margin: 0 0 18px; max-width: 480px; }
.hero-ctas { display: flex; align-items: center; gap: 16px; flex-wrap: wrap; margin-bottom: 20px; }
.hero-stats { display: flex; gap: 28px; padding-top: 16px; border-top: 1px solid var(--border); flex-wrap: wrap; }
.hero-stat-item { text-align: left; }
.hero-stat-num { font-size: 21px; font-weight: 900; color: var(--green); line-height: 1; }
.hero-stat-lbl { font-size: 11px; color: var(--gray); font-weight: 500; margin-top: 2px; }
.hero-right { position: relative; height: 420px; }
.hero-right-img {
  position: absolute; right: -16px; top: 0;
  width: 100%; height: 100%;
  object-fit: contain; object-position: right top;
  filter: drop-shadow(0 24px 48px rgba(0,0,0,.14));
  border-radius: 16px 16px 0 0;
}
.hero-badge {
  position: absolute; left: 0; bottom: 50px;
  background: #fff; border-radius: 14px; padding: 12px 16px;
  box-shadow: 0 8px 32px rgba(0,0,0,.12);
  display: flex; align-items: center; gap: 12px;
  min-width: 190px;
  animation: floatUp 3s ease-in-out infinite;
}
html.dark .hero-badge { background: #253D2C; border: 1.5px solid #68BA7F; }
@keyframes floatUp { 0%,100%{ transform:translateY(0) } 50%{ transform:translateY(-8px) } }
.hero-badge-icon { width: 38px; height: 38px; background: #CFFFDC; border: 1.5px solid #68BA7F; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 19px; color: #253D2C; }
.hero-badge-text strong { display: block; font-size: 12.5px; font-weight: 700; color: var(--dark); }
.hero-badge-text span { font-size: 10.5px; color: var(--green); font-weight: 600; }
.hero-badge2 {
  position: absolute; right: 24px; top: 35px;
  background: #fff; border-radius: 14px; padding: 11px 15px;
  box-shadow: 0 8px 32px rgba(0,0,0,.12);
  display: flex; align-items: center; gap: 9px;
  animation: floatUp 3.5s 1s ease-in-out infinite;
}
html.dark .hero-badge2 { background: #253D2C; border: 1.5px solid #68BA7F; }
.hero-badge2 .check { width: 30px; height: 30px; background: var(--green); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 13px; }
.hero-badge2 span { font-size: 11.5px; font-weight: 700; color: var(--dark); }

/* ═══════════════════════════════════════════
   2. BRANDS
═══════════════════════════════════════════ */
.brands-wrap { background: var(--bg-main); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); padding: 18px 24px; }
.brands-title { font-size: 12.5px; font-weight: 600; color: var(--gray); text-align: center; letter-spacing: 0.5px; margin-bottom: 12px; text-transform: uppercase; }
.brands-logos { display: flex; justify-content: center; align-items: center; gap: 42px; flex-wrap: wrap; }
.brand-name { font-weight: 800; font-size: 16px; color: #ccc; letter-spacing: .5px; transition: color .2s; }
html.dark .brand-name { color: #4b5563; }
.brand-name:hover { color: #aaa; }

/* ═══════════════════════════════════════════
   3. STATS BAR
═══════════════════════════════════════════ */
.stats-outer { padding: 12px 24px 18px; background: var(--bg-main); }
.stats-bar {
  max-width: 860px; margin: 0 auto;
  background: linear-gradient(135deg, #2E6F40 0%, #00c9a3 100%);
  border-radius: 18px; padding: 20px 36px;
  display: flex; justify-content: space-around; align-items: center;
  box-shadow: 0 16px 48px rgba(46, 111, 64, .25);
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
.video-wrap { background: var(--bg-main); }
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
  display: grid; grid-template-columns: repeat(5, 1fr); gap: 14px; margin-bottom: 20px;
}
.kitchen-card {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 22px;
  padding: 28px 28px;
  box-shadow: 0 4px 24px rgba(0,0,0,0.06);
}
@media (max-width: 768px) {
  .kitchen-card {
    padding: 22px 18px;
  }
}
@media (max-width: 480px) {
  .kitchen-card {
    padding: 18px 14px;
  }
}
.feat-card {
  background: var(--card); border: 1.5px solid var(--border); border-radius: 14px;
  padding: 26px 16px 20px; display: flex; flex-direction: column; align-items: center; gap: 14px;
  text-align: center; cursor: default; position: relative; overflow: hidden;
  transition: border-color .2s, box-shadow .2s, transform .2s;
}
.feat-card:hover { border-color: var(--green); box-shadow: 0 8px 28px rgba(46, 111, 64, .1); transform: translateY(-4px); }
.feat-icon { font-size: 34px; line-height: 1; }
.feat-lbl { font-size: 12.5px; font-weight: 600; color: var(--dark); line-height: 1.45; }
.feat-tooltip {
  position: absolute; inset: 0;
  background: rgba(46, 111, 64, 0.95);
  color: #fff;
  display: flex; align-items: center; justify-content: center;
  padding: 14px;
  font-size: 12px; line-height: 1.55; text-align: center;
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
  border-radius: 18px; padding: 18px 28px;
  display: flex; align-items: center; gap: 20px; cursor: pointer;
  transition: opacity .2s; box-shadow: 0 12px 36px rgba(204,0,0,.2);
}
.yt-banner:hover { opacity: .92; }
.yt-icon { width: 50px; height: 50px; background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.yt-text small { font-size: 9.5px; font-weight: 700; letter-spacing: 1.5px; color: rgba(255,255,255,.7); text-transform: uppercase; }
.yt-text p { font-size: 16.5px; font-weight: 800; color: #fff; margin: 3px 0 1px; }
.yt-text span { font-size: 11.5px; color: rgba(255,255,255,.75); }

/* ═══════════════════════════════════════════
   7. WHY LOVE US
═══════════════════════════════════════════ */
.love-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.love-card {
  background: var(--card); border-radius: 16px; overflow: hidden;
  box-shadow: 0 4px 16px rgba(0,0,0,.06);
  transition: transform .25s, box-shadow .25s;
}
.love-card:hover { transform: translateY(-4px); box-shadow: 0 16px 48px rgba(0,0,0,.1); }
.love-img { width: 100%; height: 175px; object-fit: cover; }
.love-body { padding: 18px; }
.love-body h3 { font-size: 14.5px; font-weight: 700; color: var(--dark); margin: 0 0 6px; line-height: 1.4; }
.love-body p { font-size: 12.5px; color: var(--gray); line-height: 1.6; margin: 0; }

/* ═══════════════════════════════════════════
   8. INTEGRATIONS
═══════════════════════════════════════════ */
.integ-grid { display: grid; grid-template-columns: 1fr 1.5fr; gap: 48px; align-items: center; }
.integ-title { font-size: 26px; font-weight: 900; color: var(--dark); line-height: 1.3; margin: 0 0 12px; }
.integ-title em { font-style: normal; color: var(--green); }
.integ-sub { font-size: 13.5px; color: var(--gray); line-height: 1.65; }
.chip-row { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 10px; }
.chip {
  background: var(--light); border: 1px solid var(--border); border-radius: 8px;
  padding: 8px 18px; font-size: 12.5px; font-weight: 700; color: var(--dark);
  white-space: nowrap; transition: border-color .2s;
}
.chip:hover { border-color: var(--green); }
.pm-row { display: flex; flex-wrap: wrap; gap: 6px; }
.pm {
  background: var(--light); border-radius: 5px; border: 1px solid var(--border);
  padding: 3px 8px; font-size: 10px; font-weight: 600; color: var(--gray);
}

/* ═══════════════════════════════════════════
   9. QR PREVIEW
═══════════════════════════════════════════ */
.qr-box {
  background: linear-gradient(135deg, #2E6F40 0%, #00a882 100%);
  border-radius: 22px; padding: 36px 32px;
  display: flex; justify-content: center; align-items: center; gap: 40px;
  flex-wrap: wrap; box-shadow: 0 24px 64px rgba(46, 111, 64, .2);
  position: relative; overflow: hidden;
}
.qr-box::before {
  content: ''; position: absolute;
  width: 400px; height: 400px; background: rgba(255,255,255,.05);
  border-radius: 50%; right: -100px; bottom: -100px; pointer-events: none;
}
.qr-frame { background: #fff; padding: 16px; border-radius: 16px; box-shadow: 0 8px 24px rgba(0,0,0,.15); }
.qr-phone { height: 210px; object-fit: contain; filter: drop-shadow(0 16px 32px rgba(0,0,0,.3)); }
.qr-caption { font-size: 12.5px; color: var(--gray); margin-top: 16px; font-style: italic; text-align: center; }

/* ═══════════════════════════════════════════
   10. TEMPLATES
═══════════════════════════════════════════ */
.tmpl-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; margin: 24px 0; }
.tmpl-card {
  border: 1.5px solid var(--border); border-radius: 13px; overflow: hidden;
  transition: border-color .2s, box-shadow .2s, transform .2s; cursor: pointer;
}
.tmpl-card:hover { border-color: var(--green); box-shadow: 0 8px 28px rgba(46, 111, 64, .1); transform: translateY(-3px); }
.tmpl-thumb {
  height: 115px; background: linear-gradient(135deg, var(--light) 0%, #e8f7f3 100%);
  display: flex; align-items: center; justify-content: center; font-size: 44px;
}
.tmpl-name { padding: 10px; font-size: 11.5px; font-weight: 600; color: var(--dark); background: var(--card); text-align: center; }

/* ═══════════════════════════════════════════
   11. PARTNER BANNER
═══════════════════════════════════════════ */
.qrtiger-bar {
  background: var(--light); border-radius: 16px; padding: 20px 28px;
  display: flex; align-items: center; gap: 20px;
  border: 1px solid var(--border);
}
.qrtiger-logo { font-size: 20px; font-weight: 900; color: var(--dark); white-space: nowrap; }
.qrtiger-logo span { color: var(--orange); }
.qrtiger-text { flex: 1; font-size: 12.5px; color: var(--gray); line-height: 1.55; }
.btn-visit {
  background: var(--white); border: 1.5px solid var(--border); color: var(--dark);
  font-weight: 700; font-size: 11.5px; padding: 9px 18px; border-radius: 7px;
  text-decoration: none; white-space: nowrap; transition: border-color .2s, color .2s;
  display: inline-block;
}
.btn-visit:hover { border-color: var(--green); color: var(--green); }

/* ═══════════════════════════════════════════
   12. REVIEWS
═══════════════════════════════════════════ */
.reviews-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 20px; }
.review-card {
  background: var(--card); border: 1.5px solid var(--border); border-radius: 16px;
  padding: 20px; transition: box-shadow .25s, transform .2s;
}
.review-card:hover { box-shadow: 0 16px 48px rgba(0,0,0,.08); transform: translateY(-4px); }
.reviewer { display: flex; align-items: center; gap: 12px; margin-bottom: 12px; }
.reviewer img { width: 48px; height: 48px; border-radius: 50%; object-fit: cover; border: 2.5px solid rgba(46, 111, 64, .2); }
.reviewer-name { font-size: 13.5px; font-weight: 700; color: var(--dark); }
.reviewer-role { font-size: 11.5px; font-weight: 600; color: var(--green); }
.stars { color: #f4a50a; font-size: 15px; margin-bottom: 10px; letter-spacing: 1.5px; }
.review-text { font-size: 12.5px; color: var(--gray); line-height: 1.65; font-style: italic; }

/* ═══════════════════════════════════════════
   13. CTA BANNER
═══════════════════════════════════════════ */
.cta-banner {
  background: linear-gradient(135deg, #1a3a3c 0%, #0d2b2e 60%, #1a3a3c 100%);
  border-radius: 22px; padding: 30px 36px;
  display: grid; grid-template-columns: 1.3fr 1fr; gap: 28px; align-items: center;
  position: relative; overflow: hidden;
  box-shadow: 0 24px 64px rgba(0,0,0,.2);
}
.cta-banner::before {
  content: ''; position: absolute;
  width: 500px; height: 500px; background: rgba(46, 111, 64, .05);
  border-radius: 50%; right: -100px; top: -150px; pointer-events: none;
}
.cta-label { font-size: 10.5px; font-weight: 700; letter-spacing: 2px; color: var(--green); text-transform: uppercase; margin-bottom: 10px; }
.cta-h2 { font-size: 26px; font-weight: 900; color: #fff; line-height: 1.3; margin: 0 0 12px; }
.cta-p { font-size: 13.5px; color: rgba(255,255,255,.65); line-height: 1.65; margin: 0 0 16px; max-width: 460px; }
.cta-right { display: flex; align-items: center; justify-content: center; }
.cta-right img { height: 200px; object-fit: contain; filter: drop-shadow(0 16px 40px rgba(0,0,0,.4)); }

/* ═══════════════════════════════════════════
   14. FAQ (STYLED IN DEDICATED SECTION BELOW)
═══════════════════════════════════════════ */

/* ═══════════════════════════════════════════
   FOOTER
═══════════════════════════════════════════ */
/* ═══════════════════════════════════════════
   PREMIUM CONNECT SECTION (STYLED IN DEDICATED SECTION)
═══════════════════════════════════════════ */

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
  background: #253D2C;
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
  .features-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
  .feat-card { padding: 16px 8px 14px; gap: 8px; }
  .feat-card svg { width: 40px; height: 40px; }
  .feat-lbl { font-size: 13px; line-height: 1.25; }
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
          <div class="hero-stat-num">50+</div>
          <div class="hero-stat-lbl">Partner Outlets</div>
        </div>
        <div class="hero-stat-item">
          <div class="hero-stat-num">15K+</div>
          <div class="hero-stat-lbl">Orders Handled</div>
        </div>
        <div class="hero-stat-item">
          <div class="hero-stat-num">30 Min</div>
          <div class="hero-stat-lbl">Quick Setup</div>
        </div>
        <div class="hero-stat-item">
          <div class="hero-stat-num">24/7</div>
          <div class="hero-stat-lbl">Active Support</div>
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
<div class="qr-flow-banner">
  <div class="wrap">
    <div class="qr-flow-header">
      <span class="qr-flow-badge">SMART CONTACTLESS DINING</span>
      <h3 class="qr-flow-title">How ChowChak's QR Ordering Works</h3>
      <p class="qr-flow-sub">From customer scan to kitchen print — fast, error-free table service in 4 simple steps</p>
    </div>
    <div class="qr-flow-grid">
      <!-- Step 1 -->
      <div class="qr-step-card">
        <div class="qr-step-top">
          <span class="qr-step-num">01</span>
          <div class="qr-step-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="3" width="7" height="7"></rect>
              <rect x="14" y="3" width="7" height="7"></rect>
              <rect x="14" y="14" width="7" height="7"></rect>
              <rect x="3" y="14" width="7" height="7"></rect>
              <path d="M7 7h.01"></path>
              <path d="M17 7h.01"></path>
              <path d="M7 17h.01"></path>
              <path d="M17 17h.01"></path>
            </svg>
          </div>
        </div>
        <h4 class="qr-step-heading">Scan Table QR</h4>
        <p class="qr-step-desc">Zero app download required. Diners simply scan the tabletop QR code with any smartphone camera to open the menu instantly.</p>
      </div>

      <!-- Step 2 -->
      <div class="qr-step-card">
        <div class="qr-step-top">
          <span class="qr-step-num">02</span>
          <div class="qr-step-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
              <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
              <path d="M9 7h6"></path>
              <path d="M9 11h6"></path>
            </svg>
          </div>
        </div>
        <h4 class="qr-step-heading">Browse & Customize</h4>
        <p class="qr-step-desc">Interactive digital menu with dish photos, spice levels, add-on toppings, and real-time out-of-stock indicators.</p>
      </div>

      <!-- Step 3 -->
      <div class="qr-step-card">
        <div class="qr-step-top">
          <span class="qr-step-num">03</span>
          <div class="qr-step-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="6 9 6 2 18 2 18 9"></polyline>
              <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
              <rect x="6" y="14" width="12" height="8"></rect>
              <line x1="10" y1="18" x2="14" y2="18"></line>
            </svg>
          </div>
        </div>
        <h4 class="qr-step-heading">Instant Kitchen KOT</h4>
        <p class="qr-step-desc">The moment the order is placed, kitchen thermal printers fire tickets in under 2 seconds. Zero waiting for busy waiters.</p>
      </div>

      <!-- Step 4 -->
      <div class="qr-step-card">
        <div class="qr-step-top">
          <span class="qr-step-num">04</span>
          <div class="qr-step-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="2" y="5" width="20" height="14" rx="2"></rect>
              <line x1="2" y1="10" x2="22" y2="10"></line>
              <path d="M12 15h2"></path>
            </svg>
          </div>
        </div>
        <h4 class="qr-step-heading">Easy Pay & Re-order</h4>
        <p class="qr-step-desc">Customers can pay seamlessly via UPI, card, or cash, add more items anytime, and get instant digital receipts.</p>
      </div>
    </div>
  </div>
</div>
<style>
.qr-flow-banner {
  padding: 48px 24px;
  background: var(--bg-main, #ffffff);
  border-top: 1px solid var(--border, #e2e8f0);
  border-bottom: 1px solid var(--border, #e2e8f0);
}
html.dark .qr-flow-banner { background: #182b1f; border-color: #253D2C; }
.qr-flow-header {
  text-align: center;
  max-width: 650px;
  margin: 0 auto 34px;
}
.qr-flow-badge {
  display: inline-block;
  padding: 5px 16px;
  background: #CFFFDC;
  color: #253D2C;
  font-size: 11px;
  font-weight: 800;
  letter-spacing: 1.5px;
  border-radius: 20px;
  margin-bottom: 10px;
  border: 1.5px solid #68BA7F;
}
.qr-flow-title {
  font-size: 24px;
  font-weight: 800;
  color: var(--text-main, #111827);
  letter-spacing: -0.5px;
  margin: 0 0 8px;
}
html.dark .qr-flow-title {
  color: #f3f4f6;
}
.qr-flow-sub {
  font-size: 14px;
  color: var(--gray, #6b7280);
  margin: 0;
}
html.dark .qr-flow-sub {
  color: #9ca3af;
}
.qr-flow-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 18px;
}
.qr-step-card {
  background: var(--card-bg, #ffffff);
  border: 1px solid var(--border, #e5e7eb);
  border-radius: 16px;
  padding: 22px 18px;
  display: flex;
  flex-direction: column;
  transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
  position: relative;
  box-shadow: 0 4px 14px rgba(0,0,0,0.03);
}
html.dark .qr-step-card { background: #253D2C; border-color: #3d6347; box-shadow: 0 4px 14px rgba(0,0,0,0.35); }
.qr-step-card:hover {
  transform: translateY(-5px);
  border-color: #2E6F40;
  box-shadow: 0 12px 30px rgba(46, 111, 64, 0.15);
}
.qr-step-top {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 14px;
}
.qr-step-num { font-size: 26px; font-weight: 900; color: #68BA7F; }
.qr-step-icon {
  width: 42px;
  height: 42px;
  background: rgba(46, 111, 64, 0.1);
  border: 1px solid rgba(46, 111, 64, 0.22);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #2E6F40;
}
.qr-step-heading {
  font-size: 15px;
  font-weight: 700;
  color: var(--text-main, #111827);
  margin: 0 0 8px;
}
html.dark .qr-step-heading {
  color: #f3f4f6;
}
.qr-step-desc {
  font-size: 12.5px;
  line-height: 1.55;
  color: var(--gray, #6b7280);
  margin: 0;
}
html.dark .qr-step-desc {
  color: #9ca3af;
}
@media (max-width: 960px) {
  .qr-flow-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}
@media (max-width: 580px) {
  .qr-flow-grid {
    grid-template-columns: 1fr;
    gap: 14px;
  }
  .qr-flow-title {
    font-size: 20px;
  }
  .qr-flow-banner {
    padding: 32px 16px;
  }
}
</style>
<style>
.premium-video-card {
  position: relative;
  max-width: 100%;
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
  box-shadow: 0 40px 100px rgba(46, 111, 64, 0.2);
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
  box-shadow: 0 10px 30px rgba(46, 111, 64, 0.3);
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
          <svg width="28" height="28" viewBox="0 0 24 24" fill="#2E6F40" style="margin-left: 4px; transition: fill 0.3s;"><path d="M8 5v14l11-7z"/></svg>
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
        Boost sales and engagement using ChowChak's free menu maker, management system, and built-in restaurant marketing tools.
      </p>
      <div class="features-grid">

        <!-- 1: Ordering Dashboard -->
        <div class="feat-card">
          <div class="feat-icon-box">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
              <line x1="8" y1="21" x2="16" y2="21"></line>
              <line x1="12" y1="17" x2="12" y2="21"></line>
              <path d="M7 8h4"></path>
              <path d="M7 12h8"></path>
            </svg>
          </div>
          <span class="feat-lbl">Ordering<br>Dashboard</span>
          <div class="feat-tooltip">Track and manage incoming orders in real-time; view table assignments, order status, and instant kitchen updates.</div>
        </div>

        <!-- 2: Sales Analytics -->
        <div class="feat-card">
          <div class="feat-icon-box">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="18" y1="20" x2="18" y2="10"></line>
              <line x1="12" y1="20" x2="12" y2="4"></line>
              <line x1="6" y1="20" x2="6" y2="14"></line>
              <path d="M4 20h16"></path>
            </svg>
          </div>
          <span class="feat-lbl">Sales<br>Analytics</span>
          <div class="feat-tooltip">Optimize your menu for profitability; understand customer preferences and utilize smart menu QR code insights.</div>
        </div>

        <!-- 3: Purchase Analytics -->
        <div class="feat-card">
          <div class="feat-icon-box">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
              <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
              <line x1="12" y1="22.08" x2="12" y2="12"></line>
            </svg>
          </div>
          <span class="feat-lbl">Purchase<br>Analytics</span>
          <div class="feat-tooltip">Monitor ingredients, supplier costs, and inventory trends to reduce waste and optimize restaurant purchasing.</div>
        </div>

        <!-- 4: POS Integration -->
        <div class="feat-card">
          <div class="feat-icon-box">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="2" y="4" width="20" height="16" rx="2"></rect>
              <line x1="2" y1="10" x2="22" y2="10"></line>
              <line x1="6" y1="15" x2="10" y2="15"></line>
              <circle cx="17" cy="15" r="1.5"></circle>
            </svg>
          </div>
          <span class="feat-lbl">POS<br>Integration</span>
          <div class="feat-tooltip">Seamlessly sync tables, menus, and order billing directly with your existing restaurant Point of Sale terminal.</div>
        </div>

        <!-- 5: QR Code Menu Creation -->
        <div class="feat-card">
          <div class="feat-icon-box">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="3" width="7" height="7"></rect>
              <rect x="14" y="3" width="7" height="7"></rect>
              <rect x="14" y="14" width="7" height="7"></rect>
              <rect x="3" y="14" width="7" height="7"></rect>
              <path d="M7 7h.01"></path>
              <path d="M17 7h.01"></path>
              <path d="M7 17h.01"></path>
              <path d="M17 17h.01"></path>
            </svg>
          </div>
          <span class="feat-lbl">QR Code<br>Menu Creation</span>
          <div class="feat-tooltip">Generate customizable, brand-themed QR codes for every table; allow instant scanning and digital menu browsing.</div>
        </div>

        <!-- 6: Customer Order Management -->
        <div class="feat-card">
          <div class="feat-icon-box">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
              <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
              <path d="m9 14 2 2 4-4"></path>
            </svg>
          </div>
          <span class="feat-lbl">Customer Order<br>Management</span>
          <div class="feat-tooltip">Track order flows from table request to final billing; assign servers, manage custom modifiers, and process requests.</div>
        </div>

        <!-- 7: Menu Analytics & Insights -->
        <div class="feat-card">
          <div class="feat-icon-box">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
              <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
            </svg>
          </div>
          <span class="feat-lbl">Menu Analytics<br>and Insights</span>
          <div class="feat-tooltip">Get detailed item performance reports; identify bestsellers, low-margin dishes, and optimize menu pricing.</div>
        </div>

        <!-- 8: Restaurant Branding -->
        <div class="feat-card">
          <div class="feat-icon-box">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="13.5" cy="6.5" r=".5" fill="currentColor"></circle>
              <circle cx="17.5" cy="10.5" r=".5" fill="currentColor"></circle>
              <circle cx="8.5" cy="7.5" r=".5" fill="currentColor"></circle>
              <circle cx="6.5" cy="12.5" r=".5" fill="currentColor"></circle>
              <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.563-2.512 5.563-5.563C22 6.5 17.5 2 12 2z"></path>
            </svg>
          </div>
          <span class="feat-lbl">Restaurant<br>Branding</span>
          <div class="feat-tooltip">Customize colors, logos, banners, and fonts on your digital menu page to establish a premium brand identity.</div>
        </div>

        <!-- 9: Customer Feedback -->
        <div class="feat-card">
          <div class="feat-icon-box">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
              <polygon points="12 7 13.5 10 17 10.5 14.5 13 15 16.5 12 15 9 16.5 9.5 13 7 10.5 10.5 10 12 7" fill="currentColor"></polygon>
            </svg>
          </div>
          <span class="feat-lbl">Customer<br>Feedback</span>
          <div class="feat-tooltip">Collect real-time reviews and ratings directly from tables; monitor staff service quality and customer satisfaction.</div>
        </div>

        <!-- 10: Multilingual Support -->
        <div class="feat-card">
          <div class="feat-icon-box">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"></circle>
              <line x1="2" y1="12" x2="22" y2="12"></line>
              <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
            </svg>
          </div>
          <span class="feat-lbl">Multilingual<br>Support</span>
          <div class="feat-tooltip">Translate your digital menu into multiple languages automatically; serve global tourists and local guests effortlessly.</div>
        </div>

      </div>
      <style>
      .feat-icon-box {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: rgba(46, 111, 64, 0.08);
        border: 1px solid rgba(46, 111, 64, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #2E6F40;
        transition: all 0.25s ease;
        margin-bottom: 2px;
      }
      html.dark .feat-icon-box {
        background: rgba(46, 111, 64, 0.12);
        border-color: rgba(46, 111, 64, 0.25);
        color: #2E6F40;
      }
      .feat-card:hover .feat-icon-box {
        background: #2E6F40;
        color: #ffffff;
        border-color: #2E6F40;
        transform: scale(1.08);
        box-shadow: 0 8px 18px rgba(46, 111, 64, 0.3);
      }
      </style>
      {{-- SEE ALL FEATURES button - dark teal style like reference --}}
      <div style="margin-top:8px;">
        <a href="/features" style="display:inline-block; background:#2d4a4e; color:#fff; font-weight:700; font-size:12px; padding:14px 36px; border-radius:8px; letter-spacing:1.5px; text-transform:uppercase; transition:background .2s; text-decoration:none;" onmouseover="this.style.background='#1a3538'" onmouseout="this.style.background='#2d4a4e'">
          SEE ALL FEATURES
        </a>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ 6. CHOWCHAK VIDEO DEMO BANNER ═══════════ --}}
<section class="section-sm" style="background:var(--white);">
  <div class="wrap">
    <a href="https://www.youtube.com/watch?v=KKla4E_e_tY" target="_blank" style="text-decoration:none; display:block;">
      <div class="yt-banner">
        <div class="yt-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="#c00"><path d="M8 5v14l11-7z"/></svg>
        </div>
        <div class="yt-text">
          <small>YouTube</small>
          <p>Watch how ChowChak simplifies digital ordering and billing</p>
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
  box-shadow: 0 20px 40px rgba(46, 111, 64, 0.08);
}
.love-badge {
  position: absolute;
  top: 16px; left: 16px;
  background: rgba(46, 111, 64, 0.9);
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
    <div class="tc" style="margin-bottom:28px;">
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



{{-- ═══════════ 9. QR PREVIEW ═══════════ --}}
<style>
.premium-qr-preview-box {
  background: radial-gradient(circle at 0% 0%, #2E6F40 0%, #245833 100%);
  border-radius: 32px;
  padding: 56px 48px;
  display: grid;
  grid-template-columns: 1.15fr 0.85fr;
  gap: 48px;
  align-items: center;
  box-shadow: 0 30px 70px rgba(46, 111, 64, 0.22);
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
.qr-preview-content {
  position: relative;
  z-index: 1;
}
.qr-preview-content h3 {
  font-size: clamp(22px, 3vw, 28px);
  font-weight: 800;
  color: #fff;
  margin: 0 0 16px;
  line-height: 1.3;
}
.qr-preview-content p {
  font-size: 15px;
  color: rgba(255,255,255,0.9);
  line-height: 1.75;
  margin-bottom: 28px;
}
.qr-preview-actions {
  display: flex;
  gap: 14px;
  align-items: center;
  flex-wrap: wrap;
}
.qr-preview-actions .btn-orange,
.qr-preview-actions .btn-ghost {
  display: inline-flex; align-items: center; gap: 8px;
  color: #2E6F40; font-weight: 700; font-size: 14px;
  border: 2px solid #68BA7F; padding: 11px 24px; border-radius: 8px;
  transition: all .2s;
}
.qr-scanner-card {
  background: var(--white);
  padding: 30px;
  border-radius: 24px;
  box-shadow: 0 15px 40px rgba(0,0,0,0.15);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  max-width: 300px;
  width: 100%;
  margin: 0 auto;
  box-sizing: border-box;
  position: relative;
  z-index: 1;
}
html.dark .qr-scanner-card {
  background: #111827;
  border: 1px solid rgba(255, 255, 255, 0.1);
}
.qr-frame-beautified {
  padding: 18px;
  border-radius: 18px;
  background: #fff;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: inset 0 0 0 1px rgba(0,0,0,0.06);
}
/* Corner brackets for scanner effect */
.qr-frame-beautified::before, .qr-frame-beautified::after {
  content: '';
  position: absolute;
  width: 22px;
  height: 22px;
  border: 3px solid var(--green);
  pointer-events: none;
}
.qr-frame-beautified::before { top: 0; left: 0; border-right: none; border-bottom: none; border-radius: 8px 0 0 0; }
.qr-frame-beautified::after { bottom: 0; right: 0; border-left: none; border-top: none; border-radius: 0 0 8px 0; }

.qr-scanner-line {
  position: absolute;
  left: 8px; right: 8px;
  height: 3px;
  background: var(--orange);
  box-shadow: 0 0 10px var(--orange);
  animation: scan-anim 2.5s infinite ease-in-out;
}
@keyframes scan-anim {
  0%, 100% { top: 12px; }
  50% { top: calc(100% - 15px); }
}
.qr-scanner-card span {
  font-size: 11px;
  font-weight: 700;
  color: var(--gray);
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-top: 18px;
}
html.dark .qr-scanner-card span {
  color: #9ca3af;
}

/* ── RESPONSIVE MEDIA QUERIES ── */
@media (max-width: 900px) {
  .premium-qr-preview-box {
    grid-template-columns: 1fr;
    padding: 38px 24px;
    gap: 32px;
    text-align: center;
    border-radius: 24px;
  }
  .qr-preview-content {
    text-align: center;
    max-width: 540px;
    margin: 0 auto;
  }
  .qr-preview-actions {
    justify-content: center;
  }
}
@media (max-width: 480px) {
  .premium-qr-preview-box {
    padding: 26px 16px;
    border-radius: 20px;
    gap: 22px;
  }
  .qr-preview-content h3 {
    font-size: 21px;
    line-height: 1.35;
    margin-bottom: 12px;
  }
  .qr-preview-content p {
    font-size: 13.5px;
    line-height: 1.6;
    margin-bottom: 20px;
  }
  .qr-preview-actions {
    flex-direction: column;
    width: 100%;
    gap: 10px;
  }
  .qr-preview-actions a {
    width: 100%;
    text-align: center;
    justify-content: center;
    display: inline-flex;
    padding: 12px 18px;
    font-size: 14px;
    box-sizing: border-box;
  }
  .qr-scanner-card {
    padding: 20px 16px;
    max-width: 250px;
    border-radius: 18px;
  }
  .qr-frame-beautified {
    padding: 12px;
  }
  .qr-frame-beautified svg {
    width: 125px;
    height: 125px;
  }
}
</style>
<section class="section section-alt tc">
  <div class="wrap">
    <h2 class="h2">Scan the QR code to Preview<br>Your Digital Menu</h2>
    <p class="lead" style="max-width:520px; margin-left:auto; margin-right:auto; margin-bottom:24px;">
      Explore a customizable, interactive menu designed to simplify ordering, boost engagement, and showcase your restaurant at its best.
    </p>

    <div class="premium-qr-preview-box">
      <div class="qr-preview-content">
        <h3>Experience the ordering flow live on your device</h3>
        <p>
          Simply scan the QR code with your phone camera. You will instantly load a live interactive digital menu layout. Add dishes, custom modifiers, and experience table-ordering in real-time.
        </p>
        <div class="qr-preview-actions">
          <a href="{{ route('restaurant_signup') }}" class="btn-orange">Create Your QR Menu</a>
          <a href="#reviews" class="btn-ghost" style="color:#fff; border-color:rgba(255,255,255,0.7);">See Reviews</a>
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
              <rect x="56" y="56" width="16" height="16" fill="#2E6F40" rx="4"/>
            </svg>
          </div>
          <span>Scan to open menu</span>
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
  box-shadow: 0 20px 40px rgba(46, 111, 64, 0.08);
}
.tmpl-preview-box {
  height: 175px;
  background: #f1f5f9;
  position: relative;
  overflow: hidden;
  display: block;
}
.tmpl-preview-box img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.45s cubic-bezier(0.165, 0.84, 0.44, 1);
}
.premium-tmpl-card:hover .tmpl-preview-box img {
  transform: scale(1.08);
}
.tmpl-badge {
  position: absolute;
  top: 10px; right: 10px;
  background: rgba(255, 255, 255, 0.94);
  backdrop-filter: blur(6px);
  border: 1px solid rgba(46, 111, 64, 0.3);
  font-size: 10px;
  font-weight: 800;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  color: #2E6F40;
  padding: 3px 9px;
  border-radius: 6px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  z-index: 2;
}
.tmpl-badge.pro {
  color: #ff6b2c;
  border-color: rgba(255, 107, 44, 0.3);
}
html.dark .tmpl-badge {
  background: rgba(17, 24, 39, 0.92);
  border-color: rgba(255, 255, 255, 0.1);
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
      ['/img/templates/menu-template.jpg','Menu Templates','Dine-in / Room service','FREE'],
      ['/img/templates/coaster-design.jpg','Coaster Designs','Cup & Glass branding','PRO'],
      ['/img/templates/poster-layout.jpg','Poster Layouts','Promotional wall flyers','FREE'],
      ['/img/templates/table-tent.jpg','Table Tent Formats','QR standees','FREE'],
      ['/img/templates/stickers-labels.jpg','Stickers & Labels','Delivery box branding','PRO'],
      ['/img/templates/a-frame.jpg','A-Frame Designs','Sidewalk signage','FREE'],
      ['/img/templates/business-card.jpg','Business Cards','Executive networking','FREE'],
      ['/img/templates/gift-card.jpg','Gift Cards','Discount vouchers','PRO']
    ]; @endphp
    <div class="premium-tmpl-grid">
      @foreach($tmpls as $t)
      <div class="premium-tmpl-card">
        <div class="tmpl-preview-box">
          <span class="tmpl-badge {{ $t[3] === 'PRO' ? 'pro' : '' }}">{{ $t[3] }}</span>
          <img src="{{ $t[0] }}" alt="{{ $t[1] }} Mockup" loading="lazy">
        </div>
        <div class="tmpl-info">
          <h4>{{ $t[1] }}</h4>
          <span>{{ $t[2] }}</span>
        </div>
      </div>
      @endforeach
    </div>
    <div style="margin-top:24px;">
      <a href="{{ route('restaurant_signup') }}" class="btn-green">View More Templates</a>
    </div>
  </div>
</section>

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
  <div class="wrap">
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
/* ── FAQ SECTION (EXPLICIT LIGHT & DARK MODE) ── */
.pr-faq-section {
  padding: 64px 24px 44px !important;
  background: #ffffff !important;
  transition: background-color 0.3s ease;
}
html.dark .pr-faq-section {
  background: #111827 !important;
}
.pr-faq-inner {
  max-width: 980px !important;
  margin: 0 auto !important;
}
.pr-faq-section .section-title {
  color: #111827 !important;
}
html.dark .pr-faq-section .section-title {
  color: #f3f4f6 !important;
}
.pr-faq-section .section-sub {
  color: #6b7280 !important;
}
html.dark .pr-faq-section .section-sub {
  color: #9ca3af !important;
}
.faq-item {
  background: #ffffff !important;
  border: 1px solid #e5e7eb !important;
  border-radius: 16px !important;
  margin-bottom: 14px !important;
  overflow: hidden !important;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03) !important;
  transition: all .25s ease !important;
}
.faq-item:hover {
  border-color: #2E6F40 !important;
  box-shadow: 0 4px 16px rgba(46, 111, 64, 0.1) !important;
}
html.dark .faq-item {
  background: #1f2937 !important;
  border-color: #374151 !important;
  box-shadow: none !important;
}
html.dark .faq-item:hover {
  border-color: #2E6F40 !important;
  box-shadow: 0 4px 16px rgba(46, 111, 64, 0.18) !important;
}
.faq-question {
  display: flex !important;
  justify-content: space-between !important;
  align-items: center !important;
  padding: 20px 24px !important;
  cursor: pointer !important;
  font-size: 15px !important;
  font-weight: 700 !important;
  color: #111827 !important;
  user-select: none !important;
  gap: 14px !important;
  transition: color .2s ease !important;
}
.faq-question:hover,
.faq-question.open {
  color: #2E6F40 !important;
}
html.dark .faq-question {
  color: #f3f4f6 !important;
}
html.dark .faq-question:hover,
html.dark .faq-question.open {
  color: #2E6F40 !important;
}
.faq-toggle-icon {
  width: 32px !important;
  height: 32px !important;
  min-width: 32px !important;
  border-radius: 50% !important;
  background: #ecfdf5 !important;
  border: 1.5px solid #a7f3d0 !important;
  color: #2E6F40 !important;
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  font-size: 18px !important;
  font-weight: 700 !important;
  line-height: 1 !important;
  flex-shrink: 0 !important;
  transition: all .25s ease !important;
}
.faq-question.open .faq-toggle-icon {
  background: #2E6F40 !important;
  border-color: #2E6F40 !important;
  color: #ffffff !important;
  transform: rotate(180deg);
}
html.dark .faq-toggle-icon {
  background: #374151 !important;
  border-color: #4b5563 !important;
  color: #34d399 !important;
}
html.dark .faq-question.open .faq-toggle-icon {
  background: #2E6F40 !important;
  border-color: #2E6F40 !important;
  color: #ffffff !important;
}
.faq-answer {
  padding: 0 24px !important;
  max-height: 0 !important;
  overflow: hidden !important;
  font-size: 14px !important;
  color: #4b5563 !important;
  line-height: 1.8 !important;
  transition: max-height .3s ease, padding .3s ease !important;
}
.faq-answer.open {
  max-height: 400px !important;
  padding: 0 24px 22px !important;
}
html.dark .faq-answer {
  color: #9ca3af !important;
}
</style>

<section class="pr-faq-section" id="user-faqs">
  <div class="pr-faq-inner">
    <div style="text-align:center; margin-bottom:32px;">
      <h2 class="section-title" style="font-size:clamp(22px, 3vw, 32px);font-weight:900;margin:0 0 8px;">Frequently Asked <em style="font-style:normal;color:#2E6F40;">Questions</em></h2>
      <p class="section-sub" style="font-size:14.5px;margin:0 0 20px;line-height:1.7;">Everything you need to know about our digital QR menu & restaurant OS platform.</p>
    </div>

    <div id="faq-container">
      {{-- Initial fallback skeleton/SSR items --}}
      <div class="faq-item">
        <div class="faq-question open" onclick="toggleFaq(this)">
          <span>How does ChowChak Digital QR Menu work?</span>
          <span class="faq-toggle-icon">−</span>
        </div>
        <div class="faq-answer open">
          Customers simply scan the QR code placed on their table using their smartphone camera. The interactive digital menu opens instantly without downloading any app, allowing guests to explore dishes, customize modifiers, and place orders directly to your kitchen.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question" onclick="toggleFaq(this)">
          <span>Can customers order and pay directly from the QR menu?</span>
          <span class="faq-toggle-icon">+</span>
        </div>
        <div class="faq-answer">
          Yes! Guests can browse real-time item availability, customize dishes, and place instant orders. Depending on your restaurant preference, customers can pay directly via digital payments (UPI, Cards) or settle at the counter/table.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question" onclick="toggleFaq(this)">
          <span>Do I need expensive hardware or special tablets?</span>
          <span class="faq-toggle-icon">+</span>
        </div>
        <div class="faq-answer">
          No proprietary hardware is required. ChowChak works seamlessly on any existing smartphone, tablet, laptop, and connects directly to standard thermal receipt printers (USB, Bluetooth, Wi-Fi, Ethernet).
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question" onclick="toggleFaq(this)">
          <span>How fast can I set up my restaurant menu and start?</span>
          <span class="faq-toggle-icon">+</span>
        </div>
        <div class="faq-answer">
          You can be up and running in under 30 minutes! Simply add your food categories and items, configure prices, and generate your custom branded QR code standees or stickers.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question" onclick="toggleFaq(this)">
          <span>Can I manage multiple outlets from a single dashboard?</span>
          <span class="faq-toggle-icon">+</span>
        </div>
        <div class="faq-answer">
          Yes! ChowChak includes multi-branch management. You can switch between outlets, track unified or branch-specific sales analytics, manage staff permissions, and update menus centrally.
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
