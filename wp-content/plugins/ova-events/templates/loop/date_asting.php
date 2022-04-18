<?php if ( !defined( 'ABSPATH' ) ) exit();

if( isset( $args['id'] ) ){
	$id = $args['id'];
}else{
	$id = get_the_id();	
}

$time_format = OVAEV_Settings::archive_event_format_time();

$ovaev_start_time = get_post_meta( $id, 'ovaev_start_time', true);
$format_start_time = $ovaev_start_time ? date('h:i a', strtotime($ovaev_start_time)) : '';

$ovaev_end_time = get_post_meta( $id, 'ovaev_end_time', true);
$format_end_time = $ovaev_end_time ? date('h:i a', strtotime($ovaev_end_time)) : '';

$ovaev_address = get_post_meta( $id, 'ovaev_address', true);

?>

<ul>
	<li><i class="far fa-clock"></i><?php echo $format_start_time; ?></li>
	<li><span> / </span></li>
	<li><i class="far fa-map"></i><?php echo $ovaev_address; ?></li>
</ul>