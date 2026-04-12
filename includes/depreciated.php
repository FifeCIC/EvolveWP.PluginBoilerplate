<?php
/**
 * EvolveWP Core - Depreciated Functions
 *
 * Please add the WordPress core function for triggering and error if a
 * depreciated function is used. 
 * 
 * Use: _deprecated_function( 'plugin_boilerplate_function_called', '2.1', 'plugin_boilerplate_replacement_function' );  
 *
 * @author   Ryan Bayne
 * @category Core
 * @package  EvolveWP Core/Core
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
} 
  
/**
 * @deprecated example only
 */
function plugin_boilerplate_function_called() {
    _deprecated_function( 'plugin_boilerplate_function_called', '2.1', 'plugin_boilerplate_replacement_function' );
    //plugin_boilerplate_replacement_function();
}