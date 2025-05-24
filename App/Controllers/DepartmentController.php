<?php

namespace App\Controllers;

use App\Core\Database;
use App\Models\Periods;
use App\Models\Departments;

class DepartmentController {
    public $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function Main() {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }

        $DepartmentModel = new Departments($this->pdo);
        $departments = $DepartmentModel->all();

        include __DIR__ . "/../Views/departments-all-add.php";
    }

    public function Edit($department_id) {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }

        $DepartmentModel = new Departments($this->pdo);
        $department = $DepartmentModel->get_with_id($department_id);

        include __DIR__ . "/../Views/departments-edit.php";
    }

    public function EditDepartment() {
        $DepartmentModel = new Departments($this->pdo);
        $DepartmentModel->edit(
            $_POST["id"],
            $_POST["faculty"],
            $_POST["department"]
        );

        header("location: /departments/edit/". $_POST["id"]);
    }

    public function Delete($department_id) {
        $DepartmentModel = new Departments($this->pdo);

        $DepartmentModel->delete($department_id);

        header("location: /departments". $_POST["id"]);
    }
}