<?php

class Session
{
    use Singleton;

    public $session;

    public function __construct ()
    {
        $this->session = $_SESSION;
    }

    public function get ( $field )
    {
        return isset( $this->session[$field] ) ? $this->session[$field] : null;
    }

    public function set ( $field, $value )
    {
        $this->session[$field] = $value;
    }

    public function all ()
    {
        return $this->session;
    }

    public function regenerate ()
    {
        return session_regenerate_id( true );
    }

    public function destroy ()
    {
        session_destroy();
    }

}