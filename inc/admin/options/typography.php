<?php
$wp_customize->add_panel(
    'theme_typography_panel',
    [
        'title' => __('Typography', 'alkima'),
        'priority' => 30,
    ]
);



$options = [
    'baseFont' => [
        'label' => __('Base Font', 'alkima'),
        'options' => [
            'font_family' => [
                'label' => __('Font Family', 'alkima'),
                'default' => 'Arial, sans-serif',
                'choices' => [
                    'Arial, sans-serif' => 'Arial, sans-serif',
                    'Helvetica, sans-serif' => 'Helvetica, sans-serif',
                ]
            ],
            'font_size' => [
                'label' => __('Font Size', 'alkima'),
                'default' => '16'
            ],
            'font_size_tablet' => [
                'label' => __('Font Size (Tablet)', 'alkima'),
                'default' => '16'
            ],
            'font_size_mob' => [
                'label' => __('Font Size (Mobile)', 'alkima'),
                'default' => '16'
            ],
        ]
    ],
    'h1' => [
        'label' => __('H1', 'alkima'),
        'options' => [
            'font_family' => [
                'label' => __('Font Family', 'alkima'),
                'default' => 'Arial, sans-serif',
                'choices' => [
                    'Arial, sans-serif' => 'Arial, sans-serif',
                    'Helvetica, sans-serif' => 'Helvetica, sans-serif',
                ]
            ],
            'font_size' => [
                'label' => __('Font Size', 'alkima'),
                'default' => '48'
            ],
            'font_size_tablet' => [
                'label' => __('Font Size (Tablet)', 'alkima'),
                'default' => '42'
            ],
            'font_size_mob' => [
                'label' => __('Font Size (Mobile)', 'alkima'),
                'default' => '36'
            ],
        ]
    ],
    'h2' => [
        'label' => __('H2', 'alkima'),
        'options' => [
            'font_family' => [
                'label' => __('Font Family', 'alkima'),
                'default' => 'Arial, sans-serif',
                'choices' => [
                    'Arial, sans-serif' => 'Arial, sans-serif',
                    'Helvetica, sans-serif' => 'Helvetica, sans-serif',
                ]
            ],
            'font_size' => [
                'label' => __('Font Size', 'alkima'),
                'default' => '40'
            ],
            'font_size_tablet' => [
                'label' => __('Font Size (Tablet)', 'alkima'),
                'default' => '34'
            ],
            'font_size_mob' => [
                'label' => __('Font Size (Mobile)', 'alkima'),
                'default' => '28'
            ],
        ]
    ],
    'h3' => [
        'label' => __('H3', 'alkima'),
        'options' => [
            'font_family' => [
                'label' => __('Font Family', 'alkima'),
                'default' => 'Arial, sans-serif',
                'choices' => [
                    'Arial, sans-serif' => 'Arial, sans-serif',
                    'Helvetica, sans-serif' => 'Helvetica, sans-serif',
                ]
            ],
            'font_size' => [
                'label' => __('Font Size', 'alkima'),
                'default' => '32'
            ],
            'font_size_tablet' => [
                'label' => __('Font Size (Tablet)', 'alkima'),
                'default' => '28'
            ],
            'font_size_mob' => [
                'label' => __('Font Size (Mobile)', 'alkima'),
                'default' => '24'
            ],
        ]
    ],
    'h4' => [
        'label' => __('H4', 'alkima'),
        'options' => [
            'font_family' => [
                'label' => __('Font Family', 'alkima'),
                'default' => 'Arial, sans-serif',
                'choices' => get_theme_font_families()
            ],
            'font_size' => [
                'label' => __('Font Size', 'alkima'),
                'default' => '24'
            ],
            'font_size_tablet' => [
                'label' => __('Font Size (Tablet)', 'alkima'),
                'default' => '22'
            ],
            'font_size_mob' => [
                'label' => __('Font Size (Mobile)', 'alkima'),
                'default' => '20'
            ],
        ]
    ],
    'h5' => [],
    'h6' => []
];

foreach ($options as $option_key => $option) {
    $section_id = 'theme_typography_' . $option_key;

    $wp_customize->add_section(
        $section_id,
        [
            'title' => __('Typography for ' . $heading['label'], 'alkima'),
            'priority' => 30,
            'panel' => 'theme_typography_panel',
        ]
    );
}