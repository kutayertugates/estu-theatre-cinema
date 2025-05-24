<?php

namespace App\Controllers;

use App\Core\Database;
use App\Models\Events;
use App\Models\Periods;
use App\Models\Roles;

class EventsController {

    public $pdo;

    public function __construct() {
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

        $RoleModel = new Roles($this->pdo);
        if (!$RoleModel->is_auth($_COOKIE["user_id"],"access_events")) {
            header("location: /");
        }

        $EventModel = new Events($this->pdo);
        $events = $EventModel->all($_COOKIE["period_id"]);

        include __DIR__ . "/../Views/event-all.php";
    }

    public function Create() {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }

        $RoleModel = new Roles($this->pdo);
        if (!$RoleModel->is_auth($_COOKIE["user_id"],"add_event")) {
            header("location: /");
        }

        include __DIR__ . "/../Views/event-create.php";
    }

    # No Views (POST)
    public function Add() {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        # Yetki Kontrolü

        $period_id = $_COOKIE["period_id"];
        $title = $_POST["title"];
        $content_marked = $_POST["content_marked"];
        $content_html = $_POST["content_html"];

        $EventModel = new Events($this->pdo);
        $EventModel->add($period_id, $title, $content_marked, $content_html);

        header("location: /event/create");
    }

    public function Edit($event_id) {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }

        # Yetki Kontrolü

        $EventModel = new Events($this->pdo);
        $event = $EventModel->get_event($event_id);

        include __DIR__ ."/../Views/event-edit.php";
    }

    public function EditPost() {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        # Yetki Kontrolü

        $EventModel = new Events($this->pdo);
        $EventModel->edit(
            $_POST["status"],
            $_POST["is_fixed"],
            $_POST["required_membership"],
            $_POST["title"],
            $_POST["content_marked"],
            $_POST["content_html"],
            $_POST["event_id"]
        );

        header("location: /event/all");
    }

    public function Event_Applications($event_id) {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }

        # Yetki Kontrolü

        $EventModel = new Events($this->pdo);
        $applications = $EventModel->event_applications($event_id);


        include __DIR__ ."/../Views/event-applications.php";
    }

    public function AcceptApplication($event_id, $event_app_id) {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        # Yetki Kontrolü

        $EventModel = new Events($this->pdo);
        $EventModel->update_status_event_application(1, $event_app_id);
        header("location: /event/application/". $event_id);
    }

    public function UnAcceptApplication($event_id, $event_app_id) {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        # Yetki Kontrolü

        $EventModel = new Events($this->pdo);
        $EventModel->update_status_event_application(0, $event_app_id);
        header("location: /event/application/".$event_id);
    }


    # No Views (GET)
    public function Delete($event_id) {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        # Yetki Kontrolü

        $EventModel = new Events($this->pdo);
        $EventModel->delete($event_id);
        header("location: /event/all");
    }

}