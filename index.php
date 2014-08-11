<?php
/*
Home/catch-all template
*/

get_header(); ?>


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<div class="content-narrow">
			<?php
			if ( is_search() ) {
				?><h1>Search Results for <span>'<?php print $_REQUEST["s"]; ?>'</span></h1><?php
			}

			while ( have_posts() ) : the_post();
				?>
				<hr>
				<h3><?php the_title(); ?></h3>
				<?php the_excerpt(); ?>
				<?php
			endwhile;
			?>
			</div>

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>