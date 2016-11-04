<?php
/**
* Plugin Name: Be Secure WordPress
* Plugin URI: http://github.com/websiteverzekerd/be-secure-wordpress
* Description:  WebsiteVerzekerd WordPress Plugin for automatic vulnerability scanning
* Version: 1.0
* Author: WebsiteVerzekerd
* Author URI: www.websiteverzekerd.nl
* License: GPLv2
*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
 
/** Step 1. */
function be_secure_menu() {
	add_menu_page( 'Be Secure', 'Be Secure', 'manage_options', 'be-secure-wordpress', 'be_secure_home', $icon_url = '', null); 
}

add_action( 'admin_menu', 'be_secure_menu' );



/** Step 3. */
function be_secure_home() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}