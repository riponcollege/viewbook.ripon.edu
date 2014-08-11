<?php



// the blockquote
function the_blockquote( $id = 1 ) {
    
    // get the blockquote text
    $blockquote = get_post_meta( get_the_ID(), CMB_PREFIX . "blockquote_" . $id, 1 );

    if ( !empty( $blockquote ) ) {
        ?>
    <blockquote class="large">
        <?php print $blockquote; ?>
    </blockquote>
        <?php
    }
}



function the_footer_quote() {

    // get all the footer custom field content
    $footer_quote_image = get_post_meta( get_the_ID(), CMB_PREFIX . "footer_quote_image", 1 );
    $footer_quote_content = get_post_meta( get_the_ID(), CMB_PREFIX . "footer_quote_content", 1 );
    $footer_quote_comment = get_post_meta( get_the_ID(), CMB_PREFIX . "footer_quote_comment", 1 ); 
    $footer_quote_button_label = get_post_meta( get_the_ID(), CMB_PREFIX . "footer_quote_button_label", 1 ); 
    $footer_quote_button_link = get_post_meta( get_the_ID(), CMB_PREFIX . "footer_quote_button_link", 1 ); 
    
    if ( !empty( $footer_quote_content ) && !empty( $footer_quote_image ) ) {
        ?>
        <div class="footer-quote">
            <img src="<?php print p_image_resize( $footer_quote_image, 1220, 600, true ); ?>">
            <div class="footer-quote-content">
                <h2><?php print $footer_quote_content ?></h2>
                <?php if ( !empty( $footer_quote_comment ) ) { ?>
                <h5><?php print $footer_quote_comment ?></h5>
                <?php } ?>
                <?php if ( !empty( $footer_quote_button_label ) && !empty( $footer_quote_button_link ) ) { ?>
                <p><a href="<?php print $footer_quote_button_link ?>" class="button"><?php print $footer_quote_button_label ?></a></p>
                <?php } ?>
            </div>
        </div>
        <?php
    }
    
}



?>