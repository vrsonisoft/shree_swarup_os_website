@extends('layouts.landing')

@section('title', 'Privacy Policy | ShreeSwarupOS')
@section('meta_description', 'Read the official Privacy Policy of ShreeSwarupOS to understand how we handle customer data, security, and privacy protection.')

@section('content')
<style>
:root {
  --green: #00b692;
  --green-dark: #009c7d;
  --dark: #111827;
  --gray: #6b7280;
  --light: #f8fafc;
  --border: #e5e7eb;
  --white: #ffffff;
  --card: #ffffff;
}
html.dark {
  --dark: #f3f4f6;
  --gray: #9ca3af;
  --light: #0b0f19;
  --border: #1f2937;
  --white: #111827;
  --card: #1f2937;
}

.legal-page { font-family: 'Poppins', sans-serif; color: var(--dark); background: var(--light); min-h-screen: 100vh; }
.legal-page *, .legal-page *::before, .legal-page *::after { box-sizing: border-box; }

/* ── HERO ── */
.legal-hero {
  background: linear-gradient(135deg, #0f172a 0%, #0d2b22 50%, #0f1f2e 100%);
  padding: 80px 24px 60px;
  text-align: center;
  position: relative;
  overflow: hidden;
}
.legal-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 50%, rgba(0,182,146,0.12) 0%, transparent 60%);
  pointer-events: none;
}
.legal-badge {
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
  margin-bottom: 20px;
}
.legal-hero h1 {
  font-size: clamp(30px, 4.5vw, 48px);
  font-weight: 900;
  color: #fff;
  line-height: 1.2;
  margin: 0 0 14px;
}
.legal-hero h1 em { color: #00b692; font-style: normal; }
.legal-hero-meta {
  font-size: 13.5px;
  color: rgba(255,255,255,0.65);
}

/* ── MAIN CONTENT CONTAINER ── */
.legal-container {
  max-width: 1100px;
  margin: 0 auto;
  padding: 60px 24px;
  display: grid;
  grid-template-columns: 280px 1fr;
  gap: 40px;
}
@media (max-width: 900px) {
  .legal-container { grid-template-columns: 1fr; gap: 30px; padding: 40px 20px; }
}

/* ── SIDEBAR NAV ── */
.legal-sidebar {
  position: sticky;
  top: 100px;
  height: fit-content;
  background: var(--card);
  border: 1.5px solid var(--border);
  border-radius: 16px;
  padding: 24px 20px;
  box-shadow: 0 4px 20px rgba(0,0,0,0.03);
}
@media (max-width: 900px) {
  .legal-sidebar { position: relative; top: 0; }
}
.legal-sidebar h3 {
  font-size: 14px;
  font-weight: 800;
  color: var(--dark);
  margin: 0 0 16px;
  padding-bottom: 10px;
  border-bottom: 1.5px solid var(--border);
}
.legal-sidebar ul { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 8px; }
.legal-sidebar a {
  display: block;
  font-size: 13px;
  color: var(--gray);
  text-decoration: none;
  padding: 8px 12px;
  border-radius: 8px;
  transition: all 0.2s;
  font-weight: 500;
}
.legal-sidebar a:hover {
  background: rgba(0,182,146,0.08);
  color: #00b692;
  padding-left: 16px;
}

/* ── CONTENT BODY ── */
.legal-content {
  background: var(--card);
  border: 1.5px solid var(--border);
  border-radius: 20px;
  padding: 44px 40px;
  box-shadow: 0 4px 20px rgba(0,0,0,0.03);
}
@media (max-width: 600px) { .legal-content { padding: 28px 20px; } }

.legal-section { margin-bottom: 40px; }
.legal-section:last-child { margin-bottom: 0; }
.legal-section h2 {
  font-size: 20px;
  font-weight: 800;
  color: var(--dark);
  margin: 0 0 16px;
  padding-bottom: 8px;
  border-bottom: 2px solid rgba(0,182,146,0.2);
  display: flex;
  align-items: center;
  gap: 10px;
}
.legal-section h2 span.num {
  background: #00b692;
  color: #fff;
  width: 28px;
  height: 28px;
  border-radius: 8px;
  font-size: 12px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.legal-section p {
  font-size: 14.5px;
  line-height: 1.8;
  color: var(--gray);
  margin: 0 0 14px;
}
.legal-section ul {
  padding-left: 20px;
  margin: 0 0 16px;
}
.legal-section li {
  font-size: 14px;
  line-height: 1.8;
  color: var(--gray);
  margin-bottom: 8px;
}

/* Callout Box */
.legal-callout {
  background: rgba(0,182,146,0.06);
  border-left: 4px solid #00b692;
  border-radius: 12px;
  padding: 20px 24px;
  margin: 20px 0;
}
.legal-callout p {
  margin: 0;
  font-size: 14px;
  color: var(--dark);
  font-weight: 500;
}

/* ── CTA BANNER ── */
.legal-cta {
  background: linear-gradient(135deg, #00b692 0%, #009c7d 100%);
  padding: 60px 24px;
  text-align: center;
  color: #fff;
}
.legal-cta h3 { font-size: 24px; font-weight: 900; margin: 0 0 10px; }
.legal-cta p { font-size: 14.5px; opacity: 0.9; margin: 0 0 24px; }
.legal-cta a {
  display: inline-block;
  background: #fff;
  color: #00b692;
  font-weight: 800;
  font-size: 14px;
  padding: 14px 32px;
  border-radius: 10px;
  text-decoration: none;
  transition: transform 0.2s;
}
.legal-cta a:hover { transform: translateY(-2px); }
</style>

<div class="legal-page">

  <!-- HERO -->
  <section class="legal-hero">
    <div style="position:relative;z-index:1;">
      <span class="legal-badge">Legal Documentation</span>
      <h1>Privacy <em>Policy</em></h1>
      <div class="legal-hero-meta">Effective Date: January 1, 2026 | Last Updated: July 2026</div>
    </div>
  </section>

  <!-- CONTAINER -->
  <div class="legal-container">

    <!-- SIDEBAR -->
    <aside class="legal-sidebar">
      <h3>On This Page</h3>
      <ul id="legal-sidebar-nav">
        <li id="sidebar-loader-item" style="font-size:13px;color:var(--gray);padding:6px 0;">Loading menu...</li>
      </ul>
      <template id="sidebar-static-fallback">
        <li><a href="#sec-1">1. Overview</a></li>
        <li><a href="#sec-2">2. Information We Collect</a></li>
        <li><a href="#sec-3">3. How We Use Information</a></li>
        <li><a href="#sec-4">4. Data Sharing & Disclosure</a></li>
        <li><a href="#sec-5">5. Data Security</a></li>
        <li><a href="#sec-6">6. Your Rights & Choices</a></li>
        <li><a href="#sec-7">7. Contact Us</a></li>
      </template>
    </aside>

    <!-- CONTENT BODY -->
    <main class="legal-content" id="legal-content-body">

      <!-- SLEEK SPINNER LOADER -->
      <div id="legal-loader" style="padding:60px 20px;text-align:center;">
        <div style="width:40px;height:40px;margin:0 auto 16px;border:3px solid rgba(0,182,146,0.15);border-top-color:#00b692;border-radius:50%;animation:legalSpin 0.8s linear infinite;"></div>
        <style>@keyframes legalSpin { to { transform: rotate(360deg); } }</style>
        <div style="font-size:14px;font-weight:600;color:var(--gray);">Loading Privacy Policy...</div>
      </div>

      <template id="content-static-fallback">
        <div class="legal-callout">
          <p>🔒 <strong>Your privacy matters to us.</strong> At TableTrack, we are committed to transparently explaining how we collect, store, and protect your personal and restaurant business information.</p>
        </div>

        <section id="sec-1" class="legal-section">
          <h2><span class="num">1</span> Overview</h2>
          <p>This Privacy Policy explains how <strong>TableTrack</strong> ("we", "us", or "our") collects, uses, discloses, and protects your information when you visit our landing pages, utilize our digital QR menu system, or interact with our restaurant management system platform.</p>
          <p>By registering for TableTrack or browsing our services, you agree to the practices described in this policy. If you do not agree with any part of this policy, please discontinue using our software and website services.</p>
        </section>

        <section id="sec-2" class="legal-section">
          <h2><span class="num">2</span> Information We Collect</h2>
          <p>We collect information to provide better services to all our restaurant operators and dining customers:</p>
          <ul>
            <li><strong>Restaurant Profile Data:</strong> Restaurant name, logo, phone number, email address, physical location, tax IDs, and billing contact details provided during signup.</li>
            <li><strong>Operational Data:</strong> Menu items, categories, pricing, table numbers, staff user details, order logs, and daily sales transaction summaries.</li>
            <li><strong>End-Customer Data:</strong> When diners scan QR codes or place digital orders, we may collect table numbers, selected order items, payment confirmation details, and customer contact info (if provided for digital receipts or loyalty).</li>
            <li><strong>Technical & Usage Data:</strong> Device IP address, browser type, operating system, timestamped access logs, and session statistics.</li>
          </ul>
        </section>

        <section id="sec-3" class="legal-section">
          <h2><span class="num">3</span> How We Use Your Information</h2>
          <p>We process collected data exclusively for valid business and operational reasons:</p>
          <ul>
            <li>To power and maintain our real-time order processing, QR menu display, and table tracking system.</li>
            <li>To process subscription billing and issue official tax invoices.</li>
            <li>To deliver analytics insights and revenue reports to restaurant owners.</li>
            <li>To send critical system updates, security alerts, and customer support notifications.</li>
            <li>To detect and prevent fraudulent activities, system abuse, or cyber threats.</li>
          </ul>
        </section>

        <section id="sec-4" class="legal-section">
          <h2><span class="num">4</span> Data Sharing & Disclosure</h2>
          <p>We do not sell, rent, or trade your personal or business data to third-party advertisers. Data is shared strictly under the following limited circumstances:</p>
          <ul>
            <li><strong>Authorized Service Providers:</strong> Trusted payment gateways (Stripe, Razorpay, PayPal), cloud hosting partners (AWS, DigitalOcean), and transactional email delivery networks.</li>
            <li><strong>Legal & Regulatory Compliance:</strong> When required by law enforcement, court subpoenas, or statutory reporting mandates.</li>
            <li><strong>Business Transfers:</strong> In the event of a merger, acquisition, or sale of company assets, client information will remain protected under equivalent confidentiality terms.</li>
          </ul>
        </section>

        <section id="sec-5" class="legal-section">
          <h2><span class="num">5</span> Data Security</h2>
          <p>We implement robust technical and organizational measures to safeguard your information:</p>
          <ul>
            <li><strong>SSL / TLS Encryption:</strong> All data transmitted between your browser and our servers is encrypted using standard 256-bit SSL protocols.</li>
            <li><strong>Access Controls:</strong> Strict role-based permissions prevent unauthorized internal staff access to sensitive restaurant or billing records.</li>
            <li><strong>Automated Backups:</strong> Daily automated database backups are encrypted and stored across redundant geographic data centers.</li>
          </ul>
        </section>

        <section id="sec-6" class="legal-section">
          <h2><span class="num">6</span> Your Rights & Choices</h2>
          <p>As a registered user, you retain complete control over your account and business information:</p>
          <ul>
            <li><strong>Account Data Modification:</strong> Update your profile, tax details, or menu configurations directly from your admin panel.</li>
            <li><strong>Data Export:</strong> Download full transactional histories, sales reports, and customer list logs in Excel or PDF formats at any time.</li>
            <li><strong>Account Deletion:</strong> Request full permanent deletion of your restaurant profile and associated data by contacting our support team.</li>
          </ul>
        </section>

        <section id="sec-7" class="legal-section">
          <h2><span class="num">7</span> Contact Us</h2>
          <p>If you have any questions, concerns, or privacy requests regarding this policy, please reach out to our privacy officer:</p>
          <p><strong>Email:</strong> privacy@tabletrack.com | <strong>Support Portal:</strong> support.tabletrack.com</p>
        </section>
      </template>

    </main>

  </div>

  <!-- CTA BANNER -->
  <section class="legal-cta">
    <h3>Have Questions About Our Privacy Standards?</h3>
    <p>Our legal and compliance team is available 24/7 to assist with your data security queries.</p>
    <a href="/about-us">Contact Privacy Support →</a>
  </section>

</div>

<script>
// ── DYNAMIC LEGAL POLICY FETCH (Privacy Policy) ──
(function() {
  const POLICY_TYPE = 'privacy-policy';
  const API_HOST = window.TABLETRACK_CONFIG ? window.TABLETRACK_CONFIG.apiHost : 'http://127.0.0.1:8000';

  function showStaticFallback() {
    const sidebarNav = document.getElementById('legal-sidebar-nav');
    const sidebarTpl = document.getElementById('sidebar-static-fallback');
    if (sidebarNav && sidebarTpl) {
      sidebarNav.innerHTML = sidebarTpl.innerHTML;
    }

    const contentBody = document.getElementById('legal-content-body');
    const contentTpl = document.getElementById('content-static-fallback');
    if (contentBody && contentTpl) {
      contentBody.innerHTML = contentTpl.innerHTML;
    }
  }

  fetch(`${API_HOST}/api/v1/public/legals?type=${POLICY_TYPE}`)
    .then(r => r.json())
    .then(res => {
      if (res.success && res.data && res.data.length > 0) {
        const items = res.data;

        // 1. Render API Sidebar Links ("On This Page")
        const sidebarNav = document.getElementById('legal-sidebar-nav');
        if (sidebarNav) {
          sidebarNav.innerHTML = items.map((item, idx) => {
            const num = idx + 1;
            const sectionId = `sec-${num}`;
            const title = item.title || `Section ${num}`;
            return `<li><a href="#${sectionId}">${num}. ${title}</a></li>`;
          }).join('');
        }

        // 2. Render API Main Content Sections + Feature Images
        const contentBody = document.getElementById('legal-content-body');
        if (contentBody) {
          contentBody.innerHTML = items.map((item, idx) => {
            const num = idx + 1;
            const sectionId = `sec-${num}`;
            const title = item.title || `Section ${num}`;
            const desc = item.description || '';
            const imageHtml = item.image 
              ? `<div style="margin-top:20px;text-align:center;"><img src="${item.image}" alt="${title}" style="max-width:100%;max-height:400px;object-fit:contain;border-radius:14px;box-shadow:0 6px 20px rgba(0,0,0,0.08);"></div>`
              : '';

            return `
              <section id="${sectionId}" class="legal-section">
                <h2><span class="num">${num}</span> ${title}</h2>
                <div class="legal-desc-wrapper">${desc}</div>
                ${imageHtml}
              </section>`;
          }).join('');
        }
      } else {
        // API response empty -> Fallback to static HTML
        showStaticFallback();
      }
    })
    .catch(err => {
      // API offline/error -> Fallback to static HTML
      showStaticFallback();
    });
})();
</script>

@endsection
