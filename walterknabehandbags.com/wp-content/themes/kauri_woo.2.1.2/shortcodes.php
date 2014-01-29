<?php
/*===================================================================*/
// Shortcodes
/*===================================================================*/


/*======================= Shortcode: InsertQuote.====================*/
// Info: [insertquote style="left"]-- Enter your content here --[/insertquote]  style options: 'left', 'right' 

function insertquote_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'style' => 'left'
    ), $atts));
    //$align = ($style == 'right') ? 'alignright' : 'alignleft';
	if( $style == 'right') {
		$align = 'alignright';
	}elseif ( $style == 'left' ) {
		$align = 'alignleft';
	}elseif ( $style == 'center' ) {
		$align = 'centered';
	}
    return '<blockquote class="'.$align.'">'.do_shortcode($content).'</blockquote>';
}
add_shortcode('insertquote', 'insertquote_func');



/*========================= Shortcode: Dropcap =========================*/
// Info: [dropcap style="light"]A[/dropcap], style options: 'light', 'dark'
function dropcap_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'style' => 'light'		
    ), $atts));
	$bcolour = ($style == 'dark') ? 'dark' : 'light';
    return '<span class="dropcap_'.$bcolour.'">'.$content.'</span>';
}
add_shortcode('dropcap', 'dropcap_func');

/*==================== Shortcode: Clear float =============================*/
// Info: [clear_float]
function clear_float_func( $atts, $content = null ) {
    return '<div class="clear"></div>';
}
add_shortcode('clear_float', 'clear_float_func');




/*====================== COLUMNS =============================*/

/*====================== Shortcode: one_half =============================*/
// Info: [one_half]-- Enter your content here --[/one_half], option 'last=true/false'
function one_half_func( $atts, $content = null ) {
	extract(shortcode_atts(array(
	    'last' => ''	
    ), $atts));
	$last = ($last == 'true') ? 'style="padding-right:0"' : '';
    return '<div class="one_half"><span class="column" '.$last.'>'.do_shortcode($content).'</span></div>';
}
add_shortcode('one_half', 'one_half_func');

/*======================== Shortcode: one_third =========================*/
// Info: [one_third]-- Enter your content here --[/one_third], option 'last=true/false'
function one_third_func( $atts, $content = null ) {
	extract(shortcode_atts(array(
	    'last' => ''	
    ), $atts));
	$last = ($last == 'true') ? 'style="padding-right:0"' : '';
    return '<div class="one_third"><span class="column" '.$last.'>'.do_shortcode($content).'</span></div>';
}
add_shortcode('one_third', 'one_third_func');

/*======================== Shortcode: two_third =========================*/
// Info: [two_third]-- Enter your content here --[/two_third], option 'last=true/false'
function two_third_func( $atts, $content = null ) {
	extract(shortcode_atts(array(
	    'last' => ''	
    ), $atts));
	$last = ($last == 'true') ? 'style="padding-right:0"' : '';
    return '<div class="two_third"><span class="column" '.$last.'>'.do_shortcode($content).'</span></div>';
}
add_shortcode('two_third', 'two_third_func');



/*======================== Shortcode: one_fourth ========================*/
// Info: [one_fourth]-- Enter your content here --[/one_fourth], option 'last=true/false'
function one_fourth_func( $atts, $content = null ) {
	extract(shortcode_atts(array(
	    'last' => ''	
    ), $atts));
	$last = ($last == 'true') ? 'style="padding-right:0"' : '';
    return '<div class="one_fourth"><span class="column" '.$last.'>'.do_shortcode($content).'</span></div>';
}
add_shortcode('one_fourth', 'one_fourth_func');

/*===================== Shortcode: three_fourth ==========================*/
// Info: [three_fourth]-- Enter your content here --[/three_fourth], option 'last=true/false'
function three_fourth_func( $atts, $content = null ) {
	extract(shortcode_atts(array(
	    'last' => ''	
    ), $atts));
	$last = ($last == 'true') ? 'style="padding-right:0"' : '';
    return '<div class="three_fourth"><span class="column" '.$last.'>'.do_shortcode($content).'</span></div>';
}
add_shortcode('three_fourth', 'three_fourth_func');





