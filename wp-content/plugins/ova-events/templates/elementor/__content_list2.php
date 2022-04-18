<?php

	$id = get_the_ID();

		
	$ovaev_start_date = get_post_meta( $id, 'ovaev_start_date_time', true );
	$ovaev_end_date   = get_post_meta( $id, 'ovaev_end_date_time', true );

	$date_start  = $ovaev_start_date != '' ? date_i18n( 'M d,Y', $ovaev_start_date ) : '';
	$date_end    = $ovaev_end_date != '' ? date_i18n( 'M d,Y', $ovaev_end_date ) : '';



?>

<div class="item">

	<h3 class="title">
		<a class="second_font" href="<?php echo get_the_permalink( $id ) ?>">
			<?php echo get_the_title( $id ) ?>
		</a>
	</h3>

	<div class="time-event">
		<?php if( $date_start === $date_end && $date_end != '' && $date_start != '' ){ ?>
			<div class="time">
				<span class="icon-time">
					<i data-feather="clock"></i>
				</span>
		<span><?php echo esc_html($date_start);?></span>
			</div>
		<?php } elseif( $date_start != $date_end && $date_end && $date_start != '' ){ ?>
			<div class="time">
				<span class="icon-time">
					<i data-feather="clock"></i>
				</span>
				<span><?php echo esc_html($date_start);?> - <?php echo esc_html($date_end);?></span>
			</div>
		<?php } ?>
	</div>
	
</div>