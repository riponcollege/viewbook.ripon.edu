<?php


// initiate the metabox plugin
add_action( 'init', 'p_init_cmb_meta_boxes', 9999 );
function p_init_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'metabox/init.php' );
    }
}





// add metabox(es)
function page_metaboxes( $meta_boxes ) {

	// showcase metabox
	$meta_boxes['showcase_metabox'] = array(
		'id' => 'showcase_metabox',
		'title' => 'Showcase',
		'pages' => array( 'page', 'story', 'area' ), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => false, // Show field names on the left
        'fields' => array(
            array(
                'id' => CMB_PREFIX . 'showcase',
                'type' => 'group',
                'description' => __('Add images/videos into a slider on any page.', 'cmb'),
                'options' => array(
                    'add_button' => __('Add Slide', 'cmb'),
                    'remove_button' => __('Remove Slide', 'cmb'),
                    'sortable' => true, // beta
                ),
				'fields' => array(
					array(
						'name' => 'Title',
						'description' => 'Enter a slide title.',
						'id'   => 'title',
						'type' => 'text',
					),
					array(
						'name' => 'Subtitle',
						'description' => 'Enter a slide subtitle.',
						'id'   => 'subtitle',
						'type' => 'text',
					),
					array(
						'name' => 'Link',
						'description' => 'Enter a slide link.',
						'id'   => 'link',
						'type' => 'text',
					),
					array(
						'name' => 'Image/Video',
						'description' => 'Select an image or paste in a video URL.',
						'id'   => 'image',
						'type' => 'file',
						'preview_size' => array( 350, 150 )
					),
                    array(
                        'name'    => 'Text Color',
                        'description' => "Set to dark when you have a bright image.",
                        'id'      => 'color',
                        'type'    => 'select',
                        'options' => array(
                            'white' => __( 'White', 'cmb' ),
                            'black' => __( 'Black', 'cmb' ),
                        ),
                    ),
				),
            ),
        )
	);


    // two column content metabox
    $meta_boxes['two_column_content'] = array(
        'id' => 'two_column_content',
        'title' => 'Two Column Content',
        'pages' => array( 'page', 'story' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Title',
                'desc' => 'Optional title to display above the two columns',
                'id' => CMB_PREFIX . 'two_column_title',
                'type' => 'text',
            ),
            array(
                'name' => 'Column One',
                'desc' => 'Enter the content that displays in the left column.',
                'id' => CMB_PREFIX . 'two_column_content_1',
                'type' => 'wysiwyg',
                'options' => array(),
            ),
            array(
                'name' => 'Column Two',
                'desc' => 'Enter the content that displays in the left column.',
                'id' => CMB_PREFIX . 'two_column_content_2',
                'type' => 'wysiwyg',
                'options' => array(),
            ),
        )
    );


    // generic narrow content area for any page
    $meta_boxes['narrow_content'] = array(
        'id' => 'narrow_content',
        'pages' => array( 'page', 'story' ), // post type
        'title' => 'Narrow Content',
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => false, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Narrow Content',
				'description' => "The content that shows up below the main content, just above the photo grid.",
				'id' => CMB_PREFIX . 'narrow_content',
				'type' => 'wysiwyg',
			),
		)
    );


    // photo grid that can be used on any page
    $meta_boxes['photo_grid'] = array(
        'id' => 'photo_grid',
        'title' => 'Photo Grid',
        'pages' => array( 'page', 'story', 'area' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'id' => CMB_PREFIX . 'photo_grid',
                'type' => 'group',
                'description' => __('Add photos to the photo grid component.', 'cmb'),
                'options' => array(
                    'add_button' => __('Add Another Photo', 'cmb'),
                    'remove_button' => __('Remove Photo', 'cmb'),
                    'sortable' => true, // beta
                ),
				'fields'      => array(
					array(
						'name' => 'Title',
						'id'   => 'title',
						'type' => 'text',
					),
					array(
						'name' => 'Link URL',
						'description' => "The address you'd like this photo and title to link to.",
						'id'   => 'link',
						'type' => 'text',
					),
					array(
						'name' => 'Image',
						'id'   => 'image',
						'type' => 'file',
						'preview_size' => array( 250, 250 )
					),
				),
            ),
        )
    );


    // first content tiles metabox
    $meta_boxes['tile_1'] = array(
        'id' => 'tile_1',
        'title' => 'Content Tiles One',
        'pages' => array( 'page', 'story' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'id' => CMB_PREFIX . 'tile_1',
                'type' => 'group',
                'description' => __('Add photos to the photo grid component.', 'cmb'),
                'options' => array(
                    'add_button' => __('Add Another Photo', 'cmb'),
                    'remove_button' => __('Remove Photo', 'cmb'),
                    'sortable' => true, // beta
                ),
                'fields'      => array(
                    array(
                        'name' => 'Caption',
                        'description' => "Enter a photo caption/quote.",
                        'id'   => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Link URL',
                        'description' => "Enter a link address.",
                        'id'   => 'link',
                        'type' => 'text',
                    ),
                    array(
                        'name'    => 'Image Size',
                        'description' => "Set the size of this photo - small takes up one third, large takes two thirds.",
                        'id'      => 'size',
                        'type'    => 'select',
                        'options' => array(
                            'small' => __( 'Small', 'cmb' ),
                            'large' => __( 'Large', 'cmb' ),
                        ),
                    ),
                    array(
                        'name' => 'Image',
                        'id'   => 'image',
                        'type' => 'file',
                        'preview_size' => array( 250, 250 )
                    ),
                ),
            ),
            array(
                'name' => 'Column One Content',
                'desc' => 'Enter the content that displays under/after the photos in this tile section.',
                'id' => CMB_PREFIX . 'tile_1_content_1',
                'type' => 'wysiwyg',
                'options' => array(),
            ),
            array(
                'name' => 'Column Two Content',
                'desc' => 'Enter the content that displays under/after the photos in this tile section.',
                'id' => CMB_PREFIX . 'tile_1_content_2',
                'type' => 'wysiwyg',
                'options' => array(),
            ),
        )
    );

	
	// first blockquote
    $meta_boxes['blockquote_1'] = array(
        'id' => 'blockquote_1',
        'title' => 'Blockquote One',
        'pages' => array( 'page', 'story' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => false, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Large Quote',
                'desc' => 'Enter the quote to display in the blockquote.',
                'id' => CMB_PREFIX . 'blockquote_1',
                'type' => 'textarea_small'
            ),
        ),
    );


    // second content tiles metabox
    $meta_boxes['tile_2'] = array(
        'id' => 'tile_2',
        'title' => 'Content Tiles Two',
        'pages' => array( 'page', 'story' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'id' => CMB_PREFIX . 'tile_2',
                'type' => 'group',
                'description' => __('Add photos to the photo grid component.', 'cmb'),
                'options' => array(
                    'add_button' => __('Add Another Photo', 'cmb'),
                    'remove_button' => __('Remove Photo', 'cmb'),
                    'sortable' => true, // beta
                ),
				'fields'      => array(
					array(
						'name' => 'Caption',
						'description' => "Enter a photo caption/quote.",
						'id'   => 'title',
						'type' => 'text',
					),
					array(
						'name' => 'Link URL',
						'description' => "Enter a link address.",
						'id'   => 'link',
						'type' => 'text',
					),
					array(
					    'name'    => 'Image Size',
						'description' => "Set the size of this photo - small takes up one third, large takes two thirds.",
					    'id'      => 'size',
					    'type'    => 'select',
					    'options' => array(
                            'small' => __( 'Small', 'cmb' ),
                            'large' => __( 'Large', 'cmb' ),
					    ),
					),
					array(
						'name' => 'Image',
						'id'   => 'image',
						'type' => 'file',
						'preview_size' => array( 250, 250 )
					),
				),
            ),
            array(
                'name' => 'Column One Content',
                'desc' => 'Enter the content that displays under/after the photos in this tile section.',
                'id' => CMB_PREFIX . 'tile_2_content_1',
                'type' => 'wysiwyg',
                'options' => array(),
            ),
            array(
                'name' => 'Column Two Content',
                'desc' => 'Enter the content that displays under/after the photos in this tile section.',
                'id' => CMB_PREFIX . 'tile_2_content_2',
                'type' => 'wysiwyg',
                'options' => array(),
            ),
        )
    );

    
    // second blockquote
    $meta_boxes['blockquote_2'] = array(
        'id' => 'blockquote_2',
        'title' => 'Blockquote Two',
        'pages' => array( 'page', 'story' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => false, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Large Quote',
                'desc' => 'Enter the quote to display in the blockquote.',
                'id' => CMB_PREFIX . 'blockquote_2',
                'type' => 'textarea_small'
            ),
        ),
    );


    // third content tiles metabox
    $meta_boxes['tile_3'] = array(
        'id' => 'tile_3',
        'title' => 'Content Tiles Three',
        'pages' => array( 'page', 'story' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'id' => CMB_PREFIX . 'tile_3',
                'type' => 'group',
                'description' => __('Add photos to the photo grid component.', 'cmb'),
                'options' => array(
                    'add_button' => __('Add Another Photo', 'cmb'),
                    'remove_button' => __('Remove Photo', 'cmb'),
                    'sortable' => true, // beta
                ),
                'fields'      => array(
                    array(
                        'name' => 'Caption',
                        'description' => "Enter a photo caption/quote.",
                        'id'   => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Link URL',
                        'description' => "Enter a link address.",
                        'id'   => 'link',
                        'type' => 'text',
                    ),
                    array(
                        'name'    => 'Image Size',
                        'description' => "Set the size of this photo - small takes up one third, large takes two thirds.",
                        'id'      => 'size',
                        'type'    => 'select',
                        'options' => array(
                            'small' => __( 'Small', 'cmb' ),
                            'large' => __( 'Large', 'cmb' ),
                        ),
                    ),
                    array(
                        'name' => 'Image',
                        'id'   => 'image',
                        'type' => 'file',
                        'preview_size' => array( 250, 250 )
                    ),
                ),
            ),
            array(
                'name' => 'Column One Content',
                'desc' => 'Enter the content that displays under/after the photos in this tile section.',
                'id' => CMB_PREFIX . 'tile_3_content_1',
                'type' => 'wysiwyg',
                'options' => array(),
            ),
            array(
                'name' => 'Column Two Content',
                'desc' => 'Enter the content that displays under/after the photos in this tile section.',
                'id' => CMB_PREFIX . 'tile_3_content_2',
                'type' => 'wysiwyg',
                'options' => array(),
            ),
        )
    );

    
    // second blockquote
    $meta_boxes['blockquote_3'] = array(
        'id' => 'blockquote_3',
        'title' => 'Blockquote Three',
        'pages' => array( 'page', 'story' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => false, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Large Quote',
                'desc' => 'Enter the quote to display in the blockquote.',
                'id' => CMB_PREFIX . 'blockquote_3',
                'type' => 'textarea_small'
            ),
        ),
    );


    // third content tiles metabox
    $meta_boxes['tile_4'] = array(
        'id' => 'tile_4',
        'title' => 'Content Tiles Four',
        'pages' => array( 'page', 'story' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'id' => CMB_PREFIX . 'tile_4',
                'type' => 'group',
                'description' => __('Add photos to the photo grid component.', 'cmb'),
                'options' => array(
                    'add_button' => __('Add Another Photo', 'cmb'),
                    'remove_button' => __('Remove Photo', 'cmb'),
                    'sortable' => true, // beta
                ),
                'fields'      => array(
                    array(
                        'name' => 'Caption',
                        'description' => "Enter a photo caption/quote.",
                        'id'   => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Link URL',
                        'description' => "Enter a link address.",
                        'id'   => 'link',
                        'type' => 'text',
                    ),
                    array(
                        'name'    => 'Image Size',
                        'description' => "Set the size of this photo - small takes up one third, large takes two thirds.",
                        'id'      => 'size',
                        'type'    => 'select',
                        'options' => array(
                            'small' => __( 'Small', 'cmb' ),
                            'large' => __( 'Large', 'cmb' ),
                        ),
                    ),
                    array(
                        'name' => 'Image',
                        'id'   => 'image',
                        'type' => 'file',
                        'preview_size' => array( 250, 250 )
                    ),
                ),
            ),
            array(
                'name' => 'Column One Content',
                'desc' => 'Enter the content that displays under/after the photos in this tile section.',
                'id' => CMB_PREFIX . 'tile_4_content_1',
                'type' => 'wysiwyg',
                'options' => array(),
            ),
            array(
                'name' => 'Column Two Content',
                'desc' => 'Enter the content that displays under/after the photos in this tile section.',
                'id' => CMB_PREFIX . 'tile_4_content_2',
                'type' => 'wysiwyg',
                'options' => array(),
            ),
        )
    );
	

	// generate an array of interest categories.	
	$int_cats = get_terms( 'interest_cat' );
	$interest_categories = array();
	foreach ( $int_cats as $int_cat ) {
		$interest_categories[$int_cat->slug] = $int_cat->name;
	}


    // interest listings
    $meta_boxes['interest_list'] = array(
        'id' => 'interest_list',
        'title' => 'Interest Listings',
        'pages' => array( 'page', 'story' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
			array(
			    'name' => 'Column One',
			    'desc' => 'Select the categories to list in column one.',
			    'id' => CMB_PREFIX . 'interests_col_1',
			    'type' => 'multicheck',
			    'options' => $interest_categories
			),
			array(
			    'name' => 'Column Two',
			    'desc' => 'Select the categories to list in column two.',
			    'id' => CMB_PREFIX . 'interests_col_2',
			    'type' => 'multicheck',
			    'options' => $interest_categories
			),
        ),
    );


    // footer quote
    $meta_boxes['footer_quote'] = array(
        'id' => 'footer_quote',
        'title' => 'Footer Quote',
        'pages' => array( 'page', 'story', 'area' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => false, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Quote',
                'desc' => 'Enter the quote.',
                'id' => CMB_PREFIX . 'footer_quote_content',
                'type' => 'textarea_small'
            ),
            array(
                'name' => 'Comment',
                'desc' => 'Enter a comment to display below the quote.',
                'id' => CMB_PREFIX . 'footer_quote_comment',
                'type' => 'textarea_small'
            ),
            array(
                'name' => 'Button Label',
                'desc' => 'Provide a label for the button.',
                'id' => CMB_PREFIX . 'footer_quote_button_label',
                'type' => 'text'
            ),
            array(
                'name' => 'Button Link',
                'desc' => 'Provide the link for the button.',
                'id' => CMB_PREFIX . 'footer_quote_button_link',
                'type' => 'text'
            ),
            array(
                'name' => 'Photo',
                'desc' => 'Select a photo to display behind the quote.',
                'id' => CMB_PREFIX . 'footer_quote_image',
                'type' => 'file',
                'preview_size' => array( 400, 300 )
            ),
        ),
    );


    return $meta_boxes;

}
add_filter( 'cmb_meta_boxes', 'page_metaboxes' );



?>