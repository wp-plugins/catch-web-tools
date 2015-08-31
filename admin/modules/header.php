<?php
/**
 * @package Admin
 * @sub-package Header
 */
 ?>
<div id="plugin-option-header">
    <?php 
		//Only display social facebook and twitter buttons on dashboard
		if ( isset($_GET['page'] ) && ( $_GET['page'] == 'catch-web-tools' ) )  : ?>
		<div id="plugin-social">
        <ul>
            <li class="widget-fb">
                <div data-show-faces="false" data-width="80" data-layout="button_count" data-send="false" data-href="<?php echo esc_url( __('http://facebook.com/catchthemes', 'catchwebtools' ) ); ?>" class="fb-like"></div></li>
            <li class="widget-tw">
                <a data-dnt="true" data-show-screen-name="true" data-show-count="true" class="twitter-follow-button" href="<?php echo esc_url( __('https://twitter.com/catchthemes', 'catchwebtools' ) ); ?>">Follow @catchthemes</a>
            </li>
        </ul>
    </div><!-- #plugin-social -->
    <?php endif; ?>
    <div id="plugin-option-title">
        <h2 class="title"><?php _e( 'Catch Web Tools By', 'catchwebtools' ); ?></h2>
        <h2 class="logo">
            <a href="<?php echo esc_url( __( 'http://catchthemes.com/', 'catchwebtools' ) ); ?>" title="<?php esc_attr_e( 'Catch Themes', 'catchwebtools' ); ?>" target="_blank">
                <img src="<?php echo CATCHWEBTOOLS_URL.'images/catch-themes.png'; ?>" alt="<?php _e( 'Catch Themes', 'catchwebtools' ); ?>" />
            </a>
        </h2>
    </div><!-- #plugin-option-title -->
    
    <div id="plugin-support">
        <ul>
            <li><a class="button" href="<?php echo esc_url( __('http://catchthemes.com/forum/catch-web-tools/', 'catchwebtools' )); ?>" title="<?php esc_attr_e('Support Forum', 'catchwebtools' ); ?>" target="_blank"><?php printf(__('Support Forum', 'catchwebtools' )); ?></a></li>
            <li><a class="button" href="<?php echo esc_url( __('http://catchthemes.com/wp-plugins/catch-web-tools/', 'catchwebtools' )); ?>" title="<?php esc_attr_e('Plugin Details', 'catchwebtools' ); ?>" target="_blank"><?php printf(__('Plugin Details', 'catchwebtools' ) ); ?></a></li>
            <li><a class="button" href="<?php echo esc_url( __('https://www.facebook.com/catchwebtools/', 'catchwebtools' ) ); ?>" title="<?php esc_attr_e( 'Like Catch Themes on Facebook', 'catchwebtools' ); ?>" target="_blank"><?php printf(__('Facebook', 'catchwebtools' )); ?></a></li>
            <li><a class="button" href="<?php echo esc_url( __('https://twitter.com/catchwebtools/', 'catchwebtools' ) ); ?>" title="<?php esc_attr_e( 'Follow Catch Themes on Twitter', 'catchwebtools' ); ?>" target="_blank"><?php printf( __('Twitter', 'catchwebtools' ) ); ?></a></li>
            <li><a class="button" href="<?php echo esc_url( __('http://wordpress.org/support/view/plugin-reviews/catch-web-tools', 'catchwebtools' ) ); ?>" title="<?php esc_attr_e('Rate us 5 Star on WordPress', 'catchwebtools' ); ?>" target="_blank"><?php printf( __('5 Star Rating', 'catchwebtools' ) ); ?></a></li>
        </ul>
    </div><!-- #plugin-support --> 
</div><!-- #plugin-option-header -->   

<?php if( isset($_GET['settings-updated']) ) { ?>

<div id="message" class="updated fade">
	<p><strong><?php _e( 'Plugin Options Saved.', 'catchwebtools' ) ?></strong></p>
</div>

<?php } ?>