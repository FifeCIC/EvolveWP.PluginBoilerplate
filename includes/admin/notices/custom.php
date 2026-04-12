<?php
/**
 * Admin View: Custom Notices
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div id="message" class="updated plugin-boilerplate-message">
    <a class="plugin-boilerplate-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'plugin-boilerplate-hide-notice', $notice ), 'plugin_boilerplate_hide_notices_nonce', '_plugin_boilerplate_notice_nonce' ) ); ?>"><?php esc_html_e( 'Dismiss', 'plugin-boilerplate' ); ?></a>
    <?php echo wp_kses_post( wpautop( $notice_html ) ); ?>
</div>
