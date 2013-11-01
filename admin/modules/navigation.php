<?php
/**
 * @package Admin
 * @sub-package Navigation
 */
 ?>
<ul class="tabNavigation" id="mainNav">
    <li <?php echo ( isset( $_GET['page'] ) && 'catch-web-tools' == $_GET['page'] )? 'class="ui-state-active"':'' ?>>
        <a href="<?php echo admin_url( 'admin.php?page=catch-web-tools' ); ?>"><?php _e( 'Dashboard', 'catchwebtools' );?></a>
    </li>

    <li <?php echo ( isset( $_GET['page'] ) && 'catch-web-tools-webmasters' == $_GET['page'] )? 'class="ui-state-active"':'' ?>>
        <a href="<?php echo admin_url( 'admin.php?page=catch-web-tools-webmasters' ); ?>"><?php _e( 'Webmaster Tools', 'catchwebtools' );?></a>
    </li>
    
    <li <?php echo ( isset( $_GET['page'] ) && 'catch-web-tools-custom-css' == $_GET['page'] )? 'class="ui-state-active"':'' ?>>
        <a href="<?php echo admin_url( 'admin.php?page=catch-web-tools-custom-css' ); ?>"><?php _e( 'Custom CSS', 'catchwebtools' );?></a>
    </li>
    
    <li <?php echo ( isset( $_GET['page'] ) && 'catch-web-tools-social-icons' == $_GET['page'] )? 'class="ui-state-active"':'' ?>>
        <a href="<?php echo admin_url( 'admin.php?page=catch-web-tools-social-icons' ); ?>"><?php _e( 'Social Icons', 'catchwebtools' );?></a>
    </li>
    
   <li <?php echo ( isset( $_GET['page'] ) && 'catch-web-tools-opengraph' == $_GET['page'] )? 'class="ui-state-active"':'' ?>>
        <a href="<?php echo admin_url( 'admin.php?page=catch-web-tools-opengraph' ); ?>"><?php _e( 'Open Graph', 'catchwebtools' );?></a>
    </li>
    
    <li <?php echo ( isset( $_GET['page'] ) && 'catch-web-tools-seo' == $_GET['page'] )? 'class="ui-state-active"':'' ?>>
        <a href="<?php echo admin_url( 'admin.php?page=catch-web-tools-seo' ); ?>"><?php _e( 'SEO', 'catchwebtools' );?></a>
    </li>        
</ul><!-- .tabsNavigation #mainNav -->  