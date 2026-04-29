<wizard-report>
# PostHog post-wizard report

The wizard has completed a deep integration of PostHog analytics into the Masterton Roofing PHP website.

**Changes made:**

- **`php/Layout/Main.php`** — Added `.env` loading, PostHog PHP SDK initialisation (via `POSTHOG_API_KEY` / `POSTHOG_HOST` env vars), PHP session start for anonymous distinct IDs, a `posthogDistinctId()` helper, and the posthog-js browser snippet for client-side event capture.
- **`php/Layout/SolutionPageBase.php`** — Server-side `solution_viewed` capture whenever a roofing solution page is loaded, including the solution title as a property.
- **`blog.php`** — Server-side `blog_listing_viewed` capture with the current post count.
- **`blog/first-post.php`** — Server-side `blog_post_viewed` capture with post title, author, date, and slug.
- **`contact.php`** — Client-side JS listener on the Formspree form that fires `contact_form_submitted` via posthog-js on submit.
- **`projects.php`** — Client-side JS fires `project_expanded` (with project name) when a visitor expands a project accordion item.
- **`index.php`** — Removed the previously hardcoded `PostHog::init()` call (initialisation now lives in `Main.php` using env vars).
- **`.env`** — `POSTHOG_API_KEY` and `POSTHOG_HOST` written via the wizard-tools env helper (never committed).

| Event | Description | File |
|---|---|---|
| `solution_viewed` | Visitor views a roofing solution page (PVC, VCL, Drone) | `php/Layout/SolutionPageBase.php` |
| `contact_form_submitted` | Visitor submits the contact/enquiry form | `contact.php` |
| `project_expanded` | Visitor expands a project accordion on the Projects page | `projects.php` |
| `blog_post_viewed` | Visitor reads a blog post | `blog/first-post.php` |
| `blog_listing_viewed` | Visitor views the blog listing page | `blog.php` |

## Next steps

We've built some insights and a dashboard for you to keep an eye on user behaviour, based on the events we just instrumented:

- **Dashboard — Analytics basics:** https://eu.posthog.com/project/168984/dashboard/650981
- **Contact Form Submissions Over Time:** https://eu.posthog.com/project/168984/insights/2dcTgL4n
- **Solution Views by Type:** https://eu.posthog.com/project/168984/insights/Dtp5kfZg
- **Solution to Enquiry Conversion Funnel:** https://eu.posthog.com/project/168984/insights/w4ylZA0I
- **Blog Engagement Over Time:** https://eu.posthog.com/project/168984/insights/7JHPZV8E
- **Projects Expanded by Name:** https://eu.posthog.com/project/168984/insights/VExp2cvn

### Agent skill

We've left an agent skill folder in your project at `.claude/skills/integration-laravel/`. You can use this context for further agent development when using Claude Code. This will help ensure the model provides the most up-to-date approaches for integrating PostHog.

</wizard-report>
