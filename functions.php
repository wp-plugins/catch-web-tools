<?php
/**
 * Plugin Name: Catch Web Tools
 * Plugin URI: http://catchthemes.com/wp-plugins/catch-web-tools/
 * Description: Catch Web Tools is a new modular plugin from Catch Themes. Power up your WordPress site with powerful features that were till now only available to Catch Themes users. We currently offer Webmaster Tools, Open Graph, Custom CSS, Social Icons, Catch IDs and basic SEO Optimization modules and will be adding more.
 * Author: Catch Themes
 * Author URI:  http://catchthemes.com
 * Version: 1.4.1
 * License: GNU General Public License, version 3 (GPLv3)
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Requires at least: 4.1
 * Tested up to: 4.3.1
 *
 * Text Domain: catch-web-tools
 * Domain Path: /catch-web-tools/
 *
 * @package Catch Themes
 * @subpackage Catch Web Tools
 * @author CatchThemes
 */
 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


// Define Version
define( 'CATCHWEBTOOLS_VERSION', '1.3' );

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
	load_plugin_textdomain( 'catch-web-tools', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'init', 'catchwebtools_load_textdomain', 1 );


/**
 * Compare PHP Version
 *
 * Activate only if PHP version 5.2 or above
 */
if ( version_compare( PHP_VERSION, '5.2', '<' ) ) {
	if ( is_admin() && ( !defined( 'DOING_AJAX' ) || !DOING_AJAX ) ) {
		require_once ABSPATH . '/wp-admin/includes/plugin.php';
		
		deactivate_plugins( __FILE__ );
		
		wp_die( sprintf( __( 'Catch Web Tools requires PHP 5.2 or higher, as does WordPress 3.5 and higher. The plugin has now disabled itself.', 'catch-web-tools' ) ) );
	} else {
		return;
	}
}

/**
 * Function to get catchwebtools options from parameter 
 * 
 * @param $field:option field name
 */
function catchwebtools_get_options( $field ){
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