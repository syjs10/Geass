<?php 
	// 应用目录为当前目录
	define('ROOT_PATH', __DIR__.'/');

	// 开启调试模式
	define('DEBUG', true);

	// 网站根URL
	define('BASE_URL', 'http://localhost:1234');

	require ROOT_PATH . "vendor/autoload.php";

	if (DEBUG) {
		$whoops = new \Whoops\Run;  
		$errorTitle = "Geass Error";  
		$option = new \Whoops\Handler\PrettyPageHandler();  
		$option->setPageTitle($errorTitle);  
		$whoops->pushHandler($option);  
		$whoops->register(); 
		ini_set('display_error', 'On');
	} else {
		ini_set('display_error', 'Off');
	}

	require './core/Start.php';