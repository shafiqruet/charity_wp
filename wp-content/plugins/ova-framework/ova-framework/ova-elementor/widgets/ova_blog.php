<?php
namespace ova_framework\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ova_blog extends Widget_Base {

	public function get_name() {
		return 'ova_blog';
	}

	public function get_title() {
		return __( 'Blog', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	public function get_script_depends() {
		return [ 'script-elementor' ];
	}

	protected function _register_controls() {

		$args = array(
		  'orderby' => 'name',
		  'order' => 'ASC'
		  );

		$categories=get_categories($args);
		$cate_array = array();
		$arrayCateAll = array( 'all' => 'All categories ' );
		if ($categories) {
			foreach ( $categories as $cate ) {
				$cate_array[$cate->cat_name] = $cate->slug;
			}
		} else {
			$cate_array["No content Category found"] = 0;
		}



		//SECTION CONTENT
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'ova-framework' ),
			]
		);

			$this->add_control(
				'category',
				[
					'label' => __( 'Category', 'ova-framework' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'all',
					'options' => array_merge($arrayCateAll,$cate_array),
				]
			);

			$this->add_control(
				'total_count',
				[
					'label' => __( 'Post Total', 'ova-framework' ),
					'type' => Controls_Manager::NUMBER,
					'default' => 3,
				]
			);

			$this->add_control(
				'number_column',
				[
					'label' => __( 'Number Of Columns', 'ova-framework' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'grid_sidebar',
					'options' => [
						'grid_sidebar' => esc_html__( '2 Columns', 'ova-framework' ),
						'grid_medium' => esc_html__( '3 Columns', 'ova-framework' ),
						'grid_small' => esc_html__( '4 Columns', 'ova-framework' ),

						
					]
				]
			);


			$this->add_control(
				'order_by',
				[
					'label' => __('Order', 'ova-framework'),
					'type' => Controls_Manager::SELECT,
					'default' => 'desc',
					'options' => [
						'asc' => __('Ascending', 'ova-framework'),
						'desc' => __('Descending', 'ova-framework'),
					]
				]
			);

		
	

			$this->add_control(
				'text_readmore',
				[
					'label' => __( 'Text Read More', 'ova-framework' ),
					'type' => Controls_Manager::TEXT,
					'default' => __('More', 'ova-framework'),
				]
			);

		

			$this->add_control(
				'show_read_more',
				[
					'label' => __( 'Show Reada More', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => __( 'Show', 'ova-framework' ),
					'label_off' => __( 'Hide', 'ova-framework' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

		$this->end_controls_section();
		//END SECTION CONTENT


		$this->start_controls_section(
			'section_meta',
			[
				'label' => __( 'Meta', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

	

		$this->add_control(
			'color_meta',
			[
				'label' => __( 'Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} article.post-wrap.type-grid .post-date .top ' => 'color : {{VALUE}};',
					'{{WRAPPER}} article.post-wrap.type-grid .post-date .bottom ' => 'color : {{VALUE}};',
				],
			]
		);

			$this->add_control(
			'back_color_meta',
			[
				'label' => __( 'Background Color', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} article.post-wrap.type-grid .post-date' => 'background-color: {{VALUE}}; border-color : {{VALUE}};',
				],
			]
		);


	

		$this->end_controls_section();


		//SECTION TAB STYLE TITLE
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
				'selector' => '{{WRAPPER}} article.post-wrap.type-grid .post-title h2 a',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'color_title',
			[
				'label' => __( 'Color Title', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} article.post-wrap.type-grid .post-title h2 a' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_title_hover',
			[
				'label' => __( 'Color Title Hover', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} article.post-wrap.type-grid .post-title h2 a:hover' => 'color : {{VALUE}};',
				],
			]
		);

	

		$this->end_controls_section();
		//END SECTION TAB STYLE TITLE


		//SECTION TAB STYLE READMORE
		$this->start_controls_section(
			'section_readmore',
			[
				'label' => __( 'Read More', 'ova-framework' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'readmore_typography',
				'selector' => '{{WRAPPER}} article.post-wrap .post-footer .asting-post-readmore a',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'color_readmore',
			[
				'label' => __( 'Color Read More', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} article.post-wrap .post-footer .asting-post-readmore a' => 'color : {{VALUE}};',
				],
			]
		);
				$this->add_control(
			'color_readmore2',
			[
				'label' => __( 'Color Read More Hover', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} article.post-wrap .post-footer .asting-post-readmore a:hover' => 'color : {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'color_readmore_hover',
			[
				'label' => __( 'Background Color Read More ', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} article.post-wrap .post-footer .asting-post-readmore a' => 'background-color: {{VALUE}}; border-color : {{VALUE}};',
				],
			]
		);

			$this->add_control(
			'color_readmore_hover2',
			[
				'label' => __( 'Background Color Read More Hover', 'ova-framework' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} article.post-wrap .post-footer .asting-post-readmore a:hover' => 'background-color: {{VALUE}}; border-color : {{VALUE}};',
				],
			]
		);



		$this->end_controls_section();
		//END SECTION TAB STYLE READMORE

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
		$settings = $this->get_settings_for_display();
		
		$category = $settings['category'];
		$total_count = $settings['total_count'];
		$order = $settings['order_by'];
		$number_column = $settings['number_column'];

		$text_readmore = $settings['text_readmore'];
		$show_read_more = $settings['show_read_more'];


		$args = [];
		if ($category == 'all') {
			$args=[
				'post_type' => 'post',
				'posts_per_page' => $total_count,
				'order' => $order,
			];
		} else {
			$args=[
				'post_type' => 'post', 
				'category_name'=>$category,
				'posts_per_page' => $total_count,
				'order' => $order,
			];
		}

		$blog = new \WP_Query($args);

		?>
		<div class="ova-blog-element">
			<div class="ova-blog grid <?php echo esc_attr( $number_column ) ?>">

			<?php
				if($blog->have_posts()) : while($blog->have_posts()) : $blog->the_post();
					$thumbnail_url = wp_get_attachment_image_url(get_post_thumbnail_id() , 'full' );
			?>
			
			<article class="post-wrap type-grid">
				<div class="wrap-article">
					<?php if(has_post_thumbnail()){ ?>

				        <div class="post-media">
				        	<?php asting_content_thumbnail('full'); /* Display thumbnail of post */ ?>
				        </div>

			        <?php } ?>
					<div class="ova-content">
						
				        <div class="post-meta">
					        <?php asting_content_meta2(); /* Display Date, Author, Comment */ ?>
					    </div>
						

					
				        <div class="post-title">
				            <?php asting_content_title(); /* Display title of post */ ?>
					    </div>
				
					    <?php if( $show_read_more == 'yes' ){ ?> 
				         
					    	<div class="post-footer">
					    		<div class="asting-post-readmore">
					    			<a class="btn btn-theme btn-theme-transparent" href="<?php the_permalink(); ?>"><?php  echo esc_html( $text_readmore ); ?></a>
					    		</div>
					    	</div>
					    <?php }?>
					</div>
				</div>

			</article>
				
			<?php
				endwhile; endif; wp_reset_postdata();
			?>
		</div>
		</div>
		
		<?php
	}
}
