<?php
global $data;

// ALLOWED CHANGES

$overrides = $data['styles_overrides'];

if ( isset($overrides['background']) ) {
	$background = true;
}else{
	$background = false;
}

if ( isset($overrides['background_color']) ) {
	$background_color = true;
}else{
	$background_color = false;
}

if ( isset($overrides['body_font']) ) {
	$body_font = true;
}else{
	$body_font = false;
}

if ( isset($overrides['headings']) ) {
	$headings = true;
}else{
	$headings = false;
}

if ( isset($overrides['link_colors']) ) {
	$link_colors = true;
}else{
	$link_colors = false;
}

if ( isset($overrides['button_colors']) ) {
	$button_colors = true;
}else{
	$button_colors = false;
}

$dropdown_responsive = $data['dropdown_responsive'];


echo 'body { background:';

	
	if ( $background_color ) {
	
		echo $data['custom_bg_color'] . ' ';
	
	}; // endif
	
	if ( $background ) {
	
		if ( $data['custom_or_upload'] == 'custom' ) {
			echo 'url(' . $data['custom_bg'] . ');';
		} elseif ( $data['custom_or_upload'] == 'upload' ) {
			echo 'url(' . $data['your_background'] . ')';
		}
		
	}; // endif
	
	echo ';';
	
	if ( $data['custom_or_upload'] == 'upload' ) {
		echo 'background-repeat: '.$data['background_repeat'].';';
		echo 'background-attachment:' . $data['background_attachment'].';';
	}
	
	
	if ( $body_font ) {
		echo '	
		font-family:' . $data['body_font']['face'] . ', Helvetica, Arial, sans-serif; 
		font-style:' . $data['body_font']['style'] . ';
		color:' . $data['body_font']['color'] . '; 
		';
	};// endif
	
echo '}'; // end echo body




if ( $headings ) {

	echo '
	h1, h2, h3, h4, h5, h6 {
		font-family:"' . $data['headers_font']['face-heading'] . '", Helvetica, Arial, sans-serif;
		font-style:' . $data['headers_font']['style'] . ';
		font-weight:' . $data['headers_font']['weight'] . ';
		color:' . $data['headers_font']['color'] . ';
	}';
	
	echo '
	#cart_widget, #header-categories {
		font-family:"' . $data['headers_font']['face-heading'] . '", Helvetica, Arial, sans-serif; 
		font-style:' . $data['headers_font']['style'] . ';
	}';	
	
	echo '
	.feat_item_name a,
	.feat_item_name_tablets a,
	.feat_item_name span.price,
	.feat_item_name_2 a,
	.feat_item_name_2 span.price,
	.latest_item_name a,
	#home-menu ul li a,
	#menu-pages  ul li a,
	.home-add-to-cart a,
	#header-categories #product-categories li a ,
	#content nav,
	.image-post-format p
	{ 
		font-style:' . $data['headers_font']['style'] . ';
		font-weight:' . $data['headers_font']['weight'] . ';
		font-family: "' . $data['headers_font']['face-heading'] . '", Helvetica, Arial, sans-serif;
	}';
	
	echo '
	#menu-pages-dropdown select, #home-menu-dropdown select,
	.s-mybutton span, .m-mybutton span, .l-mybutton span {
		font-family:"' . $data['headers_font']['face-heading'] . '", Helvetica, Arial, sans-serif; 
		font-weight:' . $data['headers_font']['weight'] . ';
	}';	
	
	echo '
	.default_product_display  .price,
	.latest_item_name .price ,
	.single_product_display .wpsc_product_price .price
	{
		font-family:"' . $data['headers_font']['face-heading'] . '", Helvetica, Arial, sans-serif; 
	}';
	
	
	echo '
	.default_product_display span.pricedisplay,
	.single_product_display span.pricedisplay, 
	.single_product_display form.product_form fieldset label, 
	.quantity-price label, 
	.wpsc_product_price label 
	{
		color:' . $data['headers_font']['color'] . '; 
	}';
	
	// styles for forms - input, buttons etc
	echo '
	input[type="file"]::-webkit-file-upload-button,
	button,
	input[type="reset"],
	input[type="submit"],
	input[type="button"]
	{ 
		font-family: "' . $data['headers_font']['face-heading'] . '", Helvetica, Arial, sans-serif;
	}';
		
	// styles for forms - input, buttons etc
	echo '
	.home-add-to-cart:hover,
	a.button, a.button:hover,
	button.button, button.button:hover,
	input.button, input.button:hover,
	#review_form #submit, #review_form #submit:hover,
	a.checkout-button
	{ 
		font-family: "' . $data['headers_font']['face-heading'] . '", Helvetica, Arial, sans-serif;
	}';
	
	echo '
	.latest-product-item .sale, 
	ul.products li .onsale
	{ 
	font-family:"' . $data['headers_font']['face-heading'] . '",Helvetica, Arial, sans-serif;
	}';
	
} // endif headings


