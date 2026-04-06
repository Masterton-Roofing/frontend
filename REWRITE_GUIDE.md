# PHP Rewrite Migration Guide

This project is being prepared for a PHP rewrite. Below is the progress and instructions on how to proceed.

## Current Progress

- **PHP Environment Initialized**: `composer.json` is set up with essential dependencies for blog parsing.
- **Blog Utility Ported**: `php/Utils/Blog.php` mimics `src/utils/blog.js`, allowing you to load and parse the existing Markdown blog posts from the `src/content/blog` directory.
- **Entry Point**: A basic `index.php` is provided as a starting point for routing and rendering.
- **Dependencies**:
    - `spatie/yaml-front-matter`: For parsing YAML front matter in blog posts.
    - `erusev/parsedown`: For converting Markdown content to HTML.

## How to Run the PHP Version

1. Ensure you have PHP 8.x installed.
2. Install dependencies (if not already done):
   ```bash
   php composer.phar install
   ```
3. Start the PHP built-in server:
   ```bash
   php -S localhost:8000
   ```
4. Access the site at `http://localhost:8000`.

## Next Steps for Rewrite

1. **Templating**: Consider adding a templating engine like Twig or Blade (via `jenssegers/blade`) to manage HTML layouts more effectively than raw `echo` statements.
2. **Components**: Convert React components (found in `src/components`) into PHP partials or classes.
3. **Tailwind CSS**: The existing `tailwind.config.js` can still be used. You may want to set up a build process that scans PHP files for Tailwind classes.
4. **Routing**: For more complex routing, consider a lightweight router like `altorouter/altorouter`.
5. **Assets**: Ensure that static assets in `public/` and `src/` (images, etc.) are correctly referenced in the PHP templates.
