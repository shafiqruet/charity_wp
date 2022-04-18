<?php if ( !defined( 'ABSPATH' ) ) exit();

if( isset( $args['id'] ) ){
	$id = $args['id'];
}else{
	$id = get_the_id();	
}


$ovaev_start_date = get_post_meta( $id, 'ovaev_start_date_time', true );
$date_event    = $ovaev_start_date != '' ? date_i18n('d', $ovaev_start_date ) : '';
$month_event = $ovaev_start_date != '' ? date_i18n('M', $ovaev_start_date ) : '';
// $week_day      = $ovaev_start_date != '' ? date_i18n('l', $ovaev_start_date ) : '';

if( $ovaev_start_date != '' ){ ?>

<div class="date-event">

	<div class="date"><?php echo esc_html($date_event , 'ovaev');?></div>

	<div class="month"><?php echo esc_html($month_event, 'ovaev');?></div>

</div>

<?php } ?>