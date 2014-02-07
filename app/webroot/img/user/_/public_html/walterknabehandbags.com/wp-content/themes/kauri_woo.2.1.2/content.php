<?php
/*************************
* The general post template
*************************/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	
	<?php $post_type = get_post_type() ;  ?>
	
		<?php if ( $post_type == "product" ) : // if it's product ?>
		
			<header class="entry-header">
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'kauri' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			</header><!-- .entry-header -->	

			
			<?php // if options enabled entry meta and if post_format IS NOT "image" or "aside" ?>
			<?php global $data; ?>
			<?php if ( $data['entry_meta'] ) : ?>
				
				<?php $post_format = get_post_format(); ?>
				
				<?php if ( !($post_format == 'aside' || $post_format == 'image')  ) : ?>
				<div class="entry-meta-top">
					<?php entryMeta(); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
				
			<?php endif; // endif $data ... ?>
						

			<?php 
				$id_proizvoda = get_the_ID();
				$attached_images = (array)get_posts( array(
					'post_type'   => 'attachment',
					'numberposts' => 1,
					'post_status' => null,
					'post_parent' => $id_proizvoda,
					'orderby'     => 'menu_order',
					'order'       => 'ASC'
				) );
				foreach ( $attached_images as $thumb ) :

					$img_url = wp_get_attachment_image_src( $thumb->ID,'large' );
					
					$atributi_slike = array(
						'class'	=> "attachment-product-thumbnail",
						'alt'   => $post->post_title,
						'title' => $post->post_title
					);
					
					echo '<div class="search-product-image">';
					echo '<div class="enlarge-link">';
					echo '<div class="products-zoom-single">';
					echo '<a rel="contents" class="fancybox" href="'.$img_url[0].'" title="'. get_the_title() .' ">
									<div class="prod-zoom">'. __('zoom image','kauri') .'</div>
									</a>';
				
					echo '<a class="product" href="'.  get_permalink() .'" title="'.  get_the_title() .'">
										<div class="prod-single">'.  __('view & buy','kauri') .'</div>
										</a>';
					
					
					echo '</div>'; //end .products-zoom-single
					echo '</div>'; //end .enlarge-link		
					echo wp_get_attachment_image( $thumb->ID, 'shop_catalog', false , $atributi_slike );
					echo '</div>'; //end .search-product-image	


				endforeach;
			?>
			
			<?php the_excerpt(); ?>
				
		
		<?php else : //if it's NOT product, but IS SEARCH ?>	
		
		
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

		
			<?php the_content( __( '<div class="read-more">Continue reading <span class="meta-nav">&rarr;</span></div>', 'kauri' ) ); ?>
			
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'kauri' ), 'after' => '</div>' ) ); ?>
			
			<footer class="entry-meta">

				<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
					
					<?php
					$categories_list = get_the_category_list( __( ', ', 'kauri' ) );
					if ( $categories_list && kauri_categorized_blog() ) :
					?>
					
					<span class="cat-links">
						<?php printf( __( 'Posted in %1$s', 'kauri' ), $categories_list ); ?>
					</span>
					
					<?php endif; // End if categories ?>

					<?php
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
			

		<?php endif; //if it's product ?>
	
	
	<?php else : // else if it's NOT search:  ?>
	
			<div class="format-standard" title="<?php echo __('Blog post','kauri');?>"></div>

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
			
			
			<?php //the_content( __( '<div class="read-more">Continue reading <span class="meta-nav">&rarr;</span></div>', 'kauri' ) ); ?>

			
			
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
			
			
			
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'kauri' ), 'after' => '</div>' ) ); ?>
			

	
	<?php endif; // if it's search ?>

		
</article><!-- #post-<?php the_ID(); ?> -->
