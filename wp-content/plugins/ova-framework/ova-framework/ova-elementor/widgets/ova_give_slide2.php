<?php
namespace ova_framework\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use WP_Query;
use Give_Donate_Form;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_give_slide2 extends Widget_Base {

	public function get_name() {
		return 'ova_give_slide2';
	}

	public function get_title() {
		return __( 'Give Slide 2', 'ova-framework' );
	}

	public function get_icon() {
		return 'fa fa-sliders';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	public function get_script_depends() {
		// Carousel
		wp_enqueue_style( 'owl-carousel', OVA_PLUGIN_URI.'assets/libs/owl-carousel/assets/owl.carousel.min.css' );
		wp_enqueue_script( 'owl-carousel', OVA_PLUGIN_URI.'assets/libs/owl-carousel/owl.carousel.min.js', array('jquery'), false, true );
		wp_enqueue_script( 'appear', OVA_PLUGIN_URI.'assets/libs/appear/appear.js', array('jquery'), false, true );
		return [ 'script-elementor' ];
	}

	protected function _register_controls() {

	
		//SECTION CONTENT
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'ova-framework' ),
			]
		);

		

			$this->add_control(
				'total_count',
				[
					'label' => __( 'Post Total', 'ova-framework' ),
					'type' => Controls_Manager::NUMBER,
					'default' => 3,
				]
			);

			$this->add_control(
				'order_by',
				[
					'label' => __('Order', 'ova-framework'),
					'type' => Controls_Manager::SELECT,
					'default' => 'desc',
					'options' => [
						'asc' => __('Ascending', 'ova-framework'),
						'desc' => __('Descending', 'ova-framework'),
					]
				]
			);

				$this->add_control(
			'layout_show_post',
			[
				'label' => __( 'Show Post', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					''  => __( 'Default', 'ova-framework' ),
					'feature' => __( 'Feature', 'ova-framework' ),
				],
			]
		);

		

		


		$this->end_controls_section();
		//END SECTION CONTENT


		$this->start_controls_section(
			'section_additional_options',
			[
				'label' => __( 'Additional Options', 'ova-framework' ),
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


		$this->end_controls_section();





		//SECTION TAB STYLE TITLE
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Style', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);



		/***** Title Section *****/

		$this->add_control(
			'color_title',
			[
				'label' => __( 'Color Title', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} 
					.element_give_donations .archive_give_donation .summary .wrap_summary .give_detail.give_slide2 .detail_content .detail_body .title a ' => 'color : {{VALUE}};',
				],
			]
		);
		

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typo_title',
				'selector' => '{{WRAPPER}} 
				.element_give_donations .archive_give_donation .summary .wrap_summary .give_detail.give_slide2 .detail_content .detail_body .title a',
			]
		);

		

		$this->add_control(
			'color_title_hover',
			[
				'label' => __( 'Color Title Hover', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} 
					.element_give_donations .archive_give_donation .summary .wrap_summary .give_detail.give_slide2 .detail_content .detail_body .title a:hover ' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding_title',
			[
				'label' => __( 'Padding', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} 
					.element_give_donations .archive_give_donation .summary .wrap_summary .give_detail.give_slide2 .detail_content .detail_body .title a ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		/***** End Title Section *****/


		/***** Description Section *****/

			$this->add_control(
			'color_desc',
			[
				'label' => __( 'Color Description', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element_give_donations .archive_give_donation .summary .wrap_summary .give_detail.give_slide2 .detail_content .detail_body .desc  ' => 'color : {{VALUE}};',
				],
			]
		);
	

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typo_desc',
				'selector' => '{{WRAPPER}} .element_give_donations .archive_give_donation .summary .wrap_summary .give_detail.give_slide2 .detail_content .detail_body .desc  ',
			]
		);

	

		$this->add_responsive_control(
			'padding_desc',
			[
				'label' => __( 'Padding Description', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .element_give_donations .archive_give_donation .summary .wrap_summary .give_detail.give_slide2 .detail_content .detail_body .desc  ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

	
		/***** End Description Section *****/





		
		$this->add_control(
			'color_pro',
			[
				'label' => __( 'Color Progress', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project-percent' => 'background-color : {{VALUE}} !important;',
				],
			]
		);


			$this->add_control(
			'color_cat',
			[
				'label' => __( 'Background Color Button', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element_give_donations .archive_give_donation .summary .wrap_summary .give_detail.give_slide2 .detail_content .detail_body .post_cat a ' => 'background-color : {{VALUE}} !important;',
				],
			]
		);

					$this->add_control(
			'color_cat2',
			[
				'label' => __( 'Background Color Hover Button', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element_give_donations .archive_give_donation .summary .wrap_summary .give_detail.give_slide2 .detail_content .detail_body .post_cat a:hover' => 'background-color : {{VALUE}} !important;',
				],
			]
		);
		$this->end_controls_section();
		//END SECTION TAB STYLE TITLE

		
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		
	
		$total_count = $settings['total_count'];
		$order = $settings['order_by'];


		if ($settings['layout_show_post'] != '') {
			$layout_show_post = array(
				array(
					'key' => 'ova_met_feature_give',
					'value' => 'on',
					'compare' => '=',
				)
			);
		} else {
			$layout_show_post = '';
		};


	


		$data_options['autoplayHoverPause'] = $settings['pause_on_hover'] === 'yes' ? true : false;
		$data_options['loop']               = $settings['infinite'] === 'yes' ? true : false;
		$data_options['autoplay']           = $settings['autoplay'] === 'yes' ? true : false;
		$data_options['autoplayTimeout']    = $settings['autoplay_speed'];
		$data_options['smartSpeed']         = $settings['smartspeed'];
		$data_options['dots']               = $settings['dot_control'] === 'yes' ? true : false;


		$paged   = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$args_base = array(
			'post_type' => 'give_forms',
			'posts_per_page' => $total_count,
			'meta_query' => $layout_show_post,
			'order' => $order,
		);



		

		$give_donation = new WP_Query( $args_base );
		if(in_array('give/give.php', apply_filters('active_plugins', get_option('active_plugins')))) {
			?>
			<div class="element_give_donations">

				<div class="archive_give_donation">
					<div class="summary">
						<div class="wrap_summary  give-slide2 owl-carousel owl-theme" data-options="<?php echo esc_attr(json_encode($data_options)) ?>">
							<?php if($give_donation->have_posts() ) : while ( $give_donation->have_posts() ) : $give_donation->the_post(); ?>
								<?php
								$id = get_the_ID();

								$ova_met_gallery_give = get_post_meta( $id, 'ova_met_gallery_give', true ) ? get_post_meta( $id, 'ova_met_gallery_give', true ) : '';
								$ova_met_media_give = get_post_meta( $id, 'ova_met_media_give', true ) ? get_post_meta( $id, 'ova_met_media_give', true ) : 'javascript:;';

								$show_goal = give_get_meta( $id, '_give_goal_option', true );
								$asting_progress_stats = apply_filters( 'asting_progress_stats', $id );


								$asting_count_donor = apply_filters( 'asting_count_donor', $id);

								?>
								<div class="give_detail give_slide2 ">

									<div class="image_future">
										<div class="thumbnail">
											<?php the_post_thumbnail(); ?>

											<div class="media">
												<ul style="display: none;">
													<?php if ( $ova_met_gallery_give ) {
														foreach ( $ova_met_gallery_give as $key => $value ) { ?>
															<li><a href="<?php echo esc_attr( $value ); ?>" data-fancybox="<?php echo esc_attr( $id ); ?>"><img src="<?php echo esc_attr( $value ); ?>" alt="<?php echo esc_attr( $key ); ?>"></a></li>
														<?php }
													} ?>
												</ul>
												<?php if ( $ova_met_gallery_give !='') {?>
													<a href="javascript:;" data-fancybox-trigger="<?php echo esc_attr( $id ); ?>" class="gallery"><i class="icon_images"></i></a>
												<?php } ?>
												<?php if ( $ova_met_media_give !='' && $ova_met_media_give !='javascript:;') {?>
													<a href="<?php echo esc_attr( $ova_met_media_give ); ?>" class="video"><i class="icon_film"></i></a>
												<?php } ?>


											</div>

										</div>

									</div>
									<div class="detail_content">

										<div class="detail_body">


										<?php 
										$give_type  = !is_wp_error( get_the_terms( $id, 'give_forms_category') ) ? get_the_terms( $id, 'give_forms_category') : '' ;

										$value_give_type = array();
										if ( $give_type != '' ) {
											foreach ( $give_type as $value ) {
												$value_give_type[] = $value->term_id ? '<a class="give_type" href="'.get_term_link($value->term_id).'">' .$value->name. '</a>': "";


											}
										}
										?>
									
								


										<?php if ( !empty(array_filter($value_give_type)) ) { ?>

											<div class="post_cat">
												<?php echo implode($value_give_type, '&nbsp;'); ?>
											</div>

										<?php } ?>

										<h3 class=" title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

										<p class="desc"><?php echo esc_html( get_the_excerpt() ); ?></p>


										<?php  { ?>
								<div class="progress">
									<?php if ($asting_progress_stats['progress'] < '50') { ?>
										<div class="project-percent wrap_percentage_1" data-percent= <?php echo esc_attr( $asting_progress_stats['progress'] ); ?>>
											<span class="percentage"><?php echo esc_attr( $asting_progress_stats['progress'].'%' ); ?></span>
										</div>
									<?php } elseif ( $asting_progress_stats['progress'] >= '50') { ?>
										<div class="project-percent wrap_percentage_2" data-percent= <?php echo esc_attr( $asting_progress_stats['progress'] ); ?>>
											<span class="percentage"><?php echo esc_attr( $asting_progress_stats['progress'].'%' ); ?></span>
										</div>
									<?php } ?>
									
								</div>
							<?php } ?>


							<div class="raised">
								<div class="income">


									<span><?php echo esc_html( $asting_progress_stats['actual'] ); ?></span>
									<span><?php esc_html_e( 'Raised', 'ova-framework' ); ?></span>

								</div>



								<?php if ($show_goal != 'disabled') { ?>
									<div class="goal">

										<span><?php echo esc_html( $asting_progress_stats['goal'] ); ?></span>
										<span><?php esc_html_e( 'Goal', 'ova-framework' ); ?></span>
									</div>
								<?php } ?>
							</div>


									</div>
								</div>
								</div>
							<?php endwhile; 
							else: ?>
								<div class="search_not_found">
									<?php esc_html_e( 'Not Found Give Donation', 'ova-framework' ); ?>
								</div>

							<?php endif; wp_reset_postdata(); wp_reset_query(); ?>
						</div>
					</div>
				</div>
			</div>

			<?php
		} else {
			esc_html_e( 'Please active plugins Give Donations', 'ova-framework' );;
		}
	}
}
