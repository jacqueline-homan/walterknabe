<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<head lang="en">
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<title>Kauri Theme Documentation</title>
	<!-- Framework CSS -->
	<link rel="stylesheet" href="assets/blueprint-css/screen.css" type="text/css" media="screen, projection">
	<link rel="stylesheet" href="assets/blueprint-css/print.css" type="text/css" media="print">
	<!--[if lt IE 8]><link rel="stylesheet" href="assets/blueprint-css/ie.css" type="text/css" media="screen, projection"><![endif]-->
	<link rel="stylesheet" href="assets/blueprint-css/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
	
	<link rel="stylesheet" href="assets/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen, projection">
	
	<style type="text/css" media="screen">
		p, table, hr, .box { margin-bottom:25px; }
		.box p { margin-bottom:10px; }
	</style>
	
	<script src="assets/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="assets/fancybox/jquery.fancybox-1.3.4.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		
		$('a.fbox').fancybox({
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'speedIn'		:	300, 
			'speedOut'		:	300,
			'titleShow'		:	true,
			'titlePosition'	:	'over',
			'overlayShow'	:	true
		});
	});// end document ready
	</script>
</head>


<body>
	<div class="container">
	
		<h3 class="center alt">&ldquo;Kauri&rdquo; Theme Documentation by Aligator Studio&rdquo; v2.1.2</h3>
		
		<hr>
		
		<h1 class="center">&ldquo;KAURI&rdquo; Theme<br /><small>WooCommerce version</small></h1>
		
		<div class="borderTop">
			<div class="span-6 colborder info prepend-1">
				<p class="prepend-top">
					<strong>
					Created: July the 20<sup>th</sup> , 2012.<br>
					By: Aligator Studio<br>
					Email: <a href="mailto:hello@aligator-studio.com">hello@aligator-studio.com</a>
					</strong>
				</p>
			</div><!-- end div .span-6 -->		
	
			<div class="span-12 last">
				<p class="prepend-top append-0">Thank you for purchasing our theme.<br /><b>Kauri theme is WordPress theme designed for use with <a href="http://www.woothemes.com/woocommerce/" target="_blank" >WooCommerce plugin</a></b>.</p>
			</div>
			
		</div><!-- end div .borderTop -->
		<br />
		<small>If you have any questions that are beyond the scope of this help file, please feel free to email via our <a href="http://themeforest.net/user/aligatorstudio">Theme Forest user page contact form </a>. Thanks so much!</small>		
		
		<hr>
		
		<h2 id="toc" class="alt">Table of Contents</h2>
		<ol class="alpha">
			<li><a href="#installation">Installation</a></li>
				<ul>
					<li><a href="#updates">Theme updates</a></li>
				</ul>
			<li><a href="#addingcontent">Adding content</a></li>
				<ul>
					<li><a href="#menus">Menus</a></li>
					<li><a href="#products">Products</a></li>
					<li><a href="#widgets">Widgets and widget areas</a></li>
					<li><a href="#demo">Demo content import</a></li>
				</ul>
			
			<li><a href="#themeAdmin">Theme Admin Options Panel</a></li>
			<li><a href="#shortcodes">Shortcodes</a></li>
			<li><a href="#htmlStructure">HTML Structure, CSS and Javascript files</a></li>
			<li><a href="#plugins">Plugins</a></li>
			<li><a href="#credits">Sources and Credits</a></li>
		</ol>
		
		<hr>
		
		<h2 id="installation"><strong>A) Installation</strong> - <a href="#toc">top</a></h2>
		
		<p>This documentation assumes you already know how to install WordPress on your site (download installation, setup database and run server WordPress installation). 
		</p>
		
		
		
		<h4>1) Download package and extract </h4>
		<h4>2) Kauri theme installation </h4>
		<h4>3) WooCommerce plugin installation</h4>
		<h4>4) Import demo content</h4>
		<h4>5) Envato Wordpress Toolkit installation</h4>
		
		<h5><a href="http://www.screenr.com/kzm8" target="_blank">Check out screencast with installation of Kauri theme, WooCommerce and demo content import.</a></h5>
		<hr>
		
		<ol>
			
			
			<li><h4>DOWNLOAD AND EXTRACT PACKAGE</h4>
			When purchased theme, download it to location on your computer drive, and extract the contents of zip file, retaining directory and file structure.
			</li>
			
			
			
			
			<li><h4>KAURI THEME INSTALLATION</h4>
			To install Kauri Theme (once you downloaded package and extracted it to location on your computer), log in to admin page and  <b>1)</b> navigate menu to- Appearance - Themes, and click on <b>2)</b>  - "Install themes" tab, <b>3)</b>  - "upload" link and <b>4)</b> click on "choose file" to select <b>"kauri_woo.2.1.2.zip"</b> (found in location where you extracted package), and , finally, "Install".:<br /><br />
			<img src="assets/images/01-theme-install.png" title="Theme installation" class="border-grey" />
			<p>After messages of successful install( Unpacking the package... Installing the theme... Theme installed successfully.), click on "Activate" under this messages and Kauri Theme is installed.</p>
			</li>
			
			
			
			<li><h4>WOOCOMMERCE PLUGIN INSTALLATION</h4>
			
			- navigate admin menu to Plugins - Add new, and <br /><br />
			- click on <b>"Upload"</b> on the top menu (under the title "Install plugins") and<br /><br />
			- use the browse button to find <b>"woocommerce.zip"</b> on location where you exctracted package, and click on "Install now" <br /><br />
			
			After clicking on "Install now", you will be redirected to new page with title "Installing Plugin from uploaded file: woocommerce.zip", and after waiting for some time (not very long, minute or less ...) you will see installation messages: <i>Unpacking the package... Installing the plugin...Plugin installed successfully.</i> After last message click on "Activate Plugin", and WooCommerce plugin is installed.<br /><br />
			
			<img src="assets/images/02-plugin-install-a.png" title="Theme installation"  class="border-grey" id="plugin-install" /><br /><br />
			
			<div class="notice">IF YOU CHOOSE INSTALLATION WITH DIRECT WOOCOMMERCE PLUGIN DOWNLOAD FROM WORDPRESS.ORG PLUGIN REPOSITORY:</div>
			
			- navigate admin menu to Plugins - Add new, <br /><br />
			- In search box enter: <b>woocommerce</b>, click on "Search", and, when search results show up, <br /><br />
			- click on "Install now" under search result <b>"WooCommerce - excelling eCommerce"</b> by WooThemes (it should be first in the row of search result list as shown in picture). Confirm the message asking of you are sure you want to do that.
			
			<p>After waiting for a couple of minutes (depending on your internet connection) for plugin to download and install, the message of plugin installation success will appear. After that, click on "Activate plugin" and the WooCommerce plugin is installed.</p>
			
			<img src="assets/images/02-plugin-install-b.png" title="Plugin installation"  class="border-grey"/>
			
			
			
			</li>

						
			<li><h4>IMPORT DEMO CONTENT (optional)</h4>
			
			<p>To import DEMO content, follow the steps <b><a href="#demo"> HERE</a></b>.
			</p>
			
			</li>
		
			<hr>
			
			<div class="important">

			
			<h4>PERMALINKS:</h4>
			After WooCommerce installation and/or import of demo content, be sure to enable permalinks in "Settings" > "Permalinks".
			
			
			</div>
			
			<hr>
			
			
			<li><h4> ENVATO WORDPRESS TOOLKIT INSTALLATION</h4>
				<div class="notice">
		
				<h2 id="updates">Theme Updates</h2>
				
				<p>In downloaded package we included <b>Envato Wordpress Toolkit plugin</b> for theme automatic updates. All you need to do is install the plugin (<a href="#plugin-install">as described for WooCommerce plugin installation</a>) and enter your Marketplace user name and API key once the plugin is installed.</p>
				
				<img src="assets/images/envato_toolkit.png" title="Evato Wordpress Toolkit" />
			
				</div>
			<hr>
			</li>
			
			
		</ol>		
		
		<h4 style="color:red">IMPORTANT NOTICES:</h4>
		
		
		
		<div class="important">
		
		After you instal the WooCommerce plugin, Kauri theme overwrites WooCommerce default display options to fit Kauri design layout.<br />
		<b>We recommend you NOT to change these options in WooCommerce admin</b> ( WooCommerce > Settings, Catalog tab ),<b> as it will SERIOUSLY disrupt Kauri theme layout</b>: These image options are:
		<br />
		<br />
			- Catalog Images - width: 300px; height: 180px / Hard Crop (checked)<br />
			- Single Product Image - width: 300px; height: 300px / Hard Crop (checked)<br />
			- Product Thumbnails: - width:80px; height: 80px / Hard Crop (checked)<br />
			- 
		<br />
		
		<b>Remainder: Leave options metioned above as they are.</b><br /><br />
		
		Other WooCommerce customization options won't affect Kauri Theme. We recommend you browse through all WooCommerce options to solve all issues regarding your future Kauri e-commerce site.<br />
		For more help with WooCommerce, visit <a href="http://www.woothemes.com/woocommerce-docs/" target="_blank">WooCommerce plugin site</a> documentation.
		
		</div>
		
		
		<hr>

		
		<h2 id="addingcontent"><strong>B) Adding content</strong> - <a href="#toc">top</a></h2>
		
		<h4 class="notice"><b>If you want to insert some demo content with demo products, posts, pages and menus, go to end of this section, to <a href="#demo">"demo (demo) content"</a>, for explanation how to import demo data provided with this theme.</b></h4>
		
		
		<hr>
		
		<h3 id="menus">Menus</h3>
		<p><b> Kauri theme has 2 menus</b> created with theme installation:
		<table>
			<tr class="top-row">
				<td width=100><b>Menu name</b></td>
				<td><b>Position</b></td>
				<td><b>Description</b></td>
			</tr>

			<tr>
				<td><b>Home menu</b></td>
				<td>Home page, bellow the featured products</td>
				<td>this menu is on home page, designed to stand out more.</td>
			</tr>
			<tr>
				<td><b>Site menu</b></td>
				<td>In the header of all pages, except for home page</td>
				<td>this menu is in the header of all the pages, except for home page. This menu should have "HOME" link.</td>
			</tr>
		</table>
		</p>
		
		<p>NOTE: importing WooCommerce dummy data will automatically add two menus: Customer Navigation and Main Navigation. Kauri theme does not need other menus besides Home menu and Site menu, so can delete Customer Navigation and Main Navigation (not obligatory).</p>
		
		<p><b>Adding menu items</b> - navigate admin menu to Appearance - Menus. Then select under "Custom Links", "Pages", "Categories" and other tabs menu items to be added to each menu. Once menu items are added, you can rearrange items position with drag and drop technique. <br />To learn more about WordPress menu system, please visit <a href="http://codex.WordPress.org/WordPress_Menu_User_Guide">WordPress Codex WordPress Menu User Guide</a></p>
		

		
		
		<div class="notice">
		<h3><u>KAURI THEME SPECIFIC MENU OPTIONS : <i>DESCRIPTION OF MENU ITEMS and MENU ICONS</i></u></h3>
		
		<h4>DESCRIPTION OF MENU ITEMS</h4>

		<b>Adding description to menu item:</b><br />
		To enable menu item descriptions and enter some descriptions, first, go to top of menus admin page, and on the right top of the page click on <b>"Screen Options"</b>. When screen options open, under <b>"Show advanced menu properties"</b> check <b>"Description"</b>.<br /><br />
		
		<h4>MENU ITEMS ICONS</h4>

		<b>Adding icon to menu item:</b><br />
		To add icon to menu item, you must enable menu item css - first, go to top of menus admin page, and on the right top of the page click on <b>"Screen Options"</b>. When screen options open, under <b>"Show advanced menu properties"</b> check <b>"CSS Classes"</b>.<br /><br />
		
		Under each menu item, in the field "CSS Classes (optional)" (SEE IMAGES BELLOW), enter one of next available classes:
		<br /><br />
		
		<table id="icons">
		<tr>
		<td>
			<ul class="icons">
				<li><img src="assets/images/icons/icon_home.png" />menu-icon-home </li>
				<li><img src="assets/images/icons/icon_cart_menu.png" />menu-icon-store </li>
				<li><img src="assets/images/icons/icon_contact.png" />menu-icon-contact </li>
				<li><img src="assets/images/icons/icon_blog.png" />menu-icon-blog </li>
				<li><img src="assets/images/icons/icon_page.png" />menu-icon-page </li>
				<li><img src="assets/images/icons/icon_page_info.png" />menu-icon-page-info </li>
				<li><img src="assets/images/icons/icon_zoom.png" />menu-icon-zoom </li>
				<li><img src="assets/images/icons/icon_trash.png" />menu-icon-trash </li>
				<li><img src="assets/images/icons/icon_categories.png" />menu-icon-categories </li>
				<li><img src="assets/images/icons/icon_link.png" />menu-icon-link </li>
				<li><img src="assets/images/icons/icon_gallery.png" />menu-icon-gallery </li>
				<li><img src="assets/images/icons/icon_image.png" />menu-icon-image </li>
				<li><img src="assets/images/icons/icon_plus.png" />menu-icon-plus</li>
				
			</ul>
		</td>
		<td>
			<ul class="icons">	
				<li><img src="assets/images/icons/icon_minus.png" />menu-icon-minus </li>
				<li><img src="assets/images/icons/icon_alert.png" />menu-icon-alert</li>
				<li><img src="assets/images/icons/icon_alert2.png" />menu-icon-alert2</li>
				<li><img src="assets/images/icons/icon_forbidden.png" />menu-icon-forbidden</li>
				<li><img src="assets/images/icons/icon_mess_cloud.png" />menu-icon-mess_cloud</li>
				<li><img src="assets/images/icons/icon_mobile.png" />menu-icon-mobile</li>
				<li><img src="assets/images/icons/icon_music.png" />menu-icon-music</li>
				<li><img src="assets/images/icons/icon_question.png" />menu-icon-question</li>
				<li><img src="assets/images/icons/icon_screen.png" />menu-icon-screen</li>
				<li><img src="assets/images/icons/icon_settings.png" />menu-icon-settings</li>
				<li><img src="assets/images/icons/icon_tag.png" />menu-icon-tag</li>
				<li><img src="assets/images/icons/icon_video.png" />menu-icon-video</li>
			</ul>
		</td>
		</tr>
		</table>
		
		... and more to come ...
		
		<br /><br />
		<h4><u>WOOCOMMERCE MENU OPTIONS ENABLING</u></h4>
		
		<b>To enable WooCommerce display of products, product categories and product tags :</b><br />
		Go to top of menus admin page, and on the right top of the page click on <b>"Screen Options"</b>. When screen options open, check <b>"Products", "Product categories" and/or "Tags"</b>.
		
		To see example of menus, check <a href="http://aligator-studio.com/kauri" target="_blank">Kauri Theme Demo Site</a>
		
		<br /><br />
		<p><b>
		<a href="http://www.screenr.com/KGh8">VIDEO: Adding icon to menu item</a><br />
		<a href="http://www.screenr.com/GwM8">VIDEO: Adding description to menu item</a>
		
		</b></p>
		
		</div>
		
		<p><i>Menu options images:</i></p>
		
		<p>
		<a href="assets/images/menus/01-general-menu-options.png" rel="options_images" class="fbox" title="MENU OPTIONS">
			<img src="assets/images/menus/01-general-menu-options_thumb.png" />
		</a>
		<a href="assets/images/menus/02-added-menu-options.png" rel="options_images" class="fbox" title="MENU OPTIONS">
			<img src="assets/images/menus/02-added-menu-options_thumb.png" />
		</a>
		</p>
		
		
		<a href="#toc">top</a>
		<hr>
		
		
		
		
		<h3 id="products">Products</h3>
		
		<p><b>1)</b> to edit existing products and all their properties, select from admin menu <b>Products - products</b> , <b>2)</b> To add products to store, select from admin menu <b>Products - Add Product</b>
		</p>
		
		<img src="assets/images/03-products.png" alt="WOO PRODUCTS"  class="border-grey"  />
		
		<br /><br />
		<p>There are plenty of products options and customizations available through Products menu - <b>products categories, tags, shipping classes, attributes</b>, which you can edit.<br /> And even more customizations are possible through WooCommerce > Settings menu link (above Products menu link).<br />
		<b>For more help with editing and adding products, visit <a href="http://www.woothemes.com/woocommerce-docs/" target="_blank">WooCommerce documentation</a>, the plugin site.</b>
		</p>
		
		<p><b>
		<a href="http://www.screenr.com/Pzm8" target="_blank">VIDEO: adding Featured Product (to show on home page carousel) </a><br/ >
		<a href="http://www.screenr.com/KEm8" target="_blank">VIDEO: adding Product images and rearrange order </a><br/ >
		
		</b></p>
		
		
		<a href="#toc">top</a>
		<hr>
		
		
		
		
		<h3 id="widgets">Widgets</h3>
		
		<p>Kauri Theme has 6 predifined widget places where you can add some WordPress default widgets, like - Latest posts, Calendar, Pages menu or custom Kauri and WooCommerce widgets.
		You can also install third party widgets, but we can't guarantee the performance and appearance of those, third party widgets.<br />
		<i>Widgets can be administered via admin menu - Appearance - Widgets.</i>
		</p>
	
		
		<p>The Kauri Theme Widget areas are:</p>
		<ul>
			<li>Sidebar Right </li>
			<li>Bottom bar 1 (Footer)</li>
			<li>Bottom bar 2 (Footer)</li>
			<li>Bottom bar 3 (Footer)</li>
			<li>Home widgets 1 (Home page)</li>
			<li>Home widgets 2 (Home page)</li>
		</ul>
		<p>
		Home widgets 1 and 2 are optional and disabled by default in theme options (Home settings > Homepage Layout Manager).
		</p>
		
		<a href="#toc">top</a>
		<hr>
		
		<h3 id="demo">Demo content import</h3>
		
		
		
		<p>To insert "demo" content, go to <b>"Tools" > "Import"</b>. On list of sources for import (Blogger, Blogroll ...), click on last item  <b>"Wordpress"</b>. Popup modal window will prompt you for importer installation, when it does, click on red button <b>"Install now".</b> When the installation is done, click on "Activate Plugin & Run Importer"<br />
		New page will open ("Import Wordpress") with browse button "Choose a file from your computer". Click on button, browse to <b>WooCommerce plugin folder</b>, select <b>"dummy_data.xml"</b> open it and click on button <b>"Upload file and import"</b>. <br /><br />
		
		A new page will appear asking you to assign authors and import attachments. If you select import attachments, demo images attached to content will be imported, too. If you select to import attachments, you will have to wait for attachments to download, depending on your bandwidth.
		</p>
		<p>
		
		<a href="assets/images/demo-content/01.png" rel="demo_content" class="fbox" title="IMPORT CONTENT">
			<img src="assets/images/demo-content/01_thumb.png" />
		</a>
				
		<a href="assets/images/demo-content/02.png" rel="demo_content" class="fbox" title="IMPORT CONTENT">
			<img src="assets/images/demo-content/02_thumb.png" />
		</a>
						
		<a href="assets/images/demo-content/03.png" rel="demo_content" class="fbox" title="IMPORT CONTENT">
			<img src="assets/images/demo-content/03_thumb.png" />
		</a>
								
		<a href="assets/images/demo-content/04.png" rel="demo_content" class="fbox" title="IMPORT CONTENT">
			<img src="assets/images/demo-content/04_thumb.png" />
		</a>
		
		</p>
		<hr>
		<a href="#toc">top</a>
		<hr>
		
		<h2 id="themeAdmin"><strong>B) Theme Admin Options</strong> - <a href="#toc">top</a></h2>
		<p>
		Kauri Theme has extensive set of options for customization theme which can be accessed via admin menu <b>Appearance - Theme Options</b>. There are 4 option groups:
		</p>
		
		<ol>
			<li>General Settings</li>
			<li>Home Settings</li>
			<li>Styling Options</li>
			<li>Backup</li>
		</ol>
		
		<p><b>1. General Settings</b> - site-wide settings, you can choose :
		<ul>
			<b>mobile devices site navigation :</b>
			<li>dropdown menu on/off selection (for devices with smaller screens)</li>
			<b>header options :</b>
			<li>site logo upload and title,</li>
			<li>site logo size setting,</li>
			<li>site description,</li>
			<li>favicon upload,</li>
			<li>shopping cart icon,</li>
			<li>Facebook and Twitter profiles links,</li>
			<b>content options:</b>
			<li>theme contact form,</li>
			<li>posts meta information,</li>
			<li>footer content,</li>
			<b>admin option:</b>
			<li>Tracking code (Google analytics or other)</li>
		</ul>
		
		</p>
		<p><b>2.Home settings</b> - home page (landing page) only settings, you can choose :
		
		<ul>
			<li>Featured products title ,with possiblity to disable it</li>
			<li><b>Featured products or featured (sticky) posts choice(NEW!)</b></li>
			<li>Carousel types choice</li>
			<li>Homepage slider background images,</li>
			<li>Latest products title, with possiblity to disable it</li>
			<li><b>Latest products or latest posts choice (NEW!)</b></li>
			<li>Blog Posts (with selectable category),</li>
			<li>Homepage Layout Manager</li>
			<li>Homepage Layout Blocks margin controls</li>
		</ul>
		
		</p>
		<p><b>3.Styling Options</b> - site-wide appearance settings, you can choose :
		
		<ul>
			<li>Theme skins selection (4 skins),</li>
			<li>Theme skins overrides (selection of styles elements to override),</li>
			<li>Background color,</li>
			<li>Background images choice - Kauri patterns or uploaded images,</li>
			<li>Background tiles or uploaded images</li>
			<li>Background uploaded images with background styling properties (repeating, attachment)</li>
			<li>Body font(font family, colors, weight)</li>
			<li>Headers font (font family, colors, weight)</li>
			<li>Links color</li>
			<li>Buttons color</li>
			<li>Custom CSS</li>
		</ul>
		</p>
		
		<p><b>4.Backup <b>(NEW!)</b></b> - backup all the changes you made with theme options (usefull for upgrade)
		
		<p><b>Screenshots of Kauri Theme Options Panel:</b></p>
		
		<p>
		<a href="assets/images/options/01.png" rel="options_images" class="fbox" title="GENERAL SETTINGS">
			<img src="assets/images/options/01_thumb.png" />
		</a>
		
		<a href="assets/images/options/02.png" rel="options_images" class="fbox" title="GENERAL SETTINGS">
			<img src="assets/images/options/02_thumb.png" />
		</a>
				
		<a href="assets/images/options/03.png" rel="options_images" class="fbox" title="GENERAL SETTINGS">
			<img src="assets/images/options/03_thumb.png" />
		</a>
		
		<a href="assets/images/options/04.png" rel="options_images" class="fbox" title="HOME SETTINGS">
			<img src="assets/images/options/04_thumb.png" />
		</a>
		
		<a href="assets/images/options/05.png" rel="options_images" class="fbox" title="HOME SETTINGS">
			<img src="assets/images/options/05_thumb.png" />
		</a>
				
		<a href="assets/images/options/05_b.png" rel="options_images" class="fbox" title="HOME SETTINGS">
			<img src="assets/images/options/05_b_thumb.png" />
		</a>
		
		<a href="assets/images/options/06.png" rel="options_images" class="fbox" title="STYLING SETTINGS">
			<img src="assets/images/options/06_thumb.png" />
		</a>
		
		<a href="assets/images/options/07.png" rel="options_images" class="fbox" title="STYLING SETTINGS">
			<img src="assets/images/options/07_thumb.png" />
		</a>
				
		<a href="assets/images/options/08.png" rel="options_images" class="fbox" title="STYLING SETTINGS">
			<img src="assets/images/options/08_thumb.png" />
		</a>
				
		<a href="assets/images/options/09.png" rel="options_images" class="fbox" title="STYLING SETTINGS">
			<img src="assets/images/options/09_thumb.png" />
		</a>
				
		<a href="assets/images/options/10.png" rel="options_images" class="fbox" title="BACKUP">
			<img src="assets/images/options/10_thumb.png" />
		</a>
		
		</p>
		
		<p class="clear"><b>NOTE:each Theme option has an explanation on a right hand side of option setting. If you need any more help or with Kauri Theme Options panel, please feel free to email via my user page contact form <a href="http://themeforest.net/user/aligatorstudio">here</a>.</b></p>
		
		<p class="important">
		If you press "Options Reset" you will reset Kauri Theme options to default and lose all the customizations you entered in Kauri Theme Options panel
		</p>
			
		<p class="important">
		New theme option "Backup" should be used before any theme upgrade.
		</p>
		
		<p><b>THEME OPTIONS VIDEOS:
			<ul>
				<li><a href="http://www.screenr.com/rBg8">Changing site logo</a></li>
				<li><a href="http://www.screenr.com/tBg8">Adding Facebook and Twitter links</a></li>
				<li><a href="http://www.screenr.com/jBg8">Editing Featured and Lastest titles with margin adjustment</a></li>
				<li><a href="http://www.screenr.com/S2g8">Changing home layout - carousel and layout manager</a></li>
				<li><a href="http://www.screenr.com/D2g8">Changing theme skins, customize background and titles</a></li>
				<li><a href="http://www.screenr.com/f2g8">Changing body font, buttons colors and background</a></li>
				<li><a href="http://www.screenr.com/UUg8">Reseting theme options</a></li>
			</ul>
		</b></p>
		
		
		
		<hr>		
		
		<h2 id="shortcodes"><strong>C) Shortcodes</strong> - <a href="#toc">top</a></h2>
		
		<p>A shortcode is a WordPress-specific code that lets you do nifty things with very little effort. Shortcodes can embed files or create objects that would normally require lots of complicated, ugly code in just one line. 
