<?php
/**
 * Uninstall Feedback System
 * Shows modal on plugin deactivation to collect user feedback
 *
 * @package EvolveWP Core/Admin
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class EvolveWP_Core_Uninstall_Feedback {
    
    public function __construct() {
        add_action('admin_footer', array($this, 'render_modal'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_assets'));
        add_action('wp_ajax_plugin_boilerplate_uninstall_feedback', array($this, 'handle_feedback'));
    }
    
    public function enqueue_assets($hook) {
        if ($hook !== 'plugins.php') {
            return;
        }
        
        wp_enqueue_style('plugin-boilerplate-uninstall-feedback', plugins_url('assets/css/uninstall-feedback.css', PLUGIN_BOILERPLATE_PLUGIN_FILE), array(), PLUGIN_BOILERPLATE_VERSION);
        wp_enqueue_script('plugin-boilerplate-uninstall-feedback', plugins_url('assets/js/uninstall-feedback.js', PLUGIN_BOILERPLATE_PLUGIN_FILE), array('jquery'), PLUGIN_BOILERPLATE_VERSION, true);
        
        wp_localize_script('plugin-boilerplate-uninstall-feedback', 'plugin-boilerplateUninstall', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('plugin_boilerplate_uninstall_feedback'),
            'plugin_slug' => PLUGIN_BOILERPLATE_PLUGIN_BASENAME,
        ));
    }
    
    public function render_modal() {
        $screen = get_current_screen();
        if ($screen->id !== 'plugins') {
            return;
        }
        ?>
        <div id="plugin-boilerplate-uninstall-feedback-modal" style="display:none;">
            <div class="plugin-boilerplate-modal-overlay"></div>
            <div class="plugin-boilerplate-modal-content">
                <div class="plugin-boilerplate-modal-header">
                    <h2><?php esc_html_e('Quick Feedback', 'plugin-boilerplate'); ?></h2>
                    <button class="plugin-boilerplate-modal-close">&times;</button>
                </div>
                
                <div class="plugin-boilerplate-modal-body">
                    <p><?php esc_html_e('If you have a moment, please let us know why you\'re deactivating EvolveWP Core:', 'plugin-boilerplate'); ?></p>
                    
                    <form id="plugin-boilerplate-feedback-form">
                        <label class="plugin-boilerplate-reason">
                            <input type="radio" name="reason" value="temporary">
                            <span><?php esc_html_e('Temporary deactivation', 'plugin-boilerplate'); ?></span>
                        </label>
                        
                        <label class="plugin-boilerplate-reason">
                            <input type="radio" name="reason" value="missing_features">
                            <span><?php esc_html_e('Missing features I need', 'plugin-boilerplate'); ?></span>
                        </label>
                        
                        <label class="plugin-boilerplate-reason">
                            <input type="radio" name="reason" value="found_better">
                            <span><?php esc_html_e('Found a better plugin', 'plugin-boilerplate'); ?></span>
                        </label>
                        
                        <label class="plugin-boilerplate-reason">
                            <input type="radio" name="reason" value="not_working">
                            <span><?php esc_html_e('Plugin not working', 'plugin-boilerplate'); ?></span>
                        </label>
                        
                        <label class="plugin-boilerplate-reason">
                            <input type="radio" name="reason" value="too_complex">
                            <span><?php esc_html_e('Too complex to use', 'plugin-boilerplate'); ?></span>
                        </label>
                        
                        <label class="plugin-boilerplate-reason">
                            <input type="radio" name="reason" value="other">
                            <span><?php esc_html_e('Other', 'plugin-boilerplate'); ?></span>
                        </label>
                        
                        <div class="plugin-boilerplate-details" style="display:none;">
                            <textarea name="details" placeholder="<?php esc_attr_e('Please tell us more...', 'plugin-boilerplate'); ?>" rows="4"></textarea>
                        </div>
                        
                        <div class="plugin-boilerplate-email">
                            <input type="email" name="email" placeholder="<?php esc_attr_e('Your email (optional)', 'plugin-boilerplate'); ?>">
                            <small><?php esc_html_e('We may follow up to help resolve issues', 'plugin-boilerplate'); ?></small>
                        </div>
                    </form>
                </div>
                
                <div class="plugin-boilerplate-modal-footer">
                    <button class="button button-secondary plugin-boilerplate-skip"><?php esc_html_e('Skip & Deactivate', 'plugin-boilerplate'); ?></button>
                    <button class="button button-primary plugin-boilerplate-submit"><?php esc_html_e('Submit & Deactivate', 'plugin-boilerplate'); ?></button>
                </div>
            </div>
        </div>
        <?php
    }
    
    public function handle_feedback() {
        check_ajax_referer('plugin_boilerplate_uninstall_feedback', 'nonce');
        
        $reason = sanitize_text_field(wp_unslash($_POST['reason'] ?? ''));
        $details = sanitize_textarea_field(wp_unslash($_POST['details'] ?? ''));
        $email = sanitize_email(wp_unslash($_POST['email'] ?? ''));
        
        // Log feedback
        $feedback = array(
            'reason' => $reason,
            'details' => $details,
            'email' => $email,
            'date' => current_time('mysql'),
            'site_url' => get_site_url(),
            'wp_version' => get_bloginfo('version'),
            'php_version' => PHP_VERSION,
        );
        
        // Save to options (last 50 feedbacks)
        $feedbacks = get_option('plugin_boilerplate_uninstall_feedbacks', array());
        array_unshift($feedbacks, $feedback);
        $feedbacks = array_slice($feedbacks, 0, 50);
        update_option('plugin_boilerplate_uninstall_feedbacks', $feedbacks);
        
        // Send email to admin
        $admin_email = get_option('admin_email');
        /* translators: %s: Site name */
        $subject = sprintf(__('[%s] Plugin Deactivation Feedback', 'plugin-boilerplate'), get_bloginfo('name'));
        /* translators: 1: Reason, 2: Details, 3: Email, 4: Site URL, 5: WP Version, 6: PHP Version */
        $message = sprintf(
            __("Reason: %1\$s\n\nDetails: %2\$s\n\nEmail: %3\$s\n\nSite: %4\$s\nWP Version: %5\$s\nPHP Version: %6\$s", 'plugin-boilerplate'),
            $reason,
            $details,
            $email,
            get_site_url(),
            get_bloginfo('version'),
            PHP_VERSION
        );
        
        wp_mail($admin_email, $subject, $message);
        
        // Optional: Send to external API
        // wp_remote_post('https://your-api.com/feedback', array('body' => $feedback));
        
        wp_send_json_success();
    }
}

return new EvolveWP_Core_Uninstall_Feedback();
