<?php if ( !defined( 'ABSPATH' ) ) exit();
$post_ID = get_the_ID();
?>

<?php get_tag_event_by_id( $post_ID ) ?>