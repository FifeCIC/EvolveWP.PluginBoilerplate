<?php          
/**
 * EvolveWP Core - Shortcodes
 *
 * This is one of the best approaches to shortcodes I could find. Not too bloated
 * and I've taking the opportunity to introduce some of WPMUDEV work into my plugin.  
 *
 * @author   WPMUDEV, Ignacio Cruz (igmoweb)
 * @category Shortcodes
 * @package  EvolveWP Core/Shortcodes
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'EvolveWP_Core_Shortcode' ) ) :
       
abstract class EvolveWP_Core_Shortcode extends EvolveWP_Core_Codec_Instance {

    private $_defaults = array();
    protected $_key;
    public $name;

    abstract public function process_shortcode ($args=array(), $content='');
    abstract public function get_usage_info ();

    abstract public function get_defaults();

    public function register ($key) {
        $this->_key = $key;
        add_shortcode($key, array($this, "process_shortcode"));
        add_action('plugin-boilerplate-shortcodes-shortcode_help', array($this, "add_shortcode_help"));
        add_filter('plugin-boilerplate-shortcodes-shortcode_help-string', array($this, 'get_shortcode_help'));
    }

    public function get_shortcode_help ($all='') {             
        $help = '';
        $usage = $this->get_usage_info();
        $arguments = $this->_defaults_to_help();
        if (empty($usage) && empty($arguments)) return $all;

        $args_help = '';
        if (!empty($arguments)) {
            $args_help .= '<h4>' . __('Arguments', 'plugin-boilerplate') . '</h4><dl>';
            foreach ($arguments as $key => $help) {
                $args_help .= '' .
                              '<dt><code>' . $key . '</code></dt>' .
                              '<dd>' . $help . '</dd>' .
                              '';
            }
            $args_help .= '</dl>';
        }

        $help = '' .
                '<div class="postbox">' .
                '<h3 class="hndle"><span>' .
                /* translators: %s: Shortcode key */
                sprintf(__('Shortcode <code>%s</code>', 'plugin-boilerplate'), $this->_key) .
                '</span></h3>' .
                '<div class="inside">' .
                '<h4>' . __('Shortcode', 'plugin-boilerplate') . '</h4>' .
                '<pre><code>[' . esc_html($this->_key) . ']</code></pre>' .
                '<h4>' . __('Description', 'plugin-boilerplate'). '</h4>' .
                $usage .
                $args_help .
                '</div>' .
                '</div>' .
                '';
        return $all . $help;
    }

    public function add_shortcode_help () {                
        echo wp_kses_post( $this->get_shortcode_help() );
    }

    protected function _defaults_to_args () {              
        $ret = array();
        foreach ($this->get_defaults() as $key => $item) {
            $ret[$key] = $item['value'];
        }
        return $ret;
    }


    protected function _defaults_to_help () {                  
        $ret = array();
        foreach ($this->get_defaults() as $key => $item) {
            $help = $this->_to_help_string($key, $item);
            if (!empty($help)) $ret[$key] = $help;
        }
        return $ret;
    }

    protected function _to_help_string ($arg, $help) {          
        $ret = array();
        if (empty($help)) return false;
        if (!empty($help['help'])) {
            $ret[] = $help['help'];
        }
        if (!empty($help['allowed_values'])) {
            $ret[] = __('Allowed values:', 'plugin-boilerplate') . ' <code>' . join('</code>, <code>', $help['allowed_values']) . '</code>';
        }
        if (!empty($help['example'])) {
            $ret[] = __('Example:', 'plugin-boilerplate') . ' <code>[' . $this->_key . ' ... ' . $arg . '="' . $help['example'] . '"]</code>';
        }
        return join('<br />', $ret);
    }
}

endif;