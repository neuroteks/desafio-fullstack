<?php

require_once 'model/Users.php';

class LoginController extends Users
{
    public function login()
    {
        if (getenv('REQUEST_METHOD') != 'POST') {
            return false;
        }

        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        if ($user = $this->auth($email, $password)) {
            unset($user['password']);

            require_once 'model/SessionToken.php';
            $token = new SessionToken();
            $user['session_token'] = $token->create($user['id']);

            $_SESSION['user'] = $user;

            echo '<pre>';
            print_r($_SESSION);
            echo '</pre>';
        }
    }
}
