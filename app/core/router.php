<?php

final class Router
{
    use Singleton;

    //public static $notFoundView = 'not-found';

    private $routes  = array();
    private $current = array();

    public $request;

    public function __construct ()
    {
        $routes = config( 'routes' );

        foreach ( $routes as $path => $options ) {
            $this->add( $path, $options );
        }
    }

    public function add ( $path, $options )
    {
        $route = '#^' . $path . '$#';
        $this->routes[$route] = $options;
    }

    private function match ()
    {
        $uri = trim( $this->request->uri, '/' );

        foreach ( $this->routes as $route => $params ) {
            if ( preg_match( $route, $uri ) ) {
                if ( isset( $params[$this->request->method] ) ) {
                    $this->current = $params[$this->request->method];
                    return true;
                }
            }
        }

        return false;
    }

    public function run ( $request ) // path, session, method, user
    {
        /*
         * Установка запроса в роутер, для последующих обращений из вне
         */
        $this->request = $request;

        /* если запрос URI совпадает каким-либо роутом */
        if ( $this->match() ) {

            /* файл-контроллер роута */
            $file = APP_ROOT . '/controllers/' . $this->current['controller'] . '.php';

            if ( !file_exists( $file ) ) {
                $this->notFound();
                return false;
            }

            $class = include $file;

            if ( !class_exists( $class ) ) {
                $this->notFound();
                return false;
            }

            $controller = new $class;

            if ( !method_exists( $controller, $this->current['action'] ) ) {
                $this->notFound();
                return false;
            }

            /* Если есть поле проверки на доступ, то произвести проверку... */
            if ( isset( $this->current['is_private'] ) ) {

                $this->checkAccess()
                    ? call_user_func( array( $controller, $this->current['action'] ) )
                    : (( $this->request->user() ) ? redirect( '/admin' ) : redirect( '/login' ));

                return true;

            } else {
                call_user_func( array( $controller, $this->current['action'] ) );
                return true;
            }
        }

        $this->notFound();
        return false;
    }

    private function checkAccess ()
    {
        if ( $this->current['is_private'] === true && $this->request->user() ) {
            return true;
        }

        if ( $this->current['is_private'] === false && !$this->request->user() ) {
            return true;
        }

        return false;
    }

    public static function redirect ( $url )
    {
        header( "Location: $url" );
        exit;
    }

    public function notFound ()
    {
        echo view( 'not-found' );
        exit;
    }

    public function forbidden ()
    {
        echo view( 'forbidden' );
        exit;
    }
}
