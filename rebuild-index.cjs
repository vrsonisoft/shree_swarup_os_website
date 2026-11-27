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
// Remove @extends, @section, @endsection, schema blocks, etc.
blade = blade.replace(/@extends\([^)]+\)\s*/g, '');
blade = blade.replace(/@section\('schema'\)[\s\S]*?@endsection\s*/g, '');
blade = blade.replace(/@section\([^)]+\)\s*/g, '');
blade = blade.replace(/@endsection\s*/g, '');

// Remove Blade comments {{-- ... --}}
blade = blade.replace(/\{\{--[\s\S]*?--\}\}/g, '');

// ── Replace $frontDetails variables ──
blade = blade.replace(/\{\{\s*\$frontDetails->header_title\s*\?\?\s*__\('landing\.heroTitle'\)\s*\}\}/g,
  'Restaurant POS software made simple');

blade = blade.replace(/\{\{\s*\$frontDetails->header_description\s*\?\?\s*__\('landing\.heroSubTitle'\)\s*\}\}/g,
  'Easily manage orders, menus, and tables in one place. Save time, reduce errors, and grow your restaurant business.');

blade = blade.replace(/\{\{\s*\$frontDetails->image_url\s*\?\?\s*asset\('landing\/dashboard\.png'\)\s*\}\}/g,
  '/landing/dashboard.png');

blade = blade.replace(/\{\{\s*\$frontDetails->video_thumbnail_url\s*\?\?\s*asset\('landing\/dashboard\.png'\)\s*\}\}/g,
  '/landing/dashboard.png');

// ── Replace route() calls ──
blade = blade.replace(/\{\{\s*route\('restaurant_signup'\)\s*\}\}/g, 'https://console.chowchak.com/restaurant-signup');

// ── Replace $revs @php block + @foreach ──
const revData = [
  ['https://i.pravatar.cc/96?img=5','Abby G.','Restaurant Owner','We increased our average order size by 20% when we launched our QR code dine-in ordering. It\'s very easy to implement, and our customers love fast and convenient ordering.'],
  ['https://i.pravatar.cc/96?img=15','Peter P.','Head of Marketing','I was able to save both money and time. I recommend ChowChak POS to those who have restaurants and small food businesses.'],
  ['https://i.pravatar.cc/96?img=20','Adrian W.','General Manager','I recommend ChowChak POS for anyone looking to expand their restaurant business and add a digital edge. Easy, user-friendly, and highly cost-effective.'],
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
