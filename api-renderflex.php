<?php
/**
 * Plugin Name:       API RenderFlex
 * Plugin URI:        https://sarahjobs.com/plugins/api-renderflex
 * Description:       API RenderFlex is a WordPress plugin designed to fetch and display data from external APIs with ease.
 * Version:           0.1.0
 * Requires at least: 5.3
 * Requires PHP:      7.2
 * Author:            Sarah Siqueira
 * Author URI:        https://sarahjobs.com/about
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl.html
 * Text Domain:       api-renderflex
 * Domain Path:       /languages
 * Update URI:        https://sarahjobs.com/plugins/api-renderflex/update
 *
 * @package API_RenderFlex
 */

/**
 * Exit is accessed directly.
 */
defined( 'ABSPATH' ) || exit;


/**
 * Define essential constants.
 */
define( 'APIRENDERFLEX_VERSION', '0.1.0' );
define( 'APIRENDERFLEX_PHP_MINIMUM', '7.2.0' );
define( 'APIRENDERFLEX_WP_MINIMUM', '5.3.0' );

/**
 * Composer Autoload
 */
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}


/**
 * Bootstraps the plugin
 */
use APIRenderFlex\Inc\Init;

$init = new Init();
$init->register_classes_list();
