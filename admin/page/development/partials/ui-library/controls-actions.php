<?php
/**
 * UI Library Controls and Actions Partial
 *
 * @package plugin-boilerplate/Admin/Views/Partials
 * @version 1.0.6
 */

defined('ABSPATH') || exit;
?>
<div class="plugin-boilerplate-ui-section">
    <h3><?php esc_html_e('Controls & Actions', 'plugin-boilerplate'); ?></h3>
    <p><?php esc_html_e('UI controls for user interactions, filtering, and action buttons.', 'plugin-boilerplate'); ?></p>
    
    <div class="controls-showcase">
        <!-- Action Buttons Group -->
        <div class="component-demo">
            <h4><?php esc_html_e('Action Button Groups', 'plugin-boilerplate'); ?></h4>
            <div class="control-panel">
                <div class="control-panel-header">
                    <h5><?php esc_html_e('Symbol Actions', 'plugin-boilerplate'); ?></h5>
                </div>
                <div class="control-panel-body">
                    <div class="control-group">
                        <button class="plugin-boilerplate-control-button plugin-boilerplate-control-primary">
                            <span class="control-icon dashicons dashicons-chart-line"></span>
                            <span class="control-text"><?php esc_html_e('Analyze', 'plugin-boilerplate'); ?></span>
                        </button>
                        <button class="plugin-boilerplate-control-button">
                            <span class="control-icon dashicons dashicons-portfolio"></span>
                            <span class="control-text"><?php esc_html_e('Add to Portfolio', 'plugin-boilerplate'); ?></span>
                        </button>
                        <button class="plugin-boilerplate-control-button">
                            <span class="control-icon dashicons dashicons-star-filled"></span>
                            <span class="control-text"><?php esc_html_e('Watchlist', 'plugin-boilerplate'); ?></span>
                        </button>
                        <button class="plugin-boilerplate-control-button plugin-boilerplate-control-danger">
                            <span class="control-icon dashicons dashicons-dismiss"></span>
                            <span class="control-text"><?php esc_html_e('Ignore', 'plugin-boilerplate'); ?></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Toggle Controls -->
        <div class="component-demo">
            <h4><?php esc_html_e('Toggle Controls', 'plugin-boilerplate'); ?></h4>
            <div class="control-panel">
                <div class="control-panel-header">
                    <h5><?php esc_html_e('View Options', 'plugin-boilerplate'); ?></h5>
                </div>
                <div class="control-panel-body">
                    <div class="control-toggle-group">
                        <button class="plugin-boilerplate-toggle-button active">
                            <span class="dashicons dashicons-grid-view"></span>
                            <span class="control-label"><?php esc_html_e('Grid', 'plugin-boilerplate'); ?></span>
                        </button>
                        <button class="plugin-boilerplate-toggle-button">
                            <span class="dashicons dashicons-list-view"></span>
                            <span class="control-label"><?php esc_html_e('List', 'plugin-boilerplate'); ?></span>
                        </button>
                        <button class="plugin-boilerplate-toggle-button">
                            <span class="dashicons dashicons-table-row-after"></span>
                            <span class="control-label"><?php esc_html_e('Table', 'plugin-boilerplate'); ?></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Action Bar -->
        <div class="component-demo">
            <h4><?php esc_html_e('Action Bar', 'plugin-boilerplate'); ?></h4>
            <div class="action-bar">
                <div class="action-bar-left">
                    <button class="plugin-boilerplate-action-button">
                        <span class="dashicons dashicons-plus"></span>
                        <?php esc_html_e('Add New', 'plugin-boilerplate'); ?>
                    </button>
                    <button class="plugin-boilerplate-action-button">
                        <span class="dashicons dashicons-edit"></span>
                        <?php esc_html_e('Edit', 'plugin-boilerplate'); ?>
                    </button>
                </div>
                <div class="action-bar-right">
                    <button class="plugin-boilerplate-action-button plugin-boilerplate-action-secondary">
                        <span class="dashicons dashicons-trash"></span>
                        <?php esc_html_e('Delete', 'plugin-boilerplate'); ?>
                    </button>
                    <div class="action-dropdown">
                        <button class="plugin-boilerplate-action-button plugin-boilerplate-action-dropdown">
                            <?php esc_html_e('More Actions', 'plugin-boilerplate'); ?>
                            <span class="dashicons dashicons-arrow-down-alt2"></span>
                        </button>
                        <div class="action-dropdown-content">
                            <a href="#" class="action-dropdown-item"><?php esc_html_e('Export', 'plugin-boilerplate'); ?></a>
                            <a href="#" class="action-dropdown-item"><?php esc_html_e('Duplicate', 'plugin-boilerplate'); ?></a>
                            <a href="#" class="action-dropdown-item"><?php esc_html_e('Share', 'plugin-boilerplate'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Control Panel -->
        <div class="component-demo">
            <h4><?php esc_html_e('Control Panel', 'plugin-boilerplate'); ?></h4>
            <div class="control-panel control-panel-expanded">
                <div class="control-panel-header">
                    <h5><?php esc_html_e('Trading Settings', 'plugin-boilerplate'); ?></h5>
                    <div class="control-panel-actions">
                        <button class="plugin-boilerplate-control-button plugin-boilerplate-control-small">
                            <span class="dashicons dashicons-admin-generic"></span>
                        </button>
                        <button class="plugin-boilerplate-control-button plugin-boilerplate-control-small plugin-boilerplate-control-toggle">
                            <span class="dashicons dashicons-arrow-up-alt2"></span>
                        </button>
                    </div>
                </div>
                <div class="control-panel-body">
                    <div class="control-row">
                        <label class="control-label"><?php esc_html_e('Execution Mode', 'plugin-boilerplate'); ?></label>
                        <div class="control-options">
                            <label class="control-radio">
                                <input type="radio" name="execution_mode" checked>
                                <span><?php esc_html_e('Manual', 'plugin-boilerplate'); ?></span>
                            </label>
                            <label class="control-radio">
                                <input type="radio" name="execution_mode">
                                <span><?php esc_html_e('Semi-Auto', 'plugin-boilerplate'); ?></span>
                            </label>
                            <label class="control-radio">
                                <input type="radio" name="execution_mode">
                                <span><?php esc_html_e('Automatic', 'plugin-boilerplate'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="control-row">
                        <label class="control-label"><?php esc_html_e('Risk Level', 'plugin-boilerplate'); ?></label>
                        <div class="control-slider">
                            <input type="range" min="1" max="10" value="5">
                            <span class="control-value">5</span>
                        </div>
                    </div>
                </div>
                <div class="control-panel-footer">
                    <button class="tp-button tp-button-small tp-button-secondary"><?php esc_html_e('Reset', 'plugin-boilerplate'); ?></button>
                    <button class="tp-button tp-button-small tp-button-primary"><?php esc_html_e('Apply', 'plugin-boilerplate'); ?></button>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    // Add inline script for controls functionality
    $plugin_boilerplate_controls_script = "
        jQuery(document).ready(function($) {
            // Toggle buttons
            $('.plugin-boilerplate-toggle-button').on('click', function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
            });
            
            // Action dropdown
            $('.plugin-boilerplate-action-dropdown').on('click', function(e) {
                e.preventDefault();
                $(this).next('.action-dropdown-content').toggleClass('show');
            });
            
            // Close dropdown when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.action-dropdown').length) {
                    $('.action-dropdown-content').removeClass('show');
                }
            });
            
            // Control panel toggle
            $('.plugin-boilerplate-control-toggle').on('click', function() {
                var panel = $(this).closest('.control-panel');
                panel.toggleClass('control-panel-expanded');
                
                // Toggle icon
                var icon = $(this).find('.dashicons');
                if (panel.hasClass('control-panel-expanded')) {
                    icon.removeClass('dashicons-arrow-down-alt2').addClass('dashicons-arrow-up-alt2');
                } else {
                    icon.removeClass('dashicons-arrow-up-alt2').addClass('dashicons-arrow-down-alt2');
                }
            });
            
            // Update slider value display
            $('.control-slider input[type=\"range\"]').on('input', function() {
                $(this).next('.control-value').text($(this).val());
            });
        });
    ";
    
    wp_add_inline_script('jquery', $plugin_boilerplate_controls_script);
    ?>

</div>
