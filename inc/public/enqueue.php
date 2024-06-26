<?php

add_action('wp_enqueue_scripts', function () {

    wp_enqueue_style(
        'fontawesome',
        get_template_directory_uri() . '/fontawesome/css/all.min.css',
    );

    wp_enqueue_style(
        'alkima-main',
        get_template_directory_uri() . '/build/public/css/styles.css',
        // ['global-styles-inline-css'],

    );

    wp_enqueue_script(
        'switch-dark',
        get_template_directory_uri() . '/build/public/js/switchDark.js',
        [],
        false,
        true
    );
    wp_enqueue_script(
        'bootstrap',
        get_template_directory_uri() . '/build/public/js/bootstrap.js',
    );
}, 999);