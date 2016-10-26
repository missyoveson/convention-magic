<?php

class api
{
    function convention_magic_rest_route() {
        register_rest_route( 'convention-magic/v1', '/convention-magic', array(
            'methods' => 'GET',
            'callback' => 'convention_magic_api_callback',
        ) );
    }
    function convention_magic_api_callback( WP_REST_Request $request ) {
        //TODO::Do something with the api
    }
}