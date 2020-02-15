<?php 

/**
 * Plugin Name: Environmental Site Assessment
 * Plugin URI: http://www.aravynn.com/esa
 * Description: The Environmental Site Assessment Form.
 * Version: 1.0
 * Author: Kevin Jones
 * Author URI: http://www.aravynn.com
 */

include 'esa-shortcode.php';
include 'esa-post-return.php'; 
 
add_action( 'admin_post_nopriv_esa-form-return', 'esa_post_return_data' ); // action to POST data. 
add_action( 'admin_post_esa-form-return', 'esa_post_return_data' ); // action to POST data. 
 
add_action('activated_plugin', 'ESA_Init'); // on app load. 
 
function ESA_Init(){
	// initialize the function. Run anything required to create the app.
}

add_action( 'admin_menu', 'ESA_admin_menu' );

function ESA_admin_menu(){
	// create the admin menu for application options. 
	add_submenu_page( 
		'options-general.php', // string $parent_slug, 
		'ESA Options', // string $page_title, 
		'Env Site Options', // string $menu_title, 
		'manage_options', // string $capability, 
		'ESA_Options', // string $menu_slug, 
		'ESA_Admin_Page', // callable $function = '', 
		6 // int $position = null 
	);
	
	add_action('admin_init', 'ESA_settings_init');
}

function ESA_Admin_Page(){
	// run the HTML to display the admin page here.
	
	// check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }
    
    ?>

	<div class="wrap">
		<?php settings_errors();?>
		<form method="POST" action="options.php">
			<?php settings_fields('ESA_Options');?>
			<?php do_settings_sections('ESA_Options')?>
			<?php submit_button();?>
		</form>
	</div>
	
	<?php 
}

function ESA_settings_init(){
	// initialize administration
	
	 add_settings_section(
        'ESA-settings-section', // id of the section
        'Environmental Site Assessment Settings', // title to be displayed
        '', // callback function to be called when opening section
        'ESA_Options' // page on which to display the section, this should be the same as the slug used in add_submenu_page()
    );
	
	// register the setting
	register_setting(
		'ESA_Options', // option group
		'esa_smtp_gateway'
	);
	
	register_setting(
		'ESA_Options', // option group
		'esa_email'
	);
	register_setting(
		'ESA_Options', // option group
		'esa_email_password'
	);

	add_settings_field(
		'my-first-text', // id of the settings field
		'Email Settings', // title
		'ESA_settings_cb', // callback function
		'ESA_Options', // page on which settings display
		'ESA-settings-section' // section on which to show settings
	);
	
}

function ESA_settings_cb() {
    
    $ESASMTP = esc_attr(get_option('esa_smtp_gateway', ''));
    $UserEmail = esc_attr(get_option('esa_email', ''));
    
    ?>

		<div id="titlediv">
			<label for="esa_smtp_gateway">SMTP Gateway:</label><input type="text" name="esa_smtp_gateway" id="esa_smtp_gateway" value="<?php echo $ESASMTP; ?>"><br />
			<label for="esa_email">Email:</label><input type="text" name="esa_email" id="esa_email" value="<?php echo $UserEmail; ?>"><br />
			<label for="esa_email_password">Password:</label><input type="password" name="esa_email_password" id="esa_email_password" placeholder="*******">
		</div>

	<?php

}

add_action( 'admin_post_nopriv_ESA_post', 'ESA_run_post' ); // action to POST data. 
add_action( 'admin_post_ESA_post', 'ESA_run_post' ); // action to POST data. 
 
function ESA_run_post(){
	// run the $_POST function here. 
}




