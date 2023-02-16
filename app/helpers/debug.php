<?php

if ( !function_exists( 'dump' ) ) {
    function dump ( $value = 'Значение не передано', $is_exit = false )
    {
        echo '<pre>';
        print_r( $value );
        echo '</pre>';
        if ( $is_exit ) exit;
    }
}

