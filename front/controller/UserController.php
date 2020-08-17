<?php

class UserController
{
    public function index()
    {
        $url = API_PATH . 'User/list';

        $result = json_decode($this->httpPost($url, []));

        require_once 'view/users.php';
    }

    public function add()
    {
        $url = API_PATH . 'Client/list';
        $clients = json_decode($this->httpPost($url, []));

        $url = API_PATH . 'Company/list';
        $companies = json_decode($this->httpPost($url, []));

        require_once 'view/adduser.php';
    }

    public function register()
    {
        $url = API_PATH . 'User/register';

        $fields = [
            'client' => filter_input(INPUT_POST, 'client'),
            'access' => filter_input(INPUT_POST, 'access'),
            'company' => filter_input(INPUT_POST, 'company')
        ];

        $result = json_decode($this->httpPost($url, $fields));

        $_SESSION['message'] = $result->message;

        if ($_SESSION['message'][0] == 'success') {
            header('Location: ../users');
        } else {
            header('Location: ../users/add');
        }
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id');

        $url = API_PATH . 'User/delete';

        $fields = [
            'id' => $id
        ];

        $result = json_decode($this->httpPost($url, $fields));

        $_SESSION['message'] = $result->message;

        header('Location: ../users');
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
