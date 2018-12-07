<?php
/**
 * Auto adds menus for the theme.
 *
 * @package WordPress
 * @subpackage Ketchup
 * @since Ketchup 1.2
 */

// Add main menu.
$main_menu_name = 'nav-main';
$menu_exists = wp_get_nav_menu_object( $main_menu_name );

if ( ! $menu_exists ) {
	$menu_id = wp_create_nav_menu( $main_menu_name );
}

// Add footer menu.
$footer_menu_name = 'footer-menu';
$menu_exists = wp_get_nav_menu_object( $footer_menu_name );

if ( ! $menu_exists ) {
	$menu_id = wp_create_nav_menu( $footer_menu_name );
}

// Add quicklinks menu.
$ql_menu_name = 'quicklinks_menu';
$menu_exists = wp_get_nav_menu_object( $ql_menu_name );

if ( ! $menu_exists ) {
	$menu_id = wp_create_nav_menu( $ql_menu_name );
}
