<?php
/*
Plugin Name: Ovatheme Events
Plugin URI: https://themeforest.net/user/ovatheme
Description: Ovatheme Events
Author: Ovatheme
Version: 1.0.0
Author URI: https://themeforest.net/user/ovatheme/portfolio
Text Domain: ovaev
Domain Path: /languages/
*/

if ( !defined( 'ABSPATH' ) ) exit();



if (!class_exists('OVAEV')) {
	
	class OVAEV{

		static $_instance = null;

		function __construct()
		{
			$this -> define_constants();
			$this -> includes();
			$this -> supports();
			
		}

		function define_constants(){

			$this->define( 'OVAEV_PLUGIN_FILE', __FILE__ );
			$this->define( 'OVAEV_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
			$this->define( 'OVAEV_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
			load_plugin_textdomain( 'ovaev', false, basename( dirname( __FILE__ ) ) .'/languages' );

		}

		function define( $name, $value ) {
			if ( ! defined( $name ) ) {
				define( $name, $value );
			}
		}

		public static function instance() {
			if ( !empty( self::$_instance ) ) {
				return self::$_instance;
			}
			return self::$_instance = new self();
		}

		function includes() {

			// inc
			require_once( OVAEV_PLUGIN_PATH.'inc/class-ovaev-assets.php' );

			require_once( OVAEV_PLUGIN_PATH.'inc/class-ovaev-custom-post-type.php' );

			require_once( OVAEV_PLUGIN_PATH.'inc/class-ovaev-get-data.php' );

			require_once( OVAEV_PLUGIN_PATH.'inc/class-ovaev-settings.php' );

			require_once( OVAEV_PLUGIN_PATH.'inc/class-ovaev-templates-loaders.php' );

			require_once( OVAEV_PLUGIN_PATH.'inc/ovaev-core-functions.php' );

			require_once( OVAEV_PLUGIN_PATH.'inc/ovaev-hooks.php' );

			require_once( OVAEV_PLUGIN_PATH.'inc/ovapo-data-ajax.php' );


			// admin
			require_once( OVAEV_PLUGIN_PATH.'admin/class-ovaev-metaboxes.php' );

			require_once( OVAEV_PLUGIN_PATH.'admin/ovaev-widget.php' );

			if( is_admin() ){
				require_once( OVAEV_PLUGIN_PATH.'admin/class-ovaev-admin.php' );
			}
			
		}

		function supports() {

			/* Make Elementors */
			if ( did_action( 'elementor/loaded' ) ) {
				include OVAEV_PLUGIN_PATH.'elementor/class-ova-register-elementor.php';
			}

		}

		

	}
}

function OVAEV() {
	return OVAEV::instance();
}

$GLOBALS['OVAEV'] = OVAEV();