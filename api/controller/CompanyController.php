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
        $cnpj = filter_input(INPUT_POST, 'cnpj');

        $this->add($name, $cnpj);
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