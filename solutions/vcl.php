<?php
require_once __DIR__ . '/../php/Layout/SolutionPageBase.php';

renderSolutionPageBase([
    'pageTitle' => "Vapour Control Layer (VCL) - Masterton Roofing",
    'heroImage' => "/public/img/vcl.jpg",
    'heroTitle' => "Vapor Control Layer - Solutions",
    'sectionTitle' => "Our VCL Solutions",
    'articles' => [
        [
            'title' => "Vapour Control Layer (VCL)",
            'blurb' => "The Vapor Control Layer (VCL) is essential for protecting the integrity of your building's insulation and structure by managing moisture movement.",
            'about' => "We provide high-performance VCL installations tailored to your specific roofing system. A correctly installed VCL prevents warm, moist air from the building's interior from reaching the cold side of the insulation, where it could condense and cause structural damage or reduce thermal efficiency.",
            'specs' => "Material: Reinforced Polyethylene / Bituminous\nThickness: 0.2mm - 4.0mm\nInstallation: Loose laid or fully bonded\nCompatibility: All flat roofing systems",
            'images' => ["/public/img/vcl.jpg"]
        ]
    ]
]);
