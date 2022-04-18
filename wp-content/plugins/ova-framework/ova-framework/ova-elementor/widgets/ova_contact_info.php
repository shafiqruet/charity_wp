<?php

namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_contact_info extends Widget_Base {

	public function get_name() {
		return 'ova_contact_info';
	}

	public function get_title() {
		return __( 'Contact Info', 'ova-framework' );
	}

	public function get_icon() {
		return 'fa fa-map-marker';
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
			'type_link',
			[
				'label' => __( 'Type Link', 'ova-framework' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'tell',
				'options' => [
					'email' => __('Email', 'ova-framework'),
					'tell' => __('Tell', 'ova-framework'),
					'none' => __('None', 'ova-framework'),
				]
			]
		);



		$this->add_control(
			'type',
			[
				'label' => __( 'Type', 'ova-framework' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'type1' => __('Type 1', 'ova-framework'),
					'type2' => __('Type 2', 'ova-framework'),
					'type3' => __('Type 3', 'ova-framework'),
				]
			]
		);


		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'ova-framework' ),
				'show_external' => false,
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
				
			]
		);

		$this->add_control(
			'sub_text_link',
			[
				'label' => __( 'Sub Label', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Have Issues?', 'ova-framework'),
				'condition' => [
					'type' => 'type2',
				]
			]
		);

		$this->add_control(
			'text_link',
			[
				'label' => __( 'Label', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('contact@domain.com', 'ova-framework'),
			]
		);

		$this->add_control(
			'text_link_2',
			[
				'label' => __( 'Label 2', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'type' => 'type1',

				]
			]
		);

		$this->add_control(
			'text_label',
			[
				'label' => __( 'Label 3', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'type' => 'type3',

				]
			]
		);


		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => __( 'Left', 'ova-framework' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ova-framework' ),
						'icon' => 'fa fa-align-center',
					],
					'flex-end' => [
						'title' => __( 'Right', 'ova-framework' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .ova-contact-info' => 'justify-content: {{VALUE}}',
				]
			]
		);

		$this->add_control(
			'class_icon',
			[
				'label' => __( 'Class icon', 'ova-framework' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$this->end_controls_section();


		//section style image
		$this->start_controls_section(
			'section_icon',
			[
				'label' => __( 'Icon', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'font_size_icon',
			[
				'label' => __( 'Font Size', 'ova-framework' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .ova-contact-info .icon i:before' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ova-contact-info .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'color_icon',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-contact-info .icon i:before' => 'color : {{VALUE}};',
					'{{WRAPPER}} .ova-contact-info .icon svg' => 'color : {{VALUE}};'
				],
			]
		);

		$this->add_responsive_control(
			'margin_icon',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-contact-info .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_address',
			[
				'label' => __( 'Address', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'address_typography',
				'selector' => '{{WRAPPER}} .ova-contact-info .address a, {{WRAPPER}} .ova-contact-info .address, {{WRAPPER}} .ova-contact-info .address span ',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'color_address',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-contact-info .address a' => 'color : {{VALUE}};',
					'{{WRAPPER}} .ova-contact-info .address' => 'color : {{VALUE}};',
					'{{WRAPPER}} .ova-contact-info .address span' => 'color : {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'color_address_hover',
			[
				'label' => __( 'Color hover', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-contact-info .address a:hover' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_label',
			[
				'label' => __( 'Color Label', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-contact-info .address a span' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_label_hover',
			[
				'label' => __( 'Color Label Hover', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-contact-info .address a:hover span' => 'color : {{VALUE}};',
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
					'{{WRAPPER}} .ova-contact-info .address' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings();
		$type_link = $settings['type_link'];
		$link = $settings['link']['url'];
		$text_link = $settings['text_link'];

		$type = $settings['type'];
		$sub_text_link = $settings['sub_text_link'];

		$text_link_2 = '';
		if( $type == 'type1' ){
			$text_link_2 = ! empty( $settings['text_link_2'] ) ? ' <span>'.$settings["text_link_2"].'</span>' : '';
		}
		
		$text_label = ( $type == 'type3' ) ? $settings['text_label'] : '';


		$icon = $settings['class_icon'];
		$html_icon = '<i class="'.esc_attr( $icon ).'"></i>';
		switch($type_link) {
			case "email" : {
				$text_link = "<a href='mailto:".esc_attr( $link )."'>".esc_html( $text_link ).$text_link_2."</a>";
				$html_icon = ! empty( $icon ) ? '<i class="'.esc_attr( $icon ).'"></i>' : '<i data-feather="mail"></i>' ;
				break;
			}
			case "tell" : {
				$text_link = "<a href='tel:".esc_attr( $link )."'>".esc_html( $text_link ).$text_link_2."</a>";
				$html_icon = ! empty( $icon ) ? '<i class="'.esc_attr( $icon ).'"></i>' : '<i data-feather="phone-incoming"></i>' ;
				break;
			}

			case "none" : {
				$text_link = $text_link.$text_link_2;
				$html_icon = ! empty( $icon ) ? '<i class="'.esc_attr( $icon ).'"></i>' : '<i data-feather="clock"></i>' ;
				break;
			}

		}
		
		?>
		<div class="ova-contact-info <?php echo esc_attr( $type ) ?>">

			<div class="icon">
				<?php echo $html_icon ?>
			</div>

			<?php if (!empty($text_link)){ ?>
				<div class="address">
					<?php if( $type == 'type2' ){ ?>
						<span class="sub_text_link second_font"><?php echo esc_html( $sub_text_link ) ?></span>
					<?php } ?>
					<?php if( $type == 'type3'){ ?>
						<label ><?php echo esc_html( $text_label ) ?></label>
					<?php } ?>
					<span class="text_link"><?php echo $text_link ?></span>
				</div>
			<?php } ?>
			
		</div>
		<?php

	}
// end render
}


