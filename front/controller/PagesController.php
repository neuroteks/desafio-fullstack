<?php

class PagesController
{
    public function index($param = null)
    {
        if (isset($_SESSION['client']) && $_SESSION['client'] != null) {
            if ($param) {
                require_once 'view/' . $param . '.php';
            } else {
                require_once 'view/home.php';
            }
        } else if($param == 'register') {
            require_once 'view/register.php';
        } else {
            require_once 'view/login.php';
        }
    }
}