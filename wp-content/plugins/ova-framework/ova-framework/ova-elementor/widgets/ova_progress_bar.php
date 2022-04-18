<?php

namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use WP_Query;
use Give_Donate_Form;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_progress_bar extends Widget_Base {

	public function get_name() {
		return 'ova_progress_bar';
	}

	public function get_title() {
		return __( 'Progress Bar', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	public function get_script_depends() {

		wp_enqueue_script( 'appear', OVA_PLUGIN_URI.'assets/libs/appear/appear.js', array('jquery'), false, true );
		return [ 'script-elementor' ];
	}

	protected function _register_controls() {

		/***** Layout Section *****/
		$this->start_controls_section(
			'section_layout',
			[
				'label' => __( 'Layout', 'ova-framework' ),
			]
		);


			$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'ova-framework' ),
				'type' => Controls_Manager::TEXTAREA,
				'row' => 5,
				'default' => __('Donations','ova-framework'),
			]
		);

		$this->add_control(
			'number',
			[
				'label' => __( 'Number Percentage', 'ova-framework' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 50,
			]
		);


		$this->end_controls_section();
		/***** End Layout Section *****/



		/***** Style Section *****/
		$this->start_controls_section(
			'content_style',
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
					'{{WRAPPER}} .ova_progress_bar .title_per ' => 'color : {{VALUE}} !important;',
				],
			]
		);
		

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typo_title',
				'selector' => '{{WRAPPER}} .ova_progress_bar .title_per',
			]
		);

		

		$this->add_responsive_control(
			'padding_title',
			[
				'label' => __( 'Padding', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova_progress_bar .title_per ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		/***** End Title Section *****/


		/***** Description Section *****/

			$this->add_control(
			'color_desc',
			[
				'label' => __( 'Color Number', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_progress_bar .progress .percentage  ' => 'color : {{VALUE}} !important;',
				],
			]
		);
	

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typo_desc',
				'selector' => '{{WRAPPER}} .ova_progress_bar .progress .percentage ',
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
			'color_pro2',
			[
				'label' => __( 'Background Color Progress', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_progress_bar .progress ' => 'background-color : {{VALUE}} !important;',
				],
			]
		);

		$this->end_controls_section();

	}
	

	protected function render() {
		$settings = $this->get_settings();

	
		$title = $settings['title'];
		$number= $settings['number'];

		?>
		<div class="ova_progress_bar">
			<div class="title_per"> <?php echo esc_attr($title );?></div>
			<div class="progress">
				<div class="project-percent" data-percent= <?php echo esc_attr($number ); ?>>
					<span class="percentage"><?php echo esc_attr( $number.'%' ); ?></span>
				</div>
			</div>
		</div>


	    <?php
									
}
}
