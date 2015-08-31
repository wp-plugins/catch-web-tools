<?php
/**
 * @package Admin
 * @sub-package Admin Opengraph Display
 */
 ?>
<div id="catchwebtools" class="wrap">    
	<?php include ( 'header.php' ); ?>
    <?php include ( 'navigation.php' ); ?>
    <div id="opengraph">
        <form method="post" action="options.php">
            <?php settings_fields( 'opengraph-settings-group' ); ?>
            <?php $settings	=	catchwebtools_get_options( 'catchwebtools_opengraph' ); ?>
			<div class="option-container">
                <h3 class="option-toggle option-active"><a href="#"><?php _e( 'Enable Open Graph Module', 'catchwebtools' ); ?></a></h3>
                <div class="option-content inside open">
                    <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row"><?php _e( 'Enable Open Graph Module', 'catchwebtools' ); ?></th>
                            <td>
                            <?php 
                            $text	=	( ! empty ( $settings['status'] ) && $settings['status'] ) ? 'checked' : '';
                            echo '<input type="checkbox" ' .$text. ' name="catchwebtools_opengraph[status]" value="1"/>&nbsp;&nbsp;'. __( 'Check to Enable', 'catchwebtools' );
                            echo '<p class="description">'. __( 'Add Open Graph meta data to your site\'s <code>&lt;head&gt;</code> section. You can specify some of the IDs that are sometimes needed below:', 'catchwebtools' ) . '<p class="description">';
							echo '<p class="description">'. __( 'Open Graph tags for specific Pages or Posts, can be added via Catch Web Tools Custom Meta Box which shows up in Pages\' and Posts\' add/edit sections once this function is enabled.', 'catchwebtools' ) . '</p>';
                            ?>
                            </td>
                        </tr>
                     </tbody>
                </table>
                    <?php submit_button('Save Changes'); ?>
                </div>
                
                <h3 class="option-toggle"><a href="#"><?php _e( 'Facebook Settings', 'catchwebtools' ); ?></a></h3>
                <div class="option-content inside">
                    <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row"><?php _e( 'Facebook App ID', 'catchwebtools' ); ?></th>
                            <td>
                            <?php 
                            $text	=	( ! empty ( $settings['fb:app_id'] ) ) ? esc_attr( $settings['fb:app_id'] ) : '';
                            echo '<input type="text" size="80" name="catchwebtools_opengraph[fb:app_id]" value="' .$text. '" />';
                            ?>
                            </td>
                        </tr>
                     </tbody>
                </table>
                    <?php submit_button('Save Changes'); ?>
                </div>
                
               
                
                
                <h3 class="option-toggle"><a href="#"><?php _e( 'Homepage Settings', 'catchwebtools' ); ?></a></h3>
                <div class="option-content inside">
                    <table class="form-table">
                        <tbody>
                            <tr>                            
                                <th scope="row">
                                    <?php _e( 'Title', 'catchwebtools' );?>
                                </th>
                                <td>
                                    <?php
                                    $text	=	( ! empty ( $settings['og:title'] ) ) ? esc_attr( $settings['og:title'] ) : get_bloginfo( 'name' ) ;
                                    echo '<input type="text" size="80" name="catchwebtools_opengraph[og:title]" value="' .$text. '" /><p id="description">og:title tag</p>';
                                    ?>
                                </td>
                            </tr>
                            
                            <tr>                            
                                <th scope="row">
                                    <?php _e( 'Type', 'catchwebtools' );?>
                                </th>
                                <td>
                                    <?php
                                    $text	=	( ! empty ( $settings['og:type'] ) ) ? esc_attr( $settings['og:type'] ) : '';
                                    $options	=	array('website', 'music.song', 'music.radio_station', 'music.playlist', 'music.album', 'video.movie', 'video.tv_show', 'video.episode', 'video.other', 'article', 'book', 'profile');
                                    echo '<select name="catchwebtools_opengraph[og:type]" class="catchwebtools_opengraph_type">';
                                    echo '<option value="">-</option>';
                                    foreach($options as $option){
                                        echo '<option value="'. $option .'" ';
                                        if	( $text == $option )	
                                            echo 'selected="true"';
                                        echo '>'. $option .'</option>';
                                    }
                                    echo '</select><p id="description">og:type tag</p>';
                                    ?>
                                </td>
                            </tr>
                            
                            <tr>                            
                                <th scope="row">
                                    <?php _e( 'URL', 'catchwebtools' );?>
                                </th>
                                <td>
                                    <?php
                                   $text	=	( ! empty ( $settings['og:url'] ) ) ? esc_attr( $settings['og:url'] ) : home_url();
                                    echo '<input type="text" size="80" name="catchwebtools_opengraph[og:url]" value="' .$text. '" /><p id="description">og:url tag</p>';
                                    ?>
                                </td>
                            </tr>
                            
                            <tr>                            
                                <th scope="row">
                                    <?php _e( 'Description', 'catchwebtools' );?>
                                </th>
                                <td>
                                    <?php
                                    $text	=	( ! empty ( $settings['og:description'] ) ) ? esc_attr( $settings['og:description'] ) : esc_attr( get_bloginfo( 'description' ) );
                                    echo '<textarea cols="80" rows="7" name="catchwebtools_opengraph[og:description]" >' .$text. '</textarea><p id="description">og:description tag</p>';
                                    ?>
                                </td>
                            </tr>
                            
                            <tr>                            
                                <th scope="row">
                                    <?php _e( 'Sitename', 'catchwebtools' );?>
                                </th>
                                <td>
                                    <?php
                                    $text	=	( ! empty ( $settings['og:site_name'] ) ) ? esc_attr( $settings['og:site_name'] ) : get_bloginfo( 'name' );
                                    echo '<input type="text" size="80" name="catchwebtools_opengraph[og:site_name]" value="' .$text. '" /><p id="description">og:site_name tag</p>';
                                    ?>
                                </td>
                            </tr>
                            
                            <tr>                            
                                <th scope="row">
                                    <?php _e( 'Locale', 'catchwebtools' );?>
                                </th>
                                <td>
                                    <?php
                                    $text	=	( ! empty ( $settings['og:locale'] ) ) ? esc_attr( $settings['og:locale'] ) : '';
                                    echo '<input type="text" size="80" name="catchwebtools_opengraph[og:locale]" value="' .$text. '" /><p id="description">og:locale tag</p>';
                                    ?>
                                </td>
                            </tr>
                           
                        </tbody>
                    </table>
                <?php submit_button('Save Changes'); ?>   
                </div>
                
                <h3 class="option-toggle"><a href="#"><?php _e( 'Default Settings', 'catchwebtools' ); ?></a></h3>
                <div class="option-content inside">
                    <table class="form-table">
                        <tbody>
                            <tr>                            
                                <th scope="row">
                                    <?php _e( 'Default Image', 'catchwebtools' );?>
                                </th>
                                <td>
                                    <?php
                                    $text	=	( ! empty ( $settings['og:default_image'] ) ) ? esc_attr( $settings['og:default_image'] ) : '';
                                    echo '
                                        <input type="text" class="upload-url" size="80" name="catchwebtools_opengraph[og:default_image]" value="'. esc_attr( $text ) .'" />
                                        <input id="st_upload_button" class="st_upload_button button" name="catchwebtools_opengraph[og:default_image]" type="button" value="'. esc_attr( 'Upload', 'catchwebtools' ) .'" />';
                                    echo '<p class="description">'. __( 'This image is used if the post/page being shared does not contain any images.', 'catchwebtools' ) .'</p>';
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php submit_button('Save Changes'); ?>   
                </div>
                
                <h3 class="option-toggle"><a href="#"><?php _e( 'Custom Settings (Only for Advanced Users)', 'catchwebtools' ); ?></a></h3>
                <div class="option-content inside">
                    <table class="form-table">
                        <tbody>
                            <tr>                            
                                <th scope="row">
                                    <?php _e( 'Custom Tags', 'catchwebtools' ); ?>
                                </th>
                                <td>
                                    <?php
                                    $text	=	( ! empty ( $settings['custom'] ) ) ? esc_attr( $settings['custom'] ) : '';
                                    echo '<textarea cols="80" rows="7"  name="catchwebtools_opengraph[custom]" >' .$text. '</textarea>';
                                    echo '<p class="description">'. __( 'For any other type of Open Graph tags.', 'catchwebtools' ) . '</p>';
                                    echo '<p class="description">'. __( 'E.g:', 'catchwebtools' ) . '<code>&lt;meta property="og:audio" content="http://example.com/sound.mp3" /&gt;</code>';
                                    echo '<p class="description">'. __( 'If you do not know what this is, you should probably leave it empty.', 'catchwebtools' );
                                    ?>
                                </td>
                            </tr>
                         </tbody>
                    </table>
                <?php submit_button('Save Changes'); ?>   
                </div>
           
                
            </div>
        </form>
    </div> <!-- #opengraph -->   
</div><!-- .wrap -->