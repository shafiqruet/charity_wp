<?php 

if( !defined( 'ABSPATH' ) ) exit();

if( !class_exists( 'OVAEV_custom_post_type' ) ) {

	class OVAEV_custom_post_type{

		public function __construct(){

			add_action( 'init', array( $this, 'OVAEV_register_post_type_event' ) );


			add_action( 'init', array( $this, 'OVAEV_custom_taxonomy_type' ) );
			add_action( 'init', array( $this, 'OVAEV_custom_taxonomy_tag' ) );

		}

		
		function OVAEV_register_post_type_event() {

			$labels = array(
				'name'                  => _x( 'Events', 'Post Type General Name', 'ovaev' ),
				'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'ovaev' ),
				'menu_name'             => __( 'Events', 'ovaev' ),
				'name_admin_bar'        => __( 'Post Type', 'ovaev' ),
				'archives'              => __( 'Item Archives', 'ovaev' ),
				'attributes'            => __( 'Item Attributes', 'ovaev' ),
				'parent_item_colon'     => __( 'Parent Item:', 'ovaev' ),
				'all_items'             => __( 'All Events', 'ovaev' ),
				'add_new_item'          => __( 'Add New Event', 'ovaev' ),
				'add_new'               => __( 'Add New Event', 'ovaev' ),
				'new_item'              => __( 'New Item', 'ovaev' ),
				'edit_item'             => __( 'Edit Event', 'ovaev' ),
				'view_item'             => __( 'View Item', 'ovaev' ),
				'view_items'            => __( 'View Items', 'ovaev' ),
				'search_items'          => __( 'Search Item', 'ovaev' ),
				'not_found'             => __( 'Not found', 'ovaev' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'ovaev' ),
			);
			$args = array(
				'description'         => __( 'Post Type Description', 'ovaev' ),
				'labels'              => $labels,
				'supports'            => array( 'author', 'title', 'editor', 'comments', 'excerpt', 'thumbnail' ),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => 'ovaev-menu',
				'menu_position'       => 5,
				'query_var'           => true,
				'has_archive'         => true,
				'exclude_from_search' => true,
				'publicly_queryable'  => true,
				'rewrite'             => array( 'slug' => _x( 'event', 'URL slug', 'ovaev' ) ),
				'capability_type'     => 'post',
			);
			register_post_type( 'event', $args );
		}
		
		// Register Custom Taxonomy Type
		function OVAEV_custom_taxonomy_type(){

			$labels = array(
				'name'              => _x( 'Types', 'taxonomy general name', 'eventlist' ),
				'singular_name'     => _x( 'Type', 'taxonomy singular name', 'eventlist' ),
				'search_items'      => __( 'Search Types', 'eventlist' ),
				'all_items'         => __( 'All Types', 'eventlist' ),
				'parent_item'       => __( 'Parent Type', 'eventlist' ),
				'parent_item_colon' => __( 'Parent Type:', 'eventlist' ),
				'edit_item'         => __( 'Edit Type', 'eventlist' ),
				'update_item'       => __( 'Update Type', 'eventlist' ),
				'add_new_item'      => __( 'Add New Type', 'eventlist' ),
				'new_item_name'     => __( 'New Type', 'eventlist' ),
				'menu_name'         => __( 'Types', 'eventlist' )
			);
		
			$args = array(
				'hierarchical'       => true,
				'label'              => __( 'Type', 'eventlist' ),
				'labels'             => $labels,
				'public'             => true,
				'show_ui'            => true,
				'show_admin_column'  => true,
				'show_in_nav_menus'  => true,
				'publicly_queryable' => true,
				'query_var'          => true,
				'show_in_rest'       => true, // Show in Rest API (display in Event Custom Post Type)
				'rewrite'            => array(
					'slug'       => _x('event_type','Event Type Slug', 'ovaev'),
					'with_front' => false,
					'feeds'      => true,
				),
				
			);

			$args = apply_filters( 'el_register_tax_event_type', $args );
			register_taxonomy( 'event_type', array( 'event' ), $args );
			
		}

		


		// Register Custom Taxonomy Tag
		function OVAEV_custom_taxonomy_tag() {

			$labels = array(
				'name'              => _x( 'Tags', 'taxonomy general name', 'eventlist' ),
				'singular_name'     => _x( 'Tag', 'taxonomy singular name', 'eventlist' ),
				'search_items'      => __( 'Search Tags', 'eventlist' ),
				'all_items'         => __( 'All Tags', 'eventlist' ),
				'parent_item'       => __( 'Parent Tag', 'eventlist' ),
				'parent_item_colon' => __( 'Parent Tag:', 'eventlist' ),
				'edit_item'         => __( 'Edit Tag', 'eventlist' ),
				'update_item'       => __( 'Update Tag', 'eventlist' ),
				'add_new_item'      => __( 'Add New Tag', 'eventlist' ),
				'new_item_name'     => __( 'New Tag', 'eventlist' ),
				'menu_name'         => __( 'Tags', 'eventlist' )
			);

			$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'publicly_queryable' => true,
				'public'            => true,
				'show_ui'           => true,
				'show_in_menu'      => 'ovaev-menu',
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud'     => false,
				'rewrite'            => array(
					'slug'       => _x('event_tag','Event Tag Slug', 'ovaev'),
					'with_front' => false,
					'feeds'      => true,
				),
			);

			$args = apply_filters( 'el_register_tax_event_tag', $args );
			register_taxonomy( 'event_tag', array( 'event' ), $args );
			
		}



	}
	new OVAEV_custom_post_type();
}



