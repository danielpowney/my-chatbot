<?php 
/**
 * Register Settings
 *
 * @package     MYC
 * @subpackage  Admin/Settings
 * @copyright   Copyright (c) 2017, Daniel Powney
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.1
*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Get Settings
 *
 * Retrieves all plugin settings
 *
 * @since 0.1
 * @return array MYC settings
 */
function myc_get_settings() {

	$settings = get_option( 'myc_settings' );

	if( empty( $settings ) ) {

		// Update old settings with new single option

		$general_settings = is_array( get_option( 'myc_general_settings' ) )    ? get_option( 'myc_general_settings' )    : array();
		
		$settings = array_merge( $general_settings );

		update_option( 'myc_settings', $settings );
	}
	
	return apply_filters( 'myc_get_settings', $settings );
}

/**
 * Reister settings
 */
function myc_register_settings() {
	
	register_setting( 'myc_general_settings', 'myc_general_settings', 'myc_sanitize_general_settings' );
	
	add_settings_section( 'myc_section_general', null, 'myc_section_general_desc', 'my-chatbot' );
	
	$setting_fields = array(
			'myc_access_token' => array(
					'title' 	=> __( 'Access Token', 'my-chatbot' ),
					'callback' 	=> 'field_input',
					'page' 		=> 'my-chatbot',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'myc_access_token',
							'label' 		=> __( 'Enter API.API agent client access token.', 'my-chatbot' )
					)
			),
				
	);
	
	foreach ( $setting_fields as $setting_id => $setting_data ) {
		// $id, $title, $callback, $page, $section, $args
		add_settings_field( $setting_id, $setting_data['title'], $setting_data['callback'], $setting_data['page'], $setting_data['section'], $setting_data['args'] );
	}
}

/**
 * Set default settings if not set
 */
function myc_default_settings() {

	$general_settings = (array) get_option( 'myc_general_settings' );

	$general_settings = array_merge( array(
			'myc_access_token' => '',
	), $general_settings );

	update_option( 'myc_general_settings', $general_settings );

}

if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
	add_action( 'admin_init', 'myc_default_settings', 10, 0 );
	add_action( 'admin_init', 'myc_register_settings' );
	
}

/**
 * Sanitize general settings
 * @param 	$input 
 */
function myc_sanitize_general_settings( $input ) {
	return $input;
}