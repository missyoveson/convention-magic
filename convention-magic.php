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

/*Prevent direct access*/
defined( 'ABSPATH' ) or die( 'No script kitties please!' );

/*Define plugin path*/
define('PLUGIN_DIR', dirname(__FILE__). '/');
/*Include class code*/
require_once(PLUGIN_DIR . 'assets/inc/class-tgm-plugin-activation.php');
include(PLUGIN_DIR . 'models/event.php');
include(PLUGIN_DIR . 'models/presentation.php');
include(PLUGIN_DIR . 'models/room.php');
include(PLUGIN_DIR . 'models/speaker.php');
include(PLUGIN_DIR . 'assets/inc/plugins.php');

/*Activation Code*/
function convention_magic_activate(){
}

/*Action and activation hooks*/
register_activation_hook(__FILE__, 'convention_magic_activate');
add_action('init', 'event::convention_magic_create_event');
add_action('init', 'presentation::convention_magic_presentation');
add_action('wp_enqueue_scripts', 'convention_magic_scripts');
add_action('admin_enqueue_scripts', 'convention_magic_admin_scripts');
add_action('rest-api-init', 'api::convention_magic_rest_route');
add_action('init', 'room::convention_magic_room');
add_action('init', 'speaker::convention_magic_speaker');
add_action( 'tgmpa_register', 'convention_magic_register_required_plugins' );

/*Enqueue Scripts and Styles*/
function convention_magic_admin_scripts($hook){
    /*if ( 'edit.php' != $hook ) {
        return;
    }*/
    wp_enqueue_script('time-day-adjustment', PLUGIN_DIR . 'assets/js/time-day-adjustment.js', 'jquery');
}
function convention_magic_scripts(){
    wp_enqueue_style('style', PLUGIN_DIR . 'assets/css/style.css');
}