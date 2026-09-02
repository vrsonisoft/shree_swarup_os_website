const fs = require('fs');
const path = require('path');

const aboutPath = path.join(__dirname, 'public', 'about-us', 'index.html');
const aboutHtml = fs.readFileSync(aboutPath, 'utf8');

const startMarker = '<div class="top-contact-bar">';
const endMarker = '<main class="flex-grow">';

const startIdx = aboutHtml.indexOf(startMarker);
const endIdx = aboutHtml.indexOf(endMarker);

if (startIdx === -1 || endIdx === -1) {
  console.error('Markers not found in about-us/index.html');
  process.exit(1);
}

const baseHeaderBlock = aboutHtml.substring(startIdx, endIdx);

const cssStartMarker = '/* Mobile Drawer Buttons */';
const cssEndMarker = '</style>';
const cssStartIdx = aboutHtml.indexOf(cssStartMarker);
const cssEndIdx = aboutHtml.indexOf(cssEndMarker, cssStartIdx);
const drawerCss = aboutHtml.substring(cssStartIdx, cssEndIdx);

const filesToUpdate = [
  { path: 'public/features/index.html', active: '/features' },
  { path: 'public/pricing/index.html', active: '/pricing' },
  { path: 'public/tutorials/index.html', active: '/tutorials' },
  { path: 'public/privacy-policy/index.html', active: '' },
  { path: 'public/terms-and-conditions/index.html', active: '' },
  { path: 'public/cookie-policy/index.html', active: '' },
  { path: 'public/refund-policy/index.html', active: '' },
  { path: 'public/gdpr-compliance/index.html', active: '' }
];

filesToUpdate.forEach(fileInfo => {
  const filePath = path.join(__dirname, fileInfo.path);
  if (!fs.existsSync(filePath)) return;

  let html = fs.readFileSync(filePath, 'utf8');

  // Insert drawer CSS if missing
  if (!html.includes('/* Mobile Drawer Buttons */')) {
    const styleCloseIdx = html.indexOf('</style>');
    if (styleCloseIdx !== -1) {
      html = html.substring(0, styleCloseIdx) + drawerCss + '\n' + html.substring(styleCloseIdx);
    }
  } else {
    const exCssStart = html.indexOf('/* Mobile Drawer Buttons */');
    const exCssEnd = html.indexOf('</style>', exCssStart);
    if (exCssStart !== -1 && exCssEnd !== -1) {
      html = html.substring(0, exCssStart) + drawerCss + html.substring(exCssEnd);
    }
  }

  let headerBlock = baseHeaderBlock;

  // Custom active link replacement
  if (fileInfo.active && fileInfo.active !== '/about-us') {
    // Reset About Us active style
    headerBlock = headerBlock.replace(
      'href="/about-us" class="transition-all duration-300 block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:p-0 text-[14px] text-[#00b692] font-semibold"',
      'href="/about-us" class="transition-all duration-300 block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:p-0 text-[14px] text-gray-700 font-medium hover:text-[#00b692] dark:text-gray-200 dark:hover:text-[#00b692]"'
    );

    // Set page active style in desktop nav
    headerBlock = headerBlock.replace(
      `href="${fileInfo.active}" class="transition-all duration-300 block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:p-0 text-gray-700 hover:text-[#00b692] dark:text-gray-200 dark:hover:text-[#00b692] text-[14px]"`,
      `href="${fileInfo.active}" class="transition-all duration-300 block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:p-0 text-[14px] text-[#00b692] font-semibold"`
    );

    // Set active class in drawer
    headerBlock = headerBlock.replace(
      `href="${fileInfo.active}" class="drawer-nav-link block py-3.5 text-[15px] font-medium transition"`,
      `href="${fileInfo.active}" class="drawer-nav-link active-nav-link block py-3.5 text-[15px] font-semibold transition"`
    );
  }

  const fStartIdx = html.indexOf(startMarker);
  const fEndIdx = html.indexOf(endMarker);

  if (fStartIdx !== -1 && fEndIdx !== -1) {
    html = html.substring(0, fStartIdx) + headerBlock + html.substring(fEndIdx);
    fs.writeFileSync(filePath, html, 'utf8');
    console.log(`✅ Updated header & active link in ${fileInfo.path}`);
  } else {
    console.warn(`⚠️ Markers not found in ${fileInfo.path}`);
  }
});
