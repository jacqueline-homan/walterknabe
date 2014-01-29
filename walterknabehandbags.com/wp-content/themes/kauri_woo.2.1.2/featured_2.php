<?php


// ==== Get featured product image size defined by add_image_size( 'kauri-featured', 300, 120, false );
global $_wp_additional_image_sizes;
//print_r( $_wp_additional_image_sizes);// - all image sizes array
$feat_img_width = $_wp_additional_image_sizes['kauri-featured']['width'];
$feat_img_height =  $_wp_additional_image_sizes['kauri-featured']['height'];



$featured_products = get_posts( array(
	'no_found_rows' => 1,
	'post_status' => 'publish',
	'post_type' => 'product',
	'meta_key' => '_featured',
	'meta_value' => 'yes',
	'post_parent' => 0,
	'suppress_filters' => false,
	'orderby'     => 'post_date',
	'order'       => 'DESC'
) );
$output = '';

//if ( count( $featured_products ) > 0 ) {

	
	$output .= '<div id="featured_holder" style="padding:0 0 5px;">';
	
	$output .= '<div id="featured_pager" style="top: 20px;"></div><div id="prevItem"></div><div id="nextItem"></div>';		
	
	$output .= '<ul id="featured-products">';		
	
	foreach ( $featured_products as $featured_product ) {
		setup_postdata( $featured_product );
		global $post, $product;
		$old_post = $post;
		$post = $featured_product;
	
		// IF THERE IS A SPECIAL PRICE ON PRODUCT			
		$featured_special_price = get_post_meta($featured_product->ID, '_sale_price', true);
		
		
		// BUILD HTML
		
		$output .= '<li class="featured-product-item">';

		$output .= '<div class="feat_item_image_2"><div class="feat_image_holder_2">';
		
		
		$attached_images = (array)get_posts( array(
			'post_type'   => 'attachment',
			'numberposts' => 5,
			'post_status' => null,
			'post_parent' => $featured_product->ID,
			'orderby'     => 'menu_order',
			'order'       => 'ASC'
		) );

		$attached_image = $attached_images[0];
		$img_url = wp_get_attachment_image_src( $attached_image->ID,'large' );
		
		if ( $attached_image->ID > 0 ) :
			$att_id = $attached_image->ID;
		
			$atributi_slike = array(
				'class'	=> "attachment-$att_id",
				'alt'   => get_the_title(),
				'title' => get_the_title()
			);
			$slika =  wp_get_attachment_image( $attached_image->ID, 'large', false , $atributi_slike );
			$slika = preg_replace('#(width|height)="\d+"#','',$slika); // for no inline image size
			

			$output .= '<a href="' . get_permalink( $featured_product->ID ) . '" class="featured home" title="' .get_the_title(). '" >';

			$output .= $slika;
			
			//$output .= '<img src="' . wpsc_product_image( $attached_image->ID, $width, $height ) . '" width="'.$width.'" height="'.$height.'" title="' . get_the_title() . '" alt="' . get_the_title() . '" />';
			
			$output .= '</a>';
			
		else :
		
		$output .= '<div class="enlarge-link noimage">';
		$output .= '<div class="products-zoom-single">';
		
		$output .= '<a rel="products_list" class="featured home" href="'. get_permalink( $featured_product->ID ) .'" title="'.  get_the_title() .'">
							<div class="prod-single">'.  __('Details and buying','kauri') .'</div>
							</a>';
		
		
		$output .= '</div>'; //end .products-zoom-single
		$output .= '</div>'; //end .enlarge-link				
			
			
			
			$output .='<img class="no-image" id="product_image_'.$featured_product->ID.'" alt="No Image" title="' .get_the_title(). '" src="'.get_template_directory_uri().'/images/no_image.jpg" width="' . $feat_img_width . '" height="' . $feat_img_height . '" />';
			
		endif;

		
		$output .= '</div>'; //end div feat_image_holder
		
		$output .= '</div>'; //end div feat_item_image
			
		
		
		$output .= '<div class="feat_item_name_2">';
		
			$output .= '<a href="' .get_permalink( $featured_product->ID ) . '" class="product-title">'.stripslashes( get_the_title() ).'</a>';
			//$output .= '<span class="price">'.get_post_meta ($featured_product->ID, '_wpsc_price', true).'</span>';

			
			$output .= '<div class="feat_item_desc_2">';
			$output .= '<div class="txt">'.stripslashes ( strip_shortcodes ( get_the_excerpt() ) ).'</div>';
			$output .= '</div>'; //end div item_desc		
			
			
			$output .= '<span class="price">';

			$output .=  $product->get_price_html();

			$output .= '</span>';
			

			$output .= '<div class="home-add-to-cart-featured"><div class="home-add-to-cart" style="clear:both; float:none;"><a href="' . get_permalink( $featured_product->ID ) . '" >' . __('View Details','kauri') . '</a></div></div>';
			
		
		$output .= '</div>';//end div item_name_2
		


				
		
		$output .= '</li>';
	}
	$output .= "</ul>";
	
	$output .= "</div>"; // end featured_holder

	
	
echo $output;

//}// end if ( count( $featured_products ...
?>