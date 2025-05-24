<?php

namespace App\Controllers;

use App\Core\Database;
use App\Models\Periods;
use App\Models\Roles;

class PeriodController {
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
        if (!$RoleModel->is_auth($_COOKIE["user_id"],"access_period")) {
            header("location: /");
        }

        $PeriodModel = new Periods($this->pdo);

        $periods = $PeriodModel->all();

        include __DIR__ . "/../Views/period.php";
    }

    public function add() {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }

        $RoleModel = new Roles($this->pdo);
        if (!$RoleModel->is_auth($_COOKIE["user_id"], "access_period")) {
            header("location: /");
        }

        $PeriodModel = new Periods($this->pdo);
        
        $start_year = $_POST["start_year"];
        $finish_year = $_POST["finish_year"];

        $PeriodModel->add($start_year, $finish_year);
        header("location: /period");
    }

    public function change($period_id) {
        setcookie("period_id", $_COOKIE["period_id"], time() - 86400, "/");
        setcookie("period_id", $period_id, time() + 86400, "/");
        header("location: /period");
    }
}