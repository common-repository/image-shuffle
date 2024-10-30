<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.essco.tech
 * @since             1.0.0
 * @package           Essco_Image_Shuffle
 *
 * @wordpress-plugin
 * Plugin Name:       Image Shuffle
 * Plugin URI:        https://github.com/jnrana
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            https://github.com/jnrana
 * Author URI:        www.essco.tech
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       essco-image-shuffle
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-essco-image-shuffle-activator.php
 */
function activate_essco_image_shuffle() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-essco-image-shuffle-activator.php';
	Essco_Image_Shuffle_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-essco-image-shuffle-deactivator.php
 */
function deactivate_essco_image_shuffle() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-essco-image-shuffle-deactivator.php';
	Essco_Image_Shuffle_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_essco_image_shuffle' );
register_deactivation_hook( __FILE__, 'deactivate_essco_image_shuffle' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-essco-image-shuffle.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_essco_image_shuffle() {

	$plugin = new Essco_Image_Shuffle();
	$plugin->run();

}
run_essco_image_shuffle();
