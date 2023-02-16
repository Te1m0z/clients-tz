<?php


class LogoutController extends Controller
{
    public function logout ()
    {
        session()->destroy();

        response( array(
            'status' => true
        ) );
    }
}


return 'LogoutController';