Shortcode = shortcut. While entering your content into WordPress you can, for example, use the shortcode [one_third] to devide your content in 3 columns. </p>
		
		<p class="notice">
		<b>Shortcodes editor</b><br /><br />
		
		From version 1.2 Kauri theme introduces <b> visual editor shortcode button (TinyMce)</b> with popup editor for insertion of shortcodes via graphic interface, without the need for remembering and typing shortcodes manually.<br /><br />
		
		<img src="assets/images/shortcodes_1.png" /><br /><br />
		<img src="assets/images/shortcodes_2.png" />
		
		</p>
		
		<p>If you still preffer to insert shortcode manually, here is list of all shortcodes used in Kauri theme and instructions on how to write them.</p>
		<ol class="alpha">
			<h4>Interface elements:</h4>
			<li><b>Accordion</b><br /> Usage: [accordion][accordion_item title="title"]Content...[/accordion_item][/accordion]</li>
			<li><b>Toggle</b><br /> Usage: [toggle_content title="Title"]Content...[/toggle_content]</li>
			<li><b>Tabs</b><br /> Usage: [tabs][tab title="Title 1"]Content 1[/tab][tab title="Title 2"]Content...[/tab][/tabs]</li>
			<li><b>Button</b><br /> Usage: [button text="Submit" title="Submit Button" url="http://www.aligator-studio.com/" size="m" bg_color="#000" text_color="#FFF" target="_blank"]Content...[/button] Options: Size: s, m, l (for small,medium, large)</li>
			<li><b>Custom MesageBox</b><br /> Usage: [messageb width="100%" top_color="#FFFFFF" bottom_color="#EEEEEE" border="#BBBBBB" color="#333333" title="Custom Message Box"]Content...[/message]</li>
			<h4>Columns shortcodes:</h4>
			<li><b>One_fourth</b><br /> Usage: [one_fourth]Content...[/one_fourth] - style options: last=true/false for last element</li>
			<li><b>Three_fourth</b><br /> Usage: [three_fourth]Content...[/three_fourth] - style options: last=true/false for last element</li>
			<li><b>One_third</b><br /> Usage: [one_third]Content...[/one_third] -  style options: last=true/false for last element</li>
			<li><b>Two_third</b><br /> Usage: [two_third]Content...[/two_third] -  style options: last=true/false for last element</li>
			<li><b>One_half</b><br /> Usage: [one_half]Content...[/one_half] -  style options: last=true/false for last element</li>
			<li><b>Three_fourth</b><br /> Usage: [three_fourth]Content...[/three_fourth] - Use 1 with 1 One_fourth shortcode, style options: last=true/false for last element</li>
			<h4>Other elements:</h4>
			<li><b>Price table</b><br />Usage: [pricetable featured="false" title="Pricetable" subtitle="under title" link="Link" link_text="Button text" width="third" last="false" bg_color="#666" text_color="#fff" text_shadow="#333" ]Price table content[/pricetable]</li>
			<li><b>List style</b><br />Usage: [list_style style=""]Price table content[/list_style]</li>
			<li><b>Clear float</b><br /> Usage: [clear_float]Content...[/clear_float]</li>
			<li><b>InsertQuote</b><br /> Usage: [insertquote style="left"]Insertquote content ...[/insertquote], style options: 'left', 'right'</li>
			<li><b>Dropcap</b><br /> Usage: [dropcap style="light"]A[/dropcap], style options: 'light', 'dark'</li>
		</ol>
		
		<p><b>VIDEOS:
			<ul>
			<li><a href="http://www.screenr.com/THh8" target="_blank">Adding accordion with shortcode generator</a></li>
			<li><a href="http://www.screenr.com/gHh8" target="_blank">Adding toggle with shortcode generator</a></li>
			<li><a href="http://www.screenr.com/KHh8" target="_blank">Adding tabs with shortcode generator</a></li>
			<li><a href="http://www.screenr.com/bsh8" target="_blank">Adding button with shortcode generator</a></li>
			<li><a href="http://www.screenr.com/xDp8" target="_blank">Adding custom message box with shortcode generator</a></li>
			<li><a href="http://www.screenr.com/EHh8" target="_blank">Adding columns with shortcode generator - video 1</a></li>
			<li><a href="http://www.screenr.com/5Hh8" target="_blank">Adding columns with shortcode generator - video 2</a></li>
			<li><a href="http://www.screenr.com/akp8" target="_blank">Adding price tables with shortcode generator</a></li>
			<li><a href="http://www.screenr.com/bZp8" target="_blank">Adding list styles with shortcode generator</a></li>

			</ul>
		</b></p>
		
		
		<p>And more shortcode to come in next iterations of theme (REMINDER: once you purchased Kauri Theme, you have right to a lifetime free upgrades of theme ... ) </p>
		
		<hr>
		
		
		<h2 id="htmlStructure"><strong>D) HTML Structure, CSS and Javascript files</strong> - <a href="#toc">top</a></h2>
		
		<h4><b>HTML Structure</b></h4>
		
		<p>
		This theme has <b>fluid</b> and <b>responsive</b> layout (via media queries and jQuery), with unique home page and uniform pages layout with right sidebar (optionally it can be replaced with no-sidebar full width page content).  All of the major information within the main content area is nested within a div with an id of "primary". The sidebar's (column #2) content is within a div with an id of "secondary". The general template structure is the same throughout the template. Here is the general HTML structure.</p>
		
		<img src="assets/images/htmlstructure.png" alt="HTML Structure" />
		
		<p></p>
		
		<hr>
		
		<h4><b>CSS files</b> - <a href="#toc">top</a></h4>
		
		<p>If you would like to edit the color, font, or style of any elements, and you have the knowledge to edit CSS files there are couple of CSS files included in theme:
		
		<ul>
			<li><b>style.css</b> - General Kauri theme styles</li>
			<li><b>rtl.css</b> - right to left support</li>
			<li><b>editor-style.css</b> - styles for admin post editor</li>
			<li><b>formalize.css</b> - form elements css</li>
			<li><b>woocommerce.css</b> - WooCommerce plugin specific styles</li>
			<li><b>shortcodes.css</b> - styles for usage with WP shorcodes</li>
			<li><b>jquery.fancybox-1.3.4.css</b> ( in js/fanybox folder ) - styles for usage with fancybox jQuery plugin</li>
			<li><b>default.css</b> for theme skins usage ( In admin/layouts folder ) </li>
			<li><b>dark.css</b> for theme skins usage ( In admin/layouts folder ) </li>
			<li><b>dark_blue.css</b> for theme skins usage ( In admin/layouts folder ) </li>
			<li><b>light_brown.css</b> for theme skins usage ( In admin/layouts folder ) </li>
		</ul>
		</p>

		<p>or, you can edit appearance in theme options under menu in admin section ( Appearance - Theme Options - Styling Options ).</p> 
		
		<hr>

		<h4><b>Javascript files.</b> - <a href="#toc">top</a></h4>
		
		<p>Kauri theme uses couple of javascript files, mostly jQuery plugins by other people, and some custom created code by us. Here is the list of jQuery files use in Kauri Theme</p>
		
		<ol>
			<li>Fancybox (/js/fancybox)</li>
			<li>jQuery Form Plugin ( /js/jquery.form.js)</li>
			<li>Formalize Plugin ( /js/jquery.formalize.js)</li>
			<li>carouFredSel jQuery  Plugin ( /js/jquery.carouFredSel-5.5.0.js)</li>
			<li>Live Twitter jQuery  Plugin ( /js/jquery.livetwitter.min.js)</li>
			<li>Kauri Custom jQuery code( /js/custom.js) - hCaption (made by <a href="http://www.queness.com/post/590/jquery-thumbnail-with-zooming-image-and-fading-caption-tutorial">queness.com</a> tutorial) ,  menu system, tabs</li>
			<li>Animated Scroll to Top (js/custom.js)</li>
		</ol>
		  

		<p>jQuery is a Javascript library that greatly reduces the amount of code that you must write.<br />
		Most of the animation in this site is carried out from the jQuery plugins included in theme and some or executed by customs scripts.<br /><br />
		Example of usage of <b>fancybox jQuery plugin</b>:	
		</p>
					
