<?php
/**
 * @package Admin
 * @sub-package Admin Social Icons Display
 */
 ?>
<div id="catchwebtools" class="wrap">    
	<?php include ( 'header.php' ); ?>
    <?php include ( 'navigation.php' ); ?>
    <div id="social">
        <form method="post" action="options.php">
            <?php settings_fields( 'social-icons-group' ); ?>
            <?php $settings = get_catchwebtools_options( 'catchwebtools_social' ); ?>
            <div class="option-container">
                <h3 class="option-toggle option-active"><a href="#"><?php _e( 'Enable Social Icons Module', 'catchwebtools' ); ?></a></h3>
                <div class="option-content inside open">
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <th scope="row"><?php _e( 'Enable Social Icons Module', 'catchwebtools' ); ?></th>
                                
                                <td>
                                    <?php
                                        $text	=	( ! empty ( $settings['status'] ) && $settings['status'] ) ? 'checked' : '';
                                        echo '<input type="checkbox" ' .$text. ' name="catchwebtools_social[status]" value="1"/>&nbsp;&nbsp;'. __( 'Check to Enable', 'catchwebtools' );
                                        echo '<p class="description">'
                                    ?>
                                    <ul>
                                        <li>
                                            <h4><?php _e( 'Shortcode', 'catchwebtools' ); ?></h4>
                                            
                                            <?php _e( 'The shortcode', 'catchwebtools' ); ?>
                                            <code>[cathchemes_social_icons]</code>
                                            <?php _e( '(in the Post/Page content) will enable Social Icons into the Page/Post.', 'catchwebtools' ); ?>
                                            
                                            <h4><?php _e( 'Widget', 'catchwebtools' ); ?></h4>
                                            
                                            <?php _e( 'Drag and drop Catch Web Tools\' Social Icons Widget to any Sidebar for results.', 'catchwebtools' );?>
                                        
                                            <h4><?php _e( 'In WordPress Template', 'catchwebtools' ); ?></h4>
                                            
                                            <?php _e( 'If Catch Web Tools\' Social Icons is required in WordPress template, the following code can be used: ', 'catchwebtools' );?>:
                                            
                                            <br/>
                                            
                                            <code>&lt;?php
                                                if ( function_exists( 'catchwebtools_social_icons' ) )
                                                    catchwebtools_social_icons();
                                                ?&gt;
                                            </code>
                                            
                                            <br/>
                                            
                                            <?php _e( 'OR', 'catchwebtools' ); ?>
                                            
                                            <br/>
                                            
                                            <code>
                                                &lt;?php
                                                    echo do_shortcode( '[cathchemes_social_icons]' ); 
                                                ?&gt;
                                            </code>
                                        </li>
                                    </ul>
    								<?php '</p>';
    								?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <?php submit_button('Save Changes'); ?>
                </div>
                
                <h3 class="option-toggle"><a href="#"><?php _e( 'Social Icons Settings', 'catchwebtools' ); ?></a></h3>
                <div class="option-content inside">
                    <table class="form-table">
                    <tbody>
                        <tr>                            
                            <th scope="row"><?php _e( 'Enable Social Icons Sidebar?', 'catchwebtools' ); ?></th>
                            <td>
                                <a class="button" href="<?php echo admin_url('widgets.php'); ?>" title="<?php esc_attr_e( ' Drag and Drop Catch Web Tools Social Icons widget to any sidebar', 'catchwebtools' ); ?>"><?php _e( ' Drag and Drop Catch Web Tools Social Icons widget to any sidebar', 'catchwebtools' );?></a>
                            </td>
                        </tr>   
                        
                        <tr>
                            <th scope="row"><?php _e( 'Social Icon Size (px)', 'catchwebtools' ); ?></th>
                            <td>
                                <?php
                                    $text	=	( ! empty ( $settings['social_icon_size'] ) && $settings['social_icon_size']!= '' ) ? $settings['social_icon_size'] : '32';
                                    echo '<input type="text" id="catchwebtools_social_icon_size" name="catchwebtools_social[social_icon_size]" value="'. $text .'"/>';
                                    echo '<p class="description"><b>'. __( 'Make sure to set the size to a multiple of 16px', 'catchwebtools' ) . '</b>'. __( ' or the icons could end up looking fuzzy', 'catchwebtools' ) . '</p>';
                                ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php _e( 'Social Icon Color', 'catchwebtools' ); ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['social_icon_color'] ) && $settings['social_icon_color']!= '' ) ? $settings['social_icon_color'] : '#504f4f';
                            echo '<input type="text" id="catchwebtools_social_color" name="catchwebtools_social[social_icon_color]" value="'. $text.'" />
                                <div id="catchwebtools_social_colorpicker"></div>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php echo __( 'Facebook', 'catchwebtools' ) . '<span class="genericon genericon-facebook"></span>'; ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['Facebook'] ) && $settings['Facebook']!= '' ) ? $settings['Facebook'] : '';
                            echo '<input type="text" size="80" name="catchwebtools_social[Facebook]" value="'. $text .'"/>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php echo __( 'Twitter', 'catchwebtools' ) . '<span class="genericon genericon-twitter"></span>'; ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['Twitter'] ) && $settings['Twitter']!= '' ) ? $settings['Twitter'] : '';
                            echo '<input type="text" size="80" name="catchwebtools_social[Twitter]" value="'. $text .'"/>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php echo __( 'Google+', 'catchwebtools' ). '<span class="genericon genericon-googleplus"></span>'; ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['GooglePlus'] ) && $settings['GooglePlus']!= '' ) ? $settings['GooglePlus'] : '';
                            echo '<input type="text" size="80" name="catchwebtools_social[GooglePlus]" value="'. $text .'"/>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php echo __( 'Rss Feed', 'catchwebtools' ) . '<span class="genericon genericon-feed"></span>'; ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['Feed'] ) && $settings['Feed']!= '' ) ? $settings['Feed'] : '';
                            echo '<input type="text" size="80" name="catchwebtools_social[Feed]" value="'. $text .'"/>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php echo __( 'WordPress', 'catchwebtools' ) . '<span class="genericon genericon-wordpress"></span>'; ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['WordPress'] ) && $settings['WordPress']!= '' ) ? $settings['WordPress'] : '';
                            echo '<input type="text" size="80" name="catchwebtools_social[WordPress]" value="'. $text .'"/>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php echo __( 'GitHub', 'catchwebtools' ) . '<span class="genericon genericon-github"></span>'; ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['GitHub'] ) && $settings['GitHub']!= '' ) ? $settings['GitHub'] : '';
                            echo '<input type="text" size="80" name="catchwebtools_social[GitHub]" value="'. $text .'"/>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php echo __( 'LinkedIn', 'catchwebtools' ) . '<span class="genericon genericon-linkedin"></span>'; ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['LinkedIn'] ) && $settings['LinkedIn']!= '' ) ? $settings['LinkedIn'] : '';
                            echo '<input type="text" size="80" name="catchwebtools_social[LinkedIn]" value="'. $text .'"/>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php echo __( 'Pinterest', 'catchwebtools' ) . '<span class="genericon genericon-pinterest"></span>'; ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['Pinterest'] ) && $settings['Pinterest']!= '' ) ? $settings['Pinterest'] : '';
                            echo '<input type="text" size="80" name="catchwebtools_social[Pinterest]" value="'. $text .'"/>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php echo __( 'Flickr', 'catchwebtools' ) . '<span class="genericon genericon-flickr"></span>'; ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['Flickr'] ) && $settings['Flickr']!= '' ) ? $settings['Flickr'] : '';
                            echo '<input type="text" size="80" name="catchwebtools_social[Flickr]" value="'. $text .'"/>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php echo __( 'Vimeo', 'catchwebtools' ) . '<span class="genericon genericon-vimeo"></span>'; ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['Vimeo'] ) && $settings['Vimeo']!= '' ) ? $settings['Vimeo'] : '';
                            echo '<input type="text" size="80" name="catchwebtools_social[Vimeo]" value="'. $text .'"/>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php echo __( 'YouTube', 'catchwebtools' ) . '<span class="genericon genericon-youtube"></span>'; ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['YouTube'] ) && $settings['YouTube']!= '' ) ? $settings['YouTube'] : '';
                            echo '<input type="text" size="80" name="catchwebtools_social[YouTube]" value="'. $text .'"/>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php echo __( 'Tumblr', 'catchwebtools' ) . '<span class="genericon genericon-tumblr"></span>'; ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['Tumblr'] ) && $settings['Tumblr']!= '' ) ? $settings['Tumblr'] : '';
                            echo '<input type="text" size="80" name="catchwebtools_social[Tumblr]" value="'. $text .'"/>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php echo __( 'Instagram', 'catchwebtools' ) . '<span class="genericon genericon-instagram"></span>'; ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['Instagram'] ) && $settings['Instagram']!= '' ) ? $settings['Instagram'] : '';
                            echo '<input type="text" size="80" name="catchwebtools_social[Instagram]" value="'. $text .'"/>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php echo __( 'CodePen', 'catchwebtools' ) . '<span class="genericon genericon-codepen"></span>'; ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['CodePen'] ) && $settings['CodePen']!= '' ) ? $settings['CodePen'] : '';
                            echo '<input type="text" size="80" name="catchwebtools_social[CodePen]" value="'. $text .'"/>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php echo __( 'Polldaddy', 'catchwebtools' ) . '<span class="genericon genericon-polldaddy"></span>'; ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['Polldaddy'] ) && $settings['Polldaddy']!= '' ) ? $settings['Polldaddy'] : '';
                            echo '<input type="text" size="80" name="catchwebtools_social[Polldaddy]" value="'. $text .'"/>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php echo __( 'Path', 'catchwebtools' ) . '<span class="genericon genericon-path"></span>'; ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['Path'] ) && $settings['Path']!= '' ) ? $settings['Path'] : '';
                            echo '<input type="text" size="80" name="catchwebtools_social[Path]" value="'. $text .'"/>';
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php echo __( 'Dribbble', 'catchwebtools' ) . '<span class="genericon genericon-dribbble"></span>'; ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['Dribbble'] ) && $settings['Dribbble']!= '' ) ? $settings['Dribbble'] : '';
                            echo '<input type="text" size="80" name="catchwebtools_social[Dribbble]" value="'. $text .'"/>';
                            ?>
                            </td>
                        </tr>
                     </tbody>
                </table>
                    <?php submit_button('Save Changes'); ?>
                </div>
            </div>
        </form>
    </div><!-- #social -->
</div><!-- .wrap -->