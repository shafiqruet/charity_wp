<?php

namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_contact extends Widget_Base {

	public function get_name() {
		return 'ova_contact';
	}

	public function get_title() {
		return __( 'Ova Contact', 'ova-framework' );
	}

	public function get_icon() {
		return 'fas fa-envelope';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	public function get_script_depends() {
		return [ 'script-elementor' ];
	}

	protected function _register_controls() {

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

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'class_icon_contact',
				[
					'label'   => __( 'Class Icon', 'ova-framework' ),
					'type' 	  => \Elementor\Controls_Manager::TEXT,
				]
			);

			$repeater->add_control(
				'text_icon_contact',
				[
					'label'   => __( 'Text', 'ova-framework' ),
					'type' 	  => \Elementor\Controls_Manager::TEXT,
				]
			);

			$repeater->add_control(
				'link_icon_contact',
				[
					'label' 	  => __( 'Link', 'ova-framework' ),
					'type' 		  => Controls_Manager::URL,
					'dynamic' 	  => [
						'active'  => true,
					],
					'placeholder' => __( 'https://your-link.com', 'ova-framework' ),
					'default' 	  => [
						'url' 	  => '#',
					],
				]
			);

			$this->add_control(
				'tabs_contact',
				[
					'label' 	=> __( 'Tabs Contact', 'ova-framework' ),
					'type' 		=> Controls_Manager::REPEATER,
					'fields' 	=> $repeater->get_controls(),
					'default' 	=> [
						[
							'class_icon_contact' => __( 'fas fa-phone-square-alt', 'ova-framework' ),
							'text_icon_contact'  => __( '92 666 888 0000', 'ova-framework' ),
							'link_icon_contact'  => [ 'url' => '#' ],
						],
						[
							'class_icon_contact' => __( 'fas fa-envelope', 'ova-framework' ),
							'text_icon_contact'  => __( 'needhelp@company.com', 'ova-framework' ),
							'link_icon_contact'  => [ 'url' => '#' ],
						],
										
					],
				]
			);

			$repeater_social = new \Elementor\Repeater();

			$repeater_social->add_control(
				'class_icon',
				[
					'label'   => __( 'Class Icon', 'ova-framework' ),
					'type' 	  => \Elementor\Controls_Manager::TEXT,
				]
			);

			$repeater_social->add_control(
				'icon_link',
				[
					'label' 	  => __( 'Link', 'ova-framework' ),
					'type' 		  => Controls_Manager::URL,
					'dynamic' 	  => [
						'active'  => true,
					],
					'placeholder' => __( 'https://your-link.com', 'ova-framework' ),
					'default' 	  => [
						'url' 	  => '#',
					],
				]
			);

			$this->add_control(
				'tabs_social',
				[
					'label' 	=> __( 'Tabs Social', 'ova-framework' ),
					'type' 		=> Controls_Manager::REPEATER,
					'fields' 	=> $repeater_social->get_controls(),
					'default' 	=> [
						[
							'class_icon' => __( 'fab fa-facebook-square', 'ova-framework' ),
							'icon_link'  => [ 'url' => '#' ],
						],
						[   
							'class_icon' => __( 'fab fa-twitter', 'ova-framework' ),
							'icon_link'  => [ 'url' => '#' ],
						],
						[   
							'class_icon' => __( 'fab fa-instagram', 'ova-framework' ),
							'icon_link'  => [ 'url' => '#' ],
						],
						[   
							'class_icon' => __( 'fab fa-dribbble', 'ova-framework' ),
							'icon_link'  => [ 'url' => '#' ],
						],						
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Content', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'content_bg',
				[
					'label' 	=> __( 'Background', 'ova-framework' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .contact-version-1 .ova-contact' => 'background-color: {{VALUE}};',
						'{{WRAPPER}} .contact-version-2 .ova-contact' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->start_controls_tabs( 'content_style' );

		        $this->start_controls_tab(
		            'icon_style_normal',
		            [
		                'label' => __( 'Normal', 'ova_framework' ),
		            ]
		        );

					$this->add_control(
						'icon_color',
						[
							'label' 	=> __( 'Color Icon', 'ova-framework' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-contact .contact-left ul li .icon i' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_responsive_control(
						'icon_size',
						[
							'label' 	=> __( 'Icon Size', 'ova-framework' ),
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
								'{{WRAPPER}} .ova-contact .contact-left ul li .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'text_color',
						[
							'label' 	=> __( 'Color Text', 'ova-framework' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-contact .contact-left ul li .text p a' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' 		=> 'text_typography',
							'selector'  => '{{WRAPPER}} .ova-contact .contact-left ul li .text p a',
							'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
						]
					);

					$this->add_control(
						'social_color',
						[
							'label' 	=> __( 'Color Social', 'ova-framework' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-contact .contact-right .list-social a' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_responsive_control(
						'social_size',
						[
							'label' 	=> __( 'Social Size', 'ova-framework' ),
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
								'{{WRAPPER}} .ova-contact .contact-right .list-social a' => 'font-size: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'padding_contact',
						[
							'label' 		=> __( 'Padding', 'ova-framework' ),
							'type' 			=> Controls_Manager::DIMENSIONS,
							'size_units' 	=> [ 'px', 'em', '%' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-contact' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'margin_contact',
						[
							'label' 		=> __( 'Margin', 'ova-framework' ),
							'type' 			=> Controls_Manager::DIMENSIONS,
							'size_units' 	=> [ 'px', 'em', '%' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-contact' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

				$this->end_controls_tab();


				$this->start_controls_tab(
		            'content_style_hover',
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
								'{{WRAPPER}} .ova-contact .contact-left ul li .icon i:hover' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_responsive_control(
						'icon_size_hover',
						[
							'label' 	=> __( 'Size', 'ova-framework' ),
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
								'{{WRAPPER}} .ova-contact .contact-left ul li .icon i:hover' => 'font-size: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'text_color_hover',
						[
							'label' 	=> __( 'Color Text', 'ova-framework' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-contact .contact-left ul li .text p a:hover' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' 		=> 'text_typography_hover',
							'selector'  => '{{WRAPPER}} .ova-contact .contact-left ul li .text p a:hover',
							'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
						]
					);

					$this->add_control(
						'social_color_hover',
						[
							'label' 	=> __( 'Color Social', 'ova-framework' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-contact .contact-right .list-social a:hover' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_responsive_control(
						'social_size_hover',
						[
							'label' 	=> __( 'Social Size', 'ova-framework' ),
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
								'{{WRAPPER}} .ova-contact .contact-right .list-social a:hover' => 'font-size: {{SIZE}}{{UNIT}};',
							],
						]
					);

		        $this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();

		$version = $settings['version'];
		$tabs_contact = $settings['tabs_contact'];
		$tabs_social = $settings['tabs_social'];

		?>
		<?php if ( !empty($tabs_contact) and !empty($tabs_social) and 'version_1' === $version ): ?>
			<div class="contact-version-1">
				<div class="ova-contact clearfix">
					<div class="contact-left">
						<ul>
							<?php foreach ( $tabs_contact as $items_contact ): ?>
								<li>
									<div class="icon">
										<i class="<?php echo esc_html( $items_contact['class_icon_contact'] ); ?>"></i>
									</div>
									<div class="text">
										<p>
											<a href="<?php echo esc_html( $items_contact['link_icon_contact']['url'] ); ?>" target="_blank"><?php echo esc_html( $items_contact['text_icon_contact'] ); ?></a>
										</p>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="contact-right">
						<div class="list-social">
							<?php foreach ( $tabs_social as $items_social ): ?>
								<a href="<?php echo esc_html( $items_social['icon_link']['url'] ); ?>" target="_blank">
									<i class="<?php echo esc_html( $items_social['class_icon'] ); ?>"></i>
								</a>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		<?php else: ?>
			<div class="contact-version-2">
				<div class="ova-contact clearfix">
					<div class="contact-left">
						<ul>
							<?php foreach ( $tabs_contact as $items_contact ): ?>
								<li>
									<div class="icon">
										<i class="<?php echo esc_html( $items_contact['class_icon_contact'] ); ?>"></i>
									</div>
									<div class="text">
										<p>
											<a href="<?php echo esc_html( $items_contact['link_icon_contact']['url'] ); ?>" target="_blank"><?php echo esc_html( $items_contact['text_icon_contact'] ); ?></a>
										</p>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="contact-right">
						<div class="list-social">
							<?php foreach ( $tabs_social as $items_social ): ?>
								<a href="<?php echo esc_html( $items_social['icon_link']['url'] ); ?>" target="_blank">
									<i class="<?php echo esc_html( $items_social['class_icon'] ); ?>"></i>
								</a>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		<?php
		endif;
	}
}


