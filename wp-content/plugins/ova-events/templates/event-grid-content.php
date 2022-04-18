<?php if ( !defined( 'ABSPATH' ) ) exit(); 

	$id = get_the_id();
?>

<div class="ovaev-content content-grid">
	<div class="item">
		
		<!-- Display Highlight Date 2 -->
		<?php do_action( 'ovaev_loop_highlight_date_asting', $id ); ?>

		<div class="desc">

			
			<!-- Thumbnail -->
			<?php do_action( 'ovaev_loop_thumbnail_grid', $id ); ?>

			<div class="event_post">
				
				<!-- Taxonomy Type -->
				<?php do_action( 'ovaev_loop_type', $id ); ?>

				<!-- Title -->
				<?php do_action( 'ovaev_loop_title', $id ); ?>

				

				<div class="time-event">
					

					<!-- Date -->
					<?php do_action( 'ovaev_loop_date', $id ); ?>

					
					<!-- Tille -->
					<?php //do_action( 'ovaev_loop_venue', $id ); ?>

				</div>
				

				<!-- Read More Button -->
				<?php do_action( 'ovaev_loop_readmore_asting', $id ); ?>

			</div>

		</div>

	</div>
</div>
