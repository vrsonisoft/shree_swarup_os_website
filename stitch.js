const fs = require('fs');
const path = require('path');

const aboutUsPath = path.join(__dirname, 'public', 'about-us', 'index.html');
const tutorialsViewPath = path.join(__dirname, 'resources', 'views', 'landing', 'tutorials.blade.php');
const outputPath = path.join(__dirname, 'public', 'tutorials', 'index.html');

if (!fs.existsSync(path.dirname(outputPath))) {
    fs.mkdirSync(path.dirname(outputPath), { recursive: true });
}

// 1. Read static about-us page as template
let aboutHtml = fs.readFileSync(aboutUsPath, 'utf8');

// 2. Extract header and footer
const mainStartTag = '<main class="flex-grow">';
const mainEndTag = '</main>';

const mainStartIdx = aboutHtml.indexOf(mainStartTag);
const mainEndIdx = aboutHtml.indexOf(mainEndTag);

if (mainStartIdx === -1 || mainEndIdx === -1) {
    console.error('Could not find main content block in template');
    process.exit(1);
}

let header = aboutHtml.substring(0, mainStartIdx + mainStartTag.length);
let footer = aboutHtml.substring(mainEndIdx);

// 3. Add "Learn" links to the navigation in header
// For mobile menu: add after "About Us" link
const mobileAboutUsLink = 'href="/about-us"\n                                    class="block py-2 pr-4 pl-3 text-gray-700 rounded dark:text-white">About Us</a>';
const mobileTutorialsLink = `href="/about-us"
                                    class="block py-2 pr-4 pl-3 text-gray-700 rounded dark:text-white">About Us</a>
                             </li>
                             <li>
                                 <a href="/tutorials"
                                     class="block py-2 pr-4 pl-3 text-gray-700 rounded dark:text-white">Learn</a>`;

// For desktop menu: add after "About Us" link
const desktopAboutUsLink = 'href="/about-us" class="transition-all duration-300 block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:p-0 text-menutiger-green dark:text-teal-400 font-semibold"\n                                    aria-current="page">About Us</a>';
// Note: We'll change the highlight color class of about-us to text-gray-600 because we are now on tutorials page, and highlight tutorials instead.
const desktopAboutUsLinkUnactive = 'href="/about-us" class="transition-all duration-300 block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:p-0 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"\n                                    aria-current="page">About Us</a>';

const desktopTutorialsLink = `${desktopAboutUsLinkUnactive}
                             </li>
                             <li>
                                 <a href="/tutorials" class="transition-all duration-300 block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:p-0 text-menutiger-green dark:text-teal-400 font-semibold"
                                     aria-current="page">Learn</a>`;

header = header.replace(mobileAboutUsLink, mobileTutorialsLink);
header = header.replace(desktopAboutUsLink, desktopTutorialsLink);

// Change title of the page
header = header.replace('<title>ShreeSwarupOS</title>', '<title>Help & Tutorials - ShreeSwarupOS</title>');

// 4. Read tutorials blade view and strip out Blade directives (@extends, @section, etc.)
let tutorialsBlade = fs.readFileSync(tutorialsViewPath, 'utf8');

// Strip @extends and @section
let bodyContent = tutorialsBlade
    .replace("@extends('layouts.landing')", '')
    .replace("@section('content')", '')
    .replace("@endsection", '');

// 5. Combine header, tutorials content, and footer
const finalHtml = header + '\n' + bodyContent + '\n' + footer;

// 6. Save compiled static HTML
fs.writeFileSync(outputPath, finalHtml, 'utf8');
console.log('Successfully compiled tutorials static page to public/tutorials/index.html!');
