<?php
/**
 * Internationalization Helper
 *
 * @package Plugin Boilerplate/i18n
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class EvolveWP_Boilerplate_i18n {
    
    public function __construct() {
        add_action('init', array($this, 'load_plugin_textdomain'));
    }
    
    public function load_plugin_textdomain() {
        load_plugin_textdomain(
            'plugin-boilerplate',
            false,
            dirname(plugin_basename(PLUGIN_BOILERPLATE_PLUGIN_FILE)) . '/languages/'
        );
    }
    
    public static function is_rtl() {
        return is_rtl();
    }
}

return new EvolveWP_Boilerplate_i18n();
