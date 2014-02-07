<?php 

//get_template_part('header','image');
$images_path = get_template_directory_uri();

$img_url_array = array(
			$images_path . '/images/headers/basilico.jpg',	
			$images_path . '/images/headers/red_flower.jpg',	
			$images_path . '/images/headers/salt.jpg',	
			);
?>
<div id="homeblock-featured" style="margin-bottom:20px;" >

	<div class="clear"></div>
	<div id="big_random">


		<div class="overlay"></div>	

			
		<?php echo '<div class="backimg" style="background:url(' . $img_url_array[array_rand( $img_url_array,1 )] . ') top left" ></div>'; ?>


	</div><!-- #big_random -->


		<div style="position:absolute; top: 0px; left:0; padding:0px; background:url(<?php echo get_template_directory_uri(); ?>/images/white_transparent.png); z-index:50; width:100%" >
		
		<span style="display: block; text-transform: uppercase; font-size: 1.2em; color: #000; margin: 10px; text-shadow: 1px 1px 0px white;">This is variation of rearranged home blocks, with applied alternate skin, for demonstation purposes. Changing demo options on this variation won't apply here</span>
		
		</div>
	<?php

	get_template_part('featured' ); 

	?>
	
</div><!-- #homeblock-featured-->