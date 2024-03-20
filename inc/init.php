<?php

add_action('after_setup_theme', function () {

	add_theme_support('html5', ['script', 'style']);
	remove_theme_support('block-templates');
	add_theme_support('title-tag');
	add_theme_support('custom-logo');

	add_theme_support('editor-styles');


	add_editor_style('static/bundle/editor-styles.min.css');

	$gutenberg_colors = [];

	foreach (blocksy_manager()->colors->get_color_palette() as $key => $palette) {
		$gutenberg_colors[] = [
			'name' => $palette['title'],
			'slug' => $palette['slug'],
			'color' => 'var(--' . $palette['variable'] . ', ' . $palette['color'] . ')'
		];
	}

	add_theme_support(
		'editor-color-palette',
		apply_filters('blocksy:editor-color-palette', $gutenberg_colors)
	);

	add_theme_support('post-thumbnails');

	add_post_type_support('page', 'excerpt');

	$all_menus = [];

	$all_menus['footer'] = esc_html__('Footer Menu', 'blocksy');
	$all_menus['menu_1'] = esc_html__('Header Menu 1', 'blocksy');
	$all_menus['menu_2'] = esc_html__('Header Menu 2', 'blocksy');
	$all_menus['menu_mobile'] = esc_html__('Mobile Menu', 'blocksy');

	$all_menus = apply_filters('blocksy:register_nav_menus:input', $all_menus);

	// This theme uses wp_nav_menu in one location.
	if (! empty($all_menus)) {
		register_nav_menus($all_menus);
	}

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		[
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		]
	);

	// Registers support for Gutenberg wide images
	add_theme_support('align-wide');

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');
	add_theme_support('header-footer-elementor');
});

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
add_action('after_setup_theme', function () {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters(
		'blocksy_content_width',
		blocksy_get_theme_mod('maxSiteWidth', 1290)
	);
}, 0);


require get_template_directory() . '/inc/manager.php';

require get_template_directory() . '/inc/helpers.php';
require get_template_directory() . '/inc/helpers/layout.php';
require get_template_directory() . '/inc/helpers/html.php';
require get_template_directory() . '/inc/helpers/db.php';
require get_template_directory() . '/inc/helpers/dynamic-css.php';
require get_template_directory() . '/inc/helpers/cpt.php';
require get_template_directory() . '/inc/helpers/search.php';

require get_template_directory() . '/inc/classes/print.php';
require get_template_directory() . '/inc/classes/archive-title-renderer.php';
require get_template_directory() . '/inc/classes/colors.php';
require get_template_directory() . '/inc/classes/blocksy-walker-page.php';
require get_template_directory() . '/inc/classes/translations-manager.php';
require get_template_directory() . '/inc/classes/screen-manager.php';
require get_template_directory() . '/inc/classes/blocksy-blocks-parser.php';
require get_template_directory() . '/inc/components/global-attrs.php';
require get_template_directory() . '/inc/components/customizer-builder.php';

require get_template_directory() . '/inc/components/emoji-scripts.php';
require get_template_directory() . '/inc/schema-org.php';
require get_template_directory() . '/inc/classes/class-ct-attributes-parser.php';

require get_template_directory() . '/inc/css/fundamentals.php';
require get_template_directory() . '/inc/css/static-files.php';
require get_template_directory() . '/inc/css/colors.php';
require get_template_directory() . '/inc/css/selectors.php';
require get_template_directory() . '/inc/css/helpers.php';
require get_template_directory() . '/inc/css/spacing.php';
require get_template_directory() . '/inc/css/box-shadow-option.php';
require get_template_directory() . '/inc/css/typography.php';
require get_template_directory() . '/inc/css/backgrounds.php';

require get_template_directory() . '/inc/components/single/single-helpers.php';
require get_template_directory() . '/inc/components/single/content-helpers.php';
require get_template_directory() . '/inc/components/single/excerpt.php';
require get_template_directory() . '/inc/components/single/page-elements.php';
require get_template_directory() . '/inc/components/single/comments.php';

require get_template_directory() . '/inc/components/menus.php';
require get_template_directory() . '/inc/components/post-meta.php';
require get_template_directory() . '/inc/components/pagination.php';
require get_template_directory() . '/inc/components/back-to-top.php';
require get_template_directory() . '/inc/components/hero-section.php';
require get_template_directory() . '/inc/components/social-box.php';
require get_template_directory() . '/inc/components/contacts-box.php';

require get_template_directory() . '/inc/css/visibility.php';
require get_template_directory() . '/inc/meta-boxes.php';
require get_template_directory() . '/inc/components/posts-listing.php';

require get_template_directory() . '/inc/components/media/utils.php';
require get_template_directory() . '/inc/components/media/simple.php';
require get_template_directory() . '/inc/components/media/video.php';
require get_template_directory() . '/inc/components/media/full.php';

require get_template_directory() . '/inc/components/gallery.php';

require get_template_directory() . '/inc/integrations/dfi.php';
require get_template_directory() . '/inc/integrations/tribe-events.php';
require get_template_directory() . '/inc/integrations/yith.php';
require get_template_directory() . '/inc/integrations/avatars.php';
require get_template_directory() . '/inc/integrations/cdn.php';
require get_template_directory() . '/inc/integrations/stackable.php';
require get_template_directory() . '/inc/integrations/greenshift.php';
require get_template_directory() . '/inc/integrations/simply-static.php';
require get_template_directory() . '/inc/integrations/elementor.php';
require get_template_directory() . '/inc/integrations/zion.php';
require get_template_directory() . '/inc/integrations/generateblocks.php';
require get_template_directory() . '/inc/integrations/qubely.php';
require get_template_directory() . '/inc/integrations/tribe-events.php';
require get_template_directory() . '/inc/integrations/beaver-themer.php';
require get_template_directory() . '/inc/integrations/theme-builders.php';
require get_template_directory() . '/inc/integrations/cartflows.php';
require get_template_directory() . '/inc/integrations/bbpress.php';
require get_template_directory() . '/inc/integrations/fluent-forms.php';
require get_template_directory() . '/inc/integrations/coauthors.php';

require get_template_directory() . '/inc/components/archive/helpers.php';
require get_template_directory() . '/inc/components/archive/archive-card.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-actions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/footer.php';

require get_template_directory() . '/admin/helpers/all.php';

/**
 * Customizer additions.
 */

do_action('blocksy:customizer:load:before');

global $wp_customize;

if (isset($wp_customize)) {
	require get_template_directory() . '/inc/customizer/init.php';
}

if (is_admin()) {
	require get_template_directory() . '/admin/init.php';
}


if (!is_admin()) {
	add_filter('script_loader_tag', function ($tag, $handle) {
		$scripts = apply_filters('blocksy-async-scripts-handles', [
		]);

		if (in_array($handle, $scripts)) {
			return str_replace('<script ', '<script async ', $tag);
		}

		return $tag;

		// if the unique handle/name of the registered script has 'async' in it
		if (strpos($handle, 'async') !== false) {
			// return the tag with the async attribute
			return str_replace( '<script ', '<script async ', $tag );
		} else if (
			// if the unique handle/name of the registered script has 'defer' in it
			strpos($handle, 'defer') !== false
		) {
			// return the tag with the defer attribute
			return str_replace( '<script ', '<script defer ', $tag );
		} else {
			return $tag;
		}
	}, 10, 2);
}

Blocksy_Manager::instance();

// Just temporary stub
class Blocksy_Fonts_Manager {
	public function get_googgle_fonts() {
		return [];
	}
}

