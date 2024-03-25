<div class="ct-container-full">

    <?php do_action('alkima_theme_single_container_top'); ?>

    <?php if (function_exists('yoast_breadcrumb') && is_single()):
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    endif; ?>
    
    
	<?php the_content(); ?>

    <?php get_sidebar(); ?>

    <?php do_action('alkima_theme_single_container_bottom'); ?>
</div>

