<?php

// Get current ID of post/page, etc
if( !function_exists( 'asting_get_current_id' )):
function asting_get_current_id(){
    
    $current_page_id = '';
    // Get The Page ID You Need
    
    if(class_exists("woocommerce")) {
        if( is_shop() ){ ///|| is_product_category() || is_product_tag()) {
            $current_page_id  =  get_option ( 'woocommerce_shop_page_id' );
        }elseif(is_cart()) {
            $current_page_id  =  get_option ( 'woocommerce_cart_page_id' );
        }elseif(is_checkout()){
            $current_page_id  =  get_option ( 'woocommerce_checkout_page_id' );
        }elseif(is_account_page()){
            $current_page_id  =  get_option ( 'woocommerce_myaccount_page_id' );
        }elseif(is_view_order_page()){
            $current_page_id  = get_option ( 'woocommerce_view_order_page_id' );
        }
    }
    if($current_page_id=='') {
        if ( is_home () && is_front_page () ) {
            $current_page_id = '';
        } elseif ( is_home () ) {
            $current_page_id = get_option ( 'page_for_posts' );
        } elseif ( is_search () || is_category () || is_tag () || is_tax () || is_archive() ) {
            $current_page_id = '';
        } elseif ( !is_404 () ) {
           $current_page_id = get_the_id();
        } 
    }

    return $current_page_id;
}
endif;

if( !function_exists( 'asting_pagination_theme' )):
function asting_pagination_theme() {
           
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
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
 
    echo wp_kses( __( '<div class="blog_pagination"><ul class="pagination">','asting' ), true ) . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li class="prev page-numbers">%s</li>' . "\n",  get_previous_posts_link(sprintf('<i class="arrow_carrot-left"></i>%s', esc_html__( 'Previous', 'asting' ) )) );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo wp_kses( __('<li><span class="pagi_dots">...</span></li>', 'asting' ) , true);
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
            echo wp_kses( __('<li><span class="pagi_dots">...</span></li>', 'asting' ) , true) . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li class="next page-numbers">%s</li>' . "\n", get_next_posts_link( sprintf('%s <i class="arrow_carrot-right"></i>', esc_html__( 'Next', 'asting' ) )) );
 
    echo wp_kses( __( '</ul></div>', 'asting' ), true ) . "\n";
 
}
endif;



/* Setup Theme */
/* Add theme support */
add_action('after_setup_theme', 'asting_theme_support', 10);
add_filter('oembed_result', 'asting_framework_fix_oembeb', 10 );
add_filter('paginate_links', 'asting_fix_pagination_error',10);
add_action( 'admin_enqueue_scripts', 'asting_wpadminjs' ); 

function asting_theme_support(){

    if ( ! isset( $content_width ) ) $content_width = 900;

    add_theme_support('title-tag');

    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );

    // Switches default core markup for search form, comment form, and comments    
    // to output valid HTML5.
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

    /* See http://codex.wordpress.org/Post_Formats */
    add_theme_support( 'post-formats', array( 'image', 'gallery', 'audio', 'video') );

    add_theme_support( 'post-thumbnails' );
    
    add_theme_support( 'custom-header' );
    add_theme_support( 'custom-background');

    add_theme_support( 'woocommerce' );
    
    add_theme_support( 'ova_framework_hf_el' );

       /* Add post type support Give Donations */
    add_post_type_support( 'give_forms', array('comments'));
    
}


function asting_framework_fix_oembeb( $url ){
    $array = array (
        'webkitallowfullscreen'     => '',
        'mozallowfullscreen'        => '',
        'frameborder="0"'           => '',
        '</iframe>)'        => '</iframe>'
    );
    $url = strtr( $url, $array );

    if ( strpos( $url, "<embed src=" ) !== false ){
        return str_replace('</param><embed', '</param><param name="wmode" value="opaque"></param><embed wmode="opaque" ', $url);
    }
    elseif ( strpos ( $url, 'feature=oembed' ) !== false ){
        return str_replace( 'feature=oembed', 'feature=oembed&amp;wmode=opaque', $url );
    }
    else{
        return $url;
    }
}


// Fix pagination
function asting_fix_pagination_error($link) {
    return str_replace('#038;', '&', $link);
}

function asting_wpadminjs() {
    wp_enqueue_style('asting_fixcssadmin', ASTING_URI.'/extend/cssadmin.css',  false, '1.0');
}

// Remove Heading in Content Description Tab Woo
add_filter('woocommerce_product_description_heading', '__return_null');


