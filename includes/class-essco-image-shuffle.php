<?php

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Essco_Image_Shuffle
 * @subpackage Essco_Image_Shuffle/includes
 * @author     Jitendrasinh Rana <jnrana.essco.tech@gmail.com>
 */
class Essco_Image_Shuffle {

	protected $loader;
	protected $plugin_name;
	protected $version;

	public function __construct() {
		$this->plugin_name = 'essco-image-shuffle';
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-essco-image-shuffle-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-essco-image-shuffle-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-essco-image-shuffle-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-essco-image-shuffle-public.php';
		$this->loader = new Essco_Image_Shuffle_Loader();
	}

	private function set_locale() {
		$plugin_i18n = new Essco_Image_Shuffle_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	private function define_admin_hooks() {
		$plugin_admin = new Essco_Image_Shuffle_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		
		$this->loader->add_action( 'admin_head', $plugin_admin, 'regiter_tinymce_buttons' );
		// $this->loader->add_action( 'admin_menu', $plugin_admin, 'create_menu_page');
	}

	private function define_public_hooks() {
		$plugin_public = new Essco_Image_Shuffle_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		add_shortcode('shuffle-images', array($plugin_public, 'shuffle_images'));

	}

	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}

}