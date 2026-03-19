<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       saleswonder.biz
 * @since      1.0.0
 *
 * @package    Cf7_Customizer
 * @subpackage Cf7_Customizer/admin/partials
 * @var $is_welcome_done
 */

if (!empty($is_welcome_done)) {
    $file = 'tutorials';
} else {
    $file = 'welcome';
}

$locale = get_user_locale();
$locale_short = explode('_', $locale)[0];
$filename = plugin_dir_path( CF7CSTMZR_PLUGIN_FILE ) . 'admin/partials/tutorials/'.$file.'-'.$locale_short.'.php';

if (!file_exists($filename)) {
    $filename = plugin_dir_path( CF7CSTMZR_PLUGIN_FILE ) . 'admin/partials/tutorials/'.$file.'-en.php';
}
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h1><?php
        if (empty($is_welcome_done)) {
            esc_html_e('Welcome', 'cf7-styler');
        } else {
            esc_html_e('Tutorial', 'cf7-styler');
        }
    ?></h1>
    <div class="cf7cstmzr-tutorial-section">
        <?php
        ob_start();
        include $filename;
		$all_html_tags = array(
			'a' => true,
			'abbr' => true,
			'address' => true,
			'area' => true,
			'article' => true,
			'aside' => true,
			'audio' => true,
			'b' => true,
			'base' => true,
			'bdi' => true,
			'bdo' => true,
			'blockquote' => true,
			'body' => true,
			'br' => true,
			'button' => true,
			'canvas' => true,
			'caption' => true,
			'cite' => true,
			'code' => true,
			'col' => true,
			'colgroup' => true,
			'data' => true,
			'datalist' => true,
			'dd' => true,
			'del' => true,
			'details' => true, 
			'dfn' => true,
			'dialog' => true,
			'div' => true,
			'dl' => true,
			'dt' => true,
			'em' => true,
			'embed' => true,
			'fieldset' => true,
			'figcaption' => true,
			'figure' => true,
			'footer' => true,
			'form' => true,
			'h1' => true,
			'h2' => true,
			'h3' => true,
			'h4' => true,
			'h5' => true,
			'h6' => true,
			'head' => true,
			'header' => true,
			'hgroup' => true,
			'hr' => true,
			'html' => true,
			'i' => true,
			'iframe' => true,
			'img' => true,
			'input' => true,
			'ins' => true,
			'kbd' => true,
			'keygen' => true,
			'label' => true,
			'legend' => true,
			'li' => true,
			'link' => true,
			'main' => true,
			'map' => true,
			'mark' => true,
			'menu' => true,
			'menuitem' => true,
			'meta' => true,
			'meter' => true,
			'nav' => true,
			'noscript' => true,
			'object' => true,
			'ol' => true,
			'optgroup' => true,
			'option' => true,
			'output' => true,
			'p' => true,
			'param' => true,
			'picture' => true,
			'pre' => true,
			'progress' => true,
			'q' => true,
			'rp' => true,
			'rt' => true,
			'ruby' => true,
			's' => true,
			'samp' => true,
			'script' => true,
			'section' => true,
			'select' => true,
			'small' => true,
			'source' => true,
			'span' => true,
			'strong' => true,
			'style' => true,
			'sub' => true,
			'summary' => true,
			'sup' => true,
			'table' => true,
			'tbody' => true,
			'td' => true,
			'textarea' => true,
			'tfoot' => true,
			'th' => true,
			'thead' => true,
			'time' => true,
			'title' => true,
			'tr' => true,
			'track' => true,
			'u' => true,
			'ul' => true,
			'var' => true,
			'video' => true,
			'wbr' => true
		);
	
		foreach ($all_html_tags as $tag => $attributes) {
			$all_html_tags[$tag] = array_fill_keys(['class', 'id', 'style', 'src', 'href', 'alt', 'title', 'type', 'value', 'name', 'target', 'action', 'method', 'checked', 'selected', 'placeholder', 'width', 'height', 'border', 'align', 'valign', 'lang', 'xml:lang', 'aria-label', 'role', 'data-*', 'aria-hidden', 'aria-labelledby', 'aria-describedby', 'rel', 'media', 'accept', 'accept-charset', 'charset', 'async', 'defer', 'property', 'http-equiv', 'content', 'viewBox', 'd', 'x', 'y', 'viewbox', 'preserveAspectRatio', 'xmlns', 'version', 'baseProfile', 'required', 'readonly'], true);
		}
		echo wp_kses((apply_filters('the_content', ob_get_clean())), array_merge(
		wp_kses_allowed_html('post'), // Allow default WordPress post tags and attributes.
		array(
			'*' => array( // Allow all tags.
				'style' => true, // Allow inline CSS on all tags.
				'class' => true, // Allow CSS classes.
				'id'    => true, // Allow IDs.
				'data-*' => true, // Allow data attributes.
				'required' => true, // Allow required attribute on all tags.
				'readonly' => true, // Allow required attribute on all tags.
			),
		),
		$all_html_tags));

        ?>
    </div>
</div>