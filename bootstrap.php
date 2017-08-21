<?php
/**
 * Plugin Name: Metro Core
 * Plugin URI:
 * Description: Core functionality plugin for Metro Library child theme
 * Version: 1.0.0
 * Author: LuminFire
 * Author URI: https://luminfire.com/
 * Text Domain: metro-core
 */

namespace LuminFire\Metro\Core;


defined( 'ABSPATH' ) or die();


/**
 * Setup the plugin's constants.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_constants() {
	$plugin_url = plugin_dir_url( __FILE__ );

	if ( is_ssl() ) {
		$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
	}

	define( 'METRO_CORE_URL', $plugin_url );
	define( 'METRO_CORE_DIR', plugin_dir_path( __FILE__ ) );
	define( 'METRO_CORE_TEXT_DOMAIN', 'metro_core' );
}


/**
 * Initialize the plugin hooks
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_hooks() {
	register_activation_hook( __FILE__, __NAMESPACE__ . '\activate_plugin' );
	register_deactivation_hook( __FILE__, __NAMESPACE__ . '\deactivate_plugin' );
	register_uninstall_hook( __FILE__, __NAMESPACE__ . '\uninstall_plugin' );
}


/**
 * Plugin activation handler
 *
 * @since 1.0.0
 *
 * @return void
 */
function activate_plugin() {}


/**
 * The plugin is deactivating.  Delete out the rewrite rules option.
 *
 * @since 1.0.0
 *
 * @return void
 */
function deactivate_plugin() {}


/**
 * Uninstall plugin handler
 *
 * @since 1.0.0
 *
 * @return void
 */
function uninstall_plugin() {}


/**
 * Load each of the specified files.
 *
 * @since 1.3.0
 *
 * @param array  $filenames
 * @param string $folder_root
 *
 * @return void
 */
function load_specified_files( array $filenames, $folder_root = '', $ext = '.php' ) {
	$folder_root = $folder_root ? : METRO_CORE_DIR . '/inc/';

	foreach ( $filenames as $filename ) {
		require_once $folder_root . $filename . $ext ;
	}
}


/**
 * Initialize the files to autoload.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_files() {
	$filenames = [
		'genesis',
		'general',
		'gravity-forms',
		'yoast-seo',
		'acf/options-page',
		'acf/general'
	];

	load_specified_files( $filenames );
}


/**
 * Autoload the files and dependencies.
 *
 * @since 1.0.0
 *
 * @return void
 */
function do_autoload() {
	init_files();
}


/**
 * Launch the plugin
 *
 * @since 1.0.0
 *
 * @return void
 */
function launch() {
	init_constants();
	do_autoload();
	load_plugin_textdomain( METRO_CORE_TEXT_DOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

}

add_action( 'plugins_loaded', __NAMESPACE__ . '\launch' );


init_hooks();

