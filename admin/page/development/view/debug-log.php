<?php
/**
 * EvolveWP Core Development - Debug Log Tab
 *
 * @package EvolveWP Core/Admin/Views
 */

if (!defined('ABSPATH')) {
    exit;
}

class EvolveWP_Core_Admin_Development_Debug_Log {
    public static function output() {
        $debug_file = WP_CONTENT_DIR . '/debug.log';
        $log_exists = file_exists($debug_file);
        ?>
        <div class="plugin-boilerplate-dev-section">
            <h2><?php esc_html_e('WordPress Debug Log', 'plugin-boilerplate'); ?></h2>
            
            <?php if (!$log_exists): ?>
                <div class="notice notice-info">
                    <p><?php esc_html_e('Debug log file does not exist. Enable WP_DEBUG_LOG in wp-config.php to create it.', 'plugin-boilerplate'); ?></p>
                </div>
            <?php else: ?>
                <p>
                    <strong><?php esc_html_e('Log File:', 'plugin-boilerplate'); ?></strong> 
                    <code><?php echo esc_html($debug_file); ?></code>
                </p>
                <p>
                    <strong><?php esc_html_e('File Size:', 'plugin-boilerplate'); ?></strong> 
                        <?php echo esc_html(size_format(filesize($debug_file))); ?>
                </p>
                
                <div style="margin: 20px 0;">
                    <a href="<?php echo esc_url(wp_nonce_url(add_query_arg('plugin_boilerplate_clear_log', '1'), 'plugin_boilerplate_clear_log_action')); ?>" 
                       class="button button-secondary"
                       onclick="return confirm('<?php esc_attr_e('Are you sure you want to clear the debug log?', 'plugin-boilerplate'); ?>');">
                        <?php esc_html_e('Clear Log', 'plugin-boilerplate'); ?>
                    </a>
                </div>

                <?php
                if (isset($_GET['plugin_boilerplate_clear_log']) && check_admin_referer('plugin_boilerplate_clear_log_action')) {
                    file_put_contents($debug_file, '');
                    echo '<div class="notice notice-success"><p>' . esc_html__('Debug log cleared.', 'plugin-boilerplate') . '</p></div>';
                }
                
                $log_content = file_get_contents($debug_file);
                $lines = explode("\n", $log_content);
                $last_lines = array_slice($lines, -100);
                ?>
                
                <h3><?php esc_html_e('Last 100 Lines', 'plugin-boilerplate'); ?></h3>
                <textarea readonly style="width: 100%; height: 400px; font-family: monospace; font-size: 12px;"><?php 
                    echo esc_textarea(implode("\n", $last_lines)); 
                ?></textarea>
            <?php endif; ?>
        </div>
        <?php
    }
}
