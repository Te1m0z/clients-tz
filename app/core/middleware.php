<?php

abstract class Middleware
{
    public static function start ( $middlewares )
    {
        $middlewaresSucceed = array();

        foreach ( $middlewares as $middleware ) {
            $path = APP_ROOT . '/middlewares/' . $middleware . '.php';
            if ( file_exists( $path ) ) {
                $middlewareClassName = require $path;
                $middleware = new $middlewareClassName;
                $result = $middleware->handle();
                if ( $result ) {
                    $middlewaresSucceed[] = $middleware;
                }
            }
        }

        /* Прошли ли все промеж. функции проверку на доступ */
        return sizeof( $middlewares ) === sizeof( $middlewaresSucceed );
    }
}