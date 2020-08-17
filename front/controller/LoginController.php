<?php

class LoginController
{
    public function index()
    {
        if(isset($_SESSION['client'])) {
            $url = API_PATH . 'Product/listAll';

            $products = json_decode($this->httpPost($url, []));

            require_once 'view/home.php';
        } else {
            require_once 'view/login.php';
        }
    }

    public function register()
    {
        if(isset($_SESSION['client'])) {
            header('Location: ' . APP_PATH);
        } else {
            require_once 'view/register.php';
        }
    }

    public function login()
    {
        $url = API_PATH . 'Login/login';

        $fields = [
            'email' => filter_input(INPUT_POST, 'email'),
            'password' => filter_input(INPUT_POST, 'password')
        ];

        $result = json_decode($this->httpPost($url, $fields));

        if($result->client) {
            $_SESSION['client'] = $result->client;
        }        
        $_SESSION['message'] = $result->message;

        header("Location: ..");
    }

    public function logout()
    {
        unset($_SESSION['client']);

        header("Location: ..");
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
