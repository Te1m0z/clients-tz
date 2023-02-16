<?php

if ( !function_exists( 'config' ) ) {
    function config ( $name = 'Название не передано' )
    {
        $path = APP_ROOT . '/config/' . $name . '.php';
        if ( file_exists( $path ) ) {
            return require_once $path;
        }
        return 'Файл конфигурации не найден : ' . $path;
    }
}