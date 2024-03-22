<?php

$wp_customize->add_section(
    'header_section',
    [
        'title' => __('Header', 'alkima'),
        'priority' => 30,
    ]
);
$wp_customize->add_setting(
    'header_logo',
    [
        'default' => '',
        'sanitize_callback' => 'absint',
    ]
);
$wp_customize->add_control(
    new WP_Customize_Media_Control(
        $wp_customize,
        'header_logo',
        [
            'label' => __('Header Logo', 'alkima'),
            'section' => 'header_section',
            'mime_type' => 'image/svg+xml',
        ]
    )
);

$wp_customize->add_setting(
    'header_logo_size',
    [
        'default' => '40',
        'sanitize_callback' => function ($size) {
            return absint($size);
        },
    ]
);
$wp_customize->add_control(
    'header_logo_size',
    [
        'label' => __('Header Logo Size', 'alkima'),
        'section' => 'header_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => 20,
            'max' => 100,
        ],
    ]
);

$wp_customize->add_setting(
    'header_layout',
    [
        'default' => 'default',
        'sanitize_callback' => function ($layout) {
            return in_array($layout, ['default', 'centered', 'stacked']) ? $layout : 'default';
        },
    ]
);

$wp_customize->add_control(
    'header_layout',
    [
        'label' => __('Header Layout', 'alkima'),
        'section' => 'header_section',
        'type' => 'select',
        'choices' => [
            'default' => __('Default', 'alkima'),
            'centered' => __('Centered', 'alkima'),
            'stacked' => __('Stacked', 'alkima'),
        ],
    ]
);
