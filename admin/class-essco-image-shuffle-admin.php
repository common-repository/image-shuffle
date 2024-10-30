<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Essco_Image_Shuffle
 * @subpackage Essco_Image_Shuffle/admin
 * @author     Jitendrasinh Rana <jnrana.essco.tech@gmail.com>
 */
class Essco_Image_Shuffle_Admin {

	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}
	
	public function regiter_tinymce_buttons() {
		global $typenow;

	    if(!in_array( $typenow, array('post', 'page')))
	        return ;
	
	    add_filter( 'mce_external_plugins', array($this,'register_tinymce_plugin'));
	    add_filter( 'mce_buttons', array($this,'add_tinymce_button'));
	}
	
	// Inlcude the JS for TinyMCE
	public function register_tinymce_plugin( $plugin_array ) {
	    $plugin_array['essco_image_shuffle'] = plugin_dir_url( __FILE__ ) . 'js/tinymce-image-shuffle-plugin.js';
	    return $plugin_array;
	}
	
	// Add the button key for address via JS
	public function add_tinymce_button( $buttons ) {
	    array_push( $buttons, 'essco_image_shuffle_btn' );
	    return $buttons;
	}
	
	public function create_menu_page() {
		add_options_page( 'Image Suffle - essco.tech', 'Image Shuffle', 'manage_options', 'essco-tech-image-shuffle', array($this, 'admin_menu_page_callbak') );
	}
	
	public function admin_menu_page_callbak() {
		require_once 'partials/essco-image-shuffle-admin-display.php';
	}
	
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/essco-image-shuffle-admin.css', array(), $this->version, 'all' );
	}
	
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name.'-image-shuffle', plugin_dir_url( __FILE__ ) . 'js/jquery.shuffle-images.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/essco-image-shuffle-admin.js', array( 'jquery' ), $this->version, false );
	}
	
	public function getPluginAdminURL() {
		return plugin_dir_url( __FILE__ );
	}

}
