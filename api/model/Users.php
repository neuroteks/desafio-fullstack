<?php

require_once 'Connection.php';

class Users extends Connection
{
    protected $name;
    protected $email;
    protected $cpf;
    protected $password;

    public function get($id)
    {
    }

    public function add($name, $email, $cpf, $password)
    {
        $sql = "INSERT INTO usuarios (name, email, cpf, password) VALUES ('$name', '$email', '$cpf', '$password')";

        if ($conn = $this->connect()) {
            if ($conn->query($sql)) {
                $message = ["success", "Usuário criado com sucesso."];
            } else {
                $message = ["error", "Erro ao cadastrar usuário."];
            }
        }
        die(json_encode(["message" => $message]));
    }


    public function auth($email, $password)
    {
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";

        if ($conn = $this->connect()) {
            $user = $conn->query($sql);
            $user = $user->fetch_array();

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    return $user;
                }
            }
        }
        return false;
    }
}
