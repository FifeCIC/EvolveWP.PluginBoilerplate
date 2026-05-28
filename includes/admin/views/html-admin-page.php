<?php
/**
 * Admin Views Default Structure 
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}    
                        
?>
<div class="wrap plugin-boilerplate">

    <?php
    // Establish Title — read-only navigation parameters gated behind current_user_can()
    // as this template is only included in admin context.
    $plugin_boilerplate_title = '';
    if ( ! current_user_can( 'manage_options' ) ) {
        $plugin_boilerplate_title = '';
    } elseif ( ! isset( $_GET['listtable'] ) ) {
        $plugin_boilerplate_title = array_values( $tabs[ $current_tab ]['maintabviews'] )[0]['title'];
    } elseif ( isset( $_GET['seedview'] ) ) {
        // isset() check added — $_GET['seedview'] used as array key requires validation.
        $plugin_boilerplate_seedview = sanitize_key( wp_unslash( $_GET['seedview'] ) );
        $plugin_boilerplate_title    = isset( $tabs[ $current_tab ]['maintabviews'][ $plugin_boilerplate_seedview ] )
            ? $tabs[ $current_tab ]['maintabviews'][ $plugin_boilerplate_seedview ]['title']
            : '';
    }

    echo '<h1>Plugin Boilerplate: ' . esc_html( $plugin_boilerplate_title ) . '</h1>';
    ?>
    
    <!-- TABS -->
    <nav class="nav-tab-wrapper woo-nav-tab-wrapper">
        <?php
            foreach ( $tabs as $plugin_boilerplate_key => $plugin_boilerplate_report_group ) {
                echo '<a href="' . esc_url( admin_url( 'admin.php?page=plugin-boilerplate&tab=' . urlencode( $plugin_boilerplate_key ) ) ) . '" class="nav-tab ';
                if ( $current_tab == $plugin_boilerplate_key ) {
                    echo 'nav-tab-active';
                }
                echo '">' . esc_html( $plugin_boilerplate_report_group[ 'title' ] ) . '</a>';
            }

            do_action( 'plugin_boilerplate_mainview_tabs' );
        ?>
    </nav>
    
    
    <?php if ( sizeof( $tabs[ $current_tab ]['maintabviews'] ) > 1 ) { ?>
        <!-- SUB VIEWS (within selected tab) -->
        <ul class="subsubsub">
            <li><?php

                $plugin_boilerplate_links = array();

                foreach ( $tabs[ $current_tab ]['maintabviews'] as $plugin_boilerplate_key => $tab ) {

                    $link = '<a href="admin.php?page=plugin-boilerplate&tab=' . urlencode( $current_tab ) . '&amp;seedview=' . urlencode( $plugin_boilerplate_key ) . '" class="';
  
                    if ( $plugin_boilerplate_key == $current_tablelist ) {
                        $link .= 'current';
                    }

                    $link .= '">' . $tab['title'] . '</a>';

                    $plugin_boilerplate_links[] = $link;

                }

                echo wp_kses_post( implode( ' | </li><li>', $plugin_boilerplate_links ) );

            ?></li>
        </ul>
        <br class="clear" />
        <?php
    }

    if ( isset( $tabs[ $current_tab ][ 'maintabviews' ][ $current_tablelist ] ) ) {

        $tabs = $tabs[ $current_tab ][ 'maintabviews' ][ $current_tablelist ];

        if ( ! isset( $tabs['hide_title'] ) || $tabs['hide_title'] != true ) {
            echo '<h1>' . esc_html( $tabs['title'] ) . '</h1>';
        } else {
            echo '<h1 class="screen-reader-text">' . esc_html( $tabs['title'] ) . '</h1>';
        }

        if ( $tabs['description'] ) {
            echo '<p>' . wp_kses_post( $tabs['description'] ) . '</p>';
        }

        if ( $tabs['callback'] && ( is_callable( $tabs['callback'] ) ) ) {
            call_user_func( $tabs['callback'], $current_tablelist );
        }
    }
    ?>
</div>
