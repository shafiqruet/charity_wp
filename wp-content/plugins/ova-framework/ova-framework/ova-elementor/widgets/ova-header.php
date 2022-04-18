<?php
namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class ova_header extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ova_header';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Heading Top Page', 'ova-framework' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'hf' ];
	}

	

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'ova-framework' ),
			]
		);

			
			$this->add_control(
				'header_boxed_content',
				[
					'label'        => __( 'Display Boxed Content', 'ova-framework' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => 'no'
				]
			);

			$this->add_control(
				'header_bg_source',
				[
					'label'        => __( 'Display Background by Feature Image in Post/Page', 'ova-framework' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => 'no'
				]
			);


			// Background Color
			$this->add_control(
				'cover_color',
				[
					'label' => __( 'Background Cover Color', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'default' => 'rgba(0,0,0,0.51)',
					'description' => __( 'You can add background image in Advanced Tab', 'ova-framework' ),
					'selectors' => [
						'{{WRAPPER}} .cover_color' => 'background-color: {{VALUE}};',
					],
					'scheme' => [
						'type' => \Elementor\Scheme_Color::get_type(),
						'value' => \Elementor\Scheme_Color::COLOR_3,
					],
					'separator' => 'after'
				]
			);

			// Title
			$this->add_control(
				'show_title',
				[
					'label'        => __( 'Show Title', 'ova-framework' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => 'yes',
					'selector'	=> '{{WRAPPER}} .ova_header_el .header_title',
				]
			);
			
			$this->add_control(
				'title_color',
				[
					'label' => __( 'Title Color', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#343434',
					'selectors' => [
						'{{WRAPPER}} .ova_header_el .header_title' => 'color: {{VALUE}};',
					],
					'scheme' => [
						'type' => \Elementor\Scheme_Color::get_type(),
						'value' => \Elementor\Scheme_Color::COLOR_3,
					]
				]
			);

			$this->add_responsive_control(
				'title_padding',
				[
					'label' => __( 'Title Padding', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova_header_el .header_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'title_format',
				[
					'label' => __( 'Choose Title Format', 'ova-framework' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'h1' => __('H1', 'ova-framework'),
						'h2' => __('H2', 'ova-framework'),
						'h3' => __('H3', 'ova-framework'),
						'h4' => __('H4', 'ova-framework'),
						'h5' => __('H5', 'ova-framework'),
						'h6' => __('H6', 'ova-framework'),
						'div' => __('DIV', 'ova-framework'),
					],
					'default' => 'h1'
				]
			);

			

			

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'header_title',
					'label' => __( 'Title Typo', 'ova-framework' ),
					'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_3,
					'selector'	=> '{{WRAPPER}} .ova_header_el .header_title',

				]
			);


			// Breadcrumbs
			$this->add_control(
				'show_breadcrumbs',
				[
					'label'        => __( 'Show Breadcrumbs', 'ova-framework' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => 'yes',
					'selector'	=> '{{WRAPPER}} .ovatheme_breadcrumbs_el',
					'separator' => 'before'
				]
			);
			
			$this->add_control(
				'breadcrumbs_color',
				[
					'label' => __( 'Breadcrumbs Color', 'ova-framework' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#343434',
					'selectors' => [
						'{{WRAPPER}} .ova_header_el .ovatheme_breadcrumbs ul.breadcrumb li' => 'color: {{VALUE}};',
						'{{WRAPPER}} .ova_header_el .ovatheme_breadcrumbs ul.breadcrumb li a' => 'color: {{VALUE}};',
						'{{WRAPPER}} .ova_header_el .ovatheme_breadcrumbs ul.breadcrumb a' => 'color: {{VALUE}};',
						'{{WRAPPER}} .ova_header_el .ovatheme_breadcrumbs ul.breadcrumb .separator' => 'color: {{VALUE}};',
					],
					'scheme' => [
						'type' => \Elementor\Scheme_Color::get_type(),
						'value' => \Elementor\Scheme_Color::COLOR_3,
					]
				]
			);

			

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'header_breadcrumbs_typo',
					'label' => __( 'Breadcrumbs Typo', 'ova-framework' ),
					'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_3,
					'selector'	=> '{{WRAPPER}} .ova_header_el .ovatheme_breadcrumbs ul.breadcrumb',
					
				]
			);

			$this->add_responsive_control(
				'breadcrumbs_padding',
				[
					'label' => __( 'Breadcrumbs Padding', 'ova-framework' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova_header_el .ovatheme_breadcrumbs' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			


			// Style
			$this->add_responsive_control(
				'align',
				[
					'label' => __( 'Alignment', 'ova-framework' ),
					'type' => Controls_Manager::CHOOSE,
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
					'selectors' => [
						'{{WRAPPER}}' => 'text-align: {{VALUE}};',
					],
					'default'	=> 'center',
					'separator' => 'before'
				]
			);
			

			$this->add_control(
				'class',
				[
					'label' => __( 'Class', 'ova-framework' ),
					'type' => Controls_Manager::TEXT,
				]
			);

		$this->end_controls_section();

		
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
		$settings = $this->get_settings();

		$class_bg = $attr_style = '';
		if( $settings['header_bg_source'] == 'yes' ){
			$current_id = asting_get_current_id();
			$header_bg_source =  get_the_post_thumbnail_url( $current_id, 'full' );	
			$class_bg = 'bg_feature_img';

			$attr_style = 'style="background: url( '.apply_filters( 'asting_header_bg_customize', $header_bg_source, $header_bg_source ).' )" ';
		}

		 ?>
		 	<!-- Display when you choose background per Post -->
		 	<div class="wrap_ova_header <?php echo esc_attr($class_bg).' '.$settings['align']; ?> " <?php echo $attr_style; ?> >

		 		<?php if( $settings['header_boxed_content'] == 'yes' ){ ?><div class="container"><?php } ?>
			 	
				 	<div class="cover_color"></div>

					<div class="ova_header_el <?php echo esc_attr( $settings['class'] ); ?>">
						
						<?php if( $settings['show_title'] == 'yes' ){ ?>
						
							<?php $title_format = $settings['title_format']; ?>
							<<?php echo $title_format; ?> class="second_font header_title">
								<?php  echo asting_framework_the_title(); ?>
							</<?php echo $title_format; ?>>
								
						<?php } ?>


						<?php if( function_exists( 'asting_breadcrumbs_header' ) && $settings['show_breadcrumbs'] == 'yes' ){ ?>
							<div class="ovatheme_breadcrumbs ovatheme_breadcrumbs_el">
								<?php echo  asting_breadcrumbs_header(); ?>
							</div>
						<?php } ?>

					</div>

				<?php if( $settings['header_boxed_content'] == 'yes' ){ ?> </div> <?php } ?>

			</div>
		<?php
	}

	
}
