<?php

return [
    'POST' => [
        '/login' => 'Login@store',
        '/user/store' => 'User@store',
    ],
    'GET' => [
        '/' => 'Home@index',
        '/user/register' => 'User@register',
        '/user/[0-9]+'=> 'User@show',
        '/login' => 'Login@index',
        '/logout' => 'Login@destroy',
    ],
];
