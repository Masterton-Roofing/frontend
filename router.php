<?php
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Serve static files from the root and public/ subdirectories if they exist
// We skip directories to allow clean URLs that match directory names
if ($uri !== '/') {
    $filePath = __DIR__ . $uri;
    $publicFilePath = __DIR__ . '/public' . $uri;
    
    if (file_exists($filePath) && !is_dir($filePath)) {
        return false;
    }
    
    if (file_exists($publicFilePath) && !is_dir($publicFilePath)) {
        // Re-write to public file path for PHP's built-in server to serve it
        // OR simply readfile and exit if we want total control
        // For php -S, returning false tells it to serve the file if it's in the document root
        // But since we want to serve from /public/... as if it's from /...
        // we might need to handle it ourselves or use a different approach.
        
        $mimeType = match (pathinfo($publicFilePath, PATHINFO_EXTENSION)) {
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

// Special case for blog slugs
if (preg_match('#^/blog/([^/]+)$#', $uri, $matches)) {
    $_GET['slug'] = $matches[1];
    require_once __DIR__ . '/blog.php';
    exit;
}

// Map clean URLs to PHP files
$routes = [
    '/' => '/index.php',
    '/about' => '/about.php',
    '/blog' => '/blog.php',
    '/contact' => '/contact.php',
    '/projects' => '/projects.php',
    '/solutions' => '/solutions.php',
    '/solutions/pvc' => '/solutions/pvc.php',
    '/solutions/vcl' => '/solutions/vcl.php',
    '/solutions/drone' => '/solutions/drone.php',
];

if (isset($routes[$uri])) {
    require_once __DIR__ . $routes[$uri];
    exit;
}

// Default 404
header("HTTP/1.0 404 Not Found");
echo "<h1>404 Not Found</h1><p>The page you requested was not found.</p>";
exit;
