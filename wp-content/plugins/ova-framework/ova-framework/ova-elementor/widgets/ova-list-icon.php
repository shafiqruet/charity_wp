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

class ova_list_icon extends Widget_Base {

	public function get_name() {
		return 'ova_list_icon';
	}

	public function get_title() {
		return __( 'Ova List Icon', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-bullet-list';
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
				'version',
				[
					'label' => __( 'Version', 'ova-framework' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'list-icon-v1',
					'options' => [
						'list-icon-v1' => esc_html__( 'Version 1', 'ova-framework' ),
						'list-icon-v2' => esc_html__( 'Version 2', 'ova-framework' ),
						'list-icon-v3' => esc_html__( 'Version 3', 'ova-framework' ),
					]
				]
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'class_icon',
				[
					'label' => __( 'Class Icon', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => 'icon-confirmation',
				]
			);


			$repeater->add_control(
				'title',
				[
					'label' => __( 'Title', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
				]
			);

			$repeater->add_control(
	            'item_bg',
	            [
	                'label' => __( 'Background', 'ova-framework' ),
	                'type' => Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-color: {{VALUE}};',
	                ],
	            ]
	        );

			$this->add_control(
				'tabs',
				[
					'label' => __( 'Tabs', 'ova-framework' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'class_icon' => __( 'icon-confirmation', 'ova-framework' ),
							'title' => __( 'Food', 'ova-framework' ),
						],
						[   'class_icon' => __( 'icon-confirmation', 'ova-framework' ),
							'title' => __( 'Water', 'ova-framework' ),
						],
						[   'class_icon' => __( 'icon-confirmation', 'ova-framework' ),
							'title' => __( 'Medical', 'ova-framework' ),
						],						
					],
					'condition' => [
                        'version[value]' => ['list-icon-v1', 'list-icon-v2'],
                    ],
				]
			);

			//version 3
			$repeater_v3 = new \Elementor\Repeater();

			$repeater_v3->add_control(
				'class_icon_v3',
				[
					'label' => __( 'Class Icon', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => 'fa fa-check',
				]
			);


			$repeater_v3->add_control(
				'title_v3',
				[
					'label' => __( 'Title', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Prosper in this volatile', 'ova-framework' ),
				]
			);

			$repeater_v3->add_control(
				'item_link',
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

			$repeater_v3->add_control(
	            'item_bg_v3',
	            [
	                'label' => __( 'Background', 'ova-framework' ),
	                'type' => Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-color: {{VALUE}};',
	                ],
	            ]
	        );

	        $repeater_v3->add_control(
	            'item_color_v3',
	            [
	                'label' => __( 'Color', 'ova-framework' ),
	                'type' => Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} {{CURRENT_ITEM}} i' => 'color: {{VALUE}};',
	                ],
	            ]
	        );

			$this->add_control(
				'tabs_v3',
				[
					'label' => __( 'Tabs', 'ova-framework' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $repeater_v3->get_controls(),
					'default' => [
						[
							'class_icon_v3' => __( 'fa fa-check', 'ova-framework' ),
							'title_v3' => __( 'Prosper in this volatile', 'ova-framework' ),
							'item_link' => [ 'url' => '#' ],
						],
						[   
							'class_icon_v3' => __( 'fa fa-check', 'ova-framework' ),
							'title_v3' => __( 'Prosper in this volatile', 'ova-framework' ),
							'item_link' => [ 'url' => '#' ],
						],						
					],

					'condition' => [
                        'version[value]' => ['list-icon-v3'],
                    ],
				]
			);
			
		$this->end_controls_section();
	//end section content

		
	//begin section content style
		//style
		$this->start_controls_section(
			'section_list_icon_style',
			[
				'label' => __( 'List Icon', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			
			$this->add_control(
				'bg_v1_list_icon',
				[
					'label' => __( 'Background ', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-list-icon' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'width_list_icon',
				[
					'label' => __( 'Width', 'ova-framework' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-list-icon' => 'width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
                        'version[value]' => 'list-icon-v1',
                    ],
				]
			);

			$this->add_responsive_control(
				'border_radius_list_icon',
				[
					'label' => __( 'Border radius ', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-list-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
                        'version[value]' => 'list-icon-v1',
                    ],
				]
			);

			$this->add_responsive_control(
	            'content_align',
	            [
	                'label' => __( 'Alignment', 'ova_framework' ),
	                'type' => Controls_Manager::CHOOSE,
	                'options' => [
	                	'0' => [
	                        'title' => __( 'Left', 'ova_framework' ),
	                        'icon' => 'eicon-text-align-left',
	                    ],
	                    '0 auto' => [
	                        'title' => __( 'Center', 'ova_framework' ),
	                        'icon' => 'eicon-text-align-center',
	                    ],
	                ],
	                'default' => '',
	                'selectors' => [
	                    '{{WRAPPER}} .ova-list-icon' => 'margin: {{VALUE}};',
	                ],
	                'condition' => [
                        'version[value]' => 'list-icon-v1',
                    ],
	            ]
	        );

	        //v2
	        $this->add_responsive_control(
				'padding_list_icon',
				[
					'label' => __( 'Padding', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-list-icon ul.v2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
                        'version[value]' => 'list-icon-v2',
                    ],
				]
			);

			$this->add_responsive_control(
				'margin_list_icon',
				[
					'label' => __( 'Margin', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-list-icon ul.v2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
                        'version[value]' => 'list-icon-v2',
                    ],
				]
			);

			$this->add_responsive_control(
				'list_icon_align',
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
						'{{WRAPPER}} .ova-list-icon ul.v2' => 'text-align: {{VALUE}};',
					],
					'condition' => [
                        'version[value]' => 'list-icon-v2',
                    ],
				]
			);

		$this->end_controls_section();

		//item

		$this->start_controls_section(
			'section_item_style',
			[
				'label' => __( 'Item', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
                    'version[value]' => 'list-icon-v2',
                ],
			]
		);

			$this->add_responsive_control(
				'padding_item',
				[
					'label' => __( 'Padding', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-list-icon ul.v2 li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
                        'version[value]' => 'list-icon-v2',
                    ],
				]
			);

			$this->add_responsive_control(
				'margin_item',
				[
					'label' => __( 'Margin', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-list-icon ul.v2 li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
                        'version[value]' => 'list-icon-v2',
                    ],
				]
			);

		$this->end_controls_section();

		//icon
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => __( 'Icon', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			
			$this->add_control(
				'color_icon',
				[
					'label' => __( 'Color icon ', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-list-icon ul.v1 li span' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-list-icon ul.v2 li .icon-box span' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-list-icon .v3 a i' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'icon_v1_typography',
					'selector' => '{{WRAPPER}} .ova-list-icon ul.v1 li span',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'condition' => [
                        'version[value]' => 'list-icon-v1',
                    ],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'icon_v2_typography',
					'selector' => '{{WRAPPER}} .ova-list-icon ul.v2 li .icon-box span',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'condition' => [
                        'version[value]' => 'list-icon-v2',
                    ],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'icon_v3_typography',
					'selector' => '{{WRAPPER}} .ova-list-icon .v3 a i',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'condition' => [
                        'version[value]' => 'list-icon-v3',
                    ],
				]
			);

			$this->add_responsive_control(
				'margin_icon',
				[
					'label' => __( 'Margin ', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-list-icon ul.v1 li .icon-box span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}}  .ova-list-icon ul.v2 li span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}}  .ova-list-icon .v3 a i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		//title
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			
			$this->add_control(
				'color_title',
				[
					'label' => __( 'Color Title ', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-list-icon ul.v1 li' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-list-icon ul.v2 li .text p' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-list-icon .v3 a' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'title_v1_typography',
					'selector' => '{{WRAPPER}} .ova-list-icon ul.v1 li',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'condition' => [
                        'version[value]' => 'list-icon-v1',
                    ],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'title_v2_typography',
					'selector' => '{{WRAPPER}} .ova-list-icon ul.v2 li .text p',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'condition' => [
                        'version[value]' => 'list-icon-v2',
                    ],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'title_v3_typography',
					'selector' => '{{WRAPPER}} .ova-list-icon .v3 a',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'condition' => [
                        'version[value]' => 'list-icon-v3',
                    ],
				]
			);

			$this->add_responsive_control(
				'margin_title',
				[
					'label' => __( 'Margin Title', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-list-icon ul.v1 li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}}  .ova-list-icon ul.v2 li .text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}}  .ova-list-icon .v3 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_title',
				[
					'label' => __( 'Padding Title', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-list-icon ul.v1 li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}}  .ova-list-icon ul.v2 li .text p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}}  .ova-list-icon .v3 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
	//end section content style
		
	}

	//render
	protected function render() {
		$settings = $this->get_settings_for_display();

		//v1, v2
		$tabs = $settings['tabs'];

		//v3
		$tabs_v3 = $settings['tabs_v3'];

		$version = $settings['version'];

		?>
		
		<?php if ( !empty($tabs) or !empty($tabs_v3) ) : ?>
			<div class="ova-list-icon" >
				<?php if ( 'list-icon-v1' === $version ) : ?>
					<ul class="v1">
						<?php foreach ( $tabs as $item ) : ?>
							<li class="elementor-repeater-item-<?php echo $item['_id']; ?>">
								<span class="<?php echo esc_html__( $item['class_icon'] ) ?>"></span>
								<?php echo esc_html__( $item['title'] ) ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php elseif ( 'list-icon-v2' === $version ) : ?>
					<ul class="v2">
						<?php foreach ( $tabs as $item ) : ?>
							<li class="elementor-repeater-item-<?php echo $item['_id']; ?>">
								<div class="icon-box">
									<span class="<?php echo esc_html__( $item['class_icon'] ) ?>"></span>
								</div>
								<div class="text">
									<p><?php echo esc_html__( $item['title'] ) ?></p>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php else: ?>
					<div class="v3">
						<?php foreach ( $tabs_v3 as $item_v3 ) : ?>
							<a href="<?php echo esc_html( $item_v3['item_link']['url'] ); ?>" class="elementor-repeater-item-<?php echo $item_v3['_id']; ?>">
								<i class="<?php echo esc_html__( $item_v3['class_icon_v3'] ) ?>"></i>
								<?php echo esc_html__( $item_v3['title_v3'] ) ?>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php
		endif;
	}
}