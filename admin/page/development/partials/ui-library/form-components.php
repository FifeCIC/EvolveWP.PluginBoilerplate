<?php
/**
 * UI Library Form Components Partial
 *
 * @package plugin-boilerplate/Admin/Views/Partials
 * @version 1.0.0
 */

defined('ABSPATH') || exit;
?>
<div class="plugin-boilerplate-ui-section">
    <h3><?php esc_html_e('Form Components', 'plugin-boilerplate'); ?></h3>
    <p><?php esc_html_e('Standard form elements and input controls for consistent user input handling.', 'plugin-boilerplate'); ?></p>

    <!-- Text Inputs -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Text Inputs', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-form-showcase">
            <div class="plugin-boilerplate-form-row">
                <label class="plugin-boilerplate-form-label" for="demo-text-input"><?php esc_html_e('Text Input', 'plugin-boilerplate'); ?></label>
                <input type="text" id="demo-text-input" class="plugin-boilerplate-form-input" placeholder="<?php esc_attr_e('Enter text...', 'plugin-boilerplate'); ?>">
            </div>
            <div class="plugin-boilerplate-form-row">
                <label class="plugin-boilerplate-form-label" for="demo-email-input"><?php esc_html_e('Email Input', 'plugin-boilerplate'); ?></label>
                <input type="email" id="demo-email-input" class="plugin-boilerplate-form-input" placeholder="<?php esc_attr_e('user@example.com', 'plugin-boilerplate'); ?>">
            </div>
            <div class="plugin-boilerplate-form-row">
                <label class="plugin-boilerplate-form-label" for="demo-password-input"><?php esc_html_e('Password Input', 'plugin-boilerplate'); ?></label>
                <input type="password" id="demo-password-input" class="plugin-boilerplate-form-input" placeholder="<?php esc_attr_e('Enter password...', 'plugin-boilerplate'); ?>">
            </div>
            <div class="plugin-boilerplate-form-row">
                <label class="plugin-boilerplate-form-label" for="demo-number-input"><?php esc_html_e('Number Input', 'plugin-boilerplate'); ?></label>
                <input type="number" id="demo-number-input" class="plugin-boilerplate-form-input plugin-boilerplate-form-input-number" min="0" max="100" value="50">
            </div>
        </div>
    </div>

    <!-- Textarea -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Textarea', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-form-showcase">
            <div class="plugin-boilerplate-form-row">
                <label class="plugin-boilerplate-form-label" for="demo-textarea"><?php esc_html_e('Description', 'plugin-boilerplate'); ?></label>
                <textarea id="demo-textarea" class="plugin-boilerplate-form-textarea" rows="4" placeholder="<?php esc_attr_e('Enter detailed description...', 'plugin-boilerplate'); ?>"></textarea>
            </div>
        </div>
    </div>

    <!-- Select Dropdowns -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Select Dropdowns', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-form-showcase">
            <div class="plugin-boilerplate-form-row">
                <label class="plugin-boilerplate-form-label" for="demo-select"><?php esc_html_e('Single Select', 'plugin-boilerplate'); ?></label>
                <select id="demo-select" class="plugin-boilerplate-form-select">
                    <option value=""><?php esc_html_e('Choose option...', 'plugin-boilerplate'); ?></option>
                    <option value="option1"><?php esc_html_e('Option 1', 'plugin-boilerplate'); ?></option>
                    <option value="option2"><?php esc_html_e('Option 2', 'plugin-boilerplate'); ?></option>
                    <option value="option3"><?php esc_html_e('Option 3', 'plugin-boilerplate'); ?></option>
                </select>
            </div>
            <div class="plugin-boilerplate-form-row">
                <label class="plugin-boilerplate-form-label" for="demo-multiselect"><?php esc_html_e('Multi Select', 'plugin-boilerplate'); ?></label>
                <select id="demo-multiselect" class="plugin-boilerplate-form-select plugin-boilerplate-form-select-multiple" multiple size="4">
                    <option value="apple"><?php esc_html_e('Apple', 'plugin-boilerplate'); ?></option>
                    <option value="banana" selected><?php esc_html_e('Banana', 'plugin-boilerplate'); ?></option>
                    <option value="cherry"><?php esc_html_e('Cherry', 'plugin-boilerplate'); ?></option>
                    <option value="date" selected><?php esc_html_e('Date', 'plugin-boilerplate'); ?></option>
                </select>
            </div>
        </div>
    </div>

    <!-- Checkbox and Radio Groups -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Checkbox and Radio Groups', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-form-showcase">
            <div class="plugin-boilerplate-form-row">
                <fieldset class="plugin-boilerplate-form-fieldset">
                    <legend class="plugin-boilerplate-form-legend"><?php esc_html_e('Checkbox Group', 'plugin-boilerplate'); ?></legend>
                    <div class="plugin-boilerplate-form-checkbox-group">
                        <label class="plugin-boilerplate-form-checkbox-label">
                            <input type="checkbox" name="demo-checkbox[]" value="option1" checked class="plugin-boilerplate-form-checkbox">
                            <span class="plugin-boilerplate-form-checkbox-text"><?php esc_html_e('Option 1', 'plugin-boilerplate'); ?></span>
                        </label>
                        <label class="plugin-boilerplate-form-checkbox-label">
                            <input type="checkbox" name="demo-checkbox[]" value="option2" class="plugin-boilerplate-form-checkbox">
                            <span class="plugin-boilerplate-form-checkbox-text"><?php esc_html_e('Option 2', 'plugin-boilerplate'); ?></span>
                        </label>
                        <label class="plugin-boilerplate-form-checkbox-label">
                            <input type="checkbox" name="demo-checkbox[]" value="option3" checked class="plugin-boilerplate-form-checkbox">
                            <span class="plugin-boilerplate-form-checkbox-text"><?php esc_html_e('Option 3', 'plugin-boilerplate'); ?></span>
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="plugin-boilerplate-form-row">
                <fieldset class="plugin-boilerplate-form-fieldset">
                    <legend class="plugin-boilerplate-form-legend"><?php esc_html_e('Radio Group', 'plugin-boilerplate'); ?></legend>
                    <div class="plugin-boilerplate-form-radio-group">
                        <label class="plugin-boilerplate-form-radio-label">
                            <input type="radio" name="demo-radio" value="small" checked class="plugin-boilerplate-form-radio">
                            <span class="plugin-boilerplate-form-radio-text"><?php esc_html_e('Small', 'plugin-boilerplate'); ?></span>
                        </label>
                        <label class="plugin-boilerplate-form-radio-label">
                            <input type="radio" name="demo-radio" value="medium" class="plugin-boilerplate-form-radio">
                            <span class="plugin-boilerplate-form-radio-text"><?php esc_html_e('Medium', 'plugin-boilerplate'); ?></span>
                        </label>
                        <label class="plugin-boilerplate-form-radio-label">
                            <input type="radio" name="demo-radio" value="large" class="plugin-boilerplate-form-radio">
                            <span class="plugin-boilerplate-form-radio-text"><?php esc_html_e('Large', 'plugin-boilerplate'); ?></span>
                        </label>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>

    <!-- Form Validation States -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Validation States', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-form-showcase">
            <div class="plugin-boilerplate-form-row">
                <label class="plugin-boilerplate-form-label" for="demo-success-input"><?php esc_html_e('Success State', 'plugin-boilerplate'); ?></label>
                <input type="text" id="demo-success-input" class="plugin-boilerplate-form-input plugin-boilerplate-form-input-success" value="<?php esc_attr_e('Valid input', 'plugin-boilerplate'); ?>">
                <div class="plugin-boilerplate-form-feedback plugin-boilerplate-form-feedback-success">
                    <span class="dashicons dashicons-yes-alt"></span>
                    <?php esc_html_e('This field is valid', 'plugin-boilerplate'); ?>
                </div>
            </div>
            <div class="plugin-boilerplate-form-row">
                <label class="plugin-boilerplate-form-label" for="demo-error-input"><?php esc_html_e('Error State', 'plugin-boilerplate'); ?></label>
                <input type="text" id="demo-error-input" class="plugin-boilerplate-form-input plugin-boilerplate-form-input-error" value="<?php esc_attr_e('Invalid input', 'plugin-boilerplate'); ?>">
                <div class="plugin-boilerplate-form-feedback plugin-boilerplate-form-feedback-error">
                    <span class="dashicons dashicons-dismiss"></span>
                    <?php esc_html_e('This field has an error', 'plugin-boilerplate'); ?>
                </div>
            </div>
            <div class="plugin-boilerplate-form-row">
                <label class="plugin-boilerplate-form-label" for="demo-warning-input"><?php esc_html_e('Warning State', 'plugin-boilerplate'); ?></label>
                <input type="text" id="demo-warning-input" class="plugin-boilerplate-form-input plugin-boilerplate-form-input-warning" value="<?php esc_attr_e('Warning input', 'plugin-boilerplate'); ?>">
                <div class="plugin-boilerplate-form-feedback plugin-boilerplate-form-feedback-warning">
                    <span class="dashicons dashicons-warning"></span>
                    <?php esc_html_e('This field has a warning', 'plugin-boilerplate'); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Input -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Search Input', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-form-showcase">
            <div class="plugin-boilerplate-form-row">
                <label class="plugin-boilerplate-form-label" for="demo-search-input"><?php esc_html_e('Search', 'plugin-boilerplate'); ?></label>
                <div class="plugin-boilerplate-search-wrapper">
                    <input type="search" id="demo-search-input" class="plugin-boilerplate-form-input plugin-boilerplate-search-input" placeholder="<?php esc_attr_e('Search...', 'plugin-boilerplate'); ?>">
                    <span class="plugin-boilerplate-search-icon dashicons dashicons-search"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- File Upload -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('File Upload', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-form-showcase">
            <div class="plugin-boilerplate-form-row">
                <label class="plugin-boilerplate-form-label" for="demo-file-input"><?php esc_html_e('File Upload', 'plugin-boilerplate'); ?></label>
                <input type="file" id="demo-file-input" class="plugin-boilerplate-form-file">
                <p class="plugin-boilerplate-form-description"><?php esc_html_e('Choose a file to upload (max 2MB)', 'plugin-boilerplate'); ?></p>
            </div>
        </div>
    </div>

    <!-- Form Layouts -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Form Layouts', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-form-showcase">
            <!-- Horizontal Layout -->
            <div class="plugin-boilerplate-form-layout plugin-boilerplate-form-layout-horizontal">
                <h5><?php esc_html_e('Horizontal Layout', 'plugin-boilerplate'); ?></h5>
                <div class="plugin-boilerplate-form-row plugin-boilerplate-form-row-horizontal">
                    <label class="plugin-boilerplate-form-label plugin-boilerplate-form-label-horizontal" for="demo-horizontal-1"><?php esc_html_e('First Name:', 'plugin-boilerplate'); ?></label>
                    <input type="text" id="demo-horizontal-1" class="plugin-boilerplate-form-input">
                </div>
                <div class="plugin-boilerplate-form-row plugin-boilerplate-form-row-horizontal">
                    <label class="plugin-boilerplate-form-label plugin-boilerplate-form-label-horizontal" for="demo-horizontal-2"><?php esc_html_e('Last Name:', 'plugin-boilerplate'); ?></label>
                    <input type="text" id="demo-horizontal-2" class="plugin-boilerplate-form-input">
                </div>
            </div>

            <!-- Inline Layout -->
            <div class="plugin-boilerplate-form-layout plugin-boilerplate-form-layout-inline">
                <h5><?php esc_html_e('Inline Layout', 'plugin-boilerplate'); ?></h5>
                <div class="plugin-boilerplate-form-row plugin-boilerplate-form-row-inline">
                    <label class="plugin-boilerplate-form-label plugin-boilerplate-form-label-inline" for="demo-inline-1"><?php esc_html_e('City:', 'plugin-boilerplate'); ?></label>
                    <input type="text" id="demo-inline-1" class="plugin-boilerplate-form-input plugin-boilerplate-form-input-inline">
                    <label class="plugin-boilerplate-form-label plugin-boilerplate-form-label-inline" for="demo-inline-2"><?php esc_html_e('State:', 'plugin-boilerplate'); ?></label>
                    <select id="demo-inline-2" class="plugin-boilerplate-form-select plugin-boilerplate-form-select-inline">
                        <option value=""><?php esc_html_e('Select...', 'plugin-boilerplate'); ?></option>
                        <option value="ca"><?php esc_html_e('California', 'plugin-boilerplate'); ?></option>
                        <option value="ny"><?php esc_html_e('New York', 'plugin-boilerplate'); ?></option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Simple Contact Form -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Simple Contact Form', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-form-showcase">
            <form method="post" action="" class="plugin-boilerplate-demo-form">
                <?php wp_nonce_field('plugin_boilerplate_ui_contact_form'); ?>
                <input type="hidden" name="plugin_boilerplate_form_action" value="contact_form">
                
                <div class="plugin-boilerplate-form-row">
                    <label class="plugin-boilerplate-form-label" for="contact-name"><?php esc_html_e('Name *', 'plugin-boilerplate'); ?></label>
                    <input type="text" id="contact-name" name="contact_name" class="plugin-boilerplate-form-input" required>
                </div>
                <div class="plugin-boilerplate-form-row">
                    <label class="plugin-boilerplate-form-label" for="contact-email"><?php esc_html_e('Email *', 'plugin-boilerplate'); ?></label>
                    <input type="email" id="contact-email" name="contact_email" class="plugin-boilerplate-form-input" required>
                </div>
                <div class="plugin-boilerplate-form-row">
                    <label class="plugin-boilerplate-form-label" for="contact-message"><?php esc_html_e('Message *', 'plugin-boilerplate'); ?></label>
                    <textarea id="contact-message" name="contact_message" class="plugin-boilerplate-form-textarea" rows="4" required></textarea>
                </div>
                <div class="plugin-boilerplate-form-actions">
                    <button type="submit" class="tp-button tp-button-primary"><?php esc_html_e('Send Message', 'plugin-boilerplate'); ?></button>
                </div>
            </form>
        </div>
    </div>

    <!-- Trading Settings Form -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Trading Settings Form', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-form-showcase">
            <form method="post" action="" class="plugin-boilerplate-demo-form">
                <?php wp_nonce_field('plugin_boilerplate_ui_trading_settings'); ?>
                <input type="hidden" name="plugin_boilerplate_form_action" value="trading_settings">
                
                <div class="plugin-boilerplate-form-row">
                    <label class="plugin-boilerplate-form-label" for="risk-level"><?php esc_html_e('Risk Level', 'plugin-boilerplate'); ?></label>
                    <select id="risk-level" name="risk_level" class="plugin-boilerplate-form-select">
                        <option value="low"><?php esc_html_e('Low Risk', 'plugin-boilerplate'); ?></option>
                        <option value="medium" selected><?php esc_html_e('Medium Risk', 'plugin-boilerplate'); ?></option>
                        <option value="high"><?php esc_html_e('High Risk', 'plugin-boilerplate'); ?></option>
                    </select>
                </div>
                <div class="plugin-boilerplate-form-row">
                    <label class="plugin-boilerplate-form-label" for="max-investment"><?php esc_html_e('Max Investment ($)', 'plugin-boilerplate'); ?></label>
                    <input type="number" id="max-investment" name="max_investment" class="plugin-boilerplate-form-input" min="100" max="100000" value="5000">
                </div>
                <div class="plugin-boilerplate-form-row">
                    <fieldset class="plugin-boilerplate-form-fieldset">
                        <legend class="plugin-boilerplate-form-legend"><?php esc_html_e('Trading Preferences', 'plugin-boilerplate'); ?></legend>
                        <div class="plugin-boilerplate-form-checkbox-group">
                            <label class="plugin-boilerplate-form-checkbox-label">
                                <input type="checkbox" name="preferences[]" value="day_trading" class="plugin-boilerplate-form-checkbox">
                                <span class="plugin-boilerplate-form-checkbox-text"><?php esc_html_e('Day Trading', 'plugin-boilerplate'); ?></span>
                            </label>
                            <label class="plugin-boilerplate-form-checkbox-label">
                                <input type="checkbox" name="preferences[]" value="swing_trading" class="plugin-boilerplate-form-checkbox" checked>
                                <span class="plugin-boilerplate-form-checkbox-text"><?php esc_html_e('Swing Trading', 'plugin-boilerplate'); ?></span>
                            </label>
                            <label class="plugin-boilerplate-form-checkbox-label">
                                <input type="checkbox" name="preferences[]" value="long_term" class="plugin-boilerplate-form-checkbox">
                                <span class="plugin-boilerplate-form-checkbox-text"><?php esc_html_e('Long-term Investment', 'plugin-boilerplate'); ?></span>
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="plugin-boilerplate-form-actions">
                    <button type="submit" class="tp-button tp-button-primary"><?php esc_html_e('Save Settings', 'plugin-boilerplate'); ?></button>
                    <button type="reset" class="tp-button tp-button-secondary"><?php esc_html_e('Reset', 'plugin-boilerplate'); ?></button>
                </div>
            </form>
        </div>
    </div>

    <!-- Ajax Validation Form -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Ajax Validation Form', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-form-showcase">
            <form id="ajax-validation-form" class="plugin-boilerplate-demo-form">
                <?php wp_nonce_field('plugin_boilerplate_ui_ajax_validation', 'ajax_nonce'); ?>
                
                <div class="plugin-boilerplate-form-row">
                    <label class="plugin-boilerplate-form-label" for="username"><?php esc_html_e('Username *', 'plugin-boilerplate'); ?></label>
                    <input type="text" id="username" name="username" class="plugin-boilerplate-form-input" required>
                    <div id="username-feedback" class="plugin-boilerplate-form-feedback" style="display:none;"></div>
                </div>
                <div class="plugin-boilerplate-form-row">
                    <label class="plugin-boilerplate-form-label" for="symbol-check"><?php esc_html_e('Stock Symbol *', 'plugin-boilerplate'); ?></label>
                    <input type="text" id="symbol-check" name="symbol" class="plugin-boilerplate-form-input" placeholder="AAPL" required>
                    <div id="symbol-feedback" class="plugin-boilerplate-form-feedback" style="display:none;"></div>
                </div>
                <div class="plugin-boilerplate-form-actions">
                    <button type="submit" class="tp-button tp-button-primary" id="ajax-submit-btn"><?php esc_html_e('Validate & Submit', 'plugin-boilerplate'); ?></button>
                </div>
            </form>
        </div>
    </div>

    <script>
    jQuery(document).ready(function($) {
        // Username validation
        $('#username').on('blur', function() {
            var username = $(this).val();
            if (username.length < 3) return;
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'plugin_boilerplate_validate_username',
                    username: username,
                    nonce: $('#ajax_nonce').val()
                },
                success: function(response) {
                    var feedback = $('#username-feedback');
                    feedback.show();
                    
                    if (response.success) {
                        feedback.removeClass('plugin-boilerplate-form-feedback-error')
                               .addClass('plugin-boilerplate-form-feedback-success')
                               .html('<span class="dashicons dashicons-yes-alt"></span>' + response.data.message);
                        $('#username').removeClass('plugin-boilerplate-form-input-error')
                                     .addClass('plugin-boilerplate-form-input-success');
                    } else {
                        feedback.removeClass('plugin-boilerplate-form-feedback-success')
                               .addClass('plugin-boilerplate-form-feedback-error')
                               .html('<span class="dashicons dashicons-dismiss"></span>' + response.data.message);
                        $('#username').removeClass('plugin-boilerplate-form-input-success')
                                     .addClass('plugin-boilerplate-form-input-error');
                    }
                }
            });
        });
        
        // Symbol validation
        $('#symbol-check').on('blur', function() {
            var symbol = $(this).val().toUpperCase();
            if (symbol.length < 1) return;
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'plugin_boilerplate_validate_symbol',
                    symbol: symbol,
                    nonce: $('#ajax_nonce').val()
                },
                success: function(response) {
                    var feedback = $('#symbol-feedback');
                    feedback.show();
                    
                    if (response.success) {
                        feedback.removeClass('plugin-boilerplate-form-feedback-error')
                               .addClass('plugin-boilerplate-form-feedback-success')
                               .html('<span class="dashicons dashicons-yes-alt"></span>' + response.data.message);
                        $('#symbol-check').removeClass('plugin-boilerplate-form-input-error')
                                         .addClass('plugin-boilerplate-form-input-success');
                    } else {
                        feedback.removeClass('plugin-boilerplate-form-feedback-success')
                               .addClass('plugin-boilerplate-form-feedback-error')
                               .html('<span class="dashicons dashicons-dismiss"></span>' + response.data.message);
                        $('#symbol-check').removeClass('plugin-boilerplate-form-input-success')
                                         .addClass('plugin-boilerplate-form-input-error');
                    }
                }
            });
        });
        
        // Form submission
        $('#ajax-validation-form').on('submit', function(e) {
            e.preventDefault();
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'plugin_boilerplate_submit_ajax_form',
                    username: $('#username').val(),
                    symbol: $('#symbol-check').val(),
                    nonce: $('#ajax_nonce').val()
                },
                success: function(response) {
                    if (response.success) {
                        alert('Form submitted successfully: ' + response.data.message);
                    } else {
                        alert('Error: ' + response.data.message);
                    }
                }
            });
        });
    });
    </script>
</div>
