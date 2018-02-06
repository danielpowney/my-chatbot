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
		$overlay_settings = is_array( get_option( 'myc_overlay_settings' ) )    ? get_option( 'myc_overlay_settings' )    : array();

		$settings = array_merge( $general_settings, $overlay_settings );

		update_option( 'myc_settings', $settings );
	}

	return apply_filters( 'myc_get_settings', $settings );
}

/**
 * Reister settings
 */
function myc_register_settings() {

	register_setting( 'myc_general_settings', 'myc_general_settings', 'myc_sanitize_general_settings' );
	register_setting( 'myc_overlay_settings', 'myc_overlay_settings', 'myc_sanitize_overlay_settings' );

	add_settings_section( 'myc_section_general', null, 'myc_section_general_desc', 'my-chatbot&tab=myc_general_settings' );
	add_settings_section( 'myc_section_overlay', null, 'myc_section_overlay_desc', 'my-chatbot&tab=myc_overlay_settings' );

	$setting_fields = array(
			'myc_access_token' => array(
					'title' 	=> __( 'Access Token', 'my-chatbot' ),
					'callback' 	=> 'myc_field_input',
					'page' 		=> 'my-chatbot&tab=myc_general_settings',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'myc_access_token',
							'label' 		=> __( 'Enter Dialogflow agent client access token.', 'my-chatbot' ),
							'placeholder'	=> __( 'Enter access token...', 'my-chatbot' ),
							'required'		=> true
					)
			),
			'input_text' => array(
					'title' 	=> __( 'Input Text', 'my-chatbot' ),
					'callback' 	=> 'myc_field_input',
					'page' 		=> 'my-chatbot&tab=myc_general_settings',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'input_text',
							'label' 		=> __( 'Enter input text.', 'my-chatbot' ),
							'placeholder'	=> __( 'Enter input text...', 'my-chatbot' ),
							'required'		=> true
					)
			),
			'enable_welcome_event' => array(
					'title' 	=> __( 'Enable Welcome Event', 'my-chatbot' ),
					'callback' 	=> 'myc_field_checkbox',
					'page' 		=> 'my-chatbot&tab=myc_general_settings',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'enable_welcome_event',
							'label' 		=> __( 'Check this box if you want to display the welcome fallback intent on page load.', 'my-chatbot' )
					)
			),
			'language' => array(
					'title' 	=> __( 'Language', 'my-chatbot' ),
					'callback' 	=> 'myc_field_select',
					'page' 		=> 'my-chatbot&tab=myc_general_settings',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'language',
							'label' 		=> __( 'Leave blank for current locale.', 'my-chatbot' ),
							'select_options' => array(
									'' 		=> __( '', 'my-chatbot' ),
									'pt-BR' 		=> __( 'Brazilian Portuguese', 'my-chatbot' ),
									'zh-HK' 		=> __( 'Chinese (Cantonese)', 'my-chatbot' ),
									'zh-CN' 		=> __( 'Chinese (Simplified)', 'my-chatbot' ),
									'zh-TW' 		=> __( 'Chinese (Traditional)', 'my-chatbot' ),
									'en' 			=> __( 'English', 'my-chatbot' ),
									'en-AU' 		=> __( 'English - Autralian locale', 'my-chatbot' ),
									'en-CA' 		=> __( 'English - Canadian locale', 'my-chatbot' ),
									'en-GB' 		=> __( 'English - Great Britain locale', 'my-chatbot' ),
									'en-IN' 		=> __( 'English - Indian locale', 'my-chatbot' ),
									'en-US' 		=> __( 'English - US locale', 'my-chatbot' ),
									'nl' 			=> __( 'Dutch', 'my-chatbot' ),
									'fr' 			=> __( 'French', 'my-chatbot' ),
									'fr-CA' 		=> __( 'French - Canadian locale', 'my-chatbot' ),
									'gr' 			=> __( 'German', 'my-chatbot' ),
									'it' 			=> __( 'Italian', 'my-chatbot' ),
									'ja' 			=> __( 'Japanese', 'my-chatbot' ),
									'ko' 			=> __( 'Korean', 'my-chatbot' ),
									'pt' 			=> __( 'Portuguese', 'my-chatbot' ),
									'ru' 			=> __( 'Russian', 'my-chatbot' ),
									'es' 			=> __( 'Spanish', 'my-chatbot' ),
									'es-419' 		=> __( 'Spanish - Latin America locale', 'my-chatbot' ),
									'es-ES' 		=> __( 'Spanish - Spain locale', 'my-chatbot' ),
									'uk' 			=> __( 'Ukranian', 'my-chatbot' )
								)
					)
			),
			'messaging_platform' => array(
					'title' 	=> __( 'Messaging Platform', 'my-chatbot' ),
					'callback' 	=> 'myc_field_radio_buttons',
					'page' 		=> 'my-chatbot&tab=myc_general_settings',
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
							'label'			=> __( 'Assume appearance of a Dialogflow supported messaging platform. Note default responses do not support rich message content.', 'my-chatbot' )
					)
			),
			'show_time' => array(
					'title' 	=> __( 'Show Time', 'my-chatbot' ),
					'callback' 	=> 'myc_field_checkbox',
					'page' 		=> 'my-chatbot&tab=myc_general_settings',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'show_time',
							'label' 		=> __( 'Check this box if you want to show the time underneath the conversation bubbles.', 'my-chatbot' )
					)
			),
			'show_loading' => array(
					'title' 	=> __( 'Show Loading', 'my-chatbot' ),
					'callback' 	=> 'myc_field_checkbox',
					'page' 		=> 'my-chatbot&tab=myc_general_settings',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'show_loading',
							'label' 		=> __( 'Check this box if you want to display loading dots until a response is returned.', 'my-chatbot' )
					)
			),
			'loading_dots_color' => array(
					'title' 	=> __( 'Loading Dots Color', 'my-chatbot' ),
					'callback' 	=> 'myc_field_color_picker',
					'page' 		=> 'my-chatbot&tab=myc_general_settings',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'loading_dots_color',
							'label'			=> __( 'Choose a color for the loading dots.', 'my-chatbot' )
					)
			),
			'response_delay' => array(
					'title' 	=> __( 'Response Delay', 'my-chatbot' ),
					'callback' 	=> 'myc_field_input',
					'page' 		=> 'my-chatbot&tab=myc_general_settings',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'response_delay',
							'label' 		=> __( 'milliseconds. Add a delay between messages.', 'my-chatbot' ),
							'min'			=> 0,
							'max'			=> 5000,
							'required'		=> true,
							'type' 			=> 'number',
							'class'			=> 'small-text'
					)
			),
			'request_background_color' => array(
					'title' 	=> __( 'Request Background Color', 'my-chatbot' ),
					'callback' 	=> 'myc_field_color_picker',
					'page' 		=> 'my-chatbot&tab=myc_general_settings',
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
					'page' 		=> 'my-chatbot&tab=myc_general_settings',
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
					'page' 		=> 'my-chatbot&tab=myc_general_settings',
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
					'page' 		=> 'my-chatbot&tab=myc_general_settings',
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
					'page' 		=> 'my-chatbot&tab=myc_general_settings',
					'section' 	=> 'myc_section_general',
					'args' => array(
							'option_name' 	=> 'myc_general_settings',
							'setting_id' 	=> 'non_current_opacity',
							'label' 		=> __( 'Set the background color opacity for non current converation bubbles.', 'my-chatbot' ),
							'type'			=> 'number',
							'class'			=> 'small-text',
							'min'			=> 0,
							'max'			=> 1,
							'step'			=> 0.05,
							'required'		=> true
					)
			),
			'enable_overlay' => array(
					'title' 	=> __( 'Enable Overlay', 'my-chatbot' ),
					'callback' 	=> 'myc_field_checkbox',
					'page' 		=> 'my-chatbot&tab=myc_overlay_settings',
					'section' 	=> 'myc_section_overlay',
					'args' => array(
							'option_name' 	=> 'myc_overlay_settings',
							'setting_id' 	=> 'enable_overlay',
							'label' 		=> __( 'Check this box if you want to enable an overlay of the chatbot on every page. Note you can override this setting from the Edit post screen for specific posts.', 'my-chatbot' )
					)
			),
			'overlay_header_background_color' => array(
					'title' 	=> __( 'Header Background Color', 'my-chatbot' ),
					'callback' 	=> 'myc_field_color_picker',
					'page' 		=> 'my-chatbot&tab=myc_overlay_settings',
					'section' 	=> 'myc_section_overlay',
					'args' => array(
							'option_name' 	=> 'myc_overlay_settings',
							'setting_id' 	=> 'overlay_header_background_color',
							'label'			=> __( 'Choose a background color for the overlay header.', 'my-chatbot' )
					)
			),
			'overlay_header_font_color' => array(
					'title' 	=> __( 'Header Font Color', 'my-chatbot' ),
					'callback' 	=> 'myc_field_color_picker',
					'page' 		=> 'my-chatbot&tab=myc_overlay_settings',
					'section' 	=> 'myc_section_overlay',
					'args' => array(
							'option_name' 	=> 'myc_overlay_settings',
							'setting_id' 	=> 'overlay_header_font_color',
							'label'			=> __( 'Choose a font color for the overlay header text.', 'my-chatbot' )
					)
			),
			'overlay_default_open' => array(
					'title' 	=> __( 'Default Open', 'my-chatbot' ),
					'callback' 	=> 'myc_field_checkbox',
					'page' 		=> 'my-chatbot&tab=myc_overlay_settings',
					'section' 	=> 'myc_section_overlay',
					'args' => array(
							'option_name' 	=> 'myc_overlay_settings',
							'setting_id' 	=> 'overlay_default_open',
							'label' 		=> __( 'Check this box if you want to default the overlay to open on page load.', 'my-chatbot' )
					)
			),
			'overlay_header_text' => array(
					'title' 	=> __( 'Header Text', 'my-chatbot' ),
					'callback' 	=> 'myc_field_input',
					'page' 		=> 'my-chatbot&tab=myc_overlay_settings',
					'section' 	=> 'myc_section_overlay',
					'args' => array(
							'option_name' 	=> 'myc_overlay_settings',
							'setting_id' 	=> 'overlay_header_text',
							'label' 		=> __( 'Enter overlay header text.', 'my-chatbot' ),
							'placeholder'	=> __( 'Enter overlay header text...', 'my-chatbot' )
					)
			),
			'overlay_powered_by_text' => array(
					'title' 	=> __( 'Powered By Text', 'my-chatbot' ),
					'callback' 	=> 'myc_field_input',
					'page' 		=> 'my-chatbot&tab=myc_overlay_settings',
					'section' 	=> 'myc_section_overlay',
					'args' => array(
							'option_name' 	=> 'myc_overlay_settings',
							'setting_id' 	=> 'overlay_powered_by_text',
							'label' 		=> __( 'Enter overlay powered by text. If empty, the powered by bar will not be displayed.', 'my-chatbot' ),
							'placeholder'	=> __( 'Enter powered by text...', 'my-chatbot' )
					)
			),
			'disable_css_styles' => array(
					'title' 	=> __( 'Disable CSS Styles', 'my-chatbot' ),
					'callback' 	=> 'myc_field_checkbox',
					'page' 		=> 'my-chatbot&tab=myc_general_settings',
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
			'input_text'						=> __( 'Ask something...', 'my-chatbot' ),
			'enable_welcome_event'				=> false,
			'language'							=> 'en',
			'messaging_platform'				=> 'default',
			'show_time'							=> true,
			'show_loading'						=> true,
			'loading_dots_color'				=> '#1f4c73',
			'response_delay'					=> 1500,

			// conversation bubbles
			'request_background_color'			=> '#1f4c73',
			'request_font_color'				=> '#fff',
			'response_background_color'			=> '#e8e8e8',
			'response_font_color'				=> '#323232',
			'non_current_opacity'				=> 0.8,

			'disable_css_styles'				=> false,
	), $general_settings );

	update_option( 'myc_general_settings', $general_settings );

	$overlay_settings = (array) get_option( 'myc_overlay_settings' );

	$overlay_settings = array_merge( array(
			'enable_overlay'					=> true,
			'overlay_default_open'				=> false,
			'overlay_powered_by_text'			=> __( 'Powered by <a href="#">Replace Me</a>', 'my-chatbot' ),
			'overlay_header_text'				=> __( 'My Chatbot', 'my-chatbot' ),
			'overlay_header_background_color'	=> '#1f4c73',
			'overlay_header_font_color'			=> '#fff',
	), $overlay_settings );

	update_option( 'myc_overlay_settings', $overlay_settings );

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

	if ( isset( $input['show_time'] ) && $input['show_time'] == 'true' ) {
		$input['show_time'] = true;
	} else {
		$input['show_time'] = false;
	}

	if ( isset( $input['show_loading'] ) && $input['show_loading'] == 'true' ) {
		$input['show_loading'] = true;
	} else {
		$input['show_loading'] = false;
	}

	if ( ! is_numeric( $input['response_delay'] ) ) {
		add_settings_error( 'myc_general_settings', 'non_numeric_response_delay', __( 'Response delay must be numeric.' , 'my-chatbot' ), 'error' );
	} else if ( intval( $input['response_delay'] ) < 0 || intval( $input['response_delay'] ) > 5000 ) {
		add_settings_error( 'myc_general_settings', 'range_error_response_delay', __( 'Response delay cannot be less than 0 or greater than 5000.', 'my-chatbot' ), 'error' );
	}

	if ( isset( $input['disable_css_styles'] ) && $input['disable_css_styles'] == 'true' ) {
		$input['disable_css_styles'] = true;
	} else {
		$input['disable_css_styles'] = false;
	}

	if ( ! is_numeric( $input['non_current_opacity'] ) ) {
		add_settings_error( 'myc_general_settings', 'non_numeric_non_current_opacity', __( 'Non current opacity must be numeric.' , 'my-chatbot' ), 'error' );
	} else if ( floatval( $input['non_current_opacity'] ) < 0 || floatval( $input['non_current_opacity'] ) > 1 ) {
		add_settings_error( 'myc_general_settings', 'range_error_non_current_opacity', __( 'Non current opacity cannot be less than 0 or greater than 1.', 'my-chatbot' ), 'error' );
	}

	return $input;
}


/**
 * Sanitize chatbot overlay settings
 * @param 	$input
 */
function myc_sanitize_overlay_settings( $input ) {

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

	return $input;
}
