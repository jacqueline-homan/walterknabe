<?php
global $data; 

if( isset( $data['slider_back_images'] ) ): 
	$slider_back_images = $data['slider_back_images'];
endif;

if( isset($slider_back_images) ): 

foreach ($slider_back_images as $img) {
	if ( !empty( $img['url']) ) :
		$img_url_array[] = $img['url'];
	endif;
};

?>


<div class="clear"></div>


<div id="big_random" <?php if( !is_home() ) { echo 'style="top: -60%;"'; } ?> >


<div class="overlay"></div> 

<?php //$last_img =  end( $slider_back_images ); // get last background image - "end()" gets last from array ?> 

<?php 
if(isset($img_url_array)) :
	echo '<div class="backimg" style="background:url(' . $img_url_array[array_rand( $img_url_array,1 )] . ') top left" ></div>'; 
endif;
?>


</div><!-- #big_random -->

<?php endif; // $slider_back_images  ?>