<?php

function tcustom_addbuttons() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;

	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "add_tcustom_tinymce_plugin");
		add_filter('mce_buttons', 'register_tcustom_button');
	}
}
function register_tcustom_button($buttons) {
	array_push($buttons, "|", "kauri_button");
	return $buttons;
}
function add_tcustom_tinymce_plugin($plugin_array) {
	$plugin_array['kauri_button'] = get_template_directory_uri() .'/tinymce_shortcode/editor_plugin.js';
	return $plugin_array;
}
// init process for button control
add_action('init', 'tcustom_addbuttons');
?>