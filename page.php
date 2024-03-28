<?php get_header(); ?>
<div id="content">
    <?php while (have_posts()):
        the_post();

        get_template_part('template-parts/content', 'page');

    endwhile;

    get_sidebar();
    ?>
</div>
<?php
get_footer();
