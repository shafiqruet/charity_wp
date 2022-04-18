<?php
$version = $args['version'];
$column = $args['column'];
$text_read_more = $args['text_read_more'];
$title = $args['title'] != '' ? esc_html( $args['title'] ) : '';

$show_title = $args['show_title'] != '' ? esc_html( $args['show_title'] ) : '';
$show_read_more = $args['show_read_more'] != '' ? esc_html( $args['show_read_more'] ) : '';

$term = get_term_by('name', $args['category'], 'event_type');
$term_link = get_term_link( $term );

$events = ovaev_get_events_elements( $args );

?>

<div class="ovaev-event-element <?php echo esc_attr( $version ) ?>" >

	<?php if( $show_title == 'yes' && $version == 'version_1' ) { ?>
		<h2 class="title-event">
			<?php echo $title ?>
		</h2>
	<?php } ?>

	<?php if( ( $show_title == 'yes' || $show_read_more == 'yes' ) && $version == 'version_2') { ?>
			
		<div class="title-readmore">

			<?php if( $show_title == 'yes' ) { ?>
				<h2 class="title-event">
					<?php echo $title ?>
				</h2>
			<?php } ?>

			<?php if( $show_read_more == 'yes' ){ ?>
				<a href="<?php echo get_post_type_archive_link('event') ?>" class="read-more second_font">
					<?php echo esc_html( $text_read_more ) ?>
					<i data-feather="chevron-right"></i>
				</a>
			<?php } ?>

		</div>

	<?php } ?>


	<?php 

		if( $version == 'version_1' ){ 

			if( $events->have_posts() ) : while( $events->have_posts() ) : $events->the_post();

				echo ovaev_get_template( 'elementor/__content_list.php' );
			
			endwhile; endif; wp_reset_postdata();
		
		} elseif( $version == 'version_2' ){ ?>

		
			<div class="wp-content <?php echo esc_attr( $column ) ?>">
				<?php
					if( $events->have_posts() ) : while( $events->have_posts() ) : $events->the_post();
						
						ovaev_get_template( 'event-grid-content.php' );
						
					endwhile; endif; wp_reset_postdata();
				?>
			</div>

		<?php } 
		elseif( $version == 'version_3' ){ ?>

				<?php
					if( $events->have_posts() ) : while( $events->have_posts() ) : $events->the_post();
						
						ovaev_get_template( 'elementor/__content_list2.php' );
						
					endwhile; endif; wp_reset_postdata();
				?>

		<?php } ?>
</div>
