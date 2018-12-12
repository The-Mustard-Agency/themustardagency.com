<?php
/**
 * Ketchup theme.
 * Version 1.4
 *
 * @package WordPress
 * @subpackage Ketchup
 * @since Ketchup 1.4
 *
 *   /$$$$$$  /$$$$$$$$ /$$$$$$  /$$$$$$$  /$$
 *  /$$__  $$|__  $$__//$$__  $$| $$__  $$| $$
 * | $$  \__/   | $$  | $$  \ $$| $$  \ $$| $$
 * |  $$$$$$    | $$  | $$  | $$| $$$$$$$/| $$
 *  \____  $$   | $$  | $$  | $$| $$____/ |__/
 *  /$$  \ $$   | $$  | $$  | $$| $$
 * |  $$$$$$/   | $$  |  $$$$$$/| $$       /$$
 *  \______/    |__/   \______/ |__/      |__/
 *
 * <<<< DO NOT EDIT LIVE! THIS IS A TWIG BASED THEME! >>>>
 */

// Check if timber is running.
if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
	});
	add_filter( 'template_include', function( $template ) {
		return get_stylesheet_directory() . '/static/no-timber.html';
	});

	return;
}

// So you can set the twig docs in either the 'templates' folder or 'views' folder, feel free to add more:.
Timber::$dirname = array( 'templates', 'view' );

// Start Timber.
require_once( __DIR__ . '/include/class-startersite.php' );

/** Register the files here:.*/
function theme_register_scripts() {
	wp_enqueue_style( 'st-georges-css', get_stylesheet_directory_uri() . '/style.css', array(), '1.0.0', 'all' );
	wp_enqueue_script( 'st-georges-js', esc_url( trailingslashit( get_template_directory_uri() ) . 'js/mustard.min.js' ), array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_register_scripts', 1 );

/* Add menu support */
if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'menus' );
}

/* Add post image support */
add_theme_support( 'post-thumbnails' );

register_sidebar(
	array(
		'name' => 'page sidebar',
		'id' => 'page_sidebar',
		'before_widget' => '<div id="sidebar_inner">',
		'after_widget' => '</div>',
		'before_title' => '<div class="side-title"><h2>',
		'after_title' => '</h2></div>',
	)
);

// Recontextualising the menus. be sure to name names correctly here e.g. menu name should be "nav-main".
add_filter( 'timber/context', 'add_to_context' );

/** This is getting menus from wordpress.
 *
 * @since 1.2
 *
 * @param string $context Being the context of the menu, and setting it in twig.
 */
function add_to_context( $context ) {
	$context['menu'] = new \Timber\Menu( 'nav-main' );
	$context['footermenu'] = new \Timber\Menu( 'footer-menu' );
	return $context;
}

/** Setting limits to post/news exerpts and adding trailling ...
 *
 * @since 1.4
 *
 * @param string $limit Being the limit.
 */
function excerpt( $limit ) {
		$excerpt = explode( ' ', get_the_excerpt(), $limit );
	if ( count( $excerpt ) >= $limit ) {
		array_pop( $excerpt );
		$excerpt = implode( ' ', $excerpt ) . '...';
	} else {
		$excerpt = implode( ' ', $excerpt );
	}
		$excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );
		return $excerpt;
}

// Timber context for the acf feeds.
add_filter( 'timber_context', 'mytheme_timber_context' );

/** Get 'options' pages for ACF. (backend acf stuff).
 *
 * @since 1.4
 *
 * @param string $context Being twig giving it accessable context.
 */
function mytheme_timber_context( $context ) {
		$context['options'] = get_fields( 'option' );
		return $context;
}

// Backend sorting for acf events (mostly redundant).
add_filter( 'manage_school_events_posts_columns', 'set_custom_edit_mycpt_columns' );

/** ACF date thing.
 *
 * @since 1.4
 *
 * @param string $columns Being a twig thing.
 */
function set_custom_edit_mycpt_columns( $columns ) {
	$date = $colunns['date'];
	unset( $columns['date'] );
	$columns['acf_field'] = __( 'Event Date', 'my-text-domain' );
	$columns['date'] = $date;
	return $columns;
}

