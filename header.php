<!doctype html>
<html <?php language_attributes(); ?> <?php do_action('alkima_theme_html_attr') ?>>

<head>
	<?php do_action('alkima_theme_head_start') ?>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, viewport-fit=cover">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<?php do_action('alkima_theme_head_end') ?>
</head>

<body <?php body_class(); ?> <?php do_action('alkima_theme_body_attr') ?>>

	<?php if (function_exists('wp_body_open')) {
		wp_body_open();
	} ?>

	<div id="page">
		<?php do_action('alkima_theme_header_before'); ?>
		<?php
			include get_template_directory() . '/templates/header.php';
		?>

		<?php do_action('alkima_theme_header_after'); ?>
		<?php do_action('alkima_theme_content_before'); ?>

		<main class="site-content" <?php do_action('alkima_theme_content_attr') ?>>
			<?php do_action('alkima_theme_content_top'); ?>