if ( $link_colors ) {

	echo '
	a {
		color:' . $data['links_style']['color'] . '; 
	}'; // end echo a

	echo '
	#home-menu ul li:hover,
	#home-menu ul li a:hover,
	#menu-pages ul li:hover,
	#menu-pages ul li a:hover,
	#home-menu .sub-menu li,
	#menu-pages .sub-menu li,
	#header-categories ul li:hover,
	#cart_widget ul li:hover,
	#header-categories .product-categories li,
	#header-categories .product-categories li a,
	#menu-pages-dropdown select, #home-menu-dropdown select
	{
		background:' . $data['links_style']['color'] . '; 
	}';
			
}// endif $link_colors
			
			
if ( $body_font ) {
			
	echo '
	#home-menu ul li a span, #menu-pages  ul li a span{
		font-family: ' . $data['body_font']['face'] . ', Helvetica, Arial, sans-serif;
		color: ' . $data['body_font']['color'] . ';
	}';

	echo '
	#cart_widget ul.shoppingcart{
		font-family:' . $data['body_font']['face'] . ', Helvetica, Arial, sans-serif;
		color: ' . $data['body_font']['color'] . ';
	}';
		
	echo '
	.entry-content, #home-annoucements ul li .annoucement {
		color: ' . $data['body_font']['color'] . ';
	}';
		
	echo '
	textarea,
	select,
	input[type="date"],
	input[type="datetime"],
	input[type="datetime-local"],
	input[type="email"],
	input[type="month"],
	input[type="number"],
	input[type="password"],
	input[type="search"],
	input[type="tel"],
	input[type="text"],
	input[type="time"],
	input[type="url"],
	input[type="week"]
	{ 
		font-family: ' . $data['body_font']['face'] . ', Helvetica, Arial, sans-serif;
	}';	

} // endif body_font


if ( $button_colors ) {
	
	echo '
	button:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	input[type="button"]:hover,
	input.wpsc_buy_button,
	.home-add-to-cart,
	a.button,
	button.button, 
	input.button, 
	#review_form #submit,
	a.button.alt, button.button.alt,
	input.button.alt,
	#review_form #submit.alt
	 {

		background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, '. $data['btn_color_2'] .'), color-stop(1%, '. $data['btn_color_1'] .'), color-stop(100%, '. $data['btn_color_2'] .'));
		background-image: -webkit-linear-gradient('. $data['btn_color_2'] .', '. $data['btn_color_1'] .' 1px, '. $data['btn_color_2'] .');
		background-image: -moz-linear-gradient('. $data['btn_color_2'] .', '. $data['btn_color_1'] .' 1px, '. $data['btn_color_2'] .');
		background-image: -o-linear-gradient('. $data['btn_color_2'] .', '. $data['btn_color_1'] .' 1px, '. $data['btn_color_2'] .');
		background-image: -ms-linear-gradient('. $data['btn_color_2'] .', '. $data['btn_color_1'] .' 1px, '. $data['btn_color_2'] .');
		background-image: linear-gradient('. $data['btn_color_2'] .', '. $data['btn_color_1'] .' 1px, '. $data['btn_color_2'] .');
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="'. $data['btn_color_1'] .'", endColorstr="'. $data['btn_color_2'] .'");

	};';


};

if ( $dropdown_responsive ) {
	
	echo '
	@media screen and (max-width : 800px) {
		#menu-pages-dropdown, #home-menu-dropdown {
			display:block;
		}
		#menu-pages, #home-menu{
			display:none;
		}
		#menu-pages-dropdown select,  #home-menu-dropdown select {
			margin: 25px auto 30px;
			font-size: 1.6em;
			padding: 5px;
			height: 35px;
			width:300px;
		}
	}
	@media screen and (max-width : 400px) {
		#menu-pages-dropdown select, #home-menu-dropdown select {
			width: 100%;
		}
	}
	';
}
	
	
?>
