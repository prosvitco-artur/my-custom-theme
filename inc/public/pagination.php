<?php

defined('ABSPATH') || exit;

if (!function_exists('alkima_theme_render_pagination')):

    function alkima_theme_render_pagination($pages = '', $range = 2)
    {
        $showitems = ($range * 2) + 1;
        global $paged;
        if (empty ($paged))
            $paged = 1;
        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if (!$pages) {
                $pages = 1;
            }
        }
        ob_start();
        ?>

        <nav aria-label="Page navigation">
            <span class="visually-hidden">
                <?php esc_html_e('Page navigation', 'bootscore'); ?>
            </span>
            <ul class="pagination justify-content-center mb-4">

                <?php if ($paged > 2 && $paged > $range + 1 && $showitems < $pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo get_pagenum_link(1); ?>"
                            aria-label="<?php esc_html_e('First Page', 'bootscore'); ?>">&laquo;
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($paged > 1 && $showitems < $pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo get_pagenum_link($paged - 1); ?>"
                            aria-label="<?php esc_html_e('Previous Page', 'bootscore'); ?>">
                            &lsaquo;
                        </a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $pages; $i++): ?>
                    <?php if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)): ?>
                        <?php if ($paged == $i): ?>
                            <li class="page-item active">
                                <span class="page-link">
                                    <span class="visually-hidden">
                                        <?php echo __('Current Page', 'bootscore') . ' ' . $i; ?>
                                    </span>
                                    <?php echo $i; ?>
                                </span>
                            </li>
                        <?php else: ?>
                            <li class="page-item"><a class="page-link" href="<?php echo get_pagenum_link($i); ?>">
                                    <span class="visually-hidden">
                                        <?php echo __('Page', 'bootscore') . ' ' . $i; ?>
                                    </span>
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($paged < $pages && $showitems < $pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo get_pagenum_link(($paged === 0 ? 1 : $paged) + 1); ?>"
                            aria-label="<?php esc_html_e('Next Page', 'bootscore'); ?>">
                            &rsaquo;
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo get_pagenum_link($pages); ?>"
                            aria-label="<?php esc_html_e('Last Page', 'bootscore'); ?>">
                            &raquo;
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
        </nav>

        <?php
        echo ob_get_clean();

    }

endif;


add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');

function post_link_attributes($output)
{
    $code = 'class="page-link"';

    return str_replace('<a href=', '<a ' . $code . ' href=', $output);
}
?>