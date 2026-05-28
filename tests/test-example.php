<?php
/**
 * Example Test Case
 *
 * @package Plugin Boilerplate/Tests
 */

class EvolveWP_Boilerplate_Test_Example extends WP_UnitTestCase {
    
    public function test_plugin_activated() {
        $this->assertTrue(function_exists('Plugin Boilerplate'));
    }
    
    public function test_version_constant() {
        $this->assertTrue(defined('PLUGIN_BOILERPLATE_VERSION'));
    }
}
