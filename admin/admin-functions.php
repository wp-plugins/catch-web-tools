<?php
/**
 * @package Admin
 */

/** 
 * Enqueue admin scripts and styles
 */
function catchwebtools_admin_enqueue_scripts( $hook_suffix ) {
	//Scripts
	wp_enqueue_script( 'catchwebtools-plugin-options', CATCHWEBTOOLS_URL . 'admin/js/admin.js', array( 'jquery', 'farbtastic' ), '2013-10-05' );
		
	wp_enqueue_script( 'catchwebtools-upload', CATCHWEBTOOLS_URL . 'admin/js/add_image_scripts.js', array( 'jquery','media-upload','thickbox' ) );
	
	wp_enqueue_script( 'catchwebtools-equal-height', CATCHWEBTOOLS_URL . 'admin/js/equal_height.js', array( 'jquery' ) );
	
	//CSS Styles
	wp_enqueue_style( 'genericons', CATCHWEBTOOLS_URL . 'css/genericons/genericons.css', false, '3.3' );
	wp_enqueue_style( 'catchwebtools-plugin-css', CATCHWEBTOOLS_URL . 'admin/css/admin.css', array( 'farbtastic', 'thickbox' ), '2013-10-05' );
}

/**
 * Only enqueue scripts on catchwebtools pages
 */
if ( isset($_GET['page'] ) && ( $_GET['page'] == 'catch-web-tools' 
								|| $_GET['page'] == 'catch-web-tools-webmasters'  
								|| $_GET['page'] == 'catch-web-tools-opengraph' 
								|| $_GET['page'] == 'catch-web-tools-custom-css' 
								|| $_GET['page'] == 'catch-web-tools-seo' 
								|| $_GET['page'] == 'catch-web-tools-social-icons' 
								|| $_GET['page'] == 'catch-web-tools-catchids' 
								) )  {
	add_action( 'admin_enqueue_scripts', 'catchwebtools_admin_enqueue_scripts' );
}

 /** 
 * Admin Social Links
 * use facebook and twitter scripts only on dashboard, hence condition before add_action hook
 */
function catchwebtools_admin_social() { ?>
    <!-- Start Social scripts -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=276203972392824";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    <!-- End Social scripts -->
<?php
}
if ( isset($_GET['page'] ) && ( $_GET['page'] == 'catch-web-tools' ) )  {
	add_action( 'admin_enqueue_scripts', 'catchwebtools_admin_social' );
}


require_once 'inc/core.php';

require_once 'inc/metabox.php';

require_once 'inc/catch-ids.php';

require_once 'inc/social-icons.php';