<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'asting_header_customize', 'asting_header_customize_event', 10, 1 );
function asting_header_customize_event( $header ){

    if( is_tax( 'event_type' ) ||  get_query_var( 'event_type' ) != '' || is_tax( 'event_tag' ) ||  get_query_var( 'event_tag' ) != '' || is_post_type_archive( 'event' ) ){

        $header = OVAEV_Settings::archive_event_header();

    }else if( is_singular( 'event' ) ){

        $header = OVAEV_Settings::single_event_header();
    }

    return $header;

}

add_filter( 'asting_footer_customize', 'asting_footer_customize_event', 10, 1 );
function asting_footer_customize_event( $footer ){
    
    if( is_tax( 'event_type' ) ||  get_query_var( 'event_type' ) != '' || is_tax( 'event_tag' ) ||  get_query_var( 'event_tag' ) != '' || is_post_type_archive( 'event' ) ){

        $footer = OVAEV_Settings::archive_event_footer();

    }else if( is_singular( 'event' ) ){

        $footer = OVAEV_Settings::single_event_footer();
    }

    return $footer;

}


add_filter( 'asting_header_bg_customize', 'asting_header_bg_customize_event', 10, 1 );
function asting_header_bg_customize_event( $bg ){

    if( is_tax( 'event_type' ) ||  get_query_var( 'event_type' ) != '' || is_tax( 'event_tag' ) ||  get_query_var( 'event_tag' ) != '' || is_post_type_archive( 'event' ) ){

        $bg = OVAEV_Settings::archive_event_bg();

    }else if( is_singular( 'event' ) ){

        $bg = OVAEV_Settings::single_event_bg();

        $current_id = asting_get_current_id();
        $header_bg_source =  get_the_post_thumbnail_url( $current_id, 'full' );

        if( $header_bg_source ){
            $bg = $header_bg_source;
        }
        
    }

    return $bg;
}

if( !function_exists( 'ovaev_locate_template' ) ){
	function ovaev_locate_template( $template_name, $template_path = '', $default_path = '' ) {
		
		// Set variable to search in ovaev-templates folder of theme.
		if ( ! $template_path ) :
			$template_path = 'ovaev-templates/';
		endif;

		// Set default plugin templates path.
		if ( ! $default_path ) :
			$default_path = OVAEV_PLUGIN_PATH . 'templates/'; // Path to the template folder
		endif;

		// Search template file in theme folder.
		$template = locate_template( array(
			$template_path . $template_name
			// $template_name
		) );

		// Get plugins template file.
		if ( ! $template ) :
			$template = $default_path . $template_name;
		endif;

		return apply_filters( 'ovaev_locate_template', $template, $template_name, $template_path, $default_path );
	}

}


function ovaev_get_template( $template_name, $args = array(), $tempate_path = '', $default_path = '' ) {
	if ( is_array( $args ) && isset( $args ) ) :
		extract( $args );
    endif;
    $template_file = ovaev_locate_template( $template_name, $tempate_path, $default_path );
    if ( ! file_exists( $template_file ) ) :
      _doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $template_file ), '1.0.0' );
      return;
    endif;


    include $template_file;
}



function ovaev_pagination_plugin($ovaem_query = null) {

	/** Stop execution if there's only 1 page */
	if($ovaem_query != null){
		if( $ovaem_query->max_num_pages <= 1 )
			return;	
	}else if( $wp_query->max_num_pages <= 1 )
	return;



	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;


	

	if($ovaem_query!=null){
		$max   = intval( $ovaem_query->max_num_pages );
	}else{
		$max   = intval( $wp_query->max_num_pages );	
	}
	

	/** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo wp_kses( __( '<div class="blog_pagination"><ul class="pagination">','ovaev' ), true ) . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li class="prev page-numbers">%s</li>' . "\n", get_previous_posts_link(sprintf('<i class="arrow_carrot-left"></i>%s', esc_html__( 'Previous', 'ovaev' ) ) ) );


    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo wp_kses( __('<li><span class="pagi_dots">...</span></li>', 'ovaev' ) , true);
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo wp_kses( __('<li><span class="pagi_dots">...</span></li>', 'ovaev' ) , true) . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        // printf( '<li class="next page-numbers">%s</li>' . "\n", get_next_posts_link('Next <i class="arrow_carrot-right"></i>') );
        printf( '<li class="next page-numbers">%s</li>' . "\n", get_next_posts_link( sprintf('%s <i class="arrow_carrot-right"></i>', esc_html__( 'Next', 'ovaev' ) ) ) );

    echo wp_kses( __( '</ul></div>', 'ovaev' ), true ) . "\n";

}

/** in_array() and multidimensional array **/

function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
    	foreach ($item as $value) {
    		if (  $value['date'] === $needle ) {
             return true;
             break;
         }
     }

 }

 return false;
}

