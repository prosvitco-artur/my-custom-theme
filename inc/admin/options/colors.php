<?php


$wp_customize->add_setting(
    'global_color_palette',
    [
        'default' => ['#000000', '#ffffff', '#ff0000', '#00ff00', '#0000ff', '#ffff00'],
        'sanitize_callback' => function ($colors) {
            $sanitized_colors = [];
            foreach ($colors as $color) {
                $sanitized_colors[] = sanitize_hex_color($color);
            }
            return $sanitized_colors;
        },
        'type' => 'theme_mod',
    ]
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'global_color_palette',
        [
            'label' => __('Global Color Palette', 'alkima'),
            'section' => 'colors',
            'settings' => 'global_color_palette',
        ]
    )
);

$colors = [
    'base_text' => __('Base Text', 'alkima'),
    'links' => __('Links', 'alkima'),
    'text_selection' => __('Text Selection', 'alkima'),
    'borders' => __('Borders', 'alkima'),
    'all_headings' => __('All Headings (H1 - H6)', 'alkima'),
    'heading_1' => __('Heading 1 (H1)', 'alkima'),
    'heading_2' => __('Heading 2 (H2)', 'alkima'),
    'heading_3' => __('Heading 3 (H3)', 'alkima'),
    'heading_4' => __('Heading 4 (H4)', 'alkima'),
    'heading_5' => __('Heading 5 (H5)', 'alkima'),
    'heading_6' => __('Heading 6 (H6)', 'alkima'),
    'site_background' => __('Site Background', 'alkima'),
];

foreach ($colors as $key => $label) {
    $wp_customize->add_setting($key, [
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            $key,
            [
                'label' => $label,
                'section' => 'colors',
            ]
        )
    );
}