<?php
/**
 *   our work
 *   custome post type, for simplicity...
 *
 *   @package WordPress
 *   @subpackage Ketchup
 *   @since Ketchup 1.2
 */

/*
* Creating a function to create our CPT
*/

function custom_post_type() {

    $labels = array(
        'name'                => _x( 'work', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'work', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Work', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent work', 'twentythirteen' ),
        'all_items'           => __( 'All work', 'twentythirteen' ),
        'view_item'           => __( 'View work', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New work', 'twentythirteen' ),
        'add_new'             => __( 'Add New', 'twentythirteen' ),
        'edit_item'           => __( 'Edit work', 'twentythirteen' ),
        'update_item'         => __( 'Update work', 'twentythirteen' ),
        'search_items'        => __( 'Search work', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );

    $args = array(
        'label'               => __( 'work', 'twentythirteen' ),
        'description'         => __( 'work news and reviews', 'twentythirteen' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'genres', 'websites' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
				'show_in_rest'       => true,
				'rest_base'          => 'work',
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    register_post_type( 'work', $args );

}

add_action( 'init', 'custom_post_type', 0 );



// Adding services taxonomy.
add_action( 'init', 'add_custom_taxonomies', 0 );
/** Adding new taxonomies for curriculum section. */
function add_custom_taxonomies() {
	// Add new "Locations" taxonomy to Posts.
	register_taxonomy(
		'services', 'work', array(
	    'hierarchical' => true,
	    'labels' => array(
	      'name' => _x( 'services', 'taxonomy general name' ),
	      'singular_name' => _x( 'Services', 'taxonomy singular name' ),
	      'search_items' =>  __( 'Search services' ),
	      'all_items' => __( 'All services' ),
	      'parent_item' => __( 'Parent Service' ),
	      'parent_item_colon' => __( 'Parent Service:' ),
	      'edit_item' => __( 'Edit Service' ),
	      'update_item' => __( 'Update Service' ),
	      'add_new_item' => __( 'Add New Service' ),
	      'new_item_name' => __( 'New Service Name' ),
	      'menu_name' => __( 'Services' ),
	    ),
	    'rewrite' => array(
	      'slug' => 'services',
	      'with_front' => false,
	      'hierarchical' => true,
	    ),
	  )
	);
}


// Adding sector taxonomy.
add_action( 'init', 'add_custom_taxonomy', 0 );
/** Adding new taxonomies for curriculum section. */
function add_custom_taxonomy() {
	// Add new "Locations" taxonomy to Posts.
	register_taxonomy(
		'sector', 'work', array(
	    'hierarchical' => true,
	    'labels' => array(
	      'name' => _x( 'sector', 'taxonomy general name' ),
	      'singular_name' => _x( 'sector', 'taxonomy singular name' ),
	      'search_items' =>  __( 'Search Sector' ),
	      'all_items' => __( 'All Sectors' ),
	      'parent_item' => __( 'Parent Sector' ),
	      'parent_item_colon' => __( 'Parent Sector:' ),
	      'edit_item' => __( 'Edit Sector' ),
	      'update_item' => __( 'Update Sector' ),
	      'add_new_item' => __( 'Add New Sector' ),
	      'new_item_name' => __( 'New Sector Name' ),
	      'menu_name' => __( 'Sector' ),
	    ),
	    'rewrite' => array(
	      'slug' => 'services',
	      'with_front' => false,
	      'hierarchical' => true,
	    ),
	  )
	);
}
