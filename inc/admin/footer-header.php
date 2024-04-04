<?php

add_action('admin_menu', 'alkima_theme_add_admin_menu');
function alkima_theme_add_admin_menu()
{
    add_theme_page('Headers and Footers', 'Headers and Footers', 'manage_options', 'alkima_theme_options', 'alkima_theme_options_page');
}

function alkima_theme_options_page()
{
    ?>
    <div class="wrap">
        <h2>WP Headers and Footers</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields('alkima_theme_options');
            do_settings_sections('alkima_theme_options');
            submit_button();
            ?>
        </form>
    </div>
<?php
}

add_action('admin_init', 'alkima_theme_admin_init');
function alkima_theme_admin_init()
{
    register_setting('alkima_theme_options', 'alkima_theme_options', 'alkima_theme_options_validate');

    add_settings_section('alkima_theme_main', 'Main Settings', 'alkima_theme_section_text', 'alkima_theme_options');
    add_settings_field('alkima_theme_header', 'Header', 'alkima_theme_setting_header', 'alkima_theme_options', 'alkima_theme_main');
    add_settings_field('alkima_theme_footer', 'Footer', 'alkima_theme_setting_footer', 'alkima_theme_options', 'alkima_theme_main');
}

function alkima_theme_options_validate($input)
{
    return $input;
}

function alkima_theme_section_text()
{
    echo '<p>Enter the header and footer code below.</p>';
}

function alkima_theme_setting_header()
{
    $options = get_option('alkima_theme_options');
    echo "<textarea id='alkima_theme_header' name='alkima_theme_options[header]' rows='10' cols='50'>{$options['header']}</textarea>";
}

function alkima_theme_setting_footer()
{
    $options = get_option('alkima_theme_options');
    echo "<textarea id='alkima_theme_footer' name='alkima_theme_options[footer]' rows='10' cols='50'>{$options['footer']}</textarea>";
}

add_action('wp_head', 'alkima_theme_header_code');
function alkima_theme_header_code()
{
    $options = get_option('alkima_theme_options');
    echo $options['header'];
}

add_action('wp_footer', 'alkima_theme_footer_code');
function alkima_theme_footer_code()
{
    $options = get_option('alkima_theme_options');
    echo $options['footer'];
}
