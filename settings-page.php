<?php
add_action( 'admin_menu', 'be_secure_add_admin_menu' );
add_action( 'admin_init', 'be_secure_settings_init' );


function be_secure_add_admin_menu(  ) { 

	add_menu_page( 'Be Secure', 'Be Secure', 'manage_options', 'be_secure', 'be_secure_options_page' );

}


function be_secure_settings_init(  ) { 

	register_setting( 'pluginPage', 'be_secure_settings' );

	add_settings_section(
		'be_secure_pluginPage_section', 
		__( 'Your section description', 'wordpress' ), 
		'be_secure_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'be_secure_text_field_0', 
		__( 'Settings field description', 'wordpress' ), 
		'be_secure_text_field_0_render', 
		'pluginPage', 
		'be_secure_pluginPage_section' 
	);

	add_settings_field( 
		'be_secure_text_field_1', 
		__( 'Settings field description', 'wordpress' ), 
		'be_secure_text_field_1_render', 
		'pluginPage', 
		'be_secure_pluginPage_section' 
	);

	add_settings_field( 
		'be_secure_checkbox_field_2', 
		__( 'Settings field description', 'wordpress' ), 
		'be_secure_checkbox_field_2_render', 
		'pluginPage', 
		'be_secure_pluginPage_section' 
	);

	add_settings_field( 
		'be_secure_checkbox_field_3', 
		__( 'Settings field description', 'wordpress' ), 
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

	echo __( 'This section description', 'wordpress' );

}


function be_secure_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<h2>Be Secure</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}

?>