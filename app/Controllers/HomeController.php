<?php

class HomeController
{
    public function index() {
        global $GeneralViews;
        require_once BASE_PATH . '/app/Views/home.php';
    }

    public function login(){
        global $GeneralViews;
        require_once BASE_PATH . '/app/Views/login.php';
    }
    public function register(){
        global $GeneralViews;
        require_once BASE_PATH . '/app/Views/register.php';
    }


}
