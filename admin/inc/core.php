<?php
/**
 * @package Admin
 * Main class: core.php
 */

/**
 * Core Classfor catchwebtools
 */
class catchwebtools {
	
	 /**
	 * catchwebtools default constructor
	 * action hooks enabled to add Catch Web Tools to menu
	 */
	function __construct() {
		add_action( 'admin_menu', array( $this, 'add_plugin_settings_menu' ) );
		
		add_action( 'admin_init', array( $this, 'register_settings' ) );
	}

	 /**
	 * catchwebtools: add_plugin_settings_menu 
	 * add Catch Web Tools to menu
	 */
	 function add_plugin_settings_menu() {
		//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position ); 
		add_menu_page( __('Dashboard', 'catchwebtools' ), __( 'Catch Web Tools', 'catchwebtools' ), 'manage_options', 'catch-web-tools', array( $this, 'catch_web_tools_settings_page' ), CATCHWEBTOOLS_URL . 'images/catch-themes-themes-option.png', '99.01564' );
		
		//add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);
		add_submenu_page( 'catch-web-tools', __( 'Dashboard', 'catchwebtools' ), __( 'Dashboard', 'catchwebtools' ), 'manage_options', 'catch-web-tools', array( $this, 'catch_web_tools_settings_page' ) );
		
		add_submenu_page( 'catch-web-tools', __( 'Webmasters', 'catchwebtools' ), __( 'Webmasters', 'catchwebtools' ), 'manage_options', 'catch-web-tools-webmasters', array( $this, 'catch_web_tools_webmaster_page' ) );
		
		add_submenu_page( 'catch-web-tools', __( 'Custom CSS', 'catchwebtools' ), __( 'Custom CSS', 'catchwebtools' ), 'manage_options', 'catch-web-tools-custom-css', array( $this, 'catch_web_tools_custom_css_page' ) );
		
		add_submenu_page( 'catch-web-tools', __( 'Social Icons', 'catchwebtools' ), __( 'Social Icons', 'catchwebtools' ), 'manage_options', 'catch-web-tools-social-icons', array( $this, 'catch_web_tools_social_icons_page' ) );
		
		add_submenu_page( 'catch-web-tools', __( 'Open Graph', 'catchwebtools' ), __( 'Open Graph', 'catchwebtools' ), 'manage_options', 'catch-web-tools-opengraph', array( $this, 'catch_web_tools_opengraph_page' ) );		
		
		add_submenu_page( 'catch-web-tools', __( 'SEO', 'catchwebtools' ), __( 'SEO', 'catchwebtools' ), 'manage_options', 'catch-web-tools-seo', array( $this, 'catch_web_tools_seo_page' ) );		
	}

	/**
	 * catchwebtools: catch_web_tools_settings_page 
	 * Catch Web Tools Setting function
	 */
	function catch_web_tools_settings_page() {
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		
		include( CATCHWEBTOOLS_PATH . '/admin/modules/dashboard.php' );	
	}
	
	/**
	 * catchwebtools: catch_web_tools_webmaster_page 
	 * Catch Web Tools Webmaster Display Function
	 */
	function catch_web_tools_webmaster_page() {
		
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		
		include( CATCHWEBTOOLS_PATH . '/admin/modules/webmaster.php' );	
	}
	
	/**
	 * catchwebtools: catch_web_tools_opengraph_page 
	 * Catch Web Tools Webmaster Display Function
	 */
	function catch_web_tools_opengraph_page() {
		
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		
		include( CATCHWEBTOOLS_PATH . '/admin/modules/opengraph.php' );	
	}
	
	/**
	 * catchwebtools: catch_web_tools_seo_page 
	 * Catch Web Tools SEO Display Function
	 */
	function catch_web_tools_seo_page() {
		
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		
		include( CATCHWEBTOOLS_PATH . '/admin/modules/seo.php' );	
	}
	
	/**
	 * catchwebtools: catch_web_tools_social_icons_page 
	 * Catch Web Tools Social Icons Display Function
	 */
	function catch_web_tools_social_icons_page() {
		
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		
		include( CATCHWEBTOOLS_PATH . '/admin/modules/social-icons.php' );	
	}
	
	/**
	 * catchwebtools: catch_web_tools_custom_css_page 
	 * Catch Web Tools Custom CSS Display Function
	 */
	function catch_web_tools_custom_css_page() {
		
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		
		include( CATCHWEBTOOLS_PATH . '/admin/modules/custom-css.php' );	
	}
	
