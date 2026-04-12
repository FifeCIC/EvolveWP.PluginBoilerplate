<?php
/**
 * UI Library Color Palette Partial
 *
 * @package plugin-boilerplate/Admin/Views/Partials
 * @version 1.0.0
 */

defined('ABSPATH') || exit;
?>
<div class="plugin-boilerplate-ui-section">
    <h3><?php esc_html_e('Color Palette', 'plugin-boilerplate'); ?></h3>
    <p><?php esc_html_e('The plugin-boilerplate color system uses CSS custom properties for consistent theming.', 'plugin-boilerplate'); ?></p>

    <!-- Primary Colors -->
    <div class="plugin-boilerplate-color-group">
        <h4><?php esc_html_e('Primary Colors', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-color-grid">
            <div class="plugin-boilerplate-color-item" onclick=plugin-boilerplateUILibrary.showColorInfo(this, 'Primary', '#2271b1', '--plugin-boilerplate-color-primary')">
                <div class="plugin-boilerplate-color-swatch plugin-boilerplate-color-primary"></div>
                <div class="plugin-boilerplate-color-info">
                    <span class="plugin-boilerplate-color-name">Primary</span>
                    <span class="plugin-boilerplate-color-value">#2271b1</span>
                </div>
            </div>
            <div class="plugin-boilerplate-color-item" onclick=plugin-boilerplateUILibrary.showColorInfo(this, 'Primary Dark', '#135e96', '--plugin-boilerplate-color-primary-dark')">
                <div class="plugin-boilerplate-color-swatch plugin-boilerplate-color-primary-dark"></div>
                <div class="plugin-boilerplate-color-info">
                    <span class="plugin-boilerplate-color-name">Primary Dark</span>
                    <span class="plugin-boilerplate-color-value">#135e96</span>
                </div>
            </div>
            <div class="plugin-boilerplate-color-item" onclick=plugin-boilerplateUILibrary.showColorInfo(this, 'Primary Light', '#72aee6', '--plugin-boilerplate-color-primary-light')">
                <div class="plugin-boilerplate-color-swatch plugin-boilerplate-color-primary-light"></div>
                <div class="plugin-boilerplate-color-info">
                    <span class="plugin-boilerplate-color-name">Primary Light</span>
                    <span class="plugin-boilerplate-color-value">#72aee6</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Colors -->
    <div class="plugin-boilerplate-color-group">
        <h4><?php esc_html_e('Status Colors', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-color-grid">
            <div class="plugin-boilerplate-color-item" onclick=plugin-boilerplateUILibrary.showColorInfo(this, 'Success', '#00a32a', '--plugin-boilerplate-color-success')">
                <div class="plugin-boilerplate-color-swatch plugin-boilerplate-color-success"></div>
                <div class="plugin-boilerplate-color-info">
                    <span class="plugin-boilerplate-color-name">Success</span>
                    <span class="plugin-boilerplate-color-value">#00a32a</span>
                </div>
            </div>
            <div class="plugin-boilerplate-color-item" onclick=plugin-boilerplateUILibrary.showColorInfo(this, 'Warning', '#dba617', '--plugin-boilerplate-color-warning')">
                <div class="plugin-boilerplate-color-swatch plugin-boilerplate-color-warning"></div>
                <div class="plugin-boilerplate-color-info">
                    <span class="plugin-boilerplate-color-name">Warning</span>
                    <span class="plugin-boilerplate-color-value">#dba617</span>
                </div>
            </div>
            <div class="plugin-boilerplate-color-item" onclick=plugin-boilerplateUILibrary.showColorInfo(this, 'Error', '#d63638', '--plugin-boilerplate-color-error')">
                <div class="plugin-boilerplate-color-swatch plugin-boilerplate-color-error"></div>
                <div class="plugin-boilerplate-color-info">
                    <span class="plugin-boilerplate-color-name">Error</span>
                    <span class="plugin-boilerplate-color-value">#d63638</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Neutral Colors -->
    <div class="plugin-boilerplate-color-group">
        <h4><?php esc_html_e('Neutral Colors', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-color-grid">
            <div class="plugin-boilerplate-color-item" onclick=plugin-boilerplateUILibrary.showColorInfo(this, 'White', '#ffffff', '--plugin-boilerplate-color-white')">
                <div class="plugin-boilerplate-color-swatch plugin-boilerplate-color-white"></div>
                <div class="plugin-boilerplate-color-info">
                    <span class="plugin-boilerplate-color-name">White</span>
                    <span class="plugin-boilerplate-color-value">#ffffff</span>
                </div>
            </div>
            <div class="plugin-boilerplate-color-item" onclick=plugin-boilerplateUILibrary.showColorInfo(this, 'Gray 100', '#f0f0f1', '--plugin-boilerplate-color-gray-100')">
                <div class="plugin-boilerplate-color-swatch plugin-boilerplate-color-gray-100"></div>
                <div class="plugin-boilerplate-color-info">
                    <span class="plugin-boilerplate-color-name">Gray 100</span>
                    <span class="plugin-boilerplate-color-value">#f0f0f1</span>
                </div>
            </div>
            <div class="plugin-boilerplate-color-item" onclick=plugin-boilerplateUILibrary.showColorInfo(this, 'Gray 300', '#dcdcde', '--plugin-boilerplate-color-gray-300')">
                <div class="plugin-boilerplate-color-swatch plugin-boilerplate-color-gray-300"></div>
                <div class="plugin-boilerplate-color-info">
                    <span class="plugin-boilerplate-color-name">Gray 300</span>
                    <span class="plugin-boilerplate-color-value">#dcdcde</span>
                </div>
            </div>
            <div class="plugin-boilerplate-color-item" onclick=plugin-boilerplateUILibrary.showColorInfo(this, 'Gray 500', '#a7aaad', '--plugin-boilerplate-color-gray-500')">
                <div class="plugin-boilerplate-color-swatch plugin-boilerplate-color-gray-500"></div>
                <div class="plugin-boilerplate-color-info">
                    <span class="plugin-boilerplate-color-name">Gray 500</span>
                    <span class="plugin-boilerplate-color-value">#a7aaad</span>
                </div>
            </div>
            <div class="plugin-boilerplate-color-item" onclick=plugin-boilerplateUILibrary.showColorInfo(this, 'Gray 700', '#646970', '--plugin-boilerplate-color-gray-700')">
                <div class="plugin-boilerplate-color-swatch plugin-boilerplate-color-gray-700"></div>
                <div class="plugin-boilerplate-color-info">
                    <span class="plugin-boilerplate-color-name">Gray 700</span>
                    <span class="plugin-boilerplate-color-value">#646970</span>
                </div>
            </div>
            <div class="plugin-boilerplate-color-item" onclick=plugin-boilerplateUILibrary.showColorInfo(this, 'Gray 900', '#1d2327', '--plugin-boilerplate-color-gray-900')">
                <div class="plugin-boilerplate-color-swatch plugin-boilerplate-color-gray-900"></div>
                <div class="plugin-boilerplate-color-info">
                    <span class="plugin-boilerplate-color-name">Gray 900</span>
                    <span class="plugin-boilerplate-color-value">#1d2327</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Color Information Display -->
    <div id="plugin-boilerplate-color-info-display" class="plugin-boilerplate-color-info-panel" style="display: none;">
        <h4><?php esc_html_e('Color Information', 'plugin-boilerplate'); ?></h4>
        <div id="plugin-boilerplate-color-details"></div>
    </div>
</div>
