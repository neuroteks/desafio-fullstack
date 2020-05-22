<?php

require_once 'Connection.php';

class Companies extends Connection
{
    protected $name;
    protected $cnpj;

    public function all()
    {
        $sql = "SELECT id, name, cnpj FROM empresas ORDER BY name";

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
}