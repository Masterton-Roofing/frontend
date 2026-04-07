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
