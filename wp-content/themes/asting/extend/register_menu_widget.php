<?php
/* Register Menu */
add_action( 'init', 'asting_register_menus' );
function asting_register_menus() {
  register_nav_menus( array(
    'primary'   => esc_html__( 'Primary Menu', 'asting' )

  ) );
}

/* Register Widget */
add_action( 'widgets_init', 'ovaframework_second_widgets_init' );
function ovaframework_second_widgets_init() {
  
  $args_blog = array(
    'name' => esc_html__( 'Main Sidebar', 'asting'),
    'id' => "main-sidebar",
    'description' => esc_html__( 'Main Sidebar', 'asting' ),
    'class' => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title">',
    'after_title' => "</h4>",
  );
  register_sidebar( $args_blog );

  if( asting_is_woo_active() ){
    $args_woo = array(
      'name' => esc_html__( 'WooCommerce Sidebar', 'asting'),
      'id' => "woo-sidebar",
      'description' => esc_html__( 'WooCommerce Sidebar', 'asting' ),
      'class' => '',
      'before_widget' => '<div id="%1$s" class="widget woo_widget %2$s">',
      'after_widget' => "</div>",
      'before_title' => '<h4 class="widget-title">',
      'after_title' => "</h4>",
    );
    register_sidebar( $args_woo );
  }

}