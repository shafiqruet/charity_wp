<?php if ( !defined( 'ABSPATH' ) ) exit(); 

$post_ID = get_the_ID();
$ovaev_start_date = get_post_meta( $post_ID, 'ovaev_start_date_time', true );
$ovaev_end_date   = get_post_meta( $post_ID, 'ovaev_end_date_time', true );

$date_start    = $ovaev_start_date != '' ? date_i18n(get_option('date_format'), $ovaev_start_date) : '';
$date_end      = $ovaev_end_date != '' ? date_i18n(get_option('date_format'), $ovaev_end_date) : '';
?>

<?php if( ! empty( $date_start ) && ! empty( $date_end ) ) { ?>
	<div class="wrap-date">

		<span class="text second_font">
			<?php echo esc_html__('Date', 'ovaev') ?>
		</span>

		<?php if( $date_start == $date_end && $date_start != '' && $date_end != '' ){ ?>
			<div class="date">
				<span class="second_font general-content"><?php echo esc_html($date_start);?></span>
			</div>
			
		<?php } elseif( $date_start != $date_end && $date_start != '' && $date_end != '' ){ ?>
			<div class="date">
				<span class="second_font general-content"><?php echo esc_html($date_start);?></span>
				<span class="second_font general-content"> - <?php echo esc_html($date_end);?></span>
			</div>
			
		<?php } ?>

		<span class="icon-ovaev">
			<i class="lnr lnr-calendar-full"></i>
		</span>

	</div>
<?php } ?>