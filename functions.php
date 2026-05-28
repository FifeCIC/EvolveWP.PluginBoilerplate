<?php
/**
 * Plugin Boilerplate global helper functions.
 *
 * ROLE: Global accessor functions for namespaced classes.
 * DEPENDS ON: EvolveWP\PluginBoilerplate\ namespaced classes via Composer autoloader.
 * CONSUMED BY: Any plugin or template that needs the ecosystem registry or main instance.
 * DATA FLOW: Provides shorthand access to singleton instances.
 *
 * @package  EvolveWP\PluginBoilerplate
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the main Plugin Boilerplate plugin instance.
 *
 * Shorthand for PluginBoilerplate::instance(). Prevents the need to use
 * globals anywhere in the codebase.
 *
 * @since  1.0.0
 *
 * @return PluginBoilerplate
 */
function PluginBoilerplate() {
	return PluginBoilerplate::instance();
}

/**
 * Return the ecosystem Registry singleton.
 *
 * Global accessor for \EvolveWP\PluginBoilerplate\Ecosystem\Registry.
 *
 * @since  1.0.0
 *
 * @return \EvolveWP\PluginBoilerplate\Ecosystem\Registry
 */
function plugin_boilerplate_ecosystem() {
	return \EvolveWP\PluginBoilerplate\Ecosystem\Registry::instance();
}

/**
 * Return the structured Logger singleton.
 *
 * Global accessor for \EvolveWP\PluginBoilerplate\Core\Logger.
 *
 * @since  1.0.0
 *
 * @return \EvolveWP\PluginBoilerplate\Core\Logger
 */
function plugin_boilerplate_log() {
	return \EvolveWP\PluginBoilerplate\Core\Logger::instance();
}

/**
 * Record a trace entry via the structured Logger.
 *
 * Convenience shorthand for plugin_boilerplate_log()->trace().
 *
 * @since  1.0.0
 *
 * @param string $type    Trace type.
 * @param string $message Description.
 * @param array  $data    Optional structured data.
 *
 * @return void
 */
function plugin_boilerplate_trace( $type, $message, $data = array() ) {
	\EvolveWP\PluginBoilerplate\Core\Logger::instance()->trace( $type, $message, $data );
}

/**
 * Create or retrieve an API connector instance.
 *
 * Global accessor for EvolveWP_Boilerplate_API_Factory::create_from_settings().
 *
 * @since  1.0.0
 *
 * @param string $provider_id Provider identifier (e.g. 'github', 'discord').
 * @param string $account_id  Optional. Account identifier for multi-account setups.
 *
 * @return \EvolveWP\PluginBoilerplate\API\Connector_Interface|\WP_Error Connector instance or error.
 */
function plugin_boilerplate_connector( $provider_id, $account_id = '' ) {
	return EvolveWP_Boilerplate_API_Factory::create_from_settings( $provider_id, $account_id );
}

/**
 * Check whether a user has a specific capability.
 *
 * Global accessor for \EvolveWP\PluginBoilerplate\Core\Capability_Manager::user_can().
 *
 * @since  1.0.0
 *
 * @param string   $capability Capability name to check.
 * @param int|null $user_id    User ID to check. Null = current user.
 *
 * @return bool True if the user has the capability.
 */
function plugin_boilerplate_user_can( $capability, $user_id = null ) {
	return \EvolveWP\PluginBoilerplate\Core\Capability_Manager::user_can( $capability, $user_id );
}

/**
 * Return all registered REST Bridge endpoints.
 *
 * Global accessor for \EvolveWP\PluginBoilerplate\API\REST_Bridge::get_registered_endpoints().
 *
 * @since  1.0.0
 *
 * @param string $source Optional. Filter by source: 'manual', 'connector', or empty for all.
 *
 * @return array Registered endpoint metadata.
 */
function plugin_boilerplate_rest_endpoints( $source = '' ) {
	return \EvolveWP\PluginBoilerplate\API\REST_Bridge::get_registered_endpoints( $source );
}

