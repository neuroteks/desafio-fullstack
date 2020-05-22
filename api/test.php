<?php

require_once 'controller/UserController.php';

$test = new UserController();

$result = $test->list();


var_dump($result);
die();