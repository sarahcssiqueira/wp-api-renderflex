<?php
/**
 * Trigger this file on Plugin uninstall
 *
 * @package API_RenderFlex
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

/**
 * Access the database via SQL
*/
global $wpdb;
$wpdb->query( 'your SQL queries' );
