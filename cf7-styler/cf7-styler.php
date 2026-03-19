<?php
/**
 * Plugin Name:       WOW Styler for CF7 – Visual Styler for Contact Form 7 Forms
 * Plugin URI:        https://wordpress.org/plugins/cf7-styler/
 * Description:       Turn “just another CF7 form” into a branded experience across all your forms. WOW Styler for CF7 lets you style multiple Contact Form 7 forms visually with live preview and reusable designs, without writing CSS.
 * Version:           1.8.5
 * Author:            Tobias Conrad
 * Author URI:        https://saleswonder.biz/
 * Text Domain:       cf7-styler
 * Domain Path:       /languages
 * Requires at least: 5.0
 * Tested up to:      6.9
 * Requires PHP:      7.2
 * Requires Plugins:  contact-form-7
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */
 
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}

$is_customizer_page = isset($_GET['page']) && sanitize_text_field($_GET['page']) === 'cf7cstmzr_page';
if ($is_customizer_page) {
    $allowed_tabs = ['form-customize', 'license', 'settings'];
    $current_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'form-customize';
    if (!in_array($current_tab, $allowed_tabs)) {
        wp_die( esc_html__( 'Sorry, you are not allowed to access this page.', 'cf7-styler' ), 403 );
    }
}
// wp_die( __( 'Sorry, you are not allowed to access this page.' ), 403 );
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
if ( !defined( 'CF7CSTMZR_VERSION' ) ) {
    define( 'CF7CSTMZR_VERSION', '1.8.5' );
}
if ( !defined( 'CF7CSTMZR_BRANCH' ) ) {
    define( 'CF7CSTMZR_BRANCH', 'master' );
}
if ( !defined( 'CF7CSTMZR_SLUG' ) ) {
    define( 'CF7CSTMZR_SLUG', 'cf7-styler' );
}
if ( !defined( 'CF7CSTMZR_PLUGIN_FILE' ) ) {
    define( 'CF7CSTMZR_PLUGIN_FILE', __FILE__ );
}
if ( !defined( 'CF7CSTMZR_PLUGIN_URL' ) ) {
    define( 'CF7CSTMZR_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}
if ( !defined( 'CF7CSTMZR_PLUGIN_PATH' ) ) {
    define( 'CF7CSTMZR_PLUGIN_PATH', plugin_dir_path( CF7CSTMZR_PLUGIN_FILE ) );
}
if ( !function_exists( 'cf7cstmzr_is_plugin_activated' ) ) {
    require_once 'includes/functions.php';
}
if ( !class_exists( 'Cf7_License' ) ) {
    require_once 'includes/lib/Cf7_License.php';
}
if ( 'free' === Cf7_License::get_license_version() ) {
    
    if ( !function_exists( 'cf7_styler' ) ) {
        // Create a helper function for easy SDK access.
        function cf7_styler()
        {
            global  $cf7_styler ;
            $secret_key = ( defined( 'WP_FS__SECRET_KEY' ) && WP_FS__SECRET_KEY ? WP_FS__SECRET_KEY : '' );
            
            if ( !isset( $cf7_styler ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $params = array(
                    'id'                  => '4879',
                    'slug'                => 'cf7-styler',
                    'premium_slug'        => 'cf7-styler-pro',
                    'type'                => 'plugin',
                    'public_key'          => 'pk_430f963531baceba1e271f3a35041',
                    'is_premium'          => false,
                    'premium_suffix'      => 'Pro',
                    'has_premium_version' => false,
                    'has_addons'          => false,
                    'has_paid_plans'      => true,
                    'is_org_compliant'    => true,
                    'trial'               => array(
                    'days'               => 14,
                    'is_require_payment' => true,
                ),
                    'has_affiliation'     => 'all',
                    'menu'                => array(
                    'slug'    => 'cf7cstmzr_page',
                    'support' => true,
                    'contact' => false,
                    'parent'  => array(
                    'slug' => 'wpcf7',
                ),
                ),
                    'secret_key'          => $secret_key,
                );
                if ( !cf7cstmzr_is_plugin_activated( 'contact-form-7', 'wp-contact-form-7.php' ) ) {
                    $params['menu'] = array(
                        'slug'    => 'cf7cstmzr_page',
                        'support' => true,
                        'contact' => false,
                    );
                }
                $cf7_styler = fs_dynamic_init( $params );
            }
            
            return $cf7_styler;
        }
        
        // Init Freemius.
        cf7_styler();
        // Customize Freemius opt-in message for WOW Style Contact Form 7
       cf7_styler()->add_filter( 'connect-header', function ( $header_html ) {
			return '<strong style="font-size:1.25em; display:block; margin-bottom:12px;">You just activated the styler — before you start styling.</strong>';
		} );

		cf7_styler()->add_filter( 'connect-header_on-update', function ( $header_html ) {
			return '<strong style="font-size:1.25em; display:block; margin-bottom:12px;">You just updated the styler — before you continue styling.</strong>';
		} );

		$cf7_styler_message = '
		<span style="font-size:1.0em; line-height:1.6; color:#2c3338; display:block;">
		<strong style="font-size:1.25em; display:block; margin-bottom:12px;">Most websites begin with simple forms.</strong>
		✉️ Contact<br>✉️ Offer<br>✉️ Accounting<br><br>
		Visitors send requests…<br>
		and you answer them one by one.<br><br>
		More emails. More replies.<br><br>
		Some websites add something different.<br><br>
		A page with a short 2-minute introduction<br>
		and an invitation to a <strong>focus session</strong>.<br><br>
		During these sessions:<br>
		👂 At first many just listen<br>
		🙋 Over time, more start asking questions<br>
		🤝 People begin interacting and sharing their situations<br><br>
		They become part of the session.<br><br>
		And something interesting happens.<br><br>
		You are seen more and more as the expert.<br>
		Your topic starts to carry more weight.<br><br>
		<strong>One session. Many people.</strong><br><br>
		Curious how websites create sessions like this?<br><br>
		<em>Takes 5 seconds. Unsubscribe anytime.</em>
		</span>';

		cf7_styler()->add_filter( 'connect_message', function ( $message, $user_first_name, $plugin_title, $user_login, $site_link, $freemius_link ) use ( $cf7_styler_message ) {
			return $cf7_styler_message;
		}, 10, 6 );

		cf7_styler()->add_filter( 'connect_message_on_update', function ( $message, $user_first_name, $plugin_title, $user_login, $site_link, $freemius_link ) use ( $cf7_styler_message ) {
			return $cf7_styler_message;
		}, 10, 6 );

		cf7_styler()->override_i18n( array(
			'opt-in-connect' => __( '👉 Yes, send me the focus session ideas', 'cf7-styler' ),
			'skip'           => __( 'No thanks.', 'cf7-styler' ),
		) );

} // end if !function_exists cf7_styler
        // Signal that SDK was initiated.
        do_action( 'cf7_styler_loaded' );
		add_action( 'admin_head', function() {
			$page   = isset( $_GET['page'] )      ? sanitize_text_field( $_GET['page'] )      : '';
			$action = isset( $_GET['fs_action'] ) ? sanitize_text_field( $_GET['fs_action'] ) : '';
			if ( $page !== 'cf7cstmzr_page' && strpos( $action, 'cf7-styler' ) === false ) { return; }
			echo '<style>
					#fs_connect .fs-content h2 {
						display: none !important;
					}
					#fs_connect .fs-actions {
						display: flex !important;
						flex-direction: row !important;
						align-items: center !important;
						justify-content: flex-start !important;
						flex-wrap: nowrap !important;
						gap: 16px !important;
					}
					#fs_connect .fs-actions > a,
					#fs_connect #fs_skip_activation {
						order: 1 !important;
						flex: 0 0 auto !important;
						color: #999 !important;
						font-size: 0.9em !important;
						background: none !important;
						border: none !important;
						box-shadow: none !important;
						float: none !important;
						white-space: nowrap !important;
						display: inline-block !important;
					}
					#fs_connect .fs-actions form {
						order: 2 !important;
						flex: 0 0 auto !important;
						width: auto !important;
						display: inline-flex !important;
					}
					#fs_connect .fs-actions form .button-primary,
					#fs_connect .fs-actions .button-primary {
						white-space: nowrap !important;
						height: auto !important;
						line-height: 1.5 !important;
						padding: 8px 18px !important;
						font-size: 1.1em !important;
						font-weight: 700 !important;
						display: inline-block !important;
						width: auto !important;
						transition: all 0.15s ease !important;
					}
					#fs_connect .fs-actions form .button-primary:hover,
					#fs_connect .fs-actions .button-primary:hover {
						background-color: #1a4f9c !important;
						border-color: #1a4f9c !important;
						transform: translateY(-1px) !important;
						box-shadow: 0 4px 12px rgba(0,0,0,0.2) !important;
					}
				</style>';
		} );

}
if ( !function_exists( 'cf7cstmzr_show_cf7_missing_notice' ) ) {
    function cf7cstmzr_show_cf7_missing_notice()
    {
		/* translators: %s: link to install contact form 7. */	
        echo  '<div class="error"><p><strong>' . sprintf( esc_html__( 'CF7 Customizer requires Contact Form 7 plugin to be installed and active. You can download %s.', 'cf7-styler' ), '<a href="/wp-admin/plugin-install.php?s=contact+form+7&tab=search&type=term" target="_blank">Contact Form 7 here</a>' ) . '</strong></p></div>' ;
    }

}
if ( !function_exists( 'cf7cstmzr_show_dev_env_notice' ) ) {
    function cf7cstmzr_show_dev_env_notice()
    {
        ?>
        <div class="notice notice-warning">
            <p>
                <strong><?php 
        esc_html_e( 'WOW Style Contact Form 7', 'cf7-styler' );
        ?> DEV env:</strong>  version <strong><?php 
        echo  esc_html(CF7CSTMZR_VERSION) ;
        ?></strong>

                <?php 
        
        if ( defined( 'CF7CSTMZR_BRANCH' ) && CF7CSTMZR_BRANCH ) {
            ?>
                    current branch <strong><?php 
            echo  esc_html(CF7CSTMZR_BRANCH) ;
            ?></strong>
                    <?php 
        }
        
        ?>
            </p>
        </div>
        <?php 
    }

}
if ( !cf7cstmzr_is_plugin_activated( 'contact-form-7', 'wp-contact-form-7.php' ) ) {
    if ( !isset( $_GET['page'] ) ||  filter_input( INPUT_GET, 'page', FILTER_SANITIZE_FULL_SPECIAL_CHARS )  !== 'cf7cstmzr_page' ) {
        add_action( 'admin_notices', 'cf7cstmzr_show_cf7_missing_notice' );
    }
}
if ( defined( 'CF7CSTMZR_DEV_ENV' ) && CF7CSTMZR_DEV_ENV ) {
    add_action( 'admin_notices', 'cf7cstmzr_show_dev_env_notice' );
}
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cf7-customizer-activator.php
 */