// Another acf events, making the columns sortable in backend.
add_action( 'manage_school_events_posts_custom_column', 'custom_mycpt_column', 10, 2 );

/** Make events sortable in backend.
 *
 * @since 1.4
 *
 * @param string $column Being the backend columns.
 * @param string $post_id Being the post id of each event.
 */
function custom_mycpt_column( $column, $post_id ) {
	switch ( $column ) {
		// Display the value of an ACF (Advanced Custom Fields) field.
		case 'acf_field':
			echo esc_html( get_field( 'event_date', $post_id ) );
			break;
	}
}

// Adds the acf items to the tabel(backend again).
add_filter( 'manage_edit-school_events_sortable_columns', 'set_custom_mycpt_sortable_columns' );

/** Adds sortable columns to ACF events.
 *
 * @since 1.4
 *
 * @param string $columns Being a twig thing.
 */
function set_custom_mycpt_sortable_columns( $columns ) {
	$columns['acf_field'] = 'acf_field';
	return $columns;
}

// Should remove comments section in backend, only works on live server.
add_action( 'wp_before_admin_bar_render', 'my_admin_bar_render' );

/** Removes admin bar comments section:*/
function my_admin_bar_render() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu( 'comments' );
		$wp_admin_bar->remove_menu( 'wp-logo' );
}

// Remove howdy from backend, because.. ew.
add_action( 'admin_bar_menu', 'wp_admin_bar_my_custom_account_menu', 11 );
/** Removes the annoying Howdy in the backend.
 *
 * @since 1.1
 *
 * @param string $wp_admin_bar Being the wp admin bar thing.
 */
function wp_admin_bar_my_custom_account_menu( $wp_admin_bar ) {
	$user_id = get_current_user_id();
	$current_user = wp_get_current_user();
	$profile_url = get_edit_profile_url( $user_id );

	if ( 0 != $user_id ) {
		/** Add the "My Account" menu. */
		$avatar = get_avatar( $user_id, 28 );
		/* translators: %s: search term */
		$howdy = sprintf( __( 'Welcome, %1$s' ), $current_user->display_name );
		$class = empty( $avatar ) ? '' : 'with-avatar';
		$wp_admin_bar->add_menu(
			array(
				'id' => 'my-account',
				'parent' => 'top-secondary',
				'title' => $howdy . $avatar,
				'href' => $profile_url,
				'meta' => array(
					'class' => $class,
				),
			)
		);
	}
}

/**
 * Require exturnal scripts to keep functions relativly tidy, can be turned off to save time also.
 *
 * - define any shortcodes | since: 0.8
 * - custom login page | since: 1.0
 * - acf settings | since: 0.8
 * - htaccess | since: 1.2
 * - dashboard helper - REGRESSING | since: 1.3
 * - MU Pages, for ofsted complying | since: 1.8
 * - jigsaw | since: 1.0
 * - automenus | since: 1.3
 * - soil (can cause issues on server, first port of call for blank page issues.) | since: 1.3
 *
 * @since 1.4
 */

// Mustard portfolio.
require_once( __DIR__ . '/include/our-work.php' );

// Define shortcodes.
require_once( __DIR__ . '/include/shortcodes.php' );

// Custome login.
require_once( __DIR__ . '/include/mustard-login.php' );

// ACF Starter set in admin, for acf backend pages etc.
require_once( __DIR__ . '/include/acf.php' );

// Dynamic htaccess, for varnishing - run by doing permalink updates.
require_once( __DIR__ . '/include/htaccess.php' );

// Dashboard Helper.
require( __DIR__ . '/include/dash-helper.php' );

// Must-use pages.
require( __DIR__ . '/include/pre-built-pages.php' );

// Jigsaw.
require( __DIR__ . '/include/jigsaw.php' );

// Auto menus, automaticly adds predefined menus to the theme.
require( __DIR__ . '/include/menu.php' );

// Soil, for smart stuff.
require( __DIR__ . '/include/soil.php' );

// Lets do this thing!!!
new StarterSite();
