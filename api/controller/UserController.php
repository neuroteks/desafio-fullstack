<?php

require_once 'model/Users.php';

class UserController extends Users
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