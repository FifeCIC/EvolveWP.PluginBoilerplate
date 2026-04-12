<?php
/**
 * EvolveWP Core Development - Credits & Contributors
 *
 * @package EvolveWP Core/Admin/Development
 * @version 1.2.0
 */

if (!defined('ABSPATH')) exit;

/**
 * EvolveWP_Core_Admin_Development_Credits Class.
 *
 * @since   1.0.0
 * @version 1.2.0
 */
class EvolveWP_Core_Admin_Development_Credits {
    
    // Set to false to use AJAX, true to use URL-based navigation
    const USE_URL_NAVIGATION = false;
    
    public static function init() {
        // AJAX handler registered at bottom of file
    }
    
    /**
     * Render the Credits & Contributors page output.
     *
     * The contributor GET parameter is a read-only display selector used to
     * pre-select a sidebar entry. It carries no privilege and mutates no state,
     * so a nonce is not required; capability verification is sufficient.
     *
     * @since 1.2.0
     * @return void
     */
    public static function output() {
        $contributors = self::get_contributors();

        // Read-only navigation parameter — selects which contributor to highlight
        // in the sidebar. Restricted to administrators; no state change occurs.
        $selected = ( current_user_can( 'manage_options' ) && isset( $_GET['contributor'] ) )
            ? sanitize_key( wp_unslash( $_GET['contributor'] ) )
            : 'action_scheduler';
        
        wp_enqueue_style('plugin-boilerplate-accordion-table', PLUGIN_BOILERPLATE_PLUGIN_URL . 'assets/css/accordion-table.css', array(), PLUGIN_BOILERPLATE_VERSION);
        wp_enqueue_script('plugin-boilerplate-accordion-table', PLUGIN_BOILERPLATE_PLUGIN_URL . 'assets/js/accordion-table.js', array('jquery'), PLUGIN_BOILERPLATE_VERSION, true);
        ?>
        
        <div class="plugin-boilerplate-credits-container">
            <div class="plugin-boilerplate-layout">
                
                <!-- Left: Contributors Table -->
                <div class="plugin-boilerplate-table-container">
                    
                    <div class="tablenav top">
                        <div class="alignleft actions">
                            <select id="category-filter">
                                <option value=""><?php esc_html_e('All Categories', 'plugin-boilerplate'); ?></option>
                                <option value="library"><?php esc_html_e('Libraries', 'plugin-boilerplate'); ?></option>
                                <option value="inspiration"><?php esc_html_e('Inspiration', 'plugin-boilerplate'); ?></option>
                                <option value="service"><?php esc_html_e('Services', 'plugin-boilerplate'); ?></option>
                            </select>
                            <input type="search" id="contributor-search" placeholder="<?php esc_attr_e('Search...', 'plugin-boilerplate'); ?>">
                        </div>
                    </div>
                    
                    <div class="wp-list-table widefat fixed striped">
                        <div class="table-header" style="display: flex; background: #f1f1f1; padding: 12px 15px; font-weight: 600; border-bottom: 1px solid #c3c4c7;">
                            <div style="flex: 2;"><?php esc_html_e('Name', 'plugin-boilerplate'); ?></div>
                            <div style="flex: 1;"><?php esc_html_e('Type', 'plugin-boilerplate'); ?></div>
                            <div style="flex: 1;"><?php esc_html_e('License', 'plugin-boilerplate'); ?></div>
                            <div style="flex: 1;"><?php esc_html_e('Status', 'plugin-boilerplate'); ?></div>
                        </div>
                    </div>

                    <div class="plugin-boilerplate-accordion-table">
                        <?php foreach ($contributors as $id => $contributor): ?>
                            <div class="accordion-row" data-category="<?php echo esc_attr($contributor['category']); ?>" data-contributor-id="<?php echo esc_attr($id); ?>">
                                <div class="accordion-header">
                                    <div style="flex: 2;">
                                        <strong><?php echo esc_html($contributor['name']); ?></strong>
                                        <?php if ($contributor['featured']): ?>
                                            <span class="featured-badge">⭐ Featured</span>
                                        <?php endif; ?>
                                    </div>
                                    <div style="flex: 1;">
                                        <span class="type-badge type-<?php echo esc_attr($contributor['category']); ?>">
                                            <?php echo esc_html(ucfirst($contributor['category'])); ?>
                                        </span>
                                    </div>
                                    <div style="flex: 1;">
                                        <span class="license-badge"><?php echo esc_html($contributor['license']); ?></span>
                                    </div>
                                    <div style="flex: 1;">
                                        <span class="status-badge status-<?php echo esc_attr($contributor['status']); ?>">
                                            <?php echo esc_html(ucfirst($contributor['status'])); ?>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="accordion-content">
                                    <div class="contributor-meta">
                                        <div>
                                            <strong><?php esc_html_e('Description:', 'plugin-boilerplate'); ?></strong><br>
                                            <?php echo esc_html($contributor['description']); ?>
                                        </div>
                                        <div>
                                            <strong><?php esc_html_e('Used In:', 'plugin-boilerplate'); ?></strong><br>
                                            <?php echo esc_html($contributor['used_in']); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="contributor-actions">
                                        <?php if (self::USE_URL_NAVIGATION): ?>
                                            <a href="<?php echo esc_url(add_query_arg('contributor', $id)); ?>" class="button button-primary">
                                                <?php esc_html_e('View Details', 'plugin-boilerplate'); ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($contributor['website']): ?>
                                            <a href="<?php echo esc_url($contributor['website']); ?>" class="button" target="_blank">
                                                <?php esc_html_e('Visit Website', 'plugin-boilerplate'); ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($contributor['github']): ?>
                                            <a href="<?php echo esc_url($contributor['github']); ?>" class="button" target="_blank">
                                                <?php esc_html_e('GitHub', 'plugin-boilerplate'); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Right: Details Sidebar -->
                <div class="plugin-boilerplate-sidebar">
                    <div class="plugin-boilerplate-details-container">
                        <?php if (isset($contributors[$selected])): 
                            $contributor = $contributors[$selected];
                        ?>
                            <?php echo wp_kses_post(self::render_contributor_details($contributor)); ?>
                        <?php else: ?>
                            <div class="details-placeholder">
                                <p><?php esc_html_e('Select a contributor to view details', 'plugin-boilerplate'); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
        jQuery(document).ready(function($) {
            var useAjax = <?php echo esc_js(self::USE_URL_NAVIGATION ? 'false' : 'true'); ?>;
            
            $('#category-filter').on('change', function() {
                var category = $(this).val();
                if (category) {
                    $('.accordion-row').hide();
                    $('.accordion-row[data-category="' + category + '"]').show();
                } else {
                    $('.accordion-row').show();
                }
            });
            
            if (useAjax) {
                $('.accordion-header').on('click', function(e) {
                    e.preventDefault();
                    var contributorId = $(this).closest('.accordion-row').data('contributor-id');
                    
                    console.log('Loading contributor:', contributorId);
                    
                    $('.plugin-boilerplate-details-container').html('<div class="details-loading"><span class="spinner is-active" style="float:none;"></span></div>');
                    
                    $.post(ajaxurl, {
                        action: 'plugin_boilerplate_get_contributor_details',
                        contributor_id: contributorId,
                        nonce: '<?php echo esc_attr(wp_create_nonce('plugin_boilerplate_contributor_details')); ?>'
                    }, function(response) {
                        console.log('Response:', response);
                        if (response.success) {
                            $('.plugin-boilerplate-details-container').html(response.data.html);
                        } else {
                            $('.plugin-boilerplate-details-container').html('<p>Error loading details</p>');
                        }
                    }).fail(function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        $('.plugin-boilerplate-details-container').html('<p>Error: ' + error + '</p>');
                    });
                });
            }
        });
        </script>
        <?php
    }
    
    private static function render_contributor_details($contributor) {
        ob_start();
        ?>
        <div class="section-header">
            <h3><?php echo esc_html($contributor['name']); ?></h3>
        </div>
        
        <div class="section-content">
            <?php if ($contributor['logo']): ?>
                <div class="contributor-logo">
                    <img src="<?php echo esc_url($contributor['logo']); ?>" alt="<?php echo esc_attr($contributor['name']); ?>">
                </div>
            <?php endif; ?>
            
            <div class="detail-group">
                <label><?php esc_html_e('Description:', 'plugin-boilerplate'); ?></label>
                <p><?php echo esc_html($contributor['description']); ?></p>
            </div>
            
            <div class="detail-group">
                <label><?php esc_html_e('Full Details:', 'plugin-boilerplate'); ?></label>
                <p><?php echo esc_html($contributor['details']); ?></p>
            </div>
            
            <div class="detail-group">
                <label><?php esc_html_e('Category:', 'plugin-boilerplate'); ?></label>
                <span class="type-badge type-<?php echo esc_attr($contributor['category']); ?>">
                    <?php echo esc_html(ucfirst($contributor['category'])); ?>
                </span>
            </div>
            
            <div class="detail-group">
                <label><?php esc_html_e('License:', 'plugin-boilerplate'); ?></label>
                <span class="license-badge"><?php echo esc_html($contributor['license']); ?></span>
            </div>
            
            <?php if ($contributor['stats']): ?>
                <div class="detail-group">
                    <label><?php esc_html_e('Statistics:', 'plugin-boilerplate'); ?></label>
                    <p><?php echo esc_html($contributor['stats']); ?></p>
                </div>
            <?php endif; ?>
            
            <div class="detail-actions">
                <?php if ($contributor['website']): ?>
                    <a href="<?php echo esc_url($contributor['website']); ?>" class="button button-primary" target="_blank">
                        <?php esc_html_e('Visit Website', 'plugin-boilerplate'); ?>
                    </a>
                <?php endif; ?>
                <?php if ($contributor['github']): ?>
                    <a href="<?php echo esc_url($contributor['github']); ?>" class="button" target="_blank">
                        <?php esc_html_e('View on GitHub', 'plugin-boilerplate'); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
    
    public static function ajax_get_contributor_details() {
        
        if (!isset($_POST['nonce'])) {
            wp_send_json_error('No nonce');
        }
        
        if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'plugin_boilerplate_contributor_details')) {
            wp_send_json_error('Invalid nonce');
        }
        
        if (!isset($_POST['contributor_id'])) {
            wp_send_json_error('No contributor ID');
        }
        
        $contributor_id = sanitize_text_field(wp_unslash($_POST['contributor_id']));
        
        $contributors = self::get_contributors();
        
        if (!isset($contributors[$contributor_id])) {
            wp_send_json_error('Contributor not found');
        }
        
        wp_send_json_success(array('html' => self::render_contributor_details($contributors[$contributor_id])));
    }
    
    private static function get_contributors() {
        return array(
            'action_scheduler' => array(
                'name' => 'Action Scheduler',
                'category' => 'library',
                'license' => 'GPL v3',
                'status' => 'bundled',
                'featured' => true,
                'description' => 'Battle-tested background processing library by Automattic',
                'details' => 'Created by Automattic (WooCommerce team). Used by WooCommerce to handle millions of background tasks daily. Provides reliable job queue with automatic retry and monitoring.',
                'used_in' => 'Background task processing',
                'website' => 'https://actionscheduler.org/',
                'github' => 'https://github.com/woocommerce/action-scheduler',
                'logo' => '',
                'stats' => '5M+ active installations',
            ),
            'carbon_fields' => array(
                'name' => 'Carbon Fields',
                'category' => 'library',
                'license' => 'GPL v2',
                'status' => 'bundled',
                'featured' => true,
                'description' => 'Modern WordPress custom fields library by htmlBurger',
                'details' => 'Created by htmlBurger (Miroslav Mitev, Atanas Angelov, Siyan Panayotov). Developer-friendly custom fields library with clean API. Supports theme options, post meta, term meta, and user meta.',
                'used_in' => 'Settings framework, custom fields',
                'website' => 'https://carbonfields.net/',
                'github' => 'https://github.com/htmlburger/carbon-fields',
                'logo' => '',
                'stats' => '100K+ downloads',
            ),
            'parsedown' => array(
                'name' => 'Parsedown',
                'category' => 'library',
                'license' => 'MIT',
                'status' => 'bundled',
                'featured' => false,
                'description' => 'Markdown parser in PHP by Emanuil Rusev',
                'details' => 'Created by Emanuil Rusev. Fast and extensible Markdown parser. Used for rendering documentation within WordPress admin.',
                'used_in' => 'Documentation viewer',
                'website' => 'https://parsedown.org/',
                'github' => 'https://github.com/erusev/parsedown',
                'logo' => '',
                'stats' => '10M+ downloads',
            ),
            'woocommerce' => array(
                'name' => 'WooCommerce',
                'category' => 'inspiration',
                'license' => 'GPL v3',
                'status' => 'reference',
                'featured' => true,
                'description' => 'Architecture patterns and best practices by Automattic',
                'details' => 'Created by Automattic. EvolveWP Core draws inspiration from WooCommerce\'s plugin architecture, including REST API patterns, background processing, and asset management.',
                'used_in' => 'Overall architecture, coding standards',
                'website' => 'https://woocommerce.com/',
                'github' => 'https://github.com/woocommerce/woocommerce',
                'logo' => '',
                'stats' => '5M+ active installations',
            ),
            'github' => array(
                'name' => 'GitHub',
                'category' => 'service',
                'license' => 'Commercial',
                'status' => 'integrated',
                'featured' => true,
                'description' => 'Version control and collaboration by GitHub, Inc. (Microsoft)',
                'details' => 'Owned by Microsoft Corporation. GitHub provides version control, issue tracking, and CI/CD integration for EvolveWP Core development.',
                'used_in' => 'Version control, documentation sync, CI/CD',
                'website' => 'https://github.com/',
                'github' => 'https://github.com/ryanbayne/plugin-boilerplate',
                'logo' => '',
                'stats' => '100M+ developers',
            ),
        );
    }
}

EvolveWP_Core_Admin_Development_Credits::init();

add_action('wp_ajax_plugin_boilerplate_get_contributor_details', array('EvolveWP_Core_Admin_Development_Credits', 'ajax_get_contributor_details'));
