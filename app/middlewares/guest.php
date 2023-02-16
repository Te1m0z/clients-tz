<?php

class GuestMiddleware extends Middleware
{
    public function handle ()
    {
        $is_login = Session::isLoggedIn();

        if ( ! $is_login ) {
            return true;
        }

        return false;
    }
}

return 'GuestMiddleware';
