<?php

/*
Plugin Name: Convention Magic
Plugin URI: http://convention-magic.com
Description: A plugin designed to help convention organizers plan and communicate information about a convention.
Version: 1.0
Author: Miss Geek Bunny
Author URI: http://missgeekbunny.com
License: A "Slug" license name e.g. GPL2
*/
defined( 'ABSPATH' ) or die( 'No script kitties please!' );

define('PLUGIN_DIR', dirname(__FILE__). '/');
include(PLUGIN_DIR . 'controllers/create-post-types.php');


function convention_magic_api(){
	// check for plugin using plugin name
	if ( is_plugin_active( 'rest-api/plugin.php' ) ) {
	} else {
		wp_die( 'Please install the WP-API plugin');
	}

}
function convention_magic_activate(){
    convention_magic_api();
}
register_activation_hook(__FILE__, 'convention_magic_activate');
add_action('init', 'create_post_types');


function convention_magic_enqueue_scripts(){
	wp_enqueue_script('script', plugins_url('assets/js/speaker-image.js'), array());
}
add_action('wp_enqueue_scripts', 'convention_magic_enqueue_scripts');

