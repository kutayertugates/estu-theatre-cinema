<?php

namespace App\Models;

class General {
    public function validTimestamp($timestamp) {
        $t = explode(" ", $timestamp);
        $date = $t[0];
        $time = $t[1];

        $date = explode("-", $date);
        $y = $date[0];
        $m = $date[1];
        $d = $date[2];
        
        return $d ."/". $m ."/". $y ." ". $time;
    }

    function formatBytes($bytes, $precision = 2) {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
    
        $bytes /= pow(1024, $pow);
    
        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}
