<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */



add_action( 'cmb2_init', 'asting_metaboxes_default' );
function asting_metaboxes_default() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'ova_met_';
    

        /* Give Forms Settings *********************************************************************************/
        /* *******************************************************************************/
        $give_forms_settings = new_cmb2_box( array(
            'id'           => 'give_form',
            'title'        => esc_html__( 'Extra Fields Give Forms Settings', 'asting' ),
            'object_types' => array('give_forms'), // Post type
            'context'      => 'normal',
            'priority'     => 'high',
            'show_names'   => true, // Show field names on the left
        ) );

        // Video or Audio
            $give_forms_settings->add_field( array(
                'name' => esc_html__( 'Link audio or video', 'asting' ),
                'desc' => esc_html__( 'Insert link audio or video use for video/audio', 'asting' ),
                'id'   => $prefix . 'media_give',
                'type' => 'oembed',
            ) );

            // Gallery image
            $give_forms_settings->add_field( array(
                'name' => esc_html__( 'Gallery image', 'asting' ),
                'desc' => esc_html__( 'image in gallery post format', 'asting' ),
                'id'   => $prefix . 'gallery_give',
                'type' => 'file_list',
            ) );

          // Feature
            $give_forms_settings->add_field( array(
                'name' => esc_html__( 'Feature', 'asting' ),
                'id'   => $prefix . 'feature_give',
                'type' => 'checkbox',
            ) );

    

   
}

