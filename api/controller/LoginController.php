<?php

require_once 'model/Clients.php';

class LoginController extends Clients
{
    public function login()
    {
        if (getenv('REQUEST_METHOD') != 'POST') {
            return false;
        }

        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        $client = $this->auth($email, $password);

        if ($client) {
            require_once 'model/SessionToken.php';
            $token = new SessionToken();
            $client['session_token'] = $token->create($client['id']);

            $success = ["success", "Bem vindo!"];
        } else {
            $success = ["error", "Email ou senha inválidos."];
        }

        die(json_encode(["client" => $client, "message" => $success]));
    }
}