if (!function_exists('asting_is_elementor_active')) {
    function asting_is_elementor_active(){
        return did_action( 'elementor/loaded' );
    }
}

if (!function_exists('asting_is_woo_active')) {
    function asting_is_woo_active(){
        return class_exists('woocommerce');    
    }
}

if (!function_exists('asting_is_blog_archive')) {
    function asting_is_blog_archive() {
        return (is_home() && is_front_page()) || is_archive() || is_category() || is_tag() || is_home();
    }
}

/* Get ID from Slug of Header Footer Builder - Post Type */
function asting_get_id_by_slug( $page_slug ) {
    $page = get_page_by_path( $page_slug, OBJECT, 'ova_framework_hf_el' ) ;
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

function asting_framework_the_title(){
    
    if ( is_front_page() && is_home() ) {
      // Default homepage
    } elseif ( is_front_page() ) {
      // static homepage
    } elseif ( is_home() ) {
      // blog page
    } else {
      //everything else
    }

    if ( is_home () && is_front_page () ) {
        
        return esc_html__('Home','asting');

    } elseif ( is_front_page() ) {
        
        return esc_html__('Home','asting');

    }elseif ( is_home () ) {

        return esc_html__('Blog','asting');

    } elseif ( is_search () ) {

        return esc_html__('Search','asting');

    } else if(is_category () ){

        return single_cat_title('');

    }else if (is_tag ()){

        return esc_html__('Tags','asting');

    }else if( is_tax () || is_archive() ){

        return get_the_archive_title();

    }else if( is_singular( 'post' ) ){

        return get_the_title();

    }else if( is_singular( 'product' ) ){

        return get_the_title();

    }elseif ( !is_404 () ) {
       return get_the_title();
    }

}

function asting_custom_text ($content = "",$limit = 15) {
    $content = explode(' ', $content, $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'';
    } else {
        $content = implode(" ",$content);
    }
    $content = preg_replace('`[[^]]*]`','',$content);
    return strip_tags( $content );
}

/*Customize */
function asting_customize_register( $wp_customize ) {
   $wp_customize->add_setting( 'logo', array(
      'type' => 'theme_mod', // or 'option'
      'capability' => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
      'default' => '',
      'transport' => 'refresh', // or postMessage
      'sanitize_callback' => 'sanitize_text_field' // Get function name 
      
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
        'label'    => esc_html__( 'Logo Default', 'asting' ),
        'section'  => 'title_tagline',
        'settings' => 'logo'
    )));
}
add_action( 'customize_register', 'asting_customize_register' );


/**
 * Google Font sanitization
 *
 * @param  string   JSON string to be sanitized
 * @return string   Sanitized input
 */
if ( ! function_exists( 'asting_google_font_sanitization' ) ) {
    function asting_google_font_sanitization( $input ) {
        $val =  json_decode( $input, true );
        if( is_array( $val ) ) {
            foreach ( $val as $key => $value ) {
                $val[$key] = sanitize_text_field( $value );
            }
            $input = json_encode( $val );
        }
        else {
            $input = json_encode( sanitize_text_field( $val ) );
        }
        return $input;
    }
}


/* Default Primary Font in Customize */
if ( ! function_exists( 'asting_default_primary_font' ) ) {
    function asting_default_primary_font() {
        $customizer_defaults = json_encode(
            array(
                'font' => 'Rubik',
                'regularweight' => '100,200,300,400,500,600,700,800,900',
                'category' => 'serif'
            )
        );

        return $customizer_defaults;
    }
}

/* Default Second Font in Customize */
if ( ! function_exists( 'asting_default_second_font' ) ) {
    function asting_default_second_font() {
        $customizer_defaults = json_encode(
            array(
                'font' => 'Abril Fatface',
                'regularweight' => '100,200,300,400,500,600,700,800,900',
                'category' => 'serif'
            )
        );

        return $customizer_defaults;
    }
}

/* Default Second Font in Customize */
if ( ! function_exists( 'asting_default_thrid_font' ) ) {
    function asting_default_thrid_font() {
        $customizer_defaults = json_encode(
            array(
                'font' => 'Shadows Into Light',
                'regularweight' => '100,200,300,400,500,600,700,800,900',
                'category' => 'serif'
            )
        );

        return $customizer_defaults;
    }
}

/*Number Word Description in Archive Give */


if ( ! function_exists( 'excerpt_des' ) ) {

 function excerpt_des($limit) {
    $limit += 1; 
    $excerpt = explode(' ', get_the_excerpt(), $limit);

    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt) . ' ... ';
    } else {
        $excerpt = implode(" ",$excerpt);
    }   

    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
}
}
