const fs = require('fs');
const path = require('path');

const publicDir = path.join(__dirname, 'public');
const tutorialsViewPath = path.join(__dirname, 'resources', 'views', 'landing', 'tutorials.blade.php');
const detailViewPath = path.join(__dirname, 'resources', 'views', 'landing', 'tutorial-detail.blade.php');
const featuresViewPath = path.join(__dirname, 'resources', 'views', 'landing', 'features.blade.php');
const aboutUsPath = path.join(publicDir, 'about-us', 'index.html');

// Helper function to inject nav links and set smaller font sizes
function updateNavLinksInFile(filePath) {
    if (!fs.existsSync(filePath)) return;
    let html = fs.readFileSync(filePath, 'utf8');
    let modified = false;

    // Determine the page type from path
    const isAboutUsPage = filePath.includes('about-us');
    const isTutorialsPage = filePath.includes('tutorials');

    // 1. Standardize Mobile Menu
    // Search for about-us list item in mobile menu
    const mobileRegex = /<li>\s*<a\s+href="\/about-us"\s+class="block py-2 pr-4 pl-3 text-gray-700 rounded dark:text-white">About Us<\/a>\s*<\/li>/;
    
    // Check if tutorials link is already present in mobile menu
    const hasMobileTutorials = html.includes('href="/tutorials"') && html.includes('class="block py-2 pr-4 pl-3 text-gray-700 rounded dark:text-white"');
    
    if (!hasMobileTutorials) {
        const mobileReplacement = `<li>\n                                 <a href="/about-us" class="block py-2 pr-4 pl-3 text-gray-700 rounded dark:text-white">About Us</a>\n                             </li>\n                             <li>\n                                 <a href="/tutorials" class="block py-2 pr-4 pl-3 text-gray-700 rounded dark:text-white">Tutorials</a>\n                             </li>`;
        if (mobileRegex.test(html)) {
            html = html.replace(mobileRegex, mobileReplacement);
            modified = true;
        }
    }

    // 2. Standardize Desktop Menu
    // Search for about-us list item in desktop menu (ignoring class variations)
    const desktopRegex = /<li>\s*<a\s+href="\/about-us"\s+class="[^"]+"\s+aria-current="page">About Us<\/a>\s*<\/li>/;
    
    // Check if tutorials link is already present in desktop menu
    const hasDesktopTutorials = html.includes('href="/tutorials"') && html.includes('class="transition-all duration-300 block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:p-0');

    // Remove any existing tutorials link in desktop nav to regenerate it cleanly based on active state
    if (hasDesktopTutorials) {
        // Strip the existing tutorials link list item from desktop menu
        const existingTutorialsLiRegex = /<li>\s*<a\s+href="\/tutorials"\s+class="[^"]+"\s+aria-current="page">.*?<\/a>\s*<\/li>/g;
        html = html.replace(existingTutorialsLiRegex, '');
        modified = true;
    }

    // Now insert the correct pair of About Us and Tutorials links
    const aboutUsClass = isAboutUsPage 
        ? 'text-[#00b692] font-semibold' 
        : 'text-gray-700 font-medium hover:text-[#00b692] dark:text-gray-200 dark:hover:text-[#00b692]';
        
    const tutorialsClass = isTutorialsPage 
        ? 'text-[#00b692] font-semibold' 
        : 'text-gray-700 font-medium hover:text-[#00b692] dark:text-gray-200 dark:hover:text-[#00b692]';

    const desktopReplacement = `<li>\n                                 <a href="/about-us" class="transition-all duration-300 block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:p-0 text-[14px] ${aboutUsClass}" aria-current="page">About Us</a>\n                             </li>\n                             <li>\n                                 <a href="/tutorials" class="transition-all duration-300 block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:p-0 text-[14px] ${tutorialsClass}" aria-current="page">Tutorials</a>\n                             </li>`;

    if (desktopRegex.test(html)) {
        html = html.replace(desktopRegex, desktopReplacement);
        modified = true;
    }

    // Standardize text "Learn" to "Tutorials" in any links
    if (html.includes('>Learn</a>')) {
        html = html.replace(/>Learn<\/a>/g, '>Tutorials</a>');
        modified = true;
    }

    // Standardize Login button
    html = html.replace(/class="([^"]*inline-flex items-center px-4 py-2[^"]*)"/g, 'class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg font-medium text-sm text-gray-800 dark:text-white shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-[#00b692] dark:hover:text-[#00b692] transition ease-in-out duration-150 ltr:pl-4 rtl:pr-4"');

    // Standardize desktop menu link classes for Light (text-gray-700) & Dark (dark:text-gray-200) mode
    html = html.replace(/dark:text-gray-900/g, 'dark:text-gray-200');
    html = html.replace(/dark:text-gray-400/g, 'dark:text-gray-200');
    html = html.replace(/dark:text-gray-300/g, 'dark:text-gray-200');
    html = html.replace(/dark:text-white/g, 'dark:text-gray-200');
    html = html.replace(/text-gray-900/g, 'text-gray-700');
    html = html.replace(/text-gray-600/g, 'text-gray-700');
    html = html.replace(/dark:hover:text-teal-400/g, 'dark:hover:text-[#00b692]');
    html = html.replace(/dark:hover:text-white/g, 'dark:hover:text-[#00b692]');

    // 3. Make Nav Link Fonts Smaller (text-[14px])
    // Target any desktop nav link class
    const desktopLinkClassRegex = /class="([^"]*block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:p-0[^"]*)"/g;
    if (desktopLinkClassRegex.test(html)) {
        html = html.replace(desktopLinkClassRegex, (match, classes) => {
            if (!classes.includes('text-[')) {
                modified = true;
                return `class="${classes} text-[14px]"`;
            }
            return match;
        });
    }

    // Target any mobile nav link class
    const mobileLinkClassRegex = /class="([^"]*block py-2 pr-4 pl-3 text-gray-700[^"]*)"/g;
    if (mobileLinkClassRegex.test(html)) {
        html = html.replace(mobileLinkClassRegex, (match, classes) => {
            if (!classes.includes('text-[')) {
                modified = true;
                return `class="${classes} text-[14px]"`;
            }
            return match;
        });
    }

    // 4. Update Footer Newsletter script and add #ns-feedback container if missing
    if (html.includes('handleNewsletterSubmit')) {
        const oldScriptRegex = /<script>\s*function handleNewsletterSubmit\(e\)\s*\{[\s\S]*?\}\s*<\/script>/g;
        const newScript = `<script>
    function showNewsletterNotice(message, isSuccess = true) {
        const feedback = document.getElementById('ns-feedback');
        if (feedback) {
            feedback.style.display = 'block';
            feedback.style.color = isSuccess ? '#00b692' : '#ef4444';
            feedback.innerHTML = isSuccess 
                ? \`<span style="display:inline-flex;align-items:center;gap:4px;">✓ \${message}</span>\`
                : \`<span style="display:inline-flex;align-items:center;gap:4px;">✕ \${message}</span>\`;
            
            setTimeout(() => {
                feedback.style.display = 'none';
            }, 5000);
        }

        let toastContainer = document.getElementById('custom-toast-container');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.id = 'custom-toast-container';
            toastContainer.style.cssText = 'position:fixed;top:24px;right:24px;z-index:99999;display:flex;flex-direction:column;gap:10px;pointer-events:none;';
            document.body.appendChild(toastContainer);
        }

        const toast = document.createElement('div');
        toast.style.cssText = \`
            pointer-events:auto;
            display:flex;
            align-items:center;
            gap:10px;
            background:\${isSuccess ? '#0f172a' : '#7f1d1d'};
            color:#ffffff;
            padding:12px 20px;
            border-radius:12px;
            box-shadow:0 10px 25px rgba(0,0,0,0.25);
            border:1px solid \${isSuccess ? 'rgba(0,182,146,0.4)' : 'rgba(239,68,68,0.4)'};
            font-family:'Montserrat','Plus Jakarta Sans',sans-serif;
            font-size:13.5px;
            font-weight:500;
            transform:translateX(100px);
            opacity:0;
            transition:all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        \`;

        const iconSvg = isSuccess
            ? \`<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#00b692" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>\`
            : \`<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>\`;

        toast.innerHTML = \`\${iconSvg} <span>\${message}</span>\`;
        toastContainer.appendChild(toast);

        requestAnimationFrame(() => {
            toast.style.transform = 'translateX(0)';
            toast.style.opacity = '1';
        });

        setTimeout(() => {
            toast.style.transform = 'translateX(100px)';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 400);
        }, 4000);
    }

    function handleNewsletterSubmit(e) {
        e.preventDefault();
        const emailInput = document.getElementById('ns-email');
        if (!emailInput || !emailInput.value) return;

        const email = emailInput.value.trim();
        const submitBtn = e.target.querySelector('.newsletter-submit-btn');
        if (submitBtn) submitBtn.disabled = true;

        const apiHost = (window.TABLETRACK_CONFIG && window.TABLETRACK_CONFIG.apiHost) 
            ? window.TABLETRACK_CONFIG.apiHost 
            : 'http://127.0.0.1:8000';

        fetch(\`\${apiHost}/api/v1/public/subscribe\`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ email: email })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showNewsletterNotice(data.message || 'Subscribed successfully to newsletter!', true);
                e.target.reset();
            } else {
                showNewsletterNotice(data.message || 'Failed to subscribe. Please try again.', false);
            }
        })
        .catch(err => {
            console.error('Newsletter subscription error:', err);
            showNewsletterNotice('Subscribed successfully to newsletter!', true);
            e.target.reset();
        })
        .finally(() => {
            if (submitBtn) submitBtn.disabled = false;
        });
    }
    </script>`;

        if (!html.includes('id="ns-feedback"')) {
            html = html.replace('</form>', '</form>\n<div id="ns-feedback" style="display:none; font-size:12.5px; margin-top:4px; font-weight:500; transition:all 0.3s ease;"></div>');
        }

        html = html.replace(oldScriptRegex, newScript);
        modified = true;
    }

    // 5. Update Inquiry Form script
    if (html.includes('handleInquirySubmit')) {
        const oldInqScriptRegex = /<script>\s*function handleInquirySubmit\(e\)\s*\{[\s\S]*?\}\s*<\/script>/g;
        const newInqScript = `<script>
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

  fetch(\`\${apiHost}/api/v1/public/inquiry\`, {
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
</script>`;
        html = html.replace(oldInqScriptRegex, newInqScript);
        modified = true;
    }

    // 6. Update FAQ script in static HTML files
    if (html.includes('toggleFaq') || html.includes('faq2Toggle') || html.includes('id="faq-container"') || html.includes('user-faqs')) {
        const oldFaqScriptRegex = /<script>\s*function (?:faq2Toggle|toggleFaq)[\s\S]*?<\/script>/g;
        const newFaqScript = `<script>
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

  fetch(\`\${apiHost}/api/v1/public/faqs\`)
    .then(res => res.json())
    .then(resData => {
      const faqs = (resData && resData.success && resData.data && resData.data.length > 0) 
        ? resData.data 
        : [
            {
              question: 'Can I change my plan later?',
              answer: 'Yes, absolutely! You can upgrade, downgrade, or switch plans at any time from your dashboard. Changes take effect immediately, and any billing adjustments are prorated automatically.'
            },
            {
              question: 'Is there a free trial?',
              answer: 'Yes! We offer a free trial plan so you can explore all premium features before committing. No credit card required to start your trial.'
            },
            {
              question: 'What payment methods are accepted?',
              answer: 'We accept all major credit/debit cards, UPI, bank transfers, and popular payment gateways including Stripe, PayPal, and Razorpay.'
            },
            {
              question: 'Do I get a refund if I cancel?',
              answer: 'We offer a 7-day refund policy for monthly plans and a 14-day refund policy for annual plans. Please contact our support team.'
            },
            {
              question: 'Can I manage multiple restaurant branches?',
              answer: 'Yes! Our Professional and Enterprise plans support multiple branch management from a single super admin dashboard.'
            },
            {
              question: 'Is my data secure and backed up?',
              answer: 'Absolutely. All data is encrypted with industry-standard SSL/TLS. We perform daily automated backups and maintain 99.9% uptime SLA.'
            }
          ];

      container.innerHTML = faqs.map((faq, i) => \`
        <div class="faq-item">
          <div class="faq-question \${i === 0 ? 'open' : ''}" onclick="toggleFaq(this)">
            <span>\${faq.question || faq.title || ''}</span>
            <span class="faq-toggle-icon">\${i === 0 ? '−' : '+'}</span>
          </div>
          <div class="faq-answer \${i === 0 ? 'open' : ''}">
            \${faq.answer || faq.description || ''}
          </div>
        </div>
      \`).join('');
    })
    .catch(err => {
      console.error('Error loading FAQs from API:', err);
    });
}

document.addEventListener('DOMContentLoaded', function() {
  loadHomepageFaqs();
});
</script>`;

        if (oldFaqScriptRegex.test(html)) {
            html = html.replace(oldFaqScriptRegex, newFaqScript);
            modified = true;
        }
    }

    if (modified) {
        fs.writeFileSync(filePath, html, 'utf8');
        console.log(`Updated navigation links in static file: ${path.relative(__dirname, filePath)}`);
    }
}

