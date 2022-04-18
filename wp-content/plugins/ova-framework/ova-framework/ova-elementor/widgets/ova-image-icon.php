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

class ova_image_icon extends Widget_Base {

	public function get_name() {
		return 'ova_image_icon';
	}

	public function get_title() {
		return __( 'Ova Image Icon', 'ova-framework' );
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
					'default' => 'icon-heart',
				]
			);

			$this->add_control(
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
				'title',
				[
					'label' => __( 'Title', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Become<br/>Volunteer', 'ova-framework' ),
				]
			);

			$this->add_control(
				'text',
				[
					'label' => __( 'Text', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'There are many of lorem Ipsum, but the majori have suffered alteration in some form.', 'ova-framework' ),
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
						'{{WRAPPER}} .image-icon .image-icon-title .image-icon span' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'icon_typography',
					'selector' => '{{WRAPPER}} .image-icon .image-icon-title .image-icon span',
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
						'{{WRAPPER}}  .image-icon .image-icon-title .image-icon span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();


		//image
		$this->start_controls_section(
			'section_image_style',
			[
				'label' => __( 'Image', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			
			$this->add_responsive_control(
				'image_size',
				[
					'label' => __( 'Width', 'ova-framework' ) . ' (%)',
					'type' => Controls_Manager::SLIDER,
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'size_units' => [ '%' ],
					'range' => [
						'%' => [
							'min' => 5,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .image-icon .image-icon-title .image-icon .image-box img' => 'width: {{SIZE}}%;',
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
						'{{WRAPPER}} .image-icon .image-icon-title .title' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .image-icon .image-icon-title .title',
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
						'{{WRAPPER}} .image-icon .image-icon-title .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .image-icon .image-icon-title .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$url_image = $settings['image']['url'];
		$title = $settings['title'];
		$text = $settings['text'];
		?>
		
		<div class="image-icon">
			<div class="image-icon-title">
				<div class="image-icon">
					<span class="<?php echo $class_icon;?>"></span>
					<div class="image-box">
						<img src="<?php echo $url_image; ?>" alt="">
					</div>
				</div>
				<div class="title"><?php echo $title; ?></div>
			</div>

			<p class="text"><?php echo $text; ?></p>
		</div>

		<?php
	}
}