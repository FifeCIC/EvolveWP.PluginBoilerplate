<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * EvolveWP Core load order — PluginBoilerplate main class.
 *
 * GROUP 1 — Composer PSR-4 autoloader (loaded in plugin-boilerplate.php before this file)
 *   vendor/autoload.php — resolves all EvolveWP\PluginBoilerplate\ namespaced classes automatically.
 *   No include_once needed for any class under includes/Core/, includes/Ecosystem/,
 *   includes/Admin/, includes/Utilities/, includes/API/, includes/CLI/.
 *
 * GROUP 2 — Core functions (always loaded, no class dependencies)
 *   includes/functions/core.php      — global helper functions
 *   includes/functions/validate.php  — input validation helpers
 *   includes/logging-helper.php      — logging convenience functions
 *   includes/api-logging.php         — API call logging functions
 *   includes/functions/database.php  — database helper functions
 *
 * GROUP 3 — Core classes (loaded on every request)
 *   includes/classes/debug.php                  — debug utilities
 *   includes/classes/autoloader.php             — legacy SPL autoloader (to be removed in Task 0.5)
 *   includes/classes/install.php                — activation, DB tables, roles
 *   includes/classes/ajax.php                   — AJAX endpoint registration
 *   includes/classes/object-registry.php        — generic object registry
 *   includes/classes/data-freshness-manager.php — cache freshness tracking
 *   includes/classes/developer-flow-logger.php  — dev-mode flow logging
 *   includes/classes/developer-mode.php         — developer mode detection
 *   includes/classes/i18n.php                   — internationalisation
 *   includes/classes/dependencies.php           — plugin dependency checker
 *   includes/classes/listener.php               — request listener
 *   includes/classes/unified-logger.php         — structured trace logger
 *   includes/classes/enhanced-logger.php        — Query Monitor-style logger
 *
 * GROUP 4 — Optional libraries (guarded by file_exists)
 *   includes/libraries/action-scheduler/ — background job processing
 *   includes/libraries/carbon-fields/    — settings framework
 *   includes/classes/task-scheduler.php  — Action Scheduler wrapper (loaded with library)
 *   includes/classes/carbon-fields-integration.php (loaded with library)
 *
 * GROUP 5 — Ecosystem framework (always loaded)
 *   EvolveWP\PluginBoilerplate\Ecosystem\Registry     — autoloaded via Composer
 *   includes/classes/ecosystem-menu-manager.php — shared menu placement
 *   includes/classes/ecosystem-installer.php    — one-click plugin installer
 *
 * GROUP 6 — Feature classes (always loaded, safe to remove when cloning if unused)
 *   includes/classes/multisite.php           — multisite support
 *   includes/classes/github-sync.php         — GitHub sync
 *   includes/classes/settings-import-export.php
 *   includes/classes/extension-installer.php
 *   includes/classes/library-manager.php
 *   includes/classes/library-update-monitor.php
 *   includes/classes/rest-controller.php     — abstract REST base
 *   includes/classes/rest-example.php        — EXAMPLE: delete when cloning
 *   includes/classes/unified-feature.php     — EXAMPLE: delete when cloning
 *
 * GROUP 7 — WP-CLI (loaded only when WP_CLI is defined)
 *   includes/classes/cli-commands.php
 *
 * GROUP 8 — API system (always loaded)
 *   EvolveWP\PluginBoilerplate\API\Connector_Interface — autoloaded via Composer
 *   EvolveWP\PluginBoilerplate\API\Base_API             — autoloaded via Composer
 *   EvolveWP\PluginBoilerplate\API\REST_Bridge           — autoloaded via Composer
 *   EvolveWP\PluginBoilerplate\API\REST_Controller      — autoloaded via Composer
 *   api/api-directory.php            — provider registry (static + runtime)
 *   api/api-factory.php              — connector instance factory
 *
 * GROUP 9 — Admin only (guarded by is_request('admin'), loaded on init priority 1)
 *   includes/admin/admin.php and all admin sub-files
 *   admin/config/admin-menus.php
 *   admin/notifications/notifications.php
 *   includes/classes/notification-bell.php
 *   toolbars/toolbars.php
 *   includes/classes/uninstall-feedback.php
 *
 * GROUP 10 — Frontend only (guarded by is_request('frontend'))
 *   includes/classes/frontend-scripts.php
 *
 * GROUP 11 — Shortcodes (always loaded)
 *   shortcodes/shortcodes.php
 */

