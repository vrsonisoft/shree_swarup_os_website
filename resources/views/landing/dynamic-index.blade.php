@extends('layouts.landing')

@section('title', 'ChowChak - Complete Restaurant Software & Digital Menu Platform')
@section('meta_description', 'Empower your restaurant with ChowChak. Smart QR code menus, instant order dispatching, POS integration, customer feedback, and multi-location management.')
@section('meta_keywords', 'restaurant software, digital menu platform, QR ordering system, restaurant POS, food ordering system, ChowChak')

@section('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "SoftwareApplication",
      "name": "ChowChak",
      "operatingSystem": "Web, Android, iOS",
      "applicationCategory": "BusinessApplication",
      "description": "Complete Restaurant Management Software & Digital QR Code Menu Platform."
    },
    {
      "@type": "FAQPage",
      "@id": "https://chowchak.com/#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "How does ChowChak Digital QR Menu work?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Customers simply scan the QR code placed on their table using their smartphone camera. The interactive digital menu opens instantly without downloading any app, allowing guests to explore dishes, customize modifiers, and place orders directly to your kitchen."
          }
        },
        {
          "@type": "Question",
          "name": "Can customers order and pay directly from the QR menu?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes! Guests can browse real-time item availability, customize dishes, and place instant orders. Depending on your restaurant preference, customers can pay directly via digital payments (UPI, Cards) or settle at the counter/table."
          }
        },
        {
          "@type": "Question",
          "name": "Do I need expensive hardware or special tablets?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "No proprietary hardware is required. ChowChak works seamlessly on any existing smartphone, tablet, laptop, and connects directly to standard thermal receipt printers (USB, Bluetooth, Wi-Fi, Ethernet)."
          }
        },
        {
          "@type": "Question",
          "name": "How fast can I set up my restaurant menu and start?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "You can be up and running in under 30 minutes! Simply add your food categories and items, configure prices, and generate your custom branded QR code standees or stickers."
          }
        },
        {
          "@type": "Question",
          "name": "Can I manage multiple outlets from a single dashboard?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes! ChowChak includes multi-branch management. You can switch between outlets, track unified or branch-specific sales analytics, manage staff permissions, and update menus centrally."
          }
        }
      ]
    }
  ]
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
  background: var(--green); color: #fff; font-weight: 600; font-size: 14px;
  padding: 12px 24px; border-radius: 8px;
  transition: background-color .15s ease, border-color .15s ease;
  box-shadow: 0 1px 2px rgba(0,0,0,0.06);
  border: 1px solid rgba(0,0,0,0.08);
}
.btn-green:hover { background: #253D2C; }
.btn-orange {
  display: inline-flex; align-items: center; gap: 8px;
  background: var(--green); color: #fff; font-weight: 600; font-size: 14px;
  padding: 12px 24px; border-radius: 8px;
  transition: background-color .15s ease;
  box-shadow: 0 1px 2px rgba(0,0,0,0.06);
}
.btn-orange:hover { background: #253D2C; }
.btn-ghost {
  display: inline-flex; align-items: center; gap: 8px;
  color: var(--dark); font-weight: 600; font-size: 14px;
  border: 1px solid var(--border); padding: 12px 24px; border-radius: 8px;
  background: transparent;
  transition: background-color .15s ease, color .15s ease, border-color .15s ease;
}
.btn-ghost:hover { background: rgba(0,0,0,0.04); color: var(--green); }
html.dark .btn-ghost:hover { background: rgba(255,255,255,0.05); }

/* ── LAYOUT ── */
.wrap { max-width: 1180px; margin: 0 auto; padding: 0 24px; }
.wrap-sm { max-width: 760px; margin: 0 auto; padding: 0 24px; }
.wrap-md { max-width: 960px; margin: 0 auto; padding: 0 24px; }
.section { padding: 30px 0; background: var(--bg-main); }
.section-sm { padding: 18px 0; background: var(--bg-main); }
.section-alt { background: var(--bg-main); }
.tc { text-align: center; }

/* ── HEADER STANDARDIZATION (MATCHES .wrap 1180px) ── */
.menutiger-nav {
  padding-left: 0 !important;
  padding-right: 0 !important;
}
.menutiger-nav .header-inner-wrap,
.menutiger-nav > div {
  max-width: 1180px !important;
  width: 100% !important;
  margin-left: auto !important;
  margin-right: auto !important;
  padding-left: 24px !important;
  padding-right: 24px !important;
  box-sizing: border-box !important;
}
.mobile-header-nav {
  height: 60px !important;
  display: flex !important;
  align-items: center !important;
  padding-left: 0 !important;
  padding-right: 0 !important;
  background-color: #ffffff !important;
  border-bottom: 1px solid #e5e7eb !important;
}
html.dark .mobile-header-nav {
  background-color: #111827 !important;
  border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
}
.mobile-header-nav .header-inner-wrap,
.mobile-header-nav > div {
  max-width: 1180px !important;
  width: 100% !important;
  height: 100% !important;
  margin-left: auto !important;
  margin-right: auto !important;
  padding-left: 18px !important;
  padding-right: 18px !important;
  display: flex !important;
  align-items: center !important;
  justify-content: space-between !important;
  box-sizing: border-box !important;
}
.mobile-header-nav .logo-text,
.menutiger-nav .logo-text,
html.dark .mobile-header-nav .logo-text,
html.dark .menutiger-nav .logo-text {
  color: #2E6F40 !important;
  font-weight: 800 !important;
}
#theme-toggle-mobile,
#mobile-menu-toggle {
  width: 38px !important;
  height: 38px !important;
  border-radius: 10px !important;
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  border: 1px solid #e5e7eb !important;
  background: #f9fafb !important;
  color: #374151 !important;
  transition: all 0.2s ease !important;
}
#theme-toggle-mobile:hover,
#mobile-menu-toggle:hover {
  background: #f3f4f6 !important;
  border-color: #d1d5db !important;
}
html.dark #theme-toggle-mobile,
html.dark #mobile-menu-toggle {
  background: rgba(255, 255, 255, 0.06) !important;
  border-color: rgba(255, 255, 255, 0.12) !important;
  color: #f3f4f6 !important;
}
html.dark #theme-toggle-mobile:hover,
html.dark #mobile-menu-toggle:hover {
  background: rgba(255, 255, 255, 0.12) !important;
  border-color: rgba(255, 255, 255, 0.2) !important;
}

/* ── TYPOGRAPHY ── */
.label {
  display: inline-block; background: rgba(46,111,64,0.08); color: var(--green);
  font-size: 11px; font-weight: 500; letter-spacing: 0; text-transform: none;
  padding: 4px 12px; border-radius: 6px; margin-bottom: 8px;
  border: 1px solid rgba(46,111,64,0.18);
}
.h2 { font-size: 32px; font-weight: 600; line-height: 1.25; margin: 0 0 12px; color: var(--dark); }
.h2 em { font-style: normal; color: var(--green); }
.h2 .org { font-style: normal; color: var(--green); }
.lead { font-size: 15px; color: var(--gray); line-height: 1.65; margin: 0 0 16px; }

