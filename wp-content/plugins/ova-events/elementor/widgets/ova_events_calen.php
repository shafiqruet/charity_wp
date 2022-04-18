<?php
namespace ova_ovaev_elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class ova_events_calen extends Widget_Base {


	public function get_name() {		
		return 'ova_events_calen';
	}

	public function get_title() {
		return __( 'Calendar', 'ovaev' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}
	public function get_script_depends() {
		wp_enqueue_script( 'clndr', OVAEV_PLUGIN_URI.'assets/libs/calendar/clndr.min.js',  array('jquery'), true, false );
		
		return [ 'script-elementor' ];
	}
	protected function _register_controls() {

		$args = array(
           'taxonomy' => 'event_type',
           'orderby' => 'name',
           'order'   => 'ASC'
       	);
	
		$categories = get_categories($args);
		$catAll = array( 'all' => 'All categories');
		$cate_array = array();
		if ($categories) {
			foreach ( $categories as $cate ) {
				$cate_array[$cate->cat_name] = $cate->slug;
			}
		} else {
			$cate_array["No content Category found"] = 0;
		}

	   
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'ovaev' ),
			]
		);

		$this->add_control(
				'category',
				[
					'label'   => __( 'Category', 'ovaev' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'all',
					'options' => array_merge( $catAll, $cate_array )
				]
			);

		$this->add_control(
				'title',
				[
					'label'       => __( 'Heading', 'ovaev' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => esc_html__( 'Public Meeting', 'ovaev' ),
				]
			);

			$this->add_control(
				'show_title',
				[
					'label'        => __( 'Show Heading', 'ovaev' ),
					'type'         => Controls_Manager::SWITCHER,
					'return_value' => 'yes',
					'default'      => 'yes',
					'separator'    => 'before',
				]
			);

			
		$this->end_controls_section();

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Style', 'ovaev' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
			'heading_color',
			[
				'label' => __( ' Heading Color', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title_event_calen' => 'color: {{VALUE}} !important',
				],
			]
		);
			$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .title_event_calen',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);
				$this->add_control(
			'back_heading_color',
			[
				'label' => __( ' Background Heading Color', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title_event_calen' => 'background-color: {{VALUE}}',
				],
			]
		);




		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings();

		$template = apply_filters( 'el_elementor_ova_event', 'elementor/ovaev_events_calen.php' );

		ob_start();
		ovaev_get_template( $template, $settings );
		echo ob_get_clean();

	}
}
