<?php
/**
 * @package Admin
 * @sub-package Admin Webmaster Display
 */
 ?>

<div id="catchwebtools" class="wrap">    
	<?php include ( 'header.php' ); ?>
    <?php include ( 'navigation.php' ); ?>
    <div id="webmaster">
        <form method="post" action="options.php">
            <?php settings_fields( 'webmaster-tools-group' ); ?>
            
            <?php $settings = get_catchwebtools_options( 'catchwebtools_webmaster' ); ?>

            <div class="option-container">
                <h3 class="option-toggle option-active"><a href="#"><?php _e( 'Enable Webmaster Module', 'catchwebtools' ); ?></a></h3>
                
                <div class="option-content inside open">
                    <table class="form-table">
                        <tbody>
                            <tr>                            
                                <th scope="row"><?php _e( 'Enable Webmaster Module', 'catchwebtools' ); ?></th>
                                <td>
                                    <?php
                                    $text	=	( ! empty ( $settings['status'] ) && $settings['status'] ) ? 'checked' : '';
                                    echo '<input type="checkbox" ' .$text. ' name="catchwebtools_webmaster[status]" value="1"/>&nbsp;&nbsp;'. __( 'Check to Enable', 'catchwebtools' );
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <?php submit_button('Save Changes'); ?>   
                </div>
                
                <h3 class="option-toggle"><a href="#"><?php _e( 'Header and Footer Scripts', 'catchwebtools' ); ?></a></h3>
                
                <div class="option-content inside">
                    <table class="form-table">
                        <tbody>
                            <tr>                            
                                <th scope="row">
                                    <?php echo __( 'Enter scripts or code you would like output to', 'catchwebtools' ) . '<code>wp_head()</code>:'?>
                                </th>
                                <td>
                                    <?php
                                    $text	=	( ! empty ( $settings['header'] ) ) ? esc_html( $settings['header'] ) : '';
                                    echo '<textarea cols="80" rows="7" name="catchwebtools_webmaster[header]">' .$text. '</textarea>';
                                    echo '<p class="description">'. __( 'The', 'catchwebtools' ) .'<code>wp_head()</code>'. __( 'hook executes immediately before the closing </head> tag in the document source.' , 'catchwebtools' ) .'</p>';
                                    ?>
                                </td>
                            </tr>
                            
                            <tr>                            
                                <th scope="row">
                                    <?php echo __( 'Enter scripts or code you would like output to', 'catchwebtools' ) . '<code>wp_footer()</code>:'?>
                                </th>
                                <td>
                                    <?php
                                    $text	=	( ! empty ( $settings['footer'] ) ) ? esc_html( $settings['footer'] ) : '';
                                    echo '<textarea cols="80" rows="7" name="catchwebtools_webmaster[footer]">' .$text. '</textarea>';
                                    echo '<p class="description">'. __( 'The', 'catchwebtools' ) .'<code>wp_footer()</code>'. __( 'hook executes immediately before the closing </body> tag in the document source.' , 'catchwebtools' ) .'</p>';
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php submit_button('Save Changes'); ?>
                </div>
                
                <h3 class="option-toggle"><a href="#"><?php _e( 'Site Verification', 'catchwebtools' ); ?></a></h3>
                
                <div class="option-content inside">
                    <?php echo '<p class="description">'. __( 'You can use the boxes below to verify with different Webmaster Tools. If your site is already verified, you can skip this section. Enter the verify meta values for' , 'catchwebtools' ) .':</p>';?>
                    
                    <table class="form-table">
                        <tbody>
                            <tr>                            
                                <th scope="row">
                                    <a target="_blank" href="https://www.google.com/webmasters/tools/dashboard?hl=en&amp;siteUrl='<?php echo  urlencode( get_bloginfo( 'url' ) )?>%2F"> <?php _e( 'Google Webmaster Tools', 'catchwebtools' )?> </a>
                                </th>
                                <td>
                                    <?php
                                    $text	=	( ! empty ( $settings['google-site-verification'] ) ) ? esc_attr( $settings['google-site-verification'] ) : '';
                                    echo '<input type="text" size="80" name="catchwebtools_webmaster[google-site-verification]" value="' .$text. '" />' . __( 'Enter your Google ID number only', 'catchwebtools' ) ;
                                    ?>
                                </td>
                            </tr>
                            
                            <tr>                            
                                <th scope="row">
                                    <a target="_blank" href="http://www.bing.com/webmaster/?rfp=1#/Dashboard/?url='<?php echo  str_replace( 'http://', '', get_bloginfo( 'url' ) )?>"><?php _e( 'Bing Webmaster Tools', 'catchwebtools' )?></a>
                                </th>
                                <td>
                                    <?php
                                    $text	=	( ! empty ( $settings['msvalidate.01'] ) ) ? esc_attr( $settings['msvalidate.01'] ) : '';
                                    echo '<input type="text" size="80" name="catchwebtools_webmaster[msvalidate.01]" value="' .$text. '" />'. __( 'Enter your Bing ID number only', 'catchwebtools' ) ;
                                    ?>
                                </td>
                            </tr>
                            
                            <tr>                            
                                <th scope="row">
                                    <a target="_blank" href="http://www.alexa.com/pro/subscription"><?php _e( 'Alexa Verification ID', 'catchwebtools' )?></a>
                                </th>
                                <td>
                                    <?php
                                    $text	=	( ! empty ( $settings['alexaVerifyID'] ) ) ? esc_attr( $settings['alexaVerifyID'] ) : '';
                                    echo '<input type="text" size="80" name="catchwebtools_webmaster[alexaVerifyID]" value="' .$text. '" />'. __( 'Enter your Alexa ID number only', 'catchwebtools' ) ;
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <?php submit_button('Save Changes'); ?>
                </div>
            </div> 
         </form>
    </div><!-- #webmaster -->  
</div><!-- .wrap -->