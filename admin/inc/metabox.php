<?php
/**
 * @package Admin
 * SEO Metabox
 */

$seo_settings = get_catchwebtools_options( 'catchwebtools_seo' );//Get seo settings

$opengraph_settings	=	get_catchwebtools_options( 'catchwebtools_opengraph' );//get opengraph settings

/**
 * Check if opengtaph in enabled and activate metabox
 */
if( ( isset( $seo_settings['status'] ) && $seo_settings['status'] ) || ( isset( $opengraph_settings['status'] ) && $opengraph_settings['status'] ) ){
	add_action( 'admin_menu', 'catchwebtools_seo_metabox' );
	add_action( 'category_edit_form_fields', 'catchwebtools_category_seo_edit_form', 10, 2 );
	add_action( 'category_add_form_fields', 'catchwebtools_category_seo_add_form', 10, 2 );
	add_action( 'edited_category', 'catchwebtools_save_taxonomy_custom_meta', 10, 2 );  
	add_action( 'create_category', 'catchwebtools_save_taxonomy_custom_meta', 10, 2 );
	add_action( 'admin_print_scripts-post-new.php', 'catchwebtools_enqueue', 11 );
	add_action( 'admin_print_scripts-post.php', 'catchwebtools_enqueue', 11 );
	add_action( 'admin_print_scripts-page-new.php', 'catchwebtools_enqueue', 11 );
	add_action( 'admin_print_scripts-page.php', 'catchwebtools_enqueue', 11 );
	
}

/**
 * Enqueue scripts
 * only enqueue scripts required for SEO and Opengraph metabox
 */			
function catchwebtools_enqueue() {
    //Scripts
	wp_register_script( 'jquery-cookie', CATCHWEBTOOLS_URL . 'admin/js/jquery.cookie.min.js' );
	wp_enqueue_script( 'catchwebtools-plugin-options', CATCHWEBTOOLS_URL . 'admin/js/metabox.js', array( 'jquery-ui-tabs', 'jquery-cookie' ), '2013-10-05' );
	
	//CSS Styles
	wp_enqueue_style( 'catchwebtools-plugin-options', CATCHWEBTOOLS_URL . 'admin/css/metabox-tabs.css' );
}



/**
 * Enable Metabox
 * adds metabox to pages and posts
 */	
function catchwebtools_seo_metabox() {
	// add a meta box for each of the wordpress page types: posts and pages
    foreach (array('post','page') as $type)
    {
        //add_meta_box( $id, $title, $callback, $post_type, $context, $priority, $callback_args );\\
		add_meta_box( 'catchwebtools_seo_metabox', 'Catch Web Tools Settings', 'catchwebtools_custom_seo_fields', $type, 'normal', 'high' );
    }
}

/**
 * Display function
 * function to display metaboxe contents
 */	
