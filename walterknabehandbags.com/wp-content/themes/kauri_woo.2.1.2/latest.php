<?php


global $_wp_additional_image_sizes;
//print_r( $_wp_additional_image_sizes);// - all image sizes array
$latest_img_width = $_wp_additional_image_sizes['kauri-latest']['width'];
$latest_img_height =  $_wp_additional_image_sizes['kauri-latest']['height'];


$latest_products = get_posts( array(
	'no_found_rows' => 1,
	'post_status' => 'publish',
	'post_type' => 'product',
	'post_parent' => 0,
	'orderby'     => 'post_date',
	'order'       => 'DESC',
	'suppress_filters' => false,
	'numberposts' => 3
	)
);
$output = '';
if ( count( $latest_products ) > 0 ) {
	
	$output .= '<div id="latest_holder">';		
	$output .= '<ul class="latest-products">';		
	
	foreach ( $latest_products as $latest_product ) {
		setup_postdata( $latest_product );
		global $post;
		global $product;
		$old_post = $post;
		$post = $latest_product;
		
		//$sale_price = get_post_meta( $latest_product->ID,'_sale_price' ,true );

		$output .= '<li class="latest-product-item">';
				
		if( $product->is_on_sale() ) : // is_on_sale() - WOO function
			 //$output .= '<span class="sale">' . __("Sale !", "kauri"). '</span>'; 
			 $output .= apply_filters('woocommerce_sale_flash', '<span class="sale">'.__('Sale!', 'woocommerce').'</span>', $post, $product);
		
		endif;
		

			$output .= '<div class="latest_item_image">';
			

			$attached_images = (array)get_posts( array(
					'post_type'   => 'attachment',
					'numberposts' => 1,
					'post_status' => null,
					'post_parent' => $latest_product->ID,
					'orderby'     => 'menu_order',
					'order'       => 'ASC'
					) 
				);

			// GET LARGE IMAGE LINK
			if ( has_post_thumbnail() ) {
			
				$img_url = wp_get_attachment_image_src( get_post_thumbnail_id($latest_product->ID), 'large');
			
			}elseif ( $attached_images ) {
			
				$attached_image = $attached_images[0];
				$img_url = wp_get_attachment_image_src( $attached_image->ID,'large' );
				
			}else{
			
				$img_url = '#';
				
			}
			
			if (  has_post_thumbnail() || $attached_images ) :
					
				
				$output .= '<div class="enlarge-link">';
				$output .= '<div class="products-zoom-single">';
				$output .= '<a rel="external" class="fancybox" href="'.  $img_url[0].'" title="'. get_the_title() .' ">
									<div class="prod-zoom">'. __('zoom image','kauri') .'</div>
									</a>';
				
				$output .= '<a class="single-product-link" href="'.  get_permalink( $latest_product->ID ) .'" title="'. get_the_title() .'">
									<div class="prod-single">'.  __('view & buy','kauri') .'</div>
									</a>';
				
				
				$output .= '</div>'; //end .products-zoom-single
				$output .= '</div>'; //end .enlarge-link					
				
				/*	*/	
				//$att_id = $attached_image->ID;			
				$atributi_slike = array(
					'class'	=> "attachment-". $latest_product->ID,
					'alt'   => get_the_title(),
					'title' => get_the_title()
				);
				
				$post_thumb = get_the_post_thumbnail( $latest_product->ID, 'kauri-latest', $atributi_slike );
				
				if ( $post_thumb ) {
				
					$slika = $post_thumb;
					
				}elseif( $attached_image ){
					
					$slika =  wp_get_attachment_image( $attached_image->ID, 'kauri-latest', false , $atributi_slike );
					
				};
				
				//$imgnosize = preg_replace('#(width|height)="\d+"#','',$slika);// for no inline image size
				//$slika = $product->get_image('kauri-latest'); // get_image - WOO function
				
				$output .= $slika;
				
				
			else :
			
				$output .= '<div class="enlarge-link noimage">';
				$output .= '<div class="products-zoom-single">';
				
				$output .= '<a rel="products_list" class="product'. $latest_product->ID .'" href="'.  get_permalink( $latest_product->ID ) .'" title="'.  get_the_title() .'">
									<div class="prod-single">'.  __('Details and buying','kauri') .'</div>
									</a>';
				
				
				$output .= '</div>'; //end .products-zoom-single
				$output .= '</div>'; //end .enlarge-link		
			
				$output .='<img class="no-image" id="product_image_'.$latest_product->ID.'" alt="No Image" title="'.get_the_title() .'" src="'.get_template_directory_uri().'/images/no_image.jpg" width="' . $latest_img_width . '" height="' . $latest_img_height . '" />';
			
			endif;
			//$output .= '</a>';
			$output .= '</div>'; //end div latest_item_image
			

	
		$output .= '<div class="latest_item_name">';
		$output .= '<a href="' . get_permalink( $latest_product->ID ) . '" class="wpsc-product-title">'.stripslashes( get_the_title() ).'</a>';
				
		$output .= '<span class="price">' . $product->get_price_html() . '</span>'; // get_price_html() - WOO function
		
		$output .= '<div class="home-add-to-cart"><a href="' . get_permalink( $latest_product->ID ) . '" >'. __('View Details','kauri') .'</a></div>';
		$output .= '</div>';//end div latest_item_name
		
		
		$output .= '</li>';
		
	}// END foreach ( $latest_products as $latest_product )
	
	$output .= "</ul></div>";
	
echo $output;
}



?>