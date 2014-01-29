<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage kauri
 * @since kauri 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	


	
	<div class="entry-back">
	
		<div class="entry-content">
		
		<div id="mrvice">
			
			<?php $post_type = get_post_type() ;  ?>
			
				<?php if ( !($post_type == "wpsc-product") ) : // if it's product ?>
			
					<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
		
				<?php elseif ( get_option("show_breadcrumbs") == 0 ): ?>
				
					<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
					
				<?php else : ?>
					
					<?php wpsc_output_breadcrumbs(); ?>
				
				<?php endif; ?>
	
		
		</div>
			
			
			<header class="page-header">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
			
			<?php if (has_post_thumbnail( $post->ID ) ): ?>
			
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
				
				<div class="featured-image">				
				
				<a href="<?php echo $image[0]; ?>" class="fancybox">
					<?php the_post_thumbnail('featured-image'); ?>
				
				</a>
				
				</div>
				
			<?php endif; ?>
			

			<?php the_content(); ?>
			
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'kauri' ), 'after' => '</div>' ) ); ?>
			
			<?php //edit_post_link( __( 'Edit', 'kauri' ), '<span class="edit-link">', '</span>' ); ?>
		
		</div><!-- .entry-content -->
	
	</div><!-- .entry-back -->
	
</article><!-- #post-<?php the_ID(); ?> -->
