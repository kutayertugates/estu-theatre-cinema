<?php

namespace App\Models;

use PDO;


class Units {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function all($period_id) {
        $stm = $this->db->prepare("SELECT * FROM units WHERE period_id=:period_id");
        $stm->bindValue(":period_id", $period_id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function all_with_att($period_id) {
        $stm = $this->db->prepare("SELECT ut.id, ut.name, ut.description, ut.attendant as attendant_id, ut.vice_attendant as vice_attendant_id , ua.name as attendant_name, uva.name as vice_attendant_name, ut.add_time FROM units as ut LEFT JOIN users as ua ON ut.attendant = ua.id LEFT JOIN users as uva ON ut.vice_attendant = uva.id WHERE ut.period_id=:period_id");
        $stm->bindValue(":period_id", $period_id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_unit($unit_id) {
        $stm = $this->db->prepare("SELECT * FROM units WHERE id=:unit_id");
        $stm->bindValue(":unit_id", $unit_id);
        $stm->execute();
        return $stm->rowCount() > 0 ? $stm->fetch(PDO::FETCH_ASSOC) : false;
    }

    public function edit($period_id, $name, $description, $attendant, $vice_attendant, $id) {
        $sql = "UPDATE units SET 
                    period_id = :period_id,
                    name = :name,
                    description = :description,
                    attendant = :attendant,
                    vice_attendant = :vice_attendant
                WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':period_id', $period_id);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':attendant', $attendant);
        $stmt->bindValue(':vice_attendant', $vice_attendant);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function delete($unit_id) {
        $sql = "DELETE FROM units WHERE id = :unit_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':unit_id', $unit_id, PDO::PARAM_INT);
        $stmt->execute();
    }
}