function catchwebtools_custom_seo_fields( $post, $meta_box ) {
	if ( $post_id = (int) get_the_ID() ) {
		//OpenGraph Variables
		$catchwebtools_opengraph_title = (string) get_post_meta( $post_id, 'catchwebtools_opengraph_title', true );
		$catchwebtools_opengraph_url = (string) get_post_meta( $post_id, 'catchwebtools_opengraph_url', true );
		$catchwebtools_opengraph_image = (string) get_post_meta( $post_id, 'catchwebtools_opengraph_image', true );
		$catchwebtools_opengraph_description = (string) get_post_meta( $post_id, 'catchwebtools_opengraph_description', true );
		$catchwebtools_opengraph_type = (string) get_post_meta( $post_id, 'catchwebtools_opengraph_type', true );
		
		$catchwebtools_opengraph_custom = (string) get_post_meta( $post_id, 'catchwebtools_opengraph_custom', true );		
		
		//SEO Variables
		$catchwebtools_seo_title		= (string) get_post_meta( $post_id, 'catchwebtools_seo_title', true );
		$catchwebtools_seo_description= (string) get_post_meta( $post_id, 'catchwebtools_seo_description', true );
		$catchwebtools_seo_keywords	= (string) get_post_meta( $post_id, 'catchwebtools_seo_keywords', true );
		
		if( $catchwebtools_seo_title == '')
			$catchwebtools_seo_title = substr( strip_tags( get_the_title( $post_id ) ) , 0, 70);
	} 
	else {
        $catchwebtools_opengraph_title = '';
		$catchwebtools_opengraph_url = '';
		$catchwebtools_opengraph_image = '';
		$catchwebtools_opengraph_description = '';
		$catchwebtools_opengraph_type = '';
		$catchwebtools_opengraph_custom = '';
		
		$catchwebtools_seo_title = '';
        $catchwebtools_seo_description = '';
        $catchwebtools_seo_keywords = '';
    }
?>
	<div id="ui-tabs" class="ui-tabs">
    	<?php
		$seo_settings = (array) get_option( 'catchwebtools_seo' );
		$opengraph_settings = (array) get_option( 'catchwebtools_opengraph' );
		?>
        <ul class="ui-tabs-nav" id="ui-tabs-nav">
            <?php if( isset( $opengraph_settings['status'] ) && $opengraph_settings['status'] ) {?>
            <li><a href="#frag1"><?php _e( 'Open Graph', 'catchwebtools' )?></a></li>
            <?php } ?>
            <?php if( isset( $seo_settings['status'] ) && $seo_settings['status'] ) {?>
            <li><a href="#frag2"><?php _e( 'Seo Settings', 'catchwebtools' )?></a></li>
        	<?php } ?>
        </ul>
        <?php if( isset( $opengraph_settings['status'] ) && $opengraph_settings['status'] ) {?>
        	<div id="frag1" class="catch_ad_tabhead">
            <p><label><?php _e( 'Title', 'catchwebtools' )?>:</label><br /><input type="text" size="80" name="catchwebtools_opengraph_title" id="catchwebtools_opengraph_title" style="width:98%;" value="<?php esc_attr_e($catchwebtools_opengraph_title); ?>"></p>
    <p><label><?php _e( 'URL', 'catchwebtools' )?>:</label><br /><input type="text" size="80" name="catchwebtools_opengraph_url" id="catchwebtools_opengraph_url" style="width:98%;" value="<?php esc_attr_e($catchwebtools_opengraph_url); ?>"></p>
	<p><label><?php _e( 'Image URL', 'catchwebtools' )?>:</label><br /><input type="text" size="80" name="catchwebtools_opengraph_image" id="catchwebtools_opengraph_image" style="width:98%;" value="<?php esc_attr_e($catchwebtools_opengraph_image); ?>"></p>
	<p><label><?php _e( 'Description', 'catchwebtools' )?>:</label><br /><input type="text" size="80" name="catchwebtools_opengraph_description" id="catchwebtools_opengraph_description" style="width:98%;" value="<?php esc_attr_e($catchwebtools_opengraph_description); ?>"></p>
    <p><label><?php _e( 'Type', 'catchwebtools' )?>:</label><br />
    <select name="catchwebtools_opengraph_type" id="catchwebtools_opengraph_type" style="width:98%;">
    <?php
		$options	=	array('website', 'music.song', 'music.radio_station', 'music.playlist', 'music.album', 'video.movie', 'video.tv_show', 'video.episode', 'video.other', 'article', 'book', 'profile');
		echo '<option value="">-</option>';
		foreach($options as $option){
			echo '<option value="'. $option .'" ';
			if	( $catchwebtools_opengraph_type == $option )	
				echo 'selected="true"';
			echo '>'. $option .'</option>';
		}
	?>
    </select>
	</p>
    <p><label><?php _e( 'Custom tags', 'catchwebtools' )?></label><br/><textarea name="catchwebtools_opengraph_custom" id="catchwebtools_opengraph_custom" style="width:98%;"><?php esc_attr_e($catchwebtools_opengraph_description); ?></textarea>
        </div><!-- #frag1 -->
        <?php } ?>
        <?php if( isset( $seo_settings['status'] ) && $seo_settings['status'] ) {?>
        <div id="frag2" class="catch_ad_tabhead">
            <p><label><?php _e( 'Title', 'catchwebtools' )?>:</label><br /><input type="text" size="80"  maxlength="70" id="catchwebtools_seo_title" name="catchwebtools_seo_title" id="catchwebtools_seo_title" style="width:98%;" value="<?php echo  esc_attr($catchwebtools_seo_title); ?>">
            	<p class="description"><?php _e( 'Title display in search engines is limited to 70 characters. ', 'catchwebtools' )?><span id="catchwebtools_seo_title_left">70</span>&nbsp;<?php _e( 'character(s) left.', 'catchwebtools' )?></p>
            </p>
            <p><label><?php _e( 'Meta Description', 'catchwebtools' )?>:</label><br /><textarea maxlength="156" name="catchwebtools_seo_description" id="catchwebtools_seo_description" style="width:98%;"><?php esc_attr_e($catchwebtools_seo_description); ?></textarea>
                <p class="description"><?php _e( 'The meta description is limited to 156 characters. ', 'catchwebtools' )?><span id="catchwebtools_seo_description_left">156</span>&nbsp;<?php _e( 'character(s) left.', 'catchwebtools' )?></p>
            </p>
   
			<p><label><?php _e( 'Focus Keywords', 'catchwebtools' )?>:</label><br /><input type="text" name="catchwebtools_seo_keywords" id="catchwebtools_seo_keywords" style="width:98%;" value="<?php esc_attr_e($catchwebtools_seo_keywords); ?>"/>
            </p>
        </div><!-- #frag2 -->
        <?php } ?>
    </div><!-- #ui-tabs -->
<?php 
	wp_nonce_field( 'catchwebtools_opengraph_title', 'catchwebtools_opengraph_title_nonce', false );
	wp_nonce_field( 'catchwebtools_opengraph_url', 'catchwebtools_opengraph_url_nonce', false );
	wp_nonce_field( 'catchwebtools_opengraph_image', 'catchwebtools_opengraph_image_nonce', false );
	wp_nonce_field( 'catchwebtools_opengraph_description', 'catchwebtools_opengraph_description_nonce', false );
	wp_nonce_field( 'catchwebtools_opengraph_type', 'catchwebtools_opengraph_type_nonce', false );
	wp_nonce_field( 'catchwebtools_opengraph_custom', 'catchwebtools_opengraph_custom_nonce', false );
	
	
	wp_nonce_field( 'catchwebtools_seo_title', 'catchwebtools_seo_title_nonce', false );
	wp_nonce_field( 'catchwebtools_seo_description', 'catchwebtools_seo_description_nonce', false );
	wp_nonce_field( 'catchwebtools_seo_keywords', 'catchwebtools_seo_keywords_nonce', false );
}

