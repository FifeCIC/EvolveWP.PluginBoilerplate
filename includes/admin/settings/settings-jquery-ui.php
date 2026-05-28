<?php
/**
 * jQuery UI Settings Gallery
 * 
 * Examples of all jQuery UI components supported by WordPress core
 * 
 * @package Plugin Boilerplate
 */

defined( 'ABSPATH' ) || die;

function plugin_boilerplate_render_jquery_ui_gallery() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'jQuery UI Components Gallery', 'plugin-boilerplate' ); ?></h1>
        
        <form method="post" action="">
            <?php wp_nonce_field( 'jquery_ui_demo' ); ?>
            <input type="hidden" name="plugin_boilerplate_form_action" value="jquery_ui_demo">
            
            <table class="form-table">
                
                <!-- Datepicker -->
                <tr>
                    <th><?php esc_html_e( 'Datepicker', 'plugin-boilerplate' ); ?></th>
                    <td>
                        <input type="text" id="plugin_boilerplate_datepicker" name="datepicker" class="regular-text" value="<?php echo esc_attr( get_option( 'plugin_boilerplate_datepicker', '' ) ); ?>">
                        <p class="description"><?php esc_html_e( 'Click to select a date', 'plugin-boilerplate' ); ?></p>
                    </td>
                </tr>
                
                <!-- Slider -->
                <tr>
                    <th><?php esc_html_e( 'Slider', 'plugin-boilerplate' ); ?></th>
                    <td>
                        <div id="plugin_boilerplate_slider"></div>
                        <input type="hidden" id="plugin_boilerplate_slider_value" name="slider" value="<?php echo esc_attr( get_option( 'plugin_boilerplate_slider', 50 ) ); ?>">
                        <p class="description"><?php esc_html_e( 'Value: ', 'plugin-boilerplate' ); ?><span id="slider_display">50</span></p>
                    </td>
                </tr>
                
                <!-- Progressbar -->
                <tr>
                    <th><?php esc_html_e( 'Progressbar', 'plugin-boilerplate' ); ?></th>
                    <td>
                        <div id="plugin_boilerplate_progressbar"></div>
                        <button type="button" id="progress_btn" class="button"><?php esc_html_e( 'Simulate Progress', 'plugin-boilerplate' ); ?></button>
                    </td>
                </tr>
                
                <!-- Autocomplete -->
                <tr>
                    <th><?php esc_html_e( 'Autocomplete', 'plugin-boilerplate' ); ?></th>
                    <td>
                        <input type="text" id="plugin_boilerplate_autocomplete" name="autocomplete" class="regular-text" value="<?php echo esc_attr( get_option( 'plugin_boilerplate_autocomplete', '' ) ); ?>">
                        <p class="description"><?php esc_html_e( 'Type: PHP, JavaScript, WordPress, MySQL', 'plugin-boilerplate' ); ?></p>
                    </td>
                </tr>
                
                <!-- Accordion -->
                <tr>
                    <th><?php esc_html_e( 'Accordion', 'plugin-boilerplate' ); ?></th>
                    <td>
                        <div id="plugin_boilerplate_accordion">
                            <h3><?php esc_html_e( 'Section 1', 'plugin-boilerplate' ); ?></h3>
                            <div><p><?php esc_html_e( 'Content for section 1', 'plugin-boilerplate' ); ?></p></div>
                            <h3><?php esc_html_e( 'Section 2', 'plugin-boilerplate' ); ?></h3>
                            <div><p><?php esc_html_e( 'Content for section 2', 'plugin-boilerplate' ); ?></p></div>
                            <h3><?php esc_html_e( 'Section 3', 'plugin-boilerplate' ); ?></h3>
                            <div><p><?php esc_html_e( 'Content for section 3', 'plugin-boilerplate' ); ?></p></div>
                        </div>
                    </td>
                </tr>
                
                <!-- Tabs -->
                <tr>
                    <th><?php esc_html_e( 'Tabs', 'plugin-boilerplate' ); ?></th>
                    <td>
                        <div id="plugin_boilerplate_tabs">
                            <ul>
                                <li><a href="#tab-1"><?php esc_html_e( 'Tab 1', 'plugin-boilerplate' ); ?></a></li>
                                <li><a href="#tab-2"><?php esc_html_e( 'Tab 2', 'plugin-boilerplate' ); ?></a></li>
                                <li><a href="#tab-3"><?php esc_html_e( 'Tab 3', 'plugin-boilerplate' ); ?></a></li>
                            </ul>
                            <div id="tab-1"><p><?php esc_html_e( 'Content for tab 1', 'plugin-boilerplate' ); ?></p></div>
                            <div id="tab-2"><p><?php esc_html_e( 'Content for tab 2', 'plugin-boilerplate' ); ?></p></div>
                            <div id="tab-3"><p><?php esc_html_e( 'Content for tab 3', 'plugin-boilerplate' ); ?></p></div>
                        </div>
                    </td>
                </tr>
                
                <!-- Dialog (Button to trigger) -->
                <tr>
                    <th><?php esc_html_e( 'Dialog', 'plugin-boilerplate' ); ?></th>
                    <td>
                        <button type="button" id="open_dialog" class="button"><?php esc_html_e( 'Open Dialog', 'plugin-boilerplate' ); ?></button>
                        <div id="plugin_boilerplate_dialog" title="<?php esc_attr_e( 'Example Dialog', 'plugin-boilerplate' ); ?>" style="display:none;">
                            <p><?php esc_html_e( 'This is a jQuery UI dialog example.', 'plugin-boilerplate' ); ?></p>
                        </div>
                    </td>
                </tr>
                
                <!-- Sortable -->
                <tr>
                    <th><?php esc_html_e( 'Sortable', 'plugin-boilerplate' ); ?></th>
                    <td>
                        <ul id="plugin_boilerplate_sortable" style="list-style:none; padding:0;">
                            <li class="ui-state-default" style="padding:10px; margin:5px; background:#f0f0f0; cursor:move;">Item 1</li>
                            <li class="ui-state-default" style="padding:10px; margin:5px; background:#f0f0f0; cursor:move;">Item 2</li>
                            <li class="ui-state-default" style="padding:10px; margin:5px; background:#f0f0f0; cursor:move;">Item 3</li>
                        </ul>
                        <p class="description"><?php esc_html_e( 'Drag to reorder', 'plugin-boilerplate' ); ?></p>
                    </td>
                </tr>
                
                <!-- Spinner -->
                <tr>
                    <th><?php esc_html_e( 'Spinner', 'plugin-boilerplate' ); ?></th>
                    <td>
                        <input type="text" id="plugin_boilerplate_spinner" name="spinner" value="<?php echo esc_attr( get_option( 'plugin_boilerplate_spinner', 0 ) ); ?>">
                        <p class="description"><?php esc_html_e( 'Use arrows or type a number', 'plugin-boilerplate' ); ?></p>
                    </td>
                </tr>
                
            </table>
            
            <?php submit_button(); ?>
        </form>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        // Datepicker
        $('#plugin_boilerplate_datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
        
        // Slider
        $('#plugin_boilerplate_slider').slider({
            min: 0,
            max: 100,
            value: <?php echo (int) get_option( 'plugin_boilerplate_slider', 50 ); ?>,
            slide: function(event, ui) {
                $('#slider_display').text(ui.value);
                $('#plugin_boilerplate_slider_value').val(ui.value);
            }
        });
        
        // Progressbar
        $('#plugin_boilerplate_progressbar').progressbar({ value: 0 });
        $('#progress_btn').click(function() {
            var val = 0;
            var interval = setInterval(function() {
                val += 10;
                $('#plugin_boilerplate_progressbar').progressbar('value', val);
                if (val >= 100) clearInterval(interval);
            }, 200);
        });
        
        // Autocomplete
        $('#plugin_boilerplate_autocomplete').autocomplete({
            source: ['PHP', 'JavaScript', 'WordPress', 'MySQL', 'Python', 'Ruby']
        });
        
        // Accordion
        $('#plugin_boilerplate_accordion').accordion({ collapsible: true });
        
        // Tabs
        $('#plugin_boilerplate_tabs').tabs();
        
        // Dialog
        $('#plugin_boilerplate_dialog').dialog({ autoOpen: false, modal: true });
        $('#open_dialog').click(function() {
            $('#plugin_boilerplate_dialog').dialog('open');
        });
        
        // Sortable
        $('#plugin_boilerplate_sortable').sortable();
        
        // Spinner
        $('#plugin_boilerplate_spinner').spinner({ min: 0, max: 100 });
    });
    </script>
    <?php
}
