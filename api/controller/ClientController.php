<?php

require_once 'model/Clients.php';

class ClientController extends Clients
{
    public function register()
    {
        if(getenv('REQUEST_METHOD') != 'POST') {
            return false;
        }

        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $cpf = filter_input(INPUT_POST, 'cpf');
        $password = password_hash(filter_input(INPUT_POST, 'password'), PASSWORD_DEFAULT);

        $this->add($name, $email, $cpf, $password);
    }
}