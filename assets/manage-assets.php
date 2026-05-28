<?php
/**
 * Plugin Boilerplate Asset Management
 * 
 * Central library for managing asset paths and metadata
 * 
 * @package Plugin Boilerplate/Assets
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class EvolveWP_Boilerplate_Asset_Manager {
    
    private $assets_dir;
    public $assets_url;
    private $assets = array();
    private $missing_assets = array();
    
    public function __construct() {
        $this->assets_dir = plugin_dir_path(__FILE__);
        $this->assets_url = plugin_dir_url(__FILE__);
        $this->init_assets();
    }
    
    private function init_assets() {
        $this->assets = array(
            'css' => require_once dirname(__FILE__) . '/style-assets.php',
            'js' => require_once dirname(__FILE__) . '/script-assets.php'
        );
    }
    
    public function get_asset_path($type, $name) {
        if (!isset($this->assets[$type])) {
            return false;
        }
        
        foreach ($this->assets[$type] as $category => $assets) {
            if (isset($assets[$name])) {
                $path = $this->assets_dir . $assets[$name]['path'];
                
                if (!file_exists($path)) {
                    $this->log_missing_asset($type, $name, $path);
                    return false;
                }
                
                return $path;
            }
        }
        
        return false;
    }
    
    public function get_asset_url($type, $name) {
        if (!isset($this->assets[$type])) {
            return false;
        }
        
        foreach ($this->assets[$type] as $category => $assets) {
            if (isset($assets[$name])) {
                $path = $this->assets_dir . $assets[$name]['path'];
                
                if (!file_exists($path)) {
                    $this->log_missing_asset($type, $name, $path);
                    return false;
                }
                
                return $this->assets_url . $assets[$name]['path'];
            }
        }
        
        return false;
    }
    
    public function get_all_assets($type = null) {
        if ($type && isset($this->assets[$type])) {
            $all_assets = array();
            foreach ($this->assets[$type] as $category => $assets) {
                $all_assets = array_merge($all_assets, $assets);
            }
            return $all_assets;
        }
        
        return $this->assets;
    }
    
    public function get_assets_by_page($page, $type = null) {
        $page_assets = array();
        $types_to_check = $type ? array($type) : array('css', 'js');
        
        foreach ($types_to_check as $asset_type) {
            if (!isset($this->assets[$asset_type])) continue;
            
            foreach ($this->assets[$asset_type] as $category => $assets) {
                foreach ($assets as $name => $asset) {
                    if (!isset($asset['pages'])) continue;
                    
                    if (in_array('all', $asset['pages']) || in_array($page, $asset['pages'])) {
                        $page_assets[$asset_type][$name] = $asset;
                    }
                }
            }
        }
        
        return $page_assets;
    }
    
    public function get_dependencies($type, $name) {
        if (!isset($this->assets[$type])) {
            return array();
        }
        
        foreach ($this->assets[$type] as $category => $assets) {
            if (isset($assets[$name])) {
                return $assets[$name]['dependencies'];
            }
        }
        
        return array();
    }
    
    public function get_assets_by_category($type, $category) {
        if (isset($this->assets[$type][$category])) {
            return $this->assets[$type][$category];
        }
        
        return array();
    }
    
    public function asset_exists($type, $name) {
        $path = $this->get_asset_path($type, $name);
        return $path !== false && file_exists($path);
    }
    
    private function log_missing_asset($type, $name, $path) {
        $this->missing_assets[] = array(
            'type' => $type,
            'name' => $name,
            'path' => $path,
            'time' => current_time('mysql')
        );
        
        if (get_option('plugin_boilerplate_log_missing_assets', 'yes') === 'yes') {
            EvolveWP_Boilerplate_Logging_Helper::log_error(
                'missing_asset',
                sprintf('Asset not found: %s (%s) at %s', $name, $type, $path)
            );
        }
    }
    
    public function get_missing_assets() {
        return $this->missing_assets;
    }
    
    public function has_missing_assets() {
        return !empty($this->missing_assets);
    }
}

global $plugin_boilerplate_assets;
if (!isset($plugin_boilerplate_assets)) {
    $plugin_boilerplate_assets = new EvolveWP_Boilerplate_Asset_Manager();
}

function plugin_boilerplate_get_asset($type, $name) {
    global $plugin_boilerplate_assets;
    return $plugin_boilerplate_assets->get_asset_path($type, $name);
}

function plugin_boilerplate_get_asset_url($type, $name) {
    global $plugin_boilerplate_assets;
    return $plugin_boilerplate_assets->get_asset_url($type, $name);
}