/* ═══════════════════════════════════════════
   1. HERO (MODERN SAAS POS TERMINAL REDESIGN)
═══════════════════════════════════════════ */
.hero {
  position: relative;
  background: var(--bg-main);
  padding: 36px 0 24px;
  overflow: hidden;
}
html.dark .hero { background: #0e1217; }

/* Ambient background aura */
.hero-glow-aura {
  position: absolute;
  top: -120px; right: 0;
  width: 650px; height: 650px;
  background: radial-gradient(circle, rgba(46, 111, 64, 0.15) 0%, rgba(46, 111, 64, 0.02) 55%, transparent 70%);
  pointer-events: none;
  filter: blur(50px);
  z-index: 0;
}
html.dark .hero-glow-aura {
  background: radial-gradient(circle, rgba(46, 111, 64, 0.25) 0%, rgba(46, 111, 64, 0.04) 55%, transparent 70%);
}

.hero-grid {
  display: grid;
  grid-template-columns: 1.05fr 1.15fr;
  gap: 48px;
  align-items: center;
  max-width: 1180px;
  margin: 0 auto;
  padding: 0 24px;
  position: relative;
  z-index: 1;
}

/* ── Hero Left Side ── */
.hero-live-pill {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(46, 111, 64, 0.08);
  border: 1px solid rgba(46, 111, 64, 0.22);
  padding: 5px 14px;
  border-radius: 24px;
  font-size: 12px;
  color: var(--green);
  font-weight: 500;
  margin-bottom: 14px;
  box-shadow: 0 2px 8px rgba(46, 111, 64, 0.04);
}
html.dark .hero-live-pill {
  background: rgba(46, 111, 64, 0.18);
  border-color: rgba(46, 111, 64, 0.35);
  color: #86efac;
}
.live-pulse-dot {
  position: relative;
  display: inline-flex;
  width: 7px; height: 7px;
  border-radius: 50%;
  background: #10b981;
}
.live-pulse-dot::after {
  content: '';
  position: absolute; inset: -3px;
  border-radius: 50%;
  background: rgba(16, 185, 129, 0.4);
  animation: pulsePing 2s cubic-bezier(0, 0, 0.2, 1) infinite;
}
@keyframes pulsePing {
  0% { transform: scale(0.9); opacity: 0.8; }
  100% { transform: scale(2.2); opacity: 0; }
}
.pill-sep { opacity: 0.4; }
.pill-badge-tag {
  background: var(--green);
  color: #fff;
  font-size: 10px;
  font-weight: 700;
  padding: 2px 7px;
  border-radius: 10px;
  letter-spacing: 0.3px;
}
html.dark .pill-badge-tag {
  background: #2E6F40;
}

.hero-headline {
  font-size: clamp(34px, 4vw, 46px);
  font-weight: 700;
  line-height: 1.15;
  color: var(--dark);
  margin: 0 0 12px;
  letter-spacing: -0.8px;
}
.hero-headline .text-brand {
  color: var(--green);
  position: relative;
}
.hero-subhead {
  font-size: 16px;
  color: var(--gray);
  line-height: 1.65;
  margin: 0 0 16px;
  max-width: 520px;
}
html.dark .hero-subhead { color: #9ca3af; }

.hero-cta-group {
  display: flex;
  align-items: center;
  gap: 14px;
  flex-wrap: wrap;
  margin-bottom: 16px;
}
.btn-hero-primary {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: var(--green);
  color: #ffffff;
  font-weight: 600;
  font-size: 14.5px;
  padding: 13px 26px;
  border-radius: 10px;
  box-shadow: 0 4px 14px rgba(46, 111, 64, 0.25), inset 0 1px 0 rgba(255,255,255,0.15);
  border: 1px solid rgba(46, 111, 64, 0.9);
  transition: all .2s ease;
  text-decoration: none;
}
.btn-hero-primary:hover {
  background: #253D2C;
  transform: translateY(-1px);
  box-shadow: 0 6px 20px rgba(46, 111, 64, 0.32);
  color: #ffffff;
}
.btn-hero-secondary {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: var(--card);
  color: var(--dark);
  font-weight: 600;
  font-size: 14px;
  padding: 12px 22px;
  border-radius: 10px;
  border: 1px solid var(--border);
  box-shadow: 0 1px 3px rgba(0,0,0,0.04);
  transition: all .2s ease;
  text-decoration: none;
}
.btn-hero-secondary:hover {
  border-color: rgba(46, 111, 64, 0.4);
  background: rgba(46, 111, 64, 0.04);
  color: var(--green);
  transform: translateY(-1px);
}
html.dark .btn-hero-secondary {
  background: #19191b;
  border-color: rgba(255,255,255,0.1);
}
.play-icon-circle {
  width: 22px; height: 22px;
  border-radius: 50%;
  background: rgba(46, 111, 64, 0.12);
  display: flex; align-items: center; justify-content: center;
  color: var(--green);
}

.hero-trust-checks {
  display: flex;
  align-items: center;
  gap: 20px;
  flex-wrap: wrap;
  font-size: 12.5px;
  color: var(--gray);
  margin-bottom: 18px;
}
.hero-trust-checks span {
  display: inline-flex;
  align-items: center;
  gap: 6px;
}
html.dark .hero-trust-checks { color: #9ca3af; }

.hero-metrics-strip {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 12px;
  padding-top: 20px;
  border-top: 1px solid var(--border);
}
.metric-card { text-align: left; }
.metric-val {
  font-size: 22px;
  font-weight: 700;
  color: var(--green);
  line-height: 1.1;
  font-variant-numeric: tabular-nums;
}
.metric-lbl {
  font-size: 11px;
  color: var(--gray);
  margin-top: 4px;
  font-weight: 500;
}
html.dark .metric-lbl { color: #9ca3af; }

/* ── Hero Right Side (SaaS Window Mockup & Live Cards) ── */
.hero-mockup-wrapper {
  position: relative;
  padding: 18px 8px;
}

.pos-window-frame {
  background: var(--card);
  border: 1px solid rgba(0,0,0,0.1);
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12), 0 4px 16px rgba(0, 0, 0, 0.05);
  transition: transform .3s ease;
  animation: floatWindow 6s ease-in-out infinite;
}
html.dark .pos-window-frame {
  background: #171c24;
  border-color: rgba(255,255,255,0.12);
  box-shadow: 0 24px 70px rgba(0, 0, 0, 0.45);
}
@keyframes floatWindow {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-6px); }
}

.pos-window-bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 16px;
  background: rgba(0,0,0,0.03);
  border-bottom: 1px solid var(--border);
  font-size: 11.5px;
}
html.dark .pos-window-bar {
  background: rgba(255,255,255,0.03);
  border-color: rgba(255,255,255,0.08);
}
.window-controls {
  display: flex;
  align-items: center;
  gap: 6px;
}
.control-dot {
  width: 9px; height: 9px;
  border-radius: 50%;
}
.dot-red { background: #ef4444; }
.dot-yellow { background: #f59e0b; }
.dot-green { background: #10b981; }

.window-title {
  display: flex;
  align-items: center;
  gap: 6px;
  font-weight: 500;
  color: var(--gray);
}
html.dark .window-title { color: #9ca3af; }

.window-status {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 11px;
  font-weight: 600;
  color: var(--green);
}
.status-pulse-dot {
  width: 6px; height: 6px;
  border-radius: 50%;
  background: #10b981;
}

.pos-window-body {
  position: relative;
  background: #000;
  overflow: hidden;
}
.pos-screen-img {
  width: 100%;
  display: block;
  object-fit: cover;
  min-height: 280px;
  max-height: 420px;
}

/* ── Operational Floating Card 1: Live KOT Ticket ── */
.live-kot-card {
  position: absolute;
  left: -20px;
  bottom: 24px;
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(0,0,0,0.1);
  border-radius: 14px;
  padding: 14px 18px;
  width: 250px;
  box-shadow: 0 12px 36px rgba(0,0,0,0.12);
  z-index: 10;
  animation: floatCard1 4s ease-in-out infinite;
}
html.dark .live-kot-card {
  background: rgba(23, 28, 36, 0.94);
  border-color: rgba(255,255,255,0.14);
  box-shadow: 0 16px 42px rgba(0,0,0,0.5);
}
@keyframes floatCard1 {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-8px); }
}

.kot-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 10px;
  padding-bottom: 8px;
  border-bottom: 1px dashed var(--border);
}
.kot-badge {
  display: flex;
  align-items: center;
  gap: 8px;
}
.kot-icon {
  width: 28px; height: 28px;
  border-radius: 6px;
  background: rgba(46,111,64,0.1);
  display: flex; align-items: center; justify-content: center;
  font-size: 14px;
}
.kot-id {
  font-size: 12px;
  font-weight: 700;
  color: var(--dark);
}
.kot-time {
  font-size: 10px;
  color: var(--green);
  font-weight: 600;
}
.kot-status-pill {
  font-size: 9px;
  font-weight: 700;
  padding: 2px 6px;
  border-radius: 4px;
  background: #dcfce7;
  color: #166534;
}
html.dark .kot-status-pill {
  background: #14532d;
  color: #86efac;
}

.kot-items {
  font-size: 11px;
  color: var(--gray);
  margin-bottom: 10px;
}
.kot-item-row {
  display: flex;
  justify-content: space-between;
  padding: 2px 0;
}
.item-price {
  font-weight: 600;
  color: var(--dark);
}

.kot-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 11.5px;
  padding-top: 6px;
  border-top: 1px solid var(--border);
  color: var(--dark);
}
.kot-tag {
  font-size: 10px;
  color: var(--gray);
  background: rgba(0,0,0,0.04);
  padding: 2px 6px;
  border-radius: 4px;
}
html.dark .kot-tag { background: rgba(255,255,255,0.06); color: #9ca3af; }

/* ── Operational Floating Card 2: Speed & Floor Status ── */
.live-speed-card {
  position: absolute;
  right: -10px;
  top: 36px;
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(0,0,0,0.1);
  border-radius: 12px;
  padding: 10px 16px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.12);
  display: flex;
  align-items: center;
  gap: 10px;
  z-index: 10;
  animation: floatCard2 4.5s 1s ease-in-out infinite;
}
html.dark .live-speed-card {
  background: rgba(23, 28, 36, 0.94);
  border-color: rgba(255,255,255,0.14);
  box-shadow: 0 16px 40px rgba(0,0,0,0.5);
}
@keyframes floatCard2 {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-7px); }
}

.speed-icon-box {
  width: 32px; height: 32px;
  border-radius: 8px;
  background: rgba(46, 111, 64, 0.12);
  display: flex; align-items: center; justify-content: center;
  color: var(--green);
}
.speed-title {
  font-size: 12px;
  font-weight: 700;
  color: var(--dark);
}
.speed-sub {
  font-size: 10.5px;
  color: var(--green);
  font-weight: 600;
}