/*==================== Shortcode: Button ================================*/ 
// Info: [button text="Submit" title="Submit Button" url="http://www.aligator-studio.com/" size="m" bg_color="#000" text_color="#FFF"  target="_blank"]
// Options: Size: s, m, l 
function button_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'text' => esc_html__('Submit', 'kauri'),
	    'title' => '',
	    'size' => 'm',
	    'bg_color' => '#000',
	    'text_color' => '#FFF',
		'text_shadow' => '#000',
	    'url' => '#',	    
	    'target' => '',
    ), $atts));
    $target = ($target == '_blank') ? ' target="_blank"' : '';    
    $html = '
                <a class="'.$size.'-mybutton" href="'.$url.'" title="'.$title.'"'.$target.'><span style="background-color:'.$bg_color.'; color:'.$text_color.'; text-shadow:1px 1px 0 '.$text_shadow.'">'.do_shortcode($content).'</span></a>
	     ';
    return $html;
}
add_shortcode('button', 'button_func');



/*=================== Shortcode: Custom MesageBox ===========================*/
// Info: [messageb width="100%" top_color="#FFFFFF" bottom_color="#EEEEEE" border="#BBBBBB" color="#333333" title="Custom Message Box"]-- Enter your message here --[/message]

function messageb_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'icon' => '',
	    'title' => '',
	    'top_color' => '#FFF',
	    'bottom_color' => '#999',
	    'border' => '#BBBBBB',
	    'width' => '100',
	    'titlecolor' => '#333333',
	    'color' => '#333333',
	    'text_shadow' => '#ffffff',
	    'bg_color' => '#F5F5F5',
    ), $atts)); 
	
	if($icon) {
		$message_icon = 'background:url(' . get_template_directory_uri() . '/tinymce_shortcode/images/icons/'.$icon.') no-repeat left top; padding-left:40px;' ;
		$title_margin = 'margin: 20px 20px 20px 0;';
		$title_box_margin = 'margin-left:20px;';
	}else {
		$message_icon = '' ;
		$title_margin = '';
		$title_box_margin = '';
	}
   	
	$html = '<div class="messageb" style="background:-moz-linear-gradient(center top , '.$top_color.', '.$bottom_color.') repeat scroll 0 0 transparent;
					       background: -webkit-gradient(linear, center top, center bottom, from('.$top_color.'), to('.$bottom_color.'));
					       border:1px solid '.$border.';
					       background-color: '.$bottom_color.';
					       width:'.$width.'%;
					       color:'.$color.';">';
						   
	
	$html .= '<div class="inner">';

	if($title){
		$html .= '<div class="messageb_title" style="' . $message_icon . $title_box_margin .'"><h4 style="color:' . $titlecolor . '; text-shadow: 1px 1px 0 '.$text_shadow.';' . $title_margin . '">'.$title.'</h4></div>';
		$span_style = 'margin: 0 20px 20px ;"';
	}else{
		$span_style = 'margin: 20px ;padding-top: 7px; padding-bottom: 10px;'. $message_icon .'"';
	}
	
	$html .= '<div class="clear"></div><span style="text-shadow: 1px 1px 0 '.$text_shadow.';' . $span_style . '">'.do_shortcode($content).'</span></div></div>';
     
    return $html;
}
add_shortcode('messageb', 'messageb_func');


/*===================== Shortcode: ACCORDION_ITEM  ==========================*/
// Info: [accordion_item title="title 1"]-- Enter your content here --[/accordion_item]
function accordion_item_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'title'=> '',
    ), $atts));
    global $accordion_item_array;
    $accordion_item_array[] = array('title' => $title, 'content' => trim(do_shortcode($content)));
    return $accordion_item_array;
}
add_shortcode('accordion_item', 'accordion_item_func');

