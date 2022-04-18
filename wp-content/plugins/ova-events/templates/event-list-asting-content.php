<?php if ( !defined( 'ABSPATH' ) ) exit(); 
	$id = get_the_id();
?>

<div class="desc">

	<div class="img-box">
		<!-- Date-->
		<?php do_action( 'ovaev_loop_highlight_date_asting', $id ); ?>
		<!-- Thumbnail -->
		<?php do_action( 'ovaev_loop_thumbnail_grid', $id ); ?>
	</div>

	<div class="event_post">
		<!-- Date -->
		<?php do_action( 'ovaev_loop_date_asting', $id ); ?>

		<!-- Tille -->
		<?php do_action( 'ovaev_loop_title', $id ); ?>

		<!-- Description -->
		<?php do_action( 'ovaev_loop_excerpt', $id ); ?>
	</div>

</div>
