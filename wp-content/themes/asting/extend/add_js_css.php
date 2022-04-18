<?php
add_action('wp_enqueue_scripts', 'asting_theme_scripts_styles');
add_action('wp_enqueue_scripts', 'asting_theme_script_default');


function asting_theme_scripts_styles() {

    // enqueue the javascript that performs in-link comment reply fanciness
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' ); 
    }
    
    /* Add Javascript  */
    wp_enqueue_script( 'bootstrap', ASTING_URI.'/assets/libs/bootstrap/js/bootstrap.bundle.min.js' , array( 'jquery' ), null, true );
    wp_enqueue_script( 'select2', ASTING_URI.'/assets/libs/select2/select2.min.js' , array( 'jquery' ), null, true );
    wp_enqueue_script( 'fancybox', ASTING_URI.'/assets/libs/fancybox-master/dist/jquery.fancybox.min.js',  array( 'jquery' ), null, true );
    wp_enqueue_script('appear', ASTING_URI.'/assets/libs/appear/appear.js', array('jquery'),null,true);
    wp_enqueue_script('asting-script', ASTING_URI.'/assets/js/script.js', array('jquery'),null,true);

    /* Add Css  */
    wp_enqueue_style('bootstrap', ASTING_URI.'/assets/libs/bootstrap/css/bootstrap.min.css', array(), null);
    

    wp_enqueue_style( 'select2', ASTING_URI. '/assets/libs/select2/select2.min.css', array(), null );

    wp_enqueue_style('v4-shims', ASTING_URI.'/assets/libs/fontawesome/css/v4-shims.min.css', array(), null);
    wp_enqueue_style('fontawesome', ASTING_URI.'/assets/libs/fontawesome/css/all.min.css', array(), null);
    wp_enqueue_style('elegant-font', ASTING_URI.'/assets/libs/elegant_font/ele_style.css', array(), null);
    wp_enqueue_style('icomoon', ASTING_URI.'/assets/libs/icomoon/style.css', array(), null);
    wp_enqueue_style( 'fancybox', ASTING_URI.'/assets/libs/fancybox-master/dist/jquery.fancybox.min.css', array(), null );
    
    
    
    wp_enqueue_style('asting-theme', ASTING_URI.'/assets/css/theme.css', array(), null);

    

}

function asting_theme_script_default(){

    if ( is_child_theme() ) {
      wp_enqueue_style( 'asting-parent-style', trailingslashit( get_template_directory_uri() ) . 'style.css', array(), null );
    }

    wp_enqueue_style( 'asting-style', get_stylesheet_uri(), array(), null );
}