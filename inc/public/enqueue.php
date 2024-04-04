<?php

add_action('wp_enqueue_scripts', function () {
    
    wp_enqueue_style(
        'fontawesome',
        get_template_directory_uri() . '/fontawesome/css/all.min.css',
    );

    wp_enqueue_style(
        'alkima-main',
        get_template_directory_uri() . '/build/main.css',
    );

    wp_enqueue_script(
        'switch-dark',
        get_template_directory_uri() . '/build/switchDark.js',
        [],
        false,
        true
    );
    wp_enqueue_script(
        'bootstrap',
        get_template_directory_uri() . '/build/bootstrap.js',
    );
});