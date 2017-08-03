<?php
/**
 * Front-end Actions
 *
 * @package     MYC
 * @subpackage  Functions
 * @copyright   Copyright (c) 2017, Daniel Powney
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.1
 */

// Exit if accessed directly
if (! defined ( 'ABSPATH' ))
	exit ();

/**
 * Content content
 */
function myc_content_overlay() {
	
	$general_settings = (array) get_option( 'myc_general_settings' );
	
	ob_start();
	myc_get_template_part( 'chatbot', 'overlay', true, array(
			'overlay_header_text' 		=> $general_settings['overlay_header_text'],
			'overlay_powered_by_text' 	=> $general_settings['overlay_powered_by_text'],
			'toggle_class'				=> $general_settings['overlay_default_open'] == true ? 'myc-toggle-open' :  'myc-toggle-closed'
	) );
	$html = ob_get_contents();
	ob_end_clean();
	
	echo $html;
}

$general_settings = (array) get_option( 'myc_general_settings' );
if ( isset( $general_settings['enable_overlay'] ) 
		&& apply_filters( 'myc_enable_overlay', $general_settings['enable_overlay'] ) ) {
	add_action( 'wp_footer', 'myc_content_overlay' );	
}
