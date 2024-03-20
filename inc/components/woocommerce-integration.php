<?php

namespace Blocksy;

add_filter(
	'blocksy_theme_autoloader_classes_map',
	function ($classes) {
		$prefix = 'inc/components/woocommerce/';

		$classes['WooCommerceBoot'] = $prefix . 'boot.php';
		$classes['WooCommerceImageSizes'] = $prefix . 'common/image-sizes.php';

		$classes['WooCommerceSingle'] = $prefix . 'single/single.php';
		$classes['WooCommerceAddToCart'] = $prefix . 'single/add-to-cart.php';
		$classes['SingleProductAdditionalActions'] = $prefix . 'single/additional-actions-layer.php';

		$classes['WooDefaultPages'] = $prefix . 'common/default-pages.php';
		$classes['WooCommerceCheckout'] = $prefix . 'common/checkout.php';

		return $classes;
	}
);

class WooCommerce {
	public $single = null;
	public $checkout = null;

	public function __construct() {
		new WooCommerceBoot();

		new WooDefaultPages();
		new WooCommerceImageSizes();

		$this->single = new WooCommerceSingle();

		$this->checkout = new WooCommerceCheckout();
	}
}

