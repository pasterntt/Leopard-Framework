<?php
defined('BASE_PATH') OR exit('No direct script access allowed!');

class Router extends leopard{
	
	private $router = array();
	private $controller, $method;
	
	public function __construct()
	{
		/*
 		* Load routing configuration
 		*/
		if($this->file_exists(BASE_PATH . 'application/config/routing.php', '<strong>The routing configuration file couldn\'t be found</strong> (application/config/routing.php)'))
		{
			require_once BASE_PATH . 'application/config/routing.php';
			$this->router = $router;
		}	
		
		/*
		 * Load controller class
		 */
 		if($this->file_exists(BASE_PATH . 'system/core/controller.php', '<strong>The controller class couldn\'t be found</strong> (system/core/controller.php)'))
 		{
 			require_once BASE_PATH . 'system/core/controller.php';
 		}
		$this->route();
	}
	
	private function route()
	{
		/*
 		* Split Url
 		*/
		$request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
		$script_name = explode('/', trim($_SERVER['SCRIPT_NAME'], '/'));
		$parts = array_diff_assoc($request_uri, $script_name);
		/*
 		* Reindex array
 		*/		
 		$url = array_filter(array_values($parts));
		print_r($url);
		
		if(!empty($url))
		{
			/*
			 * Load controller
			 */
			 $this->controller = $url[0];
			 unset($url[0]);
			 $url = array_values($url);
		}else{
			
			/*
			 * Load default controller
			 */		
			$this->controller = $this->router['default_controller'];
			$this->method = $this->router['default_method'];
			
		}
		
		/*
		 * Check if controller exists and load it
		 */
		if($this->file_exists(BASE_PATH . 'application/controllers/' . $this->controller . '.php', '<strong>Couldn\'t find the specified controller</strong> (application/controllers/' . $this->controller . '.php)'))
		{
			require_once BASE_PATH . 'application/controllers/' . $this->controller . '.php';
			
			$this->controller_name = $this->controller;
			
			$this->controller = new $this->controller;
		}
		
		/*
		 * Call method form controller
		 */
		if(!empty($url))
		{
			$this->method = $url[0];
		}else{
			$this->method = $this->router['default_method'];
		}
		
		/*
		 * Check if method exists
		 */
		if($this->method_exists($this->controller_name, $this->method, '<strong>Couldn\'t find the specified method</strong> (' . $this->controller_name . '/' . $this->method . ')'))
		{
			call_user_func(array($this->controller, $this->method));
		}
		
	}
	
}