final class PluginBoilerplate {
    
    /**
     * EvolveWP Core version.
     *
     * @var string
     */
    public $version = '1.0.0';

    /**
     * Minimum WP version.
     *
     * @var string
     */
    public $min_wp_version = '4.4';
    
    /**
     * The single instance of the class.
     *
     * @var PluginBoilerplate
     * @since 1.0.0
     */
    protected static $_instance = null;

    /**
     * Session instance.
     *
     * @var EvolveWP_Core_Session
     */
    public $session = null; 
        
    /**
     * Main EvolveWP Core instance.
     *
     * Ensures only one instance is loaded.
     *
     * @since 1.0.0
     * @static
     * @return PluginBoilerplate Main instance.
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }                    
        return self::$_instance;
    }

    /**
     * Cloning is forbidden.
     *
     * @since 1.0.0
     */
    public function __clone() {
        _doing_it_wrong( __FUNCTION__, esc_html__( 'Your not allowed to do that!', 'plugin-boilerplate' ), '1.0' );
    }

    /**
     * Unserialising instances of this class is forbidden.
     *
     * @since 1.0.0
     */
    public function __wakeup() {
        _doing_it_wrong( __FUNCTION__, esc_html__( 'Your not allowed to do that!', 'plugin-boilerplate' ), '1.0' );
    }

    /**
     * Auto-load in-accessible properties on demand.
     * @param mixed $key
     * @return mixed
     */
    public function __get( $key ) {
        if ( in_array( $key, array( 'mailer' ) ) ) {
            return $this->$key();
        }
    }   
    
    /**
     * EvolveWP Core constructor.
     *
     * @since 1.0.0
     */
    public function __construct() {
        $this->define_constants();
        $this->includes();
        $this->init_hooks();

        do_action( 'plugin_boilerplate_loaded' );
    }

    /**
     * Hook into actions and filters.
     * @since  1.0
     */
    private function init_hooks() {
        register_activation_hook( PLUGIN_BOILERPLATE_PLUGIN_FILE, array( '\EvolveWP\PluginBoilerplate\Core\Install', 'install' ) );
        register_deactivation_hook( PLUGIN_BOILERPLATE_PLUGIN_FILE, array( '\EvolveWP\PluginBoilerplate\Core\Install', 'deactivate' ) );
        \EvolveWP\PluginBoilerplate\Core\Install::init();
        \EvolveWP\PluginBoilerplate\Core\AJAX_Handler::init();
        add_action( 'init', array( $this, 'init' ), 0 );
    }

    /**
     * Define EvolveWP Core constants.
     *
     * @since 1.0.0
     */
    private function define_constants() {

        if ( ! defined( 'PLUGIN_BOILERPLATE_LOG_DIR' ) ) {
            $upload_dir = wp_upload_dir();
            define( 'PLUGIN_BOILERPLATE_LOG_DIR', $upload_dir['basedir'] . '/plugin-boilerplate-logs/' );
        }

        if ( ! defined( 'PLUGIN_BOILERPLATE_MIN_WP_VERSION' ) ) { define( 'PLUGIN_BOILERPLATE_MIN_WP_VERSION', $this->min_wp_version ); }
        
        // Main (package) constants.
        if ( ! defined( 'PLUGIN_BOILERPLATE_SESSION_CACHE_GROUP' ) ) { define( 'PLUGIN_BOILERPLATE_SESSION_CACHE_GROUP', 'plugin_boilerplate_session_id' ); }
        if ( ! defined( 'PLUGIN_BOILERPLATE_DEV_MODE' ) ) { define( 'PLUGIN_BOILERPLATE_DEV_MODE', false ); }
        if ( ! defined( 'PLUGIN_BOILERPLATE_WORDPRESSORG_SLUG' ) ) { define( 'PLUGIN_BOILERPLATE_WORDPRESSORG_SLUG', false ); }
        if ( ! defined( 'PLUGIN_BOILERPLATE_MARKETPLACE' ) ) { define( 'PLUGIN_BOILERPLATE_MARKETPLACE', false ); }
        if ( ! defined( 'PLUGIN_BOILERPLATE_MARKETPLACE_ID' ) ) { define( 'PLUGIN_BOILERPLATE_MARKETPLACE_ID', false ); }
                                      
        // Project constants.
        if ( ! defined( 'PLUGIN_BOILERPLATE_HOME' ) ) { define( 'PLUGIN_BOILERPLATE_HOME', 'https://evolvewp.dev' ); }
        if ( ! defined( 'PLUGIN_BOILERPLATE_GITHUB' ) ) { define( 'PLUGIN_BOILERPLATE_GITHUB', 'https://github.com/FifeCIC/EvolveWP.PluginBoilerplate' ); }
        if ( ! defined( 'PLUGIN_BOILERPLATE_DOCS' ) ) { define( 'PLUGIN_BOILERPLATE_DOCS', 'https://evolvewp.dev/docs' ); }
    }

