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
    public function club(){
        global $GeneralViews;
        require_once BASE_PATH . '/app/Views/club.php';
    }
    public function management(){
        global $GeneralViews;
        require_once BASE_PATH . '/app/Views/management.php';
    }
    public function events(){
        global $GeneralViews;
        require_once BASE_PATH . '/app/Views/events.php';
    }
    public function movie(){
        global $GeneralViews;
        require_once BASE_PATH . '/app/Views/movie.php';
    }
    public function online(){
        global $GeneralViews;
        require_once BASE_PATH . '/app/Views/online.php';
    }



}
