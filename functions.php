<?php

require get_template_directory() . '/inc/init.php';



function add_specific_menu_location_atts($atts, $item, $args)
{

  if ($args->menu->slug == 'header-menu') {
    $atts['class'] = 'ct-menu-link';
  }
  return $atts;
}
add_filter('nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3);


add_filter('alkima_theme_show_yoast_breadcrumb', function ($show_breadcrumb) {
  if (is_front_page()) {
    return false;
  }
  return $show_breadcrumb;
});


add_action('init', 'alkima_set_theme_mode');
function alkima_set_theme_mode()
{
  if (!empty ($_GET['theme'])) {
    setcookie('theme', $_GET['theme'], time() + (86400 * 30), "/");
  }
}