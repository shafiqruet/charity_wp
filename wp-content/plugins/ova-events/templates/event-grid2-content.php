<?php if ( !defined( 'ABSPATH' ) ) exit(); 

$id = get_the_id();
?>

<div class="ovaev-content content-grid2">
	<div class="item">
		

		<div class="desc">
			<!-- Display Highlight Date 3-->
			<?php do_action( 'ovaev_loop_highlight_date_3', $id ); ?>
			<!-- Thumbnail -->
			<?php do_action( 'ovaev_loop_thumbnail_grid2', $id ); ?>


			<div class="event_post post_grid">

				<!-- Tille -->
				<?php do_action( 'ovaev_loop_title', $id ); ?>

				

				<div class="time-event">
					

					<!-- Date -->
					<?php do_action( 'ovaev_loop_hour', $id ); ?>

					
					<!-- Tille -->
					<?php do_action( 'ovaev_loop_venue', $id ); ?>

				</div>

			</div>

		</div>

	</div>
</div>
