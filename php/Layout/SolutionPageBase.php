<?php
require_once __DIR__ . '/Main.php';
require_once __DIR__ . '/../Components/SolutionArticle.php';

function renderSolutionPageBase($params)
{
    if (!isset($params['pageTitle']) || !isset($params['heroTitle']) || !isset($params['heroImage']) || !isset($params['sectionTitle']) || !isset($params['articles'])) {
        throw new Exception("Missing required parameters for renderSolutionPageBase");
    }

    renderHeader($params['pageTitle']);
    ?>

    <!-- Hero Section -->
    <section class="hero h-[60vh] md:h-[80vh] bg-cover bg-center"
        style="background-image: url('<?php echo htmlspecialchars($params['heroImage']); ?>')">
        <div class="flex items-center justify-center h-full bg-black/40 px-4">
            <h1 class="text-white text-4xl md:text-5xl font-bold text-center">
                <?php echo htmlspecialchars($params['heroTitle']); ?>
            </h1>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <h2 class="text-3xl font-bold mb-8 text-gray-900 text-center md:text-left">
                <?php echo htmlspecialchars($params['sectionTitle']); ?>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                <?php
                foreach ($params['articles'] as $article) {
                    renderSolutionArticle($article);
                }
                ?>
            </div>

        </div>
    </section>

    <?php
    renderPageFooter();
}