	/**
	 * catchwebtools: register_settings
	 * Catch Web Tools Register Settings
	 */
	 function register_settings() {
		// register_setting( $option_group, $option_name, $sanitize_callback )
		register_setting( 
			'webmaster-tools-group', 
			'catchwebtools_webmaster',
			array($this, 'catchwebtools_webmaster_sanitize_callback') 
		);
		
		// register_setting( $option_group, $option_name, $sanitize_callback )
		register_setting( 
			'opengraph-settings-group', 
			'catchwebtools_opengraph',
			array($this, 'catchwebtools_opengraph_sanitize_callback') 
		);
		
		// register_setting( $option_group, $option_name, $sanitize_callback )
		register_setting( 
			'custom-css-settings-group', 
			'catchwebtools_custom_css',
			array($this, 'catchwebtools_custom_css_sanitize_callback') 
		);
		
		// register_setting( $option_group, $option_name, $sanitize_callback )
		register_setting( 
			'seo-settings-group', 
			'catchwebtools_seo' ,
			array($this, 'catchwebtools_seo_sanitize_callback') 
		);
		
		// register_setting( $option_group, $option_name, $sanitize_callback )
		register_setting( 
			'social-icons-group', 
			'catchwebtools_social',
			array($this, 'catchwebtools_social_icons_sanitize_callback') 
		);
		
		// register_setting( $option_group, $option_name, $sanitize_callback )
		register_setting( 
			'catchids-settings-group', 
			'catchwebtools_catchids' ,
			array($this, 'catchwebtools_catchids_sanitize_callback') 
		);
	}
	
	/**
	 * catchwebtools: catchwebtools_webmaster_sanitize_callback 
	 * Webmaster Sanitization function callback
	 */
	function catchwebtools_webmaster_sanitize_callback( $input ){
		
		if( !empty( $input['header'] ) )
			$input['header'] = $input['header'];
		
		if( !empty( $input['footer'] ) )
			$input['footer'] = wp_kses_stripslashes( $input['footer'] );
		
		if( !empty( $input['google-site-verification'] ) )
			$input['google-site-verification']= sanitize_text_field( $input['google-site-verification'] );
		
		if( !empty( $input['msvalidate.01'] ) )
			$input['msvalidate.01'] 			= sanitize_text_field( $input['msvalidate.01'] );
		
		if( !empty( $input['alexaVerifyID'] ) )
			$input['alexaVerifyID']			= sanitize_text_field( $input['alexaVerifyID'] );
		
		delete_transient( 'catchwebtools_webmaster_transient' );	
		
		return $input;
	}
	
	/**
	 * catchwebtools: catchwebtools_opengraph_sanitize_callback 
	 * Open Graph Sanitization function callback
	 */
	function catchwebtools_opengraph_sanitize_callback( $input ){
		
		if( !empty( $input['og:image'] ) )
			$input['og:image']			=	esc_url_raw ( $input['og:image'] );
		if( !empty( $input['og:default_image'] ) )
			$input['og:default_image']	=	esc_url_raw ( $input['og:default_image'] );
		
		foreach ( $input as $key => $value )
			if( !empty( $input[ $key ] ) )
			$input[ $key ]	=	 wp_kses( sanitize_text_field( $value ) , '' );
		
		delete_transient( 'catchwebtools_opengraph_transient' );
		
		return $input;
	}
	
	/**
	 * catchwebtools: catchwebtools_custom_css_sanitize_callback 
	 * Custom Css Sanitization function callback
	 */
	function catchwebtools_custom_css_sanitize_callback( $input ){
		if( !empty( $input ) )
			$input	=	 wp_filter_nohtml_kses( $input );
		
		delete_transient( 'catchwebtools_custom_css_transient' );
		
		return $input;
	}
	
	/**
	 * catchwebtools: catchwebtools_seo_sanitize_callback 
	 * Seo Sanitization function callback
	 */
	function catchwebtools_seo_sanitize_callback( $input ){
		$input['title']			=	( $input['title'] != '' ) ? wp_filter_nohtml_kses( sanitize_text_field( $input['title'] ) ) : get_bloginfo ( 'name' );
		
		$input['description']	=	( $input['description'] != '' ) ? wp_filter_nohtml_kses( sanitize_text_field($input['description'] ) ) : get_bloginfo ( 'description' );
		
		delete_transient( 'catchwebtools_seo_transient' );
		
		return $input;
	}
	
	/**
	 * catchwebtools: catchwebtools_social_icons_sanitize_callback 
	 * Social Icons Sanitization function callback
	 */
	function catchwebtools_social_icons_sanitize_callback( $input ){
		if( !empty( $input['social_icon_size'] ) )
			$input['social_icon_size']	=	intval ( $input['social_icon_size'] );
		
		if( !empty( $input['social_icon_color'] ) )	
			$input['social_icon_color']	=	wp_filter_nohtml_kses ( $input['social_icon_color'] );
		
		foreach ( $input as $key => $value )
			if( $key != 'social_icon_size' && $key != 'social_icon_color' && $key != 'status' )
				if( !empty( $input[ $key ] ) )
					$input[ $key ]	=	 esc_url_raw( sanitize_text_field( $value ) , '' );
		
		delete_transient( 'catchwebtools_social_transient' );
		
		return $input;
	}
	
	/**
	 * catchwebtools: catchwebtools_catchids_sanitize_callback 
	 * Catch Ids Sanitization function callback
	 */
	function catchwebtools_catchids_sanitize_callback( $input ){
		delete_transient( 'catchwebtools_catchids_transient' );
		
		return $input;
	}
}
$catch_web_tools	=	new catchwebtools();