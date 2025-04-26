<?php

ob_start();

$configs = [
	"path" => [
		"app" => [
			"controllers" => realpath("/../app/controllers"),
			"models" => realpath(__DIR__."/../app/models"),
			"views" => realpath(__DIR__."/../app/views"),
			"helpers" => realpath(__DIR__."/../app/helpers"),
			"core" => realpath(__DIR__ . "/../app/core"), 
		],
		"config" => realpath(__DIR__),
		"public" => realpath(__DIR__."/../public"),
	]
];

require_once $configs["path"]["config"]."/connect_db.php";

require_once $configs["path"]["config"]."/autoloader.php";
autoloader();

$GeneralViews = new GeneralViews($db);

?>