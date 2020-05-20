<?php

require_once 'Connection.php';

class SessionToken extends Connection
{
    protected $usuario_id;
    protected $session_token;

    public function create($usuario_id)
    {
        $key = $this->generateKey();
        $hash = password_hash($key, PASSWORD_DEFAULT);


        $sql = "SELECT * FROM session_tokens WHERE usuario_id = '$usuario_id'";

        if ($conn = $this->connect()) {
            $token = $conn->query($sql);
            $token = $token->fetch_array();

            if ($token) {
                $sql = "UPDATE session_tokens SET session_token = '$hash', created = current_timestamp() WHERE usuario_id = '$usuario_id'";
            } else {
                $sql = "INSERT INTO session_tokens (usuario_id, session_token) VALUES ('$usuario_id', '$hash')";
            }
        }

        if ($conn = $this->connect()) {
            if ($conn->query($sql)) {
                return $key;
            }
        }
        return false;
    }

    function generateKey()
    {
        $string = "ABCDEFGHIJKLMNOPQRSTUVYXWZabcdefghijklmnopqrstuvyxwz01234567890123456789";
        return substr(str_shuffle($string), 0, 10);
    }
}
