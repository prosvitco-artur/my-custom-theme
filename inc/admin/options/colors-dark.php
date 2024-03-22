<?php
/**
 * @var $wp_customize WP_Customize_Manager
 */


$wp_customize->add_section(
    'colors_pallette_light',
    [
        'title' => __('Colors Pallette Light', 'alkima_theme'),
    ]
);

$wp_customize->add_setting('colors_pallette_light', [
    'default' => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color',
]);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'colors_pallette_light',
        [
            'label' => __('Colors Pallette Light', 'alkima_theme'),
            'section' => 'colors_pallette_light',
        ]
    )
);