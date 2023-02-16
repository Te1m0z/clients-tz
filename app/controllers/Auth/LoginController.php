<?php


class LoginController extends Controller
{
    public function index ()
    {
        echo view( 'login' );
    }

    public function login ()
    {

        $login = request()->get( 'login' );
        $password = request()->get( 'password' );

        if ( empty( $login ) ) {
            response( array(
                'status' => false,
                'errors' => array(
                    'login' => 'Логин должен быть заполнен'
                )
            ) );
        }

        if ( empty( $password ) ) {
            response( array(
                'status' => false,
                'errors' => array(
                    'password' => 'Пароль должен быть заполнен'
                )
            ) );
        }

        $user = auth()->attempt( $login, $password );

        if ( $user ) {

            $_SESSION['user'] = $user;

            response( array(
                'status' => true,
            ) );
        }

        response( array(
            'status'  => false,
            'message' => 'Неправильный логин или пароль'
        ) );
    }
}


return 'LoginController';