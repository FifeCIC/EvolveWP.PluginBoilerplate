<?php
/**
 * WordPress dashboard widgets for EvolveWP Core.
 *
 * ROLE: admin-ui
 *
 * Single responsibility: Register and render EvolveWP Core dashboard widgets on the
 * WordPress admin dashboard. Does NOT handle settings or plugin-specific pages.
 *
 * DEPENDS ON:
 *   - WordPress functions: wp_add_dashboard_widget, wp_cache_get
 *
 * CONSUMED BY:
 *   - Hook: wp_dashboard_setup (registered in constructor)
 *
 * DATA FLOW:
 *   Input  → wp_cache_get('plugin_boilerplate_api_calls_today')
 *   Output → HTML rendered in WordPress dashboard widgets
 *
 * @package  EvolveWP\PluginBoilerplate\Admin
 * @since    1.0.0
 */

namespace EvolveWP\PluginBoilerplate\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers and renders EvolveWP Core dashboard widgets.
 *
 * Single responsibility: Dashboard widget UI only. Does NOT handle
 * data collection or settings.
 *
 * @since 1.0.0
 */
class Dashboard_Widgets {

	/**
	 * Constructor — hooks into wp_dashboard_setup.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'wp_dashboard_setup', array( $this, 'add_widgets' ) );
	}

	/**
	 * Register dashboard widgets.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function add_widgets() {
		wp_add_dashboard_widget(
			'plugin_boilerplate_stats_widget',
			__( 'EvolveWP Core Stats', 'plugin-boilerplate' ),
			array( $this, 'render_stats_widget' )
		);

		wp_add_dashboard_widget(
			'plugin_boilerplate_quick_links_widget',
			__( 'EvolveWP Core Quick Links', 'plugin-boilerplate' ),
			array( $this, 'render_quick_links_widget' )
		);
	}

	/**
	 * Render the stats widget.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function render_stats_widget() {
		$stats = $this->get_plugin_stats();
		?>
		<div class="plugin-boilerplate-dashboard-widget">
			<ul>
				<li><strong><?php esc_html_e( 'Active Features:', 'plugin-boilerplate' ); ?></strong> <?php echo (int) $stats['features']; ?></li>
				<li><strong><?php esc_html_e( 'API Calls Today:', 'plugin-boilerplate' ); ?></strong> <?php echo (int) $stats['api_calls']; ?></li>
				<li><strong><?php esc_html_e( 'Cache Hit Rate:', 'plugin-boilerplate' ); ?></strong> <?php echo (int) $stats['cache_rate']; ?>%</li>
			</ul>
			<p><a href="<?php echo esc_url( admin_url( 'admin.php?page=plugin-boilerplate-development' ) ); ?>" class="button button-primary"><?php esc_html_e( 'View Details', 'plugin-boilerplate' ); ?></a></p>
		</div>
		<?php
	}

	/**
	 * Render the quick links widget.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function render_quick_links_widget() {
		?>
		<div class="plugin-boilerplate-dashboard-widget">
			<ul>
				<li><a href="<?php echo esc_url( admin_url( 'admin.php?page=plugin-boilerplate-development' ) ); ?>"><?php esc_html_e( 'Development Dashboard', 'plugin-boilerplate' ); ?></a></li>
				<li><a href="<?php echo esc_url( admin_url( 'admin.php?page=plugin-boilerplate-settings' ) ); ?>"><?php esc_html_e( 'Settings', 'plugin-boilerplate' ); ?></a></li>
				<li><a href="<?php echo esc_url( admin_url( 'admin.php?page=plugin-boilerplate-learning' ) ); ?>"><?php esc_html_e( 'Learning Centre', 'plugin-boilerplate' ); ?></a></li>
			</ul>
		</div>
		<?php
	}

	/**
	 * Get basic plugin statistics for the dashboard widget.
	 *
	 * @since  1.0.0
	 * @return array{features: int, api_calls: int, cache_rate: int}
	 */
	private function get_plugin_stats() {
		return array(
			'features'   => 5,
			'api_calls'  => wp_cache_get( 'plugin_boilerplate_api_calls_today' ) ?: 0,
			'cache_rate' => 85,
		);
	}
}
