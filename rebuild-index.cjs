/**
 * rebuild-index.cjs
 * Rebuilds public/index.html from dynamic-index.blade.php
 * by replacing all Blade variables with static values.
 */
const fs = require('fs');
const path = require('path');

const root = __dirname;

// ── Source files ──
const bladePath   = path.join(root, 'resources', 'views', 'landing', 'dynamic-index.blade.php');
const aboutPath   = path.join(root, 'public', 'about-us', 'index.html');
const connectPath = path.join(root, 'resources', 'views', 'sections', 'connect.blade.php');
const outPath     = path.join(root, 'public', 'index.html');

// ── Read sources ──
let blade   = fs.readFileSync(bladePath,   'utf8');
let aboutHtml = fs.readFileSync(aboutPath, 'utf8');
let connectHtml = fs.existsSync(connectPath) ? fs.readFileSync(connectPath, 'utf8') : '';

// ── Extract header & footer from about-us/index.html ──
const mainStartTag = '<main class="flex-grow">';
const mainEndTag   = '</main>';
const mainStartIdx = aboutHtml.indexOf(mainStartTag);
const mainEndIdx   = aboutHtml.indexOf(mainEndTag);

if (mainStartIdx === -1 || mainEndIdx === -1) {
  console.error('Could not find <main> in about-us/index.html');
  process.exit(1);
}

const headerTemplate = aboutHtml.substring(0, mainStartIdx + mainStartTag.length);
const footerTemplate = aboutHtml.substring(mainEndIdx); // includes </main>

// ── Strip Blade directives ──
// Remove @extends, @section, @endsection
blade = blade.replace(/@extends\([^)]+\)\s*/g, '');
blade = blade.replace(/@section\('content'\)\s*/g, '');
blade = blade.replace(/@endsection\s*/g, '');

// Remove Blade comments {{-- ... --}}
blade = blade.replace(/\{\{--[\s\S]*?--\}\}/g, '');

// ── Replace $frontDetails variables ──
blade = blade.replace(/\{\{\s*\$frontDetails->header_title\s*\?\?\s*__\('landing\.heroTitle'\)\s*\}\}/g,
  'Restaurant POS software made simple!');

blade = blade.replace(/\{\{\s*\$frontDetails->header_description\s*\?\?\s*__\('landing\.heroSubTitle'\)\s*\}\}/g,
  'Easily manage orders, menus, and tables in one place. Save time, reduce errors, and grow your restaurant business.');

blade = blade.replace(/\{\{\s*\$frontDetails->image_url\s*\?\?\s*asset\('landing\/dashboard\.png'\)\s*\}\}/g,
  '/landing/dashboard.png');

blade = blade.replace(/\{\{\s*\$frontDetails->video_thumbnail_url\s*\?\?\s*asset\('landing\/dashboard\.png'\)\s*\}\}/g,
  '/landing/dashboard.png');

// ── Replace route() calls ──
blade = blade.replace(/\{\{\s*route\('restaurant_signup'\)\s*\}\}/g, '/restaurant-signup');

// ── Replace $love @php block + @foreach ──
const loveData = [
  ['https://images.unsplash.com/photo-1556742031-c6961e8560b0?w=500&q=80','Transition to contactless ordering','Go paperless and embrace contactless ordering and payments using a restaurant QR code menu for a cleaner and safer experience.','EFFICIENCY'],
  ['https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=500&q=80','Easy-to-update menu items and prices','Modify menus and prices in real-time with an interactive restaurant menu. Keep item availability accurate.','MENU UPDATES'],
  ['https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=500&q=80','Reduce wait times','Our streamlined ordering system enhances efficiency with faster service, keeping customers happy and return-rates high.','FAST SERVICE'],
  ['https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=500&q=80','Create cost-effective solutions','Our QR code menu is a cost-effective solution that reduces the need for printing and minimizes staff workload.','COST SAVINGS'],
  ['https://images.unsplash.com/photo-1600891964092-4316c288032e?w=500&q=80','Increase order accuracy','Bid farewell to incorrect dishes as a menu QR code guarantees precision, enhancing overall customer satisfaction.','ACCURACY'],
  ['https://images.unsplash.com/photo-1533777857889-4be7c70b33f7?w=500&q=80','Enhance customer experience','Elevate the dining experience with our customer-friendly interactive restaurant menu features.','ENGAGEMENT'],
];

const loveHtml = loveData.map(c => `
      <div class="premium-love-card">
        <div class="love-image-container">
          <span class="love-badge">${c[3]}</span>
          <img src="${c[0]}" alt="${c[1]}">
        </div>
        <div class="love-body">
          <h3 style="font-size: 15px; font-weight: 700; color: var(--dark); margin: 0 0 10px; line-height: 1.4;">${c[1]}</h3>
          <p style="font-size: 13px; color: var(--gray); line-height: 1.65; margin: 0;">${c[2]}</p>
        </div>
      </div>`).join('\n');

