<?php

namespace app\controllers;
class Home
{
    public function index($params): array
    {
        $users = fetchAllData('users');
        return [
            'view' => 'home.php',
            'data' => ['title'=>'Home','users' => $users]
        ];
    }
}