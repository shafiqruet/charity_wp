<?php
namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_counter_up extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);
      
      
   }

	public function get_name() {
		return 'ova_counter_up';
	}

	public function get_title() {
		return __( 'Ova Counter Up', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-counter';
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
					'default' => 'counter-up-v1',
					'options' => [
						'counter-up-v1' => esc_html__( 'Version 1', 'ova-framework' ),
						'counter-up-v2' => esc_html__( 'Version 2', 'ova-framework' ),
					]
				]
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'class_icon',
				[
					'label' => __( 'Class Icon', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => 'icon-donation',
				]
			);


			$repeater->add_control(
				'price',
				[
					'label' => __( 'Price', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'rows' => 3,
					'default' => __( 86700, 'ova-framework' )
				]
			);

			$repeater->add_control(
				'text',
				[
					'label' => __( 'text', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Successfull Campaigns', 'ova-framework' )
				]
			);

			$this->add_control(
					'tabs_item',
					[
						'label'   => 'Items Counter Up',
						'type'    => Controls_Manager::REPEATER,
						'fields'  => $repeater->get_controls(),
						'default' => [
							[
								'class_icon' => __('icon-donation', 'ova-framework'),
								'price' => __(10000, 'ova-framework'),
								'text' => __('Successfull Campaigns'),
							],
						],
					]
				);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'items_v1_border',
					'selector' => '{{WRAPPER}} .counter-up-v1 .ova-counter-up',
					'separator' => 'before',
					'condition' => [
                        'version[value]' => 'counter-up-v1',
                    ],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'items_v2_border',
					'selector' => '{{WRAPPER}} .counter-up-v2 .ova-counter-up',
					'separator' => 'before',
					'condition' => [
                        'version[value]' => 'counter-up-v2',
                    ],
				]
			);

			$this->add_responsive_control(
			'align_v1',
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
					'{{WRAPPER}} .counter-up-v1 .ova-counter-up' => 'justify-content: {{VALUE}};',
					'{{WRAPPER}} .counter-up-v2' => 'justify-content: {{VALUE}};',
				],
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
				'content_margin',
				[
					'label' => __( 'Margin', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-counter-up' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
					],
				]
			);

			$this->add_control(
				'content_paddding',
				[
					'label' => __( 'Padding', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-counter-up' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

			$this->start_controls_tabs( 'icon_style' );

		        $this->start_controls_tab(
		            'icon_style_normal',
		            [
		                'label' => __( 'Normal', 'ova_framework' ),
		            ]
		        );

			        $this->add_control(
						'color_icon',
						[
							'label' => __( 'Color icon ', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .counter-up-v1 .ova-counter-up .icon' => 'color : {{VALUE}};',
								'{{WRAPPER}} .counter-up-v2 .ova-counter-up .icon span' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'icon_v1_typography',
							'selector' => '{{WRAPPER}} .counter-up-v1 .ova-counter-up .icon',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
		                            'version[value]' => 'counter-up-v1',
		                    ],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'icon_v2_typography',
							'selector' => '{{WRAPPER}} .counter-up-v2 .ova-counter-up .icon span',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
		                            'version[value]' => 'counter-up-v2',
		                        ],
						]
					);

					$this->add_control(
						'icon_margin',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .counter-up-v1 .ova-counter-up .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .counter-up-v2 .ova-counter-up .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'icon_paddding',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .counter-up-v1 .ova-counter-up .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .counter-up-v2 .ova-counter-up .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'color_icon_hover',
						[
							'label' => __( 'Color icon ', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .counter-up-v1 .ova-counter-up:hover .icon' => 'color : {{VALUE}};',
								'{{WRAPPER}} .counter-up-v2 .ova-counter-up:hover .icon span' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'icon_v1_hover_typography',
							'selector' => '{{WRAPPER}} .counter-up-v1 .ova-counter-up:hover .icon',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
		                            'version[value]' => 'counter-up-v1',
		                        ],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'icon_v2_hover_typography',
							'selector' => '{{WRAPPER}} .counter-up-v2 .ova-counter-up:hover .icon span',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
		                            'version[value]' => 'counter-up-v2',
		                        ],
						]
					);

					$this->add_control(
						'icon_margin_hover',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .counter-up-v1 .ova-counter-up:hover .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .counter-up-v2 .ova-counter-up:hover .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'icon_paddding_hover',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .counter-up-v1 .ova-counter-up:hover .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .counter-up-v2 .ova-counter-up:hover .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			]
		);

			$this->start_controls_tabs( 'price_style' );

		        $this->start_controls_tab(
		            'price_style_normal',
		            [
		                'label' => __( 'Normal', 'ova_framework' ),
		            ]
		        );

			        $this->add_control(
						'color_price',
						[
							'label' => __( 'Price icon ', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .counter-up-v1 .ova-counter-up .content h4' => 'color : {{VALUE}};',
								'{{WRAPPER}} .counter-up-v2 .ova-counter-up .price h4' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'price_v1_typography',
							'selector' => '{{WRAPPER}} .counter-up-v1 .ova-counter-up .content h4',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
		                            'version[value]' => 'counter-up-v1',
		                    ],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'price_v2_typography',
							'selector' => '{{WRAPPER}} .counter-up-v2 .ova-counter-up .price h4',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
		                            'version[value]' => 'counter-up-v2',
		                        ],
						]
					);

					$this->add_control(
						'price_margin',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .counter-up-v1 .ova-counter-up .content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .counter-up-v2 .ova-counter-up .price h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'price_paddding',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .counter-up-v1 .ova-counter-up .content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .counter-up-v2 .ova-counter-up .price h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

		        $this->end_controls_tab();

			    $this->start_controls_tab(
		            'price_style_hover',
		            [
		                'label' => __( 'Hover', 'ova_framework' ),
		            ]
		        );

			        $this->add_control(
						'color_price_hover',
						[
							'label' => __( 'Price icon ', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .counter-up-v1 .ova-counter-up:hover .content h4' => 'color : {{VALUE}};',
								'{{WRAPPER}} .counter-up-v2 .ova-counter-up:hover .price h4' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'price_v1_hover_typography',
							'selector' => '{{WRAPPER}} .counter-up-v1 .ova-counter-up:hover .content h4',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
		                            'version[value]' => 'counter-up-v1',
		                        ],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'price_v2_hover_typography',
							'selector' => '{{WRAPPER}} .counter-up-v2 .ova-counter-up:hover .price h4',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
		                            'version[value]' => 'counter-up-v2',
		                        ],
						]
					);

					$this->add_control(
						'price_margin_hover',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .counter-up-v1 .ova-counter-up:hover .content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .counter-up-v2 .ova-counter-up:hover .price h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'price_paddding:hover',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .counter-up-v1 .ova-counter-up:hover .content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .counter-up-v2 .ova-counter-up:hover .price h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

			$this->start_controls_tabs( 'text_style' );

		        $this->start_controls_tab(
		            'text_style_normal',
		            [
		                'label' => __( 'Normal', 'ova_framework' ),
		            ]
		        );

			        $this->add_control(
						'color_text',
						[
							'label' => __( 'Text icon ', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .counter-up-v1 .ova-counter-up .content .text' => 'color : {{VALUE}};',
								'{{WRAPPER}} .counter-up-v2 .ova-counter-up .text p' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'text_v1_typography',
							'selector' => '{{WRAPPER}} .counter-up-v1 .ova-counter-up .content .text',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
		                            'version[value]' => 'counter-up-v1',
		                    ],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'text_v2_typography',
							'selector' => '{{WRAPPER}} .counter-up-v2 .ova-counter-up .text p',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
		                            'version[value]' => 'counter-up-v2',
		                        ],
						]
					);

					$this->add_control(
						'text_margin',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .counter-up-v1 .ova-counter-up .content .text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .counter-up-v2 .ova-counter-up .text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'text_paddding',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .counter-up-v1 .ova-counter-up .content .text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .counter-up-v2 .ova-counter-up .text p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

		        $this->end_controls_tab();

			    $this->start_controls_tab(
		            'text_style_hover',
			            [
			                'label' => __( 'Hover', 'ova_framework' ),
			            ]
		        	);
			    
			        $this->add_control(
						'color_text_hover',
						[
							'label' => __( 'Text icon ', 'ova-framework' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .counter-up-v1 .ova-counter-up:hover .content .text' => 'color : {{VALUE}};',
								'{{WRAPPER}} .counter-up-v2 .ova-counter-up:hover .text p' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'text_v1_hover_typography',
							'selector' => '{{WRAPPER}} .counter-up-v1 .ova-counter-up:hover .content .text',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
		                            'version[value]' => 'counter-up-v1',
		                        ],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'text_v2_hover_typography',
							'selector' => '{{WRAPPER}} .counter-up-v2 .ova-counter-up:hover .text p',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'condition' => [
		                            'version[value]' => 'counter-up-v2',
		                        ],
						]
					);

					$this->add_control(
						'text_margin_hover',
						[
							'label' => __( 'Margin', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .counter-up-v1 .ova-counter-up:hover .content .text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .counter-up-v2 .ova-counter-up:hover .text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'price_paddding_hover',
						[
							'label' => __( 'Padding', 'ova-framework' ),
							'type' => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .counter-up-v1 .ova-counter-up:hover .content .text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .counter-up-v2 .ova-counter-up:hover .text p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		$version = $settings['version'];
		
		$tabs_item = $settings['tabs_item'];
		?>

		<?php if ( !empty($tabs_item) ) : ?>

			<?php if ( 'counter-up-v1' === $version ) : ?>
				<div class="counter-up-v1">
					<?php foreach ($tabs_item as $items) : ?>
						<div class="ova-counter-up">

							<?php if( isset( $items['class_icon'] ) ){ ?>
								<div class="icon">
									<span class="<?php echo esc_html( $items['class_icon'] ); ?>"></span>
								</div>
							<?php } ?>

							<div class="content">
								<?php if( isset( $items['price'] ) ){ ?>
									<h4 class="counter"><?php echo  esc_html( number_format($items['price']) ); ?></h4>
								<?php } ?>

								<?php if( isset( $items['text'] ) ){ ?>
									<p class="text"><?php echo esc_html( $items['text'] ); ?></p>
								<?php } ?>

							</div>
						</div>
					<?php endforeach; ?>
				</div>

			<?php else: ?>
				<div class="counter-up-v2">
					<?php foreach ($tabs_item as $items) : ?>
						<div class="ova-counter-up">
							<?php if( isset( $items['class_icon'] ) ){ ?>
							<div class="icon">
								<span class="<?php echo esc_html( $items['class_icon'] ); ?>"></span>
							</div>
							<?php } ?>

							<?php if( isset( $items['price'] ) ){ ?>
							<div class="price">
								<h4 class="counter"><?php echo esc_html( $items['price'] ); ?></h4>
							</div>
							<?php } ?>

							<?php if( isset( $items['text'] ) ){ ?>
								<div class="text thrid_font">
									<p><?php echo esc_html( $items['text'] ); ?></p>
								</div>
							<?php } ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

		<?php
		endif;
	}
}