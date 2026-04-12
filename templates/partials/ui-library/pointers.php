<?php
/**
 * UI Library Pointers Partial
 *
 * @package plugin-boilerplate/Admin/Views/Partials
 * @version 1.0.0
 */

defined('ABSPATH') || exit;
?>
<div class="plugin-boilerplate-ui-section">
    <h3><?php esc_html_e('WordPress Pointers', 'plugin-boilerplate'); ?></h3>
    <p><?php esc_html_e('WordPress core pointer system for contextual help and guidance using plugin-boilerplate pointer classes.', 'plugin-boilerplate'); ?></p>
    
    <div class="plugin-boilerplate-component-group">
        <!-- Left Header Pointer Demo -->
        <div class="component-demo">
            <h4><?php esc_html_e('Left Header Pointer', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-component-showcase">
                <div style="display: flex; gap: 20px; align-items: flex-start;">
                    <div style="flex: 1; background: #f9f9f9; padding: 20px; border: 1px solid #ddd;">
                        <p><?php esc_html_e('Left content area', 'plugin-boilerplate'); ?></p>
                    </div>
                    <div class="test-pointer-container" style="flex: 1; background: #fff; padding: 20px; border: 1px solid #ddd; position: relative;">
                        <h3><?php esc_html_e('Test Header', 'plugin-boilerplate'); ?></h3>
                        <p><?php esc_html_e('This container simulates the directive configuration area.', 'plugin-boilerplate'); ?></p>
                        <button class="button test-pointer-trigger"><?php esc_html_e('Show Pointer', 'plugin-boilerplate'); ?></button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Pointer Positioning Test -->
        <div class="component-demo">
            <h4><?php esc_html_e('Pointer Positioning', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-component-showcase">
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin: 20px 0;">
                    <div class="pointer-test-box" data-position="left" style="background: #f0f0f0; padding: 15px; text-align: center; border: 1px solid #ccc;">
                        <h4><?php esc_html_e('Left Position', 'plugin-boilerplate'); ?></h4>
                        <button class="button test-position-pointer"><?php esc_html_e('Test Left', 'plugin-boilerplate'); ?></button>
                    </div>
                    <div class="pointer-test-box" data-position="right" style="background: #f0f0f0; padding: 15px; text-align: center; border: 1px solid #ccc;">
                        <h4><?php esc_html_e('Right Position', 'plugin-boilerplate'); ?></h4>
                        <button class="button test-position-pointer"><?php esc_html_e('Test Right', 'plugin-boilerplate'); ?></button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- CSS Testing Area -->
        <div class="component-demo">
            <h4><?php esc_html_e('CSS Testing', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-component-showcase">
                <textarea id="pointer-css-test" rows="8" style="width: 100%; font-family: monospace;">
.plugin-boilerplate-left-header-pointer {
    margin-left: -15px !important;
}
.plugin-boilerplate-left-header-pointer .wp-pointer-arrow {
    top: 20px !important;
}
                </textarea>
                <button class="button button-primary" id="apply-pointer-css"><?php esc_html_e('Apply CSS', 'plugin-boilerplate'); ?></button>
                <button class="button" id="reset-pointer-css"><?php esc_html_e('Reset CSS', 'plugin-boilerplate'); ?></button>
            </div>
        </div>
    </div>
    
    <?php
    // Add pointer testing script
    wp_enqueue_style('wp-pointer');
    wp_enqueue_script('wp-pointer');
    
    $plugin_boilerplate_pointer_script = "
        jQuery(document).ready(function($) {
            var testPointer = null;
            
            // Test left header pointer
            $('.test-pointer-trigger').on('click', function(e) {
                e.preventDefault();
                if (testPointer) {
                    testPointer.pointer('close');
                }
                
                var target = $('.test-pointer-container');
                var options = {
                    content: '<h3>Test Pointer</h3><p>This is a test of the left header pointer positioning.</p>',
                    position: {
                        edge: 'right',
                        align: 'top'
                    },
                    pointerClass: 'wp-pointer-right plugin-boilerplate-left-header-pointer',
                    width: 320,
                    close: function() {
                        testPointer = null;
                    }
                };
                
                testPointer = target.pointer(options);
                testPointer.pointer('open');
            });
            
            // Test position pointers
            $('.test-position-pointer').on('click', function(e) {
                e.preventDefault();
                if (testPointer) {
                    testPointer.pointer('close');
                }
                
                var target = $(this).closest('.pointer-test-box');
                var position = target.data('position');
                var options = {
                    content: '<h3>' + position.charAt(0).toUpperCase() + position.slice(1) + ' Pointer</h3><p>Testing ' + position + ' positioning.</p>',
                    position: {
                        edge: position === 'left' ? 'right' : 'left',
                        align: 'middle'
                    },
                    width: 250,
                    close: function() {
                        testPointer = null;
                    }
                };
                
                testPointer = target.pointer(options);
                testPointer.pointer('open');
            });
            
            // CSS testing
            $('#apply-pointer-css').on('click', function() {
                var css = $('#pointer-css-test').val();
                $('#dynamic-pointer-css').remove();
                $('<style id=\"dynamic-pointer-css\">' + css + '</style>').appendTo('head');
            });
            
            $('#reset-pointer-css').on('click', function() {
                $('#dynamic-pointer-css').remove();
                $('#pointer-css-test').val('.plugin-boilerplate-left-header-pointer {\\n    margin-left: -15px !important;\\n}\\n.plugin-boilerplate-left-header-pointer .wp-pointer-arrow {\\n    top: 20px !important;\\n}');
            });
            
            // Close pointers when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.wp-pointer, .test-pointer-trigger, .test-position-pointer').length) {
                    if (testPointer) {
                        testPointer.pointer('close');
                    }
                }
            });
        });
    ";
    
    wp_add_inline_script('wp-pointer', $plugin_boilerplate_pointer_script);
    ?>
</div>