/**
 * Save Function 
 * save metabox contents
 */	
function catchwebtools_custom_seo_fields_save_meta( $post_id ) {
	$catchwebtools_opengraph_title_nonce = isset ( $_POST['catchwebtools_opengraph_title_nonce'] )? $_POST['catchwebtools_opengraph_title_nonce']  : '' ;
	
	$catchwebtools_opengraph_url_nonce = isset ( $_POST['catchwebtools_opengraph_url_nonce'] )? $_POST['catchwebtools_opengraph_url_nonce']  : '' ;
	    
	$catchwebtools_opengraph_image_nonce = isset ( $_POST['catchwebtools_opengraph_image_nonce'] )? $_POST['catchwebtools_opengraph_image_nonce']  : '' ;
		   
    $catchwebtools_opengraph_description_nonce = isset ( $_POST['catchwebtools_opengraph_description_nonce'] )? $_POST['catchwebtools_opengraph_description_nonce']  : '' ;
   
    $catchwebtools_opengraph_type_nonce = isset ( $_POST['catchwebtools_opengraph_type_nonce'] )? $_POST['catchwebtools_opengraph_type_nonce']  : '' ;
	
	$catchwebtools_opengraph_custom_nonce = isset ( $_POST['catchwebtools_opengraph_custom_nonce'] )? $_POST['catchwebtools_opengraph_custom_nonce']  : '' ;
		   

    $catchwebtools_seo_title_nonce = isset ( $_POST['catchwebtools_seo_title_nonce'] )? $_POST['catchwebtools_seo_title_nonce']  : '' ;
	
	$catchwebtools_seo_description_nonce = isset ( $_POST['catchwebtools_seo_description_nonce'] )? $_POST['catchwebtools_seo_description_nonce']  : '' ;
    
	$catchwebtools_seo_keywords_nonce = isset ( $_POST['catchwebtools_seo_keywords_nonce'] )? $_POST['catchwebtools_seo_keywords_nonce']  : '' ;
	if ( 
		!wp_verify_nonce( $catchwebtools_opengraph_title_nonce, 'catchwebtools_opengraph_title' ) ||
		!wp_verify_nonce( $catchwebtools_opengraph_url_nonce, 'catchwebtools_opengraph_url' ) ||
		!wp_verify_nonce( $catchwebtools_opengraph_image_nonce, 'catchwebtools_opengraph_image' ) ||
		!wp_verify_nonce( $catchwebtools_opengraph_description_nonce, 'catchwebtools_opengraph_description' )  ||
		!wp_verify_nonce( $catchwebtools_opengraph_type_nonce, 'catchwebtools_opengraph_type' ) ||
		!wp_verify_nonce( $catchwebtools_opengraph_custom_nonce, 'catchwebtools_opengraph_custom' ) ||
		!wp_verify_nonce( $catchwebtools_seo_title_nonce, 'catchwebtools_seo_title' ) ||
		!wp_verify_nonce( $catchwebtools_seo_description_nonce, 'catchwebtools_seo_description' ) ||
		!wp_verify_nonce( $catchwebtools_seo_keywords_nonce, 'catchwebtools_seo_keywords' )
	)
		return;
	if ( !current_user_can( 'edit_post', $post_id ) )
		return;
	if ($post_id->post_type == 'revision') {
		return;
	}
	
	$catchwebtools_opengraph_title = wp_filter_post_kses( $_POST['catchwebtools_opengraph_title'] );
        if ( !add_post_meta( $post_id, 'catchwebtools_opengraph_title', $catchwebtools_opengraph_title, true ) )
           update_post_meta( $post_id, 'catchwebtools_opengraph_title', $catchwebtools_opengraph_title ); 	
	
	$catchwebtools_opengraph_url = wp_filter_post_kses( $_POST['catchwebtools_opengraph_url'] );
        if ( !add_post_meta( $post_id, 'catchwebtools_opengraph_url', $catchwebtools_opengraph_url, true ) )
           update_post_meta( $post_id, 'catchwebtools_opengraph_url', $catchwebtools_opengraph_url );
    
	$catchwebtools_opengraph_image = wp_filter_post_kses( $_POST['catchwebtools_opengraph_image'] );
        if ( !add_post_meta( $post_id, 'catchwebtools_opengraph_image', $catchwebtools_opengraph_image, true ) )
           update_post_meta( $post_id, 'catchwebtools_opengraph_image', $catchwebtools_opengraph_image );
		   
    $catchwebtools_opengraph_description = wp_filter_post_kses( $_POST['catchwebtools_opengraph_description'] );
        if ( !add_post_meta( $post_id, 'catchwebtools_opengraph_description', $catchwebtools_opengraph_description, true ) )
           update_post_meta( $post_id, 'catchwebtools_opengraph_description', $catchwebtools_opengraph_description ); 
   
    $catchwebtools_opengraph_type = wp_filter_post_kses( $_POST['catchwebtools_opengraph_type'] );
        if ( !add_post_meta( $post_id, 'catchwebtools_opengraph_type', $catchwebtools_opengraph_type, true ) )
           update_post_meta( $post_id, 'catchwebtools_opengraph_type', $catchwebtools_opengraph_type );  
	
	$catchwebtools_opengraph_custom = wp_filter_post_kses( $_POST['catchwebtools_opengraph_custom'] );
        if ( !add_post_meta( $post_id, 'catchwebtools_opengraph_custom', $catchwebtools_opengraph_custom, true ) )
           update_post_meta( $post_id, 'catchwebtools_opengraph_custom', $catchwebtools_opengraph_custom );   
		   

    $catchwebtools_seo_title = wp_filter_post_kses( $_POST['catchwebtools_seo_title'] );
        if ( !add_post_meta( $post_id, 'catchwebtools_seo_title', $catchwebtools_seo_title, true ) )
           update_post_meta( $post_id, 'catchwebtools_seo_title', $catchwebtools_seo_title ); 	
	
	$catchwebtools_seo_description = wp_filter_post_kses( $_POST['catchwebtools_seo_description'] );
        if ( !add_post_meta( $post_id, 'catchwebtools_seo_description', $catchwebtools_seo_description, true ) )
           update_post_meta( $post_id, 'catchwebtools_seo_description', $catchwebtools_seo_description );
    
	$catchwebtools_seo_keywords = wp_filter_post_kses( $_POST['catchwebtools_seo_keywords'] );
        if ( !add_post_meta( $post_id, 'catchwebtools_seo_keywords', $catchwebtools_seo_keywords, true ) )
           update_post_meta( $post_id, 'catchwebtools_seo_keywords', $catchwebtools_seo_keywords );
}

