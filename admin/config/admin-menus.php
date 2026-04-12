<?php
/**
 * EvolveWP Core Admin Menu Configuration
 *
 * @package EvolveWP Core/Admin
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register EvolveWP Core admin menus
 */
function plugin_boilerplate_register_admin_menus() {
    // Main menu
    add_menu_page(
        __('EvolveWP Core', 'plugin-boilerplate'),
        __('EvolveWP Core', 'plugin-boilerplate'),
        'manage_options',
        'plugin-boilerplate',
        'plugin_boilerplate_main_page',
        'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12,22C12,22 11,17 11,13C11,9 13,6 17,4C17,4 16,8 16,11C16,14 17,17 17,17M7,18C7,18 6,14 8,11C10,8 13,7 13,7C13,7 12,10 11,12C10,14 10,18 10,18" /></svg>'),
        30
    );

    // Development submenu
    add_submenu_page(
        'plugin-boilerplate',
        __('Development', 'plugin-boilerplate'),
        __('Development', 'plugin-boilerplate'),
        'manage_options',
        'plugin_boilerplate_development',
        'plugin_boilerplate_development_page'
    );
    
    // jQuery UI Gallery
    add_submenu_page(
        'plugin-boilerplate',
        __('jQuery UI Gallery', 'plugin-boilerplate'),
        __('jQuery UI Gallery', 'plugin-boilerplate'),
        'manage_options',
        'plugin-boilerplate-jquery-ui',
        'plugin_boilerplate_jquery_ui_page'
    );
    
    // Component Library - file missing, disabled
    /*
    add_submenu_page(
        'plugin-boilerplate',
        __('Component Library', 'plugin-boilerplate'),
        __('Component Library', 'plugin-boilerplate'),
        'manage_options',
        'plugin-boilerplate-components',
        'plugin_boilerplate_components_page'
    );
    */
    
    // Notifications
    add_submenu_page(
        'plugin-boilerplate',
        __('Notifications', 'plugin-boilerplate'),
        __('Notifications', 'plugin-boilerplate'),
        'manage_options',
        'plugin-boilerplate-notifications',
        'plugin_boilerplate_notifications_page'
    );
    
    // License - disabled pending full development
    /*
    add_submenu_page(
        'plugin-boilerplate',
        __('License', 'plugin-boilerplate'),
        __('License', 'plugin-boilerplate'),
        'manage_options',
        'plugin-boilerplate-license',
        'plugin_boilerplate_license_page'
    );
    */
    
    // Scheduled Actions (Action Scheduler)
    if (function_exists('as_enqueue_async_action')) {
        add_submenu_page(
            'plugin-boilerplate',
            __('Scheduled Actions', 'plugin-boilerplate'),
            __('Scheduled Actions', 'plugin-boilerplate'),
            'manage_options',
            'plugin-boilerplate-scheduled-actions',
            'plugin_boilerplate_scheduled_actions_page'
        );
    }
}
add_action('admin_menu', 'plugin_boilerplate_register_admin_menus');

/**
 * Main page callback
 */
function plugin_boilerplate_main_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('EvolveWP Core', 'plugin-boilerplate'); ?></h1>
        <p><?php esc_html_e('Welcome to EvolveWP Core - Your WordPress Plugin Boilerplate', 'plugin-boilerplate'); ?></p>
        <div class="card">
            <h2><?php esc_html_e('Getting Started', 'plugin-boilerplate'); ?></h2>
            <p><?php esc_html_e('This is a boilerplate plugin with developer tools and examples.', 'plugin-boilerplate'); ?></p>
            <ul>
                <li><?php esc_html_e('Visit the Development page to access debugging tools', 'plugin-boilerplate'); ?></li>
                <li><?php esc_html_e('Check the code examples in the plugin directory', 'plugin-boilerplate'); ?></li>
                <li><?php esc_html_e('Customize this plugin to build your own WordPress solution', 'plugin-boilerplate'); ?></li>
            </ul>
        </div>
    </div>
    <?php
}

/**
 * Development page callback
 */
function plugin_boilerplate_development_page() {
    if (!class_exists('EvolveWP_Core_Admin_Development_Page')) {
        require_once PLUGIN_BOILERPLATE_PLUGIN_DIR_PATH . 'admin/page/development/development-tabs.php';
    }
    EvolveWP_Core_Admin_Development_Page::output();
}

/**
 * jQuery UI Gallery page callback
 */
function plugin_boilerplate_jquery_ui_page() {
    require_once PLUGIN_BOILERPLATE_PLUGIN_DIR_PATH . 'includes/admin/settings/settings-jquery-ui.php';
    plugin_boilerplate_render_jquery_ui_gallery();
}

/**
 * Enqueue jQuery UI styles for gallery page
 */
function plugin_boilerplate_jquery_ui_enqueue_assets($hook) {
    if ($hook !== 'plugin_boilerplate_page_plugin-boilerplate-jquery-ui') {
        return;
    }
    
    // Enqueue jQuery UI scripts
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_script('jquery-ui-slider');
    wp_enqueue_script('jquery-ui-progressbar');
    wp_enqueue_script('jquery-ui-autocomplete');
    wp_enqueue_script('jquery-ui-accordion');
    wp_enqueue_script('jquery-ui-tabs');
    wp_enqueue_script('jquery-ui-dialog');
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('jquery-ui-spinner');
    
    // Enqueue WordPress jQuery UI styles
    wp_enqueue_style('wp-jquery-ui-dialog');
}
add_action('admin_enqueue_scripts', 'plugin_boilerplate_jquery_ui_enqueue_assets');

/**
 * Component Library page callback - disabled (file missing)
 */
/*
function plugin_boilerplate_components_page() {
    require_once PLUGIN_BOILERPLATE_PLUGIN_DIR_PATH . 'admin/page/component-library/component-library.php';
    plugin_boilerplate_render_component_library();
}
*/

/**
 * Notifications page callback
 */
function plugin_boilerplate_notifications_page() {
    require_once PLUGIN_BOILERPLATE_PLUGIN_DIR_PATH . 'admin/page/notification-center.php';
}

/**
 * License page callback - disabled pending full development
 */
/*
function plugin_boilerplate_license_page() {
    require_once PLUGIN_BOILERPLATE_PLUGIN_DIR_PATH . 'admin/page/license-management.php';
}
*/

/**
 * Scheduled Actions page callback
 */
function plugin_boilerplate_scheduled_actions_page() {
    if (!class_exists('ActionScheduler_AdminView')) {
        wp_die(esc_html__('Action Scheduler is not available.', 'plugin-boilerplate'));
    }
    
    $admin_view = ActionScheduler_AdminView::instance();
    $admin_view->render_admin_ui();
}
