<?php
/**
 * @package WordPress
 * @subpackage kauri
 */
?>

<div class="entry-back">
		
	<div class="entry-content">

	
	<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
	
	
	
	
	<header class="page-header">
		
		<h1 class="page-title"><?php the_title(); ?></h1>

	</header><!-- .entry-header -->	
		
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
	
	
	
	<?php global $data; ?>
	<?php if ( $data['entry_meta'] ) : ?>
	
		<div class="entry-meta-top">
			<?php entryMeta(); ?>
		</div><!-- .entry-meta -->
		
	<?php endif; ?>


	
	
		
	<?php $post_format = get_post_format(); ?>
	
	<?php if( $post_format == "gallery" ) : ?>
	
		
		
			<?php
			$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
			if ( $images ) :
				$total_images = count( $images );
				//$image = array_shift( $images );
				//$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
			?>
			<?php 
			$img_thumbs = '';
			
			foreach ( $images as $single_img ) :
				
				$img_url = wp_get_attachment_image_src( $single_img->ID,'large' );
				
				$img_thumbs .= '<div class="img-outline">';
				$img_thumbs .= '<div class="gallery-thumb-with-zoom">';
				
				$img_thumbs .= '<div class="enlarge-link">';
				$img_thumbs .= '<div class="products-zoom-single">';
				$img_thumbs .= '<a rel="contents" class="fancybox" href="'.  $img_url[0] .'" title="'. get_the_title() .' " rel=" ' . $post->ID .' ">
									<div class="prod-zoom">'. __('Zoom image','kauri') .'</div>
								</a>';
				
				
				$img_thumbs .= '</div>'; //end .products-zoom-single
				$img_thumbs .= '</div>'; //end .enlarge-link	
				
				$img_thumbs .= '<div class="single-thumb">';
				$img_thumbs .= wp_get_attachment_image( $single_img->ID, 'thumbnail' );
				$img_thumbs .= '</div>';//end .single-thumb	
				
				$img_thumbs .= '</div>';
				$img_thumbs .= '</div>'; // end .img-outline
			
			endforeach;
			?>

			<?php 
			echo $img_thumbs; 
			endif;
			?>
			
			<div class="clear"></div>
			
			<p>
			<?php the_content_noimg(); ?>
			</p>
		
	
	<?php elseif ( $post_format == "" ||  $post_format == "image" ||  $post_format == "aside" ) : ?>
			
		
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
			
			<div class="featured-image">				
			
				<a href="<?php echo $image[0]; ?>" class="fancybox">
					<?php the_post_thumbnail('featured-image'); ?>
				
				</a>
				
			</div>
			
		<?php endif; // has_post_thumbnail ?>

		<?php the_content(); ?>
		
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'kauri' ), 'after' => '</div>' ) ); ?>
			

	<?php endif; // $post_format ?>	
			
		
		<footer class="entry-meta">
			
			<?php
			
			$category_list = get_the_category_list( __( ', ', 'kauri' ) );
			$tag_list = get_the_tag_list( '', ', ' );

			if ( ! kauri_categorized_blog() ) {
				// This blog only has 1 category
				if ( '' != $tag_list ) {
					$meta_text = __( '<span class="tag-links">Tagged %2$s.</span><span class="bookmark"> Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</span>', 'kauri' );
				} else {
					$meta_text = __( '<span class="bookmark">Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</span>', 'kauri' );
				}

			} else {
				// This blog has more then one category
				if ( '' != $tag_list ) {
					$meta_text = __( '<span class="cat-links">Posted in %1$s </span><span class="tag-links"> Tagged %2$s.</span><span class="bookmark"> Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</span>', 'kauri' );
				} else {
					$meta_text = __( '<span class="cat-links">Posted in %1$s.</span> <span class="bookmark">Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</span>', 'kauri' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
			?>

			<?php edit_post_link( __( 'Edit', 'kauri' ), '<span class="edit-link">', '</span>' ); ?>
			
		</footer><!-- .entry-meta -->	
			
			
	
		</article><!-- #post-<?php the_ID(); ?> -->
		
		</div><!-- .entry-content -->
	</div><!-- .entry-back -->