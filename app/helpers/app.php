<?php

if ( !function_exists( 'router' ) ) {
    function router ()
    {
        return Router::getInstance();
    }
}

if ( !function_exists( 'session' ) ) {
    function session ()
    {
        return Session::getInstance();
    }
}

if ( !function_exists( 'request' ) ) {
    function request ()
    {
        return Router::getInstance()->request;
    }
}

if ( !function_exists( 'auth' ) ) {
    function auth ()
    {
        return Auth::getInstance();
    }
}

