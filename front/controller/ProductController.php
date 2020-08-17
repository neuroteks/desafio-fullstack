<?php

class ProductController
{
    public function index()
    {
        $id = filter_input(INPUT_GET, 'id');

        $url = API_PATH . 'Product/list';

        $fields = [
            'id' => $id
        ];

        $result = json_decode($this->httpPost($url, $fields));

        require_once 'view/products.php';
    }

    public function view()
    {
        $url = API_PATH . 'Product/get';

        $id = filter_input(INPUT_GET, 'id');

        $fields = [
            'id' => $id
        ];

        $product = json_decode($this->httpPost($url, $fields));
        
        require_once 'view/product.php';
    }

    public function add()
    {
        require_once 'view/addproduct.php';
    }

    public function register()
    {
        $url = API_PATH . 'Product/register';

        $id = filter_input(INPUT_GET, 'id');

        $fields = [
            'name' => filter_input(INPUT_POST, 'name'),
            'description' => filter_input(INPUT_POST, 'description'),
            'price' => filter_input(INPUT_POST, 'price'),
            'amount' => filter_input(INPUT_POST, 'amount'),
            'id' => $id,
        ];

        $result = json_decode($this->httpPost($url, $fields));

        $_SESSION['message'] = $result->message;

        if ($_SESSION['message'][0] == 'success') {
            header('Location: ../products?id=' . $id);
        } else {
            header('Location: ../products/add?id=' . $id);
        }
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id');

        $url = API_PATH . 'Product/delete';

        $fields = [
            'id' => $id
        ];

        $result = json_decode($this->httpPost($url, $fields));

        $_SESSION['message'] = $result->message;

        header('Location: ../products?id=' . $id);
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
