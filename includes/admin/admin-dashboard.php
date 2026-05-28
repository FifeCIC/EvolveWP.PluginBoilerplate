<?php                 
/**
 * Plugin Boilerplate - WP Admin Dashboard
 *
 * Custom dashboard widgets and functionality goes here.  
 *
 * @author   Ryan Bayne
 * @category WordPress Dashboard
 * @package  Plugin Boilerplate/Admin
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'EvolveWP_Boilerplate_Admin_Dashboard' ) ) :

/**
 * EvolveWP_Boilerplate_Admin_Dashboard Class.
 */
class EvolveWP_Boilerplate_Admin_Dashboard {

    /**
     * Init dashboard widgets.
     */
    public function init() {           
        if ( function_exists('current_user_can') && current_user_can( 'activate_plugins' ) ) {
            wp_add_dashboard_widget( 'plugin_boilerplate_dashboard_widget_example', __( 'Example Widget', 'plugin-boilerplate' ), array( $this, 'example_widget' ) );
        }
    }
       
    /**
     * Recent reviews widget.
     */
    public function example_widget() {              
        echo '<p>' . esc_html__( 'This is an example widget only. A developer must use it or remove it.', 'plugin-boilerplate' ) . '</p>';
    }

}

endif;

return new EvolveWP_Boilerplate_Admin_Dashboard();
