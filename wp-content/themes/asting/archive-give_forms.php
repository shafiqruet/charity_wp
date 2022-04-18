<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header();

$paged   = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args_base = array(
	'post_type' => 'give_forms',
	'paged' => $paged,
);

$donation_type = get_theme_mod( 'archive_donation_show_sidebar', 'type1' );
$nummber_word = get_theme_mod( 'number_text_donation', '9' );
$limit_des = $nummber_word ? $nummber_word : 9;

if ( isset($_GET['donation_type']) ) {
	$donation_type = $_GET['donation_type'];
}
if( $donation_type == 'type_5'){ 

	$args_base = array(
		'post_type' => 'give_forms',
		'paged' => $paged,
		'posts_per_page' => -1
	
);
						
} 


$give_donation = new WP_Query( $args_base );



?>

<div class="container">
	<div class="archive_give_donation content_related content_archive <?php echo esc_attr($donation_type); ?>">
		<div class="summary">
			<div class="wrap_summary">
				<?php if($give_donation->have_posts() ) : while ( $give_donation->have_posts() ) : $give_donation->the_post(); ?>

					<?php
					$id = get_the_ID();

					$ova_met_gallery_give = get_post_meta( $id, 'ova_met_gallery_give', true ) ? get_post_meta( $id, 'ova_met_gallery_give', true ) : '';
					$ova_met_media_give = get_post_meta( $id, 'ova_met_media_give', true ) ? get_post_meta( $id, 'ova_met_media_give', true ) : 'javascript:;';

					$show_goal = give_get_meta( $id, '_give_goal_option', true );
					$asting_progress_stats = apply_filters( 'asting_progress_stats', $id );


					?>
					<div class="give_detail">

						<div class="image_future">
							<div class="thumbnail">
								<?php the_post_thumbnail(); ?>
							</div>
							<div class="media">
								<ul class="gallery_archive">
									<?php if ( $ova_met_gallery_give ) {
										foreach ( $ova_met_gallery_give as $key => $value ) { ?>
											<li><a href="<?php echo esc_attr( $value ); ?>" data-fancybox="<?php echo esc_attr( $id ); ?>"><img src="<?php echo esc_attr( $value ); ?>" alt="<?php echo esc_attr( $key ); ?>"></a></li>
										<?php }
									} ?>
								</ul>
								<?php if ( $ova_met_gallery_give !='') {?>
									<a href="javascript:;" data-fancybox-trigger="<?php echo esc_attr( $id ); ?>" class="gallery"><i class="icon_images"></i></a>
								<?php } ?>
								<?php if ( $ova_met_media_give !='' && $ova_met_media_give !='javascript:;') {?>
									<a href="<?php echo esc_attr( $ova_met_media_give ); ?>" class="video"><i class="icon_film"></i></a>
								<?php } ?>
							</div>

							<?php 
							$give_type  = !is_wp_error( get_the_terms( $id, 'give_forms_category') ) ? get_the_terms( $id, 'give_forms_category') : '' ;

							$value_give_type = array();
							if ( $give_type != '' ) {
								foreach ( $give_type as $value ) {
									$value_give_type[] = $value->term_id ? '<a class="give_type" href="'.get_term_link($value->term_id).'">' .$value->name. '</a>': "";


								}
							}
							?>
							<?php if ( !empty(array_filter($value_give_type)) ) { ?>

								<div class="post_cat">
									<?php echo implode($value_give_type, '&nbsp;'); ?>
								</div>

							<?php } ?>
							
						</div>
						
						<div class="detail_body">

						

							<h3 class=" title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<?php if( $donation_type != 'type_4'){ ?>
								<p class="desc"><?php echo esc_html(excerpt_des($limit_des)); ?></p>
							<?php }  else { ?>
								<p class="desc"><?php echo esc_html( get_the_excerpt() ); ?></p>

							<?php } ?>

							<?php if ($show_goal != 'disabled') { ?>
								<div class="progress">
									<?php if ($asting_progress_stats['progress'] < '50') { ?>
										<span class="project-percent wrap_percentage_1" data-percent= <?php echo esc_attr( $asting_progress_stats['progress'] ); ?>>
											<span class="percentage"><?php echo esc_attr( $asting_progress_stats['progress'].'%' ); ?></span>
										</span>
									<?php } elseif ( $asting_progress_stats['progress'] >= '50') { ?>
										<span class="project-percent wrap_percentage_2" data-percent= <?php echo esc_attr( $asting_progress_stats['progress'] ); ?>>
											<span class="percentage"><?php echo esc_attr( $asting_progress_stats['progress'].'%' ); ?></span>
										</span>
									<?php } ?>
									
								</div>
							<?php } ?>

							

							<div class="raised">
											<div class="income">

											
												<span><?php echo esc_html( $asting_progress_stats['actual'] ); ?></span>
													<span><?php esc_html_e( 'Raised', 'asting' ); ?></span>

											</div>

										

											<?php if ($show_goal != 'disabled') { ?>
												<div class="goal">
													
													<span><?php echo esc_html( $asting_progress_stats['goal'] ); ?></span>
													<span><?php esc_html_e( 'Goal', 'asting' ); ?></span>
												</div>
											<?php } ?>
										</div>
						</div>
					</div>
				<?php endwhile; 
				else: ?>
					<div class="search_not_found">
						<?php esc_html_e( 'Not Found Give Donation', 'asting' ); ?>
					</div>

				<?php endif; wp_reset_postdata(); ?>
			</div>

			<?php if( $donation_type != 'type_5'){ ?>
		
				<?php asting_pagination_theme($give_donation); ?>
				

			<?php } ?>
			
		</div>


		<div class="sidebar sidebar_give">
			<?php
			do_action( 'give_before_single_form_summary' );
			?>
		</div>
	</div>
</div>


<?php get_footer(); ?>