<?php
// Simple sitemap generator: update with actual URL list logic as needed
$siteUrl = rtrim(getenv('SITE_URL') ?: 'https://mastertonroofing.com', '/');
$pages = [
    '/',
    '/about',
    '/solutions',
    '/projects',
    '/solutions/drone',
    '/tos',
    '/privacy'
];
$now = date('c');
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset></urlset>');
$xml->addAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
foreach ($pages as $p) {
    $u = $xml->addChild('url');
    $u->addChild('loc', htmlspecialchars($siteUrl . $p));
    $u->addChild('lastmod', $now);
    $u->addChild('changefreq', 'monthly');
    $u->addChild('priority', '0.7');
}
$xml->asXML(__DIR__ . '/../sitemap.xml');
