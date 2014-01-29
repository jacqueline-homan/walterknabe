<?php

$sticky_array = get_option( 'sticky_posts' ); // iliti FEATURED products

// ==== Get featured product image size defined by add_image_size( 'kauri-featured', 300, 120, false );
global $_wp_additional_image_sizes;
//print_r( $_wp_additional_image_sizes);// - all image sizes array
$feat_img_width = $_wp_additional_image_sizes['kauri-featured']['width'];
$feat_img_height =  $_wp_additional_image_sizes['kauri-featured']['height'];



$featured_posts = get_posts( array(
	'post_type'   => 'post',
	'post__in' => $sticky_array,
	'numberposts' => 4, 
	'orderby'     => 'post_date',
	'post_parent' => 0,
	'suppress_filters' => false,
	'post_status' => 'publish',
	'order'       => 'DESC'
) );
$output = '';

//if ( count( $featured_posts ) > 0 ) {

	
	$output .= '<div id="featured_holder" style="padding:0 0 5px;">';
	
	$output .= '<div id="featured_pager" style="top: 20px;"></div><div id="prevItem"></div><div id="nextItem"></div>';		
	
	$output .= '<ul id="featured-products">';		
	
	foreach ( $featured_posts as $featured_post ) {
		setup_postdata( $featured_post );
		global $post;
		$old_post = $post;
		$post = $featured_post;
	
		$output .= '<li class="featured-product-item">';
 
		$output .= '<div class="feat_item_image_2"><div class="feat_image_holder_2">';
		
		$atributi_slike = array(
			'class'	=> "attachment-". $featured_post->ID,
			'alt'   => get_the_title(),
			'title' => get_the_title()
		);	
		
		$slika =  get_the_post_thumbnail( $featured_post->ID, 'large', false , $atributi_slike );
		$slika = preg_replace('#(width|height)="\d+"#','',$slika); // for no inline image size
		
		if ( $slika ) :

			$output .= '<a href="' . get_permalink( $featured_post->ID ) . '" class="featured_post" title="' . get_the_title() . '" >';

			$output .= $slika;
			
			$output .= '</a>';
			
		else :
		
		$output .= '<div class="enlarge-link noimage">';
		$output .= '<div class="products-zoom-single">';
		
		$output .= '<a rel="products_list" class="featured_post" href="'. get_permalink( $featured_post->ID ) .'" title="'. get_the_title()  .'">
							<div class="prod-single">'.  __('Details and buying','kauri') .'</div>
							</a>';
		
		
		$output .= '</div>'; //end .products-zoom-single
		$output .= '</div>'; //end .enlarge-link				
			
			
			
			$output .='<img class="no-image" id="product_image_'. $featured_post->ID .'" alt="No Image" title="'. get_the_title() .'" src="'.get_template_directory_uri().'/images/no_image.jpg" width="' . $feat_img_width . '" height="' . $feat_img_height . '" />';
			
		endif;

		
		$output .= '</div>'; //end div feat_image_holder
		
		$output .= '</div>'; //end div feat_item_image
			


		
		
		
		$output .= '<div class="feat_item_name_2">';
		
			$output .= '<a href="' . get_permalink( $featured_post->ID ) . '" class="wpsc-product-title">'.stripslashes( get_the_title() ).'</a>';
			//$output .= '<span class="price">'.get_post_meta ($featured_post->ID, '_wpsc_price', true).'</span>';

			
			$output .= '<div class="feat_item_desc_2">';
			$output .= '<div class="txt">'.stripslashes( strip_shortcodes(  get_the_excerpt() ) ).'</div>';
			$output .= '</div>'; //end div item_desc		
			
			

			$output .= '<div class="home-add-to-cart-featured"><div class="home-add-to-cart" style="clear:both; float:none;"><a href="' . get_permalink( $featured_post->ID ) . '" >'.__('Read more','kauri').'</a></div></div>';
			
		
		$output .= '</div>';//end div item_name_2
		


				
		
		$output .= '</li>';
	}
	$output .= "</ul>";
	
	$output .= "</div>"; // end featured_holder
	
	
echo $output;

//}// end if ( count( $featured_posts

?>