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
	add_menu_page( 'Be Secure', 'Be Secure', 'manage_options', 'be-secure-wordpress', 'be_secure_home', plugin_dir_url(__FILE__) . "images/icon16.png", null); 
}

// plugin server
$version_server = "http://www.websiteverzekerd.nl/version.txt";
$scan_server = "http://scan.websiteverzekerd.nl/";


// plugin checks
$options = get_option( 'be_secure_settings' );


if($options['be_secure_checkbox_field_2'] == 1 && 
   $options['be_secure_checkbox_field_3'] && 
   filter_var($options['be_secure_text_field_0'], FILTER_VALIDATE_EMAIL)
) 
{
	$checklist = 1;
}

if($checklist == 1) {
	function plugin_active_notice() {
    ?>
    <div class="notice notice-success">
        <p>De WebsiteVerzekerd Plugin is <b style='color:green;'>actief</b>! voor meer informatie over de werking, ga naar <a href="http://www.websiteverzekerd.nl/plugin-updates">onze website</a></p>
    </div>
    <?php
	}
	add_action( 'admin_notices', 'plugin_active_notice' );
}


// error messages
include_once 'libraries/error.php';

// settings page
include_once 'libraries/settings.php';