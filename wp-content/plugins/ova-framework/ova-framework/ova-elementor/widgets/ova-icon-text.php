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

class ova_icon_text extends Widget_Base {

	public function get_name() {
		return 'ova_icon_text';
	}

	public function get_title() {
		return __( 'Ova Icon Text', 'ova-framework' );
	}

	public function get_icon() {
		return 'fas fa-graduation-cap';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	public function get_script_depends() {
		return [ 'script-elementor' ];
	}

	protected function _register_controls() {

	//begin section content
		//content
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'ova-framework' ),
			]
		);

			$this->add_control(
				'version',
				[
					'label' 	=> __( 'Version', 'ova-framework' ),
					'type' 		=> Controls_Manager::SELECT,
					'default' 	=> 'version_1',
					'options' 	=> [
						'version_1' => esc_html__( 'Version 1', 'ova-framework' ),
						'version_2' => esc_html__( 'Version 2', 'ova-framework' ),
					]
				]
			);

			$this->add_control(
				'text',
				[
					'label' 	=> __( 'Text', 'ova-framework' ),
					'type' 		=> \Elementor\Controls_Manager::TEXT,
					'default'	=> 'Give Education to Kids',
					'condition' => [
						'version' => ['version_1'],
					],
				]
			);

			$this->add_control(
				'text_v2',
				[
					'label' 	=> __( 'Text', 'ova-framework' ),
					'type' 		=> \Elementor\Controls_Manager::TEXTAREA,
					'row'		=> 2,
					'default'	=> 'The Largest Global<br/>Non-Profit & Crowdfunding<br/>Community',
					'condition' => [
						'version' => ['version_2'],
					],
				]
			);

			$this->add_control(
				'class_icon',
				[
					'label' 	=> __( 'Class Icon', 'ova-framework' ),
					'type' 		=> \Elementor\Controls_Manager::TEXT,
					'default' 	=> 'icon-graduated',
				]
			);

		$this->end_controls_section();

		//style

		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Content', 'ova-framework' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'content_margin',
				[
					'label' 		=> __( 'Margin', 'ova-framework' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-icon-text' 	=> 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .ova-icon-text-v2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_align',
				[
					'label' 	=> __( 'Alignment', 'ova-framework' ),
					'type' 		=> \Elementor\Controls_Manager::CHOOSE,
					'options' 	=> [
						'0' => [
							'title' => __( 'Left', 'ova-framework' ),
							'icon' 	=> 'fa fa-align-left',
						],
						'0 auto' => [
							'title' => __( 'Center', 'ova-framework' ),
							'icon' 	=> 'fa fa-align-center',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-text' => 'margin: {{VALUE}};',
					],
					'condition' => [
						'version[value]' => ['version_1'],
					],

				]
			);

			$this->add_responsive_control(
				'content-width-v2',
				[
					'label' 		 => __( 'Max Width', 'ova-framework' ),
					'type' 			 => Controls_Manager::SLIDER,
					'default' 		 => [
						'unit' => 'px',
					],
					'tablet_default' => [
						'unit' => 'px',
					],
					'mobile_default' => [
						'unit' => 'px',
					],
					'size_units' 	 => [ 'px', '%', 'vw' ],
					'range' 		 => [
						'px' => [
							'min' => 1,
							'max' => 1000,
						],
						'%' => [
							'min' => 1,
							'max' => 100,
						],
						'vw' => [
							'min' => 1,
							'max' => 100,
						],
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-icon-text-v2' => 'max-width: {{SIZE}}{{UNIT}};',
					],
					'condition' 	=> [
						'version' => ['version_2'],
					],
				]
			);

		$this->end_controls_section();

		//text
		$this->start_controls_section(
			'section_text_style',
			[
				'label' => __( 'Text', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->start_controls_tabs( 'text_style' );

				$this->start_controls_tab(
		            'text_style_normal',
		            [
		                'label' => __( 'Normal', 'ova_framework' ),
		            ]
		        );
			
					$this->add_control(
						'text_color',
						[
							'label' 	=> __( 'Color', 'ova-framework' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-icon-text .text-box p' 		=> 'color : {{VALUE}};',
								'{{WRAPPER}} .ova-icon-text-v2 .text-box-v2 h3' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' 		=> 'text_typography_v1',
							'selector' 	=> '{{WRAPPER}} .ova-icon-text .text-box p',
							'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
								'version[value]' => ['version_1'],
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' 		=> 'text_typography_v2',
							'selector' 	=> '{{WRAPPER}} .ova-icon-text-v2 .text-box-v2 h3',
							'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
								'version[value]' => ['version_2'],
							],
						]
					);

					$this->add_responsive_control(
						'text_margin',
						[
							'label' 	 => __( 'Margin', 'ova-framework' ),
							'type' 		 => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors'  => [
								'{{WRAPPER}} .ova-icon-text .text-box p' 		=> 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .ova-icon-text-v2 .text-box-v2 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'text_padding',
						[
							'label' 	 => __( 'Padding', 'ova-framework' ),
							'type' 		 => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors'  => [
								'{{WRAPPER}} .ova-icon-text .text-box p' 		=> 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .ova-icon-text-v2 .text-box-v2 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'text_color_hover',
						[
							'label' 	=> __( 'Color', 'ova-framework' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-icon-text:hover .text-box p' 		  => 'color : {{VALUE}};',
								'{{WRAPPER}} .ova-icon-text-v2:hover .text-box-v2 h3' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' 		=> 'text_typography_hover_v1',
							'selector'  => '{{WRAPPER}} .ova-icon-text:hover .text-box p',
							'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
								'version[value]' => ['version_1'],
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' 		=> 'text_typography_hover_v2',
							'selector'  => '{{WRAPPER}} .ova-icon-text-v2:hover .text-box-v2 h3',
							'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
								'version[value]' => ['version_2'],
							],
						]
					);

					$this->add_responsive_control(
						'text_margin_hover',
						[
							'label' 	 => __( 'Margin', 'ova-framework' ),
							'type' 		 => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors'  => [
								'{{WRAPPER}} .ova-icon-text:hover .text-box p' 		  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .ova-icon-text-v2:hover .text-box-v2 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'text_padding_hover',
						[
							'label' 	 => __( 'Padding', 'ova-framework' ),
							'type' 		 => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors'  => [
								'{{WRAPPER}} .ova-icon-text:hover .text-box p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .ova-icon-text-v2:hover .text-box-v2 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'tab' 	=> Controls_Manager::TAB_STYLE,
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
						'icon_color',
						[
							'label' 	=> __( 'Color', 'ova-framework' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-icon-text .icon-box' 		 => 'color : {{VALUE}};',
								'{{WRAPPER}} .ova-icon-text-v2 .icon-box-v2' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' 		=> 'icon_typography_v1',
							'selector'  => '{{WRAPPER}} .ova-icon-text .icon-box',
							'scheme'	=> Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
								'version[value]' => ['version_1'],
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' 		=> 'icon_typography_v2',
							'selector'  => '{{WRAPPER}} .ova-icon-text-v2 .icon-box-v2',
							'scheme'	=> Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
								'version[value]' => ['version_2'],
							],
						]
					);

					$this->add_responsive_control(
						'icon_margin',
						[
							'label' 	 => __( 'Margin', 'ova-framework' ),
							'type' 		 => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors'  => [
								'{{WRAPPER}} .ova-icon-text .icon-box' 		 => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .ova-icon-text-v2 .icon-box-v2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'icon_padding',
						[
							'label' 	 => __( 'Padding', 'ova-framework' ),
							'type' 		 => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors'  => [
								'{{WRAPPER}} .ova-icon-text .icon-box' 		 => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .ova-icon-text-v2 .icon-box-v2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'icon_color_hover',
						[
							'label' 	=> __( 'Color', 'ova-framework' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-icon-text:hover .icon-box' 		=> 'color : {{VALUE}};',
								'{{WRAPPER}} .ova-icon-text-v2:hover .icon-box-v2'  => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' 		=> 'icon_typography_hover_v1',
							'selector'  => '{{WRAPPER}} .ova-icon-text:hover .icon-box',
							'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
								'version[value]' => ['version_1'],
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' 		=> 'icon_typography_hover_v2',
							'selector'  => '{{WRAPPER}} .ova-icon-text-v2:hover .icon-box-v2',
							'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
								'version[value]' => ['version_2'],
							],
						]
					);

					$this->add_responsive_control(
						'icon_margin_hover',
						[
							'label' 	 => __( 'Margin', 'ova-framework' ),
							'type' 		 => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors'  => [
								'{{WRAPPER}} .ova-icon-text:hover .icon-box' 		=> 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .ova-icon-text-v2:hover .icon-box-v2'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'icon_padding_hover',
						[
							'label' 	 => __( 'Padding', 'ova-framework' ),
							'type' 		 => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors'  => [
								'{{WRAPPER}} .ova-icon-text:hover .icon-box' 		=> 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .ova-icon-text-v2:hover .icon-box-v2'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$settings 	= $this->get_settings_for_display();
		$version 	= $settings['version'];

		//version 1
		$text 		= $settings['text'];
		$class_icon = $settings['class_icon'];
		
		//version 2
		$text_v2 	= $settings['text_v2'];

		?>

		<?php if ( 'version_1' === $version ): ?>
			<div class="ova-icon-text">
				<div class="text-box">
					<p class="thrid_font"><?php echo esc_html( $text ); ?></p>
				</div>
				<div class="icon-box">
					<span class="<?php echo esc_html( $class_icon ); ?>"></span>
				</div>
			</div>
		<?php else: ?>
			<div class="ova-icon-text-v2">
				<div class="text-box-v2">
					<h3 class="thrid_font"><?php echo $text_v2; ?></h3>
				</div>
				<div class="icon-box-v2">
					<span class="<?php echo esc_html( $class_icon ); ?>"></span>
				</div>
			</div>
		<?php
		endif;
	}
}