    /**
     * Include required core files used in admin and on the frontend.
     */
    public function includes() {

        // -------------------------------------------------------------------------
        // GROUP 2 — Core functions (always loaded, no class dependencies)
        // -------------------------------------------------------------------------
        include_once( 'includes/functions/core.php' );
        include_once( 'includes/functions/validate.php' );
        include_once( 'includes/logging-helper.php' );
        include_once( 'includes/api-logging.php' );
        include_once( 'includes/functions/database.php' );

        // -------------------------------------------------------------------------
        // GROUP 3 — Core classes (loaded on every request)
        // -------------------------------------------------------------------------
        include_once( 'includes/classes/debug.php' );
        // Composer PSR-4 autoloader handles all namespaced classes (loaded in plugin-boilerplate.php).
        // EvolveWP\PluginBoilerplate\Core\Install is autoloaded via Composer — no include needed.
        // EvolveWP\PluginBoilerplate\Core\AJAX_Handler is autoloaded via Composer — no include needed.
        include_once( 'includes/classes/object-registry.php' );
        include_once( 'includes/classes/data-freshness-manager.php' );
        include_once( 'includes/classes/developer-flow-logger.php' );
        include_once( 'includes/classes/developer-mode.php' );
        include_once( 'includes/classes/i18n.php' );
        include_once( 'includes/classes/dependencies.php' );
        include_once( 'includes/classes/listener.php' );
        // EvolveWP\PluginBoilerplate\Core\Logger is autoloaded via Composer — no include needed.
        // EvolveWP\PluginBoilerplate\Core\Enhanced_Logger is autoloaded via Composer — no include needed.

        // -------------------------------------------------------------------------
        // GROUP 3b — Assets (always loaded, procedural — to be replaced by Asset_Manager in Task 3.1)
        // -------------------------------------------------------------------------
        include_once( 'assets/manage-assets.php' );
        include_once( 'assets/queue-assets.php' );

        // -------------------------------------------------------------------------
        // GROUP 4 — Optional libraries (guarded by file_exists)
        // -------------------------------------------------------------------------
        if ( file_exists( plugin_dir_path( __FILE__ ) . 'includes/libraries/action-scheduler/action-scheduler.php' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'includes/libraries/action-scheduler/action-scheduler.php';
            // EvolveWP\PluginBoilerplate\Core\Task_Scheduler is autoloaded via Composer.
            \EvolveWP\PluginBoilerplate\Core\Task_Scheduler::instance();
        }

        if ( file_exists( plugin_dir_path( __FILE__ ) . 'includes/libraries/carbon-fields/vendor/autoload.php' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'includes/libraries/carbon-fields/vendor/autoload.php';
            include_once( 'includes/classes/carbon-fields-integration.php' );
        }

        // -------------------------------------------------------------------------
        // GROUP 5 — Ecosystem framework (always loaded)
        // All three Ecosystem classes autoloaded via Composer — no includes needed.
        // -------------------------------------------------------------------------
        plugin_boilerplate_ecosystem(); // boot Registry singleton
        new \EvolveWP\PluginBoilerplate\Ecosystem\Menu_Manager(); // boot menu manager
        new \EvolveWP\PluginBoilerplate\Ecosystem\Installer(); // boot plugin installer
        add_action( 'plugin_boilerplate_ecosystem_register', function() {
            plugin_boilerplate_ecosystem()->register_plugin( 'plugin-boilerplate', array(
                'name'                 => 'Plugin Boilerplate',
                'version'              => PLUGIN_BOILERPLATE_VERSION,
                'path'                 => PLUGIN_BOILERPLATE_PLUGIN_DIR_PATH,
                'url'                  => plugins_url( '/', PLUGIN_BOILERPLATE_PLUGIN_FILE ),
                'has_logging'          => true,
                'has_cron'             => true,
                'has_background_tasks' => true,
                'shared_settings'      => array( 'logging', 'cron', 'background_tasks' ),
            ) );
        } );

        // -------------------------------------------------------------------------
        // GROUP 6 — Feature classes (remove unused ones when cloning)
        // -------------------------------------------------------------------------
        include_once( 'includes/classes/multisite.php' );
        include_once( 'includes/classes/settings-import-export.php' );
        include_once( 'includes/classes/extension-installer.php' );
        include_once( 'includes/classes/library-manager.php' );
        include_once( 'includes/classes/library-update-monitor.php' );
        // EvolveWP\PluginBoilerplate\Admin\Dashboard_Widgets is autoloaded via Composer.
        new \EvolveWP\PluginBoilerplate\Admin\Dashboard_Widgets();

        // -------------------------------------------------------------------------
        // GROUP 7 — WP-CLI (loaded only when WP_CLI is defined)
        // -------------------------------------------------------------------------
        if ( defined( 'WP_CLI' ) && WP_CLI ) {
            include_once( 'includes/classes/cli-commands.php' );
        }

        // -------------------------------------------------------------------------
        // GROUP 8 — API system (always loaded)
        // EvolveWP\PluginBoilerplate\API\Base_API and EvolveWP\PluginBoilerplate\API\REST_Controller autoloaded via Composer.
        // -------------------------------------------------------------------------
        include_once( 'api/api-directory.php' );
        include_once( 'api/api-factory.php' );



        // -------------------------------------------------------------------------
        // GROUP 9 — Admin only (deferred to init priority 1)
        // -------------------------------------------------------------------------
        if ( $this->is_request( 'admin' ) ) {
            add_action( 'init', array( $this, 'load_admin_files' ), 1 );
        }

        // -------------------------------------------------------------------------
        // GROUP 10 — Frontend only
        // -------------------------------------------------------------------------
        if ( $this->is_request( 'frontend' ) ) {
            $this->frontend_includes();
        }

        // -------------------------------------------------------------------------
        // GROUP 11 — Shortcodes (always loaded)
        // -------------------------------------------------------------------------
        include_once( 'shortcodes/shortcodes.php' );
    }

    /**
     * Include required frontend files.
     */
    public function frontend_includes() {
        include_once( 'includes/classes/frontend-scripts.php' );  
    }

    /**
     * Load admin files after WordPress init.
     */
    public function load_admin_files() {
        include_once( 'includes/admin/admin.php' );
        include_once( 'includes/admin/admin-main-views.php' );
        include_once( 'admin/config/admin-menus.php' );
        include_once( 'admin/notifications/notifications.php' );
        // EvolveWP\PluginBoilerplate\Admin\Notification_Bell autoloaded via Composer.
        \EvolveWP\PluginBoilerplate\Admin\Notification_Bell::init();
        include_once( 'templates/tabs/development/tab-credits.php' );
        include_once( 'toolbars/toolbars.php' );
        // EvolveWP\PluginBoilerplate\Admin\Uninstall_Feedback autoloaded via Composer.
        new \EvolveWP\PluginBoilerplate\Admin\Uninstall_Feedback();
    }

    /**
     * Initialise EvolveWP Core when WordPress initialises.
     *
     * @since 1.0.0
     */
    public function init() {
        do_action( 'before_plugin_boilerplate_init' );
        do_action( 'plugin_boilerplate_init' );
    }

    /**
     * Get the plugin url.
     * @return string
     */
    public function plugin_url() {                
        return untrailingslashit( plugins_url( '/', __FILE__ ) );
    }

    /**
     * Get the plugin path.
     * @return string
     */
    public function plugin_path() {              
        return untrailingslashit( plugin_dir_path( __FILE__ ) );
    }

    /**
     * Get Ajax URL (this is the URL to WordPress core ajax file).
     * @return string
     */
    public function ajax_url() {                
        return admin_url( 'admin-ajax.php', 'relative' );
    }

    /**
     * What type of request is this?
     *
     * Functions and constants are WordPress core. This function will allow
     * you to avoid large operations or output at the wrong time.
     * 
     * @param  string $type admin, ajax, cron or frontend.
     * @return bool
     */
    private function is_request( $type ) {
        switch ( $type ) {
            case 'admin' :
                return is_admin();
            case 'ajax' :
                return defined( 'DOING_AJAX' );
            case 'cron' :
                return defined( 'DOING_CRON' );
            case 'frontend' :
                return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
        }
    }    
}

// Boot the main plugin instance.
$GLOBALS['plugin_boilerplate'] = PluginBoilerplate();
