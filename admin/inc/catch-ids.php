<?php
/**
 * @package Admin
 * Fumction called when Catch IDs is enabled
 */
 
$catchwebtools_catchids_settings	=	get_catchwebtools_options( 'catchwebtools_catchids' );

if( isset( $catchwebtools_catchids_settings['status'] ) && $catchwebtools_catchids_settings['status'] )//Check if catchIDs in enabled and activate it
	add_action('admin_init', 'catchwebtools_catchids_add');
	
if ( ! function_exists( 'catchwebtools_catchids_column' ) ):
/**
 * Prepend the new column to the columns array
 */
function catchwebtools_catchids_column($cols) {
	$cols['catchids'] = 'ID';
	return $cols;
}
endif; // catchwebtools_catchids_column


if ( ! function_exists( 'catchwebtools_catchids_value' ) ) :
/**
 * Echo the ID for the new column
 */ 
function catchwebtools_catchids_value($column_name, $id) {
	if ($column_name == 'catchids')
		echo $id;
}
endif; // catchwebtools_catchids_value


if ( ! function_exists( 'catchwebtools_catchids_return_value' ) ) :
function catchwebtools_catchids_return_value($value, $column_name, $id) {
	if ($column_name == 'catchids')
		$value = $id;
	return $value;
}
endif; // catchwebtools_catchids_return_value


if ( ! function_exists( 'catchwebtools_catchids_css' ) ) :
/**
 * Output CSS for width of new column
 */ 
function catchwebtools_catchids_css() {
?>
<style type="text/css">
	#catchids { 
		width: 50px; 
	}
</style>
<?php	
}
endif; // catchwebtools_catchids_css


if ( ! function_exists( 'catchwebtools_catchids_add' ) ) :
/**
 * Actions/Filters for various tables and the css output
 */ 
function catchwebtools_catchids_add() {
	add_action('admin_head', 'catchwebtools_catchids_css');

	// For Post Management
	add_filter('manage_posts_columns', 'catchwebtools_catchids_column');
	add_action('manage_posts_custom_column', 'catchwebtools_catchids_value', 10, 2);

	// For Page Management
	add_filter('manage_pages_columns', 'catchwebtools_catchids_column');
	add_action('manage_pages_custom_column', 'catchwebtools_catchids_value', 10, 2);

	// For Media Management
	add_filter('manage_media_columns', 'catchwebtools_catchids_column');
	add_action('manage_media_custom_column', 'catchwebtools_catchids_value', 10, 2);

	// For Link Management
	add_filter('manage_link-manager_columns', 'catchwebtools_catchids_column');
	add_action('manage_link_custom_column', 'catchwebtools_catchids_value', 10, 2);

	// For Category Management
	add_action('manage_edit-link-categories_columns', 'catchwebtools_catchids_column');
	add_filter('manage_link_categories_custom_column', 'catchwebtools_catchids_return_value', 10, 3);

	// For Tags Management
	foreach ( get_taxonomies() as $taxonomy ) {
		add_action("manage_edit-${taxonomy}_columns", 'catchwebtools_catchids_column');			
		add_filter("manage_${taxonomy}_custom_column", 'catchwebtools_catchids_return_value', 10, 3);
	}

	// For User Management
	add_action('manage_users_columns', 'catchwebtools_catchids_column');
	add_filter('manage_users_custom_column', 'catchwebtools_catchids_return_value', 10, 3);

	// For Comment Management
	add_action('manage_edit-comments_columns', 'catchwebtools_catchids_column');
	add_action('manage_comments_custom_column', 'catchwebtools_catchids_value', 10, 2);
}
endif; // catchwebtools_catchids_add