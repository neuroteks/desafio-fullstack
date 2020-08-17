<?php

require_once 'model/Users.php';

class UserController extends Users
{
    public function register()
    {
        if(getenv('REQUEST_METHOD') != 'POST') {
            return false;
        }

        $client = filter_input(INPUT_POST, 'client');
        $access = filter_input(INPUT_POST, 'access');
        $company = filter_input(INPUT_POST, 'company');

        $this->add($client, $access, $company);
    }

    public function list()
    {
        if(getenv('REQUEST_METHOD') != 'POST') {
            return false;
        }

        $users = $this->all();
        $result = [];
        while($user = $users->fetch_assoc()) {
            array_push($result, $user);
        }

        die(json_encode($result));
    }

    public function delete()
    {
        if(getenv('REQUEST_METHOD') != 'POST') {
            return false;
        }

        $id = filter_input(INPUT_POST, 'id');

        if($this->deleteUser($id)) {
            $message = ["success", "Usuário deletado com sucesso."];
        } else {
            $message = ["error", "Não foi possível deletar o usuário."];
        }

        die(json_encode(["message" => $message]));
    }
}