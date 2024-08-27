<?php
    namespace app\controllers;

    class User
    {
        public function show($params)
        {
            if (!isset($params))
            {
                return redirect('/');
            }
            $user = findBy('users', 'id', $params['user'], 'id, email');
            var_dump($user);
            die();
        }
    }