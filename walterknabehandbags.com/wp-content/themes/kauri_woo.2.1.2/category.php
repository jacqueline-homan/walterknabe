<?php
/*****************************************************
* The template for displaying Category Archive pages.
*****************************************************/
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

				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
				
				<header class="page-header">
					
					
					<h1 class="page-title"><?php echo single_cat_title();?></h1>

					<?php $category_description = category_description(); if ( ! empty( $category_description ) ) echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );?>
					
				</header>
				
					
					<?php rewind_posts();?>

					<?php kauri_content_nav( 'nav-above' ); ?>
					
					
					<?php while (have_posts()):the_post();  ?>
					
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
					
					<?php endwhile;?>
				
				
					<?php kauri_content_nav( 'nav-below' ); ?>
				
				
				</div><!-- .entry-content -->
			</div><!-- .entry-back -->
			
			<?php else : ?>		
				
				
			<div class="entry-back">
				<div class="entry-content">		
				
				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
				
				<header class="page-header">
					
					
					<h1 class="page-title"><?php echo single_cat_title();?></h1>

					<?php $category_description = category_description(); if ( ! empty( $category_description ) ) echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );?>
					
				</header>
				
				<article id="post-0" class="post no-results not-found">

					<header class="entry-header">
						
						<h1 class="entry-title"><a href="javascript:window.history.back();"><?php _e( 'Nothing Found ...', 'kauri' ); ?></a></h1>
					
					</header>
						
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'kauri' ); ?></p>
						
					<?php get_search_form(); ?>
					
					<?php get_template_part('site','map'); ?>
					
				</article><!-- #post-0 -->
				
				</div><!-- .entry-content -->
			</div><!-- .entry-back -->
			
			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>