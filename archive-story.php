<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 

$args = array(
	'post_type'			=> 'story',
	'posts_per_page'	=> 30
);

query_posts( $args );

?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content stories" role="main">

		<?php 
		if ( have_posts() ) : 

			// Start the Loop.
			while ( have_posts() ) : the_post();
				$subtitle = get_post_meta( get_the_ID(), '_p_subtitle', 1 )
				?>
			<div class="story" rel="<?php the_permalink(); ?>">
				<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'story-thumbnail' ); ?></a>
				<div class="caption">
					<h3><?php the_title(); ?></h3>
					<p><?php the_showcase_subtitle(); ?></p>
				</div>
			</div>
				<?php
			endwhile;

		else :

			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );

		endif;
		?>
			<div class="story lightbox-more-info">
				<a href="/request-more-information"><img src="<?php bloginfo( "template_url" ) ?>/img/more-info.jpg"></a>
			</div>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php

get_footer();

?>