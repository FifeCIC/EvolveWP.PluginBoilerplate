<?php
/**
 * Admin View: Notice - Updated
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div id="message" class="updated plugin-boilerplate-message plugin-boilerplate-connect">
    <a class="plugin-boilerplate-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'plugin-boilerplate-hide-notice', 'update', remove_query_arg( 'do_update_plugin-boilerplate' ) ), 'plugin_boilerplate_hide_notices_nonce', '_plugin_boilerplate_notice_nonce' ) ); ?>"><?php esc_html_e( 'Dismiss', 'plugin-boilerplate' ); ?></a>

    <p><?php esc_html_e( 'Plugin Boilerplate data update complete. Thank you for updating to the latest version!', 'plugin-boilerplate' ); ?></p>
</div>
