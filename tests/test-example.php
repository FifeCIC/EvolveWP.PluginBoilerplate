<?php
/**
 * Example Test Case
 *
 * @package EvolveWP Core/Tests
 */

class EvolveWP_Core_Test_Example extends WP_UnitTestCase {
    
    public function test_plugin_activated() {
        $this->assertTrue(function_exists('EvolveWP Core'));
    }
    
    public function test_version_constant() {
        $this->assertTrue(defined('PLUGIN_BOILERPLATE_VERSION'));
    }
}
