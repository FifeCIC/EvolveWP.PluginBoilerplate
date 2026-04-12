<?php
/**
 * Plugin Dependency Checker
 *
 * @package EvolveWP Core/Dependencies
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class EvolveWP_Core_Dependencies {
    
    private $dependencies = array();
    
    public function __construct() {
        add_action('admin_init', array($this, 'check_dependencies'));
    }
    
    public function add_dependency($plugin_file, $plugin_name, $required_version = null) {
        $this->dependencies[] = array(
            'file'    => $plugin_file,
            'name'    => $plugin_name,
            'version' => $required_version
        );
    }
    
    public function check_dependencies() {
        foreach ($this->dependencies as $dependency) {
            if (!is_plugin_active($dependency['file'])) {
                add_action('admin_notices', function() use ($dependency) {
                    echo '<div class="error"><p>';
                    echo wp_kses_post(sprintf(
                        /* translators: %s: Required plugin name */
                        __('EvolveWP Core requires %s to be installed and activated.', 'plugin-boilerplate'),
                        '<strong>' . esc_html($dependency['name']) . '</strong>'
                    ));
                    echo '</p></div>';
                });
            }
        }
    }
}

return new EvolveWP_Core_Dependencies();
