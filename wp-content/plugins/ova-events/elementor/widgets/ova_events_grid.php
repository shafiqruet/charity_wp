<?php
namespace ova_ovaev_elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_events_grid extends Widget_Base {

	public function get_name() {
		return 'ova_events_grid';
	}

	public function get_title() {
		return __( 'Event Filter Ajax', 'ovaev' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	public function get_script_depends() {
		wp_enqueue_script( 'slick-script', OVAEV_PLUGIN_URI.'assets/libs/slick/slick/slick.min.js', array('jquery'), false, true );
		wp_enqueue_style( 'owl-carousel', OVAEV_PLUGIN_URI.'assets/libs/owl-carousel/assets/owl.carousel.min.css' );
		wp_enqueue_script( 'owl-carousel', OVAEV_PLUGIN_URI.'assets/libs/owl-carousel/owl.carousel.min.js', array('jquery'), false, true );
		
		return [ 'script-elementor' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_setting',
			[
				'label' => __( 'Settings', 'ovaev' ),
			]
		);

		$this->add_control(
			'heading_setting_layout',
			[
				'label' => __( 'Layout', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		

		$this->add_control(
			'type',
			[
				'label' => __( 'Type', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'grid',
				'options' => [
					'grid' => __( 'Grid', 'ovaev' ),
					'full_width'  => __( 'Full Width', 'ovaev' ),
				],
			]
		);

		$this->add_responsive_control(
			'filter_align',
			[
				'label' => __( 'Alignment', 'ovaev' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'flex-start' => [
						'title' => __( 'Left', 'ovaev' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ovaev' ),
						'icon' => 'fa fa-align-center',
					],
					'flex-end' => [
						'title' => __( 'Right', 'ovaev' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .ovapo_project_grid .button-filter' => 'justify-content: {{VALUE}}',
				],
				'toggle' => false,
			]
		);


		$this->add_control(
			'heading_setting_post',
			[
				'label' => __( 'Setting Post', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'number_post',
			[
				'label' => __( 'Number Post', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 8,
			]
		);

		$this->add_control(
			'orderby_post',
			[
				'label' => __( 'OrderBy Post', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date' => __( 'Date', 'ovaev' ),
					'id'  => __( 'ID', 'ovaev' ),
					'title' => __( 'Title', 'ovaev' ),
				],
			]
		);

		$this->add_control(
			'order_post',
			[
				'label' => __( 'Order Post', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC' => __( 'Ascending', 'ovaev' ),
					'DESC'  => __( 'Descending', 'ovaev' ),
				],
			]
		);

		$this->add_control(
			'exclude_cat',
			[
				'label' => __( 'Excluded Categories', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => 'ID category',
				'description' => 'ID category, example: 5, 7'
			]
		);

		$this->add_control(
			'show_filter',
			[
				'label' => __( 'Show Filter', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'ovaev' ),
				'label_off' => __( 'Hide', 'ovaev' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_all',
			[
				'label' => __( 'Show All', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'ovaev' ),
				'label_off' => __( 'Hide', 'ovaev' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_featured',
			[
				'label' => __( 'Show Only Featured', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'ovaev' ),
				'label_off' => __( 'Hide', 'ovaev' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'owl_margin',
			[
				'label' => __( 'Margin', 'evaev' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 30,
			]
		);

		$this->add_control(
			'owl_show_nav',
			[
				'label' => __( 'Show Nav', 'evaev' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);



		$this->add_control(
			'owl_autoplay',
			[
				'label' => __( 'Autoplay', 'evaev' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
			]

		);

		$this->add_control(
			'owl_autoplay_speed',
			[
				'label' => __( 'Autoplay Speed (ms)', 'evaev' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
				'condition' => [
					'owl_autoplay' => 'yes',
				],
				
			]
		);

		$this->add_control(
			'owl_loop',
			[
				'label' => __( 'Infinite Loop', 'evaev' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'owl_lazyload',
			[
				'label' => __( 'Lazy Load', 'evaev' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'owl_nav_prev',
			[
				'label' => __( 'Class Nav Prev', 'evaev' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'arrow_carrot-left',
				'placeholder' => 'arrow_carrot-left'
			]
		);

		$this->add_control(
			'owl_nav_next',
			[
				'label' => __( 'Class Nav Next', 'evaev' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'arrow_carrot-right',
				'placeholder' => 'arrow_carrot-right'
			]
		);

		$this->add_control(
				'text_read_more',
				[
					'label'       => __( 'All Events Button', 'ovaev' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => esc_html__( 'See All Events', 'ovaev' ),
				]
			);

		$this->add_control(
				'show_read_more',
				[
					'label'        => __( 'Show All Events Button', 'ovaev' ),
					'type'         => Controls_Manager::SWITCHER,
					'return_value' => 'yes',
					'default'      => 'yes',
					'separator'    => 'before',
				]
			);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_fillter',
			[
				'label' => __( 'Button Fillter', 'ovaev' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_filter_typo',
				'label' => __( 'Typography', 'ovaev' ),
				'selector' => '{{WRAPPER}} .ovapo_project_grid .button-filter button',
			]
		);

		$this->add_control(
			'button_filter_color',
			[
				'label' => __( 'Color', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ovapo_project_grid .button-filter button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_filter_color_hover',
			[
				'label' => __( 'Color Hover', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ovapo_project_grid .button-filter button:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_filter_color_active',
			[
				'label' => __( 'Color Active', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ovapo_project_grid .button-filter button.active' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_filter_padding',
			[
				'label' => __( 'Padding', 'ovaev' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ovapo_project_grid .button-filter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'ovaev' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'background_heading',
			[
				'label' => __( 'Background', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'item_background',
				'label' => __( 'Background', 'ovaev' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ovapo_project_grid .items',
			]
		);

		$this->add_control(
			'title_heading',
			[
				'label' => __( 'Title', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
			

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ovapo_project_grid .content .items .item .desc .post_grid .event_title a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'label' => __( 'Hover', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ovapo_project_grid .content .items .item .desc .post_grid .event_title a:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'day_color',
			[
				'label' => __( 'Background day Color', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .ovapo_project_grid .content .items .item .desc .date-event' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
				
					'{{WRAPPER}} .ovapo_project_grid .content .items .item .desc .post_grid .time-event i ' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ovapo_project_grid .content .items .item .desc .post_grid .time-event svg ' => 'color: {{VALUE}}',
					
				],
			]
		);
		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Button Color', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}}  .btn_grid .btn_grid_event' => 'color: {{VALUE}}',
				],
			]
		);
			$this->add_control(
			'AllEvent_color',
			[
				'label' => __( 'Hover Button Color', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}}  .btn_grid .btn_grid_event:hover' => 'color: {{VALUE}};border-color: {{VALUE}}',
				],
			]
		);


		$this->add_control(
			'nav_hover_bg_color',
			[
				'label' => __( 'Backgroud Color: Navigation Button Hover', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}}  .ovapo_project_slide .grid .owl-nav button:hover' => 'background-color: {{VALUE}}!important;border-color: {{VALUE}}!important;',
				],
			]
		);	
		$this->add_control(
			'nav_hover_color',
			[
				'label' => __( 'Color: Navigation Button Hover', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}}  .ovapo_project_slide .grid .owl-nav button:hover i:before' => 'color: {{VALUE}}!important;',
				],
			]
		);

		$this->add_control(
			'loading_color',
			[
				'label' => __( 'Color Loading', 'ovaev' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FF0000',
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}}  .ovapo_project_grid .wrap_loader .loader circle' => 'stroke: {{VALUE}}!important;',
				],
			]
		);	

		
		

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings();

		$number_post = $settings['number_post'];
		$order_post = $settings['order_post'];
		$orderby_post = $settings['orderby_post'];
		$type = $settings['type'];
		$show_all = $settings['show_all'];
		$show_featured = $settings['show_featured'];
		$show_filter = $settings['show_filter'];
		$exclude_cat = $settings['exclude_cat'];
		$text_read_more = $settings['text_read_more'];
        $show_read_more = $settings['show_read_more'] != '' ? esc_html( $settings['show_read_more'] ) : '';
        

		$cat_exclude = array(
			'exclude' => explode(", ",$exclude_cat), 
		);


		$terms = get_terms('event_type', $cat_exclude);
		$count = count($terms);

		$term_id_filter = array();
		foreach ( $terms as $term ) {
			$term_id_filter[] = $term->term_id;
		}

		$term_id_filter_string = implode(", ", $term_id_filter);
		$first_term = '';
		if( $terms ){
			$first_term = $terms[0]->term_id;	
		}
		
		$args_base = array(
			'post_type' => 'event',
			'post_status' => 'publish',
			'posts_per_page' => $number_post,
			'order' => $order_post,
			'orderby' => $orderby_post,
		);


		/* Show Featured */
		if ($show_featured == 'yes') {
			$args_featured = array(
				'meta_key' => 'ovaev_special',
				'meta_query'=> array(
					array(
						'key' => 'ovaev_special',
						'compare' => '=',
						'value' => 'checked',
					)
				)
			);
		} else {
			$args_featured = array();
		}

		if ($show_all !== 'yes' && $first_term != '' ) {
			$args_cat = array(
				'tax_query' => array(
					array(
						'taxonomy' => 'event_type',
						'field'    => 'id',
						'terms'    => $first_term,
					)
				)
			);

			$args = array_merge_recursive($args_cat, $args_base, $args_featured);
			$my_posts = new \WP_Query( $args );

		} else {
			$args_cat = array(
				'tax_query' => array(
					array(
						'taxonomy' => 'event_type',
						'field'    => 'id',
						'terms'    => $term_id_filter,
					)
				)
			);

			$args = array_merge_recursive($args_cat, $args_base, $args_featured);
			$my_posts = new \WP_Query( $args );
		}

		

		$owl_nav_prev = $settings['owl_nav_prev'];
		$owl_nav_next = $settings['owl_nav_next'];
		$owl_show_nav         = ( 'yes' === $settings['owl_show_nav'] ) ? true : false;
		$owl_margin           = $settings['owl_margin'];
		$owl_autoplay         = ( 'yes' === $settings['owl_autoplay'] ) ? true : false;
		$owl_loop             = ( 'yes' === $settings['owl_loop'] ) ? true : false;
		$owl_lazyload         = ( 'yes' === $settings['owl_lazyload'] ) ? true : false;
		$owl_autoplay_speed   = $settings['owl_autoplay_speed'];
		$owl_mouseDrag        = $my_posts->found_posts == 1 ? false : true;

		$data = [
			'items'           => 2,
			'margin'          => $owl_margin,
			'dots'            => false,
			'nav'             => $owl_show_nav,
			'autoplay'        => $owl_autoplay,
			'autoplayTimeout' => $owl_autoplay_speed,
			'loop'            => $owl_loop,
			'lazyLoad'        => $owl_lazyload,
			'mouseDrag'       => $owl_mouseDrag,
			'navText' => [
				'<i class="'.$owl_nav_prev.'"></i>',
				'<i class="'.$owl_nav_next.'"></i>'
			],
			'responsive' => [
				'0'  => [
					'items'  => 1,
				],
				'768'  => [
					'items'  => 2,
					// 'dots' => $owl_show_dots_mobile,
				],
				'1024'  => [
					'items'  => 3,
				]
			]
		];

		?>
		<?php if( $my_posts->have_posts() ): ?>
			

			<div class="ovapo_project_grid <?php echo esc_attr($type); ?>">
				<?php if ($show_filter == 'yes') { ?>
					<div class="button-filter <?php echo esc_attr($type == 'full_width' ? 'container' : '' );?> ">
						<?php if ($show_all == 'yes') { ?>
							<button data-filter="<?php echo esc_attr( 'all' ); ?>" data-order="<?php echo esc_attr($order_post); ?>" data-orderby="<?php echo esc_attr($orderby_post); ?>" data-first_term="<?php echo esc_attr($first_term); ?>" data-term_id_filter_string="<?php echo esc_attr($term_id_filter_string); ?>" data-number_post="<?php echo esc_attr($number_post); ?>" data-column='<?php echo esc_attr($column); ?>' data-show_featured="<?php echo esc_attr($show_featured); ?>" class="second_font" >
								<?php esc_html_e( 'All', 'ovaev' ); ?>
							</button>
						<?php } ?>

						<?php if ( $count > 0 ){
							foreach ( $terms as $term ) { ?>
								<button data-filter="<?php echo esc_attr($term->term_id); ?>" data-order="<?php echo esc_attr($order_post); ?>" data-orderby="<?php echo esc_attr($orderby_post); ?>" data-first_term="<?php echo esc_attr($first_term); ?>" data-term_id_filter_string="<?php echo esc_attr($term_id_filter_string); ?>" data-number_post="<?php echo esc_attr($number_post); ?>" data-column='<?php echo esc_attr($column); ?>' data-show_featured="<?php echo esc_attr($show_featured); ?>" class="second_font" 
									>
									<?php esc_html_e( $term->name, 'ovaev' ); ?>
								</button>
							<?php }
						} ?>
					</div>
				<?php } ?>
				
				<div class="content ovapo_project_slide">
					<div  class="items grid owl-carousel owl-theme" data-owl="<?php echo esc_attr(wp_json_encode( $data )); ?>">
						<?php while( $my_posts->have_posts() ) : $my_posts->the_post(); 

							$id = get_the_ID();

							$ovapo_cat = get_the_terms( $id, 'event_type' );

							$cat_name = array();
							if ($ovapo_cat != '') {
								foreach ($ovapo_cat as $key => $value) {
									$cat_name[] = $value->name;
								}
							}
							$category_name = join(', ', $cat_name);
							?>

							<div class="wrap_item <?php echo esc_attr($column); ?>">
								<div class="item ">
									
										<?php ovaev_get_template( 'event-grid2-content.php' ); ?>
									
								</div>	
							</div>
						<?php endwhile ?>
					</div>

		    <div class="title-readmore">

			<?php if( $show_read_more == 'yes' ){ ?>
				<div class="btn_grid" ><a href="<?php echo get_post_type_archive_link('event') ?>" class="read-more second_font btn_grid_event" >
					<?php echo esc_html( $text_read_more ) ?>
				</a></div>
			<?php } ?>

		    </div>

					<div class="wrap_loader">
						<svg class="loader" width="50" height="50">
							<circle cx="25" cy="25" r="10" stroke="#a1a1a1"/>
							<circle cx="25" cy="25" r="20" stroke="#a1a1a1"/>
						</svg>
					</div>
				</div>

			</div>

		<?php else : 
			?>
			<div class="search_not_found">
				<?php esc_html_e( 'Not Found Project', 'ovaev' ); ?>
			</div>
		<?php endif ?>
		<?php
	}
}
?>