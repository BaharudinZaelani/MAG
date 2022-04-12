<?php 

spl_autoload_register(function($class){
	$file = __DIR__ . '\\AplicationConfig\\' . $class . '.php';
	if (file_exists($file)) {
		require 'AplicationConfig/' . $class . '.php';
	}
});


spl_autoload_register(function($class){
	$file = __DIR__ . '\\AplicationConfig/Connecntion/\\' . $class . '.php';
	if (file_exists($file)) {
		require 'AplicationConfig/Connecntion/' . $class . '.php';
	}
});