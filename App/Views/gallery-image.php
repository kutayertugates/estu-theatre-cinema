<?php


header('Content-Type: ' . $image["mimetype"]);

// Eğer veri varsa direkt çıktısını ver
if (!empty($image["source"])) {
    echo $image["source"]; // BLOB veriyi tarayıcıya gönder
    exit;
} else {
    // Veri yoksa 404 döndür
    http_response_code(404);
    echo "Resim bulunamadı.";
}
