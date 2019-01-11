<?php
/**
 *  ACF setup, setup for optons pages and the general settings...
 *
 * @package    WordPress
 * @subpackage Ketchup
 * @since      Ketchup 1.2
 */

if ( function_exists( 'acf_add_options_page' ) ) {
	$page = acf_add_options_page(
		array(
			'page_title' => 'Mustard General Settings',
			'menu_title' => 'Mustard Settings',
			'menu_slug'  => 'theme-general-settings',
			'capability' => 'edit_posts',
			'icon_url'   => 'dashicons-lock',
			'position'   => 99,
			'redirect'   => false,
		)
	);
}

if ( function_exists( 'acf_add_options_page' ) ) {
	$page = acf_add_options_page(
		array(
			'page_title' => 'Homepage Welcome',
			'menu_title' => 'Homepage Welcome',
			'menu_slug'  => 'theme-home_welcome',
			'capability' => 'edit_posts',
			'icon_url'   => 'dashicons-format-status',
			'position'   => '4.3',
			'redirect'   => false,
		)
	);
}

if ( function_exists( 'acf_add_options_page' ) ) {
	$page = acf_add_options_page(
		array(
			'page_title' => 'Testimonials',
			'menu_title' => 'testimonials',
			'menu_slug'  => 'theme-testimonial-settings',
			'capability' => 'edit_posts',
			'icon_url'   => 'dashicons-welcome-view-site',
			'position'   => '4.5',
			'redirect'   => false,
		)
	);
}

if ( function_exists( 'acf_add_options_page' ) ) {
	$page = acf_add_options_page(
		array(
			'page_title' => 'Global CTA',
			'menu_title' => 'global cta',
			'menu_slug'  => 'theme-g-cta-settings',
			'capability' => 'edit_posts',
			'icon_url'   => 'dashicons-slides',
			'position'   => '4.6',
			'redirect'   => false,
		)
	);
}

if ( function_exists( 'acf_add_options_page' ) ) {
	$page = acf_add_options_page(
		array(
			'page_title' => 'Tiles',
			'menu_title' => 'tiles',
			'menu_slug'  => 'theme-tiles-settings',
			'capability' => 'edit_posts',
			'icon_url'   => 'dashicons-grid-view',
			'position'   => '4.7',
			'redirect'   => false,
		)
	);
}

if ( function_exists( 'acf_add_options_page' ) ) {
	$page = acf_add_options_page(
		array(
			'page_title' => 'Footer stuff',
			'menu_title' => 'footer stuff',
			'menu_slug'  => 'theme-footer-settings',
			'capability' => 'edit_posts',
			'icon_url'   => 'dashicons-editor-insertmore',
			'position'   => '4.8',
			'redirect'   => false,
		)
	);
}


// Add help page.
add_action( 'admin_menu', 'register_my_custom_menu_page' );
/** Remove usused items. */
function register_my_custom_menu_page() {
	add_menu_page( 'Help', 'Help', 'manage_options', 'help', 'help_page', 'dashicons-welcome-learn-more', 999 );
}



// Not afc, but renames posts to news:.
add_action( 'admin_menu', 'pilau_change_post_menu_label' );
add_action( 'init', 'pilau_change_post_object_label' );
/** Remove usused items. */
function pilau_change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0]                 = 'Blog';// WPCS: override ok.
	$submenu['edit.php'][5][0]  = 'Blog';// WPCS: override ok.
	$submenu['edit.php'][10][0] = 'Add blog post';// WPCS: override ok.
	$submenu['edit.php'][16][0] = 'Blog Tags';// WPCS: override ok.
	echo '';
}
/** Remove usused items. */
function pilau_change_post_object_label() {
	global $wp_post_types;
	$labels                     = &$wp_post_types['post']->labels;
	$labels->name               = 'Blog';
	$labels->singular_name      = 'Blog';
	$labels->add_new            = 'Add blog post';
	$labels->add_new_item       = 'Add blog post';
	$labels->edit_item          = 'Edit blog post';
	$labels->new_item           = 'Blog';
	$labels->view_item          = 'View blog post';
	$labels->search_items       = 'Search blog posts';
	$labels->not_found          = 'No blog post found';
	$labels->not_found_in_trash = 'No blog post found in Trash';
}