/*===================== Shortcode: ACCORDION ==========================*/
/* Info:
[accordion]
[accordion_item title="title 1"]-- Enter your content here --[/accordion_item]
[accordion_item title="title 2"]-- Enter your content here --[/accordion_item]
[/accordion]
*/
function accordion_function( $atts, $content = null ) {
    global $accordion_item_array;
    $accordion_item_array = array(); // clear the array

    $accordion_output = '<div class="clear"></div>';
    $accordion_output .= '<div class="accordion">';
    do_shortcode($content); // execute the '[accordion_item]' shortcode first to get the title and content
	
    foreach ($accordion_item_array as $tab => $accordion_toggle_attr_array) {
		$accordion_output .= '<div class="accordion_item"><h3 class="inactive">'.$accordion_toggle_attr_array['title'].'</h3>';
        $accordion_output .= '<div class="accordion_content">';
        $accordion_output .= $accordion_toggle_attr_array['content'];
        $accordion_output .= '</div><!-- end .accordion_content --></div><!-- end .accordion_item -->';
    }
    $accordion_output .= '</div><!-- end .accordion -->';
    $accordion_output .= '<div class="clear"></div>';
    return $accordion_output;
}
add_shortcode('accordion', 'accordion_function');
/*===================== end: ACCORDION  ==========================*/


/*===================== Shortcode: TABS ==========================*/
// Usage: [tab title="title 1"]-- Enter your content here --[/tab]
function tab_item_function( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'title'      => '',
    ), $atts));
    global $single_tab_array;
    $single_tab_array[] = array('title' => $title, 'content' => trim(do_shortcode($content)));
    return $single_tab_array;
}
add_shortcode('tab', 'tab_item_function');

/* TAB ITEMS AND CONTENT
 * Usage: 
[tabs]
[tab title="title 1"]-- Enter your content here --[/tab]
[tab title="title 2"]-- Enter your content here --[/tab]
[/tabs]
*/
function tabs_function( $atts, $content = null ) {
    global $single_tab_array;
    $single_tab_array = array(); // clear the array

    $tabs_nav = '<div class="clear"></div><div class="tabber">';
    
    $tabs_nav .= '<ul class="tabs">';
    do_shortcode($content); // execute the '[tab]' shortcode first to get the title and contentA
    $tab_no = 0;
	foreach ( $single_tab_array as $tab => $tab_attr_array ) {
		$tabs_nav .= '<li><a href="#tab_content_'. $tab_no .'"><h5>'.$tab_attr_array['title'].'</h5></a></li>';
		$tab_no ++;
    }
    $tabs_nav .= '</ul>';

	
	$tabs_output  = '<div class="tab_container">';
	$content_no = 0;
	foreach ( $single_tab_array as $tab => $tab_content_array ) {
		$tabs_output .= '<div class="tab_content" id="tab_content_' . $content_no . '">';
		$tabs_output .= '<p>' . $tab_content_array['content'] . '</p>' ;
		$tabs_output .= '</div><!-- end.tab_content -->';
		$content_no ++;
    }
	$tabs_output .= '</div><!-- end.tab_container -->';
   
    
	$tabs_output .= '</div><div class="clear"></div>';
    return $tabs_nav . $tabs_output;
}
add_shortcode('tabs', 'tabs_function');
/*===================== end TABS ==========================*/

/*===================== TOGGLE ==========================*/
// Usage: [toggle_content title="Title"]-- Enter your content here --[/toggle_content]
function toggle_content_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'title'      => '',
    ), $atts));
	
    $toggle_output = '<div class="toggler">';
	$toggle_output .= '<h3 class="inactive">' .$title. '</h3>';
    $toggle_output .= '<div class="toggle_content" style="display: none;">'.do_shortcode($content).'</div>';
	$toggle_output .= '</div><!-- end .toggler -->';
    return $toggle_output;
}
add_shortcode('toggle_content', 'toggle_content_func');
/*===================== end TOGGLE ==========================*/

