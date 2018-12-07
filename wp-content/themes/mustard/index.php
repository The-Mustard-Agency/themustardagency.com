<?php
/**
 * Main template entry, duh.
 *
 * @package WordPress
 * @subpackage Ketchup
 * @since Ketchup 1.2
 */

$context = Timber::get_context();
$context['posts'] = new Timber\PostQuery();
$context['foo'] = 'bar';
$context['blog_posts'] = Timber::get_posts( 'post_type=news' );
$templates = array( 'index.twig' );
if ( is_home() ) {
	array_unshift( $templates, 'home.twig' );
}
Timber::render( $templates, $context );
