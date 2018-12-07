<?php
/**
 * Sidebar setup
 *
 * @package WordPress
 * @subpackage Ketchup
 * @since Ketchup 1.2
 */

/* Sidebar.php */
$context = array();
$context['widget'] = my_function_to_get_widget();
$context['ad'] = my_function_to_get_an_ad();
Timber::render( 'sidebar.twig', $context );
