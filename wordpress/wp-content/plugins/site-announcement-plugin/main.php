<?php
/*
Plugin Name: Site Announcement Plugin
Plugin URI: http://example.com
Description: A simple plugin to add and display site announcements.
Version: 1.0
Author: ypc
Author URI: http://yourwebsite.com
License: GPL2
*/

// Add menu item for the plugin
function sap_add_admin_menu()
{
    add_menu_page(
        'Site Announce', // Page title
        'Site Announce', // Menu title
        'manage_options',    // Capability
        'site-announcement', // Menu slug
        'sap_options_page'   // Callback function
    );
}
add_action('admin_menu', 'sap_add_admin_menu');

// Display settings page
function sap_options_page()
{
?>
    <div class="wrap">
        <h1>Site Announcement</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('sap_options');
            do_settings_sections('site-announcement');
            submit_button('Save Announcement');
            ?>
        </form>
    </div>
<?php
}

function sap_settings_init()
{
    register_setting('sap_options', 'sap_options', 'sanitize_callback');

    add_settings_section(
        'sap_section',
        'Announcement Settings',
        null,
        'site-announcement'
    );

    add_settings_field(
        'sap_text_field',
        'Announcement Message',
        'sap_text_field_render',
        'site-announcement',
        'sap_section'
    );
}
add_action('admin_init', 'sap_settings_init');

function sap_text_field_render()
{
    $options = get_option('sap_options');
?>
    <textarea cols='50' rows='5' name='sap_options[sap_text_field]'><?php echo isset($options['sap_text_field']) ? esc_textarea($options['sap_text_field']) : ''; ?></textarea>
<?php
}

function sap_display_announcement()
{
    $options = get_option('sap_options');
    return isset($options['sap_text_field']) ? '<div class="site-announcement">' . esc_html($options['sap_text_field']) . '</div>' : '';
}
add_shortcode('site_announcement', 'sap_display_announcement');



// Hook into the 'wp_dashboard_setup' action to register our dashboard widget
add_action('wp_dashboard_setup', 'daw_add_dashboard_widgets');

function daw_add_dashboard_widgets()
{
    wp_add_dashboard_widget(
        'daw_dashboard_widget',          // Widget slug
        'Site Announcement',             // Title
        'daw_dashboard_widget_display'   // Display function
    );
}

function daw_dashboard_widget_display()
{
    $announcement = get_option('sap_options');

    if (isset($announcement['sap_text_field']) && !empty($announcement['sap_text_field'])) {
        echo '<div>' . esc_html($announcement['sap_text_field']) . '</div>';
    } else {
        echo '<div>No announcement set.</div>';
    }
}
