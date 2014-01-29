<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){
	
//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');

foreach ($of_categories_obj as $of_cat) {

    $of_categories[$of_cat->cat_ID] = array( $of_cat->cat_name, $of_cat->slug );
	 
	}
$categories_tmp = array_unshift($of_categories, array("= Select Blog Category =",'0') );    



//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($of_pages_obj as $of_page) {
    $of_pages[$of_page->ID] = $of_page->post_name; }
$of_pages_tmp = array_unshift($of_pages, "Select a page:");       

//Testing 
$of_options_select = array("one","two","three","four","five");
 
$of_options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");

//testing end


$of_options_carousel_type = array("kauri_default" => "Kauri default carousel","classic" => "'Classic' carousel" );

$of_options_multicheck = array(
			"background" => "Customize background image?",
			"background_color" => "Customize background color?",
			"headings" => "Customize headings ?",
			"body_font" => "Customize body font ?",
			"link_colors" => "Customize link colors ?",
			"button_colors" => "Customize buttons gradient colors ?"
			);
		
			
$of_options_homepage_blocks = array( 
	"disabled" => array (
		"placebo" 		=> "placebo", //REQUIRED!
		"homewidgets_1"	=> "Widgets block 1",
		"homewidgets_2"	=> "Widgets block 2"
	), 
	"enabled" => array (
		"placebo" => "placebo", //REQUIRED!
		"featured_block"		=> "Featured products",
		"menu_block"		=> "Menu",
		"latest_block"	=> "Latest products",
		"blog_categories"	=> "Blog post by categories"
	),
);


//Stylesheets Reader
$alt_stylesheet_path = LAYOUT_PATH;
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//Background Images Reader
$bg_images_path = STYLESHEETPATH. '/images/bg/'; // change this to where you store your bg images
$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
$bg_images = array();

if ( is_dir($bg_images_path) ) {
    if ($bg_images_dir = opendir($bg_images_path) ) { 
        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
                $bg_images[] = $bg_images_url . $bg_images_file;
            }
        }    
    }
}

/*-----------------------------------------------------------------------------------*/
/* TO DO: Add options/functions that use these */
/*-----------------------------------------------------------------------------------*/

//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");

// Image Alignment radio box
$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

//=================== GENERAL SETTINGS TAB ================================ 

$of_options[] = array( "name" => "General Settings",
                    "type" => "heading");

					
$of_options[] = array( "name" => "Hello!",
					"desc" => "",
					"id" => "introduction",
					"std" => 'For all the questions and suggestions, feel free to <b><a href="http://themeforest.net/user/aligatorstudio" target="_blank">Contact Us</a> | <a href="'.get_template_directory_uri().'/documentation/" target="_blank">Documentation</a></b>',
					"icon" => true,
					"type" => "info");
					
/*					
$of_options[] = array( "name" => "Theme update notice",
					"desc" => "",
					"id" => "theme_update_notice_v2_1",
					"std" => 0,
					"message" => "<h3>Have you just updated Kauri theme or made a new install?</h3>If you have updated, to gain access to all new theme options, here's what you should do:<ol><li><strong>BACKUP theme options</strong> - to save your customizations</li><li><strong>RESET theme options</strong> - to introduce new options</li><li><strong>RESTORE theme options</strong> - to apply your customizations from previous versions</li></ol>Once you're done with these steps, you can close this message box.<br />If you freshly installed the theme you can close this message box.",
					"type" => "nag_ignore");
*/			
					
$of_options[] = array( "name" => "Dropdown menu navigation for mobile devices ?",
					"desc" => "Show menus for mobile devices (tablets, smartphones) as dropdown menu ? Tick if true, untick if you'd like to show list style menu",
					"id" => "dropdown_responsive",
					"std" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Site logo image",
					"desc" => "Upload your logo. If there is no logo the WP site title will be displayed and you can edit it in <b><a href='options-general.php'>WP general settings</a></b>. ",
					"id" => "media_upload_2",
					"std" => get_template_directory_uri().'/images/kauri_logo.png',
					"mod" => "min",
					"type" => "media");