add_action( 'save_post', 'catchwebtools_custom_seo_fields_save_meta', 1, 2 );
add_action( 'publish_post', 'catchwebtools_custom_seo_fields_save_meta', 1, 2);
add_action( 'draft_post', 'catchwebtools_custom_seo_fields_save_meta', 1, 2);
/* End Creating Meta Box in all Pages and Posts */


/**
 * Add Term Page
 * function to add Catch Web Tools fields to categories add page
 */	
function catchwebtools_category_seo_add_form() {
	// this will add the custom meta field to the add new term page
	?>
    
    <h2><?php _e( 'Catch Web Tools SEO Settings', 'catchwebtools' )?></h2>
    
	<div class="form-field">
		<label for="catchwebtools_seo_category_title"><?php _e( 'SEO title', 'catchwebtools' )?></label>
		<input type="text" name="term_meta[catchwebtools_seo_category_title]" id="term_meta[catchwebtools_seo_category_title]" value=""><p class="description">
		<?php _e( 'The SEO title is used on the archive page for this term.', 'catchwebtools' )?>
	</div>
    
    <div class="form-field">
		<label for="catchwebtools_seo_category_description"><?php _e( 'SEO Description', 'catchwebtools' )?></label>
		<textarea cols="40" rows="5" name="term_meta[catchwebtools_seo_category_description]" id="term_meta[catchwebtools_seo_category_description]"></textarea><p class="description">
		<?php _e( 'The SEO description is used for the meta description on the archive page for this term.', 'catchwebtools' )?></p>
	</div>
    
    <div class="form-field">
		<label for="catchwebtools_seo_category_keywords"><?php _e( 'Meta Keywords', 'catchwebtools' )?></label>
		<input type="text" name="term_meta[catchwebtools_seo_category_keywords]" id="term_meta[catchwebtools_seo_category_keywords]" value=""><p class="description">
		<p class="description"><?php _e( 'Meta keywords used on the archive page for this term.', 'catchwebtools' )?></p>
	</div>
<?php
}


