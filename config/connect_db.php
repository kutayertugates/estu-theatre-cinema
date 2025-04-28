<?php

$host = "localhost";
$dbname = "kutayertug";
$root = "root";
$pass = "";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $root, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
    exit;
}

?>