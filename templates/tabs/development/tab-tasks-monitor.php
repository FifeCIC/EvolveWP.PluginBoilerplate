<?php
/**
 * Plugin Boilerplate Development - Tasks Monitor
 *
 * @package Plugin Boilerplate/Admin/Development
 * @version 1.2.0
 */

if (!defined('ABSPATH')) exit;

class EvolveWP_Boilerplate_Admin_Development_Tasks_Monitor {
    
    public static function output() {
        if (!function_exists('as_get_scheduled_actions')) {
            echo '<div class="notice notice-warning"><p>' . esc_html__('Action Scheduler library not loaded.', 'plugin-boilerplate') . '</p></div>';;
            return;
        }

        if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['_wpnonce'] ?? '')), 'plugin_boilerplate_tasks_filter')) {
            $status = 'pending';
            $group = '';
        } else {
            $status = isset($_GET['status']) ? sanitize_text_field(wp_unslash($_GET['status'])) : 'pending';
            $group = isset($_GET['group']) ? sanitize_text_field(wp_unslash($_GET['group'])) : '';
        }
        
        ?>
        <div class="plugin-boilerplate-tasks-monitor">
            
            <?php self::output_filters($status, $group); ?>
            
            <?php self::output_stats(); ?>
            
            <?php self::output_tasks_table($status, $group); ?>
            
        </div>
        <?php
    }
    
    private static function output_filters($current_status, $current_group) {
        $statuses = array(
            'pending' => __('Pending', 'plugin-boilerplate'),
            'in-progress' => __('In Progress', 'plugin-boilerplate'),
            'complete' => __('Complete', 'plugin-boilerplate'),
            'failed' => __('Failed', 'plugin-boilerplate'),
            'canceled' => __('Canceled', 'plugin-boilerplate'),
        );
        
        ?>
        <div class="plugin-boilerplate-tasks-filters" style="margin: 20px 0; padding: 15px; background: #fff; border: 1px solid #ccd0d4;">
            <h3><?php esc_html_e('Filter Tasks', 'plugin-boilerplate'); ?></h3>
            
            <div style="display: flex; gap: 20px; align-items: center;">
                <div>
                    <label><strong><?php esc_html_e('Status:', 'plugin-boilerplate'); ?></strong></label>
                    <select id="task-status-filter" style="margin-left: 10px;">
                        <?php foreach ($statuses as $value => $label) : ?>
                            <option value="<?php echo esc_attr($value); ?>" <?php selected($current_status, $value); ?>>
                                <?php echo esc_html($label); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div>
                    <label><strong><?php esc_html_e('Group:', 'plugin-boilerplate'); ?></strong></label>
                    <input type="text" id="task-group-filter" value="<?php echo esc_attr($current_group); ?>" 
                           placeholder="<?php esc_attr_e('All groups', 'plugin-boilerplate'); ?>" style="margin-left: 10px;">
                </div>
                
                <button type="button" class="button button-primary" onclick=plugin-boilerplateFilterTasks()">
                    <?php esc_html_e('Apply Filters', 'plugin-boilerplate'); ?>
                </button>
                
                <button type="button" class="button" onclick=plugin-boilerplateResetFilters()">
                    <?php esc_html_e('Reset', 'plugin-boilerplate'); ?>
                </button>
            </div>
        </div>
        
        <script>
        function plugin-boilerplateFilterTasks() {
            var status = document.getElementById('task-status-filter').value;
            var group = document.getElementById('task-group-filter').value;
            var url = new URL(window.location.href);
            url.searchParams.set('status', status);
            if (group) {
                url.searchParams.set('group', group);
            } else {
                url.searchParams.delete('group');
            }
            window.location.href = url.toString();
        }
        
        function plugin-boilerplateResetFilters() {
            var url = new URL(window.location.href);
            url.searchParams.delete('status');
            url.searchParams.delete('group');
            window.location.href = url.toString();
        }
        </script>
        <?php
    }
    
    private static function output_stats() {
        $stats = array(
            'pending' => self::get_task_count('pending'),
            'in-progress' => self::get_task_count('in-progress'),
            'complete' => self::get_task_count('complete'),
            'failed' => self::get_task_count('failed'),
        );
        
        ?>
        <div class="plugin-boilerplate-tasks-stats" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px; margin: 20px 0;">
            
            <div style="background: #fff; padding: 20px; border-left: 4px solid #2271b1; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <div style="font-size: 32px; font-weight: bold; color: #2271b1;"><?php echo number_format($stats['pending']); ?></div>
                <div style="color: #646970; margin-top: 5px;"><?php esc_html_e('Pending', 'plugin-boilerplate'); ?></div>
            </div>
            
            <div style="background: #fff; padding: 20px; border-left: 4px solid #f0b849; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <div style="font-size: 32px; font-weight: bold; color: #f0b849;"><?php echo number_format($stats['in-progress']); ?></div>
                <div style="color: #646970; margin-top: 5px;"><?php esc_html_e('In Progress', 'plugin-boilerplate'); ?></div>
            </div>
            
            <div style="background: #fff; padding: 20px; border-left: 4px solid #00a32a; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <div style="font-size: 32px; font-weight: bold; color: #00a32a;"><?php echo number_format($stats['complete']); ?></div>
                <div style="color: #646970; margin-top: 5px;"><?php esc_html_e('Complete', 'plugin-boilerplate'); ?></div>
            </div>
            
            <div style="background: #fff; padding: 20px; border-left: 4px solid #d63638; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <div style="font-size: 32px; font-weight: bold; color: #d63638;"><?php echo number_format($stats['failed']); ?></div>
                <div style="color: #646970; margin-top: 5px;"><?php esc_html_e('Failed', 'plugin-boilerplate'); ?></div>
            </div>
            
        </div>
        <?php
    }
    
    private static function output_tasks_table($status, $group) {
        $args = array(
            'status' => $status,
            'per_page' => 50,
        );
        
        if (!empty($group)) {
            $args['group'] = $group;
        }
        
        $actions = as_get_scheduled_actions($args, 'OBJECT');
        
        ?>
        <div class="plugin-boilerplate-tasks-table" style="background: #fff; padding: 20px; border: 1px solid #ccd0d4;">
            <h3><?php
            /* translators: %s: Task status */
            printf(esc_html__('Tasks (%s)', 'plugin-boilerplate'), esc_html(ucfirst($status))); ?></h3>
            
            <?php if (empty($actions)) : ?>
                <p><?php esc_html_e('No tasks found.', 'plugin-boilerplate'); ?></p>
            <?php else : ?>
                <table class="wp-list-table widefat fixed striped">
                    <thead>
                        <tr>
                            <th><?php esc_html_e('Hook', 'plugin-boilerplate'); ?></th>
                            <th><?php esc_html_e('Status', 'plugin-boilerplate'); ?></th>
                            <th><?php esc_html_e('Group', 'plugin-boilerplate'); ?></th>
                            <th><?php esc_html_e('Arguments', 'plugin-boilerplate'); ?></th>
                            <th><?php esc_html_e('Scheduled', 'plugin-boilerplate'); ?></th>
                            <th><?php esc_html_e('Actions', 'plugin-boilerplate'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($actions as $action) : ?>
                            <tr>
                                <td><code><?php echo esc_html($action->get_hook()); ?></code></td>
                                <td><?php echo wp_kses_post(self::get_status_badge($action->get_status())); ?></td>
                                <td><?php echo esc_html($action->get_group()); ?></td>
                                <td>
                                    <?php 
                                    $args = $action->get_args();
                                    if (!empty($args)) {
                                        echo '<code style="font-size: 11px;">' . esc_html(json_encode($args)) . '</code>';
                                    } else {
                                        echo '—';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    $schedule = $action->get_schedule();
                                    if ($schedule) {
                                        $date = $schedule->get_date();
                                        if ($date) {
                                            echo esc_html($date->format('Y-m-d H:i:s'));
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo esc_url(admin_url('tools.php?page=action-scheduler&s=' . urlencode($action->get_hook()))); ?>" 
                                       class="button button-small">
                                        <?php esc_html_e('View Details', 'plugin-boilerplate'); ?>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <p style="margin-top: 15px;">
                    <a href="<?php echo esc_url(admin_url('tools.php?page=action-scheduler')); ?>" class="button button-primary">
                        <?php esc_html_e('View All in Action Scheduler', 'plugin-boilerplate'); ?>
                    </a>
                </p>
            <?php endif; ?>
        </div>
        <?php
    }
    
    private static function get_task_count($status) {
        $args = array(
            'status' => $status,
            'per_page' => -1,
        );
        
        $actions = as_get_scheduled_actions($args, 'ids');
        return count($actions);
    }
    
    private static function get_status_badge($status) {
        $colors = array(
            'pending' => '#2271b1',
            'in-progress' => '#f0b849',
            'complete' => '#00a32a',
            'failed' => '#d63638',
            'canceled' => '#646970',
        );
        
        $color = isset($colors[$status]) ? $colors[$status] : '#646970';
        
        return sprintf(
            '<span style="display: inline-block; padding: 3px 8px; background: %s; color: #fff; border-radius: 3px; font-size: 11px; font-weight: 600;">%s</span>',
            esc_attr($color),
            esc_html(ucfirst($status))
        );
    }
}
