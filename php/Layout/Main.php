<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Components/Navbar.php';
require_once __DIR__ . '/../Components/Footer.php';

// Load .env file and initialize PostHog once
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

    $apiKey = $_ENV['POSTHOG_API_KEY'] ?? getenv('POSTHOG_API_KEY');
    $host   = $_ENV['POSTHOG_HOST']    ?? getenv('POSTHOG_HOST');

    if ($apiKey) {
        \PostHog\PostHog::init($apiKey, ['host' => $host]);
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (empty($_SESSION['posthog_distinct_id'])) {
        $_SESSION['posthog_distinct_id'] = 'anon-' . bin2hex(random_bytes(16));
    }
})();

function posthogDistinctId(): string {
    return $_SESSION['posthog_distinct_id'] ?? 'anonymous';
}

function renderHeader($title = "Masterton Roofing") {
    $phToken = $_ENV['POSTHOG_API_KEY'] ?? getenv('POSTHOG_API_KEY') ?? '';
    $phHost  = $_ENV['POSTHOG_HOST']    ?? getenv('POSTHOG_HOST')    ?? '';
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?></title>
        <!-- Use CDN for Tailwind as a quick fix for broken styling if local build is missing -->
        <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script>
            !function(b,e,t,r){
                b[t]=b[t]||function(...args){(b[t].q=b[t].q||[]).push(args)};
                b[t].l=+new Date;
                var s=e.createElement('script'); s.async=1; s.crossOrigin='anonymous';
                s.src='https://betterstack.net/b.js?t='+r;
                (e.head||e.getElementsByTagName('head')[0]).appendChild(s);
            }(window,document,'betterstack','iw6mnzXcUZb3S4mxRVYGESeP');
            betterstack('init', { environment: 'production' });
        </script>
        <?php if ($phToken): ?>
        <script>
            !function(t,e){var o,n,p,r;e.__SV||(window.posthog=e,e._i=[],e.init=function(i,s,a){function g(t,e){var o=e.split(".");2==o.length&&(t=t[o[0]],e=o[1]),t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}}(p=t.createElement("script")).type="text/javascript",p.crossOrigin="anonymous",p.async=!0,p.src=s.api_host.replace(".i.posthog.com","-assets.i.posthog.com")+"/static/array.js",(r=t.getElementsByTagName("script")[0]).parentNode.insertBefore(p,r);var u=e;for(void 0!==a?u=e[a]=[]:a="posthog",u.people=u.people||[],u.toString=function(t){var e="posthog";return"posthog"!==a&&(e+="."+a),t||(e+=" (stub)"),e},u.people.toString=function(){return u.people.toString(20)+" (stub)"},o="capture identify alias people.set people.set_once set_config register register_once unregister opt_out_capturing has_opted_out_capturing opt_in_capturing reset isFeatureEnabled onFeatureFlags getFeatureFlag getFeatureFlagPayload reloadFeatureFlags group updateEarlyAccessFeatureEnrollment getEarlyAccessFeatures getActiveMatchingSurveys getSurveys onSessionId captureException".split(" "),n=0;n<o.length;n++)g(u,o[n]);e._i.push([i,s,a])},e.__SV=1)}(document,window.posthog||[]);
            posthog.init('<?php echo htmlspecialchars($phToken, ENT_QUOTES); ?>', {
                api_host: '<?php echo htmlspecialchars($phHost, ENT_QUOTES); ?>',
                person_profiles: 'identified_only'
            });
        </script>
        <?php endif; ?>
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
