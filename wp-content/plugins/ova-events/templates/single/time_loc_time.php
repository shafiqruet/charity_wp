<?php if ( !defined( 'ABSPATH' ) ) exit(); 

$post_ID = get_the_ID();

$time = OVAEV_Settings::archive_event_format_time();

$ovaev_start_date = get_post_meta( $post_ID, 'ovaev_start_date_time', true );
$ovaev_end_date   = get_post_meta( $post_ID, 'ovaev_end_date_time', true );

$time_start    = $ovaev_start_date != '' ? date_i18n($time, $ovaev_start_date) : '';
$time_end      = $ovaev_end_date != '' ? date_i18n($time, $ovaev_end_date) : '';

?>

<?php if( ! empty( $time_start ) && ! empty( $time_end ) ) { ?>
	<div class="wrap-time">
		<span class="text second_font">
			<?php echo esc_html__('Time', 'ovaev') ?>
		</span>
		<div class="time">
			<span class="second_font general-content"><?php echo esc_html($time_start); ?> - </span>
			<span class="second_font general-content"><?php echo esc_html($time_end); ?></span>
		</div>
		<span class="icon-ovaev">
			<i class="lnr lnr-clock"></i>
		</span>
	</div>
<?php } ?>

