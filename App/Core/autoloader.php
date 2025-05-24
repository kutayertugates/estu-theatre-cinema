<?php

spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . '/../../';
    $path = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    if (file_exists($path)) {
        require_once $path;
    }
});
