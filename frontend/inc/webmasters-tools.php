<?php
/**
 * @package Frontend
 * @sub-package Webmaster Tools
 */

/**
 * Get the webmaster setting for header and format output
 * @return [string] [webmaster header information]
 */
function catchwebtools_webmaster_header_display(){
	$webmaster_settings	=	get_catchwebtools_options( 'catchwebtools_webmaster' );
	
	$output		=	'';
	if( isset( $webmaster_settings['status'] ) && $webmaster_settings['status'] ){
		
		if( isset( $webmaster_settings['header'] ) && $webmaster_settings['header'] != '' ) 
			$output .= $webmaster_settings['header'] . PHP_EOL ;
		
		if( isset( $webmaster_settings['google-site-verification'] ) && $webmaster_settings['google-site-verification'] != '' ) 
			$output .= '<meta name="google-site-verification" content="'. $webmaster_settings['google-site-verification'] .'" />' . PHP_EOL ;
		
		if( isset( $webmaster_settings['msvalidate.01'] ) && $webmaster_settings['msvalidate.01'] != '' ) 
			$output .= '<meta name="msvalidate.01" content="'. $webmaster_settings['msvalidate.01'] .'" />' . PHP_EOL ;
		
		if( isset( $webmaster_settings['alexaVerifyID'] ) && $webmaster_settings['alexaVerifyID'] != '' ) 
			$output .= '<meta name="alexaVerifyID" content="'.$webmaster_settings['alexaVerifyID']  .'" />' . PHP_EOL ;
		
	}	
	return $output;
}

/**
 * Get the webmaster setting for footer and format output
 * @return [string] [webmaster footer information]
 */
function catchwebtools_webmaster_footer_display(){
	$webmaster_settings	=	get_option( 'catchwebtools_webmaster' );
	$output		=	'';
	if( isset( $webmaster_settings['status'] ) && $webmaster_settings['status'] ){
		if( isset( $webmaster_settings['footer'] ) && $webmaster_settings['footer'] != '' )
			$output .= $webmaster_settings['footer'] . PHP_EOL ;
	}
	return $output;
}
	
