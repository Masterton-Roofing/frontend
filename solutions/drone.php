<?php
require_once __DIR__ . '/../php/Layout/SolutionPageBase.php';

renderSolutionPageBase([
    'pageTitle' => "Drone Surveys - Masterton Roofing",
    'heroImage' => "/public/img/maz.jpg",
    'heroTitle' => "Drone Footage - Solutions",
    'sectionTitle' => "Drone Surveys",
    'articles' => [
        [
            'title' => "Drone Surveys",
            'blurb' => "High-tech aerial inspections for precise roof assessment without the need for scaffolding.",
            'about' => "Our drone surveys provide a safe and cost-effective way to inspect roofs of any height or complexity. Using high-resolution cameras, we can identify leaks, structural damage, and debris without setting foot on the roof.",
            'specs' => "Resolution: 4K Video / 20MP Photos\nReach: Unlimited height\nDeliverables: Full report with high-res imagery",
            'images' => []
        ]
    ]
]);
