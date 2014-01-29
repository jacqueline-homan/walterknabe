<?php
/****************************************************************************************
* The template for displaying posts in the Gallery Post Format on index and archive pages
*****************************************************************************************/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<?php if ( is_search() ) : // for search pages, display only excerpts ?>
	
		<div class="entry-back">
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
		</div><!-- .entry-back -->

	<?php else : ?>
	

		<div class="format-gallery" title="<?php echo __('Gallery post','kauri');?>"></div>


		<header class="entry-header">
			
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'kauri' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		</header><!-- .entry-header -->
		
		
		
		<?php // if options enabled entry meta and if post_format IS NOT "image" or "aside" ?>
		<?php global $data; ?>
		<?php if ( $data['entry_meta'] ) : ?>
			
			<?php $post_format = get_post_format(); ?>
			
			<?php if ( !($post_format == 'aside' || $post_format == 'image' || $post_format == 'link')  ) : ?>
			<div class="entry-meta-top">
				<?php entryMeta(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
			
		<?php endif; ?>		
		
		

		
		<?php
		$images = get_children(array( 
							'post_parent' => $post->ID,
							'post_type' => 'attachment',
							'post_mime_type' => 'image',
							'orderby' => 'menu_order',
							'order' => 'ASC' ) 
							);
		if ( $images ) :
			$total_images = count( $images );
			$image = array_shift( $images );
			$show_image = wp_get_attachment_image( $image->ID, 'thumbnail' );
		?>
		
		
		<div class="img-outline">
		
		<div class="gallery-thumb-with-zoom">
		
			<div class="enlarge-link">
				<div class="products-zoom-single">
				
					<a href="<?php the_permalink(); ?>">
						<div class="prod-single"><?php echo __('View Gallery','kauri'); ?></div>
					</a>
					
				</div>
			</div>
			
			<div class="single-thumb">
				<?php echo $show_image; ?>
			</div>
		
		</div><!-- .gallery-thumb -->
		</div><!-- .outline -->

		<em>
		<?php printf( _n( '<h5 style="background:none">Photo gallery with <a %1$s>%2$s photo</a>.</h5>', '<h5 style="background:none">Photo gallery with <a %1$s>%2$s photos</a>.</h5>', $total_images, 'kauri' ),
				'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'kauri' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
				number_format_i18n( $total_images )
			); ?>
		</em>

		<p>
		<?php  the_content_noimg(); ?>
		</p>
			 
		<?php endif; // if $images ?>
		
		<p class="read-more">
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'kauri' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<?php echo __('View Gallery','kauri');?>
			</a>
		</p>
		
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'kauri' ), 'after' => '</div>' ) ); ?>
	
	<footer class="entry-meta">
	
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'kauri' ) );
				if ( $categories_list && kauri_categorized_blog() ) :
			?>

				<span class="cat-links">
					<?php printf( __( 'Posted in %1$s', 'kauri' ), $categories_list ); ?>
				</span>
				
				<?php endif; // End if categories ?>

				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', __( ', ', 'kauri' ) );
					if ( $tags_list ) :
				?>	
				<span class="tag-links">
					<?php printf( __( 'Tagged %1$s', 'kauri' ), $tags_list ); ?>
				</span>
				
				
				
				<?php endif; // End if $tags_list ?>
		
		<?php endif; // End if 'post' == get_post_type() ?>
		

		<?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'kauri' ), __( '1 Comment', 'kauri' ), __( '% Comments', 'kauri' ) ); ?></span>
			
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'kauri' ), '<span class="edit-link">', '</span>' ); ?>
		
	</footer><!-- #entry-meta -->
		
		

	
	<?php endif; // end if ( is_search() ) ?>

	
</article>
