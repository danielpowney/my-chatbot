<?php
/**
 * Shortcodes
*
* @package     MYC
* @subpackage  Shortcodes
* @copyright   Copyright (c) 2017, Daniel Powney
* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
* @since       1.0
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Shortcode to display the chatbot
 *
 */
function myc_chatbot_shortcode( $atts = array(), $content = null, $tag ) {

	extract( shortcode_atts( array(
			'echo' => false,
			'debug' => false
	), $atts ) );

	if ( is_string( $debug ) ) {
		$debug = $debug == 'true' ? true : false;
	}

	$general_settings = (array) get_option( 'myc_general_settings' );

	ob_start();
	myc_get_template_part( 'chatbot', 'shortcode', true, array(
			'debug' 					=> $debug,
			'input_text'				=> $general_settings['input_text'],
			'sequence'					=> My_Chatbot::$sequence++
	) );
	$html = ob_get_contents();
	ob_end_clean();

	$html = apply_filters( 'myc_template_html', $html );

	if ( $echo == true ) {
		echo $html;
	}

	return $html;
}
add_shortcode( 'my_chatbot', 'myc_chatbot_shortcode' );
