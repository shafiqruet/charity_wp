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

class ova_testimonial_image extends Widget_Base {

	public function get_name() {
		return 'ova_testimonial_image';
	}

	public function get_title() {
		return __( 'Ova Testimonial Image', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	public function get_script_depends() {
		// Carousel
		wp_enqueue_style( 'owl-carousel', OVA_PLUGIN_URI.'assets/libs/owl-carousel/assets/owl.carousel.min.css' );
		wp_enqueue_script( 'owl-carousel', OVA_PLUGIN_URI.'assets/libs/owl-carousel/owl.carousel.min.js', array('jquery'), false, true );
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
					'default' => 'version_1',
					'options' => [
						'version_1' => esc_html__( 'Version 1', 'ova-framework' ),
						'version_2' => esc_html__( 'Version 2', 'ova-framework' ),
						'version_3' => esc_html__( 'Version 3', 'ova-framework' ),
					]
				]
			);

			$this->add_control(
				'class_icon',
				[
					'label' => __( 'Class Icon', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => 'fab fa-instagram',
					'condition' => [
                        'version[value]' => ['version_2', 'version_3'],
                    ],
				]
			);
			$this->add_control(
	            'popup',
	            [
	                'label' => __( 'Popup', 'ova_framework' ),
	                'type' => Controls_Manager::SWITCHER,
	                'default' => 'yes',
	                'separator' => 'before',
	                'condition' => [
                        'version[value]' => ['version_2', 'version_3'],
                    ],
	            ]
	        );

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

			$this->add_control(
				'tabs_image',
				[
					'label' => __( 'Tabs Image', 'ova-framework' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'image' => ['url' => Utils::get_placeholder_image_src()],
						],
						[   
							'image' => ['url' => Utils::get_placeholder_image_src()],
						],
						[    
							'image' => ['url' => Utils::get_placeholder_image_src()],
						],
						[    
							'image' => ['url' => Utils::get_placeholder_image_src()],
						],
						[    
							'image' => ['url' => Utils::get_placeholder_image_src()],
						],						
					],
					'condition' => [
                        'version[value]' => ['version_1', 'version_2'],
                    ],
				]
			);

			//version 3

			$repeater_v3 = new \Elementor\Repeater();

			$repeater_v3->add_control(
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
                ]
			);

