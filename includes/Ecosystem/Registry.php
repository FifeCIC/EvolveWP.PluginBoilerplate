<?php
/**
 * Ecosystem plugin registry.
 *
 * ROLE: ecosystem-bridge
 *
 * Single responsibility: Maintain a registry of active EvolveWP Core-based plugins
 * and provide a shared API for feature detection, menu placement, and
 * resource sharing between ecosystem plugins.
 *
 * DEPENDS ON:
 *   - WordPress functions: add_action, do_action, update_option, get_option
 *
 * CONSUMED BY:
 *   - functions.php  plugin_boilerplate_ecosystem() global accessor
 *   - Hook: plugin_boilerplate_ecosystem_register (plugins call this to register themselves)
 *
 * DATA FLOW:
 *   Input  → plugin_boilerplate_ecosystem_register action (plugin registration calls)
 *   Output → plugin_boilerplate_ecosystem_mode option, plugin_boilerplate_ecosystem_plugins option
 *
 * @package  EvolveWP\PluginBoilerplate\Ecosystem
 * @since    3.0.0
 */

namespace EvolveWP\PluginBoilerplate\Ecosystem;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Manages cross-plugin communication and resource sharing for the EvolveWP Core ecosystem.
 *
 * Single responsibility: Track which EvolveWP Core-based plugins are active and expose
 * a shared API so they can coordinate menus, logging, and background tasks.
 * Does NOT handle menu rendering (Menu_Manager) or plugin installation (Installer).
 *
 * @since 3.0.0
 */
class Registry {

	/** @var Registry|null Singleton instance. */
	private static $instance = null;

	/** @var array<string, array<string, mixed>> Registered plugins keyed by slug. */
	private $registered_plugins = array();

	/** @var array<string, list<array{callback: callable, priority: int}>> Shared resource callbacks keyed by type. */
	private $shared_resources = array();

	/**
	 * Return the singleton instance.
	 *
	 * @since  3.0.0
	 * @return Registry
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor — private to enforce singleton.
	 *
	 * Hooks into plugins_loaded to fire the registration action after all
	 * plugins have loaded, giving every plugin a chance to register itself.
	 *
	 * @since 3.0.0
	 */
	private function __construct() {
		add_action( 'plugins_loaded', array( $this, 'detect_ecosystem' ), 5 );
	}

	/**
	 * Register a plugin with the ecosystem.
	 *
	 * Called by each EvolveWP Core-based plugin on the `plugin_boilerplate_ecosystem_register`
	 * action. Once registered, the plugin appears in the ecosystem dashboard,
	 * its shared resources are merged into unified views, and feature detection
	 * becomes available via is_registered().
	 *
	 * @since  3.0.0
	 * @since  3.1.0 Added requires_core_version for dependency checking.
	 *
	 * @param  string $slug Unique plugin slug — use the plugin folder name.
	 * @param  array  $args {
	 *     @type string   $name                 Human-readable plugin name.
	 *     @type string   $version              Semver string.
	 *     @type string   $requires_core_version Minimum Core plugin version required.
	 *                                           Empty string means no requirement.
	 *     @type string   $path                 Absolute path to plugin root (trailing slash).
	 *     @type string   $url                  Plugin root URL (trailing slash).
	 *     @type bool     $has_logging          Whether plugin registers log entries.
	 *     @type bool     $has_cron             Whether plugin registers cron jobs.
	 *     @type bool     $has_background_tasks Whether plugin uses background processing.
	 *     @type string[] $shared_settings      Setting keys to expose in ecosystem panel.
	 * }
	 * @return void
	 */
	public function register_plugin( $slug, $args = array() ) {
		$defaults = array(
			'name'                  => '',
			'version'               => '1.0.0',
			'requires_core_version' => '',
			'path'                  => '',
			'url'                   => '',
			'provides'              => array(),
			'depends_on'            => array(),
			'has_logging'           => false,
			'has_cron'              => false,
			'has_background_tasks'  => false,
			'shared_settings'       => array(),
		);

		$this->registered_plugins[ $slug ] = wp_parse_args( $args, $defaults );

		do_action( 'plugin_boilerplate_ecosystem_plugin_registered', $slug, $this->registered_plugins[ $slug ] );
	}

