<?php
/**
 * Plugin Name: Plugin Boilerplate
 * Plugin URI:  https://evolvewp.dev
 * Github URI:  https://github.com/FifeCIC/EvolveWP.PluginBoilerplate
 * Description: EvolveWP ecosystem plugin boilerplate. Clone and rename for new plugins.
 * Version:     1.0.0
 * Author:      FifeCIC
 * Author URI:  https://evolvewp.dev
 * Requires at least: 5.6
 * Tested up to: 6.8
 * Requires PHP: 7.4
 * License:     GPL-3.0-or-later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: plugin-boilerplate
 * Domain Path: /i18n/languages/
 *
 * @package EvolveWP\PluginBoilerplate
 * @category Core
 * @author FifeCIC
 * @license GNU General Public License, Version 3
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'PluginBoilerplate' ) ) :

	if ( ! defined( 'PLUGIN_BOILERPLATE_VERSION' ) ) { define( 'PLUGIN_BOILERPLATE_VERSION', '1.0.0' ); }
	if ( ! defined( 'PLUGIN_BOILERPLATE_PLUGIN_FILE' ) ) { define( 'PLUGIN_BOILERPLATE_PLUGIN_FILE', __FILE__ ); }
	if ( ! defined( 'PLUGIN_BOILERPLATE_PLUGIN_BASENAME' ) ) { define( 'PLUGIN_BOILERPLATE_PLUGIN_BASENAME', plugin_basename( __FILE__ ) ); }
	if ( ! defined( 'PLUGIN_BOILERPLATE_PLUGIN_DIR_PATH' ) ) { define( 'PLUGIN_BOILERPLATE_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) ); }
	if ( ! defined( 'PLUGIN_BOILERPLATE_PLUGIN_DIR' ) ) { define( 'PLUGIN_BOILERPLATE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) ); }
	if ( ! defined( 'PLUGIN_BOILERPLATE_PLUGIN_URL' ) ) { define( 'PLUGIN_BOILERPLATE_PLUGIN_URL', plugin_dir_url( __FILE__ ) ); }

	// Composer PSR-4 autoloader — handles all EvolveWP\PluginBoilerplate\ namespaced classes.
	if ( file_exists( PLUGIN_BOILERPLATE_PLUGIN_DIR_PATH . 'vendor/autoload.php' ) ) {
		require_once PLUGIN_BOILERPLATE_PLUGIN_DIR_PATH . 'vendor/autoload.php';
	}

	// Load core functions with importance on making them available to third-party.
	require_once PLUGIN_BOILERPLATE_PLUGIN_DIR_PATH . 'install.php';
	include_once PLUGIN_BOILERPLATE_PLUGIN_DIR_PATH . 'functions.php';
	include_once PLUGIN_BOILERPLATE_PLUGIN_DIR_PATH . 'deprecated.php';

	// Run the plugin.
	include_once PLUGIN_BOILERPLATE_PLUGIN_DIR_PATH . 'loader.php';

endif;
