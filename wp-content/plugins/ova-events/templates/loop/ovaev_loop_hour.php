<?php if ( !defined( 'ABSPATH' ) ) exit();

if( isset( $args['id'] ) ){
	$id = $args['id'];
}else{
	$id = get_the_id();	
}



$time_format = OVAEV_Settings::archive_event_format_time();

$ovaev_start_date = get_post_meta( $id, 'ovaev_start_date_time', true );
$ovaev_end_date   = get_post_meta( $id, 'ovaev_end_date_time', true );



$time_start    = $ovaev_start_date != '' ? date_i18n( $time_format, $ovaev_start_date ) : '';
$time_end      = $ovaev_end_date != '' ? date_i18n( $time_format, $ovaev_end_date ) : '';
?>

<div class="time equal-date">
	<span class="icon-time">
		
		<!-- <i class="far fa-clock icon_event"></i> -->
		<i data-feather="clock"></i>
	</span>
	<span class="time-date-child">


		<span> <?php echo esc_html($time_start); ?> - </span>
		<span><?php echo esc_html($time_end); ?></span>
	</span>
</div>