<?php


// set a custom field prefix
define( "CMB_PREFIX", "_p_" );


// remove the editor from the homepage
add_filter( 'user_can_richedit', 'ripon_page_can_richedit' );
function ripon_page_can_richedit( $can ) {
    global $post;
    if ( 28 == $post->ID )
        return false;
    return $can;
}


// include some theme-related things
include( "library/menus.php" );
include( "library/scripts.php" );


// an extra image manipulation function
include( "library/images.php" );


// include our metaboxes library
include( "library/metabox.php" );


// include custom post types for areas of interest and ripon stories
include( "library/post-type/interests.php" );
// include( "library/post-type/destinations.php" );
include( "library/post-type/stories.php" );


// include quote metaboxes/functions
include( "library/showcase.php" );
include( "library/content.php" );
include( "library/photo-grid.php" );
include( "library/tiles.php" );
include( "library/quotes.php" );


?>