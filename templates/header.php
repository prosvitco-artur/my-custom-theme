


<header id="masthead" class="site-header">
    <div class="fixed-top bg-body-tertiary">
        <nav id="nav-main" class="navbar navbar-expand-lg">
            <div class="container">
                <?php do_action('alkima_theme_header_before_logo'); ?>
                <?php if ($custom_logo_id = get_theme_mod('custom_logo')): ?>
                    <?php $logo = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>
                    <?php $logo_src = $logo[0]; ?>
                    <?php $logo_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true); ?>
                    <a class="navbar-brand" href="<?= esc_url(home_url()); ?>">
                        <img src="<?= $logo_src ?>" alt="logo" class="logo xs">
                    </a>
                <?php endif; ?>
                <?php do_action('alkima_theme_header_after_logo'); ?>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-navbar">
                    <div class="offcanvas-header">
                        <?php do_action('alkima_theme_header_before_menu_toggle'); ?>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <?php do_action('alkima_theme_header_before_menu'); ?>
                    <div class="offcanvas-body">
                        <?php
                        wp_nav_menu(
                            [
                                'theme_location' => apply_filters('alkima_theme_header_menu_location', 'menu_1'),
                                'container' => false,
                                'menu_class' => '',
                                'fallback_cb' => false,
                                'items_wrap' => '<ul class="navbar-nav ms-auto %2$s">%3$s</ul>',
                                'depth' => 2,
                                'walker' => new Alkima_Bootstrap_Walker(),
                            ]
                        );
                        ?>
                        <div class="dark-mode-switch form-check form-switch">
                            <input class="form-check-input cursor-pointer" type="checkbox" id="bs-theme-switcher">
                            <label class="form-check-label visually-hidden" for="bs-theme-switcher"><?php _e('Toggle theme', 'bootscore'); ?></label>
                        </div>
                    </div>
                    <?php do_action('alkima_theme_header_after_menu'); ?>
                </div>

                <div class="header-actions d-flex align-items-center">
                    <button class="btn btn-outline-secondary d-lg-none ms-1 ms-md-2" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvas-navbar" aria-controls="offcanvas-navbar">
                        <?= apply_filters('alkima_theme_header_mobile_icon', '<i class="fa-solid fa-bars"></i>'); ?>
                        <span class="visually-hidden-focusable">Menu</span>
                    </button>
                </div>
            </div>
        </nav>
    </div>
</header>