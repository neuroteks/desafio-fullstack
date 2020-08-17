<?php

require_once 'Connection.php';

class Users extends Connection
{
    public function all()
    {
        $sql = "SELECT U.id AS id, C.name AS cname, E.name AS ename, U.acesso FROM usuarios U JOIN clientes C ON (U.cliente_id = C.id)
        LEFT JOIN empresas E ON (U.empresa_id = E.id) ORDER BY C.name";

        if ($conn = $this->connect()) {
            return $conn->query($sql);
        }
    }

    public function add($client, $access, $company)
    {
        if ($company != '') {
            $sql = "INSERT INTO usuarios (cliente_id, empresa_id, acesso) VALUES ('$client', $company, '$access')";
        } else {
            $sql = "INSERT INTO usuarios (cliente_id, acesso) VALUES ('$client', '$access')";
        }

        if ($conn = $this->connect()) {
            if ($conn->query($sql)) {
                $message = ["success", "Usuário criado com sucesso."];
            } else {
                $message = ["error", "Erro ao cadastrar usuário."];
            }
        }
        die(json_encode(["message" => $message]));
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM usuarios WHERE id = '$id'";

        if ($conn = $this->connect()) {
            if ($conn->query($sql)) {
                return true;
            }
        }

        return false;
    }
}
