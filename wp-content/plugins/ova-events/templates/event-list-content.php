<?php if ( !defined( 'ABSPATH' ) ) exit(); 
	$id = get_the_id();
?>

<div class="ovaev-content content-list">

	<!-- Display Highlight Date 1 -->

	<div class="extra-event">
		<div class="desc">
			<!-- Date -->
			<?php do_action( 'ovaev_loop_highlight_date_1', $id ); ?>

			<!-- Thumbnail -->
			<div class="event-thumbnail">
				<?php do_action( 'ovaev_loop_thumbnail_list', $id ); ?>

				<!-- Taxonomy Type -->
				<?php do_action( 'ovaev_loop_type', $id ); ?>
			</div>

			<div class="event_post">

				<!-- Tille -->
				<?php do_action( 'ovaev_loop_title', $id ); ?>

				<div class="time-event">

					<!-- Date -->
					<?php do_action( 'ovaev_loop_date', $id ); ?>								

				</div>

				<!-- Read More Button -->
				<?php do_action( 'ovaev_loop_readmore', $id ); ?>

			</div>
		</div>
	</div>
</div>