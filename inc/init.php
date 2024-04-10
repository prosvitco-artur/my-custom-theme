<?php



add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');


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

require_once get_template_directory() . '/inc/admin/init.php';

require_once get_template_directory() . '/inc/public/pagination.php';

require_once get_template_directory() . '/inc/public/classes/init.php';

require_once get_template_directory() . '/inc/public/enqueue.php';


function active_theme_is_dark_mode()
{
    if (isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark') {
        return true;
    }
    return false;
}