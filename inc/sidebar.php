<?php
/**
 * Sidebar helpers
 *
 * @copyright 2019-present Creative Themes
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @package   Blocksy
 */

add_filter('widget_nav_menu_args', function ($nav_menu_args) {
	$nav_menu_args['menu_class'] = 'widget-menu';
	return $nav_menu_args;
}, 10, 1);

add_action(
	'dynamic_sidebar_before',
	function () {
		ob_start();
	}
);

add_action(
	'dynamic_sidebar_after',
	function () {
		$text = preg_replace(
			'/<div class="ct-widget[^>]*><\\/div[^>]*>/',
			'',
			ob_get_clean()
		);

		echo $text;
	}
);


if (! function_exists('blocksy_get_single_page_structure')) {
	function blocksy_get_single_page_structure() {
		$default_page_structure = blocksy_default_akg(
			'page_structure_type',
			blocksy_get_post_options(),
			'default'
		);

		if ($default_page_structure !== 'default') {
			return $default_page_structure;
		}

		$prefix = blocksy_manager()->screen->get_prefix();

		$result = 'none';

		if (
			! is_singular()
			&&
			$prefix !== 'bbpress_single'
			&&
			$prefix !== 'buddypress_single'
			&&
			(
				$prefix !== 'courses_archive'
				&&
				function_exists('tutor')
				||
				! function_exists('tutor')
			)
			&&
			(
				$prefix !== 'tribe_events_single'
				&&
				class_exists('Tribe__Events__Main')
				||
				! class_exists('Tribe__Events__Main')
			)
			&&
			(
				$prefix !== 'tribe_events_archive'
				&&
				class_exists('Tribe__Events__Main')
				||
				! class_exists('Tribe__Events__Main')
			)
		) {
			$result = 'none';
		} else {
			$default_structure = ($prefix === 'single_blog_post') ? 'type-3' : 'type-4';

			if ($prefix === 'courses_single' && function_exists('tutor')) {
				$default_structure = 'type-1';
			}

			$result = blocksy_get_theme_mod($prefix . '_structure', $default_structure);

			if ($prefix === 'courses_single' && function_exists('tutor')) {
				$current_template = blocksy_manager()->get_current_template();

				if ($current_template !== tutor_get_template('single-course')) {
					$result = 'type-4';
				}
			}
		}

		if ($prefix === 'lms') {
			$result = 'none';
		}

		return apply_filters('blocksy:global:page_structure', $result);
	}
}

if (! function_exists('blocksy_get_page_structure')) {
	function blocksy_get_page_structure() {
		$page_structure_type = blocksy_get_single_page_structure();

		if ('type-3' === $page_structure_type) {
			return 'narrow';
		}

		if (
			$page_structure_type === 'type-4'
			||
			$page_structure_type === 'type-5'
		) {
			return 'normal';
		}

		return 'none';
	}
}

