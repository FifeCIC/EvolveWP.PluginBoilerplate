<?php
/**
 * UI Library Button Components Partial
 *
 * @package plugin-boilerplate/Admin/Views/Partials
 * @version 1.0.7
 */

defined('ABSPATH') || exit;
?>
<div class="plugin-boilerplate-ui-section">
    <h3><?php esc_html_e('Button Components', 'plugin-boilerplate'); ?></h3>
    <p><?php esc_html_e('Standard button variations for consistent UI interactions.', 'plugin-boilerplate'); ?></p>

    <!-- Primary Buttons -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Primary Buttons', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-component-showcase">
            <button class="button button-primary"><?php esc_html_e('Primary Button', 'plugin-boilerplate'); ?></button>
            <button class="button button-primary" disabled><?php esc_html_e('Disabled Primary', 'plugin-boilerplate'); ?></button>
            <button class="button button-primary button-large"><?php esc_html_e('Large Primary', 'plugin-boilerplate'); ?></button>
            <button class="button button-primary button-small"><?php esc_html_e('Small Primary', 'plugin-boilerplate'); ?></button>
        </div>
    </div>

    <!-- Secondary Buttons -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Secondary Buttons', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-component-showcase">
            <button class="button button-secondary"><?php esc_html_e('Secondary Button', 'plugin-boilerplate'); ?></button>
            <button class="button button-secondary" disabled><?php esc_html_e('Disabled Secondary', 'plugin-boilerplate'); ?></button>
            <button class="button button-secondary button-large"><?php esc_html_e('Large Secondary', 'plugin-boilerplate'); ?></button>
            <button class="button button-secondary button-small"><?php esc_html_e('Small Secondary', 'plugin-boilerplate'); ?></button>
        </div>
    </div>

    <!-- Icon Buttons -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Icon Buttons', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-component-showcase">
            <button class="button button-primary">
                <span class="dashicons dashicons-plus-alt"></span>
                <?php esc_html_e('Add New', 'plugin-boilerplate'); ?>
            </button>
            <button class="button button-secondary">
                <span class="dashicons dashicons-edit"></span>
                <?php esc_html_e('Edit', 'plugin-boilerplate'); ?>
            </button>
            <button class="button button-secondary">
                <span class="dashicons dashicons-trash"></span>
                <?php esc_html_e('Delete', 'plugin-boilerplate'); ?>
            </button>
            <button class="button button-secondary">
                <span class="dashicons dashicons-download"></span>
                <?php esc_html_e('Download', 'plugin-boilerplate'); ?>
            </button>
        </div>
    </div>

    <!-- Link Buttons -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Link Buttons', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-component-showcase">
            <button class="button-link"><?php esc_html_e('Link Button', 'plugin-boilerplate'); ?></button>
            <button class="button-link-delete"><?php esc_html_e('Delete Link', 'plugin-boilerplate'); ?></button>
            <button class="button-link" disabled><?php esc_html_e('Disabled Link', 'plugin-boilerplate'); ?></button>
        </div>
    </div>

    <!-- Button Groups -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Button Groups', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-component-showcase">
            <div class="button-group">
                <button class="button button-secondary"><?php esc_html_e('Left', 'plugin-boilerplate'); ?></button>
                <button class="button button-secondary"><?php esc_html_e('Center', 'plugin-boilerplate'); ?></button>
                <button class="button button-secondary"><?php esc_html_e('Right', 'plugin-boilerplate'); ?></button>
            </div>
        </div>
    </div>

    <!-- API Status Buttons -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('API Status Buttons', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-component-showcase">
            <button class="button"><?php esc_html_e('Call Test', 'plugin-boilerplate'); ?></button>
            <button class="button"><?php esc_html_e('Query Test', 'plugin-boilerplate'); ?></button>
            <button class="button"><?php esc_html_e('Status Details', 'plugin-boilerplate'); ?></button>
            <button class="button"><?php esc_html_e('Switch to Paper', 'plugin-boilerplate'); ?></button>
            <button class="button"><?php esc_html_e('Switch to Live', 'plugin-boilerplate'); ?></button>
            <button class="button"><?php esc_html_e('Enable', 'plugin-boilerplate'); ?></button>
            <button class="button"><?php esc_html_e('Disable', 'plugin-boilerplate'); ?></button>
        </div>
    </div>

    <!-- Status Badge Buttons -->
    <div class="plugin-boilerplate-component-group">
        <h4><?php esc_html_e('Status Badge Buttons', 'plugin-boilerplate'); ?></h4>
        <div class="plugin-boilerplate-component-showcase">
            <span class="status-badge status-active"><?php esc_html_e('Operational', 'plugin-boilerplate'); ?></span>
            <span class="status-badge status-inactive"><?php esc_html_e('Disabled', 'plugin-boilerplate'); ?></span>
            <span class="type-badge type-data"><?php esc_html_e('Data Only', 'plugin-boilerplate'); ?></span>
            <span class="type-badge type-trading"><?php esc_html_e('Trading', 'plugin-boilerplate'); ?></span>
            <span class="mode-badge mode-live"><?php esc_html_e('Live', 'plugin-boilerplate'); ?></span>
            <span class="mode-badge mode-paper"><?php esc_html_e('Paper', 'plugin-boilerplate'); ?></span>
            <span class="rate-limit-badge rate-normal"><?php esc_html_e('Normal', 'plugin-boilerplate'); ?></span>
        </div>
    </div>
</div>
