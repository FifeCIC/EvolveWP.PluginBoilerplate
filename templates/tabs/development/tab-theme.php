<?php
/**
 * EvolveWP Core UI Library
 *
 * @package EvolveWP Core/Admin/Views
 * @version 1.0.0
 */

if (!defined('ABSPATH')) exit;

class EvolveWP_Core_Admin_Development_UI_Library {
    
    public static function output() {
        require_once PLUGIN_BOILERPLATE_PLUGIN_DIR_PATH . 'templates/partials/ui-library/main-container.php';
    }
}

EvolveWP_Core_Admin_Development_UI_Library::output();
