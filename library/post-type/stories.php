<?php


// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'flush_rewrite_rules' );



// let's create the function for the custom type
function story_post_type() { 
	// creating (registering) the custom type 
	register_post_type( 'story', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Stories', 'ptheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Story', 'ptheme' ), /* This is the individual type */
			'all_items' => __( 'All Stories', 'ptheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'ptheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Story', 'ptheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'ptheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Story', 'ptheme' ), /* Edit Display Title */
			'new_item' => __( 'New Story', 'ptheme' ), /* New Display Title */
			'view_item' => __( 'View Story', 'ptheme' ), /* View Display Title */
			'search_items' => __( 'Search Stories', 'ptheme' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'ptheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'ptheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Ripon stories of students or faculty members.', 'ptheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/img/icon-book-small.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'story', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'stories', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'custom-fields', 'thumbnail', 'revisions')
		) /* end of options */
	); /* end of register post type */
	
}


// adding the function to the Wordpress init
add_action( 'init', 'story_post_type');



// now let's add custom categories (these act like categories)
register_taxonomy( 'story_cat', 
	array('story'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __( 'Story Categories', 'ptheme' ), /* name of the custom taxonomy */
			'singular_name' => __( 'Story Category', 'ptheme' ), /* single taxonomy name */
			'search_items' =>  __( 'Search Story Categories', 'ptheme' ), /* search title for taxomony */
			'all_items' => __( 'All Story Categories', 'ptheme' ), /* all title for taxonomies */
			'parent_item' => __( 'Parent Story Category', 'ptheme' ), /* parent title for taxonomy */
			'parent_item_colon' => __( 'Parent Story Category:', 'ptheme' ), /* parent taxonomy title */
			'edit_item' => __( 'Edit Story Category', 'ptheme' ), /* edit custom taxonomy title */
			'update_item' => __( 'Update Story Category', 'ptheme' ), /* update title for taxonomy */
			'add_new_item' => __( 'Add New Story Category', 'ptheme' ), /* add new title for taxonomy */
			'new_item_name' => __( 'New Story Category Name', 'ptheme' ) /* name title for taxonomy */
		),
		'show_admin_column' => true, 
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'story-category' ),
	)
);




?>