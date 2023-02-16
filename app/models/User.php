<?php

class User extends Model
{
    public static $table = 'users';

    public static $received = array(
        'id',
        'login'
    );

    public function __construct ()
    {
        parent::__construct();
    }
}