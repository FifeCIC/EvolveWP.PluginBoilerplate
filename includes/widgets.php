<?php
/**
 * Plugin Boilerplate - Primary Sidebar Widgets File
 *
 * @author   Ryan Bayne
 * @category Widgets
 * @package  Plugin Boilerplate/Widgets
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Include widget classes.
//include_once( 'abstracts/abstract-plugin-boilerplate-widget.php' );

/**
 * Register Widgets.
 */
function plugin_boilerplate_register_widgets() {
    //register_widget( 'EvolveWP_Boilerplate_Widget_Example' );
}
add_action( 'widgets_init', 'plugin_boilerplate_register_widgets' );