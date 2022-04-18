<?php if ( !defined( 'ABSPATH' ) ) exit(); 
	$id = get_the_id();
?>

<div class="ovaev_list_content3">
		<div class="desc">
			<!-- Display Highlight Date 3-->
			<?php do_action( 'ovaev_loop_highlight_date_3', $id ); ?>
			<!-- Thumbnail -->

			<div class="event_post">

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
