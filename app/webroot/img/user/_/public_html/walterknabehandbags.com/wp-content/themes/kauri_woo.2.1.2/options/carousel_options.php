<?php

global $data;

$carousel_template = $data['carousel_template'];

if ( $carousel_template == "carousel_classic" ) :
	
	$carousel_height = 340;
	
elseif ( $carousel_template == "carousel_kauri" ) :
	
	$carousel_height = 280;
endif;

echo'<script type="text/javascript">
var $c = jQuery.noConflict();
$c(document).ready(function() {

	/* ===== Featured Product Carousel =====*/
	$c("#featured-products").carouFredSel({
		width: "variable",
		height: '. intval ($carousel_height) .' ,
		items: {
			width: "variable",
			visible: 1,
			minimum: 1
		},
		auto:
		{
			play: true,
			pauseDuration:6000,
			delay:3000		
		}
		,
		scroll: {
			pauseOnHover:true
		},
		prev: {
			button: "#prevItem"
		},
		next: {
			button: "#nextItem"
		},
		pagination: "#featured_pager"
	});
	
	$c("#featured_pager").widthByChildren();
	
	var big_newWidth = $c("#featured_holder").width();
	$c("#featured-products").width( big_newWidth * $c("#featured-products").children().length );
	$c("#featured-products").parent().width( big_newWidth ); 
	$c("#featured-products").children().width( big_newWidth );	
	
	/* ===== end Featured Product Carousel =====*/
	/* ==========*/
		
	$c(window).resize(function() {
				
		var big_newWidth = $c("#featured_holder").width();
		$c("#featured-products").width( big_newWidth * $c("#featured-products").children().length );
		$c("#featured-products").parent().width( big_newWidth ); 
		$c("#featured-products").children().width( big_newWidth );
	
	});
	

	
});//end $c(document).ready
</script>'; ?>