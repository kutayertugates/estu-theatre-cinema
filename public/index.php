<?php

require_once __DIR__ . '/../app/Core/Autoloader.php';
require_once __DIR__ . '/../routes/web.php';

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);