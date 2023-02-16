<?php


class View
{
    public static function render ( $name, $vars = array() )
    {
        $path = APP_ROOT . '/views/' . $name . '.php';
        if ( file_exists( $path ) ) {
            extract( $vars );
            ob_start();
            include $path;
            return ob_get_clean();
        }
    }

    const not_found_view = 'not-found';

    public static function notFound () // move to router
    {
        http_response_code( 404 );

        echo view( 'not-found' );

        exit;
    }

    public static function forbidden ()
    {
        http_response_code( 403 );

        echo view( 'forbidden' );

        exit;
    }
}