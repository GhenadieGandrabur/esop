<?php

namespace Esop\Controllers;

class Login
{
    private $authentication;

    public function __construct(\Main\Authentication $authentication)
    {
        $this->authentication = $authentication;
    }

    public function loginForm()
    {
        $pic = '/img/login.jpg';
        return ['template' => 'login.html.php', 'title' => 'Log In', 'pic'=>$pic];
    }

    public function processLogin()
    {
        if ($this->authentication->login($_POST['email'], $_POST['password'])) {
            header('location: /login/success');
        } else {
            return [
                'template' => 'login.html.php',
                'title' => 'Log In',
                'variables' => [
                    'error' => 'Invalid username/password.'
                ]
            ];
        }
    }

    public function success()
    {   
         $pic = '/img/wellcome.jpg';
        return ['template' => 'loginsuccess.html.php', 'title' => 'Login Successful','pic'=>$pic];
    }

    public function error()
    {
        return ['template' => 'login.html.php', 'title' => 'You are not logged in'];
    }
    public function logout()
    {
        session_destroy();
        $pic = '/img/logout.jpg';
        return [
            'template' => 'logout.html.php',
            'title' => 'You have been logged out',
            'pic'=>$pic
        ];
    }
}
