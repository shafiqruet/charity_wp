<?php if ( !defined( 'ABSPATH' ) ) exit(); 

if( isset( $args['id'] ) ){
	$id = $args['id'];
}else{
	$id = get_the_id();	
}


?>

<div class="event-thumbnail event-thumbnail_up" style="background-image: url(<?php echo get_the_post_thumbnail_url( $id, 'large' )?>);">
	<a href="<?php echo get_the_permalink( $id ); ?>">
	<?php echo get_the_post_thumbnail( $id, 'large' )?></a>
</div>