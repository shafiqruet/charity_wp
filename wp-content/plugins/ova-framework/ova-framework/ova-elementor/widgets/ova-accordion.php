<?php
namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_accordion extends Widget_Base {

	public function get_name() {
		return 'ova_accordion';
	}

	public function get_title() {
		return __( 'Ova Accordion', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-accordion';
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
				'label' => __( 'Accordion', 'ova-framework' ),
			]
		);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'acc_title',
				[
					'label' => __( 'Title', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
				]
			);

			$repeater->add_control(
				'acc_text',
				[
					'label' => __( 'Text', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
				]
			);

			$this->add_control(
				'acc_tabs',
				[
					'label' => __( 'Accordion Items', 'ova-framework' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'acc_title' => __( 'How to process the charity functions?', 'ova-framework' ),
							'acc_text' => __( 'There are many variations of passages of available but the majority have suffered alteration in that some form by words which don’t look even as slightly believable now.', 'ova-framework' ),
						],
						[   
							'acc_title' => __( 'How to process the charity functions?', 'ova-framework' ),
							'acc_text' => __( 'There are many variations of passages of available but the majority have suffered alteration in that some form by words which don’t look even as slightly believable now.', 'ova-framework' ),
						],
						[   
							'acc_title' => __( 'How to process the charity functions?', 'ova-framework' ),
							'acc_text' => __( 'There are many variations of passages of available but the majority have suffered alteration in that some form by words which don’t look even as slightly believable now.', 'ova-framework' ),
						],						
					],
				]
			);

			$this->add_control(
				'html_tag_title',
				[
					'label' => __( 'Title HTML Tag', 'ova-framework' ),
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

			$this->add_control(
				'class_icon',
				[
					'label' => __( 'Class Icon', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => 'fa-plus fas',
				]
			);

			$this->add_control(
				'class_icon_active',
				[
					'label' => __( 'Class Icon Active', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => 'fas fa-minus',
				]
			);

		$this->end_controls_section();
	//end section content

	//begin section style
		//accordion
		$this->start_controls_section(
			'section_acc_style',
			[
				'label' => __( 'Accordion', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'acc_margin',
				[
					'label' => __( 'Margin', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}}  .ova-accordion .accordion-items' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'color_border',
				[
					'label' => __( 'Color', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-accordion .accordion-items .accordion-header' => 'border-color: {{VALUE}};',
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
						'{{WRAPPER}} .ova-accordion .accordion-items .accordion-header' => 'border-width: {{SIZE}}{{UNIT}};',
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
				'bg_title',
				[
					'label' => __( 'Background', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-accordion .accordion-items .accordion-header .accordion-title' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_title',
				[
					'label' => __( 'Color', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-accordion .accordion-items .accordion-header .accordion-title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .ova-accordion .accordion-items .accordion-header .accordion-title',
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
						'{{WRAPPER}} .ova-accordion .accordion-items .accordion-header .accordion-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .ova-accordion .accordion-items .accordion-header .accordion-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'icon_align',
				[
					'label' => __( 'Alignment', 'ova-framework' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Start', 'ova-framework' ),
							'icon' => 'eicon-h-align-left',
						],
						'right' => [
							'title' => __( 'End', 'ova-framework' ),
							'icon' => 'eicon-h-align-right',
						],
					],
					'default' => 'right',
				]
			);

			$this->add_control(
				'color_icon',
				[
					'label' => __( 'Color', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-accordion .accordion-items .accordion-header span' => 'color: {{VALUE}};',
						'{{WRAPPER}} .ova-accordion .accordion-items #icon-left span' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'icon_space',
				[
					'label' => __( 'Spacing', 'ova-framework' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-accordion .accordion-items .accordion-header span' => 'right: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-accordion .accordion-items #icon-left span' => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'icon_size',
				[
					'label' => __( 'Size', 'ova-framework' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-accordion .accordion-items .accordion-header span' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'icon_top',
				[
					'label' => __( 'Top', 'ova-framework' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-accordion .accordion-items .accordion-header span' => 'top: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-accordion .accordion-items #icon-left span' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		//content
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Content', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'bg_text',
				[
					'label' => __( 'Background', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-accordion .accordion-items .accordion-body' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'color_text',
				[
					'label' => __( 'Color', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-accordion .accordion-items .accordion-body .accordion-content' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'content_typography',
					'selector' => '{{WRAPPER}} .ova-accordion .accordion-items .accordion-body .accordion-content',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				]
			);

			$this->add_responsive_control(
				'margin_content',
				[
					'label' => __( 'Margin', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-accordion .accordion-items .accordion-body .accordion-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_content',
				[
					'label' => __( 'Padding', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-accordion .accordion-items .accordion-body .accordion-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();	
		
	//end section style
		
	}

	//render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$icon = $settings['class_icon'];
		$icon_active = $settings['class_icon_active'];
		$tabs = $settings['acc_tabs'];
		$html_tag_title = $settings['html_tag_title'];
		$icon_align = $settings['icon_align'];
		?>
		<div id="icon_active" class="<?php echo esc_html($icon_active); ?>"></div>
		<div id="icon" class="<?php echo esc_html($icon); ?>"></div>
		<?php if ( !empty($tabs) ) : ?>
		<div class="ova-accordion">

			<?php foreach ($tabs as $key => $items) : ?>
				<div class="accordion-items" <?php echo $icon_align == 'left' ? 'id="icon-left"' : ''; ?>>
					<div class="accordion-header" <?php echo $key == 1 ? 'id="acc-active"' : ''; ?>>
						<<?php echo $html_tag_title; ?> class="accordion-title"><?php echo $items['acc_title']; ?></<?php echo $html_tag_title; ?>>

						<?php if ( $key == 1 ): ?>
							<span class="<?php echo esc_html($icon_active); ?>"></span>
						<?php else: ?>
							<span class="<?php echo esc_html($icon); ?>"></span>
						<?php endif; ?>
						
					</div>
					<div class="accordion-body <?php echo $key == 1 ? 'active' : ''; ?>">
						<p class="accordion-content"><?php echo $items['acc_text'] ?></p>
					</div>
				</div>
			<?php endforeach; ?>

		</div>

		<?php 
		endif;
	}
}