add_action( 'widgets_init', 'ovaev_event_sidebar' );
function ovaev_event_sidebar() {
  $args = array(
    'name'          => 'Event Sidebar',
    'id'            => 'event-sidebar',
    'description'   => 'Display in event sidebar',
    'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>' 
);

  register_sidebar( $args );

}
function get_category_event_by_id( $id = '' ){

    if( $id === '' ) return;

    $cat_event = get_the_terms( $id, 'event_type' );
    $i = 0;

    if( ! empty( $cat_event ) ){
        $count_cat = count( $cat_event );
        ?>
        <span class="separator-in second_font">
            <?php esc_html_e( 'In', 'ovaev' ) ?>
        </span>
        <?php
        foreach ($cat_event as $cat) {
            $i++;
            $separator = ( $count_cat !== $i ) ? "," : "";

            $link = get_term_link($cat->term_id);
            $name = $cat->name;
            ?>
            <span class="cat-ovaev">
                <a class="second_font" href="<?php echo esc_url( $link ) ?>"><?php echo esc_html( $name ) ?></a>
            </span>
            <span class="separator">
                <?php echo esc_html( $separator ) ?>
            </span>

            <?php
        }
    }
}

function get_tag_event_by_id( $id = '' ){

    if( $id === '' ) return;
    $tag_event = get_the_terms( $id, 'event_tag' );

    if( ! empty( $tag_event ) ){
        ?>
        <div class="event-tags">
            <span class="ovatags second_font"><?php esc_html_e('Tags: ', 'ovaev'); ?></span>
            <?php
            foreach ($tag_event as $tag) {

                $link = get_term_link($tag->term_id);
                $name = $tag->name;
                ?>

                <a class="ovaev-tag second_font" href="<?php echo esc_url( $link ) ?>"><?php echo esc_html( $name ) ?></a>


                <?php
            }
            ?>
        </div>
        <?php
    }
}

function get_event_related_by_id( $id = '' ){

    if( empty( $id ) ) return;
    $time = OVAEV_Settings::archive_event_format_time();

    $terms_type = get_the_terms( $id, 'event_type' );
    $terms_tag = get_the_terms( $id, 'event_tag' );

    $arr_type = [];
    if( $terms_type ){
        foreach( $terms_type as $type ){
            $arr_type[] = $type->term_id;
        }
    }

    $arr_tag = [];
    if( $terms_tag ){
        foreach( $terms_tag as $tag ){
            $arr_tag[] = $tag->term_id;
        }
    }

    $args_related = array(
        'post_type' => 'event',
        'posts_per_page' => apply_filters( 'ovaev_single_related_count', 2 ),
        'post__not_in' => array( $id ),
        'tax_query' => array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'event_type',
                'field'    => 'term_id',
                'terms'    => $arr_type,
            ),
            array(
                'taxonomy' => 'event_tag',
                'field'    => 'term_id',
                'terms'    => $arr_tag,
            ),
        ),
    );
    $event_related = new WP_Query( $args_related );

   return $event_related;
}

