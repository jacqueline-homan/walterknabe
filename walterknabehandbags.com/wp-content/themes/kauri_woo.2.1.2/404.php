<?php
/**
 * The template for displaying 404 pages (Not Found).
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

			<article id="post-0" class="post error404 not-found">
				


				<div class="entry-back">
				<div class="entry-content">
				
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Well this is somewhat embarrassing, isn&rsquo;t it?', 'kauri' ); ?></h1>
				</header>				
					
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'kauri' ); ?></p>

					<?php get_search_form(); ?>

					<p><?php _e( 'Perhaps you are interested in latest products ? :', 'kauri' ); ?></p>
					
					<?php get_template_part('latest'); ?>
					
					<p><?php _e( 'Or, perhaps you would like to read latest blog posts ? :', 'kauri' ); ?></p>
					
					<?php 
					$instance = array(
						'title' => __('Recent posts','kauri'),
						'number' => 5
					);
					the_widget( 'WP_Widget_Recent_Posts', $instance); 
					?>


				</div><!-- .entry-content -->
				</div><!-- .entry-back -->
				
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>