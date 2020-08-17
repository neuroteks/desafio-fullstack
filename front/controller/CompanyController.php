<?php

class CompanyController
{
    public function index()
    {
        $url = API_PATH . 'Company/list';

        $result = json_decode($this->httpPost($url, []));

        require_once 'view/companies.php';
    }

    public function add()
    {
        require_once 'view/addcompany.php';
    }

    public function register()
    {
        $url = API_PATH . 'Company/register';

        $fields = [
            'name' => filter_input(INPUT_POST, 'name'),
            'cnpj' => filter_input(INPUT_POST, 'cnpj')
        ];

        $result = json_decode($this->httpPost($url, $fields));

        $_SESSION['message'] = $result->message;

        if ($_SESSION['message'][0] == 'success') {
            header('Location: ../companies');
        } else {
            header('Location: ../companies/add');
        }
    }

    public function httpPost($url, $data)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
