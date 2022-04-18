<?php

class Asting_Hooks {

	public function __construct() {
		
		// Return HTML for Header
		add_filter( 'asting_render_header', array( $this, 'asting_render_header' ) );

		// Return HTML for Footer
		add_filter( 'asting_render_footer', array( $this, 'asting_render_footer' ) );


		/* Get All Header */
		add_filter( 'asting_list_header', array( $this, 'asting_list_header' ) );

		/* Get All Footer */
		add_filter( 'asting_list_footer', array( $this,  'asting_list_footer' ) );

		/* Define Layout */
		add_filter( 'asting_define_layout', array( $this,  'asting_define_layout' ) );

		/* Define Wide */
		add_filter( 'asting_define_wide_boxed', array( $this,  'asting_define_wide_boxed' ) );

		/* Get layout */
		add_filter( 'asting_get_layout', array( $this, 'asting_get_layout' ) );

		/* Get sidebar */
		add_filter( 'asting_theme_sidebar', array( $this, 'asting_theme_sidebar' )  );

		/* Wide or Boxed */
		add_filter( 'asting_width_site', array( $this, 'asting_width_site' ) );

		/* Get Blog Template */
		add_filter( 'asting_blog_template', array( $this, 'asting_blog_template' ) );

		/* Give Filter */
		add_filter( 'give_forms_supports', array( $this, 'asting_give_forms_supports' ), 10, 1 );
		
		add_filter( 'template_include', array( $this, 'asting_template_loader' ) );

		add_filter( 'upload_mimes', array( $this, 'asting_upload_mimes' ), 1, 10);
    }

	
	public function asting_render_header(){

		$current_id = asting_get_current_id();

		// Get header default from customizer
		$global_header = get_theme_mod('global_header','default');

		// Header in Metabox of Post, Page
	    $meta_header = get_post_meta($current_id, 'ova_met_header_version', 'true');
	  	
	    // Header use in post,page
	    if( $current_id != '' && $meta_header != 'global'  && $meta_header != '' ){
	    	$header = $meta_header;
	  	}else if( asting_is_blog_archive() ){ // Header use in blog
	  		$header = get_theme_mod('archive_header', 'default');
	  	}else if( is_singular('post') ){ // Header use in single post
	  		$header = get_theme_mod('single_header', 'default');
	  	}else{ // Header use in global
	  		$header = $global_header;
	  	}

		$header_split = explode(',', apply_filters( 'asting_header_customize', $header, $header ));

		if ( asting_is_elementor_active() && isset( $header_split[1] ) ) {

			$post_id_header = asting_get_id_by_slug( $header_split[1] );

			// Check WPML 
			if( function_exists( 'icl_object_id' ) ){
				$post_id_header = icl_object_id($post_id_header, 'ova_framework_hf_el', false);	
			}
			
			return Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $post_id_header );

		}else if ( asting_is_elementor_active() && !isset( $header_split[1] ) ) {

			return get_template_part( 'header/header', $header_split[0] );

		}else if ( !asting_is_elementor_active()  ) {

			return get_template_part( 'header/header', 'default' );

		}

	}


	
	public function asting_render_footer(){

		$current_id = asting_get_current_id();

		// Get Footer default from customizer
		$global_footer = get_theme_mod('global_footer', 'default' );

		// Footer in Metabox of Post, Page
	    $meta_footer =  get_post_meta( $current_id, 'ova_met_footer_version', 'true' );
		
	  	

	  	if( $current_id != '' && $meta_footer != 'global'  && $meta_footer != '' ){
	  		$footer = $meta_footer;
	  	}else if( asting_is_blog_archive() ){
	  		$footer = get_theme_mod('archive_footer', 'default');
	  	}else if( is_singular('post') ){
	  		$footer = get_theme_mod('single_footer', 'default');
	  	}else{
	  		$footer = $global_footer;
	  	}

	  	$footer_split = explode(',', apply_filters( 'asting_footer_customize', $footer, $footer ));
	  	
		if ( asting_is_elementor_active() && isset( $footer_split[1] ) ) {

			$post_id_footer = asting_get_id_by_slug( $footer_split[1] );

			// Check WPML 
			if( function_exists( 'icl_object_id' ) ){
				$post_id_footer = icl_object_id($post_id_footer, 'ova_framework_hf_el', false);	
			}

			return Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $post_id_footer );
			
		}else if ( asting_is_elementor_active() && !isset( $footer_split[1] ) ) {

			get_template_part( 'footer/footer', $footer_split[0] );

		}else if( !asting_is_elementor_active() ){

			get_template_part( 'footer/footer', 'default' );			
		}
	}



	function asting_list_header(){

	    $hf_header_array['default'] = esc_html__( 'Default', 'asting' );

	    if( !asting_is_elementor_active() ) return $hf_header_array;

	    $args_hf = array(
	        'post_type' => 'ova_framework_hf_el',
	        'post_status'   => 'publish',
	        'posts_per_page' => '-1',
	        'meta_query' => array(
	            array(
	                'key'     => 'hf_options',
	                'value'   => 'header',
	                'compare' => '=',
	            ),
	        )
	    );

	    $hf = new WP_Query( $args_hf );

	    if($hf->have_posts()):  while($hf->have_posts()) : $hf->the_post();
	        global $post;
	        $hf_header_array[ 'ova,'.$post->post_name ] = get_the_title();

	    endwhile;endif; wp_reset_postdata();

	    return $hf_header_array;
	}

	
	function asting_list_footer(){

	    $hf_footer_array['default'] = esc_html__( 'Default', 'asting' );

	    if( !asting_is_elementor_active() ) return $hf_footer_array;

	    $args_hf = array(
	        'post_type' => 'ova_framework_hf_el',
	        'post_status'   => 'publish',
	        'posts_per_page' => '-1',
	        'meta_query' => array(
	            array(
	                'key'     => 'hf_options',
	                'value'   => 'footer',
	                'compare' => '=',
	            ),
	        )
	    );

	    $hf = new WP_Query( $args_hf );

	    if($hf->have_posts()):  while($hf->have_posts()) : $hf->the_post();
	        global $post;
	        $hf_footer_array[ 'ova,'.$post->post_name ] = get_the_title();

	    endwhile;endif; wp_reset_postdata();

	    return $hf_footer_array;
	}


	function asting_define_layout(){
		return array(
			'layout_1c' => esc_html__('No Sidebar', 'asting'),
			'layout_2r' => esc_html__('Right Sidebar', 'asting'),
			'layout_2l' => esc_html__('Left Sidebar', 'asting'),
		);
	}
	

	function asting_get_layout(){
		
		$current_id = asting_get_current_id();

		$layout = get_post_meta( $current_id, 'ova_met_main_layout', true );
		$width_sidebar = 320;

		if( is_singular( 'post' ) ){

		    $layout = get_theme_mod( 'single_layout', 'layout_2r' );
		    $width_sidebar = get_theme_mod( 'single_sidebar_width', '320' );

		}else if( asting_is_woo_active() && is_product_category() ){
			
			$layout = get_theme_mod( 'woo_layout', 'layout_1c' );
			$width_sidebar = get_theme_mod( 'woo_sidebar_width', '320' );

		}else if( asting_is_blog_archive() ){

		    $layout = get_theme_mod( 'blog_layout', 'layout_2r' );
		    $width_sidebar = get_theme_mod( 'blog_sidebar_width', '350' );

		}

		if( $current_id ){

		    $layout = get_post_meta( $current_id, 'ova_met_main_layout', true );

		    if( $layout == 'global' && is_singular( 'post' ) ){

		    	$layout = get_theme_mod( 'single_layout', 'layout_2r' );
		    	$width_sidebar = get_theme_mod( 'single_sidebar_width', '320' );

		    } else if( $layout == 'global' && !is_singular( 'post' ) ){

		    	$layout = get_theme_mod( 'global_layout', 'layout_2r' );
		    	$width_sidebar = get_theme_mod( 'global_sidebar_width', '320' );

		    }

		}

		// Check if page is posts (settings >> reading >> posts page)
		if( get_option( 'page_for_posts' ) == $current_id ){
			
			$layout = get_post_meta( $current_id, 'ova_met_main_layout', true );
			if( $layout == 'global' ) $layout = get_theme_mod( 'blog_layout', 'layout_2r' );

		}


		if( isset( $_GET['layout_sidebar'] ) ){
			$layout = $_GET['layout_sidebar'];
		}

		if( !$layout ){
			$layout = get_theme_mod( 'global_layout', 'layout_2r' );
		    $width_sidebar = get_theme_mod( 'global_sidebar_width', '405' );
		}

		return array( $layout, $width_sidebar );
	}


	function asting_width_site(){
		$current_id = asting_get_current_id();
		$width_site = get_post_meta( $current_id, 'ova_met_width_site', true );

		if( $current_id && $width_site != 'global' ){
		    $width = $width_site;
		}else{
			$width = get_theme_mod( 'global_width_site', 'wide' );
		}

		return $width;
	}

	function asting_theme_sidebar(){
		$layout_sidebar = apply_filters( 'asting_get_layout', '' );
		return $layout_sidebar[0];
	}

	function asting_define_wide_boxed(){
		return array(
			'wide' => esc_html__('Wide', 'asting'),
			'boxed' => esc_html__('Boxed', 'asting'),
		);
	}

	function asting_blog_template(){
		$blog_template = get_theme_mod( 'blog_template', 'default' );
		if( isset( $_GET['blog_template'] ) ){
			$blog_template = $_GET['blog_template'];
		}
		return $blog_template;
	}

	public function asting_give_forms_supports( $supports ){
		$supports[] = 'editor';
		return $supports; 
	}

	 public function asting_template_loader( $template ) {

        $post_type = isset($_REQUEST['post_type'] ) ? $_REQUEST['post_type'] : get_post_type();
        
        
		if( is_tax( 'give_forms_category' ) ||  get_query_var( 'give_forms_category' ) != '' ){

		    $paged = get_query_var('paged') ? get_query_var('paged') : '1';
		    
		    query_posts( '&give_forms_category='.get_query_var( 'give_forms_category' ).'&paged=' . $paged );
		       get_template_part( 'content/content', 'taxonomy' );
		    return false;
		}

		if(  $post_type == 'give_forms' ){



		if (  is_post_type_archive( 'give_forms' )  ) { 

			get_template_part( 'archive', 'give_forms' );
			return false;

		} else if ( is_single() ) {

			get_template_part( 'give/single', 'give-form' );
			return false;

		}
		}

		if ( $post_type !== 'give_forms' ){
		return $template;
		}

    }

    public function asting_upload_mimes($mimes){
 		$mimes['zip'] = 'application/zip';
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
    

}

new Asting_Hooks();

