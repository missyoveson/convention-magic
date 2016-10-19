<?php
include(PLUGIN_DIR . 'models/event.php');
include(PLUGIN_DIR . 'models/presentation.php');
include(PLUGIN_DIR . 'models/sponsor.php');
include(PLUGIN_DIR . 'models/speaker.php');
include(PLUGIN_DIR . 'models/room.php');

function convention_magic_create_post_types(){
    event::convention_magic_event_hooks();
    sponsor::convention_magic_sponsor_hooks();
}