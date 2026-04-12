<?php
/**
 * UI Library Status Indicators Partial
 *
 * @package plugin-boilerplate/Admin/Views/Partials
 * @version 1.2.0
 */

defined('ABSPATH') || exit;
?>
<div class="plugin-boilerplate-ui-section">
    <h3><?php esc_html_e('Status Indicators', 'plugin-boilerplate'); ?></h3>
    <p><?php esc_html_e('Visual indicators for trading status, market conditions, and data states using existing plugin-boilerplate styles.', 'plugin-boilerplate'); ?></p>
    
    <div class="plugin-boilerplate-component-group">
        <!-- Trading Status Badges -->
        <div class="component-demo">
            <h4><?php esc_html_e('Trading Status Badges', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-component-showcase">
                <div class="status-example">
                    <div class="status-label"><?php esc_html_e('Position Status', 'plugin-boilerplate'); ?></div>
                    <div class="status-badges-row">
                        <span class="plugin-boilerplate-badge plugin-boilerplate-badge-success"><?php esc_html_e('Open', 'plugin-boilerplate'); ?></span>
                        <span class="plugin-boilerplate-badge plugin-boilerplate-badge-warning"><?php esc_html_e('Pending', 'plugin-boilerplate'); ?></span>
                        <span class="plugin-boilerplate-badge plugin-boilerplate-badge-error"><?php esc_html_e('Closed', 'plugin-boilerplate'); ?></span>
                        <span class="plugin-boilerplate-badge plugin-boilerplate-badge-info"><?php esc_html_e('Monitoring', 'plugin-boilerplate'); ?></span>
                    </div>
                </div>
                
                <div class="status-example">
                    <div class="status-label"><?php esc_html_e('Market Status', 'plugin-boilerplate'); ?></div>
                    <div class="status-badges-row">
                        <span class="plugin-boilerplate-badge plugin-boilerplate-badge-success">
                            <span class="dashicons dashicons-yes-alt"></span>
                            <?php esc_html_e('Market Open', 'plugin-boilerplate'); ?>
                        </span>
                        <span class="plugin-boilerplate-badge plugin-boilerplate-badge-error">
                            <span class="dashicons dashicons-dismiss"></span>
                            <?php esc_html_e('Market Closed', 'plugin-boilerplate'); ?>
                        </span>
                        <span class="plugin-boilerplate-badge plugin-boilerplate-badge-warning">
                            <span class="dashicons dashicons-clock"></span>
                            <?php esc_html_e('Pre-Market', 'plugin-boilerplate'); ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Connection Status -->
        <div class="component-demo">
            <h4><?php esc_html_e('Connection Status', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-component-showcase">
                <div class="connection-status-grid">
                    <div class="connection-status-item">
                        <div class="connection-status-header">
                            <span class="connection-status-dot connection-status-connected"></span>
                            <span class="connection-status-label"><?php esc_html_e('Alpha Vantage API', 'plugin-boilerplate'); ?></span>
                        </div>
                        <div class="connection-status-details">
                            <small><?php esc_html_e('Connected • 25ms latency', 'plugin-boilerplate'); ?></small>
                        </div>
                    </div>
                    
                    <div class="connection-status-item">
                        <div class="connection-status-header">
                            <span class="connection-status-dot connection-status-warning"></span>
                            <span class="connection-status-label"><?php esc_html_e('Trading Platform', 'plugin-boilerplate'); ?></span>
                        </div>
                        <div class="connection-status-details">
                            <small><?php esc_html_e('Limited • Rate limited', 'plugin-boilerplate'); ?></small>
                        </div>
                    </div>
                    
                    <div class="connection-status-item">
                        <div class="connection-status-header">
                            <span class="connection-status-dot connection-status-error"></span>
                            <span class="connection-status-label"><?php esc_html_e('News Feed', 'plugin-boilerplate'); ?></span>
                        </div>
                        <div class="connection-status-details">
                            <small><?php esc_html_e('Disconnected • Check credentials', 'plugin-boilerplate'); ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Performance Indicators -->
        <div class="component-demo">
            <h4><?php esc_html_e('Performance Indicators', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-component-showcase">
                <div class="performance-indicators-grid">
                    <div class="performance-card">
                        <div class="performance-value positive">+12.5%</div>
                        <div class="performance-label"><?php esc_html_e('Portfolio Return', 'plugin-boilerplate'); ?></div>
                        <div class="performance-trend">
                            <span class="dashicons dashicons-arrow-up-alt"></span>
                            <span class="trend-value">+2.3%</span>
                        </div>
                    </div>
                    
                    <div class="performance-card">
                        <div class="performance-value negative">-3.8%</div>
                        <div class="performance-label"><?php esc_html_e('Daily P&L', 'plugin-boilerplate'); ?></div>
                        <div class="performance-trend">
                            <span class="dashicons dashicons-arrow-down-alt"></span>
                            <span class="trend-value">-1.2%</span>
                        </div>
                    </div>
                    
                    <div class="performance-card">
                        <div class="performance-value neutral">$45,230</div>
                        <div class="performance-label"><?php esc_html_e('Available Balance', 'plugin-boilerplate'); ?></div>
                        <div class="performance-trend">
                            <span class="dashicons dashicons-minus"></span>
                            <span class="trend-value">0.0%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Activity Status -->
        <div class="component-demo">
            <h4><?php esc_html_e('Activity Status', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-component-showcase">
                <div class="activity-status-list">
                    <div class="activity-status-item">
                        <div class="activity-status-icon">
                            <span class="spinner is-active"></span>
                        </div>
                        <div class="activity-status-content">
                            <div class="activity-status-title"><?php esc_html_e('Processing Order', 'plugin-boilerplate'); ?></div>
                            <div class="activity-status-description"><?php esc_html_e('BUY 100 AAPL @ Market', 'plugin-boilerplate'); ?></div>
                        </div>
                        <div class="activity-status-time"><?php esc_html_e('2m ago', 'plugin-boilerplate'); ?></div>
                    </div>
                    
                    <div class="activity-status-item">
                        <div class="activity-status-icon activity-success">
                            <span class="dashicons dashicons-yes-alt"></span>
                        </div>
                        <div class="activity-status-content">
                            <div class="activity-status-title"><?php esc_html_e('Order Filled', 'plugin-boilerplate'); ?></div>
                            <div class="activity-status-description"><?php esc_html_e('SELL 50 TSLA @ $245.50', 'plugin-boilerplate'); ?></div>
                        </div>
                        <div class="activity-status-time"><?php esc_html_e('5m ago', 'plugin-boilerplate'); ?></div>
                    </div>
                    
                    <div class="activity-status-item">
                        <div class="activity-status-icon activity-error">
                            <span class="dashicons dashicons-warning"></span>
                        </div>
                        <div class="activity-status-content">
                            <div class="activity-status-title"><?php esc_html_e('Order Rejected', 'plugin-boilerplate'); ?></div>
                            <div class="activity-status-description"><?php esc_html_e('Insufficient buying power', 'plugin-boilerplate'); ?></div>
                        </div>
                        <div class="activity-status-time"><?php esc_html_e('8m ago', 'plugin-boilerplate'); ?></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Process Status Indicators -->
        <div class="component-demo">
            <h4><?php esc_html_e('Process Status Indicators', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-component-showcase">
                <div class="process-status-examples">
                    <div class="process-status-item">
                        <span class="process-status-dot process-status-running"></span>
                        <span class="process-status-label"><?php esc_html_e('Running Process', 'plugin-boilerplate'); ?></span>
                        <span class="process-runtime">00:02:45</span>
                    </div>
                    
                    <div class="process-status-item">
                        <span class="process-status-dot process-status-stopped"></span>
                        <span class="process-status-label"><?php esc_html_e('Stopped Process', 'plugin-boilerplate'); ?></span>
                        <span class="process-runtime">--:--:--</span>
                    </div>
                    
                    <div class="process-status-item">
                        <span class="process-status-dot process-status-error"></span>
                        <span class="process-status-label"><?php esc_html_e('Error State', 'plugin-boilerplate'); ?></span>
                        <span class="process-runtime">Failed</span>
                    </div>
                </div>
                
                <div class="component-notes">
                    <h5><?php esc_html_e('Usage Notes:', 'plugin-boilerplate'); ?></h5>
                    <ul>
                        <li><?php esc_html_e('Green dot with pulse animation indicates active/running state', 'plugin-boilerplate'); ?></li>
                        <li><?php esc_html_e('Red dot indicates stopped/inactive state', 'plugin-boilerplate'); ?></li>
                        <li><?php esc_html_e('Orange dot indicates error or warning state', 'plugin-boilerplate'); ?></li>
                        <li><?php esc_html_e('Runtime counter uses monospace font for consistent alignment', 'plugin-boilerplate'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Data Freshness Indicators -->
        <div class="component-demo">
            <h4><?php esc_html_e('Data Freshness Indicators', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-component-showcase">
                <div class="data-freshness-grid">
                    <div class="data-freshness-item">
                        <div class="data-freshness-header">
                            <span class="data-freshness-title"><?php esc_html_e('Market Data', 'plugin-boilerplate'); ?></span>
                            <span class="data-freshness-indicator fresh">
                                <span class="dashicons dashicons-update"></span>
                            </span>
                        </div>
                        <div class="data-freshness-timestamp"><?php esc_html_e('Last updated: 2 seconds ago', 'plugin-boilerplate'); ?></div>
                    </div>
                    
                    <div class="data-freshness-item">
                        <div class="data-freshness-header">
                            <span class="data-freshness-title"><?php esc_html_e('Portfolio Values', 'plugin-boilerplate'); ?></span>
                            <span class="data-freshness-indicator stale">
                                <span class="dashicons dashicons-clock"></span>
                            </span>
                        </div>
                        <div class="data-freshness-timestamp"><?php esc_html_e('Last updated: 5 minutes ago', 'plugin-boilerplate'); ?></div>
                    </div>
                    
                    <div class="data-freshness-item">
                        <div class="data-freshness-header">
                            <span class="data-freshness-title"><?php esc_html_e('News Feed', 'plugin-boilerplate'); ?></span>
                            <span class="data-freshness-indicator error">
                                <span class="dashicons dashicons-dismiss"></span>
                            </span>
                        </div>
                        <div class="data-freshness-timestamp"><?php esc_html_e('Update failed - check connection', 'plugin-boilerplate'); ?></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Health Check Status -->
        <div class="component-demo">
            <h4><?php esc_html_e('System Health Status', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-component-showcase">
                <div class="health-check-container">
                    <div class="health-check-overall">
                        <div class="health-check-score">
                            <div class="health-score-value">87%</div>
                            <div class="health-score-label"><?php esc_html_e('System Health', 'plugin-boilerplate'); ?></div>
                        </div>
                        <div class="health-check-status health-good">
                            <span class="dashicons dashicons-yes-alt"></span>
                            <?php esc_html_e('Good', 'plugin-boilerplate'); ?>
                        </div>
                    </div>
                    
                    <div class="health-check-details">
                        <div class="health-check-item">
                            <span class="health-check-icon health-check-pass">
                                <span class="dashicons dashicons-yes"></span>
                            </span>
                            <span class="health-check-label"><?php esc_html_e('API Connections', 'plugin-boilerplate'); ?></span>
                            <span class="health-check-value"><?php esc_html_e('3/3 Active', 'plugin-boilerplate'); ?></span>
                        </div>
                        
                        <div class="health-check-item">
                            <span class="health-check-icon health-check-warning">
                                <span class="dashicons dashicons-warning"></span>
                            </span>
                            <span class="health-check-label"><?php esc_html_e('Data Sync', 'plugin-boilerplate'); ?></span>
                            <span class="health-check-value"><?php esc_html_e('2 minute delay', 'plugin-boilerplate'); ?></span>
                        </div>
                        
                        <div class="health-check-item">
                            <span class="health-check-icon health-check-pass">
                                <span class="dashicons dashicons-yes"></span>
                            </span>
                            <span class="health-check-label"><?php esc_html_e('Database', 'plugin-boilerplate'); ?></span>
                            <span class="health-check-value"><?php esc_html_e('Optimal', 'plugin-boilerplate'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Trading Signals Status -->
        <div class="component-demo">
            <h4><?php esc_html_e('Trading Signals Status', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-component-showcase">
                <div class="signals-status-grid">
                    <div class="signal-status-card signal-bullish">
                        <div class="signal-status-header">
                            <span class="signal-status-icon">
                                <span class="dashicons dashicons-arrow-up-alt"></span>
                            </span>
                            <span class="signal-status-label"><?php esc_html_e('Bullish Signal', 'plugin-boilerplate'); ?></span>
                        </div>
                        <div class="signal-status-count">12</div>
                        <div class="signal-status-description"><?php esc_html_e('Active buy signals', 'plugin-boilerplate'); ?></div>
                    </div>
                    
                    <div class="signal-status-card signal-bearish">
                        <div class="signal-status-header">
                            <span class="signal-status-icon">
                                <span class="dashicons dashicons-arrow-down-alt"></span>
                            </span>
                            <span class="signal-status-label"><?php esc_html_e('Bearish Signal', 'plugin-boilerplate'); ?></span>
                        </div>
                        <div class="signal-status-count">5</div>
                        <div class="signal-status-description"><?php esc_html_e('Active sell signals', 'plugin-boilerplate'); ?></div>
                    </div>
                    
                    <div class="signal-status-card signal-neutral">
                        <div class="signal-status-header">
                            <span class="signal-status-icon">
                                <span class="dashicons dashicons-minus"></span>
                            </span>
                            <span class="signal-status-label"><?php esc_html_e('Neutral', 'plugin-boilerplate'); ?></span>
                        </div>
                        <div class="signal-status-count">28</div>
                        <div class="signal-status-description"><?php esc_html_e('Watchlist items', 'plugin-boilerplate'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    // Add interactive demo script — variable prefixed with plugin_boilerplate_ to satisfy global variable naming standards.
    $plugin_boilerplate_status_script = "
        jQuery(document).ready(function($) {
            // Simulate real-time updates for connection status
            function updateConnectionStatus() {
                $('.connection-status-dot').each(function() {
                    var dot = $(this);
                    var statusClasses = ['connection-status-connected', 'connection-status-warning', 'connection-status-error'];
                    var currentClass = statusClasses.find(cls => dot.hasClass(cls));
                    
                    // Randomly change status occasionally
                    if (Math.random() < 0.1) {
                        var newClass = statusClasses[Math.floor(Math.random() * statusClasses.length)];
                        dot.removeClass(statusClasses.join(' ')).addClass(newClass);
                        
                        // Update status text
                        var statusText = '';
                        switch(newClass) {
                            case 'connection-status-connected':
                                statusText = 'Connected • ' + Math.floor(Math.random() * 50 + 10) + 'ms latency';
                                break;
                            case 'connection-status-warning':
                                statusText = 'Limited • Rate limited';
                                break;
                            case 'connection-status-error':
                                statusText = 'Disconnected • Check credentials';
                                break;
                        }
                        dot.closest('.connection-status-item').find('.connection-status-details small').text(statusText);
                    }
                });
            }
            
            // Simulate performance value changes
            function updatePerformanceValues() {
                $('.performance-value').each(function() {
                    var element = $(this);
                    if (Math.random() < 0.2) {
                        var currentText = element.text();
                        var isPercentage = currentText.includes('%');
                        var isDollar = currentText.includes('$');
                        
                        if (isPercentage && !isDollar) {
                            var value = parseFloat(currentText.replace(/[^-\d.]/g, ''));
                            var change = (Math.random() - 0.5) * 2; // -1 to +1
                            var newValue = value + change;
                            var newText = (newValue >= 0 ? '+' : '') + newValue.toFixed(1) + '%';
                            
                            element.text(newText);
                            element.removeClass('positive negative neutral');
                            if (newValue > 0) {
                                element.addClass('positive');
                            } else if (newValue < 0) {
                                element.addClass('negative');
                            } else {
                                element.addClass('neutral');
                            }
                        }
                    }
                });
            }
            
            // Simulate data freshness updates
            function updateDataFreshness() {
                $('.data-freshness-timestamp').each(function() {
                    var element = $(this);
                    var text = element.text();
                    
                    if (text.includes('seconds ago')) {
                        var seconds = parseInt(text.match(/\\d+/)[0]) + 1;
                        if (seconds >= 60) {
                            element.text('Last updated: 1 minute ago');
                            element.siblings('.data-freshness-header').find('.data-freshness-indicator')
                                .removeClass('fresh').addClass('stale');
                        } else {
                            element.text('Last updated: ' + seconds + ' seconds ago');
                        }
                    } else if (text.includes('minute ago') || text.includes('minutes ago')) {
                        var minutes = parseInt(text.match(/\\d+/)[0]) + 1;
                        element.text('Last updated: ' + minutes + ' minute' + (minutes > 1 ? 's' : '') + ' ago');
                        if (minutes > 10) {
                            element.siblings('.data-freshness-header').find('.data-freshness-indicator')
                                .removeClass('fresh stale').addClass('error');
                            element.text('Update failed - check connection');
                        }
                    }
                });
            }
            
            // Start simulations
            setInterval(updateConnectionStatus, 3000);
            setInterval(updatePerformanceValues, 5000);
            setInterval(updateDataFreshness, 2000);
            
            // Click handlers for status badges
            $('.plugin-boilerplate-badge').on('click', function() {
                alert('Status: ' + $(this).text().trim());
            });
            
            // Click handlers for health check items
            $('.health-check-item').on('click', function() {
                var label = $(this).find('.health-check-label').text();
                var value = $(this).find('.health-check-value').text();
                alert(label + ': ' + value);
            });
        });
    ";
    
    wp_add_inline_script('jquery', $plugin_boilerplate_status_script);
    ?>
</div>
