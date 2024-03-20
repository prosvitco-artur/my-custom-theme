<?php

if (have_posts()) {
	the_post();
}

?>

	<div class="ct-container">

		<?php do_action('blocksy:single:container:top'); ?>

		<?= blocksy_single_content();?>

		<?php get_sidebar(); ?>

		<?php do_action('blocksy:single:container:bottom'); ?>
	</div>

<?php

blocksy_display_page_elements('separated');

have_posts();
wp_reset_query();

