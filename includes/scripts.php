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
 * @global $post
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
			'base_url' => 'https://api.api.ai/v1/',
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
	if ( get_option( 'myc_disable_styles', false ) ) {
		//return;
	}
	
	$css_dir = MYC_PLUGIN_URL . 'assets/css/';
	
	// Use minified libraries if SCRIPT_DEBUG is turned off
	$suffix = ''; //( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
//echo $css_dir . 'frontend' . $suffix . '.css'; die();
	wp_register_style( 'myc-style', $css_dir . 'frontend' . $suffix . '.css', array(), MYC_VERSION, 'all' );
	wp_enqueue_style( 'myc-style' );
	
	wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'myc_register_styles' );