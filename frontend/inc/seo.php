<?php
/**
 * @package Frontend
 * @sub-package Seo
 */

/**
 * Get the seo meta setting and format output
 * @return [string] [seo information]
 */

function catchwebtools_seo_display(){
	$seo_settings	=	get_catchwebtools_options( 'catchwebtools_seo' );
	
	$output	=	'';
	
	if( isset( $seo_settings['status'] ) &&  $seo_settings['status'] ){
		if ( is_home() || is_front_page() || is_archive() ) {
			$seo_description	=	( isset($seo_settings['description']) && $seo_settings['description'] !='' )?$seo_settings['description']: get_bloginfo( 'description' );
			
			$output	.= "<meta name='description' content='" . esc_attr( $seo_description ) . "'>\n";
			
			if( isset( $seo_settings['keywords'] ) && '' != $seo_settings['keywords'] ) {
				$output	.= "<meta name='keywords' content='" . esc_attr( $seo_settings['keywords'] ) . "'>\n";
			}
			
			//Author
			if( isset( $seo_settings['author'] ) && '-1' != $seo_settings['author'] ){
				$user_info 	= get_userdata($seo_settings['author']);
				$author 	= $user_info->display_name;
				
				$output	.=  "<meta name='author' content='" . esc_attr( $author ) . "'>\n";
			}	
		}
		else if( is_category() ) {
			$thisCat 		 = get_category( get_query_var( 'cat' ), false);
			$seo_settings 	 = get_option( "taxonomy_" . $thisCat->term_id);
			$seo_description =	( $seo_settings['catchwebtools_seo_category_description'] !='' ) ? $seo_settings['catchwebtools_seo_category_description'] : get_bloginfo( 'description' );
			
			$output	.= "<meta name='description' content='" . esc_attr( $seo_description ) . "'>\n";
			
			if( isset( $seo_settings['catchwebtools_seo_category_keywords'] ) && $seo_settings['catchwebtools_seo_category_keywords'] != '' ) {
				$output	.= "<meta name='keywords' content='" . esc_attr( $seo_settings['catchwebtools_seo_category_keywords'] ) . "'>\n";
			}
		}
		
		elseif ( (is_single() ||  is_page() ) && !is_page('blog') ) {			
			//Description
			$get_catchwebtools_description = get_post_meta( get_the_ID(), 'catchwebtools_seo_description', true);
			
			if ( !empty( $get_catchwebtools_description ) ) {
				$output	.=  "<meta name='description' content='" . esc_attr( $get_catchwebtools_description ) . "'>\n";
			}
				
			
			//Keywords
			$get_catchwebtools_keywords = get_post_meta( get_the_ID(), 'catchwebtools_seo_keywords', true);
			
			if ( !empty( $get_catchwebtools_keywords ) ) {
				$output	.=  "<meta name='description' content='" . esc_attr( $get_catchwebtools_keywords ) . "'>\n";
			}
			
			//Author
			if( isset( $seo_settings['author'] ) &&  '-1' != $seo_settings['author'] ) {
				global $wp_query;
				$postdata 	= get_post( get_the_ID(), ARRAY_A );
				
				$author_id 	= $postdata['post_author'];
				
				$user_info	= get_userdata( $author_id );
				
				$author 	= $user_info->display_name;
				
				$output	.=  "<meta name='author' content='" . esc_attr( $author ) . '"/>\n';	
			}
		}	
	}
	return $output;
}

/**
 * Echo Title from SEO title in a page or post
 * @return [string] [title]
 */
function catchwebtools_get_title() {
	$seo_settings =  get_option( 'catchwebtools_seo' );
	//Enable only if seo in enabled
	if( isset( $seo_settings['status'] ) &&  $seo_settings['status'] ){
		if ( is_home() || is_front_page() || is_archive() ) {
			if( isset( $seo_settings['title'] ) && '' != $seo_settings['title'] ) {
				return $seo_settings['title'] ;	
			}
		}
		else if( is_category() ){
			$thisCat = get_category( get_query_var('cat'),false );
			
			$seo_settings = get_option( "taxonomy_" . $thisCat->term_id );
			
			if( isset( $seo_settings['catchwebtools_seo_category_description'] ) && '' != $seo_settings['catchwebtools_seo_category_description'] ) {
				return  $seo_settings['catchwebtools_seo_category_description'];
			}
		}
		elseif ( ( is_single() ||  is_page() ) ) {
			$get_catchwebtools_seo_title 	= get_post_meta( get_the_ID(), 'catchwebtools_seo_title', true);
			
			$final_catchwebtools_seo_title	=	( !empty( $get_catchwebtools_seo_title ) ) ? $get_catchwebtools_seo_title :  get_the_title( get_the_ID() ) ;
			
			return $final_catchwebtools_seo_title;	
		}
	}
}

/**
 * Add SEO title to wp_title if it is enabled
 */
function catchwebtools_add_title() {
	$seo_settings =  get_option( 'catchwebtools_seo' );
	//Enable only if seo in enabled
	if( isset( $seo_settings['status'] ) &&  $seo_settings['status'] ){
		add_filter( 'wp_title', 'catchwebtools_get_title', 10, 2 );
	}
}
add_filter( 'init', 'catchwebtools_add_title' );