/** Remove usused items. */
function remove_menus() {
	remove_menu_page( 'edit-comments.php' );
	remove_menu_page( 'themes.php' );
	remove_menu_page( 'plugins.php' );
	add_menu_page( 'Menu System', 'Menu System', 'manage_options', 'nav-menus.php', '', 'dashicons-menu', 90 );
	remove_menu_page( 'tools.php' );
	remove_menu_page( 'options-general.php' );
}

if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group(
		array(
			'key'                   => 'group_5a04269935bc7',
			'title'                 => 'Mustard Settings',
			'fields'                => array(
				array(
					'key'               => 'field_5a046b45a3fd4',
					'label'             => 'General Settings',
					'name'              => '',
					'type'              => 'tab',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'placement'         => 'top',
					'endpoint'          => 0,
				),
				array(
					'key'               => 'field_5a046f33ccc62',
					'label'             => 'Logo',
					'name'              => 'logo',
					'type'              => 'file',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'return_format'     => 'url',
					'library'           => 'all',
					'min_size'          => '',
					'max_size'          => '',
					'mime_types'        => '',
				),
				array(
					'key'               => 'field_5a046b5ba3fd5',
					'label'             => 'School Address',
					'name'              => 'school_address',
					'type'              => 'textarea',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
					'maxlength'         => '',
					'rows'              => '',
				),
				array(
					'key'               => 'field_5a046b71a3fd6',
					'label'             => 'School Email',
					'name'              => 'school_email',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
				array(
					'key'               => 'field_5a046b7ba3fd7',
					'label'             => 'School Phone Number',
					'name'              => 'school_phone',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
				array(
					'key'               => 'field_5a059101eb59b',
					'label'             => 'Quicklinks',
					'name'              => '',
					'type'              => 'tab',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'placement'         => 'top',
					'endpoint'          => 0,
				),
				array(
					'key'               => 'field_5a05962b40780',
					'label'             => 'Number of quicklinks',
					'name'              => 'number_of_quicklinks',
					'type'              => 'select',
					'instructions'      => 'select how many quicklinks (otherwise this\'ll get messy!)',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'hide_admin'        => 0,
					'choices'           => array(
						'50%'         => '2',
						'33.3333333%' => '3',
						'25%'         => '4',
						'20%'         => '5',
					),
					'default_value'     => array(),
					'allow_null'        => 0,
					'multiple'          => 0,
					'ui'                => 0,
					'ajax'              => 0,
					'return_format'     => 'value',
					'placeholder'       => '',
				),
				array(
					'key'               => 'field_5a059062b1ffc',
					'label'             => 'Quicklinks',
					'name'              => 'quicklinks',
					'type'              => 'repeater',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'collapsed'         => '',
					'min'               => 3,
					'max'               => 5,
					'layout'            => 'block',
					'button_label'      => 'Add another quicklink',
					'sub_fields'        => array(
						array(
							'key'               => 'field_5a059083b1ffd',
							'label'             => 'quicklink_image',
							'name'              => 'quicklink_image',
							'type'              => 'image',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'return_format'     => 'url',
							'preview_size'      => 'thumbnail',
							'library'           => 'all',
							'min_width'         => '',
							'min_height'        => '',
							'min_size'          => '',
							'max_width'         => '',
							'max_height'        => '',
							'max_size'          => '',
							'mime_types'        => '',
						),
						array(
							'key'               => 'field_5a059083g1ffd',
							'label'             => 'quicklink_icon',
							'name'              => 'quicklink_icon',
							'type'              => 'image',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'return_format'     => 'url',
							'preview_size'      => 'thumbnail',
							'library'           => 'all',
							'min_width'         => '',
							'min_height'        => '',
							'min_size'          => '',
							'max_width'         => '',
							'max_height'        => '',
							'max_size'          => '',
							'mime_types'        => '',
						),
						array(
							'key'               => 'field_5a059097b1ffe',
							'label'             => 'quiclink title',
							'name'              => 'quiclink_title',
							'type'              => 'text',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'default_value'     => '',
							'placeholder'       => '',
							'prepend'           => '',
							'append'            => '',
							'maxlength'         => '',
						),
						array(
							'key'               => 'field_5a859c3002768',
							'label'             => 'quicklink description',
							'name'              => 'quicklink_description',
							'type'              => 'text',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'hide_admin'        => 0,
							'default_value'     => '',
							'placeholder'       => '',
							'prepend'           => '',
							'append'            => '',
							'maxlength'         => '',
						),
						array(
							'key'               => 'field_5a0590b9b1fff',
							'label'             => 'quicklink_uri',
							'name'              => 'quicklink_uri',
							'type'              => 'url',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'default_value'     => '',
							'placeholder'       => '',
						),
					),
				),
				array(
					'key'               => 'field_5a292146a09a8',
					'label'             => 'Social Media',
					'name'              => '',
					'type'              => 'tab',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'placement'         => 'top',
					'endpoint'          => 0,
				),
				array(
					'key'               => 'field_5a29217b5d320',
					'label'             => 'Facebook',
					'name'              => 'facebook_enable',
					'type'              => 'true_false',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'message'           => '',
					'default_value'     => 0,
					'ui'                => 1,
					'ui_on_text'        => '',
					'ui_off_text'       => '',
				),
				array(
					'key'               => 'field_5a2921655d31f',
					'label'             => 'Twitter',
					'name'              => 'twitter_enable',
					'type'              => 'true_false',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'message'           => '',
					'default_value'     => 0,
					'ui'                => 1,
					'ui_on_text'        => '',
					'ui_off_text'       => '',
				),
				array(
					'key'               => 'field_5a0426a7e9301',
					'label'             => 'General Dev Settings (DO NOT EDIT!)',
					'name'              => '',
					'type'              => 'tab',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'placement'         => 'top',
					'endpoint'          => 0,
				),
				array(
					'key'               => 'field_5a0dbcbc4f9c0',
					'label'             => 'Quicklinks setup',
					'name'              => 'quicklinks_setup',
					'type'              => 'select',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'choices'           => array(
						'photo'  => 'Photo',
						'button' => 'Button',
					),
					'default_value'     => array(),
					'allow_null'        => 0,
					'multiple'          => 0,
					'ui'                => 0,
					'ajax'              => 0,
					'return_format'     => 'value',
					'placeholder'       => '',
				),
				array(
					'key'               => 'field_5a26b67c8b65e',
					'label'             => 'Admin override',
					'name'              => 'admin_override',
					'type'              => 'true_false',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'message'           => '',
					'default_value'     => 1,
					'ui'                => 1,
					'ui_on_text'        => '',
					'ui_off_text'       => '',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'theme-general-settings',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => 1,
			'description'           => '',
		)
	);

endif;

if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group(
		array(
			'key'                   => 'group_5a29235f2ff27',
			'title'                 => 'Homepage Welcome',
			'fields'                => array(
				array(
					'key'               => 'field_5a71870241a05',
					'label'             => 'Homepage, welcome title',
					'name'              => 'homepage_welcome_title',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'hide_admin'        => 0,
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
				array(
					'key'               => 'field_5a2923713d0f3',
					'label'             => 'Homepage welcome',
					'name'              => 'homepage_welcome',
					'type'              => 'wysiwyg',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'tabs'              => 'all',
					'toolbar'           => 'full',
					'media_upload'      => 1,
					'delay'             => 0,
				),
				array(
					'key'               => 'field_5a81a26ee8c9f',
					'label'             => 'Image next to events',
					'name'              => 'image_next_to_events',
					'type'              => 'image',
					'instructions'      => 'This is the image next to the events section:',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'hide_admin'        => 0,
					'return_format'     => 'url',
					'preview_size'      => 'thumbnail',
					'library'           => 'all',
					'min_width'         => '',
					'min_height'        => '',
					'min_size'          => '',
					'max_width'         => '',
					'max_height'        => '',
					'max_size'          => '',
					'mime_types'        => '',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'theme-home_welcome',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => 1,
			'description'           => '',
		)
	);

endif;

$admin_mode = get_field( 'admin_override', 'options' );
if ( 'true' == $admin_mode ) {
	add_action( 'admin_menu', 'remove_menus' );
}
