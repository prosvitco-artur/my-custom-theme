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
        apply_filters('alkima_theme_color_palette', $gutenberg_colors)
    );


    $all_menus = [];

    $all_menus['footer'] = esc_html__('Footer Menu', 'alkima_theme');
    $all_menus['menu_1'] = esc_html__('Header Menu 1', 'alkima_theme');
    $all_menus['menu_2'] = esc_html__('Header Menu 2', 'alkima_theme');
    $all_menus['menu_mobile'] = esc_html__('Mobile Menu', 'alkima_theme');

    $all_menus = apply_filters('alkima_theme_register_nav_menus_input', $all_menus);
    if (!empty ($all_menus)) {
        register_nav_menus($all_menus);
    }
});



/**
 * Include admin functions
 */
require_once get_template_directory() . '/inc/admin/init.php';


require_once get_template_directory() . '/inc/public/pagination.php';

function alkima_theme_output_header()
{
    include get_template_directory() . '/templates/header.php';
}

function alkima_theme_output_footer()
{
    include get_template_directory() . '/templates/footer.php';
}

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('alkima-main', get_template_directory_uri() . '/static/public/css/main.css');
});

function active_theme_is_dark_mode()
{
    if (isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark') {
        return true;
    }
    return false;
}

function get_color_palette($mode = 'light')
{
    $result = [];
    $json = file_get_contents(get_template_directory() . '/alkima.json');

    $variables = json_decode($json, true);
    $colors = $variables['colors'];
   
    foreach($colors[$mode] as $key => $value){
        $result[$key] = [
            'id' => $key,
            'slug' => 'palette-color-' . str_replace('color', '', $key),
            'color' => $value['color'],
            'variable' => 'theme-' . $key,
            'title' => sprintf(
                __('Palette Color %s', 'alkima_theme'),
                str_replace('color', '', $key)
            )
        ];
    }

    return $result;
}


function get_additional_styles()
{

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



add_action(
    'wp_head',
    function () {

        $theme_mode = active_theme_is_dark_mode() ? 'dark' : 'light';
        $final_css = ':root{';
        foreach (get_color_palette($theme_mode) as $key => $color) {
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

