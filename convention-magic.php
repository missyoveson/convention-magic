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
	if(!function_exists(_add_extra_api_taxonomy_argument)){
		die("Please install WP-API");
	}
}

add_action('init', 'convention_magic_activation');

function convention_magic_enqueue_scripts(){
	wp_enqueue_script('script', plugins_url('assets/js/speaker-image.js'), array());
}
add_action('wp_enqueue_scripts', 'convention_magic_enqueue_scripts');

