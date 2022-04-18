<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<div class="ova_single_give_form">
	<div class="container">
		<?php
		

		while ( have_posts() ) : the_post();

			give_get_template_part( 'single-give-form/content', 'single-give-form' );
					     
		endwhile;

		
		?>
	</div>
</div>

<?php get_footer(); ?>