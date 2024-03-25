<?php

$container_class = apply_filters('alkima_theme_archive_container_classes', 'ct-container');
$section_class = apply_filters('alkima_theme_archive_section_classes', 'ct-archive-section');
?>

<div class="<?= $container_class ?>">
	<?php do_action('alkima_theme_start_archive_template'); ?>
	<section class="<?= $section_class ?>">

		<?php
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				include get_template_directory() . '/templates/single-card.php';
			}
		}
		?>
		<?php
		$pagination_args = [
			'pagination_type' => 'simple',
			'last_page_text' => __('No more posts to load', 'alkima_theme'),
			'prefix' => 'blog',
		];
		$pagination_args = apply_filters('alkima_theme_pagination_args', $pagination_args);
		echo alkima_theme_render_pagination($pagination_args);
		?>
	</section>

	<?php get_sidebar(); ?>
</div>