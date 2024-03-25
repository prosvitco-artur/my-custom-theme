<?php

add_action('customize_register', function ($wp_customize) {
    $options = [
        'colors',
        'header',
        'typography',
    ];

    foreach ($options as $option) {
        if (file_exists(get_template_directory() . '/inc/admin/options/' . $option . '.php')) {
            include_once get_template_directory() . '/inc/admin/options/' . $option . '.php';
        }
    }
});
