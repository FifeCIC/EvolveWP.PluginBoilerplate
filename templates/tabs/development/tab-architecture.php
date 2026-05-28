<?php
/**
 * Architecture tab — plugin structure, data flow, and key functions reference.
 *
 * ROLE: template
 *
 * Displays the plugin's internal architecture using three reusable UI patterns:
 * 1. Data storage display (JSON/option structure with annotations)
 * 2. Button behaviour table (action → handler → data effect)
 * 3. Data flow diagram (numbered steps with split branches)
 *
 * Every plugin cloned from Plugin Boilerplate gets this tab and replaces the content
 * with its own architecture.
 *
 * @package  Plugin Boilerplate
 * @since    3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="plugin-boilerplate-arch-intro">
	<p><?php esc_html_e( 'This tab documents the internal architecture of the plugin — how data flows, where files live, and what each key class does. Useful for developers and AI assistants navigating the codebase.', 'plugin-boilerplate' ); ?></p>
</div>

<!-- Two Column Layout -->
<div class="plugin-boilerplate-arch-grid">

	<!-- Left: Namespace Map -->
	<div class="plugin-boilerplate-arch-panel">
		<h3><?php esc_html_e( 'Namespace Map', 'plugin-boilerplate' ); ?> <span class="plugin-boilerplate-help-tip" data-tooltip="<?php esc_attr_e( 'PSR-4 autoloading maps each namespace to a directory under includes/. Composer resolves class names to file paths automatically.', 'plugin-boilerplate' ); ?>"><span class="dashicons dashicons-editor-help"></span></span></h3>
		<div class="plugin-boilerplate-arch-flow">
			<div class="plugin-boilerplate-arch-step">
				<strong>Plugin Boilerplate\Ecosystem\</strong><br>
				→ <code>includes/Ecosystem/</code><br>
				<?php esc_html_e( 'Registry, Menu_Manager, Installer', 'plugin-boilerplate' ); ?>
			</div>
			<div class="plugin-boilerplate-arch-step">
				<strong>Plugin Boilerplate\Core\</strong><br>
				→ <code>includes/Core/</code><br>
				<?php esc_html_e( 'Install, AJAX_Handler, Logger, Enhanced_Logger, Task_Scheduler', 'plugin-boilerplate' ); ?>
			</div>
			<div class="plugin-boilerplate-arch-step">
				<strong>Plugin Boilerplate\Admin\</strong><br>
				→ <code>includes/Admin/</code><br>
				<?php esc_html_e( 'Dashboard_Widgets, Notification_Bell, Uninstall_Feedback', 'plugin-boilerplate' ); ?>
			</div>
			<div class="plugin-boilerplate-arch-step">
				<strong>Plugin Boilerplate\API\</strong><br>
				→ <code>includes/API/</code><br>
				<?php esc_html_e( 'Connector_Interface, Base_API, REST_Bridge, REST_Controller', 'plugin-boilerplate' ); ?>
			</div>
		</div>
	</div>

	<!-- Right: Template Map -->
	<div class="plugin-boilerplate-arch-panel">
		<h3><?php esc_html_e( 'Template Structure', 'plugin-boilerplate' ); ?> <span class="plugin-boilerplate-help-tip" data-tooltip="<?php esc_attr_e( 'Templates are in three levels: pages/ for full admin pages, tabs/ for tab content, partials/ for reusable fragments.', 'plugin-boilerplate' ); ?>"><span class="dashicons dashicons-editor-help"></span></span></h3>
		<div class="plugin-boilerplate-arch-flow">
			<div class="plugin-boilerplate-arch-step">
				<strong>templates/pages/</strong><br>
				<?php esc_html_e( 'Full admin pages — one file per menu item', 'plugin-boilerplate' ); ?>
			</div>
			<div class="plugin-boilerplate-arch-step">
				<strong>templates/tabs/{page}/</strong><br>
				<?php esc_html_e( 'Tab content — one file per tab within a page', 'plugin-boilerplate' ); ?><br>
				<?php esc_html_e( 'Example: tabs/development/tab-roadmap.php', 'plugin-boilerplate' ); ?>
			</div>
			<div class="plugin-boilerplate-arch-step">
				<strong>templates/partials/</strong><br>
				<?php esc_html_e( 'Reusable HTML fragments and UI components', 'plugin-boilerplate' ); ?>
			</div>
		</div>
	</div>
</div>

<!-- Pattern 1: Data Storage Display -->
<div class="plugin-boilerplate-arch-json-panel">
	<h3><?php esc_html_e( 'Data Storage & Options', 'plugin-boilerplate' ); ?> <span class="plugin-boilerplate-help-tip" data-tooltip="<?php esc_attr_e( 'Plugin state is stored in wp_options. Each option is prefixed with plugin_boilerplate_ to avoid conflicts. The ecosystem registry persists cross-plugin state here.', 'plugin-boilerplate' ); ?>"><span class="dashicons dashicons-editor-help"></span></span></h3>
	<div class="plugin-boilerplate-arch-json-files">

		<div class="plugin-boilerplate-arch-json-file">
			<h5><code>plugin_boilerplate_version</code> — <?php esc_html_e( 'Plugin Version', 'plugin-boilerplate' ); ?></h5>
			<div class="plugin-boilerplate-arch-json-content">
				<strong><?php esc_html_e( 'Type:', 'plugin-boilerplate' ); ?></strong> <?php esc_html_e( 'WordPress option (string)', 'plugin-boilerplate' ); ?><br>
				<strong><?php esc_html_e( 'Written by:', 'plugin-boilerplate' ); ?></strong> <code>Plugin Boilerplate\Core\Install::update_package_version()</code><br>
				<strong><?php esc_html_e( 'Read by:', 'plugin-boilerplate' ); ?></strong> <code>Plugin Boilerplate\Core\Install::check_version()</code><br>
				<strong><?php esc_html_e( 'Purpose:', 'plugin-boilerplate' ); ?></strong> <?php esc_html_e( 'Triggers install routine when version changes.', 'plugin-boilerplate' ); ?>
			</div>
		</div>

		<div class="plugin-boilerplate-arch-json-file">
			<h5><code>plugin_boilerplate_ecosystem_mode</code> — <?php esc_html_e( 'Ecosystem Status', 'plugin-boilerplate' ); ?></h5>
			<div class="plugin-boilerplate-arch-json-content">
				<strong><?php esc_html_e( 'Type:', 'plugin-boilerplate' ); ?></strong> <?php esc_html_e( 'WordPress option (boolean)', 'plugin-boilerplate' ); ?><br>
				<strong><?php esc_html_e( 'Written by:', 'plugin-boilerplate' ); ?></strong> <code>Plugin Boilerplate\Ecosystem\Registry::detect_ecosystem()</code><br>
				<strong><?php esc_html_e( 'Read by:', 'plugin-boilerplate' ); ?></strong> <?php esc_html_e( 'Admin UI for conditional menu placement', 'plugin-boilerplate' ); ?><br>
				<strong><?php esc_html_e( 'Purpose:', 'plugin-boilerplate' ); ?></strong> <?php esc_html_e( 'True when 2+ EvolveWP plugins are active.', 'plugin-boilerplate' ); ?>
			</div>
		</div>

		<div class="plugin-boilerplate-arch-json-file">
			<h5><code>plugin_boilerplate_ecosystem_plugins</code> — <?php esc_html_e( 'Registered Plugins', 'plugin-boilerplate' ); ?></h5>
			<div class="plugin-boilerplate-arch-json-content">
				<strong><?php esc_html_e( 'Type:', 'plugin-boilerplate' ); ?></strong> <?php esc_html_e( 'WordPress option (serialized array)', 'plugin-boilerplate' ); ?><br>
				<strong><?php esc_html_e( 'Written by:', 'plugin-boilerplate' ); ?></strong> <code>Plugin Boilerplate\Ecosystem\Registry::detect_ecosystem()</code><br>
				<strong><?php esc_html_e( 'Structure:', 'plugin-boilerplate' ); ?></strong>
				<pre>{
  plugin-boilerplate": {
    "name": "Plugin Boilerplate",
    "version": "3.0.0",
    "has_logging": true,
    "has_cron": true,
    "has_background_tasks": true
  }
}</pre>
			</div>
		</div>

	</div>
</div>

<!-- Pattern 2: Key Functions Table -->
<div class="plugin-boilerplate-arch-json-panel">
	<h3><?php esc_html_e( 'Key Functions & Classes', 'plugin-boilerplate' ); ?> <span class="plugin-boilerplate-help-tip" data-tooltip="<?php esc_attr_e( 'These are the core classes that every plugin inherits from Plugin Boilerplate. Each has a single responsibility documented in its file header.', 'plugin-boilerplate' ); ?>"><span class="dashicons dashicons-editor-help"></span></span></h3>
	<table class="wp-list-table widefat fixed striped">
		<thead>
			<tr>
				<th style="width:30%;"><?php esc_html_e( 'Class / Function', 'plugin-boilerplate' ); ?></th>
				<th style="width:25%;"><?php esc_html_e( 'File', 'plugin-boilerplate' ); ?></th>
				<th style="width:45%;"><?php esc_html_e( 'Purpose', 'plugin-boilerplate' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><code>Plugin Boilerplate\Ecosystem\Registry</code></td>
				<td><code>includes/Ecosystem/Registry.php</code></td>
				<td><?php esc_html_e( 'Cross-plugin registration, feature detection, shared resource management.', 'plugin-boilerplate' ); ?></td>
			</tr>
			<tr>
				<td><code>Plugin Boilerplate\Core\Install</code></td>
				<td><code>includes/Core/Install.php</code></td>
				<td><?php esc_html_e( 'Activation, DB tables, roles, version checking, transient cleanup.', 'plugin-boilerplate' ); ?></td>
			</tr>
			<tr>
				<td><code>Plugin Boilerplate\Core\Logger</code></td>
				<td><code>includes/Core/Logger.php</code></td>
				<td><?php esc_html_e( 'Structured trace logging with loop detection and data-loss tracking.', 'plugin-boilerplate' ); ?></td>
			</tr>
			<tr>
				<td><code>Plugin Boilerplate\Core\Enhanced_Logger</code></td>
				<td><code>includes/Core/Enhanced_Logger.php</code></td>
				<td><?php esc_html_e( 'Query Monitor-style per-request logging — queries, hooks, HTTP, errors.', 'plugin-boilerplate' ); ?></td>
			</tr>
			<tr>
				<td><code>Plugin Boilerplate\Core\Task_Scheduler</code></td>
				<td><code>includes/Core/Task_Scheduler.php</code></td>
				<td><?php esc_html_e( 'Action Scheduler wrapper — schedule, cancel, query background jobs.', 'plugin-boilerplate' ); ?></td>
			</tr>
			<tr>
				<td><code>Plugin Boilerplate\API\REST_Controller</code></td>
				<td><code>includes/API/REST_Controller.php</code></td>
				<td><?php esc_html_e( 'Abstract base for REST endpoints with secure-by-default permissions.', 'plugin-boilerplate' ); ?></td>
			</tr>
			<tr>
				<td><code>Plugin Boilerplate\API\Base_API</code></td>
				<td><code>includes/API/Base_API.php</code></td>
				<td><?php esc_html_e( 'Abstract base for external API integrations with logging.', 'plugin-boilerplate' ); ?></td>
			</tr>
			<tr>
				<td><code>plugin_boilerplate_ecosystem()</code></td>
				<td><code>functions.php</code></td>
				<td><?php esc_html_e( 'Global accessor → Registry singleton.', 'plugin-boilerplate' ); ?></td>
			</tr>
			<tr>
				<td><code>plugin_boilerplate_log()</code></td>
				<td><code>functions.php</code></td>
				<td><?php esc_html_e( 'Global accessor → Logger singleton.', 'plugin-boilerplate' ); ?></td>
			</tr>
		</tbody>
	</table>
</div>

<!-- Pattern 3: Data Flow Diagram -->
<div class="plugin-boilerplate-arch-json-panel">
	<h3><?php esc_html_e( 'Plugin Boot Sequence', 'plugin-boilerplate' ); ?> <span class="plugin-boilerplate-help-tip" data-tooltip="<?php esc_attr_e( 'The numbered steps show the exact order files load when WordPress activates the plugin. Understanding this helps debug load-order issues.', 'plugin-boilerplate' ); ?>"><span class="dashicons dashicons-editor-help"></span></span></h3>

	<div class="plugin-boilerplate-arch-data-flow">
		<div class="plugin-boilerplate-arch-flow-step">
			<div class="plugin-boilerplate-arch-flow-number">1</div>
			<div class="plugin-boilerplate-arch-flow-content">
				<strong><?php esc_html_e( 'WordPress loads plugin-boilerplate.php', 'plugin-boilerplate' ); ?></strong><br>
				<?php esc_html_e( 'Constants defined → Composer autoloader loaded → functions.php loaded → loader.php loaded', 'plugin-boilerplate' ); ?>
			</div>
		</div>

		<div class="plugin-boilerplate-arch-flow-arrow">↓</div>

		<div class="plugin-boilerplate-arch-flow-step">
			<div class="plugin-boilerplate-arch-flow-number">2</div>
			<div class="plugin-boilerplate-arch-flow-content">
				<strong><?php esc_html_e( 'PluginBoilerplate::__construct()', 'plugin-boilerplate' ); ?></strong><br>
				<?php esc_html_e( 'define_constants() → includes() → init_hooks() → fires plugin_boilerplate_loaded action', 'plugin-boilerplate' ); ?>
			</div>
		</div>

		<div class="plugin-boilerplate-arch-flow-arrow">↓</div>

		<div class="plugin-boilerplate-arch-flow-step">
			<div class="plugin-boilerplate-arch-flow-number">3</div>
			<div class="plugin-boilerplate-arch-flow-content">
				<strong><?php esc_html_e( 'includes() — grouped file loading', 'plugin-boilerplate' ); ?></strong><br>
				<?php esc_html_e( 'Core functions → Core classes → Libraries → Ecosystem → Features → API', 'plugin-boilerplate' ); ?>
			</div>
		</div>

		<div class="plugin-boilerplate-arch-flow-arrow">↓</div>

		<div class="plugin-boilerplate-arch-flow-step plugin-boilerplate-arch-flow-decision">
			<div class="plugin-boilerplate-arch-flow-number">4</div>
			<div class="plugin-boilerplate-arch-flow-content">
				<strong><?php esc_html_e( 'Request type detection', 'plugin-boilerplate' ); ?></strong><br>
				<?php esc_html_e( 'is_request("admin") → load admin files on init priority 1', 'plugin-boilerplate' ); ?><br>
				<?php esc_html_e( 'is_request("frontend") → load frontend scripts', 'plugin-boilerplate' ); ?>
			</div>
		</div>

		<div class="plugin-boilerplate-arch-flow-arrow">↓</div>

		<div class="plugin-boilerplate-arch-flow-step">
			<div class="plugin-boilerplate-arch-flow-number">5</div>
			<div class="plugin-boilerplate-arch-flow-content">
				<strong><?php esc_html_e( 'Admin files loaded (admin requests only)', 'plugin-boilerplate' ); ?></strong><br>
				<?php esc_html_e( 'admin.php → admin-menus.php → notifications → toolbars', 'plugin-boilerplate' ); ?><br>
				<?php esc_html_e( 'Menus registered on admin_menu hook → pages render via callbacks', 'plugin-boilerplate' ); ?>
			</div>
		</div>
	</div>
</div>

<!-- Database Tables -->
<div class="plugin-boilerplate-arch-json-panel">
	<h3><?php esc_html_e( 'Database Tables', 'plugin-boilerplate' ); ?> <span class="plugin-boilerplate-help-tip" data-tooltip="<?php esc_attr_e( 'Custom tables created on activation via dbDelta(). All prefixed with the WordPress table prefix plus plugin_boilerplate_. Dropped on uninstall.', 'plugin-boilerplate' ); ?>"><span class="dashicons dashicons-editor-help"></span></span></h3>
	<table class="wp-list-table widefat fixed striped">
		<thead>
			<tr>
				<th style="width:30%;"><?php esc_html_e( 'Table', 'plugin-boilerplate' ); ?></th>
				<th style="width:20%;"><?php esc_html_e( 'Created by', 'plugin-boilerplate' ); ?></th>
				<th style="width:50%;"><?php esc_html_e( 'Purpose', 'plugin-boilerplate' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><code>{prefix}plugin_boilerplate_api_calls</code></td>
				<td><code>Install::create_tables()</code></td>
				<td><?php esc_html_e( 'Logs every external API call with status and outcome.', 'plugin-boilerplate' ); ?></td>
			</tr>
			<tr>
				<td><code>{prefix}plugin_boilerplate_api_endpoints</code></td>
				<td><code>Install::create_tables()</code></td>
				<td><?php esc_html_e( 'Tracks unique API endpoints with usage counters.', 'plugin-boilerplate' ); ?></td>
			</tr>
			<tr>
				<td><code>{prefix}plugin_boilerplate_api_errors</code></td>
				<td><code>Install::create_tables()</code></td>
				<td><?php esc_html_e( 'Records API errors with code, message, and source location.', 'plugin-boilerplate' ); ?></td>
			</tr>
			<tr>
				<td><code>{prefix}plugin_boilerplate_debug_logs</code></td>
				<td><code>Enhanced_Logger::create_table()</code></td>
				<td><?php esc_html_e( 'Per-request performance data — queries, hooks, memory, errors.', 'plugin-boilerplate' ); ?></td>
			</tr>
			<tr>
				<td><code>{prefix}plugin_boilerplate_notifications</code></td>
				<td><code>Install::create_tables()</code></td>
				<td><?php esc_html_e( 'Admin notification queue with read/snooze/expiry tracking.', 'plugin-boilerplate' ); ?></td>
			</tr>
			<tr>
				<td><code>{prefix}plugin_boilerplate_ai_usage</code></td>
				<td><code>Install::create_tables()</code></td>
				<td><?php esc_html_e( 'AI provider usage tracking — tokens consumed per task type.', 'plugin-boilerplate' ); ?></td>
			</tr>
		</tbody>
	</table>
</div>
