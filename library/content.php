<?php


// a function to output the two-column content, splitting the paragraphs in half (roughly), and rounding up for the first column, so we don't cut in the middle of sentences.
function the_two_column_content() {

	// grab the title
    $title = get_post_meta( get_the_ID(), CMB_PREFIX . "two_column_title", 1 );

	// left column content
    $left_content = get_post_meta( get_the_ID(), CMB_PREFIX . "two_column_content_1", 1 );

	// right column content
    $right_content = get_post_meta( get_the_ID(), CMB_PREFIX . "two_column_content_2", 1 );

    if ( !empty( $left_content ) && !empty( $right_content ) ) {
    	?>
	<div class="content-two-column">
		<?php
		if ( !empty( $title ) ) {
			?>
		<h2><?php print $title ?></h2>
			<?php
		}

		if ( !empty( $left_content ) ) {
			?>
		<div class="column">
			<?php print do_shortcode( $left_content ) ?>
		</div>
			<?php
		}

		if ( !empty( $right_content ) ) {
			?>
		<div class="column">
			<?php print do_shortcode( $right_content ) ?>
		</div>
			<?php
		}
		?>
	</div>
		<?php
    }

}



function the_narrow_content() {

	// narrow content
    $narrow_content = get_post_meta( get_the_ID(), CMB_PREFIX . "narrow_content", 1 );
	if ( !empty( $narrow_content ) ) {
		?>
	<div class="content-narrow">
		<?php print do_shortcode( $narrow_content ) ?>
	</div>
		<?php
	}

}




// function to display a photo grid
function the_alternating_content() {

    // get all the footer custom field content
    $alternating_content = get_post_meta( get_the_ID(), CMB_PREFIX . "alt_content", 1 );

    if ( !empty( $alternating_content ) ) {
        ?>
        <div class="content-alternating">
        <?php
        $row = 1;
        foreach ( $alternating_content as $key => $alt ) {
            $title = $alt["title"];
            $description = $alt["description"];
            $button_label = $alt["button_label"];
            $link = $alt["link"];
            $image = p_image_resize( $alt["image"], 700, 550, true );

            if ( !empty( $title ) && !empty( $description ) && !empty( $button_label ) && !empty( $link ) && !empty( $image ) ) {
            	?>
            <div class="row <?php print ( is_int( $row / 2 ) ? "even" : "odd" ); ?>">
                    <img src="<?php print $image; ?>" alt="<?php print $title ?>"></a>
                    <div class="row-content">
	                    <h2><a href="<?php print $link ?>"><?php print $title ?></a></h2>
	                    <p><?php print $description ?></p>
	                    <p class="button-content"><a href="<?php print $link ?>" class="button"><?php print $button_label; ?></a></p>
                	</div>
            </div>
            	<?php
            	$row++;
        	}
        }
        ?>
        </div>
        <?php
    }

}



// add metabox(es)
function alternating_content_metabox( $meta_boxes ) {

    // generic footer quote block that can be used on any page.
    $meta_boxes['alternating_content'] = array(
        'id' => 'alternating_content',
        'title' => 'Alternating Content',
        'pages' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'default',
        'show_on' => array( 
        	'key' => 'page-template', 
        	'value' => 'page-front.php'
        ),
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'id' => CMB_PREFIX . 'alt_content',
                'type' => 'group',
                'description' => __('Add alternating rows of content and photos.', 'cmb'),
                'options' => array(
                    'add_button' => __('Add More Content', 'cmb'),
                    'remove_button' => __('Remove Content', 'cmb'),
                    'sortable' => true, // beta
                ),
				'fields' => array(
					array(
						'name' => 'Title',
						'id'   => 'title',
						'type' => 'text',
					),
					array(
						'name' => 'Description',
						'id'   => 'description',
						'type' => 'textarea_small',
					),
					array(
						'name' => 'Link URL',
						'description' => "The address you'd like this photo and title to link to.",
						'id'   => 'link',
						'type' => 'text',
					),
					array(
						'name' => 'Button Label',
						'id'   => 'button_label',
						'type' => 'text',
					),
					array(
						'name' => 'Image',
						'id'   => 'image',
						'type' => 'file',
						'preview_size' => array( 500, 300 )
					),
				),
            ),
        )
    );

    return $meta_boxes;

}
add_filter( 'cmb_meta_boxes', 'alternating_content_metabox' );


?>