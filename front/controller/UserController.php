<?php

class UserController
{
    public function index()
    {
        require_once 'view/users.php';
    }

    public function add()
    {
        require_once 'view/adduser.php';
    }

    public function delete()
    {
    }
}
