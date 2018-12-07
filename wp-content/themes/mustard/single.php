<?php
/**
 * Single page setup
 *
 * @package WordPress
 * @subpackage Ketchup
 * @since Ketchup 1.2
 */

/** Single.php, see connected twig example. */
$context = Timber::get_context();
$context['post'] = new Timber\Post();

		$args = array(
			'post_type' => 'Curriculum',
			'posts_per_page' => -1,
			'orderby' => array(
				'date' => 'DESC',
			),
		);
		$context['curriculum'] = Timber::get_posts( $args );
		$context['page_sidebar'] = Timber::get_widgets( 'page_sidebar' );
		Timber::render( 'single.twig', $context );
		?>
<style>
	#header_quicklinks_wrap{top: -90px; }
</style>
