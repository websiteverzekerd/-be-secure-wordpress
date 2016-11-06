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

add_action( 'admin_menu', 'be_secure_menu' );
add_action( 'admin_init', 'be_secure_settings_init' );



// functions
function be_secure_settings_init(  ) { 

	register_setting( 'pluginPage', 'be_secure_settings' );

	add_settings_section(
		'be_secure_pluginPage_section', 
		__( 'Plugin configuratie', 'wordpress' ), 
		'be_secure_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'be_secure_text_field_0', 
		__( 'E-mail adres', 'wordpress' ), 
		'be_secure_text_field_0_render', 
		'pluginPage', 
		'be_secure_pluginPage_section' 
	);

	add_settings_field( 
		'be_secure_text_field_1', 
		__( 'Domein URL', 'wordpress' ), 
		'be_secure_text_field_1_render', 
		'pluginPage', 
		'be_secure_pluginPage_section' 
	);

	add_settings_field( 
		'be_secure_checkbox_field_2', 
		__( 'Ik ga akkoord met de opt-in (<a href="http://www.websiteverzekerd.nl/opt-in">Meer informatie</a>)', 'wordpress' ), 
		'be_secure_checkbox_field_2_render', 
		'pluginPage', 
		'be_secure_pluginPage_section' 
	);

	add_settings_field( 
		'be_secure_checkbox_field_3', 
		__( 'Activeer de plugin', 'wordpress' ), 
		'be_secure_checkbox_field_3_render', 
		'pluginPage', 
		'be_secure_pluginPage_section' 
	);


}


function be_secure_text_field_0_render(  ) { 

	$options = get_option( 'be_secure_settings' );
	?>
	<input type='text' name='be_secure_settings[be_secure_text_field_0]' value='<?php echo $options['be_secure_text_field_0']; ?>'>
	<?php

}


function be_secure_text_field_1_render(  ) { 

	$options = get_option( 'be_secure_settings' );
	?>
	<input type='text' name='be_secure_settings[be_secure_text_field_1]' value='<?php echo $options['be_secure_text_field_1']; ?>'>
	<?php

}


function be_secure_checkbox_field_2_render(  ) { 

	$options = get_option( 'be_secure_settings' );
	?>
	<input type='checkbox' name='be_secure_settings[be_secure_checkbox_field_2]' <?php checked( $options['be_secure_checkbox_field_2'], 1 ); ?> value='1'>
	<?php

}


function be_secure_checkbox_field_3_render(  ) { 

	$options = get_option( 'be_secure_settings' );
	?>
	<input type='checkbox' name='be_secure_settings[be_secure_checkbox_field_3]' <?php checked( $options['be_secure_checkbox_field_3'], 1 ); ?> value='1'>
	<?php

}


function be_secure_settings_section_callback(  ) { 

	echo __( 'Deze pagina wordt gebruikt voor het correct configureren van de plugin, het is dus belangrijk dat je de juiste gegevens invult', 'wordpress' );

}



/** Step 3. */
function be_secure_home() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

		// load home
	$logo_url = plugin_dir_url( __FILE__ ) . 'images/logo.png';
	?>
	<img src="<?php echo $logo_url; ?>" alt="WebsiteVerzekerd Be Secure" />
	
	<form action='options.php' method='post'>

		

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>

	<?php
	$options = get_option( 'be_secure_settings' );
	?>

	<h3>Plugin status</h3>	
	<p>De plugin is <?php if($options['be_secure_checkbox_field_3'] == 1) { echo '<b style="color:green;">geactiveerd</b>'; } else { echo '<b style="color:red;">niet actief</b>';  } ?> </p>
	<?php
}
