<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'give_before_single_form' );

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}

$id = get_the_ID();

$ova_met_media_give = get_post_meta( $id, 'ova_met_media_give', true ) ? get_post_meta( $id, 'ova_met_media_give', true ) : '';
$ova_met_gallery_give = get_post_meta( $id, 'ova_met_gallery_give', true ) ? get_post_meta( $id, 'ova_met_gallery_give', true ) : '';



$show_goal = give_get_meta( $id, '_give_goal_option', true );
$asting_progress_stats = apply_filters( 'asting_progress_stats', $id );

$show_content = give_get_meta( $id, '_give_display_content', true );
$content = get_post_meta( $id, '_give_form_content', true );

$asting_count_donor = apply_filters( 'asting_count_donor', $id);

$show_title = get_theme_mod( 'show_hide_title_give', 'yes' );

$nummber_word = get_theme_mod( 'number_text_donation', '9' );
$limit_des = $nummber_word ? $nummber_word : 9; 




?>


<div id="give-form-<?php the_ID(); ?>-content" <?php post_class(); ?>>

	<div class="sidebar sidebar_give">
		<?php
		do_action( 'give_before_single_form_summary' );
		?>
	</div>

	<div class="<?php echo apply_filters( 'give_forms_single_summary_classes', 'summary entry-summary' ); ?>">


		<div class=" content_fist">
		 
		<div class="image_future">
			<div class="thumbnail">
				<?php the_post_thumbnail($id); ?>
			</div>
			<div class="media">
				<ul class="gallery">
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

				<div class="share_social icon_give">
					<span class="asting-svg-icon">
						<i class="fas fa-share-alt"></i>
					</span>
					<?php echo apply_filters( 'ova_share_social', get_the_permalink(), get_the_title() ); ?>
				</div>
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

		
		<div class="donation">


			<?php if (isset($asting_progress_stats)) { ?>

				<div class="ova_info_donation" data-donate_now_btn="<?php esc_html_e( 'Donate Now', 'asting' ); ?>">

					<?php if ( $show_goal != 'disabled' ) { ?>
						<div class="progress">

						

							<span  class="project-percent" data-percent= <?php echo esc_attr( $asting_progress_stats['progress'] ); ?>  >
									
								<?php if ($show_goal != 'disabled') { ?>
									<span class="percentage">
										<?php echo esc_html( $asting_progress_stats['progress'] . '%' ); ?>
									</span>
								<?php } ?>
							
							</span>
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


					<?php
					remove_action( 'give_single_form_summary', 'give_template_single_title', 5 );
					remove_action( 'give_pre_form_output', 'give_form_content', 10 );
					remove_action( 'give_pre_form', 'give_show_goal_progress', 10 );
					do_action( 'give_single_form_summary' );

					/* Add action */
					add_action( 'give_single_form_summary', 'give_template_single_title', 5 );
					add_action( 'give_pre_form_output', 'give_form_content', 10, 2 );
					add_action( 'give_pre_form', 'give_show_goal_progress', 10, 2 );

					?>


				</div>
			<?php } ?>


	
			
		</div>


	</div>




	<div class="icon_give_form">
         
		<?php if( $show_title== 'yes' ){ ?> 
			<h1 class=" title"><?php the_title(); ?></h1>
		<?php }?>

		<div id="description">
			<?php the_content(); ?>
		</div>

	</div>


			

			<?php
			$give_type  = !is_wp_error( get_the_terms( $id, 'give_forms_category') ) ? get_the_terms( $id, 'give_forms_category') : '' ;

			$value_give_type = array();

			if ( $give_type != '' ) {

				foreach ( $give_type as $value ) 
					$value_give_type[] = $value->term_id ;




				$args_base = array(
								'post_type' => 'give_forms',
								'post__not_in' => array($id),
			                    'showposts'	=>	2,
			                    'tax_query' => array(
						        	array(
						        		'taxonomy' => 'give_forms_category',
						        		'field'    => 'term_id',
						        		'terms'    => $value_give_type,
						        	),
			        			) );
			}else{
				$args_base = array(
								'post_type' => 'give_forms',
								'post__not_in' => array($id),
			                    'showposts'=>2, 
			                    );
			}

			$give_donation = new WP_Query( $args_base );


		

			?>

	<div class="give_related_wrap">
		<div class="archive_give_donation content_related ">
			   <span class="title_related"><?php esc_html_e('Related Causes','asting'); ?></span>
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
									<ul class="archive_gallery">
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

								<p class="desc"><?php echo esc_html(excerpt_des($limit_des)); ?></p>

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
				
			</div>


		
		</div>
	</div>

 	<?php  if ( comments_open($id) || get_comments_number($id) ) { ?>
		<div id="comment">
			<?php comments_template(); ?>
		</div>
	<?php } ?>





</div> <!-- End Content -->
	

</div>

