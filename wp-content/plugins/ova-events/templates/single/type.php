<?php if ( !defined( 'ABSPATH' ) ) exit();
$post_ID = get_the_ID();
?>

<div class="ovaev-category">
	<?php get_category_event_by_id( $post_ID ) ?>
</div>