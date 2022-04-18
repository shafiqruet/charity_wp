<?php
$data_options['items']              = $args['item_number'];
$data_options['slideBy']            = $args['slides_to_scroll'];
$data_options['margin']             = $args['margin_items'];
$data_options['autoplayHoverPause'] = $args['pause_on_hover'] === 'yes' ? true : false;
$data_options['loop']               = $args['infinite'] === 'yes' ? true : false;
$data_options['autoplay']           = $args['autoplay'] === 'yes' ? true : false;
$data_options['autoplayTimeout']    = $args['autoplay_speed'];
$data_options['smartSpeed']         = $args['smartspeed'];
$data_options['dots']               = $args['dot_control'] === 'yes' ? true : false;
$data_options['nav']                = $args['nav_control'] === 'yes' ? true : false;

$term = get_term_by('name', $args['category'], 'event_type');
$term_link = get_term_link( $term );

$events = ovaev_get_events_elements( $args );

?>

<div class="ovaev-event-element ovaev-event-slide " >
		
	<div class="wp-content ovaev-slide owl-carousel owl-theme" data-options="<?php echo esc_attr(json_encode($data_options)) ?>">
		<?php
			if( $events->have_posts() ) : while( $events->have_posts() ) : $events->the_post();
				
				ovaev_get_template( 'event-grid-content.php' );
				
			endwhile; endif; wp_reset_postdata();
		?>
	</div>

</div>
