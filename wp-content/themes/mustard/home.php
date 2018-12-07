<?php
/**
 * Main template entry, duh.
 *
 * @package WordPress
 * @subpackage Ketchup
 * @since Ketchup 1.2
 */

$context = Timber::get_context();
	$context['posts'] = Timber::get_posts();
	$context['pagination'] = Timber::get_pagination();
	Timber::render( 'homepage.twig', $context );
