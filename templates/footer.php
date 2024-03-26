<?php

$container_menu_classes = [
    'bg-body-tertiary',
    'pt-5',
    'pb-3'
];

$container_menu_classes = apply_filters('alkima_theme_footer_container_classes', $container_menu_classes);

?>


<footer>
    <?php do_action('alkima_theme_content_bottom'); ?>
    <div class="<?= esc_attr(implode(' ', $container_menu_classes)); ?>">
        <div class="container">
            <?php wp_nav_menu(
                [
                    'theme_location' => apply_filters('alkima_theme_footer_menu_location', 'footer'),
                    'container' => false,
                    'menu_class' => '',
                    'fallback_cb' => false,
                    'items_wrap' => '<ul id="footer-menu" class="nav %2$s">%3$s</ul>',
                    'depth' => 1,
                    'walker' => new Alkima_Bootstrap_Walker()
                ]
            ); ?>
        </div>
    </div>
    <?php do_action('alkima_theme_footer_bottom'); ?>

    <div class="bg-body-tertiary text-body-tertiary border-top py-2 text-center">
        <div class="container">
            <small>
                <span class="cr-symbol">&copy;</span>&nbsp;
                <?= date('Y'); ?>
                <?php bloginfo('name'); ?>
            </small>
        </div>

        <?php do_action('alkima_theme_footer_bottom_after'); ?>
    </div>
</footer>
