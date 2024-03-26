<div class="container <?php do_action('alkima_theme_archive_container_classes'); ?> ">
	<?php do_action('alkima_theme_start_archive_template'); ?>
	<section class="ct-archive-section <?php do_action('alkima_theme_archive_section_classes'); ?>">
		<?php do_action('alkima_theme_before_archive_loop'); ?>
		<div class="page-header">
			<?php
			the_archive_title('<h1 class="page-title">', '</h1>');
			the_archive_description('<div class="archive-description">', '</div>');
			?>
		</div>
		<?php
		if (have_posts()) {
			while (have_posts()) {
				the_post();

				get_template_part('template-parts/content', get_post_type());
			}
		}
		?>
		<?php do_action('alkima_theme_after_archive_loop'); ?>
		<?php
		$pagination_args = [
			'pagination_type' => 'simple',
			'last_page_text' => __('No more posts to load', 'alkima_theme'),
			'prefix' => 'blog',
		];
		$pagination_args = apply_filters('alkima_theme_pagination_args', $pagination_args);
		echo alkima_theme_render_pagination($pagination_args);
		?>
		<?php do_action('alkima_theme_after_archive_loop'); ?>
	</section>
	<?php do_action('alkima_theme_end_archive_template'); ?>

	<?php get_sidebar(); ?>
</div>