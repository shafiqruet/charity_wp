<?php
namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_image_box extends Widget_Base {

	public function get_name() {
		return 'ova_image_box';
	}

	public function get_title() {
		return __( 'Ova Image Box', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-image-box';
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
					'default' => 'icon-donation',
				]
			);


			$this->add_control(
				'price',
				[
					'label' => __( 'Price', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'default' => __( 86700, 'ova-framework' )
				]
			);

			$this->add_control(
				'text',
				[
					'label' => __( 'Text', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Successfull Campaigns', 'ova-framework' )
				]
			);

			$this->add_control(
				'bg_image_box',
				[
					'label' => __( 'Background', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
	            'display_tabs',
	            [
	                'label' => __( 'Display', 'ova_framework' ),
	                'type' => Controls_Manager::SELECT,
	                'options' => [
	                    'flex' => __( 'Flex', 'ova_framework' ),
	                    'block' => __( 'Block', 'ova_framework' ),
	                ],
	                'default' => 'flex',
	                'selectors' => [
	                    '{{WRAPPER}} .ova-image-box' => 'display: {{VALUE}};',
	                ],
	            ]
	        );

			$this->add_responsive_control(
				'padding_image_box',
				[
					'label' => __( 'Padding Price', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-image-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
			$this->add_responsive_control(
				'margin_image_box',
				[
					'label' => __( 'Padding Price', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-image-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			
			$this->add_control(
				'color_icon',
				[
					'label' => __( 'Color icon ', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box .image-box-icon span' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'icon_typography',
					'selector' => '{{WRAPPER}} .ova-image-box .image-box-icon span',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				]
			);

			$this->add_responsive_control(
				'margin_icon',
				[
					'label' => __( 'Margin ', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-image-box .image-box-icon span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		//price
		$this->start_controls_section(
			'section_price_style',
			[
				'label' => __( 'Price', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			
			$this->add_control(
				'color_price',
				[
					'label' => __( 'Color Price ', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-image-box .image-box-price .price' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'price_typography',
					'selector' => '{{WRAPPER}} .ova-image-box .image-box-price .price',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				]
			);

			$this->add_responsive_control(
				'margin_price',
				[
					'label' => __( 'Margin Price', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-image-box .image-box-price .price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_price',
				[
					'label' => __( 'Padding Price', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-image-box .image-box-price .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .ova-image-box .image-box-price .title' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .ova-image-box .image-box-price .title',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				]
			);

			$this->add_responsive_control(
				'margin_title',
				[
					'label' => __( 'Margin Title', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-image-box .image-box-price .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}}  .ova-image-box .image-box-price .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$price = $settings['price'];
		$text = $settings['text'];
		?>
		
		<div class="ova-image-box" >
			<div class="image-box-icon">
				<span class="<?php echo $class_icon; ?>"></span>
			</div>
			<div class="image-box-price">
				<h2 class="counter"><?php echo $price ? number_format($price) : ''; ?></h2>
				<p class="title"><?php echo $text; ?></p>
			</div>
		</div>
		<?php
	}
}