	/**
	 * Fire the registration action, check versions, and persist ecosystem state.
	 *
	 * Called on plugins_loaded priority 5. Fires plugin_boilerplate_ecosystem_register so
	 * all plugins can call register_plugin(), checks version compatibility,
	 * then stores the resulting state in options for use by admin UI.
	 *
	 * @since  3.0.0
	 * @since  3.1.0 Added version mismatch detection.
	 *
	 * @return void
	 */
	public function detect_ecosystem() {
		do_action( 'plugin_boilerplate_ecosystem_register' );
		$this->check_version_requirements();
		$this->check_plugin_dependencies();
		update_option( 'plugin_boilerplate_ecosystem_mode', $this->is_ecosystem_mode() );
		update_option( 'plugin_boilerplate_ecosystem_plugins', $this->registered_plugins );
	}

	/**
	 * Return all registered plugins.
	 *
	 * @since  3.0.0
	 * @return array<string, array<string, mixed>>
	 */
	public function get_plugins() {
		return $this->registered_plugins;
	}

	/**
	 * Check whether a specific plugin is registered.
	 *
	 * @since  3.0.0
	 * @param  string $slug Plugin slug.
	 * @return bool
	 */
	public function is_registered( $slug ) {
		return isset( $this->registered_plugins[ $slug ] );
	}

	/**
	 * Return registration data for a single plugin.
	 *
	 * @since  1.0.0
	 * @param  string $slug Plugin slug.
	 * @return array|null Plugin data or null if not registered.
	 */
	public function get_plugin( $slug ) {
		return $this->registered_plugins[ $slug ] ?? null;
	}

	/**
	 * Return the number of registered plugins.
	 *
	 * @since  3.0.0
	 * @return int
	 */
	public function get_plugin_count() {
		return count( $this->registered_plugins );
	}

	/**
	 * Check whether ecosystem mode is active (2 or more plugins registered).
	 *
	 * When true, shared menus and unified views are enabled.
	 *
	 * @since  3.0.0
	 * @return bool
	 */
	public function is_ecosystem_mode() {
		return $this->get_plugin_count() >= 2;
	}

	/**
	 * Register a shared resource callback (logging, cron viewer, etc.).
	 *
	 * Callbacks are sorted by priority and invoked by the ecosystem menu
	 * manager when rendering shared admin views.
	 *
	 * @since  3.0.0
	 * @param  string   $type     Resource type: 'logging' | 'background_tasks' | 'async_tasks'.
	 * @param  callable $callback Callback that renders the resource view.
	 * @param  int      $priority Lower numbers run first. Default 10.
	 * @return void
	 */
	public function register_shared_resource( $type, $callback, $priority = 10 ) {
		if ( ! isset( $this->shared_resources[ $type ] ) ) {
			$this->shared_resources[ $type ] = array();
		}
		$this->shared_resources[ $type ][] = array(
			'callback' => $callback,
			'priority' => $priority,
		);
		usort(
			$this->shared_resources[ $type ],
			static function ( $a, $b ) {
				return $a['priority'] - $b['priority'];
			}
		);
	}

	/**
	 * Return all registered callbacks for a shared resource type.
	 *
	 * @since  3.0.0
	 * @param  string $type Resource type.
	 * @return list<array{callback: callable, priority: int}>
	 */
	public function get_shared_resources( $type ) {
		return $this->shared_resources[ $type ] ?? array();
	}

