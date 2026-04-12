<?php
/**
 * Admin View: Settings
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
        
<div class="wrap plugin-boilerplate">
    <h1>
        <?php esc_html_e( 'EvolveWP Core Settings', 'plugin-boilerplate' ); ?>
    </h1>
    <form method="<?php echo esc_attr( apply_filters( 'plugin_boilerplate_settings_form_method_tab_' . $current_tab, 'post' ) ); ?>" id="mainform" action="" enctype="multipart/form-data">
        <nav class="nav-tab-wrapper woo-nav-tab-wrapper">
            <?php
                foreach ( $tabs as $name => $label ) {
                    echo '<a href="' . esc_url( admin_url( 'options-general.php?page=plugin-boilerplate-settings&tab=' . $name ) ) . '" class="nav-tab ' . ( $current_tab == $name ? 'nav-tab-active' : '' ) . '">' . esc_html( $label ) . '</a>';
                }
                do_action( 'plugin_boilerplate_settings_tabs' );
            ?>
        </nav>
        <h1 class="screen-reader-text"><?php echo esc_html( $tabs[ $current_tab ] ); ?></h1>
        <?php
            do_action( 'plugin_boilerplate_sections_' . $current_tab );

            self::show_messages();

            do_action( 'plugin_boilerplate_settings_' . $current_tab );
            do_action( 'plugin_boilerplate_settings_tabs_' . $current_tab ); // @deprecated hook
        ?>
        <p class="submit">
            <?php if ( empty( $GLOBALS['hide_save_button'] ) ) : ?>
                <input name="save" class="button-primary plugin-boilerplate-save-button" type="submit" value="<?php esc_attr_e( 'Save changes', 'plugin-boilerplate' ); ?>" />
            <?php endif; ?>
            <?php wp_nonce_field( 'plugin-boilerplate-settings' ); ?>
        </p>
    </form>
</div>
