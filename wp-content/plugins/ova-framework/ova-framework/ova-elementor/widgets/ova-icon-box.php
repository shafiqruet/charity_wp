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

class ova_icon_box extends Widget_Base {

	public function get_name() {
		return 'ova_icon_box';
	}

	public function get_title() {
		return __( 'Ova Icon Box', 'ova-framework' );
	}

	public function get_icon() {
		return 'fa fa-play';
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
				'class_icon',
				[
					'label' => __( 'Class Icon', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => 'fa fa-play',
				]
			);


			$this->add_control(
				'url_video',
				[
					'label' => __( 'URL Video', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
				]
			);

			$this->add_control(
				'image_animation',
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
                        'url_video[value]!' => '',
                    ],
                ]
			);

		$this->end_controls_section();
	//end section content

		
	//begin section content style
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
							'{{WRAPPER}} .ova-icon-box .icon-box-content-video span' => 'color : {{VALUE}};',
							'{{WRAPPER}} .ova-icon-box .icon-box-content span' => 'color : {{VALUE}};',
						],
					]
				);

				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'icon_video_typography',
						'selector' => '{{WRAPPER}} .ova-icon-box .icon-box-content-video span',
						'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						'condition' => [
	                            'url_video[value]!' => '',
	                    ],
					]
				);

				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'icon_typography',
						'selector' => '{{WRAPPER}} .ova-icon-box .icon-box-content span',
						'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						'condition' => [
	                            'url_video[value]' => '',
	                        ],
					]
				);

				$this->add_control(
					'bg_icon',
					[
						'label' => __( 'Background', 'ova-framework' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-icon-box .icon-box-content-video' => 'background-color : {{VALUE}};',
							'{{WRAPPER}} .ova-icon-box .icon-box-content' => 'background-color : {{VALUE}};',
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
							'{{WRAPPER}} .ova-icon-box .icon-box-content-video:hover span' => 'color : {{VALUE}};',
							'{{WRAPPER}} .ova-icon-box .icon-box-content:hover span' => 'color : {{VALUE}};',
						],
					]
				);

				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'icon_video_hover_typography',
						'selector' => '{{WRAPPER}} .ova-icon-box .icon-box-content-video:hover span',
						'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						'condition' => [
	                            'url_video[value]!' => '',
	                        ],
					]
				);

				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'icon__hover_typography',
						'selector' => '{{WRAPPER}} .ova-icon-box .icon-box-content:hover span',
						'scheme' => Scheme_Typography::TYPOGRAPHY_1,
						'condition' => [
	                            'url_video[value]' => '',
	                        ],
					]
				);

				$this->add_control(
					'bg_icon_hover',
					[
						'label' => __( 'Background', 'ova-framework' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-icon-box .icon-box-content-video:hover' => 'background-color : {{VALUE}};',
							'{{WRAPPER}} .ova-icon-box .icon-box-content:hover' => 'background-color : {{VALUE}};',
						],
					]
				);

	        $this->end_controls_tab();

        $this->end_controls_tabs();

			$this->add_responsive_control(
				'width_box',
				[
					'label' => __( 'Width Box', 'ova-framework' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-box .icon-box-content-video' => 'width: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-icon-box .icon-box-content' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'height_box',
				[
					'label' => __( 'Height Box', 'ova-framework' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-box .icon-box-content-video' => 'height: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-icon-box .icon-box-content' => 'height: {{SIZE}}{{UNIT}};',
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
                'selectors' => [
                    '{{WRAPPER}} .ova-icon-box .icon-box-content' => 'margin: {{VALUE}};',
                    '{{WRAPPER}} .ova-icon-box .icon-box-content-video' => 'margin: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_section();


		$this->start_controls_section(
			'section_image_style',
			[
				'label' => __( 'Image', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
                    'url_video[value]!' => '',
                ],
			]
		);

			$this->add_responsive_control(
				'top_image',
				[
					'label' => __( 'Top', 'ova-framework' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-box .img-animation' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'left_image',
				[
					'label' => __( 'Left', 'ova-framework' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-box .img-animation' => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'bottom_image',
				[
					'label' => __( 'Bottom', 'ova-framework' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-box .img-animation' => 'bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'right_image',
				[
					'label' => __( 'Right', 'ova-framework' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-icon-box .img-animation' => 'right: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();


	//end section content style
		
	}

	//render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$class_icon = $settings['class_icon'];
		$url_video = $settings['url_video'];
		$url_image = $settings['image_animation']['url'];
		?>
		
		<div class="ova-icon-box" >
			<?php if ( !empty($url_video) ) : ?>

				<?php if ( !empty($url_image) ) : ?>
					<div class="img-animation">
						<img src="<?php echo $url_image; ?>" alt="">
					</div>
				<?php endif; ?>

				<div class="icon-box-content-video video-btn" data-toggle="modal" data-src="<?php echo $url_video; ?>" data-target="#videoModal">
					<span class="<?php echo $class_icon; ?>"></span>
				</div>

				<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-body">

								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>    

								<div class="embed-responsive embed-responsive-16by9">
									<iframe class="embed-responsive-item" id="video" allow="autoplay"></iframe>
								</div>

							</div>
						</div>
					</div>
				</div>
			<?php else: ?>
				<div class="icon-box-content">
					<span class="<?php echo $class_icon; ?>"></span>
				</div>
			<?php endif; ?>
		</div>
		<?php
	}
}