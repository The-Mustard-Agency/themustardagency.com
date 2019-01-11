<?php
/**
 *   Short code section...
 *
 * @package    WordPress
 * @subpackage Ketchup
 * @since      Ketchup 1.2
 */

add_shortcode( 'news_page', 'news_page_section' );
/**
 * News page section
 */
function news_page_section() {
	$data         = Timber::get_context();
	$data['post'] = new TimberPost();
	$templates    = array( 'news-posts.twig' );
	if ( is_page() ) {
		$args          = array( 'posts_per_page' => 100 );
		$data['posts'] = Timber::get_posts( $args );
		array_unshift( $templates, 'my-static-home.twig' );
	}
	Timber::render( $templates, $data );
}
add_shortcode( 'docs_page', 'docs_page_section' );
/**
 * Doc page section
 */
function docs_page_section() { }
