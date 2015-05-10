<?php
defined('BASE_PATH') OR exit('No direct script access allowed!');

/*
 * Initialize the core system 
 */
if(file_exists(BASE_PATH . 'system/core/leopard.php'))
{
	require_once BASE_PATH . 'system/core/leopard.php';
	$system = new leopard;
}else{
	echo 'Unable to load leopard.php (system/core/leopard.php)';
	exit();
}

/*
 * Start the routing process
 */
 if(file_exists(BASE_PATH . 'system/core/router.php'))
 {
 	require_once BASE_PATH . 'system/core/router.php';
	$router = new Router;
 }else{
 	echo 'Unable to load router.php (system/core/router.php)';
 	exit();
 }
