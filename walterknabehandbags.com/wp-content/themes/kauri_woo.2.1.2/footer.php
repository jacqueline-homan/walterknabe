<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage kauri
 * @since kauri 0.1
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
	
		<div id="info">
		
			<ul>
			
				<?php if ( is_active_sidebar( 'bottombar-1' ) ) : ?>
		
					<li class="info-tab">
				
						<?php dynamic_sidebar( 'bottombar-1' ); ?>
				
					</li>
			
				<?php endif; ?>
				
				<?php if ( is_active_sidebar( 'bottombar-2' ) ) : ?>
		
					<li class="info-tab">
				
						<?php dynamic_sidebar( 'bottombar-2' ); ?>
				
					</li>
			
				<?php endif; ?>
				
				<?php if ( is_active_sidebar( 'bottombar-3' ) ) : ?>
		
					<li class="info-tab">
				
						<?php dynamic_sidebar( 'bottombar-3' ); ?>
				
					</li>
			
				<?php endif; ?>				
				
			</ul>
			
		</div>
		
		
		<div id="site-generator">
		

			<?php do_action( 'kauri_credits' ); ?>
			
			<?php 
			global $data;
			if ( !$data['footer_text'] ) : ?>
			
			<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'description' ); ?>" rel="copyright">
			
				&copy; <?php bloginfo('blog_url'); ?>
			
			</a>
			
			<?php else: ?>
				
				<?php 
				echo $data['footer_text']; ?>
			
			<?php endif; ?>
			
			
			<?php if ( $data['social_fb'] || $data['social_twitter'] ) :?>
			
			<div class="social">
			
				<?php if ( $data['social_fb'] ) :?>
					<a href="http://facebook.com/<?php echo $data['social_fb'] ?>" class="facebook" target="_blank">
					<div class="facebook"></div>
					</a>
				<?php endif; ?>
				
				<?php if ( $data['social_twitter'] ) :?>
					<a href="http://twitter.com/<?php echo $data['social_twitter'] ?>" class="twitter" target="_blank">
					<div class="twitter"></div>
					</a>		
				<?php endif; ?>
				
			</div>
			
			<?php endif; ?>
				
			
		</div>
		
	</footer><!-- #colophon -->
	
	<p id="back-top">
		<a href="#top">
		<span></span>
		</a>
	</p>
	
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>