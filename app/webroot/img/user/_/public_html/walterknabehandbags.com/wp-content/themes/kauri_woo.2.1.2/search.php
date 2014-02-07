<?php
/**
 * The template for displaying Search Results pages.
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
		
		<section id="primary">
			
			<div id="content" role="main">
		
			
			<?php if ( have_posts() ) : ?>

			<div class="entry-back">
				<div class="entry-content">
					

				<span class="search-results"><?php _e( 'Search Results for:', 'kauri' ); ?></span>

				<header class="page-header">
					<h1 class="page-title">
						<?php echo get_search_query(); ?>
					</h1>
				</header>	


				<?php kauri_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content'); ?>
					
				<?php endwhile; ?>

				<?php kauri_content_nav( 'nav-below' ); ?>

				</div><!-- .entry-content -->
			</div><!-- .entry-back -->
			

			<?php else : ?>
				

				<div class="entry-back">
					<div class="entry-content">	
								
				<span class="search-results"><?php _e( 'Search Results for:', 'kauri' ); ?></span>

				<header class="page-header">
					<h1 class="page-title">
						<?php echo get_search_query(); ?>
					</h1>	
				</header>		



						<header class="entry-header">
							<h1 class="entry-title"><a href="javascript:window.history.back();"><?php _e( 'Nothing Found', 'kauri' ); ?></a></h1>
						</header>

						
						<article id="post-0" class="post no-results not-found">

						<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'kauri' ); ?>
						</p>
					
						<?php get_search_form(); ?>
					
						<?php get_template_part('site','map'); ?>
					
						
						</article><!-- #post-0 -->


						</div><!-- .entry-content -->
					</div><!-- .entry-back -->
					
				

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->
		
<?php get_sidebar(); ?>		

			<h2 class="newdesigns" style="text-align:left">
			<?php if ( $data['latest_title'] ) : ?>
				<?php echo $data['latest_title']; ?>
			<?php else : ?>
				<?php echo __('Latest Products','kauri'); ?>
			<?php endif; ?>
			</h2>
			
			<?php get_template_part('latest'); ?>


<?php get_footer(); ?>