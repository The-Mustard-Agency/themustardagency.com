<?php
/**
 * Page setup, for general pages. To edit pages use the twig files in the view folder.
 *
 * @package    WordPress
 * @subpackage Ketchup
 * @since      Ketchup 1.2
 */

$context                 = Timber::get_context();
$post                    = new TimberPost();
$context['post']         = $post;
$context['blog_post']    = Timber::get_posts( '' );
$context['pagination']   = Timber::get_pagination();
$context['page_sidebar'] = Timber::get_widgets( 'page_sidebar' );
$context['work']         = Timber::get_posts( 'post_type=work&posts_per_page=-1&paged=page' );
$context['blog']         = Timber::get_posts( 'post_type=post&posts_per_page=-1&paged=page' );


/**
 * Page render overwrite context, e.g. set view/page-this.twig to overwrite
 * example.com/this - or if page-this dosnt exist, use default page.twig.
*/
Timber::render( array( 'page-' . $post->post_name . '.twig', 'page.twig' ), $context );
