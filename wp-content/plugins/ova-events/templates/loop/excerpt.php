<?php if ( !defined( 'ABSPATH' ) ) exit(); 

if( isset( $args['id'] ) ){
	$id = $args['id'];
}else{
	$id = get_the_id();	
}


?>

<p class="event_excerpt">
	<?php echo get_the_excerpt( $id ); ?>
</p>