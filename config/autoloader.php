<?php

function autoloader() {
	global $configs;

	$paths = [
		"models" => $configs["path"]["app"]["models"],
		"helpers" => $configs["path"]["app"]["helpers"],
		"controllers" => $configs["path"]["app"]["controllers"],
		"core" => $configs["path"]["app"]["core"],
	];

	foreach ($paths as $folder => $path) {
		if (is_dir($path)) {
			$files = scandir($path);
			foreach ($files as $file) {
				if ($file !== '.' && $file !== '..' && str_ends_with($file, '.php')) {
					require_once($path . '/' . $file);
				}
			}
		}
	}
}