/**
 * Show the SEO inputs for term.
 *
 * @param object $term Term to show the edit boxes for.
 */
function catchwebtools_category_seo_edit_form( $term ) {
	// put the term ID into a variable
	$t_id = $term->term_id;
	
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<table class="form-table">
		<tr class="form-field">
			<th colspan="2"><h2><?php _e( 'Catch Web Tools SEO Settings', 'catchwebtools' )?></h2></th>
		</tr>
		<tr class="form-field">
		<th scope="row" valign="top">
			<label for="catchwebtools_seo_category_description"><?php _e( 'SEO title', 'catchwebtools' )?></label></th>
		<td>
			<input type="text" name="term_meta[catchwebtools_seo_category_title]" id="term_meta[catchwebtools_seo_category_title]" value="<?php echo ( isset( $term_meta['catchwebtools_seo_category_title'] ) && esc_attr( $term_meta['catchwebtools_seo_category_title'] ) != '' ) ? esc_attr( $term_meta['catchwebtools_seo_category_title'] ) : '';?>"><p class="description"><?php _e( 'The SEO title is used on the archive page for this term.', 'catchwebtools' )?></p>
		</td>
		</tr>
		
		<tr class="form-field">
		<th scope="row" valign="top">
			<label for="catchwebtools_seo_category_description"><?php _e( 'SEO Description', 'catchwebtools' ) ?>:</label></th>
		<td>
			<textarea cols="50" rows="5" name="term_meta[catchwebtools_seo_category_description]" id="term_meta[catchwebtools_seo_category_description]" ><?php echo ( isset( $term_meta['catchwebtools_seo_category_description'] ) && esc_attr( $term_meta['catchwebtools_seo_category_description'] ) != '' ) ? esc_attr( $term_meta['catchwebtools_seo_category_description'] ) : '';?></textarea><p class="description"><?php _e( 'The SEO description is used for the meta description on the archive page for this term.', 'catchwebtools' )?></p>
		</td>
		</tr>
		
		<tr class="form-field">
		<th scope="row" valign="top">
			<label for="catchwebtools_seo_category_keywords"><?php _e( 'Meta Keywords', 'catchwebtools' )?>:</label></th>
		<td>
			<input type="text" name="term_meta[catchwebtools_seo_category_keywords]" id="term_meta[catchwebtools_seo_category_keywords]" value="<?php echo ( isset( $term_meta['catchwebtools_seo_category_keywords'] ) && esc_attr( $term_meta['catchwebtools_seo_category_keywords'] ) != '' ) ? esc_attr( $term_meta['catchwebtools_seo_category_keywords'] ) : '';?>"><p class="description"><?php _e( 'Meta keywords used on the archive page for this term.', 'catchwebtools' )?></p>
		</td>
		</tr>
	</table>
	<?php	
}

/**
 * Save Function
 * Save extra taxonomy fields callback function
 */	
function catchwebtools_save_taxonomy_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  