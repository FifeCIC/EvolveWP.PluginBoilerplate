<?php
/**
 * EvolveWP Core - Toolbars Class
 *
 * Add menus to the admin toolbar
 *
 * @package EvolveWP Core/Toolbars
 * @since 1.0.0
 */
 
if (!defined('ABSPATH')) {
    exit;
}  

if (!class_exists('EvolveWP_Core_Toolbars')) :

class EvolveWP_Core_Toolbars {
    
    public function __construct() {     
        add_action('wp_before_admin_bar_render', array($this, 'admin_only_toolbars'));
        
        // Register admin post handlers
        add_action('admin_post_plugin_boilerplate_demo_mode_switch', array($this, 'handle_demo_mode_switch'));
        add_action('admin_post_plugin_boilerplate_reset_pointers', array($this, 'handle_reset_pointers'));
        add_action('admin_post_plugin_boilerplate_clear_cache', array($this, 'handle_clear_cache'));
    }   
    
    public function admin_only_toolbars() {       
        if (!current_user_can('activate_plugins')) return;  
        
        // Include QuickTools toolbar
        include_once('toolbar-quicktools.php');
        
        // Include developer toolbar (developer mode only)
        if (plugin_boilerplate_is_developer_mode() && current_user_can('manage_options')) {
            include_once('toolbar-developers.php');
        }
    }
    
    /**
     * Handle demo mode toggle
     */
    public function handle_demo_mode_switch() {
        if (!current_user_can('manage_options')) {
            wp_die(esc_html__('Insufficient permissions', 'plugin-boilerplate'));
        }

        $current_status = get_option('plugin_boilerplate_demo_mode', false);
        $new_status = !$current_status;
        
        update_option('plugin_boilerplate_demo_mode', $new_status);
        
        $status_text = $new_status ? __('enabled', 'plugin-boilerplate') : __('disabled', 'plugin-boilerplate');
        /* translators: %s: Status text (enabled or disabled) */
        $message = sprintf(__('Demo mode has been %s.', 'plugin-boilerplate'), $status_text);
        
        set_transient('plugin_boilerplate_admin_notice', array(
            'type' => 'success',
            'message' => $message
        ), 30);
        
        wp_safe_redirect(wp_get_referer() ?: admin_url());
        exit;
    }
    
    /**
     * Handle reset all pointers
     */
    public function handle_reset_pointers() {
        if (!current_user_can('manage_options')) {
            wp_die(esc_html__('Insufficient permissions', 'plugin-boilerplate'));
        }

        $nonce = isset($_GET['_wpnonce']) ? sanitize_text_field(wp_unslash($_GET['_wpnonce'])) : '';
        if (!wp_verify_nonce($nonce, 'plugin_boilerplate_reset_pointers')) {
            wp_die(esc_html__('Security check failed', 'plugin-boilerplate'));
        }
        
        delete_user_meta(get_current_user_id(), 'dismissed_wp_pointers');
        
        set_transient('plugin_boilerplate_admin_notice', array(
            'type' => 'success',
            'message' => __('All pointers have been reset.', 'plugin-boilerplate')
        ), 30);
        
        wp_safe_redirect(wp_get_referer() ?: admin_url());
        exit;
    }
} 

endif;

return new EvolveWP_Core_Toolbars();
