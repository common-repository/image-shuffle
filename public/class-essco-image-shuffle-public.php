<?php

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Essco_Image_Shuffle
 * @subpackage Essco_Image_Shuffle/public
 * @author     Jitendrasinh Rana <jnrana.essco.tech@gmail.com>
 */
class Essco_Image_Shuffle_Public {

	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/essco-image-shuffle-public.css', array(), $this->version, 'all' );

	}

	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/essco-image-shuffle-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name-'shuffle', plugin_dir_url( __FILE__ ) . 'js/jquery.shuffle-images.min.js', array( 'jquery' ), $this->version, false );
	}

	public function shuffle_images($atts){
		$atts = shortcode_atts(
			array(
				'images' 	=> '',
				'target' 	=> '',
				'title' 	=> '', 
				'subtitle'	=> '',
				'intensity'	=> 75
			), $atts, 'shuffle-images' 
		);
		$images = $atts['images'];
		if(isset($images) && $images != ''){
			$images = explode(',', $images);
		}

		ob_start();
		include 'partials/shuffle-images.php';
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

}
