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
        'palette-color-1' => '#ad5a37',
        'palette-color-2' => '#1559ed',
        'palette-color-3' => '#3A4F66',
        'palette-color-4' => '#192a3d',
        'palette-color-5' => '#e1e8ed',
        'palette-color-6' => '#f2f5f7',
        'palette-color-7' => '#FAFBFC',
        'palette-color-8' => '#000000',
        'button-text-initial-color' => '#ffffff',
        'button-text-hover-color' => '#ffffff',
        'selection-text-color' => '#ffffff',
    ];

    $colors = apply_filters('alkima_theme_color_palette_' . $mode, $colors);

    $result = [];

    foreach ($colors as $key => $value) {
        $variable_name = 'theme-' . $key;

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


function get_additional_styles()
{


    // monospace, Helvetica, Times New Roman, 
    $theme_styles = [
        'theme-font-family' => "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
        'theme-font-weight' => '400',
        'theme-text-transform' => 'none',
        'theme-text-decoration' => 'none',
        'theme-font-size' => '16px',
        'theme-line-height' => '1.65',
        'theme-letter-spacing' => '0em',
        'theme-button-font-weight' => '500',
        'theme-button-font-size' => '15px',
    
        'theme-content-spacing' => '1.5em',
        'theme-button-min-height' => '44px',
        'theme-button-shadow' => 'none',
        'theme-button-transform' => 'none',
        'theme-button-border' => 'none',
        'theme-button-border-radius' => '3px',
        'theme-button-padding' => '5px 20px',
        'theme-normal-container-max-width' => '1235px',
        'theme-content-vertical-spacing' => '170px',
        'theme-container-edge-spacing' => '82vw',
        'theme-narrow-container-max-width' => '400px',
        'theme-wide-offset' => '130px',

        'theme-text-color' => 'var(--theme-palette-color-3)',
        'theme-link-initial-color' => 'var(--theme-palette-color-1)',
        'theme-link-hover-color' => 'var(--theme-palette-color-2)',
        'theme-selection-background-color' => 'var(--theme-palette-color-1)',
        'theme-border-color' => 'var(--theme-palette-color-5)',
        'theme-headings-color' => 'var(--theme-palette-color-4)',
        'theme-form-field-border-initial-color' => 'var(--theme-border-color)',
        'theme-form-field-border-focus-color' => 'var(--theme-palette-color-1)',
        'theme-form-selection-field-initial-color' => 'var(--theme-border-color)',
        'theme-form-selection-field-active-color' => 'var(--theme-palette-color-1)',
        'theme-button-background-initial-color' => 'var(--theme-palette-color-1)',
        'theme-button-background-hover-color' => 'var(--theme-palette-color-2)',

        'has-classic-forms' => 'var(--true)',
        'has-modern-forms' => 'var(--false)',
    ];
    return apply_filters('alkima_theme_additional_styles', $theme_styles);
}

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('alkima-main', get_template_directory_uri() . '/static/public/css/main.css');
});

add_action(
    'wp_head',
    function () {

        $final_css = ':root{';
        foreach (get_color_palette() as $key => $color) {
            $final_css .= sprintf(
                '--%s:%s;',
                $color['variable'],
                $color['color']
            );
        }
        foreach (get_additional_styles() as $key => $value) {
            $final_css .= sprintf(
                '--%s:%s;',
                $key,
                $value
            );
        }
        $final_css .= '}';

        $final_css .= "        
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

function alkima_theme_render_pagination($args = [])
{
    global $wp_query;

    $defaults = [
        'query' => $wp_query,
        'pagination_type' => 'simple',
        'last_page_text' => __('No more posts to load', 'blocksy'),
        'prefix' => 'blog'
    ];

    $args = wp_parse_args($args, $defaults);

    $current_page = max(1, intval($args['query']->get('paged')));
    $total_pages = max(1, $args['query']->max_num_pages);

    if ($total_pages <= 1) {
        return '';
    }

    $button_output = '';

    if ($args['pagination_type'] === 'load_more' && $current_page !== $total_pages) {
        $label_button = get_theme_mod($args['prefix'] . '_load_more_label', __('Load More', 'blocksy'));
        $button_output = '<button class="wp-element-button ct-load-more">' . $label_button . '</button>';
    }

    $pagination_class = 'ct-pagination';

    $template = '
    <nav class="' . $pagination_class . '">
        %1$s
        %2$s
    </nav>';

    $paginate_links_args = [
        'mid_size' => 3,
        'end_size' => 0,
        'type' => 'array',
        'total' => $total_pages,
        'current' => $current_page,
        'prev_text' => '<svg width="9px" height="9px" viewBox="0 0 15 15" fill="currentColor"><path d="M10.9,15c-0.2,0-0.4-0.1-0.6-0.2L3.6,8c-0.3-0.3-0.3-0.8,0-1.1l6.6-6.6c0.3-0.3,0.8-0.3,1.1,0c0.3,0.3,0.3,0.8,0,1.1L5.2,7.4l6.2,6.2c0.3,0.3,0.3,0.8,0,1.1C11.3,14.9,11.1,15,10.9,15z"/></svg>' . __('Prev', 'blocksy'),
        'next_text' => __('Next', 'blocksy') . ' <svg width="9px" height="9px" viewBox="0 0 15 15" fill="currentColor"><path d="M4.1,15c0.2,0,0.4-0.1,0.6-0.2L11.4,8c0.3-0.3,0.3-0.8,0-1.1L4.8,0.2C4.5-0.1,4-0.1,3.7,0.2C3.4,0.5,3.4,1,3.7,1.3l6.1,6.1l-6.2,6.2c-0.3,0.3-0.3,0.8,0,1.1C3.7,14.9,3.9,15,4.1,15z"/></svg>',
    ];

    $links = paginate_links($paginate_links_args);

    $proper_links = '';

    foreach ($links as $link) {
        $proper_links .= $link;
    }

    return sprintf($template, $proper_links, $button_output);
}
