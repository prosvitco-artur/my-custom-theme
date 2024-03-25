<div class="ct-drawer-canvas" data-location="start">
    <div id="offcanvas" class="ct-panel ct-header active" data-behaviour="modal">
        <div class="ct-panel-actions">
            <button class="ct-toggle-close" data-type="type-1" aria-label="Close drawer">
                <svg class="ct-icon" width="12" height="12" viewBox="0 0 15 15">
                    <path
                        d="M1 15a1 1 0 01-.71-.29 1 1 0 010-1.41l5.8-5.8-5.8-5.8A1 1 0 011.7.29l5.8 5.8 5.8-5.8a1 1 0 011.41 1.41l-5.8 5.8 5.8 5.8a1 1 0 01-1.41 1.41l-5.8-5.8-5.8 5.8A1 1 0 011 15z">
                    </path>
                </svg>
            </button>
        </div>
        <div class="ct-panel-content" data-device="desktop">
            <div class="ct-panel-content-inner"></div>
        </div>
        <div class="ct-panel-content" data-device="mobile">
            <div class="ct-panel-content-inner">
                <div class="ct-header-text " data-id="text">
                    <div class="entry-content">
                        <p>
                            <img class="alignnone size-medium wp-image-30"
                                src="https://wordpress-566072-2146620.cloudwaysapps.com/wp-content/uploads/2021/09/logo-light.svg"
                                alt="" width="180" height="auto">
                        </p>
                    </div>
                </div>
                <?php do_action('alkima_theme_header_before_menu'); ?>
                <?php
                wp_nav_menu([
                    'theme_location' => apply_filters('alkima_theme_header_mobile_menu_location', 'menu_1'),
                    'container' => apply_filters('alkima_theme_header_mobile_menu_container', 'nav'),
                    'container_id' => apply_filters('alkima_theme_header_mobile_menu_container_id', 'header-menu-1'),
                    'container_class' => apply_filters('alkima_theme_header_mobile_menu_container_class', 'header-menu-1'),
                    'menu_id' => apply_filters('alkima_theme_header_mobile_menu_menu_id', 'menu-header-menu'),
                    'menu_class' => apply_filters('alkima_theme_header_mobile_menu_menu_class', 'menu'),
                    'fallback_cb' => false
                ]);
                ?>
                <?php do_action('alkima_theme_header_after_menu'); ?>
            </div>
        </div>
    </div>
</div>