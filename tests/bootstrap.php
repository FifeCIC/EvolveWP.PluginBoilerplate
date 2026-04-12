<?php
/**
 * PHPUnit Bootstrap
 *
 * This file is a PHPUnit entry point and runs entirely outside of WordPress.
 * ABSPATH is never defined in this context, so the standard direct-access
 * guard is intentionally omitted — adding it would prevent the test suite
 * from loading.
 *
 * @package EvolveWP Core/Tests
 * @version 1.2.0
 */

// Prefixed with plugin_boilerplate_ to satisfy WordPress global variable naming standards.
$plugin_boilerplate_tests_dir = getenv( 'WP_TESTS_DIR' );

if ( ! $plugin_boilerplate_tests_dir ) {
    $plugin_boilerplate_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

if ( ! file_exists( $plugin_boilerplate_tests_dir . '/includes/functions.php' ) ) {
    // Write to STDERR so PHPUnit surfaces the message — error_log() is not
    // appropriate here as this file runs outside WordPress in a CLI context.
    fwrite( STDERR, "Could not find {$plugin_boilerplate_tests_dir}/includes/functions.php" . PHP_EOL );
    exit( 1 );
}

require_once $plugin_boilerplate_tests_dir . '/includes/functions.php';

function plugin_boilerplate_manually_load_plugin() {
    require dirname(dirname(__FILE__)) . '/plugin-boilerplate.php';
}

tests_add_filter('muplugins_loaded', 'plugin_boilerplate_manually_load_plugin');

require $plugin_boilerplate_tests_dir . '/includes/bootstrap.php';