if ( !function_exists( 'activate_cf7_customizer' ) ) {
    function activate_cf7_customizer()
    {
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-cf7-customizer-activator.php';
        cf7_customizer_deactivate_previous();
        //Deactivate any previously active instance of the plugin, before activating new one
        Cf7_Customizer_Activator::activate();
    }

}
/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cf7-customizer-deactivator.php
 */
if ( !function_exists( 'deactivate_cf7_customizer' ) ) {
    function deactivate_cf7_customizer()
    {
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-cf7-customizer-deactivator.php';
        Cf7_Customizer_Deactivator::deactivate();
    }

}
if ( !function_exists( 'cf7_customizer_deactivate_previous' ) ) {
    /**
     * Deactivate any previously active instance of the plugin
     */
    function cf7_customizer_deactivate_previous()
    {
        
        if ( current_user_can( 'activate_plugins' ) && class_exists( 'Cf7_Customizer' ) && defined( 'CF7CSTMZR_PLUGIN_FILE' ) ) {
            if ( !function_exists( 'is_plugin_active_for_network' ) ) {
                include_once ABSPATH . '/wp-admin/includes/plugin.php';
            }
            deactivate_plugins( plugin_basename( CF7CSTMZR_PLUGIN_FILE ), true );
        }
    
    }

}
register_activation_hook( __FILE__, 'activate_cf7_customizer' );
register_deactivation_hook( __FILE__, 'deactivate_cf7_customizer' );
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
if ( !class_exists( 'Cf7_Customizer' ) ) {
    require plugin_dir_path( __FILE__ ) . 'includes/class-cf7-customizer.php';
}
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
if ( !function_exists( 'run_cf7_customizer' ) ) {
    function run_cf7_customizer()
    {
        $plugin = new Cf7_Customizer();
        $plugin->run();
    }

}
run_cf7_customizer();
