<?php

if( !defined( 'ABSPATH' ) ) exit();

global $post;

$lang = OVAEV_Settings::archive_format_date_lang();
$date_format = OVAEV_Settings::archive_event_format_date();
$time = OVAEV_Settings::archive_event_format_time();

$ovaev_start_date 			= get_post_meta( $post->ID, 'ovaev_start_date', true );
$ovaev_end_date   			= get_post_meta( $post->ID, 'ovaev_end_date', true );

$ovaev_start_time   		= get_post_meta( $post->ID, 'ovaev_start_time', true );
$ovaev_end_time   			= get_post_meta( $post->ID, 'ovaev_end_time', true );

$ovaev_start_date_time  	= get_post_meta( $post->ID, 'ovaev_start_date_time', true );
$ovaev_end_date_time 		= get_post_meta( $post->ID, 'ovaev_end_date_time', true );

$ovaev_venue_title      	= get_post_meta( $post->ID, 'ovaev_venue_title', true );
$ovaev_venue_text 			= get_post_meta( $post->ID, 'ovaev_venue_text', true );

$ovaev_address      		= get_post_meta( $post->ID, 'ovaev_address', true );


$checked           			= get_post_meta( $post->ID, 'ovaev_special', true ) ? get_post_meta( $post->ID, 'ovaev_special', true ) : '' ;

$event_custom_sort 			= get_post_meta( $post->ID, 'event_custom_sort', true ) ? get_post_meta( $post->ID, 'event_custom_sort', true ) : '1' ;

?>
<div class="ovaev_metabox">

	<br>
	

	<div class="ovaev_row">
		<label class="label"><strong><?php esc_html_e( 'Start date:', 'ovaev' ); ?></strong></label>
		<input data-date="<?php echo esc_attr( $date_format ) ?>" type="text" id="ovaev_start_date" class="ovaev_start_date" value="<?php echo esc_attr($ovaev_start_date); ?>" placeholder="<?php echo esc_attr( $date_format ) ?>"  name="ovaev_start_date" autocomplete="off" />
	</div>
	<br>

	<div class="ovaev_row">
		<label class="label"><strong><?php esc_html_e( 'Start Time:', 'ovaev' ); ?></strong></label>
		<input data-time="<?php echo esc_attr( $time ) ?>" type="text" id="ovaev_start_time" value="<?php echo esc_attr($ovaev_start_time); ?>" class="ovaev_time_picker" placeholder="<?php echo esc_attr( $time ) ?>"  name="ovaev_start_time" autocomplete="off" />
	</div>
	<br>

	<div class="ovaev_row">
		<label class="label"><strong><?php esc_html_e( 'End date:', 'ovaev' ); ?></strong></label>
		<input data-date="<?php echo esc_attr( $date_format ) ?>" type="text" id="ovaev_end_date" class="ovaev_end_date" value="<?php echo esc_attr($ovaev_end_date); ?>" placeholder="<?php echo esc_attr( $date_format ) ?>"  name="ovaev_end_date" autocomplete="off" />
	</div>
	<br>

	<div class="ovaev_row">
		<label class="label"><strong><?php esc_html_e( 'End Time:', 'ovaev' ); ?></strong></label>
		<input data-time="<?php echo esc_attr( $time ) ?>" type="text" id="ovaev_end_time" value="<?php echo esc_attr($ovaev_end_time); ?>" class="ovaev_time_picker" placeholder="<?php echo esc_attr( $time ) ?>"  name="ovaev_end_time" autocomplete="off" />
	</div>
	<br>

	<div class="ovaev_row">
		<label class="label"><strong><?php esc_html_e( 'Venue Name:', 'ovaev' ); ?></strong></label>
		<input type="text" id="ovaev_venue_title" value="<?php echo esc_attr($ovaev_venue_title); ?>" placeholder="<?php esc_html_e( 'Venue', 'ovaev' ); ?>"  name="ovaev_venue_title" autocomplete="off" />
	</div>
	<br>

	<div class="ovaev_row">
		<label class="label"><strong><?php esc_html_e( 'Venue Text:', 'ovaev' ); ?></strong></label>
		<textarea name="ovaev_venue_text" id="ovaev_venue_text" rows="4" cols="44" style="vertical-align: top;"><?php echo $ovaev_venue_text ? $ovaev_venue_text : esc_html_e( 'Venue Text', 'ovaev' ); ?></textarea>
	</div>
	<br>

	<div class="ovaev_row">
		<label class="label"><strong><?php esc_html_e( 'Address:', 'ovaev' ); ?></strong></label>
		<input type="text" id="ovaev_address" value="<?php echo esc_attr($ovaev_address); ?>" placeholder="<?php esc_html_e( 'New York', 'ovaev' ); ?>"  name="ovaev_address" autocomplete="off" />
	</div>
	<br>

	<div class="ovaev_row">
		<label class="label"><strong><?php esc_html_e( 'Special Event:', 'ovaev' ); ?></strong></label>
		<input type="checkbox" value="<?php echo esc_attr($checked); ?>" name="ovaev_special" <?php echo esc_attr($checked); ?> />
	</div>
	<br>

	<div class="ovaev_row">
		<label class="label"><strong><?php esc_html_e( 'Custom Sort:', 'ovaev' ); ?></strong></label>
		<input type="number" value="<?php echo esc_attr($event_custom_sort); ?>" name="event_custom_sort" />
	</div>
	<br>

</div>

<?php wp_nonce_field( 'ovaev_nonce', 'ovaev_nonce' ); ?>