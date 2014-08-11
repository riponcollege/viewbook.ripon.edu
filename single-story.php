<?php
/**
 * The Template for displaying all single posts
 */

get_header();

?>

	<section id="primary" class="content-area">
	
		<div class="story" role="main">
			<?php
			while ( have_posts() ) : the_post();

				the_showcase();
				
				the_two_column_content(); 

				the_narrow_content();

				the_photo_grid();

				the_tiles( 1 );

				the_blockquote( 1 );

				the_tiles( 2 ); 

				the_blockquote( 2 );

				the_tiles( 3 );

				the_blockquote( 3 );

				the_tiles( 4 );

			endwhile;
			?>
		</div><!-- #content -->

		<?php the_footer_quote(); ?>

	</section>

<?php

get_footer();

?>