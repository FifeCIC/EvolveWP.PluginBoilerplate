<?php
/**
 * EvolveWP Core Settings Repeater Field Handler
 *
 * @author   Ryan Bayne
 * @category Admin
 * @package  EvolveWP Core/Admin/Settings
 * @version  1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * EvolveWP_Core_Settings_Repeater Class.
 */
class EvolveWP_Core_Settings_Repeater {

    /**
     * Initialize repeater field functionality.
     */
    public static function init() {
        add_action( 'plugin_boilerplate_admin_field_repeater', array( __CLASS__, 'output_repeater_field' ), 10, 1 );
    }

    /**
     * Output repeater field.
     *
     * @param array $value Field configuration
     */
    public static function output_repeater_field( $value ) {
        if ( ! isset( $value['fields'] ) || ! is_array( $value['fields'] ) ) {
            return;
        }

        $option_value = EvolveWP_Core_Admin_Settings::get_option( $value['id'], array() );
        
        if ( ! is_array( $option_value ) ) {
            $option_value = array();
        }

        $field_description = EvolveWP_Core_Admin_Settings::get_field_description( $value );
        extract( $field_description );

        ?>
        <tr valign="top" class="plugin-boilerplate-repeater-row">
            <th scope="row" class="titledesc">
                <label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?></label>
                <?php echo wp_kses_post( $tooltip_html ); ?>
            </th>
            <td class="forminp forminp-repeater">
                <?php echo wp_kses_post( $description ); ?>
                
                <div class="plugin-boilerplate-repeater-container" data-field-id="<?php echo esc_attr( $value['id'] ); ?>">
                    <div class="plugin-boilerplate-repeater-items">
                        <?php
                        if ( ! empty( $option_value ) ) {
                            foreach ( $option_value as $index => $item_values ) {
                                self::output_repeater_item( $value, $item_values, $index );
                            }
                        }
                        ?>
                    </div>
                    
                    <button type="button" class="button plugin-boilerplate-repeater-add">
                        <?php echo esc_html( isset( $value['add_button_text'] ) ? $value['add_button_text'] : __( 'Add Item', 'plugin-boilerplate' ) ); ?>
                    </button>
                    
                    <!-- Template for new items -->
                    <script type="text/template" class="plugin-boilerplate-repeater-template">
                        <?php self::output_repeater_item( $value, array(), '{{INDEX}}' ); ?>
                    </script>
                </div>
            </td>
        </tr>
        <?php
    }

    /**
     * Output a single repeater item.
     *
     * @param array $field_config Main field configuration
     * @param array $values Current values for this item
     * @param int|string $index Item index
     */
    private static function output_repeater_item( $field_config, $values, $index ) {
        ?>
        <div class="plugin-boilerplate-repeater-item" data-index="<?php echo esc_attr( $index ); ?>">
            <div class="plugin-boilerplate-repeater-item-header">
                <span class="plugin-boilerplate-repeater-handle dashicons dashicons-menu"></span>
                <span class="plugin-boilerplate-repeater-title">
                    <?php echo esc_html( isset( $field_config['item_title'] ) ? $field_config['item_title'] : __( 'Item', 'plugin-boilerplate' ) ); ?>
                    #<span class="plugin-boilerplate-repeater-number"><?php echo esc_html( is_numeric( $index ) ? $index + 1 : '' ); ?></span>
                </span>
                <button type="button" class="button-link plugin-boilerplate-repeater-toggle">
                    <span class="dashicons dashicons-arrow-down-alt2"></span>
                </button>
                <button type="button" class="button-link plugin-boilerplate-repeater-remove">
                    <span class="dashicons dashicons-trash"></span>
                </button>
            </div>
            
            <div class="plugin-boilerplate-repeater-item-content">
                <?php
                foreach ( $field_config['fields'] as $field ) {
                    $field_name = $field_config['id'] . '[' . $index . '][' . $field['id'] . ']';
                    $field_id = $field_config['id'] . '_' . $index . '_' . $field['id'];
                    $field_value = isset( $values[ $field['id'] ] ) ? $values[ $field['id'] ] : ( isset( $field['default'] ) ? $field['default'] : '' );
                    
                    self::output_field( $field, $field_name, $field_id, $field_value );
                }
                ?>
            </div>
        </div>
        <?php
    }

    /**
     * Output individual field within repeater.
     *
     * @param array $field Field configuration
     * @param string $name Field name
     * @param string $id Field ID
     * @param mixed $value Field value
     */
    private static function output_field( $field, $name, $id, $value ) {
        $type = isset( $field['type'] ) ? $field['type'] : 'text';
        $label = isset( $field['label'] ) ? $field['label'] : '';
        $placeholder = isset( $field['placeholder'] ) ? $field['placeholder'] : '';
        $class = isset( $field['class'] ) ? $field['class'] : '';
        
        ?>
        <div class="plugin-boilerplate-repeater-field plugin-boilerplate-repeater-field-<?php echo esc_attr( $type ); ?>">
            <?php if ( $label ) : ?>
                <label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></label>
            <?php endif; ?>
            
            <?php
            switch ( $type ) {
                case 'text':
                case 'email':
                case 'url':
                case 'number':
                    ?>
                    <input
                        type="<?php echo esc_attr( $type ); ?>"
                        name="<?php echo esc_attr( $name ); ?>"
                        id="<?php echo esc_attr( $id ); ?>"
                        value="<?php echo esc_attr( $value ); ?>"
                        placeholder="<?php echo esc_attr( $placeholder ); ?>"
                        class="<?php echo esc_attr( $class ); ?>"
                    />
                    <?php
                    break;
                    
                case 'textarea':
                    ?>
                    <textarea
                        name="<?php echo esc_attr( $name ); ?>"
                        id="<?php echo esc_attr( $id ); ?>"
                        placeholder="<?php echo esc_attr( $placeholder ); ?>"
                        class="<?php echo esc_attr( $class ); ?>"
                        rows="3"
                    ><?php echo esc_textarea( $value ); ?></textarea>
                    <?php
                    break;
                    
                case 'select':
                    ?>
                    <select
                        name="<?php echo esc_attr( $name ); ?>"
                        id="<?php echo esc_attr( $id ); ?>"
                        class="<?php echo esc_attr( $class ); ?>"
                    >
                        <?php if ( isset( $field['options'] ) && is_array( $field['options'] ) ) : ?>
                            <?php foreach ( $field['options'] as $option_key => $option_label ) : ?>
                                <option value="<?php echo esc_attr( $option_key ); ?>" <?php selected( $value, $option_key ); ?>>
                                    <?php echo esc_html( $option_label ); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <?php
                    break;
                    
                case 'checkbox':
                    ?>
                    <label>
                        <input
                            type="checkbox"
                            name="<?php echo esc_attr( $name ); ?>"
                            id="<?php echo esc_attr( $id ); ?>"
                            value="1"
                            class="<?php echo esc_attr( $class ); ?>"
                            <?php checked( $value, 1 ); ?>
                        />
                        <?php echo isset( $field['description'] ) ? esc_html( $field['description'] ) : ''; ?>
                    </label>
                    <?php
                    break;
            }
            ?>
        </div>
        <?php
    }
}

EvolveWP_Core_Settings_Repeater::init();