$of_options[] = array( "name" => "Site logo image size ( SET LOGO HEIGHT )",
					"desc" => "If you wish to change the size of logo image in header, <strong>specify logo image height without specifing unit (enter just a number, hieght will be in pixels)</strong> and logo will be <strong>resized proportionally</strong>. If left blank, the size will remain the same as uploaded (selected size in upload popup window)",
					"id" => "logo_height",
					"mod" => "mini",
					"std" => "",
					"type" => "text"); 					
					
$of_options[] = array( "name" => "Site description",
					"desc" => "Show site description ? Hint: you can edit description in <b><a href='options-general.php'>WP general settings</a></b> (Wp tagline field).",
					"id" => "show_desc",
					"std" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Show shopping cart in header",
					"desc" => "Show shopping cart dropdown in header ? <br /><b>NOTE: if this is enabled, don't add shopping cart widgets. Shopping cart works only if one per page.</b> If you add widget, disable (unmark) this checkbox",
					"id" => "show_cart_icon",
					"std" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Show products categories in header",
					"desc" => "Show products categories dropdown menu in header ? That way your product categories will always be available.",
					"id" => "prod_cats_icon",
					"std" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => "custom_favicon",
					"std" => get_template_directory_uri(). '/images/favicon.png',
					"type" => "upload"); 


$of_options[] = array( "name" => "Theme Contact Form",
					"desc" => "If you want to use Kauri Theme Contact Form (to activate it <b>select Contact page template</b>), you can enter your email address here. Default email address is admin address enteres in <b><a href='options-general.php'>WP general settings</a></b> (Email address field)  ",
					"id" => "contact_email",
					"std" => get_option('admin_email'),
					"type" => "text"); 

$of_options[] = array( "name" => "Show post meta?",
					"desc" => "Show post meta (author, date) under the post titles ? This is enabled by default if you want to have blog asside to your e-commerce.",
					"id" => "entry_meta",
					"std" => 1,
					"type" => "checkbox"); 					


					
$of_options[] = array( "name" => "Footer options",
					"desc" => "",
					"id" => "footer",
					"std" => "<h3>Footer social links and custom footer text</h3>
					To show links to your social network profiles/pages in the footer, enter your profile links in boxes bellow",
					"icon" => true,
					"type" => "info");
	
					
$of_options[] = array( "name" => '<img src="'.get_template_directory_uri().'/images/options-facebook.png" style="vertical-align:middle" /> Facebook link ',
					"desc" => "<h3 style='margin:0; line-height:1.4em;'>Enter just your profile link, without <i>http://facebook.com</i>, for example: <i>pages/Aligator-Studio/218035174894908</i> </h3>",
					"id" => "social_fb",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => '<img src="'.get_template_directory_uri().'/images/options-twitter.png" style="vertical-align:middle" /> Twitter link ',
					"desc" => "<h3 style='margin:0; line-height:1.4em;'>Enter just your profile link, without <i>http://twitter.com</i>, for example: <i>@AligatorStudio</i> </h3> ",
					"id" => "social_twitter",
					"std" => "",
					"type" => "text"); 

					
$of_options[] = array( "name" => "Footer Text",
                    "desc" => "You can enter custom footer text here. If you want default footer text (&copy; - site title), just leave the textfield blank.",
                    "id" => "footer_text",
                    "std" => "",
                    "type" => "textarea");        
                                               

											   
											   
$of_options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => "google_analytics",
					"std" => "",
					"type" => "textarea");      
					

//=================== HOME PAGE TAB ================================ 
					
					
$of_options[] = array( "name" => "Home Settings",
					"type" => "heading");
					
$of_options[] = array( "name" => "Featured title",
					"desc" => "Custom title for featured products or posts. <br /><br /><b>For multilingual support, leave field empty and edit translation in kauri.pot file (in <i>laguages folder</i>)</b>",
					"id" => "featured_title",
					"std" => "",
					"type" => "text"); 
					
					
$of_options[] = array( "name" => "",
					"desc" => "<strong>Hide title for featured product ? Tick to hide.</strong>",
					"id" => "hide_featured_title",
					"std" => 0,
					"type" => "checkbox");   
					
					
