<?php
/**
 * Template Name: Page of posts
 * Description: A full-width template with no sidebar
 */

get_header(); ?>

		<div class="random_overlay"></div>
		<div class="random_post_header_image">	
		
			<?php get_template_part('header','image'); ?>
		
		</div>	
		
		<div id="primary">
			<div id="content" role="main">
				
		<div class="entry-back">
				<div class="entry-content">	
				
				<header class="page-header">
					<h1 class="page-title" style="margin:0 0 20px;"><?php bloginfo('name')?></h1>
				</header>
				
				<div style="margin:20px 0 60px"><?php bloginfo('description'); ?></div>
				
				<?php 
				$posts = new WP_Query(array(
						'post_type' => 'post'
					)
				);
				?>
				
				<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

					<?php //get_template_part( 'content', 'page' ); ?>

					
			<header class="entry-header">
				
				<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'kauri' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?>
				</a>
				</h1>
				
			</header><!-- .entry-header -->	
			
			<?php // if options enabled entry meta and if post_format IS NOT "image" or "aside" ?>
			<?php global $data; ?>
			<?php if ( $data['entry_meta'] ) : ?>
				
				<?php $post_format = get_post_format(); ?>
				
				<?php if ( !($post_format == 'aside' || $post_format == 'image' || $post_format == 'link')   ) : ?>
				<div class="entry-meta-top">
					<?php entryMeta(); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
				
			<?php endif; // if $data ?>
			
			
			
			<?php if (has_post_thumbnail( $post->ID ) ): ?>
			
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
				
				<div class="featured-image">				
				
				<a href="<?php echo $image[0]; ?>" class="fancybox">
					<?php the_post_thumbnail('featured-image'); ?>
				
				</a>
				
				</div>
				
			<?php endif; ?>
		
			
			<p><?php custom_excerpt(300) ?><?php //the_excerpt() ?></p>
			
			<p class="read-more">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'kauri' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
				<?php echo __('Read more','kauri');?>
				</a>
			</p>					
						

				<?php endwhile; // end of the loop. ?>
				
				</div><!-- .entry-content -->
			</div><!-- .entry-back -->	

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>