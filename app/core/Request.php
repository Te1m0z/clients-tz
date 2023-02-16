<?php

class Request
{
    use Singleton;

    public $uri;
    public $session;
    public $method;
    public $user;

    private $data;

    public function __construct ()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->session = Session::getInstance();
        $this->user = $this->user();
        $this->data = array_merge( $_GET, $_POST );
    }

    public function user ()
    {
        if ( $user_data = $this->session->get( 'user' ) ) {
            $user_id = $user_data['id'];
        }

        if ( isset( $user_id ) ) {
            $user = new User;
            return $user->where( 'id', $user_id )->get();
        }

        return null;
    }

    public function get ( $field )
    {
        return isset( $this->data[$field] ) ? $this->data[$field] : null;
    }
}

return 'Request';