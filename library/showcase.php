<?php


function the_showcase() {

	// get the slides
	$slides = get_post_meta( get_the_ID(), CMB_PREFIX . "showcase", 1 );

	if ( !empty( $slides ) ) {
		?>
		<div class="showcase">
		<?php
		$count = 0;
		foreach ( $slides as $key => $slide ) {
			if ( !empty( $slide["image"] ) ) {

				// store the title and subtitle
				$title = ( isset( $slide["title"] ) ? $slide["title"] : '' );
				$subtitle = ( isset( $slide["subtitle"] ) ? $slide["subtitle"] : '' );
				$link = ( isset( $slide["link"] ) ? $slide["link"] : '' );

				// check if it's an image or video
				if ( p_is_image( $slide["image"] ) ) {
					// it's an image, so resize it and generate an img tag.
					$image = '<img src="' . p_image_resize( $slide["image"], 1220, 600, true ) . '">';
				} else {
					// it's a video, so oEmbed that stuffs, yo
					$image = apply_filter( 'the_content', $slide["image"] );
				}

				?>
			<div class="slide<?php print ( $key == 0 ? ' visible' : '' ); ?>">
				<?php if ( !empty( $link ) ) { ?><a href="<?php print $link ?>" class="<?php print ( stristr( $link, 'vimeo' ) || stristr( $link, 'youtube' ) || stristr( $link, 'google.com/maps' ) ? 'lightbox-iframe' : '' ) ?>"><?php } ?>
				<?php print $image; ?>
				<?php if ( !empty( $link ) ) { ?></a><?php } ?>

				<div class="slide-content<?php print ( $slide["color"] == 'black' ? ' black' : '' ) ?>">
					<?php if ( !empty( $title ) ) { ?><h1><?php print $title; ?></h1><?php } ?>
					<?php if ( !empty( $subtitle ) ) { ?><h2><?php print $subtitle; ?></h2><?php } ?>
				</div>
			</div>
				<?php
				$count++;
			}
		}

		if ( $count > 1 ) { 
			?>
			<div class="showcase-nav">
				<a class="previous"><img src="<?php print get_template_directory_uri() ?>/img/slider-arrow-left.png" alt="Previous Slide"></a>
				<a class="next"><img src="<?php print get_template_directory_uri() ?>/img/slider-arrow-right.png" alt="Next Slide"></a>
			</div>
			<?php
		}
		?>
		</div>
		<?php
	}
}


function the_showcase_subtitle() {
	$slides = get_post_meta( get_the_ID(), CMB_PREFIX . "showcase", 1 );

	$subtitle = ( isset( $slides[0]["subtitle"] ) ? $slides[0]["subtitle"] : '' );
	if ( !empty( $subtitle ) ) {
		print $subtitle;
	}
}


?>