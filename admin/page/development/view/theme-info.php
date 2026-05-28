<?php
/**
 * Plugin Boilerplate UI Library
 *
 * @package Plugin Boilerplate/Admin/Views
 * @version 1.0.0
 */

if (!defined('ABSPATH')) exit;

class EvolveWP_Boilerplate_Admin_Development_UI_Library {
    
    public static function output() {
        require_once PLUGIN_BOILERPLATE_PLUGIN_DIR_PATH . 'admin/page/development/partials/ui-library/main-container.php';
    }
}

EvolveWP_Boilerplate_Admin_Development_UI_Library::output();
