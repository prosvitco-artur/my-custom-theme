<?php 
class Alkima_Theme_Settings {
    
    public function __construct() {
        add_action('admin_menu', [$this, 'add_admin_menu']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_scripts']);
        add_action('wp_ajax_save_header_footer_settings', [$this, 'save_settings']);
        add_action('init', [$this, 'render_settings']);
    }

    public function add_admin_menu() {
        add_theme_page('Headers and Footers', 'Headers and Footers', 'manage_options', 'alkima_theme_options', [$this, 'options_page']);
    }

    public function options_page() {
        ?>
        <div class="container">
            <div id="react-root"></div>
        </div>
        <?php
    }

    public function enqueue_admin_scripts() {
        $screen = get_current_screen();
        if ($screen->id === 'appearance_page_alkima_theme_options') {
            wp_enqueue_style('header-footer-admin', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
            wp_enqueue_script('header-footer-admin', get_template_directory_uri() . '/dist/admin.js', [], null, true);
    
            $data_to_pass = [
                'headerSettings' => get_option('alkima_theme_header_code') ?: '',
                'bodySettings' => get_option('alkima_theme_body_code') ?: '',
                'footerSettings' => get_option('alkima_theme_footer_code') ?: '',
            ];
    
            wp_localize_script('header-footer-admin', 'token', ['nonce' => wp_create_nonce('header_footer_nonce')]);
            wp_localize_script('header-footer-admin', 'wpData', $data_to_pass);
        }
    }
    

    public function save_settings() {
        check_ajax_referer('header_footer_nonce', 'nonce');
    
        $settings_to_save = [
            'header' => isset($_POST['headerSettings']) ? json_decode(stripslashes($_POST['headerSettings']), true) : [],
            'body' => isset($_POST['bodySettings']) ? json_decode(stripslashes($_POST['bodySettings']), true) : [],
            'footer' => isset($_POST['footerSettings']) ? json_decode(stripslashes($_POST['footerSettings']), true) : [],
        ];
    
        foreach ($settings_to_save as $type => $settings) {
            $settings_to_save[$type] = array_filter($settings, function($setting) {
                return !empty($setting['code']);
            });
        }
    
        foreach ($settings_to_save as $type => $settings) {
            update_option('alkima_theme_' . $type . '_code', $settings);
        }
    
        wp_send_json_success('Settings saved successfully');
    }

    public function render_settings() {
        $this->render_code_settings('header', 'wp_head');
        $this->render_code_settings('body', 'wp_body_open');
        $this->render_code_settings('footer', 'wp_footer');
    }

    private function render_code_settings($setting_key, $hook) {
        $settings = get_option("alkima_theme_{$setting_key}_code");
        if (!empty($settings)) {
            foreach ($settings as $setting) {
                if (!empty($setting['code'])) {
                    add_action($hook, function () use ($setting) {
                        echo $setting['code'];
                    }, isset($setting['priority']) ? $setting['priority'] : 10);
                }
            }
        }
    }
}

new Alkima_Theme_Settings();