<?php
/**
 * UI Library Modal Components Partial
 *
 * @package plugin-boilerplate/Admin/Views/Partials
 * @version 1.0.6
 */

defined('ABSPATH') || exit;
?>
<div class="plugin-boilerplate-ui-section">
    <h3><?php esc_html_e('Modal Components', 'plugin-boilerplate'); ?></h3>
    <p><?php esc_html_e('Dialog boxes or pop-up windows that are displayed on top of the current page.', 'plugin-boilerplate'); ?></p>

    <div class="plugin-boilerplate-component-group">
        <!-- Basic Modal Demo -->
        <div class="component-demo">
            <h4><?php esc_html_e('Basic Modal', 'plugin-boilerplate'); ?></h4>
            <button class="tp-button tp-button-primary" id="open-demo-modal"><?php esc_html_e('Open Modal', 'plugin-boilerplate'); ?></button>

            <!-- Modal Structure (hidden by default) -->
            <div id="ui-library-demo-modal" class="plugin-boilerplate-modal" style="display:none;">
                <div class="plugin-boilerplate-modal-content">
                    <div class="plugin-boilerplate-modal-header">
                        <h2><?php esc_html_e('Sample Modal Title', 'plugin-boilerplate'); ?></h2>
                        <button class="plugin-boilerplate-modal-close" aria-label="<?php esc_attr_e('Close modal', 'plugin-boilerplate'); ?>">&times;</button>
                    </div>
                    <div class="plugin-boilerplate-modal-body">
                        <p><?php esc_html_e('This is the content of the modal. You can put any HTML here, including forms, text, or other components.', 'plugin-boilerplate'); ?></p>
                        <p><?php esc_html_e('Modal dialogs are useful for displaying additional information, forms, or confirmation messages without navigating away from the current page.', 'plugin-boilerplate'); ?></p>
                    </div>
                    <div class="plugin-boilerplate-modal-footer">
                        <button class="tp-button tp-button-secondary close-demo-modal"><?php esc_html_e('Cancel', 'plugin-boilerplate'); ?></button>
                        <button class="tp-button tp-button-primary"><?php esc_html_e('Save Changes', 'plugin-boilerplate'); ?></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Task Detail Modal Demo -->
        <div class="component-demo">
            <h4><?php esc_html_e('Task Detail Modal', 'plugin-boilerplate'); ?></h4>
            <button class="tp-button tp-button-secondary" id="open-task-modal"><?php esc_html_e('View Task Details', 'plugin-boilerplate'); ?></button>

            <!-- Task Detail Modal Structure -->
            <div id="ui-library-task-modal" class="plugin-boilerplate-modal" style="display:none;">
                <div class="plugin-boilerplate-modal-content">
                    <div class="plugin-boilerplate-modal-header">
                        <h2><?php esc_html_e('Task Details', 'plugin-boilerplate'); ?></h2>
                        <button class="plugin-boilerplate-modal-close" aria-label="<?php esc_attr_e('Close modal', 'plugin-boilerplate'); ?>">&times;</button>
                    </div>
                    <div class="plugin-boilerplate-modal-body">
                        <div class="plugin-boilerplate-task-detail-header">
                            <h3 class="plugin-boilerplate-task-detail-title"><?php esc_html_e('Analyze AAPL Stock Performance', 'plugin-boilerplate'); ?></h3>
                        </div>
                        
                        <div class="plugin-boilerplate-task-detail-meta">
                            <div class="plugin-boilerplate-task-detail-meta-item">
                                <span class="plugin-boilerplate-task-detail-meta-label"><?php esc_html_e('Status:', 'plugin-boilerplate'); ?></span>
                                <span class="status-active"><?php esc_html_e('Active', 'plugin-boilerplate'); ?></span>
                            </div>
                            <div class="plugin-boilerplate-task-detail-meta-item">
                                <span class="plugin-boilerplate-task-detail-meta-label"><?php esc_html_e('Priority:', 'plugin-boilerplate'); ?></span>
                                <span class="priority-high"><?php esc_html_e('High', 'plugin-boilerplate'); ?></span>
                            </div>
                            <div class="plugin-boilerplate-task-detail-meta-item">
                                <span class="plugin-boilerplate-task-detail-meta-label"><?php esc_html_e('Created:', 'plugin-boilerplate'); ?></span>
                                <span><?php echo esc_html( gmdate( 'Y-m-d H:i' ) ); ?></span>
                            </div>
                        </div>

                        <div class="plugin-boilerplate-task-description">
                            <h4><?php esc_html_e('Description', 'plugin-boilerplate'); ?></h4>
                            <p><?php esc_html_e('Complete technical analysis of Apple Inc. (AAPL) stock performance over the last quarter. Include price movements, volume analysis, and comparison with sector averages.', 'plugin-boilerplate'); ?></p>
                        </div>

                        <div class="plugin-boilerplate-task-attachments">
                            <h4><?php esc_html_e('Attachments', 'plugin-boilerplate'); ?></h4>
                            <ul>
                                <li><span class="dashicons dashicons-media-spreadsheet"></span> AAPL_Q3_Data.xlsx</li>
                                <li><span class="dashicons dashicons-chart-line"></span> Technical_Indicators.pdf</li>
                            </ul>
                        </div>
                    </div>
                    <div class="plugin-boilerplate-modal-footer">
                        <button class="tp-button tp-button-secondary close-task-modal"><?php esc_html_e('Close', 'plugin-boilerplate'); ?></button>
                        <button class="tp-button tp-button-primary"><?php esc_html_e('Edit Task', 'plugin-boilerplate'); ?></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading Modal Demo -->
        <div class="component-demo">
            <h4><?php esc_html_e('Loading Modal', 'plugin-boilerplate'); ?></h4>
            <button class="tp-button tp-button-secondary" id="open-loading-modal"><?php esc_html_e('Show Loading', 'plugin-boilerplate'); ?></button>

            <!-- Loading Modal Structure -->
            <div id="ui-library-loading-modal" class="plugin-boilerplate-modal" style="display:none;">
                <div class="plugin-boilerplate-modal-content">
                    <div class="plugin-boilerplate-modal-header">
                        <h2><?php esc_html_e('Processing Request', 'plugin-boilerplate'); ?></h2>
                    </div>
                    <div class="plugin-boilerplate-modal-body">
                        <div class="plugin-boilerplate-loading-spinner">
                            <span class="spinner is-active"></span>
                            <p><?php esc_html_e('Please wait while we process your request...', 'plugin-boilerplate'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Confirmation Modal Demo -->
        <div class="component-demo">
            <h4><?php esc_html_e('Confirmation Modal', 'plugin-boilerplate'); ?></h4>
            <button class="tp-button tp-button-danger" id="open-confirm-modal"><?php esc_html_e('Delete Item', 'plugin-boilerplate'); ?></button>

            <!-- Confirmation Modal Structure -->
            <div id="ui-library-confirm-modal" class="plugin-boilerplate-modal" style="display:none;">
                <div class="plugin-boilerplate-modal-content">
                    <div class="plugin-boilerplate-modal-header">
                        <h2><?php esc_html_e('Confirm Deletion', 'plugin-boilerplate'); ?></h2>
                        <button class="plugin-boilerplate-modal-close" aria-label="<?php esc_attr_e('Close modal', 'plugin-boilerplate'); ?>">&times;</button>
                    </div>
                    <div class="plugin-boilerplate-modal-body">
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <span class="dashicons dashicons-warning" style="color: #d63638; font-size: 32px; width: 32px; height: 32px;"></span>
                            <div>
                                <p style="margin: 0; font-weight: 600;"><?php esc_html_e('Are you sure you want to delete this item?', 'plugin-boilerplate'); ?></p>
                                <p style="margin: 5px 0 0 0; color: #646970;"><?php esc_html_e('This action cannot be undone.', 'plugin-boilerplate'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="plugin-boilerplate-modal-footer">
                        <button class="tp-button tp-button-secondary close-confirm-modal"><?php esc_html_e('Cancel', 'plugin-boilerplate'); ?></button>
                        <button class="tp-button tp-button-danger"><?php esc_html_e('Delete', 'plugin-boilerplate'); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Add inline script for modal functionality using existing patterns
    $plugin_boilerplate_modal_script = "
        jQuery(document).ready(function($) {
            // Basic modal functionality
            $('#open-demo-modal').on('click', function() {
                $('#ui-library-demo-modal').show().addClass('open');
            });

            $('#open-task-modal').on('click', function() {
                $('#ui-library-task-modal').show().addClass('open');
            });

            $('#open-loading-modal').on('click', function() {
                var modal = $('#ui-library-loading-modal');
                modal.show().addClass('open');
                
                // Auto close loading modal after 3 seconds
                setTimeout(function() {
                    modal.hide().removeClass('open');
                }, 3000);
            });

            $('#open-confirm-modal').on('click', function() {
                $('#ui-library-confirm-modal').show().addClass('open');
            });

            // Close modal functionality
            $('.plugin-boilerplate-modal-close, .close-demo-modal, .close-task-modal, .close-confirm-modal').on('click', function() {
                $(this).closest('.plugin-boilerplate-modal').hide().removeClass('open');
            });

            // Close modal by clicking outside
            $('.plugin-boilerplate-modal').on('click', function(event) {
                if ($(event.target).is('.plugin-boilerplate-modal')) {
                    $(this).hide().removeClass('open');
                }
            });

            // Escape key to close modal
            $(document).on('keydown', function(event) {
                if (event.keyCode === 27) { // ESC key
                    $('.plugin-boilerplate-modal:visible').hide().removeClass('open');
                }
            });
        });
    ";

    wp_add_inline_script('jquery', $plugin_boilerplate_modal_script);
    ?>
</div>
