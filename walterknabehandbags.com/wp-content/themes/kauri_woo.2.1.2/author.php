<?php
/**
 * The template for displaying Author Archive pages.
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

			<?php the_post(); ?>


				
			<div class="entry-back">
				
				<div class="entry-content">	
				

				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
				
				<header class="page-header">
					
					
					<h1 class="page-title author">
					<?php echo '<div class="vcard url fn n" rel="me">' . get_the_author() . '</div>' ; ?>
					</h1>
					
				</header>
				
				
				<?php rewind_posts(); ?>

				<?php kauri_content_nav( 'nav-above' ); ?>


				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					$post_format = get_post_format();
					if ( !( $post_format == 'aside' || $post_format == 'link' ) ) : //no aside and link
					
					if ($post_format == '' ) : // if standard post
						get_template_part( 'content');
					else:
						get_template_part( 'content', $post_format );
					endif;  //  end if standard post
					
					endif; //no aside and link
					?>

				<?php endwhile; ?>

				<?php kauri_content_nav( 'nav-below' ); ?>

				</div><!-- .entry-content -->
			</div><!-- .entry-back -->
			
			<?php else : ?>

				
			<div class="entry-back">
				
				<div class="entry-content">	
				
				
				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
				
				<header class="page-header">
					
					
					<h1 class="page-title author">
						<?php echo __( 'No posts from this author', 'kauri' ); ?>
					</h1>
					
				</header>				
				
				<article id="post-0" class="post no-results not-found">

					<h1 class="entry-title"><a href="javascript:window.history.back();"><?php _e( 'Nothing Found', 'kauri' ); ?></a></h1>
					
					<div class="entry-back">
					<div class="entry-content">
						<p><?php _e( 'It seems like this author is still not inspired for writing. Perhaps searching can help.', 'kauri' ); ?></p>
						<?php get_search_form(); ?>
						
						
						<?php get_template_part('site','map'); ?>
					
					
					</div><!-- .entry-content -->
				</div><!-- .entry-back -->
					
				</article><!-- #post-0 -->
				
				
				</div><!-- .entry-content -->
			</div><!-- .entry-back -->
				

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>