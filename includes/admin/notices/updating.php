<?php
/**
 * Admin View: Notice - Updating
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div id="message" class="updated plugin-boilerplate-message plugin-boilerplate-connect">
    <p><strong><?php esc_html_e( 'Plugin Boilerplate Data Update', 'plugin-boilerplate' ); ?></strong> &#8211; <?php esc_html_e( 'Your database is being updated in the background.', 'plugin-boilerplate' ); ?> <a href="<?php echo esc_url( add_query_arg( 'force_update_plugin-boilerplate', 'true', admin_url( 'admin.php?page=plugin-boilerplate-settings' ) ) ); ?>"><?php esc_html_e( 'Taking a while? Click here to run it now.', 'plugin-boilerplate' ); ?></a></p>
</div>
