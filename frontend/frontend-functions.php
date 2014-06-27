<?php
/**
 * @package Frontend
 */


/**
 * Enqueue genericons
 */
function catchwebtools_enqueue_genericons( $hook_suffix ) {
	wp_enqueue_style( 'catchwebtools-genericons', CATCHWEBTOOLS_URL . 'css/genericons.css', false, '3.0.1' );
}

/**
 * Check and implement if genericons css needs to included
 */
$get_social_settings = (array) get_option( 'catchwebtools_social' );
if( isset( $get_social_settings['status'] ) && $get_social_settings['status'] )
	add_action( 'wp_enqueue_scripts', 'catchwebtools_enqueue_genericons' );
	
require_once 'inc/webmasters-tools.php';

require_once 'inc/opengraph-tools.php';

require_once 'inc/seo.php';

require_once 'inc/custom-css.php';

/**
 * Function to get header information to output in wp_head
 * @uses catchwebtools_webmaster_header_display, catchwebtools_opengraph_display, catchwebtools_seo_display, catchwebtools_custom_css_display
 */
function catchwebtools_get_header_information(){
	$webmaster	=	catchwebtools_webmaster_header_display();
	$opengraph	=	catchwebtools_opengraph_display();
	$seo		=	catchwebtools_seo_display();
	$custom_css	=	catchwebtools_custom_css_display();
	
	echo '<!-- This site is optimized with the Catch Web Tools v'. CATCHWEBTOOLS_VERSION .' - http://catchwebtools.com -->'. PHP_EOL ;
	echo $webmaster. PHP_EOL ;
	echo $opengraph. PHP_EOL ;
	echo $seo. PHP_EOL ;
	echo $custom_css. PHP_EOL ;
	echo '<!-- / Catch Web Tools plugin. -->'. PHP_EOL ;
}
add_action('wp_head', 'catchwebtools_get_header_information',99);

/**
 * Function to get footer information to output in wp_footer
 * @uses catchwebtools_webmaster_footer_display
 */
function catchwebtools_get_footer_information(){
	$webmaster	=	catchwebtools_webmaster_footer_display();
	
	echo '<!-- This site is optimized with the Catch Web Tools v'. CATCHWEBTOOLS_VERSION .' - http://catchwebtools.com -->'. PHP_EOL ;
	echo $webmaster. PHP_EOL ;
	echo '<!-- / Catch Web Tools plugin. -->'. PHP_EOL ;
}
add_action('wp_footer', 'catchwebtools_get_footer_information',99);
