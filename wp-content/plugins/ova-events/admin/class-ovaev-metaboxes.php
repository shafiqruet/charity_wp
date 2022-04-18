<?php 

if( !defined( 'ABSPATH' ) ) exit();

if( !class_exists( 'OVAEV_metaboxes' ) ){

	class OVAEV_metaboxes{

		public function __construct(){

			$this->require_metabox();


			add_action( 'add_meta_boxes', array( $this , 'OVAEV_add_metabox' ) );

			add_action( 'save_post', array( $this , 'OVAEV_save_metabox' ) );

			// List icon
			add_action( 'cmb2_init', array( $this , 'ova_event_icon_list' ) );


			// Save
			add_action( 'ovaev_update_meta_event', array( 'OVAEV_metaboxes_render_event' ,'save' ), 10, 2 );

		}


		public function require_metabox(){

			require_once( OVAEV_PLUGIN_PATH.'admin/meta-boxes/ovaev-metaboxes-event.php' );

		}

		function OVAEV_add_metabox() {

			add_meta_box( 'ovaev-metabox-settings-event',
				'Events',
				array('OVAEV_metaboxes_render_event', 'render'),
				'event',
				'normal',
				'high'
			);

		}

		

		function OVAEV_save_metabox($post_id) {

			// Bail if we're doing an auto save
			if ( empty( $_POST ) && defined( 'DOING_AJAX' ) && DOING_AJAX ) return;

			// if our nonce isn't there, or we can't verify it, bail
			if( !isset( $_POST['ovaev_nonce'] ) || !wp_verify_nonce( $_POST['ovaev_nonce'], 'ovaev_nonce' ) ) return;

			do_action( 'ovaev_update_meta_event', $post_id, $_POST );
			
		}

		function ova_event_icon_list() {
			$icon_list_settings = new_cmb2_box( array(
		        'id'            => 'ova_icon_list_settings',
		        'title'         => esc_html__( 'Icon list settings', 'ova-oavev' ),
		        'object_types'  => array( 'event'),
		        'context'       => 'normal',
		        'priority'      => 'high',
		        'show_names'    => true,
		        
		    ) );

		    	$group_icon = $icon_list_settings->add_field( array(
		            'id'          => 'ova_icon_list_group_text',
		            'type'        => 'group',
		            'description' => esc_html__( 'List Icon', 'ova-oavev' ),
		            'options'     => array(
		                'group_title'       => esc_html__( 'Icon', 'ova-oavev' ), 
		                'add_button'        => esc_html__( 'Add Icon', 'ova-oavev' ),
		                'remove_button'     => esc_html__( 'Remove', 'ova-oavev' ),
		                'sortable'          => true,
		               
		            ),
		        ) );

		        $icon_list_settings->add_group_field( $group_icon, array(
		            'name' => esc_html__( 'Class Icon', 'ova-oavev' ),
		            'id'   => 'ova_icon_class',
		            'type' => 'text',
		        ) );

		        $icon_list_settings->add_group_field( $group_icon, array(
		            'name' => esc_html__( 'Link Icon', 'ova-oavev' ),
		            'id'   => 'ova_icon_link',
		            'type' => 'text',
		        ) );

		        $icon_list_settings->add_group_field( $group_icon, array(
		            'name' => esc_html__( 'Background Icon', 'ova-oavev' ),
		            'id'   => 'ova_icon_bg',
		            'type' => 'text',
		        ) );

		}

	}

	new OVAEV_metaboxes();

}
?>