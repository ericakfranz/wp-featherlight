<?php
/**
 * Plugin Name:  WP Featherlight
 * Plugin URI:   http://www.wpsitecare.com/wp-featherlight/
 * Description:  An ultra lightweight jQuery lightbox for WordPress images and galleries.
 * Version:      0.2.0
 * Author:       Robert Neu
 * Author URI:   http://robneu.com
 * License:      GPL-2.0+
 * License URI:  http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:  wp-featherlight
 * Domain Path:  /languages
 */

// Prevent direct access.
defined( 'ABSPATH' ) || exit;

// Load the main plugin class.
require_once plugin_dir_path( __FILE__ ) . 'class-plugin.php';

add_action( 'plugins_loaded', array( wp_featherlight(), 'run' ) );
/**
 * Allow themes and plugins to access WP_Featherlight methods and properties.
 *
 * Because we aren't using a singleton pattern for our main plugin class, we
 * need to make sure it's only instantiated once in our helper function.
 * If you need to access methods inside the plugin classes, use this function.
 *
 * Example:
 *
 * <?php wp_featherlight()->scripts; ?>
 *
 * @since  0.1.0
 * @access public
 * @uses   WP_Featherlight
 * @return object WP_Featherlight A single instance of the main plugin class.
 */
function wp_featherlight() {
	static $plugin;
	if ( null === $plugin ) {
		$plugin = new WP_Featherlight;
	}
	return $plugin;
}

/**
 * Register an activation hook to run all necessary plugin setup procedures.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
register_activation_hook( __FILE__, array( wp_featherlight(), 'activate' ) );
