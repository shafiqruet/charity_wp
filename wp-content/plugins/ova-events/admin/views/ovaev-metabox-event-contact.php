<?php

if( !defined( 'ABSPATH' ) ) exit();

global $post;

$ovaev_organizer_title = get_post_meta( $post->ID, 'ovaev_organizer_title', true );

$ovaev_organizer_text = get_post_meta( $post->ID, 'ovaev_organizer_text', true );

$ovaev_organizer_phone     = get_post_meta( $post->ID, 'ovaev_organizer_phone', true );

$ovaev_organizer_email     = get_post_meta( $post->ID, 'ovaev_organizer_email', true );

$ovaev_organizer_website   = get_post_meta( $post->ID, 'ovaev_organizer_website', true );

$ovaev_organizer_address   = get_post_meta( $post->ID, 'ovaev_organizer_address', true );


?>
<div class="ovaev_metabox">

	<br>
	<div class="ovaev_row">
		<label class="label">
			<strong>
				<?php esc_html_e( 'Organizer Name:', 'oavev' ); ?>
			</strong>
		</label>
		<input type="text" id="ovaev_organizer_title" value="<?php echo esc_attr($ovaev_organizer_title); ?>" placeholder="<?php esc_html_e( 'Ovatheme Company', 'ovaev' ); ?>"  name="ovaev_organizer_title" autocomplete="off"/>
	</div>
	<br>

	<div class="ovaev_row">
		<label class="label"><strong><?php esc_html_e( 'Organizer Text:', 'ovaev' ); ?></strong></label>
		<textarea name="ovaev_organizer_text" id="ovaev_organizer_text" rows="4" cols="45" style="vertical-align: top;"><?php echo $ovaev_organizer_text ? $ovaev_organizer_text : esc_html_e( 'Organizer Text', 'ovaev' ); ?></textarea>
	</div>
	<br>
	
	<div class="ovaev_row">
		<label class="label"><strong><?php esc_html_e( 'Phone:', 'oavev' ); ?></strong></label>
		<input type="text" id="ovaev_organizer_phone" value="<?php echo esc_attr($ovaev_organizer_phone); ?>" placeholder="<?php esc_html_e( '0123456789', 'ovaev' ); ?>"  name="ovaev_organizer_phone" autocomplete="off"/>
	</div>
	<br>
	
	<div class="ovaev_row">
		<label class="label"><strong><?php esc_html_e( 'Email:', 'oavev' ); ?></strong></label>
		<input type="text" id="ovaev_organizer_email" value="<?php echo esc_attr($ovaev_organizer_email); ?>" placeholder="<?php esc_html_e( 'info@company.com', 'ovaev' ); ?>"  name="ovaev_organizer_email" autocomplete="off"/>
	</div>
	<br>

	<div class="ovaev_row">
		<label class="label"><strong><?php esc_html_e( 'Address:', 'oavev' ); ?></strong></label>
		<input type="text" id="ovaev_organizer_address" value="<?php echo esc_attr($ovaev_organizer_address); ?>" placeholder="<?php esc_html_e( 'New York', 'ovaev' ); ?>"  name="ovaev_organizer_address" autocomplete="off"/>
	</div>
	<br>


</div>

<?php wp_nonce_field( 'ovaev_nonce', 'ovaev_nonce' ); ?>