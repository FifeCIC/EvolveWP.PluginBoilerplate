<?php
/**
 * UI Library Accordion Components Partial
 *
 * @package Plugin Boilerplate/Admin/Views/Partials
 * @version 1.0.0
 */

defined('ABSPATH') || exit;
?>
<div class="plugin-boilerplate-ui-section">
    <h3><?php esc_html_e('Accordion Components', 'plugin-boilerplate'); ?></h3>
    <p><?php esc_html_e('Collapsible content panels, expandable sections, tree-view components, and FAQ-style accordions for organizing information.', 'plugin-boilerplate'); ?></p>
    
    <div class="plugin-boilerplate-component-group">
        <!-- Basic Accordion -->
        <div class="component-demo">
            <h4><?php esc_html_e('Basic Accordion', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-accordion">
                <div class="plugin-boilerplate-accordion-item">
                    <div class="plugin-boilerplate-accordion-header">
                        <h4><?php esc_html_e('Feature Overview', 'plugin-boilerplate'); ?></h4>
                        <span class="plugin-boilerplate-accordion-icon dashicons dashicons-arrow-down-alt2"></span>
                    </div>
                    <div class="plugin-boilerplate-accordion-content">
                        <p><?php esc_html_e('This section contains detailed information about plugin features, including configuration options, usage examples, and best practices.', 'plugin-boilerplate'); ?></p>
                        <div class="plugin-boilerplate-grid plugin-boilerplate-grid-2">
                            <div class="plugin-boilerplate-card">
                                <h5><?php esc_html_e('Core Features', 'plugin-boilerplate'); ?></h5>
                                <ul>
                                    <li><?php esc_html_e('Custom post types', 'plugin-boilerplate'); ?></li>
                                    <li><?php esc_html_e('REST API endpoints', 'plugin-boilerplate'); ?></li>
                                    <li><?php esc_html_e('Settings framework', 'plugin-boilerplate'); ?></li>
                                </ul>
                            </div>
                            <div class="plugin-boilerplate-card">
                                <h5><?php esc_html_e('Advanced Features', 'plugin-boilerplate'); ?></h5>
                                <ul>
                                    <li><?php esc_html_e('Background processing', 'plugin-boilerplate'); ?></li>
                                    <li><?php esc_html_e('Logging system', 'plugin-boilerplate'); ?></li>
                                    <li><?php esc_html_e('Asset management', 'plugin-boilerplate'); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="plugin-boilerplate-accordion-item">
                    <div class="plugin-boilerplate-accordion-header">
                        <h4><?php esc_html_e('Configuration', 'plugin-boilerplate'); ?></h4>
                        <span class="plugin-boilerplate-accordion-icon dashicons dashicons-arrow-down-alt2"></span>
                    </div>
                    <div class="plugin-boilerplate-accordion-content">
                        <p><?php esc_html_e('Configuration options and settings for customizing plugin behavior.', 'plugin-boilerplate'); ?></p>
                        <div class="plugin-boilerplate-table-container">
                            <table class="plugin-boilerplate-table">
                                <thead>
                                    <tr>
                                        <th><?php esc_html_e('Setting', 'plugin-boilerplate'); ?></th>
                                        <th><?php esc_html_e('Value', 'plugin-boilerplate'); ?></th>
                                        <th><?php esc_html_e('Status', 'plugin-boilerplate'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php esc_html_e('Debug Mode', 'plugin-boilerplate'); ?></td>
                                        <td>Enabled</td>
                                        <td><span class="plugin-boilerplate-badge plugin-boilerplate-badge-success"><?php esc_html_e('Active', 'plugin-boilerplate'); ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><?php esc_html_e('Logging', 'plugin-boilerplate'); ?></td>
                                        <td>File + Database</td>
                                        <td><span class="plugin-boilerplate-badge plugin-boilerplate-badge-success"><?php esc_html_e('Active', 'plugin-boilerplate'); ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="plugin-boilerplate-accordion-item">
                    <div class="plugin-boilerplate-accordion-header">
                        <h4><?php esc_html_e('Performance', 'plugin-boilerplate'); ?></h4>
                        <span class="plugin-boilerplate-accordion-icon dashicons dashicons-arrow-down-alt2"></span>
                    </div>
                    <div class="plugin-boilerplate-accordion-content">
                        <p><?php esc_html_e('Performance metrics and optimization settings.', 'plugin-boilerplate'); ?></p>
                        <div class="media-progress-bar">
                            <div style="width: 85%;"><?php esc_html_e('85% Optimized', 'plugin-boilerplate'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    // Add interactive functionality
    $plugin_boilerplate_accordion_script = "
        jQuery(document).ready(function($) {
            $('.plugin-boilerplate-accordion-header').on('click', function() {
                var \$item = $(this).closest('.plugin-boilerplate-accordion-item');
                var \$content = \$item.find('.plugin-boilerplate-accordion-content').first();
                var \$icon = $(this).find('.plugin-boilerplate-accordion-icon');
                
                \$content.slideToggle(300);
                \$item.toggleClass('plugin-boilerplate-accordion-expanded');
                \$icon.toggleClass('dashicons-arrow-down-alt2 dashicons-arrow-up-alt2');
                
                \$item.siblings('.plugin-boilerplate-accordion-item').each(function() {
                    var \$siblingContent = $(this).find('.plugin-boilerplate-accordion-content').first();
                    var \$siblingIcon = $(this).find('.plugin-boilerplate-accordion-icon').first();
                    
                    if (\$siblingContent.is(':visible')) {
                        \$siblingContent.slideUp(300);
                        $(this).removeClass('plugin-boilerplate-accordion-expanded');
                        \$siblingIcon.removeClass('dashicons-arrow-up-alt2').addClass('dashicons-arrow-down-alt2');
                    }
                });
            });
        });
    ";
    
    wp_add_inline_script('jquery', $plugin_boilerplate_accordion_script);
    ?>
</div>
