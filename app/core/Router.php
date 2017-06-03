<?php

namespace App\Core;

class Router
{
	protected $url;
	protected $controller = "HomeController";
	protected $method = "index";
	protected $params = [];
	public $api = false;

	public function __construct()
	{
		$this->url = $this->parseURL();

		if(isset($this->url[0]) && $this->url[0] == "api"){
			$this->api = true;
			$this->responseWithAPI();
			return;
		}

		if(isset($this->url[0])) $this->setController();
		
		$class = "App\Controllers\\" . $this->controller;

		$this->controller = new $class;

		if(isset($this->url[1])) $this->setMethod();

		if($this->url != null && count($this->url)) $this->setParams();

	}

	public function dispatch()
	{
		//var_dump($this->params);
		call_user_func_array(array($this->controller, $this->method), $this->params);
	}

	private function setParams()
	{
		$this->params = array_values($this->url);
	}

	private function setMethod()
	{
		if(method_exists($this->controller, $this->url[1])) $this->method = $this->url[1];
		unset($this->url[1]);
	}

	private function setController()
	{
		$controllerClass = ucfirst($this->url[0]) . "Controller";

		if(! file_exists("app/controllers/" . $controllerClass . ".php")) $controllerClass = "ErrorController";

		$this->controller = $controllerClass;

		unset($this->url[0]);
	}

	private function parseURL()
	{
		if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != "" && $_SERVER['QUERY_STRING'] != "/"){

			$url = $_SERVER['QUERY_STRING'];

			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = trim($url, '/');
			$url = explode('/', $url);

			return $url;
		}

		return null;
	}

	private function responseWithAPI()
	{
		unset($this->url[0]);
		$this->url = array_values($this->url);

		$this->setController();
		$class = "App\Controllers\\" . $this->controller;
		$this->controller = new $class;

		$this->method = strtolower($_SERVER["REQUEST_METHOD"]);

		/*
		switch($method){
			case "get":
				$method = "get";
				break;
			case "post":
				$method
		}
		*/

		//var_dump($this->url);

		if($this->url != null && count($this->url)) $this->setParams();

		$this->dispatch();
	}

	private function responseWithBadRequest()
	{
		http_response_code(404);
		echo json_encode(["error" => "Bad Request"]);
	}
}
