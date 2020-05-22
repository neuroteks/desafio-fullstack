<?php

require_once 'Connection.php';

class Orders extends Connection
{
    public function add($amount, $price, $id, $user_id)
    {
        $sql = "INSERT INTO pedidos (cliente_id, produto_id, amount, price) VALUES ('$user_id', '$id', '$amount', '$price')";

        if ($conn = $this->connect()) {
            if ($conn->query($sql)) {
                $message = ["success", "Pedido feito com sucesso."];
            } else {
                $message = ["error", "Erro ao fazer pedido."];
            }
        }
        die(json_encode(["message" => $message]));
    }

    public function all($id)
    {
        $sql = "SELECT P.name AS produto, E.name AS empresa, PE.amount, PE.price, PE.created FROM pedidos PE JOIN produtos P ON (PE.produto_id = P.id)
        JOIN empresas E ON (E.id = P.empresa_id) WHERE PE.cliente_id = '$id' ORDER BY P.name";

        if ($conn = $this->connect()) {
            return $conn->query($sql);
        }
    }
}
