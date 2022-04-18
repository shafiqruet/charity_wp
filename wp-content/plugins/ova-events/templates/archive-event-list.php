<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header( );

$get_search = isset( $_GET["search_event"] ) ? $_GET["search_event"] : '';

/* Search Event */
if( $get_search == 'search-event' ){

	$events = apply_filters( 'OVAEV_search_event', $_REQUEST );

} else {

	$events = apply_filters( 'OVAEV_event', 10 );
}

?>


<div class="container-event">
	
	<!-- Search form template -->
	<?php do_action( 'ovaev_search_form' ); ?>

	<div class="archive_event">
		<?php $i = 0; ?>
		<?php if($events->have_posts() ) : while ( $events->have_posts() ) : $events->the_post(); ?>
			<?php $odd =  ($i%2) ? 'odd' : 'eve'; ?>
			<div class="<?php echo $odd; ?>">
				<?php ovaev_get_template( 'event-list-content.php' ) ?>
			</div>
			<?php $i++; ?>
		<?php endwhile; 
		else: ?>

			<div class="search_not_found">
				<?php esc_html_e( 'Not Found Events', 'ovaev' ); ?>
			</div>

		<?php endif; wp_reset_postdata(); ?>
		
	</div>

	<?php ovaev_pagination_plugin($events); ?>

</div>

<?php get_footer();