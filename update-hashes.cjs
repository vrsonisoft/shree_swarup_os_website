const fs = require('fs');
const path = require('path');

const publicDir = path.join(__dirname, 'public');
const manifestPath = path.join(publicDir, 'build', 'manifest.json');

if (!fs.existsSync(manifestPath)) {
    console.error('Error: manifest.json not found at ' + manifestPath);
    process.exit(1);
}

const manifest = JSON.parse(fs.readFileSync(manifestPath, 'utf8'));

const cssFile = manifest['resources/css/app.css']?.file;
const jsFile = manifest['resources/js/app.js']?.file;

if (!cssFile || !jsFile) {
    console.error('Error: app.css or app.js entry not found in manifest.json');
    process.exit(1);
}

console.log(`Found css file: ${cssFile}`);
console.log(`Found js file: ${jsFile}`);

function getAllHtmlFiles(dirPath, arrayOfFiles = []) {
    const files = fs.readdirSync(dirPath);

    files.forEach((file) => {
        const fullPath = path.join(dirPath, file);
        if (fs.statSync(fullPath).isDirectory()) {
            if (file !== 'build') { // Skip build directory
                arrayOfFiles = getAllHtmlFiles(fullPath, arrayOfFiles);
            }
        } else if (file.endsWith('.html')) {
            arrayOfFiles.push(fullPath);
        }
    });

    return arrayOfFiles;
}

const htmlFiles = getAllHtmlFiles(publicDir);
console.log(`Found ${htmlFiles.length} HTML files to update.`);

htmlFiles.forEach((filePath) => {
    let content = fs.readFileSync(filePath, 'utf8');
    let original = content;

    // Replace app-*.css reference (e.g. /build/assets/app-Ds0Wv3SD.css)
    content = content.replace(/\/build\/assets\/app-[A-Za-z0-9_-]+\.css/g, `/build/${cssFile}`);
    // Replace app-*.js reference (e.g. /build/assets/app-CGg7GH1Y.js)
    content = content.replace(/\/build\/assets\/app-[A-Za-z0-9_-]+\.js/g, `/build/${jsFile}`);

    if (content !== original) {
        fs.writeFileSync(filePath, content, 'utf8');
        console.log(`Updated assets in: ${path.relative(publicDir, filePath)}`);
    }
});

console.log('Asset hash replacement completed successfully!');
