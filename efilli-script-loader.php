<?php
/**
 * Plugin Name: Efilli Script Loader
 * Plugin URI: https://efilli.com
 * Description: Adds the Efilli script to the head section of your WordPress site
 * Version: 1.0.0
 * Author: Samed SARIAYDIN
 * Author URI: https://profiles.wordpress.org/samedsariaydin/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: efilli-script-loader
 */

// Prevent direct access to this file
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add Efilli script to WordPress head
 */
function add_efilli_script_to_head() {
    // Get the site URL and remove protocol
    $site_url = str_replace('https://', '', site_url());
    
    // Output the script tag
    echo '<script src="https://bundles.efilli.com/' . esc_attr($site_url) . '.prod.js"></script>' . "\n";
}

// Hook the function to wp_head with priority 0 (early execution)
add_action('wp_head', 'add_efilli_script_to_head', 0);

/**
 * Add settings link to plugins page
 */
function efilli_script_loader_settings_link($links) {
    $settings_link = '<a href="' . admin_url('options-general.php') . '">' . __('Settings', 'efilli-script-loader') . '</a>';
    array_unshift($links, $settings_link);
    return $links;
}

// Add settings link to plugin listing
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'efilli_script_loader_settings_link');

/**
 * Plugin activation hook
 */
function efilli_script_loader_activate() {
    // Add activation timestamp
    add_option('efilli_script_loader_activated', current_time('timestamp'));
}

/**
 * Plugin deactivation hook
 */
function efilli_script_loader_deactivate() {
    // Clean up activation timestamp
    delete_option('efilli_script_loader_activated');
}

// Register activation and deactivation hooks
register_activation_hook(__FILE__, 'efilli_script_loader_activate');
register_deactivation_hook(__FILE__, 'efilli_script_loader_deactivate');

/**
 * Add admin notice on activation
 */
function efilli_script_loader_admin_notice() {
    if (get_option('efilli_script_loader_activated')) {
        echo '<div class="notice notice-success is-dismissible">';
        echo '<p><strong>Efilli Script Loader</strong> has been activated successfully. The Efilli script is now being loaded on your site.</p>';
        echo '</div>';
        delete_option('efilli_script_loader_activated');
    }
}

// Show admin notice
add_action('admin_notices', 'efilli_script_loader_admin_notice'); 