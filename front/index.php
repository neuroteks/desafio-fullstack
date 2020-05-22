<?php
// API HTTP SERVER PATH //
$url = "http://$_SERVER[HTTP_HOST]/desafio-fullstack/api/";
////////////////////////////////

define('API_PATH', $url);

session_start();

$path = explode('/', filter_input(INPUT_GET, 'path'));

$class = $path[0] . 'Controller';

if (isset($path[1])) {
    $method = $path[1];
    require_once 'controller/' . $class . '.php';

    $object = new $class();
    $object->$method();
} else {
    require_once 'controller/PagesController.php';
    $object = new PagesController();

    if ($path[0] != '') {
        $object->index($path[0]);
    } else {
        $object->index();
    }
}
