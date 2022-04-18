<?php if ( !defined( 'ABSPATH' ) ) exit();

if( !class_exists( 'OVAEV_loadmore' ) ){
	class OVAEV_loadmore{

		public function __construct(){

			add_action( 'wp_ajax_filter_elementor_grid', array( $this, 'filter_elementor_grid') );
			add_action( 'wp_ajax_nopriv_filter_elementor_grid', array( $this, 'filter_elementor_grid') );

			
		}

	

		/* Ajax Load Post Click Elementor */
		public static function filter_elementor_grid() {

			$filter = $_POST['filter'];
			$order = $_POST['order'];
			$orderby = $_POST['orderby'];
			$number_post = $_POST['number_post'];
			$column = $_POST['column'];
			$first_term = $_POST['first_term'];
			$term_id_filter_string = $_POST['term_id_filter_string'];
			$show_featured = $_POST['show_featured'];

			$args_base = array(
				'post_type' => 'event',
				'post_status' => 'publish',
				'posts_per_page' => $number_post,
				'order' => $order,
				'orderby' => $orderby,
			);
			$term_id_filter = explode(', ', $term_id_filter_string);

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

			if ($filter != 'all') {
				$args_cat = array(
					'tax_query' => array(
						array(
							'taxonomy' => 'event_type',
							'field'    => 'id',
							'terms'    => $filter,
						)
					)
				);


				$args = array_merge_recursive($args_cat, $args_base, $args_featured);
				$my_posts = new WP_Query( $args );
				// var_dump($my_posts);

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

				$args = array_merge_recursive($args_base, $args_cat, $args_featured);
				$my_posts = new WP_Query( $args );
			}
			
			?>

			<?php
			if( $my_posts->have_posts() ) : while( $my_posts->have_posts() ) : $my_posts->the_post();

				$id = get_the_ID();

				$ovaev_cat = get_the_terms( $id, 'event_type' );

				$cat_name = array();
				if ($ovaev_cat != '') {
					foreach ($ovaev_cat as $key => $value) {
						$cat_name[] = $value->name;
					}
				}
				$category_name = join(', ', $cat_name);
				?>

				<div class="wrap_item ">
					<div class="item ">
						
							<?php ovaev_get_template( 'event-grid2-content.php' ); ?>
					
					</div>	
				</div>

			<?php endwhile; endif; wp_reset_postdata(); ?>
			<?php
			wp_die();
		}



	}
	new OVAEV_loadmore();
}
?>