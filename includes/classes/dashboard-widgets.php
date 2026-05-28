<?php
/**
 * Dashboard Widgets
 * 
 * @package Plugin Boilerplate
 */

defined( 'ABSPATH' ) || die;

class EvolveWP_Boilerplate_Dashboard_Widgets {
    
    public function __construct() {
        add_action( 'wp_dashboard_setup', array( $this, 'add_widgets' ) );
    }
    
    public function add_widgets() {
        wp_add_dashboard_widget(
            'plugin_boilerplate_stats_widget',
            __( 'Plugin Boilerplate Stats', 'plugin-boilerplate' ),
            array( $this, 'render_stats_widget' )
        );
        
        wp_add_dashboard_widget(
            'plugin_boilerplate_quick_links_widget',
            __( 'Plugin Boilerplate Quick Links', 'plugin-boilerplate' ),
            array( $this, 'render_quick_links_widget' )
        );
    }
    
    public function render_stats_widget() {
        $stats = $this->get_plugin_stats();
        ?>
        <div class="plugin-boilerplate-dashboard-widget">
            <ul>
                <li><strong><?php esc_html_e( 'Active Features:', 'plugin-boilerplate' ); ?></strong> <?php echo (int) $stats['features']; ?></li>
                <li><strong><?php esc_html_e( 'API Calls Today:', 'plugin-boilerplate' ); ?></strong> <?php echo (int) $stats['api_calls']; ?></li>
                <li><strong><?php esc_html_e( 'Cache Hit Rate:', 'plugin-boilerplate' ); ?></strong> <?php echo (int) $stats['cache_rate']; ?>%</li>
            </ul>
            <p><a href="<?php echo esc_url( admin_url( 'admin.php?page=plugin-boilerplate-development' ) ); ?>" class="button button-primary"><?php esc_html_e( 'View Details', 'plugin-boilerplate' ); ?></a></p>
        </div>
        <?php
    }
    
    public function render_quick_links_widget() {
        ?>
        <div class="plugin-boilerplate-dashboard-widget">
            <ul>
                <li><a href="<?php echo esc_url( admin_url( 'admin.php?page=plugin-boilerplate-development' ) ); ?>"><?php esc_html_e( 'Development Dashboard', 'plugin-boilerplate' ); ?></a></li>
                <li><a href="<?php echo esc_url( admin_url( 'admin.php?page=plugin-boilerplate-settings' ) ); ?>"><?php esc_html_e( 'Settings', 'plugin-boilerplate' ); ?></a></li>
                <li><a href="<?php echo esc_url( admin_url( 'admin.php?page=plugin-boilerplate-learning' ) ); ?>"><?php esc_html_e( 'Learning Centre', 'plugin-boilerplate' ); ?></a></li>
            </ul>
        </div>
        <?php
    }
    
    private function get_plugin_stats() {
        return array(
            'features' => 5,
            'api_calls' => wp_cache_get( 'plugin_boilerplate_api_calls_today' ) ?: 0,
            'cache_rate' => 85
        );
    }
}

return new EvolveWP_Boilerplate_Dashboard_Widgets();