$of_options[] = array( "name" => "Featured products or posts ?",
					"desc" => "Choose if you want to show featured products or featured (sticky) posts.",
					"id" => "featured_type",
					"std" => "products",
					"type" => "radio",
					"options" => array(
						'products' => 'Products',
						'posts' => 'Posts',
						)
					);
					
					
$carousel_thumb =  ADMIN_DIR . 'images/';
$of_options[] = array( "name" => "Select carousel template",
					"desc" => "Choose which type of featured items carousel you like - default Kauri carousel or more 'classical' carousel, with standard large image and captions.",
					"id" => "carousel_template",
					"std" => "carousel_kauri",
					"type" => "images",
					"options" => array(
						'carousel_kauri' => $carousel_thumb . 'carousel_kauri.png',
						'carousel_classic' => $carousel_thumb . 'carousel_classic.png'
						)
);

					
$of_options[] = array( "name" => "Featured products random background images",
					"desc" => "Featured products background images, loading with random loading, <i>bellow</i> featured products.<br /><br /><b>Image sizes should be at minimum 960px  x 400px</b><br /><br /> Featured products are selectable for display in <a href='edit.php?post_type=wpsc-product'> product listing page</a> by clicking on star next to each product.(<b> <a href='http://www.screenr.com/uGh8'>See video example</a></b> )<br /><b>WP e-commerce</b> plugin must be activated and at least one product should be entered)<br /><br />NOTE: if 'Classic' carousel is selected this option for home page is disabled' ",
					"id" => "slider_back_images",
					"std" => array ( 
								array ( 
								'order' => 0, 
								'title' => 'Image 1',
								'url' => get_template_directory_uri().'/images/headers/dummy.jpg',
								'link' => get_template_directory_uri().'/images/headers/dummy.jpg',
								'description' => ''), 
								array ( 
								'order' => 1, 
								'title' => 'Image 2', 
								'url' => get_template_directory_uri().'/images/headers/dummy.jpg',
								'link' => get_template_directory_uri().'/images/headers/dummy.jpg',
								'description' => ''), 
								array ( 
								'order' => 2, 
								'title' => 'Image 3', 
								'url' => get_template_directory_uri().'/images/headers/dummy.jpg',
								'link' => get_template_directory_uri().'/images/headers/dummy.jpg',
								'description' => '')
								),
					"type" => "slider");
					
$of_options[] = array( "name" => "Latest products title",
					"desc" => "Custom title for latest products. <br /><br /><b>For multilingual support, leave field empty and edit translation in kauri.pot file (in <i>laguages folder</i>)</b>",
					"id" => "latest_title",
					"std" => "",
					"type" => "text"); 					

$of_options[] = array( "name" => "",
					"desc" => "<strong>Hide title for latest product ? Tick to hide.</strong>",
					"id" => "hide_latest_title",
					"std" => 0,
					"type" => "checkbox");   					

$of_options[] = array( "name" => "Latest products or posts ?",
					"desc" => "Choose if you want to show latest products or latest posts.",
					"id" => "latest_type",
					"std" => "products",
					"type" => "radio",
					"options" => array(
						'products' => 'Products',
						'posts' => 'Posts',
						)
					);

					
$of_options[] = array( "name" => "Select a Post Category for display on Home Page",
					"desc" => "If you would like to show latest post from certain post category on home page block (SELECTABLE BELLOW).",
					"id" => "blog_category",
					"std" => $of_categories[0],
					"type" => "select_category",
					"options" => $of_categories);
			
					
$of_options[] = array( "name" => "Homepage Layout Manager",
					"desc" => "Organize how you want the layout to appear on the homepage. Drag and drop blocks to rearrange elements",
					"id" => "homepage_blocks",
					"std" => $of_options_homepage_blocks,
					"type" => "sorter");

					
$of_options[] = array( "name" => "BLOCKS MARGINS INFO",
					"desc" => "",
					"id" => "block_margins_info",
					"std" => "<h3>Set margins for blocks</h3> - usefull when blocks are reagganged.<br />  Don't enter units. Units are hardcoded in pixels. To remove margin, enter 0. ",
					"icon" => true,
					"type" => "info");	
					
