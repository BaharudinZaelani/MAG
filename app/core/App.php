<?php 


class App {
	Protected $controller = 'home';
	Protected $method = 'index';
	Protected $params = [];

	function __construct(){
		// set timezone
		date_default_timezone_set('Asia/Jakarta');

		// get the controller and method from the url
		$this->parseUrl();
		
		// call the controller's method
		$this->callController();
		
	}

	function callController(){
		$controller = $this->controller;
		$method = $this->method;
		$params = $this->params;

		// call the controller's method
		$filename = ucwords($controller);
		$controller = "app/controllers/$filename" . ".php";

		// check if the controller exists
		if(file_exists($controller)){
			include $controller;
			$controller = new $filename;
			$controller->$method($params);
		} else {
			die("Controller does not exist");
		}

	}

	function parseUrl(){
		// get a request uri
		$url = $_SERVER['REQUEST_URI'];

		// explode them
		$url = explode('/', $url);
		
		// remove the first element
		unset($url[0]);

		// set the controller
		if ( !empty($url[1]) ){
			$this->controller = $url[1];
			unset($url[1]);
		}else {
			$this->controller = 'home';
		}

		// set the method
		if ( isset($url[2]) ){
			$this->method = $url[2];
			unset($url[2]);
		}else {
			$this->method = 'index';
		}

		// set the params
		foreach ($url as $key => $value) {
			if(!empty($value)){
				// push the value to the params array
				$this->params[] = $value;
			}
		}

	}
}