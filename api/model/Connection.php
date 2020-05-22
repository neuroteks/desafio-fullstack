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
        $conn = new mysqli($connect->host, $connect->user, $connect->password, $connect->db);
        if ($conn->connect_errno) {
            $this->migration();
            sleep(2);
            return $this->connect();
        }
        return $conn;
    }

    public function migration()
    {
        $connect = new Connection();
        $link = mysqli_connect($connect->host, $connect->user, $connect->password);


        $db_query = "CREATE DATABASE IF NOT EXISTS `$connect->db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";

        $clients_query = "CREATE TABLE IF NOT EXISTS `clientes` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `email` varchar(255) NOT NULL,
            `cpf` varchar(15) NOT NULL,
            `password` varchar(255) NOT NULL,
            `last_login` datetime DEFAULT NULL,
            `created` datetime NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        $companies_query = "CREATE TABLE IF NOT EXISTS `empresas` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `cnpj` varchar(21) NOT NULL,
            `created` datetime NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        $orders_query = "CREATE TABLE IF NOT EXISTS `pedidos` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `cliente_id` int(11) NOT NULL,
            `produto_id` int(11) NOT NULL,
            `amount` int(11) NOT NULL,
            `price` int(11) NOT NULL,
            `created` datetime NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY (`id`),
            KEY `cliente_id` (`cliente_id`),
            KEY `produto_id` (`produto_id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        $products_query = "CREATE TABLE IF NOT EXISTS `produtos` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `empresa_id` int(11) NOT NULL,
            `name` varchar(255) NOT NULL,
            `description` varchar(255) NOT NULL,
            `price` varchar(255) NOT NULL,
            `amount` int(11) NOT NULL,
            `modified` datetime NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY (`id`),
            KEY `empresa_id` (`empresa_id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        $users_query = "CREATE TABLE IF NOT EXISTS `usuarios` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `cliente_id` int(11) NOT NULL,
            `empresa_id` int(11) DEFAULT NULL,
            `acesso` int(11) NOT NULL,
            `created` datetime NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY (`id`),
            KEY `cliente_id` (`cliente_id`),
            KEY `empresa_id` (`empresa_id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        $altertable_orders = "ALTER TABLE `pedidos`
        ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
        ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);";

        $altertable_products = "ALTER TABLE `produtos`
        ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`);";

        $altertable_users = "ALTER TABLE `usuarios`
        ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
        ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`);";

        $add_admin = 'INSERT INTO `clientes` (`name`, `email`, `cpf`, `password`) VALUES ("Administrador", "admin", "111.111.111-11", "$2y$10$rRPO9AJKToSR4Tt5d1IS/Od9U1g7uKTXwENuYXBtscuUTThhFWP3W");';

        $add_user = "INSERT INTO `usuarios` (`cliente_id`, `acesso`) VALUES (1, 3);";

        mysqli_query($link, $db_query);
        mysqli_query($link, "USE `$connect->db`");
        mysqli_query($link, $clients_query);
        mysqli_query($link, $companies_query);
        mysqli_query($link, $products_query);
        mysqli_query($link, $orders_query);
        mysqli_query($link, $users_query);
        mysqli_query($link, $altertable_orders);
        mysqli_query($link, $altertable_products);
        mysqli_query($link, $altertable_users);
        mysqli_query($link, $add_admin);
        mysqli_query($link, $add_user);
    }
}
