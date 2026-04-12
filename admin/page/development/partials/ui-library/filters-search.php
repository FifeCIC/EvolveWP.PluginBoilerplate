<?php
/**
 * UI Library Filters and Search Partial
 *
 * @package plugin-boilerplate/Admin/Views/Partials
 * @version 1.0.0
 */

defined('ABSPATH') || exit;
?>
<div class="plugin-boilerplate-ui-section">
    <h3><?php esc_html_e('Filters & Search', 'plugin-boilerplate'); ?></h3>
    <p><?php esc_html_e('Search inputs, filter controls, and data refinement components for enhanced user experience.', 'plugin-boilerplate'); ?></p>

    <!-- Search Input Variations -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Search Input Variations', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-component-showcase">
            <!-- Basic Search -->
            <div class="search-demo">
                <label class="search-label"><?php esc_html_e('Basic Search', 'plugin-boilerplate'); ?></label>
                <div class="search-wrapper">
                    <input type="search" class="search-input" placeholder="<?php esc_attr_e('Search symbols...', 'plugin-boilerplate'); ?>">
                    <span class="search-icon dashicons dashicons-search"></span>
                </div>
            </div>

            <!-- Search with Clear Button -->
            <div class="search-demo">
                <label class="search-label"><?php esc_html_e('Search with Clear', 'plugin-boilerplate'); ?></label>
                <div class="search-wrapper search-with-clear">
                    <input type="search" class="search-input" placeholder="<?php esc_attr_e('Search earnings...', 'plugin-boilerplate'); ?>">
                    <span class="search-icon dashicons dashicons-search"></span>
                    <button type="button" class="search-clear" title="<?php esc_attr_e('Clear search', 'plugin-boilerplate'); ?>">
                        <span class="dashicons dashicons-no-alt"></span>
                    </button>
                </div>
            </div>

            <!-- Advanced Search -->
            <div class="search-demo">
                <label class="search-label"><?php esc_html_e('Advanced Search', 'plugin-boilerplate'); ?></label>
                <div class="search-wrapper search-advanced">
                    <input type="search" class="search-input" placeholder="<?php esc_attr_e('Search with filters...', 'plugin-boilerplate'); ?>">
                    <span class="search-icon dashicons dashicons-search"></span>
                    <button type="button" class="search-advanced-toggle" title="<?php esc_attr_e('Advanced filters', 'plugin-boilerplate'); ?>">
                        <span class="dashicons dashicons-filter"></span>
                    </button>
                </div>
                <div class="search-advanced-panel" style="display: none;">
                    <div class="advanced-filter-row">
                        <select class="filter-select">
                            <option value=""><?php esc_html_e('All Categories', 'plugin-boilerplate'); ?></option>
                            <option value="stocks"><?php esc_html_e('Stocks', 'plugin-boilerplate'); ?></option>
                            <option value="options"><?php esc_html_e('Options', 'plugin-boilerplate'); ?></option>
                            <option value="crypto"><?php esc_html_e('Crypto', 'plugin-boilerplate'); ?></option>
                        </select>
                        <select class="filter-select">
                            <option value=""><?php esc_html_e('All Sectors', 'plugin-boilerplate'); ?></option>
                            <option value="tech"><?php esc_html_e('Technology', 'plugin-boilerplate'); ?></option>
                            <option value="finance"><?php esc_html_e('Finance', 'plugin-boilerplate'); ?></option>
                            <option value="healthcare"><?php esc_html_e('Healthcare', 'plugin-boilerplate'); ?></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Button Groups -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Filter Button Groups', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-component-showcase">
            <!-- Status Filters -->
            <div class="filter-demo">
                <label class="filter-label"><?php esc_html_e('Status Filters', 'plugin-boilerplate'); ?></label>
                <div class="filter-button-group">
                    <button type="button" class="filter-button active" data-filter="all">
                        <?php esc_html_e('All', 'plugin-boilerplate'); ?>
                        <span class="filter-count">24</span>
                    </button>
                    <button type="button" class="filter-button" data-filter="active">
                        <?php esc_html_e('Active', 'plugin-boilerplate'); ?>
                        <span class="filter-count">12</span>
                    </button>
                    <button type="button" class="filter-button" data-filter="pending">
                        <?php esc_html_e('Pending', 'plugin-boilerplate'); ?>
                        <span class="filter-count">8</span>
                    </button>
                    <button type="button" class="filter-button" data-filter="completed">
                        <?php esc_html_e('Completed', 'plugin-boilerplate'); ?>
                        <span class="filter-count">4</span>
                    </button>
                </div>
            </div>

            <!-- Time Period Filters -->
            <div class="filter-demo">
                <label class="filter-label"><?php esc_html_e('Time Period', 'plugin-boilerplate'); ?></label>
                <div class="filter-button-group">
                    <button type="button" class="filter-button" data-period="1d"><?php esc_html_e('1D', 'plugin-boilerplate'); ?></button>
                    <button type="button" class="filter-button" data-period="1w"><?php esc_html_e('1W', 'plugin-boilerplate'); ?></button>
                    <button type="button" class="filter-button active" data-period="1m"><?php esc_html_e('1M', 'plugin-boilerplate'); ?></button>
                    <button type="button" class="filter-button" data-period="3m"><?php esc_html_e('3M', 'plugin-boilerplate'); ?></button>
                    <button type="button" class="filter-button" data-period="1y"><?php esc_html_e('1Y', 'plugin-boilerplate'); ?></button>
                </div>
            </div>

            <!-- Performance Filters -->
            <div class="filter-demo">
                <label class="filter-label"><?php esc_html_e('Performance', 'plugin-boilerplate'); ?></label>
                <div class="filter-button-group filter-performance">
                    <button type="button" class="filter-button filter-gainers" data-performance="gainers">
                        <span class="dashicons dashicons-arrow-up-alt"></span>
                        <?php esc_html_e('Gainers', 'plugin-boilerplate'); ?>
                    </button>
                    <button type="button" class="filter-button filter-losers" data-performance="losers">
                        <span class="dashicons dashicons-arrow-down-alt"></span>
                        <?php esc_html_e('Losers', 'plugin-boilerplate'); ?>
                    </button>
                    <button type="button" class="filter-button filter-volume" data-performance="volume">
                        <span class="dashicons dashicons-chart-bar"></span>
                        <?php esc_html_e('High Volume', 'plugin-boilerplate'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Advanced Filter Panels -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Advanced Filter Panels', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-component-showcase">
            <div class="filter-panel-demo">
                <div class="filter-panel">
                    <div class="filter-panel-header">
                        <h5><?php esc_html_e('Advanced Filters', 'plugin-boilerplate'); ?></h5>
                        <button type="button" class="filter-panel-toggle">
                            <span class="dashicons dashicons-arrow-down-alt2"></span>
                        </button>
                    </div>
                    <div class="filter-panel-content">
                        <div class="filter-row">
                            <div class="filter-column">
                                <label class="filter-field-label"><?php esc_html_e('Price Range', 'plugin-boilerplate'); ?></label>
                                <div class="filter-range">
                                    <input type="number" class="filter-input" placeholder="<?php esc_attr_e('Min', 'plugin-boilerplate'); ?>" min="0">
                                    <span class="filter-range-separator">—</span>
                                    <input type="number" class="filter-input" placeholder="<?php esc_attr_e('Max', 'plugin-boilerplate'); ?>" min="0">
                                </div>
                            </div>
                            <div class="filter-column">
                                <label class="filter-field-label"><?php esc_html_e('Market Cap', 'plugin-boilerplate'); ?></label>
                                <select class="filter-select">
                                    <option value=""><?php esc_html_e('Any Size', 'plugin-boilerplate'); ?></option>
                                    <option value="mega"><?php esc_html_e('Mega Cap (>$300B)', 'plugin-boilerplate'); ?></option>
                                    <option value="large"><?php esc_html_e('Large Cap ($10B-$300B)', 'plugin-boilerplate'); ?></option>
                                    <option value="mid"><?php esc_html_e('Mid Cap ($2B-$10B)', 'plugin-boilerplate'); ?></option>
                                    <option value="small"><?php esc_html_e('Small Cap (<$2B)', 'plugin-boilerplate'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="filter-row">
                            <div class="filter-column">
                                <label class="filter-field-label"><?php esc_html_e('Volume', 'plugin-boilerplate'); ?></label>
                                <input type="range" class="filter-slider" min="0" max="100" value="50">
                                <div class="filter-slider-labels">
                                    <span><?php esc_html_e('Low', 'plugin-boilerplate'); ?></span>
                                    <span><?php esc_html_e('High', 'plugin-boilerplate'); ?></span>
                                </div>
                            </div>
                            <div class="filter-column">
                                <label class="filter-field-label"><?php esc_html_e('Volatility', 'plugin-boilerplate'); ?></label>
                                <input type="range" class="filter-slider" min="0" max="100" value="30">
                                <div class="filter-slider-labels">
                                    <span><?php esc_html_e('Stable', 'plugin-boilerplate'); ?></span>
                                    <span><?php esc_html_e('Volatile', 'plugin-boilerplate'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="filter-actions">
                            <button type="button" class="tp-button tp-button-secondary"><?php esc_html_e('Reset', 'plugin-boilerplate'); ?></button>
                            <button type="button" class="tp-button tp-button-primary"><?php esc_html_e('Apply Filters', 'plugin-boilerplate'); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tag-based Filtering -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Tag-based Filtering', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-component-showcase">
            <div class="tag-filter-demo">
                <div class="tag-filter-container">
                    <div class="tag-filter-input-wrapper">
                        <input type="text" class="tag-filter-input" placeholder="<?php esc_attr_e('Add tags to filter...', 'plugin-boilerplate'); ?>">
                        <button type="button" class="tag-add-button">
                            <span class="dashicons dashicons-plus-alt"></span>
                        </button>
                    </div>
                    <div class="active-tags">
                        <span class="filter-tag">
                            Technology
                            <button type="button" class="tag-remove">
                                <span class="dashicons dashicons-no-alt"></span>
                            </button>
                        </span>
                        <span class="filter-tag">
                            High Volume
                            <button type="button" class="tag-remove">
                                <span class="dashicons dashicons-no-alt"></span>
                            </button>
                        </span>
                        <span class="filter-tag">
                            Earnings This Week
                            <button type="button" class="tag-remove">
                                <span class="dashicons dashicons-no-alt"></span>
                            </button>
                        </span>
                    </div>
                    <div class="suggested-tags">
                        <label class="tag-suggestions-label"><?php esc_html_e('Suggested:', 'plugin-boilerplate'); ?></label>
                        <button type="button" class="tag-suggestion">Finance</button>
                        <button type="button" class="tag-suggestion">Large Cap</button>
                        <button type="button" class="tag-suggestion">Dividend</button>
                        <button type="button" class="tag-suggestion">S&P 500</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Date Range Selectors -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Date Range Selectors', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-component-showcase">
            <!-- Single Date Picker -->
            <div class="date-filter-demo">
                <label class="filter-label"><?php esc_html_e('Single Date', 'plugin-boilerplate'); ?></label>
                <div class="date-input-wrapper">
                    <input type="date" class="date-input" value="<?php echo esc_attr( gmdate( 'Y-m-d' ) ); ?>">
                    <span class="date-icon dashicons dashicons-calendar-alt"></span>
                </div>
            </div>

            <!-- Date Range Picker -->
            <div class="date-filter-demo">
                <label class="filter-label"><?php esc_html_e('Date Range', 'plugin-boilerplate'); ?></label>
                <div class="date-range-wrapper">
                    <div class="date-input-wrapper">
                        <input type="date" class="date-input" value="<?php echo esc_attr( gmdate( 'Y-m-d', strtotime( '-7 days' ) ) ); ?>">
                        <span class="date-icon dashicons dashicons-calendar-alt"></span>
                    </div>
                    <span class="date-range-separator"><?php esc_html_e('to', 'plugin-boilerplate'); ?></span>
                    <div class="date-input-wrapper">
                        <input type="date" class="date-input" value="<?php echo esc_attr( gmdate( 'Y-m-d' ) ); ?>">
                        <span class="date-icon dashicons dashicons-calendar-alt"></span>
                    </div>
                </div>
            </div>

            <!-- Quick Date Presets -->
            <div class="date-filter-demo">
                <label class="filter-label"><?php esc_html_e('Quick Presets', 'plugin-boilerplate'); ?></label>
                <div class="date-preset-buttons">
                    <button type="button" class="date-preset-button" data-preset="today"><?php esc_html_e('Today', 'plugin-boilerplate'); ?></button>
                    <button type="button" class="date-preset-button" data-preset="week"><?php esc_html_e('This Week', 'plugin-boilerplate'); ?></button>
                    <button type="button" class="date-preset-button active" data-preset="month"><?php esc_html_e('This Month', 'plugin-boilerplate'); ?></button>
                    <button type="button" class="date-preset-button" data-preset="quarter"><?php esc_html_e('This Quarter', 'plugin-boilerplate'); ?></button>
                    <button type="button" class="date-preset-button" data-preset="year"><?php esc_html_e('This Year', 'plugin-boilerplate'); ?></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sorting Controls -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Sorting Controls', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-component-showcase">
            <!-- Sort Dropdown -->
            <div class="sort-demo">
                <label class="sort-label"><?php esc_html_e('Sort by', 'plugin-boilerplate'); ?></label>
                <select class="sort-select">
                    <option value="name_asc"><?php esc_html_e('Name (A-Z)', 'plugin-boilerplate'); ?></option>
                    <option value="name_desc"><?php esc_html_e('Name (Z-A)', 'plugin-boilerplate'); ?></option>
                    <option value="price_asc"><?php esc_html_e('Price (Low to High)', 'plugin-boilerplate'); ?></option>
                    <option value="price_desc" selected><?php esc_html_e('Price (High to Low)', 'plugin-boilerplate'); ?></option>
                    <option value="volume_desc"><?php esc_html_e('Volume (High to Low)', 'plugin-boilerplate'); ?></option>
                    <option value="change_desc"><?php esc_html_e('Change % (High to Low)', 'plugin-boilerplate'); ?></option>
                </select>
            </div>

            <!-- Sort Button Group -->
            <div class="sort-demo">
                <label class="sort-label"><?php esc_html_e('Quick Sort', 'plugin-boilerplate'); ?></label>
                <div class="sort-button-group">
                    <button type="button" class="sort-button active" data-sort="score" data-direction="desc">
                        <?php esc_html_e('Score', 'plugin-boilerplate'); ?>
                        <span class="sort-direction dashicons dashicons-arrow-down-alt"></span>
                    </button>
                    <button type="button" class="sort-button" data-sort="price" data-direction="asc">
                        <?php esc_html_e('Price', 'plugin-boilerplate'); ?>
                        <span class="sort-direction dashicons dashicons-arrow-up-alt"></span>
                    </button>
                    <button type="button" class="sort-button" data-sort="volume" data-direction="desc">
                        <?php esc_html_e('Volume', 'plugin-boilerplate'); ?>
                        <span class="sort-direction dashicons dashicons-arrow-down-alt"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Add inline script for filter functionality
    $plugin_boilerplate_filter_script = "
        jQuery(document).ready(function($) {
            // Search functionality
            $('.search-clear').on('click', function() {
                $(this).siblings('.search-input').val('').focus();
            });
            
            $('.search-advanced-toggle').on('click', function() {
                $(this).closest('.search-wrapper').siblings('.search-advanced-panel').slideToggle();
                $(this).find('.dashicons').toggleClass('dashicons-filter dashicons-dismiss');
            });
            
            // Filter button groups
            $('.filter-button').on('click', function() {
                if (!$(this).hasClass('active')) {
                    $(this).siblings('.filter-button').removeClass('active');
                    $(this).addClass('active');
                }
            });
            
            // Advanced filter panel toggle
            $('.filter-panel-toggle').on('click', function() {
                var \$panel = $(this).closest('.filter-panel');
                \$panel.find('.filter-panel-content').slideToggle();
                $(this).find('.dashicons').toggleClass('dashicons-arrow-down-alt2 dashicons-arrow-up-alt2');
                \$panel.toggleClass('expanded');
            });
            
            // Tag filtering
            $('.tag-add-button').on('click', function() {
                var input = $(this).siblings('.tag-filter-input');
                var value = input.val().trim();
                if (value) {
                    addFilterTag(value, $(this).closest('.tag-filter-container'));
                    input.val('');
                }
            });
            
            $('.tag-filter-input').on('keypress', function(e) {
                if (e.which === 13) { // Enter key
                    var value = $(this).val().trim();
                    if (value) {
                        addFilterTag(value, $(this).closest('.tag-filter-container'));
                        $(this).val('');
                    }
                }
            });
            
            $(document).on('click', '.tag-remove', function() {
                $(this).closest('.filter-tag').fadeOut(200, function() {
                    $(this).remove();
                });
            });
            
            $('.tag-suggestion').on('click', function() {
                var value = $(this).text();
                addFilterTag(value, $(this).closest('.tag-filter-container'));
                $(this).fadeOut();
            });
            
            function addFilterTag(text, container) {
                var tagHtml = '<span class=\"filter-tag\">' + text + '<button type=\"button\" class=\"tag-remove\"><span class=\"dashicons dashicons-no-alt\"></span></button></span>';
                container.find('.active-tags').append(tagHtml);
            }
            
            // Date presets
            $('.date-preset-button').on('click', function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                
                var preset = $(this).data('preset');
                var today = new Date();
                var startDate, endDate = today;
                
                switch(preset) {
                    case 'today':
                        startDate = today;
                        break;
                    case 'week':
                        startDate = new Date(today.getTime() - (7 * 24 * 60 * 60 * 1000));
                        break;
                    case 'month':
                        startDate = new Date(today.getFullYear(), today.getMonth(), 1);
                        break;
                    case 'quarter':
                        var quarter = Math.floor(today.getMonth() / 3);
                        startDate = new Date(today.getFullYear(), quarter * 3, 1);
                        break;
                    case 'year':
                        startDate = new Date(today.getFullYear(), 0, 1);
                        break;
                }
                
                // Update date inputs if they exist
                var dateInputs = $(this).closest('.date-filter-demo').find('.date-input');
                if (dateInputs.length === 2) {
                    dateInputs.eq(0).val(formatDate(startDate));
                    dateInputs.eq(1).val(formatDate(endDate));
                }
            });
            
            // Sort controls
            $('.sort-button').on('click', function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                
                // Toggle sort direction on active button
                var direction = $(this).data('direction');
                var newDirection = direction === 'asc' ? 'desc' : 'asc';
                $(this).data('direction', newDirection);
                
                var icon = $(this).find('.sort-direction');
                if (newDirection === 'asc') {
                    icon.removeClass('dashicons-arrow-down-alt').addClass('dashicons-arrow-up-alt');
                } else {
                    icon.removeClass('dashicons-arrow-up-alt').addClass('dashicons-arrow-down-alt');
                }
            });
            
            function formatDate(date) {
                var year = date.getFullYear();
                var month = ('0' + (date.getMonth() + 1)).slice(-2);
                var day = ('0' + date.getDate()).slice(-2);
                return year + '-' + month + '-' + day;
            }
        });
    ";
    
    wp_add_inline_script('jquery', $plugin_boilerplate_filter_script);
    ?>
</div>
