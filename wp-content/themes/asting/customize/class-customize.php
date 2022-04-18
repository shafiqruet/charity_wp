<?php

if (!defined( 'ABSPATH' )) {
    exit;
}
if (!class_exists( 'Asting_Customize' )){

class Asting_Customize {
	
	public function __construct() {
        add_action( 'customize_register', array( $this, 'asting_customize_register' ) );
    }

    public function asting_customize_register($wp_customize) {
        
        $this->asting_init_remove_setting( $wp_customize );
        $this->asting_init_ova_typography( $wp_customize );
        $this->asting_init_ova_layout( $wp_customize );
        $this->asting_init_ova_header( $wp_customize );
        $this->asting_init_ova_footer( $wp_customize );
        $this->asting_init_ova_blog( $wp_customize );
        $this-> asting_init_ova_archive_donation( $wp_customize );
        $this-> asting_init_ova_single_donation( $wp_customize );
        $this-> asting_init_ova_archive_header_footer( $wp_customize );
        

        if( asting_is_woo_active() ){
        	$this->asting_init_ova_woo( $wp_customize );	
        }
   
        do_action( 'asting_customize_register', $wp_customize );
    }

    public function asting_init_remove_setting( $wp_customize ){
    	/* Remove Colors &  Header Image Customize */
		$wp_customize->remove_section('colors');
		$wp_customize->remove_section('header_image');
    }


    // archive donation

        public function asting_init_ova_archive_donation ($wp_customize) {
			$wp_customize->add_section( 'archive_donation' , array(
				'title'      => esc_html__( 'Archive Donation', 'asting' ),
				'priority'   => 10,
			) );

			$wp_customize->add_setting( 'archive_donation_show_sidebar', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field', // Get function name 
				  'default'  => 'type_1',
				) );

			$wp_customize->add_control('archive_donation_show_sidebar', array(
				'label'    => esc_html__('Give Donation','asting'),
				'section'  => 'archive_donation',
				'settings' => 'archive_donation_show_sidebar',
				'type'     => 'select',
				'choices'  => array(
					'type_4' => esc_html__('One Columns', 'asting'),
					'type_1' => esc_html__('Two Columns', 'asting'),
					'type_2' => esc_html__('Three Columns', 'asting'),
					'type_3' => esc_html__('Four Columns', 'asting'),
					'type_5' => esc_html__('All item', 'asting'),
				)
			));

			$wp_customize->add_setting( 'number_text_donation', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => '9',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('number_text_donation', array(
				'label' => esc_html__('Number Word Description','asting'),
				'section' => 'archive_donation',
				'settings' => 'number_text_donation',
				'type' =>'number'
			));
			
		}


		public function asting_init_ova_single_donation ($wp_customize) {

			$wp_customize->add_section( 'single_donation' , array(
				'title'      => esc_html__( 'Single Donation', 'asting' ),
				'priority'   => 10,
			) );

			$wp_customize->add_setting( 'show_hide_title_give', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field', // Get function name 
				  'default'  => 'yes',
				) );

			$wp_customize->add_control('show_hide_title_give', array(
				'label'    => esc_html__('Show/Hide Title','asting'),
				'section'  => 'single_donation',
				'settings' => 'show_hide_title_give',
				'type'     => 'select',
				'choices'  => array(
					'yes' => esc_html__('Yes', 'asting'),
					'no' => esc_html__('No', 'asting'),

				)
			));
		}


// archive header footer

	     public function asting_init_ova_archive_header_footer ($wp_customize) {
			$wp_customize->add_section( 'archive_header_footer' , array(
				'title'      => esc_html__( 'Header Footer Archive Template', 'asting' ),
				'priority'   => 10,
			) );


				$wp_customize->add_setting( 'archive_header', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'default',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('archive_header', array(
					'label' => esc_html__('Header','asting'),
					'section' => 'archive_header_footer',
					'settings' => 'archive_header',
					'type' =>'select',
					'choices' => apply_filters('asting_list_header', '')
				));

				$wp_customize->add_setting( 'archive_footer', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'default',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('archive_footer', array(
					'label' => esc_html__('Footer','asting'),
					'section' => 'archive_header_footer',
					'settings' => 'archive_footer',
					'type' =>'select',
					'choices' => apply_filters('asting_list_footer', '')
				));



			
		}


    
    
    /* Typo */
    public function asting_init_ova_typography($wp_customize){
    	
    	


    		/* Body Pane ******************************/
			$wp_customize->add_section( 'typo_general' , array(
			    'title'      => esc_html__( 'Typography', 'asting' ),
			    'priority'   => 1,
			    
			) );


				/* General Typo */
				$wp_customize->add_setting( 'general_heading', array(
				  'default' => '',
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );

				$wp_customize->add_control(
					new Asting_Customize_Control_Heading( 
					$wp_customize, 
					'general_heading', 
					array(
						'label'          => esc_html__('General Typo','asting'),
			            'section'        => 'typo_general',
			            'settings'       => 'general_heading',
					) )
				);


				/* General Font */
				$wp_customize->add_setting( 'primary_font',
					array(
						'default' => asting_default_primary_font(),
						'sanitize_callback' => 'asting_google_font_sanitization'
					)
				);
				$wp_customize->add_control( new Asting_Google_Font_Select_Custom_Control( $wp_customize, 'primary_font',
					array(
						'label' => esc_html__( 'Primary Font', 'asting' ),
						'section' => 'typo_general',
						'input_attrs' => array(
							'font_count' => 'all',
							'orderby' => 'popular',
						),
					)
				) );
				

				/* Font Size */
				$wp_customize->add_setting( 'general_font_size', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '18px',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				
				$wp_customize->add_control('general_font_size', array(
					'label' => esc_html__('Font Size','asting'),
					'description' => esc_html__('Example: 16px, 1.2em','asting'),
					'section' => 'typo_general',
					'settings' => 'general_font_size',
					'type' 		=>'text'
				));

				/* Line Height */
				$wp_customize->add_setting( 'general_line_height', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '36px',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				
				$wp_customize->add_control('general_line_height', array(
					'label' => esc_html__('Line height','asting'),
					'description' => esc_html__('Example: 23px, 1.6em','asting'),
					'section' => 'typo_general',
					'settings' => 'general_line_height',
					'type' 		=>'text'
				));


				/* Letter Space */
				$wp_customize->add_setting( 'general_letter_space', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '0px',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				
				$wp_customize->add_control('general_letter_space', array(
					'label' => esc_html__('Letter Spacing','asting'),
					'description' => esc_html__('Example: 0px, 0.5em','asting'),
					'section' => 'typo_general',
					'settings' => 'general_letter_space',
					'type' 		=>'text'
				));


				$wp_customize->add_setting( 'general_color', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '#88858e',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
					$wp_customize, 
					'general_color', 
					array(
						'label'          => esc_html__("Content Color",'asting'),
			            'section'        => 'typo_general',
			            'settings'       => 'general_color',
					) ) 
				);
						

				/* Message */
				$wp_customize->add_setting( 'second_font_message', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new Asting_Customize_Control_Heading( 
					$wp_customize, 
					'second_font_message', 
					array(
						'label'          => esc_html__('Second Font','asting'),
			            'section'        => 'typo_general',
			            'settings'       => 'second_font_message',
					) )
				);

				/* Heading Font */
				$wp_customize->add_setting( 'second_font',
					array(
						'default' => asting_default_second_font(),
						'sanitize_callback' => 'asting_google_font_sanitization'
					)
				);
				$wp_customize->add_control( new Asting_Google_Font_Select_Custom_Control( $wp_customize, 'second_font',
					array(
						'label' => esc_html__( 'Font', 'asting' ),
						'section' => 'typo_general',
						'input_attrs' => array(
							'font_count' => 'all',
							'orderby' => 'popular',
						),
					)
				) );




				/* Message */
				$wp_customize->add_setting( 'thrid_font_message', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new Asting_Customize_Control_Heading( 
					$wp_customize, 
					'thrid_font_message', 
					array(
						'label'          => esc_html__('Third Font','asting'),
			            'section'        => 'typo_general',
			            'settings'       => 'thrid_font_message',
					) )
				);

				/* Heading Font */
				$wp_customize->add_setting( 'thrid_font',
					array(
						'default' => asting_default_second_font(),
						'sanitize_callback' => 'asting_google_font_sanitization'
					)
				);
				$wp_customize->add_control( new Asting_Google_Font_Select_Custom_Control( $wp_customize, 'thrid_font',
					array(
						'label' => esc_html__( 'Font', 'asting' ),
						'section' => 'typo_general',
						'input_attrs' => array(
							'font_count' => 'all',
							'orderby' => 'popular',
						),
					)
				) );



				$wp_customize->add_setting( 'color_message', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );

				$wp_customize->add_control(
					new Asting_Customize_Control_Heading( 
					$wp_customize, 
					'color_message', 
					array(
						'label'          => esc_html__('General Color','asting'),
			            'section'        => 'typo_general',
			            'settings'       => 'color_message',
					) )
				);


				$wp_customize->add_setting( 'primary_color', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '#ff6d12',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
					$wp_customize, 
					'primary_color', 
					array(
						'label'          => esc_html__("Primary color",'asting'),
			            'section'        => 'typo_general',
			            'settings'       => 'primary_color',
					) ) 
				);


				$wp_customize->add_setting( 'second_color', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '#ff9d00',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
					$wp_customize, 
					'second_color', 
					array(
						'label'          => esc_html__("Second color",'asting'),
			            'section'        => 'typo_general',
			            'settings'       => 'second_color',
					) ) 
				);

				



				/* Custom Font */
				/* Message */
				$wp_customize->add_setting( 'custom_font_message', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new Asting_Customize_Control_Heading( 
					$wp_customize, 
					'custom_font_message', 
					array(
						'label'          => esc_html__('Custom Font','asting'),
			            'section'        => 'typo_general',
			            'settings'       => 'custom_font_message',
					) )
				);


				$wp_customize->add_control(
					new Asting_Customize_Control_Heading( 
					$wp_customize, 
					'custom_font_message', 
					array(
						'label'          => esc_html__('Custom Font','asting'),
			            'section'        => 'typo_general',
			            'settings'       => 'custom_font_message',
					) )
				);

				$wp_customize->add_setting( 'ova_custom_font', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );

				$wp_customize->add_control('ova_custom_font', array(
					'label' => esc_html__('Custom Font','asting'),
					'description' => esc_html__('Step 1: Insert font-face in style.css file: Refer https://www.w3schools.com/cssref/css3_pr_font-face_rule.asp. Step 2: Insert font-family and font-weight like format: 
						["Perpetua", "Regular:Bold:Italic:Light"] | ["Name-Font", "Regular:Bold:Italic:Light"]. Step 3: Refresh customize page to display new font in dropdown font field.','asting'),
					'section' => 'typo_general',
					'settings' => 'ova_custom_font',
					'type' =>'textarea'
				));

		
			

    }


    /* Layout */
    public function asting_init_ova_layout( $wp_customize ){

    	$wp_customize->add_section( 'layout_section' , array(
		    'title'      => esc_html__( 'Layout', 'asting' ),
		    'priority'   => 2,
		) );


    		

			$wp_customize->add_setting( 'global_layout', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'layout_2r',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('global_layout', array(
				'label' => esc_html__('Layout','asting'),
				'section' => 'layout_section',
				'settings' => 'global_layout',
				'type' =>'select',
				'choices' => apply_filters( 'asting_define_layout', '' )
			));

			$wp_customize->add_setting( 'global_sidebar_width', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => '320',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('global_sidebar_width', array(
				'label' => esc_html__('Sidebar Width (px)','asting'),
				'section' => 'layout_section',
				'settings' => 'global_sidebar_width',
				'type' =>'number'
			));
			

			$wp_customize->add_setting( 'global_width_content', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => '1170',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('global_width_content', array(
				'label' => esc_html__('Width Content (px)','asting'),
				'section' => 'layout_section',
				'settings' => 'global_width_content',
				'type' =>'number',
				'default' => '1170'
			));

			$wp_customize->add_setting( 'global_width_site', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'wide',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('global_width_site', array(
				'label' => esc_html__('Width Site','asting'),
				'section' => 'layout_section',
				'settings' => 'global_width_site',
				'type' =>'select',
				'choices' => apply_filters('asting_define_wide_boxed', '')
			));

			$wp_customize->add_setting( 'global_boxed_container_width', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => '1170',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('global_boxed_container_width', array(
				'label' => esc_html__('Boxed Container Width (px)','asting'),
				'section' => 'layout_section',
				'settings' => 'global_boxed_container_width',
				'type' =>'number',
				'default' => '1170'
			));
			$wp_customize->add_setting( 'global_boxed_offset', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => '20',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('global_boxed_offset', array(
				'label' => esc_html__('Boxed Offset (px)','asting'),
				'section' => 'layout_section',
				'settings' => 'global_boxed_offset',
				'type' =>'number',
				'default' => '20'
			));

    }

    /* Header */
    public function asting_init_ova_header( $wp_customize ){

    	$wp_customize->add_section( 'header_section' , array(
		    'title'      => esc_html__( 'Header', 'asting' ),
		    'priority'   => 3,
		) );

			$wp_customize->add_setting( 'global_header', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'default',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('global_header', array(
				'label' => esc_html__('Header Default','asting'),
				'description' => esc_html__('This isn\'t effect in Blog' ,'asting'),
				'section' => 'header_section',
				'settings' => 'global_header',
				'type' =>'select',
				'choices' => apply_filters('asting_list_header', '')
			));

    }

    /* Footer */
    public function asting_init_ova_footer( $wp_customize ){

    	$wp_customize->add_section( 'footer_section' , array(
		    'title'      => esc_html__( 'Footer', 'asting' ),
		    'priority'   => 4,
		) );

			$wp_customize->add_setting( 'global_footer', array(
			  'type' => 'theme_mod', // or 'option'
			  'capability' => 'edit_theme_options',
			  'theme_supports' => '', // Rarely needed.
			  'default' => 'default',
			  'transport' => 'refresh', // or postMessage
			  'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('global_footer', array(
				'label' => esc_html__('Footer Default','asting'),
				'description' => esc_html__('This isn\'t effect in Blog' ,'asting'),
				'section' => 'footer_section',
				'settings' => 'global_footer',
				'type' =>'select',
				'choices' => apply_filters('asting_list_footer', '')
			));

    }


    /* Blog */
    public function asting_init_ova_blog( $wp_customize ){

    	$wp_customize->add_panel( 'blog_panel', array(
		    'title'      => esc_html__( 'Blog', 'asting' ),
		    'priority' => 5,
		) );

			$wp_customize->add_section( 'blog_section' , array(
			    'title'      => esc_html__( 'Archive', 'asting' ),
			    'priority'   => 30,
			    'panel' => 'blog_panel',
			) );

				$wp_customize->add_setting( 'blog_template', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'default',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('blog_template', array(
					'label' => esc_html__('Type','asting'),
					'section' => 'blog_section',
					'settings' => 'blog_template',
					'type' =>'select',
					'choices' => array(
						'default' => esc_html__('Default', 'asting'),
						'grid' => esc_html__('Grid', 'asting'),
					)
				));

				$wp_customize->add_setting( 'blog_layout', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'layout_2r',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('blog_layout', array(
					'label' => esc_html__('Layout','asting'),
					'section' => 'blog_section',
					'settings' => 'blog_layout',
					'type' =>'select',
					'choices' => apply_filters( 'asting_define_layout', '' )
				));

				$wp_customize->add_setting( 'blog_sidebar_width', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '350',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('blog_sidebar_width', array(
					'label' => esc_html__('Sidebar Width (px)','asting'),
					'section' => 'blog_section',
					'settings' => 'blog_sidebar_width',
					'type' =>'number'
				));


				



			$wp_customize->add_section( 'single_section' , array(
			    'title'      => esc_html__( 'Single', 'asting' ),
			    'priority'   => 30,
			    'panel' => 'blog_panel',
			) );	

				$wp_customize->add_setting( 'single_layout', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'layout_2r',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('single_layout', array(
					'label' => esc_html__('Layout','asting'),
					'section' => 'single_section',
					'settings' => 'single_layout',
					'type' =>'select',
					'choices' => apply_filters( 'asting_define_layout', '' )
				));

				$wp_customize->add_setting( 'single_sidebar_width', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '320',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('single_sidebar_width', array(
					'label' => esc_html__('Sidebar Width (px)','asting'),
					'section' => 'single_section',
					'settings' => 'single_sidebar_width',
					'type' =>'number'
				));


				

				$wp_customize->add_setting( 'single_header', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'default',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('single_header', array(
					'label' => esc_html__('Header','asting'),
					'section' => 'single_section',
					'settings' => 'single_header',
					'type' =>'select',
					'choices' => apply_filters('asting_list_header', '')
				));

				$wp_customize->add_setting( 'single_footer', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'default',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('single_footer', array(
					'label' => esc_html__('Footer','asting'),
					'section' => 'single_section',
					'settings' => 'single_footer',
					'type' =>'select',
					'choices' => apply_filters('asting_list_footer', '')
				));

				$wp_customize->add_setting( 'show_hide_title', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field', // Get function name 
				  'default'  => 'yes',
				) );

				$wp_customize->add_control('show_hide_title', array(
					'label'    => esc_html__('Show/Hide Title','asting'),
					'section'  => 'single_section',
					'settings' => 'show_hide_title',
					'type'     => 'select',
					'choices'  => array(
						'yes' => esc_html__('Yes', 'asting'),
						'no' => esc_html__('No', 'asting'),
						
					)
				));

    }

    public function asting_init_ova_woo( $wp_customize ){

    	$wp_customize->add_section( 'product_detail' , array(
			    'title'      => esc_html__( 'product detail', 'asting' ),
			    'priority'   => 30,
			    'panel' => 'woocommerce',
			) );

    	$wp_customize->add_setting( 'show_hide_title_woo', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field', // Get function name 
				  'default'  => 'yes',
				) );

    	$wp_customize->add_control('show_hide_title_woo', array(
    		'label'    => esc_html__('Show/Hide Title','asting'),
    		'section'  => 'product_detail',
    		'settings' => 'show_hide_title_woo',
    		'type'     => 'select',
    		'choices'  => array(
    			'yes' => esc_html__('Yes', 'asting'),
    			'no' => esc_html__('No', 'asting'),

    		)
    	));
    }

	
}

}

new Asting_Customize();






