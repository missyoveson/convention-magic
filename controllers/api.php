<?php

class api
{
<?php
    function convention_magic_rest_route() {
        register_rest_route( 'convention-magic/', '/author/(?P<id>\d+)', array(
            'methods' => 'GET',
            'callback' => 'convention_magic_api_callback',
        ) );
    }
    function convention_magic_api_callback( WP_REST_Request $request ) {
        // You can access parameters via direct array access on the object:
        $param = $request['some_param'];

        // Or via the helper method:
        $param = $request->get_param( 'some_param' );

        // You can get the combined, merged set of parameters:
        $parameters = $request->get_params();

        // The individual sets of parameters are also available, if needed:
        $parameters = $request->get_url_params();
        $parameters = $request->get_query_params();
        $parameters = $request->get_body_params();
        $parameters = $request->get_json_params();
        $parameters = $request->get_default_params();

        // Uploads aren't merged in, but can be accessed separately:
        $parameters = $request->get_file_params();
    }
}