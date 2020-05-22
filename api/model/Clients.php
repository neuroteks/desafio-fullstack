<?php

require_once 'Connection.php';

class Clients extends Connection
{
    protected $name;
    protected $email;
    protected $cpf;
    protected $password;

    public function all()
    {
        $sql = "SELECT id, name, email, cpf, last_login FROM clientes ORDER BY name";

        if ($conn = $this->connect()) {
            return $conn->query($sql);
        }
    }

    public function add($name, $email, $cpf, $password)
    {
        $sql = "INSERT INTO clientes (name, email, cpf, password) VALUES ('$name', '$email', '$cpf', '$password')";

        if ($conn = $this->connect()) {
            if ($conn->query($sql)) {
                $message = ["success", "Conta criada com sucesso."];
            } else {
                $message = ["error", "Erro ao cadastrar conta."];
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
}
