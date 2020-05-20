<?php

class Connection
{
    protected $db = 'desafio';
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';

    public function connect()
    {
        $connect = new Connection();
        if ($conn = new mysqli($connect->host, $connect->user, $connect->password, $connect->db)) {
            return $conn;
        }
    }

    public function migration()
    {
        $connect = new Connection();
        $link = mysqli_connect($connect->host, $connect->user, $connect->password);


        $db_query = "CREATE DATABASE IF NOT EXISTS `$connect->db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";

        $users_query = "CREATE TABLE IF NOT EXISTS `usuarios` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `email` varchar(255) NOT NULL,
            `cpf` varchar(11) NOT NULL,
            `password` varchar(255) NOT NULL,
            `created` datetime NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $session_token_query = "CREATE TABLE IF NOT EXISTS `session_tokens` (
          `usuario_id` int(11) NOT NULL,
          `session_token` varchar(255) NOT NULL,
          `created` datetime NOT NULL DEFAULT current_timestamp(),
          PRIMARY KEY (`usuario_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        mysqli_query($link, $db_query);
        mysqli_query($link, "USE `$connect->db`");
        mysqli_query($link, $users_query);
        mysqli_query($link, $session_token_query);
    }
}
