<?php

namespace App\Models;

use PDO;

/*
    Yetkilendirme isimleri roles tablosundaki sütunların "auth_" kısmı kaldırılarak isimlendirilir.
*/

class Roles {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function all($period_id) {
        $stm = $this->db->prepare("SELECT * FROM roles WHERE period_id=:period_id");
        $stm->bindValue(":period_id", $period_id);
        $stm->execute();
        $roles = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $roles ? $roles : false;
    }

    public function get_user_auth($user_id) {
        $stm = $this->db->prepare("SELECT MAX(r.auth_admin) as admin, MAX(r.auth_access_members) as access_members, MAX(r.auth_accept_members) as accept_members, MAX(r.auth_access_roles) as access_roles, MAX(r.auth_add_role) as add_role, MAX(r.auth_add_role_to_member) as add_role_to_member, MAX(r.auth_edit_website) as edit_website, MAX(r.auth_access_events) as access_events, MAX(r.auth_add_event) as add_event, MAX(r.auth_access_period) as access_period FROM user_roles as ur LEFT JOIN roles as r ON ur.role_id = r.id WHERE ur.user_id=:user_id");
        $stm->bindValue(":user_id", $user_id);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function is_auth($user_id, $auth_name) {
        $user_auth = $this->get_user_auth($user_id);
        if ($user_auth[$auth_name] == 1 || $user_auth["admin"] == 1) {
            return true;
        }
        else {
            return false;
        }
    }

    public function add($role_name, $auths) {
        $sql = "INSERT roles SET name=?, ";
        $exec = [$role_name];
        
        foreach ($auths as $key => $value) {
            $value = $value == "1" ? 1 : 0;
            $sql .= "$key=? , ";
            array_push($exec, $value);
        }
        $sql = mb_substr($sql, 0, -3);
        
        $stm = $this->db->prepare($sql);
        $stm->execute($exec);
    }

    public function authorize($role_id, $user_id, $authorizer_id) {
        $stm = $this->db->prepare("INSERT INTO user_roles SET user_id=:user_id , role_id=:role_id , authorizer_id=:authorizer_id");
        $stm->bindValue(":user_id", $user_id);
        $stm->bindValue(":role_id", $role_id);
        $stm->bindValue(":authorizer_id", $authorizer_id);
        $stm->execute();
    }
}