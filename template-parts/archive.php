<?php

$prefix = blocksy_manager()->screen->get_prefix();

$maybe_custom_output = apply_filters(
	'blocksy:posts-listing:canvas:custom-output',
	null
);

if ($maybe_custom_output) {
	echo $maybe_custom_output;
	return;
}

$container_class = 'ct-container';

$section_class = '';

if (! have_posts()) {
	$section_class = 'class="ct-no-results"';
}

?>

<div class="<?= $container_class ?>" <?= wp_kses_post(blocksy_sidebar_position_attr()); ?>>
	<section <?php echo $section_class ?>>
		<?= blocksy_render_archive_cards(); ?>
	</section>

	<?php get_sidebar(); ?>
</div>
