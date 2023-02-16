<?php

final class App
{
    use Singleton;

    public function init ()
    {
        $router  = Router::getInstance();
        $request = Request::getInstance();

        $router->run( $request );
    }
}