// Replace @php $love block + @foreach loop
blade = blade.replace(
  /@php\s*\$love\s*=\s*\[[\s\S]*?\];\s*@endphp\s*<div class="love-grid">\s*@foreach\(\$love as \$c\)[\s\S]*?@endforeach\s*<\/div>/,
  `<div class="love-grid">${loveHtml}\n    </div>`
);

// ── Replace $tmpls @php block + @foreach ──
const tmplData = [
  ['📋','Menu Templates','Dine-in / Room service','FREE'],
  ['🥤','Coaster Designs','Cup & Glass branding','PRO'],
  ['🖼️','Poster Layouts','Promotional wall flyers','FREE'],
  ['🎪','Table Tent Formats','QR standees','FREE'],
  ['🔖','Stickers & Labels','Delivery box branding','PRO'],
  ['🪧','A-Frame Designs','Sidewalk signage','FREE'],
  ['💳','Business Cards','Executive networking','FREE'],
  ['🎁','Gift Cards','Discount vouchers','PRO'],
];

const tmplHtml = tmplData.map(t => `
      <div class="premium-tmpl-card">
        <div class="tmpl-preview-box">
          <span class="tmpl-badge">${t[3]}</span>
          ${t[0]}
        </div>
        <div class="tmpl-info">
          <h4>${t[1]}</h4>
          <span>${t[2]}</span>
        </div>
      </div>`).join('\n');

blade = blade.replace(
  /@php\s*\$tmpls\s*=\s*\[[\s\S]*?\];\s*@endphp\s*<div class="premium-tmpl-grid">\s*@foreach\(\$tmpls as \$t\)[\s\S]*?@endforeach\s*<\/div>/,
  `<div class="premium-tmpl-grid">${tmplHtml}\n    </div>`
);

// ── Replace $revs @php block + @foreach ──
const revData = [
  ['https://i.pravatar.cc/96?img=5','Abby G.','Restaurant Owner','We increased our average order size by 20% when we launched our QR code dine-in ordering. It\'s very easy to implement, and our customers love fast and convenient ordering.'],
  ['https://i.pravatar.cc/96?img=15','Peter P.','Head of Marketing','I was able to save both money and time… I recommend MENU TIGER to those who have restaurants and small food businesses. Two thumbs up!'],
  ['https://i.pravatar.cc/96?img=20','Adrian W.','General Manager','I recommend MENU TIGER for anyone looking to expand their restaurant business and add a digital edge. Easy, user-friendly, and highly cost-effective.'],
];

const revHtml = revData.map(r => `
      <div class="review-card" style="text-align:left;">
        <div class="reviewer">
          <img src="${r[0]}" alt="${r[1]}">
          <div>
            <div class="reviewer-name">${r[1]}</div>
            <div class="reviewer-role">${r[2]}</div>
          </div>
        </div>
        <div class="stars">★★★★★</div>
        <p class="review-text">"${r[3]}"</p>
      </div>`).join('\n');

blade = blade.replace(
  /@php\s*\$revs\s*=\s*\[[\s\S]*?\];\s*@endphp\s*<div class="reviews-grid">\s*@foreach\(\$revs as \$r\)[\s\S]*?@endforeach\s*<\/div>/,
  `<div class="reviews-grid">${revHtml}\n    </div>`
);

// ── Clean up any remaining @php / @endphp ──
blade = blade.replace(/@php[\s\S]*?@endphp/g, '');
blade = blade.replace(/@foreach[\s\S]*?@endforeach/g, '');
blade = blade.replace(/@if[\s\S]*?@endif/g, '');

// ── Remove any leftover {{ }} expressions ──
blade = blade.replace(/\{\{[^}]*\}\}/g, '');

// ── Assemble final HTML ──
// header already ends with <main class="flex-grow">
// footer starts with </main>
const finalHtml = headerTemplate + '\n' + blade.trim() + '\n' + connectHtml + '\n' + footerTemplate;

fs.writeFileSync(outPath, finalHtml, 'utf8');
console.log('✅ public/index.html rebuilt successfully!');
console.log('   Size:', (finalHtml.length / 1024).toFixed(1), 'KB');

// Verify no Blade syntax remains
const remaining = (finalHtml.match(/\{\{|\@foreach|\@php|\@if/g) || []);
if (remaining.length > 0) {
  console.warn('⚠️  Warning: Some Blade syntax may remain:', remaining.length, 'occurrences');
} else {
  console.log('✅ No Blade syntax remaining - clean static HTML!');
}
