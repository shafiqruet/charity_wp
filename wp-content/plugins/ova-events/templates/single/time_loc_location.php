<?php if ( !defined( 'ABSPATH' ) ) exit(); 

$post_ID = get_the_ID();

$event_venue       = get_post_meta( $post_ID, 'ovaev_venue', true);

?>

<?php if( ! empty( $event_venue ) ) { ?>
	<div class="wrap-loc">
		<span class="text second_font">
			<?php echo esc_html__('Location', 'ovaev') ?>
		</span>
		<div class="location">
			<span class="second_font general-content"><?php echo esc_html( $event_venue ) ?></span>
		</div>
		<span class="icon-ovaev">
			<i class="lnr lnr-map-marker"></i>
		</span>
	</div>
<?php } ?>