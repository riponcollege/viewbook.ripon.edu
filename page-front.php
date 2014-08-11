<?php

/*
Template Name: Front Page
*/

get_header();

?>

	<div id="primary" class="site-content wrap">
		
		<?php the_showcase(); ?>

		<?php the_alternating_content(); ?>

		<?php the_footer_quote(); ?>

	</div><!-- #primary -->

	<div class="search-box">

		<?php get_search_form(); ?>
	
	</div>

<?php get_footer(); ?>