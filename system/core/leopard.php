<?php
defined('BASE_PATH') OR exit('No direct script access allowed!');

class leopard
{
	public function file_exists($path, $error_msg)
	{
		if(file_exists($path))
		{
			return true;
		}else{	
			$this->displayError($error_msg);
			exit();
		}
	}
	
	public function method_exists($class, $method, $error_msg)
	{
		if(method_exists($class, $method))
		{
			return true;
		}else{
			$this->displayError($error_msg);
			exit();
		}
	}
	
	private function displayError($msg)
	{
		require_once BASE_PATH . 'system/templates/error.php';
	}
}
