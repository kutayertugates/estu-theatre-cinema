<?php

namespace App\Controllers;

use App\Core\Database;
use App\Models\Periods;
use App\Models\Gallery;
USE App\Models\General;

class GalleryController {
    public $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function All(){
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }

        $GalleryModel = new Gallery($this->pdo);
        $GeneralModel = new General();
        $images = $GalleryModel->all();

        include __DIR__ . "/../Views/gallery-all.php";
    }

    public function GetImage($image_name) {
        $GalleryModel = new Gallery($this->pdo);
        $image = $GalleryModel->get_file_with_name($image_name);
        if ($image == false) {
            header("location: /gallery/upload");
        }

        include __DIR__ . "/../Views/gallery-image.php";
    }

    public function Upload() {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }

        include __DIR__ . "/../Views/gallery-upload.php";
    }

    public function Add() {
        if(!isset($_COOKIE["user_id"])) {
            header("location: /login");
        }

        if (!isset($_COOKIE["period_id"])) {
            $periodModel = new Periods($this->pdo);
            setcookie("period_id", $periodModel->current(), time() + 86400, "/");
        }
        
        $image = $_FILES["UploadFile"];
        
        $GalleryModel = new Gallery($this->pdo);
        $GalleryModel->upload($image);

        header("location: /gallery/upload");
    }

    public function Delete($image_id) {
        $GalleryModel = new Gallery($this->pdo);
        $GalleryModel->delete($image_id);

        header("location: /gallery/all");
    }

}