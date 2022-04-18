<?php
$text_read_more = $args['text_read_more'];
$show_read_more = $args['show_read_more'] != '' ? esc_html( $args['show_read_more'] ) : '';
$term = get_term_by('name', $args['category'], 'event_type');
$term_link = get_term_link( $term );

$events = ovaev_get_events_elements( $args );

?>

<div class="ovaev-event-element version_2 ovaev-event-upcoming" >
	
			<div class="wp-content two_column">
				<?php
					if( $events->have_posts() ) : while( $events->have_posts() ) : $events->the_post();
						
						ovaev_get_template( 'event-up-content.php' );
						
					endwhile; endif; wp_reset_postdata();
				?>
			</div>

		    <div class="title-readmore">

			<?php if( $show_read_more == 'yes' ){ ?>
				<div class="btn_up" ><a href="<?php echo get_post_type_archive_link('event') ?>" class="read-more second_font btn_up_comming" >
					<?php echo esc_html( $text_read_more ) ?>
				</a></div>
			<?php } ?>

		    </div>

</div>
