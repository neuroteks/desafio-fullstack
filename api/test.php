<?php

require_once 'controller/LoginController.php';

$test = new LoginController();

$result = $test->login();


var_dump($result);
die();