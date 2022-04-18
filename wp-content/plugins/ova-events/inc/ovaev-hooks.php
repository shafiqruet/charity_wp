<?php if ( !defined( 'ABSPATH' ) ) exit();



/* Filter Breadcrumbs */
add_filter( 'ovaev_breadcrumbs_li', 'ovaev_breadcrumbs_li' );
function ovaev_breadcrumbs_li(){
    if( is_tax( 'event_tag' ) ){
        return esc_html__( 'Tag', 'ovaev' );
    }
    if( is_tax( 'event_type' ) ){
        return esc_html__( 'Type', 'ovaev' );
    }
}


// Search Form action
add_action( 'ovaev_search_form', 'ovaev_search_form' );
function ovaev_search_form(){
    return ovaev_get_template( 'search_form.php' );
}

// Highlight date 1 action
add_action( 'ovaev_loop_highlight_date_1', 'ovaev_loop_highlight_date_1', 10, 1 );
function ovaev_loop_highlight_date_1( $id = '' ){
    return ovaev_get_template( 'loop/highlight_date_1.php', array( 'id' => $id ) );
}

// Highlight date 2 action
add_action( 'ovaev_loop_highlight_date_2', 'ovaev_loop_highlight_date_2', 10, 1 );
function ovaev_loop_highlight_date_2( $id = '' ){
    return ovaev_get_template( 'loop/highlight_date_2.php', array( 'id' => $id ) );
}

// Highlight date 3 action
add_action( 'ovaev_loop_highlight_date_3', 'ovaev_loop_highlight_date_3', 10, 1 );
function ovaev_loop_highlight_date_3( $id = '' ){
    return ovaev_get_template( 'loop/highlight_date_3.php', array( 'id' => $id ) );
}

// Highlight date 4 action
add_action( 'ovaev_loop_highlight_date_4', 'ovaev_loop_highlight_date_4', 10, 1 );
function ovaev_loop_highlight_date_4( $id = '' ){
    return ovaev_get_template( 'loop/highlight_date_4.php', array( 'id' => $id ) );
}

// Highlight date 5 action
add_action( 'ovaev_loop_highlight_date_asting', 'ovaev_loop_highlight_date_asting', 10, 1 );
function ovaev_loop_highlight_date_asting( $id = '' ){
    return ovaev_get_template( 'loop/highlight_date_asting.php', array( 'id' => $id ) );
}

add_action( 'ovaev_loop_hour', 'ovaev_loop_hour', 10, 1 );
function ovaev_loop_hour( $id = '' ){
    return ovaev_get_template( 'loop/ovaev_loop_hour.php', array( 'id' => $id ) );
}



// THumbanil archive event list
add_action( 'ovaev_loop_thumbnail_list', 'ovaev_loop_thumbnail_list', 10, 1 );
function ovaev_loop_thumbnail_list( $id = '' ){
    return ovaev_get_template( 'loop/thumbnail_list.php', array( 'id' => $id ) );   
}

// THumbanil archive event grid
add_action( 'ovaev_loop_thumbnail_grid', 'ovaev_loop_thumbnail_grid', 10, 1 );
function ovaev_loop_thumbnail_grid( $id = '' ){
    return ovaev_get_template( 'loop/thumbnail_grid.php', array( 'id' => $id ) );   
}

add_action( 'ovaev_loop_thumbnail_grid2', 'ovaev_loop_thumbnail_grid2', 10, 1 );
function ovaev_loop_thumbnail_grid2( $id = '' ){
    return ovaev_get_template( 'loop/thumbnail_grid2.php', array( 'id' => $id ) );   
}



// Loop type action
add_action( 'ovaev_loop_type', 'ovaev_loop_type', 10, 1 );
function ovaev_loop_type( $id = '' ){
    return ovaev_get_template( 'loop/type.php', array( 'id' => $id ) );      
}

// Loop Title
add_action( 'ovaev_loop_title', 'ovaev_loop_title', 10, 1 );
function ovaev_loop_title( $id = '' ){
    return ovaev_get_template( 'loop/title.php', array( 'id' => $id ) );      
}

// Loop Excerpt
add_action( 'ovaev_loop_excerpt', 'ovaev_loop_excerpt', 10, 1 );
function ovaev_loop_excerpt( $id = '' ){
    return ovaev_get_template( 'loop/excerpt.php', array( 'id' => $id ) );      
}

// Loop venue
add_action( 'ovaev_loop_venue', 'ovaev_loop_venue', 10, 1 );
function ovaev_loop_venue( $id = '' ){
    return ovaev_get_template( 'loop/venue.php', array( 'id' => $id ) );      
}

// Loop date
add_action( 'ovaev_loop_date', 'ovaev_loop_date', 10, 1 );
function ovaev_loop_date( $id = '' ){
    return ovaev_get_template( 'loop/date.php', array( 'id' => $id ) );      
}

add_action( 'ovaev_loop_date_asting', 'ovaev_loop_date_asting', 10, 1 );
function ovaev_loop_date_asting( $id = '' ){
    return ovaev_get_template( 'loop/date_asting.php', array( 'id' => $id ) );      
}

// Read more
add_action( 'ovaev_loop_readmore', 'ovaev_loop_readmore', 10, 1 );
function ovaev_loop_readmore( $id = '' ){
    return ovaev_get_template( 'loop/readmore.php', array( 'id' => $id ) );      
}

add_action( 'ovaev_loop_readmore_asting', 'ovaev_loop_readmore_asting', 10, 1 );
function ovaev_loop_readmore_asting( $id = '' ){
    return ovaev_get_template( 'loop/readmore_asting.php', array( 'id' => $id ) );      
}

// Single Thumbnail
add_action( 'oavev_single_thumbnail', 'oavev_single_thumbnail' );
function oavev_single_thumbnail(){
    return ovaev_get_template( 'single/thumbnail_asting.php' );
}

// Single Time Location
add_action( 'oavev_single_time_loc', 'oavev_single_time_loc_date', 10 );
function oavev_single_time_loc_date(){
    return ovaev_get_template( 'single/time_loc_date.php' );
}

add_action( 'oavev_single_time_loc', 'oavev_single_time_loc_time', 15 );
function oavev_single_time_loc_time(){
    return ovaev_get_template( 'single/time_loc_time.php' );
}

add_action( 'oavev_single_time_loc', 'oavev_single_time_loc_location', 20 );
function oavev_single_time_loc_location(){
    return ovaev_get_template( 'single/time_loc_location.php' );
}

// Single Taxonomy Type
add_action( 'oavev_single_type', 'oavev_single_type', 10 );
function oavev_single_type(){
    return ovaev_get_template( 'single/type.php' );
}

// Single Tags
add_action( 'oavev_single_tags', 'oavev_single_tags', 10 );
function oavev_single_tags(){
    return ovaev_get_template( 'single/tags.php' );
}

// Single Navigation
add_action( 'oavev_single_nav', 'oavev_single_nav', 10 );
function oavev_single_nav(){
    return ovaev_get_template( 'single/nav.php' );
}

// Single Share
add_action( 'oavev_single_share', 'oavev_single_share', 10 );
function oavev_single_share(){
    return ovaev_get_template( 'single/share.php' );
}

add_action( 'oavev_single_related', 'oavev_single_related', 10 );
function oavev_single_related(){
    return ovaev_get_template( 'single/related.php' );
}






