<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header( );

$post_ID = get_the_ID();

$event_venue_title = get_post_meta( $post_ID, 'ovaev_venue_title', true );
$event_venue_text = get_post_meta( $post_ID, 'ovaev_venue_text', true );
$event_venue_address = get_post_meta( $post_ID, 'ovaev_address', true );
$event_map_address = get_post_meta( $post_ID, 'ovaev_map_address', true );
$event_map_lat     = get_post_meta( $post_ID, 'ovaev_map_lat', true );
$event_map_lng     = get_post_meta( $post_ID, 'ovaev_map_lng', true );
$event_map_zoom    = OVAEV_Settings::event_map_zoom();
$show_title = OVAEV_Settings::ovaev_show_title();


$event_organizer_title        = get_post_meta( $post_ID, 'ovaev_organizer_title', true);
$event_organizer_text        = get_post_meta( $post_ID, 'ovaev_organizer_text', true);
$event_organizer_phone       = get_post_meta( $post_ID, 'ovaev_organizer_phone', true);
$event_organizer_email       = get_post_meta( $post_ID, 'ovaev_organizer_email', true);
$event_organizer_website     = get_post_meta( $post_ID, 'ovaev_organizer_website', true);
$event_organizer_address     = get_post_meta( $post_ID, 'ovaev_organizer_address', true);
$event_gallery               = get_post_meta( $post_ID, 'ovaev_gallery_id', true);


$ovaev_start_time = get_post_meta( $post_ID, 'ovaev_start_time', true);
$format_start_time = $ovaev_start_time ? date('h:i a', strtotime($ovaev_start_time)) : '';

$ovaev_end_time = get_post_meta( $post_ID, 'ovaev_end_time', true);
$format_end_time = $ovaev_end_time ? date('h:i a', strtotime($ovaev_end_time)) : '';

$ovaev_start_date = get_post_meta( $post_ID, 'ovaev_start_date_time', true );
$date_start    = $ovaev_start_date != '' ? date_i18n('d F, Y', $ovaev_start_date ) : '';

//list icon
$data_icon = get_post_meta( $post_ID, 'ova_icon_list_group_text', true );
?>

<div class="single_event_details">
		<!-- begin event details top -->
		<section class="event-details-top">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-6">

						<?php if( $event_gallery != '' ) { ?>
							<div class="single_event_image">
								<div class=" single_event_slide owl-carousel owl-theme ">
									<?php
									foreach ( $event_gallery as $items ) { ?>
									
											<div class="gallery-items">
												<?php
												$img_url = wp_get_attachment_image_url( $items, 'large' );
												?>
												<img src="<?php echo esc_url($img_url);?>"  alt="<?php echo get_the_title() ?>" />
											</div>
										
									<?php }  ?>
								</div>
							</div>
							<?php }else {?>

								<div class="single_event_image">
									<?php do_action( 'oavev_single_thumbnail' ); ?>
								</div>

							<?php } ?>


					</div>
					<div class="col-xl-6 col-lg-6">
						<div class="single_event_content">
							<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
								<?php if( $show_title== 'yes' ){ ?>
									<p class="single_event_title"><?php the_title(); ?></p>
								<?php }?>
								<div class="single_event_description">
									<?php the_content(); ?>
								</div>

					 		<?php endwhile; endif; wp_reset_postdata(); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- end event details top -->

		<!-- begin event details bottom -->
		<section class="event-details-bottom">
			<div class="container">
				<div class="row">

					<div class="col-xl-4 col-lg-4 mb-3">
						<div class="single_venue">
							<div class="event-details-bottom-shape"></div>
							<h3 class="venue-title"><?php echo $event_venue_title ? $event_venue_title : esc_html_e('Venue','ovaev'); ?></h3>
							<p class="venue-text"><?php echo $event_venue_text ? $event_venue_text : ''; ?></p>
							<ul class="venue-list">
								<?php if ( !empty($date_start) ) : ?>
									<li><?php echo $date_start; ?></li>
								<?php endif; ?>

								<?php if ( !empty($format_start_time) or !empty($format_end_time) ) : ?>
									<li><?php echo $format_start_time . ' ' . $format_end_time; ?></li>
								<?php endif; ?>

								<?php if ( !empty($event_venue_address) ) : ?>
									<li><?php echo $event_venue_address; ?></li>
								<?php endif; ?>
							</ul>
							<div class="venue-social">
								<?php if ( !empty( $data_icon ) ) : ?>
								<?php foreach ($data_icon as $key => $item_icon) : ?>
									<a href="<?php echo $item_icon['ova_icon_link'] ? $item_icon['ova_icon_link'] : '#' ?>" 

										style="background-color: <?php echo $item_icon['ova_icon_bg'] ? $item_icon['ova_icon_bg'] : '#56b4e5'; ?>;" target="_blank" rel="nofollow">

										<i class="<?php echo $item_icon['ova_icon_class'] ? $item_icon['ova_icon_class'] : 'fab fa-twitter'; ?>"></i>

									</a>
								<?php endforeach; endif; ?>
	                        </div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 mb-3">
						<div class="single_map">
							<?php if( ! empty( $event_map_address ) ) { ?>

							  			<div role="tabpanel" class="tab-pane in active" id="location" 
							  				data-address="<?php echo esc_attr($event_map_address);?>" 
							  				data-lat="<?php echo esc_attr($event_map_lat);?>" 
							  				data-lng="<?php echo esc_attr($event_map_lng);?>" 
							  				data-zoom="<?php echo esc_attr($event_map_zoom); ?>"
							  			></div>

								  	<?php } ?>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 mb-3">
						<div class="single_organizer">
							<div class="event-details-bottom-shape"></div>
							<h3 class="organizer-title"><?php echo $event_organizer_title ? $event_organizer_title : esc_html_e('Organizer','ovaev'); ?></h3>
							<p class="organizer-text"><?php echo $event_organizer_text ? $event_organizer_text : ''; ?></p>
							<ul class="event-organizer-list">
								<?php if ( !empty($event_organizer_phone) ) : ?>
									<li>
										<div class="organizer-icon"><i class="fas fa-phone-square"></i></div>
										<div class="organizer-content">
											<a href="tel:<?php echo str_replace(' ', '', $event_organizer_phone); ?>">
												<?php echo $event_organizer_phone; ?>
											</a>
										</div>
									</li>
								<?php endif; ?>

								<?php if ( !empty($event_organizer_email) ) : ?>
								<li>
									<div class="organizer-icon"><i class="fas fa-envelope"></i></div>
									<div class="organizer-content"><a href="mailto::<?php echo $event_organizer_email; ?>"><?php echo $event_organizer_email; ?></a></div>
								</li>
								<?php endif; ?>

								<?php if ( !empty($event_organizer_address) ) : ?>
								<li>
									<div class="organizer-icon"><i class="fas fa-map-marker-alt"></i></div>
									<div class="organizer-content"><?php echo $event_organizer_address; ?></div>
								</li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</section>
		<!-- end event details bottom -->
</div>


<?php get_footer( );
