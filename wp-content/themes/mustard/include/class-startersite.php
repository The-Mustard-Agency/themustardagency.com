<?php
/**
 * Third party plugins that hijack the theme will call wp_head() to get the header template.
 * We use this to start our output buffer and render into the view/page-plugin.twig template in footer.php
 *
 * If you're not using a plugin that requries this behavior (ones that do include Events Calendar Pro and
 * WooCommerce) you can delete this file and footer.php
 *
 * @package    WordPress
 * @subpackage Ketchup
 * @since      Ketchup 1.2
 */

/**
 * Start Timber site.
 **/
class StarterSite extends TimberSite {

	/**
	 * Get Timber support.
	 */
	public function __construct() {
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		parent::__construct();
	}
	/**
	 * Register post types here:.
	 */
	public function register_post_types() {
	}
	/**
	 * Register taxonomy types here:.
	 */
	public function register_taxonomies() {
	}

	/**
	 * Add timber contexts here:.
	 *
	 * @since 0.1
	 *
	 * @param string $context Being a twig thing.
	 */
	public function add_to_context( $context ) {
		$context['foo']            = 'bar';
		$context['stuff']          = 'I am a value set in your functions.php file';
		$context['notes']          = 'These values are available everytime you call Timber::get_context();';
		$context['menu']           = new TimberMenu();
		$context['site']           = $this;
		$context['quicklinksmenu'] = new TimberMenu( 'quicklinks_menu' );
		return $context;
	}

	/**
	 * Add twig extentions here:.
	 *
	 * @since 0.1
	 *
	 * @param string $twig Being a twig thing.
	 */
	public function add_to_twig( $twig ) {
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter( 'myfoo', new Twig_SimpleFilter( 'myfoo', array( $this, 'myfoo' ) ) );
		return $twig;
	}
}
