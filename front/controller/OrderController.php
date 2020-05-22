<?php

class OrderController
{
    public function index()
    {
        $id = $_SESSION['client']->id;

        $url = API_PATH . 'Order/list';

        $fields = [
            'id' => $id
        ];

        $result = json_decode($this->httpPost($url, $fields));

        require_once 'view/orders.php';
    }

    public function buy()
    {
        $url = API_PATH . 'Order/register';

        $id = filter_input(INPUT_POST, 'id');

        $fields = [
            'amount' => filter_input(INPUT_POST, 'amount'),
            'price' => filter_input(INPUT_POST, 'price'),
            'id' => $id,
            'user_id' => $_SESSION['client']->id
        ];

        $result = json_decode($this->httpPost($url, $fields));
        
        $_SESSION['message'] = $result->message;

        if ($_SESSION['message'][0] == 'success') {
            header('Location: ../orders');
        } else {
            header('Location: ../product?id=' . $id);
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
