<?php
$start = microtime(true);
define('BASE_PATH', realpath(__DIR__) . '/');

if(file_exists(BASE_PATH . 'system/init.php'))
{
	require_once BASE_PATH . 'system/init.php';
}else{
	echo 'Unabl to load init.php (system/init.php)';
	exit();
}
echo microtime(true)-$start;
