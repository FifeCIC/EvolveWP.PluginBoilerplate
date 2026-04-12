<?php
/**
 * Hook Registry — reference list of all actions and filters registered by EvolveWP Core.
 *
 * ROLE: hook-registration
 *
 * This file is the single source of truth for understanding the full event
 * surface of the plugin. AI assistants and developers read this file to know
 * every hook without scanning every class.
 *
 * NOTE: Hook registrations currently live inside their respective class
 * constructors and init() methods. This file is a REFERENCE — not the
 * actual registration point. Moving registrations here is a future task
 * that requires refactoring every class.
 *
 * @package  EvolveWP Core
 * @category Core
 * @since    3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * ==========================================================================
 * LIFECYCLE HOOKS (loader.php → init_hooks())
 * ==========================================================================
 *
 * register_activation_hook   → \EvolveWP\PluginBoilerplate\Core\Install::install()
 * register_deactivation_hook → \EvolveWP\PluginBoilerplate\Core\Install::deactivate()
 * register_activation_hook   → \EvolveWP\PluginBoilerplate\Core\Enhanced_Logger::create_table()
 *
 * ==========================================================================
 * INIT HOOKS (priority 0-5)
 * ==========================================================================
 *
 * init (0)  → \EvolveWP\PluginBoilerplate\Core\AJAX_Handler::define_ajax()
 *             Detects EvolveWP Core AJAX requests, sets DOING_AJAX constant.
 *
 * init (0)  → PluginBoilerplate::init()
 *             Fires before_plugin_boilerplate_init and plugin_boilerplate_init actions.
 *
 * init (5)  → \EvolveWP\PluginBoilerplate\Core\Install::check_version()
 *             Runs install routine if stored version differs from package version.
 *
 * init      → \EvolveWP\PluginBoilerplate\Core\Task_Scheduler::init()
 *             Fires plugin_boilerplate_task_scheduler_init action.
 *
 * ==========================================================================
 * PLUGINS_LOADED
 * ==========================================================================
 *
 * plugins_loaded (5) → \EvolveWP\PluginBoilerplate\Ecosystem\Registry::detect_ecosystem()
 *                       Fires plugin_boilerplate_ecosystem_register, stores ecosystem state.
 *
 * ==========================================================================
 * ADMIN HOOKS
 * ==========================================================================
 *
 * admin_init       → \EvolveWP\PluginBoilerplate\Core\Install::install_actions()
 *                     Handles manual update and forced update actions.
 *
 * admin_init (1)   → EvolveWP_Core_Admin::buffer()
 *                     Starts output buffering for admin redirects.
 *
 * admin_init       → EvolveWP_Core_Admin::admin_redirects()
 *                     Handles setup wizard redirect after activation.
 *
 * admin_menu       → plugin_boilerplate_register_admin_menus()  [admin/config/admin-menus.php]
 *                     Registers main EvolveWP Core menu and all submenus.
 *
 * admin_menu (999) → \EvolveWP\PluginBoilerplate\Ecosystem\Menu_Manager::register_menus()
 *                     Registers shared ecosystem menus (Tools/Settings) when
 *                     2+ plugins are active.
 *
 * admin_menu       → \EvolveWP\PluginBoilerplate\Ecosystem\Installer::add_installer_page()
 *                     Registers the ecosystem plugin installer submenu.
 *
 * admin_bar_menu (999) → \EvolveWP\PluginBoilerplate\Admin\Notification_Bell::add_notification_bell()
 *                         Adds notification bell to admin toolbar.
 *
 * admin_enqueue_scripts → \EvolveWP\PluginBoilerplate\Admin\Notification_Bell::enqueue_assets()
 *                          Inline CSS for notification bell.
 *
 * admin_enqueue_scripts → \EvolveWP\PluginBoilerplate\Admin\Uninstall_Feedback::enqueue_assets()
 *                          CSS/JS for deactivation feedback modal (plugins.php only).
 *
 * admin_footer     → \EvolveWP\PluginBoilerplate\Admin\Uninstall_Feedback::render_modal()
 *                     Renders feedback modal HTML (plugins.php only).
 *
 * admin_footer     → \EvolveWP\PluginBoilerplate\Core\Logger (anonymous)
 *                     Outputs EvolveWP CoreLogger JS helper (dev mode only).
 *
 * wp_dashboard_setup → \EvolveWP\PluginBoilerplate\Admin\Dashboard_Widgets::add_widgets()
 *                       Registers EvolveWP Core dashboard widgets.
 *
 * ==========================================================================
 * AJAX HOOKS
 * ==========================================================================
 *
 * wp_ajax_plugin_boilerplate_install_plugin    → \EvolveWP\PluginBoilerplate\Ecosystem\Installer::ajax_install_plugin()
 * wp_ajax_plugin_boilerplate_uninstall_feedback → \EvolveWP\PluginBoilerplate\Admin\Uninstall_Feedback::handle_feedback()
 *
 * template_redirect (0) → \EvolveWP\PluginBoilerplate\Core\AJAX_Handler::do_plugin_boilerplate_ajax()
 *                          Custom AJAX endpoint handler (?plugin-boilerplate-ajax=action).
 *
 * ==========================================================================
 * LOGGING HOOKS (dev mode only)
 * ==========================================================================
 *
 * query            → \EvolveWP\PluginBoilerplate\Core\Enhanced_Logger::log_query()       [filter]
 * all              → \EvolveWP\PluginBoilerplate\Core\Enhanced_Logger::log_hook()        [action]
 * pre_http_request → \EvolveWP\PluginBoilerplate\Core\Enhanced_Logger::log_http_request() [filter]
 * init (1)         → \EvolveWP\PluginBoilerplate\Core\Enhanced_Logger::register_error_handler()
 * shutdown (9)     → \EvolveWP\PluginBoilerplate\Core\Enhanced_Logger::restore_error_handler()
 * shutdown         → \EvolveWP\PluginBoilerplate\Core\Enhanced_Logger::save_logs()
 *
 * ==========================================================================
 * PLUGIN FILTERS
 * ==========================================================================
 *
 * plugin_action_links_{basename} → \EvolveWP\PluginBoilerplate\Core\Install::plugin_action_links()
 *                                   Adds "Settings" link on Plugins screen.
 *
 * plugin_row_meta                → \EvolveWP\PluginBoilerplate\Core\Install::plugin_row_meta()
 *                                   Adds Docs/Support/Donate links on Plugins screen.
 *
 * admin_footer_text              → EvolveWP_Core_Admin::admin_footer_text()
 *                                   Custom footer text on EvolveWP Core admin pages.
 *
 * in_plugin_update_message       → \EvolveWP\PluginBoilerplate\Core\Install::in_plugin_update_message()
 *                                   Shows upgrade notice from WordPress.org readme.
 *
 * ==========================================================================
 * CUSTOM ACTIONS (fired by EvolveWP Core, consumed by other plugins)
 * ==========================================================================
 *
 * plugin_boilerplate_loaded                → Fired after main class constructor completes.
 * before_plugin_boilerplate_init           → Fired before plugin_boilerplate_init on WordPress init.
 * plugin_boilerplate_init                  → Fired during WordPress init.
 * plugin_boilerplate_installed             → Fired after install routine completes.
 * plugin_boilerplate_ecosystem_register    → Fired on plugins_loaded — plugins register here.
 * plugin_boilerplate_ecosystem_plugin_registered → Fired when a plugin registers with ecosystem.
 * plugin_boilerplate_task_scheduler_init   → Fired when Task_Scheduler initialises.
 * plugin_boilerplate_updater_cron          → Fired by forced update action.
 *
 * ==========================================================================
 * CUSTOM FILTERS (fired by EvolveWP Core, consumed by other plugins)
 * ==========================================================================
 *
 * plugin_boilerplate_ajax_get_endpoint          → Filters the custom AJAX endpoint URL.
 * plugin_boilerplate_ecosystem_available_plugins → Filters the list of installable plugins.
 * plugin_boilerplate_enable_setup_wizard        → Controls whether setup wizard runs on install.
 * plugin_boilerplate_docs_url                   → Filters the documentation URL.
 * plugin_boilerplate_support_url                → Filters the support URL.
 * plugin_boilerplate_donate_url                 → Filters the donation URL.
 *
 * ==========================================================================
 * CONNECTOR SYSTEM FILTERS (since 3.1.0)
 * ==========================================================================
 *
 * plugin_boilerplate_api_providers       → Filters the list of registered API connector providers.
 *                               Add, remove, or modify providers at runtime.
 *                               Fired by EvolveWP_Core_API_Directory::get_all_providers().
 *
 * plugin_boilerplate_connector_credentials → Filters credentials before creating a connector.
 *                                 Allows injecting credentials from environment
 *                                 variables, secrets managers, or other sources.
 *                                 Fired by EvolveWP_Core_API_Factory::create_from_settings().
 *                                 Parameters: $args, $provider_id, $account_id.
 *
 * plugin_boilerplate_connector_request_args → Filters wp_remote_request() arguments before
 *                                  an API call is made. Allows modifying headers,
 *                                  timeout, or body for specific providers.
 *                                  Fired by EvolveWP Core\API\Base_API::make_request().
 *                                  Parameters: $args, $url, $provider_id, $endpoint.
 *
 * plugin_boilerplate_user_can               → Filters the capability check result. Return a
 *                                  non-null bool to override the default WordPress
 *                                  capability check. Used by EvolveWP Core to
 *                                  implement cross-plugin permission logic.
 *                                  Fired by EvolveWP Core\Core\Capability_Manager::user_can().
 *                                  Parameters: $result (null), $capability, $user_id.
 *
 * ==========================================================================
 * CAPABILITY SYSTEM ACTIONS (since 3.1.0)
 * ==========================================================================
 *
 * plugin_boilerplate_capabilities_installed   → Fired after all capabilities have been added
 *                                    to WordPress roles during plugin activation.
 *                                    Parameter: $capabilities (all registered caps).
 *
 * plugin_boilerplate_capabilities_uninstalled → Fired after all capabilities have been removed
 *                                    from WordPress roles during plugin uninstall.
 *                                    Parameter: $capabilities (all registered caps).
 *
 * ==========================================================================
 * REST BRIDGE ACTIONS (since 3.1.0)
 * ==========================================================================
 *
 * plugin_boilerplate_rest_bridge_before_register → Fired before REST Bridge registers its
 *                                       routes on rest_api_init. Last chance for
 *                                       plugins to call REST_Bridge::register().
 *
 * plugin_boilerplate_rest_bridge_registered      → Fired after REST Bridge has registered all
 *                                       routes. Parameter: $endpoints (all metadata).
 *
 * plugin_boilerplate_ecosystem_version_mismatch  → Fired when a plugin requires a newer Core
 *                                       version than is installed. Parameters:
 *                                       $slug, $plugin, $required, $actual.
 */
