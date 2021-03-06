<?php 
require './vendor/autoload.php';
include 'config';
// include 'seeder/user.php';

spl_autoload_register(function($class){
	$file = __DIR__ . '\\core\\' . $class . '.php';
	if (file_exists($file)) {
		require 'core/' . $class . '.php';
	}
});