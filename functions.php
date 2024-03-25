<?php

require get_template_directory() . '/inc/init.php';



function add_specific_menu_location_atts( $atts, $item, $args ) {

    if( $args->menu->slug == 'header-menu' ) {
      $atts['class'] = 'ct-menu-link';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3 );