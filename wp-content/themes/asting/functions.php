<?php
	if(defined('ASTING_URL') 	== false) 	define('ASTING_URL', get_template_directory());
	if(defined('ASTING_URI') 	== false) 	define('ASTING_URI', get_template_directory_uri());

	load_theme_textdomain( 'asting', ASTING_URL . '/languages' );
	
	// require libraries, function
	require( ASTING_URL.'/inc/init.php' );

	// Add js, css
	require( ASTING_URL.'/extend/add_js_css.php' );
	
	// require walker menu
	require_once (ASTING_URL.'/inc/ova_walker_nav_menu.php');


	require_once (ASTING_URL.'/inc/woo_init.php');
	

	// register menu, widget
	require( ASTING_URL.'/extend/register_menu_widget.php' );

	// require content
	require_once (ASTING_URL.'/content/define_blocks_content.php');
	
	// require breadcrumbs
	require( ASTING_URL.'/extend/breadcrumbs.php' );

	// Hooks
	require( ASTING_URL.'/inc/class_hook.php' );

	// Metahox
	require_once( ASTING_URL.'/metabox/init.php' );




	
	/* Customize */
	//  include plugin.php to use is_plugin_active()
	if( current_user_can('customize') ){
	    require_once ASTING_URL.'/customize/custom-control/google-font.php';
	    require_once ASTING_URL.'/customize/custom-control/heading.php';
	    require_once ASTING_URL.'/customize/class-customize.php';
	}
	
    require_once ASTING_URL.'/customize/render-style.php';
    
    
    
	
	// Require metabox
	if( is_admin() ){
		// Require TGM
		require_once ( ASTING_URL.'/install_resource/active_plugins.php' );		
	}