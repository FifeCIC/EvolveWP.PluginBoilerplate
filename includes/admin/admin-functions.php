<?php
/**
 * Plugin Boilerplate - Admin Only Functions
 *
 * @author   Ryan Bayne
 * @category Admin
 * @package  Plugin Boilerplate/Admin
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get all WordPress Plugin Boilerplate screen ids.
 *
 * @return array
 */
function plugin_boilerplate_get_screen_ids() {
    $screen_ids = array(
        'toplevel_page_plugin-boilerplate',
        'plugin_boilerplate_page_plugin-boilerplate-settings',
    );

    return apply_filters( 'plugin_boilerplate_screen_ids', $screen_ids );
}
