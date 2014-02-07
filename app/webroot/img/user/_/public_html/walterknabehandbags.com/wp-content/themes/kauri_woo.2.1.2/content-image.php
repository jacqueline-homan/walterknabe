<?php
/**
 * The template for Image Post Format
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package WordPress
 * @subpackage kauri
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php // IMAGE POST FORMAT HAS NO TITLE OR HEADLINE ?>	
	
	<div class="format-image" title="<?php echo __('Image post','kauri');?>"></div>


	<div class="image-post-format">
	
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
	
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
			
			<div class="featured-image">
			
			<a href="<?php echo $image[0]; ?>" class="fancybox">
				<?php the_post_thumbnail('featured-image'); ?>
			
			</a>
			
			</div>
		
		<?php endif; ?>

	<?php custom_excerpt(300);  ?>
	
	
	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'kauri' ), 'after' => '</div>' ) ); ?>

	<div class="clear"></div>


	</div><!-- .image-post-format -->	

</article><!-- #post-<?php the_ID(); ?> -->
