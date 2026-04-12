<?php
/**
 * Admin Toolbar - Quick Tools
 * 
 * @package EvolveWP Core
 */

defined( 'ABSPATH' ) || die;

global $wp_admin_bar;

$wp_admin_bar->add_menu( array(
    'id'    => 'plugin_boilerplate_toolbar',
    'title' => '⚡ EvolveWP Core',
    'href'  => admin_url( 'admin.php?page=plugin-boilerplate-development' ),
) );

$wp_admin_bar->add_menu( array(
    'parent' => 'plugin_boilerplate_toolbar',
    'id'     => 'plugin_boilerplate_development',
    'title'  => 'Development',
    'href'   => admin_url( 'admin.php?page=plugin-boilerplate-development' ),
) );

$wp_admin_bar->add_menu( array(
    'parent' => 'plugin_boilerplate_toolbar',
    'id'     => 'plugin_boilerplate_settings',
    'title'  => 'Settings',
    'href'   => admin_url( 'admin.php?page=plugin-boilerplate-settings' ),
) );

if ( function_exists( 'plugin_boilerplate_is_developer_mode' ) && plugin_boilerplate_is_developer_mode() ) {
    $wp_admin_bar->add_menu( array(
        'parent' => 'plugin_boilerplate_toolbar',
        'id'     => 'plugin_boilerplate_clear_cache',
        'title'  => 'Clear Cache',
        'href'   => wp_nonce_url( admin_url( 'admin-post.php?action=plugin_boilerplate_clear_cache' ), 'plugin_boilerplate_clear_cache' ),
    ) );
}
