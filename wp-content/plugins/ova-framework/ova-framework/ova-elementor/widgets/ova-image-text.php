<?php
namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_image_text extends Widget_Base {

	public function get_name() {
		return 'ova_image_text';
	}

	public function get_title() {
		return __( 'Ova Image Text', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-image-box';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	public function get_script_depends() {
		wp_enqueue_script( 'waypoints', OVA_PLUGIN_URI.'assets/libs/waypoints/jquery.waypoints.min.js');
		wp_enqueue_script( 'counter-up', OVA_PLUGIN_URI.'assets/libs/counter-up/jquery.counterup.js');
		return [ 'script-elementor' ];
	}

	protected function _register_controls() {

	//begin section content
		//image
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'ova-framework' ),
			]
		);

			$this->add_control(
				'version',
				[
					'label' => __( 'Version', 'ova-framework' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'image_text_v1',
					'options' => [
						'image_text_v1' => esc_html__( 'Version 1', 'ova-framework' ),
						'image_text_v2' => esc_html__( 'Version 2', 'ova-framework' ),
						'image_text_v3' => esc_html__( 'Version 3', 'ova-framework' ),
					]
				]
			);

			//version 1
			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'image',
				[
                    'label' => __( 'Choose Image', 'ova_framework' ),
                    'type' => Controls_Manager::MEDIA,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
			);

			$repeater->add_control(
				'text',
				[
					'label' => __( 'Title', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Join Our<br/>Volunteers', 'ova-framework' ),
				]
			);

			$repeater->add_control(
				'link',
				[
					'label' => __( 'Link', 'ova-framework' ),
					'type' => Controls_Manager::URL,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'https://your-link.com', 'ova-framework' ),
					'default' => [
						'url' => '#',
					],
				]
			);

			$this->add_control(
				'tabs_image',
				[
					'label' => __( 'Tabs', 'ova-framework' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'image' => ['url' => Utils::get_placeholder_image_src()],
							'text' 	=>  __( 'Join Our<br/>Volunteers', 'ova-framework' ),
							'link' 	=> __('#', 'ova-framework'),
						],
						[
							'image' => ['url' => Utils::get_placeholder_image_src()],
							'text' =>  __( 'Join Our<br/>Volunteers', 'ova-framework' ),
							'link' 	=> __('#', 'ova-framework'),
						],
										
					],
					'condition' => [
						'version[value]' => ['image_text_v1']
					],
				]
			);

			//version 2

			$this->add_control(
				'image_v2',
				[
                    'label' => __( 'Choose Image', 'ova_framework' ),
                    'type' => Controls_Manager::MEDIA,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
						'version[value]' => ['image_text_v2']
					],
                ]
			);

			$this->add_control(
				'text_v2',
				[
					'label' => __( 'Title', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Join Our<br/>Volunteers', 'ova-framework' ),
					'condition' => [
						'version[value]' => ['image_text_v2']
					],
				]
			);

			$this->add_control(
				'number_v2',
				[
					'label' => __( 'Number', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'default' => __( 3880, 'ova-framework' ),
					'condition' => [
						'version[value]' => ['image_text_v2']
					],
				]
			);

			//version 3
			$this->start_controls_tabs( 'tabs_image_v3_style' );

		        $this->start_controls_tab(
		            'tab_image_v3_normal',
		            [
		                'label' => __( 'Normal', 'ova_framework' ),
		                'condition' => [
							'version[value]' => ['image_text_v3']
						],
		            ]
		        );

		        $this->add_control(
					'image_v3',
					[
	                    'label' => __( 'Choose Image', 'ova_framework' ),
	                    'type' => Controls_Manager::MEDIA,
	                    'dynamic' => [
	                        'active' => true,
	                    ],
	                    'default' => [
	                        'url' => Utils::get_placeholder_image_src(),
	                    ],
	                    'condition' => [
							'version[value]' => ['image_text_v3']
						],
	                ]
				);

				$this->add_control(
					'title_v3',
					[
						'label' => __( 'Title', 'ova-framework' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'More Charity', 'ova-framework' ),
						'condition' => [
							'version[value]' => ['image_text_v3']
						],
					]
				);

		        $this->end_controls_tab();


		        $this->start_controls_tab(
		            'tab_image_v3_hover',
		            [
		                'label' => __( 'Hover', 'ova_framework' ),
		                'condition' => [
							'version[value]' => ['image_text_v3']
						],
		            ]
		        );

		        	$this->add_control(
						'image_v3_hover',
						[
		                    'label' => __( 'Choose Image', 'ova_framework' ),
		                    'type' => Controls_Manager::MEDIA,
		                    'dynamic' => [
		                        'active' => true,
		                    ],
		                    'default' => [
		                        'url' => Utils::get_placeholder_image_src(),
		                    ],
		                    'condition' => [
								'version[value]' => ['image_text_v3']
							],
		                ]
					);

					$this->add_control(
						'class_icon_v3_hover',
						[
							'label' => __( 'Class Icon', 'ova-framework' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => __( 'icon-support', 'ova-framework' ),
							'condition' => [
								'version[value]' => ['image_text_v3']
							],
						]
					);

					$this->add_control(
						'title_v3_hover',
						[
							'label' => __( 'Title', 'ova-framework' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => __( 'More<br/>Charity', 'ova-framework' ),
							'condition' => [
								'version[value]' => ['image_text_v3']
							],
						]
					);

					$this->add_control(
						'title_link',
						[
							'label' => __( 'Link', 'ova-framework' ),
							'type' => Controls_Manager::URL,
							'dynamic' => [
								'active' => true,
							],
							'placeholder' => __( 'https://your-link.com', 'ova-framework' ),
							'default' => [
								'url' => '#',
							],
							'condition' => [
								'version[value]' => ['image_text_v3']
							],
						]
					);

					$this->add_control(
						'text_v3_hover',
						[
							'label' => __( 'Text', 'ova-framework' ),
							'type' => \Elementor\Controls_Manager::TEXTAREA,
							'row' => 2,
							'default' => __( 'Lorem ipsum dolor sit am adipi sicing elit, sed do consulting firms Et leggings.', 'ova-framework' ),
							'condition' => [
								'version[value]' => ['image_text_v3']
							],
						]
					);

		        $this->end_controls_tab();

	        $this->end_controls_tabs();
			
		$this->end_controls_section();
	//end section content

		
	//begin section content style
		//content
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Content', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			
			$this->add_control(
				'bg_color_content',
				[
					'label' => __( 'Background', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-image-text .list-image-text' => 'background-color: {{VALUE}};',
						'{{WRAPPER}} .ova-image-text_v2' => 'background-color: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();


		//image
		$this->start_controls_section(
			'section_image_style',
			[
				'label' => __( 'Image', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			
			
			$this->add_responsive_control(
				'image_width',
				[
					'label' => __( 'Max Width', 'ova-framework' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'unit' => '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'size_units' => [ '%', 'px', 'vw' ],
					'range' => [
						'%' => [
							'min' => 1,
							'max' => 100,
						],
						'px' => [
							'min' => 1,
							'max' => 1000,
						],
						'vw' => [
							'min' => 1,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-image-text .list-image-text img' => 'max-width: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-image-text_v2 img' => 'max-width: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-image-text_v3 .image-box-normal .img-box img' => 'max-width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'image_height',
				[
					'label' => __( 'Height', 'ova-framework' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'unit' => 'px',
					],
					'tablet_default' => [
						'unit' => 'px',
					],
					'mobile_default' => [
						'unit' => 'px',
					],
					'size_units' => [ 'px', 'vh' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 1000,
						],
						'vh' => [
							'min' => 1,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-image-text .list-image-text img' => 'height: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-image-text_v2 img' => 'height: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-image-text_v3 .image-box-normal .img-box img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 'tabs_image_style' );

		        $this->start_controls_tab(
		            'tab_image_normal',
		            [
		                'label' => __( 'Normal', 'ova_framework' ),
		            ]
		        );

		        	$this->add_control(
			            'image_radius',
			            [
			                'label' => __( 'Border Radius', 'ova_framework' ),
			                'type' => Controls_Manager::DIMENSIONS,
			                'size_units' => [ 'px' ],
			                'selectors' => [
			                    '{{WRAPPER}} .ova-image-text .list-image-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                    '{{WRAPPER}} .ova-image-text_v2 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                    '{{WRAPPER}} .ova-image-text_v3 .image-box-normal .img-box img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			            ]
			        );

			        $this->add_control(
			            'image_radius_first_child',
			            [
			                'label' => __( 'Border Radius First Child', 'ova_framework' ),
			                'type' => Controls_Manager::DIMENSIONS,
			                'size_units' => [ 'px' ],
			                'selectors' => [
			                    '{{WRAPPER}} .ova-image-text .list-image-text:first-child' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			                'condition' => [
			                	'version[value]' => ['image_text_v1']
			                ],
			            ]
			        );

			        $this->add_control(
			            'image_radius_last_child',
			            [
			                'label' => __( 'Border Radius Last Child', 'ova_framework' ),
			                'type' => Controls_Manager::DIMENSIONS,
			                'size_units' => [ 'px', ],
			                'selectors' => [
			                    '{{WRAPPER}} .ova-image-text .list-image-text:last-child' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			                'condition' => [
			                	'version[value]' => ['image_text_v1']
			                ],
			            ]
			        );

			        $this->add_control(
						'image_opacity',
						[
							'label' => __( 'Opacity', 'ova_framework' ),
							'type' => Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'max' => 1,
									'min' => 0.10,
									'step' => 0.01,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text .list-image-text img' => 'opacity: {{SIZE}};',
								'{{WRAPPER}} .ova-image-text_v2 img' => 'opacity: {{SIZE}};',
								'{{WRAPPER}} .ova-image-text_v3 .image-box-normal .img-box img' => 'opacity: {{SIZE}};',
							],
						]
					);

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_image_hover',
		            [
		                'label' => __( 'Hover', 'ova_framework' ),
		            ]
		        );

		        	$this->add_control(
			            'image_radius_hover',
			            [
			                'label' => __( 'Border Radius', 'ova_framework' ),
			                'type' => Controls_Manager::DIMENSIONS,
			                'size_units' => [ 'px', '%' ],
			                'selectors' => [
			                    '{{WRAPPER}} .ova-image-text .list-image-text:hover img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                    '{{WRAPPER}} .ova-image-text_v2:hover img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                    '{{WRAPPER}} .ova-image-text_v3:hover .image-box-hover .img-box-hover img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			            ]
			        );

			        $this->add_control(
						'image_opacity_hover',
						[
							'label' => __( 'Opacity', 'ova_framework' ),
							'type' => Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'max' => 1,
									'min' => 0.10,
									'step' => 0.01,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text .list-image-text:hover img' => 'opacity: {{SIZE}};',
								'{{WRAPPER}} .ova-image-text_v2:hover img' => 'opacity: {{SIZE}};',
								'{{WRAPPER}} .ova-image-text_v3:hover .image-box-hover .img-box-hover img' => 'opacity: {{SIZE}};',
							],
						]
					);

		        $this->end_controls_tab();

		    $this->end_controls_tabs();


		$this->end_controls_section();

		//title v3
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
                	'version[value]' => ['image_text_v3']
                ],
			]
		);
			
			$this->start_controls_tabs( 'tabs_title_style' );

		        $this->start_controls_tab(
		            'tab_title_normal',
		            [
		                'label' => __( 'Normal', 'ova_framework' ),
		            ]
		        );

					$this->add_control(
						'color_title',
						[
							'label' => __( 'Color ', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v3 .image-box-normal .content .title' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'title_v3_typography',
							'selector' => '{{WRAPPER}} .ova-image-text_v3 .image-box-normal .content .title',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
			                	'version[value]' => ['image_text_v3']
			                ],

						]
					);

					$this->add_responsive_control(
						'margin_title',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v3 .image-box-normal .content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'padding_title',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v3 .image-box-normal .content .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

				$this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_title_hover',
		            [
		                'label' => __( 'Hover', 'ova_framework' ),
		            ]
		        );

		        $this->add_control(
						'color_title_hover',
						[
							'label' => __( 'Color', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v3:hover .image-box-hover .img-box-hover .content-hover .title-hover' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'title_v3_typography_hover',
							'selector' => '{{WRAPPER}} .ova-image-text_v3:hover .image-box-hover .img-box-hover .content-hover .title-hover',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
								'version[value]' => ['image_text_v3']
							],
						]
					);

					$this->add_responsive_control(
						'margin_title_hover',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v3:hover .image-box-hover .img-box-hover .content-hover .title-hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'padding_title_hover',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v3:hover .image-box-hover .img-box-hover .content-hover .title-hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

		        $this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();

		//text
		$this->start_controls_section(
			'section_text_style',
			[
				'label' => __( 'Text', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			
			$this->start_controls_tabs( 'tabs_text_style' );

		        $this->start_controls_tab(
		            'tab_text_normal',
		            [
		                'label' => __( 'Normal', 'ova_framework' ),
		            ]
		        );

					$this->add_control(
						'color_text',
						[
							'label' => __( 'Color Text ', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-image-text .list-image-text .text-box .text' => 'color : {{VALUE}};',
								'{{WRAPPER}} .ova-image-text_v2 .content p' => 'color : {{VALUE}};',
								'{{WRAPPER}} .ova-image-text_v3 .image-box-hover .img-box-hover .content-hover .text' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'text_v1_typography',
							'selector' => '{{WRAPPER}} .ova-image-text .list-image-text .text-box .text',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
			                	'version[value]' => ['image_text_v1']
			                ],

						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'text_v2_typography',
							'selector' => '{{WRAPPER}} .ova-image-text_v2 .content p',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
			                	'version[value]' => ['image_text_v2']
			                ],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'text_v3_typography',
							'selector' => '{{WRAPPER}} .ova-image-text_v3 .image-box-hover .img-box-hover .content-hover .text',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
			                	'version[value]' => ['image_text_v3']
			                ],
						]
					);

					$this->add_responsive_control(
						'margin_text',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text .list-image-text .text-box .text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .ova-image-text_v2 .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .ova-image-text_v3 .image-box-hover .img-box-hover .content-hover .text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'padding_text',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text .list-image-text .text-box .text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .ova-image-text_v2 .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .ova-image-text_v3 .image-box-hover .img-box-hover .content-hover .text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

				$this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_text_hover',
		            [
		                'label' => __( 'Hover', 'ova_framework' ),
		            ]
		        );

		        $this->add_control(
						'color_text_hover',
						[
							'label' => __( 'Color Text ', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-image-text .list-image-text:hover .text-box .text' => 'color : {{VALUE}};',
								'{{WRAPPER}} .ova-image-text_v2:hover .content p' => 'color : {{VALUE}};',
								'{{WRAPPER}} .ova-image-text_v3 .image-box-hover .img-box-hover .content-hover .text:hover' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'text_v1_typography_hover',
							'selector' => '{{WRAPPER}} .ova-image-text .list-image-text:hover .text-box .text',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
								'version[value]' => ['image_text_v1']
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'text_v2_typography_hover',
							'selector' => '{{WRAPPER}} .ova-image-text_v2:hover content p',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
								'version[value]' => ['image_text_v2']
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'text_v3_typography_hover',
							'selector' => '{{WRAPPER}} .ova-image-text_v3 .image-box-hover .img-box-hover .content-hover .text:hover',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
								'version[value]' => ['image_text_v3']
							],
						]
					);

					$this->add_responsive_control(
						'margin_text_hover',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text .list-image-text:hover .text-box .text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .ova-image-text_v2:hover .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .ova-image-text_v3 .image-box-hover .img-box-hover .content-hover .text:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'padding_text_hover',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text .list-image-text:hover .text-box .text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .ova-image-text_v2:hover .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .ova-image-text_v3 .image-box-hover .img-box-hover .content-hover .text:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

		        $this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();


		//price
		$this->start_controls_section(
			'section_price_style',
			[
				'label' => __( 'Price', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'version[value]' => ['image_text_v2']
				],
			]
		);
			
			$this->start_controls_tabs( 'tabs_price_style' );

		        $this->start_controls_tab(
		            'tab_price_normal',
		            [
		                'label' => __( 'Normal', 'ova_framework' ),
		            ]
		        );

					$this->add_control(
						'color_price',
						[
							'label' => __( 'Color Price ', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v2 .content h3' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'price_typography',
							'selector' => '{{WRAPPER}} .ova-image-text_v2 .content h3',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						]
					);

					$this->add_responsive_control(
						'margin_price',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v2 .content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'padding_price',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v2 .content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

				$this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_price_hover',
		            [
		                'label' => __( 'Hover', 'ova_framework' ),
		            ]
		        );

		        $this->add_control(
						'color_price_hover',
						[
							'label' => __( 'Color ', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v2:hover .content h3' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'price_typography_hover',
							'selector' => '{{WRAPPER}} .ova-image-text_v2:hover .content h3',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						]
					);

					$this->add_responsive_control(
						'margin_price_hover',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v2:hover .content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'padding_price_hover',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v2:hover .content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

		        $this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();

		//Box
		$this->start_controls_section(
			'section_box_style',
			[
				'label' => __( 'Box', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'version[value]' => ['image_text_v2']
				],
			]
		);
			
			$this->start_controls_tabs( 'tabs_box_style' );

		        $this->start_controls_tab(
		            'tab_box_normal',
		            [
		                'label' => __( 'Normal', 'ova_framework' ),
		            ]
		        );

		        	$this->add_responsive_control(
						'box_top',
						[
							'label' => __( 'Top', 'ova-framework' ),
							'type' => Controls_Manager::SLIDER,
							'default' => [
								'unit' => 'px',
							],
							'tablet_default' => [
								'unit' => 'px',
							],
							'mobile_default' => [
								'unit' => 'px',
							],
							'size_units' => [ 'px', '%' ],
							'range' => [
								'px' => [
									'min' => 1,
									'max' => 1000,
								],
								'%' => [
									'min' => 1,
									'max' => 100,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v2 .content' => 'top: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'box_right',
						[
							'label' => __( 'Right', 'ova-framework' ),
							'type' => Controls_Manager::SLIDER,
							'default' => [
								'unit' => 'px',
							],
							'tablet_default' => [
								'unit' => 'px',
							],
							'mobile_default' => [
								'unit' => 'px',
							],
							'size_units' => [ 'px', '%' ],
							'range' => [
								'px' => [
									'min' => 1,
									'max' => 1000,
								],
								'%' => [
									'min' => 1,
									'max' => 100,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v2 .content' => 'right: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'box_bottom',
						[
							'label' => __( 'Bottom', 'ova-framework' ),
							'type' => Controls_Manager::SLIDER,
							'default' => [
								'unit' => 'px',
							],
							'tablet_default' => [
								'unit' => 'px',
							],
							'mobile_default' => [
								'unit' => 'px',
							],
							'size_units' => [ 'px', '%' ],
							'range' => [
								'px' => [
									'min' => 1,
									'max' => 1000,
								],
								'%' => [
									'min' => 1,
									'max' => 100,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v2 .content' => 'bottom: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'box_left',
						[
							'label' => __( 'Left', 'ova-framework' ),
							'type' => Controls_Manager::SLIDER,
							'default' => [
								'unit' => 'px',
							],
							'tablet_default' => [
								'unit' => 'px',
							],
							'mobile_default' => [
								'unit' => 'px',
							],
							'size_units' => [ 'px', '%' ],
							'range' => [
								'px' => [
									'min' => 1,
									'max' => 1000,
								],
								'%' => [
									'min' => 1,
									'max' => 100,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v2 .content' => 'left: {{SIZE}}{{UNIT}};',
							],
						]
					);

				$this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_box_hover',
		            [
		                'label' => __( 'Hover', 'ova_framework' ),
		            ]
		        );

		        	$this->add_responsive_control(
						'box_top_hover',
						[
							'label' => __( 'Top', 'ova-framework' ),
							'type' => Controls_Manager::SLIDER,
							'default' => [
								'unit' => 'px',
							],
							'tablet_default' => [
								'unit' => 'px',
							],
							'mobile_default' => [
								'unit' => 'px',
							],
							'size_units' => [ 'px', '%' ],
							'range' => [
								'px' => [
									'min' => 1,
									'max' => 1000,
								],
								'%' => [
									'min' => 1,
									'max' => 100,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v2:hover .content' => 'top: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'box_right_hover',
						[
							'label' => __( 'Right', 'ova-framework' ),
							'type' => Controls_Manager::SLIDER,
							'default' => [
								'unit' => 'px',
							],
							'tablet_default' => [
								'unit' => 'px',
							],
							'mobile_default' => [
								'unit' => 'px',
							],
							'size_units' => [ 'px', '%' ],
							'range' => [
								'px' => [
									'min' => 1,
									'max' => 1000,
								],
								'%' => [
									'min' => 1,
									'max' => 100,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v2:hover .content' => 'right: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'box_bottom_hover',
						[
							'label' => __( 'Bottom', 'ova-framework' ),
							'type' => Controls_Manager::SLIDER,
							'default' => [
								'unit' => 'px',
							],
							'tablet_default' => [
								'unit' => 'px',
							],
							'mobile_default' => [
								'unit' => 'px',
							],
							'size_units' => [ 'px', '%' ],
							'range' => [
								'px' => [
									'min' => 1,
									'max' => 1000,
								],
								'%' => [
									'min' => 1,
									'max' => 100,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v2:hover .content' => 'bottom: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'box_left_hover',
						[
							'label' => __( 'Left', 'ova-framework' ),
							'type' => Controls_Manager::SLIDER,
							'default' => [
								'unit' => 'px',
							],
							'tablet_default' => [
								'unit' => 'px',
							],
							'mobile_default' => [
								'unit' => 'px',
							],
							'size_units' => [ 'px', '%' ],
							'range' => [
								'px' => [
									'min' => 1,
									'max' => 1000,
								],
								'%' => [
									'min' => 1,
									'max' => 100,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-image-text_v2:hover .content' => 'left: {{SIZE}}{{UNIT}};',
							],
						]
					);

		        $this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();
	//end section content style
		
	}

	//render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$tabs_image = $settings['tabs_image'];
		$version = $settings['version'];

		//vesion 2
		$image_v2_url = $settings['image_v2']['url'];
		$text_v2 = $settings['text_v2'];
		$number_v2 = $settings['number_v2'];

		//version 3
		$image_v3_url = $settings['image_v3']['url'];
		$image_v3_url_hover = $settings['image_v3_hover']['url'];
		$class_icon_v3_hover = $settings['class_icon_v3_hover'];
		$title_v3 = $settings['title_v3'];
		$title_v3_hover = $settings['title_v3_hover'];
		$title_link = $settings['title_link']['url'];
		$text_v3_hover = $settings['text_v3_hover'];


		?>
		
		<?php if ( !empty( $tabs_image ) and 'image_text_v1' === $version ) : ?>
			<div class="ova-image-text">
			<?php foreach ($tabs_image as $items) : ?>
				<div class="list-image-text">
					<img src="<?php echo esc_html($items['image']['url']); ?>" alt="">
					<div class="text-box">
						<h3 class="text thrid_font">
							<?php if ( !empty($items['link']['url']) ): ?>
								<a href="<?php echo esc_html( $items['link']['url'] ); ?>" target="_blank"><?php echo $items['text']; ?></a>
							<?php else: ?>
								<?php echo $items['text']; ?>
							<?php endif; ?>
						</h3>
					</div>
				</div>
			<?php endforeach; ?>
			</div>

		<?php elseif ( 'image_text_v2' === $version ) : ?>
			<div class="ova-image-text_v2">
				<img src="<?php echo esc_html( $image_v2_url ); ?>" alt="">
				<div class="content">
					<h3><?php echo  esc_html( number_format($number_v2) ); ?></h3>
					<p class="thrid_font"><?php echo $text_v2; ?></p>
				</div>
			</div>

		<?php else: ?>
			<div class="ova-image-text_v3">
				<div class="image-box-normal">
					<div class="img-box">
						<img src="<?php echo esc_html( $image_v3_url); ?>" alt="">
					</div>
					<div class="content">
						<h3 class="title"><?php echo esc_html( $title_v3); ?></h3>
					</div>
				</div>
				<div class="image-box-hover">
					<div class="img-box-hover">
						<img src="<?php echo esc_html( $image_v3_url_hover); ?>" alt="">
						<div class="content-hover">
							<div class="icon"><span class="<?php echo esc_html( $class_icon_v3_hover); ?>"></span></div>
							<h3 class="title-hover"><a href="<?php echo esc_html( $title_link); ?>"><?php echo $title_v3_hover; ?></a></h3>
							<p class="text"><?php echo esc_html( $text_v3_hover) ; ?></p>
						</div>
					</div>
				</div>
			</div>

		<?php
		endif;
	}
}