	/**
	 * Return the configured menu location.
	 *
	 * In ecosystem mode the default is 'shared' (menus move to Tools/Settings).
	 * In single-plugin mode the default is 'plugin'.
	 *
	 * @since  3.0.0
	 * @param  string $default Fallback when not in ecosystem mode.
	 * @return string 'shared' | 'plugin'
	 */
	public function get_menu_location( $default = 'plugin' ) {
		if ( $this->is_ecosystem_mode() ) {
			return get_option( 'plugin_boilerplate_ecosystem_menu_location', 'shared' );
		}
		return $default;
	}

	/**
	 * Check whether the shared menu location should be used.
	 *
	 * @since  3.0.0
	 *
	 * @return bool
	 */
	public function use_shared_menu() {
		return 'shared' === $this->get_menu_location();
	}

	private function check_version_requirements() {
		$core_slug    = $this->find_core_plugin();
		$core_version = '';

		if ( $core_slug && isset( $this->registered_plugins[ $core_slug ] ) ) {
			$core_version = $this->registered_plugins[ $core_slug ]['version'];
		}

		foreach ( $this->registered_plugins as $slug => $plugin ) {
			if ( $slug === $core_slug ) {
				continue;
			}

			$required = $plugin['requires_core_version'] ?? '';

			if ( empty( $required ) ) {
				continue;
			}

			if ( empty( $core_version ) ) {
				$this->fire_version_mismatch( $slug, $plugin, $required, '0.0.0' );
				continue;
			}

			if ( version_compare( $core_version, $required, '<' ) ) {
				$this->fire_version_mismatch( $slug, $plugin, $required, $core_version );
			}
		}
	}

	/**
	 * Check depends_on requirements for all registered plugins.
	 *
	 * Warns if a plugin declares a dependency on another plugin that is not
	 * registered in the ecosystem.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function check_plugin_dependencies() {
		foreach ( $this->registered_plugins as $slug => $plugin ) {
			if ( empty( $plugin['depends_on'] ) ) {
				continue;
			}

			foreach ( $plugin['depends_on'] as $dependency ) {
				if ( ! $this->is_registered( $dependency ) ) {
					$plugin_name = $plugin['name'] ?: $slug;

					add_action( 'admin_notices', static function () use ( $plugin_name, $dependency ) {
						printf(
							'<div class="notice notice-warning"><p><strong>%s</strong> %s</p></div>',
							esc_html( $plugin_name ),
							esc_html(
								sprintf(
									/* translators: %s: required plugin slug */
									__( 'requires %s which is not active. Some features may not work correctly.', 'plugin-boilerplate' ),
									$dependency
								)
							)
						);
					} );
				}
			}
		}
	}

	/**
	 * Find the core plugin slug in the registry.
	 *
	 * @since 1.0.0
	 *
	 * @return string|null Core plugin slug, or null if not found.
	 */
	private function find_core_plugin() {
		foreach ( $this->registered_plugins as $slug => $plugin ) {
			if ( false !== strpos( $slug, 'core' ) ) {
				return $slug;
			}
		}
		return null;
	}

	/**
	 * Fire a version mismatch warning.
	 *
	 * @since 1.0.0
	 *
	 * @param string $slug     Plugin slug.
	 * @param array  $plugin   Plugin registration data.
	 * @param string $required Required Core version.
	 * @param string $actual   Installed Core version.
	 *
	 * @return void
	 */
	private function fire_version_mismatch( $slug, $plugin, $required, $actual ) {
		do_action( 'plugin_boilerplate_ecosystem_version_mismatch', $slug, $plugin, $required, $actual );

		$plugin_name = $plugin['name'] ?: $slug;

		add_action( 'admin_notices', static function () use ( $plugin_name, $required, $actual ) {
			printf(
				'<div class="notice notice-warning"><p><strong>%s</strong> %s</p></div>',
				esc_html( $plugin_name ),
				esc_html(
					sprintf(
						/* translators: 1: required version, 2: installed version */
						__( 'requires EvolveWP Core %1$s or later. Installed version: %2$s. Some features may not work correctly.', 'plugin-boilerplate' ),
						$required,
						$actual ?: __( 'not installed', 'plugin-boilerplate' )
					)
				)
			);
		} );
	}
}
