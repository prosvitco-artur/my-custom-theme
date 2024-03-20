<?php

if (! function_exists('blocksy_is_page_title_default')) {
	function blocksy_is_page_title_default() {
		if (blocksy_is_page() || is_single()) {
			$post_options = blocksy_get_post_options();

			$mode = blocksy_akg('has_hero_section', $post_options, 'default');

			if ($mode !== 'default') {
				return false;
			}
		}

		return true;
	}
}

if (! function_exists('blocksy_get_page_title_source')) {
	function blocksy_get_page_title_source() {
		static $result = null;

		if (! is_null($result)) {
			if (! is_customize_preview()) {
				return $result;
			}
		}

		$maybe_custom_source = apply_filters(
			'blocksy:hero:custom-source',
			null
		);

		if ($maybe_custom_source !== null) {
			$result = $maybe_custom_source;
			return $result;
		}

		$prefix = blocksy_manager()->screen->get_prefix();

		if ($prefix === 'ct_content_block_single') {
			$result = false;
			return $result;
		}

		if ($prefix === 'ct_product_tab_single') {
			$result = false;
			return $result;
		}

		if ($prefix === 'ct_size_guide_single') {
			$result = false;
			return $result;
		}

		if ($prefix === 'jet-woo-builder_single') {
			$result = false;
			return $result;
		}

		if ($prefix && strpos($prefix, 'single') !== false || (
			function_exists('is_shop') && is_shop()
		) && ! is_search()) {
			$post_options = blocksy_get_post_options();

			$mode = blocksy_akg('has_hero_section', $post_options, 'default');

			if ($mode === 'disabled') {
				$result = false;
				return $result;
			}

			if ($mode === 'enabled')  {
				$result = [
					'strategy' => $post_options
				];
				return $result;
			}
		}

		$default_value = 'yes';

		if (
			$prefix === 'blog'
			||
			$prefix === 'tribe_events_single'
		) {
			$default_value = 'no';
		}

		if (blocksy_get_theme_mod($prefix . '_hero_enabled', $default_value) === 'no') {
			$result = false;
			return $result;
		}

		$result = [
			'strategy' => 'customizer',
			'prefix' => $prefix
		];

		return $result;
	}
}

if (! function_exists('blocksy_first_level_deep_link')) {
	function blocksy_first_level_deep_link($prefix) {
		if ($prefix === 'blog') {
			return 'blog_posts';
		}

		if ($prefix === 'author') {
			return 'author_page';
		}

		if ($prefix === 'search') {
			return 'search_page';
		}

		if ($prefix === 'woo_categories') {
			return 'woocommerce_posts_archives';
		}

		if ($prefix === 'categories') {
			return 'archive_blog_posts_categories';
		}

		if ($prefix === 'single_page') {
			return 'single_pages';
		}

		if ($prefix === 'single_blog_post') {
			return 'single_blog_posts';
		}

		if ($prefix === 'product') {
			return 'woocommerce_single';
		}

		if ($prefix && strpos($prefix, '_archive') !== false) {
			return 'post_type_archive_' . str_replace(
				'_archive', '', $prefix
			);
		}

		if ($prefix && strpos($prefix, '_single') !== false) {
			return 'post_type_single_' . str_replace(
				'_single', '', $prefix
			);
		}

		return null;
	}
}

if (! function_exists('blocksy_hero_get_deep_link')) {
	function blocksy_hero_get_deep_link($source) {
		if (! $source) {
			return null;
		}

		if (! isset($source['prefix'])) {
			return null;
		}

		$first_level = blocksy_first_level_deep_link($source['prefix']);

		if (! $first_level) {
			return null;
		}

		return $first_level . ':' . $source['prefix'] . '_hero_enabled';
	}
}
