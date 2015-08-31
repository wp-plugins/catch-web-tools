<?php
/**
 * @package Admin
 * @sub-package Admin SEO Display
 */
 ?>
<div id="catchwebtools" class="wrap">    
	<?php include ( 'header.php' ); ?>
    <?php include ( 'navigation.php' ); ?>
    <div id="seo">
        <form method="post" action="options.php">
            <?php settings_fields( 'seo-settings-group' ); ?>
            <?php $settings	=	catchwebtools_get_options( 'catchwebtools_seo' ); ?>
            <div class="option-container">
                <h3 class="option-toggle option-active"><a href="#"><?php _e( 'Enable SEO Module', 'catchwebtools' ); ?></a></h3>
                <div class="option-content inside open">
                    <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row"><?php _e( 'Enable SEO Module', 'catchwebtools' ); ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['status'] ) && $settings['status'] ) ? 'checked' : '';
                            echo '<input type="checkbox" ' .$text. ' name="catchwebtools_seo[status]" value="1"/>&nbsp;&nbsp;'. __( 'Check to Enable', 'catchwebtools' );
                            echo '<p class="description">'. __( 'Please make sure you have disabled all the SEO plugins before activating Catch Work Tools SEO Module.', 'catchwebtools' ) . '</p>';
							echo '<p class="description">'. __( 'SEO for specific Pages or Posts, can be added via Catch Web Tools Custom Meta Box which shows up in Pages\' and Posts\' add/edit sections once this function is enabled. Same settings will show up in Categories\' add/edit pages.', 'catchwebtools' ) . '</p>';
                            ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                    <?php submit_button('Save Changes'); ?>
                </div>
                
                <h3 class="option-toggle"><a href="#"><?php _e( 'SEO Homepage Settings', 'catchwebtools' ); ?></a></h3>
                <div class="option-content inside">
                    <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row"><?php _e( 'SEO Title', 'catchwebtools' ); ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['title'] ) ) ? esc_attr( $settings['title'] ) :  get_bloginfo ( 'name' );
                            echo '<input type="text" size="80" maxlength="70" id="catchwebtools_seo_title" name="catchwebtools_seo[title]" value="' .$text. '" />';
                            echo '<p class="description">'. __( 'Title display in search engines is limited to 70 characters. ', 'catchwebtools' ) . '<span id="catchwebtools_seo_title_left">70</span> ' . __( 'character(s) left.', 'catchwebtools' ) . '</p>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php _e( 'Meta Description', 'catchwebtools' ); ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['description'] ) ) ? esc_attr( $settings['description'] ) :  get_bloginfo ( 'description' );
                            echo '<textarea cols="80" rows="7" id="catchwebtools_seo_description"  name="catchwebtools_seo[description]" maxlength="156" >' .$text. '</textarea>';
                            echo '<p class="description">'. __( 'The meta description is limited to 156 characters. ', 'catchwebtools' ) . '<span id="catchwebtools_seo_description_left">156</span> ' . __( 'character(s) left.', 'catchwebtools' ) . '</p>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php _e( 'Focus Keywords', 'catchwebtools' ); ?></th>
                            <td>
                            <?php
                            $text	=	( ! empty ( $settings['keywords'] ) ) ? esc_attr( $settings['keywords'] ) : '';
                            echo '<textarea cols="80" rows="7" name="catchwebtools_seo[keywords]">' .$text. '</textarea>';
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php _e( 'Author', 'catchwebtools' ); ?></th>
                            <td>
                            <?php
                            $text	=	( isset ( $settings['author'] ) && $settings['author'] != '' ) ? $settings['author'] : '';
                            wp_dropdown_users(array(
                                            'name' 		=> 'catchwebtools_seo[author]',
                                            'selected'	=> $text,
                                            'show_option_none'        => 'Disable', // string
                                            )
                                        );
                            ?>
                            </td>
                        </tr>
                     </tbody>
                </table>
                    <?php submit_button('Save Changes'); ?>
                </div>
            </div>
        </form>
    </div><!-- #seo -->
</div><!-- .wrap -->