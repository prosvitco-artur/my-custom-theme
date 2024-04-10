<?php

require get_template_directory() . '/inc/init.php';


add_filter('alkima_theme_show_yoast_breadcrumb', function ($show_breadcrumb) {
  if (is_front_page()) {
    return false;
  }
  return $show_breadcrumb;
});


add_action('alkima_theme_html_attr', 'alkima_set_theme_mode');
function alkima_set_theme_mode()
{
  if (!empty($_COOKIE['theme'])) {
    echo 'data-bs-theme="' . $_COOKIE['theme'] . '"';
  }
}


add_action('alkima_theme_header_after_menu', 'alkima_theme_dark_mode_switch');
function alkima_theme_dark_mode_switch()
{ ?>
  <div class="dark-mode-switch form-check form-switch d-flex align-items-center">
    <input class="form-check-input cursor-pointer" type="checkbox" id="toggleDarkMode" <?= (isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark') ? 'checked' : ''; ?>>
    <label class="form-check-label visually-hidden" for="toggleDarkMode">
      <?php _e('Toggle theme', 'alkima_theme'); ?>
    </label>
  </div>
  <?php
}