<?php
/**
 *  Pre-build always used pages...
 *
 *   @package WordPress
 *   @subpackage Ketchup
 *   @since Ketchup 1.2
 */

 // setup a function to check if these pages exist
 function the_slug_exists( $post_name ) {
 	global $wpdb;
 	if( $wpdb->get_row( "SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A' ) ) {
 		return true;
 	} else {
 		return false;
 	}
 }

 // create the terms page
 if ( isset( $_GET['activated'] ) && is_admin() ){
     $terms_page_title = 'Terms of use';
     $terms_page_check = get_page_by_title( $terms_page_title );
     $terms_page = array(
 	    'post_type' => 'page',
 	    'post_title' => $terms_page_title,
 	    'post_content' => 'Awaiting content',
 	    'post_status' => 'publish',
 	    'post_author' => 1,
 	    'post_slug' => 'terms-of-use'
     );
     if(!isset( $terms_page_check->ID ) && !the_slug_exists( 'terms-of-use' ) ){
         $terms_page_id = wp_insert_post( $terms_page );
     }
 }

 // create the cookies page
 if ( isset( $_GET['activated']) && is_admin() ){
		 $cookies_page_title = 'cookies of use';
		 $cookies_page_check = get_page_by_title( $cookies_page_title );
		 $cookies_page = array(
			 'post_type' => 'page',
			 'post_title' => $cookies_page_title,
			 'post_content' => 'Awaiting content',
			 'post_status' => 'publish',
			 'post_author' => 1,
			 'post_slug' => 'cookies-of-use'
		 );
		 if( !isset( $cookies_page_check->ID ) && !the_slug_exists( 'cookies-of-use' ) ){
				 $cookies_page_id = wp_insert_post( $cookies_page );
		 }
 }

 // create the privacy page
 if ( isset( $_GET['activated'] ) && is_admin() ){
		$privacy_page_title = 'privacy of use';
		$privacy_page_check = get_page_by_title( $privacy_page_title );
		$privacy_page = array(
			'post_type' => 'page',
			'post_title' => $privacy_page_title,
			'post_content' => 'Awaiting content',
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'privacy-of-use'
		);
		if( !isset( $privacy_page_check->ID ) && !the_slug_exists( 'privacy-of-use' ) ){
				$privacy_page_id = wp_insert_post( $privacy_page );
		}
 }

 // create the ofsted page
 if ( isset( $_GET['activated'] ) && is_admin() ){
	 $ofsted_page_title = 'ofsted of use';
	 $ofsted_page_check = get_page_by_title($ofsted_page_title);
	 $ofsted_page = array(
		 'post_type' => 'page',
		 'post_title' => $ofsted_page_title,
		 'post_content' => 'Awaiting content',
		 'post_status' => 'publish',
		 'post_author' => 1,
		 'post_slug' => 'ofsted-of-use'
	 );
	 if(!isset($ofsted_page_check->ID) && !the_slug_exists('ofsted-of-use')){
			 $ofsted_page_id = wp_insert_post($ofsted_page);
	 }
 }

 // create the site map page
 if (isset($_GET['activated']) && is_admin()){
     $sitemap_page_title = 'Site Map';
     $sitemap_page_check = get_page_by_title($sitemap_page_title);
     $sitemap_page = array(
 	    'post_type' => 'page',
 	    'post_title' => $sitemap_page_title,
			'post_content' => 'Awaiting content',
 	    'post_status' => 'publish',
 	    'post_author' => 1,
 	    'post_slug' => 'site-map'
     );
     if(!isset($sitemap_page_check->ID) && !the_slug_exists('site-map')){
         $sitemap_page_id = wp_insert_post($sitemap_page);
     }
 }

 // change the Sample page to the home page
 if (isset($_GET['activated']) && is_admin()){
     $home_page_title = 'Home';
     $home_page_check = get_page_by_title($home_page_title);
     $home_page = array(
 	    'post_type' => 'page',
 	    'post_title' => $home_page_title,
 	    'post_content' => 'Awaiting content',
 	    'post_status' => 'publish',
 	    'post_author' => 1,
 	    'ID' => 2,
 	    'post_slug' => 'home'
     );
     if(!isset($home_page_check->ID) && !the_slug_exists('home')){
         $home_page_id = wp_insert_post($home_page);
     }
 }

 if (isset($_GET['activated']) && is_admin()){
 	// Use a static front page
 	$front_page = 2; // this is the default page created by WordPress
 	update_option( 'page_on_front', $front_page );
 	update_option( 'show_on_front', 'page' );
 }
