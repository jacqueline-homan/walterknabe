<?php
// this file contains the contents of the popup window
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Insert Shortcodes</title>
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>-->
<script type="text/javascript" src="../../../../wp-includes/js/jquery/jquery.js"></script>
<script language="javascript" type="text/javascript" src="../../../../wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<style type="text/css" src="../../../../wp-includes/js/tinymce/themes/advanced/skins/wp_theme/dialog.css"></style>
<link rel="stylesheet" href="css/tinymce.css" />


<link rel="stylesheet" href="css/colorpicker.css" />

<script language="javascript" type="text/javascript" src="js/colorpicker.js" ></script>
<script language="javascript" type="text/javascript" src="js/popup-colorpicker.js" ></script>

<script language="javascript" type="text/javascript" src="js/tabs.js" ></script>


<script type="text/javascript">
/////////////////////////////////////////////////////////////////////////
var insertMap = {
	local_ed : 'ed',
	init : function(ed) {
		insertMap.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var url = jQuery('#gmap-dialog input#gmap-url').val();
		var width = jQuery('#gmap-dialog input#gmap-width').val();
		var height = jQuery('#gmap-dialog input#gmap-height').val();			 
		 
		var output = '';
		
		// setup the output of shortcode
		output = '[google_map ';
			output += 'url="' + url + '" ';
			output += 'width="' + width + '" ';
			output += 'height="' + height + '" ';
		
		
			output += ']';
		

		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	} 
};
tinyMCEPopup.onInit.add(insertMap.init, insertMap);
///////////////////////////////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////// 
var insertVideo = {
	local_ed : 'ed',
	init : function(ed) {
		insertVideo.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var site = jQuery('#video-dialog select#video-src').val();
		var id = jQuery('#video-dialog input#video-id').val();
		var w = jQuery('#video-dialog input#video-width').val();
		var h = jQuery('#video-dialog input#video-height').val();			 
		 
		var output = '';
		
		// setup the output of shortcode
		output = '[video_sc ';
			output += 'site="' + site + '" ';
			output += 'id="' + id + '" ';
			output += 'w="' + w + '" ';
			output += 'h="' + h + '" ';
		
		
			output += ']';
		

		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	} 
};
tinyMCEPopup.onInit.add(insertVideo.init, insertVideo);
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
var ButtonDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ButtonDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var url = jQuery('#button-dialog input#button-url').val();
		var target = jQuery('#button-dialog select#target').val();
		var text = jQuery('#button-dialog input#button-text').val();
		var title = jQuery('#button-dialog input#button-text').val();
		var size = jQuery('#button-dialog select#button-size').val();
		var bg_color = jQuery('#button-dialog input#button-color').val();		 	 
		var text_color = jQuery('#button-dialog input#text-color').val();		 	 
			 
		 
		var output = '';
		
		// setup the output of shortcode
		output = '[button ';
			output += 'title="' + title + '" ';
			output += 'url="' + url + '" ';
			output += 'size="' + size + '" ';
			output += 'bg_color="' + bg_color + '" ';
			output += 'text_color="' + text_color + '" ';
			output += 'target="' + target + '" ';
			
			
			// only insert if the url field is not blank
			if(url)
				output += ' url=' + url;
		
		// check to see if the TEXT field is blank
		if(text) {	
			output += ']'+ text + '[/button]';
		}
		// if it is blank, use the selected text, if present
		else {
			output += ']'+ButtonDialog.local_ed.selection.getContent() + '[/button]';
		}
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	} 
};
tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
var CustomMessage = {
	local_ed : 'ed',
	init : function(ed) {
		CustomMessage.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		
		
		// set up variables to contain our input values
		var icon = jQuery('#custom-mess-dialog select#icon').val();
		var title = jQuery('#custom-mess-dialog input#custom-mess-title').val();
		var text = jQuery('#custom-mess-dialog textarea#custom-mess-text').val();	 	 
		var width = jQuery('#custom-mess-dialog input#custom-mess-width').val();	 	 
		var top_color = jQuery('#custom-mess-dialog input#custom-mess-tcolor').val();	 	 
		var bottom_color = jQuery('#custom-mess-dialog input#custom-mess-bcolor').val();	
		var border = jQuery('#custom-mess-dialog input#custom-mess-border').val();		
		var titlecolor = jQuery('#custom-mess-dialog input#custom-mess-title-color').val();	 	 
		var color = jQuery('#custom-mess-dialog input#custom-mess-text-color').val();	 	 
		var text_shadow_color = jQuery('#custom-mess-dialog input#custom-mess-shadow-color').val();	 	 
			 
		 
		var output = '';
		
		// setup the output of shortcode
		output = '[messageb ';
		
		if(icon) {		
			output += 'icon="' + icon + '" ';
		}		
		if(title) {		
			output += 'title="' + title + '" ';
		}
		if(width) {		
			output += 'width="' + width + '" ';
		}	
			output += 'top_color="' + top_color + '" ';
			output += 'bottom_color="' + bottom_color + '" ';
			output += 'border="' + border + '" ';
			output += 'titlecolor="' + titlecolor + '" ';
			output += 'color="' + color + '" ';
			output += 'text_shadow="' + text_shadow_color + '" ';
		
		// check to see if the TEXT field is blank
		if(text) {	
			output += ']'+ text + '[/messageb]';
		}
		// if it is blank, use the selected text, if present
		else {
			output += ']'+CustomMessage.local_ed.selection.getContent() + '[/messageb]';
		}
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	} 
};
tinyMCEPopup.onInit.add(CustomMessage.init, CustomMessage);
 /////////////////////////////////////////////////////////////////////////
 /////////////////////////////////////////////////////////////////////////
 
