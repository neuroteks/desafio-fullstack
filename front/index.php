<?php

// API HTTP SERVER PATH //
$url = "http://$_SERVER[HTTP_HOST]/desafio-fullstack/api/";
////////////////////////////////
// ROUTES //
$routes = [
    '' => ['controller' => 'LoginController', 'class' => 'index', 'validation' => 0],
    'register' => ['controller' => 'LoginController', 'class' => 'register', 'validation' => 0],
    'login/login' => ['controller' => 'LoginController', 'class' => 'login', 'validation' => 0],
    'client/register' => ['controller' => 'ClientController', 'class' => 'register', 'validation' => 0],
    'login/logout' => ['controller' => 'LoginController', 'class' => 'logout', 'validation' => 1],
    'companies' => ['controller' => 'CompanyController', 'class' => 'index', 'validation' => 3],
    'companies/add' => ['controller' => 'CompanyController', 'class' => 'add', 'validation' => 3],
    'company/register' => ['controller' => 'CompanyController', 'class' => 'register', 'validation' => 3],
    'clients' => ['controller' => 'ClientController', 'class' => 'index', 'validation' => 3],
    'users' => ['controller' => 'UserController', 'class' => 'index', 'validation' => 3],
    'users/add' => ['controller' => 'UserController', 'class' => 'add', 'validation' => 3],
    'user/register' => ['controller' => 'UserController', 'class' => 'register', 'validation' => 3],
    'user/delete' => ['controller' => 'UserController', 'class' => 'delete', 'validation' => 3],
    'orders' => ['controller' => 'OrderController', 'class' => 'index', 'validation' => 1],
    'product' => ['controller' => 'ProductController', 'class' => 'view', 'validation' => 1],
    'products' => ['controller' => 'ProductController', 'class' => 'index', 'validation' => 3],
    'products/delete' => ['controller' => 'ProductController', 'class' => 'delete', 'validation' => 3],
    'products/add' => ['controller' => 'ProductController', 'class' => 'add', 'validation' => 3],
    'product/register' => ['controller' => 'ProductController', 'class' => 'register', 'validation' => 3],
    'product/buy' => ['controller' => 'OrderController', 'class' => 'buy', 'validation' => 1],
];
////////////////////////////////

session_start();
define('API_PATH', $url);
define('APP_PATH', explode("index.php", $_SERVER['PHP_SELF'])[0]);

$path = filter_input(INPUT_GET, 'path');

if (array_key_exists($path, $routes)) {
    if ($routes[$path]['validation'] != 0) {
        if(!isset($_SESSION['client'])) {
            $_SESSION['message'] = ['error', 'Acesso negado.'];
            return header('Location: ' . APP_PATH);
        }
        if(!isset($_SESSION['client']->acesso) && $routes[$path]['validation'] > 1) {
            $_SESSION['message'] = ['error', 'Acesso negado.'];
            return header('Location: ' . APP_PATH);
        }
        if(isset($_SESSION['client']->acesso) && $_SESSION['client']->acesso < $routes[$path]['validation']) {
            $_SESSION['message'] = ['error', 'Acesso negado.'];
            return header('Location: ' . APP_PATH);
        }
    }
    require_once 'controller/' . $routes[$path]['controller'] . '.php';
    $obj = new $routes[$path]['controller']();
    $class = $routes[$path]['class'];
    $param = '';
    if (isset($routes[$path]['param'])) {
        $param = $routes[$path]['param'];
    }
    $obj->$class($param);
} else {
    require_once 'view/404.php';
}
