<?php
/**
 * Author page
 *
 * @copyright 2020-present Creative Themes
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @package   Blocksy
 */

$page_title_options = blocksy_get_options('general/page-title', [
	'prefix' => 'author',
	'is_author' => true
]);

$posts_listing_options = blocksy_get_options('general/posts-listing', [
	'prefix' => 'author',
	'title' => __('Author Page', 'blocksy')
]);

$inner_options = [
	blocksy_manager()->get_prefix_title_actions([
		'prefix' => 'author',
		'areas' => [
			[
				'title' => __('Page Title', 'blocksy'),
				'options' => $page_title_options,
				'sources' => array_merge(
					blocksy_manager()
						->screen
						->get_archive_prefixes_with_human_labels([
							'has_categories' => true,
							'has_author' => true,
							'has_search' => true,
							'has_woocommerce' => true
						]),

					blocksy_manager()
						->screen
						->get_single_prefixes_with_human_labels([
							'has_woocommerce' => true
						])
				)
			],

			[
				'id' => 'posts_listing',
				'title' => __('Posts Listing', 'blocksy'),
				'options' => $posts_listing_options,
				'sources' => blocksy_manager()
					->screen
					->get_archive_prefixes_with_human_labels([
						'has_categories' => true,
						'has_author' => true,
						'has_search' => true
					]),
			],

			[
				'title' => __('Pagination', 'blocksy'),
				'options' => [],
				'sources' => blocksy_manager()
					->screen
					->get_archive_prefixes_with_human_labels([
						'has_categories' => true,
						'has_author' => true,
						'has_search' => true
					]),
			]
		]
	]),

	$page_title_options,
	$posts_listing_options,

	[
		blocksy_rand_md5() => [
			'type'  => 'ct-title',
			'label' => __( 'Page Elements', 'blocksy' ),
		],
	],

	blocksy_get_options('general/sidebar-particular', [
		'prefix' => 'author',
	])
];

$options = [
	'author_section_options' => [
		'type' => 'ct-options',
		'setting' => [ 'transport' => 'postMessage' ],
		'inner-options' => $inner_options
	],
];
