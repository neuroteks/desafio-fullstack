<?php

class LoginController
{
    public function index()
    {
        if(isset($_SESSION['user']) && $_SESSION['user'] != null)
        {
            session_destroy();
            require_once '';
        } else {
            require_once 'view/login.php';
        }
    }

    public function login()
    {
        $url = PATH . 'api/login/login';

        $fields = [
            'email' => filter_input(INPUT_POST, 'email'),
            'password' => filter_input(INPUT_POST, 'password')
        ];

        $result = json_decode($this->httpPost($url, $fields));
        
        $_SESSION['user'] = $result->user;
        $_SESSION['message'] = $result->message;
        
        if($_SESSION['user']) {
            header("Location: home");
        }
        header("Location: ../login");
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
