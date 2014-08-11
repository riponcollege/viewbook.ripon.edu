<?php


// function to display a photo grid
function the_photo_grid() {

    // get all the footer custom field content
    $photos = get_post_meta( get_the_ID(), CMB_PREFIX . "photo_grid", 1 );

    // grab the image count
    $img_count = count( $photos );

    if ( $img_count <= 4 && $img_count != 3 ) {
        $class = "two";
        $height = 450;
        $width = 700;
    } else {
        $class = "three";
        $height = 500;
        $width = 500;
    }


    // if we have photos, let's display them.
    if ( !empty( $photos ) ) {
        ?>
        <div class="photo-grid <?php print $class ?>">
        <?php
        foreach ( $photos as $key => $photo ) {
            ?>
            <div class="photo">
                <?php if ( isset( $photo["link"] ) ) { ?><a href="<?php print $photo["link"] ?>"><?php } ?>
                    <img src="<?php print p_image_resize( $photo["image"], $width, $height, 1, 1 ); ?>" alt="<?php print $photo["title"] ?>">
                    <h3><?php print $photo["title"] ?></h3>
                <?php if ( isset( $photo["link"] ) ) { ?></a><?php } ?>
            </div>
            <?php
        }
        ?>
        </div>
        <?php
    }

}




?>