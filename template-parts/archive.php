<?php

$maybe_custom_output = apply_filters(
	'alkima_theme_posts_listing_canvas_custom_output',
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

<div class="<?= $container_class ?>">
<?php if ( function_exists('yoast_breadcrumb')) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?>
	<section <?php echo $section_class ?>>
		<?= alkima_theme_render_archive_cards(); ?>
	</section>

	<?php get_sidebar(); ?>
</div>
