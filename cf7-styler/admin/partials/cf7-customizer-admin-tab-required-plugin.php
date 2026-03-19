<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$required_plugins = Cf7_Required_Plugin::get_required_plugins();
$plugin_url = untrailingslashit( plugins_url( '/', CF7CSTMZR_PLUGIN_FILE ) );

if (!empty($required_plugins)) {
    ?>
    <div style="width100%; max-width: 650px; margin: auto;">
        <p>
            <?php esc_html_e('Before using WOW Style Contact Form 7, you need to install and activate Contact Form 7 plugin.', 'cf7-styler'); ?>
        </p>

        <div class="processing-holder">
            <div class="required-plugin-container">
                <?php
                foreach ($required_plugins as $slug => $data) {
                    $plugin_installed = Cf7_Required_Plugin::is_plugin_installed($data['slug']);
                    ?>
                    <div class="required-plugin-holder">
                        <div class="required-plugin-holder-inner">
                            <div class="img-holder">
                                <img src="<?php echo esc_url_raw($plugin_url) . '/admin/img/icon-'.esc_html($slug).'.png'; ?>" alt="">
                            </div>

                            <div class="info-holder">
                                <h3><a href="<?php echo esc_url_raw($data['link']); ?>" target="_blank"><?php echo esc_html($data['label']); ?></a></h3>
                                <p><?php echo esc_html($data['author']) ?></p>
                                <?php
                                if (!empty($data['notice'])) {
                                    echo esc_html($data['notice']);
                                }
                                ?>
                            </div>

                            <div class="button-holder">
                                <button id="install-<?php echo esc_url_raw($slug); ?>" class="cf7cstmzr-install-plugin button button-primary" data-plugin="<?php echo esc_html($slug); ?>">
                                    <?php esc_html_e('Install and Activate', 'cf7-styler'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>

            <div class="processing-spinner-holder">
                <div class="processing-spinner"></div>
            </div>
        </div>
    </div>
    <?php
}