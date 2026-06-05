<?php
/*
 * Plugin name: True Lazy Analytics
 * Description: Lazy loading plugin for Google Analytics, Facebook Pixel, Hotjar, Yandex Metrica, Liveinternet
 * Version: 2.5.0
 * Author: seojacky
 * Author URI: https://t.me/big_jacky
 * Plugin URI: https://wordpress.org/plugins/true-lazy-analytics/
 * GitHub Plugin URI: https://github.com/seojacky/true-lazy-analytics
 * Text Domain: true-lazy-analytics
 * Domain Path: /languages
*/
/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

define('TLAP_VERSION', '2.5.0');
define('TLAP_FILE', __FILE__); // url of the file directory
define('TLAP_DIR', __DIR__); // url plugins folder /var/www/...
define('TLAP_FOLDER', trailingslashit( plugin_dir_url(__FILE__) ) ); // url plugins folder http://.../wp-content/plugins/true-lazy-analytics
define('TLAP_SLUG', 'true-lazy-analytics');
require(TLAP_DIR . "/setting-page.php");
require(TLAP_DIR . "/functions.php");
/* Plugin settings links basename(dirname(TLAP_FILE))) */
add_filter('plugin_action_links_'.plugin_basename(TLAP_FILE), function ( $links ) {
	$links[] = '<a href="' .		
		admin_url( 'admin.php?page='. TLAP_SLUG ) .
		'">' . __('Settings') . '</a>';
	$links[] = '<a href="https://t.me/big_jacky">' . __('Author') . '</a>';	
	$links[] = '<a href="' .		
		admin_url( 'admin.php?page='. TLAP_SLUG ) .
		'&action=fourth-tab" style="font-weight: bold;color: #00ab00;" class="dashicons-before dashicons-performance">' . __('Speed Up Your Website', 'true-lazy-analytics') . '</a>';	
	return $links;
});
/* Plugin extra links */
add_filter('plugin_row_meta', function ($links, $file)
    {
        // if not current plugin, return default links
        if (plugin_basename(TLAP_FILE) !== $file)
        {
            return $links;
        }
        $meta_links = array(
		'<a href="https://wordpress.org/plugins/true-lazy-analytics/#%0Awhat%20does%20the%20plugin%20do%3F%0A" target="_blank">' . __('FAQ', 'true-lazy-analytics') . '</a>',
		__( 'Rate us:', 'true-lazy-analytics' ) . " <span class='rating-stars'><a href='//wordpress.org/support/plugin/true-lazy-analytics/reviews/?rate=1#new-post' target='_blank' data-rating='1' title='" . __('Poor', 'true-lazy-analytics') . "'><span class='dashicons dashicons-star-filled' style='color:#ffb900 !important;'></span></a><a href='//wordpress.org/support/plugin/true-lazy-analytics/reviews/?rate=2#new-post' target='_blank' data-rating='2' title='" . __('Works', 'true-lazy-analytics') . "'><span class='dashicons dashicons-star-filled' style='color:#ffb900 !important;'></span></a><a href='//wordpress.org/support/plugin/true-lazy-analytics/reviews/?rate=3#new-post' target='_blank' data-rating='3' title='" . __('Good', 'true-lazy-analytics') . "'><span class='dashicons dashicons-star-filled' style='color:#ffb900 !important;'></span></a><a href='//wordpress.org/support/plugin/true-lazy-analytics/reviews/?rate=4#new-post' target='_blank' data-rating='4' title='" . __('Great', 'true-lazy-analytics') . "'><span class='dashicons dashicons-star-filled' style='color:#ffb900 !important;'></span></a><a href='//wordpress.org/support/plugin/true-lazy-analytics/reviews/?rate=5#new-post' target='_blank' data-rating='5' title='" . __('Fantastic!', 'true-lazy-analytics') . "'><span class='dashicons dashicons-star-filled' style='color:#ffb900 !important;'></span></a><span>",
        );
        return array_merge($links, $meta_links);
    }, 10, 2);
