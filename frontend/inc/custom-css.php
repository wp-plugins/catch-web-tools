<?php
/**
 * @package Frontend
 * @sub-package Custom Css
 */

/**
 * Get the custom css setting and format output
 * @return [string] [custom css information]
 */
function catchwebtools_custom_css_display(){
	$customcss	=	get_catchwebtools_options( 'catchwebtools_custom_css' );
	
	$output		=	'';
		if( !empty ( $customcss ) ){
			$output .= '<style type="text/css">'. PHP_EOL ;
			$output .= $customcss . PHP_EOL ;
			$output .= '</style>' . PHP_EOL ;
		}
	return $output;
}