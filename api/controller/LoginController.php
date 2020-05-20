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

        $user = $this->auth($email, $password);

        if ($user) {

            unset($user['password']);

            require_once 'model/SessionToken.php';
            $token = new SessionToken();
            $user['session_token'] = $token->create($user['id']);

            $success = ["success", "Bem vindo!"];
        } else {
            $success = ["error", "Usuário ou senha inválidos."];
        }

        die(json_encode(["user" => $user, "message" => $success]));
    }
}
