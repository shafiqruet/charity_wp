<?php if ( !defined( 'ABSPATH' ) ) exit(); 
	$id = get_the_id();
?>

<div class="event-list">

	<!-- Display Highlight Date 1 -->
	<?php do_action( 'ovaev_loop_highlight_date_4', $id ); ?>

				<!-- Tille -->
	<?php do_action( 'ovaev_loop_title', $id ); ?>

				
</div>