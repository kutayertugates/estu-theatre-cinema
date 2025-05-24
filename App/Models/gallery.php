<?php

namespace App\Models;

use PDO;

class Gallery {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function all() {
        $stm = $this->db->prepare("SELECT * FROM gallery");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_file_with_name($name) {
        $stm = $this->db->prepare("SELECT * FROM gallery WHERE name=:name");
        $stm->bindValue(":name", $name);
        $stm->execute();
        return $stm->rowCount() > 0 ? $stm->fetch(PDO::FETCH_ASSOC) : false;
    }

    public function upload(array $image) {
        if (!isset($image) || $image['error'] !== UPLOAD_ERR_OK) {
            return 200; // Yükleme hatası
        }
    
        $fileTmpPath = $image['tmp_name'];
        $fileName = $image['name'];
        $fileSize = $image['size'];
        $fileType = $image['type'];
    
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
    
        $allowedfileExtensions = ['jpg', 'png', 'gif', 'pdf', 'docx'];
        $maxFileSize = 10 * 1024 * 1024; // 10MB
    
        if ($fileSize > $maxFileSize) {
            return 201; // Dosya çok büyük
        }
    
        if (!in_array($fileExtension, $allowedfileExtensions)) {
            return 202; // Geçersiz dosya uzantısı
        }
    
        // Dosya içeriğini oku (BLOB)
        $fileData = file_get_contents($fileTmpPath);
        if ($fileData === false) {
            return 203; // Okuma hatası
        }
    
        // Yeni benzersiz dosya adı üret
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    
        // Veritabanına BLOB olarak kaydet
        $stm = $this->db->prepare("INSERT INTO gallery (name, source, mimetype, size) VALUES (:name, :src, :mt, :size)");
        $stm->bindValue(":name", $newFileName);
        $stm->bindValue(":src", $fileData, PDO::PARAM_LOB); // <-- BLOB olarak bind edildi
        $stm->bindValue(":mt", $fileType);
        $stm->bindValue(":size", $fileSize);
        
        if ($stm->execute()) {
            return 100;
        } else {
            return 204;
        }
    }

    public function delete($image_id) {
        $stm = $this->db->prepare("DELETE FROM gallery WHERE id=:id");
        $stm->bindValue(":id", $image_id);
        $stm->execute();
    }
    
}
