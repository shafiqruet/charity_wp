<?php
namespace ova_framework\Widgets;
use Elementor;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class ova_menu_page extends Widget_Base {

	public function get_name() {
		return 'ova_menu_page';
	}

	public function get_title() {
		return __( 'Menu Page', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'hf' ];
	}

	public function get_keywords() {
		return [ 'menu', 'foter' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_menu',
			[
				'label' => __( 'Menu', 'ova-framework' ),
			]
		);


		$menus = \wp_get_nav_menus();
		$list_menu = array();
		foreach ($menus as $menu) {
			$list_menu[$menu->slug] = $menu->name;
		}

		$this->add_control(
			'menu_slug',
			[
				'label' => __( 'Select Menu', 'ova-framework' ),
				'type' => Controls_Manager::SELECT,
				'options' => $list_menu,
				'default' => '',
			]
		);

		$this->add_control(
			'menu_type',
			[
				'label' => __( 'Menu Type', 'ova-framework' ),
				'type' => Controls_Manager::SELECT,
				'options' => array( 
					'type1' => esc_html__( 'Type 1', 'ova-framework' ),
					'type2' => esc_html__( 'Type 2', 'ova-framework' ),
					'type3' => esc_html__( 'Type 3', 'ova-framework' ),
				),
				'default' => 'type1',
			]
		);

		$this->add_control(
			'show_arrow',
			[
				'label' => __( 'Show Arrow', 'ova-framework' ),
				'type' => Controls_Manager::SELECT,
				'options' => array( 
					'yes' => esc_html__( 'Yes', 'ova-framework' ),
					'no' => esc_html__( 'No', 'ova-framework' ),
				),
				'default' => 'no',
			]
		);

		$this->add_control(
			'heading_style',
			[
				'label' => __( 'Style', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'position_active',
			[
				'label' => __( 'Position active', 'ova-framework' ),
				'type' => Controls_Manager::NUMBER,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typo_menu',
				'selector' => '{{WRAPPER}} .ova_menu_page .menu li,{{WRAPPER}} .ova_menu_page .menu li a',
			]
		);

		$this->add_responsive_control(
			'padding_menu',
			[
				'label' => __( 'Padding', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova_menu_page .menu li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin_menu',
			[
				'label' => __( 'Margin', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova_menu_page .menu li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova_menu_page .menu li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'color_menu',
			[
				'label' => __( 'Text Color', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_menu_page .menu li a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'color_menu_hover',
			[
				'label' => __( 'Text Hover', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_menu_page .menu li:hover a' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_control(
			'bg_color_menu',
			[
				'label' => __( 'Text: Background Color', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_menu_page .menu li' => 'background-color: {{VALUE}} ',
				],
			]
		);

		$this->add_control(
			'bg_color_menu_hover',
			[
				'label' => __( 'Text: Background Color Hover', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_menu_page .menu li:hover' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .ova_menu_page .menu li.current-menu-item' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'arrow_color',
			[
				'label' => __( 'Arrow Color', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_menu_page.type1.show-arrow a:before' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'arrow_color_hover',
			[
				'label' => __( 'Arrow Color Hover', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova_menu_page.type1.show-arrow ul li:hover a:before' => 'color: {{VALUE}}',
				],
			]
		);

		


		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		$show_arrow = $settings['show_arrow'];
		$class_show_arrow = $show_arrow === 'yes' ? 'show-arrow' : '';

		$position_active = ! empty( $settings['position_active'] ) ? $settings['position_active'] : '';
		?>
		<div class="ova_menu_page <?php echo $settings['menu_type'] ?> <?php echo $class_show_arrow ?>" data-position_active="<?php echo esc_attr( $position_active ) ?>">
			<?php
			wp_nav_menu( array(
				'menu'              => $settings['menu_slug'],
				'depth'             => 3,
				'container'         => '',
				'container_class'   => '',
				'container_id'      => '',
			));
			?>
		</div>
		<?php 
	}
}