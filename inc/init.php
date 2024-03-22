<?php

/**
 * Include admin functions
 */
require_once get_template_directory() . '/inc/admin/init.php';

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
        apply_filters('alkima_theme_color_palette', $gutenberg_colors)
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


function get_color_palette($mode = 'light')
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

    $colors = apply_filters('alkima_theme_color_palette_' . $mode, $colors);

    $result = [];

    foreach ($colors as $key => $value) {
        $variable_name = str_replace('color-', 'theme-palette-color-', $key);

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

add_action(
    'wp_head',
    function () {

        // $global_styles_descriptor = get_transient(
        //     'alkima_theme_dynamic_styles_descriptor'
        // );

        $final_css = ':root{';
        foreach(get_color_palette() as $key => $color) {
            $final_css .= sprintf(
                '--%s:%s;',
                $color['variable'],
                $color['color']
            );
        }
    
        $final_css .= "
            --theme-font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            --theme-font-weight: 400;
            --theme-text-transform: none;
            --theme-text-decoration: none;
            --theme-font-size: 16px;
            --theme-line-height: 1.65;
            --theme-letter-spacing: 0em;
            --theme-button-font-weight: 500;
            --theme-button-font-size: 15px;
            --has-classic-forms: var(--true);
            --has-modern-forms: var(--false);
            --theme-form-field-border-initial-color: var(--theme-border-color);
            --theme-form-field-border-focus-color: var(--theme-palette-color-1);
            --theme-form-selection-field-initial-color: var(--theme-border-color);
            --theme-form-selection-field-active-color: var(--theme-palette-color-1);
            --theme-text-color: var(--theme-palette-color-3);
            --theme-link-initial-color: var(--theme-palette-color-1);
            --theme-link-hover-color: var(--theme-palette-color-2);
            --theme-selection-text-color: #ffffff;
            --theme-selection-background-color: var(--theme-palette-color-1);
            --theme-border-color: var(--theme-palette-color-5);
            --theme-headings-color: var(--theme-palette-color-4);
            --theme-content-spacing: 1.5em;
            --theme-button-min-height: 44px;
            --theme-button-shadow: none;
            --theme-button-transform: none;
            --theme-button-text-initial-color: #ffffff;
            --theme-button-text-hover-color: #ffffff;
            --theme-button-background-initial-color: var(--theme-palette-color-1);
            --theme-button-background-hover-color: var(--theme-palette-color-2);
            --theme-button-border: none;
            --theme-button-border-radius: 3px;
            --theme-button-padding: 5px 20px;
            --theme-normal-container-max-width: 1235px;
            --theme-content-vertical-spacing: 170px;
            --theme-container-edge-spacing: 82vw;
            --theme-narrow-container-max-width: 400px;
            --theme-wide-offset: 130px;
        }
        
        h1 {
            --theme-font-weight: 700;
            --theme-font-size: 40px;
            --theme-line-height: 1.5;
        }
        
        h2 {
            --theme-font-weight: 700;
            --theme-font-size: 35px;
            --theme-line-height: 1.5;
        }
        
        h3 {
            --theme-font-weight: 700;
            --theme-font-size: 30px;
            --theme-line-height: 1.5;
        }
        
        h4 {
            --theme-font-weight: 700;
            --theme-font-size: 25px;
            --theme-line-height: 1.5;
        }
        
        h5 {
            --theme-font-weight: 700;
            --theme-font-size: 20px;
            --theme-line-height: 1.5;
        }
        
        h6 {
            --theme-font-weight: 700;
            --theme-font-size: 16px;
            --theme-line-height: 1.5;
        }";

        // if (! empty($global_styles_descriptor['styles']['desktop'])) {
        // 	$final_css .= $global_styles_descriptor['styles']['desktop'];
        // }
    
        // if (! empty(trim($global_styles_descriptor['styles']['tablet']))) {
        // 	$final_css .= '@media (max-width: 999.98px) {' . $global_styles_descriptor['styles']['tablet'] . '}';
        // }
    
        // if (! empty(trim($global_styles_descriptor['styles']['mobile']))) {
        // 	$final_css .= '@media (max-width: 689.98px) {' . $global_styles_descriptor['styles']['mobile'] . '}';
        // }
    
        if (!empty ($final_css)) {
            echo '<style id="ct-main-styles-inline-css">';
            echo $final_css;
            echo "</style>\n";
        }
    },
    10
);


function generate_final_css()
{
    return generate_final_colors() . generate_final_typography();
}

function generate_final_colors()
{
    $colors = get_color_palette();
    $final_css = '';

    foreach ($colors as $color) {
        $final_css .= sprintf(
            '--%s: %s;',
            $color['variable'],
            $color['color']
        );
    }

    return $final_css;
}

function alkima_theme_render_archive_cards()
{
    ob_start();
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            $card_classes = apply_filters('alkima_theme_archive_card_classes', 'ct-archive-card');
            ?>
            <article class="<?= $card_classes ?>" <?php do_action('alkima_theme_archive_card_attributes') ?>>
                <?php do_action('alkima_theme_archive_card_start_title') ?>
                <?php do_action('alkima_theme_archive_card_before_title') ?>
                <h2>
                    <?= the_title() ?>
                </h2>
                <?php do_action('alkima_theme_archive_card_after_title') ?>
                <p>
                    <?= the_excerpt() ?>
                </p>
                <?php do_action('alkima_theme_archive_card_after_content') ?>
            </article>
            <?php
        }
    }
    return ob_get_clean();
}