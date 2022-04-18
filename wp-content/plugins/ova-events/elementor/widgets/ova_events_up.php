<?php
namespace ova_ovaev_elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class ova_events_up extends Widget_Base {


	public function get_name() {		
		return 'ova_events_up';
	}

	public function get_title() {
		return __( 'Events Upcoming', 'ovaev' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
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
				'total_count',
				[
					'label'   => __( 'Post Total', 'ovaev' ),
					'type'    => Controls_Manager::NUMBER,
					'min'     => 1,
					'default' => 3
				]
			);

			$this->add_control(
				'time_event',
				[
					'label'   => __('Choose time', 'ovaev'),
					'type'    => Controls_Manager::SELECT,
					'options' => [
						''     => __('All','ovaev'),
						'current'  => __('Current','ovaev'),
						'upcoming' => __('Upcoming','ovaev'),
						'past'     => __('Past','ovaev'),
					],
					'default'   => '',
				]
			);

			$this->add_control(
				'order_by',
				[
					'label'   => __( 'Order By', 'ovaev' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'title',
					'options' => [
						'title'             => __( 'Title', 'ovaev' ),
						'event_custom_sort' => __( 'Custom Sort', 'ovaev' ),
						'ovaev_start_date_time'  => __( 'Start Date', 'ovaev' ),
						'ID'                => __( 'ID', 'ovaev' ),					
					],
				]
			);

			$this->add_control(
				'order',
				[
					'label'   => __( 'Order', 'ovaev' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'DESC',
					'options' => [
						'DESC' => __( 'Descending', 'ovaev' ),
						'ASC'  => __( 'Ascending', 'ovaev' ),
						
					],

				]
			);

			$this->add_control(
				'text_read_more',
				[
					'label'       => __( 'All Events Button', 'ovaev' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => esc_html__( 'See All Events', 'ovaev' ),
				]
			);

			$this->add_control(
				'show_read_more',
				[
					'label'        => __( 'Show All Events Button', 'ovaev' ),
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
			'day_color',
			[
				'label' => __( ' Background Day Color', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .ovaev-content.content-grid .date-event .date' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'event_type_color',
			[
				'label' => __( 'Hover Events Type Color', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
		
					'{{WRAPPER}} .ovaev-content.content-grid .desc .event_post .post_cat .event_type:hover' => 'color: {{VALUE}}',
					
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Hover Title Color', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
				
					'{{WRAPPER}} .ovaev-content.content-grid .desc .event_post .event_title a:hover' => 'color: {{VALUE}}',
					
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
				
					'{{WRAPPER}} .ovaev-content.content-grid .desc .event_post .time-event svg ' => 'color: {{VALUE}}',
					
				],
			]
		);

		$this->add_control(
			'readmore_color',
			[
				'label' => __( 'Hover More Detail Color', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}}  .ovaev-content.content-grid .desc .event_post .button_event .view_detail:hover' => 'background-color: {{VALUE}};border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'AllEvent_color',
			[
				'label' => __( 'Hover All Events Color', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}}  .ovaev-event-element.version_2 .title-readmore .read-more:hover' => 'color: {{VALUE}};border-color: {{VALUE}}',
				],
			]
		);

		

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings();

		$template = apply_filters( 'el_elementor_ova_event', 'elementor/ovaev_events_up.php' );

		ob_start();
		ovaev_get_template( $template, $settings );
		echo ob_get_clean();

	}
}