$of_options[] = array( "name" => "Featured block margins",
					"desc" => "",
					"id" => "feat_block_margins",
					"mod" => "mini",
					"multi" => true,
					"std" =>  array(
						"Margin top" => "",
						"Margin bottom" => ""
						),
					"type" => "text"
					); 	 	
					
$of_options[] = array( "name" => "Menu block margins",
					"desc" => "",
					"id" => "menu_block_margins",
					"mod" => "mini",
					"multi" => true,
					"std" =>  array(
						"Margin top" => "",
						"Margin bottom" => ""
						),
					"type" => "text"
					); 	                                                 
					
$of_options[] = array( "name" => "Latest block margins",
					"desc" => "",
					"id" => "latest_block_margins",
					"mod" => "mini",
					"multi" => true,
					"std" =>  array(
						"Margin top" => "",
						"Margin bottom" => ""
						),
					"type" => "text"
					);
  					
$of_options[] = array( "name" => "Blog posts block margins",
					"desc" => "",
					"id" => "blog_block_margins",
					"mod" => "mini",
					"multi" => true,
					"std" =>  array(
						"Margin top" => "",
						"Margin bottom" => ""
						),
					"type" => "text"
					); 	                                                 
  					
$of_options[] = array( "name" => "Widgets block 1 margins",
					"desc" => "",
					"id" => "widgets1_block_margins",
					"mod" => "mini",
					"multi" => true,
					"std" =>  array(
						"Margin top" => "",
						"Margin bottom" => ""
						),
					"type" => "text"
					); 	                                                 
  					
$of_options[] = array( "name" => "Widgets block 2 margins",
					"desc" => "",
					"id" => "widgets2_block_margins",
					"mod" => "mini",
					"multi" => true,
					"std" =>  array(
						"Margin top" => "",
						"Margin bottom" => ""
						),
					"type" => "text"
					); 	                                                 

//=================== STYLING TAB ================================ 

												  
$of_options[] = array( "name" => "Styling Options",
					"type" => "heading");


$of_options[] = array( "name" => "Theme Skins",
					"desc" => "Select alternative style for your theme with theme skins.",
					"id" => "alt_stylesheet",
					"std" => "default.css",
					"type" => "select",
					"options" => $alt_stylesheets); 
					
					
$of_options[] = array( "name" => "Style settings!",
					"desc" => "",
					"id" => "style_settings",
					"std" => "<h3>Customize theme skins </h3>Use settings bellow to customize your theme skins even more, by selecting heading and font faces, colors and links and buttons colors ",
					"icon" => true,
					"type" => "info");					
					
$of_options[] = array( "name" => "Theme skins overrides",
					"desc" => "Select which CSS setting would you like to customize. If these style override options are <strong> not selected</strong>, the bellow changes to styles <strong>won't apply</strong>.",
					"id" => "styles_overrides",
					"std" => array('placebo'=>'placebo'),
				  	"type" => "multicheck",
					"options" => $of_options_multicheck);

$of_options[] = array( "name" => "Background color",
					"desc" => "Choose background color. Most of default Kauri background images bellow are semi-transparent, so you can use background color color and images together to make infinite combinations",
					"id" => "custom_bg_color",
					"std" => "",
					"type" => "color"); 
					
					
$of_options[] = array( "name" => "Default background images or uploaded",
					"desc" => "Select if you want to use our selection of background images, or if you want to upload your own.",
					"id" => "custom_or_upload",
					"std" => "custom",
					"type" => "radio",
					"class" => "small", //mini, tiny, small
					"options" => array(
							'custom' => 'Kauri default background images',
							'upload' => 'Uploaded background images'
						)
					);     
					
$of_options[] = array( "name" => "Kauri background images",
					"desc" => "Select a background pattern. These images are meant to repeat as tile and have fixed back position. Repeating selection (bellow) applies only to uploaded image (bellow)",
					"id" => "custom_bg",
					"std" => $bg_images_url."bg01.jpg",
					"type" => "tiles",
					"options" => $bg_images,
					);
				
$of_options[] = array( "name" => "Upload your background image",
					"desc" => "Upload images for site background, or define the URL directly",
					"id" => "your_background",
					"std" => "",
					"type" => "media");	
					
