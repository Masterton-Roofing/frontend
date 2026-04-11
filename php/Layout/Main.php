<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Components/Navbar.php';
require_once __DIR__ . '/../Components/Footer.php';

function renderHeader($title = "Masterton Roofing") {
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