<pre>	
$('.myImageDiv').fancybox({'transitionIn':'elastic', 'transitionOut':'elastic',<br /> 'speedIn':300, 'someOtherArgumet':'argumentValue' });
</pre>
			

		<hr>
		
		<h2 id="plugins"><strong>E) Plugins</strong> - <a href="#toc">top</a></h2>
		
		
		<p>In download package of Kauri theme we have included 5 plugins: 
		<ol>
			<li><b>WooCommerce</b></li>
			<li><b>Envato Wordpress Toolkit</b> - for theme updates</li>
			<li>Custom Sidebars - support for unlimited sidebars (in Optional_Plugins.zip) .</li>
			<li>Regenerate Thumbnails - if you change image sizes (in Optional_Plugins.zip).</li>
			<li>Maintenence Mode - neat way to put you site offline (in Optional_Plugins.zip).</li>
		</ol> 
		
		
		<p>There are couple of WordPress plugins that we recommend (besides WooCommerce, off course) to use with theme;
		
		<ul>
			<li><a href="http://WordPress.org/extend/plugins/relevanssi/">Relevanssi - a better search</a> - a really good search for WP.</li>
			<li><a href="http://WordPress.org/extend/plugins/ajax-thumbnail-rebuild/">AJAX Thumbnail Rebuild</a> if you change image sizes.</li>
			<li><a href="http://WordPress.org/extend/plugins/contact-form-7/">Contact Form 7</a> easy and powerful contact forms with plenty of options.</li>
		</ul>
		
		<hr>		
		<h2 id="credits"><strong>F) Sources and Credits</strong> - <a href="#toc">top</a></h2>
		
		<p>We've used the following images, icons or other files as listed.
		
		<ul>
			<li><a href="http://fancybox.net/" target="_blank">fancybox</a> / Licenced under MIT and GPL licences </li>
			<li><a href="http://caroufredsel.frebsite.nl/" target="_blank">caruFredSel jQuery plugin</a> by Fred Heusschen/ Licenced under MIT and GPL licences </li>
			<li><a href="http://formalize.me/.com/" target="_blank">Formalize</a>  /  Licenced under MIT and GPL licences </li>
			<!-- 
			<li><a href="http://elektronaut.github.com/jquery.livetwitter/" target="_blank">jQuery LiveTwitter</a>  by Inge Jorgensen / Licenced under MIT </li>
			-->
			<li><a href="http://jquery.malsup.com/" target="_blank">jQuery Form Plugin</a> by Mike Alsup / Licenced under MIT and GPL licences</li>
			<li><a href="http://remysharp.com/" target="_blank">jQuery html5 enabling-script</a> by Remy Sharp / Licenced under MIT</li>
			<li><a href="http://www.fontsquirrel.com/foundry/Barry-Schwartz" target="_blank">Bonveno Light Font</a> by Barry Schwartz / Licenced under GPL</li>
			<li><a href="http://webdesignerwall.com/tutorials/animated-scroll-to-top" target="_blank">Animated Scroll to Top</a> by Web Designer Wall</li>

			<li><a href="http://aquagraphite.com">SMOF by Aquagraphite</a>  / (KIA Options Framework, Options Framework forks), /under GNU GPL licence </li>
			<li><a href="http://stilbuero.de">jQuery Cookie plugin</a> - Copyright (c) 2006 Klaus Hartl (stilbuero.de) -licensed under the MIT and GPL licenses (only in online demo) </li>
		</ul>
		
		<hr>
		
		<p>Once again, thank you so much for purchasing this theme. We'd be glad to help you if you have any questions relating to this theme. No guarantees, but we'll do our best to assist. If you have a more general question relating to the themes on ThemeForest, you might consider visiting the forums and asking your question in the "Item Discussion" section.</p> 
		
		<p class="append-bottom alt large"><strong>Aligator Studio</strong></p>
		<p><a href="#toc">Go To Table of Contents</a></p>
		
		<hr class="space">
	</div><!-- end div .container -->
</body>
</html>