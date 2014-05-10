<?php
/**
 * @package Admin
 * @sub-package Admin CatchIDs Display
 */
 ?>
<div id="catchwebtools" class="wrap">    
	<?php include ( 'header.php' ); ?>
    <?php include ( 'navigation.php' ); ?>
    <div id="dashboard">
    	<div id="plugin-description">
            <h2><?php _e( 'Catch Web Tools', 'catchwebtools' ); ?></h2>
            <p>
                <?php _e( 'Catch Web Tools is a simple and lightweight WordPress plugin to help you manage your WordPress site. Power up your WordPress site with powerful features that were till now only available to Catch Themes users. We currently offer Webmaster Tools, Open Graph, Custom CSS, Social Icons, Catch IDs and basic SEO Optimization.', 'catchwebtools' ); ?>
            </p>
        </div><!-- .option-container -->
        
        <div id="module-container">
        	<div id="module-webmaster-tools" class="catch-modules short-desc">
                <h3><?php _e( 'Webmaster Tools', 'catchwebtools' ); ?></h3>
                <p>
                	<?php _e( 'Webmaster Tools gives you an option to add in the Site Verfication Code and Header and Footer Script required to manage your site.', 'catchwebtools' );?>
                </p>
                <div class="catch-actions">
                	<form method="post" action="options.php">
                    	<?php 
							settings_fields( 'webmaster-tools-group' );
                        	
							$settings	=	get_catchwebtools_options( 'catchwebtools_webmaster' );
							                        
							if( ! empty ( $settings['status'] ) && $settings['status'] ) {
								echo '<input type="hidden" value="0"  name="catchwebtools_webmaster[status]"/>';
								
								submit_button( __( 'Deactivate', 'catchwebtools' ), 'secondary', 'submit', false );
							}
							else {
                            	echo '<input type="hidden" value="1"  name="catchwebtools_webmaster[status]"/>';
								
								submit_button( __( 'Activate', 'catchwebtools' ), 'primary', 'submit', false );
                        	}
                        ?>
                    
                    	<a class="button-secondary" href="<?php echo admin_url( 'admin.php?page=catch-web-tools-webmasters' ); ?>"><?php _e( 'Configure', 'catchwebtools' );?></a>
                    </form>
              	</div>
        	</div><!-- #module-webmaster-tools -->
            
         	<div id="module-customcss" class="catch-modules short-desc">           
                <h3><?php _e( 'Custom CSS', 'catchwebtools' );?></h3>
                <p>
                    <?php _e( 'Custom CSS gives you an option to add in your CSS to your WordPress site without building Child Theme. You can just add your Custom CSS and save, it will show up in the frontend head section. Leave it blank if it is not needed.', 'catchwebtools' ); ?>
                </p> 
                <div class="catch-actions">
                    <a class="button-secondary" href="<?php echo admin_url( 'admin.php?page=catch-web-tools-custom-css' ); ?>"><?php _e( 'Configure', 'catchwebtools' );?></a>
              	</div>                
          	</div><!-- #module-customcss -->
            
            <div id="module-catchids" class="catch-modules short-desc"> 
                <h3><?php _e( 'Catch IDs', 'catchwebtools' ); ?></h3>
                
                <p>
                	<?php _e( 'Catch IDs will show Post ID, Page ID, Media ID, Links ID, Category ID, Tag ID and UserID in the respective admin section tables.', 'catchwebtools' );?>
               	</p>
                
                <div class="catch-actions">
                    <form method="post" action="options.php">
                    	<?php 
							settings_fields( 'catchids-settings-group' );
                        	
							$settings	=	get_catchwebtools_options( 'catchwebtools_catchids' );
							                        
							if( ! empty ( $settings['status'] ) && $settings['status'] ) {
								echo '<input type="hidden" value="0"  name="catchwebtools_catchids[status]"/>';
								
								submit_button( __( 'Deactivate', 'catchwebtools' ), 'secondary', 'submit', false );
							}
							else {
                            	echo '<input type="hidden" value="1"  name="catchwebtools_catchids[status]"/>';
								
								submit_button( __( 'Activate', 'catchwebtools' ), 'primary', 'submit', false );
                        	}
                        ?>
                    </form>
               	</div><!-- .catch-actions -->
            </div><!-- #module-catchids -->
                        
            <div id="module-socialicons" class="catch-modules long-desc"> 
                <h3><?php _e( 'Social Icons', 'catchwebtools' );?></h3>
                <p>
                	<?php _e( 'Social Icons gives you an option to add in your Social Profiles.', 'catchwebtools' );?>
               	</p>
                <p>
                	<?php _e( 'You can add Social Icons by adding in Widgets in your Sidebar or by adding in Shortcode in your Page/Post Content or by adding the function in your template files.', 'catchwebtools' );?>
               	</p>
                <div class="catch-actions">
                	<form method="post" action="options.php">
                    	<?php 
							settings_fields( 'social-icons-group' );
                        	
							$settings	=	get_catchwebtools_options( 'catchwebtools_social' );
							                        
							if( ! empty ( $settings['status'] ) && $settings['status'] ) {
								echo '<input type="hidden" value="0"  name="catchwebtools_social[status]"/>';
								
								submit_button( __( 'Deactivate', 'catchwebtools' ), 'secondary', 'submit', false );
							}
							else {
                            	echo '<input type="hidden" value="1"  name="catchwebtools_social[status]"/>';
								
								submit_button( __( 'Activate', 'catchwebtools' ), 'primary', 'submit', false );
                        	}
                        ?>
                    
                    	<a class="button-secondary" href="<?php echo admin_url( 'admin.php?page=catch-web-tools-social-icons' ); ?>"><?php _e( 'Configure', 'catchwebtools' );?></a>
                    </form>
              	</div>
         	</div><!-- #module-socialicons -->
            
            <div id="module-opengraph" class="catch-modules long-desc">
                <h3><?php _e( 'Open Graph', 'catchwebtools' );?></h3>
                <p><?php _e( 'The Open Graph protocol enables your site to become a rich object in a social graph. For instance, this is used on Facebook to allow any web page to have the same functionality as any other object on Facebook.', 'catchwebtools' ); ?>
                </p>
                <div class="catch-actions">
                	<form method="post" action="options.php">
                    	<?php 
							settings_fields( 'opengraph-settings-group' );
                        	
							$settings	=	get_catchwebtools_options( 'catchwebtools_opengraph' );
							                        
							if( ! empty ( $settings['status'] ) && $settings['status'] ) {
								echo '<input type="hidden" value="0"  name="catchwebtools_opengraph[status]"/>';
								
								submit_button( __( 'Deactivate', 'catchwebtools' ), 'secondary', 'submit', false );
							}
							else {
                            	echo '<input type="hidden" value="1"  name="catchwebtools_opengraph[status]"/>';
								
								submit_button( __( 'Activate', 'catchwebtools' ), 'primary', 'submit', false );
                        	}
                        ?>
                    
                    	<a class="button-secondary" href="<?php echo admin_url( 'admin.php?page=catch-web-tools-opengraph' ); ?>"><?php _e( 'Configure', 'catchwebtools' );?></a>
                    </form>
              	</div>          
            </div><!-- #module-opengraph -->
           
        	<div id="module-seo" class="catch-modules long-desc">
                <h3><?php _e( 'SEO ( BETA Version )', 'catchwebtools' );?></h3>
                <p>
                    <?php _e( 'SEO is in beta version. SEO can be used to add SEO meta tags to Homepage, specific Pages or Posts and Categories page. This section adds SEO meta data to site\'s section.', 'catchwebtools' ); ?>
                </p>  
                <div class="catch-actions">
                	<form method="post" action="options.php">
                    	<?php 
							settings_fields( 'seo-settings-group' );
                        	
							$settings	=	get_catchwebtools_options( 'catchwebtools_seo' );
							                        
							if( ! empty ( $settings['status'] ) && $settings['status'] ) {
								echo '<input type="hidden" value="0"  name="catchwebtools_seo[status]"/>';
								
								submit_button( __( 'Deactivate', 'catchwebtools' ), 'secondary', 'submit', false );
							}
							else {
                            	echo '<input type="hidden" value="1"  name="catchwebtools_seo[status]"/>';
								
								submit_button( __( 'Activate', 'catchwebtools' ), 'primary', 'submit', false );
                        	}
                        ?>
                    
                    	<a class="button-secondary" href="<?php echo admin_url( 'admin.php?page=catch-web-tools-seo' ); ?>"><?php _e( 'Configure', 'catchwebtools' );?></a>
                    </form>
              	</div>          
            </div><!-- #module-seo -->
		
        </div><!-- #module-container -->

	</div><!-- #dashboard -->
</div><!-- .wrap -->