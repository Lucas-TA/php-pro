<?php

namespace app\controllers;

class Login
{
    public function index()
    {
        return [
            'view' => 'login.php',
            'data' => ['title'=>'Login']
        ];
    }
    public function store()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if (empty($email) || empty($password))
        {
            return setMessageAndRefirect('message', 'Please inform you e-mail and your password.', '/login');
        }
        $user = findBy('users', 'email', $email);

        if (empty($user))
        {
            return setMessageAndRefirect('message', 'User not found.', '/login');
        }
        if (!password_verify($password, $user->password))
        {
            return setMessageAndRefirect('message', 'Password is incorrect', '/login');
        }
        $_SESSION[LOGGED] = $user;
        return redirect('/');
    }
    public function destroy()
    {
        unset($_SESSION[LOGGED]);
        return redirect('/');
    }
}