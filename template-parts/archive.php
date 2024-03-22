<?php

$container_class = apply_filters('alkima_theme_archive_container_classes', 'ct-container');
$section_class = apply_filters('alkima_theme_archive_section_classes', 'ct-archive-section');


?>

<div class="<?= $container_class ?>">
	<?php do_action('alkima_theme_start_archive_template'); ?>
	<section class="<?= $section_class ?>">
		<?= alkima_theme_render_archive_cards(); ?>
	</section>

	<?php get_sidebar(); ?>
</div>