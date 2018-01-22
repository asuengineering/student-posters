<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Theme Options', 'crb' ) )
        ->add_fields( array(
            Field::make( 'text', 'crb_text', 'Text Field' ),
        ) );
}

/*
  =========================================================================
  Post Meta
  =========================================================================
*/

//use Carbon_Fields\Field;
//use Carbon_Fields\Container;

add_action('carbon_fields_register_fields', 'crb_attach_post_meta' );
function crb_attach_post_meta() {
    Container::make('post_meta', __( 'Student(s) Information', 'crb' ) )
        ->where('post_type', '=', 'posters' )
        ->add_fields( array(
            Field::make('text', 'crb_student1name', 'Student Name' ),
            Field::make('textarea', 'crb_student1bio', 'Student Bio'),
            Field::make('text', 'crb_student2name', 'Student Name' ),
            Field::make('textarea', 'crb_student2bio', 'Student Bio'),
        ) );
}

/*
  =========================================================================
  Child Theme Enqueue
  =========================================================================
*/

function my_theme_enqueue_styles() {

    $parent_style = 'type-style'; // This is type-style | Type is Parent Theme

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


/*
  =========================================================================
  Custom Post Type
  =========================================================================
*/

// Custom Post Type [Post Type = Posters --> Capstone]
function poster_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Posters', 'Post Type General Name', 'type-child' ),
		'singular_name'         => _x( 'Poster', 'Post Type Singular Name', 'type-child' ),
		'menu_name'             => __( 'Posters', 'type-child' ),
		'name_admin_bar'        => __( 'Post Type', 'type-child' ),
		'archives'              => __( 'Poster Archives', 'type-child' ),
		'attributes'            => __( 'Attributes', 'type-child' ),
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
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'post_tag', 'topics', 'publication' ),
                                    // added 2 custom taxonomies here & deleted categories
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
    'menu_icon'             => 'dashicons-format-image',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'posters', $args );

}
add_action( 'init', 'poster_custom_post_type', 0 );


/*
  =========================================================================
  Taxonomy #1 --> Poster Topics
  =========================================================================
*/

// Custom Taxonomy for Topics

function project_topics_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Topics', 'Taxonomy General Name', 'type_child' ),
		'singular_name'              => _x( 'Topic', 'Taxonomy Singular Name', 'type_child' ),
		'menu_name'                  => __( 'Topics', 'type_child' ),
		'all_items'                  => __( 'All Items', 'type_child' ),
		'parent_item'                => __( 'Parent Item', 'type_child' ),
		'parent_item_colon'          => __( 'Parent Item:', 'type_child' ),
		'new_item_name'              => __( 'New Item Name', 'type_child' ),
		'add_new_item'               => __( 'Add New Item', 'type_child' ),
		'edit_item'                  => __( 'Edit Item', 'type_child' ),
		'update_item'                => __( 'Update Item', 'type_child' ),
		'view_item'                  => __( 'View Item', 'type_child' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'type_child' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'type_child' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'type_child' ),
		'popular_items'              => __( 'Popular Items', 'type_child' ),
		'search_items'               => __( 'Search Items', 'type_child' ),
		'not_found'                  => __( 'Not Found', 'type_child' ),
		'no_terms'                   => __( 'No items', 'type_child' ),
		'items_list'                 => __( 'Items list', 'type_child' ),
		'items_list_navigation'      => __( 'Items list navigation', 'type_child' ),
	);
	$rewrite = array(
		'slug'                       => 'topics'
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'topics', array( 'posters' ), $args );

}
add_action( 'init', 'project_topics_taxonomy', 0 );


/*
=========================================================================
Taxonomy #2 -->  Publication
=========================================================================
*/

// Custom Taxonomy for Publication (Term-Year)

function publication_period_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Publication Period', 'Taxonomy General Name', 'type_child' ),
		'singular_name'              => _x( 'Publication', 'Taxonomy Singular Name', 'type_child' ),
		'menu_name'                  => __( 'Publication', 'type_child' ),
		'all_items'                  => __( 'All Items', 'type_child' ),
		'parent_item'                => __( 'Parent Item', 'type_child' ),
		'parent_item_colon'          => __( 'Parent Item:', 'type_child' ),
		'new_item_name'              => __( 'New Item Name', 'type_child' ),
		'add_new_item'               => __( 'Add New Item', 'type_child' ),
		'edit_item'                  => __( 'Edit Item', 'type_child' ),
		'update_item'                => __( 'Update Item', 'type_child' ),
		'view_item'                  => __( 'View Item', 'type_child' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'type_child' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'type_child' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'type_child' ),
		'popular_items'              => __( 'Popular Items', 'type_child' ),
		'search_items'               => __( 'Search Items', 'type_child' ),
		'not_found'                  => __( 'Not Found', 'type_child' ),
		'no_terms'                   => __( 'No items', 'type_child' ),
		'items_list'                 => __( 'Items list', 'type_child' ),
		'items_list_navigation'      => __( 'Items list navigation', 'type_child' ),
	);
	$rewrite = array(
		'slug'                       => 'publication'
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'publication', array( 'posters' ), $args );

}
add_action( 'init', 'publication_period_taxonomy', 0 );

?>
