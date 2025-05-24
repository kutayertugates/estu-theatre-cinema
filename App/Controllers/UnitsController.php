<?php

namespace App\Controllers;

use App\Core\Database;
use App\Models\Periods;
use App\Models\Units;
use App\Models\Users;

class UnitsController {
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

        $UnitModel = new Units($this->pdo);
        $units = $UnitModel->all_with_att($_COOKIE["period_id"]);

        include __DIR__ . "/../Views/units-all.php";
    }

    public function Edit($unit_id) {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }

        $UnitModel = new Units($this->pdo);
        $UserModel = new Users($this->pdo);

        $unit = $UnitModel->get_unit($unit_id);
        $users = $UserModel->all($_COOKIE["period_id"]);

        if ($unit === false) {
            header("location: /units/all");
        }

        include __DIR__ . "/../Views/units-edit.php";
    }

    public function EditUnits() {
        $UnitModel = new Units($this->pdo);

        $UnitModel->edit(
            $_COOKIE["period_id"],
            $_POST["name"],
            $_POST["description"],
            $_POST["attendant"],
            $_POST["vice_attendant"],
            $_POST["id"]
        );

        header("location: /units/edit/". $_POST["id"]);
    }

    public function Delete($unit_id) {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }
        
        $UnitModel = new Units($this->pdo);
        $UnitModel->delete($unit_id);

        header("location: /units/all");
    }
}