<?php

/*
	
@package sunlighttheme
	
	========================
		ADMIN PAGE
	========================
*/

function sunlight_add_admin_page() {
	
	//Generate sunlight Admin Page
	add_menu_page( 'sunlight Theme Options', 'sunlight', 'manage_options', 'alecaddd_sunlight', 'sunlight_theme_create_page','dashicons-hammer', 110 );

	//Generate sunlight Admin Sub Pages
	add_submenu_page( 'alecaddd_sunlight', 'sunlight Theme Options', 'General', 'manage_options', 'alecaddd_sunlight', 'sunlight_theme_create_page');

	//Theme Support parent subment
	add_submenu_page( 'alecaddd_sunlight', 'Theme Supports', 'Support', 'manage_options', 'theme-support-options','my_theme_support' );

	//Generate sunlight Admin Sub Pages
	add_submenu_page( 'alecaddd_sunlight', 'sunlight CSS Options', 'Custom CSS', 'manage_options', 'alecaddd_sunlight_css', 'sunlight_theme_settings_page');	
}

add_action( 'admin_menu', 'sunlight_add_admin_page' );

//Activate custom settings


function sunlight_custom_settings() {



	//My theme General Setting Group
	register_setting( 'sunlight-settings-group', 'profile_image' );
	register_setting( 'sunlight-settings-group', 'first_name' );
	register_setting( 'sunlight-settings-group', 'last_name' );
	register_setting( 'sunlight-settings-group', 'user_description' );
	register_setting( 'sunlight-settings-group', 'twitter','sanitize_twitter' );
	register_setting( 'sunlight-settings-group', 'facebook' );
	register_setting( 'sunlight-settings-group', 'google_plus' );

	// theme General Setting Section
	add_settings_section( 'sunlight-sidebar-options', 'Sidebar Option', 'sunlight_sidebar_options', 'alecaddd_sunlight');

	// theme General Setting Fields
	add_settings_field( 'sidebar-profile', 'Profile Picture ', 'sunlight_sidebar_profile', 'alecaddd_sunlight', 'sunlight-sidebar-options');
	add_settings_field( 'sidebar-name', 'Full Name', 'sunlight_sidebar_name', 'alecaddd_sunlight', 'sunlight-sidebar-options');
	add_settings_field( 'sidebar-desc', 'Descripton', 'sunlight_sidebar_description', 'alecaddd_sunlight', 'sunlight-sidebar-options');
	add_settings_field( 'sidebar-twitter', 'Twitter Profile', 'sunlight_sidebar_twitter', 'alecaddd_sunlight', 'sunlight-sidebar-options');
	add_settings_field( 'sidebar-facebook', 'Facebook Profile', 'sunlight_sidebar_facebook', 'alecaddd_sunlight', 'sunlight-sidebar-options');
	add_settings_field( 'sidebar-google-plus', 'Google Plus Profile', 'sunlight_sidebar_goolge_plus', 'alecaddd_sunlight', 'sunlight-sidebar-options');





	//my theme support setting group
	register_setting( 'theme-support', 'post_format', 'theme_post_format_cb' );

	// My theme Support Section 
	add_settings_section( 'section_theme_support', 'Customize Your Support Options', 'theme_support_section_cb', 'theme-support-options' );

	// theme Support Setting Fields
	add_settings_field( 'post-formats', 'Post Formats', 'theme_post_format', 'theme-support-options', 'section_theme_support');



}
add_action( 'admin_init', 'sunlight_custom_settings' );



//Theme Support sanitize callback function 
function theme_post_format_cb($input){
	return $input;

}

//Theme Support section callback function 
function theme_support_section_cb(){

}

//Theme Support Setting fields 
function theme_post_format(){
	$options = get_option( 'post_format' );
	$formats = array('aside', 'gallery', 'link', 'image', 'qoute', 'status', 'video', 'audio', 'chat');
	$output='';
	foreach ($formats as $format ) {
		$checked = ( $options[$format] ==1 ? 'checked' : '' );
		$output .='<label><input type="checkbox"  '.$checked.' id="'.$format.'" name="post_format['.$format.']" value="1"> '.$format.' </label> <br> ';
		
	}
	echo $output;
}












// General Setting section callback function 
function sunlight_sidebar_options() {
	echo 'Customize your Sidebar Information';
}



function sunlight_sidebar_profile(){
	$profile = esc_attr( get_option( 'profile_image' ) );
	
	echo '
		  <input type="button" value="Upload Photo" class="button button-secondary" id="upload-photo" >
		  <input type="hidden" name="profile_image" id="profile-picture" value="'.$profile.'"/>
		 
	';
}

function sunlight_sidebar_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" />
		  <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />
	';
}
function sunlight_sidebar_description(){
	$descriptoin=esc_attr( get_option( 'user_description' ) );
	echo '<textarea rows="3" cols="50" name="user_description" placeholder="Write about you" >'.$descriptoin.'</textarea>
	<p>Write something about You :)</p>';
}

function sunlight_sidebar_twitter(){
	$twitter_link=esc_attr( get_option( 'twitter' ) );
	echo '<input type="text" value="'.$twitter_link.'" name="twitter" placeholder="Twitter profile link">
	<p>Input the Twtter name without @ Charecter</p>';
}
function sunlight_sidebar_facebook(){
	$facebook_pro= esc_attr(get_option( 'facebook' ));
	echo '<input type="text" name="facebook" value="'.$facebook_pro.'" placeholder="Facebook profile link">';
}

function sunlight_sidebar_goolge_plus(){
	$google=esc_attr( get_option( 'google_plus' ) );
	echo '<input type="text" name="google_plus" value="'.$google.'" placeholder="Goolge Plus link">';
}



//sanitize  settings - remove any charector from output

function sanitize_twitter($input){
	// all data will back in here from input from twitter register- setting function
	
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output ); // remove @ from string 
	return $output;


}








/*Menu & Submenu Callback Functions  */


// General Callback function

function sunlight_theme_create_page() {
	require_once( get_template_directory() . '/inc/template/sunlight-admin.php' );
}

// Theme Support Callback function
function my_theme_support(){
	require_once( get_template_directory(). '/inc/template/my-theme-support.php');

}

// Css Callback function

function sunlight_theme_settings_page() {
	
	echo '<h1>sunlight Custom CSS</h1>';
	
}