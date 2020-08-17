<?php

require_once 'model/Products.php';

class ProductController extends Products
{
    public function get()
    {
        if(getenv('REQUEST_METHOD') != 'POST') {
            return false;
        }

        $id = filter_input(INPUT_POST, 'id');

        $product = $this->getProduct($id);

        die(json_encode($product));
    }

    public function register()
    {
        if(getenv('REQUEST_METHOD') != 'POST') {
            return false;
        }

        $name = filter_input(INPUT_POST, 'name');
        $description = filter_input(INPUT_POST, 'description');
        $price = filter_input(INPUT_POST, 'price');
        $amount = filter_input(INPUT_POST, 'amount');
        $id = filter_input(INPUT_POST, 'id');

        $this->add($name, $description, $price, $amount, $id);
    }

    public function list()
    {
        if(getenv('REQUEST_METHOD') != 'POST') {
            return false;
        }

        $id = filter_input(INPUT_POST, 'id');

        $products = $this->all($id);
        $result = [];
        while($product = $products->fetch_assoc()) {
            array_push($result, $product);
        }

        die(json_encode($result));
    }
    
    public function listAll()
    {
        if(getenv('REQUEST_METHOD') != 'POST') {
            return false;
        }

        $products = $this->allProducts();
        $result = [];
        while($product = $products->fetch_assoc()) {
            array_push($result, $product);
        }

        die(json_encode($result));
    }

    public function delete()
    {
        if(getenv('REQUEST_METHOD') != 'POST') {
            return false;
        }

        $id = filter_input(INPUT_POST, 'id');

        if($this->deleteProduct($id)) {
            $message = ["success", "Produto deletado com sucesso."];
        } else {
            $message = ["error", "Não foi possível deletar o produto."];
        }

        die(json_encode(["message" => $message]));
    }
}