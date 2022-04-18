<?php
$title = $args['title'] != '' ? esc_html( $args['title'] ) : '';
$show_title = $args['show_title'] != '' ? esc_html( $args['show_title'] ) : '';
$term = get_term_by('name', $args['category'], 'event_type');
$term_link = get_term_link( $term );

$events = ovaev_get_events_elements( $args );

?>

<div class="ovaev-event-element version_1 ovaev_list" >

	<?php if( $show_title == 'yes' ) { ?>
		<h2 class="title-event second_font">
			<?php echo $title ?>
		</h2>

	<?php } ?>


	<?php 

	

	if( $events->have_posts() ) : while( $events->have_posts() ) : $events->the_post();

		echo ovaev_get_template( 'event-list2-content.php' );
		
	endwhile; endif; wp_reset_postdata();
	
	

	?>
</div>
