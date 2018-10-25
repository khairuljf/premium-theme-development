<?php

/*
	
@package sunlighttheme
	
	========================
		Load adminc sript
	========================
*/

function sunlight_load_admin_script( $hook ){
	//echo $hook;

	// for different admin page css

	if('toplevel_page_alecaddd_sunlight' !=$hook ){
		return ;
	}

	wp_register_style( 'sunlight_admin', get_template_directory_uri().'/css/admin.css',  array(), '1.0', $media = 'all' );

	wp_enqueue_style( 'sunlight_admin' );


	wp_enqueue_media();

	wp_register_script( 'admin_script', get_template_directory_uri().'/js/admin.js',array('jquery'), '1.0.0',  true );

	wp_enqueue_script( 'admin_script' );




}

add_action( 'admin_enqueue_scripts', 'sunlight_load_admin_script' );



