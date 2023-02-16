<?php

if ( !function_exists( 'view' ) ) {
    function view ( $name, $vars = array() )
    {
        return View::render( $name, $vars );
    }
}