var Accordion = {
	local_ed : 'ed',
	init : function(ed) {
		Accordion.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		
		// setup the output of shortcode
		var output = ''; 
		output += '[accordion]';
		
		jQuery('#accordion_holder .accordion_item').each( function() {
		

			var title = jQuery(this).find('input').val();
			var txt = jQuery(this).find('textarea').val();
			
			output += '[accordion_item title="' + title +'"]' + txt ;
			output += '[/accordion_item]';
			
		});
		
		output += '[/accordion]';
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	} 
};
tinyMCEPopup.onInit.add(Accordion.init, Accordion);
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////

var Toggler = {
	local_ed : 'ed',
	init : function(ed) {
		Toggler.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		
		// setup the output of shortcode
		var output = ''; 
		
		jQuery('#toggle_holder .toggle_item').each( function() {
		

			var title = jQuery(this).find('input').val();
			var txt = jQuery(this).find('textarea').val();
			
			output += '[toggle_content title="' + title +'"]' + txt ;
			output += '[/toggle_content]';
			
		});
		
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	} 
};
tinyMCEPopup.onInit.add(Toggler.init, Toggler);
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
var Tabber = {
	local_ed : 'ed',
	init : function(ed) {
		Tabber.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		
		// setup the output of shortcode
		var output = ''; 
		output += '[tabs]';
		
		jQuery('#tabber_holder .tab_item').each( function() {
		

			var title = jQuery(this).find('input').val();
			var txt = jQuery(this).find('textarea').val();
			
			output += '[tab title="' + title +'"]' + txt ;
			output += '[/tab]';
			
		});
		
		output += '[/tabs]';
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	} 
};
tinyMCEPopup.onInit.add(Tabber.init, Tabber);
/////////////////////////////////////////////////////////////////////////
var Columns = {
	local_ed : 'ed',
	init : function(ed) {
		Columns.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		
		// setup the output of shortcode
		var output = ''; 
		
		var columnsNo = jQuery('#columns_holder>div').length;
		var i = 0;
		var last = '';
		
		jQuery('#columns_holder>div').each( function() {

			i++;
			if ( i >= columnsNo ) { 
				last =' last="true"'; 
			}else{
				last = '';
			};
			
			var column = jQuery(this);
			var txt = column.find('textarea').val();
			
			if ( column.attr('class') == 'half' ) {
				
				if(txt) {	
					output += '[one_half' + last + ']' + txt + '[/one_half]';
				}
				// if it is blank, use the selected text, if present
				else {
					output += '[one_half' + last + ']' + Columns.local_ed.selection.getContent() + '[/one_half]';
				}
				
			}
			if ( column.attr('class') == 'third' ) {
				
				if(txt) {	
					output += '[one_third' + last + ']' + txt + '[/one_third]';
				}
				// if it is blank, use the selected text, if present
				else {
					output += '[one_third' + last + ']' + Columns.local_ed.selection.getContent() + '[/one_third]';
				}
			
				//output += '[one_third' + last + ']' + column.find('textarea').val() + '[/one_third]';
			}
			if ( column.attr('class') == 'two_third' ) {

				if(txt) {	
					output += '[two_third' + last + ']' + txt + '[/two_third]';
				}
				// if it is blank, use the selected text, if present
				else {
					output += '[two_third' + last + ']' + Columns.local_ed.selection.getContent() + '[/two_third]';
				}	
				
				//output += '[two_third' + last + ']' + column.find('textarea').val() + '[/two_third]';
			}
			if ( column.attr('class') == 'fourth' ) {
			
				if(txt) {	
					output += '[one_fourth' + last + ']' + txt + '[/one_fourth]';
				}
				// if it is blank, use the selected text, if present
				else {
					output += '[one_fourth' + last + ']' + Columns.local_ed.selection.getContent() + '[/one_fourth]';
				}	
			
				//output += '[one_fourth' + last + ']' + column.find('textarea').val() + '[/one_fourth]';
			}
			if ( column.attr('class') == 'three_fourth' ) {
			
				if(txt) {	
					output += '[three_fourth' + last + ']' + txt + '[/three_fourth]';
				}
				// if it is blank, use the selected text, if present
				else {
					output += '[three_fourth' + last + ']' + Columns.local_ed.selection.getContent() + '[/three_fourth]';
				}	
			
				//output += '[three_fourth' + last + ']' + column.find('textarea').val() + '[/three_fourth]';
			}
			
		});

		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	} 
};
tinyMCEPopup.onInit.add(Columns.init, Columns);
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
var Pricetable = {
	local_ed : 'ed',
	init : function(ed) {
		Pricetable.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		if (jQuery('#pricetable-dialog input#pricetable-featured').is(":checked"))
		{
			var featured = 'true';
		}else{
			var featured = 'false';
		}
		//var featured = jQuery('#pricetable-dialog input#pricetable-featured').val();
		var title = jQuery('#pricetable-dialog input#pricetable-title').val();
		var subtitle = jQuery('#pricetable-dialog input#pricetable-subtitle').val();
		var link = jQuery('#pricetable-dialog input#pricetable-link').val();
		var link_text = jQuery('#pricetable-dialog input#pricetable-linktext').val();
		var width = jQuery('#pricetable-dialog select#pricetable-width').val();
		if (jQuery('#pricetable-dialog input#pricetable-last').is(":checked"))
		{
			var last = 'true';
		}else{
			var last = 'false';
		}
		//var last = jQuery('#pricetable-dialog input#pricetable-last').val();
		var bg_color = jQuery('#pricetable-dialog input#bg-color').val();		 	 
		var text_color = jQuery('#pricetable-dialog input#text-color').val();		 	 
		var text_shadow = jQuery('#pricetable-dialog input#text-shadow').val();		 	 
			 
		 
		var output = '';
		
		// setup the output of shortcode
		output = '[pricetable ';
		
		output += 'featured="' + featured + '" ';
		output += 'title="' + title + '" ';
		output += 'subtitle="' + subtitle + '" ';
		output += 'link="' + link + '" ';
		output += 'link_text="' + link_text + '" ';
		output += 'width="' + width + '" ';
		output += 'last="' + last + '" ';
		output += 'bg_color="' + bg_color + '" ';
		output += 'text_color="' + text_color + '" ';
		output += 'text_shadow="' + text_shadow + '" ';
	
		output += ']'+ Pricetable.local_ed.selection.getContent() + '[/pricetable]';

		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	} 
};
tinyMCEPopup.onInit.add(Pricetable.init, Pricetable);
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
var List = {
	local_ed : 'ed',
	init : function(ed) {
		List.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		

		// set up variables to contain our input values
			 
		var style = jQuery('#list-dialog select#list_style').val(); 	  	 
			 
		style = style.replace('.png','');
		
		// setup the output of shortcode		 
		var output = '';

		output = '[list_style ';
		
		output += 'style="' + style + '" ';
			
		output += ']'+List.local_ed.selection.getContent() + '[/list_style]';
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	} 
};
tinyMCEPopup.onInit.add(List.init, List);
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
var Quote = {
	local_ed : 'ed',
	init : function(ed) {
		Quote.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		

		// set up variables to contain our input values
		
		var text = jQuery('#other-dialog textarea#quote-text').val();	 	 
		var align = jQuery('#other-dialog select#quote-align').val(); 	  	 
			 
		// setup the output of shortcode		 
		var output = '';
		output = '[insertquote ';
		
		output += 'style="' + align + '" ';
			
		// check to see if the TEXT field is blank
		if(text) {	
			output += ']'+ text + '[/insertquote]';
		}
		// if it is blank, use the selected text, if present
		else {
			output += ']'+Quote.local_ed.selection.getContent() + '[/insertquote]';
		}
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	} 
};
tinyMCEPopup.onInit.add(Quote.init, Quote);
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
var Dropcap = {
	local_ed : 'ed',
	init : function(ed) {
		Dropcap.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		

		// set up variables to contain our input values
		
		var text = jQuery('#other-dialog input#dropcap').val();	 	 
		var style = jQuery('#other-dialog select#dropcap-style').val(); 	  	 
			 
		// setup the output of shortcode		 
		var output = '';

		output = '[dropcap ';
		
		output += 'style="' + style + '" ';
			
		// check to see if the TEXT field is blank
		if(text) {	
			output += ']'+ text + '[/dropcap]';
		}
		// if it is blank, use the selected text, if present
		else {
			output += ']'+Dropcap.local_ed.selection.getContent() + '[/dropcap]';
		}
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	} 
};
tinyMCEPopup.onInit.add(Dropcap.init, Dropcap);
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
var ClearFloat = {
	local_ed : 'ed',
	init : function(ed) {
		ClearFloat.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		
		var style = jQuery('#other-dialog select#dropcap-style').val(); 	  	 
			 
		// setup the output of shortcode		 
		var output = '';
		
		output = '[clear_float]';
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	} 
};
tinyMCEPopup.onInit.add(ClearFloat.init, ClearFloat);
/////////////////////////////////////////////////////////////////////////

