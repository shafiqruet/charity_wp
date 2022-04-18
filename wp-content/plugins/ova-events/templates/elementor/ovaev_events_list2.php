<?php
$term = get_term_by('name', $args['category'], 'event_type');
$term_link = get_term_link( $term );

$events = ovaev_get_events_elements( $args );

?>

<div class="ovaev-event-element version_1 ovaev_list" >

	<?php 

	

	if( $events->have_posts() ) : while( $events->have_posts() ) : $events->the_post();

		echo ovaev_get_template( 'event-list3-content.php' );
		
	endwhile; endif; wp_reset_postdata();
	
	

	?>
</div>
