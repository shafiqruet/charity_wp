<?php

namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use WP_Query;
use Give_Donate_Form;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_give_donation extends Widget_Base {

	public function get_name() {
		return 'ova_give_donation';
	}

	public function get_title() {
		return __( 'Give Donation', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-price-list';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	public function get_script_depends() {
		return [ 'script-elementor' ];
	}

	protected function _register_controls() {

	
		$this->start_controls_section(
			'section_content_cat',
			[
				'label' => __( 'Category', 'ova-framework' ),
			]
		);
		$this->add_control(
			'color_cat',
			[
				'label' => __( 'Background Color Button', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element_give_donation .give_detail .post_cat a' => 'background-color : {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'color_cat2',
			[
				'label' => __( 'Background Color Hover Button', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element_give_donation .give_detail .post_cat a:hover' => 'background-color : {{VALUE}} !important;',
				],
			]
		);

		

		$this->end_controls_section();


		/***** Title Section *****/
		$this->start_controls_section(
			'section_content_title',
			[
				'label' => __( 'Title', 'ova-framework' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typo_title',
				'selector' => '{{WRAPPER}} .element_give_donation .detail_body .title a ',
			]
		);

		$this->add_control(
			'color_title',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element_give_donation .detail_body .title a ' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_title_hover',
			[
				'label' => __( 'Color Hover', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element_give_donation .detail_body .title a:hover ' => 'color : {{VALUE}};',
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
					'{{WRAPPER}} .element_give_donation .detail_body .title a ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/***** End Title Section *****/


		/***** Description Section *****/
		$this->start_controls_section(
			'section_content_desc',
			[
				'label' => __( 'Description', 'ova-framework' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typo_desc',
				'selector' => '{{WRAPPER}} .element_give_donation .detail_body .desc ',
			]
		);

		$this->add_control(
			'color_desc',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element_give_donation .detail_body .desc ' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding_desc',
			[
				'label' => __( 'Padding', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .element_give_donation .detail_body .desc ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/***** End Description Section *****/

		/***** Progress Section *****/
		$this->start_controls_section(
			'section_progress',
			[
				'label' => __( 'Progress', 'ova-framework' ),
			]
		);


			$this->add_control(
			'color_progress',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element_give_donation .detail_body .progress .percentage ' => 'color : {{VALUE}} !important;',
				],
			]
		);
			$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typo_progress',
				'selector' => '{{WRAPPER}}  .element_give_donation .detail_body .progress .percentage ',
			]
		);

				$this->add_control(
			'color_pro',
			[
				'label' => __( 'Background Color Progress', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project-percent' => 'background-color : {{VALUE}} !important;',
				],
			]
		);


		$this->end_controls_section();
		/***** End Progress Section *****/


		/***** Raised Section *****/
		$this->start_controls_section(
			'section_raised',
			[
				'label' => __( 'Raised', 'ova-framework' ),
			]
		);

		$this->add_control(
			'number_raised_heading',
			[
				'label' => __( 'Number', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'color_number_raised',
			[
				'label' => __( 'Color Number', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element_give_donation .detail_body .raised .income span:first-child,.element_give_donation .detail_body .raised .goal span:first-child   ' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_raised_typography',
				'label' => __( 'Typography', 'ova-framework' ),
				'selector' => '{{WRAPPER}} .element_give_donation .detail_body .raised .income span:first-child,.element_give_donation .detail_body .raised .goal span:first-child   ',
			]
		);

		$this->add_control(
			'text_raised_heading',
			[
				'label' => __( 'Text', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'color_text_raised',
			[
				'label' => __( 'Color Text', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element_give_donation .detail_body .raised .income span:last-child,.element_give_donation .detail_body .raised .goal span:last-child  ' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_raised_typography',
				'label' => __( 'Typography', 'ova-framework' ),
				'selector' => '{{WRAPPER}} .element_give_donation .detail_body .raised .income span:last-child,.element_give_donation .detail_body .raised .goal span:last-child  ',
			]
		);

		$this->end_controls_section();
		/***** End Raised Section *****/


		/***** End Donate Section *****/
		$this->start_controls_section(
			'section_content_donate',
			[
				'label' => __( 'Donate', 'ova-framework' ),
			]
		);

		$this->add_control(
			'text_donate',
			[
				'label' => __( 'Text', 'ova-framework' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Donate',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typo_donate',
				'selector' => '{{WRAPPER}} .element_give_donation .give_detail .button_donate a ',
			]
		);

		$this->add_responsive_control(
			'padding_donate',
			[
				'label' => __( 'Padding', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .element_give_donation .give_detail .button_donate a ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_donate_style' );

		$this->start_controls_tab(
			'tab_donate_normal',
			[
				'label' => __( 'Normal', 'elementor' ),
			]
		);

		$this->add_control(
			'donate_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .element_give_donation .give_detail .button_donate a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'donate_background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element_give_donation .give_detail .button_donate a' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'donate_border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element_give_donation .give_detail .button_donate a' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_donate_hover',
			[
				'label' => __( 'Hover', 'elementor' ),
			]
		);

		$this->add_control(
			'donate_hover_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element_give_donation .give_detail .button_donate a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'donate_background_hover_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element_give_donation .give_detail .button_donate a:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'donate_hover_border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element_give_donation .give_detail .button_donate a:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();


		$this->end_controls_section();
		/***** End Donate Section *****/

	}

	protected function render() {
		$settings = $this->get_settings();

		$text_donate = $settings['text_donate'];
	

		$paged   = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$args_base = array(
			'post_type' => 'give_forms',
			'posts_per_page' => '1'
		);
		$give_donation = new WP_Query( $args_base );

		if(in_array('give/give.php', apply_filters('active_plugins', get_option('active_plugins')))) {
			?>
				
				<div class="element_give_donation">

					<?php if($give_donation->have_posts() ) : while ( $give_donation->have_posts() ) : $give_donation->the_post(); ?>
						<?php
						$id = get_the_ID();

						$ova_met_gallery_give = get_post_meta( $id, 'ova_met_gallery_give', true ) ? get_post_meta( $id, 'ova_met_gallery_give', true ) : '';
						$ova_met_media_give = get_post_meta( $id, 'ova_met_media_give', true ) ? get_post_meta( $id, 'ova_met_media_give', true ) : 'javascript:;';

						$show_goal = give_get_meta( $id, '_give_goal_option', true );
						$asting_progress_stats = apply_filters( 'asting_progress_stats', $id );


						$asting_count_donor = apply_filters( 'asting_count_donor', $id);

						?>
					
		<div class="give_detail">


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

									
									<div class="detail_body">

										<h3 class=" title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

										<p class="desc"><?php echo esc_html( get_the_excerpt() ); ?></p>


										<?php if ($show_goal != 'disabled') { ?>
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

									<div class="button_donate">
										<a href="<?php the_permalink(); ?>"><i class="fas fa-heart"></i><?php echo esc_html($text_donate); ?></a>
									</div>
								</div>
					<?php endwhile; 
					else: ?>
						<div class="search_not_found">
							<?php esc_html_e( 'Not Found Give Donation', 'asting' ); ?>
						</div>

					<?php endif; wp_reset_postdata(); wp_reset_query(); ?>

				</div>

			<?php
		} else {
			esc_html_e( 'Please active plugins Give Donations', 'ova-framework' );;
		}
	}
}
?>