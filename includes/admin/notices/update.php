<?php
/**
 * Admin View: Notice - Update
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div id="message" class="updated plugin-boilerplate-message plugin-boilerplate-connect">
    <p><strong><?php esc_html_e( 'EvolveWP Core Data Update', 'plugin-boilerplate' ); ?></strong> &#8211; <?php esc_html_e( 'We need to update your store\'s database to the latest version.', 'plugin-boilerplate' ); ?></p>
    <p class="submit"><a href="<?php echo esc_url( add_query_arg( array( 'do_update_plugin-boilerplate' => 'true', '_plugin_boilerplate_update_nonce' => wp_create_nonce( 'plugin_boilerplate_do_update' ) ), admin_url( 'admin.php?page=plugin-boilerplate-settings' ) ) ); ?>" class="plugin-boilerplate-update-now button-primary"><?php esc_html_e( 'Run the updater', 'plugin-boilerplate' ); ?></a></p>
</div>
<script type="text/javascript">
    jQuery( '.plugin-boilerplate-update-now' ).click( 'click', function() {
        return window.confirm( '<?php echo esc_js( __( 'It is strongly recommended that you backup your database before proceeding. Are you sure you wish to run the updater now?', 'plugin-boilerplate' ) ); ?>' ); // jshint ignore:line
    });
</script>
