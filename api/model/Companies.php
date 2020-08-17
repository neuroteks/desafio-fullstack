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

    public function add($name, $cnpj)
    {
        $sql = "INSERT INTO empresas (name, cnpj) VALUES ('$name', '$cnpj')";

        if ($conn = $this->connect()) {
            if ($conn->query($sql)) {
                $message = ["success", "Empresa criada com sucesso."];
            } else {
                $message = ["error", "Erro ao cadastrar empresa."];
            }
        }
        die(json_encode(["message" => $message]));
    }
}