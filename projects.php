<?php
require_once __DIR__ . '/php/Layout/Main.php';

$projects_json = file_get_contents(__DIR__ . '/public/api/projects.json');
$projects = json_decode($projects_json, true);

renderHeader("Our Projects - Masterton Roofing");
?>

<div class="max-w-4xl mx-auto px-6 py-12">
    <h1 class="text-4xl font-bold mb-8 text-center text-slate-800">Our Projects</h1>
    <div class="space-y-8">
        <?php foreach ($projects as $project): ?>
            <div class="w-full mx-auto mt-6">
                <button
                    onclick="toggleProject('project-<?php echo $project['id']; ?>', this)"
                    class="w-full flex justify-between items-center px-4 py-3 bg-slate-800 text-white rounded-lg transition hover:bg-slate-700"
                >
                    <span class="text-left"><?php echo $project['name']; ?></span>
                    <span class="transform transition-transform duration-300 ml-2">▼</span>
                </button>

                <div id="project-<?php echo $project['id']; ?>" class="overflow-hidden transition-all duration-300 max-h-0 opacity-0">
                    <div class="p-4 bg-slate-100 rounded-lg text-slate-700 mt-2">
                        <span class="text-2xl font-bold mb-2 block">About</span>
                        <p class="mb-4"><?php echo $project['description']; ?></p>

                        <?php if (!empty($project['image'])): ?>
                            <img
                                class="mx-auto rounded"
                                src="<?php echo $project['image']; ?>"
                                alt="<?php echo $project['name']; ?>"
                            />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
function toggleProject(id, btn) {
    const content = document.getElementById(id);
    const span = btn.querySelector('span:last-child');
    
    if (content.classList.contains('max-h-0')) {
        content.classList.remove('max-h-0', 'opacity-0');
        content.classList.add('max-h-[1000px]', 'opacity-100', 'mt-2');
        span.classList.add('rotate-180');
    } else {
        content.classList.add('max-h-0', 'opacity-0');
        content.classList.remove('max-h-[1000px]', 'opacity-100', 'mt-2');
        span.classList.remove('rotate-180');
    }
}
</script>

<?php
renderPageFooter();
?>
