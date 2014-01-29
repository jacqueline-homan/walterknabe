<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage kauri
 * @since kauri 0.1
 */
?>
<?php 
global $data;
?>

<div id="secondary" class="widget-area" role="complementary" <?php if( !isset ($data['slider_back_images'])  ) { echo 'style="padding-top:20px;"'; } ?> >
	
	<?php if ( ! dynamic_sidebar( 'sidebar-right' ) )  : ?>

		
		<aside id="meta" class="widget">
			<h1 class="widget-title"><?php _e( 'Meta', 'kauri' ); ?></h1>
			<ul>
				<?php wp_register(); ?>
				<aside><?php wp_loginout(); ?></aside>
				<?php wp_meta(); ?>
			</ul>
		</aside>
		

	<?php endif; // end sidebar widget area ?>
	
	<?php //echo wpsc_shopping_cart(); ?>
	

	
</div><!-- #secondary .widget-area -->	