$of_options[] = array( "name" => "Background repeating",
					"desc" => "<b>If you uploaded your own background image</b>, select how do you want your uploaded image to repeat or if you want to repeat image at all.",
					"id" => "background_repeat",
					"std" => "repeat",
					"type" => "radio",
					"class" => "small", //mini, tiny, small
					"options" => array(
							'no-repeat' => 'No repeat',
							'repeat' => 'Repeat',
							'repeat-x' => 'Repeat X',
							'repeat-y' => 'Repeat Y'
						)
					);    			
$of_options[] = array( "name" => "Background attachment",
					"desc" => "<b>If you uploaded your own background image</b>, select how do you want your uploaded image to scroll",
					"id" => "background_attachment",
					"std" => "scroll",
					"type" => "radio",
					"class" => "small", //mini, tiny, small
					"options" => array(
							'scroll' => 'Scroll',
							'fixed' => 'Fixed'
						)
					);  
			
					
$of_options[] = array( "name" => "Fonts settings!",
					"desc" => "",
					"id" => "font_settings",
					"std" => "<h3>Fonts settings</h3> ",
					"icon" => true,
					"type" => "info");	
					
$of_options[] = array( "name" => "Headings  Font",
					"desc" => "Specify headers font for the site-wide headers, titles etc..",
					"id" => "headers_font",
					"std" => array('face-heading' => 'Open Sans Condensed', 'weight' => 'bold', 'style' => 'normal' ,'color' => '#902F3C'),
					"type" => "typography");
					
$of_options[] = array( "name" => "Body Font",
					"desc" => "Specify the body font properties. Body text color don't applies to link text, or linked headlines",
					"id" => "body_font",
					"std" => array('face' => 'Droid Sans','style' => 'normal','color' => '#000000'),
					"type" => "typography");  						
					
$of_options[] = array( "name" => "Links and Menus Color",
					"desc" => "Specify the color for links AND menus (hover) site wide",
					"id" => "links_style",
					"std" => array( 'color' => '#902F3C'),
					"type" => "typography");
							
							
									
$of_options[] = array( "name" => "Buttons gradient style",
					"desc" => "",
					"id" => "style_settings",
					"std" => "<h3>Buttons gradient style</h3>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => "Buttons style - gradient color 1",
					"desc" => "Select start color for button gradient",
					"id" => "btn_color_1",
					"std" => "",
					"type" => "color"); 	
					
$of_options[] = array( "name" => "Buttons style - gradient color 2",
					"desc" => "Select end color for button gradient.",
					"id" => "btn_color_2",
					"std" => "",
					"type" => "color"); 	
										
										
$of_options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.<br /><br /><b>Example:</b><br /> .my-style { color:#333 }",
                    "id" => "custom_css",
                    "std" => "",
                    "type" => "textarea");
					
					

//=================== BACKUP TAB ================================ 					
					
$of_options[] = array( "name" => "BACKUP",
					"type" => "heading");

					
$of_options[] = array("name"=>"Backup theme options",
					"id"=>"backup_options",
					"std" => "",
					"type"=>"backup",
					"options" => "Please, use this to save theme options in case you want to allow upgrading theme to new version."
					
				);

$of_options[] = array( "name" => "Backup help",
					"desc" => "",
					"id" => "backup_help",
					"std" => "<h3>HELP:</h3>This utility backups <b>SAVED</b> theme options.<br />Remember, when restoring backuped options: after you click on <b>'Restore options'</b>, you must click on <b>'Save All Changes'</b> to apply restored options. So, in short:<ul><li><b> &rarr; to backup </b>- first save, then backup</li><li><b>&rarr; to restore </b>- first restore, then save</li></ul>",
					"icon" => true,
					"type" => "info");				
				
