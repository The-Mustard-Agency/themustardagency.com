<?php
/**
 *   Settings for Soil, turn stuff on here.
 *
 * @package    WordPress
 * @subpackage Ketchup
 * @since      Ketchup 1.2
 */

/**
 * Turn on here, more info at soil github account.
 */
function setup() {
	add_theme_support( 'soil-clean-up' );
	add_theme_support( 'soil-nav-walker' );
	add_theme_support( 'soil-nice-search' );
	add_theme_support( 'soil-jquery-cdn' );
	add_theme_support( 'soil-relative-urls' );
}
