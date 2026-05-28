<?php
/**
 * Plugin Boilerplate Settings Page/Tab
 *
 * @author      Plugin Boilerplate
 * @category    Admin
 * @package     Plugin Boilerplate/Admin
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists( 'EvolveWP_Boilerplate_Settings_Page' ) ) :

/**
 * EvolveWP_Boilerplate_Settings_Page.
 */
abstract class EvolveWP_Boilerplate_Settings_Page {

    /**
     * Setting page id.
     *
     * @var string
     */
    protected $id = '';

    /**
     * Setting page label.
     *
     * @var string
     */
    protected $label = '';

    /**
     * Constructor.
     */
    public function __construct() {
        add_filter( 'plugin_boilerplate_settings_tabs_array', array( $this, 'add_settings_page' ), 20 );
        add_action( 'plugin_boilerplate_sections_' . $this->id, array( $this, 'output_sections' ) );
        add_action( 'plugin_boilerplate_settings_' . $this->id, array( $this, 'output' ) );
        add_action( 'plugin_boilerplate_settings_save_' . $this->id, array( $this, 'save' ) );
    }

    /**
     * Add this page to settings.
     */
    public function add_settings_page( $pages ) {
        $pages[ $this->id ] = $this->label;
        return $pages;
    }

    /**
     * Get settings array.
     *
     * @return array
     */
    public function get_settings() {
        return apply_filters( 'plugin_boilerplate_get_settings_' . $this->id, array() );
    }

    /**
     * Get sections.
     *
     * @return array
     */
    public function get_sections() {
        return apply_filters( 'plugin_boilerplate_get_sections_' . $this->id, array() );
    }

    /**
     * Output sections.
     */
    public function output_sections() {
        // $plugin_boilerplate_current_section prefixed to satisfy WordPress global variable naming standards.
        global $plugin_boilerplate_current_section;
        $current_section = $plugin_boilerplate_current_section;

        $sections = $this->get_sections();

        if ( empty( $sections ) || 1 === sizeof( $sections ) ) {
            return;
        }

        echo '<ul class="subsubsub">';

        $array_keys = array_keys( $sections );

        foreach ( $sections as $id => $label ) {
            echo '<li><a href="' . esc_url( admin_url( 'options-general.php?page=plugin-boilerplate-settings&tab=' . $this->id . '&section=' . sanitize_title( $id ) ) ) . '" class="' . ( $current_section == $id ? 'current' : '' ) . '">' . esc_html( $label ) . '</a> ' . ( end( $array_keys ) == $id ? '' : '|' ) . ' </li>';
        }

        echo '</ul><br class="clear" />';
    }

    /**
     * Output the settings.
     */
    public function output() {
        $settings = $this->get_settings();
              
        EvolveWP_Boilerplate_Admin_Settings::output_fields( $settings );
    }

    /**
     * Save settings.
     */
    public function save() {
        // $plugin_boilerplate_current_section prefixed to satisfy WordPress global variable naming standards.
        global $plugin_boilerplate_current_section;
        $current_section = $plugin_boilerplate_current_section;

        $settings = $this->get_settings();
        EvolveWP_Boilerplate_Admin_Settings::save_fields( $settings );

        if ( $current_section ) {
            do_action( 'plugin_boilerplate_update_options_' . $this->id . '_' . $current_section );
        }
    }
}

endif;
