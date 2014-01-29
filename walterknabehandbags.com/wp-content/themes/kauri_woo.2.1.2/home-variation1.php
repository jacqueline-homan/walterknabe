<?php
/**
 * Template Name: Home page - variation 1
 * Description: Homepage variation for demo purposes
 */
//get_header();
get_template_part('home-variations/home-var-2_header','featured');
?>



<?php 
	get_template_part('home-variations/home-var-1_carousel' );
?>

	<div id="primary" class="primary_home">
	
		<div id="content-home" role="main">
		
		<?php 
		
		get_template_part('home-variations/home-var-1_homeblock','menu');
		
		get_template_part('home-variations/home-var-1_homeblock','featured');
		
		get_template_part('home-variations/home-var-1_homeblock','widgets1');
		
		get_template_part('homeblock','latest');
		
		get_template_part('homeblock','blogposts');
				
		get_template_part('homeblock','widgets2');

		?>
		
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
