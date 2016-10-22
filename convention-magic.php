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
include(PLUGIN_DIR . 'models/event.php');
include(PLUGIN_DIR . 'models/presentation.php');
include(PLUGIN_DIR . 'models/room.php');
include(PLUGIN_DIR . 'models/sponsor.php');
include(PLUGIN_DIR . 'models/speaker.php');



function convention_magic_api(){
	if ( is_plugin_active( 'rest-api/plugin.php' ) ) {

	} else {
		wp_die( 'Please install the WP-API plugin');
	}

}
function convention_magic_activate(){
    convention_magic_api();
}
register_activation_hook(__FILE__, 'convention_magic_activate');
add_action('init', 'event::convention_magic_create_event');
add_action('init', 'presentation::convention_magic_presentation');
add_action('init', 'sponsor::convention_magic_sponsor');
add_action('wp_enqueue_scripts', 'sponsor::sponsor_scripts');
add_action('rest-api-init', 'api::convention_magic_rest_route');
//room::convention_magic_room();
//speaker::convention_magic_speaker();


