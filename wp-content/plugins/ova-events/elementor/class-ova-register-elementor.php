<?php

namespace ova_ovaev_elementor;

use ova_ovaev_elementor\widgets\ova_events_cat;
use ova_ovaev_elementor\widgets\ova_events_slide;
use ova_ovaev_elementor\widgets\ova_events_up;
use ova_ovaev_elementor\widgets\ova_events_list;
use ova_ovaev_elementor\widgets\ova_events_list2;
use ova_ovaev_elementor\widgets\ova_events_list_asting;
use ova_ovaev_elementor\widgets\ova_events_pro;
use ova_ovaev_elementor\widgets\ova_events_grid;
use ova_ovaev_elementor\widgets\ova_events_grid2;
use ova_ovaev_elementor\widgets\ova_events_calen;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly




/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class Ova_Event_Register_Elementor {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {

     	// Register Ovatheme Category in Pane
	    add_action( 'elementor/elements/categories_registered', array( $this, 'add_ovatheme_category' ) );
	    
		
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
		

	}
	
	public function add_ovatheme_category(  ) {

	    \Elementor\Plugin::instance()->elements_manager->add_category(
	        'ovatheme',
	        [
	            'title' => __( 'Ovatheme', 'ovaev' ),
	            'icon' => 'fa fa-plug',
	        ]
	    );

	}


	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		
		require OVAEV_PLUGIN_PATH . 'elementor/widgets/ovaev-events-cat.php';
		require OVAEV_PLUGIN_PATH . 'elementor/widgets/ova_events_slide.php';
		require OVAEV_PLUGIN_PATH . 'elementor/widgets/ova_events_up.php';
		require OVAEV_PLUGIN_PATH . 'elementor/widgets/ova_events_pro.php';
		require OVAEV_PLUGIN_PATH . 'elementor/widgets/ova_events_grid.php';
		require OVAEV_PLUGIN_PATH . 'elementor/widgets/ova_events_grid2.php';
		require OVAEV_PLUGIN_PATH . 'elementor/widgets/ova_events_list.php';
		require OVAEV_PLUGIN_PATH . 'elementor/widgets/ova_events_list2.php';
		require OVAEV_PLUGIN_PATH . 'elementor/widgets/ova_events_list_asting.php';
		require OVAEV_PLUGIN_PATH . 'elementor/widgets/ova_events_calen.php';
	}

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_events_cat() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_events_slide() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_events_up() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_events_pro() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_events_grid() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_events_grid2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_events_list() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_events_list2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_events_list_asting() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_events_calen() );

	}
	    
	

}

new Ova_Event_Register_Elementor();





