<div class="clear"></div>

<div class="site-map">

<?php 
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active('woocommerce/woocommerce.php') ) {
?>
<?php 
	global $wp_query, $post, $woocommerce;
	
	$cat_args = array('show_count' => 0, 'hierarchical' => true, 'taxonomy' => 'product_cat');
	
	$woocommerce->current_cat = false;
	$woocommerce->cat_ancestors = array();
		
	if ( is_tax('product_cat') ) :
	
		$woocommerce->current_cat = $wp_query->queried_object;
		$woocommerce->cat_ancestors = get_ancestors( $woocommerce->current_cat->term_id, 'product_cat' );
	
	elseif ( is_singular('product') ) :
		
		$product_category = wp_get_post_terms( $post->ID, 'product_cat' ); 
		
		if ($product_category) :
			$woocommerce->current_cat = end($product_category);
			$woocommerce->cat_ancestors = get_ancestors( $woocommerce->current_cat->term_id, 'product_cat' );
		endif;
		
	endif;
	
	include_once( $woocommerce->plugin_path() . '/classes/walkers/class-product-cat-list-walker.php' );
	
	$cat_args['walker'] 			= new WC_Product_Cat_List_Walker;
	$cat_args['title_li'] 			= '';
	$cat_args['show_children_only']	= ( isset( $instance['show_children_only'] ) && $instance['show_children_only'] ) ? 1 : 0;
	$cat_args['pad_counts'] 		= 1;
	$cat_args['show_option_none'] 	= __('No product categories exist.', 'kauri');
	$cat_args['current_category']	= ( $woocommerce->current_cat ) ? $woocommerce->current_cat->term_id : '';
	$cat_args['current_category_ancestors']	= $woocommerce->cat_ancestors;
	
	echo '<ul class="product-categories">';
	
	echo '<h4>' . __('Product categories','kauri') . '</h4>';
	
	wp_list_categories( apply_filters( 'woocommerce_product_categories_widget_args', $cat_args ) );
	
	echo '</ul>';
?>

<?php };//endif is_plugin_active ?>


<ul class="site-categories">				
	<h4><?php echo __('Site categories:','kauri'); ?></h4>
	<?php wp_list_categories('title_li&hide_empty=0&depth=1'); ?>
</ul>

<ul class="site-pages">
	<h4><?php echo __('Site pages:','kauri'); ?></h4>
	<?php wp_list_pages('title_li&hide_empty=0&depth=1'); ?>
</ul>

</div><!-- .site-map -->