<?php

namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_menu extends Widget_Base {

	public function get_name() {
		return 'ova_menu';
	}

	public function get_title() {
		return __( 'Menu', 'ova-framework' );
	}

	public function get_icon() {
		return 'fa fas fa-bars';
	}

	public function get_categories() {
		return [ 'hf' ];
	}

	public function get_script_depends() {
		return [ 'script-elementor' ];
	}

	/* Filter Walker for all menu */
	public function ova_prefix_modify_nav_menu_args( $args ) {
		return array_merge( $args, array(
		        'fallback_cb' => 'Ova_Walker_Menu::fallback',
		        'walker' 	=> new \Ova_Walker_Menu()
		    ) );
	}

	protected function _register_controls() {


		/* Global Section *******************************/
		/***********************************************/
		$this->start_controls_section(
			'section_menu_type',
			[
				'label' => __( 'Global', 'ova-framework' ),
			]
		);


			$menus = \wp_get_nav_menus();
			$list_menu = array();
			foreach ($menus as $menu) {
				$list_menu[$menu->slug] = $menu->name;
			}

			$this->add_control(
				'menu_slug',
				[
					'label' => __( 'Select Menu', 'ova-framework' ),
					'type' => Controls_Manager::SELECT,
					'options' => $list_menu,
					'default' => '',
					'prefix_class' => 'elementor-view-',
				]
			);


			$this->add_control(
				'menu_type',
				[
					'label' => __( 'Display Horizontal | Vertical', 'ova-framework' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'row' => [
							'title' => __( 'Horizontal', 'ova-framework' ),
							'icon' => 'fa fa-arrows-h',
						],
						'column' => [
							'title' => __( 'Vertical', 'ova-framework' ),
							'icon' => 'fa fa-arrows-v',
						]
					],
					'toggle' => 'true',
					'default'	=> 'row',
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu' => 'flex-direction: {{VALUE}};',
					]
				]
			);
			
		$this->end_controls_section();	


		/* Parent Menu Section *******************************/
		/***********************************************/
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Parent Menu', 'ova-framework' ),
			]
		);

			

			$this->add_responsive_control(
				'padding_menu',
				[
					'label' => __( 'Padding Menu', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_menu_item',
				[
					'label' => __( 'Padding Menu Items', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before'
				]
			);

			$this->add_control(
				'menu_alignment',
				[
					'label' => __( 'Alignment', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'flex-start' => [
							'title' => __( 'Left', 'ova-framework' ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'ova-framework' ),
							'icon' => 'fa fa-align-center',
						],
						'flex-end' => [
							'title' => __( 'Right', 'ova-framework' ),
							'icon' => 'fa fa-align-right',
						],
					],
					'default' => 'flex-end',
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu' => 'justify-content: {{VALUE}}; align-items: {{VALUE}}'
					]
					
				]
			);

			$this->add_control(
				'text_color',
				[
					'label' => __( 'Text Color', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu > li > a' => 'color: {{VALUE}};',
					],
					'scheme' => [
						'type' => \Elementor\Scheme_Color::get_type(),
						'value' => \Elementor\Scheme_Color::COLOR_3,
					],
					'separator' => 'before'
				]
			);

			$this->add_control(
				'text_color_hover',
				[
					'label' => __( 'Text Color Hover', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu > li > a:hover' => 'color: {{VALUE}};',
					]
					
				]
			);

			$this->add_control(
				'text_color_active',
				[
					'label' => __( 'Text Color Active', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu > li.active>a' => 'color: {{VALUE}};',
					]
					
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography',
					'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_3,
					'selector'	=> '{{WRAPPER}} .ova_nav ul.menu > li > a'
				]
			);

			

		$this->end_controls_section();


		/* Sub Menu Section *******************************/
		/***********************************************/
		$this->start_controls_section(
			'section_submenu_content',
			[
				'label' => __( 'Sub Menu', 'ova-framework' ),
			]
		);

			$this->add_control(
				'submenu_min_width',
				[
					'label' => __( 'Width', 'ova-framework' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'rem' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 1000,
							'step' => 1,
						],
						'rem' => [
							'min' => 1,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'rem',
						'size' => 13,
					],
					'selectors' => [
						'{{WRAPPER}} .ova_nav .dropdown-menu' => 'min-width: {{SIZE}}{{UNIT}};',
					],
				]
			);


			$this->add_control(
				'sub_menu_dir',
				[
					'label' => __( 'Menu Direction', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'sub_menu_dir_left' => [
							'title' => __( 'Left', 'ova-framework' ),
							'icon' => 'fa fa-align-right',
						],
						'sub_menu_dir_right' => [
							'title' => __( 'Right', 'ova-framework' ),
							'icon' => 'fa fa-align-left',
						],
					],
					'default' => 'sub_menu_dir_left'
				]
			);

			$this->add_responsive_control(
				'padding_sub_menu',
				[
					'label' => __( 'Padding Menu', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu .dropdown-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_sub_menu_item',
				[
					'label' => __( 'Padding Menu Item', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu .dropdown-menu li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'default' => [
						'top' => '5',
						'right' => '15',
						'bottom' => '5',
						'left' => '15',
						'isLinked' => true,
					]
				]
			);


			$this->add_control(
				'submenu_bg_color',
				[
					'label' => __( 'Background Color', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu .dropdown-menu' => 'background-color: {{VALUE}};',
					],
					'separator' => 'before'
					
				]
			);

			$this->add_control(
				'submenu_text_color',
				[
					'label' => __( 'Text Color', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu .dropdown-menu li > a' => 'color: {{VALUE}};',
					]
					
				]
			);

			$this->add_control(
				'submenu_text_color_hover',
				[
					'label' => __( 'Text Color Hover', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu .dropdown-menu li > a:hover' => 'color: {{VALUE}};',
					]
					
				]
			);

			$this->add_control(
				'submenu_text_color_active',
				[
					'label' => __( 'Text Color Active', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu .dropdown-menu li.active > a' => 'color: {{VALUE}};',
					]
					
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'submenu_typography',
					'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_3,
					'selector'	=> '{{WRAPPER}} .ova_nav ul.menu .dropdown-menu li a',

				]
			);


			$this->add_control(
				'border_submenu',
				[
					'label' => __( 'Border Menu', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);


				$this->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'submenu_border',
						'placeholder' => '1px',
						'default' => '1px',
						'selector' => '{{WRAPPER}} .ova_nav ul.menu .dropdown-menu',
						
					]
				);

				$this->add_control(
					'border_radius',
					[
						'label' => __( 'Border Radius', 'ova-framework' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors' => [
							'{{WRAPPER}} .ova_nav ul.menu .dropdown-menu' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						
					]
				);

			$this->add_control(
				'border_submenu_item',
				[
					'label' => __( 'Border Menu Item', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

				$this->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'submenu_border_item',
						'placeholder' => '1px',
						'default' => '1px',
						'selector' => '{{WRAPPER}} .ova_nav ul.menu .dropdown-menu li',
						
					]
				);

			$this->add_control(
				'label_submenu_latest_item',
				[
					'label' => __( 'Border Menu Latest Item', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);	

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'submenu_border_latest_item',
					'label' => __( 'Border Sub-Menu Latest Item', 'ova-framework' ),
					'placeholder' => '0px',
					'default' => '0px',
					'selector' => '{{WRAPPER}} .ova_nav ul.menu .dropdown-menu li:last-child',
					
				]
			);
			

		$this->end_controls_section();


		/* IPad, Mobile Section *******************************/
		/***********************************************/
		$this->start_controls_section(
			'section_submenu_ipad_mobile',
			[
				'label' => __( 'Ipad | Mobile', 'ova-framework' ),
			]
		);


			
			$this->add_control(
				'canvas_dir',
				[
					'label' => __( 'Display Canvas', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'canvas_left' => [
							'title' => __( 'Left', 'ova-framework' ),
							'icon' => 'fa fa-align-left',
						],
						'canvas_right' => [
							'title' => __( 'Right', 'ova-framework' ),
							'icon' => 'fa fa-align-right',
						],
					],
					'default' => 'canvas_left'
				]
			);

			$this->add_control(
				'canvas_bg',
				[
					'label' => __( 'Background Color', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'canvas_bg_gray'  => __( 'Gray', 'ova-framework' ),
						'canvas_bg_white' => __( 'White', 'ova-framework' ),
						
					],
					'default' => 'canvas_bg_gray',
				]
			);

			$this->add_control(
				'ipad_mobile_openNav',
				[
					'label' => __( 'Menu Button', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);	

			$this->add_control(
				'openNavBtn_align',
				[
					'label' => __( 'Align Ipad', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'NavBtn_left' => [
							'title' => __( 'Left', 'ova-framework' ),
							'icon' => 'fa fa-align-left',
						],
						'NavBtn_center' => [
							'title' => __( 'Center', 'ova-framework' ),
							'icon' => 'fa fa-align-center',
						],
						'NavBtn_right' => [
							'title' => __( 'Right', 'ova-framework' ),
							'icon' => 'fa fa-align-right',
						],
						
					],
					'default' => 'NavBtn_left'
				]
			);

			$this->add_control(
				'openNavBtn_align_mobile',
				[
					'label' => __( 'Align Mobile', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'NavBtn_left_m' => [
							'title' => __( 'Left', 'ova-framework' ),
							'icon' => 'fa fa-align-left',
						],
						'NavBtn_center_m' => [
							'title' => __( 'Center', 'ova-framework' ),
							'icon' => 'fa fa-align-center',
						],
						'NavBtn_right_m' => [
							'title' => __( 'Right', 'ova-framework' ),
							'icon' => 'fa fa-align-right',
						],
						
					],
					'default' => 'NavBtn_left'
				]
			);

			$this->add_control(
				'openNavBtn_margin',
				[
					'label' => __( 'Margin', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova_openNav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'openNavBtn_padding',
				[
					'label' => __( 'Padding', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova_openNav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'openNavBtn_bg_color',
				[
					'label' => __( 'Background Color', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ova_openNav' => 'background-color: {{VALUE}};',
					]
					
				]
			);
			$this->add_control(
				'openNavBtn_color',
				[
					'label' => __( 'Color', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ova_openNav' => 'color: {{VALUE}};',
					]
					
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'openNavBtn_border',
					'placeholder' => '1px',
					'default' => '1px',
					'selector' => '{{WRAPPER}} .ova_openNav',
					
				]
			);

			$this->add_control(
				'openNavBtn_border',
				[
					'label' => __( 'Border Radius', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova_openNav' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					
				]
			);

			$this->add_control(
				'ipad_mobile_arrow_dropdown',
				[
					'label' => __( 'Allow Dropdown', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);	

			$this->add_control(
				'ipad_mobile_arrow_dropdown_padding',
				[
					'label' => __( 'Margin', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .dropdown button.dropdown-toggle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'ipad_mobile_show_border_item',
				[
					'label' => __( 'Show Border', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => __( 'Show', 'ova-framework' ),
					'label_off' => __( 'Hide', 'ova-framework' ),
					'return_value' => 'yes',
					'default' => '',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'ipad_mobile_width_border_item',
					'selector' => '{{WRAPPER}} .ova_nav li a',
					'condition' => [
						'ipad_mobile_show_border_item' => 'yes'
					]

				]
			);

			$this->add_responsive_control(
				'toggle_size',
				[
					'label' 	=> __( 'Toggle Size', 'ova-framework' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' => 'px',
					],
					'tablet_default' => [
						'unit' => 'px',
					],
					'mobile_default' => [
						'unit' => 'px',
					],
					'size_units' 	 => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova_openNav' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		//style
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Content', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
	            'arrow_carrot_down',
	            [
	                'label' 	=> __( 'Display', 'ova_framework' ),
	                'type'  	=> Controls_Manager::SELECT,
	                'options' 	=> [
	                    'none'  => __( 'None', 'ova_framework' ),
	                    'unset' => __( 'Unset', 'ova_framework' ),
	                ],
	                'default' 	=> 'none',
	                'selectors' => [
	                    '{{WRAPPER}} .ova_nav ul.menu li a i' => 'display: {{VALUE}};',
	                ],
	            ]
	        );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_parent_active_style',
			[
				'label' => __( 'Parent Menu Active', 'ova-framework' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' 		=> 'active_parent_typography',
					'scheme' 	=> \Elementor\Scheme_Typography::TYPOGRAPHY_3,
					'selector'	=> '{{WRAPPER}} .ova_nav ul.menu > li.active>a'
				]
			);

			$this->add_responsive_control(
				'parent_list_margin',
				[
					'label' => __( 'Margin', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'parent_list_padding',
				[
					'label' => __( 'Padding', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu > li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'parent_list_padding_link',
				[
					'label' => __( 'Padding Link', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu > li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'bg_underline',
				[
					'label' 	=> __( 'Background Underline', 'ova-framework' ),
					'type' 		=> Controls_Manager::COLOR,
					'default' 	=> '',
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu > li > a:before' => 'background-color: {{VALUE}};',
					]
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_sub_hover_style',
			[
				'label' => __( 'Sub Menu Hover', 'ova-framework' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'bg_color_sub',
				[
					'label' 	=> __( 'Background Hover', 'ova-framework' ),
					'type' 		=> Controls_Manager::COLOR,
					'default' 	=> '',
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu .dropdown-menu li:hover' => 'background-color: {{VALUE}};',
					]
				]
			);

			$this->add_control(
				'bg_color_sub_active',
				[
					'label' 	=> __( 'Background Active', 'ova-framework' ),
					'type' 		=> Controls_Manager::COLOR,
					'default' 	=> '',
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu .dropdown-menu li.active' => 'background-color: {{VALUE}};',
					]
					
				]
			);

			$this->add_control(
				'text_color_sub_hover',
				[
					'label' 	=> __( 'Text Color Hover', 'ova-framework' ),
					'type' 		=> Controls_Manager::COLOR,
					'default' 	=> '',
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu .dropdown-menu li:hover a' => 'color: {{VALUE}};',
					]
					
				]
			);

			$this->add_control(
				'text_color_sub_active',
				[
					'label' 	=> __( 'Text Color Active', 'ova-framework' ),
					'type' 		=> Controls_Manager::COLOR,
					'default' 	=> '',
					'selectors' => [
						'{{WRAPPER}} .ova_nav ul.menu .dropdown-menu li.active a' => 'color: {{VALUE}};',
					]
					
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' 		=> 'active_sub_typography',
					'scheme' 	=> \Elementor\Scheme_Typography::TYPOGRAPHY_3,
					'selector'	=> '{{WRAPPER}} .ova_nav ul.menu .dropdown-menu li.active a'
				]
			);

		$this->end_controls_section();



		
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {

		// Customize Menu Structures
		add_filter( 'wp_nav_menu_args', array( $this, 'ova_prefix_modify_nav_menu_args' ) );
		
		$settings = $this->get_settings();
		
		?>
		<div class="ova_menu_clasic">
			<div class="ova_wrap_nav <?php echo esc_attr( $settings['menu_type'] ).' '.esc_attr( $settings['openNavBtn_align'] ).' '.esc_attr( $settings['openNavBtn_align_mobile'] ); ?>">

					<button class="ova_openNav" type="button">
						<i class="fas fa-bars"></i>
					</button>

					<div class="ova_nav <?php echo esc_attr( $settings['canvas_dir'] ).' '.esc_attr( $settings['canvas_bg'] ); ?>">
						<a href="javascript:void(0)" class="ova_closeNav"><i class="fas fa-times"></i></a>
						<?php
						 	wp_nav_menu( array(
			                    'menu'              => $settings['menu_slug'],
			                    'depth'             => 3,
			                    'container'         => '',
			                    'container_class'   => '',
			                    'container_id'      => '',
			                    'menu_class'        => 'menu'.' '.$settings['sub_menu_dir']
			            	));
			            ?>
					</div>

				<div class="ova_closeCanvas ova_closeNav"></div>
			</div>
		</div>
	
		

	<?php }



	
}


