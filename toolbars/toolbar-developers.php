<?php
/**
 * EvolveWP Core - Developer Toolbar
 *
 * @package EvolveWP Core/Toolbars
 * @since 1.0.0
 */
 
if (!defined('ABSPATH')) {
    exit;
}  

if (!class_exists('EvolveWP_Core_Admin_Toolbar_Developers')) :

class EvolveWP_Core_Admin_Toolbar_Developers {
    public function __construct() {
        if (!current_user_can('manage_options')) {
            return false;
        }
        
        $this->init(); 
    }    
    
    private function init() {
        global $wp_admin_bar;  

        self::parent_level();
        self::second_level_tools();
    }

    private static function parent_level() {
        global $wp_admin_bar;   
        
        $args = array(
            'id'     => 'plugin-boilerplate-toolbarmenu-developers',
            'title'  => __('EvolveWP Core Dev', 'plugin-boilerplate'),          
        );
        $wp_admin_bar->add_menu($args);        
    }
    
    private static function second_level_tools() {
        global $wp_admin_bar;
        
        // Group - Developer Tools
        $args = array(
            'id'     => 'plugin-boilerplate-toolbarmenu-devtools',
            'parent' => 'plugin-boilerplate-toolbarmenu-developers',
            'title'  => __('Developer Tools', 'plugin-boilerplate'), 
            'meta'   => array('class' => 'second-toolbar-group')         
        );        
        $wp_admin_bar->add_menu($args);        
            
        // Demo Mode Switch
        $thisaction = 'plugin_boilerplate_demo_mode_switch';
        $href = admin_url('admin-post.php?action=' . $thisaction);
        
        $is_demo = get_option('plugin_boilerplate_demo_mode', false);
        
        if ($is_demo) {
            $title = __('✅ Demo Mode: ON', 'plugin-boilerplate');        
        } else {
            $title = __('❌ Demo Mode: OFF', 'plugin-boilerplate');    
        }
           
        $args = array(
            'id'     => 'plugin-boilerplate-toolbarmenu-toggledemomode',
            'parent' => 'plugin-boilerplate-toolbarmenu-devtools',
            'title'  => $title,
            'href'   => esc_url($href),            
        );
        
        $wp_admin_bar->add_menu($args);
        
        // Reset Pointers
        $thisaction = 'plugin_boilerplate_reset_pointers';
        $href = admin_url('admin-post.php?action=' . $thisaction);
        
        $args = array(
            'id'     => 'plugin-boilerplate-toolbarmenu-resetpointers',
            'parent' => 'plugin-boilerplate-toolbarmenu-devtools',
            'title'  => __('Reset Pointers', 'plugin-boilerplate'),
            'href'   => esc_url(wp_nonce_url($href, 'plugin_boilerplate_reset_pointers')),
        );
        
        $wp_admin_bar->add_menu($args);
        
        // Link to Development Page
        $args = array(
            'id'     => 'plugin-boilerplate-toolbarmenu-devpage',
            'parent' => 'plugin-boilerplate-toolbarmenu-devtools',
            'title'  => __('Development Page', 'plugin-boilerplate'),
            'href'   => admin_url('admin.php?page=plugin_boilerplate_development'),
        );
        
        $wp_admin_bar->add_menu($args);
    }
}   

endif;

if (current_user_can('manage_options')) {
    return new EvolveWP_Core_Admin_Toolbar_Developers();
}
