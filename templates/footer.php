<?php
$copyright = get_theme_mod('footer_copyright_text', '<p>Copyright &copy; {current_year} - WordPress Theme by {theme_author}</p>');
$theme = wp_get_theme();
?>


<footer id="footer" class="ct-footer" itemtype="https://schema.org/WPFooter">
    <div class="ct-container">
        <?php
        wp_nav_menu([
            'theme_location' => 'menu_1',
            'container' => 'nav',
            'container_id' => 'header-menu-1',
            'container_class' => 'header-menu-1',
            'menu_id' => 'menu-header-menu',
            'menu_class' => 'menu',
            'depth' => 1,
            'fallback_cb' => false
        ]);
        ?>
    </div>
    <div data-row="bottom">
        <div class="ct-container" data-columns-divider="md:sm">
            <div data-column="copyright">
                <div class="ct-footer-copyright" data-id="copyright">
                    
                    <?php
                    echo str_replace(
                        ['{current_year}', '{theme_author}'],
                        [date('Y'),'<a href="' . $theme->get('AuthorURI') . '">' . $theme->get('Author') . '</a>' ],
                        $copyright
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>