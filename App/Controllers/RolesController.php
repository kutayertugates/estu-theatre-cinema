<?php

namespace App\Controllers;

use App\Core\Database;
use App\Models\Periods;
use App\Models\Roles;
use App\Models\Users;

class RolesController {
    public $pdo;
    
    function __construct() {
        $this->pdo = Database::connect();
    }

    public function index() {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }

        $RoleModel = new Roles($this->pdo);
        if (!$RoleModel->is_auth($_COOKIE["user_id"],"access_roles")) {
            header("location: /");
        }

        $RoleModel = new Roles($this->pdo);
        $roles = $RoleModel->all($_COOKIE["period_id"]);
        
        include __DIR__ . "/../Views/roles.php";
    }

    public function Add() {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }

        $RoleModel = new Roles($this->pdo);
        if (!$RoleModel->is_auth($_COOKIE["user_id"],"add_role")) {
            header("location: /");
        }

        include __DIR__ . "/../Views/role-add.php";
    }

    public function Authorization() {
        $RoleModel = new Roles($this->pdo);
        if (
            !$RoleModel->is_auth($_COOKIE["user_id"],"add_role") &&
            !$RoleModel->is_auth($_COOKIE["user_id"],"access_members")
        ) {
            header("location: /");
        }

        $RoleModel = new Roles($this->pdo);
        $UserModel = new Users($this->pdo);

        $roles = $RoleModel->all($_COOKIE["period_id"]);
        $users = $UserModel->all($_COOKIE["period_id"]);

        include __DIR__ . "/../Views/role-authorize.php";
    }

    // No Views (POST)
    public function Add_Role() {
        $RoleModel = new Roles($this->pdo);
        if (!$RoleModel->is_auth($_COOKIE["user_id"],"add_role")) {
            header("location: /");
        }

        $RoleModel = new Roles($this->pdo);

        $role_name = $_POST["role_name"];
        $auths = $_POST;
        unset($auths["role_name"]);

        $RoleModel->add($role_name, $auths);

        header("location: /role/add");
    }

    public function Authorize() {
        $role_id = $_POST["role"];
        $user_id = $_POST["user"];

        $RoleModel = new Roles($this->pdo);
        $RoleModel->authorize($role_id,$user_id,$_COOKIE["user_id"]);
        
        header("location: /role/authorization");
    }
}