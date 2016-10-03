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

include('/controllers/event.php');
include('/controllers/presentation.php');

function convention_magic_activation(){
	if(!function_exists(_add_extra_api_taxonomy_argument)){
		die("Please install WP-API");
	}
}
add_action('init', 'convention_magic_activation');
add_action('init', 'convention_magic_event' );
add_action('init', 'convention_magic_presentation');