/*
$of_options[] = array( "name" => "Example Options",
					"type" => "heading"); 	   

					
$of_options[] = array( "name" => "Media Uploader",
					"desc" => "Upload images using the native media uploader, or define the URL directly",
					"id" => "media_upload",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => "Typography",
					"desc" => "This is a typographic specific option.",
					"id" => "typography",
					"std" => array('size' => '12px','face' => 'verdana','style' => 'bold italic','color' => '#123456'),
					"type" => "typography");  
					
$of_options[] = array( "name" => "Border",
					"desc" => "This is a border specific option.",
					"id" => "border",
					"std" => array('width' => '2','style' => 'dotted','color' => '#444444'),
					"type" => "border");      
					
$of_options[] = array( "name" => "Colorpicker",
					"desc" => "No color selected.",
					"id" => "example_colorpicker",
					"std" => "",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Colorpicker (default #2098a8)",
					"desc" => "Color selected.",
					"id" => "example_colorpicker_2",
					"std" => "#2098a8",
					"type" => "color");          
                  
$of_options[] = array( "name" => "Upload",
					"desc" => "An image uploader without text input.",
					"id" => "uploader",
					"std" => "",
					"type" => "upload");  
					
$of_options[] = array( "name" => "Upload Min",
					"desc" => "An image uploader with text input.",
					"id" => "uploader2",
					"std" => "",
					"mod" => "min",
					"type" => "upload");     
                                
$of_options[] = array( "name" => "Input Text",
					"desc" => "A text input field.",
					"id" => "test_text",
					"std" => "Default Value",
					"type" => "text"); 
                                  
$of_options[] = array( "name" => "Input Checkbox (false)",
					"desc" => "Example checkbox with false selected.",
					"id" => "example_checkbox_false",
					"std" => 0,
					"type" => "checkbox");    
                                        
$of_options[] = array( "name" => "Input Checkbox (true)",
					"desc" => "Example checkbox with true selected.",
					"id" => "example_checkbox_true",
					"std" => 1,
					"type" => "checkbox"); 
                                                                           
$of_options[] = array( "name" => "Normal Select",
					"desc" => "Normal Select Box.",
					"id" => "example_select",
					"std" => "three",
					"type" => "select",
					"options" => $of_options_select);                                                          

$of_options[] = array( "name" => "Mini Select",
					"desc" => "A mini select box.",
					"id" => "example_select_2",
					"std" => "two",
					"type" => "select2",
					"class" => "mini", //mini, tiny, small
					"options" => $of_options_radio);    

$of_options[] = array( "name" => "Input Radio (one)",
					"desc" => "Radio select with default of 'one'.",
					"id" => "example_radio",
					"std" => "one",
					"type" => "radio",
					"options" => $of_options_radio);
					
$url =  ADMIN_DIR . 'images/';
$of_options[] = array( "name" => "Image Select",
					"desc" => "Use radio buttons as images.",
					"id" => "images",
					"std" => "warning.css",
					"type" => "images",
					"options" => array(
						'warning.css' => $url . 'warning.png',
						'accept.css' => $url . 'accept.png',
						'wrench.css' => $url . 'wrench.png'));
                                        
$of_options[] = array( "name" => "Textarea",
					"desc" => "Textarea description.",
					"id" => "example_textarea",
					"std" => "Default Text",
					"type" => "textarea"); 
                                      
$of_options[] = array( "name" => "Multicheck",
					"desc" => "Multicheck description.",
					"id" => "example_multicheck",
					"std" => array("three","two"),
				  	"type" => "multicheck",
					"options" => $of_options_radio);
                                      
$of_options[] = array( "name" => "Select a Category",
					"desc" => "A list of all the categories being used on the site.",
					"id" => "example_category",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $of_categories);
					
$of_options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => "custom_favicon",
					"std" => "",
					"type" => "upload"); 	
					
					
$url =  ADMIN_DIR . 'images/';
$of_options[] = array( "name" => "Main Layout",
					"desc" => "Select main content and sidebar alignment. Choose between 1, 2 or 3 column layout.",
					"id" => "layout",
					"std" => "2c-l-fixed.css",
					"type" => "images",
					"options" => array(
						'1col-fixed.css' => $url . '1col.png',
						'2c-r-fixed.css' => $url . '2cr.png',
						'2c-l-fixed.css' => $url . '2cl.png',
						'3c-fixed.css' => $url . '3cm.png',
						'3c-r-fixed.css' => $url . '3cr.png')
					);
*/

					
	}
}
?>
