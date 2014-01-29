<?php
/**
 * Kauri theme functions and definitions
 * @package WordPress
 * @subpackage kauri
 * @since kauri 0.1
*/
if ( ! isset( $content_width ) ) $content_width = 1400; // $content_width WP theme-wide constant for max content width, to limit image_size large to max.
//
//
/********************************************************
* ADMIN PAGE NOTICE AFTER KAURI INSTALLATION (removable)
*********************************************************/
add_action('admin_notices', 'kauri_welcome_notice');
function kauri_welcome_notice() {
    global $current_user ;
        $user_id = $current_user->ID;
    if ( ! get_user_meta($user_id, 'notice_ignored') ) {
        echo '<div class="updated"><p>';
        printf(__('<h2>Thanks for purchasing Kauri theme. </h2><a href="themes.php?page=optionsframework">Kauri theme options</a> | <a href="'.get_template_directory_uri().'/documentation/" target="_blank">Documentation</a> | <a href="%1$s" class="remove_message" style="float:right">Remove this message</a>'), '?kauri_welcome_notice_ignore=0');
        echo "</p></div>";
    }
}
add_action('admin_init', 'kauri_welcome_notice_ignore');
function kauri_welcome_notice_ignore() {
    global $current_user;
        $user_id = $current_user->ID;
        if ( isset($_GET['kauri_welcome_notice_ignore']) && '0' == $_GET['kauri_welcome_notice_ignore'] ) {
             add_user_meta($user_id, 'notice_ignored', 'true', true);
    }
}
//
//
/*********************************
* run Once class
*********************************/
if (!class_exists('run_once')){
    class run_once{
        function run($key){
            $test_case = get_option('run_once');
            if (isset($test_case[$key]) && $test_case[$key]){
                return false;
            }else{
                $test_case[$key] = true;
                update_option('run_once',$test_case);
                return true;
            }
        }
        function clear($key){
            $test_case = get_option('run_once');
            if (isset($test_case[$key])){
                unset($test_case[$key]);
            }
			update_option('run_once',$test_case);
        }
    }
}
/********************************************
 GET IMAGE OUT OF THE_CONTENT() - REPLACEMENT FOR wp_get_image_attachment()
********************************************/
function getImage($num) {
	global $more;
	$more = 1;
	$link = get_permalink();
	$content = get_the_content();
	$count = substr_count($content, '<img');
	$start = 0;
	for($i=1;$i<=$count;$i++) {
		$imgBeg = strpos($content, '<img', $start);
		$post = substr($content, $imgBeg);
		$imgEnd = strpos($post, '>');
		$postOutput = substr($post, 0, $imgEnd+1);
		$postOutput = preg_replace('/width="([0-9]*)" height="([0-9]*)"/', '',$postOutput);;
		$image[$i] = $postOutput;
		$start=$imgEnd+1;
	}
	if(stristr($image[$num],'<img')) { echo '<div class="image-holder"><a href="'.$link.'">'.$image[$num]."</a></div>"; }
	$more = 0;
}
/********************************************
THE_CONTENT() STRIPPED OUT OD IMAGES
********************************************/
function the_content_noimg() {
	$content = get_the_content('Read the rest of this entry &raquo;'); 
	$content = preg_replace('/<img[^>]+./', '', $content); 
	echo $content;
}
/********************************************
 CUSTOM EXCERPT LENGTH
********************************************/
function custom_excerpt($chars) {
	global $post;
	$ellipsis = false;
	$text = get_the_content();
	$text = $text . " ";
	$text = strip_tags($text);
	$text = strip_shortcodes($text); // strip_shortcodes - WP core function (WP Codex)
	if( strlen($text) > $chars )
		$ellipsis = true;
	$text = substr($text,0,$chars);
	$text = substr($text,0,strrpos($text,' '));
	if( $ellipsis == true )
		$text = $text . "...";
	echo $text;
}
//
//
/*****************************************
 PRODUCTS FEED
*******************************************/
function myfeed_request($qv) {
	if (isset($qv['feed']) && !isset($qv['post_type']))
		$qv['post_type'] = array('product');
	return $qv;
}
add_filter('request', 'myfeed_request');
//
//
//
/*****************************************
 MAIN INITIALIZATIONS
*******************************************/
if ( ! function_exists( 'kauri_setup' ) ):
function kauri_setup() {
	//
	load_theme_textdomain( 'kauri', get_template_directory() . '/languages' );
	//
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
	//
	add_theme_support( 'automatic-feed-links' );
	//
	add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery' ) );
	//	
	add_theme_support( 'post-thumbnails', array( 'post', 'page','product' ) );
	//
	//
	add_image_size( 'kauri-featured', 180, 260, true );	
	add_image_size( 'kauri-latest', 280, 180, true );
	add_image_size( 'site-logo', 300, 120, false );
	add_image_size( 'featured-image', 680 ,180, true );
	//
	add_editor_style();
	add_filter('widget_text', 'do_shortcode'); // te enable shortcodes in widgets
	//	
	// add shortcodes support
	include('shortcodes.php');
	include('tinymce_shortcode/tinymce_shortcode.php');
	include_once('youtube-shortcode/youtube-shortcode.php');
	//
	//
	// couple of theme widgets
	include('widget_latest_images.php');
	include('widget_featured_thumbs.php');
	include('widget_social.php');
	//
	//
	// WOOCOMMERCE ===========================================================
	//
	remove_filter('woocommerce_placeholder_img_src','woocommerce_placeholder_img_src');
	add_filter('woocommerce_placeholder_img_src','kauri_placeholder_img_src');
	//
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
	add_action( 'woocommerce_before_shop_loop_item_title', 'woo_kauri_template_loop_product_thumbnail', 10);
	//
}
endif; // kauri_setup
add_action( 'after_setup_theme', 'kauri_setup' );
//
//
add_action( 'init','woocommerce_kauri_include' );
function woocommerce_kauri_include () {
	include('woocommerce-functions.php');
//
};
/**************************************************************************
------ ADDING HOME MENU AND 1 ITEM (to prevent WP_DEBUG menu errors on theme install)
***************************************************************************/
add_action( 'init', 'home_menu_fallback' );
function home_menu_fallback() {
	$locations = get_theme_mod('nav_menu_locations');
	//
	if (! has_nav_menu('home_menu') && ! is_nav_menu( 'Home menu' )) {
		$locations['home_menu'] = wp_create_nav_menu('Home menu', array('slug' => 'home-menu'));
		set_theme_mod('nav_menu_locations', $locations);
		//
		$kauri_menu_one = wp_get_nav_menu_object('Home menu');
		$kauri_menu_oneID = (int) $kauri_menu_one->term_id;
		$myPage = get_page_by_title('Sample page');
		//
		$kauri_menu_one_item =  array(
			'menu-item-object-id' => $myPage->ID,
			'menu-item-parent-id' => 0,
			'menu-item-position'  => 2,
			'menu-item-object' => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
		  );
		//
		wp_update_nav_menu_item($kauri_menu_oneID, 0, $kauri_menu_one_item);
	} else {
		$locations['home_menu'] = 'Home menu';
		set_theme_mod('nav_menu_locations', $locations);
	}
	//
	if (! has_nav_menu('site_menu') && ! is_nav_menu( 'Site menu' )) {
		$locations['site_menu'] = wp_create_nav_menu('Site menu', array('slug' => 'site-menu'));
		set_theme_mod('nav_menu_locations', $locations);
		//
		$kauri_menu_two = wp_get_nav_menu_object('Site menu');
		$kauri_menu_twoID = (int) $kauri_menu_two->term_id;
		$myPage = get_page_by_title('Sample page');
		//
		$kauri_menu_two_item =  array(
			'menu-item-object-id' => $myPage->ID,
			'menu-item-parent-id' => 0,
			'menu-item-position'  => 2,
			'menu-item-object' => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
		  );
		wp_update_nav_menu_item($kauri_menu_twoID, 0, $kauri_menu_two_item);

	} else {
		$locations['site_menu'] = 'Site menu';
		set_theme_mod('nav_menu_locations', $locations);
	}
}
add_action( 'wp_print_styles', 'my_deregister_styles', 100 );
function my_deregister_styles() {
	wp_deregister_style( 'woocommerce_fancybox_styles' );
}
function kauri_placeholder_img_src () {
	return get_template_directory_uri().'/images/no_image.jpg';
}
/*
add_action( 'wp_print_scripts', 'my_deregister_javascript', 100 );
function my_deregister_javascript() {
	wp_dequeue_script( 'fancybox' );
}
*/
/***************************************************************************
------ REMOVE WOOMMERCE DEFAULT SETTING AND OPTIONS IN FAVOUR OF KAURI THEME
****************************************************************************/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active('woocommerce/woocommerce.php') ) {
	//
	$run_once = new run_once;
	if ($run_once->run('initial_kauri_woo_values')){
		initial_kauri_woo_values();
	}
}// endif is plugin active
//
function initial_kauri_woo_values() {
	//global $woocommerce;
	//
	update_option( 'woocommerce_catalog_image_width', 300 );
	update_option( 'woocommerce_catalog_image_height', 180 );
	update_option( 'woocommerce_catalog_image_crop', 1 );
//	
	update_option( 'woocommerce_single_image_width', 300 );
	update_option( 'woocommerce_single_image_height', 300 );
	update_option( 'woocommerce_single_image_crop', 1 );
//
	update_option( 'woocommerce_thumbnail_image_width', 80 );
	update_option( 'woocommerce_thumbnail_image_height', 80 );
	update_option( 'woocommerce_thumbnail_image_crop', 1 );
//	
//
	update_option( 'woocommerce_frontend_css','no' ); // IMPORTANT - to have Kauri's WOO template CSS instead of plugin's
	update_option( 'woocommerce_menu_logout_link','no' ); // remove "Logout" menu item	
	update_option( 'woocommerce_prepend_shop_page_to_urls','yes' );
	update_option( 'woocommerce_prepend_shop_page_to_products','yes' ); 
	update_option( 'woocommerce_prepend_category_to_products','yes' );
	//
};
/**************************************************
  END OF REMOVE
***************************************************/
//
//
/*********************
------UPDATER 
**********************
******************for future releases *********************
function on_admin_init()
{
    // include the library
    include_once('envato-wordpress-toolkit-library/class-envato-wordpress-theme-upgrader.php');
    $upgrader = new Envato_WordPress_Theme_Upgrader( 'themeforestusername', 'apikey' );
    /*
     *  Uncomment to check if the current theme has been updated
     */
    //$upgrader->check_for_theme_update(); 
    /*
     *  Uncomment to update the current theme
     */
    //$upgrader->upgrade_theme();
