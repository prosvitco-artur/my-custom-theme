<?php


function alkima_theme_render_pagination($args = [])
{
    global $wp_query;

    $defaults = [
        'query' => $wp_query,
        'pagination_type' => 'simple',
        'last_page_text' => __('No more posts to load', 'alkima_theme'),
        'prefix' => 'blog'
    ];

    $args = wp_parse_args($args, $defaults);

    $current_page = max(1, intval($args['query']->get('paged')));
    $total_pages = max(1, $args['query']->max_num_pages);

    if ($total_pages <= 1) {
        return '';
    }

    $button_output = '';

    if ($args['pagination_type'] === 'load_more' && $current_page !== $total_pages) {
        $label_button = get_theme_mod($args['prefix'] . '_load_more_label', __('Load More', 'alkima_theme'));
        $button_output = '<button class="wp-element-button ct-load-more">' . $label_button . '</button>';
    }

    $pagination_class = 'ct-pagination';

    $template = '
    <nav class="' . $pagination_class . '">
        %1$s
        %2$s
    </nav>';

    $paginate_links_args = [
        'mid_size' => 3,
        'end_size' => 0,
        'type' => 'array',
        'total' => $total_pages,
        'current' => $current_page,
        'prev_text' => '<svg width="9px" height="9px" viewBox="0 0 15 15" fill="currentColor"><path d="M10.9,15c-0.2,0-0.4-0.1-0.6-0.2L3.6,8c-0.3-0.3-0.3-0.8,0-1.1l6.6-6.6c0.3-0.3,0.8-0.3,1.1,0c0.3,0.3,0.3,0.8,0,1.1L5.2,7.4l6.2,6.2c0.3,0.3,0.3,0.8,0,1.1C11.3,14.9,11.1,15,10.9,15z"/></svg>' . __('Prev', 'alkima_theme'),
        'next_text' => __('Next', 'alkima_theme') . ' <svg width="9px" height="9px" viewBox="0 0 15 15" fill="currentColor"><path d="M4.1,15c0.2,0,0.4-0.1,0.6-0.2L11.4,8c0.3-0.3,0.3-0.8,0-1.1L4.8,0.2C4.5-0.1,4-0.1,3.7,0.2C3.4,0.5,3.4,1,3.7,1.3l6.1,6.1l-6.2,6.2c-0.3,0.3-0.3,0.8,0,1.1C3.7,14.9,3.9,15,4.1,15z"/></svg>',
    ];

    $links = paginate_links($paginate_links_args);

    $proper_links = '';

    foreach ($links as $link) {
        $proper_links .= $link;
    }

    return sprintf($template, $proper_links, $button_output);
}