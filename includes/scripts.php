<?php
/**
 * Scripts
 *
 * @package     MYC
 * @subpackage  Functions
 * @copyright   Copyright (c) 2017, Daniel Powney
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Load Scripts
 *
 * Enqueues the required scripts.
 *
 * @since 0.1
 * @return void
 */
function myc_load_scripts() {

	$js_dir = MYC_PLUGIN_URL . 'assets/js/';

	// Use minified libraries if SCRIPT_DEBUG is turned off
	$suffix = ''; //( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_register_script( 'myc-script', $js_dir . 'frontend' . $suffix . '.js', array( 'jquery' ), MYC_VERSION );
	wp_enqueue_script( 'myc-script' );
	
	$general_settings = (array) get_option( 'myc_general_settings' );

	wp_localize_script( 'myc-script', 'myc_script_vars', apply_filters( 'myc_script_vars', array(
			'access_token' => $general_settings['myc_access_token'],
			'enable_welcome_event' => $general_settings['enable_welcome_event'],
			'messaging_platform' => $general_settings['messaging_platform'],
			'base_url' => 'https://api.api.ai/v1/',
			'version_date' => '20150910',
			'messages' => array(
					'internal_error' => __( 'An internal error occured', 'my-chatbot' ),
					'input_unknown' => __( 'I\'m sorry I do not understand.', 'my-chatbot' )
			)
	) ) );

}
add_action( 'wp_enqueue_scripts', 'myc_load_scripts' );


/**
 * Register Styles
 *
 * Checks the styles option and hooks the required filter.
 *
 * @since 0.1
 * @return void
*/
function myc_register_styles() {
	
	$general_settings = (array) get_option( 'myc_general_settings' );
	$disable_css_styles = isset( $general_settings['disable_css_styles'] ) ? $general_settings['disable_css_styles'] : false;
	
	if ( $disable_css_styles ) {
		return;
	}
	
	$css_dir = MYC_PLUGIN_URL . 'assets/css/';
	
	// Use minified libraries if SCRIPT_DEBUG is turned off
	$suffix = ''; //( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	
	wp_register_style( 'myc-style', $css_dir . 'frontend' . $suffix . '.css', array(), MYC_VERSION, 'all' );
	
	$custom_css = '
		.myc-conversation-response, .myc-conversation-response:after {
			background-color: ' . $general_settings['response_background_color'] . ';
			color: ' . $general_settings['response_font_color'] . ';
		}
		.myc-conversation-request, .myc-conversation-request:before  {
			background-color: ' . $general_settings['request_background_color'] . ';
			color: ' . $general_settings['request_font_color'] . ';
		}
		.myc-content-overlay-header {
			background-color: ' . $general_settings['overlay_header_background_color'] . ';
			color: ' . $general_settings['overlay_header_font_color'] . ';
		}
		.myc-conversation-bubble {
			opacity: ' . $general_settings['non_current_opacity'] . ';
    		filter: alpha(opacity=' . 100 * intval( $general_settings['non_current_opacity'] ) . ' ); /* For IE8 and earlier */
		}
		.myc-is-active {
			opacity: 1.0;
    		filter: alpha(opacity=100); /* For IE8 and earlier */
		}
	';
	
	if ( $general_settings['overlay_default_open'] ) {
		$custom_css .= '
			.myc-content-overlay-header .dashicons-arrow-up-alt2 {
				display: none;
			}
		';
	} else {
		$custom_css .= '
			.myc-content-overlay-header .dashicons-arrow-down-alt2, .myc-content-overlay-powered-by, .myc-content-overlay-container {
				display: none;
			}
		';
	}
	wp_add_inline_style( 'myc-style', $custom_css );
	wp_enqueue_style( 'myc-style' );
	
	wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'myc_register_styles' );


/**
 * Load Admin Scripts
 *
 * Enqueues the required admin scripts.
 *
 * @since 0.1
 * @return void
 */
function myc_load_admin_scripts() {
	
	$js_dir = MYC_PLUGIN_URL . 'assets/js/';
	
	// Use minified libraries if SCRIPT_DEBUG is turned off
	$suffix = ''; //( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	
	wp_register_script( 'myc-admin-script', $js_dir . 'admin' . $suffix . '.js', array( 'jquery' ), MYC_VERSION );
	wp_enqueue_script( 'myc-admin-script' );
	
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );
	
}
add_action( 'admin_enqueue_scripts', 'myc_load_admin_scripts' );