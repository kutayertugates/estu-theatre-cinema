<?php

namespace App\Models;

use PDO;

class Agreements {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function all_with_period($period_id) {
        $stm = $this->db->prepare("SELECT * FROM agreements WHERE period_id=:period_id");
        $stm->bindValue(":period_id", $period_id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($period_id, $company_name, $percent) {
        $stm = $this->db->prepare("INSERT INTO agreements SET period_id=:period_id , company_name=:company_name , percent=:percent");
        $stm->bindValue(":period_id", $period_id);
        $stm->bindValue(":company_name", $company_name);
        $stm->bindValue(":percent", $percent);
        $stm->execute();
    }

    public function delete($agreement_id) {
        $stm = $this->db->prepare("DELETE FROM agreements WHERE id=:agreement_id");
        $stm->bindValue(":agreement_id", $agreement_id);
        $stm->execute();
    }
}