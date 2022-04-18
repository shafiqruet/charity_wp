<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header();


$event_type_temp = isset( $_GET['event_type_temp'] ) ? $_GET['event_type_temp'] : OVAEV_Settings::archive_event_type();

if( $event_type_temp == 'type2' ) {

	ovaev_get_template( 'archive-event-grid.php' );

}else if( $event_type_temp == 'type3' ) {

	ovaev_get_template( 'archive-event-grid-sidebar.php' );

}else{
	ovaev_get_template( 'archive-event-list.php' );
}

get_footer();
