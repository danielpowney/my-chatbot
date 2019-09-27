<?php
/**
 * Install Function
 *
 * @package     MYC
 * @subpackage  Functions/Install
 * @copyright   Copyright (c) 2017, Daniel Powney
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.1
 */

// Exit if accessed directly
if (! defined ( 'ABSPATH' ))
	exit ();

/**
 * Install
 */
function myc_install() {

	// Add the transient to redirect
	set_transient( '_myc_activation_redirect', true, 30 );

	// Create Databse to Store current Google O-Auth Tokens
	global $wpdb;
	$myc_db_version = '1.0';

	$table_name = $wpdb->prefix . 'myc_token';

	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
		token VARCHAR(255) NOT NULL,
		timecreated VARCHAR(255) NOT NULL,
		validuntil VARCHAR(255) NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'myc_db_version', $myc_db_version );

}
register_activation_hook( MYC_PLUGIN_FILE, 'myc_install' );
