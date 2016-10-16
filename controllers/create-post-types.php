<?php
include(PLUGIN_DIR . 'models/event.php');
include(PLUGIN_DIR . 'models/presentation.php');
include(PLUGIN_DIR . 'models/sponsor.php');
include(PLUGIN_DIR . 'models/speaker.php');
include(PLUGIN_DIR . 'models/room.php');

function create_post_types(){
    event::convention_magic_event();
    presentation::convention_magic_presentation();
    sponsor::convention_magic_sponsor();
    speaker::convention_magic_speaker();
    room::convention_magic_room();
}