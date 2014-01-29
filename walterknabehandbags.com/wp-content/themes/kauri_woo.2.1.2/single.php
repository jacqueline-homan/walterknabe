<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage kauri
 * @since kauri 0.1
 */

get_header(); ?>

	<div class="random_overlay"></div>
	<div class="random_post_header_image">
	
		<?php get_template_part('header','image'); ?>
	
	</div>
	
	<div id="primary">
		
		<div id="content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php kauri_content_nav( 'nav-below' ); ?>

			<?php comments_template( '', true ); ?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

	
	<?php get_sidebar(); ?>

	
<?php get_footer(); ?>