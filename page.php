<?php

get_header();

?>

	<div id="primary" class="site-content">

		<?php the_showcase(); ?>

		<!-- #content -->
		<div id="content" class="site-content" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="image right">
				<?php the_post_thumbnail(); ?>
			</div>
			<div class="content left">
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>
		</div>
		<!-- #content -->

		<?php 

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
		
		the_interest_lists();
		
		the_footer_quote();
		
		?>

	</div><!-- #primary -->

<?php get_footer(); ?>