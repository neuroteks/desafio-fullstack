<?php

class PagesController
{
    public function index($param = null)
    {
        if (isset($_SESSION['user']) && $_SESSION['user'] != null) {
            if ($param) {
                require_once 'view/' . $param . '.php';
            } else {
                session_destroy();
                require_once '';
            }
        } else if($param == 'register') {
            require_once 'view/register.php';
        } else {
            require_once 'view/login.php';
        }
    }
}
