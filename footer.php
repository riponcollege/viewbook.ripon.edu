<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	<footer id="colophon" class="footer" role="contentinfo">
		<div class="site-info">
			
			<div class="social-icons">
				<a href="http://www.facebook.com/ripon.college"><img src="<?php print get_template_directory_uri() ?>/img/social-facebook.png"></a>
				<a href="https://twitter.com/riponcollege"><img src="<?php print get_template_directory_uri() ?>/img/social-twitter.png"></a>
				<a href="http://www.youtube.com/riponcollegevideo"><img src="<?php print get_template_directory_uri() ?>/img/social-youtube.png"></a>
				<a href="http://instagram.com/riponcollege"><img src="<?php print get_template_directory_uri() ?>/img/social-instagram.png"></a>
				<a href="http://www.pinterest.com/riponcollege/"><img src="<?php print get_template_directory_uri() ?>/img/social-pinterest.png"></a>
				<a href="http://riponcollegeadmission.tumblr.com/"><img src="<?php print get_template_directory_uri() ?>/img/social-tumblr.png"></a>
				<a href="https://www.flickr.com/photos/ripon_college/"><img src="<?php print get_template_directory_uri() ?>/img/social-flickr.png"></a>
				<a href="http://www.linkedin.com/groups?home=&gid=4646327&trk=anet_ug_hm"><img src="<?php print get_template_directory_uri() ?>/img/social-linkedin.png"></a>
			</div>
			
			<nav role="navigation">
				<?php wp_nav_menu( array( 
					'theme_location' => 'footer', 
					'menu_class' => 'nav-menu' ) 
				); ?>
			</nav>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>