@extends('layouts.landing')

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
.legal-hero-meta { font-size: 13.5px; color: rgba(255,255,255,0.65); }

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
.legal-section p { font-size: 14.5px; line-height: 1.8; color: var(--gray); margin: 0 0 14px; }
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

  <section class="legal-hero">
    <div style="position:relative;z-index:1;">
      <span class="legal-badge">Legal Documentation</span>
      <h1>GDPR <em>Compliance</em></h1>
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
        <li><a href="#sec-1">1. Commitment to GDPR</a></li>
        <li><a href="#sec-2">2. Data Subject Rights</a></li>
        <li><a href="#sec-3">3. Data Controller vs Processor</a></li>
        <li><a href="#sec-4">4. International Transfers</a></li>
        <li><a href="#sec-5">5. DPO Contact Information</a></li>
      </template>
    </aside>

    <!-- CONTENT BODY -->
    <main class="legal-content" id="legal-content-body">

      <!-- SLEEK SPINNER LOADER -->
      <div id="legal-loader" style="padding:60px 20px;text-align:center;">
        <div style="width:40px;height:40px;margin:0 auto 16px;border:3px solid rgba(0,182,146,0.15);border-top-color:#00b692;border-radius:50%;animation:legalSpin 0.8s linear infinite;"></div>
        <style>@keyframes legalSpin { to { transform: rotate(360deg); } }</style>
        <div style="font-size:14px;font-weight:600;color:var(--gray);">Loading GDPR Compliance Policy...</div>
      </div>

      <template id="content-static-fallback">
        <div class="legal-callout">
          <p>🇪🇺 <strong>GDPR Compliance Statement:</strong> TableTrack is committed to supporting European General Data Protection Regulation (GDPR) standards for data protection and user privacy rights.</p>
        </div>

        <section id="sec-1" class="legal-section">
          <h2><span class="num">1</span> Commitment to GDPR</h2>
          <p>The General Data Protection Regulation (GDPR) is a comprehensive EU privacy law that regulates data collection and processing for European citizens. TableTrack complies with all core GDPR mandates across our web platform and digital QR services.</p>
        </section>

        <section id="sec-2" class="legal-section">
          <h2><span class="num">2</span> Data Subject Rights</h2>
          <p>Under GDPR regulations, users retain key rights regarding their personal data:</p>
          <ul>
            <li><strong>Right of Access:</strong> Request full confirmation of what personal data is stored about you or your business.</li>
            <li><strong>Right to Erasure (Right to be Forgotten):</strong> Request complete deletion of your account records.</li>
            <li><strong>Right to Rectification:</strong> Request correction of inaccurate or incomplete personal records.</li>
            <li><strong>Right to Data Portability:</strong> Receive your data in a structured, machine-readable JSON/Excel format.</li>
          </ul>
        </section>

        <section id="sec-3" class="legal-section">
          <h2><span class="num">3</span> Data Controller vs Processor</h2>
          <p>When restaurant operators use TableTrack to store guest order histories, TableTrack acts as a Data Processor, and the restaurant acts as the Data Controller under GDPR guidelines.</p>
        </section>

        <section id="sec-4" class="legal-section">
          <h2><span class="num">4</span> International Data Transfers</h2>
          <p>All cross-border data transfers adhere to strict EU Standard Contractual Clauses (SCCs) and encrypted transport layers to ensure equivalent data protection regardless of physical data center locations.</p>
        </section>

        <section id="sec-5" class="legal-section">
          <h2><span class="num">5</span> DPO Contact Information</h2>
          <p>If you wish to exercise your GDPR rights or submit a Data Subject Access Request (DSAR), please contact our Data Protection Officer at <strong>dpo@tabletrack.com</strong>.</p>
        </section>
      </template>

    </main>

  </div>

  <section class="legal-cta">
    <h3>Questions About GDPR Compliance?</h3>
    <p>Our compliance team is ready to assist with data processing agreements and DSAR requests.</p>
    <a href="/about-us">Contact DPO Support →</a>
  </section>

</div>

<script>
// ── DYNAMIC LEGAL POLICY FETCH (GDPR Compliance) ──
(function() {
  const POLICY_TYPE = 'gdpr-compliance';
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

@endsection
