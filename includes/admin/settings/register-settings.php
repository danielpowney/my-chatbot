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
					'callback' 	=> 'myc_field_input',
					'page' 		=> 'my-chatbot',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'myc_access_token',
							'label' 		=> __( 'Enter API.API agent client access token.', 'my-chatbot' )
					)
			),
			'enable_welcome_event' => array(
					'title' 	=> __( 'Enable Welcome Event', 'my-chatbot' ),
					'callback' 	=> 'myc_field_checkbox',
					'page' 		=> 'my-chatbot',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'enable_welcome_event',
							'label' 		=> __( 'Check this box if you want to display the welcome fallback intent on page load.', 'my-chatbot' )
					)
			),
			'messaging_platform' => array(
					'title' 	=> __( 'Messaging Platform', 'my-chatbot' ),
					'callback' 	=> 'myc_field_radio_buttons',
					'page' 		=> 'my-chatbot',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'messaging_platform',
							'radio_buttons'	=> array(
									array(
											'value' => 'default',
											'label' => __( 'Default', 'my-chatbot' ),
									),
									array(
											'value' => 'google',
											'label' => __( 'Actions on Google', 'my-chatbot' ),
									),
									array(
											'value' => 'facebook',
											'label' => __( 'Facebook Messenger', 'my-chatbot' ),
									),
									array(
											'value' => 'slack',
											'label' => __( 'Slack', 'my-chatbot' ),
									),
									array(
											'value' => 'telegram',
											'label' => __( 'Telegram', 'my-chatbot' ),
									),
									array(
											'value' => 'kik',
											'label' => __( 'Kik', 'my-chatbot' ),
									),
									array(
											'value' => 'viber',
											'label' => __( 'Viber', 'my-chatbot' ),
									),
									array(
											'value' => 'skype',
											'label' => __( 'Skype', 'my-chatbot' ),
									)
									
							),
							'label'			=> __( 'Assume appearance of a API.AI supported messaging platform. Note default responses do not support rich message content.', 'my-chatbot' )
					)
			),
			'request_background_color' => array(
					'title' 	=> __( 'Request Background Color', 'my-chatbot' ),
					'callback' 	=> 'myc_field_color_picker',
					'page' 		=> 'my-chatbot',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'request_background_color',
							'label'			=> __( 'Choose a background color for the conversation request bubble.', 'my-chatbot' )
					)
			),
			'request_font_color' => array(
					'title' 	=> __( 'Request Font Color', 'my-chatbot' ),
					'callback' 	=> 'myc_field_color_picker',
					'page' 		=> 'my-chatbot',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'request_font_color',
							'label'			=> __( 'Choose a font color for the conversation request text.', 'my-chatbot' )
					)
			),
			'response_background_color' => array(
					'title' 	=> __( 'Response Background Color', 'my-chatbot' ),
					'callback' 	=> 'myc_field_color_picker',
					'page' 		=> 'my-chatbot',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'response_background_color',
							'label'			=> __( 'Choose a background color for the conversation response bubble.', 'my-chatbot' )
					)
			),
			'response_font_color' => array(
					'title' 	=> __( 'Response Font Color', 'my-chatbot' ),
					'callback' 	=> 'myc_field_color_picker',
					'page' 		=> 'my-chatbot',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'response_font_color',
							'label'			=> __( 'Choose a font color for the conversation response text.', 'my-chatbot' )
					)
			),
			'non_current_opacity' => array(
					'title' 	=> __( 'Non Current Opacity', 'my-chatbot' ),
					'callback' 	=> 'myc_field_input',
					'page' 		=> 'my-chatbot',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'non_current_opacity',
							'label' 		=> __( 'Set the background color opacity for non current converation bubbles.', 'my-chatbot' ),
							'type'			=> 'number',
							'class'			=> 'small-text',
							'min'			=> 0,
							'max'			=> 1,
							'step'			=> 0.05
					)
			),
			'overlay_header_background_color' => array(
					'title' 	=> __( 'Overlay Header Background Color', 'my-chatbot' ),
					'callback' 	=> 'myc_field_color_picker',
					'page' 		=> 'my-chatbot',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'overlay_header_background_color',
							'label'			=> __( 'Choose a background color for the overlay header.', 'my-chatbot' )
					)
			),
			'overlay_header_font_color' => array(
					'title' 	=> __( 'Overlay Header Font Color', 'my-chatbot' ),
					'callback' 	=> 'myc_field_color_picker',
					'page' 		=> 'my-chatbot',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'overlay_header_font_color',
							'label'			=> __( 'Choose a font color for the overlay header text.', 'my-chatbot' )
					)
			),
			'enable_overlay' => array(
					'title' 	=> __( 'Enable Overlay', 'my-chatbot' ),
					'callback' 	=> 'myc_field_checkbox',
					'page' 		=> 'my-chatbot',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'enable_overlay',
							'label' 		=> __( 'Check this box if you want to enable an overlay of the chatbot on every page.', 'my-chatbot' )
					)
			),
			'overlay_default_open' => array(
					'title' 	=> __( 'Overlay Default Open', 'my-chatbot' ),
					'callback' 	=> 'myc_field_checkbox',
					'page' 		=> 'my-chatbot',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'overlay_default_open',
							'label' 		=> __( 'Check this box if you want to default the overlay to open on page load.', 'my-chatbot' )
					)
			),
			'overlay_header_text' => array(
					'title' 	=> __( 'Overlay Header Text', 'my-chatbot' ),
					'callback' 	=> 'myc_field_input',
					'page' 		=> 'my-chatbot',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'overlay_header_text',
							'label' 		=> __( 'Enter overlay header text.', 'my-chatbot' )
					)
			),
			'overlay_powered_by_text' => array(
					'title' 	=> __( 'Overlay Powered By Text', 'my-chatbot' ),
					'callback' 	=> 'myc_field_input',
					'page' 		=> 'my-chatbot',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'overlay_powered_by_text',
							'label' 		=> __( 'Enter overlay powered by text. If empty, the powered by bar will not be displayed.', 'my-chatbot' )
					)
			),
			'disable_css_styles' => array(
					'title' 	=> __( 'Disable CSS Styles', 'my-chatbot' ),
					'callback' 	=> 'myc_field_checkbox',
					'page' 		=> 'my-chatbot',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'disable_css_styles',
							'label' 		=> __( 'Check this box if you want to disable loading the plugin default CSS styles.', 'my-chatbot' )
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
			'myc_access_token' 					=> '',
			'enable_welcome_event'				=> false,
			'messaging_platform'				=> 'default',
			
			// conversation bubbles
			'request_background_color'			=> '#1f4c73',
			'request_font_color'				=> '#fff',
			'response_background_color'			=> '#e8e8e8',
			'response_font_color'				=> '#323232',
			'non_current_opacity'				=> 0.8,
			
			// overlay
			'enable_overlay'					=> true,
			'overlay_default_open'				=> false,
			'overlay_powered_by_text'			=> __( 'Powered by <a href="#">Replace Me</a>', 'my-chatbot' ),
			'overlay_header_text'				=> __( 'My Chatbot', 'my-chatbot' ),
			'overlay_header_background_color'	=> '#1f4c73',
			'overlay_header_font_color'			=> '#fff',
			
			'disable_css_styles'				=> false,
			
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
	
	if ( isset( $input['enable_welcome_event'] ) && $input['enable_welcome_event'] == 'true' ) {
		$input['enable_welcome_event'] = true;
	} else {
		$input['enable_welcome_event'] = false;
	}
	
	if ( isset( $input['disable_css_styles'] ) && $input['disable_css_styles'] == 'true' ) {
		$input['disable_css_styles'] = true;
	} else {
		$input['disable_css_styles'] = false;
	}
	
	if ( isset( $input['overlay_default_open'] ) && $input['overlay_default_open'] == 'true' ) {
		$input['overlay_default_open'] = true;
	} else {
		$input['overlay_default_open'] = false;
	}
	
	if ( isset( $input['enable_overlay'] ) && $input['enable_overlay'] == 'true' ) {
		$input['enable_overlay'] = true;
	} else {
		$input['enable_overlay'] = false;
	}
	
	if ( ! is_numeric( $input['non_current_opacity'] ) ) {
		add_settings_error( 'myc_general_settings', 'non_numeric_non_current_opacity', __( 'Non current opacity must be numeric.' , 'my-chatbot' ), 'error' );
	} else if ( floatval( $input['non_current_opacity'] ) < 0 || floatval( $input['non_current_opacity'] ) > 1 ) {
		add_settings_error( 'myc_general_settings', 'range_error_non_current_opacity', __( 'Non current opacity cannot be less than 0 or greater than 1.', 'my-chatbot' ), 'error' );
	}
	
	return $input;
}