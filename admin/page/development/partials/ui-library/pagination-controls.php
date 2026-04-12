<?php
/**
 * UI Library Pagination Controls Partial
 *
 * @package plugin-boilerplate/Admin/Views/Partials
 * @version 1.0.6
 */

defined('ABSPATH') || exit;
?>
<div class="plugin-boilerplate-ui-section">
    <h3><?php esc_html_e('Pagination Controls', 'plugin-boilerplate'); ?></h3>
    <p><?php esc_html_e('Navigation controls for paginated content and data tables.', 'plugin-boilerplate'); ?></p>
    
    <div class="pagination-showcase">
        <!-- Standard Pagination -->
        <div class="component-demo">
            <h4><?php esc_html_e('Standard Pagination', 'plugin-boilerplate'); ?></h4>
            <div class="pagination-container">
                <div class="pagination">
                    <a href="#" class="pagination-item disabled">
                        <span class="dashicons dashicons-arrow-left-alt2"></span>
                        <span class="pagination-text"><?php esc_html_e('Previous', 'plugin-boilerplate'); ?></span>
                    </a>
                    <a href="#" class="pagination-item active">1</a>
                    <a href="#" class="pagination-item">2</a>
                    <a href="#" class="pagination-item">3</a>
                    <span class="pagination-ellipsis">...</span>
                    <a href="#" class="pagination-item">12</a>
                    <a href="#" class="pagination-item">
                        <span class="pagination-text"><?php esc_html_e('Next', 'plugin-boilerplate'); ?></span>
                        <span class="dashicons dashicons-arrow-right-alt2"></span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- plugin-boilerplate Legacy Pagination -->
        <div class="component-demo">
            <h4><?php esc_html_e('plugin-boilerplate Style Pagination', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-pagination">
                <a href="#" class="plugin-boilerplate-pagination-prev disabled"><?php esc_html_e('Previous', 'plugin-boilerplate'); ?></a>
                <ul class="plugin-boilerplate-pagination-list">
                    <li><a href="#" class="plugin-boilerplate-pagination-item active">1</a></li>
                    <li><a href="#" class="plugin-boilerplate-pagination-item">2</a></li>
                    <li><a href="#" class="plugin-boilerplate-pagination-item">3</a></li>
                    <li><span class="plugin-boilerplate-pagination-item">...</span></li>
                    <li><a href="#" class="plugin-boilerplate-pagination-item">24</a></li>
                </ul>
                <a href="#" class="plugin-boilerplate-pagination-next"><?php esc_html_e('Next', 'plugin-boilerplate'); ?></a>
            </div>
        </div>
        
        <!-- Compact Pagination -->
        <div class="component-demo">
            <h4><?php esc_html_e('Compact Pagination', 'plugin-boilerplate'); ?></h4>
            <div class="pagination-container">
                <div class="pagination-compact">
                    <button class="pagination-button" disabled>
                        <span class="dashicons dashicons-arrow-left-alt2"></span>
                    </button>
                    <span class="pagination-info">Page 1 of 24</span>
                    <button class="pagination-button">
                        <span class="dashicons dashicons-arrow-right-alt2"></span>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Table Pagination with Page Size -->
        <div class="component-demo">
            <h4><?php esc_html_e('Table Pagination with Page Size', 'plugin-boilerplate'); ?></h4>
            <div class="pagination-container pagination-with-options">
                <div class="pagination-left">
                    <span class="pagination-status"><?php esc_html_e('Showing 1-10 of 243 items', 'plugin-boilerplate'); ?></span>
                </div>
                <div class="pagination-center">
                    <div class="pagination">
                        <a href="#" class="pagination-item disabled">
                            <span class="dashicons dashicons-arrow-left-alt2"></span>
                        </a>
                        <a href="#" class="pagination-item active">1</a>
                        <a href="#" class="pagination-item">2</a>
                        <a href="#" class="pagination-item">3</a>
                        <span class="pagination-ellipsis">...</span>
                        <a href="#" class="pagination-item">25</a>
                        <a href="#" class="pagination-item">
                            <span class="dashicons dashicons-arrow-right-alt2"></span>
                        </a>
                    </div>
                </div>
                <div class="pagination-right">
                    <div class="pagination-page-size">
                        <label for="page-size-select"><?php esc_html_e('Show:', 'plugin-boilerplate'); ?></label>
                        <select id="page-size-select" class="plugin-boilerplate-select plugin-boilerplate-select-small">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Infinite Scroll Pagination -->
        <div class="component-demo">
            <h4><?php esc_html_e('Infinite Scroll Pagination', 'plugin-boilerplate'); ?></h4>
            <div class="infinite-scroll-container">
                <div class="infinite-scroll-items">
                    <div class="infinite-scroll-item">
                        <h5><?php esc_html_e('Item 1', 'plugin-boilerplate'); ?></h5>
                        <p><?php esc_html_e('Example content for the first item in the infinite scroll list.', 'plugin-boilerplate'); ?></p>
                    </div>
                    <div class="infinite-scroll-item">
                        <h5><?php esc_html_e('Item 2', 'plugin-boilerplate'); ?></h5>
                        <p><?php esc_html_e('Example content for the second item in the infinite scroll list.', 'plugin-boilerplate'); ?></p>
                    </div>
                    <div class="infinite-scroll-item">
                        <h5><?php esc_html_e('Item 3', 'plugin-boilerplate'); ?></h5>
                        <p><?php esc_html_e('Example content for the third item in the infinite scroll list.', 'plugin-boilerplate'); ?></p>
                    </div>
                </div>
                <div class="infinite-scroll-loader">
                    <div class="infinite-scroll-spinner"></div>
                    <p><?php esc_html_e('Loading more items...', 'plugin-boilerplate'); ?></p>
                </div>
                <button class="tp-button tp-button-secondary infinite-scroll-button">
                    <?php esc_html_e('Load More', 'plugin-boilerplate'); ?>
                </button>
            </div>
        </div>
    </div>
    
    <?php
    // Add inline script for pagination functionality
    $plugin_boilerplate_pagination_script = "
        jQuery(document).ready(function($) {
            // Pagination item click handling
            $('.pagination-item:not(.disabled), .plugin-boilerplate-pagination-item:not(.disabled)').on('click', function(e) {
                e.preventDefault();
                if (!$(this).hasClass('pagination-prev') && !$(this).hasClass('pagination-next') && 
                    !$(this).hasClass('plugin-boilerplate-pagination-prev') && !$(this).hasClass('plugin-boilerplate-pagination-next')) {
                    $(this).closest('ul, div').find('.active').removeClass('active');
                    $(this).addClass('active');
                }
            });
            
            // Load more button
            $('.infinite-scroll-button').on('click', function() {
                var button = $(this);
                var loader = $('.infinite-scroll-loader');
                
                button.hide();
                loader.show();
                
                setTimeout(function() {
                    loader.hide();
                    
                    var newItems = '';
                    for (var i = 4; i <= 6; i++) {
                        newItems += '<div class=\"infinite-scroll-item\">' +
                                    '<h5>Item ' + i + '</h5>' +
                                    '<p>Example content for item ' + i + ' in the infinite scroll list.</p>' +
                                    '</div>';
                    }
                    
                    $('.infinite-scroll-items').append(newItems);
                    button.show();
                }, 1500);
            });
            
            // Page size change
            $('#page-size-select').on('change', function() {
                alert('Page size changed to: ' + $(this).val() + ' items per page');
            });
        });
    ";
    
    wp_add_inline_script('jquery', $plugin_boilerplate_pagination_script);
    ?>
</div>
