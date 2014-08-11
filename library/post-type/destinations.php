<?php


// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'flush_rewrite_rules' );



// let's create the function for the custom type
function destination_post_type() { 
	// creating (registering) the custom type 
	register_post_type( 'destination', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 
			'labels' => array(
				'name' => __( 'Destinations', 'ptheme' ), /* This is the Title of the Group */
				'singular_name' => __( 'Destination', 'ptheme' ), /* This is the individual type */
				'all_items' => __( 'All Destinations', 'ptheme' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'ptheme' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Destination', 'ptheme' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'ptheme' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Destination', 'ptheme' ), /* Edit Display Title */
				'new_item' => __( 'New Destination', 'ptheme' ), /* New Display Title */
				'view_item' => __( 'View Destination', 'ptheme' ), /* View Display Title */
				'search_items' => __( 'Search Sestinations', 'ptheme' ), /* Search Custom Type Title */ 
				'not_found' =>  __( 'Nothing found in the database.', 'ptheme' ), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __( 'Nothing found in Trash', 'ptheme' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Manage the destination listed on the viewbook.', 'ptheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/img/icon-cap-small.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 
				'slug' => 'destination', 
				'with_front' => false 
			), /* you can specify its url slug */
			'has_archive' => false, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'destination' );
	
}


// adding the function to the Wordpress init
add_action( 'init', 'destination_post_type');



// now let's add custom categories (these act like categories)
register_taxonomy( 'destination_cat', 
	array('destination'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __( 'Destination Categories', 'ptheme' ), /* name of the custom taxonomy */
			'singular_name' => __( 'Destination Category', 'ptheme' ), /* single taxonomy name */
			'search_items' =>  __( 'Search Destination Categories', 'ptheme' ), /* search title for taxomony */
			'all_items' => __( 'All Destination Categories', 'ptheme' ), /* all title for taxonomies */
			'parent_item' => __( 'Parent Destination Category', 'ptheme' ), /* parent title for taxonomy */
			'parent_item_colon' => __( 'Parent Destination Category:', 'ptheme' ), /* parent taxonomy title */
			'edit_item' => __( 'Edit Destination Category', 'ptheme' ), /* edit custom taxonomy title */
			'update_item' => __( 'Update Destination Category', 'ptheme' ), /* update title for taxonomy */
			'add_new_item' => __( 'Add New Destination Category', 'ptheme' ), /* add new title for taxonomy */
			'new_item_name' => __( 'New Destination Category Name', 'ptheme' ) /* name title for taxonomy */
		),
		'show_admin_column' => true, 
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 
			'slug' => 'destination-category'
		)
	)
);




function the_destination_lists() {

	$destinations_col_1 = get_post_meta( get_the_ID(), CMB_PREFIX . "destinations_col_1", 1 );
	$destinations_col_2 = get_post_meta( get_the_ID(), CMB_PREFIX . "destinations_col_2", 1 );

	if ( !empty( $destinations_col_1 ) || !empty( $destinations_col_2 ) ) {
		?>
	<div id="search-box" class="search-box group">
	
		<h2>What are you destinationed in?</h2>

		<?php get_search_form(); ?>
		
		<?php if ( !empty( $destinations_col_1	) ) { ?>
		<div class="column">
			<?php 
			foreach ( $destinations_col_1 as $cat ) {
				list_destination_category( $cat );
			}
			?>
		</div>
		<?php } ?>
		
		<?php if ( !empty( $destinations_col_2	) ) { ?>
		<div class="column">
			<?php 
			foreach ( $destinations_col_2 as $cat ) {
				list_destination_category( $cat );
			}
			?>
		</div>
		<?php } ?>

		<?php wp_reset_postdata(); ?>
		
	</div><!-- #content -->
		<?php
	}

}

function list_destination_category( $category ) {

	// set up some args
	$args = array( 
		'post_type' => 'destination', 
		'posts_per_page' => 999, 
		'orderby' => 'post_title', 
		'order' => 'ASC',
		'tax_query' => array( 
			array(
				'taxonomy' => 'destination_cat',
				'field' => 'slug',
				'terms' => $category
			) 
		) 
	);

	// grab category information
	$category_info = get_term_by( 'slug', $category, 'destination_cat' );

	// start up a loop
	$loop = new WP_Query( $args );

	?>
	<h3><?php print $category_info->name ?></h3>
	<ul>
	<?php
	// loop through the post results
	while ( $loop->have_posts() ) : $loop->the_post();
		?>
		<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
		<?php
	endwhile;
	?>
	</ul>
	<?php
	
	// reset the post data
	wp_reset_postdata();

}


?>