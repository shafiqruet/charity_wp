<?php

namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Utils;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_testimonial extends Widget_Base {

	public function get_name() {
		return 'ova_testimonial';
	}

	public function get_title() {
		return __( 'Ova Testimonial', 'ova-framework' );
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
					'default' => 'version_3',
					'options' => [
						'version_1' => esc_html__( 'Version 1', 'ova-framework' ),
						'version_2' => esc_html__( 'Version 2', 'ova-framework' ),
						'version_3' => esc_html__( 'Version 3', 'ova-framework' ),
					]
				]
			);


			$repeater = new \Elementor\Repeater();

				$repeater->add_control(
					'name_author',
					[
						'label'   => 'Author Name',
						'type'    => \Elementor\Controls_Manager::TEXT,
					]
				);

				$repeater->add_control(
					'job',
					[
						'label'   => 'Job',
						'type'    => \Elementor\Controls_Manager::TEXT,

					]
				);

				$repeater->add_control(
					'image_author',
					[
						'label'   => 'Author Image',
						'type'    => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					]
				);

				$repeater->add_control(
					'testimonial',
					[
						'label'   => __( 'Testimonial ', 'ova-framework' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => __( '"Sed ullamcorper morbi tincidunt or massa eget egestas purus. Non nisi est sit amet facilisis magna etiam."', 'ova-framework' ),
					]
				);

				$this->add_control(
					'tab_item',
					[
						'label'       => 'Items Testimonial',
						'type'        => Controls_Manager::REPEATER,
						'fields'      => $repeater->get_controls(),
						'default' => [
							[
								'name_author' => __('- Kevin Martin', 'ova-framework'),
								'job' => __('Citizen Of Omina', 'ova-framework'),
								'testimonial' => __('There are many variations of passages of lorem ipsum available but the majority have suffered alteration in some form.', 'ova-framework'),
							],
							[
								'name_author' => __('- Jessica Brown', 'ova-framework'),
								'job' => __('Minister Of Omina', 'ova-framework'),
								'testimonial' => __('There are many variations of passages of lorem ipsum available but the majority have suffered alteration in some form.', 'ova-framework'),
							],
							[
								'name_author' => __('- David Cooper', 'ova-framework'),
								'job' => __('Governer Of Canada', 'ova-framework'),
								'testimonial' => __('There are many variations of passages of lorem ipsum available but the majority have suffered alteration in some form.', 'ova-framework'),
							],
						],
						'title_field' => '{{{ name_author }}}',
					]
				);
			

		$this->end_controls_section();

		/*****************  END SECTION CONTENT ******************/


		/*****************************************************************
						START SECTION ADDITIONAL
		******************************************************************/

		$this->start_controls_section(
			'section_additional_options',
			[
				'label' => __( 'Additional Options', 'ova-framework' ),
			]
		);


		/***************************  VERSION 1 ***********************/
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
					'default' => 'yes',
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

		/****************************  END SECTION ADDITIONAL *********************/

		/*************  SECTION NAME JOB. *******************/
		$this->start_controls_section(
			'section_general',
			[
				'label' => __( 'General', 'ova-framework' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			

			$this->add_control(
				'quote_color',
				[
					'label'     => __( 'Quote Job', 'ova-framework' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .icon-quote span::before' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials-v2 .owl-stage-outer .testimonial-item .testimonial-img .testimonial-quote .quote' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-testimonial.version_3 .slide-testimonials .client_info .testimonial-quote .quote' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'dot_active_color',
				[
					'label'     => __( 'Dot Active Color', 'ova-framework' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .owl-dots .owl-dot.active span' => 'background : {{VALUE}};',
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials-v2 .owl-dots .owl-dot.active span' => 'background : {{VALUE}};',
						
					],
				]
			);


		$this->end_controls_section();
		###############  end section job  ###############


		/*************  SECTION content testimonial  *******************/
		$this->start_controls_section(
			'section_content_testimonial',
			[
				'label' => __( 'Content Testimonial', 'ova-framework' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'content_testimonial_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info p.evaluate',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
					'condition' => [
						'version[value]' => ['version_1'],
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'content_testimonial_typography_v2',
					'selector' => '{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials-v2 .owl-stage-outer .testimonial-item .testimonial-text .text',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
					'condition' => [
						'version[value]' => ['version_2'],
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'content_testimonial_typography_v3',
					'selector' => '{{WRAPPER}} .ova-testimonial.version_3 .slide-testimonials .client_info p.evaluate',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
					'condition' => [
						'version[value]' => ['version_3'],
					],
				]
			);

			$this->add_control(
				'content_color',
				[
					'label'     => __( 'Color', 'ova-framework' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info p.evaluate' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials-v2 .owl-stage-outer .testimonial-item .testimonial-text .text' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-testimonial.version_3 .slide-testimonials .client_info p.evaluate' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_margin',
				[
					'label'      => __( 'Margin', 'ova-framework' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials-v2 .owl-stage-outer .testimonial-item .testimonial-text .text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .ova-testimonial.version_3 .slide-testimonials .client_info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_padding',
				[
					'label'      => __( 'Padding', 'ova-framework' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials-v2 .owl-stage-outer .testimonial-item .testimonial-text .text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .ova-testimonial.version_3 .slide-testimonials .client_info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


		$this->end_controls_section();
		###############  end section content testimonial  ###############


		/*************  SECTION NAME AUTHOR. *******************/
		$this->start_controls_section(
			'section_author_name',
			[
				'label' => __( 'Author Name', 'ova-framework' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'author_name_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-job .name',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
					'condition' => [
						'version[value]' => ['version_1'],
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'author_name_typography_v2',
					'selector' => '{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials-v2 .owl-stage-outer .testimonial-item .testimonial-text .title',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
					'condition' => [
						'version[value]' => ['version_2'],
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'author_name_typography_v3',
					'selector' => '{{WRAPPER}} .ova-testimonial.version_3 .slide-testimonials .client_info .name-job .name',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
					'condition' => [
						'version[value]' => ['version_3'],
					],
				]
			);

			$this->add_control(
				'author_name_color',
				[
					'label'     => __( 'Color Author', 'ova-framework' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-job .name' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials-v2 .owl-stage-outer .testimonial-item .testimonial-text .title' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-testimonial.version_3 .slide-testimonials .client_info .name-job .name' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'author_name_margin',
				[
					'label'      => __( 'Margin', 'ova-framework' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-job .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials-v2 .owl-stage-outer .testimonial-item .testimonial-text .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .ova-testimonial.version_3 .slide-testimonials .client_info .name-job' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'author_name_padding',
				[
					'label'      => __( 'Padding', 'ova-framework' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-job .name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials-v2 .owl-stage-outer .testimonial-item .testimonial-text .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .ova-testimonial.version_3 .slide-testimonials .client_info .name-job' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


		$this->end_controls_section();
		###############  end section author  ###############


		/*************  SECTION NAME JOB. *******************/
		$this->start_controls_section(
			'section_job',
			[
				'label' => __( 'Job', 'ova-framework' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'job_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-job .job',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				]
			);

			$this->add_control(
				'job_color',
				[
					'label'     => __( 'Color Job', 'ova-framework' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'
						{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-job .job' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'job_margin',
				[
					'label'      => __( 'Margin', 'ova-framework' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-job .job' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'job_padding',
				[
					'label'      => __( 'Padding', 'ova-framework' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-job .job' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


		$this->end_controls_section();
		###############  end section job  ###############

	}

	protected function render() {
		$settings = $this->get_settings();
		$version = $settings['version'];

		$tab_item = $settings['tab_item'];

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
		

		?>

		<?php if( $version === 'version_1' ) : ?>

			<section class="ova-testimonial ">

					<div class="slide-testimonials owl-carousel owl-theme " data-options="<?php echo esc_attr(json_encode($data_options)) ?>">
						<?php if(!empty($tab_item)) : foreach ($tab_item as $item) : ?>
							<div class="item">
								<div class="client_info">
									
									<?php if( $item['testimonial'] != '' ) : ?>
									<p class="evaluate"><?php echo esc_html($item['testimonial']) ?></p>
									<?php endif; ?>
									<div class="info">
										<div class="client">
											<?php if( $item['image_author'] != '' ) { ?>
												<img src="<?php echo esc_attr($item['image_author']['url']) ?>" alt="">
											<?php } ?>
										</div>
										<div class="name-job">
											<?php if( $item['name_author'] != '' ) { ?>
											<p class="name second_font"><?php echo esc_html($item['name_author']) ?></p>
											<?php } ?>
											<?php if( $item['job'] != '' ) { ?>
											<p class="job"><?php echo esc_html($item['job']) ?></p>
											<?php } ?>
										</div>
									</div>
									<!-- end info -->
									<div class="icon-quote">
										<span class="flaticon-left-quote-1"></span>
									</div>
								</div>
							</div>
						<?php endforeach; endif; ?>
					</div>

			</section>

		<?php elseif( $version === 'version_2' ) : ?>

			<section class="ova-testimonial version_2">
				<div class="slide-testimonials-v2 owl-carousel owl-theme " data-options="<?php echo esc_attr(json_encode($data_options)) ?>">
						<?php if(!empty($tab_item)) : foreach ($tab_item as $item) : ?>
						<div class="testimonial-item">
							<div class="testimonial-img">
								<div class="testimonial-bg"></div>
								<?php if ( !empty($item['image_author']) ) : ?>
									<img src="<?php echo esc_attr($item['image_author']['url']); ?>" alt="">
								<?php endif; ?>
								<div class="testimonial-quote">
									<p class="quote">“</p>
								</div>
							</div>

							<div class="testimonial-text">
								<?php if( $item['testimonial'] != '' ) : ?>
									<p class="text"><?php echo esc_html($item['testimonial']); ?></p>
								<?php endif; ?>
								<?php if ( !empty($item['name_author']) ): ?>
									<h3 class="title thrid_font"><?php echo esc_html($item['name_author']); ?></h3>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; endif; ?>
				</div>
			</section>

		<?php else : ?>

			<section class="ova-testimonial version_3">

					<div class="slide-testimonials owl-carousel owl-theme " data-options="<?php echo esc_attr(json_encode($data_options)) ?>">
						<?php if(!empty($tab_item)) : foreach ($tab_item as $item) : ?>
							<div class="item">
								<div class="client_info">

									<div class="testimonial-quote">
										<p class="quote">“</p>
									</div>

									<?php if( $item['testimonial'] != '' ) : ?>
									<p class="evaluate"><?php echo esc_html($item['testimonial']); ?></p>
									<?php endif; ?>
									<div class="name-job">
										<?php if( $item['name_author'] != '' ) { ?>
										<h3 class="name thrid_font"><?php echo esc_html($item['name_author']); ?></h3>
										<?php } ?>
									</div>

									<div class="avatar">
										<div class="client">
										<?php if( $item['image_author'] != '' ) { ?>
											<img src="<?php echo esc_attr($item['image_author']['url']); ?>" alt="">
										<?php } ?>
										</div>
									</div>

								</div>
							</div>
						<?php endforeach; endif; ?>
					</div>

			</section>

		<?php endif; ?>

		<?php
	}
	// end render
}