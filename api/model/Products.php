<?php

require_once 'Connection.php';

class Products extends Connection
{
    public function all($id)
    {
        $sql = "SELECT * FROM produtos WHERE empresa_id = '$id' ORDER BY name";

        if ($conn = $this->connect()) {
            return $conn->query($sql);
        }
    }


    public function getProduct($id)
    {
        $sql = "SELECT P.id, P.name AS produto, P.description, P.price, P.amount, E.name AS empresa FROM produtos P JOIN empresas E ON (P.empresa_id = E.id) WHERE P.id = '$id'";

        if ($conn = $this->connect()) {
            $result = $conn->query($sql);
            return $result->fetch_array();
        }
    }

    public function allProducts()
    {
        $sql = "SELECT P.id, P.name AS produto, P.description, P.price, P.amount, E.name AS empresa FROM produtos P JOIN empresas E ON (P.empresa_id = E.id) ORDER BY P.name";

        if ($conn = $this->connect()) {
            return $conn->query($sql);
        }
    }

    public function add($name, $description, $price, $amount, $id)
    {
        $sql = "INSERT INTO produtos (empresa_id, name, description, price, amount) VALUES ('$id', '$name', '$description', '$price', '$amount')";

        if ($conn = $this->connect()) {
            if ($conn->query($sql)) {
                $message = ["success", "Produto criado com sucesso."];
            } else {
                $message = ["error", "Erro ao cadastrar produto."];
            }
        }
        die(json_encode(["message" => $message]));
    }


    public function auth($email, $password)
    {
        $sql = "SELECT * FROM clientes WHERE email = '$email'";

        if ($conn = $this->connect()) {
            $client = $conn->query($sql);
            $client = $client->fetch_array();

            if ($client) {
                if (password_verify($password, $client['password'])) {
                    $sql = "UPDATE clientes SET last_login = current_timestamp() WHERE id = '$client[0]'";
                    $conn->query($sql);

                    return $client;
                }
            }
        }
        return false;
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM produtos WHERE id = '$id'";

        if ($conn = $this->connect()) {
            if ($conn->query($sql)) {
                return true;
            }
        }

        return false;
    }
}
