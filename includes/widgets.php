<?php
/**
 * EvolveWP Core - Primary Sidebar Widgets File
 *
 * @author   Ryan Bayne
 * @category Widgets
 * @package  EvolveWP Core/Widgets
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
    //register_widget( 'EvolveWP_Core_Widget_Example' );
}
add_action( 'widgets_init', 'plugin_boilerplate_register_widgets' );