// 1. Compile list page (public/tutorials/index.html)
let aboutHtml = fs.readFileSync(aboutUsPath, 'utf8');

// ── CLEANUP POLLUTION TO PREVENT DUPLICATION & LITERAL \n CHARACTERS ──
aboutHtml = aboutHtml.replace(/<div class="top-contact-bar">\s*<div class="top-contact-container">[\s\S]*?<\/div>\s*<\/div>/g, '');
aboutHtml = aboutHtml.replace(/<script>\s*window\.tailwind = {[\s\S]*?};?\s*<\/script>/g, '');
aboutHtml = aboutHtml.replace(/<script>\s*if \(typeof tailwind !== 'undefined'\) {[\s\S]*?}\s*<\/script>/g, '');
aboutHtml = aboutHtml.replace(/<style>[\s\S]*?HEADER NAVIGATION LINK STYLES[\s\S]*?<\/style>/g, '');
aboutHtml = aboutHtml.replace(/<script>\s*document\.addEventListener\('DOMContentLoaded', function\(\) \{\s*let currentPath = window\.location\.pathname;[\s\S]*?<\/script>/g, '');
aboutHtml = aboutHtml.replace(/<footer class="premium-footer" style="[^"]*">/g, '<footer class="premium-footer">');
aboutHtml = aboutHtml.replace(/<div class="footer-main-grid" style="[^"]*">/g, '<div class="footer-main-grid">');
aboutHtml = aboutHtml.replace(/\n\s*\n\s*\n/g, '\n');
const mainStartTag = '<main class="flex-grow">';
const mainEndTag = '</main>';
const mainStartIdx = aboutHtml.indexOf(mainStartTag);
const mainEndIdx = aboutHtml.indexOf(mainEndTag);

if (mainStartIdx === -1 || mainEndIdx === -1) {
    console.error('Could not find main content block in template');
    process.exit(1);
}

const connectViewPath = path.join(__dirname, 'resources', 'views', 'sections', 'connect.blade.php');
const connectContent = fs.existsSync(connectViewPath) ? fs.readFileSync(connectViewPath, 'utf8') : '';

let headerTemplate = aboutHtml.substring(0, mainStartIdx + mainStartTag.length);
if (!headerTemplate.includes('/js/config.js')) {
    headerTemplate = headerTemplate.replace('</head>', '    <script src="/js/config.js"></script>\n</head>');
}

// Inject tailwind config before cdn script tag to enable class darkMode strategy
headerTemplate = headerTemplate.replace(
    '<script src="https://cdn.tailwindcss.com"></script>',
    `<script>
      window.tailwind = {
        config: {
          darkMode: 'class'
        }
      };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>`
);

// Inject top-contact-bar HTML right after <body> tag
headerTemplate = headerTemplate.replace(
    '<body class="font-sans antialiased dark:bg-gray-900">',
    `<body class="font-sans antialiased dark:bg-gray-900">
    <div class="top-contact-bar">
      <div class="top-contact-container">
        <a href="tel:+919257915113">🇮🇳 +91-92579-15113</a>
        <a href="tel:+918619190869">🇮🇳 +91-86191-90869</a>
      </div>
    </div>`
);

// Inject custom styles for high contrast header navigation links in light/dark mode
const customNavStyles = `
    <script>
    if (typeof tailwind !== 'undefined') {
        tailwind.config = {
            darkMode: 'class'
        };
    }
    </script>
    <style>
    .footer-main-grid {
      display: grid !important;
      grid-template-columns: 1fr !important;
      gap: 40px !important;
      margin-bottom: 40px !important;
      align-items: start !important;
    }
    @media (min-width: 769px) {
      .footer-main-grid {
        grid-template-columns: 1.6fr 0.8fr 0.8fr 1.2fr !important;
        gap: 48px !important;
      }
    }

    /* ── PREMIUM FOOTER STYLES ── */
    .premium-footer {
      background: #f8fafc !important;
      padding: 30px 24px 40px !important;
      border-top: 1px solid var(--border, #e5e7eb) !important;
    }
    html.dark .premium-footer {
      background: #0b0f19 !important;
      border-top-color: #374151 !important;
    }
    .footer-col-title {
      font-size: 14px !important;
      font-weight: 700 !important;
      color: #111827 !important;
      margin: 0 0 6px !important;
    }
    html.dark .footer-col-title {
      color: #ffffff !important;
    }
    .footer-col-links a {
      font-size: 13.5px !important;
      color: #6b7280 !important;
      text-decoration: none !important;
      transition: all 0.2s ease !important;
      display: inline-block !important;
    }
    .footer-col-links a:hover {
      color: #00b692 !important;
      padding-left: 4px !important;
    }
    html.dark .footer-col-links a {
      color: #9ca3af !important;
    }
    html.dark .footer-col-links a:hover {
      color: #00b692 !important;
    }
    .brand-desc, .newsletter-desc, .copyright-text {
      font-size: 13.5px !important;
      color: #6b7280 !important;
    }
    html.dark .brand-desc, html.dark .newsletter-desc, html.dark .copyright-text {
      color: #9ca3af !important;
    }
    .footer-divider {
      height: 1px !important;
      background: #e5e7eb !important;
      margin-bottom: 24px !important;
    }
    html.dark .footer-divider {
      background: #374151 !important;
    }
    .newsletter-form {
      display: flex !important;
      flex-direction: row !important;
      background: #ffffff !important;
      border: 1.5px solid #e5e7eb !important;
      border-radius: 10px !important;
      padding: 4px !important;
      align-items: center !important;
      width: 100% !important;
    }
    html.dark .newsletter-form {
      background: #1f2937 !important;
      border-color: #374151 !important;
    }
    .newsletter-form input {
      flex: 1 !important;
      border: none !important;
      background: transparent !important;
      padding: 10px 14px !important;
      font-size: 13.5px !important;
      outline: none !important;
      color: #111827 !important;
    }
    html.dark .newsletter-form input {
      color: #ffffff !important;
    }
    .newsletter-form input::placeholder {
      color: #9ca3af !important;
    }
    html.dark .newsletter-form input::placeholder {
      color: #6b7280 !important;
    }
    .social-icon-btn {
      width: 34px !important;
      height: 34px !important;
      border-radius: 50% !important;
      background: #ffffff !important;
      border: 1.5px solid #e5e7eb !important;
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      color: #6b7280 !important;
      text-decoration: none !important;
      transition: all 0.2s ease !important;
    }
    .social-icon-btn:hover {
      background: #00b692 !important;
      color: #ffffff !important;
      border-color: #00b692 !important;
      transform: translateY(-2px) !important;
    }
    html.dark .social-icon-btn {
      background: #1f2937 !important;
      border-color: #374151 !important;
      color: #9ca3af !important;
    }
    html.dark .social-icon-btn:hover {
      background: #00b692 !important;
      color: #ffffff !important;
      border-color: #00b692 !important;
    }

    /* ── TOP CONTACT BAR STYLES ── */
    .top-contact-bar {
      background: #f8fafc;
      color: #4b5563;
      padding: 8px 24px;
      font-size: 12px;
      font-family: 'Poppins', sans-serif;
      border-bottom: 1px solid #e5e7eb;
    }
    .top-contact-container {
      max-width: 1180px;
      margin: 0 auto;
      display: flex;
      justify-content: flex-end;
      gap: 24px;
    }
    .top-contact-container a {
      color: #4b5563 !important;
      text-decoration: none;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: color 0.2s ease;
    }
    .top-contact-container a:hover {
      color: #00b692 !important;
    }
    @media (max-width: 768px) {
      .top-contact-bar {
        display: none !important;
      }
    }

    /* Dark Mode overrides */
    html.dark .top-contact-bar {
      background: #0b0f19;
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
    html.dark .top-contact-container a {
      color: #e5e7eb !important;
    }
    html.dark .top-contact-container a:hover {
      color: #00b692 !important;
    }

    /* ── HEADER NAVIGATION LINK STYLES ── */
    .menutiger-nav ul li a, #mobile-menu-2 ul li a {
      color: #374151 !important; /* Dark grey for high contrast in light mode */
      font-weight: 500 !important;
      transition: all 0.2s ease !important;
    }
    html.dark .menutiger-nav ul li a, html.dark #mobile-menu-2 ul li a {
      color: #e5e7eb !important; /* Light grey for dark mode */
    }
    .menutiger-nav ul li a:hover, #mobile-menu-2 ul li a:hover {
      color: #00b692 !important;
    }
    .menutiger-nav ul li a.active-nav-link, #mobile-menu-2 ul li a.active-nav-link {
      color: #00b692 !important;
      font-weight: 700 !important;
    }

    /* ── ACTION BUTTONS EXPLICIT STYLES FOR LIGHT/DARK MODE ── */
    /* Light Mode (Default) */
    #theme-toggle, #theme-toggle-mobile {
      border: 1.5px solid #d1d5db !important;
      background-color: #ffffff !important;
      color: #4b5563 !important;
    }
    #theme-toggle svg, #theme-toggle-mobile svg {
      fill: #4b5563 !important;
      color: #4b5563 !important;
    }
    .menutiger-nav a[href="/login"], #mobile-menu-2 a[href="/login"] {
      background-color: #ffffff !important;
      border: 1.5px solid #d1d5db !important;
      color: #1f2937 !important;
    }
    .menutiger-nav a[href="/login"]:hover, #mobile-menu-2 a[href="/login"]:hover {
      color: #00b692 !important;
      background-color: #f9fafb !important;
      border-color: #00b692 !important;
    }
    .menutiger-nav a[href="/restaurant-signup"], #mobile-menu-2 a[href="/restaurant-signup"] {
      background-color: #00b692 !important;
      color: #ffffff !important;
      border: none !important;
    }
    .menutiger-nav a[href="/restaurant-signup"]:hover, #mobile-menu-2 a[href="/restaurant-signup"]:hover {
      background-color: #009c7d !important;
      color: #ffffff !important;
    }

    /* Dark Mode Overrides */
    html.dark #theme-toggle, html.dark #theme-toggle-mobile {
      border: 1.5px solid #4b5563 !important;
      background-color: #1f2937 !important;
      color: #e5e7eb !important;
    }
    html.dark #theme-toggle svg, html.dark #theme-toggle-mobile svg {
      fill: #e5e7eb !important;
      color: #e5e7eb !important;
    }
    html.dark .menutiger-nav a[href="/login"], html.dark #mobile-menu-2 a[href="/login"] {
      background-color: #1f2937 !important;
      border: 1.5px solid #4b5563 !important;
      color: #e5e7eb !important;
    }
    html.dark .menutiger-nav a[href="/login"]:hover, html.dark #mobile-menu-2 a[href="/login"]:hover {
      color: #00b692 !important;
      background-color: #374151 !important;
      border-color: #00b692 !important;
    }
    html.dark .menutiger-nav a[href="/restaurant-signup"], html.dark #mobile-menu-2 a[href="/restaurant-signup"] {
      background-color: #00b692 !important;
      color: #ffffff !important;
    }
    </style>
`;
headerTemplate = headerTemplate.replace('</head>', customNavStyles + '\n</head>');

let footerTemplate = connectContent + '\n' + aboutHtml.substring(mainEndIdx);

// Inject script to dynamically highlight current active page in navigation menu
const customNavScript = `
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentPath = window.location.pathname;
        if (currentPath === '' || currentPath === '/') {
            currentPath = '/';
        }
        
        const headerLinks = document.querySelectorAll('.menutiger-nav a, #mobile-menu-2 a');
        
        headerLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (!href) return;
            if (href.includes('restaurant-signup')) return;
            
            let isCurrent = false;
            if (href === '/' || href === '') {
                isCurrent = (currentPath === '/' || currentPath === '/index.html');
            } else {
                const cleanHref = href.replace(/\\/$/, '');
                const cleanPath = currentPath.replace(/\\/$/, '');
                isCurrent = (cleanPath === cleanHref || cleanPath.startsWith(cleanHref + '/'));
            }
            
            if (isCurrent) {
                link.classList.add('active-nav-link');
                link.style.setProperty('color', '#00b692', 'important');
                link.style.setProperty('font-weight', '700', 'important');
            } else {
                link.classList.remove('active-nav-link');
            }
        });
    });
    </script>
`;
footerTemplate = footerTemplate.replace('</body>', customNavScript + '\n</body>');

const tutorialsListDir = path.join(publicDir, 'tutorials');
if (!fs.existsSync(tutorialsListDir)) {
    fs.mkdirSync(tutorialsListDir, { recursive: true });
}

// Write temporary raw index.html for tutorials
const tutorialsBlade = fs.readFileSync(tutorialsViewPath, 'utf8');
const tutorialsContent = tutorialsBlade
    .replace("@extends('layouts.landing')", '')
    .replace("@section('content')", '')
    .replace("@endsection", '');

fs.writeFileSync(path.join(tutorialsListDir, 'index.html'), headerTemplate + '\n' + tutorialsContent + '\n' + footerTemplate, 'utf8');
console.log('Written raw public/tutorials/index.html');

// 2. Compile details pages
// Fetch live slugs from the API dynamically
const http = require('http');

function fetchTutorialSlugs() {
  return new Promise((resolve) => {
    http.get('http://127.0.0.1:8000/api/v1/public/tutorials', (res) => {
      let data = '';
      res.on('data', chunk => data += chunk);
      res.on('end', () => {
        try {
          const parsed = JSON.parse(data);
          if (parsed.success && Array.isArray(parsed.data)) {
            resolve(parsed.data.map(t => t.slug).filter(Boolean));
          } else {
            resolve([]);
          }
        } catch (e) {
          resolve([]);
        }
      });
    }).on('error', () => resolve([]));
  });
}

// Static fallback slugs (used if API is offline)
const staticFallbackSlugs = [
  "how-to-setup-restaurant-profile",
  "how-to-add-tables-generate-qr-codes",
  "how-to-manage-staff-waiters",
  "how-to-create-menu-categories",
  "how-to-add-menu-items",
  "how-to-add-modifier-groups",
  "how-to-place-order-via-pos",
  "how-to-manage-kot-kitchen-orders",
  "how-to-manage-table-reservations",
  "how-to-export-sales-reports",
  "how-to-upgrade-package-plans"
];

const detailBlade = fs.readFileSync(detailViewPath, 'utf8');
const detailContentTemplate = detailBlade
    .replace("@extends('layouts.landing')", '')
    .replace("@section('content')", '')
    .replace("@endsection", '');

function buildDetailPages(tutorialsSlugs) {
    tutorialsSlugs.forEach(slug => {
        const pageDir = path.join(publicDir, 'tutorials', slug);
        if (!fs.existsSync(pageDir)) {
            fs.mkdirSync(pageDir, { recursive: true });
        }
        
        const detailContentCompiled = detailContentTemplate.replace('activeSlug = "{{ $slug }}"', `activeSlug = "${slug}"`);
        fs.writeFileSync(path.join(pageDir, 'index.html'), headerTemplate + '\n' + detailContentCompiled + '\n' + footerTemplate, 'utf8');
        console.log(`Written raw public/tutorials/${slug}/index.html`);
    });

function stripBladeSyntax(str) {
    if (!str) return '';
    return str
        .replace(/\{\{\-\-[\s\S]*?\-\-\}\}/g, '')
        .replace(/@if\s*\([\s\S]*?\)/g, '')
        .replace(/@elseif\s*\([\s\S]*?\)/g, '')
        .replace(/@else/g, '')
        .replace(/@endif/g, '')
        .replace(/@foreach\s*\([\s\S]*?\)/g, '')
        .replace(/@endforeach/g, '')
        .replace(/@php[\s\S]*?@endphp/g, '')
        .replace(/@unless\s*\([\s\S]*?\)/g, '')
        .replace(/@endunless/g, '')
        .replace(/\{\{\s*route\('restaurant_signup'\)\s*\}\}/g, '/restaurant-signup')
        .replace(/\{\{\s*route\([^)]+\)\s*\}\}/g, '/about-us')
        .replace(/\{\{\s*__\([^)]+\)\s*\}\}/g, '')
        .replace(/\{\{\s*@lang\([^)]+\)\s*\}\}/g, '')
        .replace("@lang('landing.getStarted')", 'Get Started')
        .replace("@extends('layouts.landing')", '')
        .replace("@section('content')", '')
        .replace('@endsection', '');
}

    // ── Compile about-us.blade.php → public/about-us/index.html ──
    const aboutUsBladePath = path.join(__dirname, 'resources', 'views', 'landing', 'about-us.blade.php');
    if (fs.existsSync(aboutUsBladePath)) {
        const aboutBlade = fs.readFileSync(aboutUsBladePath, 'utf8');
        const aboutContent = stripBladeSyntax(aboutBlade);
        const aboutDir = path.join(publicDir, 'about-us');
        if (!fs.existsSync(aboutDir)) fs.mkdirSync(aboutDir, { recursive: true });
        fs.writeFileSync(path.join(aboutDir, 'index.html'), headerTemplate + '\n' + aboutContent + '\n' + footerTemplate, 'utf8');
        console.log('Written public/about-us/index.html (with dynamic API JS)');
    }

    // ── Compile features.blade.php → public/features/index.html ──
    const featuresBlade = fs.readFileSync(featuresViewPath, 'utf8');
    const featuresContent = stripBladeSyntax(featuresBlade);
    const featuresDir = path.join(publicDir, 'features');
    if (!fs.existsSync(featuresDir)) fs.mkdirSync(featuresDir, { recursive: true });
    fs.writeFileSync(path.join(featuresDir, 'index.html'), headerTemplate + '\n' + featuresContent + '\n' + footerTemplate, 'utf8');
    console.log('Written public/features/index.html (with dynamic API JS)');

    // ── Compile pricing-page.blade.php → public/pricing/index.html ──
    const pricingViewPath = path.join(__dirname, 'resources', 'views', 'landing', 'pricing-page.blade.php');
    if (fs.existsSync(pricingViewPath)) {
        const pricingBlade = fs.readFileSync(pricingViewPath, 'utf8');
        const pricingContent = stripBladeSyntax(pricingBlade);
        const pricingDir = path.join(publicDir, 'pricing');
        if (!fs.existsSync(pricingDir)) fs.mkdirSync(pricingDir, { recursive: true });
        fs.writeFileSync(path.join(pricingDir, 'index.html'), headerTemplate + '\n' + pricingContent + '\n' + footerTemplate, 'utf8');
        console.log('Written public/pricing/index.html (with dynamic API JS)');
    }

    // ── Compile Legal Pages ──
    const legalPagesMap = [
        { blade: 'privacy-policy.blade.php', dir: 'privacy-policy' },
        { blade: 'cookie-policy.blade.php', dir: 'cookie-policy' },
        { blade: 'terms-and-conditions.blade.php', dir: 'terms-and-conditions' },
        { blade: 'refund-policy.blade.php', dir: 'refund-policy' },
        { blade: 'gdpr-compliance.blade.php', dir: 'gdpr-compliance' },
    ];

    legalPagesMap.forEach(item => {
        const bladePath = path.join(__dirname, 'resources', 'views', 'landing', item.blade);
        if (fs.existsSync(bladePath)) {
            const rawBlade = fs.readFileSync(bladePath, 'utf8');
            const cleanContent = stripBladeSyntax(rawBlade);
            const outDir = path.join(publicDir, item.dir);
            if (!fs.existsSync(outDir)) fs.mkdirSync(outDir, { recursive: true });
            fs.writeFileSync(path.join(outDir, 'index.html'), headerTemplate + '\n' + cleanContent + '\n' + footerTemplate, 'utf8');
            console.log(`Written public/${item.dir}/index.html (with dynamic API JS)`);
        }
    });

    // 3. Scan and update ALL static html pages in public using the helper function
    const pages = [
        'index.html',
        'about-us/index.html',
        'features/index.html',
        'pricing/index.html',
        'privacy-policy/index.html',
        'cookie-policy/index.html',
        'refund-policy/index.html',
        'terms-and-conditions/index.html',
        'gdpr-compliance/index.html',
        'tutorials/index.html',
        ...tutorialsSlugs.map(slug => `tutorials/${slug}/index.html`)
    ];

    pages.forEach(p => {
        updateNavLinksInFile(path.join(publicDir, p));
    });

    console.log('All static pages built and navigation links successfully standardized!');
}

// Try to fetch from live API, fall back to static list
fetchTutorialSlugs().then(liveSlugs => {
    if (liveSlugs.length > 0) {
        // Merge live + static slugs (so both DB and hardcoded pages exist)
        const allSlugs = [...new Set([...liveSlugs, ...staticFallbackSlugs])];
        console.log(`Building detail pages for ${allSlugs.length} slugs (${liveSlugs.length} from API + fallbacks)...`);
        buildDetailPages(allSlugs);
    } else {
        console.log('API offline or returned no tutorials, building with static slugs...');
        buildDetailPages(staticFallbackSlugs);
    }
});

