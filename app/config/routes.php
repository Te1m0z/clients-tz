<?php

return array(
    ''      => array(
        'GET' => array(
            'controller' => 'WelcomeController',
            'action'     => 'index'
        )
    ),
    'login' => array(
        'GET'  => array(
            'controller' => 'Auth/LoginController',
            'action'     => 'index',
            'is_private' => false
        ),
        'POST' => array(
            'controller' => 'Auth/LoginController',
            'action'     => 'login',
            'is_private' => false
        ),
    ),
    'logout' => array(
        'POST' => array(
            'controller' => 'Auth/LogoutController',
            'action'     => 'logout',
            'is_private' => true
        ),
    ),
    'admin' => array(
        'GET' => array(
            'controller' => 'Dashboard/DashboardController',
            'action'     => 'index',
            'is_private' => true
        )
    ),
    'edit' => array(
        'POST' => array(
            'controller' => 'Dashboard/DashboardRecordController',
            'action'     => 'edit',
            'is_private' => true
        ),
    ),
    'delete' => array(
        'POST' => array(
            'controller' => 'Dashboard/DashboardRecordController',
            'action'     => 'delete',
            'is_private' => true
        ),
    ),
    'add' => array(
        'POST' => array(
            'controller' => 'Dashboard/DashboardRecordController',
            'action'     => 'add',
            'is_private' => true
        ),
    ),
);