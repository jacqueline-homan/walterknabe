<?php
/**The main template file **/
get_header(); ?>

	<div id="primary" class="primary_home">
	
		<div id="content-home" role="main">
		
		<?php 
		
		$homeblocks = $data['homepage_blocks']['enabled'];
		
		foreach ( $homeblocks as $block ) {
			
			if ( $block == 'Featured products') {
			
				get_template_part('homeblock','featured');
				
			}else if ( $block == 'Menu') {
			
				get_template_part('homeblock','menu');
				
			}else if ( $block == 'Latest products') {
			
				get_template_part('homeblock','latest');
				
			}else if ( $block == 'Blog post by categories') {
			
				get_template_part('homeblock','blogposts');
				
			}else if ( $block == 'Widgets block 1') {
			
				get_template_part('homeblock','widgets1');
				
			}else if ( $block == 'Widgets block 2') {
			
				get_template_part('homeblock','widgets2');
				
			}
			
		}
		?>
		
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
