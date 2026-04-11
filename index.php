<?php
// Normalize URI
$uri = rtrim(urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)), '/');
if (empty($uri)) $uri = '/';

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
    $filePath = __DIR__ . $uri;
    $publicFilePath = __DIR__ . '/public' . $uri;
    
    // Check root files (except .php)
    if (file_exists($filePath) && !is_dir($filePath) && pathinfo($filePath, PATHINFO_EXTENSION) !== 'php') {
        return false;
    }
    
    // Check public/ directory
    if (file_exists($publicFilePath) && !is_dir($publicFilePath)) {
        $ext = pathinfo($publicFilePath, PATHINFO_EXTENSION);
        $mimeType = match ($ext) {
            'css' => 'text/css',
            'js' => 'application/javascript',
            'png' => 'image/png',
            'jpg', 'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'json' => 'application/json',
            default => mime_content_type($publicFilePath),
        };
        
        header("Content-Type: $mimeType");
        readfile($publicFilePath);
        exit;
    }
}

// 4. If nothing else matches, 404
header("HTTP/1.0 404 Not Found");
echo "<h1>404 Not Found</h1><p>The page you requested was not found.</p>";
exit;
