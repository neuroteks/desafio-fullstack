<?php

require_once 'model/Companies.php';

class CompanyController extends Companies
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

    public function list()
    {
        if(getenv('REQUEST_METHOD') != 'POST') {
            return false;
        }

        $companies = $this->all();
        $result = [];
        while($company = $companies->fetch_assoc()) {
            array_push($result, $company);
        }

        die(json_encode($result));
    }
}