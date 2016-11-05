<?php
/**
* Plugin Name: Be Secure
* Plugin URI: http://github.com/websiteverzekerd/be-secure-wordpress
* Description:  WebsiteVerzekerd WordPress Plugin for automatic vulnerability scanning
* Version: 1.0
* Author: WebsiteVerzekerd
* Author URI: www.websiteverzekerd.nl
* License: GPLv2
*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
 
// add menu
function be_secure_menu() {
	add_menu_page( 'Be Secure', 'Be Secure', 'manage_options', 'be-secure-wordpress', 'be_secure_home', plugin_dir_url( __FILE__ ) . 'images/icon16.png', null); 
}

add_action( 'admin_menu', 'be_secure_menu' );

// load home
function be_secure_home() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	// load home
	include_once 'be-secure/home.php';

}
