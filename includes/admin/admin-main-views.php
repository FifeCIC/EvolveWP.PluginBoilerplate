<?php
/**
 * EvolveWP Core Admin Main Views
 *
 * @package EvolveWP Core/Admin
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class EvolveWP_Core_Admin_Main_Views {
    
    public static function output() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('EvolveWP Core Plugin', 'plugin-boilerplate'); ?></h1>
            
            <div class="plugin-boilerplate-main-dashboard">
                <p><?php esc_html_e('Welcome to EvolveWP Core - The AI-Powered WordPress Plugin Boilerplate', 'plugin-boilerplate'); ?></p>
                
                <div class="plugin-boilerplate-quick-links" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 30px;">
                    <div class="plugin-boilerplate-card" style="background: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 4px;">
                        <h2><?php esc_html_e('Development Tools', 'plugin-boilerplate'); ?></h2>
                        <p><?php esc_html_e('Access 10-tab developer dashboard with assets, debugging, and architecture tools.', 'plugin-boilerplate'); ?></p>
                        <a href="<?php echo esc_url(admin_url('admin.php?page=plugin-boilerplate-development')); ?>" class="button button-primary"><?php esc_html_e('Open Development', 'plugin-boilerplate'); ?></a>
                    </div>
                    
                    <div class="plugin-boilerplate-card" style="background: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 4px;">
                        <h2><?php esc_html_e('Settings', 'plugin-boilerplate'); ?></h2>
                        <p><?php esc_html_e('Configure plugin settings, API keys, and preferences.', 'plugin-boilerplate'); ?></p>
                        <a href="<?php echo esc_url(admin_url('options-general.php?page=plugin-boilerplate-settings')); ?>" class="button button-primary"><?php esc_html_e('Open Settings', 'plugin-boilerplate'); ?></a>
                    </div>
                    
                    <div class="plugin-boilerplate-card" style="background: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 4px;">
                        <h2><?php esc_html_e('Documentation', 'plugin-boilerplate'); ?></h2>
                        <p><?php esc_html_e('Read guides, API reference, and integration examples.', 'plugin-boilerplate'); ?></p>
                        <a href="https://github.com/ryanbayne/plugin-boilerplate" target="_blank" class="button"><?php esc_html_e('View Docs', 'plugin-boilerplate'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
