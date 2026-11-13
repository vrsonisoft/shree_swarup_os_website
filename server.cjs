const http = require('http');
const fs = require('fs');
const path = require('path');

const PUBLIC_DIR = path.join(__dirname, 'public');
const PORT = process.env.PORT || 8080;

const MIME_TYPES = {
    '.html': 'text/html; charset=utf-8',
    '.css': 'text/css; charset=utf-8',
    '.js': 'application/javascript; charset=utf-8',
    '.mjs': 'application/javascript; charset=utf-8',
    '.json': 'application/json; charset=utf-8',
    '.png': 'image/png',
    '.jpg': 'image/jpeg',
    '.jpeg': 'image/jpeg',
    '.gif': 'image/gif',
    '.svg': 'image/svg+xml',
    '.ico': 'image/x-icon',
    '.webp': 'image/webp',
    '.woff': 'font/woff',
    '.woff2': 'font/woff2',
    '.ttf': 'font/ttf',
    '.eot': 'application/vnd.ms-fontobject',
    '.txt': 'text/plain; charset=utf-8',
    '.xml': 'application/xml; charset=utf-8'
};

function resolveFile(urlPath) {
    // Strip query string and hash
    let cleanPath = urlPath.split('?')[0].split('#')[0];
    try {
        cleanPath = decodeURIComponent(cleanPath);
    } catch (e) {}

    // Security check against directory traversal
    const safePath = path.normalize(cleanPath).replace(/^(\.\.[\/\\])+/, '');
    let fullPath = path.join(PUBLIC_DIR, safePath);

    // 1. Direct file match
    if (fs.existsSync(fullPath) && fs.statSync(fullPath).isFile()) {
        return fullPath;
    }

    // 2. Directory with index.html
    if (fs.existsSync(fullPath) && fs.statSync(fullPath).isDirectory()) {
        const indexPath = path.join(fullPath, 'index.html');
        if (fs.existsSync(indexPath) && fs.statSync(indexPath).isFile()) {
            return indexPath;
        }
    }

    // 3. Path + '.html' match
    if (fs.existsSync(fullPath + '.html') && fs.statSync(fullPath + '.html').isFile()) {
        return fullPath + '.html';
    }

    // 4. Path + '/index.html' match (for clean URLs like /contact -> /contact/index.html)
    const subIndex = path.join(fullPath, 'index.html');
    if (fs.existsSync(subIndex) && fs.statSync(subIndex).isFile()) {
        return subIndex;
    }

    // 5. Fallback to root index.html for SPA/catch-all
    const rootIndex = path.join(PUBLIC_DIR, 'index.html');
    if (fs.existsSync(rootIndex)) {
        return rootIndex;
    }

    return null;
}

const server = http.createServer((req, res) => {
    // Add CORS headers for local testing
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, HEAD');
    res.setHeader('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With');

    if (req.method === 'OPTIONS') {
        res.writeHead(204);
        res.end();
        return;
    }

    const cleanUrl = req.url.split('?')[0];

    // Reverse Proxy for all /api/* requests to Laravel Admin backend (default: http://127.0.0.1:8000)
    if (cleanUrl.startsWith('/api/')) {
        const backendHost = process.env.BACKEND_HOST || '127.0.0.1';
        const backendPort = process.env.BACKEND_PORT || 8000;

        const proxyHeaders = { ...req.headers };
        proxyHeaders.host = `${backendHost}:${backendPort}`;

        const proxyReq = http.request({
            hostname: backendHost,
            port: backendPort,
            path: req.url,
            method: req.method,
            headers: proxyHeaders
        }, (proxyRes) => {
            // Forward headers and status code
            const forwardHeaders = { ...proxyRes.headers };
            forwardHeaders['access-control-allow-origin'] = '*';
            forwardHeaders['access-control-allow-methods'] = 'GET, POST, PUT, PATCH, DELETE, OPTIONS';
            forwardHeaders['access-control-allow-headers'] = 'Content-Type, Authorization, X-Requested-With, Accept';

            res.writeHead(proxyRes.statusCode, forwardHeaders);
            proxyRes.pipe(res);
        });

        proxyReq.on('error', (err) => {
            console.error('[API Proxy Error]', err.message);
            res.writeHead(502, { 'Content-Type': 'application/json; charset=utf-8' });
            res.end(JSON.stringify({
                success: false,
                message: 'Admin Backend (http://127.0.0.1:8000) is unreachable: ' + err.message
            }));
        });

        req.pipe(proxyReq);
        return;
    }

    const filePath = resolveFile(req.url);

    if (!filePath) {
        res.writeHead(404, { 'Content-Type': 'text/html; charset=utf-8' });
        res.end(`<h1>404 Not Found</h1><p>The requested URL ${req.url} was not found on this server.</p>`);
        return;
    }

    try {
        const ext = path.extname(filePath).toLowerCase();
        const contentType = MIME_TYPES[ext] || 'application/octet-stream';
        const data = fs.readFileSync(filePath);

        res.writeHead(200, {
            'Content-Type': contentType,
            'Content-Length': Buffer.byteLength(data),
            'Cache-Control': 'no-cache'
        });
        res.end(data);
    } catch (err) {
        res.writeHead(500, { 'Content-Type': 'text/plain; charset=utf-8' });
        res.end('500 Internal Server Error: ' + err.message);
    }
});

server.listen(PORT, '0.0.0.0', () => {
    console.log(`\n======================================================`);
    console.log(` ChowChak Website Local Dev Server is LIVE!`);
    console.log(` Local URL:   http://localhost:${PORT}`);
    console.log(` Contact URL: http://localhost:${PORT}/contact`);
    console.log(` Serving:     ${PUBLIC_DIR}`);
    console.log(`======================================================\n`);
});

server.on('error', (err) => {
    if (err.code === 'EADDRINUSE') {
        console.error(`Port ${PORT} is in use, trying next port ${Number(PORT) + 1}...`);
        server.listen(Number(PORT) + 1, '0.0.0.0');
    } else {
        console.error('Server error:', err);
    }
});
