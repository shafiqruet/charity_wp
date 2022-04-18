<?php
if ( ! defined( 'ABSPATH' ) ) exit();

	if( isset( $args['id'] ) && $args['id'] ){
		$pid = $args['id'];
	}else{
		$pid = get_the_id();
	}
	 $category = $args['category'];

	$events = OVAEV_get_data::get_order_rent_time( $category );

	$title = $args['title'] != '' ? esc_html( $args['title'] ) : '';
    $show_title = $args['show_title'] != '' ? esc_html( $args['show_title'] ) : '';

    



	
?>


<?php if( $show_title == 'yes' ) { ?>
	<h2 class="title_event_calen second_font">
		<?php echo $title ?>
	</h2>

<?php } ?>

		<div id="<?php echo 'calendar'.$pid ?>" data-id="<?php echo 'calendar'.$pid ?>"
             class="ovaev_events_calendar cal1"
			 events='<?php echo $events; ?>'
		></div>
	
 