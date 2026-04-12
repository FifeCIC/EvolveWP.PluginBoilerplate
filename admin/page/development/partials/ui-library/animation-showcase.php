<?php
/**
 * UI Library Animation Showcase Partial
 *
 * @package plugin-boilerplate/Admin/Views/Partials
 * @version 1.0.9
 */

defined('ABSPATH') || exit;
?>
<div class="plugin-boilerplate-ui-section">
    <h3><?php esc_html_e('Animation Showcase', 'plugin-boilerplate'); ?></h3>
    <p><?php esc_html_e('CSS animations and transitions for enhancing user experience and providing visual feedback.', 'plugin-boilerplate'); ?></p>
    
    <div class="plugin-boilerplate-component-group">
        <!-- Fade Animations -->
        <div class="component-demo">
            <h4><?php esc_html_e('Fade Animations', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-component-showcase">
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Fade In', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card fade-in-demo" data-animation="plugin-boilerplate-fade-in"><?php esc_html_e('Hover Me', 'plugin-boilerplate'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Fade Out', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card fade-out-demo" data-animation="plugin-boilerplate-fade-out"><?php esc_html_e('Hover Me', 'plugin-boilerplate'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Slide Animations -->
        <div class="component-demo">
            <h4><?php esc_html_e('Slide Animations', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-component-showcase">
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Slide Down', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card slide-down-demo" data-animation="plugin-boilerplate-slide-in-down"><?php esc_html_e('Hover Me', 'plugin-boilerplate'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Slide Up', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card slide-up-demo" data-animation="plugin-boilerplate-slide-in-up"><?php esc_html_e('Hover Me', 'plugin-boilerplate'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Slide Left', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card slide-left-demo" data-animation="plugin-boilerplate-slide-in-left"><?php esc_html_e('Hover Me', 'plugin-boilerplate'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Slide Right', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card slide-right-demo" data-animation="plugin-boilerplate-slide-in-right"><?php esc_html_e('Hover Me', 'plugin-boilerplate'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Continuous Animations -->
        <div class="component-demo">
            <h4><?php esc_html_e('Continuous Animations', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-component-showcase">
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Pulse', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card plugin-boilerplate-pulse"><?php esc_html_e('Pulse', 'plugin-boilerplate'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Heartbeat', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card plugin-boilerplate-heartbeat"><?php esc_html_e('Heartbeat', 'plugin-boilerplate'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Spin', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card">
                        <span class="dashicons dashicons-update plugin-boilerplate-spin"></span>
                    </div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Bounce', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card plugin-boilerplate-bounce"><?php esc_html_e('Bounce', 'plugin-boilerplate'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Attention Animations -->
        <div class="component-demo">
            <h4><?php esc_html_e('Attention Animations', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-component-showcase">
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Shake', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card shake-demo" data-animation="plugin-boilerplate-shake"><?php esc_html_e('Click Me', 'plugin-boilerplate'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Flash', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card plugin-boilerplate-flash"><?php esc_html_e('Flash', 'plugin-boilerplate'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Highlight', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card highlight-demo" data-animation="plugin-boilerplate-highlight"><?php esc_html_e('Click Me', 'plugin-boilerplate'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Scale Animations -->
        <div class="component-demo">
            <h4><?php esc_html_e('Scale Animations', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-component-showcase">
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Scale In', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card scale-in-demo" data-animation="plugin-boilerplate-scale-in"><?php esc_html_e('Hover Me', 'plugin-boilerplate'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Scale Out', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card scale-out-demo" data-animation="plugin-boilerplate-scale-out"><?php esc_html_e('Hover Me', 'plugin-boilerplate'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Transitions -->
        <div class="component-demo">
            <h4><?php esc_html_e('Transitions', 'plugin-boilerplate'); ?></h4>
            <div class="plugin-boilerplate-component-showcase">
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Color Transition', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card plugin-boilerplate-transition-colors transition-demo"><?php esc_html_e('Hover Me', 'plugin-boilerplate'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Transform Transition', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card plugin-boilerplate-transition-transform transform-demo"><?php esc_html_e('Hover Me', 'plugin-boilerplate'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Fast Transition', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card plugin-boilerplate-transition-fast transition-demo"><?php esc_html_e('Hover Me', 'plugin-boilerplate'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Slow Transition', 'plugin-boilerplate'); ?></div>
                    <div class="plugin-boilerplate-card plugin-boilerplate-transition-slow transition-demo"><?php esc_html_e('Hover Me', 'plugin-boilerplate'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Sequenced Animations -->
        <div class="component-demo">
            <h4><?php esc_html_e('Sequenced Animations', 'plugin-boilerplate'); ?></h4>
            <div class="animation-sequence">
                <button id="sequence-trigger" class="button button-primary"><?php esc_html_e('Start Sequence', 'plugin-boilerplate'); ?></button>
                <div class="sequence-container">
                    <div class="sequence-item plugin-boilerplate-delay-100"><?php esc_html_e('First', 'plugin-boilerplate'); ?></div>
                    <div class="sequence-item plugin-boilerplate-delay-300"><?php esc_html_e('Second', 'plugin-boilerplate'); ?></div>
                    <div class="sequence-item plugin-boilerplate-delay-500"><?php esc_html_e('Third', 'plugin-boilerplate'); ?></div>
                    <div class="sequence-item plugin-boilerplate-delay-700"><?php esc_html_e('Fourth', 'plugin-boilerplate'); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
