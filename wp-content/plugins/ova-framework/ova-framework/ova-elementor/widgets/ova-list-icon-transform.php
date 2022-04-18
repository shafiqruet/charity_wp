<?php
namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_list_icon_transform extends Widget_Base {

	public function get_name() {
		return 'ova_list_icon_transform';
	}

	public function get_title() {
		return __( 'Ova List Icon Transform', 'ova-framework' );
	}

	public function get_icon() {
		return 'fas fa-bars';
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

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'class_icon',
				[
					'label' => __( 'Class Icon', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
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
				'text',
				[
					'label' => __( 'Text', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
				]
			);

			$this->add_control(
				'tabs_transform',
				[
					'label' => __( 'Tabs', 'ova-framework' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'class_icon' => __( 'icon-salad', 'ova-framework' ),
							'title' => __( 'Healthy Food', 'ova-framework' ),
							'text' => __('There are many variations of but the majority have simply free text suffered.', 'ova-framework'),
						],
						[   
							'class_icon' => __( 'icon-water', 'ova-framework' ),
							'title' => __( 'Clean Water', 'ova-framework' ),
							'text' => __('There are many variations of but the majority have simply free text suffered.', 'ova-framework'),
						],					
					],
				]
			);
			
		$this->end_controls_section();
	//end section content

		
	//begin section content style
		//border
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
						'{{WRAPPER}} .ova-list-icon-transform ul li' => 'border-color: {{VALUE}};',
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
						'{{WRAPPER}} .ova-list-icon-transform ul li' => 'border-width: {{SIZE}}{{UNIT}};',
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
				'color_icon_transform',
				[
					'label' => __( 'Color icon ', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-list-icon-transform ul li span' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'icon_transform_typography',
					'selector' => '{{WRAPPER}} .ova-list-icon-transform ul li span',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				]
			);

			$this->add_responsive_control(
				'margin_icon_transform',
				[
					'label' => __( 'Margin ', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-list-icon-transform ul li span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .ova-list-icon-transform ul li .list-text .title' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .ova-list-icon-transform ul li .list-text .title',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				]
			);

			$this->add_responsive_control(
				'margin_title',
				[
					'label' => __( 'Margin', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-list-icon-transform ul li .list-text .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}}  .ova-list-icon-transform ul li .list-text .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		//text
		$this->start_controls_section(
			'section_text_style',
			[
				'label' => __( 'Text', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			
			$this->add_control(
				'color_text',
				[
					'label' => __( 'Color Title ', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-list-icon-transform ul li .list-text .text' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography',
					'selector' => '{{WRAPPER}} .ova-list-icon-transform ul li .list-text .text',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				]
			);

			$this->add_responsive_control(
				'margin_text',
				[
					'label' => __( 'Margin', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-list-icon-transform ul li .list-text .text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_text',
				[
					'label' => __( 'Padding', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-list-icon-transform ul li .list-text .text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
	//end section content style
		
	}

	//render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$tabs = $settings['tabs_transform'];
		?>
		
		<?php if ( !empty($tabs) ) : ?>
			<div class="ova-list-icon-transform" >
				<ul>
					<?php foreach ( $tabs as $item ) : ?>
						<li>
							<span class="<?php echo esc_html__( $item['class_icon'] ); ?>"></span>
							<div class="list-text">
								<h4 class="title"><?php echo $item['title']; ?></h4>
								<p class="text"><?php echo $item['text']; ?></p>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php
		endif;
	}
}