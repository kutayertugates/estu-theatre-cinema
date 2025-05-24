<?php

namespace App\Controllers;

use App\Core\Database;
use App\Models\Periods;
use App\Models\Roles;
use App\Models\Agreements;

class AgreementsController {
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

        $AgreementsModel = new Agreements($this->pdo);
        $agreements = $AgreementsModel->all_with_period($_COOKIE["period_id"]);
        include __DIR__ . "/../Views/agreements-all-add.php";
    }

    public function Add() {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }

        $period_id = $_COOKIE["period_id"];
        $company_name = $_POST["company_name"];
        $percent = $_POST["percent"];

        $AgreementsModel = new Agreements($this->pdo);
        $AgreementsModel->add($period_id, $company_name, $percent);
        header("location: /agreements");
    }

    public function Delete($agreement_id) {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }

        $AgreementsModel = new Agreements($this->pdo);
        $AgreementsModel->delete($agreement_id);
        
        header("location: /agreements");
    }
}