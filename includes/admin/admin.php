<?php
/**
 * Plugin Boilerplate Admin - Main Admin Class
 *
 * The primary for main add_action() and file includes during an administration side request. There is
 * also a functions.plugin-boilerplate-admin.php for functions strictly related to admin.  
 * 
 * Do not include files only meant for the frontside.
 * Do not queue scripts or css only meant for frontside. 
 * 
 * @class    EvolveWP_Boilerplate_Admin
 * @author   Ryan Bayne
 * @category Admin
 * @package  Plugin Boilerplate/Admin
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * EvolveWP_Boilerplate_Admin class.
 */
class EvolveWP_Boilerplate_Admin {

    /**
     * Constructor.
     */
    public function __construct() {         
        add_action( 'init', array( $this, 'includes' ) );
        add_action( 'current_screen', array( $this, 'conditional_includes' ) );
        add_action( 'admin_init', array( $this, 'buffer' ), 1 );
        add_action( 'admin_init', array( $this, 'admin_redirects' ) );
        add_action( 'admin_footer', 'plugin_boilerplate_print_js', 25 );
        add_filter( 'admin_footer_text', array( $this, 'admin_footer_text' ), 1 );
    }

    /**
     * Output buffering allows admin screens to make redirects later on.
     */
    public function buffer() {
        ob_start();
    }

    /**
     * Include any classes we need within admin.
     */
    public function includes() {
        include_once( dirname( __FILE__ ) . '/admin-functions.php' );
        include_once( dirname( __FILE__ ) . '/admin-settings.php' );
        include_once( dirname( __FILE__ ) . '/admin-menus.php' );
        include_once( dirname( __FILE__ ) . '/admin-notices.php' );
        include_once( dirname( __FILE__ ) . '/admin-assets.php' );
        include_once( dirname( __FILE__ ) . '/admin-pointers.php' );
        include_once( dirname( __FILE__ ) . '/admin-help.php' );
        
        // Help Tabs
        if ( apply_filters( 'plugin_boilerplate_enable_admin_help_tab', true ) ) {
            include_once( dirname( __FILE__ ) . '/admin-help.php' );
        }
                
        // Read-only navigation parameter — gates which wizard file to include.
        // Restricted to administrators; no state change occurs on this read.
        if ( current_user_can( 'manage_options' ) && ! empty( $_GET['page'] ) ) {
            switch ( sanitize_key( wp_unslash( $_GET['page'] ) ) ) {
                case 'plugin-boilerplate-setup' :
                    include_once( dirname( __FILE__ ) . '/admin-setup-wizard.php' );
                break;
            }
        }
    }

    /**
     * Include admin files conditionally based on specific page.
     */
    public function conditional_includes() {

        if ( ! $screen = get_current_screen() ) {
            return;
        }

        switch ( $screen->id ) {
            case 'dashboard' :
                include( 'admin-dashboard.php' );
            break;
            case 'plugin-boilerplate' :
            break;
            case 'users' :
            break;
            case 'user' :
            break;
            case 'profile' :
            break;
            case 'user-edit' :
            break;
            case 'plugin-boilerplate-settings' :
            break;
        }
    }

    /**
     * Handle redirects to setup/welcome page after install and updates.
     *
     * For setup wizard, transient must be present, the user must have access rights, and we must ignore the network/bulk plugin updaters.
     */
    public function admin_redirects() {

        // Nonced plugin install redirects (whitelisted)
        // Unslash and sanitise before use; current_user_can() checked before acting.
        if ( current_user_can( 'install_plugins' ) && ! empty( $_GET['plugin-boilerplate-install-plugin-redirect'] ) ) {
            $plugin_slug = sanitize_key( wp_unslash( $_GET['plugin-boilerplate-install-plugin-redirect'] ) );

            if ( in_array( $plugin_slug, array( 'plugin-boilerplate-gateway-stripe' ), true ) ) {
                $nonce = wp_create_nonce( 'install-plugin_' . $plugin_slug );
                $url   = self_admin_url( 'update.php?action=install-plugin&plugin=' . $plugin_slug . '&_wpnonce=' . $nonce );
            } else {
                $url = admin_url( 'plugin-install.php?tab=search&type=term&s=' . $plugin_slug );
            }

            wp_safe_redirect( $url );
            exit;
        }

        // Setup wizard redirect
        if ( get_transient( '_plugin_boilerplate_activation_redirect' ) ) {
            delete_transient( '_plugin_boilerplate_activation_redirect' );

            // Read-only navigation parameters — used only to check current page context.
            // current_user_can() checked below before any action is taken.
            $plugin_boilerplate_current_page    = ( isset( $_GET['page'] ) && current_user_can( 'manage_plugin-boilerplate' ) ) ? sanitize_key( wp_unslash( $_GET['page'] ) ) : '';
            $plugin_boilerplate_activate_multi  = isset( $_GET['activate-multi'] );

            if ( ( ! empty( $plugin_boilerplate_current_page ) && in_array( $plugin_boilerplate_current_page, array( 'plugin-boilerplate-setup' ), true ) ) || is_network_admin() || $plugin_boilerplate_activate_multi || ! current_user_can( 'manage_plugin-boilerplate' ) || apply_filters( 'plugin_boilerplate_prevent_automatic_wizard_redirect', false ) ) {
                return;
            }

            // If the user needs to install, send them to the setup wizard
            if ( EvolveWP_Boilerplate_Admin_Notices::has_notice( 'install' ) ) {
                wp_safe_redirect( admin_url( 'index.php?page=plugin-boilerplate-setup' ) );
                exit;
            }
        }
    }

    /**
     * Change the admin footer text on WordPress Seed admin pages.
     */
    public function admin_footer_text( $footer_text ) {
        if ( ! current_user_can( 'manage_plugin-boilerplate' ) ) {
            return;
        }
        $current_screen = get_current_screen();
        $plugin_boilerplate_pages   = plugin_boilerplate_get_screen_ids();

        // Check to make sure we're on a Plugin Boilerplate admin page
        if ( isset( $current_screen->id ) && apply_filters( 'plugin_boilerplate_display_admin_footer_text', in_array( $current_screen->id, $plugin_boilerplate_pages ) ) ) {
            $footer_text = __( 'Thank you for planting a WordPress Seed. I recommend removing this footer message. This text is an example only.', 'plugin-boilerplate' );
        }

        return $footer_text;
    }
}

return new EvolveWP_Boilerplate_Admin();