<?php get_header(); ?>
<?php $global_layout = apply_filters( 'asting_theme_sidebar','' );
$class_no_sidebar = '';
$flag_has_sidebar_woo = true;
if( asting_is_woo_active() ){
	$class_no_sidebar = ( is_cart() || is_checkout() ) ? 'no_sidebar_woo' : '';
	$flag_has_sidebar_woo = ( is_cart() || is_checkout() ) ? false : true;
}
 ?>
	<div class="wrap_site <?php echo esc_attr($global_layout); ?> <?php echo esc_attr( $class_no_sidebar ) ?>">
		<div id="main-content" class="main">
			<?php					
			if ( have_posts() ) : while ( have_posts() ) : the_post();
			    get_template_part( 'content/content', 'page' );
			    if ( comments_open() ) comments_template( '', true );
				endwhile; else : ?>
			        <p><?php esc_html_e('Sorry, no pages matched your criteria.', 'asting'); ?></p>
			<?php endif; ?>	
		</div> <!-- #main-content -->
	<?php 
		if( $flag_has_sidebar_woo ){
			get_sidebar(); 
		}
		?>
	</div> <!-- .wrap_site -->

<?php get_footer(); ?>