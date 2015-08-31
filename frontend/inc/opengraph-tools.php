<?php
/**
 * @package Frontend
 * @sub-package Opengraph tools
 */

/**
 * Get the opengraph setting and format output
 * @return [string] [opengraph information]
 */
function catchwebtools_opengraph_display(){
	$opengraph_settings	=	catchwebtools_get_options( 'catchwebtools_opengraph' );
	
	$output		=	'';
	if( isset( $opengraph_settings['status'] ) &&  $opengraph_settings['status'] ){		
		
		unset( $opengraph_settings['status'] );
		
		if (is_home() || is_front_page()) {
			foreach( $opengraph_settings as $property=>$content )
				if( $property != 'og:default_image' && $content != '' && $property != 'custom')
					$output	.= '<meta property="' . esc_attr( $property ) . '" content="' . esc_attr( $content ) . '"/>'. PHP_EOL ;	
				else if( $property == 'custom' && $content != '' )
					$output	.= $content . PHP_EOL ;	
		}
		elseif (is_category() || is_archive()) {
			$output	.= '<meta property="og:title" content="'. single_term_title( "", false ) .'"/>';
		}			
		elseif ((is_single() ||  is_page()) && !is_page('blog')) {
			//Title
			$get_catchwebtools_opengraph_title	= get_post_meta(get_the_ID(),'catchwebtools_opengraph_title',true);
			$final_catchwebtools_opengraph_title	=	( !empty( $get_catchwebtools_opengraph_title ) ) ? $get_catchwebtools_opengraph_title :  the_title('','',false) ;
			
			//URL
			$get_catchwebtools_opengraph_url 		= get_post_meta(get_the_ID(),'catchwebtools_opengraph_url',true);
			$final_catchwebtools_opengraph_url	=	( !empty( $get_catchwebtools_opengraph_url ) ) ? $get_catchwebtools_opengraph_url :  get_permalink() ;
			
			//Image
			$get_catchwebtools_opengraph_image = get_post_meta(get_the_ID(),'catchwebtools_opengraph_image',true);
			if( empty( $get_catchwebtools_opengraph_image ) &&  $get_catchwebtools_opengraph_image == '' ){
				$settings 	=	(array) get_option( 'catchwebtools_opengraph' );
				$image		=	isset( $settings['og:default_image'] ) ? $settings['og:default_image'] : ''; 
				$get_catchwebtools_opengraph_image = $image;
			}
			$final_catchwebtools_opengraph_image	=	( !empty( $get_catchwebtools_opengraph_image ) ) ? $get_catchwebtools_opengraph_image :  '' ;
			
			//Description
			$get_catchwebtools_opengraph_description = get_post_meta(get_the_ID(),'catchwebtools_opengraph_description',true);
			$final_catchwebtools_opengraph_description	=	( !empty( $get_catchwebtools_opengraph_description ) ) ? $get_catchwebtools_opengraph_description :  '' ;
			
			//Type
			$get_catchwebtools_opengraph_type = get_post_meta(get_the_ID(),'catchwebtools_opengraph_type',true);
			$final_catchwebtools_opengraph_type	=	( !empty( $get_catchwebtools_opengraph_type ) ) ? $get_catchwebtools_opengraph_type :  '' ;
			
			//Custom
			$get_catchwebtools_opengraph_custom = get_post_meta(get_the_ID(),'catchwebtools_opengraph_custom',true);
			$final_catchwebtools_opengraph_custom	=	( !empty( $get_catchwebtools_opengraph_custom ) ) ? $get_catchwebtools_opengraph_custom :  '' ;
			
			$output	.= '
				<meta property="og:title" content="'. esc_attr( $final_catchwebtools_opengraph_title ).'"/>
				<meta property="og:url" content="'. esc_attr( $final_catchwebtools_opengraph_url ).'"/>
				<meta property="og:image" content="'. esc_attr( $final_catchwebtools_opengraph_image ).'" />
				<meta property="og:description" content="'. esc_attr( $final_catchwebtools_opengraph_description ).'" />
				<meta property="og:type" content="'. esc_attr( $final_catchwebtools_opengraph_type ).'" />
				';
			
			$output	.= $final_catchwebtools_opengraph_custom;
			
			
		}
	
	}
	return $output;
}

/**
 * Get Open Graph Html Content
 * @return [string] [html attribute for open graph]
 */
function catchwebtools_add_opengraph_namespace() {
	$opengraph_settings	=	get_option( 'catchwebtools_opengraph' );
	if( isset( $opengraph_settings['status'] ) &&  $opengraph_settings['status'] ){	
		echo ' prefix="og: http://ogp.me/ns#"' ;
	}
}
add_filter( 'language_attributes', 'catchwebtools_add_opengraph_namespace' );