<?php
// Normalize URI
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
if (empty($uri) || $uri === '/') {
    $uri = '/';
} else {
    $uri = rtrim($uri, '/');
}

// 1. Check if the URI corresponds to a PHP file in the root or a subfolder
if ($uri === '/') {
    $script = __DIR__ . '/home.php';
} else {
    $script = __DIR__ . $uri . '.php';
}

if (file_exists($script) && !is_dir($script)) {
    require_once $script;
    exit;
}

// 2. Special case for blog slugs
if (preg_match('#^/blog/([^/.]+)$#', $uri, $matches)) {
    $_GET['slug'] = $matches[1];
    require_once __DIR__ . '/blog.php';
    exit;
}

// 3. Serve static files from the root and public/ subdirectories if they exist
// We only serve if it's NOT a directory and it's NOT a PHP file
if ($uri !== '/') {
    // If running via 'php -S', we might want to check if the file exists directly
    // but the router script usually only gets called for files that DON'T exist 
    // UNLESS it's configured to handle all requests.
    
    $filePath = __DIR__ . $uri;
    $publicFilePath = __DIR__ . '/public' . $uri;
    $targetFile = null;

    // Check root files (except .php)
    if (file_exists($filePath) && !is_dir($filePath) && pathinfo($filePath, PATHINFO_EXTENSION) !== 'php') {
        $targetFile = $filePath;
    }
    // Check public/ directory
    elseif (file_exists($publicFilePath) && !is_dir($publicFilePath)) {
        $targetFile = $publicFilePath;
    }

    if ($targetFile) {
        $ext = pathinfo($targetFile, PATHINFO_EXTENSION);
        $mimeType = match ($ext) {
            'css' => 'text/css',
            'js' => 'application/javascript',
            'png' => 'image/png',
            'jpg', 'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'json' => 'application/json',
            'ico' => 'image/x-icon',
            'webp' => 'image/webp',
            'avif' => 'image/avif',
            default => 'application/octet-stream',
        };
        
        header("Content-Type: $mimeType");
        header("Content-Length: " . filesize($targetFile));
        readfile($targetFile);
        exit;
    }
}

// 4. If nothing else matches, 404
header("HTTP/1.0 404 Not Found");
echo "<h1>404 Not Found</h1><p>The page you requested was not found.</p>";
exit;