function ovaev_get_events_elements( $args ){

    if( $args['category'] === 'all'){
        if( $args['time_event'] === 'current'){
            $args_event= array(
                'post_type'      => 'event',
                'post_status'    => 'publish',
                'posts_per_page' => $args['total_count'],
                'offset'         => $args['total_offset'],
                'meta_query'     => array(
                    array(
                        array(
                            'relation' => 'AND',
                            array(
                                'key'     => 'ovaev_start_date_time',
                                'value'   => current_time('timestamp' ),
                                'compare' => '<'
                            ),
                            array(
                                'key'     => 'ovaev_end_date_time',
                                'value'   => current_time('timestamp' ),
                                'compare' => '>='
                            )
                        )
                    )
                )
            );
        } elseif( $args['time_event'] === 'upcoming' ){
            $args_event= array(
                'post_type'      => 'event',
                'post_status'    => 'publish',
                'posts_per_page' => $args['total_count'],
                 'offset'        => $args['total_offset'],
                'meta_query'     => array(
                    array(
                        array(
                            'key'     => 'ovaev_start_date_time',
                            'value'   => current_time( 'timestamp' ),
                            'compare' => '>'
                        ),
                    )
                )
            );
        } elseif( $args['time_event'] === 'past' ){
            $args_event= array(
                'post_type'      => 'event',
                'post_status'    => 'publish',
                'posts_per_page' => $args['total_count'],
                'offset'         => $args['total_offset'],
                'meta_query'     => array(
                    array(
                        'key'     => 'ovaev_end_date_time',
                        'value'   => current_time('timestamp' ),
                        'compare' => '<',                   
                    ),
                ),
            );
        } else{ 
            $args_event= array(
                'post_type'      => 'event',
                'post_status'    => 'publish',
                'posts_per_page' => $args['total_count'],
                'offset'         => $args['total_offset'],
            );
        }

    } elseif( $args['category'] != 'all' ) {
        if( $args['time_event'] === 'current'){
            $args_event= array(
                'post_type'      => 'event',
                'post_status'    => 'publish',
                'posts_per_page' => $args['total_count'],
                'offset'         => $args['total_offset'],
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'event_type',
                        'field'    => 'slug',
                        'terms'    => $args['category'],
                    )
                ),
                'meta_query'     => array(
                    array(
                        'relation' => 'OR',
                        array(
                            'key'     => 'ovaev_start_date_time',
                            'value'   => array( current_time('timestamp' )-1, current_time('timestamp' )+(24*60*60)+1 ),
                            'type'    => 'numeric',
                            'compare' => 'BETWEEN'  
                        ),
                        array(
                            'relation' => 'AND',
                            array(
                                'key'     => 'ovaev_start_date_time',
                                'value'   => current_time('timestamp' ),
                                'compare' => '<'
                            ),
                            array(
                                'key'     => 'ovaev_end_date_time',
                                'value'   => current_time('timestamp' ),
                                'compare' => '>='
                            )
                        )
                    )
                )
            );
        } elseif( $args['time_event'] === 'upcoming' ){
            $args_event= array(
                'post_type'      => 'event',
                'post_status'    => 'publish',
                'posts_per_page' => $args['total_count'],
                 'offset'        => $args['total_offset'],
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'event_type',
                        'field'    => 'slug',
                        'terms'    => $args['category'],
                    )
                ),
                'meta_query'     => array(
                    array(
                        array(
                            'key'     => 'ovaev_start_date_time',
                            'value'   => current_time( 'timestamp' ),
                            'compare' => '>'
                        ),  
                    )
                )
            );
        } elseif( $args['time_event'] === 'past' ){
            $args_event= array(
                'post_type'      => 'event',
                'post_status'    => 'publish',
                'posts_per_page' => $args['total_count'],
                'offset'         => $args['total_offset'],
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'event_type',
                        'field'    => 'slug',
                        'terms'    => $args['category'],
                    )
                ),
                'meta_query'     => array(
                    array(
                        'key'     => 'ovaev_end_date_time',
                        'value'   => current_time('timestamp' ),
                        'compare' => '<',                   
                    ),
                ),
            );
        } else{
            $args_event= array(
                'post_type'   => 'event',
                'post_status' => 'publish',
                'tax_query'   => array(
                    array(
                        'taxonomy' => 'event_type',
                        'field'    => 'slug',
                        'terms'    => $args['category'],
                    )
                ),
                'posts_per_page' => $args['total_count'],
                 'offset'        => $args['total_offset'],
            );
        } 

    }


    $args_event_order = [];
    if( $args['order_by'] === 'ovaev_start_date_time' || $args['order_by'] === 'event_custom_sort' ) {
        $args_event_order = [
            'meta_key'   => $args['order_by'],
            'orderby'    => 'meta_value_num',
            'order'      => $args['order'],
        ];
    } else { 
        $args_event_order = [
            'orderby'        => $args['order_by'],
            'order'          => $args['order'],
        ];
    }

    $args_event = array_merge( $args_event, $args_event_order );

    $events = new \WP_Query($args_event);

    return $events;
}

