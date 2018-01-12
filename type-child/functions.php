<?php
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


// Registering Custom Post Type [Post Type = Posters] 
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Posters', 'Post Type General Name', 'type-child' ),
		'singular_name'         => _x( 'Poster', 'Post Type Singular Name', 'type-child' ),
		'menu_name'             => __( 'Posters', 'type-child' ),
		'name_admin_bar'        => __( 'Post Type', 'type-child' ),
		'archives'              => __( 'Poster Archives', 'type-child' ),
		'attributes'            => __( ' Attributes', 'type-child' ),
		'parent_item_colon'     => __( 'Parent Item:', 'type-child' ),
		'all_items'             => __( 'All Posters', 'type-child' ),
		'add_new_item'          => __( 'Add New Poster', 'type-child' ),
		'add_new'               => __( 'Add New', 'type-child' ),
		'new_item'              => __( 'New Poster', 'type-child' ),
		'edit_item'             => __( 'Edit Poster', 'type-child' ),
		'update_item'           => __( 'Update Poster', 'type-child' ),
		'view_item'             => __( 'View Poster', 'type-child' ),
		'view_items'            => __( 'View Posters', 'type-child' ),
		'search_items'          => __( 'Search Posters', 'type-child' ),
		'not_found'             => __( 'Not found', 'type-child' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'type-child' ),
		'featured_image'        => __( 'Featured Image', 'type-child' ),
		'set_featured_image'    => __( 'Set featured image', 'type-child' ),
		'remove_featured_image' => __( 'Remove featured image', 'type-child' ),
		'use_featured_image'    => __( 'Use as featured image', 'type-child' ),
		'insert_into_item'      => __( 'Insert into item', 'type-child' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'type-child' ),
		'items_list'            => __( 'Posters list', 'type-child' ),
		'items_list_navigation' => __( 'Posters list navigation', 'type-child' ),
		'filter_items_list'     => __( 'Filter Poster Type', 'type-child' ),
	);
	$args = array(
		'label'                 => __( 'Posters', 'type-child' ),
		'description'           => __( 'Post Type Description', 'type-child' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'posters', $args );

}
add_action( 'init', 'custom_post_type', 0 );
?>
