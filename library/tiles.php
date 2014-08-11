<?php


function the_tiles( $section ) {

	$tiles = get_post_meta( get_the_ID(), CMB_PREFIX . "tile_" . $section, 1 );
	$content_1 = wpautop( get_post_meta( get_the_ID(), CMB_PREFIX . "tile_" . $section . "_content_1", 1 ) );
	$content_2 = wpautop( get_post_meta( get_the_ID(), CMB_PREFIX . "tile_" . $section . "_content_2", 1 ) );

	$img_cnt = count( $tiles );


	if ( isset( $tiles[0]["image"] ) && !empty( $tiles ) ) {
		?>
	<div class="tiles tile-<?php print $section; ?>">
		<?php
		$count = 1;
		foreach ( $tiles as $tile ) {
			if ( isset( $tile["image"] ) ) {
				if ( $tile["size"] == "large" ) {
					$image = p_image_resize( $tile["image"], 1000, 500, true );
				} else {
					$image = p_image_resize( $tile["image"], 500, 500, true );
				}
				?>
		<div class="tile<?php print ( $tile["size"] == 'large' ? " large" : '' ); ?>">
			<img src="<?php print $image; ?>"<?php print ( isset( $tile["title"] ) ? ' alt="' . $tile["title"] . '"' : '' ); ?>>
			<?php if ( isset( $tile["title"] ) ) { ?>
			<blockquote>
				<?php print $tile["title"] ?>
			</blockquote>
			<?php } ?>
		</div>
				<?php
				$count++;
			}
		}

		if ( !empty( $content_1 ) ) {
			?>
		<div class="tile-content one">
			<?php print $content_1; ?>
		</div>
			<?php 
		}
		if ( !empty( $content_2 ) ) {
			?>
		<div class="tile-content two">
			<?php print $content_2; ?>
		</div>
			<?php 
		} 
		?>
	</div>
		<?php
	}
}


?>