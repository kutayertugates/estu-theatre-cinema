<?php

namespace App\Models;

use PDO;

class Periods {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function all() {
        $stm = $this->db->prepare("SELECT * FROM periods");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function current() {
        $stm = $this->db->prepare("SELECT * FROM `periods` ORDER BY id DESC");
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC)["id"];
    }

    public function add($start_year, $finish_year) {
        $stm = $this->db->prepare("INSERT INTO periods SET start_year=:sy , finish_year=:fy");
        $stm->bindValue(":sy", $start_year);
        $stm->bindValue("fy", $finish_year);
        $stm->execute();
    }
}