<?php

namespace App\Models;

use PDO;

class Departments {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function all()  {
        $stm = $this->db->prepare("SELECT * FROM estu_department");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function allMerge() {
        $stm = $this->db->prepare('SELECT id, CONCAT(faculty, " ",department) as full_department FROM estu_department ORDER BY full_department');
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_with_id($department_id) {
        $stm = $this->db->prepare("SELECT * FROM estu_department WHERE id=:department_id");
        $stm->bindValue(":department_id", $department_id);
        $stm->execute();
        return $stm->rowCount() > 0 ? $stm->fetch(PDO::FETCH_ASSOC) : false;
    }
    
    public function edit($id, $faculty, $department) {
        $sql = "UPDATE estu_department SET 
                    faculty = :faculty, 
                    department = :department 
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':faculty', $faculty);
        $stmt->bindValue(':department', $department);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

    }

    public function delete($department_id) {
        $sql = "DELETE FROM estu_department WHERE id = :department_id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':department_id', $department_id, PDO::PARAM_INT);
        $stmt->execute();
    }
}