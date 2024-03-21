<?php

if (have_posts()) {
    the_post();
}

if (is_single()) {
    $container_class = 'ct-container';
} else {
    $container_class = 'ct-container-full';
}

?>

<div class="<?= $container_class ?>">

    <?php do_action('alkima_theme_single_container_top'); ?>

    <?php if (function_exists('yoast_breadcrumb') && is_single()):
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    endif; ?>
    
    <?= alkima_theme_single_content(); ?>

    <?php get_sidebar(); ?>

    <?php do_action('alkima_theme_single_container_bottom'); ?>
</div>

<?php

have_posts();
wp_reset_query();

