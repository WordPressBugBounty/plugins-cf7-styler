<?php
/**
 * Class Cf7_Template
 */

class Cf7_Template {
    public static function settings_item_start($title) {
        ?>
        <div class="cf7cstmzr-settings-item">
            <h4 class="cf7cstmzr-settings-item-header"><?php echo esc_html( $title ); ?></h4>

            <div class="cf7cstmzr-settings-item-body">
                <div class="cf7cstmzr-settings-item-body-container">
        <?php
    }

    public static function settings_item_end() {
        ?>
                </div>
            </div>
        </div>
        <?php
    }

    public static function setting_shadow($style_scheme, $element) {
        ?>
        <label><?php esc_html_e( 'Shadow', 'cf7-styler' ); ?></label>

        <div style="margin-bottom:10px;">
            <div style="display: inline-block;vertical-align: top;margin-right: 10px;">
                <label for="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_horizontal-length"><?php esc_html_e( 'Horizontal Length', 'cf7-styler' ); ?></label>
                <input id="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_horizontal-length" name="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_horizontal-length" class="cf7cstmzr-number cf7cstmzr-form-control cf7cstmzr-text-field" min="-200" max="200" type="number" value="<?php echo esc_attr( $style_scheme[ $element . '_border_shadow_horizontal_length' ] ); ?>">
            </div>

            <div style="display: inline-block;vertical-align: top;margin-right: 10px;">
                <label for="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_vertical-length"><?php esc_html_e( 'Vertical Length', 'cf7-styler' ); ?></label>
                <input id="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_vertical-length" name="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_vertical-length" class="cf7cstmzr-number cf7cstmzr-form-control cf7cstmzr-text-field" min="-200" max="200" type="number" value="<?php echo esc_attr( $style_scheme[ $element . '_border_shadow_vertical_length' ] ); ?>">
            </div>
        </div>

        <div style="margin-bottom:10px;">
            <div style="display: inline-block;vertical-align: top;margin-right: 10px;">
                <label for="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_blur-radius"><?php esc_html_e( 'Blur radius', 'cf7-styler' ); ?></label>
                <input id="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_blur-radius" name="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_blur-radius" class="cf7cstmzr-number cf7cstmzr-form-control cf7cstmzr-text-field" min="0" type="number" value="<?php echo esc_attr( $style_scheme[ $element . '_border_shadow_blur_radius' ] ); ?>">
            </div>

            <div style="display: inline-block;vertical-align: top;margin-right: 10px;">
                <label for="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_spread-radius"><?php esc_html_e( 'Spread radius', 'cf7-styler' ); ?></label>
                <input id="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_spread-radius" name="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_spread-radius" class="cf7cstmzr-number cf7cstmzr-form-control cf7cstmzr-text-field" type="number" value="<?php echo esc_attr( $style_scheme[ $element . '_border_shadow_spread_radius' ] ); ?>">
            </div>
        </div>

        <div style="margin-bottom:10px;">

            <div style="display: inline-block;vertical-align: top;margin-right: 10px;">
                <label for="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_color"><?php esc_html_e( 'Shadow Color', 'cf7-styler' ); ?></label>
                <input id="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_color" name="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_color" class="cf7cstmzr-color-picker" type="text" value="<?php echo esc_attr( $style_scheme[ $element . '_border_shadow_color' ] ); ?>">
            </div>

            <div style="display: inline-block;vertical-align: top;margin-right: 10px;">
                <label for="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_opacity"><?php esc_html_e( 'Opacity', 'cf7-styler' ); ?></label>
                <input id="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_opacity" name="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_opacity" class="cf7cstmzr-number cf7cstmzr-form-control cf7cstmzr-text-field" min="0" max="1" step="0.1" type="number" value="<?php echo esc_attr( $style_scheme[ $element . '_border_shadow_opacity' ] ); ?>">
            </div>
        </div>

        <label for="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_position"><?php esc_html_e( 'Shadow Position', 'cf7-styler' ); ?></label>
        <select name="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_position" id="cf7cstmzr_<?php echo esc_attr( $element ); ?>_shadow_position" class="cf7cstmzr-form-control cf7cstmzr-dropdown-field" style="max-width:100px;">
            <option value=""><?php esc_html_e( '- select -', 'cf7-styler' ); ?></option>
            <option value="outline"<?php echo esc_attr( $style_scheme[ $element . '_border_shadow_position' ] === 'outline' ? ' selected' : '' ); ?>><?php esc_html_e( 'Outline', 'cf7-styler' ); ?></option>
            <option value="inset"<?php echo esc_attr( $style_scheme[ $element . '_border_shadow_position' ] === 'inset' ? ' selected' : '' ); ?>><?php esc_html_e( 'Inset', 'cf7-styler' ); ?></option>
        </select>
        <?php
    }

    public static function get_border_type() {
        return array(
            'inherit' => esc_html__( 'Inherit', 'cf7-styler' ),
            'solid'   => esc_html__( 'Solid', 'cf7-styler' ),
            'dotted'  => esc_html__( 'Dotted', 'cf7-styler' ),
            'dashed'  => esc_html__( 'Dashed', 'cf7-styler' ),
            'double'  => esc_html__( 'Double', 'cf7-styler' ),
            'groove'  => esc_html__( 'Groove', 'cf7-styler' ),
            'ridge'   => esc_html__( 'Ridge', 'cf7-styler' ),
            'inset'   => esc_html__( 'Inset', 'cf7-styler' ),
            'outset'  => esc_html__( 'Outset', 'cf7-styler' ),
        );
    }
}