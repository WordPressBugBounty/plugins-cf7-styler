<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<div style="margin-top: 10px;display: inline-block;">
    <label for="cf7cstmzr-preview-mode" style="display: none;"><?php esc_html_e( 'Preview mode', 'cf7-styler' ); ?></label>

    <select id="cf7cstmzr-preview-mode" class="cf7cstmzr-form-control" style="display: none;max-width: 150px;">
        <option value="split-mode"<?php echo esc_attr( $preview_mode === 'split-mode' ? ' selected' : '' ); ?>><?php esc_html_e( 'Split mode', 'cf7-styler' ); ?></option>
        <option value="current-style"<?php echo esc_attr( $preview_mode === 'current-style' ? ' selected' : '' ); ?>><?php esc_html_e( 'Current Style', 'cf7-styler' ); ?></option>
        <option value="live-style"<?php echo esc_attr( $preview_mode === 'live-style' ? ' selected' : '' ); ?>><?php esc_html_e( 'Live', 'cf7-styler' ); ?></option>
        <option value="unstyled"<?php echo esc_attr( $preview_mode === 'unstyled' ? ' selected' : '' ); ?>><?php esc_html_e( 'Unstyled', 'cf7-styler' ); ?></option>
    </select>


    <label for="cf7cstmzr-preview-mode-check" style="display: inline-block;height: 25px;line-height: 25px;"><?php esc_html_e( 'Split view', 'cf7-styler' ); ?></label>

    <input type="checkbox" name="cf7cstmzr-split-fixed" value="split-view-check" id="cf7cstmzr-preview-mode-check" checked>

    <span id="split-mode-settings" style="display: <?php echo esc_attr( 'split-mode' === $preview_mode ? 'inline-block' : 'none' ); ?>; margin-left: 10px;vertical-align: middle;">
        <span style="display: inline-block;line-height: 25px;vertical-align: middle;"><?php esc_html_e( 'Second column view', 'cf7-styler' ); ?>:</span>
        <label for="cf7cstmzr-split-live-style" style="display: inline-block; margin-left: 10px;height: 25px;line-height: 25px;vertical-align: middle;">
            <?php esc_html_e( 'Live', 'cf7-styler' ); ?>
        </label>

        <input type="radio" name="cf7cstmzr-split-mode" value="live-style"
               id="cf7cstmzr-split-live-style"<?php echo esc_attr( empty( $split_mode ) || 'live-style' === $split_mode ? ' checked' : '' ); ?>>

        <label for="cf7cstmzr-split-live-unstyled" style="display: inline-block; margin-left: 5px;height: 25px;line-height: 25px;vertical-align: middle;">
            <?php esc_html_e( 'Unstyled', 'cf7-styler' ); ?>
        </label>
        <input type="radio" name="cf7cstmzr-split-mode" value="split-unstyled"
               id="cf7cstmzr-split-live-unstyled"<?php echo esc_attr( ! empty( $split_mode ) && 'split-unstyled' === $split_mode ? ' checked' : '' ); ?>>

        <label for="cf7cstmzr-split-fixed" style="display: inline-block; margin-left: 10px;height: 25px;line-height: 25px;vertical-align: middle;">
            <?php esc_html_e( 'Duplicate form in second column', 'cf7-styler' ); ?>
        </label>
        <input type="checkbox" name="cf7cstmzr-split-fixed" value="split-fixed" id="cf7cstmzr-split-fixed" checked>
    </span>
</div>