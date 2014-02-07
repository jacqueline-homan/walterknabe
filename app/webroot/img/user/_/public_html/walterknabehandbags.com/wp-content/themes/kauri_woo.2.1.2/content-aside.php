<?php
/**
 * The template for displaying posts in the Aside Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package WordPress
 * @subpackage kauri
 * @since kauri 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php 
	 // ASIDE POST FORMAT HAS NO TITLE OR HEADLINE
	?>

	<?php if ( is_search() ) : // Only display Excerpts for search pages ?>
		

		<?php the_excerpt(); ?>

		<p class="read-more">
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'kauri' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<?php echo __('Read more','kauri');?>
			</a>
		</p>
		
		
	<?php else : ?>

		<?php the_content( __( '<div class="read-more">Continue reading <span class="meta-nav">&rarr;</span></div>', 'kauri' ) ); ?>
			
		<p class="read-more">
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'kauri' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<?php echo __('Read more','kauri');?>
			</a>
		</p>
		
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'kauri' ), 'after' => '</div>' ) ); ?>
		
	<?php endif; ?>

	<?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
	
	<footer class="entry-meta">
	
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'kauri' ), __( '1 Comment', 'kauri' ), __( '% Comments', 'kauri' ) ); ?></span>

	</footer><!-- #entry-meta -->
	<?php endif; ?>
	

</article><!-- #post-<?php the_ID(); ?> -->
