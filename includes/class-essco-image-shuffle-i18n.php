<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       www.essco.tech
 * @since      1.0.0
 *
 * @package    Essco_Image_Shuffle
 * @subpackage Essco_Image_Shuffle/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Essco_Image_Shuffle
 * @subpackage Essco_Image_Shuffle/includes
 * @author     Jitendrasinh Rana <jnrana.essco.tech@gmail.com>
 */
class Essco_Image_Shuffle_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'essco-image-shuffle',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
