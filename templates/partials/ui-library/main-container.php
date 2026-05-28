<?php
/**
 * Plugin Boilerplate UI Library Main Container
 *
 * @package Plugin Boilerplate/Admin/Views/Partials
 */

defined('ABSPATH') || exit;

$plugin_boilerplate_ui_sections = array(
    'color-palette' => __('Color Palette', 'plugin-boilerplate'),
    'button-components' => __('Button Components', 'plugin-boilerplate'),
    'form-components' => __('Form Components', 'plugin-boilerplate'),
    'notice-components' => __('Notice Components', 'plugin-boilerplate'),
    'controls-actions' => __('Controls & Actions', 'plugin-boilerplate'),
    'filters-search' => __('Filters & Search', 'plugin-boilerplate'),
    'pagination-controls' => __('Pagination Controls', 'plugin-boilerplate'),
    'progress-indicators' => __('Progress Indicators', 'plugin-boilerplate'),
    'animation-showcase' => __('Animation Showcase', 'plugin-boilerplate'),
    'accordion-components' => __('Accordion Components', 'plugin-boilerplate'),
    'status-indicators' => __('Status Indicators', 'plugin-boilerplate'),
    'data-analysis-components' => __('Data Analysis Components', 'plugin-boilerplate'),
    'chart-visualization' => __('Chart Visualization', 'plugin-boilerplate'),
    'modal-components' => __('Modal Components', 'plugin-boilerplate'),
    'tooltips' => __('Tooltips', 'plugin-boilerplate'),
    'pointers' => __('Pointers', 'plugin-boilerplate')
);
?>

<div class="wrap plugin-boilerplate-ui-library">
    <h1><?php esc_html_e('Plugin Boilerplate UI Library', 'plugin-boilerplate'); ?></h1>
    <p class="description"><?php esc_html_e('Comprehensive showcase of Plugin Boilerplate UI components, styles, and interactive elements.', 'plugin-boilerplate'); ?></p>
    
    <!-- Section Visibility Controls -->
    <div class="plugin-boilerplate-ui-section-controls">
        <div class="plugin-boilerplate-card">
            <div class="plugin-boilerplate-card-header">
                <h3><?php esc_html_e('Section Visibility Controls', 'plugin-boilerplate'); ?></h3>
                <div class="control-actions">
                    <button type="button" class="button button-secondary" id="show-all-sections">
                        <?php esc_html_e('Show All', 'plugin-boilerplate'); ?>
                    </button>
                    <button type="button" class="button button-secondary" id="hide-all-sections">
                        <?php esc_html_e('Hide All', 'plugin-boilerplate'); ?>
                    </button>
                </div>
            </div>
            <div class="plugin-boilerplate-card-body">
                <p class="description">
                    <?php esc_html_e('Use these controls to show/hide specific sections while working on styles.', 'plugin-boilerplate'); ?>
                </p>
                <div class="section-toggles">
                    <?php foreach ($plugin_boilerplate_ui_sections as $plugin_boilerplate_section_id => $plugin_boilerplate_section_name) : ?>
                        <label class="section-toggle">
                            <input type="checkbox" 
                                   id="toggle-<?php echo esc_attr($plugin_boilerplate_section_id); ?>" 
                                   class="section-toggle-checkbox" 
                                   data-section="<?php echo esc_attr($plugin_boilerplate_section_id); ?>" 
                                   checked>
                            <span class="section-toggle-label"><?php echo esc_html($plugin_boilerplate_section_name); ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    $plugin_boilerplate_sections = array(
        'color-palette.php',
        'button-components.php',
        'form-components.php',
        'notice-components.php',
        'controls-actions.php',
        'filters-search.php',
        'pagination-controls.php',
        'progress-indicators.php',
        'animation-showcase.php',
        'accordion-components.php',
        'status-indicators.php',
        'data-analysis-components.php',
        'chart-visualization.php',
        'modal-components.php',
        'tooltips.php',
        'pointers.php'
    );
    
    $plugin_boilerplate_partials_dir = PLUGIN_BOILERPLATE_PLUGIN_DIR_PATH . 'templates/partials/ui-library/';
    
    foreach ($plugin_boilerplate_sections as $plugin_boilerplate_section) {
        $plugin_boilerplate_section_id = str_replace('.php', '', $plugin_boilerplate_section);
        $plugin_boilerplate_section_path = $plugin_boilerplate_partials_dir . $plugin_boilerplate_section;
        
        echo '<div class="ui-library-section" data-section-id="' . esc_attr($plugin_boilerplate_section_id) . '" id="section-' . esc_attr($plugin_boilerplate_section_id) . '">';
        
        if (file_exists($plugin_boilerplate_section_path)) {
            require_once $plugin_boilerplate_section_path;
        } else {
            $plugin_boilerplate_section_name = str_replace(array('-', '.php'), array(' ', ''), $plugin_boilerplate_section);
            $plugin_boilerplate_section_name = ucwords($plugin_boilerplate_section_name);
            echo '<div class="plugin-boilerplate-ui-section">';
            echo '<h3>' . esc_html($plugin_boilerplate_section_name) . '</h3>';
            /* translators: %s: Section name */
            echo '<p>' . sprintf(esc_html__('Section "%s" is not yet available.', 'plugin-boilerplate'), esc_html($plugin_boilerplate_section_name)) . '</p>';
            echo '</div>';
        }
        
        echo '</div>';
    }
    ?>
</div>

<style>
.plugin-boilerplate-ui-section-controls { margin: 20px 0; }
.plugin-boilerplate-card { background: #fff; border: 1px solid #ccd0d4; box-shadow: 0 1px 1px rgba(0,0,0,.04); }
.plugin-boilerplate-card-header { padding: 15px 20px; border-bottom: 1px solid #ddd; display: flex; justify-content: space-between; align-items: center; }
.plugin-boilerplate-card-header h3 { margin: 0; }
.plugin-boilerplate-card-body { padding: 20px; }
.section-toggles { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 10px; }
.section-toggle { display: flex; align-items: center; gap: 8px; }
.ui-library-section { margin-bottom: 30px; }
.plugin-boilerplate-ui-section { padding: 20px; background: #fff; border: 1px solid #ccd0d4; }
.plugin-boilerplate-ui-section h3 { margin-top: 0; border-bottom: 1px solid #ddd; padding-bottom: 10px; }
</style>

<script>
jQuery(document).ready(function($) {
    $('#show-all-sections').on('click', function() {
        $('.section-toggle-checkbox').prop('checked', true).trigger('change');
    });
    
    $('#hide-all-sections').on('click', function() {
        $('.section-toggle-checkbox').prop('checked', false).trigger('change');
    });
    
    $('.section-toggle-checkbox').on('change', function() {
        var sectionId = $(this).data('section');
        var $section = $('#section-' + sectionId);
        
        if ($(this).is(':checked')) {
            $section.show();
        } else {
            $section.hide();
        }
    });
});
</script>