/*===================== PRICEtable ==========================*/
// Usage: [pricetable title="Title" subtitle="subtitle" link="link" link_text="link text" bg_color="#000333" text_color="#000333" featured=true/false]-- Enter your content here --[/pricetable]
function pricetable_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'title'      => 'Price title',
	    'subtitle'      => 'explanation',
		'link'      => 'http://themeforest.com',
	    'link_text'      => 'Go',
	    'width'      => 'third',
	    'last'      => false,
	    'bg_color'      => '#666',
	    'text_color'      => '#ccc',
	    'text_shadow'      => '#333',
	    'featured'      => false
    ), $atts));
	
	if ( $width == 'half' ) {
		$wdth = 'width: 50%';
	}elseif ( $width == 'third' ) {
		$wdth = 'width:33.3%';
	}elseif ( $width == 'fourth' ) {
		$wdth = 'width:25%';
	}elseif ( $width == 'fifth' ) {
		$wdth = 'width:20%';
	}elseif ( $width == 'sixth' ) {
		$wdth = 'width:16.667%';
	};
	
	$last = ($last == 'true') ? ' margin-right: 0; ' : '';
	$featured = ($featured == 'true') ? '_featured' : '';
	
    $style = 'style="background-color:'.$bg_color.'; color:'.$text_color.'; text-shadow:1px 1px 0 '.$text_shadow.'"';
	
	
	$pricet_output = '<div class="pricetable_holder" style=" '. $wdth. ' ">';
	$pricet_output .= '<div class="pricetable'.$featured .'" style="border:1px solid ' . $bg_color . ';' . $last . ' ">';
	$pricet_output .= '<h4 class="title'.$featured.'" '. $style .'>' .$title. '</h4>';
	$pricet_output .= '<h6  '. $style .'>' .$subtitle. '</h6>';
    $pricet_output .= do_shortcode($content);
    $pricet_output .= '<div class="button_holder'.$featured .'"'. $style .'>';
	
    $pricet_output .= '<a class="m-mybutton" href="'.$link.'" title="'.$title.'" ><span '. $style .'>'.$link_text.'</span></a>';
    
	$pricet_output .= '</div>';
	$pricet_output .= '</div><!-- end .pricetable -->';
	$pricet_output .= '</div><!-- end .pricetable_holder -->';
    return $pricet_output;
}
add_shortcode('pricetable', 'pricetable_func');
/*===================== end PRICEtable ==========================*/

/*===================== LIST STYLE  ==========================*/
// Usage: [list_style style="arrow"]-- Enter your list here --[/list_style]
function list_style_func( $atts, $content = null ) {
    extract(shortcode_atts(array(
	    'style'      => '',
    ), $atts));
	
    $toggle_output = '<div class="liststyler '. $style .'">';
    $toggle_output .= do_shortcode($content);
	$toggle_output .= '</div><!-- end style -->';
    return $toggle_output;
}
add_shortcode('list_style', 'list_style_func');
/*===================== end LIST STYLE ==========================*/


/*===================== VIDEO ==========================*/
function video_sc_func( $atts, $content=null ) {
	extract(
		shortcode_atts(array(
			'site' => 'youtube',
			'id' => '',
			'w' => '600',
			'h' => '370'
		), $atts)
	);
	if ( $site == "youtube" ) { $src = 'http://www.youtube-nocookie.com/embed/'.$id; }
	else if ( $site == "screenr" ) { $src = 'http://www.screenr.com/embed/'.$id; }
	else if ( $site == "vimeo" ) { $src = 'http://player.vimeo.com/video/'.$id; }
	else if ( $site == "dailymotion" ) { $src = 'http://www.dailymotion.com/embed/video/'.$id; }
	else if ( $site == "yahoo" ) { $src = 'http://d.yimg.com/nl/vyc/site/player.html#vid='.$id; }
	else if ( $site == "bliptv" ) { $src = 'http://a.blip.tv/scripts/shoggplayer.html#file=http://blip.tv/rss/flash/'.$id; }
	else if ( $site == "veoh" ) { $src = 'http://www.veoh.com/static/swf/veoh/SPL.swf?videoAutoPlay=0&permalinkId='.$id; }
	else if ( $site == "viddler" ) { $src = 'http://www.viddler.com/simple/'.$id; }
	if ( $id != '' ) {
		return '<iframe width="'.$w.'" height="'.$h.'" src="'.$src.'" class="vid iframe-'.$site.'"></iframe>';
	}
}
add_shortcode('video_sc','video_sc_func');

/*===================== end VIDEO ==========================*/


/*===================== GOOGLE MAPS==========================*/
function google_map_func($atts, $content = null) {
   extract(shortcode_atts(array(
      "width" => '640',
      "height" => '480',
      "url" => ''
   ), $atts));
   return '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$url.'&amp;output=embed"></iframe>';
}
add_shortcode("google_map", "google_map_func");
/*===================== end GOOGLE MAPS ==========================*/
?>