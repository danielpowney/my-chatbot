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
 * Hooks MYC actions, when present in the $_GET superglobal.
 * Every edd_action
 * present in $_GET is called using WordPress's do_action function. These
 * functions are called on init.
 *
 * @since 0.1
 * @return void
 */
function myc_get_actions() {
	if (isset ( $_GET ['myc_action'] )) {
		do_action ( 'myc_' . $_GET ['myc_action'], $_GET );
	}
}
add_action ( 'init', 'myc_get_actions' );

/**
 * Hooks MYC actions, when present in the $_POST superglobal.
 * Every edd_action
 * present in $_POST is called using WordPress's do_action function. These
 * functions are called on init.
 *
 * @since 0.1
 * @return void
 *
 */
function myc_post_actions() {
	if (isset ( $_POST ['myc_action'] )) {
		do_action ( 'myc_' . $_POST ['myc_action'], $_POST );
	}
}
add_action ( 'init', 'myc_post_actions' );