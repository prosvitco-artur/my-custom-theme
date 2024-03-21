<?php


add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');

    foreach (get_color_palette() as $key => $palette) {
        $gutenberg_colors[] = [
            'name' => $palette['title'],
            'slug' => $palette['slug'],
            'color' => 'var(--' . $palette['variable'] . ', ' . $palette['color'] . ')'
        ];
    }

    add_theme_support(
        'editor-color-palette',
        apply_filters('blocksy:editor-color-palette', $gutenberg_colors)
    );
});



function alkima_theme_output_header()
{

    include get_template_directory() . '/templates/header.php';
}



function alkima_theme_body_attr()
{
    if (active_theme_is_dark_mode()) {
        return 'data-theme="dark"';
    }
    return 'data-theme="light"';
}


function active_theme_is_dark_mode()
{
    return false;
}


function alkima_theme__main_attr()
{
    if (active_theme_is_dark_mode()) {
        return 'data-theme="dark"';
    }
    return 'data-theme="light"';
}


function alkima_theme_before_current_template()
{
    do_action('alkima_theme_before_current_template');
}


function alkima_theme_single_content()
{
    ob_start();
    if (have_posts()) {
        the_post();
    }


    the_content();
}



function alkima_theme__after_current_template()
{
    do_action('alkima_theme_after_current_template');
}


function alkima_theme_output_footer()
{
    ?>
    <footer>
        <h1>Footer</h1>
    </footer>
    <?php
}


function get_color_palette()
{
    $colors = [
        'color-1' => '#fd5a37',
        'color-2' => '#1559ed',
        'color-3' => '#3A4F66',
        'color-4' => '#192a3d',
        'color-5' => '#e1e8ed',
        'color-6' => '#f2f5f7',
        'color-7' => '#FAFBFC',
        'color-8' => '#000000',
    ];
    $result = [];

    foreach ($colors as $key => $value) {
        $variable_name = str_replace('color', 'theme-palette-color-', $key);

        $result[$key] = [
            'id' => $key,
            'slug' => 'palette-color-' . str_replace('color', '', $key),
            'color' => $value,
            'variable' => $variable_name,
            'title' => sprintf(
                __('Palette Color %s', 'blocksy'),
                str_replace('color', '', $key)
            )
        ];
    }

    return $result;
}

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('alkima-main', get_template_directory_uri() . '/static/public/css/main.css');
});


/**
 * to inline styles in the head
 */

// add_action(
//     'wp_head',
//     function () {
//         $global_styles_descriptor = get_transient(
//             'blocksy_dynamic_styles_descriptor'
//         );
//     },
//     10
// );
