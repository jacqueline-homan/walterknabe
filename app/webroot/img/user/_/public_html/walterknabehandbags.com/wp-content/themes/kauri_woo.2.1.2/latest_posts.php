<?php

global $_wp_additional_image_sizes;
//print_r( $_wp_additional_image_sizes);// - all image sizes array
$latest_img_width = $_wp_additional_image_sizes['kauri-latest']['width'];
$latest_img_height =  $_wp_additional_image_sizes['kauri-latest']['height'];


$latest_posts = get_posts( array(
	'post_type'   => 'post',
	'numberposts' => 3, 
	'orderby'     => 'post_date',
	'post_parent' => 0,
	'post_status' => 'publish',
	'suppress_filters' => false,
	'order'       => 'DESC'
	) 
);

$output = '';
if ( count( $latest_posts ) > 0 ) {
	
	$output .= '<div id="latest_holder">';		
	$output .= '<ul class="latest-products">';		
	
	foreach ( $latest_posts as $latest_post ) {
		setup_postdata( $latest_post );
		global $post;
		$old_post = $post;
		$post = $latest_post;
		
		$special_price = get_post_meta( $latest_post->ID,'_wpsc_special_price',true );
		

		$output .= '<li class="latest-product-item">';
		
		
		// Slika (ako je ima)
		//if ($image) {
			$output .= '<div class="latest_item_image">';
			
			
			// get link to big image
			$attached_images = (array)get_posts( array(
				'post_type'   => 'attachment',
				'numberposts' => 1,
				'post_status' => null,
				'post_parent' => $latest_post->ID,
				'orderby'     => 'menu_order',
				'order'       => 'ASC'
			) );

			// GET LARGE IMAGE LINK
			if ( has_post_thumbnail() ) {
			
				$img_url = wp_get_attachment_image_src( get_post_thumbnail_id($latest_post->ID), 'large');
			
			}elseif ( $attached_images ) {
			
				$attached_image = $attached_images[0];
				$img_url = wp_get_attachment_image_src( $attached_image->ID,'large' );
				
			}else{
			
				$img_url = '#';
				
			}
			
			//$imgnosize = preg_replace('#(width|height)="\d+"#','',$slika); // for no inline image size
			// end get image
			
			if (  has_post_thumbnail() || $attached_images ) :
					
				
				$output .= '<div class="enlarge-link">';
				$output .= '<div class="products-zoom-single">';
				$output .= '<a rel="external" class="fancybox" href="'.  $img_url[0].'" title="'.  get_the_title() .' ">
									<div class="prod-zoom">'. __('zoom image','kauri') .'</div>
									</a>';
				
				$output .= '<a class="single-product-link" href="'.  get_permalink( $latest_post->ID ) .'" title="'.  get_the_title() .'">
									<div class="prod-single">'.  __('read more','kauri') .'</div>
									</a>';
				
				
				$output .= '</div>'; //end .products-zoom-single
				$output .= '</div>'; //end .enlarge-link					
					
				
				$atributi_slike = array(
					'class'	=> "attachment-". $latest_post->ID,
					'alt'   => get_the_title(),
					'title' => get_the_title()
				);
				
				$post_thumb = get_the_post_thumbnail( $latest_post->ID, 'kauri-latest', $atributi_slike );
				
				if ( $post_thumb ) {
				
					$slika = $post_thumb;
					
				}elseif( $attached_image ){
					
					$slika =  wp_get_attachment_image( $attached_image->ID, 'kauri-latest', false , $atributi_slike );
					
				};
				
				
				$output .= $slika;
				
				//$output .= '<img src="' . wpsc_product_image( $attached_image->ID, $width, $height ) . '" width="'.$width.'" height="'.$height.'" title="' . get_the_title() . '" alt="' . get_the_title() . '" />';
				
			else :
			
				$output .= '<div class="enlarge-link noimage">';
				$output .= '<div class="products-zoom-single">';
				
				$output .= '<a rel="products_list" class="latest_posts" href="'.  get_permalink( $latest_post->ID ) .'" title="'. get_the_title() .'">
									<div class="prod-single">'.  __('read more','kauri') .'</div>
									</a>';
				
				
				$output .= '</div>'; //end .products-zoom-single
				$output .= '</div>'; //end .enlarge-link		
			
				$output .='<img class="no-image" id="product_image_'. $latest_post->ID .'" alt="No Image" title="' . get_the_title() . '" src="'.get_template_directory_uri().'/images/no_image.jpg" width="' . $latest_img_width . '" height="' . $latest_img_height . '" />';
			
			endif;
			//$output .= '</a>';
			$output .= '</div>'; //end div latest_item_image
			
		//}endif $image
	
		$output .= '<div class="latest_item_name">';
		$output .= '<a href="' . get_permalink( $latest_post->ID ) . '" class="wpsc-product-title">'.stripslashes( get_the_title() ).'</a>';
		

		
		$output .= '<div class="home-add-to-cart"><a href="' . get_permalink( $latest_post->ID ) . '" >'.__('Read more','kauri').'</a></div>';
		$output .= '</div>';//end div latest_item_name
		
		
		$output .= '</li>';
		
	}// END foreach ( $latest_posts as $latest_post )
	
	$output .= "</ul></div>";
	
echo $output;
}



?>