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

class ova_avatar extends Widget_Base {

	public function get_name() {
		return 'ova_avatar';
	}

	public function get_title() {
		return __( 'Ova Avatar', 'ova-framework' );
	}

	public function get_icon() {
		return 'fas fa-user-tie';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	public function get_script_depends() {
		return [ 'script-elementor' ];
	}

	protected function _register_controls() {

	//begin section content
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'ova-framework' ),
			]
		);

			$this->add_control(
				'avatar',
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

			$this->add_control(
				'image_link',
				[
					'label' => __( 'Link Image', 'ova-framework' ),
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
				'name',
				[
					'label' => __( 'Name', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => 'Jessica Brown',
				]
			);

			$this->add_control(
				'name_link',
				[
					'label' => __( 'Link Title', 'ova-framework' ),
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
				'job',
				[
					'label' => __( 'Job', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'City Council President', 'ova-framework' ),
				]
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'class_icon',
				[
					'label' => __( 'Class Icon', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
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
				'tabs_icon',
				[
					'label'   => 'Item Icon',
					'type'    => Controls_Manager::REPEATER,
					'fields'  => $repeater->get_controls(),
					'default' => [
						[
							'class_icon' => __('fab fa-twitter', 'ova-framework'),
							'link' => __('#', 'ova-framework'),
						],
						[
							'class_icon' => __('fab fa-facebook-square', 'ova-framework'),
							'link' => __('#', 'ova-framework'),
						],
						[
							'class_icon' => __('fab fa-linkedin-in', 'ova-framework'),
							'link' => __('#', 'ova-framework'),
						],
						[
							'class_icon' => __('fa fa-instagram', 'ova-framework'),
							'link' => __('#', 'ova-framework'),
						],
					],
				]
			);

			$this->add_control(
				'email',
				[
					'label' => __( 'Email', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'needhelp@company.com', 'ova-framework' ),
				]
			);

			$this->add_control(
				'phone',
				[
					'label' => __( 'Phone', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( '666 888 0000', 'ova-framework' ),
				]
			);
			
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
				'content-bg',
				[
					'label' => __( 'Background', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-avatar .avatar-content' => 'background-color : {{VALUE}};',
					],
				]
			);

	        $this->add_responsive_control(
				'content_padding',
				[
					'label' => __( 'Padding', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-avatar .avatar-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


		$this->end_controls_section();


		//name
		$this->start_controls_section(
			'section_name_style',
			[
				'label' => __( 'Name', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->start_controls_tabs( 'name_style' );

		        $this->start_controls_tab(
		            'name_style_normal',
		            [
		                'label' => __( 'Normal', 'ova_framework' ),
		            ]
		        );
			
					$this->add_control(
						'name-color',
						[
							'label' => __( 'Color', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-name a' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'name_typography',
							'selector' => '{{WRAPPER}} .ova-avatar .avatar-content .avatar-name a',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						]
					);

					$this->add_responsive_control(
						'name_margin',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'name_padding',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'name_align',
						[
							'label' => __( 'Alignment', 'ova-framework' ),
							'type' => \Elementor\Controls_Manager::CHOOSE,
							'options' => [
								'left' => [
									'title' => __( 'Left', 'ova-framework' ),
									'icon' => 'fa fa-align-left',
								],
								'center' => [
									'title' => __( 'Center', 'ova-framework' ),
									'icon' => 'fa fa-align-center',
								],
								'right' => [
									'title' => __( 'Right', 'ova-framework' ),
									'icon' => 'fa fa-align-right',
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-name' => 'text-align: {{VALUE}};',
							],
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
		            'name_style_hover',
		            [
		                'label' => __( 'Hover', 'ova_framework' ),
		            ]
		        );

		        $this->add_control(
						'name-color-hover',
						[
							'label' => __( 'Color', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-avatar:hover .avatar-content .avatar-name a' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'name_typography_hover',
							'selector' => '{{WRAPPER}} .ova-avatar:hover .avatar-content .avatar-name a',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						]
					);

					$this->add_responsive_control(
						'name_margin_hover',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar:hover .avatar-content .avatar-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'name_padding_hover',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar:hover .avatar-content .avatar-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'name_align_hover',
						[
							'label' => __( 'Alignment', 'ova-framework' ),
							'type' => \Elementor\Controls_Manager::CHOOSE,
							'options' => [
								'left' => [
									'title' => __( 'Left', 'ova-framework' ),
									'icon' => 'fa fa-align-left',
								],
								'center' => [
									'title' => __( 'Center', 'ova-framework' ),
									'icon' => 'fa fa-align-center',
								],
								'right' => [
									'title' => __( 'Right', 'ova-framework' ),
									'icon' => 'fa fa-align-right',
								],
							],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar:hover .avatar-content .avatar-name' => 'text-align: {{VALUE}};',
							],
						]
					);


		        $this->end_controls_tab();

		    $this->end_controls_tabs();

		$this->end_controls_section();

		//job
		$this->start_controls_section(
			'section_job_style',
			[
				'label' => __( 'Job', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			
			$this->start_controls_tabs( 'job_style' );

		        $this->start_controls_tab(
		            'job_style_normal',
		            [
		                'label' => __( 'Normal', 'ova_framework' ),
		            ]
		        );
			
					$this->add_control(
						'job_color',
						[
							'label' => __( 'Color', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-job p' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'job_typography',
							'selector' => '{{WRAPPER}} .ova-avatar .avatar-content .avatar-job p',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						]
					);

					$this->add_responsive_control(
						'job_margin',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-job p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'job_padding',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-job p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
		            'job_style_hover',
		            [
		                'label' => __( 'Hover', 'ova_framework' ),
		            ]
		        );

		        	$this->add_control(
						'job_color_hover',
						[
							'label' => __( 'Color', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-avatar:hover .avatar-content .avatar-job p' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'job_typography_hover',
							'selector' => '{{WRAPPER}} .ova-avatar:hover .avatar-content .avatar-job p',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						]
					);

					$this->add_responsive_control(
						'job_margin_hover',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar:hover .avatar-content .avatar-job p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'job_padding_hover',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar:hover .avatar-content .avatar-job p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

		        $this->end_controls_tab();

		    $this->end_controls_tabs();

		$this->end_controls_section();

		//icon
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => __( 'Icon', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			
			$this->start_controls_tabs( 'icon_style' );

		        $this->start_controls_tab(
		            'icon_style_normal',
		            [
		                'label' => __( 'Normal', 'ova_framework' ),
		            ]
		        );
			
					$this->add_control(
						'icon-color',
						[
							'label' => __( 'Color', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-social ul li a' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'icon_typography',
							'selector' => '{{WRAPPER}} .ova-avatar .avatar-content .avatar-social ul li a',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						]
					);

					$this->add_responsive_control(
						'icon_margin',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-social ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'icon_padding',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-social ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
		            'icon_style_hover',
		            [
		                'label' => __( 'Hover', 'ova_framework' ),
		            ]
		        );

		        	$this->add_control(
						'icon-color-hover',
						[
							'label' => __( 'Color', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-social ul li a:hover' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'icon_typography_hover',
							'selector' => '{{WRAPPER}} .ova-avatar .avatar-content .avatar-social ul li a:hover',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						]
					);

					$this->add_responsive_control(
						'icon_margin_hover',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-social ul li a:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'icon_padding_hover',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-social ul li a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

		        $this->end_controls_tab();

		    $this->end_controls_tabs();

		$this->end_controls_section();

		//email
		$this->start_controls_section(
			'section_email_style',
			[
				'label' => __( 'Email', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			
			$this->start_controls_tabs( 'email_style' );

		        $this->start_controls_tab(
		            'email_style_normal',
		            [
		                'label' => __( 'Normal', 'ova_framework' ),
		            ]
		        );
			
					$this->add_control(
						'email_color',
						[
							'label' => __( 'Color', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-email a' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'email_typography',
							'selector' => '{{WRAPPER}} .ova-avatar .avatar-content .avatar-email a',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						]
					);

					$this->add_responsive_control(
						'email_margin',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-email a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'email_padding',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-email a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
		            'email_style_hover',
		            [
		                'label' => __( 'Hover', 'ova_framework' ),
		            ]
		        );

		        	$this->add_control(
						'email_color_hover',
						[
							'label' => __( 'Color', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-email a:hover' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'email_typography_hover',
							'selector' => '{{WRAPPER}} .ova-avatar .avatar-content .avatar-email a:hover',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						]
					);

					$this->add_responsive_control(
						'email_margin_hover',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-email a:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'email_padding_hover',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-email a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

		        $this->end_controls_tab();

		    $this->end_controls_tabs();

		$this->end_controls_section();

		//phone
		$this->start_controls_section(
			'section_phone_style',
			[
				'label' => __( 'Phone', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			
			$this->start_controls_tabs( 'phone_style' );

		        $this->start_controls_tab(
		            'phone_style_normal',
		            [
		                'label' => __( 'Normal', 'ova_framework' ),
		            ]
		        );
			
					$this->add_control(
						'phone_color',
						[
							'label' => __( 'Color', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-phone a' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'phone_typography',
							'selector' => '{{WRAPPER}} .ova-avatar .avatar-content .avatar-phone a',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						]
					);

					$this->add_responsive_control(
						'phone_margin',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-phone a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'phone_padding',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-phone a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
		            'phone_style_hover',
		            [
		                'label' => __( 'Hover', 'ova_framework' ),
		            ]
		        );

		        	$this->add_control(
						'phone_color_hover',
						[
							'label' => __( 'Color', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-phone a:hover' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'phone_typography_hover',
							'selector' => '{{WRAPPER}} .ova-avatar .avatar-content .avatar-phone a:hover',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						]
					);

					$this->add_responsive_control(
						'phone_margin_hover',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-phone a:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'phone_padding_hover',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .ova-avatar .avatar-content .avatar-phone a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		$image_url = $settings['avatar']['url'];
		$name = $settings['name'];
		$name_link = $settings['name_link']['url'];
		$image_link = $settings['image_link']['url'];
		$job = $settings['job'];
		$tabs_icon = $settings['tabs_icon'];

		$email = $settings['email'];
		$phone = $settings['phone'];

		?>
		
		<div class="ova-avatar">
			<div class="avatar-img">
				<a href="<?php echo esc_html( $image_link ); ?>" target="_blank">
					<img src="<?php echo esc_html( $image_url ); ?>" alt="">
				</a>
			</div>
			<div class="avatar-content">
				<div class="avatar-social">
					<ul>
						<?php foreach ( $tabs_icon as $items ): ?>
							<li>
								<a href="<?php echo esc_html( $items['link']['url'] ); ?>">
									<i class="<?php echo esc_html( $items['class_icon'] ); ?>"></i>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="avatar-name">
					<a href="<?php echo esc_html( $name_link ); ?>"><?php echo esc_html( $name ); ?></a>
				</div>
				<div class="avatar-job">
					<p><?php echo esc_html( $job ); ?></p>
				</div>
				<div class="avatar-email">
					<i class="fa fa-envelope-o"></i>
					<a href="mailto:<?php echo esc_html( $email ); ?>"><?php echo esc_html( $email ); ?></a>
				</div>
				<div class="avatar-phone">
					<i class="fa fa-phone"></i>
					<a href="tel:<?php echo esc_html(preg_replace( '/[^0-9]/', '', $phone )); ?>"><?php echo esc_html( $phone ); ?></a>
				</div>
			</div>
		</div>

		<?php
	}
}