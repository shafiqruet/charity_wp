<?php

namespace ova_framework;

use ova_framework\widgets\ova_menu;
use ova_framework\widgets\ova_logo;
use ova_framework\widgets\ova_header;
use ova_framework\widgets\ova_heading;
use ova_framework\widgets\ova_testimonial;
use ova_framework\widgets\ova_testimonial_image;

use ova_framework\widgets\ova_give_donations;
use ova_framework\widgets\ova_give_donation;
use ova_framework\widgets\ova_give_slide;
use ova_framework\widgets\ova_give_slide2;
use ova_framework\widgets\ova_progress_bar;

use ova_framework\widgets\ova_icon;
use ova_framework\widgets\ova_icon_box;
use ova_framework\widgets\ova_icon_text;
use ova_framework\widgets\ova_list_icon;
use ova_framework\widgets\ova_accordion;
use ova_framework\widgets\ova_list_icon_transform;

use ova_framework\widgets\ova_blog;
use ova_framework\widgets\ova_blog_slide;

use ova_framework\widgets\ova_image_icon;
use ova_framework\widgets\ova_image_text;

use ova_framework\widgets\ova_counter_up;
use ova_framework\widgets\ova_avatar;
use ova_framework\widgets\ova_button;

use ova_framework\widgets\ova_contact;

use ova_framework\widgets\ova_social;
use ova_framework\widgets\ova_menu_page;
use ova_framework\widgets\ova_contact_info;
use ova_framework\widgets\ova_search_popup;





if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly




/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class Ova_Register_Elementor {

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

		// Register Header Footer Category in Pane
	    add_action( 'elementor/elements/categories_registered', array( $this, 'add_hf_category' ) );

	     // Register Ovatheme Category in Pane
	    add_action( 'elementor/elements/categories_registered', array( $this, 'add_ovatheme_category' ) );
	    
		
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
		

	}

	
	public  function add_hf_category(  ) {
	    \Elementor\Plugin::instance()->elements_manager->add_category(
	        'hf',
	        [
	            'title' => __( 'Header Footer', 'ova-framework' ),
	            'icon' => 'fa fa-plug',
	        ]
	    );

	}

	
	public function add_ovatheme_category(  ) {

	    \Elementor\Plugin::instance()->elements_manager->add_category(
	        'ovatheme',
	        [
	            'title' => __( 'Ovatheme', 'ova-framework' ),
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
		
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-menu.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-logo.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-header.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-heading.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-testimonial.php';

		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_give_donations.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_give_donation.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_give_slide.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_give_slide2.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_progress_bar.php';
		

		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-icon.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-icon-box.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-icon-text.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-list-icon.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-list-icon-transform.php';

		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-accordion.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-testimonial-image.php';

		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-image-icon.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-image-text.php';
		
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_blog.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_blog_slide.php';

		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-counter-up.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-avatar.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-button.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova-contact.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_social.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_menu_page.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_contact_info.php';
		require OVA_PLUGIN_PATH . 'ova-elementor/widgets/ova_search_popup.php';
	}

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_menu() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_logo() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_header() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_heading() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_testimonial() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_testimonial_image() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_give_donations() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_give_donation() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_give_slide() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_give_slide2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_progress_bar() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_icon() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_icon_box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_icon_text() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_list_icon() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_list_icon_transform() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_accordion() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_image_icon() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_image_text() );
		

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_blog() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_blog_slide() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_counter_up() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_avatar() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_contact() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_social() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_menu_page() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_contact_info() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ova_search_popup() );

	}
	    
	

}

new Ova_Register_Elementor();





