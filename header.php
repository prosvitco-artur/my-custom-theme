<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<?php do_action('alkima_theme_head_start') ?>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, viewport-fit=cover">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<?php do_action('alkima_theme_head_end') ?>
</head>

<?php
ob_start();
alkima_theme_output_header();
$global_header = ob_get_clean();
?>

<body <?php body_class(); ?> <?php do_action('alkima_theme_body_attr') ?>>

	<?php if (function_exists('wp_body_open')) {
		wp_body_open();
	} ?>

	<div id="main-container">
		<?php do_action('alkima_theme_header_before'); ?>

		<?= $global_header; ?>

		<?php do_action('alkima_theme_header_after'); ?>
		<?php do_action('alkima_theme_content_before'); ?>

		<main class="site-main" <?php do_action('alkima_theme_content_attr') ?>>
			<?php do_action('alkima_theme_content_top'); ?>