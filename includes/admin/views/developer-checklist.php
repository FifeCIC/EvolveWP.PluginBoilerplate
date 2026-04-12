<?php
/**
 * Developer Checklist View
 *
 * @package EvolveWP Core/Admin/Views
 */

if (!defined('ABSPATH')) exit;

// Only show in dev environment
if (!EvolveWP_Core_Developer_Mode::is_dev_environment()) {
    wp_die('Access denied');
}

$plugin_boilerplate_checklist_file = plugin_dir_path(PLUGIN_BOILERPLATE_PLUGIN_FILE) . 'docs/DEVELOPER-CHECKLIST.md';
$checklist = file_exists($plugin_boilerplate_checklist_file) ? file_get_contents($plugin_boilerplate_checklist_file) : '';
?>

<div class="wrap plugin-boilerplate-developer-checklist">
    <h1><?php esc_html_e('Developer Checklist', 'plugin-boilerplate'); ?></h1>
    
    <div class="plugin-boilerplate-checklist-content">
        <?php if ($checklist): ?>
            <div class="markdown-content">
                <?php echo wp_kses_post(wpautop($checklist)); ?>
            </div>
        <?php else: ?>
            <p><?php esc_html_e('Checklist file not found.', 'plugin-boilerplate'); ?></p>
        <?php endif; ?>
    </div>
</div>


