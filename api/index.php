<?php

$path = explode('/', filter_input(INPUT_GET, 'path'));

$class = $path[0] . 'Controller';
$method = $path[1];

require_once 'controller/' . $class . '.php';

$object = new $class();
$object->$method();