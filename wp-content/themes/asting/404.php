<?php get_header();  ?>

<div class="asting_404_page">
	
	<h1 class="title">
		<?php echo esc_html__( 'Ohh! Page Not Found', 'asting' ) ?>
	</h1>
	<p class="desc-404">
		<?php echo esc_html__( 'It looks like nothing was found at this location. Click the button below to return home.', 'asting' ) ?>
	</p>
	<?php get_search_form(); ?>
	<div class="asting-go-home">
		<a href="<?php echo esc_url( home_url('/') ); ?>">
			<?php echo esc_html__( 'Back to Home', 'asting' ) . '<i class="fas fa-arrow-right"></i>' ?>
		</a>
	</div>
	
   
</div>

<?php get_footer(); ?>