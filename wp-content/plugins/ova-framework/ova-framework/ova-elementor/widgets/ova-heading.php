<?php

namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_heading extends Widget_Base {

	public function get_name() {
		return 'ova_heading';
	}

	public function get_title() {
		return __( 'Ova Heading', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-heading';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	public function get_script_depends() {
		return [ 'script-elementor' ];
	}

	protected function _register_controls() {


		$this->start_controls_section(
			'section_heading_content',
			[
				'label' => __( 'Content', 'ova-framework' ),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => __( 'Sub Title', 'ova-framework' ),
				'type' => Controls_Manager::TEXTAREA,
				'row' => 2,
				'default' => __('Helping Them Today','ova-framework'),
			]
		);

		$this->add_control(
			'html_tag_sub_title',
			[
				'label' => __( 'HTML Sub title Tag', 'ova-framework' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'h4',
				'options' => [
					'h1' => "H1",
					'h2' => "H2",
					'h3' => "H3",
					'h4' => "H4",
					'h5' => "H5",
					'h6' => "H6",
					'div' => "div",
					'span' => "Span",
					'p' => "p",
				]
			]
		);



		$this->add_control(
			'title',
			[
				'label' => __( 'Heading Title', 'ova-framework' ),
				'type' => Controls_Manager::TEXTAREA,
				'row' => 5,
				'default' => __('Help the Poor in Need','ova-framework'),
			]
		);

		$this->add_control(
			'html_tag_title',
			[
				'label' => __( 'HTML Title Tag', 'ova-framework' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [
					'h1' => "H1",
					'h2' => "H2",
					'h3' => "H3",
					'h4' => "H4",
					'h5' => "H5",
					'h6' => "H6",
					'div' => "div",
					'span' => "Span",
					'p' => "p",
				]
			]
		);

		$this->add_control(
			'desc',
			[
				'label' => __( 'Description', 'ova-framework' ),
				'type' => Controls_Manager::TEXTAREA,
				'row' => 2,
				'default' => __('Lorem ipsum dolor sit amet, consectetur notted adipisicing elit sed do eiusmod tempor incididunt ut labore et simply free text dolore magna aliqua lonm andhn.','ova-framework'),
			]
		);

		$this->add_control(
			'html_tag_desc',
			[
				'label' => __( 'HTML Description Tag', 'ova-framework' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'p',
				'options' => [
					'h1' => "H1",
					'h2' => "H2",
					'h3' => "H3",
					'h4' => "H4",
					'h5' => "H5",
					'h6' => "H6",
					'div' => "div",
					'span' => "Span",
					'p' => "p",
				]
			]
		);


		$this->add_responsive_control(
			'align',
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
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .ova-heading' => 'text-align: {{VALUE}}',
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_title',
			[
				'label' => __( 'Content', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'content_margin',
				[
					'label' => __( 'Margin', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_padding',
				[
					'label' => __( 'Padding', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_width',
				[
					'label' => __( 'Width', 'ova-framework' ) . ' (%)',
					'type' => Controls_Manager::SLIDER,
					'tablet_default' => [
						'unit' => 'px',
					],
					'mobile_default' => [
						'unit' => 'px',
					],
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 5,
							'max' => 1000,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-heading' => 'max-width: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_sub_title',
			[
				'label' => __( 'Sub Title', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sub_title_typography',
				'selector' => '{{WRAPPER}} .ova-heading .sub_title',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'color_sub_title',
			[
				'label' => __( 'Color ', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-heading .sub_title' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin_sub_title',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-heading .sub_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		

		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Title', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ova-heading .title',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
			]
		);

		$this->add_control(
			'color_title',
			[
				'label' => __( 'Color ', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-heading .title' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin_title',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-heading .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_desc',
			[
				'label' => __( 'Description', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .ova-heading .desc',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'color_desc',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-heading .desc' => 'color : {{VALUE}};',
				],
			]
		);


		$this->add_responsive_control(
			'margin_desc',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-heading .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();

		$sub_title = $settings['sub_title'];
		$title = $settings['title'];
		$desc = $settings['desc'];
		
		$tag_sub_title = $settings['html_tag_sub_title'];
		$tag_title = $settings['html_tag_title'];
		$tag_desc = $settings['html_tag_desc'];
		
	
		?>
		<div class="ova-heading">

			<?php if (!empty($sub_title)) : ?>
				<<?php echo esc_attr($tag_sub_title) ?> class="sub_title thrid_font"><?php echo ($sub_title) ?></<?php echo esc_attr($tag_sub_title) ?>>
			<?php endif ?>
			
			<?php if (!empty($title)) : ?>
				<<?php echo esc_attr($tag_title) ?> class="title second_font"><?php echo ($title) ?></<?php echo esc_attr($tag_title) ?>>
			<?php endif ?>

			<?php if (!empty($desc)) : ?>
				<<?php echo esc_attr($tag_desc) ?> class="desc"><?php echo ($desc) ?></<?php echo esc_attr($tag_desc) ?>>
			<?php endif ?>

		</div>
		<?php

	}
}


