<?php
/**
 * Admin Pages
 *
 * @package     MYC
 * @subpackage  Admin/Pages
 * @copyright   Copyright (c) 2017, Daniel Powney
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Creates an options page for plugin settings and links it to a global variable
 *
 * @since 0.1
 * @return void
 */
function myc_add_options_link() {
	global $myc_settings_page;

	$myc_settings_page      = 	add_options_page( __( 'My Chatbot', 'my-chatbot' ), __( 'My Chatbot', 'my-chatbot' ), 'manage_options', 'my-chatbot', 'myc_options_page');
	
}
add_action( 'admin_menu', 'myc_add_options_link', 10 );