</script>

</head>
<body>
	
<ul class="tabs">
	<li><a href="#gmap"><span>Google map</span></a></li>
	<li><a href="#video"><span>Video</span></a></li>
	<li><a href="#button"><span>Button</span></a></li>
	<li><a href="#custom-message"><span>Custom message box</span></a></li>
	<li><a href="#accordion"><span>Accordion</span></a></li>
	<li><a href="#toggle"><span>Toggle</span></a></li>
	<li><a href="#tabber"><span>Tabs</span></a></li>
	<li><a href="#columns"><span>Columns</span></a></li>
	<li><a href="#pricetable"><span>Pricetable</span></a></li>
	<li><a href="#list"><span>List style</span></a></li>
	<li><a href="#other"><span>Other</span></a></li>
</ul>

<div class="tab_container">

	<!-- TAB - GOOGLE MAP -->	
	
	<div class="tab_content" id="gmap">

	<div id="gmap-dialog">
	
		<form action="/" method="get" accept-charset="utf-8">
			
			<div>
				<h4>Enter google map URL, width and height for simple Google map.</h4>
				For more advanced use of Google Maps, install <a href="http://wordpress.org/extend/plugins/google-map-shortcode/"><b>Google Map Shortcode</b></a> plugin.
			</div>
			
			
			<div>
				<label for="gmap-url">Google map URL</label>
				<input type="text" name="gmap-url" value="" id="gmap-url" style="width:200px;"/>
			</div>
			
			<div>
				<label for="gmap-width">Map width</label>
				<input type="text" name="gmap-width" value="" id="gmap-width" />
			</div>			
			
			<div>
				<label for="gmap-height">Map height</label>
				<input type="text" name="gmap-height" value="" id="gmap-height" />
			</div>			


			
			<div class="insert">	
				<a href="javascript:insertMap.insert(insertMap.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
			</div>
			
		</form>
		
	</div><!-- #video-dialog --> 

	</div><!-- .tab_content #video --> 
	
	
	
	<!-- TAB - VIDEO SHORTCODE -->	
	
	<div class="tab_content" id="video">

	<div id="video-dialog">
	
		<form action="/" method="get" accept-charset="utf-8">
			
			<div>
				<label for="video-src">Select video site</label>
				<select name="video-src" id="video-src" size="1">
					<option value="youtube" selected="selected">You Tube</option>
					<option value="vimeo">Vimeo</option>
					<option value="screenr">Screenr</option>
					<option value="dailymotion">Daily Motion</option>
					<option value="yahoo">Yahoo</option>
					<option value="blip">Blip.tv</option>
					<option value="veoh">Veoh</option>
				</select>
			</div>	
			
			
			<div>
				<label for="video-id">Video ID</label>
				<input type="text" name="video-id" value="" id="video-id" />
			</div>
			
			<div>
				<label for="video-width">Video width</label>
				<input type="text" name="video-width" value="" id="video-width" />
			</div>			
			
			<div>
				<label for="video-height">Video height</label>
				<input type="text" name="video-height" value="" id="video-height" />
			</div>			


			
			<div class="insert">	
				<a href="javascript:insertVideo.insert(insertVideo.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
			</div>
			
		</form>
		
	</div><!-- #video-dialog --> 

	</div><!-- .tab_content #video --> 
	

	
	<!-- TAB - BUTTON SHORTOCODE -->
	
	<div class="tab_content" id="button">

	<div id="button-dialog">
	
		<form action="/" method="get" accept-charset="utf-8">
			<div>
				<label for="button-url">Button URL</label>
				<input type="text" name="button-url" value="" id="button-url" />
			</div>
			
			<div>
				<label for="button-target">Target</label>
				<select name="target" id="target" size="1">
					<option value="none" selected="selected">None</option>
					<option value="_self"=>Self</option>
					<option value="_blank">Blank</option>
				</select>
			</div>	
			
			<div>
				<label for="button-text">Button Text</label>
				<input type="text" name="button-text" value="" id="button-text" />
			</div>
			<div>
				<label for="button-size">Size</label>
				<select name="button-size" id="button-size" size="1">
					<option value="s">Small</option>
					<option value="m" selected="selected">Medium</option>
					<option value="l">Large</option>
				</select>
			</div>
			<!--
			<div>
				<label for="button-align">Alignment</label>
				<select name="button-align" id="button-align" size="1">
					<option value="none" selected="selected">None</option>
					<option value="left">Left</option>
					<option value="right">Right</option>
				</select>
			</div>		
			 -->
			<div>
				<label for="button-color">Button Color</label>
				<div id="button-color-selector" class="colorSelector">
					<div></div>
				</div>

				<input name="button-color" id="button-color" type="text" value="" />
			
			</div>
			
			<div>
				<label for="text-color">Text Color</label>
				<div id="text-color-selector" class="colorSelector">
					<div></div>
				</div>

				<input name="text-color" id="text-color" type="text" value="" />
			
			</div>
			
			<div class="insert">	
				<a href="javascript:ButtonDialog.insert(ButtonDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
			</div>
			
		</form>
		
	</div><!-- #button-dialog --> 

	</div><!-- .tab_content #button --> 
	
	 
	
	<!-- TAB - CUSTOM MESSAGE BOX SHORTOCODE -->
	
	<div class="tab_content" id="custom-message">
		
		<div id="custom-mess-dialog">
		
			<form action="/" method="get" accept-charset="utf-8">
			
			<div>
				<label for="custom-mess-icon">Choose icon</label>
				
				<div id="icon_holder" style="float: left; width: auto; padding: 0 10px; margin-top: -10px;"></div>
				
				<?php
				//Icons Reader
				//$iterator = new DirectoryIterator(dirname(__FILE__));
				//$path = $iterator->getPath();
				
				$path = dirname(__FILE__);
			
				$icons_path = $path . '/images/icons';
				
				//$icons_url = '/images/icons/'; 
				$icons = array();
				
				if ( is_dir($icons_path) ) {
					if ( $icons_dir = opendir($icons_path) ) { 
						while ( ($icons_file = readdir($icons_dir) ) !== false ) {
							if( stristr($icons_file, ".png") !== false || stristr($icons_file, ".jpg") !== false ) {
								//$icons[] = $icons_url . $icons_file;
								$icons[] = $icons_file;
							}
						}    
					}
				};
				
				echo '<select name="icon" id="icon" size="1"><option value="" selected="selected">None</option>';
				foreach ($icons as $icon) {
					
					echo '<option value="'. $icon.'">'. $icon .'</option>';

				
				}
				echo '</select>';
				?>
				
			</div>
			
			<div>
				<label for="custom-mess-title">Message box title</label>
				<input type="text" name="custom-mess-title" value="" id="custom-mess-title" />
			</div>
			
			<div>
				<label for="custom-mess-text">Message box text</label>
				<!-- <input type="text" name="custom-mess-text" value="" id="custom-mess-text" />-->
				<textarea id="custom-mess-text"></textarea>
			</div>
			
			<div>
				<label for="custom-mess-text">Width (in percent)</label>
				<input type="text" name="custom-mess-text" value="100" id="custom-mess-width" />
			</div>

			<div>
				<label for="top-color">Top Color</label>
				<div id="top-color-selector" class="colorSelector">
					<div></div>
				</div>

				<input name="custom-mess-tcolor" id="custom-mess-tcolor" type="text" value="" />
			
			</div>
			
			<div>
				<label for="bottom-color">Bottom Color</label>
				<div id="bottom-color-selector" class="colorSelector">
					<div></div>
				</div>

				<input name="custom-mess-bcolor" id="custom-mess-bcolor" type="text" value="" />
			
			</div>	
			
			<div>
				<label for="border-color">Border Color</label>
				<div id="border-color-selector" class="colorSelector">
					<div></div>
				</div>

				<input name="custom-mess-border" id="custom-mess-border" type="text" value="" />
			
			</div>
									
			<div>
				<label for="title-color">Title Color</label>
				<div id="title-color-selector" class="colorSelector">
					<div></div>
				</div>

				<input name="custom-mess-title-color" id="custom-mess-title-color" type="text" value="" />
			
			</div>
									
			<div>
				<label for="text-color">Text Color</label>
				<div id="text-color-selector" class="colorSelector">
					<div></div>
				</div>

				<input name="custom-mess-text-color" id="custom-mess-text-color" type="text" value="" />
			
			</div>	
			
			<div>
				<label for="shadow-color">Shadow Color</label>
				<div id="shadow-color-selector" class="colorSelector">
					<div></div>
				</div>

				<input name="custom-mess-shadow-color" id="custom-mess-shadow-color" type="text" value="" />
			
			</div>
			
			<div class="insert">	
				<a href="javascript:CustomMessage.insert(CustomMessage.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
			</div>	
			
			
			</form>
		
		</div>
		
	</div><!-- .tab_content #custom-message--> 
	
	
	<!-- TAB - ACCORDION SHORTOCODE -->
	
	<div class="tab_content" id="accordion">
		
		<div id="accordion-dialog">
	
			<form action="/" method="get" accept-charset="utf-8">
			
			<input type="button" id="add_accordion_item" value="Add accordion item" />
			
			<div id="accordion_holder">
			
				<div id="accordion_item-1" class="accordion_item">
					
					<div class="remove_accordion_item"></div>
					<h4>Accordion Item 1</h4>
					
					<label>Title:</label>
					<input name="accordion_item-title" class="accordion_item-title" id="1" type="text" value="" />
					<label>Content:</label>
					<textarea class="accordion_item-content"></textarea>
				
					<div class="clear"></div>
				</div>
			
			</div>
			
			<div class="insert">	
				<a href="javascript:Accordion.insert(Accordion.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
			</div>				
			
			</form>
		
		</div>
		
	</div><!-- .tab_content #custom-message--> 
		
	<!-- TAB - TOGGLE SHORTOCODE -->
	
	<div class="tab_content" id="toggle">
		
		<div id="toggle-dialog">
	
			<form action="/" method="get" accept-charset="utf-8">
			
			<input type="button" id="add_toggle_item" value="Add toggle item" />
			
			<div id="toggle_holder">
			
				<div id="toggle_item-1" class="toggle_item">
					
					<div class="remove_toggle_item"></div>
					<h4>Toggle Item 1</h4>
					
					<label>Title:</label>
					<input name="accordion_item-title" class="toggle_item-title" id="1" type="text" value="" />
					<label>Content:</label>
					<textarea class="toggle_item-content"></textarea>
				
					<div class="clear"></div>
				</div>
			
			</div>
			
			<div  class="insert">	
				<a href="javascript:Toggler.insert(Toggler.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
			</div>				
			
			</form>
		
		</div>
		
	</div><!-- .tab_content #custom-message--> 
	
	
	<!-- TAB - TABBING SHORTOCODE -->
	
	<div class="tab_content" id="tabber">
		
		<div id="tabber-dialog">
	
			<form action="/" method="get" accept-charset="utf-8">
			
			<input type="button" id="add_tab" value="Click to add tab" />
			
			<div id="tabber_holder">
			
				<div id="tab_item-1" class="tab_item">
					
					<div class="remove_tab_item"></div>
					<h4>Tab 1</h4>
					
					<label>Title:</label>
					<input name="tab_item-title" class="tab_item-title" id="1" type="text" value="" />
					<label>Content:</label>
					<textarea class="tab_item-content"></textarea>
					
					<div class="clear"></div>
				
				</div>
			
			</div>
			
			<div  class="insert">	
				<a href="javascript:Tabber.insert(Tabber.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
			</div>				
			
			</form>
		
		</div><!-- #tabber-dialog --> 
		
	</div><!-- .tab_content #custom-message--> 
		
	
	<!-- TAB - COLUMNS SHORTOCODE -->
	
	<div class="tab_content" id="columns">
	
		<div id="columns-dialog">
	
		<form action="/" method="get" accept-charset="utf-8">
			
			<div class="button_holder">
				<input type="button" id="add_half" value="1/2 column" class="add_columns"/>
			</div>
			
			<div class="button_holder">
				<input type="button" id="add_third" value="1/3 column" class="add_columns" />
				<input type="button" id="add_two_third" value="2/3 column" class="add_columns" />
			</div>
			
			<div class="button_holder">
				<input type="button" id="add_fourth" value="1/4 column" class="add_columns" />
				<input type="button" id="add_three_fourth" value="3/4 column" class="add_columns" />
			</div>
			
			
			<div id="columns_holder">
			   
			   
			   
			</div>
			
			<!--
			<div class="select_holder">
			
				<select name="column_select" id="column_select" class="column_select" size="1">
				   <option value="none"> - Select Columns - </option>
				   <option value="two_halfs">2 halfs</option>
				   <option value="half_left">1 half left</option>
				   <option value="half_right">1 half right</option>
				</select>
			
			</div>
			<div id="columns_holder">
			   Select columns and the input fields will appear here.
			</div>
			 -->
			
			<div  class="insert">	
				<a href="javascript:Columns.insert(Columns.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
			</div>	
		
		
		</form>
		
		</div><!-- #columns-dialog --> 
	
	</div><!-- .tab_content #custom-message--> 
	
	
	
	<!-- TAB - PRICETABLE SHORTOCODE -->
	
	<div class="tab_content" id="pricetable">

	<div id="pricetable-dialog">
	
		<form action="/" method="get" accept-charset="utf-8">
			
			<div>
			NOTE: DID YOU ALREADY SELECT THE CONTENT OF PRICE TABLE ? If not, the shortcode content will be empty
			</div>
			
			<div>
				<label for="pricetable-featured">Featured ?</label>
				<input value="true" type="checkbox" name="pricetable-featured" id="pricetable-featured">
			</div>
			
			
			<div>
				<label for="pricetable-title">Title</label>
				<input type="text" name="pricetable-title" value="" id="pricetable-title" />
			</div>
			
			<div>
				<label for="pricetable-subtitle">Under title</label>
				<input type="text" name="pricetable-subtitle" value="" id="pricetable-subtitle" />
			</div>
				
			
			<div>
				<label for="pricetable-link">Pricetable link</label>
				<input type="text" name="pricetable-link" value="" id="pricetable-link" />
			</div>
			
			<div>
				<label for="pricetable-linktext">Link text</label>
				<input type="text" name="pricetable-linktext" value="" id="pricetable-linktext" />
			</div>			
			
			<div>
				<label for="pricetable-width">Width</label>
				<select name="pricetable-width" id="pricetable-width" size="1">
					<option value="half" selected="selected">One half</option>
					<option value="third"=>One third</option>
					<option value="fourth">One fourth</option>
					<option value="fifth">One fifth</option>
					<option value="sixth">One sixth</option>
				</select>
			</div>		
			
			<div>
				<label for="pricetable-last">Last in a row ?</label>
				<input value="true" type="checkbox" name="pricetable-last" id="pricetable-last" checked="checked">
			</div>

			<div>
				<label for="bg-color">Background Color</label>
				<div id="bg-color-selector" class="colorSelector">
					<div></div>
				</div>

				<input name="bg-color" id="bg-color" type="text" value="" />
			
			</div>
			
			<div>
				<label for="text-color">Text Color</label>
				<div id="text-color-selector" class="colorSelector">
					<div></div>
				</div>

				<input name="text-color" id="text-color" type="text" value="" />
			
			</div>
			
			
			<div>
				<label for="text-shadow">Text Shadow Color</label>
				<div id="text-shadow-selector" class="colorSelector">
					<div></div>
				</div>

				<input name="text-shadow" id="text-shadow" type="text" value="" />
			
			</div>
			
			<div class="insert">	
				<a href="javascript:Pricetable.insert(Pricetable.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
			</div>
			
		</form>
		
		</div><!-- #pricetable-dialog --> 

	</div><!-- .tab_content #button --> 
	
	
	
	<!-- TAB - LIST STYLE SHORTOCODE -->
	
	<div class="tab_content" id="list">
	
		<div  id="list-dialog">
		
			<div>
			NOTE: DID YOU ALREADY SELECT THE LIST TO CHANGE ITS STYLE ? If not, the shortcode content will be empty
			</div>
			
			
			<form action="/" method="get" accept-charset="utf-8">
			
			<div>
				
				<label for="custom-mess-icon">Choose icon</label>
				
				<div id="list_image_holder" style="float: left; width: auto; padding: 0 10px; margin-top: -10px;"></div>
				
				<?php
				//Images Reader
				//$iterator = new DirectoryIterator(dirname(__FILE__));
				//$path = $iterator->getPath();
				
				$path = dirname(__FILE__);
				
				$images_path = $path . '/images/liststyles';

				//$images_url = '/images/images/'; 
				$images = array();
				
				if ( is_dir($images_path) ) {
					if ( $images_dir = opendir($images_path) ) { 
						while ( ($images_file = readdir($images_dir) ) !== false ) {
							if( stristr($images_file, ".png") !== false || stristr($images_file, ".jpg") !== false ) {
								//$images[] = $images_url . $images_file;
								$images[] = $images_file;
							}
						}    
					}
				};
				
				echo '<select name="list_style" id="list_style" size="1"><option value="" selected="selected">None</option>';
				foreach ($images as $icon) {
					
					echo '<option value="'. $icon.'">'. $icon .'</option>';

				
				}
				echo '</select>';
				?>
				
			</div>
		
		
			<div class="insert">	
				<a href="javascript:List.insert(List.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
			</div>
		
		</form>
		
		</div><!-- #list-dialog--> 
	
	</div><!-- .tab_content #list--> 
	
	
	
	
	<!-- TAB - OTHER ELEMENTS SHORTOCODE -->
	
	<div class="tab_content" id="other">
		
		<div id="other-dialog">
	
			<form action="/" method="get" accept-charset="utf-8">
			
			<h3>Insert quote</h3>
			
			<div>
				<label for="quote-text">Quoted text</label>
				<textarea id="quote-text"></textarea>
			</div>
			
			<div>
				<label for="quote-align">Alignment</label>
				<select name="quote-align" id="quote-align" size="1">
					<option value="left" selected="selected">Left</option>
					<option value="right">Right</option>
					<option value="center">Center</option>
				</select>
			</div>
		
			
			<div  class="insert">	
				<a href="javascript:Quote.insert(Quote.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
			</div>				
			
			</form>
			
			
			<hr>
			
			
			<form action="/" method="get" accept-charset="utf-8">
			
			<h3>Insert dropcap</h3>
			
			<div>
				<label for="dropcap">Dropcap letter</label>
				<input type="text" name="dropcap" value="" id="dropcap" />
			</div>
				
			<div>
				<label for="dropcap-style">Style</label>
				<select name="dropcap-style" id="dropcap-style" size="1">
					<option value="light" selected="selected">Light</option>
					<option value="dark">Dark</option>
				</select>
			</div>
				
			<div  class="insert">	
				<a href="javascript:Dropcap.insert(Dropcap.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
			</div>				
			
			</form>
			
			<hr>
			
			<form action="/" method="get" accept-charset="utf-8">
			
			<h3 style="float:left">Clear float</h3>
			
			<div  class="insert" style="float: right; width: auto;">	
				<a href="javascript:ClearFloat.insert(ClearFloat.local_ed)" id="insert" style="display: block; line-height: 24px;">Clear float</a>
			</div>	
			</form>
		
		</div><!-- #other-dialog --> 
		
		
	</div><!-- .tab_content #other--> 
		

	
	
</div><!-- .tab_container --> 
	
	
</body>
</html>