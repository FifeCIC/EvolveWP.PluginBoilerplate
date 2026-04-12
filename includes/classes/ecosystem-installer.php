<?php
/**
 * Ecosystem Plugin Installer
 * One-click installation of related plugins
 *
 * @package EvolveWP Core/Ecosystem
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class EvolveWP_Core_Ecosystem_Installer {
    
    private $available_plugins = array();
    
    public function __construct() {
        $this->define_available_plugins();
        add_action('admin_menu', array($this, 'add_installer_page'));
        add_action('wp_ajax_plugin_boilerplate_install_plugin', array($this, 'ajax_install_plugin'));
    }
    
    /**
     * Define available ecosystem plugins
     */
    private function define_available_plugins() {
        $this->available_plugins = apply_filters('plugin_boilerplate_ecosystem_available_plugins', array(
            'plugin-boilerplate' => array(
                'name' => 'plugin-boilerplate',
                'description' => 'Algorithmic stock analysis and trading decision support',
                'download_url' => 'https://github.com/yourusername/plugin-boilerplate/archive/main.zip',
                'required_by' => array(),
                'integrates_with' => array('plugin-boilerplate'),
            ),
            // Add more plugins here
        ));
    }
    
    /**
     * Add installer page
     */
    public function add_installer_page() {
        add_submenu_page(
            'plugin-boilerplate-settings',
            __('Install Ecosystem Plugins', 'plugin-boilerplate'),
            __('Install Plugins', 'plugin-boilerplate'),
            'install_plugins',
            'plugin-boilerplate-ecosystem-installer',
            array($this, 'render_installer_page')
        );
    }
    
    /**
     * Render installer page
     */
    public function render_installer_page() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('Ecosystem Plugin Installer', 'plugin-boilerplate'); ?></h1>
            <p><?php esc_html_e('Install related Ryan Bayne plugins with one click', 'plugin-boilerplate'); ?></p>
            
            <div class="ecosystem-plugins-grid">
                <?php foreach ($this->available_plugins as $slug => $plugin): ?>
                    <?php
                    $is_installed = $this->is_plugin_installed($slug);
                    $is_active = $this->is_plugin_active($slug);
                    ?>
                    <div class="plugin-card">
                        <div class="plugin-card-top">
                            <h3><?php echo esc_html($plugin['name']); ?></h3>
                            <p><?php echo esc_html($plugin['description']); ?></p>
                            
                            <?php if (!empty($plugin['integrates_with'])): ?>
                                <p class="plugin-integrations">
                                    <strong><?php esc_html_e('Integrates with:', 'plugin-boilerplate'); ?></strong>
                                    <?php echo esc_html(implode(', ', $plugin['integrates_with'])); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="plugin-card-bottom">
                            <?php if ($is_active): ?>
                                <span class="button button-disabled">
                                    <span class="dashicons dashicons-yes-alt"></span>
                                    <?php esc_html_e('Active', 'plugin-boilerplate'); ?>
                                </span>
                            <?php elseif ($is_installed): ?>
                                <a href="<?php echo esc_url(wp_nonce_url('plugins.php?action=activate&plugin=' . $slug, 'activate-plugin_' . $slug)); ?>" class="button button-primary">
                                    <?php esc_html_e('Activate', 'plugin-boilerplate'); ?>
                                </a>
                            <?php else: ?>
                                <button class="button button-primary install-plugin" 
                                        data-slug="<?php echo esc_attr($slug); ?>"
                                        data-name="<?php echo esc_attr($plugin['name']); ?>">
                                    <?php esc_html_e('Install Now', 'plugin-boilerplate'); ?>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
    
    /**
     * AJAX handler for plugin installation
     */
    public function ajax_install_plugin() {
        check_ajax_referer('plugin_boilerplate_install_plugin', 'nonce');
        
        if (!current_user_can('install_plugins')) {
            wp_send_json_error('Insufficient permissions');
        }
        
        if ( empty( $_POST['slug'] ) ) {
            wp_send_json_error( __( 'Plugin slug is required.', 'plugin-boilerplate' ) );
        }

        $slug = sanitize_text_field( wp_unslash( $_POST['slug'] ) );
        
        if (!isset($this->available_plugins[$slug])) {
            wp_send_json_error('Invalid plugin');
        }
        
        $plugin = $this->available_plugins[$slug];
        
        // Include required files
        require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
        require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/misc.php';
        
        // Install plugin
        $upgrader = new Plugin_Upgrader(new WP_Ajax_Upgrader_Skin());
        $result = $upgrader->install($plugin['download_url']);
        
        if (is_wp_error($result)) {
            wp_send_json_error($result->get_error_message());
        }
        
        wp_send_json_success();
    }
    
    /**
     * Check if plugin is installed
     */
    private function is_plugin_installed($slug) {
        $plugins = get_plugins();
        foreach ($plugins as $plugin_file => $plugin_data) {
            if (strpos($plugin_file, $slug . '/') === 0) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Check if plugin is active
     */
    private function is_plugin_active($slug) {
        $plugins = get_plugins();
        foreach ($plugins as $plugin_file => $plugin_data) {
            if (strpos($plugin_file, $slug . '/') === 0) {
                return is_plugin_active($plugin_file);
            }
        }
        return false;
    }
}

return new EvolveWP_Core_Ecosystem_Installer();
