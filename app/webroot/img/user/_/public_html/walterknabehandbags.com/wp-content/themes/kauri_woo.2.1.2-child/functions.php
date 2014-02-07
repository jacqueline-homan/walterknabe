<?php 
/**
 * Kauri theme functions and definitions for child theme
 * @package WordPress
 * @subpackage kauri
 * @since kauri 0.1
*/
define('ADMIN_PATH', STYLESHEETPATH . '../../kauri_woo.2.1.2/admin/');
define('ADMIN_DIR', get_template_directory_uri() . '../../kauri_woo.2.1.2/admin/');
define('LAYOUT_PATH', ADMIN_PATH . '/layouts/');

function child_enqueue_css() {

	wp_deregister_style('options');
	wp_dequeue_style('options');
	
	wp_register_style('options_child', get_stylesheet_directory_uri() . '/options/options.css', 'style');
	wp_enqueue_style( 'options_child');
	
}
add_action('wp_print_styles', 'child_enqueue_css');
?>