//}

//add_action('admin_init', 'on_admin_init');
/********************
end UPDATER 
********************/
//
/*****************************************
 END MAIN INITIALIZATIONS
*******************************************/
//
//
//
//
/********************************************
KAURI WIDGET PLACES
/********************************************/
function kauri_widgets_init() {
//
	register_sidebar( array(
		'name' => __( 'Sidebar Right', 'kauri' ),
		'id' => 'sidebar-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
//
	register_sidebar( array(
		'name' => __( 'Bottombar 1', 'kauri' ),
		'id' => 'bottombar-1',
		'description' => __( 'An optional first bottombar area', 'kauri' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
//
	register_sidebar( array(
		'name' => __( 'Bottombar 2', 'kauri' ),
		'id' => 'bottombar-2',
		'description' => __( 'An optional second bottombar area', 'kauri' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
//
	register_sidebar( array(
		'name' => __( 'Bottombar 3', 'kauri' ),
		'id' => 'bottombar-3',
		'description' => __( 'An optional third bottombar area', 'kauri' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => "</section>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
//
	register_sidebar( array(
		'name' => __( 'Home widgets 1', 'kauri' ),
		'id' => 'homewidgets-1',
		'description' => __( 'A box to add more widgets to home page', 'kauri' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
//	
	register_sidebar( array(
		'name' => __( 'Home widgets 2', 'kauri' ),
		'id' => 'homewidgets-2',
		'description' => __( 'A box to add more widgets to home page', 'kauri' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
//	
}
add_action( 'widgets_init', 'kauri_widgets_init' );
/********************************************
Display navigation to next/previous pages when applicable @since kauri 1.2
********************************************/
if ( ! function_exists( 'kauri_content_nav' ) ):
//
function kauri_content_nav( $nav_id ) {
	global $wp_query;?><nav id="<?php echo $nav_id; ?>"><?php if ( is_single() ) : // navigation links for single posts?><?php previous_post_link( '<div class="nav-previous">%link</div>', '%title' );?><?php next_post_link( '<div class="nav-next">%link</div>', '%title' );?><?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : ?><?php if ( get_next_posts_link() ) : ?><div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'kauri' ) ); ?></div><?php endif; ?><?php if ( get_previous_posts_link() ) : ?><div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'kauri' ) ); ?></div><?php endif; ?><?php endif; ?></nav><!-- #<?php echo $nav_id; ?> --><?php
}
endif;// kauri_content_nav
/********************************************
 Template for comments and pingbacks.
********************************************/ 
if ( ! function_exists( 'kauri_comment' ) ) :
function kauri_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?><li class="post pingback"><p><?php _e( 'Pingback:', 'kauri' ); ?><?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'kauri' ), ' ' ); ?></p><?php
break;
default :
?><li <?php comment_class(); ?>id="li-comment-<?php comment_ID(); ?>"><article id="comment-<?php comment_ID(); ?>" class="comment"><footer><div class="comment-author vcard"><?php echo get_avatar( $comment, 40 ); ?><?php printf( __( '%s <span class="says">says:</span>', 'kauri' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?></div><!-- .comment-author .vcard --><?php if ( $comment->comment_approved == '0' ) : ?><em><?php _e( 'Your comment is awaiting moderation.', 'kauri' ); ?></em><br /><?php endif; ?><div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>"><?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'kauri' ), get_comment_date(), get_comment_time() ); ?></time></a><?php 

edit_comment_link( __( '(Edit)', 'kauri' ), ' ' );
					?></div><!-- .comment-meta .commentmetadata --></footer><div class="comment-content"><?php comment_text(); ?></div>
			<div class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); 

?></div><!-- .reply --></article><!-- #comment-## --><?php
break;
endswitch;
}
endif;// ends check for kauri_comment()
/*******************************************/
/*		   META INFO BLOCK	               */
/*******************************************/
if ( ! function_exists( 'entryMeta' ) ) :
function entryMeta() {
	printf( __( '<span class="date">Posted on </span>
	<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a>
	<span class="byline"> <span class="sep" style="margin-right:4px;"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'kauri' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'kauri' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
endif;
/*******************************************/
// ADDITIONAL BODY CLASSES FOR SINGLE AUTHOR
/*******************************************/
function kauri_body_classes( $classes ) {
	// Adds a class of single-author to blogs with only 1 published author
	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}
	return $classes;
}
add_filter( 'body_class', 'kauri_body_classes' );
/*******************************************/
// Returns true if a blog has more than 1 category
/*******************************************/
function kauri_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );
		//
		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );
		//
		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}
	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so kauri_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so kauri_categorized_blog should return false
		return false;
	}
}
/*******************************************/
//Flush out the transients used in kauri_categorized_blog
/*******************************************/
function kauri_category_transient_flusher() {
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'kauri_category_transient_flusher' );
add_action( 'save_post', 'kauri_category_transient_flusher' );
/*******************************************/
//Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
/*******************************************
function kauri_enhanced_image_navigation( $url ) {
	global $post;
	if ( wp_attachment_is_image( $post->ID ) )
		$url = $url . '#main';
	return $url;
}
add_filter( 'attachment_link', 'kauri_enhanced_image_navigation' );
/
/*******************************************/
// add description to menu items
/*******************************************/
class My_Walker extends Walker_Nav_Menu
{	
	function start_el(&$output, $item, $depth, $args) {
		//	
		global $wp_query;
		//
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
//
		$class_names = $value = '';
//
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
//
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = '';
//
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ! empty( $item->classes[0] )        ? ' class="'   . esc_attr( $item->classes[0]        ) .'"' : '';
//
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
//		
		if( $item->description ) { 
			$item_output .= '<span >'. $item->description . '</span>';
			}else{
			$item_output .= '<span style="margin:0;padding:0; height:0; width:0" ></span>';	
			};
		$item_output .= '</a>';
		$item_output .= $args->after;
//
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
/*******************************************/
// SHOW MENU AS "CLASSIC" DROPDOWN
/*******************************************/
class Walker_Nav_Menu_Dropdown extends Walker_Nav_Menu{
	var $to_depth = -1;
    function start_lvl(&$output, $depth){
      $output .= '</option>';
    }
    function end_lvl(&$output, $depth){
      $indent = str_repeat("\t", $depth); // don't output children closing tag
    }
    function start_el(&$output, $item, $depth, $args){
		$indent = ( $depth ) ? str_repeat( "&nbsp;", $depth * 4 ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		$value = ' value="'. $item->url .'"';
		$output .= '<option'.$id.$value.$class_names.'>';
		$item_output = $args->before;
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$output .= $indent.$item_output;
    }
    function end_el(&$output, $item, $depth){
		if(substr($output, -9) != '</option>')
      		$output .= "</option>"; // replace closing </li> with the option tag
    }
}
/*******************************************/
/***************************************************************************
  SHOW BREADCRUMBS (NOT ON STORE PAGES)
****************************************************************************/
function dimox_breadcrumbs() {
	$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter = '&raquo;'; // delimiter between crumbs
	$home = get_bloginfo('name'); // text for the 'Home' link
	$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$before = '<span class="current">'; // tag before the current crumb
	$after = '</span>'; // tag after the current crumb
//
	global $post;
	$homeLink = home_url();
//
	if (is_home() || is_front_page()) {
//
		if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
//
	} else {
		echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
//
		if ( is_category() ) {
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
			echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
//
		} elseif ( is_day() ) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('d') . $after;
//
		} elseif ( is_month() ) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('F') . $after;
	 
		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;
//
		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
				if ($showCurrent == 1) echo $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				if ($showCurrent == 1) echo $before . get_the_title() . $after;
			}
//
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
//
		} elseif ( is_attachment() ) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
			if ($showCurrent == 1) echo $before . get_the_title() . $after;
//
		} elseif ( is_page() && !$post->post_parent ) {
			if ($showCurrent == 1) echo $before . get_the_title() . $after;
//
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			if ($showCurrent == 1) echo $before . get_the_title() . $after;
//
		} elseif ( is_search() ) {
			echo $before . __('Search results for "','kauri') . get_search_query() . '"' . $after;
	 
		} elseif ( is_tag() ) {
			echo $before .  __('Posts tagged "','kauri') . single_tag_title('', false) . '"' . $after;
	 
		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo $before .  __('Articles posted by ','kauri') . $userdata->display_name . $after;
	 
		} elseif ( is_404() ) {
			echo $before . __('Error 404','kauri') . $after;
		}
		//
		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo __('Page','kauri') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
		echo '</div>';
	}
} // end dimox_breadcrumbs()
/*******************************
  CONTACT FORM
********************************/
function hexstr($hexstr) {
	$hexstr = str_replace(' ', '', $hexstr);
	$hexstr = str_replace('\x', '', $hexstr);
	$retstr = pack('H*', $hexstr);
	return $retstr;
}
function strhex($string) {
	$hexstr = unpack('H*', $string);
	return array_shift($hexstr);
}
/*-----------------------------------------------------------------------------------*/
// Options Framework
/*-----------------------------------------------------------------------------------*/
//
// Paths to admin functions
// if NOT CHILD THEME -use the paths and dir bellow:
if( !is_child_theme() ) {

	define('ADMIN_PATH', get_stylesheet_directory() . '/admin/');
	define('ADMIN_DIR', get_template_directory_uri() . '/admin/');
	define('LAYOUT_PATH', ADMIN_PATH . '/layouts/');
	
	function themename_enqueue_css() {
		wp_register_style('options', get_template_directory_uri() . '/options/options.css', 'style');
		wp_enqueue_style( 'options');
	}
	add_action('wp_print_styles', 'themename_enqueue_css');
}
//
// You can mess with these 2 if you wish.
//$themedata = get_theme_data(STYLESHEETPATH . '/style.css'); // - used in WP 3.3 and older
if( function_exists('get_theme_data') ) {
	$themedata = get_theme_data(STYLESHEETPATH . '/style.css');
	define('THEMENAME', $themedata['Name']);
}elseif (function_exists('wp_get_theme')) {
	$themedata = wp_get_theme();
	define('THEMENAME', $themedata);
}
//
define('OPTIONS', 'of_options'); // Name of the database row where your options are stored
//
// Build Options
require_once (ADMIN_PATH . 'admin-interface.php');		// Admin Interfaces 
require_once (ADMIN_PATH . 'theme-options.php'); 		// Options panel settings and custom settings
require_once (ADMIN_PATH . 'admin-functions.php'); 	// Theme actions based on options settings
require_once (ADMIN_PATH . 'medialibrary-uploader.php'); // Media Library Uploader
//
/* CHECK FOR HEADERS ALREADY SENT
if(headers_sent()) {
	echo "Header sent";
}
else{
	echo "Header  NOT sent";
}*/
?>