<?php
/**
 *   Custom Login section...
 *
 *   @package WordPress
 *   @subpackage Ketchup
 *   @since Ketchup 1.2
 */

/** Changes logo */
function my_login_logo() {
	?>
	<style type="text/css">
		body.login div#login h1 a {
			background-image: url(<?php get_template_directory_uri(); ?>/images/logo.png);
			background-size:166px 44px !important;padding-bottom: 30px;width:166px !important;height:44px !important;margin:0px auto;
		}
	</style>
	<?php
}
add_action( 'login_enqueue_scripts', 'my_login_logo' );

/** Custom Login STYLE */
add_action( 'login_head', 'custom_login_css' );
/** Enque custome css for login */
function custom_login_css() {
	wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/include/login/login-styles.css', array(), filemtime( get_template_directory() . '/include/login/login-styles.css' ), false );
}
