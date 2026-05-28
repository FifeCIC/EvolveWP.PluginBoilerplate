<?php
/**
 * Plugin Boilerplate Tools Settings Page
 *
 * @package Plugin Boilerplate/Admin/Settings
 * @version 1.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'EvolveWP_Boilerplate_Settings_Tools' ) ) :

/**
 * EvolveWP_Boilerplate_Settings_Tools
 */
class EvolveWP_Boilerplate_Settings_Tools extends EvolveWP_Boilerplate_Settings_Page {

    /**
     * Constructor
     */
    public function __construct() {
        $this->id    = 'tools';
        $this->label = __( 'Tools', 'plugin-boilerplate' );

        parent::__construct();
    }

    /**
     * Get settings array
     */
    public function get_settings() {
        $settings = array(

            array(
                'title' => __( 'Plugin Tools', 'plugin-boilerplate' ),
                'type'  => 'title',
                'desc'  => __( 'Utilities for managing your plugin settings and data.', 'plugin-boilerplate' ),
                'id'    => 'tools_section'
            ),

            array(
                'type' => 'sectionend',
                'id'   => 'tools_section'
            ),

        );

        return apply_filters( 'plugin_boilerplate_tools_settings', $settings );
    }

    /**
     * Output the settings
     */
    public function output() {
        $settings = $this->get_settings();
        EvolveWP_Boilerplate_Admin_Settings::output_fields( $settings );
        
        // Output import/export UI
        do_action( 'plugin_boilerplate_settings_export_import' );
    }

    /**
     * Save settings
     */
    public function save() {
        // Import/export handles its own saving
    }
}

endif;

return new EvolveWP_Boilerplate_Settings_Tools();
