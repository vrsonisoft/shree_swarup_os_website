const fs = require('fs');
const path = require('path');

const publicDir = path.join(__dirname, 'public');

function getAllHtmlFiles(dirPath, arrayOfFiles = []) {
    const files = fs.readdirSync(dirPath);

    files.forEach((file) => {
        const fullPath = path.join(dirPath, file);
        if (fs.statSync(fullPath).isDirectory()) {
            arrayOfFiles = getAllHtmlFiles(fullPath, arrayOfFiles);
        } else if (file.endsWith('.html')) {
            arrayOfFiles.push(fullPath);
        }
    });

    return arrayOfFiles;
}

const htmlFiles = getAllHtmlFiles(publicDir);

console.log(`Found ${htmlFiles.length} HTML files in public/ directory.`);

htmlFiles.forEach((filePath) => {
    let content = fs.readFileSync(filePath, 'utf8');
    let original = content;

    // Add Tailwind CSS & Flowbite CDN if missing
    if (!content.includes('cdn.tailwindcss.com')) {
        content = content.replace(
            '</head>',
            '    <script src="https://cdn.tailwindcss.com"></script>\n    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />\n    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>\n</head>'
        );
    }

    // Add Montserrat font if missing
    if (!content.includes('family=Montserrat')) {
        content = content.replace(
            /family=Poppins:wght@[^"]*/,
            'family=Montserrat:wght@700;800;900&family=Poppins:wght@400;500;600;700;800;900'
        );
    }

    // 1. Replace desktop header logo block
    const desktopLogoRegex = /<a href="\/" class="flex items-center gap-[^"]* app-logo">[\s\S]*?<\/a>/g;
    const newDesktopLogo = `<a href="/" class="flex items-center gap-3 app-logo" style="display:inline-flex; align-items:center; text-decoration:none;">
                        <img src="/img/logo.png" class="w-[52px] h-[52px] object-contain rounded-md shrink-0 shadow-sm" style="height:52px; width:52px; max-height:52px; max-width:52px; object-fit:contain; border-radius:6px; flex-shrink:0;" alt="ShreeSwarupOS Logo" />
                        <span class="logo-text" style="font-size:22px; font-family:'Montserrat', 'Plus Jakarta Sans', sans-serif; font-weight:900; letter-spacing:0.5px; text-transform:uppercase; display:inline-flex; align-items:center; line-height:1; margin-left:12px;">
                            <span style="color:#00B692; font-weight:900;">SHREESWARUP</span><span style="color:#9CB080; font-weight:900;">OS</span>
                        </span>
                    </a>`;
    content = content.replace(desktopLogoRegex, newDesktopLogo);

    // Replace footer logo block
    const footerLogoRegex = /<a href="\/" class="footer-logo"[\s\S]*?<\/a>/g;
    const newFooterLogo = `<a href="/" class="footer-logo" style="display:inline-flex; align-items:center; text-decoration:none;">
                                <img src="/img/logo.png" style="height:52px; width:52px; max-height:52px; max-width:52px; object-fit:contain; border-radius:10px; flex-shrink:0;" alt="ShreeSwarupOS Logo" />
                                <span class="logo-text" style="font-size:22px; font-family:'Montserrat', 'Plus Jakarta Sans', sans-serif; font-weight:900; letter-spacing:0.5px; text-transform:uppercase; display:inline-flex; align-items:center; line-height:1; margin-left:12px;">
                                    <span style="color:#00B692; font-weight:900;">SHREESWARUP</span><span style="color:#9CB080; font-weight:900;">OS</span>
                                </span>
                            </a>`;
    content = content.replace(footerLogoRegex, newFooterLogo);

    // 2. Replace title occurrences of TableTrack / MenuTiger
    content = content.replace(/<title>TableTrack<\/title>/gi, '<title>ShreeSwarupOS - Digital Menu & Restaurant Management Platform</title>');
    content = content.replace(/<title>Help & Tutorials - TableTrack<\/title>/gi, '<title>Help & Tutorials - ShreeSwarupOS</title>');
    content = content.replace(/TableTrack/g, 'ShreeSwarupOS');
    content = content.replace(/MENU TIGER/g, 'ShreeSwarupOS');
    content = content.replace(/MENUTIGER/g, 'ShreeSwarupOS');
    content = content.replace(/MenuTiger/g, 'ShreeSwarupOS');

    // 3. Fix copyright line in footer
    content = content.replace(/© (\d{4}) ShreeSwarupOS/g, '© $1 ShreeSwarupOS');

    if (content !== original) {
        fs.writeFileSync(filePath, content, 'utf8');
        console.log(`Updated brand in: ${path.relative(__dirname, filePath)}`);
    }
});

console.log('Brand update completed for all static HTML files!');
