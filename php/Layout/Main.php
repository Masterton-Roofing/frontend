<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Components/Navbar.php';
require_once __DIR__ . '/../Components/Footer.php';

// Load .env file
(function () {
    static $initialized = false;
    if ($initialized) return;
    $initialized = true;

    $envFile = __DIR__ . '/../../.env';
    if (file_exists($envFile)) {
        foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
            if (str_starts_with(trim($line), '#') || !str_contains($line, '=')) continue;
            [$key, $val] = explode('=', $line, 2);
            $key = trim($key);
            $val = trim($val);
            if (!isset($_ENV[$key])) {
                $_ENV[$key] = $val;
                putenv("$key=$val");
            }
        }
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
})();

// PostHog removed: no distinct id helper

function renderHeader($title = "Masterton Roofing", $description = null, $canonical = null, $image = null, $isArticle = false) {
    $phToken = '';
    $phHost  = '';
    // Site-wide defaults (can be overridden by passing parameters)
    $siteUrl = rtrim($_ENV['SITE_URL'] ?? 'https://mastertonroofing.com', '/');
    $defaultImage = $siteUrl . '/public/img/templogo.png';
    $description = $description ?? 'Quality roofing solutions for your home and business. Contact Masterton Roofing for a free quote.';
    $image = $image ?? $defaultImage;
    // Force canonical host and HTTPS. Do this before any output.
    $desiredHost = parse_url($siteUrl, PHP_URL_HOST);
    $requestHost = $_SERVER['HTTP_HOST'] ?? '';
    $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
    $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)
        || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https');
    if (!$isHttps || strcasecmp($requestHost, $desiredHost) !== 0) {
        $redirect = 'https://' . $desiredHost . $requestUri;
        header('HTTP/1.1 301 Moved Permanently');
        header('Location: ' . $redirect);
        exit;
    }

    // Build canonical URL if not provided
    if (!$canonical) {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $uri = strtok($uri, '?'); // strip query
        $canonical = $siteUrl . $uri;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
        <meta name="description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
        <link rel="canonical" href="<?php echo htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>">
        <meta name="robots" content="index,follow">
        <!-- Open Graph -->
        <meta property="og:locale" content="en_GB" />
        <meta property="og:site_name" content="Masterton Roofing" />
        <meta property="og:title" content="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>" />
        <meta property="og:description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>" />
        <meta property="og:type" content="<?php echo $isArticle ? 'article' : 'website'; ?>" />
        <meta property="og:url" content="<?php echo htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>" />
        <meta property="og:image" content="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" />
        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>" />
        <meta name="twitter:description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>" />
        <meta name="twitter:image" content="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" />
        <!-- Favicons -->
        <link rel="icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />

                <!-- Grafana Faro RUM - must be first script -->
        <script>
            (function () {
                var s = document.createElement('script');
                s.src = 'https://unpkg.com/@grafana/faro-web-sdk@2/dist/bundle/faro-web-sdk.iife.js';
                s.onload = function () {
                    window.GrafanaFaroWebSdk.initializeFaro({
                        url: 'https://faro-collector-prod-gb-south-1.grafana.net/collect/455e2a6a08e311a18d3b01e84f00dc22',
                        app: { name: 'MR Website', version: '1.0.0', environment: 'production' },
                        ignoreErrors: [
                            /^ResizeObserver loop limit exceeded$/,
                            /^ResizeObserver loop completed with undelivered notifications$/,
                            /^Script error\.$/,
                            /chrome-extension:\/\//,
                            /moz-extension:\/\//,
                        ],
                    });
                    var t = document.createElement('script');
                    t.src = 'https://unpkg.com/@grafana/faro-web-tracing@2/dist/bundle/faro-web-tracing.iife.js';
                    t.onload = function () {
                        window.GrafanaFaroWebSdk.faro.instrumentations.add(
                            new window.GrafanaFaroWebTracing.TracingInstrumentation()
                        );
                    };
                    document.head.appendChild(t);
                };
                document.head.appendChild(s);
            })();
        </script>
        
        <!-- Use CDN for Tailwind as a quick fix for broken styling if local build is missing -->
        <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- JSON-LD structured data for Organization -->
        <script type="application/ld+json">
        <?php
            $org = [
                "@context" => "https://schema.org",
                "@type" => "Organization",
                "name" => "Masterton Roofing",
                "url" => $siteUrl,
                "logo" => $siteUrl . '/public/img/templogo.png',
                "sameAs" => [
                    'https://www.facebook.com/leeamasterton',
                    'https://uk.linkedin.com/in/lee-masterton-43513811b'
                ]
            ];
            echo json_encode($org, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        ?>
        </script>
        <?php /* PostHog removed: client snippet omitted */ ?>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            'bg-mr-blue': '#01597c',
                            'text-mr-yellow': '#f2e599'
                        }
                    }
                },
                plugins: [
                    // Note: In CDN version, plugins are limited, but we can try to include typography if needed
                ]
            }
        </script>
        <style type="text/tailwindcss">
            @layer base {
                body {
                    @apply bg-gray-100;
                }
            }
        </style>
    </head>
    <body class="flex flex-col min-h-screen">
        <div id="built-banner" class="hidden bg-bg-mr-blue text-white py-2 px-4 flex justify-between items-center text-sm font-medium sticky top-0 z-[60] border-b border-white/10">
            <div class="flex-grow text-center">
                <span><i class="fas fa-tools mr-2 text-text-mr-yellow"></i>This website is currently being built. Some features may be incomplete.</span>
            </div>
            <button onclick="dismissBanner()" class="ml-4 text-white hover:text-text-mr-yellow focus:outline-none" aria-label="Dismiss banner">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <script>
            function updateNavPosition() {
                const banner = document.getElementById('built-banner');
                const nav = document.getElementById('main-nav');
                const mobileMenu = document.getElementById('mobile-menu');

                if (banner && !banner.classList.contains('hidden')) {
                    const bannerHeight = banner.offsetHeight;
                    if (nav) nav.style.top = bannerHeight + 'px';
                    if (mobileMenu) mobileMenu.style.top = (bannerHeight + 80) + 'px';
                } else {
                    if (nav) nav.style.top = '0px';
                    if (mobileMenu) mobileMenu.style.top = '80px';
                }
            }

            document.addEventListener('DOMContentLoaded', () => {
                if (!localStorage.getItem('banner_dismissed')) {
                    const banner = document.getElementById('built-banner');
                    banner.classList.remove('hidden');
                    updateNavPosition();
                    window.addEventListener('resize', updateNavPosition);
                } else {
                    updateNavPosition();
                }
            });

            function dismissBanner() {
                document.getElementById('built-banner').classList.add('hidden');
                localStorage.setItem('banner_dismissed', 'true');
                updateNavPosition();
                window.removeEventListener('resize', updateNavPosition);
            }
        </script>
        <?php renderNavbar(); ?>
        <main class="flex-grow pt-20">
    <?php
}

function renderPageFooter() {
    ?>
        </main>
        <?php renderFooter(); ?>
        <script>
            // Simple logic for dropdowns if needed since we are not using React
            document.querySelectorAll('.group').forEach(el => {
                // Tailwind group-hover handles most desktop cases
            });
        </script>
    </body>
    </html>
    <?php
}
