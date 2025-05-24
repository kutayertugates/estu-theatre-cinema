<?php

namespace App\Models;

use PDO;

class Users {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function login($email, $password) {
        $stm = $this->db->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
        $stm->bindValue(":email", $email);
        $stm->bindValue(":password", $password);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function get_user($user_id) {
        $stm = $this->db->prepare("SELECT * FROM users WHERE id=:user_id");
        $stm->bindValue(":user_id", $user_id);
        $stm->execute();
        return $stm->rowCount() > 0 ? $stm->fetch(PDO::FETCH_ASSOC) : false;
    }

    public function all($period_id) {
        $stm = $this->db->prepare("SELECT u.id, u.status, ut.name as unit_name, u.name, u.surname, u.email, u.number, u.grade, u.school_number, u.theatre_interest, u.cinema_interest, ed.faculty, ed.department, u.send_time FROM users as u LEFT JOIN units as ut ON u.unit_id = ut.id LEFT JOIN estu_department as ed ON u.estu_department_id = ed.id WHERE u.period_id=:period_id AND (status=:status1 OR status=:status2) ORDER BY status ASC");
        $stm->bindValue(":period_id", $period_id);
        $stm->bindValue(":status1", 1);
        $stm->bindValue(":status2", 2);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function edit($id, $unit_id, $name, $surname, $email, $number, $estu_department_id, $grade, $school_number, $theatre_interest, $cinema_interest) {
        $stm = $this->db->prepare("UPDATE users 
            SET 
                unit_id = :unit_id,
                name = :name,
                surname = :surname,
                email = :email,
                number = :number,
                estu_department_id = :estu_department_id,
                grade = :grade,
                school_number = :school_number,
                theatre_interest = :theatre_interest,
                cinema_interest = :cinema_interest
            WHERE id = :id");

        $stm->bindValue(":unit_id", $unit_id);
        $stm->bindValue(":name", $name);
        $stm->bindValue(":surname", $surname);
        $stm->bindValue(":email", $email);
        $stm->bindValue(":number", $number);
        $stm->bindValue(":estu_department_id", $estu_department_id);
        $stm->bindValue(":grade", $grade);
        $stm->bindValue(":school_number", $school_number);
        $stm->bindValue(":theatre_interest", $theatre_interest);
        $stm->bindValue(":cinema_interest", $cinema_interest);
        $stm->bindValue(":id", $id);

        return $stm->execute();
    }

    public function delete($user_id) {
        $stm = $this->db->prepare("DELETE FROM users WHERE id=:user_id ");
        $stm->bindValue(":user_id", $user_id);
        return $stm->execute();
    }

    public function pending($period_id) {
        $stm = $this->db->prepare("SELECT id,name,surname,email,number,receipt FROM users WHERE status=:status AND period_id=:period_id");
        $stm->bindValue("status", 0);
        $stm->bindValue("period_id", $period_id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }


    public function updateUserStatus($user_id, $statusCode) {
        $stm = $this->db->prepare("UPDATE users SET status=:status WHERE id=:id");
        $stm->bindValue(":status", $statusCode);
        $stm->bindValue(":id", $user_id);
        return $stm->execute();
    }
}