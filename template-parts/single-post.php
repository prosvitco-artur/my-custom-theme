<?php

if (have_posts()) {
    the_post();
}


?>

<div class="container pt-5 <?php do_action('alkima_theme_single_container_classes'); ?>">

    <?php do_action('alkima_theme_single_container_top'); ?>

    <?php

    the_title('<div class="pt-5"><h1>', '</h1></div>');
    if (function_exists('yoast_breadcrumb') && apply_filters('alkima_theme_show_yoast_breadcrumb', true)):
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    endif;
    ?>

    <?php do_action('alkima_theme_single_before_content'); ?>

    <?php
    
    ob_start();

    if (have_posts()) {
        the_post();
    }
    the_content();
    ?>

    <?php do_action('alkima_theme_single_after_content'); ?>

    <?php get_sidebar(); ?>

    <?php do_action('alkima_theme_single_container_bottom'); ?>
</div>

<?php

have_posts();
wp_reset_query();

