<header id="header" class="ct-header" itemtype="https://schema.org/WPHeader">
    <div data-device="desktop">
        <div class="ct-container">
            <?php do_action('alkima_theme_header_before_logo'); ?>
            <div class="site-branding" data-id="logo" itemscope="itemscope" itemtype="https://schema.org/Organization">
                <?php if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                } ?>
            </div>
            <?php do_action('alkima_theme_header_after_logo'); ?>
            <div data-items="primary">
                <?php do_action('alkima_theme_header_before_menu'); ?>
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container' => 'nav',
                    'container_id' => 'header-menu-1',
                    'container_class' => 'header-menu-1',
                    'menu_id' => 'menu-header-menu',
                    'menu_class' => 'menu',
                    'depth' => 1,
                    'fallback_cb' => false
                ]);
                ?>
                <?php do_action('alkima_theme_header_after_menu'); ?>
            </div>
        </div>
    </div>
    <div data-device="mobile">
        <div class="ct-container">
            <div data-column="start" data-placements="1">
                <div data-items="primary">
                    <div class="site-branding" data-id="logo">
                        <?php if (function_exists('the_custom_logo')) {
                            the_custom_logo();
                        } ?>
                    </div>
                </div>
            </div>
            <div data-column="end" data-placements="1">
                <div data-items="primary">
                    <button data-toggle-panel="#offcanvas" class="ct-header-trigger ct-toggle " data-design="simple"
                        data-label="right" aria-label="Menu" data-id="trigger">
                        <span class="ct-label ct-hidden-sm ct-hidden-md ct-hidden-lg">Menu</span>
                        <svg class="ct-icon" width="18" height="14" viewBox="0 0 18 14" aria-hidden="true"
                            data-type="type-1">
                            <rect y="0.00" width="18" height="1.7" rx="1"></rect>
                            <rect y="6.15" width="18" height="1.7" rx="1"></rect>
                            <rect y="12.3" width="18" height="1.7" rx="1"></rect>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>