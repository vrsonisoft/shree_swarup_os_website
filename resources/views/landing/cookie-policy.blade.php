@extends('layouts.landing')

@section('title', 'Cookie Policy | ShreeSwarupOS')
@section('meta_description', 'Learn about how ShreeSwarupOS uses cookies and tracking technologies to optimize performance and improve user experience.')

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

.legal-page { font-family: 'Poppins', sans-serif; color: var(--dark); background: var(--light); min-height: 100vh; }
.legal-page *, .legal-page *::before, .legal-page *::after { box-sizing: border-box; }

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
@media (max-width: 900px) { .legal-sidebar { position: relative; top: 0; } }
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
.legal-section ul { padding-left: 20px; margin: 0 0 16px; }
.legal-section li { font-size: 14px; line-height: 1.8; color: var(--gray); margin-bottom: 8px; }

.legal-callout {
  background: rgba(0,182,146,0.06);
  border-left: 4px solid #00b692;
  border-radius: 12px;
  padding: 20px 24px;
  margin: 20px 0;
}
.legal-callout p { margin: 0; font-size: 14px; color: var(--dark); font-weight: 500; }

.cookie-table {
  width: 100%;
  border-collapse: collapse;
  margin: 20px 0;
}
.cookie-table th, .cookie-table td {
  border: 1px solid var(--border);
  padding: 12px 16px;
  font-size: 13.5px;
  text-align: left;
}
.cookie-table th { background: rgba(0,182,146,0.08); color: var(--dark); font-weight: 700; }
.cookie-table td { color: var(--gray); }

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
      <h1>Cookie <em>Policy</em></h1>
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
        <li><a href="#sec-1">1. What Are Cookies?</a></li>
        <li><a href="#sec-2">2. How We Use Cookies</a></li>
        <li><a href="#sec-3">3. Types of Cookies We Use</a></li>
        <li><a href="#sec-4">4. Managing Preferences</a></li>
        <li><a href="#sec-5">5. Third-Party Cookies</a></li>
        <li><a href="#sec-6">6. Questions & Contact</a></li>
      </template>
    </aside>

    <!-- CONTENT BODY -->
    <main class="legal-content" id="legal-content-body">

      <!-- SLEEK SPINNER LOADER -->
      <div id="legal-loader" style="padding:60px 20px;text-align:center;">
        <div style="width:40px;height:40px;margin:0 auto 16px;border:3px solid rgba(0,182,146,0.15);border-top-color:#00b692;border-radius:50%;animation:legalSpin 0.8s linear infinite;"></div>
        <style>@keyframes legalSpin { to { transform: rotate(360deg); } }</style>
        <div style="font-size:14px;font-weight:600;color:var(--gray);">Loading Cookie Policy...</div>
      </div>

      <template id="content-static-fallback">
        <div class="legal-callout">
          <p>🍪 <strong>Understanding Cookies at TableTrack:</strong> This Cookie Policy explains how TableTrack uses cookies and tracking technologies to ensure seamless restaurant management and QR menu browsing.</p>
        </div>

        <section id="sec-1" class="legal-section">
          <h2><span class="num">1</span> What Are Cookies?</h2>
          <p>Cookies are small text files stored on your computer or mobile device when you visit websites or web applications. They allow web platforms to remember your actions, login sessions, and preferences over time so you don't have to re-enter them on every page reload.</p>
        </section>

        <section id="sec-2" class="legal-section">
          <h2><span class="num">2</span> How We Use Cookies</h2>
          <p>At TableTrack, we use cookies to keep our platform secure, fast, and user-friendly for both restaurant owners and dining guests:</p>
          <ul>
            <li>To maintain active admin session logins and user authorization tokens.</li>
            <li>To remember active ordering carts, table selections, and preferred currency/language settings.</li>
            <li>To monitor application performance, track error rates, and optimize database load times.</li>
          </ul>
        </section>

        <section id="sec-3" class="legal-section">
          <h2><span class="num">3</span> Types of Cookies We Use</h2>
          <table class="cookie-table">
            <thead>
              <tr>
                <th>Cookie Category</th>
                <th>Purpose</th>
                <th>Duration</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>Essential / Authentication</strong></td>
                <td>Required for core system functions, account logins, session security, and anti-fraud verification.</td>
                <td>Session / 30 Days</td>
              </tr>
              <tr>
                <td><strong>Performance & Analytics</strong></td>
                <td>Help us understand system usage patterns, load speeds, and popular feature adoption.</td>
                <td>90 Days</td>
              </tr>
              <tr>
                <td><strong>Functional & Preferences</strong></td>
                <td>Store custom user preferences such as theme mode, currency, and language choices.</td>
                <td>1 Year</td>
              </tr>
            </tbody>
          </table>
        </section>

        <section id="sec-4" class="legal-section">
          <h2><span class="num">4</span> Managing Preferences</h2>
          <p>You can control or disable cookies at any time through your web browser settings. Please note that disabling essential cookies may impact certain interactive features such as session logins or online ordering cart functionality.</p>
        </section>

        <section id="sec-5" class="legal-section">
          <h2><span class="num">5</span> Third-Party Cookies</h2>
          <p>In addition to our first-party cookies, trusted third-party analytics and payment partners (such as Stripe, Razorpay, or Google Analytics) may set cookies to process payments securely and analyze anonymized site traffic.</p>
        </section>

        <section id="sec-6" class="legal-section">
          <h2><span class="num">6</span> Questions & Contact</h2>
          <p>If you have any questions regarding our Cookie Policy, please contact our team at <strong>privacy@tabletrack.com</strong>.</p>
        </section>
      </template>

    </main>

  </div>

  <section class="legal-cta">
    <h3>Have Questions About Cookies?</h3>
    <p>Our technical team is ready to answer any questions regarding site storage and cookies.</p>
    <a href="/about-us">Contact Support →</a>
  </section>

</div>

<script>
// ── DYNAMIC LEGAL POLICY FETCH (Cookie Policy) ──
(function() {
  const POLICY_TYPE = 'cookie-policy';
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
        showStaticFallback();
      }
    })
    .catch(err => {
      showStaticFallback();
    });
})();
</script>
