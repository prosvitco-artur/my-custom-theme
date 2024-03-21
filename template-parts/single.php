<?php

if (have_posts()) {
	the_post();
}

if(is_single() ) {
	$container_class = 'ct-container';
} else {
	$container_class = 'ct-container-full';
}

?>

	<div
		class="<?= $container_class ?>"
		<?php // echo $data_container_output; ?>>

		<?php do_action('blocksy:single:container:top'); ?>

		<?= blocksy_single_content();?>

		<?php get_sidebar(); ?>

		<?php do_action('blocksy:single:container:bottom'); ?>
	</div>

<?php

blocksy_display_page_elements('separated');

have_posts();
wp_reset_query();

