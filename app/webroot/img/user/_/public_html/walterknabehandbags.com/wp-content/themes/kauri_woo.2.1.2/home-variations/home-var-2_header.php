<?php
/*
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * TO SWITCH ON THE DEMO OPTIONS:
 * PHP PARTS COMMENTED WITH  ======= COOKIE DEMO OPTIONS ======= UNCOMMENT
 * WP_ENQUEUE_STYLE WITH $data['alt_stylesheet'] COMMENT
 */
?><!DOCTYPE html>

<?php 
// SETTING GLOBAL OPTIONS DATA
global $data; 

// FOR DEMO OPTIONS - IF NO COOKIE IS SET
if ( !isset($_COOKIE['theme_skin'] ) ) {
		$_COOKIE['theme_skin'] = 'default';
}
// FOR HOMEPAGE VARIATIONS:

if ( is_page('home-variation-2')) {
	$_COOKIE['theme_skin'] = 'dark_blue';
}

?>

<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'kauri' ), max( $paged, $page ) );
	?></title>
	
<link rel="profile" href="http://gmpg.org/xfn/11" />

<?php get_template_part('fonts/fonts' ); ?>


<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" 


<?php wp_enqueue_style('shortcodes', get_template_directory_uri().'/shortcodes.css'  ); ?>
<?php wp_enqueue_style('formalize', get_template_directory_uri().'/formalize.css'  ); ?>
<?php wp_enqueue_style('jquery.fancybox-1.3.4', get_template_directory_uri().'/js/fancybox/jquery.fancybox-1.3.4.css'  ); ?>
<?php //wp_enqueue_style('skins',  get_template_directory_uri(). '/admin/layouts/' . $data['alt_stylesheet']  ); ?>

<?php 
// ======= COOKIE DEMO OPTIONS =======
wp_enqueue_style('skins',  get_template_directory_uri(). '/admin/layouts/'. $_COOKIE['theme_skin'].'.css' ); 
?>


<link rel="shortcut icon" href="<?php echo $data['custom_favicon'] ?>" />


<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<!--[if lt IE 9]>
<?php wp_enqueue_script('html5', get_template_directory_uri().'/js/html5.js' ,'jquery' ); ?>
<![endif]-->


<?php wp_enqueue_script('jquery'); ?>
<?php wp_enqueue_script('jquery.carouFredSel-5.5.0', get_template_directory_uri().'/js/jquery.carouFredSel-5.5.0.js' ,'jquery' ); ?>
<?php wp_enqueue_script('jquery.fancybox-1.3.4', get_template_directory_uri().'/js/fancybox/jquery.fancybox-1.3.4.js' ,'jquery' ); ?>
<?php wp_enqueue_script('jquery.formalize', get_template_directory_uri().'/js/jquery.formalize.js' ,'jquery' ); ?>
<?php wp_enqueue_script('jquery.form', get_template_directory_uri().'/js/jquery.form.js' ,'jquery' ); ?>
<?php wp_enqueue_script('custom', get_template_directory_uri().'/js/custom.js' ,'jquery' ); ?>


<?php 
// ======= COOKIE DEMO OPTIONS =======
wp_enqueue_script('jquery.cookie', get_template_directory_uri().'/js/jquery.cookie.js' ,'jquery' ); 
wp_enqueue_script('kauri_demo_cookies', get_template_directory_uri().'/js/kauri_demo_cookies.js' ,'jquery' ); 
?>


<?php wp_head(); ?>


<?php 
if( is_home() ) :
	get_template_part('options/carousel_options' );
endif;
?>


<?php if ( $data['custom_css'] ) :?>
	<style>
	<?php echo $data['custom_css']; ?>
	</style>
<?php endif;?>

<?php 
$analytics = $data['google_analytics'];
if ( $analytics ) : 
echo $analytics;
endif;
?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed">
	

<?php 
// ======= COOKIE DEMO OPTIONS =======
get_template_part('demo','options');
?>

	
	<header id="branding" role="banner">
		
		<!-- <hgroup> -->
			
			
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> | <?php bloginfo( 'description' );?>" rel="home">
			

			
			<h1 id="site-title" >
				
				<?php $logo = $data['media_upload_2']; ?>
				<?php $logo_height = $data['logo_height'];?>
				
				<?php if ( $logo ) : ?>
					
					<img src="<?php echo $logo ; ?>" title="<?php bloginfo( 'name' ); ?> | <?php bloginfo( 'description' );?>" <?php if ($logo_height) { echo 'height='. intval ( $logo_height ); };  ?> />
				
				<?php else : ?>
					
					<span><?php bloginfo( 'name' ); ?></span>
					
				<?php endif;?>
				
				<?php if ( $data['show_desc'] ): ?>
					
					<br/>
					<span id="site-description"><?php bloginfo( 'description' ); ?></span>
						
				<?php endif; ?>
				
			</h1>
			
			</a>
			
		
		<!-- </hgroup>-->
		

		<div class="abs_holder">
			<div id="header_search">

			<?php get_search_form(); ?>
			
				<?php //wp_nav_menu( array( 'menu' => 'Top menu', 'menu_class' => 'top', 'container' => false)); ?>
				
			</div>
		</div>

		<?php 
		// is_plugin_active must be called only from admin section, so we must do include_once:
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 

		$show_cart_icon = $data['show_cart_icon'];
		if ( $show_cart_icon && is_plugin_active('wp-e-commerce/wp-shopping-cart.php') ){
			$shopping_cart_icon = '<span class="cart-icon"></span>';
		} 
		?>

		
		<div id="store-buttons">
			
			<?php
			$prod_cats_icon = $data['prod_cats_icon'];
			if ( $prod_cats_icon && is_plugin_active('wp-e-commerce/wp-shopping-cart.php') ) :
				$prod_cats_icon = '<span class="cats-icon"></span>';
			?>
			<div id="header-categories">
				<ul>
					<li>
					<?php echo $prod_cats_icon; ?>
					<?php echo '<h2>'. __('Products categories','kauri') .'</h2>';?>
					<?php 
					get_template_part('product','categories'); 
					?>
					</li>
				</ul>
			</div><!-- #header-categories -->
			
			<?php endif; ?>
			
			
			<?php if ( is_active_sidebar( 'top-shopping-cart' ) ) : ?>
			
				<div id="cart_widget">	
				<ul>
					<li>	
					<?php echo $shopping_cart_icon; ?>
					<?php dynamic_sidebar( 'top-shopping-cart' ); ?>
					</li>
				</ul>
				</div>
				
			<?php endif; ?>

		</div><!-- #store-buttons -->
		
		
	</header><!-- #branding -->


	
	<div id="main">