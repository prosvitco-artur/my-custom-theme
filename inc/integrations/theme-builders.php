<?php

if (! function_exists('blocksy_output_header')) {
	function blocksy_output_header() {
		global $blocksy_has_default_header;

		$show_header = apply_filters('blocksy:builder:header:enabled', true);

		if (! $show_header) {
			return;
		}

		if (function_exists('hfe_render_header') && hfe_header_enabled()) {
			hfe_render_header();
			return;
		}

		if (
			function_exists('elementor_theme_do_location')
			&&
			elementor_theme_do_location('header')
		) {
			return;
		}

		if (class_exists('FLThemeBuilderLayoutData')) {
			$header_ids = FLThemeBuilderLayoutData::get_current_page_header_ids();

			if (! empty($header_ids)) {
				FLThemeBuilderLayoutRenderer::render_header();
			}
		}

		$header_result = Blocksy_Manager::instance()->header_builder->render();

		if (! empty($header_result)) {
			$blocksy_has_default_header = true;
			echo $header_result;
		}
	}
}

if (! function_exists('blocksy_output_footer')) {
	function blocksy_output_footer() {
		$show_footer = apply_filters('blocksy:builder:footer:enabled', true);

		if (! $show_footer) {
			return;
		}

		if (function_exists('hfe_footer_enabled') && hfe_footer_enabled()) {
			hfe_render_footer();
			return;
		}

		if (
			function_exists('elementor_theme_do_location')
			&&
			elementor_theme_do_location('footer')
		) {
			return;
		}

		if (class_exists('FLThemeBuilderLayoutData')) {
			$footer_ids = FLThemeBuilderLayoutData::get_current_page_footer_ids();

			if (! empty($footer_ids)) {
				FLThemeBuilderLayoutRenderer::render_footer();
			}
		}

		echo blocksy_manager()->footer_builder->render();
	}
}
