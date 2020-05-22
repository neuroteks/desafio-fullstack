<?php

class ClientController
{
    public function index()
    {
        $url = API_PATH . 'Client/list';

        $result = json_decode($this->httpPost($url, []));

        require_once 'view/clients.php';
    }

    public function register()
    {
        $url = API_PATH . 'Client/register';

        $fields = [
            'name' => filter_input(INPUT_POST, 'name'),
            'email' => filter_input(INPUT_POST, 'email'),
            'cpf' => filter_input(INPUT_POST, 'cpf'),
            'password' => filter_input(INPUT_POST, 'password'),
            'confirm_password' => filter_input(INPUT_POST, 'confirm_password')
        ];

        $result = json_decode($this->httpPost($url, $fields));

        $_SESSION['message'] = $result->message;

        if ($_SESSION['message'][0] == 'success') {
            header('Location: ..');
        } else {
            header('Location: ../register');
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
