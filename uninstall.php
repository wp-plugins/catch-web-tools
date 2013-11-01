<?php
/**
 * @package Catch_web_tools
 * @version 1.0
 * Code used when the plugin is removed (not just deactivated but actively deleted through the WordPress Admin).
 */

if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) 
    exit();

$options	=	array( 	'catchwebtools_webmaster', 
						'catchwebtools_opengraph', 
						'catchwebtools_custom_css', 
						'catchwebtools_seo', 
						'catchwebtools_social', 
						'catchwebtools_catchids' 
				);

$transient_options	=	array( 	'catchwebtools_webmaster_transient', 
						'catchwebtools_opengraph_transient', 
						'catchwebtools_custom_css_transient', 
						'catchwebtools_seo_transient', 
						'catchwebtools_social_transient', 
						'catchwebtools_catchids_transient' 
				);
				
// For Single site
if ( !is_multisite() ) 
{
    foreach ( $options as $option) {
		delete_option( $option );
	}
	foreach ( $transient_options as $option) {
		delete_transient( $option );
	}
} 
// For Multisite
else 
{
    global $wpdb;
    $blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
    $original_blog_id = get_current_blog_id();
    foreach ( $blog_ids as $blog_id ) 
    {
		switch_to_blog( $blog_id );
		foreach ( $options as $option) {
			delete_site_option( $option );
		}
		foreach ( $transient_options as $option) {
			delete_transient( $option );
		}
    }
    switch_to_blog( $original_blog_id );
}