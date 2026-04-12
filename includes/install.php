<?php
/**
 * EvolveWP Core Installation Class
 *
 * @package EvolveWP Core/Classes
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class EvolveWP_Core_Install {

    public function __construct() {
        register_activation_hook(PLUGIN_BOILERPLATE_PLUGIN_FILE, array($this, 'install'));
        add_action('admin_init', array($this, 'check_version'), 5);
    }

    public function check_version() {
        if (get_option('plugin_boilerplate_version') !== PLUGIN_BOILERPLATE_VERSION) {
            $this->install();
            do_action('plugin_boilerplate_updated');
        }
    }

    public function install() {
        if ('yes' === get_transient('plugin_boilerplate_installing')) {
            return;
        }

        set_transient('plugin_boilerplate_installing', 'yes', MINUTE_IN_SECONDS * 10);
        
        $this->create_options();
        $this->create_roles();
        $this->setup_environment();
        $this->create_cron_jobs();
        
        delete_transient('plugin_boilerplate_installing');
        
        delete_option('plugin_boilerplate_version');
        add_option('plugin_boilerplate_version', PLUGIN_BOILERPLATE_VERSION);
        
        flush_rewrite_rules();
        
        do_action('plugin_boilerplate_installed');
    }

    private function create_options() {
        add_option('plugin_boilerplate_installed', 'yes');
        add_option('plugin_boilerplate_demo_mode', 'yes');
    }
    
    private function create_roles() {
        add_role(
            'plugin_boilerplate_user',
            __('EvolveWP Core User', 'plugin-boilerplate'),
            array(
                'read' => true,
                'manage_plugin-boilerplate' => true
            )
        );
        
        $admin = get_role('administrator');
        if ($admin) {
            $admin->add_cap('manage_plugin-boilerplate');
        }
    }
    
    private function setup_environment() {
        $this->register_post_types();
        $this->register_taxonomies();
    }
    
    private function register_post_types() {
        if (!is_blog_installed() || post_type_exists('plugin_boilerplate_item')) {
            return;
        }
        
        register_post_type('plugin_boilerplate_item', array(
            'labels' => array(
                'name' => __('Items', 'plugin-boilerplate'),
                'singular_name' => __('Item', 'plugin-boilerplate'),
                'add_new' => __('Add Item', 'plugin-boilerplate'),
                'edit_item' => __('Edit Item', 'plugin-boilerplate'),
                'view_item' => __('View Item', 'plugin-boilerplate')
            ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => 'plugin-boilerplate',
            'supports' => array('title', 'editor', 'thumbnail'),
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'plugin-boilerplate-item')
        ));
    }
    
    private function register_taxonomies() {
        if (!is_blog_installed() || taxonomy_exists('plugin_boilerplate_category')) {
            return;
        }
        
        register_taxonomy('plugin_boilerplate_category', array('plugin_boilerplate_item'), array(
            'hierarchical' => true,
            'labels' => array(
                'name' => __('Categories', 'plugin-boilerplate'),
                'singular_name' => __('Category', 'plugin-boilerplate')
            ),
            'show_ui' => true,
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'plugin-boilerplate-category')
        ));
    }
    
    private function create_cron_jobs() {
        // Example: Daily cleanup job (commented out by default)
        // if (!wp_next_scheduled('plugin_boilerplate_daily_cleanup')) {
        //     wp_schedule_event(time(), 'daily', 'plugin_boilerplate_daily_cleanup');
        // }
    }
}

new EvolveWP_Core_Install();
