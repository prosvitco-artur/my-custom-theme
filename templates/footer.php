<?php
$copyright = get_theme_mod('footer_copyright_text', '<p>Copyright &copy; {current_year} - WordPress Theme by {theme_author}</p>');
$theme = wp_get_theme();
?>


<footer id="footer" class="ct-footer <?php do_action('alkima_theme_footer_class'); ?>"
    itemtype="https://schema.org/WPFooter">
    <div class="ct-container">
        <?php do_action('alkima_theme_footer_top'); ?>
        <?php
        wp_nav_menu([
            'theme_location' => apply_filters('alkima_theme_footer_menu_location', 'menu_1'),
            'container' => apply_filters('alkima_theme_footer_menu_container', 'nav'),
            'container_id' => apply_filters('alkima_theme_footer_menu_container_id', 'header-menu-1'),
            'container_class' => apply_filters('alkima_theme_footer_menu_container_class', 'header-menu-1'),
            'menu_id' => apply_filters('alkima_theme_footer_menu_menu_id', 'menu-header-menu'),
            'menu_class' => apply_filters('alkima_theme_footer_menu_menu_class', 'menu'),
            'fallback_cb' => false
        ]);
        ?>
        <?php do_action('alkima_theme_footer_middle'); ?>
    </div>
    <div data-row="bottom">
        <?php do_action('alkima_theme_footer_bottom'); ?>
        <div class="ct-container">
            <div data-column="copyright">
                <div class="ct-footer-copyright" data-id="copyright">
                    <?= str_replace(
                        ['{current_year}', '{theme_author}'],
                        [date('Y'), '<a href="' . $theme->get('AuthorURI') . '">' . $theme->get('Author') . '</a>'],
                        $copyright
                    ); ?>
                </div>
            </div>
        </div>
        <?php do_action('alkima_theme_footer_bottom_after'); ?>
    </div>
</footer>