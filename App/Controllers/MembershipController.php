<?php

namespace App\Controllers;

use App\Models\General;
use App\Core\Database;
use App\Models\Periods;
use App\Models\Users;
use App\Models\Roles;
use App\Models\Departments;
USE aPP\Models\Units;

class MembershipController {

    public $pdo;

    function __construct() {
        $this->pdo = Database::connect();
    }

    public function All() {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }

        $RoleModel = new Roles($this->pdo);
        if (!$RoleModel->is_auth($_COOKIE["user_id"],"access_members")) {
            header("location: /");
        }

        $UserModel = new Users($this->pdo);
        $PeriodModel = new Periods($this->pdo);
        $GeneralModel = new General();
        
        $users = $UserModel->all($_COOKIE["period_id"]);

        include __DIR__ . "/../Views/membership-all.php";
    }

    public function Edit($user_id) {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }

        $UserModel = new Users($this->pdo);
        $user = $UserModel->get_user($user_id);
        $UnitModel = new Units($this->pdo);
        $units = $UnitModel->all($_COOKIE["period_id"]);

        $DepartmentModel = new Departments($this->pdo);
        $departments = $DepartmentModel->allMerge();

        include __DIR__ . "/../Views/membership-edit.php";
    }

    public function EditUser() {
        $UserModel = new Users($this->pdo);
        $UserModel->edit(
            $_POST["user_id"],
            $_POST["unit_id"],
            $_POST["name"],
            $_POST["surname"],
            $_POST["email"],
            $_POST["number"],
            $_POST["estu_department_id"],
            $_POST["grade"],
            $_POST["school_number"],
            $_POST["theatre_interest"],
            $_POST["cinema_interest"]
        );

        header("location: /membership/all");
    }

    public function Delete($user_id) {
        $UserModel = new Users($this->pdo);
        $UserModel->delete($user_id);
        header("location: /membership/all");
    }

    public function Pending() {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }

        $RoleModel = new Roles($this->pdo);
        if (!$RoleModel->is_auth($_COOKIE["user_id"],"accept_members")) {
            header("location: /");
        }

        $UserModel = new Users($this->pdo);
        $PeriodModel = new Periods($this->pdo);
        $GeneralModel = new General();

        $pendingUsers = $UserModel->pending($PeriodModel->current());
        

        include __DIR__ . "/../Views/membership-pending.php";
    }

    # No Views (GET)
    public function UnAccept($id) {
        $RoleModel = new Roles($this->pdo);
        if (!$RoleModel->is_auth($_COOKIE["user_id"],"accept_members")) {
            header("location: /");
        }
        
        $this->pdo = Database::connect();
        $UserModel = new Users($this->pdo);
        $UserModel->updateUserStatus($id, 2);

        header("location: /membership/pending-applications");
    }

    public function Accept($id) {
        $RoleModel = new Roles($this->pdo);
        if (!$RoleModel->is_auth($_COOKIE["user_id"],"accept_members")) {
            header("location: /");
        }

        $this->pdo = Database::connect();
        $UserModel = new Users($this->pdo);
        $UserModel->updateUserStatus($id, 1);
        header("location: /membership/pending-applications");
    }
}