			$repeater_v3->add_control(
				'title_v3',
				[
					'label' => __( 'Title', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Small Help', 'ova-framework' ),
				]
			);

			$this->add_control(
				'tabs_image_v3',
				[
					'label' => __( 'Tabs Title', 'ova-framework' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $repeater_v3->get_controls(),
					'default' => [
						[
							'image_v3' => ['url' => Utils::get_placeholder_image_src()],
							'title_v3' => __( 'Small Help', 'ova-framework' ),
						],
						[
							'image_v3' => ['url' => Utils::get_placeholder_image_src()],
							'title_v3' => __( 'Small Help', 'ova-framework' ),
						],
						[
							'image_v3' => ['url' => Utils::get_placeholder_image_src()],
							'title_v3' => __( 'Small Help', 'ova-framework' ),
						],
						[
							'image_v3' => ['url' => Utils::get_placeholder_image_src()],
							'title_v3' => __( 'Small Help', 'ova-framework' ),
						],					
					],
					'condition' => [
                        'version[value]' => 'version_3',
                    ],
				]
			);



			$repeater_event_v3 = new \Elementor\Repeater();

			$repeater_event_v3->add_control(
				'title_event_1_v3',
				[
					'label' => __( 'Event 1', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Charity', 'ova-framework' ),
				]
			);

			$repeater_event_v3->add_control(
				'link_event_1_v3',
				[
					'label' => __( 'Link 1', 'ova-framework' ),
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

			$repeater_event_v3->add_control(
				'title_event_2_v3',
				[
					'label' => __( 'Event 2', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Donation', 'ova-framework' ),
				]
			);

			$repeater_event_v3->add_control(
				'link_event_2_v3',
				[
					'label' => __( 'Link 2', 'ova-framework' ),
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
				'tabs_event_v3',
				[
					'label' => __( 'Tabs Event', 'ova-framework' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $repeater_event_v3->get_controls(),
					'default' => [
						[
							'title_event_1_v3' => __( 'Charity', 'ova-framework' ),
							'link_event_1_v3' => ['url' => Utils::get_placeholder_image_src()],
							'title_event_2_v3' => __( 'Donation', 'ova-framework' ),
							'link_event_2_v3' => ['url' => Utils::get_placeholder_image_src()],
						],
						[
							'title_event_1_v3' => __( 'Charity', 'ova-framework' ),
							'link_event_1_v3' => ['url' => Utils::get_placeholder_image_src()],
							'title_event_2_v3' => __( 'Donation', 'ova-framework' ),
							'link_event_2_v3' => ['url' => Utils::get_placeholder_image_src()],
						],
						[
							'title_event_1_v3' => __( 'Charity', 'ova-framework' ),
							'link_event_1_v3' => ['url' => Utils::get_placeholder_image_src()],
							'title_event_2_v3' => __( 'Donation', 'ova-framework' ),
							'link_event_2_v3' => ['url' => Utils::get_placeholder_image_src()],
						],
						[
							'title_event_1_v3' => __( 'Charity', 'ova-framework' ),
							'link_event_1_v3' => ['url' => Utils::get_placeholder_image_src()],
							'title_event_2_v3' => __( 'Donation', 'ova-framework' ),
							'link_event_2_v3' => ['url' => Utils::get_placeholder_image_src()],
						],	
					],
					'condition' => [
                        'version[value]' => 'version_3',
                    ],
				]
			);
			
		$this->end_controls_section();

		$this->start_controls_section(
			'section_additional_options',
			[
				'label' => __( 'Additional Options', 'ova-framework' ),
			]
		);

			$this->add_control(
				'margin_items',
				[
					'label'   => __( 'Margin Right Items', 'ova-framework' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 30,
				]
				
			);

			$this->add_control(
				'item_number',
				[
					'label'       => __( 'Item Number', 'ova-framework' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => __( 'Number Item', 'ova-framework' ),
					'default'     => 3,
				]
			);

	

			$this->add_control(
				'slides_to_scroll',
				[
					'label'       => __( 'Slides to Scroll', 'ova-framework' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => __( 'Set how many slides are scrolled per swipe.', 'ova-framework' ),
					'default'     => 1,
				]
			);

			$this->add_control(
				'pause_on_hover',
				[
					'label'   => __( 'Pause on Hover', 'ova-framework' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => __( 'Yes', 'ova-framework' ),
						'no'  => __( 'No', 'ova-framework' ),
					],
					'frontend_available' => true,
				]
			);


			$this->add_control(
				'infinite',
				[
					'label'   => __( 'Infinite Loop', 'ova-framework' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => __( 'Yes', 'ova-framework' ),
						'no'  => __( 'No', 'ova-framework' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'autoplay',
				[
					'label'   => __( 'Autoplay', 'ova-framework' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => __( 'Yes', 'ova-framework' ),
						'no'  => __( 'No', 'ova-framework' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'autoplay_speed',
				[
					'label'     => __( 'Autoplay Speed', 'ova-framework' ),
					'type'      => Controls_Manager::NUMBER,
					'default'   => 3000,
					'step'      => 500,
					'condition' => [
						'autoplay' => 'yes',
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'smartspeed',
				[
					'label'   => __( 'Smart Speed', 'ova-framework' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 500,
				]
			);

			$this->add_control(
				'dot_control',
				[
					'label'   => __( 'Show Dots', 'ova-framework' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'no',
					'options' => [
						'yes' => __( 'Yes', 'ova-framework' ),
						'no'  => __( 'No', 'ova-framework' ),
					],
					'frontend_available' => true,
				]
			);

				$this->add_control(
				'nav_control',
				[
					'label'   => __( 'Show Nav', 'ova-framework' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'no',
					'options' => [
						'yes' => __( 'Yes', 'ova-framework' ),
						'no'  => __( 'No', 'ova-framework' ),
					],
					'frontend_available' => true,
				]
			);

		$this->end_controls_section();
	//end section content

		
	//begin section content style
		$this->start_controls_section(
			'section_border_style',
			[
				'label' => __( 'Border', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'color_border',
				[
					'label' => __( 'Color', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .testimonial-image .list-images' => 'border-right-color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'border_space',
				[
					'label' => __( 'Spacing', 'ova-framework' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 10,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .testimonial-image .list-images' => 'border-right-width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_padding',
				[
					'label' 		=> __( 'Padding', 'ova-framework' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .version-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .version-2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .version-3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_image_style',
			[
				'label' => __( 'Image', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'margin_image',
				[
					'label' => __( 'Margin', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .testimonial-image .list-images img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
	//end section content style
		
	}

	//render
	protected function render() {
		$settings = $this->get_settings_for_display();

		$data_options['items']              = $settings['item_number'];
		$data_options['slideBy']            = $settings['slides_to_scroll'];
		$data_options['margin']             = $settings['margin_items'];
		$data_options['autoplayHoverPause'] = $settings['pause_on_hover'] === 'yes' ? true : false;
		$data_options['loop']               = $settings['infinite'] === 'yes' ? true : false;
		$data_options['autoplay']           = $settings['autoplay'] === 'yes' ? true : false;
		$data_options['autoplayTimeout']    = $settings['autoplay_speed'];
		$data_options['smartSpeed']         = $settings['smartspeed'];
		$data_options['dots']               = $settings['dot_control'] === 'yes' ? true : false;
		$data_options['nav']                = $settings['nav_control'] === 'yes' ? true : false;

		$tabs_image = $settings['tabs_image'];
		$version = $settings['version'];
		$class_icon = $settings['class_icon'];

		//version 3
		$tabs_image_v3 = $settings['tabs_image_v3'];
		$tabs_event_v3 = $settings['tabs_event_v3'];
		?>
		
		

		<?php if ( 'version_1' === $version ) : ?>

			<?php if ( !empty($tabs_image) ) : ?>
				<div class="version-1">
					<div class="testimonial-image owl-carousel" data-options="<?php echo esc_attr(json_encode($data_options)); ?>">
						<?php foreach ( $tabs_image as $items ) : ?>
							<div class="list-images"><img src="<?php echo $items['image']['url']; ?>" alt=""></div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>

		<?php elseif ( 'version_2' === $version ) : ?>

			<?php if ( !empty($tabs_image) ) : ?>
				<div class="version-2">
					<div class="testimonial-image-v2 owl-carousel" data-options="<?php echo esc_attr(json_encode($data_options)); ?>">
						<?php foreach ( $tabs_image as $items ) : ?>
							<div class="images-box-v2">
								<div class="list-images-v2">
									<img src="<?php echo $items['image']['url']; ?>" alt="">
									<div class="icon-box-v2">
										<?php if ( 'yes' === $settings['popup'] ) : ?>
											<a data-fancybox="gallery" href="<?php echo $items['image']['url']; ?>">
												<span class="<?php echo $class_icon; ?>"></span>
											</a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>

		<?php else: ?>

			<?php if ( !empty($tabs_image_v3) ) : ?>
				<div class="version-3">
					<div class="testimonial-image-v3 owl-carousel" data-options="<?php echo esc_attr(json_encode($data_options)); ?>">
						<?php foreach ( $tabs_image_v3 as $key => $items_v3 ) : ?>
							<div class="images-box-v3">
								<div class="list-images-v3">
									<img src="<?php echo esc_html( $items_v3['image_v3']['url'] ); ?>" alt="">
									<div class="icon-box-v3">
										<h2 class="title thrid_font"><?php echo esc_html( $items_v3['title_v3'] ); ?></h2>
										<ul class="list-unstyled">
											<?php if ( !empty($tabs_event_v3) ) : ?>
												<?php foreach ( $tabs_event_v3 as $key_event => $items_eve ) : ?>
													<?php if ( $key_event === $key ) : ?>
														<li>
															<a href="<?php echo esc_html( $items_eve['link_event_1_v3']['url'] ); ?>" target="_blank">
																<?php echo esc_html( $items_eve['title_event_1_v3'] ); ?>
															</a>
														</li>
														<li><span>/</span></li>
														<li>
															<a href="<?php echo esc_html( $items_eve['link_event_2_v3']['url'] ); ?>" target="_blank">
																<?php echo esc_html( $items_eve['title_event_2_v3'] ); ?>
															</a>
														</li>
													<?php endif; ?>
												<?php endforeach; ?>
											<?php endif; ?>
										</ul>

										<?php if ( 'yes' === $settings['popup'] ) : ?>
											<a data-fancybox="gallery" href="<?php echo $items_v3['image_v3']['url']; ?>" class="img-popup">
												<span class="<?php echo esc_html( $class_icon ); ?>"></span>
											</a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>

		<?php 
		endif;
	}
}