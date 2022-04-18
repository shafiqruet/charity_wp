<?php if ( !defined( 'ABSPATH' ) ) exit(); 

	$id = get_the_id();
?>

<div class="ovaev-content content-grid">
	<div class="item item-pro">
		
		<!-- Display Highlight Date 2 -->
		<?php do_action( 'ovaev_loop_highlight_date_1', $id ); ?>

		<div class="desc">

			<div class="event_post event_post_pro">

				<!-- Tille -->
				<?php do_action( 'ovaev_loop_title', $id ); ?>

				

				<div class="time-event time-event-pro">
					

					<!-- Date -->
					<?php do_action( 'ovaev_loop_date', $id ); ?>

					
					<!-- Tille -->
					<?php do_action( 'ovaev_loop_venue', $id ); ?>

				</div>
				

				<!-- Read More Button -->
				<?php do_action( 'ovaev_loop_readmore_2', $id ); ?>

			</div>

		</div>

	</div>
</div>
