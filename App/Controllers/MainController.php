<?php

namespace App\Controllers;

use App\Core\Database;
use App\Models\Periods;
use App\Models\Users;
use App\Models\Roles;

class MainController {

    public $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function Dashboard() {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }

        include __DIR__ . "/../Views/main.php";
    }

    public function login() {
        include __DIR__ . "/../Views/login.php";
    }


    # No Views
    public function login_form() {
        $UserModel = new Users($this->pdo);
        $RoleModel = new Roles($this->pdo);
        
        $email = $_POST["email"];
        $password = hash("md5", hash("sha256", $_POST["password"]));
        
        $login = $UserModel->login($email, $password);
        if (empty($login)) {
            header("location: /login");
        }
        
        setcookie("user_id", $login["id"], time() + 86400, "/");
        
        header("location: /");
    }


}