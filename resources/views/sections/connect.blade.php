<style>
/* ── UNIFIED LET'S CONNECT SECTION ── */
.connect-section {
  background: transparent !important;
  padding: 30px 24px 60px !important;
  border-top: none !important;
}
html.dark .connect-section {
  background: transparent !important;
}
.connect-grid {
  max-width: 1180px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1.15fr 0.85fr;
  gap: 60px;
  align-items: center;
}
@media (max-width: 968px) {
  .connect-grid {
    grid-template-columns: 1fr;
    gap: 40px;
  }
}
.connect-info {
  text-align: left !important;
}
.connect-info h2 {
  font-size: 36px;
  font-weight: 900;
  line-height: 1.2;
  color: var(--dark, #111827);
  margin: 0 0 16px;
  text-align: left !important;
}
.connect-desc {
  font-size: 14.5px;
  color: var(--gray, #6b7280);
  line-height: 1.7;
  margin: 0 0 32px;
  text-align: left !important;
}
.connect-list {
  display: flex;
  flex-direction: column;
  gap: 20px;
  margin-bottom: 28px;
}
.connect-item {
  display: flex;
  gap: 16px;
  align-items: flex-start;
}
.connect-icon-box {
  width: 42px;
  height: 42px;
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
  color: var(--dark, #111827);
  margin-bottom: 2px;
}
.connect-text span {
  display: block;
  font-size: 13px;
  color: var(--gray, #6b7280);
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
  background: var(--card, #ffffff);
  border: 1px solid var(--border, #e5e7eb);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--gray, #6b7280);
  transition: all 0.2s ease;
}
.social-circle:hover {
  background: #6366f1;
  color: #fff;
  border-color: #6366f1;
  transform: translateY(-2px);
}
.connect-card {
  background: var(--card, #ffffff);
  border-radius: 20px;
  padding: 36px;
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.03);
  border: 1px solid var(--border, #e5e7eb);
}
@media (max-width: 480px) {
  .connect-card {
    padding: 24px;
  }
}
.connect-card h3 {
  font-size: 20px;
  font-weight: 800;
  color: var(--dark, #111827);
  margin: 0 0 24px;
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
.connect-input-group input, .connect-input-group textarea, .connect-input-group select {
  width: 100%;
  padding: 12px 16px;
  border-radius: 8px;
  border: 1.5px solid var(--border, #e5e7eb);
  background: var(--card, #ffffff);
  font-family: inherit;
  font-size: 13.5px;
  color: var(--dark, #111827);
  outline: none;
  transition: border-color 0.2s, box-shadow 0.2s;
}
.connect-input-group input::placeholder, .connect-input-group textarea::placeholder {
  color: var(--gray, #6b7280);
  opacity: 0.65;
}
.connect-input-group input:focus, .connect-input-group textarea:focus, .connect-input-group select:focus {
  border-color: #6366f1;
  box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.12);
}
.connect-submit-btn {
  width: 100%;
  padding: 13px;
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

.premium-footer {
  padding-top: 60px !important;
}
</style>

<section class="connect-section" id="contact">
  <div class="connect-grid">
    <div class="connect-info">
      <h2>Ready to transform your restaurant operations?</h2>
      <p class="connect-desc">
        Reach out to discuss your restaurant management requirements. Our advisors will respond within 24 hours to schedule a free restaurant digital menu consultation.
      </p>
      
      <div class="connect-list">
        <div class="connect-item">
          <div class="connect-icon-box">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </div>
          <div class="connect-text">
            <strong>Email Us</strong>
            <span>info@vrsonisoft.com</span>
            <span>support@vrsonisoft.com</span>
          </div>
        </div>
        
        <div class="connect-item">
          <div class="connect-icon-box">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          </div>
          <div class="connect-text">
            <strong>Call Us</strong>
            <span>🇮🇳 +91-92579-15113</span>
            <span>🇮🇳 +91-86191-90869</span>
          </div>
        </div>
        
        <div class="connect-item">
          <div class="connect-icon-box">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <div class="connect-text">
            <strong>Our Headquarters</strong>
            <span>Jodhpur, Rajasthan, India</span>
          </div>
        </div>
      </div>
      
      <div class="connect-socials">
        <a href="#" class="social-circle" title="LinkedIn">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
        </a>
        <a href="#" class="social-circle" title="GitHub">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
        </a>
        <a href="#" class="social-circle" title="X (Twitter)">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
        </a>
        <a href="#" class="social-circle" title="Facebook">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
        </a>
      </div>
    </div>
    
    <div class="connect-card-wrap">
      <div class="connect-card">
        <h3>Tell Us About Your Restaurant</h3>
        <form onsubmit="handleInquirySubmit(event)">
          <div class="connect-form-grid">
            <div class="connect-input-group">
              <input type="text" placeholder="Your Name" required id="inq-name">
            </div>
            <div class="connect-input-group">
              <input type="email" placeholder="Email Address" required id="inq-email">
            </div>
          </div>
          
          <div class="connect-form-grid">
            <div class="connect-input-group">
              <input type="text" placeholder="Phone Number" id="inq-phone">
            </div>
            <div class="connect-input-group">
              <select id="inq-category" required>
                <option value="" disabled selected>What services do you need?</option>
                <option value="Digital QR Menu">Digital QR Menu System</option>
                <option value="POS &amp; Billing">POS &amp; Order Billing</option>
                <option value="Table Booking">Table Booking &amp; Tracking</option>
                <option value="Other">General Inquiry</option>
              </select>
            </div>
          </div>
          
          <div class="connect-input-group">
            <textarea placeholder="Detailed Requirements (e.g. number of tables, layout preference, etc.)" rows="4" required id="inq-message"></textarea>
          </div>
          
          <button type="submit" class="connect-submit-btn">Send Inquiry</button>
        </form>
      </div>
    </div>
  </div>
</section>

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
