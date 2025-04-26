<?php
session_start();

define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/config/config.php';
require_once BASE_PATH . '/app/Core/Route.php';

$route = new Route();
$route->run();