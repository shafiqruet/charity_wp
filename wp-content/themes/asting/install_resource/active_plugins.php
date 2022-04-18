<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme omytheme for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 */
require_once (ASTING_URL.'/inc/vendor/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'asting_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function asting_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        array(
            'name'                     => esc_html__('Elementor','asting'),
            'slug'                     => 'elementor',
            'required'                 => true,
        ),
         array(
            'name'                     => esc_html__('Recent Posts Widget','asting'),
            'slug'                     => 'recent-posts-widget-with-thumbnails',
            'required'                 => true,
        ),
        array(
            'name'                     => esc_html__('Contact Form 7','asting'),
            'slug'                     => 'contact-form-7',
            'required'                 => true,
        ),
        array(
            'name'                     => esc_html__('Widget importer exporter','asting'),
            'slug'                     => 'widget-importer-exporter',
            'required'                 => true,
        ),
        array(
            'name'                     => esc_html__('Metabox','asting'),
            'slug'                     => 'cmb2',
            'required'                 => true,
        ),
        array(
            'name'                     => esc_html__('One click demo import','asting'),
            'slug'                     => 'one-click-demo-import',
            'required'                 => true,
        ),
        array(
            'name'                     => esc_html__('OvaTheme Framework','asting'),
            'slug'                     => 'ova-framework',
            'required'                 => true,
            'source'                   => get_template_directory() . '/install_resource/plugins/ova-framework.zip',
            'version'                  => '1.0.2',
            
        ),
        array(
            'name'                     => esc_html__('OvaTheme Events','asting'),
            'slug'                     => 'ova-events',
            'required'                 => true,
            'source'                   => get_template_directory() . '/install_resource/plugins/ova-events.zip',
            'version'                  => '1.0.0',
            
        ),
        array(
            'name'                     => esc_html__('Revolution Slider','asting'),
            'slug'                     => 'revslider',
            'required'                 => true,
            'source'                   => get_template_directory() . '/install_resource/plugins/revslider.zip',
            'version'                  => '6.4.3',
            
        ),
        array(
            'name'                     => esc_html__('Give','asting'),
            'slug'                     => 'give',
            'required'                 => true,
        ),
        array(
            'name'                     => esc_html__('WooCommerce','asting'),
            'slug'                     => 'woocommerce',
            'required'                 => true,
        ),
        array(
            'name'                     => esc_html__('Mailchimp','asting'),
            'slug'                     => 'mailchimp-for-wp',
            'required'                 => true,
        ),
        

    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'asting',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

        
    );

    tgmpa( $plugins, $config );
}





function asting_after_import_setup() {
    // Assign menus to their locations.
    $primary = get_term_by( 'name', 'Primary Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $primary->term_id,
        )
    );

    

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home 1' );
    $blog_page_id  = get_page_by_title( 'Blog' );


    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
    

}
add_action( 'pt-ocdi/after_import', 'asting_after_import_setup' );


function asting_import_files() {
    return array(
        array(
            'import_file_name'             => 'Demo Import',
            'categories'                   => array( 'Category 1', 'Category 2' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'install_resource/demo_import/demo-content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'install_resource/demo_import/widgets.wie',
            'local_import_customizer_file'   => trailingslashit( get_template_directory() ) . 'install_resource/demo_import/customize.dat',
            'import_preview_image_url'     => 'http://demo.ovathemes.com/documentation/demo_import.jpg',
        )
    );
}
add_filter( 'pt-ocdi/import_files', 'asting_import_files' );