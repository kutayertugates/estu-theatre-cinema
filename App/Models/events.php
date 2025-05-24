<?php

namespace App\Models;

use PDO;

class Events {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function get_event($event_id) {
        $stm = $this->db->prepare("SELECT * FROM events WHERE id=:id");
        $stm->bindValue(":id", $event_id);
        $stm->execute();
        return $stm->rowCount() > 0 ? $stm->fetch(PDO::FETCH_ASSOC) : false;
    }

    public function all($period_id) {
        $stm = $this->db->prepare("SELECT * FROM events WHERE period_id=:period_id");
        $stm->bindValue(":period_id", $period_id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    } 

    public function add($period_id, $title, $content_marked, $content_html) {
        $stm = $this->db->prepare("INSERT INTO events SET period_id=:period_id , title=:title , content_marked=:content_marked, content_html=:content_html");
        $stm->bindValue(":period_id", $period_id);
        $stm->bindValue(":title", $title);
        $stm->bindValue(":content_marked", $content_marked);
        $stm->bindValue(":content_html", $content_html);
        $stm->execute();
    }

    public function edit($status, $is_fixed, $required_membership, $title, $content_marked, $content_html, $event_id) {
        $stm = $this->db->prepare("UPDATE events SET status = :status, is_fixed = :is_fixed, required_membership = :required_membership, title = :title, content_marked = :content_marked, content_html = :content_html WHERE id = :event_id");
        $stm->bindValue(":status", $status);
        $stm->bindValue(":is_fixed", $is_fixed);
        $stm->bindValue(":required_membership", $required_membership);
        $stm->bindValue(":title", $title);
        $stm->bindValue(":content_marked", $content_marked);
        $stm->bindValue(":content_html", $content_html);
        $stm->bindValue(":event_id", $event_id);
        $stm->execute();
    }

    public function delete($event_id) {
        $stm = $this->db->prepare("DELETE FROM events WHERE id=:event_id");
        $stm->bindValue(":event_id", $event_id);
        $stm->execute();
    }

    public function event_applications($event_id) {
        $stm = $this->db->prepare("
            SELECT 
                ea.id,
                ea.status, 
                COALESCE(u.name, ea.name) AS name, 
                COALESCE(u.surname, ea.surname) AS surname, 
                COALESCE(u.number, ea.number) AS number, 
                COALESCE(u.school_number, ea.school_number) AS school_number, 
                ea.add_time
            FROM event_applications AS ea
            LEFT JOIN users AS u ON ea.user_id = u.id
            WHERE ea.event_id = :event_id ORDER BY ea.status DESC
        ");

        $stm->bindValue(":event_id", $event_id);
        $stm->execute();
        $results = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $results;

    }

    public function update_status_event_application($status, $event_app_id) {
        $stm = $this->db->prepare("UPDATE event_applications SET status=:status WHERE id=:event_app_id");
        $stm->bindValue(":status", $status);
        $stm->bindValue(":event_app_id", $event_app_id);
        $stm->execute();
    }
}