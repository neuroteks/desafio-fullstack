<?php

require_once 'model/Orders.php';

class OrderController extends Orders
{
    public function register()
    {
        if(getenv('REQUEST_METHOD') != 'POST') {
            return false;
        }

        $amount = filter_input(INPUT_POST, 'amount');
        $price = filter_input(INPUT_POST, 'price');
        $id = filter_input(INPUT_POST, 'id');
        $user_id = filter_input(INPUT_POST, 'user_id');

        $this->add($amount, $price, $id, $user_id);
    }

    public function list()
    {
        if(getenv('REQUEST_METHOD') != 'POST') {
            return false;
        }

        $id = filter_input(INPUT_POST, 'id');

        $orders = $this->all($id);
        $result = [];
        while($order = $orders->fetch_assoc()) {
            array_push($result, $order);
        }

        die(json_encode($result));
    }
}