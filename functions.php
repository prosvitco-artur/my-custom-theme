<?php

require get_template_directory() . '/inc/init.php';



function get_theme_font_families()
{
    $fonts = [
        'Arial, sans-serif' => 'Arial, sans-serif',
        'Helvetica, sans-serif' => 'Helvetica, sans-serif',
    ];
    return apply_filters('alkima_theme_font_families', $fonts);
}