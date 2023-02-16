<?php

if ( !function_exists( 'abort' ) ) {
    function abort ()
    {
        View::notFound();
        exit;
    }
}

if ( !function_exists( 'response' ) ) {
    function response ( $data = array() )
    {
        echo json_encode( $data );
        exit;
    }
}

if ( !function_exists( 'redirect' ) ) {
    function redirect ( $url )
    {
        header( 'Location: ' . $url );
        exit;
    }
}