/* ── Responsive Hero Styles ── */
@media (max-width: 960px) {
  .hero-grid {
    grid-template-columns: 1fr;
    gap: 40px;
    text-align: center;
  }
  .hero-headline {
    font-size: 32px;
  }
  .hero-subhead {
    margin-left: auto;
    margin-right: auto;
  }
  .hero-cta-group, .hero-trust-checks {
    justify-content: center;
  }
  .hero-metrics-strip {
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
    text-align: center;
  }
  .metric-card { text-align: center; }
  .live-kot-card {
    left: 8px;
    bottom: -10px;
  }
  .live-speed-card {
    right: 8px;
    top: 10px;
  }
}
@media (max-width: 540px) {
  .hero { padding: 24px 0 18px; }
  .hero-headline { font-size: 27px; }
  .live-kot-card { width: calc(100% - 32px); left: 16px; bottom: 8px; }
  .live-speed-card { display: none; }
}

/* ═══════════════════════════════════════════
   2. BRANDS
═══════════════════════════════════════════ */
.brands-wrap { background: var(--bg-main); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); padding: 12px 24px; }
.brands-title { font-size: 12px; font-weight: 500; color: var(--gray); text-align: center; margin-bottom: 12px; text-transform: none; }
.brands-logos { display: flex; justify-content: center; align-items: center; gap: 40px; flex-wrap: wrap; }
.brand-name { font-weight: 600; font-size: 15px; color: #aaa; letter-spacing: 0; transition: color .15s ease; }
html.dark .brand-name { color: #525252; }
.brand-name:hover { color: var(--green); }

/* ═══════════════════════════════════════════
   3. STATS BAR
═══════════════════════════════════════════ */
.stats-outer { padding: 16px 24px; background: var(--bg-main); }
.stats-bar {
  max-width: 860px; margin: 0 auto;
  background: #253D2C;
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: 14px; padding: 24px 32px;
  display: flex; justify-content: space-around; align-items: center;
  box-shadow: 0 4px 20px rgba(0,0,0,0.06);
  position: relative; overflow: hidden;
}
.stats-bar::before {
  display: none;
}
.stat-block { text-align: center; color: #fff; }
.stat-num { font-size: 36px; font-weight: 600; line-height: 1; font-variant-numeric: tabular-nums; }
.stat-lbl { font-size: 11px; font-weight: 400; margin-top: 6px; opacity: .85; text-transform: none; }
.stat-div { width: 1px; height: 48px; background: rgba(255,255,255,0.15); }

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
.reviews-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 16px; margin-bottom: 8px; }
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
  padding: 40px 24px 32px;
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
  margin-bottom: 32px;
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
  <!-- Subtle ambient glow aura behind mockup -->
  <div class="hero-glow-aura"></div>

  <div class="hero-grid">
    <!-- Left Column: Content & Positioning -->
    <div>
      <div class="hero-live-pill">
        <span class="live-pulse-dot"></span>
        <span>Complete Restaurant Operating System</span>
        <span class="pill-sep">•</span>
        <span class="pill-badge-tag">v2.4 Live</span>
      </div>

      <h1 class="hero-headline">
        All-in-One <span class="text-brand">POS, QR Menu</span> &amp; Kitchen KOT Platform
      </h1>

      <p class="hero-subhead">
        Streamline tabletop QR ordering, fire thermal kitchen tickets in under 2 seconds, and control multi-outlet sales billing in real-time. Zero proprietary hardware required.
      </p>

      <div class="hero-cta-group">
        <a href="{{ route('restaurant_signup') }}" class="btn-hero-primary">
          <span>Get started for free</span>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
        <a href="https://www.youtube.com" target="_blank" rel="noopener noreferrer" class="btn-hero-secondary">
          <div class="play-icon-circle">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
          </div>
          <span>Watch 2-min demo</span>
        </a>
      </div>

      <div class="hero-trust-checks">
        <span>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#2E6F40" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          No credit card required
        </span>
        <span>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#2E6F40" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          15-minute quick setup
        </span>
        <span>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#2E6F40" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          Works on any device
        </span>
      </div>

      <div class="hero-metrics-strip">
        <div class="metric-card">
          <div class="metric-val">50+</div>
          <div class="metric-lbl">Active Outlets</div>
        </div>
        <div class="metric-card">
          <div class="metric-val">15K+</div>
          <div class="metric-lbl">Monthly Orders</div>
        </div>
        <div class="metric-card">
          <div class="metric-val">&lt; 2s</div>
          <div class="metric-lbl">Kitchen KOT Speed</div>
        </div>
        <div class="metric-card">
          <div class="metric-val">99.9%</div>
          <div class="metric-lbl">System Uptime</div>
        </div>
      </div>
    </div>

    <!-- Right Column: Sleek SaaS Window + Live Operational Cards -->
    <div class="hero-mockup-wrapper">
      <div class="pos-window-frame">
        <div class="pos-window-bar">
          <div class="window-controls">
            <span class="control-dot dot-red"></span>
            <span class="control-dot dot-yellow"></span>
            <span class="control-dot dot-green"></span>
          </div>
          <div class="window-title">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="14" x="2" y="3" rx="2"/><line x1="8" x2="16" y1="21" y2="21"/><line x1="12" x2="12" y1="17" y2="21"/></svg>
            ChowChak POS Terminal • Floor 1
          </div>
          <div class="window-status">
            <span class="status-pulse-dot"></span>
            <span>Online</span>
          </div>
        </div>

        <div class="pos-window-body">
          <img class="pos-screen-img"
               src="{{ $frontDetails->image_url ?? asset('landing/dashboard.png') }}"
               alt="ChowChak Restaurant POS Terminal">
        </div>
      </div>

      <!-- Live Floating Operational Card 1: Live Kitchen Order (KOT) -->
      <div class="live-kot-card">
        <div class="kot-header">
          <div class="kot-badge">
            <span class="kot-icon">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2E6F40" stroke-width="2"><path d="M18 8h1a4 4 0 0 1 0 8h-1M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>
            </span>
            <div>
              <div class="kot-id">KOT #1048 • Table 04</div>
              <div class="kot-time">Dispatched 45s ago</div>
            </div>
          </div>
          <span class="kot-status-pill">PRINTED ✓</span>
        </div>
        <div class="kot-items">
          <div class="kot-item-row"><span>2x Paneer Butter Masala</span><span class="item-price">₹520</span></div>
          <div class="kot-item-row"><span>4x Butter Garlic Naan</span><span class="item-price">₹240</span></div>
          <div class="kot-item-row"><span>1x Fresh Lime Soda</span><span class="item-price">₹80</span></div>
        </div>
        <div class="kot-footer">
          <span>Total: <strong>₹840</strong></span>
          <span class="kot-tag">Dine-in Order</span>
        </div>
      </div>

      <!-- Live Floating Operational Card 2: Speed & Floor Status -->
      <div class="live-speed-card">
        <div class="speed-icon-box">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
        </div>
        <div>
          <div class="speed-title">14 / 18 Tables Serving</div>
          <div class="speed-sub">Avg Turnover: 18m (-32% wait)</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ 2. OPERATIONAL WALKTHROUGH & VIDEO ═══════════ --}}
<style>
/* ──────────────────────────────────────────────────────────
   WALKTHROUGH & VIDEO SECTION STYLES
   ────────────────────────────────────────────────────────── */
