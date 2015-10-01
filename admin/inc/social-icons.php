<?php
/**
 * @package Frontend
 */

/**
 * Fget the social icon setting and format output
 * @return [string] [social icon information]
 */
function catchwebtools_get_social_icons(){
	// Get any existing copy of our transient data
	if ( false === ( $social_settings = get_transient( 'catchwebtools_social_transient' ) ) ) {
		// It wasn't there, so regenerate the data and save the transient
		$social_settings	=	get_option( 'catchwebtools_social_transient' );
		set_transient( 'catchwebtools_social_transient', $social_settings, 7 * DAY_IN_SECONDS );
	}
	$output		=	'';
	
	if ( isset( $social_settings['social_icon_size'] ) || isset( $social_settings['social_icon_color'] ) ) {		
		if ( isset( $social_settings['status'] ) &&  $social_settings['status'] ) {
			unset( $social_settings['status'] );
		
			$output .=  '<style type="text/css">
						.genericon {';
				if ( isset( $social_settings['social_icon_size'] ) && $social_settings['social_icon_size'] != '' ) {
				
					$output .= 'font-size	:	'. esc_attr( $social_settings['social_icon_size'] ) .'px;
								width 		: 	'. esc_attr( $social_settings['social_icon_size'] ).'px;
								height 		:	'. esc_attr( $social_settings['social_icon_size'] ).'px;';
				}
				
				if ( isset( $social_settings['social_icon_color'] ) && $social_settings['social_icon_color'] != '' ) {
				
					$output .= 'color	:	'. esc_attr( $social_settings['social_icon_color'] ) .';';
				}
				
			$output .=  'vertical-align: middle;
						}';
			$output .=  '</style>
			<div class="catchwebtools-social"><ul>';

			//print_r($social_settings);
			
			unset( $social_settings['social_icon_size'] );
			unset( $social_settings['social_icon_color'] );

			foreach ( $social_settings as $key => $value ) {
				if( '' != $value ){
					if ( 'Skype' == $key  ) {
						$output .= '<li><a class="genericon genericon-'. esc_attr( strtolower( $key ) ) .'" target="_blank" title="'. esc_attr( $key ) .'" href="'. esc_attr( $value ) .'"><span>'. esc_attr( $key ) .'</span></a></li>'; 
					}
					else {
						$output .= '<li><a class="genericon genericon-'. esc_attr( strtolower( $key ) ) .'" target="_blank" title="'. esc_attr( $key ) .'" href="'. esc_url( $value ) .'"><span>'. esc_attr( $key ) .'</span></a></li>';
					}
				}
			}			
			$output .=  '</ul></div><!-- .catchwebtools-social -->';
		
		}
	}
	return $output;
}



/**
 * Adds CatchWebToolsSocialIcons widget.
 */
class CatchWebToolsSocialIcons extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'catch_web_tools_social_icons', // Base ID
			'Catch Web Tools Social Icons', // Name
			array( 'description' => __( 'Use this widget to add Catch Web Tools Social Icons as a widget. ', 'catch-web-tools' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		if ( isset( $instance['title'] ) )
			$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		
		echo catchwebtools_get_social_icons();
		
		echo $args['after_widget'];
	}
	
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		}
		else {
			$title = __( 'Social Icons', 'catch-web-tools' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title (optional):', 'catch-web-tools' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}

	
} 

/**
 * Register register_Recent_Post_Widget1 widget
 */
function register_CatchWebToolsSocialIcons() {
    register_widget( 'CatchWebToolsSocialIcons' );
}

$social_settings	= (array) get_option( 'catchwebtools_social' );

if( isset( $social_settings['status'] ) &&  $social_settings['status'] ){
	add_action( 'widgets_init', 'register_CatchWebToolsSocialIcons' );
	add_shortcode( 'cathchemes_social_icons', 'catchwebtools_get_social_icons' );
}

/**
 * Output contents of function catchwebtools_get_social_icons
 * @uses catchwebtools_get_social_icons
 */
function catchwebtools_social_icons(){
	echo catchwebtools_get_social_icons();
}