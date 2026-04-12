<?php
/**
 * Admin View: Notice - Install with wizard start button.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div id="message" class="updated plugin-boilerplate-message plugin-boilerplate-connect">
    <p><strong><?php esc_html_e( 'Welcome to WordPress Seed', 'plugin-boilerplate' ); ?></strong> &#8211; <?php esc_html_e( 'You&lsquo;re almost ready to begin using the plugin.', 'plugin-boilerplate' ); ?></p>
    <p class="submit"><a href="<?php echo esc_url( admin_url( 'admin.php?page=plugin-boilerplate-setup' ) ); ?>" class="button-primary"><?php esc_html_e( 'Run the Setup Wizard', 'plugin-boilerplate' ); ?></a> <a class="button-secondary skip" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'plugin-boilerplate-hide-notice', 'install' ), 'plugin_boilerplate_hide_notices_nonce', '_plugin_boilerplate_notice_nonce' ) ); ?>"><?php esc_html_e( 'Skip Setup', 'plugin-boilerplate' ); ?></a></p>
</div>
