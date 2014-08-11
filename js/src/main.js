

// stristr function
function stristr( haystack, needle ){

	var pos = 0;

	// haystack needs to be a string
	haystack += '';

	// convert to lowercase, and get position of needle in haystack
	pos = haystack
		.toLowerCase()
		.indexOf( ( needle + '' ).toLowerCase() );

	// return boolean based on if we find a match.
	return ( pos == -1 ? false : true );

}


// onload
jQuery(document).ready(function($){

	// remove the width and height attribute from story images.
	$( '.stories .story img' ).removeAttr( 'height' ).removeAttr( 'width' );

	// set up magnific iframe class for video/map popups
	$( '.lightbox-iframe' ).magnificPopup({ 'type': 'iframe' });

	// if we have a search field in the page, filter the list items inside it
	// as the user types.
	var search = $( '.search-box' );

	// if we have a search box on the page
	if ( search ) {

		// bind to keyup on the search box input
		search.find( 'input[type=text]' ).keyup(function(){

			// store the search input value
			var search_value = $( this ).val();

			// loop through the list items in the search box
			search.find( 'li a' ).each(function(){

				// store the list item
				var li = $( this );

				// if the string is found in the item, make it show
				if ( stristr( $( this ).text(), search_value ) ) {
					li.removeClass( 'hidden' );
				} else { // otherwise, hide that shiz
					li.addClass( 'hidden' );
				}
			});

		});

	}

});