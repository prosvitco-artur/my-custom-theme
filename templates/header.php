<header id="header" class="ct-header" itemtype="https://schema.org/WPHeader">
    <div class="ct-container">
        <?php do_action('alkima_theme_header_before_logo'); ?>

        <?php
        $logo_height = get_theme_mod('header_logo_size', 50);
        $style = "max-height: {$logo_height}px;";

        ?>
        <div class="site-branding" data-id="logo" itemscope="itemscope" itemtype="https://schema.org/Organization">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            if ($custom_logo_id) {
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                $logo_src = $logo[0];
                $logo_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);
                echo "<img src='{$logo_src}' style='{$style}'  alt='{$logo_alt}' />";
            }

            ?>
        </div>
        <?php do_action('alkima_theme_header_after_logo'); ?>
        <div data-items="primary">
            <?php do_action('alkima_theme_header_before_menu'); ?>
            <?php
            wp_nav_menu([
                'theme_location' => apply_filters('alkima_theme_header_menu_location', 'menu_1'),
                'container' => apply_filters('alkima_theme_header_menu_container', 'nav'),
                'container_id' => apply_filters('alkima_theme_header_menu_container_id', 'header-menu-1'),
                'container_class' => apply_filters('alkima_theme_header_menu_container_class', 'header-menu-1'),
                'menu_id' => apply_filters('alkima_theme_header_menu_menu_id', 'menu-header-menu'),
                'menu_class' => apply_filters('alkima_theme_header_menu_menu_class', 'menu'),
                'fallback_cb' => false
            ]);
            ?>
            <?php do_action('alkima_theme_header_after_menu'); ?>
        </div>
    </div>
</header>