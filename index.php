<?php 
	// 应用目录为当前目录
	define('ROOT_PATH', __DIR__.'/');

	// 开启调试模式
	define('DEBUG', TRUE);

	//开启日志
	define('LOG', TRUE);
	
	// 网站根URL
	define('BASE_URL', 'http://localhost/Geass/');

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