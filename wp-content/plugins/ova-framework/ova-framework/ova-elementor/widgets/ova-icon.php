<?php

namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_icon extends Widget_Base {

	public function get_name() {
		return 'ova_icon';
	}

	public function get_title() {
		return __( 'Ova Icon', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-favorite';
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
				'class_icon',
				[
					'label' 	=> __( 'Class Icon', 'ova-framework' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> __('icon-magnifying-glass','ova-framework'),
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
						'{{WRAPPER}} .ova-icon' => 'text-align: {{VALUE}}',
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
								'{{WRAPPER}} .ova-icon a i' => 'color: {{VALUE}};',
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
								'{{WRAPPER}} .ova-icon a i' => 'font-size: {{SIZE}}{{UNIT}};',
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
								'{{WRAPPER}} .ova-icon a i:hover' => 'color: {{VALUE}};',
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
								'{{WRAPPER}} .ova-icon a i:hover' => 'font-size: {{SIZE}}{{UNIT}};',
							],
						]
					);

		        $this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();

		$class_icon = $settings['class_icon'];
		$link 	    = $settings['link']['url'];
	
		?>
		<div class="ova-icon">
			<a href="<?php echo esc_html( $link ); ?>" target="_blank">
				<i class="<?php echo esc_html( $class_icon ); ?>"></i>
			</a>
		</div>
		<?php

	}
}


