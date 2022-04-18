<?php

namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_button extends Widget_Base {

	public function get_name() {
		return 'ova_button';
	}

	public function get_title() {
		return __( 'Ova Button', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-button';
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
				'title',
				[
					'label' 	=> __( 'Title', 'ova-framework' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('Learn More','ova-framework'),
				]
			);

			$this->add_control(
				'link',
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
				'class_icon',
				[
					'label' 	=> __( 'Class Icon', 'ova-framework' ),
					'type' 		=> Controls_Manager::TEXT,
				]
			);

			$this->add_control(
				'icon_position',
				[
					'label' 	=> __( 'Icon Position', 'ova-framework' ),
					'type' 		=> Controls_Manager::SELECT,
					'default' 	=> 'before',
					'options' 	=> [
						'before' => esc_html__( 'Before', 'ova-framework' ),
						'after'  => esc_html__( 'After', 'ova-framework' ),
					],
					'condition' => [
						'class_icon[value]!' => '',
					],
				]
			);


			$this->add_responsive_control(
				'align',
				[
					'label'   => __( 'Alignment', 'ova-framework' ),
					'type' 	  => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'ova-framework' ),
							'icon'  => 'fa fa-align-left',
						],
						'center' 	=> [
							'title' => __( 'Center', 'ova-framework' ),
							'icon'  => 'fa fa-align-center',
						],
						'right' 	=> [
							'title' => __( 'Right', 'ova-framework' ),
							'icon'  => 'fa fa-align-right',
						],
					],
					'default'   => 'left',
					'selectors' => [
						'{{WRAPPER}} .ova-btn' => 'text-align: {{VALUE}}',
					]
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

			$this->start_controls_tabs( 'title_style' );

		        $this->start_controls_tab(
		            'title_style_normal',
		            [
		                'label' => __( 'Normal', 'ova_framework' ),
		            ]
		        );

					$this->add_control(
						'title_bg',
						[
							'label' 	=> __( 'Background', 'ova-framework' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-btn .btn' => 'background-color: {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'title_color',
						[
							'label' 	=> __( 'Color', 'ova-framework' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-btn .btn' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' 		=> 'title_typography',
							'selector'  => '{{WRAPPER}} .ova-btn .btn',
							'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
						]
					);


					$this->add_responsive_control(
						'title_margin',
						[
							'label' 	 => __( 'Margin', 'ova-framework' ),
							'type' 		 => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors'  => [
								'{{WRAPPER}} .ova-btn .btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'title_padding',
						[
							'label' 	 => __( 'Padding', 'ova-framework' ),
							'type' 		 => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors'  => [
								'{{WRAPPER}} .ova-btn .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'icon_size',
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
								'{{WRAPPER}} .ova-btn .btn i' => 'font-size: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'class_icon[value]!' => '',
							],
						]
					);

					$this->add_responsive_control(
						'icon_margin',
						[
							'label' 	 => __( 'Margin Icon', 'ova-framework' ),
							'type' 		 => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors'  => [
								'{{WRAPPER}} .ova-btn .btn i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'condition' => [
								'class_icon[value]!' => '',
							],
						]
					);

				$this->end_controls_tab();


				$this->start_controls_tab(
		            'title_style_hover',
		            [
		                'label' => __( 'Hover', 'ova_framework' ),
		            ]
		        );

					$this->add_control(
						'title_bg_hover',
						[
							'label' 	=> __( 'Background', 'ova-framework' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-btn .btn:hover' => 'background-color: {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'title_color_hover',
						[
							'label' 	=> __( 'Color', 'ova-framework' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-btn .btn:hover' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' 		=> 'title_typography_hover',
							'selector'  => '{{WRAPPER}} .ova-btn .btn:hover',
							'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
						]
					);


					$this->add_responsive_control(
						'title_margin_hover',
						[
							'label' 	 => __( 'Margin', 'ova-framework' ),
							'type' 		 => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors'  => [
								'{{WRAPPER}} .ova-btn .btn:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'title_padding_hover',
						[
							'label' 	 => __( 'Padding', 'ova-framework' ),
							'type' 		 => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors'  => [
								'{{WRAPPER}} .ova-btn .btn:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .ova-btn .btn:hover i' => 'font-size: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'class_icon[value]!' => '',
							],
						]
					);

					$this->add_responsive_control(
						'icon_margin_hover',
						[
							'label' 	 => __( 'Margin Icon', 'ova-framework' ),
							'type' 		 => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors'  => [
								'{{WRAPPER}} .ova-btn .btn:hover i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'condition' => [
								'class_icon[value]!' => '',
							],
						]
					);

		        $this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();

		$title 	  	= $settings['title'];
		$link 	  	= $settings['link']['url'];
		$class_icon = $settings['class_icon'];
		$icon_position = $settings['icon_position'];
	
		?>
		<div class="ova-btn">
			<a href="<?php echo esc_html( $link ); ?>" class="btn" target="_blank">
				<?php if ( !empty($class_icon) and 'before' === $icon_position ): ?>
					<i class="<?php echo esc_html( $class_icon ); ?>" ></i>
				<?php endif; ?>

				<?php echo esc_html( $title ); ?>

				<?php if ( !empty($class_icon) and 'after' === $icon_position ): ?>
					<i class="<?php echo esc_html( $class_icon ); ?>" ></i>
				<?php endif; ?>
			</a>
		</div>
		<?php

	}
}


