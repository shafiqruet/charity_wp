<?php

$term = get_term_by('name', $args['category'], 'event_type');
$term_link = get_term_link( $term );

$events = ovaev_get_events_elements( $args );

?>

<div class="ovaev-event-element version_2 ovaev-event-program" >
	
			<div class="wp-content three_column">
				<?php
					if( $events->have_posts() ) : while( $events->have_posts() ) : $events->the_post();
						
						ovaev_get_template( 'event-pro-content.php' );
						
					endwhile; endif; wp_reset_postdata();
				?>
			</div>

</div>
