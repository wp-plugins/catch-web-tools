<?php
/**
 * @package Admin
 * @sub-package Admin Custom CSS Display
 */
 ?>
<div id="catchwebtools" class="wrap">    
	<?php include ( 'header.php' ); ?>
    <?php include ( 'navigation.php' ); ?>
    <div id="customcss">
            <form method="post" action="options.php">
            	<?php settings_fields( 'custom-css-settings-group' ); ?>
				<?php $settings	=	catchwebtools_get_options( 'catchwebtools_custom_css' ); ?>
				<div class="option-container">
                    <h3 class="option-toggle option-active"><a href="#"><?php _e( 'Custom Css Settings', 'catchwebtools' ); ?></a></h3>
                    <div class="option-content inside open">
                        <table class="form-table">
                        <tbody>
                            <tr>
                                <th scope="row"><?php _e( 'Enter Custom Css', 'catchwebtools' ); ?></th>
                                <td>
                                <?php
								$text	=	( ! empty ( $settings ) ) ? esc_html( $settings ): '';
								echo '<textarea cols="80" rows="7" name="catchwebtools_custom_css">' .$text. '</textarea>';
                                 echo '<p class="description">'. __( 'You can just add your Custom CSS and save, it will show up in the frontend head section. Leave it blank if it is not needed.', 'catchwebtools' ) . '<p class="description">';
								?>
                                </td>
                            </tr>
                             <tr>
                                <th scope="row"><?php _e( 'CSS Tutorial from W3Schools.', 'catchwebtools' ); ?></th>
                                <td>
                                    <a class="button" href="<?php echo esc_url( __( 'http://www.w3schools.com/css/default.asp', 'catchwebtools' ) ); ?>" title="<?php esc_attr_e( 'CSS Tutorial', 'catchwebtools' ); ?>" target="_blank"><?php _e( 'Click Here to Read', 'catchwebtools' );?></a>
                                </td>
                            </tr>
                         </tbody>
                    </table>
                   		<?php submit_button('Save Changes'); ?>
                    </div>
                </div>
            </form>
        </div><!-- #customcss -->
</div><!-- .wrap -->