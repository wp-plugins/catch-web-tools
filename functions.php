<?php
/**
 * Plugin Name: Catch Web Tools
 * Plugin URI: http://catchthemes.com/wp-plugins/catch-web-tools/
 * Description: Catch Web Tools is a simple and lightweight WordPress plugin to help you manage your WordPress site. Power up your WordPress site with powerful features that were till now only available to Catch Themes users. We currently offer Webmaster Tools, Open Graph, Custom CSS, Social Icons, Catch IDs and basic SEO Optimization.
 * Author: Catch Themes Team
 * Author URI:  http://catchthemes.com
 * Version: 0.1
 * License: GPLv2 or later (license.txt)
 * Requires at least: 3.5
 * Tested up to: 3.7.1
 *
 * Text Domain: catch-web-tools
 * Domain Path: /catch-web-tools/
 *
 * @package catch_web_tools
 * @author CatchThemes
 */


// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


// Define Version
define( 'CATCHWEBTOOLS_VERSION', '0.1' );


// The URL of the directory that contains the plugin
if ( !defined( 'CATCHWEBTOOLS_URL' ) )
	define( 'CATCHWEBTOOLS_URL', plugin_dir_url( __FILE__ ) );


// The absolute path of the directory that contains the file
if ( !defined( 'CATCHWEBTOOLS_PATH' ) )
	define( 'CATCHWEBTOOLS_PATH', plugin_dir_path( __FILE__ ) );


// Gets the path to a plugin file or directory, relative to the plugins directory, without the leading and trailing slashes. 
if ( !defined( 'CATCHWEBTOOLS_BASENAME' ) )
	define( 'CATCHWEBTOOLS_BASENAME', plugin_basename( __FILE__ ) );
	

/**
 * Make plugin available for translation
 * Translations can be filed in the /languages/ directory
 */
function catchwebtools_load_textdomain() {
	load_plugin_textdomain( 'catch-web-tools', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_filter( 'wp_loaded', 'catchwebtools_load_textdomain' );


/**
 * Compare PHP Version
 *
 * Activate only if PHP version 5.2 or above
 */
if ( version_compare( PHP_VERSION, '5.2', '<' ) ) {
	if ( is_admin() && ( !defined( 'DOING_AJAX' ) || !DOING_AJAX ) ) {
		require_once ABSPATH . '/wp-admin/includes/plugin.php';
		
		deactivate_plugins( __FILE__ );
		
		wp_die( sprintf( __( 'Catch Web Tools requires PHP 5.2 or higher, as does WordPress 3.5 and higher. The plugin has now disabled itself.', 'catchwebtools' ) ) );
	} else {
		return;
	}
}

/**
 * Function to get catchwebtools options from parameter 
 * 
 * @param $field:option field name
 */
function get_catchwebtools_options( $field ){
	// Get any existing copy of our transient data
	if ( false === ( $settings = get_transient( $field.'_transient' ) ) ) {
		// It wasn't there, so regenerate the data and save the transient
		$settings	= get_option( $field );
		
		set_transient( $field.'_transient', $settings, 7 * DAY_IN_SECONDS );
	}
	return $settings;
}


// Include Admin functions
require_once CATCHWEBTOOLS_PATH . '/admin/admin-functions.php';


// Include Frontend functions
require_once CATCHWEBTOOLS_PATH . '/frontend/frontend-functions.php';