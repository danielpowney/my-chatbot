<?php

if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit();

// Delete Token table on plugin uninstall
global $wpdb;
$table_name = $wpdb->prefix . 'myc_token';
$wpdb->query( "DROP TABLE IF EXISTS {$table_name}" );
delete_option("myc_db_version");