.walkthrough-section {
  padding: 30px 0;
  background: var(--bg-main, #ffffff);
}
html.dark .walkthrough-section {
  background: #121814;
}

.section-head {
  margin-bottom: 18px;
}
.section-kicker {
  display: inline-block;
  padding: 4px 12px;
  background: rgba(46,111,64,0.08);
  color: #2E6F40;
  font-size: 11px;
  font-weight: 600;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  border-radius: 999px;
  border: 1px solid rgba(46,111,64,0.22);
  margin-bottom: 8px;
}
html.dark .section-kicker {
  background: rgba(104,186,127,0.12);
  color: #68BA7F;
  border-color: rgba(104,186,127,0.28);
}

.walkthrough-terminal {
  max-width: 1180px;
  margin: 0 auto 36px;
  background: #0f172a;
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: 14px;
  box-shadow: 0 16px 40px -8px rgba(0,0,0,0.24);
  overflow: hidden;
}
html.dark .walkthrough-terminal {
  border-color: rgba(255,255,255,0.14);
  box-shadow: 0 20px 48px -10px rgba(0,0,0,0.5);
}

.walkthrough-topbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 18px;
  background: #1e293b;
  border-bottom: 1px solid rgba(255,255,255,0.08);
  font-size: 12px;
  color: #94a3b8;
}
.wt-left {
  display: flex;
  align-items: center;
  gap: 12px;
}
.wt-dots {
  display: flex;
  gap: 6px;
}
.wt-dot {
  width: 10px;
  height: 10px;
  border-radius: 50%;
}
.wt-dot.red { background: #ef4444; }
.wt-dot.yellow { background: #f59e0b; }
.wt-dot.green { background: #10b981; }

.wt-title {
  font-weight: 500;
  color: #cbd5e1;
  font-size: 12px;
}
.wt-tabs {
  display: flex;
  gap: 6px;
}
.wt-tab {
  padding: 4px 10px;
  border-radius: 6px;
  background: rgba(255,255,255,0.04);
  color: #94a3b8;
  font-size: 11px;
  font-weight: 500;
  border: 1px solid transparent;
}
.wt-tab.active {
  background: rgba(46,111,64,0.25);
  color: #68BA7F;
  border-color: rgba(46,111,64,0.5);
}
.wt-status {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 11px;
  color: #10b981;
}
.wt-pulse {
  width: 6px;
  height: 6px;
  background: #10b981;
  border-radius: 50%;
  box-shadow: 0 0 8px #10b981;
}

.walkthrough-screen {
  position: relative;
  display: block;
  text-decoration: none;
  background: #090d16;
  aspect-ratio: 16/9;
  max-height: 520px;
  overflow: hidden;
  cursor: pointer;
}
.walkthrough-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.35s ease, filter 0.35s ease;
}
.walkthrough-screen:hover .walkthrough-img {
  transform: scale(1.015);
  filter: brightness(0.92);
}
.walkthrough-scrim {
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, rgba(15,23,42,0.1) 0%, rgba(15,23,42,0.7) 100%);
  pointer-events: none;
}

.walkthrough-play-center {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 14px;
  z-index: 5;
  text-align: center;
}
.walkthrough-play-btn {
  width: 64px;
  height: 64px;
  border-radius: 50%;
  background: #ffffff;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 8px 24px rgba(0,0,0,0.3);
  transition: transform 0.2s ease, background 0.2s ease;
}
.walkthrough-screen:hover .walkthrough-play-btn {
  transform: scale(1.08);
  background: #f0fdf4;
}
.walkthrough-play-btn svg {
  margin-left: 3px;
  transition: transform 0.2s ease;
}
.walkthrough-play-text strong {
  display: block;
  font-size: 15px;
  font-weight: 600;
  color: #ffffff;
  text-shadow: 0 1px 4px rgba(0,0,0,0.6);
}
.walkthrough-play-text span {
  font-size: 12px;
  color: rgba(255,255,255,0.85);
  text-shadow: 0 1px 3px rgba(0,0,0,0.6);
}

.walkthrough-statusbar {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 12px 20px;
  background: rgba(15,23,42,0.88);
  backdrop-filter: blur(8px);
  border-top: 1px solid rgba(255,255,255,0.08);
  display: flex;
  justify-content: space-between;
  align-items: center;
  z-index: 4;
  color: #e2e8f0;
  font-size: 12.5px;
}
.wt-step-indicator {
  display: flex;
  align-items: center;
  gap: 8px;
}
.wt-step-dot {
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #10b981;
}
.wt-video-badge {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 12px;
  color: #94a3b8;
  font-variant-numeric: tabular-nums;
  background: rgba(255,255,255,0.06);
  padding: 4px 10px;
  border-radius: 4px;
}

.walkthrough-pillars {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  max-width: 1180px;
  margin: 0 auto;
}
.wt-pillar {
  background: var(--card-bg, #ffffff);
  border: 1px solid var(--border, #e5e7eb);
  border-radius: 12px;
  padding: 22px 20px;
  display: flex;
  gap: 16px;
  align-items: flex-start;
  box-shadow: 0 1px 3px rgba(0,0,0,0.04);
}
html.dark .wt-pillar {
  background: #18221c;
  border-color: rgba(255,255,255,0.08);
}
.wt-pillar-num {
  font-size: 20px;
  font-weight: 700;
  color: #2E6F40;
  line-height: 1;
  font-variant-numeric: tabular-nums;
  padding-top: 2px;
}
html.dark .wt-pillar-num {
  color: #68BA7F;
}
.wt-pillar-content h4 {
  font-size: 14.5px;
  font-weight: 600;
  color: var(--text-main, #111827);
  margin: 0 0 6px;
}
html.dark .wt-pillar-content h4 {
  color: #f1f5f9;
}
.wt-pillar-content p {
  font-size: 13px;
  line-height: 1.55;
  color: var(--gray, #4b5563);
  margin: 0;
}
html.dark .wt-pillar-content p {
  color: #94a3b8;
}

/* ──────────────────────────────────────────────────────────
   CLEAN MINIMAL FEATURES GRID (STRIPE STYLE)
   ────────────────────────────────────────────────────────── */
.stripe-features-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
  max-width: 1180px;
  margin: 0 auto 36px;
}
.stripe-card {
  background: var(--card-bg, #ffffff);
  border: 1px solid var(--border, #e5e7eb);
  border-radius: 14px;
  padding: 30px 26px;
  display: flex;
  flex-direction: column;
  transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
  box-shadow: 0 1px 3px rgba(0,0,0,0.03);
}
html.dark .stripe-card {
  background: #18221c;
  border-color: rgba(255,255,255,0.08);
}
.stripe-card:hover {
  border-color: rgba(46,111,64,0.35);
  box-shadow: 0 6px 20px rgba(0,0,0,0.06);
  transform: translateY(-2px);
}
.stripe-icon-box {
  width: 44px;
  height: 44px;
  border-radius: 10px;
  background: rgba(46,111,64,0.08);
  border: 1px solid rgba(46,111,64,0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  color: #2E6F40;
  margin-bottom: 20px;
  flex-shrink: 0;
}
html.dark .stripe-icon-box {
  background: rgba(104,186,127,0.12);
  border-color: rgba(104,186,127,0.28);
  color: #68BA7F;
}
.stripe-card-title {
  font-size: 16px;
  font-weight: 600;
  color: var(--text-main, #111827);
  margin: 0 0 10px;
  letter-spacing: -0.2px;
  line-height: 1.35;
}
html.dark .stripe-card-title {
  color: #f1f5f9;
}
.stripe-card-desc {
  font-size: 13.5px;
  line-height: 1.6;
  color: var(--gray, #4b5563);
  margin: 0 0 20px;
  flex-grow: 1;
}
html.dark .stripe-card-desc {
  color: #94a3b8;
}
.stripe-card-meta {
  display: flex;
  align-items: center;
  gap: 7px;
  font-size: 12px;
  font-weight: 500;
  color: #2E6F40;
  padding-top: 14px;
  border-top: 1px solid var(--border, #f1f5f9);
}
html.dark .stripe-card-meta {
  color: #68BA7F;
  border-top-color: rgba(255,255,255,0.06);
}

.stripe-capabilities-strip {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  justify-content: center;
  max-width: 960px;
  margin: 0 auto;
}
.stripe-cap-pill {
  font-size: 12px;
  font-weight: 500;
  color: var(--text-main, #334155);
  background: var(--card-bg, #ffffff);
  border: 1px solid var(--border, #e2e8f0);
  border-radius: 999px;
  padding: 6px 14px;
}
html.dark .stripe-cap-pill {
  background: #18221c;
  color: #cbd5e1;
  border-color: rgba(255,255,255,0.08);
}

.btn-features-explore {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: #2E6F40;
  color: #ffffff;
  font-size: 13.5px;
  font-weight: 600;
  padding: 12px 24px;
  border-radius: 8px;
  text-decoration: none;
  transition: background-color 0.15s ease, transform 0.15s ease;
}
.btn-features-explore:hover {
  background: #253D2C;
  transform: translateY(-1px);
}

/* Responsive Rules */
@media (max-width: 992px) {
  .stripe-features-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
  }
}
@media (max-width: 960px) {
  .walkthrough-pillars {
    grid-template-columns: 1fr;
    gap: 12px;
  }
}
@media (max-width: 640px) {
  .stripe-features-grid {
    grid-template-columns: 1fr;
    gap: 14px;
  }
  .walkthrough-topbar {
    flex-direction: column;
    align-items: flex-start;
    gap: 8px;
  }
  .wt-tabs {
    display: none;
  }
  .walkthrough-statusbar {
    flex-direction: column;
    align-items: flex-start;
    gap: 6px;
  }
}
</style>

<section class="section walkthrough-section">
  <div class="wrap">
    <div class="section-head tc">
      <span class="section-kicker">Operational Walkthrough</span>
      <h2 class="h2">Free menu maker and restaurant<br>management system</h2>
      <p class="lead" style="max-width: 620px; margin: 0 auto 18px;">
        Build digital menus, route tabletop QR orders to thermal printers, and settle bills in real-time — with zero commission or hardware lock-in.
      </p>
    </div>

    <!-- Interactive Terminal Frame -->
    <div class="walkthrough-terminal">
      <div class="walkthrough-topbar">
        <div class="wt-left">
          <div class="wt-dots">
            <span class="wt-dot red"></span>
            <span class="wt-dot yellow"></span>
            <span class="wt-dot green"></span>
          </div>
          <span class="wt-title">ChowChak POS &bull; Main Terminal (Live Dining Floor)</span>
        </div>
        <div class="wt-tabs">
          <span class="wt-tab active">Table Layout &amp; POS</span>
          <span class="wt-tab">Kitchen KDS</span>
          <span class="wt-tab">QR Menu Builder</span>
        </div>
        <div class="wt-status">
          <span class="wt-pulse"></span>
          <span>Sync Active &bull; &lt; 20ms</span>
        </div>
      </div>

      <!-- Video Card Preview with Play Trigger -->
      <a href="https://www.youtube.com" target="_blank" rel="noopener noreferrer" class="walkthrough-screen" title="Watch on YouTube">
        <img src="{{ $frontDetails->video_thumbnail_url ?? asset('landing/dashboard.png') }}"
             alt="ChowChak Restaurant OS Walkthrough" class="walkthrough-img">
        <div class="walkthrough-scrim"></div>
        
        <!-- Center Play Button -->
        <div class="walkthrough-play-center">
          <div class="walkthrough-play-btn">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="#2E6F40"><polygon points="6 3 20 12 6 21 6 3"></polygon></svg>
          </div>
          <div class="walkthrough-play-text">
            <strong>Watch 2-Min Interactive Tour</strong>
            <span>HD Walkthrough &bull; Real restaurant order flow</span>
          </div>
        </div>

        <!-- Glass Status Bar -->
        <div class="walkthrough-statusbar">
          <div class="wt-step-indicator">
            <span class="wt-step-dot"></span>
            <span>Live workflow: Guest scans Table 04 &rarr; Order #1048 placed &rarr; Kitchen KOT printed in 1.8s</span>
          </div>
          <div class="wt-video-badge">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg>
            <span>02:14</span>
          </div>
        </div>
      </a>
    </div>

    <!-- 3 Core Operational Pillars -->
    <div class="walkthrough-pillars">
      <div class="wt-pillar">
        <div class="wt-pillar-num">01</div>
        <div class="wt-pillar-content">
          <h4>Zero-Cost Menu Maker</h4>
          <p>Create visual digital menus with modifier groups (spice levels, add-on cheeses), dietary flags (Veg/Non-Veg), and printable tabletop QR standees in minutes.</p>
        </div>
      </div>
      <div class="wt-pillar">
        <div class="wt-pillar-num">02</div>
        <div class="wt-pillar-content">
          <h4>Instant Thermal KOT Dispatch</h4>
          <p>Orders route directly to 58mm/80mm USB, LAN, and Bluetooth printers with custom station routing. Zero waiter bottlenecks during rush hours.</p>
        </div>
      </div>
      <div class="wt-pillar">
        <div class="wt-pillar-num">03</div>
        <div class="wt-pillar-content">
          <h4>Runs on Existing Hardware</h4>
          <p>Operate from any Android tablet, iPad, Windows desktop, or smartphone browser. No proprietary &#8377;40,000 terminal leases or locked ecosystem.</p>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ 3. KITCHEN & OPERATIONS CORE CAPABILITIES ═══════════ --}}
<section class="section section-alt" id="features">
  <div class="wrap">
    <div class="section-head tc">
      <span class="section-kicker">Core Capabilities</span>
      <h2 class="h2">Everything you need to keep your kitchen organized</h2>
      <p class="lead" style="max-width: 620px; margin: 0 auto 18px;">
        A complete, reliable operating system designed to speed up table turns, eliminate ticket confusion, and keep cash drawers balanced.
      </p>
    </div>

    <div class="stripe-features-grid">

      <!-- Card 1: Automated KOT Routing -->
      <div class="stripe-card">
        <div class="stripe-icon-box">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="6 9 6 2 18 2 18 9"></polyline>
            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
            <rect x="6" y="14" width="12" height="8"></rect>
          </svg>
        </div>
        <h3 class="stripe-card-title">Automated KOT Routing</h3>
        <p class="stripe-card-desc">Separate bar orders, tandoor starters, and hot curries automatically. Thermal kitchen printers fire tickets in under 2 seconds without waiter intervention.</p>
        <div class="stripe-card-meta">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          <span>Supports USB, LAN &amp; Bluetooth ESC/POS</span>
        </div>
      </div>

      <!-- Card 2: Real-Time Table Tracking -->
      <div class="stripe-card">
        <div class="stripe-icon-box">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="3" width="18" height="18" rx="2"></rect>
            <path d="M3 9h18"></path>
            <path d="M9 21V9"></path>
          </svg>
        </div>
        <h3 class="stripe-card-title">Real-Time Table Tracking</h3>
        <p class="stripe-card-desc">Track table occupancy, elapsed dining duration, and open checks at a glance. Merge tables for banquets, transfer items between seats, and turn tables 30% faster.</p>
        <div class="stripe-card-meta">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          <span>Visual dining room floor map</span>
        </div>
      </div>

      <!-- Card 3: One-Click 86-Item Control -->
      <div class="stripe-card">
        <div class="stripe-icon-box">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <line x1="4" y1="21" x2="4" y2="14"></line>
            <line x1="4" y1="10" x2="4" y2="3"></line>
            <line x1="12" y1="21" x2="12" y2="12"></line>
            <line x1="12" y1="8" x2="12" y2="3"></line>
            <line x1="20" y1="21" x2="20" y2="16"></line>
            <line x1="20" y1="12" x2="20" y2="3"></line>
            <line x1="1" y1="14" x2="7" y2="14"></line>
            <line x1="9" y1="8" x2="15" y2="8"></line>
            <line x1="17" y1="16" x2="23" y2="16"></line>
          </svg>
        </div>
        <h3 class="stripe-card-title">One-Click 86-Item Control</h3>
        <p class="stripe-card-desc">Ran out of raw ingredients during peak service? Mark dishes unavailable in one tap. The change immediately updates all customer QR menus and staff tablets in real-time.</p>
        <div class="stripe-card-meta">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          <span>&lt; 1 second cross-device sync</span>
        </div>
      </div>

      <!-- Card 4: Split Checks & Quick Billing -->
      <div class="stripe-card">
        <div class="stripe-icon-box">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <rect x="2" y="5" width="20" height="14" rx="2"></rect>
            <line x1="2" y1="10" x2="22" y2="10"></line>
          </svg>
        </div>
        <h3 class="stripe-card-title">Split Checks &amp; Quick Billing</h3>
        <p class="stripe-card-desc">Split bills equally, by seat, or itemized by guest request. Generate dynamic table-side UPI QR codes, take card payments, and settle checks in seconds with zero manual math.</p>
        <div class="stripe-card-meta">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          <span>Dynamic UPI QR &amp; card terminal sync</span>
        </div>
      </div>

      <!-- Card 5: Automated Z-Reports & Cash Audit -->
      <div class="stripe-card">
        <div class="stripe-icon-box">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
            <path d="m9 12 2 2 4-4"></path>
          </svg>
        </div>
        <h3 class="stripe-card-title">Automated Z-Reports &amp; Cash Audit</h3>
        <p class="stripe-card-desc">Reconcile cashier shifts with automated end-of-day reports. Match physical cash drawer amounts against UPI settlements and card totals with zero variance.</p>
        <div class="stripe-card-meta">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          <span>Automated cash discrepancy audit</span>
        </div>
      </div>

      <!-- Card 6: Offline Billing Continuity -->
      <div class="stripe-card">
        <div class="stripe-icon-box">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
          </svg>
        </div>
        <h3 class="stripe-card-title">Offline Billing Continuity</h3>
        <p class="stripe-card-desc">Never halt floor service during internet outages. ChowChak operates offline with local caching, automatically syncing all orders and bills as soon as connectivity resumes.</p>
        <div class="stripe-card-meta">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          <span>100% offline service resilience</span>
        </div>
      </div>

    </div>

    <!-- Capabilities Chip Strip -->
    <div class="stripe-capabilities-strip">
      <div class="stripe-cap-pill">Multi-Terminal Floor Sync</div>
      <div class="stripe-cap-pill">Custom GST (5% &bull; 18%) &amp; Service Charge</div>
      <div class="stripe-cap-pill">Staff Role PIN Permissions</div>
      <div class="stripe-cap-pill">Raw Material Recipe Tracking</div>
      <div class="stripe-cap-pill">Kitchen Display Screen (KDS) Mode</div>
      <div class="stripe-cap-pill">Daily WhatsApp Sales Summary</div>
    </div>

    <!-- Clean Bottom Action Button -->
    <div class="tc" style="margin-top: 32px;">
      <a href="/features" class="btn-features-explore">
        <span>Explore all restaurant management features</span>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>

  </div>
</section>

{{-- ═══════════ 7. WHY OPERATORS LOVE US ═══════════ --}}
<style>
/* ──────────────────────────────────────────────────────────
   OPERATIONAL ROI & PHOTOGRAPHY CARDS STYLES
   ────────────────────────────────────────────────────────── */
.operator-love-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
  max-width: 1180px;
  margin: 0 auto;
}
.operator-card {
  background: var(--card-bg, #ffffff);
  border: 1px solid var(--border, #e5e7eb);
  border-radius: 16px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  transition: border-color 0.25s ease, box-shadow 0.25s ease, transform 0.25s ease;
  box-shadow: 0 1px 4px rgba(0,0,0,0.04);
}
html.dark .operator-card {
  background: #18221c;
  border-color: rgba(255,255,255,0.08);
}
.operator-card:hover {
  border-color: rgba(46,111,64,0.4);
  box-shadow: 0 12px 28px rgba(0,0,0,0.08);
  transform: translateY(-4px);
}

.operator-img-box {
  height: 200px;
  position: relative;
  overflow: hidden;
  background: #f1f5f9;
}
.operator-img-box img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.4s ease;
}
.operator-card:hover .operator-img-box img {
  transform: scale(1.05);
}

/* Floating Glass Tag & Metric Badge */
.operator-tag-glass {
  position: absolute;
  top: 12px;
  left: 12px;
  background: rgba(15, 23, 42, 0.78);
  backdrop-filter: blur(8px);
  color: #ffffff;
  font-size: 11px;
  font-weight: 600;
  padding: 4px 10px;
  border-radius: 6px;
  letter-spacing: 0.2px;
  border: 1px solid rgba(255,255,255,0.12);
  z-index: 2;
}
.operator-metric-badge {
  position: absolute;
  top: 12px;
  right: 12px;
  background: #2E6F40;
  color: #ffffff;
  font-size: 11px;
  font-weight: 700;
  padding: 4px 10px;
  border-radius: 6px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.25);
  font-variant-numeric: tabular-nums;
  z-index: 2;
}

.operator-card-body {
  padding: 22px 20px;
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}
.operator-card-title {
  font-size: 16px;
  font-weight: 600;
  color: var(--text-main, #111827);
  margin: 0 0 8px;
  line-height: 1.35;
}
html.dark .operator-card-title {
  color: #f1f5f9;
}
.operator-card-desc {
  font-size: 13px;
  line-height: 1.6;
  color: var(--gray, #4b5563);
  margin: 0;
  flex-grow: 1;
}
html.dark .operator-card-desc {
  color: #94a3b8;
}

@media (max-width: 992px) {
  .operator-love-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
  }
}
@media (max-width: 640px) {
  .operator-love-grid {
    grid-template-columns: 1fr;
    gap: 16px;
  }
  .operator-img-box {
    height: 180px;
  }
}
</style>

<section class="section">
  <div class="wrap">
    <div class="section-head tc">
      <span class="section-kicker">Operational ROI</span>
      <h2 class="h2">Why restaurant operators love<br>using our digital menu</h2>
      <p class="lead" style="max-width: 620px; margin: 0 auto 40px;">
        Real, measurable business outcomes from busy dining rooms and cafes operating on ChowChak.
      </p>
    </div>

    <div class="operator-love-grid">
      <!-- Card 1 -->
      <div class="operator-card">
        <div class="operator-img-box">
          <span class="operator-tag-glass">Table Turnover</span>
          <span class="operator-metric-badge">-30% Wait Time</span>
          <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600&q=80" alt="Guests seated dining in restaurant" loading="lazy">
        </div>
        <div class="operator-card-body">
          <h3 class="operator-card-title">Instant seating-to-ordering flow</h3>
          <p class="operator-card-desc">Guests scan and submit orders within 90 seconds of seating. Faster order-to-kitchen speed lets your floor serve 1.4x more dining parties during peak dinner rush.</p>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="operator-card">
        <div class="operator-img-box">
          <span class="operator-tag-glass">Average Order Value</span>
          <span class="operator-metric-badge">+22% Avg Ticket</span>
          <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=600&q=80" alt="Delicious visual restaurant dishes" loading="lazy">
        </div>
        <div class="operator-card-body">
          <h3 class="operator-card-title">Visual menus with photo upselling</h3>
          <p class="operator-card-desc">Guests order more appetizers, specialty drinks, and desserts when they can browse dish photos and customize add-ons at their own pace without waiter pressure.</p>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="operator-card">
        <div class="operator-img-box">
          <span class="operator-tag-glass">Kitchen Dispatch</span>
          <span class="operator-metric-badge">99.4% Accuracy</span>
          <img src="https://images.unsplash.com/photo-1551218808-94e220e084d2?w=600&q=80" alt="Chef plating food in commercial kitchen" loading="lazy">
        </div>
        <div class="operator-card-body">
          <h3 class="operator-card-title">Direct guest-to-kitchen instructions</h3>
          <p class="operator-card-desc">Custom spice levels, dietary allergy tags, and preparation notes print verbatim on kitchen KOT tickets. Eliminates misheard dishes and wasted food.</p>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="operator-card">
        <div class="operator-img-box">
          <span class="operator-tag-glass">Cost Control</span>
          <span class="operator-metric-badge">Zero Printing Cost</span>
          <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&q=80" alt="Modern restaurant bar and dining tables" loading="lazy">
        </div>
        <div class="operator-card-body">
          <h3 class="operator-card-title">Real-time menu &amp; price updates</h3>
          <p class="operator-card-desc">Adjust dish prices, launch seasonal chef specials, or mark sold-out items from your manager phone in 5 seconds. Save thousands each year on physical laminate printing.</p>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="operator-card">
        <div class="operator-img-box">
          <span class="operator-tag-glass">Staff Productivity</span>
          <span class="operator-metric-badge">2x Floor Speed</span>
          <img src="https://images.unsplash.com/photo-1556742031-c6961e8560b0?w=600&q=80" alt="Staff attending counter in modern cafe" loading="lazy">
        </div>
        <div class="operator-card-body">
          <h3 class="operator-card-title">Hospitality over manual order punching</h3>
          <p class="operator-card-desc">Waitstaff spend their time delivering hot dishes, checking on guests, and turning tables instead of sprinting back and forth to punch tickets and swipe cards.</p>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="operator-card">
        <div class="operator-img-box">
          <span class="operator-tag-glass">Seamless Checkout</span>
          <span class="operator-metric-badge">&lt; 10s Settlement</span>
          <img src="https://images.unsplash.com/photo-1533777857889-4be7c70b33f7?w=600&q=80" alt="Friends dining and laughing at restaurant" loading="lazy">
        </div>
        <div class="operator-card-body">
          <h3 class="operator-card-title">Contactless table-side settlement</h3>
          <p class="operator-card-desc">Diners settle with 1-tap UPI QR (Google Pay, PhonePe, Paytm) directly at the table. Digital receipts generate automatically, eliminating cashier counter congestion.</p>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ 8. QR CODE LIVE DEMO ═══════════ --}}
<style>
/* ──────────────────────────────────────────────────────────
   LIVE DEMO & TABLE STANDEE TEST-DRIVE STYLES
   ────────────────────────────────────────────────────────── */
.demo-testdrive-box {
  background: var(--card-bg, #ffffff);
  border: 1px solid var(--border, #e5e7eb);
  border-radius: 16px;
  padding: 32px 36px;
  display: grid;
  grid-template-columns: 1.2fr 0.8fr;
  gap: 48px;
  align-items: center;
  max-width: 1180px;
  margin: 0 auto;
  box-shadow: 0 4px 20px rgba(0,0,0,0.04);
  text-align: left;
}
html.dark .demo-testdrive-box {
  background: #18221c;
  border-color: rgba(255,255,255,0.08);
}

.demo-content-col h3 {
  font-size: 24px;
  font-weight: 600;
  color: var(--text-main, #111827);
  margin: 0 0 12px;
  line-height: 1.3;
  letter-spacing: -0.3px;
}
html.dark .demo-content-col h3 {
  color: #f1f5f9;
}
.demo-content-col p {
  font-size: 14.5px;
  line-height: 1.6;
  color: var(--gray, #4b5563);
  margin: 0 0 24px;
}
html.dark .demo-content-col p {
  color: #94a3b8;
}

.demo-steps-list {
  display: flex;
  flex-direction: column;
  gap: 14px;
  margin-bottom: 28px;
}
.demo-step-row {
  display: flex;
  align-items: flex-start;
  gap: 12px;
}
.demo-step-num {
  font-size: 11px;
  font-weight: 700;
  color: #2E6F40;
  background: rgba(46,111,64,0.1);
  border: 1px solid rgba(46,111,64,0.22);
  width: 22px;
  height: 22px;
  border-radius: 6px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  margin-top: 1px;
}
html.dark .demo-step-num {
  color: #68BA7F;
  background: rgba(104,186,127,0.12);
  border-color: rgba(104,186,127,0.25);
}
.demo-step-text strong {
  display: block;
  font-size: 13.5px;
  font-weight: 600;
  color: var(--text-main, #111827);
  margin-bottom: 2px;
}
html.dark .demo-step-text strong {
  color: #e2e8f0;
}
.demo-step-text span {
  font-size: 12.5px;
  color: var(--gray, #64748b);
  line-height: 1.5;
}
html.dark .demo-step-text span {
  color: #94a3b8;
}

.demo-action-buttons {
  display: flex;
  gap: 12px;
  align-items: center;
  flex-wrap: wrap;
}
.btn-demo-primary {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: #2E6F40;
  color: #ffffff;
  font-size: 13.5px;
  font-weight: 600;
  padding: 12px 22px;
  border-radius: 8px;
  text-decoration: none;
  transition: background-color 0.15s ease, transform 0.15s ease;
}
.btn-demo-primary:hover {
  background: #253D2C;
  transform: translateY(-1px);
}
.btn-demo-secondary {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: transparent;
  color: var(--text-main, #111827);
  font-size: 13.5px;
  font-weight: 600;
  padding: 11px 20px;
  border-radius: 8px;
  border: 1px solid var(--border, #cbd5e1);
  text-decoration: none;
  transition: border-color 0.15s ease, background 0.15s ease;
}
html.dark .btn-demo-secondary {
  color: #e2e8f0;
  border-color: rgba(255,255,255,0.15);
}
.btn-demo-secondary:hover {
  border-color: #2E6F40;
  background: rgba(46,111,64,0.04);
}

/* Standee Graphic Frame */
.standee-frame-card {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 24px 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  max-width: 280px;
  margin: 0 auto;
  box-shadow: 0 4px 16px rgba(0,0,0,0.05);
}
html.dark .standee-frame-card {
  background: #111714;
  border-color: rgba(255,255,255,0.08);
}
.standee-top-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  margin-bottom: 14px;
  padding-bottom: 8px;
  border-bottom: 1px dashed #cbd5e1;
}
html.dark .standee-top-bar {
  border-bottom-color: rgba(255,255,255,0.1);
}
.standee-brand {
  font-size: 11px;
  font-weight: 700;
  color: #2E6F40;
  letter-spacing: 0.3px;
}
html.dark .standee-brand {
  color: #68BA7F;
}
.standee-table-pill {
  font-size: 10.5px;
  font-weight: 600;
  background: #0f172a;
  color: #ffffff;
  padding: 2px 7px;
  border-radius: 4px;
}
html.dark .standee-table-pill {
  background: #2E6F40;
}
.standee-qr-wrap {
  background: #ffffff;
  padding: 14px;
  border-radius: 10px;
  border: 1px solid #e2e8f0;
  margin-bottom: 12px;
  box-shadow: 0 1px 4px rgba(0,0,0,0.04);
}
.standee-scan-label {
  font-size: 12px;
  font-weight: 600;
  color: var(--text-main, #111827);
  margin-bottom: 4px;
}
html.dark .standee-scan-label {
  color: #f1f5f9;
}
.standee-pulse-row {
  display: flex;
  align-items: center;
  gap: 5px;
  font-size: 11px;
  color: #059669;
}
.standee-pulse-dot {
  width: 6px;
  height: 6px;
  background: #10b981;
  border-radius: 50%;
  box-shadow: 0 0 6px #10b981;
}

@media (max-width: 900px) {
  .demo-testdrive-box {
    grid-template-columns: 1fr;
    gap: 32px;
    padding: 32px 24px;
    text-align: center;
  }
  .demo-steps-list {
    text-align: left;
    max-width: 480px;
    margin: 0 auto 24px;
  }
  .demo-action-buttons {
    justify-content: center;
  }
}
</style>
<section class="section section-alt" id="interactive-demo">
  <div class="wrap">
    <div class="section-head tc">
      <span class="section-kicker">Interactive Live Demo</span>
      <h2 class="h2">Experience the ordering flow live on your device</h2>
      <p class="lead" style="max-width: 620px; margin: 0 auto 18px;">
        Scan the tabletop QR code with your phone camera to experience what your diners see — no app download or registration required.
      </p>
    </div>

    <div class="demo-testdrive-box">
      <!-- Left Content Column -->
      <div class="demo-content-col">
        <h3>Test the guest ordering flow in 3 quick steps</h3>
        <p>Explore our live cafe &amp; dining menu layout. Add dishes, choose modifiers, and see how easy table-side ordering feels for your guests.</p>

        <div class="demo-steps-list">
          <div class="demo-step-row">
            <span class="demo-step-num">01</span>
            <div class="demo-step-text">
              <strong>Scan with Phone Camera</strong>
              <span>Open your camera and scan the standee QR code to load the digital menu instantly in your mobile browser.</span>
            </div>
          </div>
          <div class="demo-step-row">
            <span class="demo-step-num">02</span>
            <div class="demo-step-text">
              <strong>Customize Modifiers &amp; Dietary Tags</strong>
              <span>Pick dish spice levels, choose add-on toppings, and browse vegan or chef-special recommendations.</span>
            </div>
          </div>
          <div class="demo-step-row">
            <span class="demo-step-num">03</span>
            <div class="demo-step-text">
              <strong>Simulate 1-Tap Table Checkout</strong>
              <span>Experience seamless UPI QR billing and see how orders fire directly to the kitchen thermal printer.</span>
            </div>
          </div>
        </div>

        <div class="demo-action-buttons">
          <a href="{{ route('restaurant_signup') }}" class="btn-demo-primary">
            <span>Create Your QR Menu</span>
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
          <a href="/features" class="btn-demo-secondary">
            <span>Explore All Features</span>
          </a>
        </div>
      </div>

      <!-- Right Standee Card Column -->
      <div class="demo-standee-col">
        <div class="standee-frame-card">
          <div class="standee-top-bar">
            <span class="standee-brand">CHOWCHAK OS</span>
            <span class="standee-table-pill">Table 04 &bull; Dine-in</span>
          </div>
          <div class="standee-qr-wrap">
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
          <div class="standee-scan-label">Scan with Phone Camera</div>
          <div class="standee-pulse-row">
            <span class="standee-pulse-dot"></span>
            <span>Live Interactive Menu Active</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ 10. TEMPLATES & PRINT KIT ═══════════ --}}
<style>
/* ──────────────────────────────────────────────────────────
   PRINT-READY BRANDING & TABLETOP PRESETS STYLES
   ────────────────────────────────────────────────────────── */
.print-kit-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  max-width: 1180px;
  margin: 0 auto 20px;
}
.print-kit-card {
  background: var(--card-bg, #ffffff);
  border: 1px solid var(--border, #e5e7eb);
  border-radius: 14px;
  padding: 20px;
  display: flex;
  flex-direction: column;
  transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
  box-shadow: 0 1px 3px rgba(0,0,0,0.03);
}
html.dark .print-kit-card {
  background: #18221c;
  border-color: rgba(255,255,255,0.08);
}
.print-kit-card:hover {
  border-color: rgba(46,111,64,0.35);
  box-shadow: 0 6px 20px rgba(0,0,0,0.06);
  transform: translateY(-3px);
}

/* Visual Canvas for each preset */
.preset-visual-canvas {
  height: 160px;
  background: #f8fafc;
  border-radius: 10px;
  border: 1px solid #e2e8f0;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  overflow: hidden;
  margin-bottom: 16px;
}
html.dark .preset-visual-canvas {
  background: #111714;
  border-color: rgba(255,255,255,0.06);
}

/* 1. Standee Graphic */
.mockup-standee {
  width: 90px;
  height: 120px;
  background: #ffffff;
  border: 1px solid #cbd5e1;
  border-radius: 6px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 8px 6px;
  position: relative;
}
.mockup-standee::after {
  content: '';
  position: absolute;
  bottom: -6px;
  left: 50%;
  transform: translateX(-50%);
  width: 105px;
  height: 6px;
  background: #e2e8f0;
  border-radius: 2px;
  border: 1px solid #cbd5e1;
}
.mockup-tbl-badge {
  font-size: 8px;
  font-weight: 700;
  background: #2E6F40;
  color: #fff;
  padding: 1px 5px;
  border-radius: 3px;
  margin-bottom: 6px;
}
.mockup-qr-box {
  width: 52px;
  height: 52px;
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 4px;
}
.mockup-scan-sub {
  font-size: 7px;
  color: #64748b;
  margin-top: 4px;
  font-weight: 600;
}

/* 2. Coaster Graphic */
.mockup-coaster {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background: #ffffff;
  border: 2px dashed #2E6F40;
  box-shadow: 0 4px 12px rgba(0,0,0,0.06);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 3px;
  padding: 8px;
}
.mockup-coaster-brand {
  font-size: 7.5px;
  font-weight: 700;
  color: #2E6F40;
  letter-spacing: 0.5px;
}
.mockup-coaster-sub {
  font-size: 6.5px;
  color: #64748b;
}

/* 3. Sticker Seal Graphic */
.mockup-seal {
  width: 110px;
  height: 64px;
  background: #ffffff;
  border: 1px solid #cbd5e1;
  border-radius: 4px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.06);
  display: flex;
  align-items: center;
  padding: 6px 10px;
  gap: 8px;
  position: relative;
}
.mockup-seal-left {
  display: flex;
  flex-direction: column;
  gap: 2px;
}
.mockup-seal-tag {
  font-size: 7.5px;
  font-weight: 700;
  color: #b45309;
  background: #fef3c7;
  padding: 1px 4px;
  border-radius: 2px;
  width: fit-content;
}
.mockup-seal-title {
  font-size: 8px;
  font-weight: 600;
  color: #0f172a;
}

/* 4. Poster Graphic */
.mockup-poster {
  width: 84px;
  height: 118px;
  background: #253D2C;
  border-radius: 4px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.12);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  padding: 8px 6px;
  color: #ffffff;
}
.mockup-poster-head {
  font-size: 7px;
  font-weight: 700;
  letter-spacing: 0.3px;
  text-align: center;
  color: #f1f5f9;
}
.mockup-poster-qr {
  background: #ffffff;
  padding: 4px;
  border-radius: 3px;
  width: 44px;
  height: 44px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.mockup-poster-foot {
  font-size: 6.5px;
  color: #cbd5e1;
  text-align: center;
}

/* Preset Details */
.preset-tag {
  font-size: 11px;
  font-weight: 600;
  color: #2E6F40;
  text-transform: uppercase;
  letter-spacing: 0.3px;
  margin-bottom: 4px;
}
html.dark .preset-tag {
  color: #68BA7F;
}
.preset-title {
  font-size: 15px;
  font-weight: 600;
  color: var(--text-main, #111827);
  margin: 0 0 6px;
}
html.dark .preset-title {
  color: #f1f5f9;
}
.preset-desc {
  font-size: 12.5px;
  line-height: 1.5;
  color: var(--gray, #4b5563);
  margin: 0 0 14px;
  flex-grow: 1;
}
html.dark .preset-desc {
  color: #94a3b8;
}
.preset-spec-pill {
  font-size: 11px;
  font-weight: 500;
  color: #475569;
  background: #f1f5f9;
  border: 1px solid #e2e8f0;
  border-radius: 6px;
  padding: 3px 8px;
  width: fit-content;
}
html.dark .preset-spec-pill {
  background: rgba(255,255,255,0.06);
  border-color: rgba(255,255,255,0.08);
  color: #cbd5e1;
}

/* Feature Checkmark Strip */
.print-features-strip {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  justify-content: center;
  max-width: 900px;
  margin: 0 auto 30px;
}
.p-feat-item {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 12.5px;
  font-weight: 500;
  color: var(--text-main, #334155);
}
html.dark .p-feat-item {
  color: #cbd5e1;
}
.p-feat-item svg {
  color: #2E6F40;
  flex-shrink: 0;
}
html.dark .p-feat-item svg {
  color: #68BA7F;
}

@media (max-width: 1024px) {
  .print-kit-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
  }
}
@media (max-width: 640px) {
  .print-kit-grid {
    grid-template-columns: 1fr;
    gap: 14px;
  }
}
</style>

<section class="section tc" style="background:var(--white);">
  <div class="wrap">
    <div class="section-head tc">
      <span class="section-kicker">Print &amp; Storefront Presets</span>
      <h2 class="h2">Free customizable print &amp; tabletop templates</h2>
      <p class="lead" style="max-width: 620px; margin: 0 auto 18px;">
        High-resolution vector print presets formatted with your logo, brand colors, and dynamic table numbers. Download in 300 DPI PDF format ready for local printing.
      </p>
    </div>

    <div class="print-kit-grid">

      <!-- Preset 1: Acrylic Standees -->
      <div class="print-kit-card">
        <div class="preset-visual-canvas">
          <div class="mockup-standee">
            <span class="mockup-tbl-badge">TABLE 04</span>
            <div class="mockup-qr-box">
              <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#2E6F40" stroke-width="2">
                <rect x="3" y="3" width="7" height="7"></rect>
                <rect x="14" y="3" width="7" height="7"></rect>
                <rect x="14" y="14" width="7" height="7"></rect>
                <rect x="3" y="14" width="7" height="7"></rect>
              </svg>
            </div>
            <span class="mockup-scan-sub">SCAN TO ORDER</span>
          </div>
        </div>
        <span class="preset-tag">Tabletop Service</span>
        <h3 class="preset-title">Acrylic QR Standees &amp; Tents</h3>
        <p class="preset-desc">Pre-numbered A6 and A5 tent card templates. Sized perfectly for standard wooden and clear acrylic table holders.</p>
        <span class="preset-spec-pill">A6 &bull; A5 &bull; Vector PDF</span>
      </div>

      <!-- Preset 2: Coasters -->
      <div class="print-kit-card">
        <div class="preset-visual-canvas">
          <div class="mockup-coaster">
            <span class="mockup-coaster-brand">CHOWCHAK</span>
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#2E6F40" stroke-width="2">
              <rect x="3" y="3" width="7" height="7"></rect>
              <rect x="14" y="3" width="7" height="7"></rect>
              <rect x="14" y="14" width="7" height="7"></rect>
              <rect x="3" y="14" width="7" height="7"></rect>
            </svg>
            <span class="mockup-coaster-sub">Table QR Coaster</span>
          </div>
        </div>
        <span class="preset-tag">Bar &amp; Lounge</span>
        <h3 class="preset-title">Waterproof QR Coasters</h3>
        <p class="preset-desc">Round and square 90mm coaster presets designed for high-turnover bars, cafes, and rooftop dining spaces.</p>
        <span class="preset-spec-pill">90mm &bull; Pulpboard Specs</span>
      </div>

      <!-- Preset 3: Delivery Stickers -->
      <div class="print-kit-card">
        <div class="preset-visual-canvas">
          <div class="mockup-seal">
            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#2E6F40" stroke-width="2">
              <rect x="3" y="3" width="7" height="7"></rect>
              <rect x="14" y="3" width="7" height="7"></rect>
              <rect x="14" y="14" width="7" height="7"></rect>
              <rect x="3" y="14" width="7" height="7"></rect>
            </svg>
            <div class="mockup-seal-left">
              <span class="mockup-seal-tag">KITCHEN SEALED</span>
              <span class="mockup-seal-title">Scan to Re-order</span>
            </div>
          </div>
        </div>
        <span class="preset-tag">Takeaway &amp; Packaging</span>
        <h3 class="preset-title">Tamper-Proof Box Seals</h3>
        <p class="preset-desc">Adhesive seal stickers with integrated re-order QR codes for delivery bags, pizza boxes, and takeaway containers.</p>
        <span class="preset-spec-pill">Die-Cut &bull; CMYK 300 DPI</span>
      </div>

      <!-- Preset 4: Window Posters -->
      <div class="print-kit-card">
        <div class="preset-visual-canvas">
          <div class="mockup-poster">
            <span class="mockup-poster-head">SCAN &amp; SKIP THE LINE</span>
            <div class="mockup-poster-qr">
              <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#2E6F40" stroke-width="2">
                <rect x="3" y="3" width="7" height="7"></rect>
                <rect x="14" y="3" width="7" height="7"></rect>
                <rect x="14" y="14" width="7" height="7"></rect>
                <rect x="3" y="14" width="7" height="7"></rect>
              </svg>
            </div>
            <span class="mockup-poster-foot">CHOWCHAK OS</span>
          </div>
        </div>
        <span class="preset-tag">Storefront &amp; Queue</span>
        <h3 class="preset-title">Contactless Entrance Posters</h3>
        <p class="preset-desc">High-contrast A3 and A4 wall posters allowing walk-in customers to browse menus and pre-order while waiting.</p>
        <span class="preset-spec-pill">A3 &bull; A4 &bull; Large Format</span>
      </div>

    </div>

    <!-- Technical Print Highlights -->
    <div class="print-features-strip">
      <div class="p-feat-item">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
        <span>Auto-Numbered Batch Generation</span>
      </div>
      <div class="p-feat-item">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
        <span>Custom Brand Logo &amp; Color Tint</span>
      </div>
      <div class="p-feat-item">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
        <span>300 DPI CMYK Print-Ready Export</span>
      </div>
      <div class="p-feat-item">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
        <span>Zero Design Software Needed</span>
      </div>
    </div>

    <!-- Action Button -->
    <div>
      <a href="{{ route('restaurant_signup') }}" class="btn-features-explore">
        <span>Generate your free print kit</span>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>

  </div>
</section>

{{-- ═══════════ 12. REVIEWS ═══════════ --}}
<section class="section tc" style="background:var(--white);" id="reviews">
  <div class="wrap">
    <h2 class="h2">Trusted by <em>restaurant operators</em></h2>
    @php $revs = [
      ['https://i.pravatar.cc/96?img=5','Abby G.','Restaurant Owner','We increased our average order size by 20% when we launched our QR code dine-in ordering. It\'s very easy to implement, and our customers love fast and convenient ordering.'],
      ['https://i.pravatar.cc/96?img=15','Peter P.','Head of Marketing','I was able to save both money and time. I recommend ChowChak POS to those who have restaurants and small food businesses.'],
      ['https://i.pravatar.cc/96?img=20','Adrian W.','General Manager','I recommend ChowChak POS for anyone looking to expand their restaurant business and add a digital edge. Easy, user-friendly, and highly cost-effective.'],
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
        <h2 class="cta-h2">Create your first digital menu<br>with ChowChak</h2>
        <p class="cta-p">Design, customize, and publish your menu in minutes. Engage with your customers, streamline orders, and simplify restaurant order management — all in one tool.</p>
        <a href="{{ route('restaurant_signup') }}" class="btn-orange">Get started for free</a>
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
  padding: 30px 0 24px !important;
  background: #ffffff !important;
  transition: background-color 0.3s ease;
}
html.dark .pr-faq-section {
  background: #111827 !important;
}
.pr-faq-inner {
  max-width: 1180px !important;
  width: 100% !important;
  margin: 0 auto !important;
  padding: 0 24px !important;
  box-sizing: border-box !important;
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
  margin-bottom: 10px !important;
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

<section class="section pr-faq-section" id="user-faqs">
  <div class="wrap pr-faq-inner">
    <div style="text-align:center; margin-bottom:18px;">
      <h2 class="section-title" style="font-size:clamp(22px, 3vw, 32px);font-weight:900;margin:0 0 6px;">Frequently Asked <em style="font-style:normal;color:#2E6F40;">Questions</em></h2>
      <p class="section-sub" style="font-size:14.5px;margin:0 0 14px;line-height:1.6;">Everything you need to know about our digital QR menu & restaurant OS platform.</p>
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
