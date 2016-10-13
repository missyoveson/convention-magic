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

function convention_magic_activation(){
	// check for plugin using plugin name
	if ( is_plugin_active( 'json-rest-api/plugin.php' ) ) {
	  //plugin is activated
	} else {
		wp_die( 'Please install the WP-API plugin');
	}
}

add_action('admin-init', 'convention_magic_activation');

function convention_magic_enqueue_scripts(){
	wp_enqueue_script('script', plugins_url('assets/js/speaker-image.js'), array());
}
add_action('wp_enqueue_scripts', 'convention_magic_enqueue_scripts');

